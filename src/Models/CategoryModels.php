<?php

namespace App\Models;
//require_once(__DIR__ . '/../../config.php');

class CategoryModels
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

    public function getAllCategories()
    {
      $result = $this->connection->query("SELECT * FROM category order BY catId desc");
      return $result->fetch_all(MYSQLI_ASSOC);
    }
}