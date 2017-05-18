CREATE DATABASE  IF NOT EXISTS `technical_security` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `technical_security`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: technical_security
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doljnost`
--

DROP TABLE IF EXISTS `doljnost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doljnost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doljnost`
--

LOCK TABLES `doljnost` WRITE;
/*!40000 ALTER TABLE `doljnost` DISABLE KEYS */;
/*!40000 ALTER TABLE `doljnost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dop_info`
--

DROP TABLE IF EXISTS `dop_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dop_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `instruktaj_id` int(11) NOT NULL,
  `sotrudniki_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instruktaj_id` (`instruktaj_id`),
  KEY `sotrudniki_id` (`sotrudniki_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `dop_info_ibfk_1` FOREIGN KEY (`instruktaj_id`) REFERENCES `instruktaj` (`id`),
  CONSTRAINT `dop_info_ibfk_2` FOREIGN KEY (`sotrudniki_id`) REFERENCES `sotrudniki` (`id`),
  CONSTRAINT `dop_info_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Дополнительная информация об инструктаже';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dop_info`
--

LOCK TABLES `dop_info` WRITE;
/*!40000 ALTER TABLE `dop_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `dop_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instruktaj`
--

DROP TABLE IF EXISTS `instruktaj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instruktaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории инструктажей: вводный, первичный';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instruktaj`
--

LOCK TABLES `instruktaj` WRITE;
/*!40000 ALTER TABLE `instruktaj` DISABLE KEYS */;
/*!40000 ALTER TABLE `instruktaj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pervichnyi_inst`
--

DROP TABLE IF EXISTS `pervichnyi_inst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pervichnyi_inst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumblob,
  `instruktaj_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instruktaj_id` (`instruktaj_id`),
  CONSTRAINT `pervichnyi_inst_ibfk_1` FOREIGN KEY (`instruktaj_id`) REFERENCES `instruktaj` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Первичный инструктаж';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pervichnyi_inst`
--

LOCK TABLES `pervichnyi_inst` WRITE;
/*!40000 ALTER TABLE `pervichnyi_inst` DISABLE KEYS */;
/*!40000 ALTER TABLE `pervichnyi_inst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sotrudniki`
--

DROP TABLE IF EXISTS `sotrudniki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sotrudniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `otchestvo` varchar(40) NOT NULL,
  `doljnost_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doljnost_id` (`doljnost_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `sotrudniki_ibfk_1` FOREIGN KEY (`doljnost_id`) REFERENCES `doljnost` (`id`),
  CONSTRAINT `sotrudniki_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sotrudniki`
--

LOCK TABLES `sotrudniki` WRITE;
/*!40000 ALTER TABLE `sotrudniki` DISABLE KEYS */;
/*!40000 ALTER TABLE `sotrudniki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Статус: 0 = не пройден, 1 = пройден';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vvod_inst`
--

DROP TABLE IF EXISTS `vvod_inst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vvod_inst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriotion` mediumblob,
  `instruktaj_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instruktaj_id` (`instruktaj_id`),
  CONSTRAINT `vvod_inst_ibfk_1` FOREIGN KEY (`instruktaj_id`) REFERENCES `instruktaj` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vvod_inst`
--

LOCK TABLES `vvod_inst` WRITE;
/*!40000 ALTER TABLE `vvod_inst` DISABLE KEYS */;
/*!40000 ALTER TABLE `vvod_inst` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 14:17:15
