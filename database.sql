-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: spas12    Database: dispute_tracker
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Current Database: `dispute_tracker`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dispute_tracker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dispute_tracker`;

--
-- Table structure for table `dspt_email_history`
--

DROP TABLE IF EXISTS `dspt_email_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dspt_email_history` (
  `id` int(11) NOT NULL auto_increment,
  `despute_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `error_code` varchar(250) default NULL,
  `edate` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dspt_email_history`
--

LOCK TABLES `dspt_email_history` WRITE;
/*!40000 ALTER TABLE `dspt_email_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `dspt_email_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dspt_history`
--

DROP TABLE IF EXISTS `dspt_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dspt_history` (
  `history_id` int(11) NOT NULL auto_increment,
  `despute_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `findings` text,
  `resolution` text,
  `status` varchar(20) NOT NULL default 'NEW',
  `remarks` varchar(200) default NULL,
  `hdate` datetime default NULL,
  PRIMARY KEY  (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dspt_history`
--

LOCK TABLES `dspt_history` WRITE;
/*!40000 ALTER TABLE `dspt_history` DISABLE KEYS */;
INSERT INTO `dspt_history` VALUES (371,188,3,NULL,NULL,'NEW',NULL,NULL),(372,188,3,'this is a test!','this is a test!','PENDING','this is a test!','2011-09-22 16:22:29'),(373,188,3,'closed!','closed!closed!','RESOLVED','closed!closed!closed!%\\/+=)(*@#)$&*#&&Q#$','2011-09-22 16:26:02'),(374,189,3,NULL,NULL,'NEW',NULL,NULL),(375,189,3,'this is a pending test!','this is a pending test!','PENDING','this is a pending test!','2011-09-22 16:43:23'),(376,189,3,'this is a resolved test!','this is a resolved test!','RESOLVED','this is a resolved test!','2011-09-22 16:47:22'),(377,190,3,NULL,NULL,'NEW',NULL,NULL);
/*!40000 ALTER TABLE `dspt_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dspt_info`
--

DROP TABLE IF EXISTS `dspt_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dspt_info` (
  `despute_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) default 'NEW',
  `subj_line` varchar(200) NOT NULL,
  `adsl` varchar(45) default NULL,
  `mobile` varchar(45) default NULL,
  `iptv` varchar(45) default NULL,
  `inst_add` varchar(100) default NULL,
  `name` varchar(45) default NULL,
  `nric` varchar(45) default NULL,
  `product` varchar(45) default NULL,
  `reason` text NOT NULL,
  `rdate` datetime NOT NULL,
  PRIMARY KEY  (`despute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dspt_info`
--

LOCK TABLES `dspt_info` WRITE;
/*!40000 ALTER TABLE `dspt_info` DISABLE KEYS */;
INSERT INTO `dspt_info` VALUES (188,3,'NEW','dispute tracker 12','4536453453','asetdfasertqwe5675','setfgsdg12321','sdfgsdf12312','dfgsdfg426354','xdfgsdf21312','dsfgsdfg','sdfgsdfgsdgfatrw456tfdv','2011-09-22 16:21:06'),(189,3,'NEW','new testing dispute1212','asdfasf','asdfasdfasasdfg','asdgasdgfasdg','asdfgasdfas','asdfasdf','asdfasdfasasdf','asdfasdfasdf','asdfasdfsaf','2011-09-22 16:35:23'),(190,3,'NEW','dispute tracker 12123','asdfasdfa','asdfadsfasdf','asdfasdfas','asdfasdfas','asdfasdfa','asdfasdfas','asdfasdf','asdfasdfasdf','2011-09-22 17:14:54');
/*!40000 ALTER TABLE `dspt_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dspt_users`
--

DROP TABLE IF EXISTS `dspt_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dspt_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `udate` datetime NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dspt_users`
--

LOCK TABLES `dspt_users` WRITE;
/*!40000 ALTER TABLE `dspt_users` DISABLE KEYS */;
INSERT INTO `dspt_users` VALUES (3,'cedrick macatangay','cedrick','f57921c22b2e093d7eff9ac1cc7e22e8','2011-09-12 16:59:33'),(4,'james taylor','james','f57921c22b2e093d7eff9ac1cc7e22e8','2011-09-14 21:52:50'),(5,'lambert','ambet','42f5e6cc2889a98aef2e557fcfcdd8a3','2011-09-20 22:12:36');
/*!40000 ALTER TABLE `dspt_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-22 20:39:51
