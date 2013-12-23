-- MySQL dump 10.13  Distrib 5.5.30, for debian-linux-gnu (x86_64)
--
-- Host: lamp    Database: asep
-- ------------------------------------------------------
-- Server version	5.1.63-0+squeeze1

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
-- Table structure for table `check_expense`
--

DROP TABLE IF EXISTS `check_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(19,2) NOT NULL,
  `payer` varchar(128) DEFAULT NULL,
  `check_num` varchar(128) DEFAULT NULL,
  `check_date` date NOT NULL,
  `payee_id` int(11) NOT NULL,
  `delivered` date DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payee_id` (`payee_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `check_expense_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `instructor` (`id`),
  CONSTRAINT `check_expense_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `class_session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `check_income`
--

DROP TABLE IF EXISTS `check_income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(19,2) NOT NULL,
  `payer` varchar(128) DEFAULT NULL,
  `payee_id` int(11) NOT NULL,
  `check_num` varchar(128) DEFAULT NULL,
  `check_date` date NOT NULL,
  `deposit_id` int(11) DEFAULT NULL,
  `delivered` date DEFAULT NULL,
  `returned` date DEFAULT NULL,
  `cash` tinyint(1) DEFAULT '0',
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deposit_id` (`deposit_id`),
  KEY `payee_id` (`payee_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `check_income_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposit_details` (`id`),
  CONSTRAINT `check_income_ibfk_2` FOREIGN KEY (`payee_id`) REFERENCES `company` (`id`),
  CONSTRAINT `check_income_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `class_session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class_info`
--

DROP TABLE IF EXISTS `class_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(128) NOT NULL,
  `min_grade_allowed` int(11) DEFAULT NULL,
  `max_grade_allowed` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `description` longtext,
  `cost_per_class` decimal(19,2) DEFAULT NULL,
  `min_students` int(11) DEFAULT NULL,
  `max_students` int(11) DEFAULT NULL,
  `day_of_week` int(4) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `status` enum('Active','New','Cancelled') DEFAULT 'Active',
  `note` longtext,
  `session_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `class_info_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `class_session` (`id`),
  CONSTRAINT `class_info_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class_meeting`
--

DROP TABLE IF EXISTS `class_meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_meeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meeting_date` date NOT NULL,
  `note` varchar(256) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `makeup` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_date` (`class_id`,`meeting_date`),
  KEY `class_id` (`class_id`),
  KEY `class_meeting_ibfk_2` (`meeting_date`),
  CONSTRAINT `class_meeting_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`),
  CONSTRAINT `class_meeting_ibfk_2` FOREIGN KEY (`meeting_date`) REFERENCES `school_calendar` (`school_day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `class_session`
--

DROP TABLE IF EXISTS `class_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_year_id` int(11) NOT NULL,
  `description` varchar(128) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `registration_starts` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_year_id` (`school_year_id`),
  CONSTRAINT `class_session_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `school_year` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `use_publicly` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `deposit_details`
--

DROP TABLE IF EXISTS `deposit_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposit_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deposited_date` date DEFAULT NULL,
  `total_amount` decimal(19,2) DEFAULT NULL,
  `pennies` int(11) DEFAULT NULL,
  `nickels` int(11) DEFAULT NULL,
  `dimes` int(11) DEFAULT NULL,
  `quarters` int(11) DEFAULT NULL,
  `dollar_coins` int(11) DEFAULT NULL,
  `ones` int(11) DEFAULT NULL,
  `fives` int(11) DEFAULT NULL,
  `tens` int(11) DEFAULT NULL,
  `twenties` int(11) DEFAULT NULL,
  `fifties` int(11) DEFAULT NULL,
  `hundreds` int(11) DEFAULT NULL,
  `note` varchar(256) DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `deposit_details_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `class_session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `extra_fee`
--

DROP TABLE IF EXISTS `extra_fee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(19,2) NOT NULL,
  `description` varchar(256) NOT NULL,
  `class_id` int(11) NOT NULL,
  `pay_to_instructor` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `extra_fee_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `check_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` decimal(19,2) NOT NULL,
  PRIMARY KEY (`check_id`,`student_id`,`class_id`),
  KEY `student_id` (`student_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `income_ibfk_1` FOREIGN KEY (`check_id`) REFERENCES `check_income` (`id`),
  CONSTRAINT `income_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  CONSTRAINT `income_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) DEFAULT NULL,
  `cell_phone` varchar(256) DEFAULT NULL,
  `other_phone` varchar(256) DEFAULT NULL,
  `note` varchar(256) DEFAULT NULL,
  `instructor_type_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL DEFAULT '1',
  `alias` varchar(128) DEFAULT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_type_id` (`instructor_type_id`),
  KEY `instructor_ibfk_2` (`company_id`),
  CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`instructor_type_id`) REFERENCES `instructor_type` (`id`),
  CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructor_assignment`
--

DROP TABLE IF EXISTS `instructor_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor_assignment` (
  `instructor_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `percentage` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`instructor_id`,`class_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `instructor_assignment_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`),
  CONSTRAINT `instructor_assignment_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instructor_type`
--

DROP TABLE IF EXISTS `instructor_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `required_for`
--

