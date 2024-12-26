<?php

namespace App\Models;

class ProductModels
{
  private $connection;

  public function __construct()
  {
    // Replace these values with your actual database configuration
    $host = DB_HOST;
    $username = DB_USER;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    $this->connection = new \mysqli($host, $username, $password, $database);

    // Check connection
    if ($this->connection->connect_error) {
      die("Connection failed: " . $this->connection->connect_error);
    }
  }

  public function getCountAllProducts()
  {
    $result = $this->connection->query("SELECT COUNT(*) FROM product");
    $row = $result->fetch_row();
    $totalProducts = $row[0];
    $pageIndex = ceil($totalProducts / 9);
    return (int)$pageIndex;
  }

  public function getAllProducts($key = '', $catId = 0, $limit = 9, $offset = 0, $sort = null)
  {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    if ($page === '' || $page == 1) {
      $offset = 0;
    } else {
      $offset = ($page * 9) - $limit;
    }

    if (isset($_POST['key'])) {
      $key = $_POST['key'];
    } else {
      $key = '';
    }
    // Chuẩn bị câu lệnh SQL với tham số
    $orderBy = "ORDER BY productId"; // Mặc định
    if ($sort === 'low_price') {
      $orderBy = "ORDER BY price ASC";
    } elseif ($sort === 'high_price') {
      $orderBy = "ORDER BY price DESC";
    }

    $stmt = $this->connection->prepare("
          SELECT *
          FROM product
          WHERE (catId = ? OR ? is null OR ? = '') AND productName LIKE ?
          $orderBy
          LIMIT ? OFFSET ?
      ");
    // Tạo giá trị cho tham số tìm kiếm
    $searchParam = '%' . $key . '%';
    // Liên kết tham số
    //isii: int,string,int,int
    $stmt->bind_param('iiisii', $catId, $catId, $catId, $searchParam, $limit, $offset);
    // Thực thi câu lệnh
    $stmt->execute();
    // Lấy kết quả
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getProductById($productId)
  {
    $productId = $this->connection->real_escape_string($productId);
    $result = $this->connection->query("SELECT * FROM product WHERE productId = $productId");
    return $result->fetch_assoc();
  }

  public function getRelatedProducts()
  {
    $result = $this->connection->query("SELECT * FROM product WHERE catId LIMIT 4");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getBigSaleProducts()
  {
    $result = $this->connection->query("SELECT * FROM product WHERE offer_price ORDER BY offer_price DESC LIMIT 4");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getBestSellerProduct()
  {
    $result = $this->connection->query("SELECT p.productId,p.productName,p.price_sale, p.price,p.offer_price,p.image FROM product p JOIN `order` o ON p.productId = o.productId GROUP BY p.productId, p.productName DESC LIMIT 4");
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}
