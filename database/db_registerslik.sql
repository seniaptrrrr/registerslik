-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 05:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_registerslik`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `nama_lengkap_debitur` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat_debitur` text NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nama_ibu_kandung` varchar(100) DEFAULT NULL,
  `tgl_diajukan` date NOT NULL,
  `riwayat` varchar(200) NOT NULL,
  `id_status_pengajuan` int(11) NOT NULL,
  `alasan_verifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `nama_lengkap_debitur`, `nik`, `no_telp`, `alamat_debitur`, `pekerjaan`, `nama_ibu_kandung`, `tgl_diajukan`, `riwayat`, `id_status_pengajuan`, `alasan_verifikasi`) VALUES
('cuti-22a84', '0000f879df9b442107cc359168ce33a6', 'Aku', '38743037', '', 'fff', '', NULL, '2022-10-25', '--', 2, ''),
('cuti-37787', '0000f879df9b442107cc359168ce33a6', 'Adam Putra', '7678776909', '', 'Bandung', '', NULL, '2022-10-24', 'ada', 3, 'yyy'),
('cuti-3f022', '0000f879df9b442107cc359168ce33a6', 'Rizki', '6577688767', '', 'Kp Babakan', '', NULL, '2022-10-24', '-', 3, ''),
('cuti-82f51', '0000f879df9b442107cc359168ce33a6', 'Adiba', '638239002', '', 'Jakarta', '', NULL, '2022-10-24', '-', 3, ''),
('cuti-ab0c9', '0000f879df9b442107cc359168ce33a6', 'Aslan', '454580788', '', 'Bandung', '', NULL, '2022-10-24', '-', 2, 'bagus'),
('cuti-cec91', '4cf9b68d95176f64332525d8f698b865', 'adam', '56805', '', 'kp babakan', '', NULL, '2022-10-25', '-', 2, 'y'),
('cuti-d0c1a', '8ceac9a205cea4e49de2a2dea78c107a', 'Arka', '03676201676796569', '', 'Cimahi', '', NULL, '2022-10-25', '-', 2, '-'),
('cuti-d41d8', '', '', '', '', '', '', NULL, '2022-10-25', '', 1, ''),
('cuti-dfd03', '38986a210012dce62a2f2e5639bff47d', 'Bayu', '73290273745', '', 'Salawu', '', NULL, '2022-10-25', '-', 2, 'Bersih'),
('cuti-e8850', '38986a210012dce62a2f2e5639bff47d', 'Alex', '65875858', '', 'Salawu', '', NULL, '2022-10-25', '-', 1, ''),
('cuti-f8cd2', '8ceac9a205cea4e49de2a2dea78c107a', 'Seanka Arsya', '03656378976378376', '', 'Jl. Hilir Mudik', '', NULL, '2022-10-28', '-', 1, ''),
('cuti-fb1fa', '0000f879df9b442107cc359168ce33a6', 'senia', '6767768787', '', 'kp babakan', '', NULL, '2022-10-17', '', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengajuan`
--

CREATE TABLE `status_pengajuan` (
  `id_status_pengajuan` int(11) NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pengajuan`
--

INSERT INTO `status_pengajuan` (`id_status_pengajuan`, `status_pengajuan`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Pengajuan Diterima'),
(3, 'Pengajuan Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('0000f879df9b442107cc359168ce33a6', 'intan', 'intan', 'intan@gmail.com', 1, '0000f879df9b442107cc359168ce33a6'),
('134e349e4f50a051d8ca3687d6a7de1a', 'admin', 'admin', 'admin@admin.com', 2, '134e349e4f50a051d8ca3687d6a7de1a'),
('38986a210012dce62a2f2e5639bff47d', 'Ade', 'Ade', 'intan@gmail.com', 1, '38986a210012dce62a2f2e5639bff47d'),
('39332f054c98c54e4eda83e1274566ed', 'putri', 'putri', 'putri@gmail.com', 1, '39332f054c98c54e4eda83e1274566ed'),
('8ceac9a205cea4e49de2a2dea78c107a', 'senia', 'senia', 'senia@gmail.com', 1, '8ceac9a205cea4e49de2a2dea78c107a'),
('f5972fbf4ef53843c1e12c3ae99e5005', 'admin_master', 'admin_master', 'kresna123@gmail.com', 3, 'f5972fbf4ef53843c1e12c3ae99e5005'),
('f7c29a67a56cbde43588262510cf7b52', 'ideb', 'ideb', 'sen@gmail.com', 2, 'f7c29a67a56cbde43588262510cf7b52');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `alamat`, `nip`, `pangkat`, `jabatan`) VALUES
('0000f879df9b442107cc359168ce33a6', 'Intan Sari', 2, '089878675654', 'Jakarta', NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de1a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('38986a210012dce62a2f2e5639bff47d', 'Ade Rami', 1, '08769868787', 'Salawu', NULL, NULL, NULL),
('39332f054c98c54e4eda83e1274566ed', 'Putri Yulia Sari', 2, '087676765654', 'Jl. Sukosemolo', NULL, NULL, NULL),
('8ceac9a205cea4e49de2a2dea78c107a', 'Senia Putri Ristiani', 2, '0866565656', 'kp babakan', NULL, NULL, NULL),
('f5972fbf4ef53843c1e12c3ae99e5005', NULL, 1, NULL, NULL, NULL, NULL, NULL),
('f7c29a67a56cbde43588262510cf7b52', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'pegawai'),
(2, 'admin'),
(3, 'super admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  ADD PRIMARY KEY (`id_status_pengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_pengajuan`
--
ALTER TABLE `status_pengajuan`
  MODIFY `id_status_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
