<?php

namespace App\Models;
//require_once(__DIR__ . '/../../config.php');

class User
{
    private $connection;

    public function __construct()
    {
        // Replace these values with your actual database configuration
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASSWORD;
        $database = DB_NAME;

        $this->connection = new \mysqli($host, $username, $password, $database);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getAllUsers()
    {
        $result = $this->connection->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($UserId)
    {
        $UserId = $this->connection->real_escape_string($UserId);
        $result = $this->connection->query("SELECT * FROM users WHERE id = $UserId");

        return $result->fetch_assoc();
    }

    public function createUser($username, $firstname, $lastname, $password_input, $password_check, $email)
    {
        $username = $this->connection->real_escape_string($username);
        $firstname = $this->connection->real_escape_string($firstname);
        $lastname = $this->connection->real_escape_string($lastname);
        $password_input = $this->connection->real_escape_string($password_input);
        $password_check = $this->connection->real_escape_string($password_check);
        $email = $this->connection->real_escape_string($email);

        $this->connection->query("INSERT INTO users (username, firstname, lastname, password_input, password_check, email) VALUES ('$username', '$firstname','$lastname', '$password_input', '$password_check', '$email')");

        // Redirect to the index page after creating post
        header('Location: ../../index.php');
    }

    public function updateUser($id, $username, $firstname, $lastname, $password_input, $password_check, $email)
    {
        $Userid = $this->connection->real_escape_string($id);
        $username = $this->connection->real_escape_string($username);
        $firstname = $this->connection->real_escape_string($firstname);
        $lastname = $this->connection->real_escape_string($lastname);
        $password_input = $this->connection->real_escape_string($password_input);
        $password_check = $this->connection->real_escape_string($password_check);
        $email = $this->connection->real_escape_string($email);


        $this->connection->query("UPDATE users SET username='$username', firstname='$firstname' ,lastname='$lastname', password_input='$password_input' , password_check = '$password_check' , email = '$email'  WHERE id=$Userid");

        // Redirect to the index page after update
        header('Location: ../../index.php');
    }

    public function deleteUser($UserId)
    {
        $UserId = $this->connection->real_escape_string($UserId);
        $this->connection->query("DELETE FROM users WHERE id=$UserId");
    }
}