-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 09:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kota_tinggal` varchar(255) DEFAULT NULL,
  `kota_lahir` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_sks` int(11) DEFAULT NULL,
  `ipk` double DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `alamat`, `tanggal_lahir`, `kota_tinggal`, `kota_lahir`, `phone`, `status`, `total_sks`, `ipk`, `id_user`) VALUES
(0, '', '', '0000-00-00', '', '', '', 'on', 0, 0, 46),
(16078999, 'Dirga Gila', 'Jl. Tembusuk', '1997-08-08', 'Surabaya', 'Trenggalek', '08080800', 'on', 222227, 0.000071998452033281, 50),
(160167166, 'John Key', 'Jl. Rusuh iiiiii', '1995-01-01', 'Surabaoio', 'Timika', '08666666611', 'on', 4, 3, 47),
(160167168, 'John Key', 'Jl. Rusuh Seljkkjawsad', '1995-01-01', 'jkhjk', 'Timika', '08689890890898', 'on', 4, 2.5, 49),
(160416102, 'ReyRoy', 'Jl. Pondok Indah', '0000-00-00', 'Surabaya', 'Jakarta', '086656721332', 'on', 222230, 0.0001079962201323, 43),
(160416154, 'Muhammad Sani', 'Jl. Darmo Permai Selatahn V/71-A', NULL, 'Surabaya', 'Surabaya', ' 6285732018823', 'tidak aktif', 444495, 3.2499870639715, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama`, `sks`) VALUES
('00141A', 'Pancasila dan Kewarganegaraan', 3),
('1600A001', 'Penulisan dan Presentasi Ilmiah', 3),
('1600A002', 'Bahasa Inggris', 2),
('1600A104', 'Matematika', 4),
('1604A011', 'Algoritma dan Pemrograman', 6),
('1604A012', 'Pengantar Informatika', 2),
('1604A013', 'Organisasi dan Arsitektur Komputer', 2),
('1604A021', 'Pemrograman Beorientasi Objek', 6),
('1604A022', 'Sistem Operasi', 3),
('1604A023', 'Matematika Diskrit', 3),
('1604A031', 'Struktur Data', 4),
('1604A032', 'Jaringan Komputer', 4),
('1604A033', 'Desain Web', 2),
('1604A204', 'Computer Graphics', 3),
('1607A021', 'Basis Data', 4),
('1607A031', 'Pemrograman Basis Data', 2),
('5126351', 'Panduan Etika', 222223),
('87dagda', 'damnd', 222223);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah_has_mahasiswa`
--

CREATE TABLE `mata_kuliah_has_mahasiswa` (
  `mata_kuliah_kode_mk` varchar(255) NOT NULL,
  `mahasiswa_nrp` int(11) NOT NULL,
  `nts` int(11) NOT NULL,
  `nas` int(11) NOT NULL,
  `nisbi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mata_kuliah_has_mahasiswa`
--

INSERT INTO `mata_kuliah_has_mahasiswa` (`mata_kuliah_kode_mk`, `mahasiswa_nrp`, `nts`, `nas`, `nisbi`) VALUES
('00141A', 160416102, 88, 99, 'A'),
('00141A', 160416154, 85, 90, 'A'),
('1600A001', 160416154, 90, 88, 'A'),
('1600A002', 160416154, 72, 66, 'B'),
('1600A104', 16078999, 88, 99, 'A'),
('1600A104', 160167166, 90, 55, 'B'),
('1600A104', 160416154, 80, 99, 'A'),
('1604A011', 160416154, 22, 99, 'B'),
('1604A012', 160416154, 70, 70, 'B'),
('1604A013', 160416154, 22, 66, 'D'),
('1604A021', 160416154, 80, 66, 'B'),
('1604A022', 160416154, 77, 86, 'A'),
('1604A023', 160416154, 55, 75, 'B'),
('1604A031', 160416154, 83, 99, 'A'),
('1604A032', 160416154, 22, 66, 'D'),
('1604A033', 160416154, 44, 87, 'B'),
('1604A204', 160416154, 80, 75, 'AB'),
('1607A021', 160167168, 88, 44, 'BC'),
('1607A021', 160416102, 22, 99, 'B'),
('1607A031', 160416154, 22, 100, 'B'),
('5126351', 16078999, 88, 60, 'B'),
('5126351', 160416102, 88, 0, 'E'),
('5126351', 160416154, 72, 55, 'BC'),
('87dagda', 160416154, 88, 99, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `tipe`) VALUES
(2, 'saniassegaf@outlook.com', '8gigabyte', 'mahasiswa'),
(3, 'mongolia@gmail.com', 'mongol123', 'mahasiswa'),
(29, 'pupus@gmail.com', 'a27970ea8224f8bcc9ec67de08192e85', 'mahasiswa'),
(30, 'saniassegaf@outlook.com', 'd8b8258ae7913ede6da52b88027439d6', 'admin'),
(31, 'reyroy@gmail.com', '0c03599b29ecc6faeef8ac423a9a1c47', 'mahasiswa'),
(32, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(33, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(34, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(35, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(36, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(37, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(38, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(39, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(40, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(41, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(42, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(43, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(44, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(45, 'reyroy@gmail.com', 'ec572cc43b13919571d2aa986cc509c8', 'mahasiswa'),
(46, '', 'c96b4595c9165a522ede79724d3f9b94', 'mahasiswa'),
(47, 'johnkey@gmail.com', '52b590b613385c41b625ca1cc6b1918d', 'mahasiswa'),
(48, 'johnkey@gmail.com', '52b590b613385c41b625ca1cc6b1918d', 'mahasiswa'),
(49, 'johnkey@gmail.com', '86c19eb841e451ab3668082a87341ee5', 'mahasiswa'),
(50, 'gilang@gmail.com', '86c19eb841e451ab3668082a87341ee5', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `fk_mahasiswa_user1_idx` (`id_user`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `mata_kuliah_has_mahasiswa`
--
ALTER TABLE `mata_kuliah_has_mahasiswa`
  ADD PRIMARY KEY (`mata_kuliah_kode_mk`,`mahasiswa_nrp`),
  ADD KEY `fk_mata_kuliah_has_mahasiswa_mahasiswa1_idx` (`mahasiswa_nrp`),
  ADD KEY `fk_mata_kuliah_has_mahasiswa_mata_kuliah_idx` (`mata_kuliah_kode_mk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `mata_kuliah_has_mahasiswa`
--
ALTER TABLE `mata_kuliah_has_mahasiswa`
  ADD CONSTRAINT `fk_mata_kuliah_has_mahasiswa_mahasiswa1` FOREIGN KEY (`mahasiswa_nrp`) REFERENCES `mahasiswa` (`nrp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mata_kuliah_has_mahasiswa_mata_kuliah` FOREIGN KEY (`mata_kuliah_kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
