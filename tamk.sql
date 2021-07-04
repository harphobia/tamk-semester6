-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 09:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tamk`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `password` varchar(24) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`, `alamat`, `no_hp`, `password`) VALUES
('17171717171', 'Coba', 'Sanasini', '9090909090', '123'),
('1810802001', 'Syahrul Ibnu', 'Kedurus Gg.IV Rt5/Rw6 Surabaya', '087723471092', '123'),
('1810802002', 'Firman Putra', 'Jl. Brigjend Katamso No.8A,Waru Sidoarjo', '081236782964', '123'),
('1810802003', 'Galang Pratama', 'Kalijaten Gang 6 No.59 Kec. Taman, Kabupaten Sidoarjo', '089912673891', '123'),
('1810802004', 'Adi Pradana', 'Jl. Raden Patah No.91F, Pucanganom, Kec. Sidoarjo, Kabupaten Sidoarjo', '085512768932', '123'),
('1810802005', 'Hijri Aliudin', 'Jl. Mastrip VIII - F, RT. 05, RW. 03, Kel, Warugunung, Kec. Karang Pilang, Kota SBY', '088234671298', '123');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_code`
--

CREATE TABLE `enrolled_code` (
  `id` int(11) NOT NULL,
  `NIM_mahasiswa` varchar(255) NOT NULL,
  `enroll_code` varchar(255) NOT NULL,
  `enroll_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_code`
--

INSERT INTO `enrolled_code` (`id`, `NIM_mahasiswa`, `enroll_code`, `enroll_at`) VALUES
(1001, '1510001001', '001', '2021-04-05 00:00:00'),
(1003, '1510001003', '002', '2021-04-06 00:00:00'),
(1004, '1510001004', '002', '2021-04-06 00:00:00'),
(1005, '1510001005', '003', '2021-04-07 00:00:00'),
(1006, '1510001010', '004', '2021-04-08 00:00:00'),
(1007, '1510001006', '004', '2021-04-08 00:00:00'),
(1008, '1510001007', '005', '2021-04-09 00:00:00'),
(1009, '1510001008', '004', '2021-04-08 00:00:00'),
(1010, '1510001009', '005', '2021-04-09 00:00:00'),
(1012, '181080200304', '002', '2021-06-21 16:11:21'),
(1013, '181080200304', '8980', '2021-06-21 16:11:50'),
(1014, '181080200304', '005', '2021-06-21 16:12:28'),
(1015, '181080200304', '003', '2021-06-21 17:09:08'),
(1023, '181080200304', '004', '2021-06-21 17:29:00'),
(1024, '1510001001', '002', '2021-06-21 21:05:02'),
(1025, '1510001001', '003', '2021-06-21 21:05:11'),
(1026, '1510001006', '001', '2021-06-24 17:37:21'),
(1028, '1510001001', '005', '2021-06-26 15:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_code`
--

