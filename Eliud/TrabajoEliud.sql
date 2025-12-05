CREATE DATABASE  IF NOT EXISTS `bd_web_sobriedad` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_web_sobriedad`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_web_sobriedad
-- ------------------------------------------------------
-- Server version	9.4.0

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
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `idLogin` int NOT NULL AUTO_INCREMENT,
  `nombreLogin` varchar(45) DEFAULT NULL,
  `passwordLogin` varchar(256) DEFAULT NULL,
  `fechaCreacionLogin` date DEFAULT NULL,
  `statusLogin` tinyint DEFAULT NULL,
  `idUsuarios` int DEFAULT NULL,
  `idrol_usuario` int DEFAULT NULL,
  PRIMARY KEY (`idLogin`),
  KEY `fk_usuario_login_idx` (`idUsuarios`),
  KEY `fk_rol_usuario_login_idx` (`idrol_usuario`),
  CONSTRAINT `fk_rol_usuario_login` FOREIGN KEY (`idrol_usuario`) REFERENCES `rol_usuarios` (`idrolUsuarios`),
  CONSTRAINT `fk_usuario_login` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'epr','123456','2025-10-24',1,1,1),(2,'pepe','300365','2025-10-24',1,2,3),(3,'lalo','1254','2025-10-27',1,5,2),(4,'HombrePay','224','2025-10-27',1,6,2),(5,'HombrePay','224','2025-10-27',1,7,2),(6,'HombrePay','224','2025-10-27',1,8,2);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_usuarios`
--

DROP TABLE IF EXISTS `rol_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_usuarios` (
  `idrolUsuarios` int NOT NULL AUTO_INCREMENT,
  `nombreRolUsuario` varchar(45) DEFAULT NULL,
  `descripcionRolUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrolUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_usuarios`
--

LOCK TABLES `rol_usuarios` WRITE;
/*!40000 ALTER TABLE `rol_usuarios` DISABLE KEYS */;
INSERT INTO `rol_usuarios` VALUES (1,'administrador','tiene todos los permisos'),(2,'cliente','permisos de registrar y consultar'),(3,'invitado','permisos de consulta');
/*!40000 ALTER TABLE `rol_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(45) DEFAULT NULL,
  `apPaterno` varchar(45) DEFAULT NULL,
  `apMaterno` varchar(45) DEFAULT NULL,
  `emailUsuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Angel','Jimenez','Garcia','angel2@gmail.com'),(2,'Alan','Cruz','Reyes','alangamer22@gmail.com'),(3,'Jose','Martinez','Arias','lupe123@gmail.com'),(4,'Yarethzi','Salvador','Alonso','hdyt43@gmail.com'),(5,'angel','jimenez','garcia','24300672@uttt.edu.mx'),(6,'Ethan','Almanaz','Rivera','utbs2@gmail.com'),(7,'Ethan','Almanaz','Rivera','utbs2@gmail.com'),(8,'Ethan','Almanaz','Rivera','utbs2@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-30 19:25:12
