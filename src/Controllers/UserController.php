<?php
namespace App\Controllers;
use App\Controller;
use App\Models\ProductModels;

class UserController extends Controller
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModels();
    }

    public function index()
    {
        $products = $this->productModel->getBigSaleProducts();
        $bestsells = $this->productModel->getBestSellerProduct();
        $relatedProducts = $this->productModel->getRelatedProducts();
        $this->render('users\home', ['products' => $products,'bestsells'=> $bestsells,'relatedProducts'=> $relatedProducts]);
    }
}
