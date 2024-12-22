<?php

use App\Router;
use App\Controllers\PostController;
use App\Controllers\UserController;
use App\Controllers\AdminController;
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


$router->addRoute('/\//', [new UserController(), 'index']);
// admin
$router->addRoute('/\/admin\/login/', [new AdminController(), 'index']);
$router->addRoute('/\/login/', [new AdminController(), 'login']);
$router->addRoute('/\/admin\/dashboard/', [new AdminController(), 'dashboard']);
$router->addRoute('/\/logout/', [new AdminController(), 'logout']);
// admin Category

$router->addRoute('/\/admin\/category/', [new AdminController(), 'getCategory']);
$router->addRoute('/\/admin\/create-category/', [new AdminController(), 'addCategory']);
$router->addRoute('/\/admin\/update-category/', [new AdminController(), 'updateCategory']);
$router->addRoute('/\/admin\/edit-category\/(\d+)/', [new AdminController(), 'editCategory']);
$router->addRoute('/\/admin\/delete-category\/(\d+)/', [new AdminController(), 'deleteCategory']);

// admin Brand
$router->addRoute('/\/admin\/brand/', [new AdminController(), 'getBrand']);
$router->addRoute('/\/admin\/create-brand/', [new AdminController(), 'addBrand']);
$router->addRoute('/\/admin\/update-brand/', [new AdminController(), 'updateBrand']);
$router->addRoute('/\/admin\/edit-brand\/(\d+)/', [new AdminController(), 'editBrand']);
$router->addRoute('/\/admin\/delete-brand\/(\d+)/', [new AdminController(), 'deleteBrand']);