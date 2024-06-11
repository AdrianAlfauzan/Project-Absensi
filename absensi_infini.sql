-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 03:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_infini`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi`
--

CREATE TABLE `tabel_absensi` (
  `ID_absensi` int(15) NOT NULL,
  `ID_pengguna` int(15) DEFAULT NULL,
  `ID_admin` int(15) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_absensi`
--

INSERT INTO `tabel_absensi` (`ID_absensi`, `ID_pengguna`, `ID_admin`, `tanggal`, `keterangan`) VALUES
(112, 139, 1, '2024-06-03', 'awawaw'),
(113, 139, 1, '2024-06-24', 'babababa\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `ID_admin` int(15) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`ID_admin`, `nama_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin infinin roleplay', 'admin', 'password'),
(2, 'infini kedua', 'admin2', 'jambar'),
(22, 'haha', 'haha', 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kehadiran`
--

CREATE TABLE `tabel_kehadiran` (
  `ID_kehadiran` int(15) NOT NULL,
  `ID_absensi` int(15) NOT NULL,
  `ID_admin` int(15) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_kehadiran`
--

INSERT INTO `tabel_kehadiran` (`ID_kehadiran`, `ID_absensi`, `ID_admin`, `jam_masuk`, `jam_keluar`) VALUES
(95, 112, 1, '12:49:00', '23:49:00'),
(96, 113, 1, '23:49:00', '12:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pekerjaan`
--

CREATE TABLE `tabel_pekerjaan` (
  `ID_pekerjaan` int(20) NOT NULL,
  `nama_pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pekerjaan`
--

INSERT INTO `tabel_pekerjaan` (`ID_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'PEMERINTAHAN'),
(2, 'POLISI'),
(3, 'EMS'),
(4, 'PEDAGANG'),
(5, 'MEKANIK');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `ID_pengguna` int(15) NOT NULL,
  `ID_admin` int(15) DEFAULT NULL,
  `gambar_pengguna` varchar(50) DEFAULT NULL,
  `jabatan_pengguna` varchar(20) NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `ID_pekerjaan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`ID_pengguna`, `ID_admin`, `gambar_pengguna`, `jabatan_pengguna`, `nama_pengguna`, `ID_pekerjaan`, `username`, `password`, `confirm_password`) VALUES
(138, 1, NULL, 'n', 'n', 2, 'n', '$2y$10$narIzc2uJ5DsPMqjaWSYwufN2vtjFf4ACFvjSbQzsFRxbNqOFubeG', 'n'),
(139, 1, NULL, 't', 't', 3, 't', '$2y$10$GnyrWkk/uDWD4V5QdjzWj.2XmjWq2/W/yUW2J7xKPRc3sTKpudh3q', 't');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`ID_absensi`),
  ADD KEY `ID_pengguna` (`ID_pengguna`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indexes for table `tabel_kehadiran`
--
ALTER TABLE `tabel_kehadiran`
  ADD PRIMARY KEY (`ID_kehadiran`),
  ADD KEY `ID_absensi` (`ID_absensi`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- Indexes for table `tabel_pekerjaan`
--
ALTER TABLE `tabel_pekerjaan`
  ADD PRIMARY KEY (`ID_pekerjaan`);

--
-- Indexes for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`ID_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `ID_admin` (`ID_admin`),
  ADD KEY `ID_pekerjaan` (`ID_pekerjaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  MODIFY `ID_absensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `ID_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tabel_kehadiran`
--
ALTER TABLE `tabel_kehadiran`
  MODIFY `ID_kehadiran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tabel_pekerjaan`
--
ALTER TABLE `tabel_pekerjaan`
  MODIFY `ID_pekerjaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  MODIFY `ID_pengguna` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ibfk_1` FOREIGN KEY (`ID_pengguna`) REFERENCES `tabel_pengguna` (`ID_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_absensi_ibfk_2` FOREIGN KEY (`ID_admin`) REFERENCES `tabel_admin` (`ID_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_kehadiran`
--
ALTER TABLE `tabel_kehadiran`
  ADD CONSTRAINT `tabel_kehadiran_ibfk_1` FOREIGN KEY (`ID_absensi`) REFERENCES `tabel_absensi` (`ID_absensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_kehadiran_ibfk_2` FOREIGN KEY (`ID_admin`) REFERENCES `tabel_admin` (`ID_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD CONSTRAINT `tabel_pengguna_ibfk_1` FOREIGN KEY (`ID_pekerjaan`) REFERENCES `tabel_pekerjaan` (`ID_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pengguna_ibfk_2` FOREIGN KEY (`ID_admin`) REFERENCES `tabel_admin` (`ID_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
