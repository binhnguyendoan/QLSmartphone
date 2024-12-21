<?php

namespace App\Controllers;

use App\Models\ProductModels;
use App\Controller;

class ProductController extends Controller
{
  private $productModel;
  
  public function __construct()
  {
    $this->productModel = new ProductModels();
  }

  public function productList()
  {
    $sort = $_GET['sort'] ?? null; // Lấy giá trị sort từ query string
    $products = $this->productModel->getAllProducts('', 9, 0, $sort);
    $this->render('users/product-list', ['products' => $products]);
  }

  public function productDetails()
  {
    $this->render('users/product-details', []);
  }
}
