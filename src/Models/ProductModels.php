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

  public function getCountAllProducts(){
    $result = $this->connection->query("SELECT COUNT(*) FROM product");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getAllProducts($key = '', $limit = 9, $offset = 0, $sort = null)
  {
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
          WHERE productName LIKE ?
          $orderBy
          LIMIT ? OFFSET ?
      ");
    // Tạo giá trị cho tham số tìm kiếm
    $searchParam = '%' . $key . '%';
    // Liên kết tham số
    //sii: seach, limit, offset
    $stmt->bind_param('sii', $searchParam, $limit, $offset);
    // Thực thi câu lệnh
    $stmt->execute();
    // Lấy kết quả
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  // public function getAllProductsSortedByPriceAsc()
  // {
  //   $result = $this->connection->query("SELECT * FROM product ORDER BY price ASC");
  //   return $result->fetch_all(MYSQLI_ASSOC);
  // }

  // public function getAllProductsSortedByPriceDesc()
  // {
  //   $result = $this->connection->query("SELECT * FROM product ORDER BY price Desc");
  //   return $result->fetch_all(MYSQLI_ASSOC);
  // }
}
