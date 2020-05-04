-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2020 pada 03.48
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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
-- Struktur dari tabel `tbl_calon`
--

CREATE TABLE `tbl_calon` (
  `id` int(11) NOT NULL,
  `foto_calon` varchar(128) NOT NULL,
  `nama_calon` varchar(128) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `jumlah_voting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_calon`
--

INSERT INTO `tbl_calon` (`id`, `foto_calon`, `nama_calon`, `visi`, `misi`, `jumlah_voting`) VALUES
(1, '1573135555.png', 'Salim', 'Menjadikan Siswa Yang Santuy', 'NO Tugas No Problem NO Tugas No Problem NO Tugas No Problem NO Tugas No Problem NO Tugas No Problem NO Tugas No Problem NO Tugas No ProblemNO Tugas No ProblemNO Tugas No ProblemNO Tugas No ProblemNO Tugas No ProblemNO Tugas No Problem', 2),
(2, '15731377571.png', 'danyong', 'Menjadikan Siswa Siswi Nyaman Dikelas', 'Tidur Dikelas Tidur Dikelas Tidur DikelasTidur Dikelas Tidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur DikelasTidur Dikelas', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kelas`, `is_active`) VALUES
(1, 'XII TKJ 1', 1),
(2, 'XII TKJ 2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 'Master', 'admin/master', 'fa fa-archive', 1),
(2, 'profile', 'admin/profile', 'fa fa-user', 1),
(3, 'Dashboard', 'admin', 'fa fa-dashboard', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id` int(11) NOT NULL,
  `nama_apk` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id`, `nama_apk`, `alamat`, `tentang`) VALUES
(1, 'E-Voting', 'Jl. Wijaya Kusuma No 63 Blok Prapatan RT/RW 03/01 Desa Getasan Kecamatan Depok Kabupaten Cirebon Kode POS 45155', 'Aplikasi E-Voting ini digunakan untuk mempercepat proses pemilihan ketua dan wakil ketua baik di lingkungan sekolah maupun lingkungan masyarakat, karena aplikasi ini sangat user friendly dan mobile friendly. Harga aplikasi kisaran Rp.300.000 . jika berminat hub. 083823210947.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id`, `email`, `username`, `password`, `foto`, `role`) VALUES
(1, 'nurdin.reverse73@gmail.com', 'nurdin73', '$2y$10$eyIhRZaP7/Jw620oQOW/BuSY6CQdIdVZy2tSuH5gg/N1IJPAKcDaK', 'default.jpg', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Data Pemilih', 'admin/pemilih', 'fa fa-circle-o', 1),
(2, 1, 'Data Calon', 'admin/calon', 'fa fa-circle-o', 1),
(3, 2, 'My Profile', 'user/profile', 'fa fa-circle-o', 1),
(4, 2, 'Ganti Password', 'user/gantiPassword', 'fa fa-circle-o', 1),
(5, 2, 'Pengaturan Aplikasi', 'user/apk', 'fa fa-circle-o', 1),
(6, 1, 'Data Masuk', 'admin/data', 'fa fa-circle-o', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `kelas` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `NIS`, `nama_lengkap`, `password`, `kelas`, `status`) VALUES
(2, 161710524, 'Nurdin', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 1, 1),
(3, 161710500, 'Adit', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 1, 1),
(4, 161710100, 'jajang', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 2, 1),
(5, 16171633, 'bagus', '$2y$10$4VvFT3YalyqaaQwuEWsdIuiQ1w.Mwl.wnNqZQaAubBcQ0zpu0jSwS', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `voting`
--

CREATE TABLE `voting` (
  `id` int(11) NOT NULL,
  `NIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voting`
--

INSERT INTO `voting` (`id`, `NIS`) VALUES
(5, 161710500),
(7, 16171633),
(11, 161710100),
(13, 161710524);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_calon`
--
ALTER TABLE `tbl_calon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_calon`
--
ALTER TABLE `tbl_calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
