-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: datatables
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` double DEFAULT NULL,
  `idade` int DEFAULT NULL,
  `dt_registro` datetime DEFAULT NULL,
  `dt_exclusao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Marlan Silva Fagundes',6000,30,'2023-12-27 11:57:45','2024-01-06 11:57:45'),(2,'Mayla de Haro Sangaletti',10000,30,NULL,NULL),(3,'Lorenzo Sangaletti Fagundes',45000,18,NULL,NULL),(4,'Aparecida Pereira da Silva Fagundes',3000,68,NULL,NULL),(5,'Felipe Fagundes Silva',7000,25,'2023-12-27 11:57:45','2023-12-30 11:57:45'),(6,'Joao Paulo Araujo',7000,25,NULL,NULL),(7,'Adna Pereira de Haro',3000,55,NULL,NULL),(8,'Leonir Jose Sangaletti',5000,66,'2023-12-27 11:57:45','2023-12-30 11:57:45'),(9,'João das Neves',1000,35,NULL,NULL),(10,'Marcos da Silva Pereira',1500,30,NULL,NULL),(11,'Jona da Silva',1000,20,NULL,NULL),(12,'Kevin da Silva',1000,25,NULL,NULL),(13,'Rafael Pereira dos Santos',3000,45,NULL,NULL),(14,'Guilherme de Oliveira',5000,55,NULL,NULL),(15,'Mariana Silva de Jesus',2000,50,'2023-12-27 11:57:45','2023-12-30 11:57:45'),(16,'Pedro de Souza Filho',1800,48,NULL,NULL),(17,'Paula Fernandes de Melo',1600,39,NULL,NULL),(18,'Matheus Rufalo',1300,30,NULL,NULL),(19,'Jeovane Pinheiro dos Santos',1500,30,NULL,NULL),(20,'Roberval de Oliveira Prado',1000,47,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'datatables'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-02 16:31:37
