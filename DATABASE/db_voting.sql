-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 11:29 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calon`
--

CREATE TABLE `tbl_calon` (
  `id` int(11) NOT NULL,
  `foto_calon` varchar(128) NOT NULL,
  `nama_calon` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `jumlah_voting` int(11) NOT NULL,
  `warna_chart` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_calon`
--

INSERT INTO `tbl_calon` (`id`, `foto_calon`, `nama_calon`, `visi`, `misi`, `jumlah_voting`, `warna_chart`) VALUES
(1, 'default.jpg', 'Salim', 'Menjadikan Siswa Yang Santuy', 'NO Tugas No Problem', 1, '#f56954'),
(2, 'default.jpg', 'mandra', 'Menjadikan Siswa Siswi Nyaman Dikelas', 'Tidur Dikelas', 0, '#35424a'),
(3, 'default.jpg', 'Joni', 'Tidur Dikelas Adalah Jalan Ninjaku', 'Mewajibkan Siswa Tidur Siang!', 1, '#67fe22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `NIS`, `nama_lengkap`, `password`, `kelas`, `status`) VALUES
(2, 161710524, 'Nurdin', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 'XII Teknik Komputer Jaringan 1', 1),
(3, 161710500, 'Adit', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 'XII Teknik Komputer Jaringan 1', 1),
(4, 161710100, 'jajang', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 'XII Teknik Komputer Jaringan 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL,
  `NIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `id_calon`, `NIS`) VALUES
(4, 1, 161710524),
(5, 3, 161710500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_calon`
--
ALTER TABLE `tbl_calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_calon`
--
ALTER TABLE `tbl_calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
