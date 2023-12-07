-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: aureus
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` longtext,
  `address` longtext,
  `country` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (6,'ryleibanez@gmail.com','234 Blk 23 Montalban Rizal','Philippines','2023-11-09 19:38:35','2023-12-04 01:22:12',NULL),(8,'kyle@gmail.com','asdasd','Philippines','2023-12-03 18:01:16','2023-12-03 18:01:30',NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` longtext,
  `product_id` int DEFAULT NULL,
  `pdname` longtext,
  `pdImage` longtext,
  `quantity` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `individual` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (88,'ryleibanez@gmail.com',74,'Prada Infusion de Cèdre Eau de Parfum','uploads/1701618334_29.png',1,5995,5995,'false','2023-12-05 18:39:13','2023-12-05 18:39:13'),(89,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',1,5580,5580,'false','2023-12-05 18:40:16','2023-12-05 18:40:16');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2023_10_26_004836_create_sessions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` longtext,
  `message` longtext,
  `status` varchar(45) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'ryleibanez@gmail.com','hello','true','2023-12-03 02:42:22',NULL),(2,'ryleibanez@gmail.com','hello2','true','2023-12-03 02:42:23',NULL),(3,'ryleibanez@gmail.com','An item has been removed from your cart due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 02:48:26','2023-12-03 02:48:26'),(4,'ryleibanez@gmail.com','An item has been removed from your cart due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 02:48:44','2023-12-03 02:48:43'),(5,'ryleibanez@gmail.com','An item has been removed from your cart due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 02:48:51','2023-12-03 02:48:51'),(6,'ryleibanez@gmail.com','An item has been removed from your cart due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 02:48:53','2023-12-03 02:48:52'),(7,'ryleibanez@gmail.com','An item has been removed from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 03:09:58','2023-12-03 03:09:57'),(8,'ryleibanez@gmail.com','An item has been removed from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 03:11:44','2023-12-03 03:11:43'),(9,'ryleibanez@gmail.com','An item has been modified from your cart due to insufficient stock availability.','true','2023-12-03 03:15:24','2023-12-03 03:15:23'),(10,'ryleibanez@gmail.com','Order# 10399 has been cancelled!','true','2023-12-03 03:28:10','2023-12-03 03:28:08'),(11,'ryleibanez@gmail.com','Order# 36942 has been cancelled!','true','2023-12-03 03:28:59','2023-12-03 03:28:58'),(12,'ryleibanez@gmail.com','Order# 7586\\nDelivery Fee: 100','true','2023-12-03 03:38:07','2023-12-03 03:38:06'),(13,'ryleibanez@gmail.com','Order# 7586 estimated delivery date: 2023-12-04','true','2023-12-03 03:38:27','2023-12-03 03:38:26'),(14,'admin@gmail.com','Ryle Ibañez has cancelled order# 20991','true','2023-12-03 06:10:51','2023-12-03 06:10:50'),(15,'ryleibanez@gmail.com','An item has been modified from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 06:11:17','2023-12-03 06:11:16'),(16,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 06:11:35','2023-12-03 06:11:33'),(17,'ryleibanez@gmail.com','Order# 7586 has been shipped!','true','2023-12-03 06:11:54','2023-12-03 06:11:53'),(18,'ryleibanez@gmail.com','Order# 8931 has been cancelled!','true','2023-12-03 06:12:37','2023-12-03 06:12:37'),(19,'ryleibanez@gmail.com','An item has been modified from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 06:13:17','2023-12-03 06:13:16'),(20,'ryleibanez@gmail.com','An item has been modified from your request due to insufficient stock availability. We apologize for any inconvenience this may cause and appreciate your understanding.','true','2023-12-03 06:13:43','2023-12-03 06:13:41'),(21,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 06:15:48','2023-12-03 06:15:47'),(22,'ryleibanez@gmail.com','Order# 10665 has been cancelled!','true','2023-12-03 06:20:25','2023-12-03 06:20:19'),(23,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 06:20:45','2023-12-03 06:20:44'),(24,'ryleibanez@gmail.com','Order# 42220\\nDelivery Fee: 44','true','2023-12-03 06:20:59','2023-12-03 06:20:58'),(25,'ryleibanez@gmail.com','Order# 42220 estimated delivery date: 2023-12-04','true','2023-12-03 06:24:25','2023-12-03 06:24:24'),(26,'ryleibanez@gmail.com','Order# 17040 has been shipped!','true','2023-12-03 06:29:16','2023-12-03 06:29:15'),(27,'ryleibanez@gmail.com','Order# 17040 has been succesfully delivered!','true','2023-12-03 06:29:32','2023-12-03 06:29:31'),(28,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 06:31:22','2023-12-03 06:31:18'),(29,'ryleibanez@gmail.com','Order# 7221\\nDelivery Fee: 0','true','2023-12-03 06:31:44','2023-12-03 06:31:43'),(30,'ryleibanez@gmail.com','Order# 42220 has been shipped!','true','2023-12-03 06:31:57','2023-12-03 06:31:57'),(31,'ryleibanez@gmail.com','Order# 42220 has been succesfully delivered!','true','2023-12-03 06:32:56','2023-12-03 06:32:56'),(32,'ryleibanez@gmail.com','Order# 7221 estimated delivery date: 2023-12-05','true','2023-12-03 06:37:07','2023-12-03 06:37:05'),(33,'ryleibanez@gmail.com','Order# 7221 has been shipped!','true','2023-12-03 06:48:45','2023-12-03 06:38:37'),(34,'ryleibanez@gmail.com','Order# 7221 has been succesfully delivered!','true','2023-12-03 06:53:42','2023-12-03 06:41:00'),(35,'ryleibanez@gmail.com','Order# 21060\\nDelivery Fee: 0','true','2023-12-03 06:54:08','2023-12-03 06:54:07'),(36,'ryleibanez@gmail.com','Order# 21060 estimated delivery date: 2023-12-04','true','2023-12-03 06:55:25','2023-12-03 06:55:25'),(37,'ryleibanez@gmail.com','Order# 21060 has been shipped!','true','2023-12-03 06:55:49','2023-12-03 06:55:49'),(38,'ryleibanez@gmail.com','Order# 21060 has been succesfully delivered!','true','2023-12-03 06:55:58','2023-12-03 06:55:58'),(39,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 06:57:02','2023-12-03 06:57:02'),(40,'ryleibanez@gmail.com','Order# 30964 has been cancelled!','true','2023-12-03 06:57:15','2023-12-03 06:57:15'),(41,'ryleibanez@gmail.com','Order# 7586 has been succesfully delivered!','true','2023-12-03 06:58:31','2023-12-03 06:58:31'),(42,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 07:48:38','2023-12-03 07:47:35'),(43,'ryleibanez@gmail.com','Order# 30555<br>Delivery Fee: 100','true','2023-12-03 07:48:45','2023-12-03 07:48:45'),(44,'ryleibanez@gmail.com','Order# 30555 estimated delivery date: 2023-12-05','true','2023-12-03 07:49:41','2023-12-03 07:49:40'),(45,'ryleibanez@gmail.com','Order# 30555 has been shipped!','true','2023-12-03 07:50:30','2023-12-03 07:50:29'),(46,'ryleibanez@gmail.com','Order# 30555 has been shipped!','true','2023-12-03 07:50:32','2023-12-03 07:50:29'),(47,'ryleibanez@gmail.com','Order# 30555 has been shipped!','true','2023-12-03 07:50:36','2023-12-03 07:50:29'),(48,'ryleibanez@gmail.com','Order# 30555 has been succesfully delivered!','true','2023-12-03 07:51:51','2023-12-03 07:51:50'),(49,'ryleibanez@gmail.com','Order# 30555 has been succesfully delivered!','true','2023-12-03 07:51:52','2023-12-03 07:51:50'),(50,'ryleibanez@gmail.com','Order# 30555 has been succesfully delivered!','true','2023-12-03 07:51:56','2023-12-03 07:51:50'),(51,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 07:53:05','2023-12-03 07:53:04'),(52,'ryleibanez@gmail.com','Order# 17137 has been cancelled!','true','2023-12-03 07:54:40','2023-12-03 07:54:38'),(53,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 07:55:18','2023-12-03 07:55:17'),(54,'ryleibanez@gmail.com','Order# 49195 has been cancelled!','true','2023-12-03 07:55:32','2023-12-03 07:55:31'),(55,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 07:56:06','2023-12-03 07:56:06'),(56,'ryleibanez@gmail.com','Order# 29647<br>Delivery Fee: 100','true','2023-12-03 07:56:14','2023-12-03 07:56:12'),(57,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 07:57:39','2023-12-03 07:57:37'),(58,'ryleibanez@gmail.com','Order# 47509<br>Delivery Fee: 100','true','2023-12-03 07:57:46','2023-12-03 07:57:45'),(59,'ryleibanez@gmail.com','Order# 47509<br>Delivery Fee: 100','true','2023-12-03 07:57:48','2023-12-03 07:57:46'),(60,'ryleibanez@gmail.com','Order# 47509 estimated delivery date: 2023-12-05','true','2023-12-03 07:58:49','2023-12-03 07:58:49'),(61,'ryleibanez@gmail.com','Order# 47509 has been shipped!','true','2023-12-03 07:59:03','2023-12-03 07:59:02'),(62,'ryleibanez@gmail.com','Order# 47509 has been shipped!','true','2023-12-03 07:59:04','2023-12-03 07:59:03'),(63,'ryleibanez@gmail.com','Order# 47509 has been succesfully delivered!','true','2023-12-03 07:59:40','2023-12-03 07:59:40'),(64,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 08:00:17','2023-12-03 08:00:16'),(65,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-03 08:00:45','2023-12-03 08:00:45'),(66,'ryleibanez@gmail.com','Order# 46310<br>Delivery Fee: 100','true','2023-12-03 08:01:01','2023-12-03 08:01:00'),(67,'ryleibanez@gmail.com','Order# 46310 estimated delivery date: 2023-12-05','true','2023-12-03 08:01:41','2023-12-03 08:01:40'),(68,'ryleibanez@gmail.com','Order# 46310 has been shipped!','true','2023-12-03 08:01:48','2023-12-03 08:01:47'),(69,'ryleibanez@gmail.com','Order# 46310 has been succesfully delivered!','true','2023-12-03 08:01:54','2023-12-03 08:01:53'),(70,'admin@gmail.com','Ryle Ibañez has cancelled order# 49742','true','2023-12-03 19:10:12','2023-12-03 08:02:00'),(71,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-04 22:46:56','2023-12-04 06:35:11'),(72,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-04 22:46:57','2023-12-04 07:28:17'),(73,'ryleibanez@gmail.com','Order# 38688<br>Delivery Fee: 100','true','2023-12-04 22:48:04','2023-12-04 22:47:30'),(74,'ryleibanez@gmail.com','Order# 38688 estimated delivery date: 2023-12-06','true','2023-12-05 02:59:29','2023-12-04 22:57:12'),(75,'ryleibanez@gmail.com','Order# 38688 has been shipped!','true','2023-12-05 02:59:30','2023-12-04 22:57:15'),(76,'ryleibanez@gmail.com','Order# 38688 has been succesfully delivered!','true','2023-12-05 02:59:32','2023-12-04 22:57:17'),(77,'admin@gmail.com','Ryle Ibañez has placed an order!','true','2023-12-05 05:42:05','2023-12-05 03:04:43'),(78,'kyler@gmail.com','Hi Sephiroth! Welcome to Aureus.','true','2023-12-05 04:46:19','2023-12-05 04:46:16'),(79,'ryleibanez@gmail.com','Order# 30335<br>Delivery Fee: 100','true','2023-12-05 18:59:28','2023-12-05 18:59:12'),(80,'ryleibanez@gmail.com','Order# 30335 estimated delivery date: 2023-12-07','true','2023-12-05 18:59:43','2023-12-05 18:59:42'),(81,'ryleibanez@gmail.com','Order# 30335 has been shipped!','true','2023-12-05 18:59:53','2023-12-05 18:59:51'),(82,'ryleibanez@gmail.com','Order# 30335 has been succesfully delivered!','true','2023-12-05 19:00:14','2023-12-05 19:00:13'),(83,'ryleibanez@gmail.com','Order# 17395<br>Delivery Fee: 100','true','2023-12-05 19:02:12','2023-12-05 19:02:11');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transactionid` bigint DEFAULT NULL,
  `email` longtext,
  `product_id` int DEFAULT NULL,
  `pdname` longtext,
  `pdimage` longtext,
  `quantity` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  `totalprice` double DEFAULT NULL,
  `orderstatus` longtext,
  `address` longtext,
  `country` longtext,
  `modeofpayment` longtext,
  `deliverydate` longtext,
  `deliveryfee` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (137,47509,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',1,5580,17780,'Delivered','234 Blk 23 Montalban Rizal','Philippines','Cash on Delivery','2023-12-05','100','2023-12-03 07:57:37','2023-12-03 07:59:40'),(138,47509,'ryleibanez@gmail.com',61,'Miss Dior Eau de Parfum','uploads/1701617483_4.png',1,12100,17780,'Delivered','234 Blk 23 Montalban Rizal','Philippines','Cash on Delivery','2023-12-05','100','2023-12-03 07:57:37','2023-12-03 07:59:40'),(139,49742,'ryleibanez@gmail.com',62,'Gris Dior Eau de Parfum','uploads/1701617359_6.png',1,9000,9000,'Cancelled','234 Blk 23 Montalban Rizal','Philippines','Cash on Delivery','',NULL,'2023-12-03 08:00:16','2023-12-03 08:02:00'),(140,46310,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',2,11160,229060,'Delivered','234 Blk 23 Montalban Rizal','Philippines','Cash on Delivery','2023-12-05','100','2023-12-03 08:00:45','2023-12-03 08:01:53'),(141,46310,'ryleibanez@gmail.com',61,'Miss Dior Eau de Parfum','uploads/1701617483_4.png',18,217800,229060,'Delivered','234 Blk 23 Montalban Rizal','Philippines','Cash on Delivery','2023-12-05','100','2023-12-03 08:00:45','2023-12-03 08:01:53'),(143,17395,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',2,11160,11260,'Processing','Blk 9 Lot 51 Montalban Heights San Jose Rodriguez Rizal212','Philippines','Cash on Delivery','','100','2023-12-04 06:35:11','2023-12-05 19:02:11'),(144,38688,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',1,5580,17780,'Delivered','Blk 9 Lot 51 Montalban Heights San Jose Rodriguez Rizal212','Philippines','Cash on Delivery','2023-12-06','100','2023-12-04 07:28:17','2023-12-04 22:57:17'),(145,38688,'ryleibanez@gmail.com',61,'Miss Dior Eau de Parfum','uploads/1701617483_4.png',1,12100,17780,'Delivered','Blk 9 Lot 51 Montalban Heights San Jose Rodriguez Rizal212','Philippines','Cash on Delivery','2023-12-06','100','2023-12-04 07:28:17','2023-12-04 22:57:17'),(147,30335,'ryleibanez@gmail.com',60,'Dior Sauvage Eau de','uploads/1701617281_1.png',1,5580,5680,'Delivered','Blk 9 Lot 51 Montalban Heights San Jose Rodriguez Rizal212','Philippines','Cash on Delivery','2023-12-07','100','2023-12-05 03:04:43','2023-12-05 19:00:13');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preview`
--

DROP TABLE IF EXISTS `preview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preview` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pdid` int DEFAULT NULL,
  `image` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preview`
--

LOCK TABLES `preview` WRITE;
/*!40000 ALTER TABLE `preview` DISABLE KEYS */;
/*!40000 ALTER TABLE `preview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pdname` longtext,
  `category` longtext,
  `price` longtext,
  `mainImage` longtext,
  `image` longtext,
  `stocks` int DEFAULT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (60,'Dior Sauvage Eau de','Men','5580','[\"uploads\\/1701617281_1.png\",\"uploads\\/1701617281_2.png\"]','uploads/1701617281_1.png',12,'<p><strong>Dior Sauvage</strong> is a captivating men\'s fragrance that embodies the spirit of the wild and the modern. With its alluring blend of fresh bergamot, spicy Sichuan pepper, and warm woody notes, this fragrance exudes a sense of rugged elegance and undeniable confidence, making it a perfect choice for the contemporary man seeking a bold and distinctive scent.</p>','2023-12-03 07:03:42','2023-12-05 18:34:51'),(61,'Miss Dior Eau de Parfum','Women','12100','[\"uploads\\/1701617483_4.png\",\"uploads\\/1701617483_3.png\"]','uploads/1701617483_4.png',19,'<p>The new <strong>Miss Dior Eau de Parfum</strong> is a colorful floral bouquet, like a&nbsp;<strong>millefiori</strong> alive with notes of Grasse rose, peony, iris, and lily of the valley.</p><br />\r\n<p>The Miss Dior couture bow, an extraordinary piece of craftsmanship, is embroidered with a myriad of colorful specks to reflect the flowers&rsquo; vividness. Each bow is curated with <strong>346 threads, handcrafted and tied.</strong> Along with its extraordinary new bow, the bottle boasts an elegant label and an eco-conscious design. The bottle is designed and produced with 30 percent less glass than its predecessor.</p>','2023-12-03 07:08:39','2023-12-04 07:28:17'),(62,'Gris Dior Eau de Parfum','Unisex','9000','[\"uploads\\/1701617359_6.png\",\"uploads\\/1701617359_5.png\"]','uploads/1701617359_6.png',20,'Coming in a simple white tube with the Christian Dior logo imprinted on the top, you open the fragrance and see a fragrance bottle containing a light purplish-gray liquid. GRIS DIOR is on a white label with Christian Dior Paris underneath. The oakmoss, patchouli, and sandalwood balance out the rose aroma and citrusy smell from the bergamot, creating a classic chypre fragrance that plays upon the dichotomy of cool and warm notes. The fragrance is long-lasting. It also comes as a hair perfume.','2023-12-03 07:18:40','2023-12-03 08:02:00'),(63,'Versace Eros Eau de','Men','5900','[\"uploads\\/1701617786_8.png\",\"uploads\\/1701617786_7.png\"]','uploads/1701617786_8.png',20,'Versace Eros is an enticing fragrance that embodies passion and power. With its vibrant blend of fresh mint, juicy green apple, and captivating tonka bean, Eros evokes a sense of seduction and sensuality. This aromatic journey is intensified by notes of vanilla and cedarwood, creating a modern and irresistible scent for the confident man who exudes charisma and charm.','2023-12-03 07:36:26','2023-12-03 07:36:26'),(64,'Versace Bright Crystal','Women','4395','[\"uploads\\/1701617843_10.png\",\"uploads\\/1701617843_9.png\"]','uploads/1701617843_10.png',20,'Versace Bright Crystal is a luxurious and feminine fragrance that was first launched in 2006. It is a floral and fruity scent that is perfect for women who want to feel elegant and confident. The top notes of this perfume are pomegranate, yuzu, and iced accord. These refreshing notes give the perfume a bright and sparkling opening that immediately grabs attention. The heart notes of Versace Bright Crystal are peony, magnolia, and lotus flower. These delicate floral scents give the perfume a soft and romantic quality that is perfect for special occasions. The base notes of the fragrance are amber, musk, and mahogany. These warm and sensual scents provide depth and longevity to the perfume, making it last for hours on the skin.','2023-12-03 07:37:23','2023-12-03 07:37:23'),(65,'Versace Cédrat de Diamante Eau de Parfum','Unisex','24059','[\"uploads\\/1701617950_11.png\",\"uploads\\/1701617950_12.png\"]','uploads/1701617950_11.png',20,'Released in 2019 as part of an exclusive collection of fragrances from versace, cedrat de diamante conjures up the essence of fresh citrus and bright and breezy days filled with sunshine. Each scent in this perfume collection revolves around a central theme, and this particular women’s fragrance is inspired by the sun-kissed mediterranean and italian citrus. Scent notes of zesty italian lemon, invigorating pink grapefruit, woodsy cedar and rich and smoky vetiver come together to form the aroma of this intoxicating perfume.','2023-12-03 07:39:10','2023-12-03 07:39:10'),(66,'Dolce & Gabbana The One Eau de Toilette','Men','5387','[\"uploads\\/1701618019_13.png\",\"uploads\\/1701618019_14.png\"]','uploads/1701618019_13.png',20,'Elegant and sensual, classic but animated by a contemporary edge: Dolce & Gabbana The One For Men expresses bold masculinity through magnetic and sophisticated accords of basil, lavender, and sandalwood.','2023-12-03 07:40:19','2023-12-03 07:40:19'),(67,'Dolce & Gabbana Light Blue Summer Vibes Eau de Toilette','Women','6183','[\"uploads\\/1701618057_15.png\",\"uploads\\/1701618057_16.png\"]','uploads/1701618057_15.png',20,'The Italian holiday dream. The energy of summer by the sea. Dolce&Gabbana Light Blue Summer Vibes is a limited edition that reinvents two iconic fragrances and wrapping them in the distinctive majolica print.','2023-12-03 07:40:57','2023-12-03 07:40:57'),(68,'Dolce & Gabbana Dolce Lily Eau de Toilette','Women','7619','[\"uploads\\/1701618115_17.png\",\"uploads\\/1701618115_18.png\"]','uploads/1701618115_17.png',20,'Dolce Lily celebrates the charming pink lily flower, a symbol of femininity and kindness. The fragrance is a bright fruity floral, combining the delicate floral signature of pink lily accord with exotic passion fruit and a background of soft, sensual musks.','2023-12-03 07:41:55','2023-12-03 07:41:55'),(69,'Chanel Bleu De Chanel Eau de Parfum','Men','9499.83','[\"uploads\\/1701618146_19.png\",\"uploads\\/1701618146_20.png\"]','uploads/1701618146_19.png',20,'BLEU DE CHANEL asserts an accomplished character through a timeless and unexpected scent. The woody-aromatic fragrance unfurls into a captivating trail, embodying independence with strength and elegance, just like the man who wears it. The scent is available in a full collection of shaving and body essentials.','2023-12-03 07:42:26','2023-12-03 07:42:26'),(70,'Chanel Coco Mademoiselle Eau de Parfum','Women','9274.98','[\"uploads\\/1701618190_21.png\",\"uploads\\/1701618190_22.png\"]','uploads/1701618190_21.png',20,'Irresistibly sensual, irrepressibly spirited. A sparkling, bold ambery fragrance that recalls a daring young Coco Chanel. An absolutely modern composition with a strong yet surprisingly fresh character. Vibrant orange immediately awakens the senses. A clear and sensual heart reveals a transparent accord of jasmine and May rose. The scent finally unfurls with refined accents of patchouli and vetiver.','2023-12-03 07:43:10','2023-12-03 07:43:10'),(71,'Chanel Paris - Deauville Eau de Toilette','Unisex','8150.74','[\"uploads\\/1701618237_23.png\",\"uploads\\/1701618237_24.png\"]','uploads/1701618237_23.png',20,'Paris – Deauville by Chanel is a Chypre fragrance for women and men. Paris – Deauville was launched in 2018. The nose behind this fragrance is Olivier Polge. Top notes are Basil, Lime, Sicilian Orange, Bergamot, Petitgrain and Lemon; middle notes are Green Notes, Hedione, Jasmine and Rose; base note is Patchouli.','2023-12-03 07:43:57','2023-12-03 07:55:31'),(72,'Prada Rossa Black Eau de Parfum','Men','8200','[\"uploads\\/1701618278_25.png\",\"uploads\\/1701618278_26.png\"]','uploads/1701618278_25.png',19,'Luna Rossa Black by Prada is a Amber Woody fragrance for men. Luna Rossa Black was launched in 2018. The nose behind this fragrance is Daniela (Roche) Andrier. Top note is Bergamot; middle notes are Angelica and Patchouli; base notes are Coumarin, Amber and Musk.','2023-12-03 07:44:38','2023-12-03 07:47:35'),(73,'Prada Candy Eau de Parfum','Women','5995','[\"uploads\\/1701618306_27.png\",\"uploads\\/1701618306_28.png\"]','uploads/1701618306_27.png',19,'<p><strong>Prada Candy EDP</strong> is impossible to ignore.</p><br />\r\n<hr><br />\r\n<p>Explosive, excessive and sensual, this fragrance is an explosion of shocking pink and gold, combining, in excessive proportions, White Musks, noble Benzoin and a touch of Caramel, that accord to give the fragrance a truly unique signature.</p>','2023-12-03 07:45:06','2023-12-03 19:51:28'),(74,'Prada Infusion de Cèdre Eau de Parfum','Men','5995','[\"uploads\\/1701618334_29.png\",\"uploads\\/1701618334_30.png\"]','uploads/1701618334_29.png',19,'<p style=\"text-align: left;\"><strong>Infusion de C&egrave;dre Eau de Parfum</strong> encapsulates the magnetic personality of the cedarwood in a woody citrus fragrance.The magnetic cedarwood is immersed in a signature solution of musks and citrus that recreates the enveloping scent of skin, allowing the personality of the ingredient to fuse with you. <br><br><em>Les Infusions</em> are second-skin fragrances that suit you right away and instantly make you feel like you. The luxurious bottle of Infusion de C&egrave;dre is highlighted in a grey-tinted hue, evoking the fusion of the signature ingredient in the fragrance. The refined grey cap in iconic Saffiano symbolizes the cedarwood and the magnetism of the fragrance.</p>','2023-12-03 07:45:34','2023-12-05 18:58:45');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('iqniWPaQoyrTeEwRV0bk4oxvNntR2kvTrbOpOrIi',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36 Edg/118.0.2088.61','YTozOntzOjY6Il90b2tlbiI7czo0MDoieDNnSUczbEVSWUdIM29rYVhOWnU5R0hzbVNCRjRyRk1CeW9KZ3ByViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaWduaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1698306747),('O7osKJ0vDvwgBCplEengCJE6epZHrSH5qXg0p4AF',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoic2E0cGNSOUJtQXozQUlxVG1jcTVscXEwMWNnR2N3OENnQjVLWm1YbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaWduaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1699425173);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` longtext COLLATE utf8mb4_unicode_ci,
  `lname` longtext COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenumber` bigint DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secQuestion` longtext COLLATE utf8mb4_unicode_ci,
  `secAnswer` longtext COLLATE utf8mb4_unicode_ci,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profilepic` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ryle','Ibañez','ryleibanez@gmail.com','$2y$10$0xqTAGytT95P8KU4IVhx0uWnMM5JVnZKTi8uwltdmqzH5v4Iyf8NG','Male',9998566102,'Blk 9 Lot 51 Montalban Heights San Jose Rodriguez Rizal212','Philippines','apple','$2y$10$ubu6qf.5Rn4IoC8snjTa/u/wz1IRXwqAfgffeqStn1wC3n8UHoedm',NULL,'user','2023-10-26 05:38:22','2023-12-04 01:22:12','uploads/1701537029_IMG_20231201_232922-removebg-preview.png'),(2,'Admin','*','admin@gmail.com','$2y$10$T2fOJW.V59NzpiNUhMsL0O0RZ3pNrImKfk5f1d/fHKW.0M8iRKQgm','Male',9998566102,'Sample Address','Philippines','apple','$2y$10$ybrtkV7yImmdjNIIrowiSezcLn1JZ0U0khDejuyGKDaEh.DoIlL.u',NULL,'Admin','2023-10-28 06:55:41','2023-10-28 06:55:41',NULL),(3,'Tyler','Ibanez','tyleribanez@gmail.com','$2y$10$tfExkk5aj4AOpbdgedl42.v4mKVdfRWFcfacveq59kaAlAU1OK/5W','Male',9998887777,'Sample Address','Philippines','banana','$2y$10$1ZkXCLeH3EG.N6T8fIZbrOpeiZT1.xNvEY3q6xTrups2ca2rXKt.2',NULL,'user','2023-11-22 01:01:06','2023-11-22 01:01:06',NULL),(4,'Sephiroth','Kyle','tyler@gmail.com','$2y$10$QfYR0lEOC3dZZ4OAXPxN2u3VOyP1Hnyks1kwhSorXbn330xNxn8Ae','Male',9294535188,'Sample Address','Philippines','apple','$2y$10$BwdXx4qHCcJcQMwtmshcqO55h9LeIyCcl0/liS/jXxDVeood8i.J2',NULL,'user','2023-11-28 18:42:20','2023-11-28 19:32:04','uploads/1701228724_50cefa56-3227-4747-86e0-0ac5f83b16c5.jpeg'),(5,'Sephiroth','Kyle','tyler1@gmail.com','$2y$10$KbXFx63wU4B6nTGcJujWdOi.PWe0DauMWnAhnezqOYnoy/Yh1lZXu','Male',9294535188,'Asdasddass','Philippines','apple','$2y$10$sFV7PS2DxTAR4Do3VKv2GeFIEXOtUMfPUqK88Qj5k1hADHUM4loUG',NULL,'user','2023-12-02 04:27:11','2023-12-02 05:16:24','uploads/1701522984_370198934_388970066811862_9132060109758868920_n.jpg'),(6,'Kyle','Kevlar','kyle@gmail.com','$2y$10$zc7oH.ooSx31lWM8DgDI9eznA3aInJNHrBgHSdJm8S9LBwH6HG3fm','Male',9998566102,'234 Blk 23 Montalban Rizal','Philippines','What is your first car?','$2y$10$SA7cACoTBElR6L2Uo/3JDON7jDoa38M6NQJI57fJC6mdx.oFPtcL6',NULL,'user','2023-12-03 17:55:47','2023-12-03 18:01:30','uploads/1701654947_AMD-Symbol.png'),(7,'Sephiroth','Kyle','kyler@gmail.com','$2y$10$Mec4bsK4wcb55FaDyzTPsupiiEAC3Kj4nlAB3hgHFnF6UxwMXb1sO','Male',9294535188,'dsada','Philippines','Who is your favorite Professor?','$2y$10$LfOt6NfRlhqnu7mcqHCnHe17vSrVVUHrVQA3OBwoCwDtk.5NoP97G','','user','2023-12-05 04:46:16','2023-12-05 04:46:16','uploads/1701780375_Ibanez.png');
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

-- Dump completed on 2023-12-06 11:16:46
