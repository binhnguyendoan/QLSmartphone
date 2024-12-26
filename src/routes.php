<?php

use App\Router;
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Controllers\AuthenticationController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\CategoryController;
use App\Controllers\CheckoutController;
use App\Controllers\OrderController;

// Usage:
$router = new Router();

// Add routes
// $router->addRoute('/\//', [new PostController(), 'index']);
// $router->addRoute('/\/post/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/index/', [new PostController(), 'index']);
// $router->addRoute('/\/post\/show\/(\d+)/', [new PostController(), 'show']);
// $router->addRoute('/\/post\/create/', [new PostController(), 'create']);
// $router->addRoute('/\/post\/update\/(\d+)/', [new PostController(), 'update']);
// $router->addRoute('/\/post\/delete\/(\d+)/', [new PostController(), 'delete']);

//user
$router->addRoute('/\//', [new UserController(), 'index']);
$router->addRoute('/\/productList/', [new ProductController(), 'productList']);
// $router->addRoute('/\/productDetails/', [new ProductController(), 'productDetails']);
$router->addRoute('/\/checkout/', [new CheckoutController(), 'checkout']);
$router->addRoute('/\/search/', [new ProductController(), 'productList']);
$router->addRoute('/\/productDetails\/(\d+)/', [new ProductController(), 'productDetails']);
//admin
$router->addRoute('/\/admin\/login/', [new AdminController(), 'index']);
$router->addRoute('/\/login/', [new AdminController(), 'login']);
$router->addRoute('/\/admin\/dashboard/', [new AdminController(), 'dashboard']);
$router->addRoute('/\/logout/', [new AdminController(), 'logout']);

// route của lễ

$router->addRoute('/\/signin/', [new UserController(), 'signin']);
$router->addRoute('/\/auth\/validate/', [new AuthenticationController(), 'authenticate']);
$router->addRoute('/\/checksignup/', [new UserController(), 'signup']);
$router->addRoute('/\/signup/', [new UserController(), 'createAccount']);

// đăng nhập mới vào được

$router->addRoute('/\/logout/', [new UserController(), 'logout']);
$router->addRoute('/\/profile/', [new UserController(), 'updateUser']);
$router->addRoute('/\/update/', [new UserController(), 'update']);
$router->addRoute('/\/changepassword/', [new UserController(), 'changePassword']);
$router->addRoute('/\/updatepassword/', [new UserController(), 'updatePassword']);
$router->addRoute('/\/cart/', [new CartController(), 'cart']);
$router->addRoute('/\/addtocart/', [new CartController(), 'addtocart']);
$router->addRoute('/\/removeitem/', [new CartController(), 'removeItem']);
$router->addRoute('/\/orderlist/', [new OrderController(), 'order']);
$router->addRoute('/\/addorder/', [new OrderController(), 'addtoorder']);
