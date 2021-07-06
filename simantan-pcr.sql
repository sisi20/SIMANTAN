-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 07:25 AM
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
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `pengaju` int(11) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `kegiatan_unit` varchar(100) NOT NULL,
  `kegiatan_peserta` varchar(100) NOT NULL,
  `kegiatan_jmlpeserta` varchar(100) NOT NULL,
  `prioritas` varchar(50) NOT NULL,
  `prioritas_alasan` varchar(100) NOT NULL,
  `penanggung_jawab` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `skema_proses_masuk_keluar` text NOT NULL,
  `skema_penerapan_prokes` text NOT NULL,
  `skema_kegiatan_berlangsung` text NOT NULL,
  `skema_kegiatan_selesai` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `pengaju`, `kegiatan`, `kegiatan_unit`, `kegiatan_peserta`, `kegiatan_jmlpeserta`, `prioritas`, `prioritas_alasan`, `penanggung_jawab`, `waktu`, `tempat`, `lokasi`, `pelaksana`, `skema_proses_masuk_keluar`, `skema_penerapan_prokes`, `skema_kegiatan_berlangsung`, `skema_kegiatan_selesai`, `status`) VALUES
(8, 3, 'Workshop Framework', 'HIMA ITSA', 'Anggota ITSA', '100', 'Sedang', 'Sebuah Workshop Framework Yang Dilakukan Rutin Setiap Tahun', 2, '2021-12-20 09:00:00', 'Outdoor', 'Gedung Serba Guna', 'HIMA ITSA', 'Peserta Masuk Kampus Dengan Cek Suhu Tubuh Dan Menggunakan Sanitizer.\r\nPeserta Keluar Kampus Dengan Sanitizer.', 'Peserta Wajib Menggunakan Masker Dan Faceshield Saat Kegiatan Berlangsung, Dilarang Membuka Masker.\r\nPeserta Melakukan Social Distancing.', 'Pembukaan\r\nMulai Acara\r\nPenghargaan\r\nPenutupan', 'Melakukan Upacara Penutupan.\r\nPeserta Melakukan Disinfektan Mandiri (Cuci Tangah, Dll)\r\nRuangan Yang Dipakai Di Disinfektan', 1),
(19, 4, 'HimaFest', 'BEM', 'PCR', '100', 'Sedang', 'Acara Tahunan', 4, '2021-08-01 13:44:00', 'Indoor', 'R.Studio Gambar', 'BEM', 'Masuk lewat portal depan menuju main hall, menuju GSG', 'Gunakan Masker, Social Distancing', 'Gunakan Masker, Social Distancing', 'Ruangan yang digunakan akan di sterilisasi.', 1),
(20, 2, 'a', 'a', 'a', 'a', 'Biasa', 'a', 2, '2021-07-07 00:47:00', 'Indoor', 'R.101', 'a', 'a', 'a', 'a', 'a', 0),
(21, 2, 'a', 'a', 'a', 'a', 'Biasa', 'a', 2, '2021-07-07 00:47:00', 'Indoor', 'R.101', 'a', 'a', 'a', 'a', 'a', 0),
(23, 2, 'q', 'q', 'q', 'q', 'Biasa', 'q', 2, '2021-07-06 02:36:00', 'Indoor', 'R.118', 'q', 'q', 'q', 'q', 'q', 1),
(24, 2, 'w', 'w', 'w', '10', 'Biasa', 'w', 3, '2021-07-30 03:02:00', 'Outdoor', 'w', 'w', 'w', 'w', 'w', 'w', 0),
(25, 2, 'a', 'a', 'a', '1', 'Biasa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2, '2021-07-06 03:36:00', 'Indoor', 'R.118', 'a', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0);


-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `user`, `kegiatan`, `komentar`, `tanggal`) VALUES

(16, 2, 8, 'Test Komentar', '2021-07-05 11:13:32'),
(17, 2, 8, 'Test Komentar 2', '2021-07-05 11:22:31'),
(18, 1, 8, 'Test Satgas', '2021-07-05 11:23:03'),
(19, 2, 8, 'Test Komentar urutan waktu', '2021-07-05 11:25:02'),
(20, 1, 8, 'Test Approve', '2021-07-05 11:25:32'),
(21, 1, 19, 'estimasi Jumlahnya berapa orang?', '2021-07-05 01:52:12'),
(22, 3, 19, '100 orang bapak/ibuk', '2021-07-05 01:52:57'),
(23, 1, 21, 'asd', '2021-07-06 01:09:22'),
(24, 1, 20, 'qwhjekqndkqwndkmqndkjqweknekqnwemkwqneqwjeqkndkqjnmasdnasm c', '2021-07-06 01:29:11'),
(25, 1, 20, 'a', '2021-07-06 01:30:34'),
(26, 1, 20, 'a', '2021-07-06 01:30:35'),
(27, 1, 20, 'a', '2021-07-06 01:30:37'),
(28, 1, 20, 'a', '2021-07-06 01:30:39'),
(29, 1, 20, 'a', '2021-07-06 01:30:41'),
(30, 1, 20, 'a', '2021-07-06 01:30:43'),
(31, 1, 20, 'a', '2021-07-06 01:30:45'),
(32, 1, 23, 'Test Drive', '2021-07-06 02:38:25'),
(33, 2, 23, 'Test Drive Juga', '2021-07-06 02:39:41'),
(34, 1, 25, 'a', '2021-07-06 11:48:20'),
(35, 1, 25, 'a', '2021-07-06 11:48:30'),
(36, 1, 25, 'a', '2021-07-06 11:48:32'),
(37, 1, 25, 'a', '2021-07-06 11:48:35'),
(38, 1, 25, 'a', '2021-07-06 11:48:37'),
(39, 1, 25, 'a', '2021-07-06 11:48:40');


-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Satgas'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `role`, `password`, `username`) VALUES

(1, 'SatgasCovid19', 1, 'admin', 'admin'),
(2, 'Staff', 2, 'staff', 'staff'),
(3, 'Prathama Rifqi Syafitrah', 2, 'thama', 'thama'),
(4, 'Zainal Arifin Renaldo, S.S., M.Hum.', 2, 'mrjay', 'mrjay');


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_user` (`penanggung_jawab`),
  ADD KEY `fk_kegi` (`pengaju`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_komentar_kegiatan` (`kegiatan`),
  ADD KEY `fk_komentar_user` (`user`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;


--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegi` FOREIGN KEY (`pengaju`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_kegiatan_user` FOREIGN KEY (`penanggung_jawab`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_kegiatan` FOREIGN KEY (`kegiatan`) REFERENCES `kegiatan` (`id`),
  ADD CONSTRAINT `fk_komentar_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
