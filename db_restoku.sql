-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 04:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `foto_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `deskripsi`, `foto_menu`) VALUES
(1, 'Ayam Goreng', 10000, 'Ayam Goreng khas kuningan', 'ayam_goreng.jpg'),
(2, 'Ayam Geprek', 12500, 'Ayam Geprek khas kuningan', 'geprek.jpg'),
(3, 'Ayam Bakar', 15000, 'Ayam Bakar khas kuningan', 'ayam_bakar.jpg'),
(4, 'Jus Mangga', 8000, 'Jus Mangga khas kuningan', 'jus mangga.jpg'),
(5, 'Soda Gembira', 10000, 'Soda yang bercampur dengan susu yang menyegarkan', 'Soda Gembira.jpg'),
(6, 'Teh Manis', 3000, 'Teh Manis yang menyegarkan', 'Teh Manis.jpg'),
(7, 'Otak-Otak', 7000, 'Cemilan Otak-otak', 'otak2.jpg'),
(8, 'Kentang Goreng', 5000, 'Kentang Goreng spesial', 'Kentang Goreng.jpg'),
(9, 'Batagor', 9000, 'Batagor cemilan', 'batagor.jpg'),
(10, 'Nasi Goreng', 15000, 'Nasi digoreng enak', 'https://akcdn.detik.net.id/community/media/visual/2020/08/18/nasi-goreng-pedas_43.jpeg'),
(11, 'Cumi Goreng', 13000, 'Cumi Goreng khas kuningan ngeunah', 'http://kbu-cdn.com/dk/wp-content/uploads/cumi-goreng-terasi.jpg'),
(14, 'Mie Goreng', 10000, 'Mie Goreng indomie aestetik', 'http://kbu-cdn.com/dk/wp-content/uploads/mie-goreng-pedas-singapore.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `posisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `password`, `jenis_kelamin`, `alamat`, `no_hp`, `posisi`) VALUES
(1234, 'Reihan', 'mancung123', 'L', 'Jln. Sangkanurip', 85320550, 'kasir'),
(4321, 'Rachman', '123abc', 'L', 'Jln. Kartini', 82315213, 'Koki'),
(9876, 'Agus D', '12345678', 'L', 'Jln. Maju Mundur', 2147483647, 'Pelayan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_meja` int(20) NOT NULL,
  `jumlah_pelanggan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pesanan`, `nama_pelanggan`, `no_meja`, `jumlah_pelanggan`) VALUES
(1090, 'Midoriya', 4, 2),
(1111, 'Mancung', 3, 3),
(1122, 'Rachman', 4, 4),
(1234, 'Justin Bieber', 5, 5),
(1241, 'Tia', 6, 2),
(1515, 'Yolo', 10, 3),
(1548, 'Agus D', 6, 2),
(1717, 'Mr X', 8, 4),
(2211, 'Diva', 5, 5),
(4512, 'Contoh', 9, 1),
(4513, 'New', 7, 3),
(4514, 'Resto', 3, 3),
(5544, 'Tester', 2, 7),
(5991, 'Rendy', 4, 2),
(6565, 'wkwkw', 9, 7),
(6677, 'Milo', 3, 2),
(6767, 'Mamah', 10, 4),
(7523, 'Juju', 4, 5),
(7644, 'Kakei', 8, 5),
(7665, 'Rachman A', 14, 3),
(7721, 'Shoto', 8, 4),
(7878, 'Naruto', 3, 3),
(8874, 'Mumuh', 9, 4),
(8888, 'Zilong', 11, 3),
(9091, 'ASD', 4, 4),
(9712, 'Bos Besar', 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_transaksi`, `id_menu`, `jumlah`) VALUES
(5752, 2, 3),
(5752, 6, 1),
(9485, 3, 1),
(9485, 5, 1),
(9485, 8, 1),
(9485, 1, 1),
(9485, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pegawai`, `id_menu`, `id_pesanan`, `nama_menu`, `jumlah_menu`, `total_bayar`, `tgl_transaksi`) VALUES
(5752, 1234, 6, 7644, 'Teh Manis', 1, 40500, '2021-07-22'),
(9485, 1234, 14, 9712, 'Mie Goreng', 2, 60000, '2021-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9486;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pelanggan` (`id_pesanan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