CREATE TABLE `enroll_code` (
  `code` varchar(255) NOT NULL,
  `nik_dosen` varchar(255) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jadwal` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll_code`
--

INSERT INTO `enroll_code` (`code`, `nik_dosen`, `nama_kelas`, `jadwal`, `create_at`) VALUES
('001', '1810802001', 'Bahasa Inggris ', 'senin', '2021-04-05 00:00:00'),
('002', '1810802002', 'Bahasa Indonesia', 'Selasa', '2021-04-06 00:00:00'),
('003', '1810802003', 'Pendidikan Agama Islam', 'Rabu', '2021-04-07 00:00:00'),
('004', '1810802004', 'Akuntansi', 'Kamis', '2021-04-08 00:00:00'),
('005', '1810802005', 'Sejarah dan Geografi', 'Jumat', '2021-04-09 00:00:00'),
('007', '17171717171', 'kelas Coba', 'Minggu', '2021-06-22 12:54:08'),
('8980', '1810802004', 'Coba', 'Senin', '2021-06-21 10:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_enrolled` int(11) NOT NULL,
  `hadir` tinyint(1) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `tanggal`, `id_enrolled`, `hadir`, `pertemuan_ke`, `update_at`) VALUES
(1001, '2021-04-27 00:00:00', 1001, 0, 1, '2021-04-05 00:00:00'),
(1003, '2021-04-27 00:00:00', 1003, 1, 1, '2021-04-06 00:00:00'),
(1004, '2021-04-27 00:00:00', 1004, 1, 1, '2021-04-06 00:00:00'),
(1005, '2021-04-27 00:00:00', 1005, 1, 1, '2021-04-07 00:00:00'),
(1006, '2021-04-27 00:00:00', 1006, 1, 1, '2021-04-08 00:00:00'),
(1007, '2021-04-27 00:00:00', 1007, 1, 1, '2021-04-08 00:00:00'),
(1008, '2021-04-27 00:00:00', 1008, 1, 1, '2021-04-09 00:00:00'),
(1009, '2021-04-27 00:00:00', 1009, 1, 1, '2021-04-08 00:00:00'),
(1010, '2021-04-27 00:00:00', 1010, 1, 1, '2021-04-09 00:00:00'),
(1011, '2021-06-21 10:16:34', 1006, 1, 12, '2021-06-21 10:16:34'),
(1012, '2021-06-21 18:45:00', 1013, 1, 1, '2021-06-21 18:45:00'),
(1013, '2021-06-21 19:37:23', 1012, 1, 1, '2021-06-21 19:37:23'),
(1014, '2021-06-25 21:18:03', 1007, 1, 1, '2021-06-25 21:18:03'),
(1015, '2021-06-26 10:48:58', 1026, 1, 1, '2021-06-26 10:48:58'),
(1016, '2021-06-26 15:25:03', 1026, 0, 2, '2021-06-26 15:25:03'),
(1018, '2021-06-26 19:18:26', 1001, 0, 2, '2021-06-26 19:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prog_studi` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `password` varchar(24) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `no_hp`, `fakultas`, `prog_studi`, `semester`, `angkatan`, `password`) VALUES
('1510001001', 'Wisnu Nur Ismail', 'Masangan Wetan Blok EA17, Sidoarjo', '089123235618', 'Teknik', 'Teknik Informatika', 6, 2015, '123'),
('1510001002', 'Rakamadya Taruna', 'Kota Bru Driyorejo Blok AB7 Gresik', '087712637622', 'Teknik ', 'Teknik Informatika', 6, 2015, '123'),
('1510001003', 'Wahyu Santoso', 'Jalan Sultan Agung No. 36, Magersari, Sidoarjo, Gajah Timur, Magersari, Kec. Sidoarjo, Kabupaten Sidoarjo,', '087712672071', 'Teknik ', 'Teknik Mesin', 6, 2015, '123'),
('1510001004', 'Muhammad Dhani', 'Jl.Kebon Sari  No.1, Pagesangan, Kec. Jambangan, Kota SBY', '081125672009', 'Teknik ', 'Teknik Industri', 6, 2015, '123'),
('1510001005', 'Bimas Setyo Wicaksono', 'Griyo Wage Asri Blok G13 Taman,Sidoarjo', '085567282011', 'Teknik ', 'Teknik Elektro', 6, 2015, '123'),
('1510001006', 'Rizal Rahmatullah', 'Jalan Ahmad Yani NO.17 Mbangil,Sidoarjo', '081125672098', 'Teknik', 'Teknik Mesin', 6, 2015, '123'),
('1510001007', 'Rifqi Rizqullah', 'Kota Baru Driyorejo Blok G29, Gresik', '089912562351', 'Teknik', 'Teknik Elektro', 6, 2015, '123'),
('1510001008', 'Muhammad Idris', 'Jalan Kebraon G.IV No.71 Surabaya', '087712464317', 'Teknik', 'Teknik Industri', 6, 2015, '123'),
('1510001009', 'Muhammad Aji Indrajaya', 'Jl Kemplaten Baru Gg.9 Surabaya', '087756472501', 'Teknik ', 'Teknik Informatika', 6, 2015, '123'),
('1510001010', 'Muhammad ghulam Zakiyan', 'Jl. Ketintang No.147-151, Wonokromo, Kec. Wonokromo, Kota SBY', '085512572098', 'Teknik ', 'Teknik Elektro', 6, 2015, '123'),
('181080200304', 'Anhar', 'prambon', '081234567890', 'Saintek', 'Informatika', 7, 2018, '123');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_enrolled` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `pertemuan_ke` int(11) NOT NULL,
  `input_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_enrolled`, `nilai`, `pertemuan_ke`, `input_at`) VALUES
(1001, 1001, 80, 1, '2021-04-05 00:00:00'),
(1003, 1003, 95, 1, '2021-04-06 00:00:00'),
(1004, 1004, 85, 1, '2021-04-06 00:00:00'),
(1005, 1005, 95, 1, '2021-04-07 00:00:00'),
(1006, 1006, 100, 1, '2021-04-08 00:00:00'),
(1007, 1007, 81, 1, '2021-04-08 00:00:00'),
(1008, 1008, 85, 1, '2021-04-09 00:00:00'),
(1009, 1009, 90, 1, '2021-04-08 00:00:00'),
(1010, 1010, 85, 1, '2021-04-09 00:00:00'),
(1014, 1007, 69, 1, '2021-06-25 07:39:59'),
(1015, 1026, 90, 1, '2021-06-25 08:20:17'),
(1016, 1001, 99, 2, '2021-06-25 08:20:37'),
(1018, 1026, 75, 3, '2021-06-25 08:27:53'),
(1020, 1012, 13, 1, '2021-06-27 11:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `enrolled_code`
--
ALTER TABLE `enrolled_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolled_code_fk0` (`NIM_mahasiswa`),
  ADD KEY `enrolled_code_fk1` (`enroll_code`);

--
-- Indexes for table `enroll_code`
--
ALTER TABLE `enroll_code`
  ADD PRIMARY KEY (`code`),
  ADD KEY `enroll_code_fk0` (`nik_dosen`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kehadiran_fk0` (`id_enrolled`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_fk0` (`id_enrolled`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled_code`
--
ALTER TABLE `enrolled_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled_code`
--
ALTER TABLE `enrolled_code`
  ADD CONSTRAINT `enrolled_code_fk0` FOREIGN KEY (`NIM_mahasiswa`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `enrolled_code_fk1` FOREIGN KEY (`enroll_code`) REFERENCES `enroll_code` (`code`);

--
-- Constraints for table `enroll_code`
--
ALTER TABLE `enroll_code`
  ADD CONSTRAINT `enroll_code_fk0` FOREIGN KEY (`nik_dosen`) REFERENCES `dosen` (`nik`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_fk0` FOREIGN KEY (`id_enrolled`) REFERENCES `enrolled_code` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_fk0` FOREIGN KEY (`id_enrolled`) REFERENCES `enrolled_code` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
