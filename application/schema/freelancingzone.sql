-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: freelancingzone
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `activity` text,
  PRIMARY KEY (`id_activity`),
  KEY `creationdate` (`creationdate`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` VALUES (1,1,'2018/03/03 02:02','new sign up welcom'),(2,31,'2018/03/06 13:18','New project posted, good luck everyone!'),(3,31,'2018/03/06 13:21','New project posted, good luck everyone!');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `author` text,
  `creationdate` varchar(45) DEFAULT NULL,
  `title` text,
  `body` longtext,
  `top_image` text,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (1,'Max','March 2, 2018','Why you should not pay any fees when using a freelancing platform','Freelancing is a great way to earn money online and make a living. Finding freelance jobs is not as hard as it was a few years ago but freelancing is still a challenge nowadays. The competition is fierce and the cost of living keeps on going up every year. Here are some reasons why you should use a freelancing platform without fees.\r\n<h3>You get to keep 100% of your salary</h3>\r\nThat\'s right. Using a freelancing platform with no fees means that you get to keep 100% of your hard earned money. This is especially important for freelancers because most freelance jobs pay less than normal jobs. Keeping 100% of your income is great because not only do you deserve it but also because you should not give your income away for a service that can and should be 100% free.\r\n<img alt=\"\">\r\n<br>\r\n<br>\r\n<h3>You are not limited by the platform</h3>\r\nUsing a freelancing platform without fees also means that you are not limited. You can work the way you want to, communicate using any channel you like and be in control. Here at freelancing.zone, you are even free to communicate outside the platform if you wish. You are free to do whatever you want.\r\n<h3>You set the rules</h3>\r\nUsing our platform, you set the rules. We encourage to do things your way. If you are happy, we are happy. Freelancing should be a fun experience and you should be able to do things the way you like them.\r\n&nbsp;','/resources/main/img/cup-of-coffee-1280537_1920.jpg',NULL);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_label` varchar(1000) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_category`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Desktop Software Development',1),(3,'Ecommerce Development',1),(4,'Game Development',1),(5,'Mobile Development',1),(6,'Product Management',1),(7,'QA & Testing',1),(8,'Scripts & Utilities',1),(9,'Web Development',1),(10,'Web & Mobile Design',1),(11,'Other - Software Development',1),(12,'Database Administration',2),(13,'ERP / CRM Software',2),(14,'Information Security',2),(15,'Network & System Administration',2),(16,'Other - IT & Networking',2),(17,'A/B Testing',3),(18,'Data Visualization',3),(19,'Data Extraction / ETL',3),(20,'Data Mining & Management',3),(21,'Machine Learning',3),(22,'Quantitative Analysis',3),(23,'Other - Data Science & Analytics',3),(24,'Animation',4),(25,'Audio Production',4),(26,'Graphic Design',4),(27,'Illustration',4),(28,'Logo Design & Branding',4),(29,'Photography',4),(30,'Presentations',4),(31,'Video Production',4),(32,'Voice Talent',4),(33,'Other - Design & Creative',4),(34,'Academic Writing & Research',5),(35,'Article & Blog Writing',5),(36,'Copywriting',5),(37,'Creative Writing',5),(38,'Editing & Proofreading',5),(39,'Grant Writing',5),(40,'Resumes & Cover Letters',5),(41,'Technical Writing',5),(42,'Web Content',5),(43,'Other - Writing',5),(44,'General Translation',6),(45,'Legal Translation',6),(46,'Medical Translation',6),(47,'Technical Translation',6),(48,'Customer Service',7),(49,'Technical Support',7),(50,'Other - Customer Service',7),(51,'Display Advertising',8),(52,'Email & Marketing Automation',8),(53,'Lead Generation',8),(54,'Market & Customer Research',8),(55,'Marketing Strategy',8),(56,'Public Relations',8),(57,'SEM - Search Engine Marketing',8),(58,'SEO - Search Engine Optimization',8),(59,'SMM - Social Media Marketing',8),(60,'Telemarketing & Telesales',8),(61,'Other - Sales & Marketing',8),(62,'Accounting',9),(63,'Financial Planning',9),(64,'Human Resources',9),(65,'Management Consulting',9),(66,'Other - Accounting & Consulting',9);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_groups`
--

DROP TABLE IF EXISTS `category_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_groups` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `group_label` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_groups`
--

LOCK TABLES `category_groups` WRITE;
/*!40000 ALTER TABLE `category_groups` DISABLE KEYS */;
INSERT INTO `category_groups` VALUES (1,'Web, Mobile & Software Dev'),(2,'IT & Networking'),(3,'Data Science & Analytics'),(4,'Design & Creative'),(5,'Writing'),(6,'Translation'),(7,'Customer Service'),(8,'Sales & Marketing'),(9,'Accounting & Consulting');
/*!40000 ALTER TABLE `category_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_source` int(11) DEFAULT NULL,
  `id_user_destination` int(11) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id_chat`),
  KEY `id_user_source` (`id_user_source`),
  KEY `id_user_destination` (`id_user_destination`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,2,3,'2018/02/21 18:31','test'),(2,3,2,'2018/02/21 18:31','test'),(3,2,3,'2018/02/21 18:32','re'),(4,2,3,'2018/02/21 18:33','test'),(5,2,3,'2018/02/21 18:34','x'),(6,2,3,'2018/02/21 18:34','axc'),(7,2,3,'2018/02/21 18:35','axc'),(8,2,3,'2018/02/21 18:38','yay'),(9,3,2,'2018/02/21 18:38','xac'),(10,2,3,'2018/02/21 18:55','test'),(11,2,2,'2018/02/21 19:59','lk'),(12,2,3,'2018/02/23 07:39','alert&#40;\\\'x\\\'&#41;;'),(13,2,3,'2018/02/24 12:14','saf'),(14,2,3,'2018/02/24 12:35','sdf'),(15,2,1,'2018/02/24 13:59','test'),(16,1,2,'2018/02/24 13:59','tere');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('9sl1m5p7vi1hfnt0n7aaor8hqlcpuo0s','127.0.0.1',1520350539,'__ci_last_regenerate|i:1520350539;FBRLH_state|s:32:\"e6922e76400accea3eb1bbb02654e8d1\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('bk84dkf75e38uj9gu9i0olo6oq6rf6mc','127.0.0.1',1520350995,'__ci_last_regenerate|i:1520350995;FBRLH_state|s:32:\"e6922e76400accea3eb1bbb02654e8d1\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('udhdm384dg1t7am2l51g182r314qu9of','127.0.0.1',1520351336,'__ci_last_regenerate|i:1520351336;FBRLH_state|s:32:\"e6922e76400accea3eb1bbb02654e8d1\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('ng3q76teb8fsegd0hm95eqnbq1iata4l','127.0.0.1',1520351929,'__ci_last_regenerate|i:1520351929;FBRLH_state|s:32:\"e6922e76400accea3eb1bbb02654e8d1\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('otjvosjlmp2epfl5eennk2cnnkrq2586','127.0.0.1',1520352188,'__ci_last_regenerate|i:1520351929;FBRLH_state|s:32:\"e6922e76400accea3eb1bbb02654e8d1\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('5hem6e32lnv118mo8m209ifbgolef71m','127.0.0.1',1520360312,'__ci_last_regenerate|i:1520360312;FBRLH_state|s:32:\"496d96ecf1d1fec0a4c290bfd3bb2651\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('ofkshglq3pn13dhr563hhihuv9om14or','127.0.0.1',1520360639,'__ci_last_regenerate|i:1520360639;FBRLH_state|s:32:\"496d96ecf1d1fec0a4c290bfd3bb2651\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";'),('h3g8vb7a9g357antjqs50f2u33e9mr9u','127.0.0.1',1520360640,'__ci_last_regenerate|i:1520360639;FBRLH_state|s:32:\"496d96ecf1d1fec0a4c290bfd3bb2651\";authenticated|b:1;email|s:24:\"maxime.labelle@owasp.org\";fullname|s:14:\"Maxime Labelle\";id_user|s:2:\"31\";profile_picture|s:36:\"4e4a0266caf689f6d89da2662e1503b7.jpg\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `role` varchar(512) DEFAULT 'Freelancer',
  `creationdate` varchar(45) DEFAULT NULL,
  `submission_description` text,
  `submission_amount` varchar(45) DEFAULT NULL,
  `submission_milestones` text,
  `employer_reviewed` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_job`),
  KEY `id_user` (`id_user`),
  KEY `id_project` (`id_project`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,2,1,'APPROVED','Developerx','2018/02/21 19:47','descx','233','[{\"milestone\":\"ax\",\"time\":\"1x\",\"progress\":\"10\"},{\"milestone\":\"bx\",\"time\":\"x3\",\"progress\":\"50\"}]','YES');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text,
  `id_user_source` int(11) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `id_user_destination` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `id_user_source` (`id_user_source`),
  KEY `id_user_destination` (`id_user_destination`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'new stuff just happened',2,'2018/01/01 28:02','READ','1'),(2,'I have blocked you.',1,NULL,'READ','2'),(3,'I have unblocked you.',1,NULL,'READ','2'),(4,'Hi, I just wanted to connect with you :)',2,NULL,'READ','1'),(5,'I have accepted your connection request :)',1,NULL,'READ','2');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postboard`
--

DROP TABLE IF EXISTS `postboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postboard` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `pos_x` int(11) DEFAULT NULL,
  `pos_y` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postboard`
--

LOCK TABLES `postboard` WRITE;
/*!40000 ALTER TABLE `postboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `postboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `title` text,
  `description` text,
  `type` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `uuid` varchar(1000) DEFAULT NULL,
  `visibility` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `status` (`status`),
  KEY `id_user` (`id_user`),
  KEY `id_category` (`id_category`),
  KEY `skills` (`skills`),
  KEY `uuid` (`uuid`),
  KEY `title` (`title`(1000)),
  KEY `description` (`description`(1000))
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'CLOSED',1,62,'test','test 1234 5321 abcd','FIXED','2345','2018/02/10 18:52','php,linux','d73e20eaa6d0d1f0166ff6cdfb07ffd255123249',NULL),(2,'DISAPPROVED',3,62,'axcxac','axcaxc','FIXED','234','2018/02/10 19:02','','83a5dbbb6f1d953722035a785b0f292b88075a7e',NULL),(3,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(4,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(5,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(6,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(7,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(8,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(9,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(10,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(11,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(12,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(13,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(14,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(15,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(16,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(17,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(18,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(19,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(20,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(21,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(22,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(23,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(24,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(25,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(26,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(27,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(28,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(29,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(30,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(31,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(32,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(33,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(34,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(35,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(36,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(37,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(38,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(39,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(40,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(41,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(42,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(43,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(44,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(45,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(46,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(47,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(48,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(49,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(50,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(51,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(52,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(53,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(54,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(55,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(56,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(57,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(58,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(59,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(60,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(61,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(62,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(63,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(64,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(65,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(66,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(67,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(68,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(69,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(70,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(71,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(72,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(73,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(74,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(75,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(76,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(77,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(78,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(79,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(80,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(81,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(82,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(83,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(84,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(85,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(86,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(87,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(88,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(89,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(90,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(91,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(92,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(93,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(94,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(95,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(96,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(97,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(98,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(99,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(100,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(101,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(102,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(103,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(104,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(105,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(106,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(107,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(108,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(109,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(110,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(111,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(112,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(113,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(114,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(115,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(116,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(117,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(118,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(119,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(120,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(121,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(122,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(123,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(124,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(125,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(126,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(127,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(128,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(129,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(130,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(131,'x',3,62,'axcac','axcaxc','FIXED','23','2018/01','php,lixnu',NULL,NULL),(132,'ASSIGNED',2,62,'axc','<h1>super info</h1>very interesting stuff very interesting stuff very interesting stuff very interesting stuff very interesting stuff very interesting stuff very interesting stuff <br>very interesting stuff very interesting stuff very interesting stuff <br>very interesting stuff <br><br><b>very interesting stuff <br></b><br>very interesting stuff very interesting stuff<i><u> very interesting stuff <br></u></i><br><ul><li>very interesting stuff </li><li>very interesting stuff <br></li><li>very interesting stuff <br></li><li>very interesting stuff <br></li></ul>','FIXED','1234','2018/02/14 10:51','php,linuxc','4e31646dd907945a7be37be0e04251df758e7da4','PUBLIC'),(133,'DISAPPROVED',31,62,'test','test','FIXED','232','2018/03/06 13:18','','86f92b837ffa3d2705395eb1050bba5c06e90d5d','PUBLIC'),(134,'ACTIVE',31,62,'test123','test123','FIXED','1234','2018/03/06 13:21','','877c9a0475ab1a4552a1832a86b9e390a3c8a476','PUBLIC');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects_files`
--

DROP TABLE IF EXISTS `projects_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_files` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) DEFAULT NULL,
  `filename` text,
  `filepath` text,
  PRIMARY KEY (`id_file`),
  KEY `id_project` (`id_project`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_files`
--

LOCK TABLES `projects_files` WRITE;
/*!40000 ALTER TABLE `projects_files` DISABLE KEYS */;
INSERT INTO `projects_files` VALUES (2,132,'4.jpg','5068daed4a08007485d942223cfdd213.jpg'),(3,132,'9.jpg','904b0acb56e3ad211408e8691f3f36fe.jpg'),(4,133,'4.jpg','ea1463cf41d275b9d550af58fbe47a4d.jpg');
/*!40000 ALTER TABLE `projects_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_reviewed` int(11) DEFAULT NULL,
  `id_user_reviewer` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `creationdate` varchar(45) DEFAULT NULL,
  `review` text,
  PRIMARY KEY (`id_review`),
  KEY `id_user_reviewed` (`id_user_reviewed`),
  KEY `id_user_reviewer` (`id_user_reviewer`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,1,'POSITIVE','2018/02/24 17:34','good'),(2,1,2,'NEGATIVE','2018/02/25 11:48','very bad :(');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(1000) DEFAULT NULL,
  `password` text,
  `fullname` text,
  `profile_picture` varchar(1000) DEFAULT 'default-user.png',
  `mobile` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `description` text,
  `summary` text,
  `status` varchar(45) DEFAULT NULL,
  `email_verified` varchar(45) DEFAULT NULL,
  `email_visibility` varchar(45) DEFAULT NULL,
  `skills` text,
  `creationdate` varchar(45) DEFAULT NULL,
  `password_reset` varchar(45) DEFAULT NULL,
  `facebook_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `skills` (`skills`(1000)) USING BTREE,
  KEY `facebook_id` (`facebook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'jashim900@gmail.com','$2y$10$2vMW8u7loEZZcl06vC.CFug/kWLYiHBPrMvU7ug0Sec26jgGnZ41i','Jashim','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','NO','PUBLIC',NULL,'2018/02/27 06:41',NULL,NULL),(11,'cristian__melgarejo@hotmail.com','$2y$10$Qtle4ojPzaxSaiUSsQ9QyekNN5WrhO4MsufkQAGb9Gb4lWmKIEmXy','cristian','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','c51ed707aeb371fe24b5e69daba333af','PUBLIC',NULL,'2018/02/27 18:08',NULL,NULL),(12,'ndeyerama95@gmail.com','$2y$10$z5lazRseTmNea7DlgOEXEuxeelMRa8d/iAKCzvUA5.wxF6v2mLAZa','rama','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','a1f42980fe1c5981e6126be34597ac78','PUBLIC',NULL,'2018/02/27 18:49',NULL,NULL),(13,NULL,'','Praba Karan Chef','721f5a1acc5f85b18c96120dec7dd7f0.jpg',NULL,NULL,NULL,NULL,'ACTIVE','YES','PUBLIC',NULL,'2018/02/27 20:03',NULL,NULL),(14,'kazishuvo510@gmail.com','$2y$10$2Uk5Kv0XSBU9otmClQfX2Os6woZzgTGUPCGfI6Yp4GMexPcdJkpCS','Shuvo Hossain','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','9014551cd015beed42742ba6945c85f5','PUBLIC',NULL,'2018/02/27 20:04',NULL,NULL),(15,'riosf.carlos2014@gmail.com','$2y$10$AwgZiK.EIK7bd/fwCDVBO.nBsYKb79wtq.CCkhum/hXYYufqh5hAG','carlos rios','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','32c995f1f239aca278169055c38b9034','PUBLIC',NULL,'2018/02/27 22:06',NULL,NULL),(16,'puertascarlos952@gmail.com','$2y$10$Q/XzBt.97b30AScjG6Sq..IwJqW.4NznDzUo8iRsOz3RG.vTR36Xa','carlos','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','982883191fbfeb468ee43c36516279db','PUBLIC',NULL,'2018/02/28 00:04',NULL,NULL),(17,'kubawsx3@wp.pl','$2y$10$AhlLp3T.vzQPx2kbZ83zDuWua5giYuL0qBiUco9OZD6lPDX5IYrtm','jakub','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','c1978f3e132c74eeb9883a17c900aafc','PUBLIC',NULL,'2018/02/28 00:04',NULL,NULL),(18,'luis_lulu@hotmail.com','$2y$10$KxFFNtpnmo9zXtyHlYmfheHql/rM/5Dik2AYBH0rcf405Fiu5.dIS','luis ','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','a8d9bd8823597bf5d408542e5485ed6e','PUBLIC',NULL,'2018/02/28 02:06',NULL,NULL),(19,NULL,'','Juan Carlos Lopez','c08308764aec68475f4c5ef8f12946a8.jpg',NULL,NULL,NULL,NULL,'ACTIVE','YES','PUBLIC',NULL,'2018/02/28 05:08',NULL,NULL),(21,'sa.tapu.st@gmail.com','$2y$10$/1ANE.WFMu9lG2G3MXWDtedhm1Az1H4hWuoLA5bGih1l97HBoa086','Shamsul Alam Tapu','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','b8ceb501811c70d89e35c59950ebe5e6','PUBLIC',NULL,'2018/02/28 11:07',NULL,NULL),(22,'maele1279@gmail.com','$2y$10$7Cgf0jEx0J8.s/f0WnKHjOChJctZfBpqjL6jLbC1mc7y8FIaXekbS','MARIA ELENA RAMIREZ','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','7d5739f6a448b46e109fce3c10dad35d','PUBLIC',NULL,'2018/02/28 12:08',NULL,NULL),(23,'ali.elsawy1@yahoo.com','$2y$10$MREjvHHwFKfS3PeD8xZ8/ehS39CFciJB8M03YVzvfh4Y33xKXGHLi','alirabee','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','fe71ae0130c56b4b0e2c9488463fa55b','PUBLIC',NULL,'2018/02/28 12:34',NULL,NULL),(24,'alineatrevidas2012@gmail.com','$2y$10$X9N869RR7XTd.VhqXYKZPe9Q2cDD0TI2gbJm.J.F7jlS5fKYzenFq','Aline','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','aa8620ab8719856ebfc91490f796af1a','PUBLIC',NULL,'2018/02/28 12:36',NULL,NULL),(25,'issaksara@gmail.com','$2y$10$DNuTLOyvbv.oldzQ9EleyOBXn97o/LfDYZ1UPiB0jCL9xkSMcAMGG','sara','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','e2e41202cd48b69204b0e5a90f81bce9','PUBLIC',NULL,'2018/02/28 12:50',NULL,NULL),(31,'maxime.labelle@owasp.org','$2a$04$AgRE.CKjKixwI1N.wz3AaO/Yj8pXZEjK.udozo2j39UyufvP4ZxQu','Maxime Labelle','4e4a0266caf689f6d89da2662e1503b7.jpg',NULL,NULL,NULL,NULL,'ACTIVE','YES','PUBLIC',NULL,'2018/02/28 13:27',NULL,'2023134321344975'),(32,'tantialina78@yahoo.com','','Bianca Gabriela','5434dcbe927c8ec8b86e7e3e0259345b.jpg',NULL,NULL,NULL,NULL,'ACTIVE','YES','PUBLIC',NULL,'2018/02/28 14:44',NULL,'911393209030772'),(33,'zain_hamdan_2007@hotmail.com','$2y$10$EJeRgP4HHVqDzjpYE/5GoeJfoMTipvS1QScsKv8dWXxEFq.y7jNR2','zain','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','a374ede752ebb19c97671c241fa4764d','PUBLIC',NULL,'2018/02/28 15:05',NULL,NULL),(34,'apmprasad@gmail.com','$2y$10$hS1lquGLQG6LC1Iv1Y1kc.BmGdyT9y5gNWLv90yI03F9iZ/SPkPC6','meegan','default-user.png',NULL,NULL,NULL,NULL,'ACTIVE','26ad8f4d3fda4e9669280d29401ec89a','PUBLIC',NULL,'2018/02/28 15:30',NULL,NULL),(35,'mglanville0@pen.io','$2y$10$s7R9uL4iLx2rcwis4GY/R.XZ8NINw40UL2XkZy8giYAUHVu7Pe8dS','Maison Glanville','default-user.png',NULL,NULL,NULL,'New freelancer','ACTIVE','05685586c0ab99a7066fb5ac75871ef8','PUBLIC',NULL,'2018/02/25 01:16',NULL,NULL),(36,'fyelyashev1@odnoklassniki.ru','$2y$10$4iLepavQx/xKLJm8FQknneQglP76ZLSiqogkx/3wQlTtOliUQ70d6','Fayre Yelyashev','default-user.png',NULL,NULL,NULL,'New freelancer','ACTIVE','c840b617f7c6974b1c33d67605640693','PUBLIC',NULL,'2018/02/17 11:08',NULL,NULL),(37,'vleydon2@umn.edu','$2y$10$QGAfaA4RukEshMAKMt5zQuHcm3/PNhaUBBKyNx/7MnCNkewJdaD7a','Victoir Leydon','default-user.png',NULL,NULL,NULL,'New freelancer','ACTIVE','f1a62bc28c00f8d66df63b52b9680345','PUBLIC',NULL,'2018/03/02 04:22',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_contacts`
--

DROP TABLE IF EXISTS `users_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_user_contact` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `id_user` (`id_user`),
  KEY `id_user_contact` (`id_user_contact`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_contacts`
--

LOCK TABLES `users_contacts` WRITE;
/*!40000 ALTER TABLE `users_contacts` DISABLE KEYS */;
INSERT INTO `users_contacts` VALUES (1,2,1,'CONNECTED'),(2,1,2,'CONNECTED');
/*!40000 ALTER TABLE `users_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_skills`
--

DROP TABLE IF EXISTS `users_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_skills` (
  `id_users_skill` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `skill` varchar(45) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_users_skill`),
  KEY `id_user` (`id_user`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_skills`
--

LOCK TABLES `users_skills` WRITE;
/*!40000 ALTER TABLE `users_skills` DISABLE KEYS */;
INSERT INTO `users_skills` VALUES (2,2,'php',14),(3,2,'linux',50),(4,2,'mysql',80),(5,1,'Skill description1331',11),(6,1,'Skill descriptionxac',1),(7,1,'Skill descriptionaxc',1);
/*!40000 ALTER TABLE `users_skills` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-07 19:19:49
