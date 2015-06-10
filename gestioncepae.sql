-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: gestioncepae
-- ------------------------------------------------------
-- Server version	5.6.17

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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,214),(2,1,NULL,NULL,'Alumnos',2,15),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'view',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,2,NULL,NULL,'getAlumnos',13,14),(9,1,NULL,NULL,'Aniolectivos',16,27),(10,9,NULL,NULL,'index',17,18),(11,9,NULL,NULL,'add',19,20),(12,9,NULL,NULL,'view',21,22),(13,9,NULL,NULL,'edit',23,24),(14,9,NULL,NULL,'delete',25,26),(15,1,NULL,NULL,'Areas',28,39),(16,15,NULL,NULL,'index',29,30),(17,15,NULL,NULL,'add',31,32),(18,15,NULL,NULL,'view',33,34),(19,15,NULL,NULL,'edit',35,36),(20,15,NULL,NULL,'delete',37,38),(21,1,NULL,NULL,'Asignaciones',40,47),(22,21,NULL,NULL,'index',41,42),(23,21,NULL,NULL,'registrar',43,44),(24,21,NULL,NULL,'getAsignaciones',45,46),(25,1,NULL,NULL,'Bimestres',48,59),(26,25,NULL,NULL,'index',49,50),(27,25,NULL,NULL,'add',51,52),(28,25,NULL,NULL,'view',53,54),(29,25,NULL,NULL,'edit',55,56),(30,25,NULL,NULL,'delete',57,58),(31,1,NULL,NULL,'Conceptos',60,73),(32,31,NULL,NULL,'index',61,62),(33,31,NULL,NULL,'add',63,64),(34,31,NULL,NULL,'view',65,66),(35,31,NULL,NULL,'edit',67,68),(36,31,NULL,NULL,'delete',69,70),(37,31,NULL,NULL,'getFormByAniolectivo',71,72),(38,1,NULL,NULL,'Cursos',74,85),(39,38,NULL,NULL,'index',75,76),(40,38,NULL,NULL,'add',77,78),(41,38,NULL,NULL,'view',79,80),(42,38,NULL,NULL,'edit',81,82),(43,38,NULL,NULL,'delete',83,84),(44,1,NULL,NULL,'Docentes',86,99),(45,44,NULL,NULL,'index',87,88),(46,44,NULL,NULL,'add',89,90),(47,44,NULL,NULL,'view',91,92),(48,44,NULL,NULL,'edit',93,94),(49,44,NULL,NULL,'delete',95,96),(50,44,NULL,NULL,'getDocentes',97,98),(51,1,NULL,NULL,'Grados',100,113),(52,51,NULL,NULL,'index',101,102),(53,51,NULL,NULL,'add',103,104),(54,51,NULL,NULL,'view',105,106),(55,51,NULL,NULL,'edit',107,108),(56,51,NULL,NULL,'delete',109,110),(57,51,NULL,NULL,'getByIdnivel',111,112),(58,1,NULL,NULL,'Groups',114,121),(59,58,NULL,NULL,'index',115,116),(60,58,NULL,NULL,'view',117,118),(61,58,NULL,NULL,'add',119,120),(62,1,NULL,NULL,'Matriculas',122,131),(63,62,NULL,NULL,'index',123,124),(64,62,NULL,NULL,'add',125,126),(65,62,NULL,NULL,'view',127,128),(66,62,NULL,NULL,'delete',129,130),(67,1,NULL,NULL,'Niveles',132,143),(68,67,NULL,NULL,'index',133,134),(69,67,NULL,NULL,'add',135,136),(70,67,NULL,NULL,'view',137,138),(71,67,NULL,NULL,'edit',139,140),(72,67,NULL,NULL,'delete',141,142),(73,1,NULL,NULL,'Notas',144,147),(74,73,NULL,NULL,'index',145,146),(75,1,NULL,NULL,'Pages',148,151),(76,75,NULL,NULL,'display',149,150),(77,1,NULL,NULL,'Pagos',152,161),(78,77,NULL,NULL,'index',153,154),(79,77,NULL,NULL,'registrar',155,156),(80,77,NULL,NULL,'view',157,158),(81,77,NULL,NULL,'getFormPagos',159,160),(82,1,NULL,NULL,'Secciones',162,177),(83,82,NULL,NULL,'index',163,164),(84,82,NULL,NULL,'add',165,166),(85,82,NULL,NULL,'view',167,168),(86,82,NULL,NULL,'edit',169,170),(87,82,NULL,NULL,'delete',171,172),(88,82,NULL,NULL,'getByIdgrado',173,174),(89,82,NULL,NULL,'getNextSeccion',175,176),(90,1,NULL,NULL,'Turnos',178,189),(91,90,NULL,NULL,'index',179,180),(92,90,NULL,NULL,'add',181,182),(93,90,NULL,NULL,'view',183,184),(94,90,NULL,NULL,'edit',185,186),(95,90,NULL,NULL,'delete',187,188),(96,1,NULL,NULL,'Users',190,211),(97,96,NULL,NULL,'initDB',191,192),(98,96,NULL,NULL,'index',193,194),(99,96,NULL,NULL,'view',195,196),(100,96,NULL,NULL,'add',197,198),(101,96,NULL,NULL,'edit',199,200),(102,96,NULL,NULL,'delete',201,202),(103,96,NULL,NULL,'login',203,204),(104,96,NULL,NULL,'logout',205,206),(105,96,NULL,NULL,'manage_usuario',207,208),(106,96,NULL,NULL,'change_password',209,210),(107,1,NULL,NULL,'AclExtras',212,213);
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
  `matriculas_idmatricula` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddetallenota`,`idnota`,`matriculas_idmatricula`),
  KEY `fk_detallenotas_notas1_idx` (`idnota`),
  KEY `fk_detallenotas_matriculas1_idx` (`matriculas_idmatricula`),
  CONSTRAINT `fk_detallenotas_notas1` FOREIGN KEY (`idnota`) REFERENCES `notas` (`idnota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallenotas_matriculas1` FOREIGN KEY (`matriculas_idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `descripcion` varchar(45) NOT NULL,
  `peso` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT '1',
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
  KEY `fk_users_groups1_idx` (`idgroup`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`idgroup`) REFERENCES `groups` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2a$10$zBL6y6tQJ4SVtsO6yBE0FueCGqAmUM0KGJ0gpRn113j733le1dwTK','1');
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

-- Dump completed on 2015-06-10 14:06:06
