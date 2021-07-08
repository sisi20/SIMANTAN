-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 09:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simantan-pcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `pengaju` varchar(255) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `kegiatan_unit` varchar(100) NOT NULL,
  `kegiatan_peserta` varchar(100) NOT NULL,
  `kegiatan_jmlpeserta` varchar(100) NOT NULL,
  `prioritas` varchar(50) NOT NULL,
  `prioritas_alasan` varchar(100) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `skema_proses_masuk_keluar` text NOT NULL,
  `skema_penerapan_prokes` text NOT NULL,
  `skema_kegiatan_berlangsung` text NOT NULL,
  `skema_kegiatan_selesai` text NOT NULL,
  `satgas` varchar(255) NOT NULL,
  `kasatgas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `pengaju`, `kegiatan`, `kegiatan_unit`, `kegiatan_peserta`, `kegiatan_jmlpeserta`, `prioritas`, `prioritas_alasan`, `penanggung_jawab`, `waktu`, `tempat`, `lokasi`, `pelaksana`, `skema_proses_masuk_keluar`, `skema_penerapan_prokes`, `skema_kegiatan_berlangsung`, `skema_kegiatan_selesai`, `satgas`, `kasatgas`) VALUES
(26, 'wahyu19ti@mahasiswa.pcr.ac.id', 'HimaFest', 'BEM', 'PCR', '100', 'Biasa', 'Acara Tahunan', 'staff@pcr.ac.id', '2021-07-31 23:41:00', 'Indoor', 'R.120', 'BEM', 'Skema masuk', 'Prokes', 'Skema berlangsung', 'Skema selesai', 'kasatgas@pcr.ac.id', 'kasatgas@pcr.ac.id'),
(27, 'wahyu19ti@mahasiswa.pcr.ac.id', 'Workshop', 'BEM', 'PCR dan Umum', '100', 'Biasa', 'Webinar', 'staff@pcr.ac.id', '2021-07-31 00:41:00', 'Outdoor', 'Meet', 'BEM', 'Meet', 'Oncam', 'Oncam', 'Out', 'satgas@pcr.ac.id', 'kasatgas@pcr.ac.id'),
(28, 'wahyu19ti@mahasiswa.pcr.ac.id', 'Workshop', 'BEM', 'PCR dan Umum', '100', 'Biasa', 'Webinar', 'staff@pcr.ac.id', '2021-07-31 00:41:00', 'Outdoor', 'Meet', 'BEM', 'Meet', 'Oncam', 'Oncam', 'Out', 'kasatgas@pcr.ac.id', 'kasatgas@pcr.ac.id'),
(29, 'prathama19ti@mahasiswa.pcr.ac.id', 'Webinar ', 'BEM', 'PCR', '100', 'Biasa', 'Webinar ', 'staff@pcr.ac.id', '2021-08-01 08:00:00', 'Outdoor', 'Meet', 'BEM', 'Memasuki meet', 'oncam', 'oncam', 'keluar', 'kasatgas@pcr.ac.id', 'kasatgas@pcr.ac.id'),
(30, 'prathama19ti@mahasiswa.pcr.ac.id', 'a', 'a', 'a', '1', 'Biasa', 'a', 'staff@pcr.ac.id', '2021-07-08 02:01:00', 'Outdoor', 'a', 'a', 'a', 'aa', 'a', 'a', 'Menunggu', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `user`, `kegiatan`, `komentar`, `tanggal`) VALUES
(1, 'satgas@pcr.ac.id', 26, 'Test Komentar ya nak', '2021-07-07 19:37:01'),
(40, 'satgas@pcr.ac.id', 26, 'Test dari input', '2021-07-08 12:40:14'),
(41, 'kasatgas@pcr.ac.id', 26, 'Test Komentar Pak Nowok', '2021-07-08 01:51:31'),
(42, 'kasatgas@pcr.ac.id', 26, 'test waktu', '2021-07-08 01:52:59'),
(43, 'satgas@pcr.ac.id', 29, 'sus', '2021-07-08 02:00:53'),
(44, 'prathama19ti@mahasiswa.pcr.ac.id', 29, 'ter', '2021-07-08 02:01:21'),
(45, 'kasatgas@pcr.ac.id', 29, 'noice', '2021-07-08 02:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Satgas'),
(2, 'Staff'),
(3, 'Mahasiswa'),
(4, 'Tamu'),
(5, 'KaSatGas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
	`institut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `role`, `password`, `email`,`institut`) VALUES
(5, 'Politeknik Caltex Riau', 3, '$2y$10$GIM.M6cfCfY2gPShEtSvSemwKL.UwWmIXM1epVv44wZ2Ry6PSHxDy', 'wahyu19ti@mahasiswa.pcr.ac.id'),
(6, 'Dosen Staff 1', 2, '$2y$10$KsNTDJTXXllXKKVCyMoa8eechfh22GXx.SNb99ZF6SlePICaCtjIO', 'staff@pcr.ac.id'),
(7, 'SatgasCovid19', 1, '$2y$10$QPIh1i.17Whh9Xl32fpDwO4WxJ5F4dZxsEnszMttA6D1XVlkxX3IK', 'satgas@pcr.ac.id'),
(8, 'KaSatGasCovid19', 5, '$2y$10$KmY9RUZR7GJI5kxbvW4JaeWRB5og/we/JvdRP7cOk5fKBaDCT5FGu', 'kasatgas@pcr.ac.id'),
(9, 'Politeknik Caltex Riau', 3, '$2y$10$nebFUMojiO9EIQIu.fYEWOVsqjpVzplT8yfajzlns4Spv0BxKaAQ6', 'prathama19ti@mahasiswa.pcr.ac.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_komentar_kegiatan` (`kegiatan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_kegiatan` FOREIGN KEY (`kegiatan`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
