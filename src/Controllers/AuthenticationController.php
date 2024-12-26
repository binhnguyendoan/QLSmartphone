<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\User;

class AuthenticationController
{

    public function __construct() {}

public function authenticate() {
        
        session_start();  
    if (isset($_SESSION['user'])) {
        header("Location: /users/home");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $user = (new User())->getCustomerByEmail($email,$password);
        if ($user != null) {
            $sumCart = (new Cart())->getAllCartItem($user['id']);
            $_SESSION['user'] = [
                                'id' => $user['id'],
                                'name' => $user['name'],
                                'address' => $user['address'],
                                'city' => $user['city'],
                                'country' => $user['country'],
                                'zipcode' => $user['zipcode'],
                                'phone' => $user['phone'],
                                'email' => $user['email'],
                                'cartItems' => ($sumCart == null) ? 0 : count($sumCart),
                            ];
            header("Location: /");
            exit();
        } else {
            // Mật khẩu người dùng nhập vào
            $_SESSION['flash_message'] = "Login has failed";
            header("Location: /signin");
            exit();
        }
    }
}
}
