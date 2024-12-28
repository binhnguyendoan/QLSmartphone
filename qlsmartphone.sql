/*
 Navicat Premium Dump SQL

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:4306
 Source Schema         : qlsmartphone

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 28/12/2024 18:38:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'binh', 'binh@gmail.com', 'dsd', '123');

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES (1, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (2, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (3, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (4, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (5, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (6, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (7, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (8, 'E-Commerce Free Template', 'post_img_2.jpg', 'Nullam acdui utnisl interdum mattisut nonese maurisauris gravida auctor dignissim.');
INSERT INTO `blog` VALUES (9, 'test1123', 'post_img_2.jpg', 'tes5123');

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand`  (
  `brandId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`brandId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES (1, 'Alcatel');
INSERT INTO `brand` VALUES (2, 'Apple');
INSERT INTO `brand` VALUES (3, 'Googlee');
INSERT INTO `brand` VALUES (4, 'HTC');
INSERT INTO `brand` VALUES (5, 'Samsung');
INSERT INTO `brand` VALUES (6, 'Vivo');
INSERT INTO `brand` VALUES (7, 'Nexus');
INSERT INTO `brand` VALUES (8, 'hello');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `productId` int UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerId` int UNSIGNED NOT NULL,
  PRIMARY KEY (`cartId`) USING BTREE,
  INDEX `productId`(`productId` ASC) USING BTREE,
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (2, 2, 'HTC U Ultra', '1200', 3, 'product_img_2.png', 1);
INSERT INTO `cart` VALUES (13, 1, 'Google Pixel', '1100', 1, 'product_img_1.png', 1);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `catId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`catId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Smart Phones');
INSERT INTO `category` VALUES (2, 'Cell Phones');
INSERT INTO `category` VALUES (3, 'Android Phones');

-- ----------------------------
-- Table structure for compare
-- ----------------------------
DROP TABLE IF EXISTS `compare`;
CREATE TABLE `compare`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerId` int UNSIGNED NOT NULL,
  `productId` int UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `customerId`(`customerId` ASC, `productId` ASC) USING BTREE,
  INDEX `productId`(`productId` ASC) USING BTREE,
  CONSTRAINT `compare_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `compare_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of compare
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zipcode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (1, 'le', '65 ha cong', 'hue', 'viet nam', '520000', '0332293825', 'le@gmail.com', 'lepass');
INSERT INTO `customer` VALUES (2, 'hoang nguyen', 'nam dong', 'hue', 'Vietnam', '52000', '123456789', 'hoang@gmail.com', 'hoangpass');
INSERT INTO `customer` VALUES (3, 'binh', 'hoang van thu', 'hue', 'viet nam', '52000', '222222222', 'binh@gmail.com', 'binhpass');
INSERT INTO `customer` VALUES (6, 'truong vo', 'ngu binh', 'hue', 'Vietnam', '52000', '0000000000', 'truong@gmail.com', 'truongpass');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `productId` int UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customerId` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `odDate` date NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `productId`(`productId` ASC, `customerId` ASC) USING BTREE,
  INDEX `customerId`(`customerId` ASC) USING BTREE,
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, 11, 'Iphone 6s plus', 1, 10, '1100', 'product_img_7.png', 0, '2024-12-25');
INSERT INTO `order` VALUES (2, 1, 'Google Pixel', 2, 12, '1200', 'product_img_1.png', 0, '2024-12-25');
INSERT INTO `order` VALUES (3, 1, 'Google Pixel', 1, 12, '1100', 'product_img_1.png', 0, '2024-12-25');
INSERT INTO `order` VALUES (4, 8, 'Samsung Galaxy Note 8', 1, 3, '1500', 'product_img_3.png', 0, '2024-12-25');
INSERT INTO `order` VALUES (5, 1, 'Google Pixel', 6, 1, '1100', 'product_img_1.png', 0, '2024-12-26');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `productId` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `productName` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `catId` int UNSIGNED NOT NULL,
  `brandId` int UNSIGNED NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_sale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `offer_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`productId`) USING BTREE,
  INDEX `catId`(`catId` ASC, `brandId` ASC) USING BTREE,
  INDEX `brandId`(`brandId` ASC) USING BTREE,
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (1, 'Google Pixel 2', 2, 4, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1100', '1300', '20', 'display_img_1.png');
INSERT INTO `product` VALUES (2, 'HTC U Ultra', 3, 4, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1200 ', '1700', '10', 'product_img_2.png');
INSERT INTO `product` VALUES (3, 'Samsung Galaxy Note 8', 3, 5, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1500', '2000', '40', 'product_img_3.png');
INSERT INTO `product` VALUES (4, 'Samsung Galaxy Note 8', 2, 5, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1500', '2000', '30', 'product_img_3.png');
INSERT INTO `product` VALUES (5, 'Vivo V5 Plus (Matte Black)', 1, 6, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1500', '2000', '15', 'product_img_4.png');
INSERT INTO `product` VALUES (6, 'HTC U Ultra (64GB, Blue)', 2, 4, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1200', '1700', '10', 'product_img_2.png');
INSERT INTO `product` VALUES (7, 'HTC U Ultra (64GB, Blue)', 2, 4, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1200', '1700', '10', 'product_img_2.png');
INSERT INTO `product` VALUES (8, 'Samsung Galaxy Note 8', 2, 5, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1500', '2000', '40', 'product_img_3.png');
INSERT INTO `product` VALUES (9, 'HTC U Ultra (64GB, Blue)', 3, 4, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1200', '1700', '10', 'product_img_2.png');
INSERT INTO `product` VALUES (10, 'Samsung Galaxy Note 8', 3, 5, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1500', '1700', '10', 'product_img_3.png');
INSERT INTO `product` VALUES (11, 'Apple iPhone 6S ', 1, 2, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 1, '1300', '2000', '20', 'product_img_7.png');
INSERT INTO `product` VALUES (12, 'Apple iPhone X', 1, 2, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1200', '2000', '20', 'product_img_8.png');
INSERT INTO `product` VALUES (13, 'Apple iPhone 7 ', 1, 2, '12.2 MP Rear | 8 MP Front Camera, 4GB RAM, 2700 mAh battery, Android 8.0, Qualcomm Snapdragon 835, Fingerprint Sensor', 0, '1400', '1800', '20', 'product_img_6.png');

-- ----------------------------
-- Table structure for warehouse
-- ----------------------------
DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse`  (
  `id_warehouse` int NOT NULL AUTO_INCREMENT,
  `id_sanpham` int UNSIGNED NOT NULL,
  `sl_nhap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_warehouse`) USING BTREE,
  INDEX `id_sanpham`(`id_sanpham` ASC) USING BTREE,
  CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warehouse
-- ----------------------------

-- ----------------------------
-- Table structure for wishlist
-- ----------------------------
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int UNSIGNED NOT NULL,
  `productId` int UNSIGNED NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `customer_id`(`customer_id` ASC, `productId` ASC) USING BTREE,
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wishlist
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
