<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Controller;


class AdminController extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new Admin();
    }

    public function index()
    {
        $this->render('admin\login_admin', []);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $adminModel = new Admin();
            $admin = $adminModel->login($username, $password);
            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin;
                header("Location: /admin/dashboard");
                exit;
            } else {
                $error = "Invalid username or password.";
                include(__DIR__ . '../../Views/Admin/login_admin.php');
            }
        } else {
            include(__DIR__ . '../../Views/Admin/login_admin.php');
        }
    }

    public function dashboard()
    {
        $this->render('admin\dashboard', []);
    }
}
