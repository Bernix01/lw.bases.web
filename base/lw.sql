-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 12:48 PM
-- Server version: 10.1.19-MariaDB-1~xenial
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lw`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCertificado` (IN `content` VARCHAR(100), IN `id_estud` VARCHAR(13))  BEGIN
INSERT INTO certificado(contenido,id_estudiante) VALUES (content,id_estud);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addCurso` (IN `nomb` VARCHAR(64), IN `cost` DECIMAL(5,2))  BEGIN
INSERT INTO curso VALUES (DEFAULT,nomb,cost);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addEmprendimiento` (IN `id_est` VARCHAR(13), IN `nomb` VARCHAR(46), IN `descrip` TEXT)  BEGIN
INSERT INTO emprendimiento(id_estudiante,nombre,descripcion) VALUES (id_est,nomb,descrip);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addEtiqueta` (IN `nombre` VARCHAR(46))  BEGIN
INSERT INTO Certificado(nombre) VALUES (nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addFactura` (IN `nombs` VARCHAR(46), IN `aps` VARCHAR(46), IN `tot` DECIMAL(5,2), IN `direcc` VARCHAR(64), IN `fech` DATE, IN `rc` VARCHAR(13), IN `cupo` INT(11), IN `id_est` VARCHAR(13), IN `numero_fact` INT(9))  BEGIN
INSERT INTO factura(nombres,apellidos,total,direccion,fecha,ruc,cupos,id_estudiante,numero_factura) VALUES (nombs,aps,tot,direcc,fecha,rc,cupo,id_est,numero_fact);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addInfoCurso` (IN `id` INT(32), IN `descrip` TEXT, IN `cupo_mi` INT(11), IN `cupo_ma` INT(11), IN `cupos_d` INT(11), IN `fecha_i` DATE, IN `fecha_f` DATE)  BEGIN
INSERT INTO info_curso(id_curso,descripcion,cupo_min,cupo_max,cupos_disponibles,fecha_inicio,fecha_fin) VALUES (id,descrip,cupo_mi,cupo_ma,cupos_d,fecha_i,fecha_f);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addInfoUsuario` (IN `id` VARCHAR(13), IN `nombs` VARCHAR(46), IN `aps` VARCHAR(46), IN `tag` VARCHAR(255), IN `num_cursos` INT(11))  BEGIN
INSERT INTO info_usuario(id_usuario,nombres,apellidos,numero_cursos,tag_line) VALUES (id,nombs,aps,num_cursos,tag);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPagoDeposito` (IN `id_f` INT(32), IN `forma` INT(1), IN `n_dep` INT(16))  BEGIN
INSERT INTO Pago(id_factura,forma_pago,n_deposito) VALUES (id_f,forma,n_dep);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPagoTarjeta` (IN `id` INT(11), IN `id_f` INT(32), IN `forma` INT(1), IN `n_tarjeta` INT(16))  BEGIN
INSERT INTO pago(id_factura,forma_pago,n_tarjeta) VALUES (id_f,forma,tarjeta);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addUsuario` (IN `id` VARCHAR(13), IN `nick` VARCHAR(16), IN `pass` VARCHAR(15), IN `correo` VARCHAR(64), IN `ro` INT(1), OUT `ultimo_id` VARCHAR(13))  BEGIN
INSERT into usuario(id_usuario,nickname, contrasenia, email, rol) values(id,nick, pass, correo, ro);
SET  ultimo_id= LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarCurso` (IN `cadena` VARCHAR(64))  BEGIN
SELECT * from curso,info_curso where info_curso.id_curso=curso.id_curso AND curso.nombre LIKE cadena ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarCursos` ()  BEGIN
SELECT COUNT(curso.id_curso) from curso;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarEtiquetas` (OUT `numero` INT)  BEGIN
SELECT count(id_etiqueta) INTO numero FROM etiqueta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarEtiquetas1` ()  BEGIN
SELECT COUNT(etiqueta.id_etiqueta) from etiqueta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contarUsuarios` ()  BEGIN
SELECT COUNT(usuario.id_usuario) from usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCertificado` (IN `id` INT)  BEGIN
DELETE FROM certificado WHERE id_certificado=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteCurso` (IN `id` INT)  BEGIN
DELETE FROM curso WHERE id_curso=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDetalleFactura` (IN `id` INT)  BEGIN
DELETE FROM detalle_factura WHERE id_factura=id; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEmprendimiento` (IN `id` INT)  BEGIN
DELETE FROM emprendimiento WHERE id_emprendimiento = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEtiqueta` (IN `id` INT)  BEGIN
DELETE FROM etiqueta WHERE id_etiqueta=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteFactura` (IN `id` INT(32))  BEGIN
DELETE FROM factura WHERE id_factura=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteInfoCurso` (IN `id` INT(32))  BEGIN
DELETE FROM info_curso WHERE id_curso=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteInfoUsuario` (IN `id` VARCHAR(13))  BEGIN
DELETE FROM info_usuario WHERE id_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePago` (IN `id` INT(11))  BEGIN
DELETE FROM pago WHERE id_pago=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUsuario` (IN `id` VARCHAR(13))  BEGIN
DELETE FROM usuario WHERE id_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllCursos` ()  BEGIN
SELECT * from curso;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDetalles` ()  BEGIN
SELECT * from detalle_factura;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllEmprendimientos` ()  BEGIN
SELECT * from emprendimiento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllEtiquetas` ()  BEGIN
SELECT * from etiqueta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllFacturas` ()  BEGIN
SELECT * from factura;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPagos` ()  BEGIN
SELECT * from pago;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUsuarios` ()  BEGIN
SELECT * from usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUsuariosAndInfos` ()  BEGIN
Select * from usuario LEFT JOIN info_usuario USING (id_usuario);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCertificadoById` (IN `id_cert` INT)  BEGIN
SELECT * FROM certificado WHERE id_certificado=id_cert;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCertificadosByStudentId` (IN `id` VARCHAR(13))  BEGIN
SELECT * FROM certificado WHERE id_estudiante=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCursoAndInfoById` (IN `idc` INT)  BEGIN
SELECT * FROM curso,info_curso WHERE curso.id_curso=info_curso.id_curso and curso.id_curso=idc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCursosByProfId` (IN `id` VARCHAR(13))  BEGIN
Select curso.* , info_curso.* FROM curso, info_curso, curso_profesor WHERE curso.id_curso=info_curso.id_curso AND curso.id_curso=curso_profesor.id_curso AND curso_profesor.id_profesor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getCursosByStudentId` (IN `id` VARCHAR(13))  BEGIN
SELECT curso.* , info_curso.* FROM curso,info_curso,curso_estudiante WHERE curso.id_curso=info_curso.id_curso AND curso_estudiante.id_curso=curso.id_curso AND curso_estudiante.id_estudiante=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDetallesByFacturaId` (IN `id` INT)  BEGIN
SELECT * FROM detalle_factura WHERE id_factura=id; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEmprendimientoById` (IN `id` INT)  BEGIN
SELECT * FROM emprendimiento WHERE id_emprendimiento= id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEmprendimientosByStudentId` (IN `id` VARCHAR(13))  BEGIN
SELECT * FROM emprendimiento WHERE id_estudiante=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getEtiquetaById` (IN `id` INT)  BEGIN
SELECT * FROM etiqueta WHERE id_etiqueta=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getInfoUsuarioById` (IN `id` VARCHAR(13))  BEGIN
SELECT * FROM info_usuario WHERE id_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPagoById` (IN `id` INT(11))  BEGIN
SELECT * from pago where id_pago=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserByCredentials` (IN `nick` VARCHAR(16), IN `pas` VARCHAR(15))  BEGIN
SELECT * FROM usuario WHERE nickname=nick AND contrasenia=pas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserById` (IN `id` VARCHAR(13))  BEGIN
SELECT * FROM usuario WHERE id_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listarCertificados` ()  BEGIN
SELECT * FROM certificado;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sustentacion` ()  BEGIN
SELECT * from estudiantesMax;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCertificado` (IN `id` INT, IN `id_estud` VARCHAR(13), IN `content` VARCHAR(100))  BEGIN
UPDATE certificado SET id_estudiante=id_estud, contenido=content WHERE id_certificado=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCurso` (IN `id` INT, IN `nomb` VARCHAR(64), IN `cost` DECIMAL(5,2))  BEGIN
UPDATE curso SET nombre=nomb, costo=cost WHERE id_curso=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDetalleFactura` (IN `id_f` INT, IN `id_c` INT)  BEGIN
UPDATE detalle_factura SET  id_curso=id_c WHERE id_factura=id_f;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEmprendimiento` (IN `id` INT, IN `id_est` VARCHAR(13), IN `nomb` VARCHAR(46), IN `descrip` TEXT)  BEGIN
UPDATE emprendimiento SET nombre=nomb, descripcion=descrip, id_estudiante=id_es WHERE id_emprendimiento=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEtiqueta` (IN `id` INT, IN `nomb` VARCHAR(46))  BEGIN
UPDATE etiqueta SET nombre=nomb WHERE id_etiqueta= id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateFactura` (IN `id` INT(32), IN `nombs` VARCHAR(46), IN `aps` VARCHAR(46), IN `tot` DECIMAL(5,2), IN `direcc` VARCHAR(64), IN `fech` DATE, IN `rc` VARCHAR(13), IN `cupo` INT(11), IN `id_est` VARCHAR(13))  BEGIN
UPDATE factura SET nombres=nombs, apellidos=aps, total=tot, direccion=direcc, fecha=fech,ruc=rc,cupos=cupo,id_estudiante=id_est WHERE id_factura=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateInfoCurso` (IN `id` INT(32), IN `descrip` TEXT, IN `cupo_mi` INT(11), IN `cupo_ma` INT(11), IN `cupos_d` INT(11), IN `fecha_i` DATE, IN `fecha_f` DATE)  BEGIN
UPDATE info_curso SET descripcion=descrip, cupo_min=cupo_mi, cupo_max=cupo_ma, cupos_disponibles=cupos_d, fecha_inicio=fecha_i, fecha_fin=fecha_f WHERE id_curso=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateInfoUsuario` (IN `id` VARCHAR(13), IN `nombs` VARCHAR(46), IN `aps` VARCHAR(46), IN `tag` VARCHAR(255), IN `num_cursos` INT(11))  BEGIN
UPDATE info_usuario SET nombres=nombs, apellidos=aps, tag_line=tag , numero_cursos=num_cursos WHERE id_usuario=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateUsuario` (IN `id` VARCHAR(13), IN `nick` VARCHAR(16), IN `pass` VARCHAR(15), IN `ro` INT(1), IN `correo` VARCHAR(15))  BEGIN
UPDATE usuario SET nickname=nick, contrasenia=pass, rol=ro, email=correo WHERE id_usuario=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(32) NOT NULL,
  `id_estudiante` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `contenido` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `certificado`
