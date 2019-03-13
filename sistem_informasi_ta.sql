-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mar 2019 pada 12.09
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem informasi ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Nama` varchar(50) NOT NULL,
  `NIP/NRK` int(20) NOT NULL,
  `E-Mail` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Tingkatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Nama` varchar(50) NOT NULL,
  `NIP/NRK` int(20) NOT NULL,
  `Pembimbing Mahasiswa` varchar(50) NOT NULL,
  `Keahlian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul`
--

CREATE TABLE `judul` (
  `Nama` varchar(50) NOT NULL,
  `Nim` int(10) NOT NULL,
  `Judul TA` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nama` varchar(50) NOT NULL,
  `Nim` int(10) NOT NULL,
  `E-Mail` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Angkatan` int(5) NOT NULL,
  `Judul TA` varchar(50) NOT NULL,
  `Dosen Pembimbing` varchar(50) NOT NULL,
  `Tanggal Sidang` date NOT NULL,
  `Riwayat Bimbingan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `Nama` varchar(50) NOT NULL,
  `Nim` int(20) NOT NULL,
  `Angkatan` int(10) NOT NULL,
  `Program Studi` varchar(20) NOT NULL,
  `E-Mail` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Nama`,`NIP/NRK`,`E-Mail`,`Password`,`Tingkatan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Nama`,`NIP/NRK`,`Pembimbing Mahasiswa`,`Keahlian`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`Nama`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nama`,`Nim`,`Angkatan`,`E-Mail`,`Password`,`Dosen Pembimbing`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`Nama`,`Nim`,`Angkatan`,`Program Studi`,`E-Mail`,`Password`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
