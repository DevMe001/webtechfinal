-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: slu
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `surName` varchar(20) NOT NULL,
  `role` char(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (30,'mikka','$2y$10$TKL9cd149LUlD3LmIRptW.8Ym/6I3jnPG02c2k6h8wCLOLOrmXaKq','Micaella','Santiago','c'),(32,'jc','$2y$10$TKL9cd149LUlD3LmIRptW.8Ym/6I3jnPG02c2k6h8wCLOLOrmXaKq','John Christopher','So','a');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `fileID` int(11) NOT NULL AUTO_INCREMENT,
  `fileTitle` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`fileID`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
INSERT INTO `multimedia` VALUES (94,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 02:16:15'),(98,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 02:27:48'),(104,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 03:02:50');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `queue`
--

DROP TABLE IF EXISTS `queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quename` varchar(100) NOT NULL,
  `quepath` varchar(100) NOT NULL,
  `uploadTime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `queue`
--

LOCK TABLES `queue` WRITE;
/*!40000 ALTER TABLE `queue` DISABLE KEYS */;
INSERT INTO `queue` VALUES (320,'I AM THE EARTH','../ContentCreator/uploads/I AM the earth.mp4','2024-01-20 10:13:13'),(321,'I AM THE EARTH','../ContentCreator/uploads/I AM the earth.mp4','2024-01-20 10:13:24'),(322,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:16:17'),(323,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:17:04'),(324,'I AM THE EARTH','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_I_AM_the_earth.mp4','2024-01-20 10:17:13'),(325,'I AM THE EARTH','../ContentCreator/uploads/recorded_I_AM_the_earth.mp4','2024-01-20 10:17:42'),(326,'I AM THE EARTH','../ContentCreator/uploads/recorded_I_AM_the_earth.mp4','2024-01-20 10:18:45'),(327,'I AM THE EARTH','../ContentCreator/uploads/recorded_I_AM_the_earth.mp4','2024-01-20 10:19:02'),(328,'I AM THE EARTH','../ContentCreator/uploads/recorded_I_AM_the_earth.mp4','2024-01-20 10:19:18'),(329,'I AM THE EARTH','../ContentCreator/uploads/recorded_IAMtheearth.mp4','2024-01-20 10:19:32'),(330,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:19:53'),(331,'I AM THE EARTH','../ContentCreator/uploads/recorded_IAMtheearth.mp4','2024-01-20 10:20:09'),(332,'I AM THE EARTH','../ContentCreator/uploads/recorded_IAMtheearth.mp4','2024-01-20 10:20:38'),(333,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 10:23:41'),(334,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:23:51'),(335,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 10:27:50'),(336,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:28:50'),(337,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 10:29:00'),(338,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 10:40:10'),(339,'clips','../ContentCreator/uploads/recorded20240120034906Geometric-mp4.mp4','2024-01-20 10:49:07'),(340,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 10:49:18'),(341,'clips','../ContentCreator/uploads/recorded20240120034906Geometric-mp4.mp4','2024-01-20 10:52:45'),(342,'clips','../ContentCreator/uploads/recorded20240120035302Geometric-mp4.mp4','2024-01-20 10:54:07'),(343,'clips','../ContentCreator/uploads/recorded20240120035419Geometric-mp4.mp4','2024-01-20 10:54:21'),(344,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 10:54:32'),(345,'clips','../ContentCreator/uploads/recorded20240120035419Geometric-mp4.mp4','2024-01-20 10:58:35'),(346,'clips','../ContentCreator/uploads/recorded20240120035855Geometric-mp4.mp4','2024-01-20 10:58:57'),(347,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 10:59:07'),(348,'clips','../ContentCreator/uploads/recorded20240120035855Geometric-mp4.mp4','2024-01-20 10:59:14'),(349,'clips','../ContentCreator/uploads/recorded20240120035855Geometric-mp4.mp4','2024-01-20 11:01:58'),(350,'new clip','../ContentCreator/uploads/recorded20240120040214Geometric-mp4.mp4','2024-01-20 11:02:15'),(351,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 11:02:26'),(352,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 11:02:36'),(353,'new clip','../ContentCreator/uploads/recorded20240120040214Geometric-mp4.mp4','2024-01-20 11:02:42'),(354,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 11:02:52'),(355,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 11:03:02'),(356,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 11:03:13'),(357,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 11:04:13'),(358,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:05:54'),(359,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:17:55'),(360,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:17:59'),(361,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:20:50'),(362,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:21:21'),(363,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:24:27'),(364,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:24:54'),(365,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:27:36'),(366,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 11:28:19'),(367,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:33:33'),(368,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:33:54'),(369,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:34:02'),(370,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:35:25'),(371,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:35:57'),(372,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 12:36:08'),(373,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:36:14'),(374,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 12:36:31'),(375,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:31:17'),(376,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 13:31:34'),(377,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:31:45'),(378,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:31:51'),(379,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:32:03'),(380,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 13:32:35'),(381,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:32:46'),(382,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 13:33:09'),(383,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:33:16'),(384,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:33:27'),(385,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:34:31'),(386,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 13:35:49'),(387,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:35:53'),(388,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:36:43'),(389,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:37:28'),(390,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:48:35'),(391,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:55:47'),(392,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 13:55:57'),(393,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 13:59:39'),(394,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 13:59:49'),(395,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 13:59:59'),(396,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:01:00'),(397,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:01:10'),(398,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 14:01:28'),(399,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:01:39'),(400,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:01:49'),(401,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:02:49'),(402,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:03:00'),(403,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 14:04:46'),(404,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:04:56'),(405,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:05:07'),(406,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:06:07'),(407,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:06:17'),(408,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 14:24:18'),(409,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:24:29'),(410,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:24:39'),(411,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:25:39'),(412,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 14:25:49'),(413,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 15:25:35'),(414,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:25:46'),(415,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:25:56'),(416,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:26:56'),(417,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:27:06'),(418,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 15:27:52'),(419,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:28:02'),(420,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:28:12'),(421,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:29:12'),(422,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:29:23'),(423,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 15:29:34'),(424,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:29:44'),(425,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:29:55'),(426,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:30:29'),(427,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 15:30:39'),(428,'countdown','../ContentCreator/uploads/recorded_Countdown.mp4','2024-01-20 15:31:00'),(429,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 15:31:17'),(430,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 15:33:04'),(431,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 22:12:19'),(432,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 22:12:28'),(433,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 22:13:21'),(434,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 22:13:31'),(435,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:14:32'),(436,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 22:16:37'),(437,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 22:16:47'),(438,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:17:48'),(439,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 22:33:04'),(440,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 22:36:23'),(441,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 22:37:34'),(442,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:38:34'),(443,'funny thing','../ContentCreator/uploads/recorded202401200327481minutefunnyvideos.mp4','2024-01-20 22:45:21'),(444,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:45:28'),(445,'funny thing','../ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:46:32'),(446,'new clip','../ContentCreator/uploads/recorded20240120040250Geometric-mp4.mp4','2024-01-20 22:46:40'),(447,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded202401200327481minutefunn','2024-01-20 22:46:50'),(448,'funny thing','http://localhost/webtechfinal/deployphp/php/ContentCreator/uploads/recorded_funny.mp4','2024-01-20 22:47:50');
/*!40000 ALTER TABLE `queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recent_logs`
--

DROP TABLE IF EXISTS `recent_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recent_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `event` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `log_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recent_logs`
--

LOCK TABLES `recent_logs` WRITE;
/*!40000 ALTER TABLE `recent_logs` DISABLE KEYS */;
INSERT INTO `recent_logs` VALUES (274,'stream','Mikka started  a stream',30,'2024-01-20 14:25:25'),(275,'stream','Mikka started  a stream',30,'2024-01-20 14:25:44'),(276,'stream','Mikka ended  a stream',30,'2024-01-20 14:25:51'),(277,'stream','Mikka started  a stream',30,'2024-01-20 14:27:22'),(278,'stream','Mikka ended  a stream',30,'2024-01-20 14:27:25'),(279,'stream','Mikka started  a stream',30,'2024-01-20 14:28:52'),(280,'stream','Mikka ended  a stream',30,'2024-01-20 14:28:54'),(281,'stream','Mikka ended  a stream',30,'2024-01-20 14:28:57'),(282,'stream','Mikka started  a stream',30,'2024-01-20 14:29:46'),(283,'stream','Mikka started  a stream',30,'2024-01-20 14:30:13'),(284,'stream','Mikka started  a stream',30,'2024-01-20 14:30:35'),(285,'stream','Mikka started  a stream',30,'2024-01-20 14:32:12'),(286,'watch',' Mikka watch recorded202401200327481minutefunnyvideos.mp4',30,'2024-01-20 14:33:04'),(287,'stream','Mikka started  a stream',30,'2024-01-20 14:36:10'),(288,'watch',' Mikka watch recorded202401200327481minutefunnyvideos.mp4',30,'2024-01-20 14:36:23'),(289,'watch',' Mikka watch recorded202401200327481minutefunnyvideos.mp4',30,'2024-01-20 14:37:34'),(290,'watch',' Mikka watch recorded_funny.mp4',30,'2024-01-20 14:38:34'),(291,'stream','Mikka started  a stream',30,'2024-01-20 14:38:44'),(292,'stream','Mikka started  a stream',30,'2024-01-20 14:39:07'),(293,'stream','Mikka started  a stream',30,'2024-01-20 14:39:19'),(294,'stream','Mikka started  a stream',30,'2024-01-20 14:39:48'),(295,'stream','Mikka started  a stream',30,'2024-01-20 14:41:38'),(296,'stream','Mikka ended  a stream',30,'2024-01-20 14:41:42'),(297,'stream','Mikka ended  a stream',30,'2024-01-20 14:42:57'),(298,'stream','Mikka started  a stream',30,'2024-01-20 14:43:25'),(299,'stream','Mikka ended  a stream',30,'2024-01-20 14:43:27'),(300,'stream','Mikka ended  a stream',30,'2024-01-20 14:43:30'),(301,'stream','Mikka started  a stream',30,'2024-01-20 14:43:58'),(302,'stream','Mikka ended  a stream',30,'2024-01-20 14:44:02'),(303,'watch',' Mikka watch recorded202401200327481minutefunnyvideos.mp4',30,'2024-01-20 14:45:21'),(304,'watch',' Mikka watch recorded_funny.mp4',30,'2024-01-20 14:45:28'),(305,'watch',' Mikka watch recorded_funny.mp4',30,'2024-01-20 14:46:32'),(306,'watch',' Mikka watch recorded20240120040250Geometric-mp4.mp4',30,'2024-01-20 14:46:40'),(307,'watch',' Mikka watch recorded202401200327481minutefunnyvideos.mp4',30,'2024-01-20 14:46:50'),(308,'watch',' Mikka watch recorded_funny.mp4',30,'2024-01-20 14:47:51');
/*!40000 ALTER TABLE `recent_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `recentplaylist`
--

DROP TABLE IF EXISTS `recentplaylist`;
/*!50001 DROP VIEW IF EXISTS `recentplaylist`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `recentplaylist` AS SELECT
 1 AS `fileID`,
  1 AS `fileTitle`,
  1 AS `filePath`,
  1 AS `uploadTime` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `recentqueue`
--

DROP TABLE IF EXISTS `recentqueue`;
/*!50001 DROP VIEW IF EXISTS `recentqueue`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `recentqueue` AS SELECT
 1 AS `id`,
  1 AS `quename`,
  1 AS `quepath`,
  1 AS `uploadTime` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `recorded`
--

DROP TABLE IF EXISTS `recorded`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recorded` (
  `recordID` int(11) NOT NULL AUTO_INCREMENT,
  `streamcode` int(11) NOT NULL,
  `recFile` varchar(260) NOT NULL,
  `dateOfStream` date NOT NULL,
  PRIMARY KEY (`recordID`),
  KEY `fkstreamcode` (`streamcode`),
  CONSTRAINT `fkstreamcode` FOREIGN KEY (`streamcode`) REFERENCES `logs` (`streamCode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recorded`
--

LOCK TABLES `recorded` WRITE;
/*!40000 ALTER TABLE `recorded` DISABLE KEYS */;
/*!40000 ALTER TABLE `recorded` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'slu'
--

--
-- Final view structure for view `recentplaylist`
--

/*!50001 DROP VIEW IF EXISTS `recentplaylist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `recentplaylist` AS select `multimedia`.`fileID` AS `fileID`,`multimedia`.`fileTitle` AS `fileTitle`,`multimedia`.`filePath` AS `filePath`,`multimedia`.`uploadTime` AS `uploadTime` from `multimedia` where `multimedia`.`uploadTime` >= curdate() and `multimedia`.`uploadTime` < curdate() + interval 1 day order by `multimedia`.`uploadTime` desc limit 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `recentqueue`
--

/*!50001 DROP VIEW IF EXISTS `recentqueue`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `recentqueue` AS select `queue`.`id` AS `id`,`queue`.`quename` AS `quename`,`queue`.`quepath` AS `quepath`,`queue`.`uploadTime` AS `uploadTime` from `queue` where cast(`queue`.`uploadTime` as date) >= curdate() and `queue`.`uploadTime` < curdate() + interval 1 day order by `queue`.`uploadTime` desc limit 1 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-20 23:47:28