--

INSERT INTO `certificado` (`id_certificado`, `id_estudiante`, `contenido`, `titulo`) VALUES
(1, '1604070162099', 'sdf', 'Certificado #111'),
(5, '1604031238999', 'un certificado más', 'certificado de poo'),
(14, '1604031238999', 'afsdgadfsgdsf', 'Certificado de quimica'),
(15, '1609041989699', 'certificado_modelo', 'experto en interfaces!'),
(16, '1609041989699', 'certificado-prueba', 'certificado1');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(32) NOT NULL,
  `nombre` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `costo` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre`, `costo`) VALUES
(1, ' data mining ', '41.37'),
(2, ' matemáticas superiores ', '31.35'),
(3, 'matemáticas discretas ', '14.59'),
(4, ' matemáticas superiores ', '27.42'),
(5, 'matemáticas discretas ', '99.57'),
(6, ' pogramación orientada a aspectos ', '11.48'),
(7, ' machine-learning ', '79.33'),
(8, ' android avanzado', '53.45'),
(9, ' adobe illustrator básico ', '53.05'),
(10, ' machine-learning ', '1.32'),
(11, ' machine-learning ', '57.12'),
(12, ' pogramación orientada a aspectos ', '80.84'),
(13, ' machine-learning ', '86.04'),
(14, 'matemáticas discretas ', '21.74'),
(15, ' programación orientada a objetos ', '13.46'),
(16, 'matemáticas discretas ', '23.89'),
(17, ' data mining ', '89.17'),
(18, ' matemáticas superiores ', '57.04'),
(19, ' programación orientada a objetos ', '49.68'),
(20, ' adobe illustrator básico ', '24.30'),
(21, ' android avanzado', '11.13'),
(22, ' pogramación orientada a aspectos ', '70.61'),
(23, ' curso de android ', '33.95'),
(24, ' programación orientada a objetos ', '8.25'),
(25, ' matemáticas superiores ', '38.11'),
(26, ' machine-learning ', '57.89'),
(27, ' pogramación orientada a aspectos ', '44.55'),
(28, 'matemáticas discretas ', '1.71'),
(29, 'matemáticas discretas ', '17.20'),
(30, 'matemáticas discretas ', '17.09'),
(31, 'mandarin', '45.00'),
(32, 'Fundamentos de quimica', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `curso_estudiante`
--

CREATE TABLE `curso_estudiante` (
  `id_estudiante` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `id_curso` int(32) NOT NULL,
  `habilitado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `curso_estudiante`
