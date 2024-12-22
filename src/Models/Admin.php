<?php

namespace App\Models;

class Admin

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
    public function login($Name, $Password)
    {
        $sql = "SELECT * FROM admins WHERE Name = ? AND Password = ? LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $Name, $Password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return false;
    }
    public function getCategories()
    {
        $sql = "SELECT * FROM category";
        $result = $this->connection->query($sql);

       
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
        return [];
    }

    public function addCategory($name)
    {
        $sql = "INSERT INTO category (catName) VALUES (?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }
    public function getCategoryById($catId)
    {
        $sql = "SELECT * FROM category WHERE catId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $catId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        }

        return false; 
    }

    public function updateCategory($catId, $name)
    {
        $sql = "UPDATE category SET catName = ? WHERE catId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("si", $name, $catId);
        return $stmt->execute();
    }

    public function deleteCategory($catId)
    {
        $sql = "DELETE FROM category WHERE catId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $catId);
        return $stmt->execute();
    }
    


}