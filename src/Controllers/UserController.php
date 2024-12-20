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
}
