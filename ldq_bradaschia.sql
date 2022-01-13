/*
SQLyog Community Edition- MySQL GUI v5.25
Host - 5.5.24-log : Database - ldq_bradaschia
*********************************************************************
Server version : 5.5.24-log
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `ldq_bradaschia`;

USE `ldq_bradaschia`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `Cod_Area` varchar(3) NOT NULL COMMENT 'Reclamo-Medicion-Personal-Seguimiento',
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`Cod_Area`,`Nombre_Area`,`Estado`) values ('ADM','Administracion',1),('CBR','Cobranzas',0),('CON','Contabilidad',1),('GER','Gerencia',1),('LOG','Logistica',1),('VEN','Ventas',0);

/*Table structure for table `barrio` */

DROP TABLE IF EXISTS `barrio`;

CREATE TABLE `barrio` (
  `Cod_Barrio` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Ciudad',
  `Nombre_Barrio` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  `Ciudad` varchar(4) DEFAULT NULL COMMENT 'Fk Ciudad',
  PRIMARY KEY (`Cod_Barrio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `barrio` */

insert  into `barrio`(`Cod_Barrio`,`Nombre_Barrio`,`Estado`,`Ciudad`) values (1,'Corral de Palos',0,'CBA'),(2,'Centro',0,'CBA'),(3,'San Vicente',0,'CBA'),(4,'Alta Cordoba',1,'CBA');

/*Table structure for table `categoriacliente` */

DROP TABLE IF EXISTS `categoriacliente`;

CREATE TABLE `categoriacliente` (
  `Cod_Categoria` int(2) NOT NULL AUTO_INCREMENT COMMENT 'ClienteExterno',
  `Nombre_Categoria` varchar(20) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `categoriacliente` */

insert  into `categoriacliente`(`Cod_Categoria`,`Nombre_Categoria`,`Estado`) values (1,'Obra',0),(2,'Particular',0),(3,'Gobierno',0),(4,'Premium',0);

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `Cod_Ciudad` varchar(4) NOT NULL COMMENT 'Provincia',
  `Nombre_Ciudad` varchar(30) DEFAULT NULL,
  `Provincia` varchar(4) DEFAULT NULL COMMENT 'FKProvincia',
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ciudad` */

insert  into `ciudad`(`Cod_Ciudad`,`Nombre_Ciudad`,`Provincia`,`Estado`) values ('CBA','Cordoba','CBA',0),('LP','La Plata','BSAS',0),('RCUA','Rio Cuarto','CBA',0),('ROS','Rosario','SFE',1),('SFE','Santa Fe','SFE',0),('VMA','Villa Maria','CBA',0);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

/*!50001 DROP VIEW IF EXISTS `cliente` */;
/*!50001 DROP TABLE IF EXISTS `cliente` */;

/*!50001 CREATE TABLE `cliente` (
  `Dni_Cliente` varchar(10) NOT NULL,
  `Nombre_Cliente` varchar(40) DEFAULT NULL,
  `Mail_Cliente` varchar(50) DEFAULT NULL,
  `Tel_Cliente` varchar(20) DEFAULT NULL,
  `Dir_Cliente` varchar(40) DEFAULT NULL,
  `Nombre_Barrio` varchar(30) DEFAULT NULL,
  `Nombre_Ciudad` varchar(30) DEFAULT NULL,
  `Nombre_Provincia` varchar(30) DEFAULT NULL,
  `Nombre_Categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `clienteexterno` */

DROP TABLE IF EXISTS `clienteexterno`;

CREATE TABLE `clienteexterno` (
  `Dni_Cliente` varchar(10) NOT NULL,
  `Nombre_Cliente` varchar(40) DEFAULT NULL,
  `Mail_Cliente` varchar(50) DEFAULT NULL,
  `Tel_Cliente` varchar(20) DEFAULT NULL,
  `Dir_Cliente` varchar(40) DEFAULT NULL,
  `Barrio_Cliente` varchar(3) DEFAULT NULL COMMENT 'FK Provincia',
  `Categoria_Cliente` int(2) DEFAULT NULL COMMENT 'FK CategoriaCliente',
  `Reclamo` int(10) DEFAULT NULL COMMENT 'FK Reclamo',
  `Foto` varchar(50) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Dni_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clienteexterno` */

insert  into `clienteexterno`(`Dni_Cliente`,`Nombre_Cliente`,`Mail_Cliente`,`Tel_Cliente`,`Dir_Cliente`,`Barrio_Cliente`,`Categoria_Cliente`,`Reclamo`,`Foto`,`Estado`) values ('10543616','Carmen Perez','carmenperez@gmail.com','(0351)621-6050','Luis Braille 1936','3',3,NULL,NULL,0),('31647366','Tiziana Bradaschia','tizibradaschia@gmail.com','(0351)6520540','Miguel de Sessé 3477','3',3,NULL,NULL,0);

/*Table structure for table `detallereclamo` */

DROP TABLE IF EXISTS `detallereclamo`;

CREATE TABLE `detallereclamo` (
  `Cod_Detalle` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Reclamo',
  `Descripcion_Reclamo` varchar(100) DEFAULT NULL,
  `Estado_Reclamo` varchar(3) DEFAULT NULL COMMENT 'FK EstadoReclamo',
  `Problema` int(5) DEFAULT NULL COMMENT 'FK Servicio',
  `Fecha_Cambio_Estado` date DEFAULT NULL,
  `Archivo` varchar(40) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Detalle`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `detallereclamo` */

insert  into `detallereclamo`(`Cod_Detalle`,`Descripcion_Reclamo`,`Estado_Reclamo`,`Problema`,`Fecha_Cambio_Estado`,`Archivo`,`Estado`) values (1,'LO ODIO','C',4,'2021-07-01','',0),(2,'0','S',4,'0000-00-00',NULL,0),(3,'PROBANDO','C',4,'0000-00-00',NULL,0),(4,'OTRO','A',4,'0000-00-00',NULL,0),(5,'OTRO','A',8,'2021-07-01',NULL,0),(6,'Prometieron venir y no lo hicieron','A',7,'2021-07-01',NULL,0),(7,'','A',0,'0000-00-00',NULL,0),(8,'Los espero','A',7,'2021-07-01',NULL,0),(9,'NO LO QUIERO','A',6,'2021-07-01',NULL,0),(10,'NO LO QUIERO','A',6,'2021-07-01',NULL,0),(11,'quiero que vengan','A',2,'2021-07-01',NULL,0),(12,'Necesito que me llamen','A',8,'2021-07-01',NULL,0),(13,'Se queda trabado y larga olor','A',2,'2021-07-02',NULL,0),(14,'Me llego un aviso de corte, pero yo ya he abonado','A',5,'0000-00-00',NULL,0),(15,'No vino el chico','A',5,'0000-00-00',NULL,0),(16,'Necesito darle dinero','A',4,'0000-00-00',NULL,0),(17,'ya se contactaron','C',8,'0000-00-00',NULL,1),(18,'No quiero le pedido extra','A',3,'0000-00-00',NULL,0),(19,'Encontre mejor oferta','A',9,'0000-00-00',NULL,0),(20,'cuando viene','C',8,'0000-00-00',NULL,1);

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

/*!50001 DROP VIEW IF EXISTS `empleado` */;
/*!50001 DROP TABLE IF EXISTS `empleado` */;

/*!50001 CREATE TABLE `empleado` (
  `Dni_Personal` varchar(10) NOT NULL COMMENT 'Password-Area',
  `Nombre_Personal` varchar(40) DEFAULT NULL,
  `Mail_Personal` varchar(50) DEFAULT NULL,
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Nombre_Jerarquia` varchar(30) DEFAULT NULL,
  `Jerarquia` int(2) DEFAULT NULL COMMENT 'FK Jerarquia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `estadoreclamo` */

DROP TABLE IF EXISTS `estadoreclamo`;

CREATE TABLE `estadoreclamo` (
  `Cod_Estado` varchar(3) NOT NULL COMMENT 'DetalleReclamo',
  `Nombre_Estado` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estadoreclamo` */

insert  into `estadoreclamo`(`Cod_Estado`,`Nombre_Estado`,`Estado`) values ('A','Abierto',0),('C','Cancelado',0),('D','Derivado',0),('P','Pendiente',0),('S','Solucionado',0);

/*Table structure for table `estadoreclamosareas` */

DROP TABLE IF EXISTS `estadoreclamosareas`;

/*!50001 DROP VIEW IF EXISTS `estadoreclamosareas` */;
/*!50001 DROP TABLE IF EXISTS `estadoreclamosareas` */;

/*!50001 CREATE TABLE `estadoreclamosareas` (
  `Fecha_Alta` date DEFAULT NULL,
  `Fecha_Cambio_Estado` date DEFAULT NULL,
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Nombre_Estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `estadoseguimiento` */

DROP TABLE IF EXISTS `estadoseguimiento`;

CREATE TABLE `estadoseguimiento` (
  `Cod_Estado` varchar(2) NOT NULL COMMENT 'Seguimiento',
  `Nombre_Estado` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estadoseguimiento` */

insert  into `estadoseguimiento`(`Cod_Estado`,`Nombre_Estado`,`Estado`) values ('A','Abierto',0),('C','Cancelado',0),('D','Derivado',0),('F','Finalizado',0),('P','Pendiente',0);

/*Table structure for table `gruporeclamos` */

DROP TABLE IF EXISTS `gruporeclamos`;

/*!50001 DROP VIEW IF EXISTS `gruporeclamos` */;
/*!50001 DROP TABLE IF EXISTS `gruporeclamos` */;

/*!50001 CREATE TABLE `gruporeclamos` (
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Abiertos` decimal(23,0) DEFAULT NULL,
  `Solucionados` decimal(23,0) DEFAULT NULL,
  `Cancelados` decimal(23,0) DEFAULT NULL,
  `Total` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `jerarquia` */

DROP TABLE IF EXISTS `jerarquia`;

CREATE TABLE `jerarquia` (
  `Cod_Jerarquia` int(2) NOT NULL AUTO_INCREMENT COMMENT 'PersonalReclamo',
  `Nombre_Jerarquia` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Jerarquia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jerarquia` */

insert  into `jerarquia`(`Cod_Jerarquia`,`Nombre_Jerarquia`,`Estado`) values (1,'Administrador',0),(2,'Gerente',0),(3,'Encargado',0),(4,'Empleado',0),(5,'Consultor',0),(6,'Invitado',0);

/*Table structure for table `medicionesproblemas` */

DROP TABLE IF EXISTS `medicionesproblemas`;

CREATE TABLE `medicionesproblemas` (
  `Cod_Medicion` varchar(4) NOT NULL COMMENT 'Area',
  `Problema` varchar(3) DEFAULT NULL COMMENT 'FK Problema',
  `Area` varchar(3) DEFAULT NULL COMMENT 'FK Area',
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Medicion`),
  KEY `Area` (`Area`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medicionesproblemas` */

/*Table structure for table `password` */

DROP TABLE IF EXISTS `password`;

CREATE TABLE `password` (
  `Dni` varchar(10) NOT NULL COMMENT 'Usuarios',
  `Password` varchar(40) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  `Tipo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `password` */

insert  into `password`(`Dni`,`Password`,`Estado`,`Tipo`) values ('10543616','carmen',0,'Cliente'),('29608425','martin',0,'Empleado'),('31647366','tizi',0,'Cliente'),('52864899','lucas',0,'Empleado');

/*Table structure for table `personalreclamo` */

DROP TABLE IF EXISTS `personalreclamo`;

CREATE TABLE `personalreclamo` (
  `Dni_Personal` varchar(10) NOT NULL COMMENT 'Password-Area',
  `Nombre_Personal` varchar(40) DEFAULT NULL,
  `Mail_Personal` varchar(50) DEFAULT NULL,
  `Area` varchar(3) DEFAULT NULL COMMENT 'FK Area',
  `Jerarquia` int(2) DEFAULT NULL COMMENT 'FK Jerarquia',
  `Estado` int(1) DEFAULT '0',
  `Foto` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Dni_Personal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personalreclamo` */

insert  into `personalreclamo`(`Dni_Personal`,`Nombre_Personal`,`Mail_Personal`,`Area`,`Jerarquia`,`Estado`,`Foto`) values ('29608425','Martin Garcia','martin_garcia_21@hotmail.com','VEN',3,0,NULL),('52864899','Lucas Garcia','garciabradaschia@gmail.com','GER',1,0,NULL);

/*Table structure for table `problema` */

DROP TABLE IF EXISTS `problema`;

CREATE TABLE `problema` (
  `Cod_Problema` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Servicio/Mediciones',
  `Descripcion_Problema` varchar(40) DEFAULT NULL,
  `Servicio` varchar(3) DEFAULT NULL COMMENT 'FK Severidad',
  `Estado` int(1) DEFAULT '0',
  `Severidad` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`Cod_Problema`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `problema` */

insert  into `problema`(`Cod_Problema`,`Descripcion_Problema`,`Servicio`,`Estado`,`Severidad`) values (1,'Olores fuertes','MNT',1,'URG'),(2,'No desagota','MNT',1,'MED'),(3,'Pedido extra','MNT',0,'LEV'),(4,'No vino cobrador','CBR',0,'MED'),(5,'Aviso de corte','CBR',0,'URG'),(6,'Cancela Entrega','ETG',1,'ALT'),(7,'No entregado','ETG',0,'MED'),(8,'Requiere Informacion','INF',0,'LEV'),(9,'No quiero el producto','CCL',0,'URG'),(10,'Quiero otro producto','CMB',0,NULL);

/*Table structure for table `provincia` */

DROP TABLE IF EXISTS `provincia`;

CREATE TABLE `provincia` (
  `Cod_Provincia` varchar(4) NOT NULL COMMENT 'ClienteExterno',
  `Nombre_Provincia` varchar(30) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `provincia` */

insert  into `provincia`(`Cod_Provincia`,`Nombre_Provincia`,`Estado`) values ('BSAS','Buenos Aires',1),('CAP','Capital Federal',0),('CATA','Catamarca',0),('CBA','Cordoba',0),('CHA','Chaco',0),('CHBT','Chubut',0),('CORR','Corrientes',0),('ENRI','Entre Rios',0),('FOR','Formosa',0),('JUJY','Jujuy',0),('MZA','Mendoza',0),('NQN','Neuquen',0),('PAMP','La Pampa',0),('RIOJ','La Rioja',0),('SAL','Salta',0),('SCRU','Santa Cruz',0),('SFE','Santa Fe',0),('SLUI','San Luis',0),('STGO','Santiago del Estero',0),('TFUE','Tierra del Fuego',0),('TUCU','Tucuman',0);

/*Table structure for table `reclamo` */

DROP TABLE IF EXISTS `reclamo`;

CREATE TABLE `reclamo` (
  `Cod_Reclamo` int(10) NOT NULL AUTO_INCREMENT,
  `Cliente` varchar(10) DEFAULT NULL COMMENT 'FK dniCliente',
  `Area_Reclamo` varchar(3) DEFAULT NULL COMMENT 'FK Area',
  `Fecha_Alta` date DEFAULT NULL,
  `Detalle_Reclamo` int(10) DEFAULT NULL COMMENT 'FK DetalleReclamo',
  `Seguimiento_Actual` varchar(10) DEFAULT NULL COMMENT 'FK Seguimiento',
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Reclamo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `reclamo` */

insert  into `reclamo`(`Cod_Reclamo`,`Cliente`,`Area_Reclamo`,`Fecha_Alta`,`Detalle_Reclamo`,`Seguimiento_Actual`,`Estado`) values (1,'31647366','CBR','2021-07-01',2,'2',0),(2,'31647366','CBR','2021-07-01',2,'2',0),(3,'31647366','CBR','2021-07-01',2,'2',0),(4,'31647366','CBR','2021-07-01',0,'2',0),(5,'31647366','CBR','2021-07-01',0,'',0),(6,'31647366','CBR','2021-07-01',0,'7',0),(7,'31647366','CBR','0000-00-00',0,'7',0),(8,'31647366','CBR','0000-00-00',1,'7',0),(9,'31647366','CBR','0000-00-00',2,'7',0),(10,'31647366','CBR','0000-00-00',3,'25',0),(11,'31647366','GER','2021-07-01',4,'26',0),(12,'31647366','CON','2021-07-01',5,'27',0),(13,'31647366','','0000-00-00',6,'28',0),(14,'31647366','VEN','2021-07-01',7,'29',0),(15,'31647366','LOG','2021-07-01',9,'31',0),(16,'31647366','LOG','2021-07-01',10,'',0),(17,'31647366','LOG','2021-07-01',11,'33',0),(18,'31647366','VEN','2021-07-01',12,'34',0),(19,'31647366','LOG','2021-07-02',13,'35',0),(20,'31647366','CBR','0000-00-00',14,'36',0),(21,'31647366','CBR','0000-00-00',15,'37',0),(22,'31647366','CBR','0000-00-00',16,'38',0),(23,'31647366','VEN','0000-00-00',17,'39',1),(24,'31647366','VEN','0000-00-00',18,'40',0),(25,'31647366','VEN','0000-00-00',19,'41',0),(26,'31647366','CBR','0000-00-00',20,'42',1);

/*Table structure for table `reclamosporarea` */

DROP TABLE IF EXISTS `reclamosporarea`;

/*!50001 DROP VIEW IF EXISTS `reclamosporarea` */;
/*!50001 DROP TABLE IF EXISTS `reclamosporarea` */;

/*!50001 CREATE TABLE `reclamosporarea` (
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Cantidad` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*Table structure for table `seguimiento` */

DROP TABLE IF EXISTS `seguimiento`;

CREATE TABLE `seguimiento` (
  `Cod_Seguimiento` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Esatdo-Area-Reclamo',
  `Area_Seguimiento` varchar(3) DEFAULT NULL COMMENT 'FK Area',
  `Fecha_Alta` date DEFAULT NULL,
  `Estado_Seguimiento` varchar(2) DEFAULT NULL COMMENT 'FK EstadoSeguimiento',
  `Fecha_Cambio_Estado` date DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  `Tipo_Seguimiento` int(2) DEFAULT NULL COMMENT 'FK TipoSeguimiento',
  `Reclamo` int(10) DEFAULT NULL COMMENT 'FK Reclamo',
  `Descripcion` varchar(100) DEFAULT NULL,
  `Cod_Anterior` int(10) DEFAULT NULL,
  PRIMARY KEY (`Cod_Seguimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `seguimiento` */

insert  into `seguimiento`(`Cod_Seguimiento`,`Area_Seguimiento`,`Fecha_Alta`,`Estado_Seguimiento`,`Fecha_Cambio_Estado`,`Estado`,`Tipo_Seguimiento`,`Reclamo`,`Descripcion`,`Cod_Anterior`) values (1,'CBR','2020-06-03','A','2020-08-10',0,3,NULL,'No lo han llamado para cobro, se vence.',0),(2,'ADM','2020-06-30','C',NULL,0,1,NULL,'Se Cancela a pedido del cliente.',0),(3,'VEN','2020-07-10','F',NULL,0,1,NULL,NULL,0),(4,'CBR','2021-02-20','A',NULL,0,1,NULL,NULL,0),(5,'VEN','2021-06-08','C','2021-06-07',0,3,NULL,'No quiere ser contactado.',0),(6,'VEN','2020-08-10','P','2020-09-01',0,7,NULL,'Requiere un nuevo servicio',1),(7,'VEN','2021-01-01','F',NULL,0,1,NULL,'oferta concluida',6),(25,'CBR','0000-00-00','P',NULL,0,4,9,NULL,0),(26,'CBR','0000-00-00','P',NULL,0,4,10,NULL,0),(27,'GER','2021-07-01','P',NULL,0,4,11,NULL,0),(28,'CON','2021-07-01','P',NULL,0,4,12,NULL,0),(29,'','0000-00-00','P',NULL,0,4,13,NULL,0),(30,'VEN','2021-07-01','P',NULL,0,4,14,NULL,0),(31,'LOG','2021-07-01','P',NULL,0,4,0,NULL,0),(32,'LOG','2021-07-01','P',NULL,0,4,0,NULL,0),(33,'LOG','2021-07-01','P',NULL,0,4,NULL,NULL,0),(34,'VEN','2021-07-01','P',NULL,0,4,18,NULL,0),(35,'LOG','2021-07-02','P',NULL,0,4,19,NULL,0),(36,'CBR','0000-00-00','P',NULL,0,4,20,NULL,0),(37,'CBR','0000-00-00','P',NULL,0,4,21,NULL,0),(38,'CBR','0000-00-00','P',NULL,0,4,22,NULL,0),(39,'VEN','0000-00-00','C','0000-00-00',1,4,23,NULL,0),(40,'VEN','0000-00-00','P',NULL,0,4,24,NULL,0),(41,'VEN','0000-00-00','P',NULL,0,4,25,NULL,0),(42,'CBR','0000-00-00','C','0000-00-00',1,4,26,NULL,0);

/*Table structure for table `servicio` */

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio` (
  `Cod_Servicio` varchar(3) NOT NULL COMMENT 'DetalleReclamo',
  `Descripcion_Servicio` varchar(40) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `servicio` */

insert  into `servicio`(`Cod_Servicio`,`Descripcion_Servicio`,`Estado`) values ('CBR','Cobro',0),('CCL','Cancelar',0),('CMB','Cambio',0),('ETG','Entrega',1),('INF','Informacion',0),('MNT','Mantenimiento',1),('RTR','Retiro',1);

/*Table structure for table `severidad` */

DROP TABLE IF EXISTS `severidad`;

CREATE TABLE `severidad` (
  `Cod_Severidad` varchar(3) NOT NULL COMMENT 'Problema',
  `Descripcion_Severidad` varchar(40) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Severidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `severidad` */

insert  into `severidad`(`Cod_Severidad`,`Descripcion_Severidad`,`Estado`) values ('ALT','Alta',0),('LEV','Leve',0),('MED','Media',0),('URG','Urgente',0);

/*Table structure for table `tiposeguimiento` */

DROP TABLE IF EXISTS `tiposeguimiento`;

CREATE TABLE `tiposeguimiento` (
  `Cod_Tipo` int(2) NOT NULL AUTO_INCREMENT,
  `Nombre_Tipo` varchar(10) DEFAULT NULL,
  `Estado` int(1) DEFAULT '0',
  PRIMARY KEY (`Cod_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tiposeguimiento` */

insert  into `tiposeguimiento`(`Cod_Tipo`,`Nombre_Tipo`,`Estado`) values (1,'INFO',0),(2,'PAGO',0),(3,'COBRO',0),(4,'SEGUI',0),(5,'BAJA',0),(6,'ALTA',0),(7,'CAMBIO',0);

/*Table structure for table `vistareclamos` */

DROP TABLE IF EXISTS `vistareclamos`;

/*!50001 DROP VIEW IF EXISTS `vistareclamos` */;
/*!50001 DROP TABLE IF EXISTS `vistareclamos` */;

/*!50001 CREATE TABLE `vistareclamos` (
  `Cod_Reclamo` int(10) NOT NULL DEFAULT '0',
  `Nombre_Area` varchar(30) DEFAULT NULL,
  `Fecha_Alta` date DEFAULT NULL,
  `Descripcion_Reclamo` varchar(100) DEFAULT NULL,
  `Estado_Reclamo` varchar(3) DEFAULT NULL COMMENT 'FK EstadoReclamo',
  `Descripcion_Problema` varchar(40) DEFAULT NULL,
  `Seguimiento_Actual` varchar(10) DEFAULT NULL COMMENT 'FK Seguimiento',
  `Estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view cliente */

/*!50001 DROP TABLE IF EXISTS `cliente` */;
/*!50001 DROP VIEW IF EXISTS `cliente` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cliente` AS select `clienteexterno`.`Dni_Cliente` AS `Dni_Cliente`,`clienteexterno`.`Nombre_Cliente` AS `Nombre_Cliente`,`clienteexterno`.`Mail_Cliente` AS `Mail_Cliente`,`clienteexterno`.`Tel_Cliente` AS `Tel_Cliente`,`clienteexterno`.`Dir_Cliente` AS `Dir_Cliente`,`barrio`.`Nombre_Barrio` AS `Nombre_Barrio`,`ciudad`.`Nombre_Ciudad` AS `Nombre_Ciudad`,`provincia`.`Nombre_Provincia` AS `Nombre_Provincia`,`categoriacliente`.`Nombre_Categoria` AS `Nombre_Categoria` from ((((`clienteexterno` join `barrio` on((`clienteexterno`.`Barrio_Cliente` = `barrio`.`Cod_Barrio`))) join `categoriacliente` on((`clienteexterno`.`Categoria_Cliente` = `categoriacliente`.`Cod_Categoria`))) join `ciudad` on((`ciudad`.`Cod_Ciudad` = `barrio`.`Ciudad`))) join `provincia` on((`provincia`.`Cod_Provincia` = `ciudad`.`Provincia`))) */;

/*View structure for view empleado */

/*!50001 DROP TABLE IF EXISTS `empleado` */;
/*!50001 DROP VIEW IF EXISTS `empleado` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empleado` AS select `personalreclamo`.`Dni_Personal` AS `Dni_Personal`,`personalreclamo`.`Nombre_Personal` AS `Nombre_Personal`,`personalreclamo`.`Mail_Personal` AS `Mail_Personal`,`area`.`Nombre_Area` AS `Nombre_Area`,`jerarquia`.`Nombre_Jerarquia` AS `Nombre_Jerarquia`,`personalreclamo`.`Jerarquia` AS `Jerarquia` from ((`personalreclamo` join `area` on((`personalreclamo`.`Area` = `area`.`Cod_Area`))) join `jerarquia` on((`personalreclamo`.`Jerarquia` = `jerarquia`.`Cod_Jerarquia`))) */;

/*View structure for view estadoreclamosareas */

/*!50001 DROP TABLE IF EXISTS `estadoreclamosareas` */;
/*!50001 DROP VIEW IF EXISTS `estadoreclamosareas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estadoreclamosareas` AS select `r`.`Fecha_Alta` AS `Fecha_Alta`,`d`.`Fecha_Cambio_Estado` AS `Fecha_Cambio_Estado`,`a`.`Nombre_Area` AS `Nombre_Area`,`e`.`Nombre_Estado` AS `Nombre_Estado` from (((`reclamo` `r` join `detallereclamo` `d` on((`d`.`Cod_Detalle` = `r`.`Detalle_Reclamo`))) join `area` `a` on((`a`.`Cod_Area` = `r`.`Area_Reclamo`))) join `estadoreclamo` `e` on((`e`.`Cod_Estado` = `d`.`Estado_Reclamo`))) */;

/*View structure for view gruporeclamos */

/*!50001 DROP TABLE IF EXISTS `gruporeclamos` */;
/*!50001 DROP VIEW IF EXISTS `gruporeclamos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `gruporeclamos` AS select `estadoreclamosareas`.`Nombre_Area` AS `Nombre_Area`,sum((`estadoreclamosareas`.`Nombre_Estado` = 'Abierto')) AS `Abiertos`,sum((`estadoreclamosareas`.`Nombre_Estado` = 'Solucionado')) AS `Solucionados`,sum((`estadoreclamosareas`.`Nombre_Estado` = 'Cancelado')) AS `Cancelados`,count(`estadoreclamosareas`.`Nombre_Estado`) AS `Total` from `estadoreclamosareas` group by `estadoreclamosareas`.`Nombre_Area` */;

/*View structure for view reclamosporarea */

/*!50001 DROP TABLE IF EXISTS `reclamosporarea` */;
/*!50001 DROP VIEW IF EXISTS `reclamosporarea` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reclamosporarea` AS select `a`.`Nombre_Area` AS `Nombre_Area`,count(0) AS `Cantidad` from (`reclamo` `r` join `area` `a` on((`r`.`Area_Reclamo` = `a`.`Cod_Area`))) group by `a`.`Nombre_Area` */;

/*View structure for view vistareclamos */

/*!50001 DROP TABLE IF EXISTS `vistareclamos` */;
/*!50001 DROP VIEW IF EXISTS `vistareclamos` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistareclamos` AS select `reclamo`.`Cod_Reclamo` AS `Cod_Reclamo`,`area`.`Nombre_Area` AS `Nombre_Area`,`reclamo`.`Fecha_Alta` AS `Fecha_Alta`,`detallereclamo`.`Descripcion_Reclamo` AS `Descripcion_Reclamo`,`detallereclamo`.`Estado_Reclamo` AS `Estado_Reclamo`,`problema`.`Descripcion_Problema` AS `Descripcion_Problema`,`reclamo`.`Seguimiento_Actual` AS `Seguimiento_Actual`,`reclamo`.`Estado` AS `Estado` from (((`reclamo` join `area` on((`reclamo`.`Area_Reclamo` = `area`.`Cod_Area`))) join `detallereclamo` on((`detallereclamo`.`Cod_Detalle` = `reclamo`.`Detalle_Reclamo`))) join `problema` on((`problema`.`Cod_Problema` = `detallereclamo`.`Problema`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
