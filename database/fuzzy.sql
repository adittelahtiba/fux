-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2019 pada 06.16
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(255) NOT NULL,
  `NamaUkm` varchar(255) NOT NULL,
  `LamaUsaha` int(11) NOT NULL,
  `JumlahPekerja` int(11) NOT NULL,
  `Omzet` int(11) NOT NULL,
  `JumlahAset` int(11) NOT NULL,
  `HasilKeputusan` varchar(255) NOT NULL,
  `id_fuzzy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `NamaUkm`, `LamaUsaha`, `JumlahPekerja`, `Omzet`, `JumlahAset`, `HasilKeputusan`, `id_fuzzy`) VALUES
(26, 'Umk Pamurbaya', 4, 15, 4, 6, 'TUNDA', 'data-0001'),
(27, 'Umk Bandeng', 3, 28, 4, 10, 'TIDAK', 'data-0001'),
(28, 'Bukid Graffer', 1, 12, 1, 3, 'TIDAK', 'data-0001'),
(29, 'Kum Mandiri Sablon', 2, 10, 3, 10, 'TUNDA', 'data-0001'),
(30, 'Kum Cahaya Mandiri', 6, 24, 4, 9, 'TUNDA', 'data-0001'),
(31, 'Umk Angkasa 12', 4, 15, 4, 6, 'TUNDA', 'data-0031'),
(32, 'Umk Angkasa 13', 3, 12, 7, 0, 'TIDAK', 'data-0031'),
(33, 'Umk Angkasa 14', 6, 4, 6, 10, 'TUNDA', 'data-0031'),
(34, 'Umk Angkasa 15', 7, 0, 12, 4, 'TIDAK', 'data-0031');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuzzy`
--

CREATE TABLE `fuzzy` (
  `id_fuzzy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fuzzy`
--

INSERT INTO `fuzzy` (`id_fuzzy`) VALUES
('data-0001'),
('data-0031');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