DROP TABLE IF EXISTS `required_for`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `required_for` (
  `instructor_type_id` int(11) NOT NULL,
  `requirement_type_id` int(11) NOT NULL,
  PRIMARY KEY (`requirement_type_id`,`instructor_type_id`),
  KEY `instructor_type_id` (`instructor_type_id`),
  KEY `requirement_type_id` (`requirement_type_id`),
  CONSTRAINT `required_for_ibfk_1` FOREIGN KEY (`instructor_type_id`) REFERENCES `instructor_type` (`id`),
  CONSTRAINT `required_for_ibfk_2` FOREIGN KEY (`requirement_type_id`) REFERENCES `requirement_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requirement_status`
--

DROP TABLE IF EXISTS `requirement_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirement_status` (
  `instructor_id` int(11) NOT NULL,
  `requirement_type_id` int(11) NOT NULL,
  `received` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `note` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`instructor_id`,`requirement_type_id`),
  KEY `requirement_type_id` (`requirement_type_id`),
  CONSTRAINT `requirement_status_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`),
  CONSTRAINT `requirement_status_ibfk_2` FOREIGN KEY (`requirement_type_id`) REFERENCES `requirement_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requirement_type`
--

DROP TABLE IF EXISTS `requirement_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirement_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(256) DEFAULT NULL,
  `first_name` varchar(256) DEFAULT NULL,
  `grade` varchar(256) DEFAULT NULL,
  `teacher` varchar(256) DEFAULT NULL,
  `parent_1` varchar(256) DEFAULT NULL,
  `parent_2` varchar(256) DEFAULT NULL,
  `parent_3` varchar(256) DEFAULT NULL,
  `parent_4` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `cell__parent_1` varchar(256) DEFAULT NULL,
  `cell_parent_2` varchar(256) DEFAULT NULL,
  `email_parent_1` varchar(256) DEFAULT NULL,
  `email__parent_2` varchar(256) DEFAULT NULL,
  `email_parent_3` varchar(256) DEFAULT NULL,
  `email_parent_4` varchar(256) DEFAULT NULL,
  `home_address` varchar(256) DEFAULT NULL,
  `home_city` varchar(256) DEFAULT NULL,
  `zip_code` varchar(256) DEFAULT NULL,
  `home_address_2` varchar(256) DEFAULT NULL,
  `school_job` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `school_calendar`
--

DROP TABLE IF EXISTS `school_calendar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_day` date NOT NULL,
  `day_off` tinyint(1) NOT NULL DEFAULT '0',
  `minimum` tinyint(1) NOT NULL DEFAULT '0',
  `school_year_id` int(11) NOT NULL,
  `note` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `school_day` (`school_day`),
  KEY `school_year_id` (`school_year_id`),
  CONSTRAINT `school_calendar_ibfk_1` FOREIGN KEY (`school_year_id`) REFERENCES `school_year` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `school_year`
--

DROP TABLE IF EXISTS `school_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(128) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `signup` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `signup_date` datetime DEFAULT NULL,
  `status` enum('Enrolled','Waitlist','Cancelled') DEFAULT 'Enrolled',
  `note` varchar(256) DEFAULT NULL,
  `scholarship` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`,`class_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  CONSTRAINT `signup_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `grade` int(11) NOT NULL,
  `emergency_1` varchar(256) NOT NULL,
  `emergency_2` varchar(256) DEFAULT NULL,
  `emergency_3` varchar(256) DEFAULT NULL,
  `parent_email` varchar(256) DEFAULT NULL,
  `note` varchar(256) DEFAULT NULL,
  `contact` varchar(256) NOT NULL,
  `public_email_ok` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_name_phone` (`first_name`(120),`last_name`(120),`emergency_1`(15))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-22 23:14:14
