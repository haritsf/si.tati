-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 12:35 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitati`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` int(3) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kode` int(4) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nip`, `name`, `kode`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, '196903111997021000', 'Susatyo N. W. P., S.T. M.M.', 2701, 'Jl.Lamongan Barat I/11 Sampang, Semarang', '0811298840', '2019-11-29 11:33:46', '2019-11-29 11:33:46'),
(2, '197311061998022000', 'Rani Rumita, S.T. M.T.', 2702, 'Jl. Erlangga Raya 64 Semarang', '081325863228', '2019-11-29 11:32:43', '0000-00-00 00:00:00'),
(3, '195704221986031000', 'Dr.Ir.B. Purwanggono, M.Eng.', 2703, 'Jl. Singo Sari VI/9 SEMARANG', '0811289839', '2019-11-29 11:32:43', '0000-00-00 00:00:00'),
(4, '197103271999032000', 'Prof. Dr. Aries Susanty, S.T. M.T.', 2704, 'Srondol Asri N-2 Semarang', '08156032473', '2019-11-29 11:32:43', '0000-00-00 00:00:00'),
(5, '196003151987031000', 'Dr.Ir. Heru Prastawa, DEA', 2705, 'Jl. Gaharu Utara 33 Banyumanik Semarang', '08122869215', '2019-11-29 11:32:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(3) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` set('Laki','Perempuan') DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `dosen` int(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `name`, `gender`, `date_birth`, `address`, `dosen`, `created_at`, `updated_at`) VALUES
(1, '21070117110001', 'Mohammad Ferry Maghriza Pasya', 'Laki', '2019-11-30', 'Jalan Kebayoran', 2701, NULL, '2019-11-30 10:57:30'),
(2, '21070117110002', 'Muhammad Hafidz Al Huda', 'Laki', '1999-01-02', 'Jalan Merbabu', 2701, NULL, '2019-11-29 10:44:16'),
(3, '21070117110003', 'Pandu Adhyaksa', 'Laki', '1999-01-03', 'Jalan Istiqomah', 2701, NULL, '2019-11-29 10:44:22'),
(4, '21070117110004', 'Ignatius Jeffry Sabaraya', 'Laki', '2019-11-29', 'Jalan Pegangsaan Timur No. 10', 2704, NULL, '2019-11-29 10:44:29'),
(5, '21070117110005', 'Muhammad Arrachman N.A.N', 'Laki', '2019-11-29', NULL, 2705, NULL, '2019-11-29 10:44:36'),
(6, '21070117120006', 'Rifqi Afiq Taib', 'Laki', '2019-11-29', NULL, 2702, NULL, '2019-11-29 10:44:44'),
(7, '21070117120007', 'Atheea Annisa Rahma', 'Perempuan', '2019-11-29', NULL, 2704, NULL, '2019-11-29 10:45:07'),
(8, '21070117120008', 'Rheza Aulia Ramadhan', 'Laki', '2019-11-29', NULL, 2701, NULL, '2019-11-29 10:45:15'),
(9, '21070117120009', 'Aradita Anisya Permata', 'Perempuan', '2019-11-29', NULL, 2705, NULL, '2019-11-29 10:45:22'),
(10, '21070117120010', 'Mutiara Adhilia Purwaningsih', 'Perempuan', '2019-11-29', NULL, 2704, NULL, '2019-11-29 10:45:29'),
(11, '21070117120011', 'Ramandhika Alief Nurahayu P', 'Perempuan', '2019-11-29', NULL, 2703, NULL, '2019-11-29 10:47:59'),
(12, '21070117120012', 'Avinda Jihan Ardiani', 'Perempuan', '2019-11-29', NULL, 2702, NULL, '2019-11-29 10:48:07'),
(13, '21070117120013', 'Yosefin Mahanani', 'Perempuan', '2019-11-29', NULL, 2704, NULL, '2019-11-29 10:48:17'),
(14, '21070117120014', 'Raka Pandhito Bagja', 'Laki', '2019-11-29', NULL, 2705, NULL, '2019-11-29 10:48:26'),
(15, '21070117120015', 'Aprilia Dwi Lestari', 'Perempuan', '2019-11-29', NULL, 2704, NULL, '2019-11-29 10:48:33'),
(17, '21120115130074', 'Harits Fathuddin', 'Laki', '1996-06-22', 'Bojong Gede Gg. Darussalam', 2702, '2019-11-29 07:06:41', '2019-11-29 08:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhirs`
--

CREATE TABLE `tugas_akhirs` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `dosen` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `seminar` timestamp NULL DEFAULT NULL,
  `sidang` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tugas_akhirs`
--

INSERT INTO `tugas_akhirs` (`id`, `nim`, `tema`, `judul`, `dosen`, `berkas`, `status`, `seminar`, `sidang`, `updated_at`, `created_at`) VALUES
(1, '21070117110001', 'Logistics and Supply Chain System', 'Perancangan Sistem X', '2701', '1574446030_ESDM.pdf', 'Selesai', '2019-12-01 05:00:00', '2019-12-20 06:00:00', '2019-12-01 10:07:10', '2019-11-22 18:07:10'),
(2, '21070117110002', 'Quality System', 'Analisis Sistem Y', '2703', '1574446209_Hukam.pdf', 'Daftar', NULL, NULL, '2019-12-01 07:20:14', '2019-11-22 18:10:09'),
(3, '21070117110003', 'Quality System', 'Aooapo', '2704', '1574514533_PUPR.pdf', 'Daftar', NULL, NULL, '2019-12-01 07:21:20', '2019-11-23 13:08:53'),
(4, '21120115130074', 'Human Integrated System', 'Decision Support System for Determining Critical Land', '2705', '1575117787_SDE_Test_Advotics.pdf', 'Terverifikasi', '2019-09-05 18:30:00', NULL, '2019-12-01 08:46:40', '2019-11-30 12:43:07'),
(6, '21070117110004', 'Logistics and Supply Chain System', 'Analisis Rantai Pemasokan Inventaris Dekanat FT UNDIP', '2701', '1575199843_WIFI_Undip.pdf', 'Terverifikasi', NULL, NULL, '2019-12-01 11:32:24', '2019-12-01 11:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '000000',
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$Dct7RuBvMozNXpWaDrbZzOZJSOPN4T61Bvj5CvTYXgZEck7fr.gqC', 'Administrator', 'administrator', '2019-12-01 10:57:23', '2019-12-01 10:50:08'),
(2, 'koor', '$2y$10$BQKdM5dB3wT2echd4YJEyeTtUCYrRZhZaFiQCOZzpRYbURvEXVV4u', 'Koordinator', 'koordinator', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(3, '196903111997021000', '$2y$10$wa/UjHbjR9UT8RTUhYeWrOrRXcv1M0zK7QZ6gvzEWt0BigqkAJaaC', 'Susatyo N W P-ST-MM', 'dosen', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(4, '197311061998022000', '$2y$10$8a/IQzD1wgIm3YoeJrRRxOTAolapQkuS.adS4Yk6euR.mTwd8RuqO', 'Rani Rumita-ST-MT', 'dosen', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(5, '195704221986031000', '$2y$10$PjWtZc2uzbd5ypY99L8vX.dwM5EDbJZwlXizPAqp/CgAfDQIfwLDa', 'Dr.Ir.B. Purwanggono-MEng', 'dosen', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(6, '197103271999032000', '$2y$10$ZjqTUAyT0d.dp4mMKA2OLu5iKuWWaIVnoe5GPuVRYwAHQ9Op4Ai3K', 'Prof. Dr. Aries Susanty-ST.MT', 'dosen', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(7, '196003151987031000', '$2y$10$al6ZkNUk9ZlQsZf5uFHdzeN9y5XualyO.2jrjWco8i5gQ7w5gySFe', 'Dr.Ir. Heru Prastawa-DEA', 'dosen', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(8, '21070117110001', '$2y$10$qR.5sykMuRfNImwC/XD50ecM2bYxqN3Uz146wbFLVjNia69EUISVK', 'Mohammad Ferry Maghriza Pasya', 'mahasiswa', '2019-12-01 10:52:42', '2019-12-01 10:52:42'),
(9, '21070117110002', '$2y$10$bK9kisVrFnxJOyxlojWalOEfxxvGScO5PZ3e6dCheC1vs55Uz1h4G', 'Muhammad Hafidz Al Huda', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(10, '21070117110003', '$2y$10$nfqdhx/l0EpWWmuWv7ZcVejifnKkPH/MrnsJ83zbm3tCfDOtMqRWO', 'Pandu Adhyaksa', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(11, '21070117110004', '$2y$10$cX5D7laL8dWU2MV5rn2waOLNr7xUQTWGW/b4KIPSuKL4rS9IX245u', 'Ignatius Jeffry Sabaraya', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(12, '21070117110005', '$2y$10$pUb8d22EIR6EXEFTU6VKGuhgESlrfsk2zwI7JsWUWgocSTytWmZLC', 'Muhammad Arrachman N.A.N', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(13, '21070117120006', '$2y$10$z49uL2hoWCW4ZDJHuMMBw.Za/akA7JIGSyDFz.7zvvpvo1TJdeoLm', 'Rifqi Afiq Taib', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(14, '21070117120007', '$2y$10$AUpHAJdZ1qNjkibPQTPESePbHZ6tWiJkSaocnAlVUZFC.A95vxRC.', 'Atheea Annisa Rahma', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(15, '21070117120008', '$2y$10$bhzbtVMCRuwYXZQ/BJdeeOPMrtGk72X2/w2qXtso3zeUqRFd6iA6e', 'Rheza Aulia Ramadhan', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(16, '21070117120009', '$2y$10$jgWzu5LHVzk5r9z.Fw42juQGJhp5JB5wwabzV8dsaEyCFNGfCLHLu', 'Aradita Anisya Permata', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(17, '21070117120010', '$2y$10$aSLNVEKGST2OxgnC.DFb7e27DgCy9AX6mgWNUtq8MWK/EHy58P20C', 'Mutiara Adhilia Purwaningsih', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(18, '21070117120011', '$2y$10$tKN0jy5OeMJRFyk4n/tlq.72woyBEuuhlFsEGDtpx/fA8pr4tq3AS', 'Ramandhika Alief Nurahayu P', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(19, '21070117120012', '$2y$10$XUhbLe7OI/1bueEl5UOX1O4Qqz5dzbbkSG/EZKp40oIqE/NAgGr3q', 'Avinda Jihan Ardiani', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(20, '21070117120013', '$2y$10$Bm.h6V7iMc3XNIgtyd34BufYy8ym9OVJfI7.M6brM18xYH7cfrRvO', 'Yosefin Mahanani', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(21, '21070117120014', '$2y$10$em3TvS1.qHK7c1xIttBzUOXHFU734ivAIn1XSuZwAN6w8oQOIqGmy', 'Raka Pandhito Bagja', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(22, '21070117120015', '$2y$10$SLyoEgOmHm1tbpuU0ySsNuTH2GXGBlYKBj5mlThvd64EewFsXJwGS', 'Aprilia Dwi Lestari', 'mahasiswa', '2019-11-29 07:06:07', '2019-11-29 07:06:07'),
(23, '21120115130074', '$2y$10$Tw8/2M0DGp1JcGCSJZ9t1O.cgmofL4pYQ.WDy0xn76Q.dHl6FBG3O', 'Harits Fathuddin', 'mahasiswa', '2019-11-29 07:06:41', '2019-11-29 07:06:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `dosen` (`dosen`);

--
-- Indexes for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `mahasiswas_ibfk_2` FOREIGN KEY (`dosen`) REFERENCES `dosens` (`kode`);

--
-- Constraints for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  ADD CONSTRAINT `tugas_akhirs_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswas` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
