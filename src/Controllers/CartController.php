<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Controller;
use App\Models\Cart;

class CartController extends Controller
{
  private $cartModel;

  public function __construct()
  {
    $this->cartModel = new Cart();
  }

  public function cart()
  {
    session_start();
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $userId =  $_SESSION['user']['id'];
    $cartItems = $this->cartModel->getAllCartItem($userId);
    // print_r($cartItems);
    $this->render('users/cart', ['cartItems' => $cartItems]);
    } else {
      header("Location: /home");
        exit;
    }
  }
  public function addtocart()
  {
    session_start();
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $userId =  $_SESSION['user']['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productId = $_POST['productId'] ?? '';
      $productName = $_POST['productName'] ?? '';
      $price = (int)$_POST['price'] ?? '';
      $image = $_POST['image'] ?? '';
      $quantity = $_POST['quantity'] ?? '';
      $cart = new Cart();
      if($cart->getCartItemById($productId, $userId) != null){
        $quantity += $cart->getCartItemById($productId, $userId)['quantity'];
        $cart->updateCartItem($quantity,$productId,$userId);
        header("Location: /cart");
        exit;
      } else {
        
        $cart->addToCart($productId,$productName,$price,$quantity,$image,$userId);
        $_SESSION['user']['cartItems'] =  count((new Cart)->getAllCartItem($userId));
        header("Location: /cart");
        exit;
      }
    } else {
      header("Location: /home");
        exit;
    }
      
  }
  }
  public function removeItem()
  {
    session_start();
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $userId =  $_SESSION['user']['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $productId = $_GET['productId'] ?? '';
      (new Cart())->removeCartItem($productId,$userId);
      if((new Cart)->getAllCartItem($userId) == null){
        $_SESSION['user']['cartItems'] = 0;
      } else {
        $_SESSION['user']['cartItems'] =  count((new Cart)->getAllCartItem($userId));
      }
      header("Location: /cart");
      exit;
    }
  } else {
    header("Location: /home");
      exit;
  }
  }
}