<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Controller;

class CheckoutController extends Controller
{
  private $postModel;
  public function __construct()
  {
    $this->postModel = new Admin();
  }
  public function checkout()
  {
    $this->render('users/checkout', []);
  }
}
