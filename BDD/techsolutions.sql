-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: techsolutions
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'Corsaires64Go','RM0001'),(2,'R9 9950X','CP0001'),(3,'I9 ultra 285k','CP0002'),(4,'RTX5080Phx','GP0001'),(5,'RTX5090','GP0002'),(6,'Asus X670E','CM0001'),(7,'Asus X870E','CM0002'),(8,'Fractal7XLTG','BT0001'),(9,'Lian Li O11 Dynamic EVO XL ','BT0002'),(10,'ASUS ProArt PA32UCX ','EC0001'),(11,'LG UltraFine 32U990A ','EC0002'),(12,'Logitech MX Master 3S + MX Keys S ','CS0001'),(13,'Samsung 9100 Pro  NVMe 2 To ','SD0001'),(14,'Samsung 990 PRO PCIe 4.0 NVMe 1 To ','SD0002'),(15,'I5-14400','CP0003'),(16,' Ryzen 5 7600 ','CP0004'),(17,'MSI B760PRO-A WiFi DDR5 ','CM0003'),(18,'ASUS TUF GAMING B650-PLUS WiFi ','CM0004'),(19,'Corsair Vengeance 16 Go DDR5 5200 MHz ','RM0002'),(20,'G.Skill Flare X5 16 Go DDR5 5600 MHz ','RM0003'),(21,'Samsung 990 PRO 1 To ','SD0003'),(22,'WD Black SN850X 1 To ','SD0004'),(23,'Corsair RM650x?650W(Gold) ','AL0001'),(24,' Pure Power 12M?650W ','AL0002'),(25,'Logitech MK850 Combo\n','CS0002'),(26,'Microsoft Sculpt Ergonomic Desktop ','CS0003'),(27,'Logitech H390 USB ','CQ0001'),(28,'EPOS Adapt 160 USB II ','CQ0002'),(29,'Intel Core i7-14700K ','CP0005'),(30,'AMD Ryzen 7 7800X3D ','CP0006'),(31,'ASUS PRIME Z790-P WiFi DDR5 ','CM0005'),(32,'Gigabyte B650 AORUS ELITE AX ','CM0006'),(33,'Corsair Vengeance 32 Go DDR5 6000 MHz ','RM0004'),(34,'G.Skill Trident Z5 32 Go DDR5 6000 MHz ','RM0005'),(35,'Samsung 990 PRO 2 To ','SD0005'),(36,'WD Black SN850X 2 To ','SD0006'),(37,'Corsair RM750e ? 750W (Gold) \n','AL0003'),(38,'Seasonic Focus GX-750 ? 750W (Gold) ','AL0004'),(39,'Dell UltraSharp U2723QE ? 27\" 4K (IPS, USB-C Hub)\n','EC0003'),(40,'ASUS ProArt PA278CV ? 27\" QHD ','EC0004'),(41,'Clavier + Souris?logitech MX keys S avec repose poignet? ','CS0004'),(42,'apex pro tkl+g502X','CS0005'),(43,'RTX5070','GP0005'),(44,'I7-14700','CP0007'),(45,'R7 7700X ','CP0008'),(46,'Intel B760 ','CM0007'),(47,'AMD B650 ','CM0008'),(48,'Corsair Vengeance 32Go','RM0006'),(49,'Samsung 990 Pro ','SD0007'),(50,'Crucial T500 ','SD0008'),(51,'NVIDIA GeForce GT 1030','GP0006'),(52,'Quadro P1000\n','GP0007'),(53,'Fractal Design Define 7 ',''),(54,'be quiet! Pure Base 500DX ',''),(55,'be quiet! Pure Power 13 M ',''),(56,'Corsair RM650e ',''),(57,'AMD Ryzen 9 7900X? ',''),(58,'Intel Core i7-14700 ',''),(59,'?RTX 4060 Ti ',''),(60,'quadro t400',''),(61,'MSI MPG X670E Carbon\n',''),(62,'MSI MAG B650 Tomahawk ',''),(63,'Crucial Pro  32GB Kit DDR5? ',''),(64,'Corsair Vengeance 32GB 5200MHz ',''),(65,'Samsung SSD 870 EVO 2 To\n',''),(66,'Samsung 990 Pro 2 To ',''),(67,'Fractal Design Define 7 ',''),(68,'be quiet! Pure Base 500DX ',''),(69,'Logitech MK470 ',''),(70,'Logitech MX Keys Combo ',''),(71,'MSI G32CQ5P',''),(72,'RTX 5070',NULL),(73,'be quiet! Pure Power 13 M ',NULL),(74,'ASUS ProArt PA278CV',NULL),(75,'Ryzen 5 7600\r\n',NULL),(76,'RX 6600\r\n',NULL),(77,'corsair vengeance 32 go  ',NULL),(78,'Samsung 990 EVO 1 To',NULL),(79,'ASUS B650 Prime',NULL),(80,'BeQuiet 550 W',NULL),(81,'NZXT H5 Flow',NULL),(82,'Ryzen 9 7950X',NULL),(83,'ASUS ProArt B650-CREATOR',NULL),(84,'Corsair Vengeance 64 Go',NULL),(85,'Samsung 990 Pro 2 To ',NULL),(86,'be quiet! Pure Power 13 M — 650 W',NULL),(87,'Fractal Design Define 7',NULL),(91,'Corsair RM650x–650W(Gold) ',NULL);
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc_components`
--

DROP TABLE IF EXISTS `pc_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pc_components` (
  `pc_id` int(10) unsigned NOT NULL,
  `component_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pc_id`,`component_id`),
  KEY `component_id` (`component_id`),
  CONSTRAINT `pc_components_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `pcs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc_components`
