-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 01:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `judul`, `penerbit`, `pengarang`, `tahun_terbit`, `harga`, `stok`, `gambar`) VALUES
(31, 'Atomic Habits', 'Gramedia', 'James Clear', '2018', 110000, 100, '962-Atomic Habits.jpg'),
(32, 'Rentang Kisah', 'Gramedia', 'Gita Savitri', '2017', 50000, 50, '734-Rentang-Kisah.jpg'),
(37, 'Dilan 1990', 'Gramedia', 'Pidi Baiq', '2018', 85000, 100, 'Dilan 1990.jpg'),
(36, 'Filosofi Teras', 'Gramedia', 'Henry Manampiring', '2019', 89000, 200, '240-Filosofi Teras.jpg'),
(35, 'Garis Waktu: Sebuah Perjalanan Menghapus Luka', 'Fiersa Besari', 'Fiersa Besari', '2016', 215000, 10, '139-Garis-Waktu-Sebuah-Perjalanan-Menghapus-Luka.jpg'),
(34, '11:11', 'Fiersa Besari ', 'Fiersa Besari ', '2018', 140000, 100, '742-1111.jpg'),
(33, 'Seni Bersikap Bodo Amat', 'Grasindo', 'Mark Manson', '2018', 180000, 192, 'Seni Bersikap Bodo Amat.jpg'),
(41, 'Kata', 'Gramedia', 'Nadhifa Allya Tsana', '2019', 90000, 50, '303-Kata-Rintik-Sedu.jpg'),
(42, 'Catatan Juang', 'Gramedia', 'Fiersa Besari', '2017', 86000, 100, '97-catatan juang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID` int(11) NOT NULL,
  `no_transaksi` varchar(7) NOT NULL,
  `ID_buku` int(7) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_beli` int(12) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID`, `no_transaksi`, `ID_buku`, `harga`, `jumlah_beli`, `subtotal`) VALUES
(63, 'TRS001', 36, 100000, 5, 500000),
(62, 'TRS001', 34, 140000, 10, 1400000),
(65, 'TRS002', 36, 100000, 2, 200000),
(74, '', 36, 89000, 2, 178000),
(75, '', 34, 140000, 1, 140000),
(76, '', 35, 215000, 3, 645000),
(77, '', 33, 180000, 2, 360000),
(78, '', 32, 50000, 2, 100000),
(79, '', 37, 85000, 2, 170000),
(80, 'TRS004', 31, 110000, 3, 330000),
(81, 'TRS005', 37, 85000, 1, 85000),
(82, 'TRS006', 31, 110000, 1, 110000);

-- --------------------------------------------------------

--
-- Table structure for table `head_transaksi`
--

CREATE TABLE `head_transaksi` (
  `no_transaksi` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `total` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_transaksi`
--

INSERT INTO `head_transaksi` (`no_transaksi`, `tanggal`, `total`) VALUES
('TRS001', '2020-12-23', 1900000),
('TRS002', '2020-12-30', 200000),
('TRS003', '2020-12-30', 550000),
('TRS004', '2021-01-04', 330000),
('TRS005', '2021-01-05', 85000),
('TRS006', '2021-01-05', 110000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `hak_akses`, `nama`) VALUES
('admin', 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID`,`no_transaksi`,`ID_buku`);

--
-- Indexes for table `head_transaksi`
--
ALTER TABLE `head_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
