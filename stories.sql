-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: stories
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audiobooks`
--

DROP TABLE IF EXISTS `audiobooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audiobooks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `duration` int NOT NULL,
  `readingOrder` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audiobooks`
--

LOCK TABLES `audiobooks` WRITE;
/*!40000 ALTER TABLE `audiobooks` DISABLE KEYS */;
INSERT INTO `audiobooks` VALUES (1,'The Final Empire: Mistborn','Brandon Sanderson',1479,1),(2,'The Name of the Wind','Patrick Rothfuss',983,2),(3,'The Blade Itself: The First Law','Joe Abercrombie',1340,3),(4,'The Heroes','Joe Abercrombie',1390,4),(5,'Assassin\'s Apprentice: The Farseer Trilogy','Robin Hobb',1043,5),(6,'The Eye of the World: Wheel of Time','Robert Jordan',1802,6),(7,'The Wise Man\'s Fear','Patrick Rothfuss',1211,7),(8,'The Way of Kings: The Stormlight Archive','Brandon Sanderson',2734,8),(9,'The Lean Startup','Eric Ries',523,9),(10,'House of Suns','Alastair Reynolds',1096,10),(11,'The Lies of Locke Lamora','Scott Lynch',1323,11),(12,'Best Served Cold','Joe Abercrombie',1592,12),(13,'Thinking, Fast and Slow','Daniel Kahneman',1206,13),(14,'The Dark Tower I: The Gunslinger','Stephen King',439,14),(15,'Theft of Swords: Riyria Revelations','Michael J. Sullivan',1357,15),(16,'The Emperor\'s Blades: Chronicle of the Unhewn Throne','Brian Staveley',1126,16),(17,'The Magic of Recluce: Saga of Recluce','L. E. Modesitt Jr.',1153,17),(18,'Red Country','Joe Abercrombie',1196,18),(19,'Warbreaker','Brandon Sanderson',1496,19),(20,'Magician','Raymond E. Feist',2173,20),(21,'Blood Song','Anthony Ryan',1385,21),(22,'Half a King','Joe Abercrombie',565,22),(23,'Prince of Thorns: Broken Empire','Mark Lawrence',537,23),(24,'The Immortal Prince: Tide Lords','Jennifer Fallon',1164,24),(25,'Medalon: Demon Child','Jennifer Fallon',1039,25),(26,'The Black Company: Chronicles of The Black Company','Glen Cook',654,26);
/*!40000 ALTER TABLE `audiobooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `summary` text,
  `story` text,
  `additional_interview` text,
  `gatherer_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `interview_date` date DEFAULT NULL,
  `project_information_id` int DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `website_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cases`
--

LOCK TABLES `cases` WRITE;
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` VALUES (1,'Maria','Isabel','Lopez',12,'Female','','','',1,'2022-04-21 00:00:00','2022-04-25',1,1,1),(5,'Ramon','Galicia','Revilla',66,'Male','','','',1,'2022-04-22 00:00:00','2022-04-25',1,1,1),(6,'Carl Bryant','Solis','del Rosario',15,'Male','ewrtyuiopdfghjkjlkcxvbnm,.dfghjkwertyuiodfghjjhtd','ertyuidfghjwertyuidsfghjhzcxvcbvnbmxzcvbnsadfghwqertyuisadfghxcvcbv','wqertyuyudfghgjhsadsfghcxvbsadfwqertewrtyertsadfgwert',1,'2022-04-25 00:00:00','2022-04-25',1,1,1),(7,'Roda','Marcos','Navarro',45,'Female','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2022-04-25 12:44:11','2022-04-08',1,1,1),(8,'Robina','Padilla','Aristurenas',54,'Female','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',1,'2022-04-26 00:05:08','2022-04-04',1,1,1),(10,'Juan','Carino','Dela Cruz',25,'Male','afsdgfhgadsfghasdfghdsfgndsfgfd\nsfdgfgfdsfgh\nfzdfgchsd\nfghdfgh','afsdgfhgadsfghasdfghdsfgndsfgfd\nsfdgfgfdsfgh\nfzdfgchsd\nfghdfgh','afsdgfhgadsfghasdfghdsfgndsfgfd\nsfdgfgfdsfgh\nfzdfgchsd\nfghdfgh',1,'2022-05-10 06:45:17','2022-05-10',2,1,1),(11,'Ramil','Lumaad','Caballero',47,'Male','This is a test','This is a test','This is a test',1,'2022-05-10 07:02:27','2022-05-10',3,1,1),(12,'Juan','Garcia','Dela Cruz',23,'Male','Kmbcjxjgxkgxkgxigxkgxhkcvjxigg\nJxjgxigxigxkg\n,hfzjgx','Ugxigxigditdkgxigxigxigxi\nUxitxigx','Jxkgxixigxigcihcihcih',1,'2022-05-24 06:45:26','2022-05-20',4,1,1);
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datatables_demo`
--

DROP TABLE IF EXISTS `datatables_demo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datatables_demo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL DEFAULT '',
  `last_name` varchar(250) NOT NULL DEFAULT '',
  `position` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `office` varchar(250) NOT NULL DEFAULT '',
  `start_date` datetime DEFAULT NULL,
  `age` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `seq` int DEFAULT NULL,
  `extn` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `seq` (`seq`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datatables_demo`
--

LOCK TABLES `datatables_demo` WRITE;
/*!40000 ALTER TABLE `datatables_demo` DISABLE KEYS */;
INSERT INTO `datatables_demo` VALUES (1,'Tiger','Nixon','System Architect','t.nixon@datatables.net','Edinburgh','2011-04-25 00:00:00',61,320800,2,'5421'),(2,'Garrett','Winters','Accountant','g.winters@datatables.net','Tokyo','2011-07-25 00:00:00',63,170750,22,'8422'),(3,'Ashton','Cox','Junior Technical Author','a.cox@datatables.net','San Francisco','2009-01-12 00:00:00',66,86000,6,'1562'),(4,'Cedric','Kelly','Senior Javascript Developer','c.kelly@datatables.net','Edinburgh','2012-03-29 00:00:00',22,433060,41,'6224'),(5,'Airi','Satou','Accountant','a.satou@datatables.net','Tokyo','2008-11-28 00:00:00',33,162700,55,'5407'),(6,'Brielle','Williamson','Integration Specialist','b.williamson@datatables.net','New York','2012-12-02 00:00:00',61,372000,21,'4804'),(7,'Herrod','Chandler','Sales Assistant','h.chandler@datatables.net','San Francisco','2012-08-06 00:00:00',59,137500,46,'9608'),(8,'Rhona','Davidson','Integration Specialist','r.davidson@datatables.net','Tokyo','2010-10-14 00:00:00',55,327900,50,'6200'),(9,'Colleen','Hurst','Javascript Developer','c.hurst@datatables.net','San Francisco','2009-09-15 00:00:00',39,205500,26,'2360'),(10,'Sonya','Frost','Software Engineer','s.frost@datatables.net','Edinburgh','2008-12-13 00:00:00',23,103600,18,'1667'),(11,'Jena','Gaines','Office Manager','j.gaines@datatables.net','London','2008-12-19 00:00:00',30,90560,13,'3814'),(12,'Quinn','Flynn','Support Lead','q.flynn@datatables.net','Edinburgh','2013-03-03 00:00:00',22,342000,23,'9497'),(13,'Charde','Marshall','Regional Director','c.marshall@datatables.net','San Francisco','2008-10-16 00:00:00',36,470600,14,'6741'),(14,'Haley','Kennedy','Senior Marketing Designer','h.kennedy@datatables.net','London','2012-12-18 00:00:00',43,313500,12,'3597'),(15,'Tatyana','Fitzpatrick','Regional Director','t.fitzpatrick@datatables.net','London','2010-03-17 00:00:00',19,385750,54,'1965'),(16,'Michael','Silva','Marketing Designer','m.silva@datatables.net','London','2012-11-27 00:00:00',66,198500,37,'1581'),(17,'Paul','Byrd','Chief Financial Officer (CFO)','p.byrd@datatables.net','New York','2010-06-09 00:00:00',64,725000,32,'3059'),(18,'Gloria','Little','Systems Administrator','g.little@datatables.net','New York','2009-04-10 00:00:00',59,237500,35,'1721'),(19,'Bradley','Greer','Software Engineer','b.greer@datatables.net','London','2012-10-13 00:00:00',41,132000,48,'2558'),(20,'Dai','Rios','Personnel Lead','d.rios@datatables.net','Edinburgh','2012-09-26 00:00:00',35,217500,45,'2290'),(21,'Jenette','Caldwell','Development Lead','j.caldwell@datatables.net','New York','2011-09-03 00:00:00',30,345000,17,'1937'),(22,'Yuri','Berry','Chief Marketing Officer (CMO)','y.berry@datatables.net','New York','2009-06-25 00:00:00',40,675000,57,'6154'),(23,'Caesar','Vance','Pre-Sales Support','c.vance@datatables.net','New York','2011-12-12 00:00:00',21,106450,29,'8330'),(24,'Doris','Wilder','Sales Assistant','d.wilder@datatables.net','Sydney','2010-09-20 00:00:00',23,85600,56,'3023'),(25,'Angelica','Ramos','Chief Executive Officer (CEO)','a.ramos@datatables.net','London','2009-10-09 00:00:00',47,1200000,36,'5797'),(26,'Gavin','Joyce','Developer','g.joyce@datatables.net','Edinburgh','2010-12-22 00:00:00',42,92575,5,'8822'),(27,'Jennifer','Chang','Regional Director','j.chang@datatables.net','Singapore','2010-11-14 00:00:00',28,357650,51,'9239'),(28,'Brenden','Wagner','Software Engineer','b.wagner@datatables.net','San Francisco','2011-06-07 00:00:00',28,206850,20,'1314'),(29,'Fiona','Green','Chief Operating Officer (COO)','f.green@datatables.net','San Francisco','2010-03-11 00:00:00',48,850000,7,'2947'),(30,'Shou','Itou','Regional Marketing','s.itou@datatables.net','Tokyo','2011-08-14 00:00:00',20,163000,1,'8899'),(31,'Michelle','House','Integration Specialist','m.house@datatables.net','Sydney','2011-06-02 00:00:00',37,95400,39,'2769'),(32,'Suki','Burks','Developer','s.burks@datatables.net','London','2009-10-22 00:00:00',53,114500,40,'6832'),(33,'Prescott','Bartlett','Technical Author','p.bartlett@datatables.net','London','2011-05-07 00:00:00',27,145000,47,'3606'),(34,'Gavin','Cortez','Team Leader','g.cortez@datatables.net','San Francisco','2008-10-26 00:00:00',22,235500,52,'2860'),(35,'Martena','Mccray','Post-Sales support','m.mccray@datatables.net','Edinburgh','2011-03-09 00:00:00',46,324050,8,'8240'),(36,'Unity','Butler','Marketing Designer','u.butler@datatables.net','San Francisco','2009-12-09 00:00:00',47,85675,24,'5384'),(37,'Howard','Hatfield','Office Manager','h.hatfield@datatables.net','San Francisco','2008-12-16 00:00:00',51,164500,38,'7031'),(38,'Hope','Fuentes','Secretary','h.fuentes@datatables.net','San Francisco','2010-02-12 00:00:00',41,109850,53,'6318'),(39,'Vivian','Harrell','Financial Controller','v.harrell@datatables.net','San Francisco','2009-02-14 00:00:00',62,452500,30,'9422'),(40,'Timothy','Mooney','Office Manager','t.mooney@datatables.net','London','2008-12-11 00:00:00',37,136200,28,'7580'),(41,'Jackson','Bradshaw','Director','j.bradshaw@datatables.net','New York','2008-09-26 00:00:00',65,645750,34,'1042'),(42,'Olivia','Liang','Support Engineer','o.liang@datatables.net','Singapore','2011-02-03 00:00:00',64,234500,4,'2120'),(43,'Bruno','Nash','Software Engineer','b.nash@datatables.net','London','2011-05-03 00:00:00',38,163500,3,'6222'),(44,'Sakura','Yamamoto','Support Engineer','s.yamamoto@datatables.net','Tokyo','2009-08-19 00:00:00',37,139575,31,'9383'),(45,'Thor','Walton','Developer','t.walton@datatables.net','New York','2013-08-11 00:00:00',61,98540,11,'8327'),(46,'Finn','Camacho','Support Engineer','f.camacho@datatables.net','San Francisco','2009-07-07 00:00:00',47,87500,10,'2927'),(47,'Serge','Baldwin','Data Coordinator','s.baldwin@datatables.net','Singapore','2012-04-09 00:00:00',64,138575,44,'8352'),(48,'Zenaida','Frank','Software Engineer','z.frank@datatables.net','New York','2010-01-04 00:00:00',63,125250,42,'7439'),(49,'Zorita','Serrano','Software Engineer','z.serrano@datatables.net','San Francisco','2012-06-01 00:00:00',56,115000,27,'4389'),(50,'Jennifer','Acosta','Junior Javascript Developer','j.acosta@datatables.net','Edinburgh','2013-02-01 00:00:00',43,75650,49,'3431'),(51,'Cara','Stevens','Sales Assistant','c.stevens@datatables.net','New York','2011-12-06 00:00:00',46,145600,15,'3990'),(52,'Hermione','Butler','Regional Director','h.butler@datatables.net','London','2011-03-21 00:00:00',47,356250,9,'1016'),(53,'Lael','Greer','Systems Administrator','l.greer@datatables.net','London','2009-02-27 00:00:00',21,103500,25,'6733'),(54,'Jonas','Alexander','Developer','j.alexander@datatables.net','San Francisco','2010-07-14 00:00:00',30,86500,33,'8196'),(55,'Shad','Decker','Regional Director','s.decker@datatables.net','Edinburgh','2008-11-13 00:00:00',51,183000,43,'6373'),(56,'Michael','Bruce','Javascript Developer','m.bruce@datatables.net','Singapore','2011-06-27 00:00:00',29,183000,16,'5384'),(57,'Donna','Snider','Customer Support','d.snider@datatables.net','New York','2011-01-25 00:00:00',27,112000,19,'4226');
/*!40000 ALTER TABLE `datatables_demo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dept` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept`
--

LOCK TABLES `dept` WRITE;
/*!40000 ALTER TABLE `dept` DISABLE KEYS */;
INSERT INTO `dept` VALUES (1,'IT'),(2,'Sales'),(3,'Pre-Sales'),(4,'Marketing'),(5,'Senior Management'),(6,'Accounts'),(7,'Support');
/*!40000 ALTER TABLE `dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(250) NOT NULL,
  `filesize` int NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'EBG Passport.jpg',64103,'/uploads/1.jpg','/var/www/html/uploads/1.jpg'),(2,'pwd ID selfie.jpg',184362,'/uploads/2.jpg','/var/www/html/uploads/2.jpg'),(3,'Real Property Tax OR.pdf',254361,'/uploads/3.pdf','/var/www/html/uploads/3.pdf'),(4,'Tax Clearance.pdf',1091676,'/uploads/4.pdf','/var/www/html/uploads/4.pdf'),(5,'received_691703112021133.jpeg',46420,'/uploads/5.jpeg','/var/www/html/uploads/5.jpeg'),(6,'Azure free credits.jpg',75119,'/uploads/6.jpg','/var/www/html/uploads/6.jpg'),(7,'Azure free credits.jpg',75119,'/uploads/7.jpg','/var/www/html/uploads/7.jpg'),(8,'Azure free credits.jpg',75119,'/uploads/8.jpg','/var/www/html/uploads/8.jpg'),(9,'Azure free credits.jpg',75119,'/uploads/9.jpg','/var/www/html/uploads/9.jpg'),(10,'Azure free credits.jpg',75119,'/uploads/10.jpg','/var/www/html/uploads/10.jpg'),(11,'big-lagoon-El-Nido-Tour-A-960x1149.jpg',248657,'/uploads/11.jpg','/var/www/html/uploads/11.jpg'),(12,'IMG-b38f115edbab0ed0e612bba20a93ab61-V.jpg',221239,'/uploads/12.jpg','/var/www/html/uploads/12.jpg'),(13,'IMG-94b54cfa5c9b37a9908e6ff9a96e228e-V.jpg',177357,'/uploads/13.jpg','/var/www/html/uploads/13.jpg'),(14,'IMG-a1d2af423eae26304c744188f73b6fdb-V.jpg',240888,'/uploads/14.jpg','/var/www/html/uploads/14.jpg'),(15,'20220521_185739.jpg',2386255,'/uploads/15.jpg','/var/www/html/uploads/15.jpg'),(16,'20220521_185739.jpg',2386255,'/uploads/16.jpg','/var/www/html/uploads/16.jpg'),(17,'20220521_185728.jpg',2128253,'/uploads/17.jpg','/var/www/html/uploads/17.jpg');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gatherers`
--

DROP TABLE IF EXISTS `gatherers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gatherers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'User',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gatherers`
--

LOCK TABLES `gatherers` WRITE;
/*!40000 ALTER TABLE `gatherers` DISABLE KEYS */;
INSERT INTO `gatherers` VALUES (1,'administrator@savethechildren.net.ph','System Administrator','Admin','P@$$w0rd!'),(2,'erwin.galang@obbsco.com','Erwin Galang','User','F!renza130');
/*!40000 ALTER TABLE `gatherers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Dalig','Antipolo City','Rizal'),(2,'Maasim','San Ildefonso','Bulacan'),(3,'Lomboy','Cabangan','Zambales'),(4,'Pio Del Pilar','Makati City','NCR'),(5,'Piyo Del Pilar','Makatci City','NCEER'),(6,'Hiraya II','Tanza','Cavite');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'Printer'),(2,'Servers'),(3,'Desktop'),(4,'VMs'),(5,'Web-site'),(6,'Accounts');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `location` int NOT NULL,
  `background` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (1,'San Ildefonso Feeding Program',2,'The San Ildefonso Feeding Program jumped over the lazy dog.'),(2,'Dalig Relief Operation',1,'The Dalig Relief Operation jumped over the lazy dog.'),(3,'COVID Cash Grants',4,'Cash for COVID Victims'),(4,'Relief Operation - Rizal',1,'fewerjhkjjhgfdsdafghjklkjhgfdsfghkjhgfdsv.jhgfdfghjkljhgfdfgh');
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_id` varchar(255) DEFAULT NULL,
  `secret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('40aa6ca1-881c-43f1-9678-59ab33e5adf7','fcb15f07-e2b0-4a30-93e8-928a0ff1e25c_','SD08Q~CusVSncHnYFqMMlZ3HMYno9BKyWusJ-aoq');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sites` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'Edinburgh'),(2,'London'),(3,'Paris'),(4,'New York'),(5,'Singapore'),(6,'Los Angeles');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `staff_newyork`
--

DROP TABLE IF EXISTS `staff_newyork`;
/*!50001 DROP VIEW IF EXISTS `staff_newyork`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `staff_newyork` AS SELECT 
 1 AS `id`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `phone`,
 1 AS `city`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `todo`
--

DROP TABLE IF EXISTS `todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL DEFAULT '',
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `priority` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todo`
--

LOCK TABLES `todo` WRITE;
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` VALUES (1,'Send business plan to clients',1,1),(2,'Web-site copy revisions',0,2),(3,'Review client tracking',0,2),(4,'E-mail catchup',0,3),(5,'Complete worksheet',0,4),(6,'Prep sales presentation',0,5);
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_dept`
--

DROP TABLE IF EXISTS `user_dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_dept` (
  `user_id` mediumint unsigned NOT NULL,
  `dept_id` mediumint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`dept_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `dept_id` (`dept_id`),
  CONSTRAINT `user_dept_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_dept_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_dept`
--

LOCK TABLES `user_dept` WRITE;
/*!40000 ALTER TABLE `user_dept` DISABLE KEYS */;
INSERT INTO `user_dept` VALUES (1,1),(2,4),(3,7),(4,3),(5,2),(6,6),(7,2),(8,1),(9,2),(10,3),(11,4),(12,5),(13,6),(14,4),(15,3),(16,6),(17,3),(18,7),(19,7),(20,1),(21,2),(22,6),(23,3),(24,4),(25,5),(26,6),(27,7),(28,2),(29,3),(30,1),(31,3),(32,4),(33,6),(34,7),(35,2),(36,3);
/*!40000 ALTER TABLE `user_dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permission` (
  `user_id` mediumint unsigned NOT NULL,
  `permission_id` mediumint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission`
--

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;
INSERT INTO `user_permission` VALUES (1,1),(2,1),(8,1),(10,1),(12,1),(13,1),(18,1),(20,1),(30,1),(34,1),(5,2),(7,2),(9,2),(10,2),(12,2),(13,2),(18,2),(20,2),(21,2),(22,2),(34,2),(35,2),(1,3),(4,3),(10,3),(13,3),(18,3),(20,3),(22,3),(30,3),(31,3),(34,3),(36,3),(1,4),(2,4),(4,4),(11,4),(21,4),(32,4),(4,5),(12,5),(30,5),(4,6),(6,6),(11,6),(13,6),(22,6),(33,6);
/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `removed_date` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `manager` int DEFAULT NULL,
  `site` int DEFAULT NULL,
  `image` int DEFAULT NULL,
  `shift_start` time DEFAULT NULL,
  `shift_end` time DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Miss','Quynn','Contreras','1-971-977-4681','Slidell','81080','2022-04-21 09:12:48','2012-04-06 18:53:00',NULL,0,1,1,NULL,'08:00:00','16:00:00',NULL),(2,'Mr','Kaitlin','Smith','1-436-523-6103','Orlando','U5G 7J3','2022-04-21 09:12:48','2012-11-20 05:58:25',NULL,1,1,2,NULL,'09:00:00','17:00:00',NULL),(3,'Mrs','Cruz','Reynolds','1-776-102-6352','Lynn','EJ89 9DQ','2022-04-21 09:12:48','2011-12-31 23:34:03',NULL,0,2,3,NULL,'09:00:00','17:00:00',NULL),(4,'Dr','Sophia','Morris','1-463-224-1405','Belleville','T1F 2X1','2022-04-21 09:12:48','2012-08-04 02:55:53',NULL,0,3,4,NULL,'08:00:00','15:30:00',NULL),(5,'Miss','Kamal','Roberson','1-134-408-5227','Rehoboth Beach','V7I 6T5','2022-04-21 09:12:48','2012-12-23 00:17:03',NULL,1,1,5,NULL,'09:00:00','17:00:00',NULL),(6,'Dr','Dustin','Rosa','1-875-919-3188','Jersey City','E4 8ZE','2022-04-21 09:12:48','2012-10-05 22:18:59',NULL,0,1,6,NULL,'09:00:00','17:00:00',NULL),(7,'Dr','Xantha','George','1-106-884-4754','Billings','Y2I 6J7','2022-04-21 09:12:48','2012-11-25 12:50:16',NULL,0,6,1,NULL,'07:00:00','15:00:00',NULL),(8,'Mrs','Bryar','Long','1-918-114-8083','San Bernardino','82983','2022-04-21 09:12:48','2012-05-14 23:32:25',NULL,0,1,2,NULL,'09:00:00','17:00:00',NULL),(9,'Mrs','Kuame','Wynn','1-101-692-4039','Truth or Consequences','21290','2022-04-21 09:12:48','2011-06-21 16:27:07',NULL,1,2,3,NULL,'06:00:00','14:00:00',NULL),(10,'Ms','Indigo','Brennan','1-756-756-8161','Moline','NO8 3UY','2022-04-21 09:12:48','2011-02-19 12:51:08',NULL,1,5,4,NULL,'12:00:00','00:00:00',NULL),(11,'Mrs','Avram','Allison','1-751-507-2640','Rancho Palos Verdes','I7Q 8H4','2022-04-21 09:12:48','2012-12-30 17:02:10',NULL,0,1,5,NULL,'09:00:00','17:00:00',NULL),(12,'Mr','Martha','Burgess','1-971-722-1203','Toledo','Q5R 9HI','2022-04-21 09:12:48','2011-02-04 17:25:55',NULL,1,1,6,NULL,'12:00:00','00:00:00',NULL),(13,'Miss','Lael','Kim','1-626-697-2194','Lake Charles','34209','2022-04-21 09:12:48','2012-07-24 06:44:22',NULL,1,7,1,NULL,'09:00:00','17:00:00',NULL),(14,'Dr','Lyle','Lewis','1-231-793-3520','Simi Valley','H9B 2H4','2022-04-21 09:12:48','2012-08-30 03:28:54',NULL,0,1,2,NULL,'00:00:00','12:00:00',NULL),(15,'Miss','Veronica','Marks','1-750-981-6759','Glens Falls','E3C 5D1','2022-04-21 09:12:48','2012-08-14 12:09:24',NULL,1,2,3,NULL,'09:00:00','17:00:00',NULL),(16,'Mrs','Wynne','Ruiz','1-983-744-5362','Branson','L9E 6E2','2022-04-21 09:12:48','2012-11-06 01:04:07',NULL,0,1,4,NULL,'12:00:00','00:00:00',NULL),(17,'Ms','Jessica','Bryan','1-949-932-6772','Boulder City','F5P 6NU','2022-04-21 09:12:48','2013-02-01 20:22:33',NULL,0,5,5,NULL,'09:00:00','17:00:00',NULL),(18,'Ms','Quinlan','Hyde','1-625-664-6072','Sheridan','Y8A 1LQ','2022-04-21 09:12:48','2011-10-25 16:53:45',NULL,1,1,6,NULL,'08:00:00','15:00:00',NULL),(19,'Miss','Mona','Terry','1-443-179-7343','Juneau','G62 1OF','2022-04-21 09:12:48','2012-01-15 09:26:59',NULL,0,1,1,NULL,'08:30:00','16:30:00',NULL),(20,'Mrs','Medge','Patterson','1-636-979-0497','Texarkana','I5U 6E0','2022-04-21 09:12:48','2012-10-20 16:26:18',NULL,1,1,2,NULL,'09:00:00','17:00:00',NULL),(21,'Mrs','Perry','Gamble','1-440-976-9560','Arcadia','98923','2022-04-21 09:12:48','2012-06-06 02:03:49',NULL,1,2,3,NULL,'00:00:00','12:00:00',NULL),(22,'Mrs','Pandora','Armstrong','1-197-431-4390','Glendora','34124','2022-04-21 09:12:48','2011-08-29 01:45:06',NULL,0,7,4,NULL,'21:00:00','03:00:00',NULL),(23,'Mr','Pandora','Briggs','1-278-288-9221','Oneida','T9M 4H9','2022-04-21 09:12:48','2012-07-16 08:44:41',NULL,1,4,5,NULL,'09:00:00','17:00:00',NULL),(24,'Mrs','Maris','Leblanc','1-936-114-2921','Cohoes','V1H 6Z7','2022-04-21 09:12:48','2011-05-04 13:07:04',NULL,1,1,6,NULL,'00:00:00','12:00:00',NULL),(25,'Mrs','Ishmael','Crosby','1-307-243-2684','Midwest City','T6 8PS','2022-04-21 09:12:48','2011-07-02 23:11:11',NULL,0,3,1,NULL,'09:00:00','17:00:00',NULL),(26,'Miss','Quintessa','Pickett','1-801-122-7471','North Tonawanda','09166','2022-04-21 09:12:48','2013-02-05 10:33:22',NULL,1,1,2,NULL,'12:00:00','00:00:00',NULL),(27,'Miss','Ifeoma','Mays','1-103-883-0962','Parkersburg','87377','2022-04-21 09:12:48','2011-08-22 12:19:09',NULL,0,1,3,NULL,'09:00:00','17:00:00',NULL),(28,'Mrs','Basia','Harrell','1-528-238-4178','Cody','LJ54 1IU','2022-04-21 09:12:48','2012-05-07 14:42:55',NULL,1,1,4,NULL,'09:00:00','17:00:00',NULL),(29,'Mrs','Hamilton','Blackburn','1-676-857-1423','Delta Junction','X5 9HE','2022-04-21 09:12:48','2011-05-19 07:39:48',NULL,0,6,5,NULL,'10:00:00','18:00:00',NULL),(30,'Ms','Dexter','Burton','1-275-332-8186','Gainesville','65914','2022-04-21 09:12:48','2013-02-01 16:21:20',NULL,1,5,6,NULL,'21:00:00','03:00:00',NULL),(31,'Mrs','Quinn','Mccall','1-808-916-4497','Fallon','X4 8UB','2022-04-21 09:12:48','2012-03-24 19:31:51',NULL,0,1,1,NULL,'09:00:00','17:00:00',NULL),(32,'Mr','Alexa','Wilder','1-727-307-1997','Johnson City','16765','2022-04-21 09:12:48','2011-10-14 08:21:14',NULL,0,3,2,NULL,'09:00:00','17:00:00',NULL),(33,'Ms','Rhonda','Harrell','1-934-906-6474','Minnetonka','I2R 1H2','2022-04-21 09:12:48','2011-11-15 00:08:02',NULL,1,1,3,NULL,'12:00:00','00:00:00',NULL),(34,'Mrs','Jocelyn','England','1-826-860-7773','Chico','71102','2022-04-21 09:12:48','2012-05-31 18:01:43',NULL,1,1,4,NULL,'09:00:00','17:00:00',NULL),(35,'Dr','Vincent','Banks','1-225-418-0941','Palo Alto','03281','2022-04-21 09:12:48','2011-08-07 07:22:43',NULL,0,1,5,NULL,'18:00:00','02:00:00',NULL),(36,'Mrs','Stewart','Chan','1-781-793-2340','Grand Forks','L1U 3ED','2022-04-21 09:12:48','2012-11-01 23:14:44',NULL,1,6,6,NULL,'08:00:00','16:00:00',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`%`*/ /*!50003 TRIGGER `users_insert` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.updated_date = IFNULL(NEW.updated_date, NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`%`*/ /*!50003 TRIGGER `users_update` BEFORE UPDATE ON `users` FOR EACH ROW SET NEW.updated_date = IFNULL(NEW.updated_date, NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users_files`
--

DROP TABLE IF EXISTS `users_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_files` (
  `user_id` int NOT NULL,
  `file_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_files`
--

LOCK TABLES `users_files` WRITE;
/*!40000 ALTER TABLE `users_files` DISABLE KEYS */;
INSERT INTO `users_files` VALUES (6,2),(5,5),(11,11),(11,12),(1,13),(10,14),(8,15);
/*!40000 ALTER TABLE `users_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_visits`
--

DROP TABLE IF EXISTS `users_visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_visits` (
  `user_id` int NOT NULL,
  `site_id` int NOT NULL,
  `visit_date` date NOT NULL,
  PRIMARY KEY (`user_id`,`visit_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_visits`
--

LOCK TABLES `users_visits` WRITE;
/*!40000 ALTER TABLE `users_visits` DISABLE KEYS */;
INSERT INTO `users_visits` VALUES (1,1,'2016-08-12'),(1,4,'2016-08-14'),(1,7,'2016-08-19'),(2,6,'2016-07-01'),(2,2,'2016-07-07'),(2,3,'2016-07-12'),(2,1,'2016-07-30'),(3,1,'2016-06-26'),(3,2,'2016-12-05'),(4,4,'2016-10-10'),(4,3,'2016-11-21'),(5,5,'2016-08-02'),(6,6,'2016-08-05');
/*!40000 ALTER TABLE `users_visits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `staff_newyork`
--

/*!50001 DROP VIEW IF EXISTS `staff_newyork`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `staff_newyork` AS select `users`.`id` AS `id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone` AS `phone`,`users`.`city` AS `city` from `users` where `users`.`site` in (select `sites`.`id` from `sites` where (`sites`.`name` = 'New York')) */;
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

-- Dump completed on 2022-05-24 23:32:27
