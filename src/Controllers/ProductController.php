<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Controller;

class ProductController extends Controller
{
  private $postModel;

  public function __construct()
  {
    $this->postModel = new Admin();
  }

  public function productList()
  {
    $this->render('users/product-list', []);
  }

  public function productDetails()
  {
    $this->render('users/product-details', []);
  }
}