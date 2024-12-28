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

    //category
    public function getCategories($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $sql = "
            SELECT * 
            FROM category
            LIMIT ?, ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function getCategoryCount()
    {
        $sql = "SELECT COUNT(*) as count FROM category";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
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

    //brand
    public function getBrand($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $sql = "
        SELECT * 
        FROM brand
        LIMIT ?, ?
    ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function getBrandCount()
    {
        $sql = "SELECT COUNT(*) as count FROM brand";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function addBrand($name)
    {
        $sql = "INSERT INTO brand (brandName) VALUES (?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);
        return $stmt->execute();
    }

    public function getBrandById($catId)
    {
        $sql = "SELECT * FROM brand WHERE brandId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $catId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return false;
    }
    public function updateBrand($catId, $name)
    {
        $sql = "UPDATE brand SET brandName = ? WHERE brandId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("si", $name, $catId);
        return $stmt->execute();
    }
    public function deleteBrand($catId)
    {
        $sql = "DELETE FROM brand WHERE brandId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $catId);
        return $stmt->execute();
    }

    //product
    public function getProduct($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $sql = "
        SELECT 
            p.productId,
            p.productName,
            p.catId,
            c.catName,
            p.brandId,
            b.brandName,
            p.desc,
            p.price,
            p.image,
            p.type,
            p.price_sale,
            p.offer_price
        FROM 
            product p
        LEFT JOIN 
            category c ON p.catId = c.catId
        LEFT JOIN 
            brand b ON p.brandId = b.brandId
        LIMIT ?, ?
    ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function getProductCount()
    {
        $sql = "SELECT COUNT(*) as count FROM product";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function addProduct($productName, $catId, $brandId, $desc, $price, $imagePath, $type, $price_sale, $offer_price)
    {
        $sql = "INSERT INTO product (productName, catId, brandId, `desc`, price, image,type,price_sale,offer_price ) 
                VALUES (?, ?, ?, ?, ?, ?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("siisdssss", $productName, $catId, $brandId, $desc, $price, $imagePath, $type, $price_sale, $offer_price);

        return $stmt->execute();
    }

    public function getCategorie()
    {
        $sql = "SELECT catId, catName FROM category ";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }
    public function getBrands()
    {
        $sql = "SELECT brandId, brandName FROM brand ";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE productId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
    public function updateProduct($productId, $productName, $catId, $brandId, $desc, $price, $imagePath, $type, $price_sale, $offer_price)
    {
        $sql = "UPDATE product 
            SET productName = ?, catId = ?, brandId = ?, `desc` = ?, price = ?, image = ?, type = ?, price_sale = ?, offer_price = ? 
            WHERE productId = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("siisdssssi", $productName, $catId, $brandId, $desc, $price, $imagePath, $type, $price_sale, $offer_price, $productId);

        return $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE productId = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    //user 
    public function getUser()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function deleteUserById($id)
    {
        $sql = "DELETE FROM customer WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getUserWithPagination($limit, $offset)
    {
        $sql = "SELECT * FROM customer LIMIT ? OFFSET ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) as total FROM customer";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    //blog

    public function getBlog($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $sql = "
        SELECT * 
        FROM blog
        LIMIT ?, ?
    ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function getBlogCount()
    {
        $sql = "SELECT COUNT(*) as count FROM blog";
        $result = $this->connection->query($sql);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function addBlog($title, $image, $desc)
    {
        $sql = "INSERT INTO blog (title,  image, `desc` ) 
                VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $title, $image, $desc);
        return $stmt->execute();
    }

    public function getBlogid($id)
    {
        $sql = "SELECT * FROM blog WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function updateBlog($id, $title,  $image, $desc)
    {
        $sql = "UPDATE blog 
            SET title = ?,`desc` = ?, image = ? 
            WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssi", $title, $desc, $image, $id);
        return $stmt->execute();
    }
    public function deleteBlog($id)
    {
        $sql = "DELETE FROM blog WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}