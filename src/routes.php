<?php

use App\Router;
use App\Controllers\PostController;
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\CheckoutController;
use App\Controllers\OrderController;
use App\Controllers\AuthenticationController;
// Usage:
$router = new Router();


// admin
$router->addRoute('/\/admin\/login/', [new AdminController(), 'index']);
$router->addRoute('/\/login/', [new AdminController(), 'login']);
$router->addRoute('/\/admin\/dashboard/', [new AdminController(), 'dashboard']);
$router->addRoute('/\/logout/', [new AdminController(), 'logout']);
// admin Category

$router->addRoute('/\/admin\/category\/(\d+)/', [new AdminController(), 'getCategory']);
$router->addRoute('/\/admin\/create-category/', [new AdminController(), 'addCategory']);
$router->addRoute('/\/admin\/update-category/', [new AdminController(), 'updateCategory']);
$router->addRoute('/\/admin\/edit-category\/(\d+)/', [new AdminController(), 'editCategory']);
$router->addRoute('/\/admin\/delete-category\/(\d+)/', [new AdminController(), 'deleteCategory']);

// admin Brand
$router->addRoute('/\/admin\/brand\/(\d+)/', [new AdminController(), 'getBrand']);
$router->addRoute('/\/admin\/create-brand/', [new AdminController(), 'addBrand']);
$router->addRoute('/\/admin\/update-brand/', [new AdminController(), 'updateBrand']);
$router->addRoute('/\/admin\/edit-brand\/(\d+)/', [new AdminController(), 'editBrand']);
$router->addRoute('/\/admin\/delete-brand\/(\d+)/', [new AdminController(), 'deleteBrand']);

//admin product

$router->addRoute('/\/admin\/products\/(\d+)?/', [new AdminController(), 'getProduct']);
$router->addRoute('/\/admin\/create-product/', [new AdminController(), 'addProduct']);
$router->addRoute('/\/admin\/update-product/', [new AdminController(), 'updateProduct']);
$router->addRoute('/\/admin\/edit-product\/(\d+)/', [new AdminController(), 'editProduct']);
$router->addRoute('/\/admin\/delete-product\/(\d+)/', [new AdminController(), 'deleteProduct']);

//admin user 

$router->addRoute('/\/admin\/user/', [new AdminController(), 'getUser']);
$router->addRoute('/\/admin\/delete-user\/(\d+)/', [new AdminController(), 'deleteUser']);



//user
$router->addRoute('/\//', [new UserController(), 'index']);
$router->addRoute('/\/productList/', [new ProductController(), 'productList']);
// $router->addRoute('/\/productDetails/', [new ProductController(), 'productDetails']);
$router->addRoute('/\/cart/', [new CartController(), 'cart']);
$router->addRoute('/\/checkout/', [new CheckoutController(), 'checkout']);
$router->addRoute('/\/search/', [new ProductController(), 'productList']);
$router->addRoute('/\/productDetails\/(\d+)/', [new ProductController(), 'productDetails']);


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
