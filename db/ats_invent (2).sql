-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 03:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ats_invent`
--

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tgl_keluar` varchar(20) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `qty_out` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_personnel` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`id_keluar`, `tgl_keluar`, `kd_barang`, `part_number`, `serial_number`, `qty_out`, `keterangan`, `id_kondisi`, `id_personnel`, `id_satuan`, `created_at`, `updated_at`) VALUES
(3, '05/10/2023', 'LM-001', '23123', '12312312', 1, 'asdasd', 1, 1, 1, '2023-05-10 20:57:37', '2023-05-18 09:09:04'),
(4, '05/18/2023', 'LM-001', '23123', '123121', 13, 'asdasd', 1, 1, 1, '2023-05-18 09:15:00', '2023-05-18 09:15:31');

--
-- Triggers `brg_keluar`
--
DELIMITER $$
CREATE TRIGGER `brgKurang` AFTER INSERT ON `brg_keluar` FOR EACH ROW BEGIN
UPDATE tb_barang SET stock = stock - NEW.qty_out WHERE kd_barang = NEW.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tgl_masuk` varchar(20) NOT NULL,
  `kd_barang` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `qty_in` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `arc_form_no` varchar(50) NOT NULL,
  `arc_no` varchar(50) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `document_arc` varchar(255) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`id_masuk`, `tgl_masuk`, `kd_barang`, `part_number`, `serial_number`, `id_rak`, `qty_in`, `id_satuan`, `arc_form_no`, `arc_no`, `vendor`, `id_kondisi`, `remarks`, `document_arc`, `create_date`, `exp_date`, `created_at`, `updated_at`) VALUES
(5, '04/24/2023', 'LM-001', '12312312', '123124', 1, 12, 1, '12312312', '123123', 'asd', 1, 'adasdasd', 'bnc.png', '03/02/2023', '12/29/2023', '2023-04-24 20:40:23', '2023-05-18 09:06:47'),
(6, '07/01/2023', 'AKZ-001', '312312312312', '412312312', 3, 10, 4, '312441231', '531231231', 'muladatu', 1, 'done', '69_153.png', '12/31/2019', '12/31/2029', '2023-07-11 14:22:40', NULL);

--
-- Triggers `brg_masuk`
--
DELIMITER $$
CREATE TRIGGER `brgTambah` AFTER INSERT ON `brg_masuk` FOR EACH ROW BEGIN
UPDATE tb_barang SET stock = stock + NEW.qty_in WHERE kd_barang = NEW.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_barang`, `nm_barang`, `stock`, `id_satuan`, `created_at`, `updated_at`) VALUES
(3, 'LM-001', 'Lamp Vertical', 10, 1, '2023-04-03 23:34:13', '2023-04-03 18:33:44'),
(5, 'AKZ-001', 'Cat Akzonoble White', 10, 1, '2023-05-21 11:29:36', '0000-00-00 00:00:00'),
(6, 'BN-001', 'Benang Rajut', 0, 2, '2023-05-21 13:52:12', '0000-00-00 00:00:00'),
(7, 'DN-001', 'Dacron', 0, 2, '2023-07-11 14:00:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departement`
--

CREATE TABLE `tb_departement` (
  `id_depart` int(11) NOT NULL,
  `departement` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_departement`
--

INSERT INTO `tb_departement` (`id_depart`, `departement`, `created_at`, `updated_at`) VALUES
(1, 'Sewing', '2023-05-18 09:26:03', '2023-05-18 09:26:03'),
(2, 'Painting', '2023-05-19 22:02:17', '2023-05-19 22:02:17'),
(3, 'Laminating', '2023-05-21 13:31:33', '2023-05-21 13:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id_kondisi`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Serviceable', '2023-04-03 23:36:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_personnel`
--

CREATE TABLE `tb_personnel` (
  `id_personnel` int(11) NOT NULL,
  `nama_personnel` varchar(100) NOT NULL,
  `id_depart` int(11) NOT NULL,
  `nip_personnel` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_personnel`
--

INSERT INTO `tb_personnel` (`id_personnel`, `nama_personnel`, `id_depart`, `nip_personnel`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ujang K', 1, '0720220019', 'personnel', '2023-05-09 22:24:43', ''),
(2, 'Atho Rusdianto', 2, '0720220020', 'personnel', '2023-05-18 21:19:59', ''),
(4, 'Ahmad Nasifad', 3, '0720220021', 'personnel', '2023-05-21 14:02:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`, `created_at`, `updated_at`) VALUES
(1, 'LMP-001', '2023-04-03 23:35:11', ''),
(3, 'AKZ-001', '2023-05-21 13:06:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `id_request` int(11) NOT NULL,
  `tgl_request` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_depart` int(11) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `approve` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `tgl_request`, `nama`, `nip`, `id_depart`, `kd_barang`, `keperluan`, `qty`, `id_satuan`, `approve`, `created_at`, `updated_at`) VALUES
(1, '05/18/2023', 'anwar', '0720220006', 1, 'LM-001', 'Seat Cover Lion', 1, 1, 'approve', '2023-05-18 10:50:02', '2023-05-21 11:07:52'),
(3, '05/18/2023', 'Atho Rusdianto', '0720220020', 2, 'LM-001', 'Cat Kerangka Seat', 2, 2, 'progress', '2023-05-20 23:26:12', '2023-06-26 11:01:54'),
(4, '05/21/2023', 'Atho Rusdianto', '0720220020', 2, 'LM-001', 'Cat Kerangka Seat', 2, 2, 'approve', '2023-05-20 23:30:16', NULL),
(5, '05/18/2023', 'Anwar', '0720220008', 1, 'LM-001', 'Menjahit seat', 2, 1, 'progress', '2023-05-20 23:51:24', NULL),
(6, '05/21/2023', 'Atho Rusdianto', '0720220020', 2, 'L0021', 'Cat Kerangka Seat', 2, 1, 'progress', '2023-05-21 10:18:17', NULL),
(7, '05/21/2023', 'anwar', '0720220008', 1, 'LM-001', 'sewing seat cover', 1, 2, 'progress', '2023-05-21 10:19:52', '2023-05-21 11:12:47'),
(8, '05/21/2023', 'Atho Rusdianto', '0720220020', 2, 'LM-001', 'Cat Kerangka Seat', 1, 1, 'approve', '2023-05-21 11:02:38', '2023-05-21 11:09:21'),
(9, '07/01/2023', 'Atho Rusdianto', '0720220020', 2, 'AKZ-001', 'Cat kerangka seat lion', 10, 4, 'approve', '2023-07-11 14:10:20', '2023-07-11 14:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'EA', '2023-04-03 23:35:23', ''),
(2, 'Rol', '2023-05-20 23:28:28', ''),
(4, 'Klg', '2023-05-21 13:11:03', ''),
(5, 'Lbr', '2023-05-21 13:52:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('admin','staff') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `status`, `foto`) VALUES
(1, 'Procurement', 'admin@aviatehnik.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'avatar3.png'),
(2, 'Petugas Store', 'staff@aviatehnik.com', '1253208465b1efa876f982d8a9e73eef', 'staff', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_departement`
--
ALTER TABLE `tb_departement`
  ADD PRIMARY KEY (`id_depart`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tb_personnel`
--
ALTER TABLE `tb_personnel`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_departement`
--
ALTER TABLE `tb_departement`
  MODIFY `id_depart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_personnel`
--
ALTER TABLE `tb_personnel`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
