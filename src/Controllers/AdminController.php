<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Controller;


class AdminController extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
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
                    'name' => $admin['Name'],
                    'image' => $admin['Image']
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

    public function getCategory()
    {
        $this->checkAuth();
        $categories =  $this->adminModel->getCategories();
        $this->render('admin\category', ['categories' => $categories]);
      
    }

    public function addCategory(){
        $this->checkAuth();
        $this->render('admin\add_category', []);
    }
    public function updateCategory(){
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            var_dump($name);
            if (!empty($name)) {
                $success = $this->adminModel->addCategory($name);
                if ($success) {
                    $_SESSION['message'] = 'Category added successfully!';
                    header("Location: /admin/category"); 
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to add category. Please try again.';
                }
            } else {
                $_SESSION['error'] = 'Category name cannot be empty.';
            }
        }
    }

    public function editCategory($catId){
        $this->checkAuth();
        $category = $this->adminModel->getCategoryById($catId);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = $_POST['name'] ?? '';
            if (!empty($categoryName)) {
                $success = $this->adminModel->updateCategory($catId, $categoryName);
                
                if ($success) {
                    $_SESSION['message'] = 'Category updated successfully!';
                    header("Location: /admin/category");  
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to update category. Please try again.';
                }
            } else {
                $_SESSION['error'] = 'Category name cannot be empty.';
            }
        }
        $this->render('admin\edit_category', ['category' => $category]);
    }


    public function deleteCategory($catId)
{
    $this->checkAuth();
    $deleted = $this->adminModel->deleteCategory($catId);
    if ($deleted) {
        $_SESSION['message'] = 'Category deleted successfully!';
    } else {
        $_SESSION['error'] = 'Failed to delete category. Please try again.';
    }
    header("Location: /admin/category");
    exit;
}



}
