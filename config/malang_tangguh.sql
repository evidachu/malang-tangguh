-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 09:08 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malang_tangguh`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_banjir`
--

CREATE TABLE `laporan_banjir` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `tinggi_air` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan_banjir`
--

INSERT INTO `laporan_banjir` (`id`, `lokasi`, `jalan`, `tanggal`, `tinggi_air`, `foto`, `deskripsi`, `created_at`) VALUES
(1, 'Klojen', 'Jl. Jaksa Agung Suprapto', '2025-06-01 15:05:00', NULL, 'uploads/683eace7d310a_34acf0ec12d96c5f857956bdf80426dd.jpg', 'oke', '2025-06-03 08:05:59'),
(2, 'Lowokwaru', 'Jl. Veteran', '2025-05-07 15:28:00', 2, 'uploads/683eb2454f028_44c2a5ade283fc4b7d9627d6d897cff9.jpg', 'sangat banjir', '2025-06-03 08:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`) VALUES
(1, 'oke', 'oke@oke.com', '$2y$10$lFXiw14bFoSdrT7n29.Zwel9hPH6ctpQWW7EXZfbziwGctBtkZiqi', '2025-06-03 04:32:58'),
(2, 'chan', 'chan@chan.com', '$2y$10$DgstXnTV68aZiL.9KOhMueBU/lZd8TKjxEoxskYfmmDDwLDBdK3mG', '2025-06-03 05:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_banjir`
--
ALTER TABLE `laporan_banjir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_banjir`
--
ALTER TABLE `laporan_banjir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
