-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2021 pada 10.31
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `list_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekonomi`
--

CREATE TABLE `ekonomi` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekonomi`
--

INSERT INTO `ekonomi` (`id`, `kode`, `nama`, `harga`, `gambar`) VALUES
(1, 'hb', 'Honda Brio Utama', 120000, 'brio.png'),
(2, 'sz', 'Suzuki Carry', 80000, 'carry.jpg'),
(3, 'ta', 'Toyota Avanza', 120000, 'avanza.jpg'),
(4, 'mx', 'Mitsubitsi Xpander', 140000, 'xpander.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ussername` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `ussername`, `password`) VALUES
(1, 'sanditamvan', '$2y$10$OY3Sorq4Ki17Gi99bSIDdeutyeuWZOeFkTGUh3xgZNd1B6egS6wQ6'),
(2, 'ilham', '$2y$10$HAn/0H8DVSIPR505k0qr5.BAKJz5pD6YM5.DLT/aV9Mb4XyWs8Gcu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ekonomi`
--
ALTER TABLE `ekonomi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ekonomi`
--
ALTER TABLE `ekonomi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
