<?php

namespace App\Controllers;

use App\Models\ProductModels;
use App\Controller;
use App\Models\CategoryModels;

class ProductController extends Controller
{
  private $productModel;
  private $categoryModel;
  
  public function __construct()
  {
    $this->productModel = new ProductModels();
    $this->categoryModel = new CategoryModels();
  }

  public function productList()
  {
    $sort = $_GET['sort'] ?? null; // Lấy giá trị sort từ query string
    $catId = $_GET['catId'] ?? null;
    $searchKey = $_POST['key'] ?? ''; // Lấy giá trị tìm kiếm từ POST
    $products = $this->productModel->getAllProducts($searchKey, $catId, 9, 0, $sort); // Truyền key vào hàm
    $count = $this->productModel->getCountAllProducts(); // Lấy số lượng sản phẩm
    $categories = $this->categoryModel->getAllCategories();
    $this->render('users/product-list', ['products' => $products,'count' => $count,'categories'=> $categories]);
  }

  // public function productDetails()
  // {
  //   $this->render('users/product-details', []);
  // }

  public function productDetails($productId)
  {
    $productDetails = $this->productModel->getProductById($productId);
    $relatedProducts = $this->productModel->getRelatedProducts($productDetails['catId']);
    $this->render('users/product-details', ['productDetails' => $productDetails,'products' => $relatedProducts ]);
  }
}
