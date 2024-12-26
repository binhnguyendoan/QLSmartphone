<?php
namespace App\Controllers;
use App\Controller;
use App\Models\ProductModels;
use App\Models\User;

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
    public function signin()
    {
        $this->render('users\login', []);
    }
    public function createAccount()
    {
        $this->render('users\signup', []);
    }
    public function updateUser()
    
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $this->render('users\information', []);
    } else {
        header("Location: /home");
          exit;
      }
    }
    public function changePassword()
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $this->render('users\changepass', []);
    } else {
        header("Location: /home");
          exit;
      }
    }
    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $country = $_POST['country'] ?? '';
            $zipcode = $_POST['zipcode'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $passwordconfirm = $_POST['passwordconfirm'] ?? '';
            $userModel= new User();
            if($password == $passwordconfirm){
                $userModel->signup($name, $address, $city, $country, $zipcode, $phone, $email, $password);
                header("Location: /signin");
                exit;
            } else {
                $error = "Invalid username or password.";
                include(__DIR__ . '../../Views/users/signup.php');
            }
            if (empty($name) || empty($address) || empty($city) || empty($country) || empty($phone) || empty($email) || empty($password)) {
                $error = "All fields are required.";
                include(__DIR__ . '../../Views/users/signup.php');
                exit;
            }
            
        }
    }
    public function update()
    {
        session_start();
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'] ?? '';
                $name = $_POST['name'] ?? '';
                $address = $_POST['address'] ?? '';
                $city = $_POST['city'] ?? '';
                $country = $_POST['country'] ?? '';
                $zipcode = $_POST['zipcode'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $email = $_POST['email'] ?? '';
                $user= (new User())->updateUser($id,$name, $address, $city, $country, $zipcode, $phone, $email);
                    $_SESSION['user'] = [
                        'id' => $id,
                        'name' => $name,
                        'address' => $address,
                        'city' => $city,
                        'country' => $country,
                        'zipcode' => $zipcode,
                        'phone' => $phone,
                        'email' => $email
                    ];
                    header("Location: /profile");
                    exit;
            }
        } else {
            header("Location: /home");
              exit;
          }
        }
        public function updatePassword()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'] ?? '';
                $oldpassword = $_POST['oldpassword'] ?? '';
                $newpassword = $_POST['newpassword'] ?? '';
                $passwordconfirm = $_POST['passwordconfirm'] ?? '';
                $user= new User();
                if (($newpassword == $passwordconfirm) && ($user->getCustomerById($id)['password'] == $oldpassword)){
                $user->updatePassword($id,$newpassword);
                header("Location: /profile");
                exit();
                } else {
                header("Location: /changepassword");
                exit(); 
                }  
            } 
        } else {
            header("Location: /home");
              exit;
          }
        }
        
    public function logout()
    {
            session_start();
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                session_destroy();
                header("Location: /users/home");
                exit();
            }
            if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
                header("Location: /home");
                exit;
            }     
    }
}
