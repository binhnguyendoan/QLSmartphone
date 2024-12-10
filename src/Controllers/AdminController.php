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
        session_start();
        if (isset($_SESSION['admin'])) {
            header("Location: /admin/dashboard");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $adminModel = new Admin();
            $admin = $adminModel->login($username, $password);
            if ($admin) {
                $_SESSION['admin'] = [
                    'id' => $admin['id'],
                    'name' => $admin['name'],
                    'image' => $admin['image']
                ];
                print_r($_SESSION['admin']);
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
    function checkAuth()
    {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header("Location: /admin/login");
            exit;
        }
    }
    public function dashboard()
    {
        $this->checkAuth();
        $this->render('admin\dashboard', []);
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /admin/login");
        exit;
    }
}
