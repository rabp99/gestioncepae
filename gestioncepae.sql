CREATE DATABASE  IF NOT EXISTS `gestioncepae` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gestioncepae`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: gestioncepae
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,232),(2,1,NULL,NULL,'Alumnos',2,19),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'view',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,2,NULL,NULL,'getAlumnos',13,14),(9,2,NULL,NULL,'getPadre0ByDni',15,16),(10,2,NULL,NULL,'getPadre1ByDni',17,18),(11,1,NULL,NULL,'Aniolectivos',20,31),(12,11,NULL,NULL,'index',21,22),(13,11,NULL,NULL,'add',23,24),(14,11,NULL,NULL,'view',25,26),(15,11,NULL,NULL,'edit',27,28),(16,11,NULL,NULL,'delete',29,30),(17,1,NULL,NULL,'Areas',32,43),(18,17,NULL,NULL,'index',33,34),(19,17,NULL,NULL,'add',35,36),(20,17,NULL,NULL,'view',37,38),(21,17,NULL,NULL,'edit',39,40),(22,17,NULL,NULL,'delete',41,42),(23,1,NULL,NULL,'Asignaciones',44,51),(24,23,NULL,NULL,'index',45,46),(25,23,NULL,NULL,'registrar',47,48),(26,23,NULL,NULL,'getAsignaciones',49,50),(27,1,NULL,NULL,'Bimestres',52,63),(28,27,NULL,NULL,'index',53,54),(29,27,NULL,NULL,'add',55,56),(30,27,NULL,NULL,'view',57,58),(31,27,NULL,NULL,'edit',59,60),(32,27,NULL,NULL,'delete',61,62),(33,1,NULL,NULL,'Conceptos',64,77),(34,33,NULL,NULL,'index',65,66),(35,33,NULL,NULL,'add',67,68),(36,33,NULL,NULL,'view',69,70),(37,33,NULL,NULL,'edit',71,72),(38,33,NULL,NULL,'delete',73,74),(39,33,NULL,NULL,'getFormByAniolectivo',75,76),(40,1,NULL,NULL,'Cursos',78,89),(41,40,NULL,NULL,'index',79,80),(42,40,NULL,NULL,'add',81,82),(43,40,NULL,NULL,'view',83,84),(44,40,NULL,NULL,'edit',85,86),(45,40,NULL,NULL,'delete',87,88),(46,1,NULL,NULL,'Docentes',90,103),(47,46,NULL,NULL,'index',91,92),(48,46,NULL,NULL,'add',93,94),(49,46,NULL,NULL,'view',95,96),(50,46,NULL,NULL,'edit',97,98),(51,46,NULL,NULL,'delete',99,100),(52,46,NULL,NULL,'getDocentes',101,102),(53,1,NULL,NULL,'Grados',104,117),(54,53,NULL,NULL,'index',105,106),(55,53,NULL,NULL,'add',107,108),(56,53,NULL,NULL,'view',109,110),(57,53,NULL,NULL,'edit',111,112),(58,53,NULL,NULL,'delete',113,114),(59,53,NULL,NULL,'getByIdnivel',115,116),(60,1,NULL,NULL,'Groups',118,125),(61,60,NULL,NULL,'index',119,120),(62,60,NULL,NULL,'view',121,122),(63,60,NULL,NULL,'add',123,124),(64,1,NULL,NULL,'Matriculas',126,135),(65,64,NULL,NULL,'index',127,128),(66,64,NULL,NULL,'add',129,130),(67,64,NULL,NULL,'view',131,132),(68,64,NULL,NULL,'delete',133,134),(69,1,NULL,NULL,'Niveles',136,147),(70,69,NULL,NULL,'index',137,138),(71,69,NULL,NULL,'add',139,140),(72,69,NULL,NULL,'view',141,142),(73,69,NULL,NULL,'edit',143,144),(74,69,NULL,NULL,'delete',145,146),(75,1,NULL,NULL,'Notas',148,159),(76,75,NULL,NULL,'index',149,150),(77,75,NULL,NULL,'administrar',151,152),(78,75,NULL,NULL,'registrar',153,154),(79,75,NULL,NULL,'getFormNotas',155,156),(80,75,NULL,NULL,'getFormRegistro',157,158),(81,1,NULL,NULL,'Pages',160,163),(82,81,NULL,NULL,'display',161,162),(83,1,NULL,NULL,'Pagos',164,173),(84,83,NULL,NULL,'index',165,166),(85,83,NULL,NULL,'registrar',167,168),(86,83,NULL,NULL,'view',169,170),(87,83,NULL,NULL,'getFormPagos',171,172),(88,1,NULL,NULL,'Reportes',174,179),(89,88,NULL,NULL,'index',175,176),(90,88,NULL,NULL,'notas',177,178),(91,1,NULL,NULL,'Secciones',180,195),(92,91,NULL,NULL,'index',181,182),(93,91,NULL,NULL,'add',183,184),(94,91,NULL,NULL,'view',185,186),(95,91,NULL,NULL,'edit',187,188),(96,91,NULL,NULL,'delete',189,190),(97,91,NULL,NULL,'getByIdgrado',191,192),(98,91,NULL,NULL,'getNextSeccion',193,194),(99,1,NULL,NULL,'Turnos',196,207),(100,99,NULL,NULL,'index',197,198),(101,99,NULL,NULL,'add',199,200),(102,99,NULL,NULL,'view',201,202),(103,99,NULL,NULL,'edit',203,204),(104,99,NULL,NULL,'delete',205,206),(105,1,NULL,NULL,'Users',208,229),(106,105,NULL,NULL,'initDB',209,210),(107,105,NULL,NULL,'index',211,212),(108,105,NULL,NULL,'view',213,214),(109,105,NULL,NULL,'add',215,216),(110,105,NULL,NULL,'edit',217,218),(111,105,NULL,NULL,'delete',219,220),(112,105,NULL,NULL,'login',221,222),(113,105,NULL,NULL,'logout',223,224),(114,105,NULL,NULL,'manage_usuario',225,226),(115,105,NULL,NULL,'change_password',227,228),(116,1,NULL,NULL,'AclExtras',230,231);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(60) NOT NULL,
  `apellidoMaterno` varchar(60) NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `fechaNac` date NOT NULL,
  `lugarNac` varchar(60) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `colegioProc` varchar(60) DEFAULT NULL,
  `seguro` char(1) DEFAULT NULL,
  `aseguradora` varchar(60) DEFAULT NULL,
  `lugarAten` varchar(60) DEFAULT NULL,
  `alergias` varchar(300) DEFAULT NULL,
  `recomendado` varchar(30) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idalumno`,`iduser`),
  KEY `fk_alumnos_users1_idx` (`iduser`),
  CONSTRAINT `fk_alumnos_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos_padres`