--

LOCK TABLES `pc_components` WRITE;
/*!40000 ALTER TABLE `pc_components` DISABLE KEYS */;
INSERT INTO `pc_components` VALUES (1,1),(1,2),(1,4),(1,6),(1,9),(1,10),(1,12),(1,13),(2,15),(2,17),(2,19),(2,21),(2,25),(2,28),(2,87),(2,91),(3,29),(3,31),(3,33),(3,35),(3,37),(3,42),(3,72),(3,74),(3,87),(4,42),(4,44),(4,46),(4,48),(4,49),(4,52),(4,53),(4,73),(5,12),(5,19),(5,31),(5,35),(5,44),(5,60),(5,67),(5,71),(6,75),(6,76),(6,77),(6,78),(6,79),(6,80),(6,81),(7,82),(7,83),(7,84),(7,85),(7,86),(7,87);
/*!40000 ALTER TABLE `pc_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcs`
--

DROP TABLE IF EXISTS `pcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
INSERT INTO `pcs` VALUES (1,'PC Design','https://media.topachat.com/media/s750/651424f19ac1055b6b5148ba.jpg',1500.00),(2,'PC RH','https://www.fractal-design.com/app/uploads/2022/07/Define_7_Mini_TGL_5-2560-2160x1527.jpg',1200.00),(3,'PC Dev','https://media.materiel.net/bo-images/fiches/Composants%20PC/Boital/Fractal%20Design/Define%207%20Compact%20Solid/texte2.JPG',999.00),(4,'PC Direction ','https://tpucdn.com/review/fractal-define-7-atx-case/images/title.jpg',0.00),(5,'PC Support Client','https://media.ldlc.com/bo/images/fiches/Bo%C3%AEtier_PC/Fractal_Design/define_7_compact/Define7WhiteTGC-800_2.jpg',990.00),(6,'PC Marketing','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIEtNH1dgrgCyaIktJEXcXp-veoz0BBom56wROTGLZcBVVXBDf2HmSQxgRW3VtjN9B5qc&usqp=CAU',0.00),(7,'PC Gestion Infrastructure reseau','https://geekawhat.com/wp-content/uploads/2024/08/FI_NZXT-H5-Flow-2024-New.jpg',1500.00);
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-12  8:32:26
