-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.infinityfree.com
-- Generation Time: Apr 11, 2026 at 04:48 AM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39365188_ukk_4_fahmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('Matematika','Bahasa Indonesia','Bahasa Inggris','Pendidikan Agama Islam','Bahasa Sunda','Sejarah','Pendidikan Pancasila','Wirausaha','Akutansi') DEFAULT NULL,
  `stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `stok`) VALUES
(7, 'Learn English in 3 Minutes', 'Bahasa Inggris', 47),
(8, 'Ayo Galaxy!', 'Matematika', 52),
(9, 'Konspirasi - Vol. 1', 'Pendidikan Pancasila', 15),
(10, 'Filsafat Islam', 'Pendidikan Agama Islam', 19),
(11, 'Pangea', 'Sejarah', 11),
(13, 'Malas Ngoding jadi cuan', 'Wirausaha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','kembali','tunggu','tolak') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(65, 11, 8, '2026-03-31', NULL, 'tunggu'),
(66, 11, 8, '2026-03-31', NULL, 'dipinjam'),
(67, 11, 9, '2026-03-31', '2026-03-31', 'kembali'),
(68, 21, 7, '2026-04-09', NULL, 'dipinjam'),
(69, 22, 7, '2026-04-09', NULL, 'dipinjam'),
(70, 22, 7, '2026-04-09', '2026-04-09', 'kembali'),
(71, 22, 11, '2026-04-09', '2026-04-09', 'kembali'),
(73, 11, 8, '2026-04-09', NULL, 'dipinjam'),
(74, 23, 7, '2026-04-09', '2026-04-09', 'kembali'),
(75, 23, 8, '2026-04-09', NULL, 'dipinjam'),
(76, 24, 7, '2026-04-09', NULL, 'tunggu'),
(77, 25, 7, '2026-04-09', NULL, 'dipinjam'),
(78, 25, 10, '2026-04-09', NULL, 'dipinjam'),
(79, 11, 8, '2026-04-09', NULL, 'tunggu'),
(80, 11, 13, '2026-04-10', NULL, 'dipinjam'),
(81, 11, 13, '2026-04-10', NULL, 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(11, 'Administrator', '$2y$10$lPRp1jWEqSjh8TQaq7MicOXu4CvE89FaZIFNaguGT2ItEVeggi5gO', 'admin'),
(12, 'Fahmi', '$2y$10$8PH9JuxkSxtezdbfp/0OA.kAtk7MvrZhFpDpdQAuj3DYeoTJOTd3q', 'user'),
(16, 'Coolbob', '$2y$10$mQV9SVh25ZyWhpR9XVlOy.hy/mTbm.4kLzssAsD.v5PBOpRBv1j1u', 'user'),
(19, 'Modium', '$2y$10$cgZDK8K5Rnrzozxw3va/A.uXxNr33zdXBISznhEHQb0j8WHO1NRme', 'user'),
(20, 'Roulet', '$2y$10$qR/XRqgn5Idqq.mOTHQPU.Y.SbaE7CE7SRCDH3wGZc9AO3IvEB6PK', 'user'),
(21, 'asep monyet', '$2y$10$rECQfCXXKoQVybreLEZBfeFsVCAxd0Q5u4OJq8JiywNwV8BBP6Mq2', 'user'),
(22, 'renn', '$2y$10$JmYxul7x.abu5CWqDC0FJOmUBf/GrvPngkyYMqrY6ZPWnjI2uY6lK', 'user'),
(23, 'Buku', '$2y$10$USy45HjIP6NyJyWN7fewDeR6V/1hMaAjajG670OJv.nYCgUNNIyxG', 'user'),
(24, 'ujang ', '$2y$10$kymzVEuE8oL3pemj6Cs9a.xjIoU5UazIobmdjZ95zXNiv3B4WnfbO', 'user'),
(25, 'aqxua', '$2y$10$6pfSDAO3Yk3U.3n5Uso7buckEQ5xmMgVXJzxhTEPtJZXYDTokXsQ.', 'user'),
(26, 'Vu', '$2y$10$IlHCGG9YkdJRw8if9UlpIe4cq7f.T8z3Ia98xyeehi1wm/EvOvstu', 'user'),
(27, '1', '$2y$10$ooGGnpc48GhfzJIZF7AMWuTjGNWpqQOhhcxHemK42TTZPB1yQQeae', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ibfk_1` (`id_user`),
  ADD KEY `transaksi_ibfk_2` (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