--

DROP TABLE IF EXISTS `alumnos_padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos_padres` (
  `idpadre` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  PRIMARY KEY (`idpadre`,`idalumno`),
  KEY `fk_padres_has_alumnos_alumnos1_idx` (`idalumno`),
  KEY `fk_padres_has_alumnos_padres1_idx` (`idpadre`),
  CONSTRAINT `fk_padres_has_alumnos_padres1` FOREIGN KEY (`idpadre`) REFERENCES `padres` (`idpadre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_padres_has_alumnos_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos_padres`
--

LOCK TABLES `alumnos_padres` WRITE;
/*!40000 ALTER TABLE `alumnos_padres` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumnos_padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aniolectivos`
--

DROP TABLE IF EXISTS `aniolectivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aniolectivos` (
  `idaniolectivo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo\n2 => desactivado\n3 => último año lectivo',
  PRIMARY KEY (`idaniolectivo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aniolectivos`
--

LOCK TABLES `aniolectivos` WRITE;
/*!40000 ALTER TABLE `aniolectivos` DISABLE KEYS */;
INSERT INTO `aniolectivos` VALUES (1,'2015','2015-03-02','2015-12-21','1');
/*!40000 ALTER TABLE `aniolectivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `importancia` int(10) unsigned DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',1,NULL,1,2),(2,NULL,'Group',2,NULL,3,4),(3,NULL,'Group',3,NULL,5,6),(4,NULL,'Group',4,NULL,7,8);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1'),(2,2,1,'1','1','1','1'),(3,3,1,'1','1','1','1'),(4,4,1,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaciones` (
  `idasignacion` int(11) NOT NULL AUTO_INCREMENT,
  `idseccion` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idasignacion`,`idseccion`,`idcurso`,`iddocente`),
  KEY `fk_clases_secciones1_idx` (`idseccion`),
  KEY `fk_clases_cursos1_idx` (`idcurso`),
  KEY `fk_asignaciones_docentes1_idx` (`iddocente`),
  CONSTRAINT `fk_clases_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_cursos1` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaciones_docentes1` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciones`
--

LOCK TABLES `asignaciones` WRITE;
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bimestres`
--

DROP TABLE IF EXISTS `bimestres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bimestres` (
  `idbimestre` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idbimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bimestres`
--

LOCK TABLES `bimestres` WRITE;
/*!40000 ALTER TABLE `bimestres` DISABLE KEYS */;
/*!40000 ALTER TABLE `bimestres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conceptos`
--

DROP TABLE IF EXISTS `conceptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conceptos` (
  `idconcepto` int(11) NOT NULL AUTO_INCREMENT,
  `idaniolectivo` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idconcepto`,`idaniolectivo`),
  KEY `fk_conceptos_aniolectivos1_idx` (`idaniolectivo`),
  CONSTRAINT `fk_conceptos_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conceptos`
--

LOCK TABLES `conceptos` WRITE;
/*!40000 ALTER TABLE `conceptos` DISABLE KEYS */;
/*!40000 ALTER TABLE `conceptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `idgrado` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcurso`,`idgrado`,`idarea`),
  KEY `fk_cursos_grados1_idx` (`idgrado`),
  KEY `fk_cursos_areas1_idx` (`idarea`),
  CONSTRAINT `fk_cursos_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallenotas`
--

DROP TABLE IF EXISTS `detallenotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallenotas` (
  `iddetallenota` int(11) NOT NULL AUTO_INCREMENT,
  `idnota` int(11) NOT NULL,
  `idmatricula` int(11) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddetallenota`,`idnota`,`idmatricula`),
  KEY `fk_detallenotas_notas1_idx` (`idnota`),
  KEY `fk_detallenotas_matriculas1_idx` (`idmatricula`),
  CONSTRAINT `fk_detallenotas_notas1` FOREIGN KEY (`idnota`) REFERENCES `notas` (`idnota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallenotas_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallenotas`
--

LOCK TABLES `detallenotas` WRITE;
/*!40000 ALTER TABLE `detallenotas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallenotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepagos`
--

DROP TABLE IF EXISTS `detallepagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepagos` (
  `iddetallepago` int(11) NOT NULL AUTO_INCREMENT,
  `idpago` int(11) NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `created` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddetallepago`,`idpago`),
  KEY `fk_detallepagos_pagos1_idx` (`idpago`),
  CONSTRAINT `fk_detallepagos_pagos1` FOREIGN KEY (`idpago`) REFERENCES `pagos` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepagos`
--

LOCK TABLES `detallepagos` WRITE;
/*!40000 ALTER TABLE `detallepagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallepagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docentes` (
  `iddocente` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellidoPaterno` varchar(40) NOT NULL,
  `apellidoMaterno` varchar(40) NOT NULL,
  `especialidad` varchar(30) DEFAULT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddocente`,`iduser`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  KEY `fk_docentes_users1_idx` (`iduser`),
  CONSTRAINT `fk_docentes_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grados`
--

DROP TABLE IF EXISTS `grados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grados` (
  `idgrado` int(11) NOT NULL AUTO_INCREMENT,
  `idnivel` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `simulacro` bit(1) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activado\n2 => desactivado',
  PRIMARY KEY (`idgrado`,`idnivel`),
  KEY `fk_grados_niveles_idx` (`idnivel`),
  CONSTRAINT `fk_grados_niveles` FOREIGN KEY (`idnivel`) REFERENCES `niveles` (`idnivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
/*!40000 ALTER TABLE `grados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrador','1'),(2,'Alumno','1'),(3,'Apoderado','1'),(4,'Docente','1');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matriculas` (
  `idmatricula` int(11) NOT NULL AUTO_INCREMENT,
  `idseccion` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmatricula`,`idseccion`,`idalumno`),
  KEY `fk_matriculas_secciones1_idx` (`idseccion`),
  KEY `fk_matriculas_alumnos1_idx` (`idalumno`),
  CONSTRAINT `fk_matriculas_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveles`
--

DROP TABLE IF EXISTS `niveles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveles` (
  `idnivel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo\n2 => desactivado',
  PRIMARY KEY (`idnivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveles`
--

LOCK TABLES `niveles` WRITE;
/*!40000 ALTER TABLE `niveles` DISABLE KEYS */;
INSERT INTO `niveles` VALUES (1,'INICIAL','1'),(2,'PRIMARIA','1'),(3,'SECUNDARIA','1');
/*!40000 ALTER TABLE `niveles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `idnota` int(11) NOT NULL AUTO_INCREMENT,
  `idasignacion` int(11) NOT NULL,
  `idbimestre` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `peso` int(11) NOT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idnota`,`idasignacion`,`idbimestre`),
  KEY `fk_notas_bimestres1_idx` (`idbimestre`),
  KEY `fk_notas_asignaciones1_idx` (`idasignacion`),
  CONSTRAINT `fk_notas_bimestres1` FOREIGN KEY (`idbimestre`) REFERENCES `bimestres` (`idbimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_asignaciones1` FOREIGN KEY (`idasignacion`) REFERENCES `asignaciones` (`idasignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `padres`
--

DROP TABLE IF EXISTS `padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `padres` (
  `idpadre` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(60) NOT NULL,
  `apellidoMaterno` varchar(60) NOT NULL,
  `dni` char(8) NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `telefono1` varchar(10) DEFAULT NULL,
  `telefono2` varchar(10) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `profesion` varchar(50) DEFAULT NULL,
  `nivelestudio` varchar(50) DEFAULT NULL,
  `ocupacion` varchar(50) DEFAULT NULL,
  `parentesco` varchar(10) NOT NULL,
  `apoderado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idpadre`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  KEY `fk_padres_users1_idx` (`iduser`),
  CONSTRAINT `fk_padres_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
/*!40000 ALTER TABLE `padres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idmatricula` int(11) NOT NULL,
  `idconcepto` int(11) NOT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `monto` decimal(5,2) NOT NULL,
  `deuda` decimal(5,2) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpago`,`idmatricula`,`idconcepto`),
  KEY `fk_pagos_matriculas1_idx` (`idmatricula`),
  KEY `fk_pagos_conceptos1_idx` (`idconcepto`),
  CONSTRAINT `fk_pagos_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_conceptos1` FOREIGN KEY (`idconcepto`) REFERENCES `conceptos` (`idconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secciones` (
  `idseccion` int(11) NOT NULL AUTO_INCREMENT,
  `idgrado` int(11) NOT NULL,
  `idaniolectivo` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idseccion`,`idgrado`,`idaniolectivo`,`idturno`),
  KEY `fk_secciones_grados1_idx` (`idgrado`),
  KEY `fk_secciones_aniolectivos1_idx` (`idaniolectivo`),
  KEY `fk_secciones_turnos1_idx` (`idturno`),
  CONSTRAINT `fk_secciones_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_turnos1` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turnos` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idgroup` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iduser`,`idgroup`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_groups1_idx` (`idgroup`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`idgroup`) REFERENCES `groups` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2a$10$yKWe3rpne439wHAzLpJeaupixgzpu/4MqQ8CijWHl/TMF6NOSFB1.','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17 16:33:04
