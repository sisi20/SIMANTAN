-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 09:24 AM
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
  `acara_mulai` datetime NOT NULL,
  `acara_akhir` datetime NOT NULL,
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

INSERT INTO `kegiatan` (`id`, `pengaju`, `kegiatan`, `kegiatan_unit`, `kegiatan_peserta`, `kegiatan_jmlpeserta`, `prioritas`, `prioritas_alasan`, `penanggung_jawab`, `acara_mulai`, `acara_akhir`, `pelaksana`, `skema_proses_masuk_keluar`, `skema_penerapan_prokes`, `skema_kegiatan_berlangsung`, `skema_kegiatan_selesai`, `satgas`, `kasatgas`) VALUES
(68, 'wahyu19ti@mahasiswa.pcr.ac.id', 'input banyak', 'aa', 'a', '1', 'Biasa', 'a', 'chitra@pcr.ac.id', '2021-07-17 11:07:00', '2021-07-24 11:07:00', 'a', 'a', 'a', 'a', 'a', 'Menunggu', 'Menunggu'),
(69, 'wahyu19ti@mahasiswa.pcr.ac.id', 'no indoor', 'a', 'a', '1', 'Biasa', 'a', 'abdi.bhayangkara@pcr.ac.id', '2021-07-23 11:08:00', '2021-07-16 11:08:00', 'a', 'a', 'a', 'a', 'a', 'Menunggu', 'Menunggu'),
(70, 'wahyu19ti@mahasiswa.pcr.ac.id', 'no OutDoor', 'a', 'a', '1', 'Biasa', 'a', 'abdi.bhayangkara@pcr.ac.id', '2021-07-16 11:08:00', '2021-07-17 11:08:00', 'a', 'a', 'a', 'a', 'a', 'Menunggu', 'Menunggu'),
(71, 'wahyu19ti@mahasiswa.pcr.ac.id', 'input bolong', 'a', 'a', '1', 'Biasa', 'a', 'abdi.bhayangkara@pcr.ac.id', '2021-07-16 11:09:00', '2021-07-16 11:09:00', 'a', 'a', 'a', 'a', 'a', 'Menunggu', 'Menunggu'),
(72, 'wahyu19ti@mahasiswa.pcr.ac.id', 'no input (uncheck)', 'a', 'a', '1', 'Biasa', '1', 'abdi.bhayangkara@pcr.ac.id', '2021-07-22 11:11:00', '2021-07-30 11:11:00', 'a', 'a', 'a', 'a', 'a', 'Menunggu', 'Menunggu');

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

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `tempat` varchar(10) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `id_kegiatan`, `tempat`, `lokasi`) VALUES
(83, 68, 'Indoor', 'R.101'),
(84, 68, 'Indoor', 'R.102'),
(85, 68, 'Indoor', 'R.103'),
(86, 68, 'Outdoor', 'GOR'),
(87, 68, 'Outdoor', 'Main Hall'),
(88, 68, 'Outdoor', 'Student Center'),
(89, 68, 'Outdoor', 'Halaman Kampus'),
(90, 69, 'Outdoor', 'GOR'),
(91, 69, 'Outdoor', 'Main Hall'),
(92, 70, 'Indoor', 'R.119'),
(93, 70, 'Indoor', 'R.120'),
(94, 70, 'kosong', 'kosong'),
(95, 71, 'Indoor', 'R.118'),
(96, 71, 'Indoor', 'R.119'),
(97, 71, 'Outdoor', 'Main Hall'),
(98, 71, 'kosong', 'kosong'),
(99, 72, 'kosong', 'kosong');

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
  `institut` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `institut`, `role`, `password`, `email`) VALUES
