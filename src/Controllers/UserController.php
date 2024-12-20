<?php

namespace App\Controllers;

use App\Models\User;
use App\Controller;

class UserController extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new User();
    }

    public function index()
    {
        $this->render('users\home', []);
    }

    public function show($UserId)
    {
        // Fetch a single post by ID and display in a view
        $user = $this->postModel->getUserById($UserId);
        $this->render('users\user-form', ['user' => $user]);
    }

    public function create()
    {
        // Handle form submission to create a new post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password_input = $_POST['password_input'];
            $password_check = $_POST['password_check'];
            $email  = $_POST['email'];

            // Call the model to create a new post
            $this->postModel->createUser($username, $firstname, $lastname, $password_input, $password_check, $email);
        }

        // Display the form to create a new post

        $this->render('users\user-form', ['post' => []]);
    }

    public function update($Userid)
    {
        // Handle form submission to update a post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password_input = $_POST['password_input'];
            $password_check = $_POST['password_check'];
            $email  = $_POST['email'];

            // Call the model to update the post
            $this->postModel->updateUser($Userid, $username, $firstname, $lastname, $password_input, $password_check, $email);
        }

        // Fetch the post data and display the form to update
        $user = $this->postModel->getUserById($Userid);

        $this->render('users\user-form', ['user' => $user]);
    }

    public function delete($UserId)
    {
        // Call the model to delete the post
        $this->postModel->deleteUser($UserId);

        // Redirect to the index page after deletion
        header('Location: /index.php');
    }
}
