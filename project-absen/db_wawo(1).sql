-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 05:28 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_wawo`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id_absen` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `jam_masuk`, `jam_pulang`, `tanggal`, `kode`) VALUES
(8, '02:10:42', '02:11:55', '2017-12-21', 'M150'),
(11, '09:38:09', '09:38:32', '2018-01-05', 'AW');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `id_div` int(11) NOT NULL,
  `nama_div` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_div`, `nama_div`) VALUES
(6, 'Finance'),
(7, 'HRD'),
(8, 'IT'),
(9, 'Marketing'),
(10, 'Helper');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_kry` int(11) NOT NULL,
  `nama_kry` varchar(100) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_level` enum('admin','user') DEFAULT 'user',
  `id_div` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kry`, `nama_kry`, `kode`, `password`, `user_level`, `id_div`) VALUES
(3, 'Bambang', 'M150', 'bisabisabisa', 'user', 7),
(4, 'AW', 'AW', 'AW', 'user', 8),
(5, 'Wati', 'wati', 'wati', 'user', 9),
(6, 'admin', 'admin', 'admin', 'admin', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_div`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kry`), ADD UNIQUE KEY `kode` (`kode`), ADD KEY `id_div` (`id_div`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_div` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_kry` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_div`) REFERENCES `divisi` (`id_div`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
