-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 03:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuevaspaginas`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `precioVenta` double NOT NULL,
  `fechaCompra` date NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id`, `descripcion`, `precio`, `precioVenta`, `fechaCompra`, `stock`) VALUES
(1, 'Bolsa de regalo 18x23x10', 2500, 3500, '2022-12-12', 6),
(2, 'Bolsa de regalo S Primavera', 1200, 2200, '2022-12-12', 6),
(3, 'Bolsa de regalo L Premium Primavera', 2700, 3700, '2022-12-12', 6),
(4, 'Bolsa de regalo 26x32x10', 3500, 4500, '2022-12-12', 6),
(5, 'Caja de regalo metalizada pequeña', 1300, 2500, '2022-12-12', 6),
(6, 'Papel regalo pliego surtido', 1300, 2500, '2022-12-13', 6),
(7, 'Cinta de enmascarar 24x20', 2800, 3800, '2022-12-12', 6),
(8, 'Cinta de enmascarar 18x20', 2600, 3600, '2022-12-12', 6),
(9, 'Aviso Feliz Cumpleaños', 2500, 3500, '2022-12-12', 6),
(10, 'Folder celuguía tamaño oficio', 600, 1300, '2022-12-12', 12),
(11, 'Folder celuguía tamaño carta', 600, 1300, '2022-12-13', 12),
(12, 'Pegante Rapid', 3300, 3800, '2022-12-13', 6),
(13, 'Cinta transparente delgada 12 mm', 1500, 2300, '2022-12-13', 6),
(14, 'Micropuntas de colores', 875, 1200, '2022-12-13', 12),
(15, 'Pincel pequeño', 800, 1300, '2022-12-12', 11),
(16, 'Pincel grande', 1500, 2000, '2022-12-12', 7),
(17, 'Folder celuguía tamaño oficio', 700, 1300, '2022-12-12', 12),
(18, 'Cartulina 1/8 paquete x 7 (3)', 200, 500, '2022-12-12', 21),
(19, 'Lupa 90 mm grande 120/200', 5400, 7000, '2022-12-12', 2),
(22, 'Sobre manila tamaño oficio', 150, 300, '2022-12-12', 100),
(23, 'Carpeta presentación carta', 300, 700, '2022-12-12', 50),
(24, 'Carpeta bisel carta poli humo', 750, 1300, '2022-12-12', 6),
(26, 'Fomi carta x 10 escarchado (2)', 700, 1000, '2022-12-12', 20),
(28, 'Block carta hojas cuadros x 70 (1)', 35, 200, '2022-12-12', 70),
(30, 'Block de hojas', 2500, 4000, '2022-12-12', 7),
(34, 'Tijera oficina grande ¾', 3200, 4200, '2022-12-12', 6),
(37, 'Borrador nata 624', 121, 500, '2022-12-12', 24),
(38, 'Borrador PZ – 20', 500, 800, '2022-12-12', 20),
(39, 'Bolígrafo kilométrico', 458, 1200, '2022-12-12', 12),
(40, 'Bolígrafo Bic cristal', 416, 1000, '2022-12-12', 12),
(43, 'Serpentina irisada', 1600, 2300, '2022-12-12', 6),
(47, 'Silicona barra gruesa', 1150, 1400, '2022-12-12', 6),
(49, 'Cartulina pliego 70 x 100', 1200, 1500, '2022-12-12', 12),
(51, 'Cartulina 50 x 70 pliego negra', 700, 1000, '2022-12-12', 6),
(52, 'Rollo de precio', 1300, 1600, '2022-12-12', 6),
(54, 'Portarretrato plástico 5x7', 8000, 12000, '2022-12-12', 1),
(55, 'Portarretrato plástico 4x6', 6000, 10000, '2022-12-12', 1),
(56, 'Portarretrato de metal', 10000, 14000, '2022-12-12', 1),
(58, 'Adorno de campana', 5000, 8000, '2022-12-12', 3),
(59, 'Corona navideña con chonga', 8000, 12000, '2022-12-12', 3),
(61, 'Mini pistola de silicona', 12000, 15000, '2022-12-12', 3),
(63, 'Lupa 90 mm grande 120/200', 5400, 7000, '2022-12-12', 2),
(64, 'Talonario rifa periódico', 650, 1300, '2022-12-12', 6),
(65, 'Minifactura periódico', 450, 1000, '2022-12-12', 6),
(67, 'Carpeta presentación carta', 300, 700, '2022-12-12', 50),
(69, 'Fomi carta paquete x 10 (2)', 350, 600, '2022-12-12', 20),
(70, 'Fomi carta x 10 escarchado (2)', 700, 1000, '2022-12-12', 20),
(71, 'Block carta hojas blancas x 70 (3)', 32, 200, '2022-12-12', 21),
(73, 'Block carta hojas rayadas x 70 (3)', 32, 200, '2022-12-12', 21),
(75, 'Cartón paja 1/8 paquete x 12', 400, 700, '2022-12-12', 12),
(76, 'Cinta transparente 48x40', 3400, 5000, '2022-12-12', 6),
(77, 'Cinta transparente 48x20', 1200, 3000, '2022-12-12', 6),
(79, 'Tijera negrita pequeña', 1000, 1800, '2022-12-12', 6),
(80, 'Sacapunta metálico', 260, 600, '2022-12-12', 24),
(85, 'Marcador rojo y azul permanente 420', 1100, 2000, '2022-12-12', 6),
(86, 'Lápiz negro Wingo HB2', 300, 700, '2022-12-12', 24),
(88, 'Globos R-9 paquete x 50 (6)', 104, 200, '2022-12-12', 300),
(89, 'Chinches tritón', 850, 1400, '2022-12-12', 6),
(90, 'Silicona barra delgada', 470, 800, '2022-12-12', 12),
(92, 'Papel periódico 70 x 100', 300, 500, '2022-12-12', 36),
(94, 'Papel seda x 500', 125, 300, '2022-12-12', 12),
(97, 'Chongas de regalo grandes', 2000, 3500, '2022-12-12', 6),
(101, 'Limas grandes', 200, 500, '2022-12-12', 12),
(102, 'Limas medianas', 250, 400, '2022-12-12', 8),
(103, 'Limas pequeñas', 100, 200, '2022-12-12', 16),
(104, 'Peinillas grandes', 700, 1000, '2022-12-12', 2),
(105, 'Peinillas con mango', 700, 1000, '2022-12-12', 2),
(106, 'Peinillas medianas', 700, 800, '2022-12-12', 2),
(107, 'Peinillas pequeñas', 500, 700, '2022-12-12', 2),
(108, 'Cara de santa para árbol', 10000, 15000, '2022-12-12', 3),
(111, 'Decoración colgante doble campana', 10000, 14000, '2022-12-12', 3),
(113, 'Reloj despertador', 12000, 15000, '2022-12-12', 2),
(114, 'Bolas navideñas', 10000, 15000, '2022-12-12', 4),
(115, 'Elásticos surtidos', 500, 800, '2022-12-12', 10),
(116, 'Elásticos de colores en bolsa', 1, 200, '2022-12-12', 44),
(117, 'Colas elásticas gruesas Glow', 200, 400, '2022-12-12', 40),
(118, 'Lanzador de agua con depósito', 6000, 10000, '2022-12-12', 3),
(119, 'Protectores diarios Nosotras', 100, 200, '2022-12-12', 100),
(120, 'Caramelo Bianchi', 100, 200, '2022-12-12', 40),
(121, 'Esmaltes Vizio', 2700, 3700, '2022-12-12', 6),
(122, 'Curita Later', 300, 400, '2022-12-12', 20),
(123, 'Set de uñas', 4000, 6000, '2022-12-12', 6),
(124, 'Diademas', 3000, 4500, '2022-12-12', 2),
(125, 'Diademas', 2500, 4000, '2022-12-12', 2),
(126, 'Diademas', 3500, 5000, '2022-12-12', 2),
(127, 'Juegos Bisutería Acero', 3500, 5000, '2022-12-12', 6),
(128, 'Grapadora Mini', 4000, 6000, '2022-12-12', 3),
(129, 'Grapa Metal 48 barritas', 146, 300, '2022-12-12', 48),
(130, 'Grapa Metal', 3500, 5500, '2022-12-12', 2),
(131, 'Frunas', 400, 500, '2022-12-12', 32),
(132, 'Jet Burbujas', 550, 800, '2022-12-12', 24),
(133, 'Chocolatina Jet', 500, 700, '2022-12-12', 24),
(134, 'Chocolatina Jumbo', 650, 1000, '2022-12-12', 24),
(135, 'Galletas Wafer', 400, 500, '2022-12-12', 36),
(136, 'Galletas Festival', 570, 700, '2022-12-12', 16),
(137, 'Maní Kracks', 850, 1200, '2022-12-12', 12),
(138, 'Ducales tentación', 700, 800, '2022-12-12', 32),
(139, 'Mini chips', 935, 1100, '2022-12-12', 16),
(140, 'Gol mini', 450, 600, '2022-12-12', 24),
(141, 'Tosh cremadas', 1000, 1100, '2022-12-12', 24),
(142, 'Galletas saltín Noel', 550, 700, '2022-12-12', 27),
(143, 'Galletas Dux', 550, 700, '2022-12-12', 27),
(144, 'Chocolatinas Jet Wafer', 800, 1000, '2022-12-12', 20),
(145, 'Esmaltes Vitú', 4650, 5500, '2022-12-12', 5),
(146, 'Rubor Samy', 19990, 23000, '2022-12-12', 3),
(147, 'Lápiz cejas', 6990, 8000, '2022-12-12', 3),
(148, 'Lápiz cejas café oscuro', 5592, 6500, '2022-12-12', 1),
(149, 'Loción corporal Vitú', 9990, 15000, '2022-12-12', 2),
(150, 'Frunas pinta lengua', 175, 300, '2022-12-12', 24),
(151, 'Cinta aislante', 1000, 1200, '2022-12-12', 1),
(152, 'Pulseras Rombo varios colores', 2000, 4000, '2022-12-12', 6),
(153, 'Pulseras de Perlas', 4000, 8000, '2022-12-12', 6),
(154, 'Arete Borla', 5000, 8000, '2022-12-12', 1),
(155, 'Arete hilo y Rombos de colores', 5000, 8000, '2022-12-12', 1),
(156, 'Arete Cristales Plateados', 5000, 8000, '2022-12-12', 1),
(157, 'Gancho pequeño', 4000, 8000, '2022-12-12', 1),
(158, 'Gancho grande', 4000, 10000, '2022-12-12', 1),
(159, 'Collar Canutillo Picado + Aretes', 9000, 15000, '2022-12-12', 1),
(160, 'Collar Plastimetal + Aretes', 9000, 15000, '2022-12-12', 1),
(161, 'Aretes de Perlas', 6500, 10000, '2022-12-12', 2),
(162, 'Arete Gato', 0, 5000, '2022-12-12', 1),
(163, 'Batería bengala AA 15 V', 2500, 3500, '2022-12-12', 6),
(164, 'Bisturí (Exacto)', 3000, 4000, '2022-12-12', 3),
(165, 'Almohadilla dactilar (Huellero)', 4000, 5000, '2022-12-12', 3),
(166, 'Juego geométrico pequeño', 2000, 3000, '2022-12-12', 3),
(167, 'Juego geométrico grande', 6500, 7500, '2022-12-12', 1),
(168, 'Corrector liquido lápiz Berol', 2500, 3500, '2022-12-12', 1),
(169, 'Corrector liquido lápiz Kores', 4900, 5500, '2022-12-12', 2),
(170, 'Gancho legajador caja', 3000, 5000, '2022-12-12', 2),
(171, 'Gancho legajador por unidad', 187, 250, '2022-12-12', 40),
(172, 'Sacapuntas 2 orificios', 2500, 3200, '2022-12-12', 3),
(173, 'Clip para papel caja', 2000, 3000, '2022-12-12', 3),
(174, 'Clip por unidad', 21, 100, '2022-12-12', 283),
(175, 'Bandas de caucho', 600, 1200, '2022-12-12', 3),
(176, 'Marcador permanente', 2000, 2500, '2022-12-12', 6),
(177, 'Bolígrafo kilométrico retráctil', 1000, 1500, '2022-12-12', 2),
(178, 'Bolígrafo eterna retráctil', 1500, 2000, '2022-12-12', 6),
(179, 'Silicona liquida pequeña', 2500, 3500, '2022-12-12', 3),
(180, 'Silicona liquida mediana', 3700, 4700, '2022-12-12', 3),
(181, 'Cinta metalizada ancha por metro', 450, 500, '2022-12-12', 3),
(182, 'Cinta metalizada', 9500, 10500, '2022-12-12', 3),
(183, 'Cinta solida delgada por metro', 100, 200, '2022-12-12', 3),
(184, 'Cinta solida', 4000, 5000, '2022-12-12', 3),
(185, 'Pegante en barra', 4000, 5000, '2022-12-12', 3),
(186, 'Papel celofán', 1000, 1500, '2022-12-12', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descripcion` (`descripcion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
