-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 12:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `bukuID` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahunTerbit` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`bukuID`, `judul`, `penulis`, `penerbit`, `tahunTerbit`, `stok`) VALUES
(21, 'Jujutsu kaisen', 'gege akutami', '-', 2018, 15),
(22, 'dongeng sang kancil', '-', 'Citra Media Pustaka', 2019, 10),
(23, 'Sejarah Dunia yang Disembunyikan', 'Jhonatan black', 'Alabet', 2015, 14),
(24, 'Student Hidjo', 'narasi', '-', 2022, 15),
(25, 'Spider-man comic', 'stann lee', '-', 1963, 10);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategoribuku`
--

CREATE TABLE `t_kategoribuku` (
  `kategoriID` int(11) NOT NULL,
  `namaKategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kategoribuku`
--

INSERT INTO `t_kategoribuku` (`kategoriID`, `namaKategori`) VALUES
(2, 'novel'),
(3, 'fiksi'),
(4, 'manga'),
(5, 'dongeng'),
(6, 'sejarah'),
(7, 'komik');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `peminjamanID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `bukuID` int(11) DEFAULT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `statusPeminjaman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_peminjaman`
--

INSERT INTO `t_peminjaman` (`peminjamanID`, `userID`, `bukuID`, `tgl_peminjaman`, `tgl_pengembalian`, `statusPeminjaman`) VALUES
(14, 3, 21, '2024-02-01', '2024-02-08', 'Dipinjam'),
(15, 3, 22, '2024-02-03', '2024-02-05', 'Dipinjam'),
(16, 3, 23, '2024-02-01', '2024-02-03', 'Dipinjam'),
(17, 13, 25, '2024-02-01', '2024-02-10', 'Dipinjam'),
(18, 15, 23, '2024-02-01', '2024-02-09', 'Dipinjam'),
(19, 14, 24, '2024-02-01', '2024-02-06', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL,
  `namaLengkap` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` enum('admin','petugas','anggota','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userID`, `username`, `password`, `email`, `telp`, `namaLengkap`, `alamat`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.com', NULL, 'administrator', 'admin', 'admin'),
(2, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmail.com', '08436265465', 'petugas', 'jakarta', 'petugas'),
(3, 'peminjam', '55f3894bc5fc71fead8412d321c2952c', 'peminjam@gmail.com', '08345262663', 'siswa', 'bandung', 'anggota'),
(13, 'kimfk', '202cb962ac59075b964b07152d234b70', 'kimfreddy70@gmail.com', '089657195983', 'kim', 'cimerang', 'anggota'),
(14, 'Fredd', '202cb962ac59075b964b07152d234b70', 'freddy231@gmail.com', '08965565422', 'Freddy ', 'Bandung', 'anggota'),
(15, 'Kw0n', '202cb962ac59075b964b07152d234b70', 'kw0n12@gmail.com', '081573034917', 'Kwon', 'jakarta', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`bukuID`);

--
-- Indexes for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`peminjamanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `bukuID` (`bukuID`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `bukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `t_kategoribuku`
--
ALTER TABLE `t_kategoribuku`
  MODIFY `kategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `peminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD CONSTRAINT `t_peminjaman_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `t_user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_peminjaman_ibfk_2` FOREIGN KEY (`bukuID`) REFERENCES `t_buku` (`bukuID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
