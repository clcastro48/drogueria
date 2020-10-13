-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: drogueria
-- ------------------------------------------------------
-- Server version	5.6.47-log

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `n_identificacion` int(11) NOT NULL,
  `nombre_comp` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `tipo_identificacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,1058900638,'Juan Pedro Gonzalez Díaz','','CC');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio_u` varchar(45) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `presentacion` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `laboratorio` varchar(100) DEFAULT NULL,
  `concentracion` varchar(45) DEFAULT NULL,
  `subcategoria` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
INSERT INTO `medicamento` VALUES (1,'Ibuprofeno','10000',7,'Medicamentos','Caja',60,'Coasfarma','600 MG','Generico','Activo'),(2,'Equipo Buretrol','10000',0,'Dispositivos medicos','Unidad',1,'Master Medical',NULL,'N/A','Activo'),(3,'Naproxeno','15000',0,'Medicamentos','Caja',20,'Coasfarma','250 MG','Comercial','Activo');
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comp` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `idUsuario_UNIQUE` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Administrador',123,'d6bf4bb9a66419380a7e8b034270d381','Activo'),(2,'Cindy Lorena Castro',1062544289,'f7b387120ec2d7ae8b8e569bede36cb5','Inactivo'),(3,'Pedro Rodriguez Cepeda',12345678,'66c49a5feca883debdb189f67da14881','Activo'),(4,'Luisa Fernada Alvarez',1062584062,'f7b387120ec2d7ae8b8e569bede36cb5','Activo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `total` double NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL DEFAULT '0',
  `Cliente_idCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVenta`,`Usuario_idUsuario`),
  KEY `fk_Venta_Cliente_idx` (`Cliente_idCliente`),
  KEY `fk_Venta_Usuario` (`Usuario_idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (11,'2020-10-13 00:00:00',20000,123,NULL);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_has_medicamento`
--

DROP TABLE IF EXISTS `venta_has_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta_has_medicamento` (
  `Venta_idVenta` int(11) NOT NULL,
  `Venta_Usuario_idUsuario` int(11) NOT NULL,
  `Medicamento_idMedicamento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_u` double NOT NULL,
  PRIMARY KEY (`Venta_idVenta`,`Venta_Usuario_idUsuario`,`Medicamento_idMedicamento`),
  KEY `fk_Venta_has_Medicamento_Medicamento1` (`Medicamento_idMedicamento`),
  CONSTRAINT `fk_Venta_has_Medicamento_Medicamento1` FOREIGN KEY (`Medicamento_idMedicamento`) REFERENCES `medicamento` (`idMedicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_has_Medicamento_Venta1` FOREIGN KEY (`Venta_idVenta`, `Venta_Usuario_idUsuario`) REFERENCES `venta` (`idVenta`, `Usuario_idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_has_medicamento`
--

LOCK TABLES `venta_has_medicamento` WRITE;
/*!40000 ALTER TABLE `venta_has_medicamento` DISABLE KEYS */;
INSERT INTO `venta_has_medicamento` VALUES (11,123,1,2,10000);
/*!40000 ALTER TABLE `venta_has_medicamento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-13  6:28:45
