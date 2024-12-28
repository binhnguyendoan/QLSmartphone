<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Controller;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    private $orderModel;
    public function __construct()
    {
        $this->orderModel = new Order();
    }
    public function order()
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $userId =  $_SESSION['user']['id'];
            $orderItems = $this->orderModel->getAllOrderItem($userId);
            // print_r($cartItems);
            $this->render('users/order-list', ['orderItems' => $orderItems]);
        } else {
            header("Location: /home");
            exit;
        }
    }
    public function addtoorder()
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $userId =  $_SESSION['user']['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $productId = $_POST['productId'] ?? '';
                $productName = $_POST['productName'] ?? '';
                $price = (int)$_POST['price'] ?? '';
                $image = $_POST['image'] ?? '';
                $quantity = $_POST['quantity'] ?? '';
                $order = new Order();

                $order->addToOrder($productId, $productName, $userId, $quantity, $price, $image, 0);
                header("Location: /orderlist");
                exit;
            }
        } else {
            header("Location: /home");
            exit;
        }
    }

    public function removeItem()
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $userId =  $_SESSION['user']['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $productId = $_GET['productId'] ?? '';
                (new Cart())->removeCartItem($productId, $userId);
                header("Location: /cart");
                exit;
            }
        } else {
            header("Location: /home");
            exit;
        }
    }
}
