-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2021 pada 03.57
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

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
  `kegiatan` varchar(100) NOT NULL,
  `kegiatan_unit` varchar(100) NOT NULL,
  `kegiatan_peserta` varchar(100) NOT NULL,
  `kegiatan_jmlpeserta` varchar(100) NOT NULL,
  `prioritas` varchar(50) NOT NULL,
  `prioritas_alasan` varchar(100) NOT NULL,
  `penanggung_jawab` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `skema` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kegiatan`, `kegiatan_unit`, `kegiatan_peserta`, `kegiatan_jmlpeserta`, `prioritas`, `prioritas_alasan`, `penanggung_jawab`, `waktu`, `lokasi`, `pelaksana`, `skema`, `status`) VALUES
(1, 'Test Kegiatan', '', '', '', 'Tinggi', '', 2, '2021-07-02 20:09:13', 'Pekan baru', 'HIMA', 'Test Kegiatan untuk buat komentar', 1),
(2, 'Test Kegiatan ke2', '', '', '', 'Tinggi', '', 1, '2021-07-03 06:57:41', 'Pekan baru', 'HIMA', 'Test Skema yang ke 2', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `user`, `kegiatan`, `komentar`, `tanggal`) VALUES
(1, 1, 1, 'Komentar Test', '2021-07-02 12:00:00'),
(2, 2, 1, 'Test yang kedua asdasda;sda;saklfjaKLdaklgjskgjsdlslgsgsgpwejpwjrowjtklwtklw', '2021-07-02 13:00:00'),
(9, 1, 1, 'test waktu 3', '2021-07-03 10:44:58'),
(10, 2, 2, 'Test Kegiatan 2', '2021-07-03 12:00:10'),
(11, 2, 2, 'test', '2021-07-03 12:24:36'),
(12, 2, 2, 'test disa', '2021-07-03 12:25:19'),
(13, 2, 2, 'test disable', '2021-07-03 12:26:13'),
(14, 2, 1, 'test disabled1', '2021-07-03 12:27:53'),
(15, 2, 2, 'fddf', '2021-07-04 04:56:05');

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
  `email` varchar(255) NOT NULL,
  `institut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `role`, `password`, `email`, `institut`) VALUES
(1, 'SatgasCovid19', 1, '12345', 'user1', ''),
(2, 'Test', 2, '123456', 'user2', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kegiatan_user` (`penanggung_jawab`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_user` FOREIGN KEY (`penanggung_jawab`) REFERENCES `user` (`id`);

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
