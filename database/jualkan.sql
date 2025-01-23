-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2025 pada 04.37
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jualkan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_produk`, `jumlah`, `total_harga`, `tanggal`) VALUES
(1, 1, 11, '2200000.00', '2024-10-23 17:18:34'),
(2, 1, 3, '600000.00', '2024-10-23 17:18:40'),
(3, 1, 3, '600000.00', '2024-10-23 17:19:59'),
(4, 1, 3, '600000.00', '2024-10-23 17:20:01'),
(5, 1, 3, '600000.00', '2024-10-23 17:20:01'),
(6, 2, 3, '600000.00', '2024-10-23 17:20:34'),
(7, 2, 3, '600000.00', '2024-10-23 17:20:39'),
(8, 2, 3, '600000.00', '2024-10-23 17:20:40'),
(9, 5, 3, '600000.00', '2024-10-23 17:24:00'),
(10, 1, 1, '200000.00', '2024-10-24 03:44:32'),
(11, 2, 1, '200000.00', '2024-10-25 01:55:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `stok`, `created_at`) VALUES
(1, 'bakso', '200000.00', 0, '2024-10-23 17:18:05'),
(2, 'bakso', '200000.00', 0, '2024-10-23 17:18:22'),
(3, 'bakso', '200000.00', 1, '2024-10-23 17:20:27'),
(4, 'tahu', '2000.00', 3, '2024-10-23 17:23:11'),
(5, 'bakso', '200000.00', 0, '2024-10-23 17:23:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