--

INSERT INTO `curso_estudiante` (`id_estudiante`, `id_curso`, `habilitado`) VALUES
('1604031238999', 1, 1),
('1604031238999', 2, 1),
('1604031238999', 10, 1),
('1604031238999', 16, 1),
('1608112083799', 5, 1),
('1608112083799', 6, 1),
('1618032056299', 2, 1),
('1618032056299', 9, 1),
('1618032056299', 12, 1),
('1618032056299', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curso_etiqueta`
--

CREATE TABLE `curso_etiqueta` (
  `id_curso` int(32) NOT NULL,
  `id_etiqueta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `curso_etiqueta`
--

INSERT INTO `curso_etiqueta` (`id_curso`, `id_etiqueta`) VALUES
(7, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `curso_horario`
--

CREATE TABLE `curso_horario` (
  `id_curso` int(32) NOT NULL,
  `id_horario` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `curso_horario`
--

INSERT INTO `curso_horario` (`id_curso`, `id_horario`) VALUES
(32, 1),
(32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `curso_profesor`
--

CREATE TABLE `curso_profesor` (
  `id_curso` int(32) NOT NULL,
  `id_profesor` varchar(13) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `curso_profesor`
--

INSERT INTO `curso_profesor` (`id_curso`, `id_profesor`) VALUES
(1, '0925650996'),
(2, '0925650996');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_factura` int(32) NOT NULL,
  `id_curso` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprendimiento`
--

CREATE TABLE `emprendimiento` (
  `id_emprendimiento` int(32) NOT NULL,
  `id_estudiante` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(46) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `emprendimiento`
--

INSERT INTO `emprendimiento` (`id_emprendimiento`, `id_estudiante`, `nombre`, `descripcion`) VALUES
(1, '1604031238999', 'Dental Hygienist', 'metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in'),
(2, '1604031238999', 'Dental Hygienist', 'metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in'),
(3, '1608112083799', 'Human Resources Manager', 'quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam'),
(4, '1618032056299', 'Quality Control Specialist', 'a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed'),
(5, '1621073069299', 'Programmer III', 'libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo'),
(6, '1633081459799', 'Financial Analyst', 'id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci'),
(7, '1634010992199', 'VP Product Management', 'in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam'),
(8, '1604031238999', 'emprendimiento de dui', 'emprendimiento de prueba para dui'),
(9, '1604031238999', 'emprendimiento de dui 2', 'Otro emprendimiento de prueba');

-- --------------------------------------------------------

--
-- Stand-in structure for view `estudiantesMax`
--
CREATE TABLE `estudiantesMax` (
`id_usuario` varchar(13)
,`nickname` varchar(16)
,`contrasenia` varchar(15)
,`email` varchar(64)
,`last_login` datetime
,`rol` int(1)
,`nombres` varchar(46)
,`apellidos` varchar(46)
,`numero_cursos` int(11)
,`tag_line` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `etiqueta`
--

CREATE TABLE `etiqueta` (
  `id_etiqueta` int(5) NOT NULL,
  `nombre` varchar(46) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `etiqueta`
--

INSERT INTO `etiqueta` (`id_etiqueta`, `nombre`) VALUES
(9, ' android '),
(2, ' ciencia '),
(15, ' cine '),
(6, ' computación '),
(13, ' construccion '),
(11, ' english '),
(3, ' fisica '),
(12, ' francés '),
(17, ' información '),
(10, ' informática '),
(18, ' internet '),
(8, ' java '),
(7, ' medicina '),
(14, ' movil '),
(19, ' poo '),
(5, ' programacion '),
(16, ' tecnología '),
(21, ' television '),
(20, ' tics '),
(4, 'cocina '),
(1, 'curso ');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(32) NOT NULL,
  `id_estudiante` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `nombres` varchar(46) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(46) COLLATE latin1_spanish_ci NOT NULL,
  `numero_factura` int(9) NOT NULL,
  `ruc` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `cupos` int(11) NOT NULL DEFAULT '0',
  `direccion` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id_factura`, `id_estudiante`, `fecha`, `total`, `nombres`, `apellidos`, `numero_factura`, `ruc`, `cupos`, `direccion`) VALUES
(1, '1604070162099', '2017-01-17', '60.00', 'Cecilia', 'Solís Avendaño', 1200099, '0936760895001', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(32) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id_horario`, `inicio`, `fin`) VALUES
(1, '2017-04-12 23:20:00', '2017-04-12 23:20:00'),
(2, '2017-04-25 17:20:00', '2017-04-25 23:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `info_curso`
--

CREATE TABLE `info_curso` (
  `id_curso` int(32) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `cupo_min` int(11) NOT NULL,
  `cupo_max` int(11) NOT NULL,
  `cupos_disponibles` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `info_curso`
--

INSERT INTO `info_curso` (`id_curso`, `descripcion`, `cupo_min`, `cupo_max`, `cupos_disponibles`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Este curso le enseñará a extraer grandes cantidades de datos.', 10, 20, 20, '2016-12-29', '2017-02-22'),
(2, 'Las matemáticas superiores son indispensables para cualquier ingeniero; en este curso aprenderá sus fundamentos.', 8, 18, 18, '2016-12-23', '2017-01-28'),
(3, 'Matemáticas discretas es un curso en el cual adquirirá sobre todo habilidades de conteo', 14, 30, 29, '2016-12-15', '2017-01-30'),
(6, 'La POA es lo mejor. ', 17, 25, 19, '2016-12-26', '2017-02-15'),
(12, 'ekjfuchklfbjvlgtkbhjgtl.b', 12, 25, 1, '2016-12-15', '2016-12-23'),
(32, 'Mucha quimica aquí', 3, 20, 20, '2017-01-18', '2017-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `info_usuario`
--

CREATE TABLE `info_usuario` (
  `id_usuario` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `nombres` varchar(46) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(46) COLLATE latin1_spanish_ci NOT NULL,
  `numero_cursos` int(11) DEFAULT '0',
  `tag_line` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `info_usuario`
--

INSERT INTO `info_usuario` (`id_usuario`, `nombres`, `apellidos`, `numero_cursos`, `tag_line`) VALUES
('1604031238999', 'dui', 'peres', 4, NULL),
('1604070162099', 'digna', 'solisa', 0, NULL),
('1608112083799', 'juanito', 'perez', 2, NULL),
('1609041989699', 'lola', 'guzman', 0, 'probando'),
('1618032056299', 'Lisa', 'Fiallos', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id_factura` int(32) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `n_tarjeta` int(16) NOT NULL DEFAULT '-1',
  `n_deposito` int(16) NOT NULL DEFAULT '-1',
  `forma_pago` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(13) COLLATE latin1_spanish_ci NOT NULL,
  `nickname` varchar(16) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `rol` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nickname`, `contrasenia`, `email`, `last_login`, `rol`) VALUES
('0925650996', 'bellengc', '1234a', 'belen@espol.ec', '0000-00-00 00:00:00', 1),
('0925650997', 'bellengc1', '1234a', 'belen1@espol.ec', '0000-00-00 00:00:00', 1),
('0925650998', 'bel2', '123', 'bel2@gmial.com', '0000-00-00 00:00:00', 1),
('1604031238999', 'dui.', 'POO48HMU6HJ', 'adfsad@asdfasdf.com', '2017-02-02 08:24:33', 0),
('1604070162099', 'dignissim.', 'JWM51QWJ1XN', 'tempor.est.ac@gravidasagittisDuis.com', '2016-02-07 23:40:47', 1),
('1604110664599', 'natoque', 'PIH93DMX1ER', 'nulla@Intincidunt.net', '2016-10-25 20:33:21', 1),
('1608112083799', 'ligula', 'ZEI36NOP1NI', 'In.mi@id.edu', '2016-07-25 13:08:36', 0),
('1609041989699', 'pulvinar', 'FYW12AVK4PK', 'eget.magna@Quisqueporttitor.com', '2017-02-19 10:39:43', 2),
('1610042569699', 'Etiam', 'FOE41CTV8VJ', 'nibh@gravida.org', '2017-11-05 20:02:52', 2),
('1613041522999', 'luctus,', 'UBR28DSE4RY', 'gravida.nunc@luctus.net', '2017-08-27 01:41:25', 1),
('1613041564599', 'ut,', 'GWR91NQB8NN', 'Integer.sem@aliquamarcu.com', '2017-06-01 23:49:38', 2),
('1615102627199', 'tortor', 'BVE85CJV4OP', 'quam.a.felis@dolorDonecfringilla.com', '2017-06-14 06:20:58', 2),
('1616082157799', 'rutrum', 'QOT40OSO5TP', 'bibendum.Donec.felis@augue.ca', '2016-12-19 01:25:57', 1),
('1616121508899', 'elit', 'RZJ41AGA4HV', 'ullamcorper.viverra@odiosagittissemper.co.uk', '2017-02-08 08:15:51', 1),
('1618032056299', 'eu', 'BFQ08RDR6TQ', 'consequat.lectus.sit@metus.net', '2016-11-22 01:52:35', 0),
('1621073069299', 'volutpat', 'KEG57KFY1AA', 'odio.Aliquam@Pellentesque.co.uk', '2017-09-21 03:35:13', 0),
('1621101268199', 'Suspendisse', 'UCV17ODG5AL', 'tincidunt.neque@ornareIn.com', '2017-12-06 19:41:59', 1),
('1621102267299', 'non', 'FRV78KIN9RX', 'a@diamnunc.ca', '2016-06-20 04:59:31', 1),
('1623040414999', 'aliquet', 'KUH26YRJ3RI', 'augue.porttitor.interdum@nascetur.co.uk', '2017-02-04 06:57:22', 1),
('1623050739999', 'a,', 'KZP53CVB7FM', 'tincidunt.dui@purussapiengravida.co.uk', '2016-03-24 12:36:43', 1),
('1625072347699', 'metus.', 'VEY57DAE2LN', 'eget.magna@condimentum.ca', '2016-06-05 02:29:24', 1),
('1626120651399', 'Curabitur', 'PRR63IEA9CQ', 'ligula.Nullam@senectus.ca', '2017-10-05 07:38:54', 1),
('1629070436199', 'pede,', 'TMY68AOU8CC', 'Duis.sit.amet@sedturpis.ca', '2017-10-09 13:12:21', 2),
('1631092842999', 'tincidunt', 'RSF93EQN1SC', 'Morbi.neque.tellus@Vestibulum.com', '2016-06-16 00:20:45', 1),
('1633081459799', 'tellus', 'QGB45DET7KH', 'Nunc@turpis.org', '2016-03-21 02:31:31', 0),
('1633102113299', 'massa.', 'EFH43NJL6IZ', 'pretium.neque@euismodindolor.org', '2016-05-08 08:14:33', 1),
('1634010992199', 'erat', 'OJA65WXQ4QR', 'adipiscing@dolorsitamet.edu', '2016-02-19 23:23:56', 0),
('1634011227999', 'egestas', 'KTF84NXD8JU', 'vel.nisl@tempus.co.uk', '2016-07-23 02:12:34', 0),
('1635122296399', 'enim.', 'HLK46VDX4KI', 'tincidunt.nunc@gravida.edu', '2016-09-26 21:08:51', 1),
('1637010584699', 'purus', 'CXR51XBE4YS', 'Nam@Namporttitor.org', '2017-04-25 07:26:50', 2),
('1637031448399', 'auctor.', 'PLG63UBN3HU', 'ligula@elit.co.uk', '2016-02-29 16:18:48', 1),
('1640050276999', 'mus.', 'XYB09WGM1RQ', 'egestas@ligula.edu', '2017-03-23 23:51:17', 0),
('1641032720899', 'enim', 'OOE19RYL3FA', 'Integer.urna@Uttinciduntvehicula.net', '2017-09-27 04:56:11', 0),
('1643101211599', 'odio', 'EPP17HZM5HS', 'nunc.id.enim@velfaucibus.org', '2016-08-02 07:14:55', 2),
('1643112436199', 'Curae;', 'VPL07RUM9KE', 'amet.ante.Vivamus@Fuscedolor.edu', '2016-03-17 13:03:44', 2),
('1644022921999', 'vestibulum', 'IXD70IMH3NM', 'metus.Aliquam.erat@Nullatinciduntneque.com', '2016-06-02 17:12:02', 0),
('1645020743799', 'luctus', 'EKS75OMU1TH', 'Pellentesque@Nuncac.com', '2016-10-12 18:19:06', 2),
('1646061742399', 'id,', 'VSE25AJL2OS', 'risus.a.ultricies@eleifend.com', '2017-11-26 21:41:09', 1),
('1646082720899', 'mollis', 'ZGG09XMT5RT', 'parturient.montes.nascetur@Integerurna.net', '2015-12-15 19:30:11', 2),
('1646101325299', 'id', 'NQU90VVN9FJ', 'eros@massanon.ca', '2017-12-02 21:34:32', 2),
('1648021874099', 'Nunc', 'KUX72TOY9JQ', 'Vivamus@semPellentesqueut.net', '2017-11-02 20:17:59', 0),
('1649050633399', 'purus.', 'YMP73YAD2WN', 'massa@arcuVestibulum.co.uk', '2017-05-30 05:23:16', 1),
('1649092286999', 'dictum', 'JNP29VKU8FI', 'fames.ac@etmalesuada.ca', '2016-07-23 06:45:00', 1),
('1650022254699', 'et,', 'RQN42ZDB6EZ', 'in.sodales@Donectemporest.co.uk', '2016-07-25 21:46:28', 0),
('1650040594899', 'imperdiet', 'CBJ84YTI3NU', 'molestie.arcu.Sed@velsapien.ca', '2017-03-19 08:51:19', 2),
('1650050413199', 'Nulla', 'YHT16EDO6DR', 'purus@sedturpisnec.net', '2016-12-11 15:49:34', 2),
('1652041310299', 'tempor', 'KRA54UUZ8QL', 'Nam@Donecconsectetuermauris.org', '2017-07-22 13:43:23', 0),
('1654042439399', 'gravida', 'ZUV88TKP7EN', 'dolor.dapibus@vulputatelacusCras.org', '2016-07-24 21:51:39', 0),
('1655052321299', 'Proin', 'CWD32FLH7DG', 'laoreet@sedpedeCum.ca', '2016-12-28 22:53:08', 1),
('1656032579699', 'in,', 'FCI71JJQ3YS', 'pharetra.Quisque.ac@non.edu', '2017-02-10 10:20:54', 0),
('1656050321299', 'nibh.', 'LKO26IVI6FV', 'magna.a.neque@quis.edu', '2016-05-29 09:13:52', 0),
('1657100758799', 'quis', 'TPQ19BUV8YE', 'leo@odioPhasellusat.net', '2016-04-06 03:24:49', 0),
('1657110642899', 'Sed', 'UHA18RSN7IB', 'ipsum.nunc.id@Proin.co.uk', '2016-01-10 22:58:57', 0),
('1658011174499', 'consectetuer', 'DTF33ENY0GF', 'Suspendisse@sedsapien.org', '2016-05-27 23:26:14', 1),
('1660082656999', 'quam', 'KAD27BYT0QV', 'sem.magna.nec@incursus.co.uk', '2016-04-17 18:44:09', 1),
('1660092206799', 'viverra.', 'FDB32ZCR9YY', 'a@scelerisquenequeNullam.edu', '2017-09-09 11:19:44', 1),
('1661101617099', 'sem', 'DUK75AZB0RA', 'erat.neque.non@malesuadavel.com', '2017-09-05 09:06:29', 0),
('1663070732099', 'lobortis.', 'KYO36EAL0GJ', 'arcu.iaculis@Quisquenonummy.net', '2016-10-04 22:38:26', 2),
('1663082634599', 'ipsum', 'IRW25PGJ0BK', 'est@cursusa.edu', '2015-12-17 18:54:04', 0),
('1664021210399', 'sit', 'KXJ32TJL2IK', 'neque.sed.dictum@magna.com', '2017-11-09 21:33:59', 2),
('1665030621499', 'mi', 'RAJ86MML6NK', 'aliquam@maurisrhoncusid.org', '2016-06-23 23:14:11', 2),
('1665080338099', 'dis', 'PYG58CQL8TN', 'mauris.a.nunc@Nam.co.uk', '2016-07-07 03:11:55', 2),
('1669111684899', 'blandit.', 'JNL48WPT4HO', 'ridiculus@urnaUttincidunt.ca', '2017-03-22 16:13:15', 0),
('1670032806899', 'neque', 'RAN16BOX6AA', 'Sed@ridiculusmus.ca', '2016-09-11 21:39:26', 1),
('1670071161599', 'ornare,', 'GJK19ASG4ZM', 'tortor@miacmattis.ca', '2017-10-03 14:13:25', 1),
('1671050525499', 'ultrices', 'HWL08BLU3AC', 'mi.tempor@pedeultrices.ca', '2017-11-11 11:26:20', 0),
('1673022402099', 'tempus', 'KOK25VYB9TD', 'congue.a@Maurisutquam.co.uk', '2017-09-16 20:33:00', 1),
('1675051738199', 'dui', 'IYZ75UUG1YV', 'Donec.est.mauris@cursusluctusipsum.com', '2017-08-18 15:12:09', 2),
('1675052580099', 'libero', 'MAU77LOD2YX', 'Pellentesque@Praesenteunulla.com', '2017-06-02 10:44:25', 0),
('1676090172399', 'vitae,', 'BDK73FCE0JQ', 'dictum@dictumeu.org', '2016-11-20 03:08:45', 2),
('1676111567999', 'Mauris', 'RDX11TWH1EG', 'nec@ridiculus.com', '2017-11-10 03:31:20', 1),
('1677040197899', 'augue', 'WTA47QOG0RV', 'sit@fringillapurus.edu', '2016-11-15 20:06:05', 1),
('1677072988099', 'scelerisque', 'QAY24IGV5NW', 'erat.Sed.nunc@Donecnonjusto.org', '2016-06-18 21:04:38', 0),
('1678060453599', 'nisi', 'OMO97ZPS9XC', 'ullamcorper.magna@cursusInteger.ca', '2016-06-22 08:36:32', 2),
('1679110531099', 'elit.', 'ZTS86TDS4HH', 'Quisque.varius@Maecenas.ca', '2016-07-24 06:16:51', 2),
('1681041538499', 'diam', 'XNW63GEF7SC', 'metus@Nullamut.ca', '2016-08-18 23:13:26', 1),
('1683090218099', 'aptent', 'SON54MWT1AB', 'augue.id@aauctornon.org', '2017-04-17 01:52:05', 1),
('1684092186399', 'et', 'VYG58SOI2WC', 'ac.tellus.Suspendisse@ametdapibusid.net', '2016-01-26 04:24:08', 2),
('1684101691999', 'Cras', 'NIF54XQK9IU', 'Praesent.eu.nulla@lectuspede.ca', '2017-02-23 00:25:47', 2),
('1689082939999', 'leo.', 'FDT66PBI2II', 'consequat.nec@molestiesodalesMauris.edu', '2016-05-20 08:36:24', 2),
('1689120506399', 'pharetra.', 'YLY44AMJ8IJ', 'eu@sodalespurus.net', '2016-01-12 05:28:42', 2),
('1691083014099', 'lacus.', 'LRV05LWJ5XH', 'lacus.Ut.nec@Aenean.co.uk', '2017-03-02 15:38:37', 1),
('1692041313699', 'amet', 'NWT75CYX3UA', 'lobortis.augue@orcisemeget.org', '2016-05-18 15:55:14', 2),
('1693032619999', 'Fusce', 'XXJ71RNX4BB', 'enim.Suspendisse@quis.ca', '2017-05-27 20:33:07', 1),
('1693072126399', 'dolor.', 'OLD38ZBW3IX', 'magna@tempor.com', '2016-03-24 08:06:17', 1),
('1693101394899', 'ante.', 'ACV34COA6ON', 'Suspendisse.sagittis.Nullam@lacuspedesagittis.net', '2016-06-19 00:54:13', 0),
('1697100903399', 'nec', 'QOL79DFE1VF', 'in.faucibus.orci@nulla.com', '2017-08-30 18:14:53', 1),
('1699030343099', 'orci,', 'UPW76XLX6YJ', 'lorem.lorem.luctus@nec.ca', '2017-05-28 03:52:54', 2);

-- --------------------------------------------------------

--
-- Structure for view `estudiantesMax`
--
DROP TABLE IF EXISTS `estudiantesMax`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `estudiantesMax`  AS  select `usuario`.`id_usuario` AS `id_usuario`,`usuario`.`nickname` AS `nickname`,`usuario`.`contrasenia` AS `contrasenia`,`usuario`.`email` AS `email`,`usuario`.`last_login` AS `last_login`,`usuario`.`rol` AS `rol`,`info_usuario`.`nombres` AS `nombres`,`info_usuario`.`apellidos` AS `apellidos`,`info_usuario`.`numero_cursos` AS `numero_cursos`,`info_usuario`.`tag_line` AS `tag_line` from (`usuario` join `info_usuario` on((`usuario`.`id_usuario` = `info_usuario`.`id_usuario`))) where (`info_usuario`.`numero_cursos` = (select max(`info_usuario`.`numero_cursos`) from `info_usuario`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `id_curso` (`id_curso`);

--
-- Indexes for table `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `curso_etiqueta`
--
ALTER TABLE `curso_etiqueta`
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_etiqueta` (`id_etiqueta`);

--
-- Indexes for table `curso_horario`
--
ALTER TABLE `curso_horario`
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indexes for table `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indexes for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `emprendimiento`
--
ALTER TABLE `emprendimiento`
  ADD PRIMARY KEY (`id_emprendimiento`),
  ADD KEY `id_usuario` (`id_estudiante`);

--
-- Indexes for table `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`id_etiqueta`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indexes for table `info_curso`
--
ALTER TABLE `info_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `id_curso_2` (`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `info_usuario`
--
ALTER TABLE `info_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `emprendimiento`
--
ALTER TABLE `emprendimiento`
  MODIFY `id_emprendimiento` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id_etiqueta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_estudiante_fk` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curso_estudiante`
--
ALTER TABLE `curso_estudiante`
  ADD CONSTRAINT `curso_estudiante_fk` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_por_estudiante_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Constraints for table `curso_etiqueta`
--
ALTER TABLE `curso_etiqueta`
  ADD CONSTRAINT `etiqueta_curso_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etiqueta_etiqueta_fk` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiqueta` (`id_etiqueta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curso_horario`
--
ALTER TABLE `curso_horario`
  ADD CONSTRAINT `curso_horario_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_horario_fk` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Constraints for table `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD CONSTRAINT `curso_curso_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_profesor_fk` FOREIGN KEY (`id_profesor`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_curso_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_factura_fk` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emprendimiento`
--
ALTER TABLE `emprendimiento`
  ADD CONSTRAINT `emprendimiento_usuario_fk` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_estudiante_fk` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_curso`
--
ALTER TABLE `info_curso`
  ADD CONSTRAINT `infocurso_curso_fk` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_usuario`
--
ALTER TABLE `info_usuario`
  ADD CONSTRAINT `infousuario_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `formapsgo_factura_fk` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
