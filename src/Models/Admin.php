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
}