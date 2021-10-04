-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Okt 2021 pada 21.39
-- Versi server: 10.3.31-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himatika`
--
CREATE DATABASE IF NOT EXISTS `himatika` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `himatika`;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `belum_vote`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `belum_vote` (
`nim` varchar(15)
,`nama` varchar(150)
,`token` varchar(300)
,`has_vote` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_notsend`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `email_notsend`  AS SELECT `mahasiswa`.`id` AS `id`, `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`angkatan` AS `angkatan`, `mahasiswa`.`email` AS `email`, `mahasiswa`.`is_register` AS `is_register`, `vcfaedzb_pemiluhimatif`.`mahasiswa`.`is_valid` AS `is_valid`, `vcfaedzb_pemiluhimatif`.`mahasiswa`.`token` AS `token`, `vcfaedzb_pemiluhimatif`.`mahasiswa`.`password` AS `password` FROM `mahasiswa` WHERE `vcfaedzb_pemiluhimatif`.`mahasiswa`.`token` <> '' AND `vcfaedzb_pemiluhimatif`.`mahasiswa`.`is_register` <> '' ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `is_register_novote`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `is_register_novote` (
`nim` varchar(15)
,`nama` varchar(150)
,`token` varchar(300)
,`is_register` tinyint(1)
,`has_vote` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(3) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `visi` varchar(3000) NOT NULL,
  `misi` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat_asli`
--

CREATE TABLE `kandidat_asli` (
  `id` int(3) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `visi` varchar(3000) NOT NULL,
  `misi` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_register` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mahasiswa_aktif`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mahasiswa_aktif` (
`nim` varchar(15)
,`nama` varchar(150)
,`angkatan` varchar(5)
,`email` varchar(100)
,`is_register` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mahasiswa_aktif_vote`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mahasiswa_aktif_vote` (
`id` int(10)
,`nim` varchar(15)
,`nama` varchar(150)
,`angkatan` varchar(5)
,`is_register` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `mail_not_send`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `mail_not_send` (
`nim` varchar(15)
,`nama` varchar(150)
,`email` varchar(100)
,`token` varchar(300)
,`is_register` tinyint(1)
,`has_vote` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `register_belum_vote`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `register_belum_vote` (
`nim` varchar(15)
,`nama` varchar(150)
,`token` varchar(300)
,`has_vote` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(10) NOT NULL,
  `token` varchar(200) NOT NULL,
  `vote` varchar(15) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur untuk view `belum_vote`
--
DROP TABLE IF EXISTS `belum_vote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `belum_vote`  AS SELECT `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`token` AS `token`, `vote`.`token` AS `has_vote` FROM (`mahasiswa` left join `vote` on(`mahasiswa`.`token` = `vote`.`token`)) WHERE `mahasiswa`.`token` <> '' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `is_register_novote`
--
DROP TABLE IF EXISTS `is_register_novote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `is_register_novote`  AS SELECT `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`token` AS `token`, `mahasiswa`.`is_register` AS `is_register`, `vote`.`token` AS `has_vote` FROM (`mahasiswa` left join `vote` on(`mahasiswa`.`token` = `vote`.`token`)) WHERE `mahasiswa`.`token` <> '' AND `vote`.`token` is null ;

-- --------------------------------------------------------

--
-- Struktur untuk view `mahasiswa_aktif`
--
DROP TABLE IF EXISTS `mahasiswa_aktif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mahasiswa_aktif`  AS SELECT `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`angkatan` AS `angkatan`, `mahasiswa`.`email` AS `email`, `mahasiswa`.`is_register` AS `is_register` FROM `mahasiswa` WHERE `mahasiswa`.`is_register` = '1' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `mahasiswa_aktif_vote`
--
DROP TABLE IF EXISTS `mahasiswa_aktif_vote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mahasiswa_aktif_vote`  AS SELECT `mahasiswa`.`id` AS `id`, `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`angkatan` AS `angkatan`, `mahasiswa`.`is_register` AS `is_register` FROM `mahasiswa` WHERE `mahasiswa`.`is_register` = 1 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `mail_not_send`
--
DROP TABLE IF EXISTS `mail_not_send`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mail_not_send`  AS SELECT `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`email` AS `email`, `mahasiswa`.`token` AS `token`, `mahasiswa`.`is_register` AS `is_register`, `vote`.`vote` AS `has_vote` FROM (`mahasiswa` left join `vote` on(`mahasiswa`.`token` = `vote`.`token`)) WHERE `mahasiswa`.`token` <> '' AND `vote`.`token` is null ;

-- --------------------------------------------------------

--
-- Struktur untuk view `register_belum_vote`
--
DROP TABLE IF EXISTS `register_belum_vote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `register_belum_vote`  AS SELECT `mahasiswa`.`nim` AS `nim`, `mahasiswa`.`nama` AS `nama`, `mahasiswa`.`token` AS `token`, `vote`.`token` AS `has_vote` FROM (`mahasiswa` left join `vote` on(`mahasiswa`.`token` = `vote`.`token`)) WHERE `mahasiswa`.`token` <> '' AND `vote`.`token` is null ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `kandidat_asli`
--
ALTER TABLE `kandidat_asli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kandidat_asli`
--
ALTER TABLE `kandidat_asli`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
