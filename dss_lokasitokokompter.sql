-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2019 at 04:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_lokasitokokompter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_alternatif`
--

CREATE TABLE `tabel_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nm_alternatif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_alternatif`
--

INSERT INTO `tabel_alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
(1, 'Ony Komputer'),
(2, 'Saudara'),
(3, 'Bursa Comp'),
(4, 'Infokom'),
(5, 'Konnect'),
(6, 'Rizqi Comp');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_bobot`
--

CREATE TABLE `tabel_bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_kriteria_1` int(11) DEFAULT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `skala` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_bobot`
--

INSERT INTO `tabel_bobot` (`id_bobot`, `id_kriteria_1`, `id_kriteria_2`, `skala`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 9),
(3, 1, 3, 8),
(4, 1, 4, 8),
(5, 1, 5, 9),
(6, 2, 1, 0.1111111111111111),
(7, 2, 2, 1),
(8, 2, 3, 9),
(9, 2, 4, 9),
(10, 2, 5, 9),
(11, 3, 1, 0.125),
(12, 3, 2, 0.1111111111111111),
(13, 3, 3, 1),
(14, 3, 4, 9),
(15, 3, 5, 9),
(16, 4, 1, 0.125),
(17, 4, 2, 0.1111111111111111),
(18, 4, 3, 0.1111111111111111),
(19, 4, 4, 1),
(20, 4, 5, 9),
(21, 5, 1, 0.1111111111111111),
(22, 5, 2, 0.1111111111111111),
(23, 5, 3, 0.1111111111111111),
(24, 5, 4, 0.1111111111111111),
(25, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_bobot_alternatif`
--

CREATE TABLE `tabel_bobot_alternatif` (
  `id_bobot` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_alternatif_1` int(11) NOT NULL,
  `id_alternatif_2` int(11) NOT NULL,
  `skala` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_bobot_alternatif`
--

INSERT INTO `tabel_bobot_alternatif` (`id_bobot`, `id_kriteria`, `id_alternatif_1`, `id_alternatif_2`, `skala`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 9),
(3, 1, 1, 3, 9),
(4, 1, 1, 4, 9),
(5, 1, 1, 5, 9),
(6, 1, 1, 6, 3),
(7, 1, 2, 1, 0.1111111111111111),
(8, 1, 2, 2, 1),
(9, 1, 2, 3, 9),
(10, 1, 2, 4, 9),
(11, 1, 2, 5, 9),
(12, 1, 2, 6, 3),
(13, 1, 3, 1, 0.1111111111111111),
(14, 1, 3, 2, 0.1111111111111111),
(15, 1, 3, 3, 1),
(16, 1, 3, 4, 9),
(17, 1, 3, 5, 9),
(18, 1, 3, 6, 3),
(19, 1, 4, 1, 0.1111111111111111),
(20, 1, 4, 2, 0.1111111111111111),
(21, 1, 4, 3, 0.1111111111111111),
(22, 1, 4, 4, 1),
(23, 1, 4, 5, 9),
(24, 1, 4, 6, 3),
(25, 1, 5, 1, 0.1111111111111111),
(26, 1, 5, 2, 0.1111111111111111),
(27, 1, 5, 3, 0.1111111111111111),
(28, 1, 5, 4, 0.1111111111111111),
(29, 1, 5, 5, 1),
(30, 1, 5, 6, 3),
(31, 1, 6, 1, 0.3333333333333333),
(32, 1, 6, 2, 0.3333333333333333),
(33, 1, 6, 3, 0.3333333333333333),
(34, 1, 6, 4, 0.3333333333333333),
(35, 1, 6, 5, 0.3333333333333333),
(36, 1, 6, 6, 1),
(37, 2, 1, 1, 1),
(38, 2, 1, 2, 9),
(39, 2, 1, 3, 9),
(40, 2, 1, 4, 9),
(41, 2, 1, 5, 9),
(42, 2, 1, 6, 3),
(43, 2, 2, 1, 0.1111111111111111),
(44, 2, 2, 2, 1),
(45, 2, 2, 3, 9),
(46, 2, 2, 4, 9),
(47, 2, 2, 5, 9),
(48, 2, 2, 6, 3),
(49, 2, 3, 1, 0.1111111111111111),
(50, 2, 3, 2, 0.1111111111111111),
(51, 2, 3, 3, 1),
(52, 2, 3, 4, 9),
(53, 2, 3, 5, 9),
(54, 2, 3, 6, 3),
(55, 2, 4, 1, 0.1111111111111111),
(56, 2, 4, 2, 0.1111111111111111),
(57, 2, 4, 3, 0.1111111111111111),
(58, 2, 4, 4, 1),
(59, 2, 4, 5, 9),
(60, 2, 4, 6, 3),
(61, 2, 5, 1, 0.1111111111111111),
(62, 2, 5, 2, 0.1111111111111111),
(63, 2, 5, 3, 0.1111111111111111),
(64, 2, 5, 4, 0.1111111111111111),
(65, 2, 5, 5, 1),
(66, 2, 5, 6, 3),
(67, 2, 6, 1, 0.3333333333333333),
(68, 2, 6, 2, 0.3333333333333333),
(69, 2, 6, 3, 0.3333333333333333),
(70, 2, 6, 4, 0.3333333333333333),
(71, 2, 6, 5, 0.3333333333333333),
(72, 2, 6, 6, 1),
(73, 3, 1, 1, 1),
(74, 3, 1, 2, 9),
(75, 3, 1, 3, 9),
(76, 3, 1, 4, 9),
(77, 3, 1, 5, 9),
(78, 3, 1, 6, 3),
(79, 3, 2, 1, 0.1111111111111111),
(80, 3, 2, 2, 1),
(81, 3, 2, 3, 9),
(82, 3, 2, 4, 9),
(83, 3, 2, 5, 9),
(84, 3, 2, 6, 3),
(85, 3, 3, 1, 0.1111111111111111),
(86, 3, 3, 2, 0.1111111111111111),
(87, 3, 3, 3, 1),
(88, 3, 3, 4, 9),
(89, 3, 3, 5, 9),
(90, 3, 3, 6, 3),
(91, 3, 4, 1, 0.1111111111111111),
(92, 3, 4, 2, 0.1111111111111111),
(93, 3, 4, 3, 0.1111111111111111),
(94, 3, 4, 4, 1),
(95, 3, 4, 5, 9),
(96, 3, 4, 6, 3),
(97, 3, 5, 1, 0.1111111111111111),
(98, 3, 5, 2, 0.1111111111111111),
(99, 3, 5, 3, 0.1111111111111111),
(100, 3, 5, 4, 0.1111111111111111),
(101, 3, 5, 5, 1),
(102, 3, 5, 6, 3),
(103, 3, 6, 1, 0.3333333333333333),
(104, 3, 6, 2, 0.3333333333333333),
(105, 3, 6, 3, 0.3333333333333333),
(106, 3, 6, 4, 0.3333333333333333),
(107, 3, 6, 5, 0.3333333333333333),
(108, 3, 6, 6, 1),
(109, 4, 1, 1, 1),
(110, 4, 1, 2, 9),
(111, 4, 1, 3, 9),
(112, 4, 1, 4, 9),
(113, 4, 1, 5, 9),
(114, 4, 1, 6, 3),
(115, 4, 2, 1, 0.1111111111111111),
(116, 4, 2, 2, 1),
(117, 4, 2, 3, 9),
(118, 4, 2, 4, 9),
(119, 4, 2, 5, 9),
(120, 4, 2, 6, 3),
(121, 4, 3, 1, 0.1111111111111111),
(122, 4, 3, 2, 0.1111111111111111),
(123, 4, 3, 3, 1),
(124, 4, 3, 4, 9),
(125, 4, 3, 5, 9),
(126, 4, 3, 6, 3),
(127, 4, 4, 1, 0.1111111111111111),
(128, 4, 4, 2, 0.1111111111111111),
(129, 4, 4, 3, 0.1111111111111111),
(130, 4, 4, 4, 1),
(131, 4, 4, 5, 9),
(132, 4, 4, 6, 3),
(133, 4, 5, 1, 0.1111111111111111),
(134, 4, 5, 2, 0.1111111111111111),
(135, 4, 5, 3, 0.1111111111111111),
(136, 4, 5, 4, 0.1111111111111111),
(137, 4, 5, 5, 1),
(138, 4, 5, 6, 3),
(139, 4, 6, 1, 0.3333333333333333),
(140, 4, 6, 2, 0.3333333333333333),
(141, 4, 6, 3, 0.3333333333333333),
(142, 4, 6, 4, 0.3333333333333333),
(143, 4, 6, 5, 0.3333333333333333),
(144, 4, 6, 6, 1),
(145, 5, 1, 1, 1),
(146, 5, 1, 2, 9),
(147, 5, 1, 3, 9),
(148, 5, 1, 4, 9),
(149, 5, 1, 5, 9),
(150, 5, 1, 6, 3),
(151, 5, 2, 1, 0.1111111111111111),
(152, 5, 2, 2, 1),
(153, 5, 2, 3, 9),
(154, 5, 2, 4, 9),
(155, 5, 2, 5, 9),
(156, 5, 2, 6, 3),
(157, 5, 3, 1, 0.1111111111111111),
(158, 5, 3, 2, 0.1111111111111111),
(159, 5, 3, 3, 1),
(160, 5, 3, 4, 9),
(161, 5, 3, 5, 9),
(162, 5, 3, 6, 3),
(163, 5, 4, 1, 0.1111111111111111),
(164, 5, 4, 2, 0.1111111111111111),
(165, 5, 4, 3, 0.1111111111111111),
(166, 5, 4, 4, 1),
(167, 5, 4, 5, 9),
(168, 5, 4, 6, 3),
(169, 5, 5, 1, 0.1111111111111111),
(170, 5, 5, 2, 0.1111111111111111),
(171, 5, 5, 3, 0.1111111111111111),
(172, 5, 5, 4, 0.1111111111111111),
(173, 5, 5, 5, 1),
(174, 5, 5, 6, 3),
(175, 5, 6, 1, 0.3333333333333333),
(176, 5, 6, 2, 0.3333333333333333),
(177, 5, 6, 3, 0.3333333333333333),
(178, 5, 6, 4, 0.3333333333333333),
(179, 5, 6, 5, 0.3333333333333333),
(180, 5, 6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kriteria`
--

CREATE TABLE `tabel_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nm_kriteria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kriteria`
--

INSERT INTO `tabel_kriteria` (`id_kriteria`, `nm_kriteria`) VALUES
(1, 'Harga'),
(2, 'Pesaing'),
(3, 'Kualitas'),
(4, 'Minat Beli'),
(5, 'Keramaian');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penilaian`
--

CREATE TABLE `tabel_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penilaian`
--

INSERT INTO `tabel_penilaian` (`id_nilai`, `id_alternatif`, `nilai`) VALUES
(1, 1, 2.2975697884492),
(2, 2, 4.4070499683273),
(3, 3, 6.9042439337627),
(4, 4, 11.063452963737),
(5, 5, 20.216283972423),
(6, 6, 18.812152059806);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_skala`
--

CREATE TABLE `tabel_skala` (
  `id_skala` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `value` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_skala`
--

INSERT INTO `tabel_skala` (`id_skala`, `keterangan`, `value`) VALUES
(1, 'sama penting dengan', 1),
(2, 'mendekati sedikit lebih penting dari', 2),
(3, 'sedikit lebih penting dari', 3),
(4, 'mendekati lebih penting dari', 4),
(5, 'lebih penting dari', 5),
(6, 'mendekati sangat penting dari', 6),
(7, 'sangat penting dari', 7),
(8, 'mendekati mutlak dari', 8),
(9, 'mutlak sangat penting dari', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `otoritas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `otoritas`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, 'yoga', '807659cd883fc0a63f6ce615893b3558', 'user'),
(4, 'ndogs', '43d02a149bd7956237b2c19d6557f4f2', 'admin'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_alternatif`
--
ALTER TABLE `tabel_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tabel_bobot`
--
ALTER TABLE `tabel_bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_kriteria` (`id_kriteria_1`),
  ADD KEY `id_kriteria_2` (`id_kriteria_2`);

--
-- Indexes for table `tabel_bobot_alternatif`
--
ALTER TABLE `tabel_bobot_alternatif`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_alternatif_1` (`id_alternatif_1`,`id_alternatif_2`),
  ADD KEY `id_alternatif_2` (`id_alternatif_2`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tabel_kriteria`
--
ALTER TABLE `tabel_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tabel_penilaian`
--
ALTER TABLE `tabel_penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `tabel_skala`
--
ALTER TABLE `tabel_skala`
  ADD PRIMARY KEY (`id_skala`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_alternatif`
--
ALTER TABLE `tabel_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_bobot`
--
ALTER TABLE `tabel_bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tabel_bobot_alternatif`
--
ALTER TABLE `tabel_bobot_alternatif`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tabel_kriteria`
--
ALTER TABLE `tabel_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_penilaian`
--
ALTER TABLE `tabel_penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_skala`
--
ALTER TABLE `tabel_skala`
  MODIFY `id_skala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_bobot`
--
ALTER TABLE `tabel_bobot`
  ADD CONSTRAINT `tabel_bobot_ibfk_1` FOREIGN KEY (`id_kriteria_1`) REFERENCES `tabel_kriteria` (`id_kriteria`),
  ADD CONSTRAINT `tabel_bobot_ibfk_3` FOREIGN KEY (`id_kriteria_2`) REFERENCES `tabel_kriteria` (`id_kriteria`);

--
-- Constraints for table `tabel_bobot_alternatif`
--
ALTER TABLE `tabel_bobot_alternatif`
  ADD CONSTRAINT `tabel_bobot_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif_1`) REFERENCES `tabel_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `tabel_bobot_alternatif_ibfk_2` FOREIGN KEY (`id_alternatif_2`) REFERENCES `tabel_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `tabel_bobot_alternatif_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `tabel_kriteria` (`id_kriteria`);

--
-- Constraints for table `tabel_penilaian`
--
ALTER TABLE `tabel_penilaian`
  ADD CONSTRAINT `tabel_penilaian_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `tabel_alternatif` (`id_alternatif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
