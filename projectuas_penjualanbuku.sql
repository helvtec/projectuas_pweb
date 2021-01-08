-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 10:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectuas_penjualanbuku`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `judul`, `penerbit`, `pengarang`, `tahun_terbit`, `harga`, `stok`, `gambar`) VALUES
(1, 'Mendaki Tangga yang Salah', 'Gramedia', 'Eric Barker', '2019', 90000, 50, '806-Mendaki Tangga Yang Salah.jpg'),
(2, 'Atomic Habits', 'Gramedia', 'James Clear', '2019', 110000, 65, '39-Atomic Habits.jpg'),
(3, 'Filosofi Teras', 'Gramedia', 'Henry Manampiring', '2019', 90000, 50, '390-Filosofi Teras.jpg'),
(4, 'Seni Bersikap Bodo Amat', 'Gramedia', 'Mark Manson', '2019', 95000, 35, '803-Seni Bersikap Bodo Amat.jpg'),
(5, 'Ikigai', 'Rene Book', 'Hector Garcia', '2017', 89000, 25, '91-ikigai.jpg'),
(6, 'Catatan Juang', 'Gramedia', 'Fiersa Besari', '2017', 75000, 50, '139-Catatan juang.jpg'),
(7, 'Dilan 1990', 'Gramedia', 'Pidi Baiq', '2018', 78000, 50, '607-Dilan 1990.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID`, `no_transaksi`, `ID_buku`, `harga`, `jumlah_beli`, `subtotal`) VALUES
(1, 'TRS001', 1, 110000, 12, 1320000),
(4, 'TRS002', 32, 99000, 1, 99000),
(5, 'TRS002', 7, 78000, 5, 390000);

-- --------------------------------------------------------

--
-- Table structure for table `head_transaksi`
--

CREATE TABLE `head_transaksi` (
  `no_transaksi` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_transaksi`
--

INSERT INTO `head_transaksi` (`no_transaksi`, `tanggal`, `total`) VALUES
('TRS001', '2021-01-08', 1320000),
('TRS002', '2021-01-08', 489000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `head_transaksi`
--
ALTER TABLE `head_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
