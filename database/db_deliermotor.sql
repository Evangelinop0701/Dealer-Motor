-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_deliermotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_cliente`
--

CREATE TABLE `t_cliente` (
  `id_cliente` int(11) NOT NULL,
  `naran_cliente` varchar(70) NOT NULL,
  `sexu` enum('Mane','Feto') NOT NULL,
  `id_suku` int(11) NOT NULL,
  `data_moris` date NOT NULL,
  `hela_fatin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_cliente`
--

INSERT INTO `t_cliente` (`id_cliente`, `naran_cliente`, `sexu`, `id_suku`, `data_moris`, `hela_fatin`) VALUES
(1, 'Clarnho Fernandes', 'Mane', 11, '2001-08-08', 'Hera'),
(2, 'Marcia Soares', 'Feto', 11, '2002-09-05', 'Hera'),
(3, 'Lelita F Correia ', 'Feto', 1, '2003-10-17', 'Hera');

-- --------------------------------------------------------

--
-- Table structure for table `t_faan`
--

CREATE TABLE `t_faan` (
  `id_faan` int(11) NOT NULL,
  `data_faan` date NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total_hola` int(11) NOT NULL,
  `total_presu` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_faan`
--

INSERT INTO `t_faan` (`id_faan`, `data_faan`, `id_stock`, `id_cliente`, `total_hola`, `total_presu`) VALUES
(2, '2023-08-25', 1, 1, 2, '4000.00'),
(3, '2023-09-05', 1, 2, 1, '2000.00'),
(4, '2023-10-17', 1, 2, 2, '4000.00'),
(5, '2023-10-17', 1, 1, 2, '4000.00');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategoria`
--

