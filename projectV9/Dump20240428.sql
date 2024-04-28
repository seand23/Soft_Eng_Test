CREATE DATABASE  IF NOT EXISTS `softeng` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `softeng`;
-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (x86_64)
--
-- Host: 127.0.0.1    Database: softeng
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `userID` int DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  KEY `userID` (`userID`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=773 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (77,'Admin1','admin1','admin1@example.com','adminpass','789 Oak St, Village','555-123-4567',NULL),(772,'Admin2','admin2','admin2@example.com','adminpass2','321 Maple St, County','555-987-6543',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `userID` int DEFAULT NULL,
  PRIMARY KEY (`customerID`),
  KEY `userID` (`userID`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `totalPrice` decimal(7,2) DEFAULT NULL,
  `datePurchase` timestamp NULL DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `userId` (`userId`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1266.00,'2024-04-28 17:29:05',1),(2,1266.00,'2024-04-28 17:31:44',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `userID` int DEFAULT NULL,
  `adminID` int DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `brandName` varchar(255) DEFAULT NULL,
  `supplierID` int DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `supplierID` (`supplierID`),
  KEY `userID` (`userID`),
  KEY `adminID` (`adminID`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplierID`) REFERENCES `supplier` (`supplierID`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`adminID`) REFERENCES `admins` (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,77,'Product1',19.99,'Brand1',1,'Black','L','./images/LOGO.jpg'),(2,2,77,'Product2',29.99,'Brand2',2,'Blue','M','./images/LOGO.jpg'),(3,1,772,'Product3',39.99,'Brand3',3,'Grey','S','./images/LOGO.jpg'),(4,3,772,'3 Piece',59.99,'Hugo Boss',1,'Red','XL','./images/LOGO.jpg'),(5,2,77,'2 Piece',49.99,'Armani',2,'Green','M','./images/LOGO.jpg'),(6,1,77,'3 Piece',79.99,'Calvin Klein',3,'White','S','./images/LOGO.jpg'),(7,2,77,'2 Piece',69.99,'Ted Baker',2,'Yellow','L','./images/LOGO.jpg'),(8,3,77,'3 Piece',89.99,'Ralph Lauren',3,'Purple','XS','./images/LOGO.jpg'),(9,1,77,'2 Piece',49.99,'Hugo Boss',1,'Black','M','./images/LOGO.jpg'),(10,2,77,'3 Piece',69.99,'Armani',2,'Blue','L','./images/LOGO.jpg'),(11,1,772,'2 Piece',79.99,'Calvin Klein',3,'Grey','S','./images/LOGO.jpg'),(12,2,77,'3 Piece',99.99,'Ted Baker',3,'Green','XL','./images/LOGO.jpg'),(13,3,77,'2 Piece',59.99,'Ralph Lauren',2,'Red','XS','./images/LOGO.jpg'),(14,1,77,'3 Piece',79.99,'Hugo Boss',1,'White','M','./images/LOGO.jpg'),(15,2,77,'2 Piece',89.99,'Armani',2,'Black','S','./images/LOGO.jpg'),(16,1,772,'3 Piece',109.99,'Calvin Klein',3,'Blue','L','./images/LOGO.jpg'),(17,2,77,'2 Piece',69.99,'Ted Baker',1,'Grey','XL','./images/LOGO.jpg'),(18,3,77,'3 Piece',119.99,'Ralph Lauren',1,'Green','XS','./images/LOGO.jpg'),(19,1,77,'2 Piece',59.99,'Hugo Boss',1,'Red','M','./images/LOGO.jpg'),(20,2,77,'3 Piece',79.99,'Armani',2,'White','L','./images/LOGO.jpg'),(21,1,772,'2 Piece',99.99,'Calvin Klein',3,'Black','S','./images/LOGO.jpg'),(22,2,77,'3 Piece',129.99,'Ted Baker',2,'Blue','XL','./images/LOGO.jpg'),(23,3,77,'2 Piece',79.99,'Ralph Lauren',3,'Grey','XS','./images/LOGO.jpg'),(24,1,77,'3 Piece',99.99,'Hugo Boss',1,'Green','M','./images/LOGO.jpg'),(25,2,77,'2 Piece',109.99,'Armani',2,'Red','S','./images/LOGO.jpg'),(26,1,772,'3 Piece',139.99,'Calvin Klein',3,'White','L','./images/LOGO.jpg'),(27,2,77,'2 Piece',79.99,'Ted Baker',2,'Black','XL','./images/LOGO.jpg'),(28,3,77,'3 Piece',149.99,'Ralph Lauren',1,'Blue','XS','./images/LOGO.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `supplierID` int NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'monster.inc'),(2,'gorilla.inc'),(3,'fuckknows.inc');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John','Doe','john_doe','john@example.com','password123','123 Main St, City','123-456-7890'),(2,'Jane','Smith','jane_smith','jane@example.com','pass123','456 Elm St, Town','987-654-3210'),(3,'Kelly','Jay','jj_s','j@example.com','pas123','456 El]m St, Town','987-456654-3210'),(4,'John','Doe','johndoe','john@example.com','$2y$10$RL0BCo3T.A8o1YhNF/7WhuImquQoPlh4kSbANydobO9aORGplBhwy','123 Main St','123-456-7890'),(5,'John','Doe','johndoe','john@example.com','$2y$10$hjppGRZSGQUXSqEYUJaSlewnnaUZNFF6hhLuVHLLQBcy8LOHsC.C6','123 Main St','123-456-7890');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-28 21:03:05
