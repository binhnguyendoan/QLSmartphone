<?php

namespace App\Models;

class Order
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
  public function getAllOrderItem($userId){
    $sql = "SELECT * FROM `order` WHERE customerId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return null;  
        }
  }
  public function addToOrder($productId,$productName,$userId,$quantity,$price,$image,$status){
    $sql = "INSERT INTO `order`(`productId`, `productName`, `customerId`, `quantity`, `price`, `image`,`status`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssssss", $productId,$productName,$userId,$quantity,$price,$image,$status);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return null;  
        }
  }
  public function updateCartItem($quantity,$productId,$userId){
    $sql = "UPDATE `cart` SET `quantity`= ? WHERE `productId`= ? AND `customerId`= ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $quantity,$productId,$userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return null;  
        }
  }
  public function getCartItemById($productId,$userId){
    $sql = "SELECT * FROM `cart` WHERE productId = ? AND customerId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss",$productId,$userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
  }
  public function removeCartItem($productId,$userId){
    $sql = "DELETE FROM `cart` WHERE customerId = ? AND productId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss",$userId,$productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          return $result->fetch_assoc();
      }

      return false;
  }
}