CREATE TABLE `t_kategoria` (
  `id_kategoria` int(11) NOT NULL,
  `kategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategoria`
--

INSERT INTO `t_kategoria` (`id_kategoria`, `kategoria`) VALUES
(1, 'Manual'),
(2, 'Automatico');

-- --------------------------------------------------------

--
-- Table structure for table `t_muni`
--

CREATE TABLE `t_muni` (
  `id_mun` int(11) NOT NULL,
  `naran_mun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_muni`
--

INSERT INTO `t_muni` (`id_mun`, `naran_mun`) VALUES
(1, 'Alieu'),
(2, 'Atauru'),
(3, 'Ainaro'),
(4, 'Bobnaru'),
(5, 'Baucau'),
(6, 'Covalima'),
(7, 'Ermera'),
(8, 'Dili'),
(9, 'Liquisa'),
(10, 'Lautem'),
(11, 'Manatutu'),
(12, 'Maufahi'),
(13, 'Oe-Cusse'),
(14, 'Viqueque');

-- --------------------------------------------------------

--
-- Table structure for table `t_postu`
--

CREATE TABLE `t_postu` (
  `id_postu` int(11) NOT NULL,
  `naran_postu` varchar(30) NOT NULL,
  `id_mun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_postu`
--

INSERT INTO `t_postu` (`id_postu`, `naran_postu`, `id_mun`) VALUES
(1, 'Ossu', 14),
(2, 'Viqueque Vila', 14),
(3, 'Watu Lari', 14),
(4, 'Watu Carbau', 14),
(5, 'Lakluta', 14),
(6, 'Bobonaru', 4),
(7, 'Atabae', 4),
(8, 'Maliana', 4),
(9, 'Lolotoe', 4),
(10, 'Kailaku', 4),
(11, 'Balibo', 4),
(12, 'Cristu Rei', 8),
(13, 'Nainfeto', 8),
(14, 'Metinaru', 8),
(15, 'Don Alexu', 8),
(16, 'Venilale', 5),
(17, 'Kelikai', 5),
(18, 'Baguia', 5),
(19, 'Vemasse', 5),
(20, 'Laga', 5),
(21, 'Baucau Vila', 5);

-- --------------------------------------------------------

--
-- Table structure for table `t_sasan`
--

CREATE TABLE `t_sasan` (
  `id_sasan` int(11) NOT NULL,
  `naran_sasan` varchar(150) NOT NULL,
  `modelu` varchar(60) NOT NULL,
  `tinan_produz` varchar(4) NOT NULL,
  `cc_motor` varchar(20) NOT NULL,
  `foto` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sasan`
--

INSERT INTO `t_sasan` (`id_sasan`, `naran_sasan`, `modelu`, `tinan_produz`, `cc_motor`, `foto`) VALUES
(1, 'Vison', 'Honda', '2021', '150', 'Vison-IMG_20220625_204358_284-1.jpg'),
(2, 'Revo', 'Honda', '2021', '110 ', 'Revo-download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `id_stock` int(11) NOT NULL,
  `stock` int(4) NOT NULL,
  `id_sasan` int(11) NOT NULL,
  `id_kategoria` int(11) NOT NULL,
  `presu_kada_m` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`id_stock`, `stock`, `id_sasan`, `id_kategoria`, `presu_kada_m`) VALUES
(1, 46, 1, 1, '2000.00'),
(2, 20, 2, 1, '1600.00');

-- --------------------------------------------------------

--
-- Table structure for table `t_suku`
--

CREATE TABLE `t_suku` (
  `id_suku` int(11) NOT NULL,
  `naran_suku` varchar(30) NOT NULL,
  `id_postu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_suku`
--

INSERT INTO `t_suku` (`id_suku`, `naran_suku`, `id_postu`) VALUES
(1, 'Builale', 1),
(2, 'Hosoroa', 1),
(3, 'Liaruca', 1),
(4, 'Loi-Huno', 1),
(5, 'Lugabuti', 1),
(6, 'Nahareca', 1),
(7, 'Ossu de Sima', 1),
(8, 'Samarogo', 1),
(9, 'Uabubu', 1),
(10, 'Uaibobo', 1),
(11, 'Ahic', 5),
(12, 'Lalina', 5),
(13, 'Diloe', 5),
(14, 'Uma tolu', 5),
(15, 'Badomori', 16);

-- --------------------------------------------------------

--
-- Table structure for table `t_trabalho`
--

CREATE TABLE `t_trabalho` (
  `id_tbdor` int(11) NOT NULL,
  `naran_tbdr` varchar(70) NOT NULL,
  `sexu` enum('Mane','Feto') NOT NULL,
  `id_suku` int(11) NOT NULL,
  `hela_fatin` varchar(60) NOT NULL,
  `no_tlf` varchar(15) NOT NULL,
  `foto` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_trabalho`
--

INSERT INTO `t_trabalho` (`id_tbdor`, `naran_tbdr`, `sexu`, `id_suku`, `hela_fatin`, `no_tlf`, `foto`) VALUES
(1, 'Helcolano', 'Mane', 3, 'Hera', '74546488', 'Evangelino Soares Saldanha-IMG_20220625_204358_284-1.jpg'),
(2, 'Leonito Lino Ximenes', 'Mane', 1, 'Becora', '74546488', 'Leonito Lino Ximenes-OIP (1).jfif'),
(3, 'Miguel Gamboa Marsal', 'Mane', 2, 'Hera', '74546488', 'Miguel Gamboa Marsal-OIP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `id_tbdr` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `passwords` char(50) NOT NULL,
  `level` enum('Admin','Kasir','Staff') NOT NULL,
  `pass` varchar(15) NOT NULL,
  `id_session` varchar(100) DEFAULT NULL,
  `last_log` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `id_tbdr`, `username`, `passwords`, `level`, `pass`, `id_session`, `last_log`) VALUES
(1, 1, 'evan', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', 'password', 'ehs0c7ccm2i7tob2vbpp3jjqbn', '2023-10-17 15:07:34'),
(2, 2, 'leonito', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kasir', 'password', 'ehs0c7ccm2i7tob2vbpp3jjqbn', '2023-10-17 15:06:35'),
(3, 3, 'gamboa', '5f4dcc3b5aa765d61d8327deb882cf99', 'Staff', 'password', 'ehs0c7ccm2i7tob2vbpp3jjqbn', '2023-10-17 15:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_suku` (`id_suku`);

--
-- Indexes for table `t_faan`
--
ALTER TABLE `t_faan`
  ADD PRIMARY KEY (`id_faan`),
  ADD KEY `id_stock` (`id_stock`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `t_kategoria`
--
ALTER TABLE `t_kategoria`
  ADD PRIMARY KEY (`id_kategoria`);

--
-- Indexes for table `t_muni`
--
ALTER TABLE `t_muni`
  ADD PRIMARY KEY (`id_mun`);

--
-- Indexes for table `t_postu`
--
ALTER TABLE `t_postu`
  ADD PRIMARY KEY (`id_postu`),
  ADD KEY `id_mun` (`id_mun`);

--
-- Indexes for table `t_sasan`
--
ALTER TABLE `t_sasan`
  ADD PRIMARY KEY (`id_sasan`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `t_stock_ibfk_1` (`id_kategoria`),
  ADD KEY `id_sasan` (`id_sasan`);

--
-- Indexes for table `t_suku`
--
ALTER TABLE `t_suku`
  ADD PRIMARY KEY (`id_suku`),
  ADD KEY `id_postu` (`id_postu`);

--
-- Indexes for table `t_trabalho`
--
ALTER TABLE `t_trabalho`
  ADD PRIMARY KEY (`id_tbdor`),
  ADD KEY `id_suku` (`id_suku`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_tbdr` (`id_tbdr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_cliente`
--
ALTER TABLE `t_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_faan`
--
ALTER TABLE `t_faan`
  MODIFY `id_faan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_kategoria`
--
ALTER TABLE `t_kategoria`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_muni`
--
ALTER TABLE `t_muni`
  MODIFY `id_mun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_postu`
--
ALTER TABLE `t_postu`
  MODIFY `id_postu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_sasan`
--
ALTER TABLE `t_sasan`
  MODIFY `id_sasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_suku`
--
ALTER TABLE `t_suku`
  MODIFY `id_suku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_trabalho`
--
ALTER TABLE `t_trabalho`
  MODIFY `id_tbdor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD CONSTRAINT `t_cliente_ibfk_1` FOREIGN KEY (`id_suku`) REFERENCES `t_suku` (`id_suku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_faan`
--
ALTER TABLE `t_faan`
  ADD CONSTRAINT `t_faan_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `t_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_faan_ibfk_2` FOREIGN KEY (`id_stock`) REFERENCES `t_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_postu`
--
ALTER TABLE `t_postu`
  ADD CONSTRAINT `t_postu_ibfk_1` FOREIGN KEY (`id_mun`) REFERENCES `t_muni` (`id_mun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`id_sasan`) REFERENCES `t_sasan` (`id_sasan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`id_kategoria`) REFERENCES `t_kategoria` (`id_kategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_suku`
--
ALTER TABLE `t_suku`
  ADD CONSTRAINT `t_suku_ibfk_1` FOREIGN KEY (`id_postu`) REFERENCES `t_postu` (`id_postu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_trabalho`
--
ALTER TABLE `t_trabalho`
  ADD CONSTRAINT `t_trabalho_ibfk_1` FOREIGN KEY (`id_suku`) REFERENCES `t_suku` (`id_suku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`id_tbdr`) REFERENCES `t_trabalho` (`id_tbdor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
