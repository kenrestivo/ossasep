-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: asep
-- ------------------------------------------------------
-- Server version	5.1.49-3

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
-- Dumping data for table `instructor_type`
--

LOCK TABLES `instructor_type` WRITE;
/*!40000 ALTER TABLE `instructor_type` DISABLE KEYS */;
INSERT INTO `instructor_type` VALUES (1,'Parent'),(2,'Teacher'),(3,'Company'),(4,'Individual');
/*!40000 ALTER TABLE `instructor_type` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `requirement_type`
--

LOCK TABLES `requirement_type` WRITE;
/*!40000 ALTER TABLE `requirement_type` DISABLE KEYS */;
INSERT INTO `requirement_type` VALUES (1,'License'),(2,'Insurance'),(3,'Fingerprint'),(4,'TB Test'),(5,'Contract'),(6,'W9'),(7,'Agreement');
/*!40000 ALTER TABLE `requirement_type` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Dumping data for table `school_year`
--

LOCK TABLES `school_year` WRITE;
/*!40000 ALTER TABLE `school_year` DISABLE KEYS */;
INSERT INTO `school_year` VALUES (1,'2011-2012');
/*!40000 ALTER TABLE `school_year` ENABLE KEYS */;
UNLOCK TABLES;

