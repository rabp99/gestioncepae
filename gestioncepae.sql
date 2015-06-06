SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `gestioncepae` ;
CREATE SCHEMA IF NOT EXISTS `gestioncepae` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `gestioncepae` ;

-- -----------------------------------------------------
-- Table `gestioncepae`.`aniolectivos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`aniolectivos` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`aniolectivos` (
  `idaniolectivo` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(20) NOT NULL,
  `fechainicio` DATE NULL,
  `fechafin` DATE NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo\n2 => desactivado' /* comment truncated */ /*3 => último año lectivo*/,
  PRIMARY KEY (`idaniolectivo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`niveles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`niveles` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`niveles` (
  `idnivel` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activo' /* comment truncated */ /*2 => desactivado*/,
  PRIMARY KEY (`idnivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`grados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`grados` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`grados` (
  `idgrado` INT NOT NULL AUTO_INCREMENT,
  `idaniolectivo` INT NOT NULL,
  `idnivel` INT NOT NULL,
  `descripcion` VARCHAR(20) NOT NULL,
  `capacidad` INT NULL,
  `simulacro` BIT NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1' COMMENT 'estado:\n1 => activado' /* comment truncated */ /*2 => desactivado*/,
  PRIMARY KEY (`idgrado`, `idaniolectivo`, `idnivel`),
  INDEX `fk_grados_niveles_idx` (`idnivel` ASC),
  INDEX `fk_grados_aniolectivos1_idx` (`idaniolectivo` ASC),
  CONSTRAINT `fk_grados_niveles`
    FOREIGN KEY (`idnivel`)
    REFERENCES `gestioncepae`.`niveles` (`idnivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grados_aniolectivos1`
    FOREIGN KEY (`idaniolectivo`)
    REFERENCES `gestioncepae`.`aniolectivos` (`idaniolectivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`areas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`areas` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`areas` (
  `idarea` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(30) NOT NULL,
  `importancia` INT UNSIGNED NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idarea`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`cursos` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`cursos` (
  `idcurso` INT NOT NULL AUTO_INCREMENT,
  `idgrado` INT NOT NULL,
  `idarea` INT NOT NULL,
  `descripcion` VARCHAR(60) NOT NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcurso`, `idgrado`, `idarea`),
  INDEX `fk_cursos_grados1_idx` (`idgrado` ASC),
  INDEX `fk_cursos_areas1_idx` (`idarea` ASC),
  CONSTRAINT `fk_cursos_grados1`
    FOREIGN KEY (`idgrado`)
    REFERENCES `gestioncepae`.`grados` (`idgrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_areas1`
    FOREIGN KEY (`idarea`)
    REFERENCES `gestioncepae`.`areas` (`idarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`secciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`secciones` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`secciones` (
  `idseccion` INT NOT NULL AUTO_INCREMENT,
  `idgrado` INT NOT NULL,
  `descripcion` VARCHAR(50) NOT NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idseccion`, `idgrado`),
  INDEX `fk_secciones_grados1_idx` (`idgrado` ASC),
  CONSTRAINT `fk_secciones_grados1`
    FOREIGN KEY (`idgrado`)
    REFERENCES `gestioncepae`.`grados` (`idgrado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`alumnos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`alumnos` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`alumnos` (
  `idalumno` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(90) NOT NULL,
  `apellidoPaterno` VARCHAR(60) NOT NULL,
  `apellidoMaterno` VARCHAR(60) NOT NULL,
  `direccion` VARCHAR(120) NULL,
  `telefono` VARCHAR(10) NULL,
  `sexo` CHAR(1) NOT NULL,
  `fechaNac` DATE NOT NULL,
  `lugarNac` VARCHAR(60) NULL,
  `email` VARCHAR(90) NULL,
  `colegioProc` VARCHAR(60) NULL,
  `seguro` CHAR(1) NULL,
  `aseguradora` VARCHAR(60) NULL,
  `lugarAten` VARCHAR(60) NULL,
  `alergias` VARCHAR(300) NULL,
  `recomendado` VARCHAR(30) NULL,
  `motivos` VARCHAR(300) NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idalumno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`padres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`padres` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`padres` (
  `idpadre` INT NOT NULL AUTO_INCREMENT,
  `idalumno` INT NOT NULL,
  `nombres` VARCHAR(90) NOT NULL,
  `apellidoPaterno` VARCHAR(60) NOT NULL,
  `apellidoMaterno` VARCHAR(60) NOT NULL,
  `dni` CHAR(8) NOT NULL,
  `direccion` VARCHAR(120) NULL,
  `telefono1` VARCHAR(10) NULL,
  `telefono2` VARCHAR(10) NULL,
  `fechaNac` DATE NULL,
  `email` VARCHAR(90) NULL,
  `profesion` VARCHAR(50) NULL,
  `nivelestudio` VARCHAR(50) NULL,
  `ocupacion` VARCHAR(50) NULL,
  `parentesco` VARCHAR(10) NOT NULL,
  `condicion` CHAR(1) NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpadre`, `idalumno`),
  INDEX `fk_padres_alumnos1_idx` (`idalumno` ASC),
  UNIQUE INDEX `dni_UNIQUE` (`dni` ASC),
  CONSTRAINT `fk_padres_alumnos1`
    FOREIGN KEY (`idalumno`)
    REFERENCES `gestioncepae`.`alumnos` (`idalumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`matriculas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`matriculas` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`matriculas` (
  `idmatricula` INT NOT NULL AUTO_INCREMENT,
  `idseccion` INT NOT NULL,
  `idalumno` INT NOT NULL,
  `fecha` DATE NULL,
  `observacion` VARCHAR(300) NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmatricula`, `idseccion`, `idalumno`),
  INDEX `fk_matriculas_secciones1_idx` (`idseccion` ASC),
  INDEX `fk_matriculas_alumnos1_idx` (`idalumno` ASC),
  CONSTRAINT `fk_matriculas_secciones1`
    FOREIGN KEY (`idseccion`)
    REFERENCES `gestioncepae`.`secciones` (`idseccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_alumnos1`
    FOREIGN KEY (`idalumno`)
    REFERENCES `gestioncepae`.`alumnos` (`idalumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`docentes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`docentes` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`docentes` (
  `iddocente` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(60) NOT NULL,
  `apellidoPaterno` VARCHAR(40) NOT NULL,
  `apellidoMaterno` VARCHAR(40) NOT NULL,
  `especialidad` VARCHAR(30) NULL,
  `dni` CHAR(8) NOT NULL,
  `direccion` VARCHAR(60) NULL,
  `telefono1` VARCHAR(10) NULL,
  `telefono2` VARCHAR(10) NULL,
  `fecha` DATE NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`iddocente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`asignaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`asignaciones` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`asignaciones` (
  `idasignacion` INT NOT NULL AUTO_INCREMENT,
  `idseccion` INT NOT NULL,
  `idcurso` INT NOT NULL,
  `iddocente` INT NOT NULL,
  PRIMARY KEY (`idasignacion`, `idseccion`, `idcurso`, `iddocente`),
  INDEX `fk_clases_secciones1_idx` (`idseccion` ASC),
  INDEX `fk_clases_cursos1_idx` (`idcurso` ASC),
  INDEX `fk_asignaciones_docentes1_idx` (`iddocente` ASC),
  CONSTRAINT `fk_clases_secciones1`
    FOREIGN KEY (`idseccion`)
    REFERENCES `gestioncepae`.`secciones` (`idseccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clases_cursos1`
    FOREIGN KEY (`idcurso`)
    REFERENCES `gestioncepae`.`cursos` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaciones_docentes1`
    FOREIGN KEY (`iddocente`)
    REFERENCES `gestioncepae`.`docentes` (`iddocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestioncepae`.`conceptos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestioncepae`.`conceptos` ;

CREATE TABLE IF NOT EXISTS `gestioncepae`.`conceptos` (
  `idconcepto` INT NOT NULL,
  `idaniolectivo` INT NOT NULL,
  `descripcion` VARCHAR(60) NOT NULL,
  `valor` INT NULL,
  `estado` CHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idconcepto`, `idaniolectivo`),
  INDEX `fk_conceptos_aniolectivos1_idx` (`idaniolectivo` ASC),
  CONSTRAINT `fk_conceptos_aniolectivos1`
    FOREIGN KEY (`idaniolectivo`)
    REFERENCES `gestioncepae`.`aniolectivos` (`idaniolectivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `gestioncepae`.`aniolectivos`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestioncepae`;
INSERT INTO `gestioncepae`.`aniolectivos` (`idaniolectivo`, `descripcion`, `fechainicio`, `fechafin`, `estado`) VALUES (1, '2015', '2015-03-02', '2015-12-21', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `gestioncepae`.`niveles`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestioncepae`;
INSERT INTO `gestioncepae`.`niveles` (`idnivel`, `descripcion`, `estado`) VALUES (1, 'INICIAL', '1');
INSERT INTO `gestioncepae`.`niveles` (`idnivel`, `descripcion`, `estado`) VALUES (2, 'PRIMARIA', '1');
INSERT INTO `gestioncepae`.`niveles` (`idnivel`, `descripcion`, `estado`) VALUES (3, 'SECUNDARIA', '1');

COMMIT;

