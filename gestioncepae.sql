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
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,296),(2,1,NULL,NULL,'Alumnos',2,25),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'view',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,2,NULL,NULL,'getAlumnos',13,14),(9,2,NULL,NULL,'getPadre0ByDni',15,16),(10,2,NULL,NULL,'getPadre1ByDni',17,18),(11,2,NULL,NULL,'getPadre2ByDni',19,20),(12,2,NULL,NULL,'datos_alumno',21,22),(13,2,NULL,NULL,'datos_apoderado',23,24),(14,1,NULL,NULL,'Aniolectivos',26,37),(15,14,NULL,NULL,'index',27,28),(16,14,NULL,NULL,'add',29,30),(17,14,NULL,NULL,'view',31,32),(18,14,NULL,NULL,'edit',33,34),(19,14,NULL,NULL,'delete',35,36),(20,1,NULL,NULL,'Areas',38,49),(21,20,NULL,NULL,'index',39,40),(22,20,NULL,NULL,'add',41,42),(23,20,NULL,NULL,'view',43,44),(24,20,NULL,NULL,'edit',45,46),(25,20,NULL,NULL,'delete',47,48),(26,1,NULL,NULL,'Asignaciones',50,61),(27,26,NULL,NULL,'index',51,52),(28,26,NULL,NULL,'registrar',53,54),(29,26,NULL,NULL,'modificar',55,56),(30,26,NULL,NULL,'view',57,58),(31,26,NULL,NULL,'getAsignaciones',59,60),(32,1,NULL,NULL,'Bimestres',62,73),(33,32,NULL,NULL,'index',63,64),(34,32,NULL,NULL,'add',65,66),(35,32,NULL,NULL,'view',67,68),(36,32,NULL,NULL,'edit',69,70),(37,32,NULL,NULL,'delete',71,72),(38,1,NULL,NULL,'Conceptos',74,87),(39,38,NULL,NULL,'index',75,76),(40,38,NULL,NULL,'add',77,78),(41,38,NULL,NULL,'view',79,80),(42,38,NULL,NULL,'edit',81,82),(43,38,NULL,NULL,'delete',83,84),(44,38,NULL,NULL,'getFormByAniolectivo',85,86),(45,1,NULL,NULL,'Cursos',88,111),(46,45,NULL,NULL,'index',89,90),(47,45,NULL,NULL,'add',91,92),(48,45,NULL,NULL,'view',93,94),(49,45,NULL,NULL,'edit',95,96),(50,45,NULL,NULL,'delete',97,98),(51,45,NULL,NULL,'cursosByDocente',99,100),(52,45,NULL,NULL,'view_docente',101,102),(53,45,NULL,NULL,'cursosByAlumno',103,104),(54,45,NULL,NULL,'view_alumno',105,106),(55,45,NULL,NULL,'cursosByApoderado',107,108),(56,45,NULL,NULL,'view_apoderado',109,110),(57,1,NULL,NULL,'Docentes',112,127),(58,57,NULL,NULL,'index',113,114),(59,57,NULL,NULL,'add',115,116),(60,57,NULL,NULL,'view',117,118),(61,57,NULL,NULL,'edit',119,120),(62,57,NULL,NULL,'delete',121,122),(63,57,NULL,NULL,'datos_docente',123,124),(64,57,NULL,NULL,'getDocentes',125,126),(65,1,NULL,NULL,'Grados',128,141),(66,65,NULL,NULL,'index',129,130),(67,65,NULL,NULL,'add',131,132),(68,65,NULL,NULL,'view',133,134),(69,65,NULL,NULL,'edit',135,136),(70,65,NULL,NULL,'delete',137,138),(71,65,NULL,NULL,'getByIdnivel',139,140),(72,1,NULL,NULL,'Groups',142,149),(73,72,NULL,NULL,'index',143,144),(74,72,NULL,NULL,'view',145,146),(75,72,NULL,NULL,'add',147,148),(76,1,NULL,NULL,'Matriculas',150,159),(77,76,NULL,NULL,'index',151,152),(78,76,NULL,NULL,'add',153,154),(79,76,NULL,NULL,'view',155,156),(80,76,NULL,NULL,'delete',157,158),(81,1,NULL,NULL,'Niveles',160,171),(82,81,NULL,NULL,'index',161,162),(83,81,NULL,NULL,'add',163,164),(84,81,NULL,NULL,'view',165,166),(85,81,NULL,NULL,'edit',167,168),(86,81,NULL,NULL,'delete',169,170),(87,1,NULL,NULL,'Notas',172,191),(88,87,NULL,NULL,'index',173,174),(89,87,NULL,NULL,'administrar',175,176),(90,87,NULL,NULL,'registrar',177,178),(91,87,NULL,NULL,'getFormNotas',179,180),(92,87,NULL,NULL,'getFormRegistro',181,182),(93,87,NULL,NULL,'index_alumno',183,184),(94,87,NULL,NULL,'view_alumno',185,186),(95,87,NULL,NULL,'index_apoderado',187,188),(96,87,NULL,NULL,'view_apoderado',189,190),(97,1,NULL,NULL,'Pages',192,205),(98,97,NULL,NULL,'admin',193,194),(99,97,NULL,NULL,'alumno',195,196),(100,97,NULL,NULL,'apoderado',197,198),(101,97,NULL,NULL,'docente',199,200),(102,97,NULL,NULL,'pagos',201,202),(103,97,NULL,NULL,'prohibido',203,204),(104,1,NULL,NULL,'Pagos',206,227),(105,104,NULL,NULL,'index',207,208),(106,104,NULL,NULL,'index_pagos',209,210),(107,104,NULL,NULL,'registrar',211,212),(108,104,NULL,NULL,'registrar_pagos',213,214),(109,104,NULL,NULL,'view',215,216),(110,104,NULL,NULL,'view_pagos',217,218),(111,104,NULL,NULL,'index_alumno',219,220),(112,104,NULL,NULL,'index_apoderado',221,222),(113,104,NULL,NULL,'getFormPagos',223,224),(114,104,NULL,NULL,'cancelar',225,226),(115,1,NULL,NULL,'Reportes',228,239),(116,115,NULL,NULL,'notas_alumno',229,230),(117,115,NULL,NULL,'notas_apoderado',231,232),(118,115,NULL,NULL,'notas_alumno_post',233,234),(119,115,NULL,NULL,'notas_apoderado_post',235,236),(120,115,NULL,NULL,'pagos',237,238),(121,1,NULL,NULL,'Secciones',240,255),(122,121,NULL,NULL,'index',241,242),(123,121,NULL,NULL,'add',243,244),(124,121,NULL,NULL,'view',245,246),(125,121,NULL,NULL,'edit',247,248),(126,121,NULL,NULL,'delete',249,250),(127,121,NULL,NULL,'getByIdgrado',251,252),(128,121,NULL,NULL,'getNextSeccion',253,254),(129,1,NULL,NULL,'Turnos',256,267),(130,129,NULL,NULL,'index',257,258),(131,129,NULL,NULL,'add',259,260),(132,129,NULL,NULL,'view',261,262),(133,129,NULL,NULL,'edit',263,264),(134,129,NULL,NULL,'delete',265,266),(135,1,NULL,NULL,'Users',268,293),(136,135,NULL,NULL,'initDB',269,270),(137,135,NULL,NULL,'index',271,272),(138,135,NULL,NULL,'view',273,274),(139,135,NULL,NULL,'add',275,276),(140,135,NULL,NULL,'edit',277,278),(141,135,NULL,NULL,'delete',279,280),(142,135,NULL,NULL,'login',281,282),(143,135,NULL,NULL,'logout',283,284),(144,135,NULL,NULL,'datos_admin',285,286),(145,135,NULL,NULL,'datos_pagos',287,288),(146,135,NULL,NULL,'change_pass',289,290),(147,135,NULL,NULL,'datos',291,292),(148,1,NULL,NULL,'AclExtras',294,295);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,2,'A1','asdsadsasda','asddsa','','','M','2015-08-20','adsa','','','0',NULL,'','','','','1');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnos_padres`
--

DROP TABLE IF EXISTS `alumnos_padres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos_padres` (
  `idalumno_padre` int(11) NOT NULL AUTO_INCREMENT,
  `idpadre` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `parentesco` varchar(10) NOT NULL,
  `apoderado` char(1) NOT NULL,
  PRIMARY KEY (`idalumno_padre`,`idpadre`,`idalumno`),
  KEY `fk_padres_has_alumnos_alumnos1_idx` (`idalumno`),
  KEY `fk_padres_has_alumnos_padres1_idx` (`idpadre`),
  CONSTRAINT `fk_padres_has_alumnos_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_padres_has_alumnos_padres1` FOREIGN KEY (`idpadre`) REFERENCES `padres` (`idpadre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos_padres`
--

LOCK TABLES `alumnos_padres` WRITE;
/*!40000 ALTER TABLE `alumnos_padres` DISABLE KEYS */;
INSERT INTO `alumnos_padres` VALUES (1,1,1,'Padre','1'),(2,2,1,'Madre','0');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'GENERAL',0,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Group',1,NULL,1,2),(2,NULL,'Group',2,NULL,3,4),(3,NULL,'Group',3,NULL,5,6),(4,NULL,'Group',4,NULL,7,8),(5,NULL,'Group',5,NULL,9,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,1,1,'1','1','1','1'),(2,2,1,'-1','-1','-1','-1'),(3,2,99,'1','1','1','1'),(4,2,53,'1','1','1','1'),(5,2,54,'1','1','1','1'),(6,2,93,'1','1','1','1'),(7,2,94,'1','1','1','1'),(8,2,111,'1','1','1','1'),(9,2,116,'1','1','1','1'),(10,2,118,'1','1','1','1'),(11,2,147,'1','1','1','1'),(12,2,146,'1','1','1','1'),(13,2,143,'1','1','1','1'),(14,2,12,'1','1','1','1'),(15,3,1,'-1','-1','-1','-1'),(16,3,100,'1','1','1','1'),(17,3,55,'1','1','1','1'),(18,3,56,'1','1','1','1'),(19,3,95,'1','1','1','1'),(20,3,96,'1','1','1','1'),(21,3,112,'1','1','1','1'),(22,3,117,'1','1','1','1'),(23,3,119,'1','1','1','1'),(24,3,147,'1','1','1','1'),(25,3,146,'1','1','1','1'),(26,3,143,'1','1','1','1'),(27,3,13,'1','1','1','1'),(28,4,1,'-1','-1','-1','-1'),(29,4,101,'1','1','1','1'),(30,4,51,'1','1','1','1'),(31,4,52,'1','1','1','1'),(32,4,88,'1','1','1','1'),(33,4,89,'1','1','1','1'),(34,4,90,'1','1','1','1'),(35,4,91,'1','1','1','1'),(36,4,92,'1','1','1','1'),(37,4,147,'1','1','1','1'),(38,4,146,'1','1','1','1'),(39,4,143,'1','1','1','1'),(40,4,63,'1','1','1','1'),(41,5,1,'1','1','1','1'),(42,5,102,'1','1','1','1'),(43,5,145,'1','1','1','1'),(44,5,147,'1','1','1','1'),(45,5,106,'1','1','1','1'),(46,5,110,'1','1','1','1'),(47,5,108,'1','1','1','1'),(48,5,114,'1','1','1','1'),(49,5,120,'1','1','1','1');
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
  CONSTRAINT `fk_asignaciones_docentes1` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`iddocente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_cursos1` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `fechalimite` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idconcepto`,`idaniolectivo`),
  KEY `fk_conceptos_aniolectivos1_idx` (`idaniolectivo`),
  CONSTRAINT `fk_conceptos_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conceptos`
