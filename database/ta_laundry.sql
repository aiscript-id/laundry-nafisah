-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 02:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `nama_pakaian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id_pakaian`, `nama_pakaian`) VALUES
(1, 'Baju'),
(2, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `nama_tarif` varchar(255) NOT NULL,
  `waktu_tarif` int(11) NOT NULL,
  `biaya_tarif` int(11) NOT NULL,
  `jenis_tarif` varchar(20) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `nama_tarif`, `waktu_tarif`, `biaya_tarif`, `jenis_tarif`, `deskripsi`) VALUES
(2, 'Reguler', 3, 4000, 'Kg', NULL),
(3, 'Selimut Tetangga', 2, 20000, 'Satuan', NULL),
(4, 'Premium', 2, 6000, 'Kg', NULL),
(5, 'Express', 1, 8000, 'Kg', NULL),
(6, 'Karpet Jadi Baru', 7, 50000, 'Satuan', 'Buat karpetmu menjadi seperti baru lagi. dengan keharuman bunga yang mewangi, menciptakan suasana menyenangkan di rumah anda. Bersih dan Suci');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jam_transaksi` time NOT NULL,
  `paket_transaksi` varchar(255) NOT NULL,
  `jenis_paket` varchar(20) NOT NULL,
  `berat_jumlah` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `id_user`, `nama`, `tgl_transaksi`, `jam_transaksi`, `paket_transaksi`, `jenis_paket`, `berat_jumlah`, `total_transaksi`, `status`) VALUES
(2, '09052208183602', NULL, 'Robert', '2022-05-09', '08:18:36', 'Reguler (4000)', '0', 4, 16000, 1),
(3, '09052208440202', NULL, 'Jane Doe', '2022-05-09', '08:40:20', 'Selimut Tetangga (20000)', '0', 1, 20000, 1),
(4, '10052215202603', 6, 'Saanah', '2022-05-10', '15:20:26', 'Reguler (4000)', 'Kg', 2, 8000, 1),
(5, '10052215233804', 6, 'Adam Levine', '2022-05-10', '15:23:38', 'Karpet Jadi Baru (50000)', 'Pcs', 2, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi_d` varchar(50) NOT NULL,
  `nama_d` varchar(255) DEFAULT NULL,
  `jumlah_d` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi_d`, `nama_d`, `jumlah_d`) VALUES
(1, '09052208440202', 'Selimut Tetangga', 1),
(2, '10052215233804', 'Karpet Jadi Baru', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_status`
--

CREATE TABLE `transaksi_status` (
  `id_status` int(11) NOT NULL,
  `id_transaksi_s` varchar(50) NOT NULL,
  `cuci` int(11) NOT NULL,
  `kering` int(11) NOT NULL,
  `strika` int(11) NOT NULL,
  `siap` int(11) NOT NULL,
  `selesai` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_status`
--

INSERT INTO `transaksi_status` (`id_status`, `id_transaksi_s`, `cuci`, `kering`, `strika`, `siap`, `selesai`, `tgl_ambil`) VALUES
(3, '2147483647', 1, 1, 0, 0, 0, '0000-00-00'),
(4, '09052208183602', 1, 1, 1, 1, 1, '0000-00-00'),
(5, '09052208440202', 1, 1, 1, 1, 1, '0000-00-00'),
(6, '10052215202603', 1, 1, 1, 1, 1, '2022-05-10'),
(7, '10052215233804', 1, 1, 1, 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `whatsapp`, `level`) VALUES
(1, 'Administrator', 'admin', '$2y$10$sMN2Se/ECBMW5j4yzAWsmOY0au9MgyH8No9DmMRWzQSzuJGrOgnEy', NULL, 1),
(2, 'Saanah', 'saanah123', '$2y$10$E9KRMtsOwUOO/2CDgW5FXOA5UFPTUoAEVDU/4fTL9ZytPKqur8Dhi', NULL, 2),
(6, 'Saanah', 'adamlevine', '$2y$10$EU46FMYrfIm8qNs1MfsTm.zhtbqWnC493I9SjGsOXP6mqymTWyVci', '082251312423', 3),
(7, 'Jamaludin', 'jamaludin', '$2y$10$Au7b3Fy.qflBsdqRaBHS2eoBHg9h1Ij2E6N7pKJ6Q8HIT5zgGJZyC', '091212120120', 3),
(8, 'Gary Naville', 'garynaville', '$2y$10$igGActrcjuTwoasOrGkiouAYwjb84guu9VGpY/54E4J4CEbWmCqPu', '0812039120', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id_pakaian`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi_status`
--
ALTER TABLE `transaksi_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_status`
--
ALTER TABLE `transaksi_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
