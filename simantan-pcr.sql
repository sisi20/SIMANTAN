-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 08:43 AM
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
(33, 'wahyu19ti@mahasiswa.pcr.ac.id', 'HimaFest', 'BEM', 'PCR', '100', 'Sedang', 'Acara Tahunan', 'staff@pcr.ac.id', '2021-07-31 13:16:00', 'Outdoor', 'Meet', 'BEM', 'Meet online', 'Meet online', 'On cam', 'On cam', 'heriry@pcr.ac.id', 'Menunggu'),
(34, 'prathama19ti@mahasiswa.pcr.ac.id', 'Workshop Test Simantan', 'HIMA', 'PCR', '100', 'Biasa', 'Webinar online', 'silvana@pcr.ac.id', '2021-07-31 16:05:00', 'Outdoor', 'Meet', 'HIMA', 'Online', 'Online', 'Oncam', 'Oncam', 'nowobudiono@pcr.ac.id', 'nowobudiono@pcr.ac.id'),
(35, 'rafi@gmail.com', 'Walimahan', 'Ikatan Alumni', 'PCR dan ', '100', 'Sedang', 'Walimahan saya dengan Anggi', 'agus@pcr.ac.id', '2021-07-18 08:00:00', 'Indoor', 'R.Studio Gambar', 'Ikatan Alumni', 'Memasuki Gerbang, Parkir pada depan GSG, memasuki GSG', 'Social distancing dan Masker', 'Social distancing dan Masker', 'Peserta keluar dari GSG, keluar lewat Gerbang utama', 'diah@pcr.ac.id', 'nowobudiono@pcr.ac.id');

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
(48, 'agus@pcr.ac.id', 35, 'wah... semoga Sakinah Mawadah Waromah ya nak', '2021-07-08 01:27:16'),
(49, 'rafi@gmail.com', 35, 'hehehe Aamiin pak, jangan lupa datang ya pak', '2021-07-08 01:28:02'),
(50, 'diah@pcr.ac.id', 35, 'Ibuk dak diundang do rafi?', '2021-07-08 01:29:28'),
(51, 'rafi@gmail.com', 35, 'undangan untuk ibuk sudah saya kirim buk', '2021-07-08 01:29:58'),
(52, 'diah@pcr.ac.id', 35, 'oh iya, baru di beri oleh kemahasiswaan', '2021-07-08 01:30:49'),
(53, 'nowobudiono@pcr.ac.id', 35, 'Bapak izinkan', '2021-07-08 01:31:49');

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
(6, 'Dosen Staff 1', 'Politeknik Caltex Riau', 2, '$2y$10$KsNTDJTXXllXKKVCyMoa8eechfh22GXx.SNb99ZF6SlePICaCtjIO', 'staff@pcr.ac.id'),
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
(23, 'Muhammad Wahyu Kandrival', 'Politeknik Caltex Riau', 3, '$2y$10$4h8l2Hhq0nY3prXIyqBG7.Gxxf4AvEyBcGSuZTp0C5LVfPCkHHIgm', 'wahyu19ti@mahasiswa.pcr.ac.id'),
(24, 'Silvana Rasio Henim, S.ST, M.T.', 'Politeknik Caltex Riau', 2, '$2y$10$H0HtE0Wtt0vEUyOTrNfWjugzXSh0cHcYau2ZrMZxzMGSdac0NSLOu', 'silvana@pcr.ac.id'),
(25, 'Agus Urip Ari Wibowo, S.T.,M.T.', 'Politeknik Caltex Riau', 2, '$2y$10$1SrwTIWwnRcvksh/z2jaTuTv55fhfkv5cxQCXxQ4023kikzIuTnWu', 'agus@pcr.ac.id'),
(26, 'Prathama Rifqi Syafitrah', 'Politeknik Caltex Riau', 3, '$2y$10$VWNxPpptqaIS9qMyjdd0ae2al1SmzlHkOi1vpy0s5yU5tRYuNZ48q', 'prathama19ti@mahasiswa.pcr.ac.id'),
(27, 'Rafi Nur Ibrahim', 'Alumni', 4, '$2y$10$oDs19/pFl50v.zNdnvg51ujDe7bar8i/TI.UdGXx1IYoGj7Udq73e', 'rafi@gmail.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
