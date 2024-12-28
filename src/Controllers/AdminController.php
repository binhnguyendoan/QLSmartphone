<?php

namespace App\Controllers;


use App\Models\Admin;
use App\Controller;
use App\Models\CategoryModels;

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

    public function getCategory($page = 1)
    {
        $this->checkAuth();
        $limit = 4;
        $categories = $this->adminModel->getCategories($page, $limit);
        $totalCategories = $this->adminModel->getCategoryCount();
        $totalPages = ceil($totalCategories / $limit);

        $this->render('admin\category', [
            'categories' => $categories,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }


    public function addCategory()
    {
        $this->checkAuth();
        $this->render('admin\add_category', []);
    }
    public function updateCategory()
    {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            if (!empty($name)) {
                $success = $this->adminModel->addCategory($name);
                if ($success) {
                    $_SESSION['message'] = 'Category added successfully!';
                    header("Location: /admin/category/1");
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to add category. Please try again.';
                }
            } else {
                $_SESSION['error'] = 'Category name cannot be empty.';
            }
        }
    }

    public function editCategory($catId)
    {
        $this->checkAuth();
        $category = $this->adminModel->getCategoryById($catId);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = $_POST['name'] ?? '';
            if (!empty($categoryName)) {
                $success = $this->adminModel->updateCategory($catId, $categoryName);

                if ($success) {
                    $_SESSION['message'] = 'Category updated successfully!';
                    header("Location: /admin/category/1");
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

    //brand
    public function getBrand($page = 1)
    {
        $this->checkAuth();
        $limit = 5;
        $brand = $this->adminModel->getBrand($page, $limit);
        $totalBrands = $this->adminModel->getBrandCount();
        $totalPages = ceil($totalBrands / $limit);

        $this->render('admin\brand', [
            'brand' => $brand,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
    public function addBrand()
    {
        $this->checkAuth();
        $this->render('admin\add_brand', []);
    }
    public function updateBrand()
    {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['Brandname'] ?? '';
            var_dump($name);
            if (!empty($name)) {
                $success = $this->adminModel->addBrand($name);
                if ($success) {
                    $_SESSION['message'] = 'Category added successfully!';
                    header("Location: /admin/brand/1");
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to add category. Please try again.';
                }
            } else {
                $_SESSION['error'] = 'Category name cannot be empty.';
            }
        }
    }
    public function editBrand($catId)
    {
        $this->checkAuth();
        $brand = $this->adminModel->getBrandById($catId);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = $_POST['name'] ?? '';
            if (!empty($categoryName)) {
                $success = $this->adminModel->updateBrand($catId, $categoryName);

                if ($success) {
                    $_SESSION['message'] = 'Category updated successfully!';
                    header("Location: /admin/brand/1");
                    exit;
                } else {
                    $_SESSION['error'] = 'Failed to update category. Please try again.';
                }
            } else {
                $_SESSION['error'] = 'Category name cannot be empty.';
            }
        }
        $this->render('admin\edit_brand', ['brand' => $brand]);
    }

    public function deleteBrand($catId)
    {
        $this->checkAuth();
        $deleted = $this->adminModel->deleteBrand($catId);
        if ($deleted) {
            $_SESSION['message'] = 'Category deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete category. Please try again.';
        }
        header("Location: /admin/brand");
        exit;
    }

    //product
    public function getProduct($page = 1)
    {
        $this->checkAuth();
        $limit = 4;
        $products = $this->adminModel->getProduct($page, $limit);
        $totalProducts = $this->adminModel->getProductCount();
        $totalPages = ceil($totalProducts / $limit);
        $this->render('admin\product', [
            'products' => $products,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
    public function addProduct()
    {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productName = $_POST['productName'] ?? '';
            $catId = $_POST['catId'] ?? null;
            $brandId = $_POST['brandId'] ?? null;
            $desc = $_POST['desc'] ?? '';
            $price = $_POST['price'] ?? 0;
            $type = $_POST['type'] ?? 0;
            $price_sale = $_POST['price_sale'] ?? 0;
            $offer_price = $_POST['offer_price'] ?? 0;
            $image = basename($_FILES['image']['name']);
            $image_tmp = $_FILES['image']['tmp_name'];
            $success = $this->adminModel->addProduct($productName, $catId, $brandId, $desc, $price, $image, $type, $price_sale, $offer_price);
            move_uploaded_file($image_tmp, 'public/img/' . $image);

            if ($success) {
                $_SESSION['message'] = 'Product updated successfully!';
                header("Location: /admin/product");
                exit;
            } else {
                $_SESSION['error'] = 'Failed to update product.';
            }
        }
        $categories = $this->adminModel->getCategorie();
        $brands = $this->adminModel->getBrands();
        $this->render('admin\add_product', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function updateProduct()
    {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['productId'] ?? null;
            $productName = $_POST['productName'] ?? '';
            $catId = $_POST['catId'] ?? null;
            $brandId = $_POST['brandId'] ?? null;
            $desc = $_POST['desc'] ?? '';
            $price = $_POST['price'] ?? 0;
            $type = $_POST['type'] ?? 0;
            $price_sale = $_POST['price_sale'] ?? 0;
            $offer_price = $_POST['offer_price'] ?? 0;
            $image = basename($_FILES['image']['name']);
            $image_tmp = $_FILES['image']['tmp_name'];
            $success = $this->adminModel->updateProduct($productId, $productName, $catId, $brandId, $desc, $price, $image, $type, $price_sale, $offer_price);
            move_uploaded_file($image_tmp, 'public/img/' . $image);

            if ($success) {
                $_SESSION['message'] = 'Product updated successfully!';
                header("Location: /admin/products/1");
                exit;
            } else {
                $_SESSION['error'] = 'Failed to update product.';
            }
        }
    }

    public function editProduct($id)
    {
        $this->checkAuth();
        $product = $this->adminModel->getProductById($id);
        if (!$product) {
            $_SESSION['error'] = 'Product not found.';
            header("Location: /admin/product");
            exit;
        }
        $categories = $this->adminModel->getCategorie();
        $brands = $this->adminModel->getBrands();

        $this->render('admin\edit_product', [
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product
        ]);
    }

    public function deleteProduct($id)
    {
        $this->checkAuth();
        $success = $this->adminModel->deleteProduct($id);
        if ($success) {
            $_SESSION['message'] = 'Product deleted successfully!';
        } else {
            $_SESSION['error'] = 'Failed to delete product.';
        }
        header("Location: /admin/product");
        exit;
    }

    //user 

    public function getUser()
    {
        $this->checkAuth();
        $limit = 7;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $limit;
        $users = $this->adminModel->getUserWithPagination($limit, $offset);
        $totalUsers = $this->adminModel->getTotalUsers();
        $totalPages = ceil($totalUsers / $limit);

        $this->render('admin/user', [
            'user' => $users,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }
}