--

LOCK TABLES `conceptos` WRITE;
/*!40000 ALTER TABLE `conceptos` DISABLE KEYS */;
INSERT INTO `conceptos` VALUES (1,1,'asdsad',123.00,'2015-08-12','1'),(2,1,'Pension1',200.00,'2015-08-30','1');
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
  CONSTRAINT `fk_cursos_areas1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  CONSTRAINT `fk_detallenotas_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallenotas_notas1` FOREIGN KEY (`idnota`) REFERENCES `notas` (`idnota`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `iduser` int(11) NOT NULL,
  `monto` decimal(5,2) NOT NULL,
  `created` date DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddetallepago`,`idpago`,`iduser`),
  KEY `fk_detallepagos_pagos1_idx` (`idpago`),
  KEY `fk_detallepagos_users1_idx` (`iduser`),
  CONSTRAINT `fk_detallepagos_pagos1` FOREIGN KEY (`idpago`) REFERENCES `pagos` (`idpago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallepagos_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepagos`
--

LOCK TABLES `detallepagos` WRITE;
/*!40000 ALTER TABLE `detallepagos` DISABLE KEYS */;
INSERT INTO `detallepagos` VALUES (1,1,4,20.00,'2015-08-04','1'),(2,1,4,3.00,'2015-08-04','1'),(3,1,1,30.00,'2015-08-04','1'),(5,1,4,10.00,'2015-08-05','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grados`
--

LOCK TABLES `grados` WRITE;
/*!40000 ALTER TABLE `grados` DISABLE KEYS */;
INSERT INTO `grados` VALUES (1,3,'1°',12,NULL,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Administrador','1'),(2,'Alumno','1'),(3,'Apoderado','1'),(4,'Docente','1'),(5,'Pagos','1');
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
  CONSTRAINT `fk_matriculas_alumnos1` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_secciones1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idseccion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matriculas`
--

LOCK TABLES `matriculas` WRITE;
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` VALUES (1,1,1,'2015-08-02','dasdas','1');
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
  CONSTRAINT `fk_notas_asignaciones1` FOREIGN KEY (`idasignacion`) REFERENCES `asignaciones` (`idasignacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_bimestres1` FOREIGN KEY (`idbimestre`) REFERENCES `bimestres` (`idbimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  PRIMARY KEY (`idpadre`),
  UNIQUE KEY `dni_UNIQUE` (`dni`),
  KEY `fk_padres_users1_idx` (`iduser`),
  CONSTRAINT `fk_padres_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `padres`
--

LOCK TABLES `padres` WRITE;
/*!40000 ALTER TABLE `padres` DISABLE KEYS */;
INSERT INTO `padres` VALUES (1,3,'1','dsad','dsadsasdaf','fdsfsdfds','11111111',NULL,'','','2015-08-07','','','',''),(2,NULL,'1','dfasgfh','gfgfsd','gfgfdsgfds','22222222',NULL,'','','2015-08-14','','','','');
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
  `fechalimite` date NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpago`,`idmatricula`,`idconcepto`),
  KEY `fk_pagos_matriculas1_idx` (`idmatricula`),
  KEY `fk_pagos_conceptos1_idx` (`idconcepto`),
  CONSTRAINT `fk_pagos_conceptos1` FOREIGN KEY (`idconcepto`) REFERENCES `conceptos` (`idconcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_matriculas1` FOREIGN KEY (`idmatricula`) REFERENCES `matriculas` (`idmatricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,1,1,'asdsad',123.00,50.00,'2015-08-12','1'),(2,1,2,'Pension1',200.00,200.00,'2015-08-30','1');
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
  CONSTRAINT `fk_secciones_aniolectivos1` FOREIGN KEY (`idaniolectivo`) REFERENCES `aniolectivos` (`idaniolectivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_grados1` FOREIGN KEY (`idgrado`) REFERENCES `grados` (`idgrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_secciones_turnos1` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secciones`
--

LOCK TABLES `secciones` WRITE;
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` VALUES (1,1,1,1,'A','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (1,'Mañana','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2a$10$.NCN1Jv87izMWEkme4J6xO59E6WMAz7fXRQgoMimec5c7hyA2iXwK','1'),(2,2,'alumno1','$2a$10$zwq3zkS6bvv.W5brck76auC/LHlH4YifOmygwGrUXiuuuWJs1ZlEG','1'),(3,3,'11111111','$2a$10$4XVxj/kfGHZgeHzrCH50UOKWpqCYAqBc1sELkokbFwxdjdjrl9wL2','1'),(4,5,'pago1','$2a$10$b9ZOPS4wPjdQzK72e.vFjewuGnGpqwZU9XrJKvWAXDNh.2Xe/WlhS','1');
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

-- Dump completed on 2015-08-05  0:12:14