(12, 'Nowo Budiono,S.Si', 'Politeknik Caltex Riau', 5, '$2y$10$7s7Rms1T3bD8GaRRA.bxC.E5ZSg4CCEyPscilLzey1811ZhB/PgnG', 'nowobudiono@pcr.ac.id'),
(13, ' Heri Ribut Yuliantoro, SE.,M.Ak.,Akt.,CA', 'Politeknik Caltex Riau', 1, '$2y$10$HjLZh6uvCb5CmqRSXU7O8O3OY/OnsJzns3alHa4ORo8Vl1FpWHFkW', 'heriry@pcr.ac.id'),
(14, 'Kartina Diah Kusuma W, ST.,MT', 'Politeknik Caltex Riau', 1, '$2y$10$00QWtR1X2dWOySJ9zO2SiuHZjjcaGevmJqPrJatBPB.7QqLjkGu1K', 'diah@pcr.ac.id'),
(15, 'Indah Lestari, S.ST.,MT', 'Politeknik Caltex Riau', 1, '$2y$10$URbo.WZY43Aj5QgR2WRP8.tD8T3k2VVnDmFE68UEh6pMKZfDe2Ptu', 'indah@pcr.ac.id'),
(16, 'Made Rahmawaty, ST.,M.Eng', 'Politeknik Caltex Riau', 1, '$2y$10$4yvOtMHY89FVvlngDp1GQuBdgI4EhT8z6e/iv4EpJ6AD0foYjUiGu', 'made@pcr.ac.id'),
(17, 'Roni Novison, ST.,MT', 'Politeknik Caltex Riau', 1, '$2y$10$uWr8EJmVswO2gRraqJECee2gwDKypBl9ASa1Mp7xSdl.CZy7Tt4Z6', 'roni@pcr.ac.id'),
(18, 'Roni Novison, ST.,MT', 'Politeknik Caltex Riau', 1, '$2y$10$/rXMpth7rBr1PyL6S3mWbu8fToRoHnMNZIhSo14ajSF11BhN8qZKq', 'roni@pcr.ac.id'),
(19, 'Rizadi Sasmita Darwis, ST.,MT', 'Politeknik Caltex Riau', 1, '$2y$10$7WAjT7a.6H473N6rqSxJt.LKjh6YJXwddW2pwmNH4UFWvdIbnPhiG', 'rizadi@pcr.ac.id'),
(20, 'Ruli Kusmawati, A.Md', 'Politeknik Caltex Riau', 1, '$2y$10$P501PqkbVgmHmB7xKAPVBuz8a8f9EwedDZ.RGZ6k2i.Yo8Kba31wS', 'ruli@pcr.ac.id'),
(21, 'Irwan Chandra, A.Md', 'Politeknik Caltex Riau', 1, '$2y$10$jZVMhVbf3EEjyuwolEhMFuEC2C5xNIYLfFATYFdmaR5SsVLCYYdKi', 'iwan@pcr.ac.id'),
(22, 'Afrianto, A.Md', 'Politeknik Caltex Riau', 1, '$2y$10$4nIL38.HaKXjHiWCzyTsMO/FlVg51htO6R4WoAyIaJfvAefv0Ijry', 'afrianto@pcr.ac.id'),
(28, 'Muhammad Wahyu Kandrival', 'Politeknik Caltex Riau', 3, '$2y$10$Ao0zqnG3A1EJZFovXYdRz.vIBkT1/yTFDSbNlfLU5peoS/ErqcsOG', 'wahyu19ti@mahasiswa.pcr.ac.id'),
(29, 'Prathama Rifqi Syafitrah', 'Politeknik Caltex Riau', 3, '$2y$10$gH5RzRA1F.JfnAnlDULCi.3gCHFbqjjGVz43X8pMtfwOmODNXrJu.', 'prathama19ti@mahasiswa.pcr.ac.id'),
(30, 'Zainal Arifin Renaldo, S.S., M.Hum.', 'Politeknik Caltex Riau', 2, '$2y$10$sYTWyxLt9RnMJY4Q75w1IOWhbL0962J7GOLDkkZzIP3QiedwONE1.', 'zainal@pcr.ac.id');

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
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lokasi_kegiatan` (`id_kegiatan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_kegiatan` FOREIGN KEY (`kegiatan`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `fk_lokasi_kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
