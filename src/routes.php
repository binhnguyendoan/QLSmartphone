<?php

use App\Router;
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\CategoryController;
use App\Controllers\CheckoutController;

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
$router->addRoute('/\/cart/', [new CartController(), 'cart']);
$router->addRoute('/\/checkout/', [new CheckoutController(), 'checkout']);
$router->addRoute('/\/search/', [new ProductController(), 'productList']);
$router->addRoute('/\/productDetails\/(\d+)/', [new ProductController(), 'productDetails']);
//admin
$router->addRoute('/\/admin\/login/', [new AdminController(), 'index']);
$router->addRoute('/\/login/', [new AdminController(), 'login']);
$router->addRoute('/\/admin\/dashboard/', [new AdminController(), 'dashboard']);
$router->addRoute('/\/logout/', [new AdminController(), 'logout']);