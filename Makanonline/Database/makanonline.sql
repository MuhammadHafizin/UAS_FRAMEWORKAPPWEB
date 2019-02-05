-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 04:50 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makanonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'enjoy', 'enjoy', 'hafizin');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `harga_makanan` int(11) NOT NULL,
  `berat_makanan` int(11) NOT NULL,
  `foto_makanan` varchar(100) NOT NULL,
  `deskripsi_makanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `berat_makanan`, `foto_makanan`, `deskripsi_makanan`) VALUES
(7, 'Mie Aceh', 10000, 5, 'download.jpg', 'enak'),
(8, 'Sate', 20000, 4, 'download (1).jpg', 'enak'),
(10, 'pecel', 10000, 2, 'pecel.jpg', 'mantab'),
(12, 'Lalapan', 15000, 2, 'lalapan.jpg', 'mantul');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(100) NOT NULL,
  `harga_minuman` int(11) NOT NULL,
  `foto_minuman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `foto_minuman`) VALUES
(3, 'AQUA', 3000, 'aqua.jpg'),
(4, 'Le mineral', 2000, 'le mineral.jpg'),
(5, 'Clum', 2000, 'club.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'surga', 1000),
(2, 'neraka', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'hafizhafizien@gmail.com', 'kopemmonyet', 'Hafizin AlENjoy', '085555666777888');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, 1, '2018-12-03', 5000000),
(2, 1, 0, '2019-02-01', 30000),
(3, 1, 0, '2019-02-01', 30000),
(4, 1, 0, '2019-02-01', 40000),
(5, 1, 0, '2019-02-01', 40000),
(6, 1, 0, '2019-02-01', 40000),
(7, 1, 0, '2019-02-01', 40000),
(8, 1, 0, '2019-02-01', 40000),
(9, 1, 0, '2019-02-01', 40000),
(10, 1, 0, '2019-02-01', 40000),
(11, 1, 0, '2019-02-01', 0),
(12, 1, 0, '2019-02-01', 10000),
(13, 1, 0, '2019-02-03', 10000),
(14, 1, 0, '2019-02-03', 10000),
(15, 1, 0, '2019-02-03', 40000),
(16, 1, 0, '2019-02-03', 10000),
(17, 1, 0, '2019-02-03', 10000),
(18, 1, 0, '2019-02-03', 10000),
(19, 1, 0, '2019-02-03', 10000),
(20, 1, 0, '2019-02-03', 10000),
(21, 1, 0, '2019-02-03', 10000),
(22, 1, 0, '2019-02-03', 0),
(23, 1, 0, '2019-02-03', 0),
(24, 1, 0, '2019-02-03', 0),
(25, 1, 0, '2019-02-03', 10000),
(26, 1, 0, '2019-02-03', 20000),
(27, 1, 0, '2019-02-03', 10000),
(28, 1, 0, '2019-02-04', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_makanan`
--

CREATE TABLE `pembelian_makanan` (
  `id_pembelian_makanan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_makanan`
--

INSERT INTO `pembelian_makanan` (`id_pembelian_makanan`, `id_pembelian`, `id_makanan`, `jumlah_makanan`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rokok`
--

CREATE TABLE `rokok` (
  `id_rokok` int(11) NOT NULL,
  `nama_rokok` varchar(100) NOT NULL,
  `harga_rokok` int(11) NOT NULL,
  `berat_rokok` int(11) NOT NULL,
  `foto_rokok` varchar(100) NOT NULL,
  `deskripsi_rokok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rokok`
--

INSERT INTO `rokok` (`id_rokok`, `nama_rokok`, `harga_rokok`, `berat_rokok`, `foto_rokok`, `deskripsi_rokok`) VALUES
(4, 'MagnumBlue', 12000, 2, 'download (6).jpg', 'mantap'),
(5, 'L.A Light', 18000, 2, 'download (5).jpg', 'mmmm'),
(6, 'Dunhill', 20000, 2, 'images.jpg', 'mmmm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_makanan`
--
ALTER TABLE `pembelian_makanan`
  ADD PRIMARY KEY (`id_pembelian_makanan`);

--
-- Indexes for table `rokok`
--
ALTER TABLE `rokok`
  ADD PRIMARY KEY (`id_rokok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pembelian_makanan`
--
ALTER TABLE `pembelian_makanan`
  MODIFY `id_pembelian_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rokok`
--
ALTER TABLE `rokok`
  MODIFY `id_rokok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
