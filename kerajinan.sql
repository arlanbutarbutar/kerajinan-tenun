-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Nov 2022 pada 16.15
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerajinan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('505', '8977ecbb8cb82d77fb091c7a7f186163', '505'),
('ivan7', 'f09fc73b725e90ab2c85805988e68859', 'ivan7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kerajinan`
--

CREATE TABLE `data_kerajinan` (
  `id_ker` int(11) NOT NULL,
  `id_perindustrian` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `desa_kel` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `jenis_industri` varchar(100) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `tenaga_kerja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kerajinan`
--

INSERT INTO `data_kerajinan` (`id_ker`, `id_perindustrian`, `nama_perusahaan`, `nama_pemilik`, `desa_kel`, `kecamatan`, `jenis_industri`, `jenis_produk`, `tenaga_kerja`) VALUES
(60, 1, 'Tenun Ikat Hati Nurani', 'Olivia Rika', 'Kletek', 'Malaka Tengah', 'Ind. Kain Tenun', 'Kain Selendang', '15'),
(61, 1, 'Tenun Ikat Leki Malik', 'Emilia Y. Seran', 'Kletek', 'Malaka Tengah', 'Ind. Kain Tenun', 'Kain Selendang', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_perindustrian`
--

CREATE TABLE `d_perindustrian` (
  `id_perindustrian` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `d_perindustrian`
--

INSERT INTO `d_perindustrian` (`id_perindustrian`, `nama`) VALUES
(1, 'ATAMBUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_kerajinan`
--

CREATE TABLE `lokasi_kerajinan` (
  `id_kerajinan` int(11) NOT NULL,
  `id_perindustrian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `informasi` text NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_kerajinan`
--

INSERT INTO `lokasi_kerajinan` (`id_kerajinan`, `id_perindustrian`, `nama`, `informasi`, `longitude`, `latitude`, `foto`) VALUES
(1004, 1, 'xxx', '<p>zzzzzzzzzzzzz</p>', '2341342311111111', '-10.175244794263824', '137340583_4458558974160893_2055974245053598780_n.jpg'),
(1005, 1, 'fffffffffff', '<p>fffffffff</p>', '123.61126171375048', '-10.175244794263824', 'FB_IMG_15040494499822224-678x381.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_kerajinan`
--
ALTER TABLE `data_kerajinan`
  ADD PRIMARY KEY (`id_ker`),
  ADD KEY `id_kelurahan` (`id_perindustrian`);

--
-- Indexes for table `d_perindustrian`
--
ALTER TABLE `d_perindustrian`
  ADD PRIMARY KEY (`id_perindustrian`);

--
-- Indexes for table `lokasi_kerajinan`
--
ALTER TABLE `lokasi_kerajinan`
  ADD PRIMARY KEY (`id_kerajinan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kerajinan`
--
ALTER TABLE `data_kerajinan`
  MODIFY `id_ker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `d_perindustrian`
--
ALTER TABLE `d_perindustrian`
  MODIFY `id_perindustrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lokasi_kerajinan`
--
ALTER TABLE `lokasi_kerajinan`
  MODIFY `id_kerajinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kerajinan`
--
ALTER TABLE `data_kerajinan`
  ADD CONSTRAINT `data_kerajinan_ibfk_1` FOREIGN KEY (`id_perindustrian`) REFERENCES `d_perindustrian` (`id_perindustrian`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
