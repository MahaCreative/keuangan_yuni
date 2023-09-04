-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 10:11 AM
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
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'TUNAS PRINT', 'tunasprint@gmail.com', 'tunasprint2022'),
(2, 'ADMIN TUNAS', 'admintunas@gmail.com', 'admintunas2022');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `catatan`) VALUES
(1, 'Besok, Hari minggu akan ada kunjungan dari pihak dinas untuk mengecek kinerja karyawan.'),
(2, 'Hari Kamis jam 8 akan ada rapat, diharapkan kepada semua karyawan agar dapat berhadir.'),
(3, 'Tingkatkan lagi pendapatan, dan minimalkan pengeluaran'),
(4, 'tgl 6 domain dan hosting banyak yang akan expired, dan harus diperpanjang lagi');

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_hutang` date NOT NULL,
  `alasan` text NOT NULL,
  `penghutang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jumlah`, `tgl_hutang`, `alasan`, `penghutang`) VALUES
(18, 50000, '2022-08-20', 'Beli Pertamax', 'Dimas'),
(19, 15000, '2022-08-19', 'Beli Bakso', 'Agung');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `posisi` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `umur` int(11) NOT NULL,
  `kontak` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `posisi`, `alamat`, `umur`, `kontak`) VALUES
(1, 'Silvani', 'Sekertaris', 'Pati', 20, '082332442552'),
(6, 'Agus', 'Bendahara', 'Pati', 20, '081223443553');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `hrg_satuan` int(100) NOT NULL,
  `jml_total` int(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jenis_barang`, `ukuran`, `jumlah`, `hrg_satuan`, `jml_total`, `ket`) VALUES
(1, '2022-11-01', 'Stempel Biasa', '2x2cm', '1 pcs', 50000, 50000, 'Lunas'),
(2, '2022-11-02', 'Stempel Flash', '4,2 cm', '1 pcs', 100000, 100000, 'Lunas'),
(3, '2022-11-03', 'Spanduk (Edy)', '150x150 cm', '2 lmb', 30000, 35000, 'Lunas'),
(4, '2022-11-04', 'Xbanner Wedding', '60x160 cm', '2 lmb', 50000, 100000, 'Lunas'),
(5, '2022-11-05', 'Spanduk Puskesmas', '3x1 cm', '2 lmb', 30000, 180000, 'Lunas'),
(6, '2022-11-06', 'Stiker Albadros', '85x60 cm', '2 lmb', 60000, 120000, 'Lunas'),
(7, '2022-11-07', 'Undangan', '', '50 pcs', 3000, 200000, 'Lunas'),
(8, '2022-11-08', 'Stempel Biasa', '3,5 cm', '1 pcs', 50000, 50000, 'Lunas'),
(9, '2022-11-09', 'Spanduk Kesehatan', '3 m', '2 lmb', 30000, 90000, 'Lunas'),
(10, '2022-08-10', 'Spanduk Lomba KKN', '2x1 cm', '1 lmb', 30000, 60000, 'Lunas'),
(11, '2022-11-11', 'Spanduk PU', '250x150 cm', '1 lmb', 35000, 140000, 'Lunas'),
(12, '2022-11-12', 'Spanduk Bendera', '150x100 cm', '1 lmb', 30000, 45000, 'Lunas'),
(13, '2022-11-13', 'Spanduk PUPR', '4x1 cm', '1 lmb', 30000, 120000, 'Belum Lunas'),
(14, '2022-11-14', 'Spanduk Minuman', '2x80 cm', '1 lmb', 30000, 60000, 'Lunas'),
(15, '2022-11-15', 'Stempel Kayu', '', '1 pcs', 50000, 50000, 'Lunas'),
(16, '2022-11-16', 'Spanduk (Bogel)', '17 m', '4 lmb', 27000, 459000, 'Belum Lunas'),
(17, '2022-11-17', 'Kartu Vaksin', '', '5 pcs', 35000, 175000, 'Lunas'),
(18, '2022-11-18', 'Spanduk PWI', '150x50 cm', '1 lmb', 30000, 30000, 'Lunas'),
(19, '2022-11-19', 'Spanduk Bendera', '2x150 cm', '2 lmb', 30000, 180000, 'Lunas'),
(20, '2022-11-20', 'Spanduk Tanah', '1x1 cm', '1 lmb', 30000, 30000, 'Lunas'),
(21, '2022-11-21', 'Spanduk Nasdem', '3x2 cm', '1 lmb', 25000, 150000, 'Lunas'),
(22, '2022-11-22', 'Spanduk Struktur', '100x150 cm', '2 lmb', 28000, 42000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jns_pengeluaran` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `hrg_satuan` int(100) NOT NULL,
  `ttl_pengeluaran` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jns_pengeluaran`, `jumlah`, `hrg_satuan`, `ttl_pengeluaran`) VALUES
(1, '2022-11-05', 'Makan Malam', '3 org', 0, 50000),
(2, '2022-11-06', 'Lem', '1 btl', 50000, 50000),
(3, '2022-11-07', 'Bendera', '3 pcs', 50000, 50000),
(4, '2022-11-08', 'Karet Stempel', '1 pak', 10000, 87000),
(5, '2022-11-09', 'Voucher Listrik', '100 rb', 100000, 105000),
(6, '2022-11-10', 'Cincin Spanduk', '5 pcs', 2000, 10000),
(7, '2022-11-12', 'Makanan', '1 org', 20000, 20000),
(8, '2022-11-13', 'Gagang Stempel', '2 pcs', 14000, 28000),
(28, '2022-11-16', 'Snack+Bensin', '1 org', 0, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama`) VALUES
(1, 'Buat Web Pemerintah'),
(2, 'Desain Poster Lomba'),
(3, 'Instalasi Softwre'),
(4, 'Instalasi OS'),
(5, 'Lain-Lain'),
(6, 'Domain'),
(7, 'Hosting'),
(8, 'Listrik'),
(9, 'Wifi'),
(10, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `uang`
--

CREATE TABLE `uang` (
  `id_uang` int(11) NOT NULL,
  `tgl_uang` date NOT NULL,
  `id_pengeluaran` int(11) DEFAULT NULL,
  `id_pendapatan` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uang`
--

INSERT INTO `uang` (`id_uang`, `tgl_uang`, `id_pengeluaran`, `id_pendapatan`, `jumlah`) VALUES
(1, '2019-10-23', NULL, 1, 500000),
(2, '2019-10-24', 2, NULL, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_sumber` (`hrg_satuan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_sumber` (`jumlah`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `uang`
--
ALTER TABLE `uang`
  ADD PRIMARY KEY (`id_uang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uang`
--
ALTER TABLE `uang`
  MODIFY `id_uang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
