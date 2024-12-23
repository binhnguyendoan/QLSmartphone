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
    $products = $this->productModel->getAllProducts('',$catId, 9, 0, $sort);
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
    $relatedProducts = $this->productModel->getRelatedProducts($productDetails['catId']); // Assuming you have a category ID
    $this->render('users/product-details', [
        'productDetails' => $productDetails,
        'products' => $relatedProducts 
    ]);
  }
}
