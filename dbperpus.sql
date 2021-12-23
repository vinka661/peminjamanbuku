-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 07:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nm_admin` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Admin', 'jwd', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
('AG001', 'syakir daulay', 'Pria', 'Bogor', 'Sedang Meminjam', 'AG001.jpg'),
('AG002', 'Axel Matthew Thomas', 'Wanita', 'Malang', 'Sedang Meminjam', 'AG002.jpg'),
('AG003', 'Effrosina ', 'Pria', 'Malang', 'Sedang Meminjam', 'AG003.png'),
('AG004', 'Meghan', 'Pria', 'Surabaya', 'Sedang Meminjam', 'AG004.png'),
('AG005', 'Yesa Abraham', 'Pria', 'Malang', 'Sedang Meminjam', 'AG005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) CHARACTER SET latin1 NOT NULL,
  `judul` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kategori` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pengarang` varchar(40) CHARACTER SET latin1 NOT NULL,
  `penerbit` varchar(40) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `cover` varchar(35) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judul`, `kategori`, `pengarang`, `penerbit`, `status`, `cover`) VALUES
('BK001', 'Jika Kita Tak Pernah Jatuh Cinta: Chapter 1', 'Novel', 'Alvi Syahrin', 'Gramedia', 'Tersedia', 'BK001.jpg'),
('BK002', 'Insecurity ', 'Novel', 'Alvi Syahrin', 'Gramedia', 'Tersedia', 'BK002.jpg'),
('BK003', 'Kata', 'Novel', 'Nadhifa Allya Tsana', 'Gramedia', 'Tersedia', 'BK003.jpg'),
('BK004', 'Bumi', 'Novel', ' tereliye', 'Gramedia', 'Tersedia', 'BK004.jpg'),
('BK005', 'Bintang', 'Novel', ' tereliye', 'Gramedia', 'Tersedia', 'BK005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbkembali`
--

CREATE TABLE `tbkembali` (
  `idpengembalian` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkembali`
--

INSERT INTO `tbkembali` (`idpengembalian`, `idanggota`, `idbuku`, `tglkembali`) VALUES
('K001', 'AG001', 'BK001', '2021-09-27'),
('K002', 'AG002', 'BK002', '2021-10-01'),
('K003', 'AG003', 'BK003', '2021-10-04'),
('K004', 'AG004', 'BK004', '2021-10-11'),
('K005', 'AG005', 'BK005', '2021-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbpinjam`
--

CREATE TABLE `tbpinjam` (
  `idpeminjaman` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpinjam`
--

INSERT INTO `tbpinjam` (`idpeminjaman`, `idanggota`, `idbuku`, `tglpinjam`) VALUES
('P001', 'AG001', 'BK001', '2021-09-02'),
('P002', 'AG002', 'BK002', '2021-09-06'),
('P003', 'AG002', 'BK003', '2021-09-07'),
('P004', 'AG004', 'BK004', '2021-09-12'),
('P005', 'AG005', 'BK005', '2021-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`nama`,`jeniskelamin`,`alamat`,`status`,`foto`),
  ADD KEY `idanggota` (`idanggota`);

--
-- Indexes for table `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbkembali`
--
ALTER TABLE `tbkembali`
  ADD PRIMARY KEY (`idpengembalian`);

--
-- Indexes for table `tbpinjam`
--
ALTER TABLE `tbpinjam`
  ADD PRIMARY KEY (`idpeminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
