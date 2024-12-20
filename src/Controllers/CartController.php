<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Controller;

class CartController extends Controller
{
  private $postModel;

  public function __construct()
  {
    $this->postModel = new Admin();
  }

  public function cart()
  {
    $this->render('users/cart', []);
  }
}