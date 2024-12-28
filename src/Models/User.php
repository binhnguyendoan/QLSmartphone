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

    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customer WHERE id = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getCustomerByEmail($email, $password)
    {

        $sql = "SELECT * FROM customer WHERE email = ? and password = ?  LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function getPasswordByEmail($email)
    {
        $sql = "SELECT password FROM `customer` WHERE email = ? ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return null;
        }
    }
    public function signup($name, $address, $city, $country, $zipcode, $phone, $email, $password)
    {
        $sql = "INSERT INTO `customer`( `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssssss", $name, $address, $city, $country, $zipcode, $phone, $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        // Redirect to the index page after update
        header('Location: ../../index.php');
        return false;
    }
    public function updateUser($id, $name, $address, $city, $country, $zipcode, $phone, $email)
    {
        $sql = "UPDATE `customer` SET `name`= ? ,`address`= ? ,`city`= ? ,`country`= ? ,`zipcode`= ? ,`phone`= ? ,`email`= ?  WHERE `id`= ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssssss", $name, $address, $city, $country, $zipcode, $phone, $email, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return false;
    }
    public function getPasswordById($id)
    {
        $sql = "SELECT password FROM customer WHERE id = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();


        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function updatePassword($id, $password)
    {
        $sql = "UPDATE `customer` SET `password`= ?  WHERE `id`= ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $password, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }
}
