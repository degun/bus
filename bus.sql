-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 04:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `oraret`
--

CREATE TABLE `oraret` (
  `id` int(10) NOT NULL,
  `nga` varchar(20) NOT NULL,
  `ne` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `cmimi` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oraret`
--

INSERT INTO `oraret` (`id`, `nga`, `ne`, `data`, `ora`, `cmimi`) VALUES
(1, 'Tiranë', 'Durrës', '2018-05-16', '09:30:00', 2000),
(2, 'Durrës', 'Kavajë', '2018-05-09', '16:30:00', 3000),
(4, 'Përmet', 'Gjirokastër', '2018-05-14', '12:50:00', 500),
(5, 'Kuçovë', 'Berat', '2018-05-17', '13:30:00', 200),
(6, 'Çorovodë', 'Prizren', '2018-05-27', '08:10:00', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `perdorues`
--

CREATE TABLE `perdorues` (
  `id` int(10) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mosha` int(3) NOT NULL,
  `fjalekalimi` varchar(50) NOT NULL,
  `admin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdorues`
--

INSERT INTO `perdorues` (`id`, `emri`, `mbiemri`, `email`, `mosha`, `fjalekalimi`, `admin`) VALUES
(1, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, 'Cortazar', b'1'),
(2, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, 'detjona29', b'0'),
(3, 'Anisa', 'Leba', 'anisa.leba@hotmail.com', 28, 'shmebotin', b'0'),
(6, 'Arben', 'Basha', 'arben.basha@cit.edu.al', 22, 'arbenbasha', b'0'),
(7, 'Ermir', 'Derhemi', 'ermir.derhemi@cit.edu.al', 23, 'ermirderhemi', b'0'),
(8, 'Agron', 'Duka', 'agron.duka@cit.edu.al', 23, 'agronbasha', b'0'),
(9, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, 'frencis', b'0'),
(16, 'Ismet', 'Bellova', 'is.bellova@gmail.com', 34, 'ismet', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `rezervime`
--

CREATE TABLE `rezervime` (
  `id` int(10) NOT NULL,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mosha` int(3) NOT NULL,
  `valixhe` bit(1) NOT NULL,
  `nga` varchar(20) NOT NULL,
  `ne` varchar(20) NOT NULL,
  `vajtjeardhje` bit(1) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervime`
--

INSERT INTO `rezervime` (`id`, `emri`, `mbiemri`, `email`, `mosha`, `valixhe`, `nga`, `ne`, `vajtjeardhje`, `data`, `ora`, `timestamp`) VALUES
(13, 'Feruze', 'Derhemi', 'edlir.velaj@vodafone.com', 23, b'1', 'Fier', 'Vlorë', b'0', '2018-05-01', '10:27:00', '2018-05-01 21:27:13'),
(14, 'Endri', 'Velaj', 'metamorphine.virus@gmail.com', 13, b'1', 'Tiranë', 'Vlorë', b'0', '2018-05-07', '05:25:00', '2018-05-07 07:12:15'),
(16, 'Endri', 'Derhemi', 'metamorphine.virus@gmail.com', 34, b'0', 'Tiranë', 'Vlorë', b'1', '2018-05-31', '09:55:00', '2018-05-07 07:19:26'),
(17, 'Altin', 'Basha', 'edlir.velaj@vodafone.com', 34, b'1', 'Tiranë', 'Durrës', b'0', '2018-05-17', '09:40:00', '2018-05-07 07:21:15'),
(38, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 09:57:59'),
(40, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:20:23'),
(41, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:25:28'),
(42, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:28:10'),
(43, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Durrës', 'Kavajë', b'0', '2018-05-09', '16:30:00', '2018-05-13 10:32:02'),
(44, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:33:13'),
(45, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 10:34:37'),
(46, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Durrës', 'Kavajë', b'0', '2018-05-09', '16:30:00', '2018-05-13 10:35:43'),
(48, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 10:39:14'),
(49, 'Detiona', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 10:40:55'),
(50, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 10:41:44'),
(51, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, b'1', 'Durrës', 'Kavajë', b'0', '2018-05-09', '16:30:00', '2018-05-13 10:43:06'),
(53, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, b'1', 'Tiranë', 'Durrës', b'0', '2018-05-16', '09:30:00', '2018-05-13 10:45:25'),
(57, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, b'1', 'Tiranë', 'Roskovec', b'1', '2018-05-31', '13:55:00', '2018-05-13 10:49:05'),
(58, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:50:48'),
(59, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'0', 'Vlorë', 'Përmet', b'1', '2018-05-09', '08:50:00', '2018-05-13 10:51:02'),
(61, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:51:46'),
(62, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, b'1', 'Tiranë', 'Durrës', b'0', '2018-05-16', '09:30:00', '2018-05-13 10:53:28'),
(63, 'Frencis', 'Balla', 'frenc@frnc.fr', 24, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:54:41'),
(64, 'Edlir', 'Velaj', 'edlir.velaj@vodafone.com', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 10:55:32'),
(65, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 10:59:34'),
(66, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 11:01:08'),
(67, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 11:02:52'),
(68, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 11:04:19'),
(69, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 11:04:24'),
(70, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Vlorë', 'Përmet', b'0', '2018-05-09', '08:50:00', '2018-05-13 11:04:31'),
(71, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:05:08'),
(72, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:05:37'),
(73, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:06:00'),
(74, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:06:21'),
(75, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:06:23'),
(76, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:06:42'),
(77, 'Monika', 'Stafa', 'monika.stafa@qiparisi.org', 29, b'1', 'Peqin', 'Përmet', b'0', '2018-05-31', '08:50:00', '2018-05-13 11:10:32'),
(78, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:11:38'),
(79, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:12:46'),
(80, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:12:54'),
(81, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:16:28'),
(82, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:16:41'),
(83, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:20:30'),
(84, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:21:04'),
(85, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:21:34'),
(86, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:22:20'),
(87, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:22:33'),
(88, 'Deti', 'Jona', 'deti.jona@qiparisi.org', 29, b'1', 'Përmet', 'Gjirokastër', b'0', '2018-05-14', '12:50:00', '2018-05-13 11:22:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oraret`
--
ALTER TABLE `oraret`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervime`
--
ALTER TABLE `rezervime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oraret`
--
ALTER TABLE `oraret`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `rezervime`
--
ALTER TABLE `rezervime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
