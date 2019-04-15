-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Apr 2019 pada 12.10
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
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tingkatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `id_tingkatan`) VALUES
(8, 'Rajif Agung Yunmar, S.Kom., M.Cs.\r\n', 'Rajif Agung', 'rajifagung', 3),
(9, 'Raidah Hanifah, S.T., M.T.\r\n', 'Raidah Hanifah', 'raidahhanifah', 3),
(10, 'Imam EkoWicaksono, S.si., M.Si.\r\n', 'Imam Eko', 'imameko', 3),
(11, 'Ahmad Luky Ramdani, S.Komp., M.Kom.\r\n', 'Ahmad Luky', 'ahmadluky', 3),
(12, 'Amirul Iqbal, S.Kom., M,Eng\r\n', 'Amirul Iqbal', 'amiruliqbal', 3),
(13, 'Andika Setiawan, S.Kom., M.Cs.\r\n', 'Andika Setiawan', 'andikasetiawan', 3),
(14, 'Angga Wijaya, S.Si., M.Si.\r\n', 'Angga Wijaya', 'anggawijaya', 3),
(15, 'Arief Ichwani, S.Kom., M.Cs.\r\n', 'Arief Ichwani', 'ariefichwani', 3),
(16, 'Arkham Zahri Rakhman, S.Kom., M.Eng.\r\n', 'Arkham Zahri', 'arkhamzahri', 3),
(17, 'Hafiz Budi Firmansyah, S.Kom., M.Sc.\r\n', 'Hafiz Budi', 'hafizbudi', 3),
(18, 'Hartanto Tantriawan, S.Kom., M.Kom\r\n', 'Hartanto Tantriawan', 'hartanto', 3),
(19, 'I Wayan Wiprayoga Wisesa, S.Kom., M.Kom\r\n', 'Wiprayoga Wisesa', 'iwawiwi', 3),
(20, 'Martin  C.T. Manullang, S.T., M.T.\r\n', 'Martin', 'martin', 1),
(21, 'Mohamad Idris, S.Si., M.Sc.\r\n', 'Mohammad Idris', 'mohammadidris', 3),
(22, 'Rahman Indra Kesuma, S.Kom., M.Cs.\r\n', 'Rahman Indra', 'rahmanindra', 3),
(23, 'Randi Farmana Putra, S.Si., M.Si\r\n', 'Randi Farmana', 'randifarmana', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `beban` int(50) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nip`, `email`, `keterangan`, `beban`, `foto`) VALUES
(0, 'Adimas Sutanto', '14116028', 'Adimassutanto8@gmail.com', 'asdasdasdasd', 5, ''),
(0, 'Ahmad Luky Ramdani, S.Komp., M.Kom.\r\n', '19880424 2016 1033', 'ahmadluky@if.itera.ac.id\r\n', 'Data Mining\r\n', 0, ''),
(0, 'Amirul Iqbal, S.Kom., M,Eng\r\n', '19910802 2018 1106', 'amirul.iqbal@if.itera.ac.id\r\n', 'Rekayasa Perangkat Lunak\r\n', 0, ''),
(0, 'Andika Setiawan, S.Kom., M.Cs.\r\n', '19911127 2018 1158', 'andika.setiawan@if.itera.ac.id\r\n', 'Rekayasa Perangkat Lunak\r\n', 0, ''),
(0, 'Angga Wijaya, S.Si., M.Si.\r\n', '19920508 2018 1098', 'angga.wijaya@if.itera.ac.id\r\n', 'Kecerdasan Buatan\r\n', 0, ''),
(0, 'Arief Ichwani, S.Kom., M.Cs.\r\n', '19900811 2018 1123', 'arief.ichwani@if.itera.ac.id\r\n', 'Rekayasa Perangkat Lunak\r\n', 0, ''),
(0, 'Arkham Zahri Rakhman, S.Kom., M.Eng.\r\n', '19900404 2016 1034', 'arkham@if.itera.ac.id\r\n', 'Sensor & Embedded System\r\n', 0, ''),
(0, 'Hafiz Budi Firmansyah, S.Kom., M.Sc.\r\n', '19910824 2017 1048', 'hafiz.budi@if.itera.ac.id\r\n', 'Rekayasa Perangkat Lunak\r\n', 0, ''),
(0, 'Hartanto Tantriawan, S.Kom., M.Kom\r\n', '19920522 2018 1107', 'hartanto.tantriawan@if.itera.ac.id\r\n', 'Data Mining\r\n', 0, ''),
(0, 'I Wayan Wiprayoga Wisesa, S.Kom., M.Kom\r\n', '19890322 2017 1071', 'wayan.wisesa@if.itera.ac.id\r\n', 'Embedded System & Mobile\r\n', 0, ''),
(0, 'Imam EkoWicaksono, S.si., M.Si.\r\n', '19890517 2017 1064', 'imam.wicaksono@if.itera.ac.id\r\n', 'Kecerdasan Buatan\r\n', 0, ''),
(0, 'Martin  C.T. Manullang, S.T., M.T.\r\n', '19930109 2018 1157', 'martin.manullang@if.itera.ac.id\r\n', 'Embedded System & Mobile\r\n', 0, ''),
(0, 'Mohamad Idris, S.Si., M.Sc.\r\n', '19861010 2018 1121', 'mohammad.idris@if.itera.ac.id\r\n', 'Kecerdasan Buatan\r\n', 0, ''),
(0, 'Rahman Indra Kesuma, S.Kom., M.Cs.\r\n', '19910530 2016 1035', 'rahman.indra@if.itera.ac.id\r\n', 'Kecerdasan Buatan\r\n', 0, ''),
(0, 'Raidah Hanifah, S.T., M.T.\r\n', '19890415 2015 04 2006', 'raidah.hanifah@if.itera.ac.id\r\n', 'Data Mining\r\n', 0, ''),
(0, 'Rajif Agung Yunmar, S.Kom., M.Cs.\r\n', '0', 'rajiva@if.itera.ac.id\r\n', 'Jaringan Komputer\r\n', 0, ''),
(0, 'Randi Farmana Putra, S.Si., M.Si\r\n', '19881125 2018 1120', 'randi.putra@if.itera.ac.id\r\n', 'Embedded System & Mobile\r\n', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_seminar` date DEFAULT NULL,
  `tgl_sidang` date DEFAULT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama`, `username`, `password`, `email`, `angkatan`, `id_dosen`, `nim`, `tgl_daftar`, `tgl_seminar`, `tgl_sidang`, `foto`) VALUES
(14115001, 'Ilham Prayudha\r\n', 'Ilham Prayudha', 'Ilham.14115001', 'ilham.14115001@student.itera.ac.id', 2015, 0, 14115001, NULL, NULL, NULL, ''),
(14115005, 'Muhammad Sholeh Al-Habib', 'Habib', 'Muhammad.14115005', 'muhammad.14115005@student.itera.ac.id', 2015, 0, 14115005, NULL, NULL, NULL, ''),
(14115011, 'Putra Abi Akbarjune\r\n', 'Putra Abi', 'Putra.14115011', 'putra.14115011@student.itera.ac.id', 2015, 0, 14115011, NULL, NULL, NULL, ''),
(14115016, 'Irfan Gerard Wicaksono Mokalu\r\n', 'Irfan Gerard', 'Irfan.14115016', 'irfan.14115016@student.itera.ac.id', 2015, 0, 14115016, NULL, NULL, NULL, ''),
(14115021, 'Afrizal Sofyan Afaandi\r\n', 'Afrizal Sofyan', 'Afrizal.14115021', 'afrizal.14115021@student.itera.ac.id', 2015, 0, 14115021, NULL, NULL, NULL, ''),
(14115022, 'Gisella Al Khumaira\r\n', 'Gisella Al', 'Gisella.14115022', 'gisella.14115022@satudent.itera.ac.id', 2015, 0, 14115022, NULL, NULL, NULL, ''),
(14115023, 'Mega Putri Sinaga\r\n', 'Mega Putri', 'Mega.14115023', 'mega.14115023@student.itera.ac.id', 2015, 0, 14115023, NULL, NULL, NULL, ''),
(14115024, 'Jonathan Eprilio Soaduon Simanjuntak', 'Jonathan Eprilio', 'Jonathan.14115024', 'jonathan.14115024@student.itera.ac.id', 2015, 0, 14115024, NULL, NULL, NULL, ''),
(14115028, 'M.Kamaludin akbar\r\n', 'M.Kamaludin', 'Kamaludin.14115028', 'kamaludin.14115028@student.itera.ac.id', 2015, 0, 14115028, NULL, NULL, NULL, ''),
(14115029, 'Tobi Santoso\r\n', 'Tobi Santoso', 'Tobi.14115029', 'tobi.14115029@student.itera.ac.id', 2015, 0, 14115029, NULL, NULL, NULL, ''),
(14115035, 'Ningsih Nababan\r\n', 'Ningsih Nababan', 'Ningsih.14115035', 'ningsih.14115035@student.itera.ac.id', 2015, 0, 14115035, NULL, NULL, NULL, ''),
(14115041, 'Agis Tri Wahyuji\r\n', 'Agis Tri', 'Agis.14115041', 'agis.1411504@student.itera.ac.id', 2015, 0, 14115041, NULL, NULL, NULL, ''),
(14115044, 'Nurma Syanti\r\n', 'Nurma Syanti', 'Nurma.14115044', 'nurma.14115044@student.itera.ac.id', 2015, 0, 14115044, NULL, NULL, NULL, ''),
(14115045, 'Dimas Galih Sindhutama\r\n', 'Dimas Galih', 'Dimas.14115045', 'dimas.14115045@student.itera.ac.id', 2015, 0, 14115045, NULL, NULL, NULL, ''),
(14115049, 'Fardiansyah S.Harahap\r\n', 'Fardiansyah', 'Fardiansyah.14115049', 'fardiansyah.14115049@student.itera.ac.id', 2015, 0, 14115049, NULL, NULL, NULL, ''),
(14115052, 'Ilham Perdana Kesuma\r\n', 'Ilham Perdana', 'Ilham.14115052', 'ilham.14115052@student.itera.ac.id', 2015, 0, 14115052, NULL, NULL, NULL, ''),
(14115053, 'Sulaiman Osman\r\n', 'Sulaiman Osman', 'Sulaiman.14115053', 'sulaiman.14115053@sudent.itera.ac.id', 2015, 0, 14115053, NULL, NULL, NULL, ''),
(14115059, 'Ahmad Rizqi Abdullah Nywitadi\r\n', 'Ahmad Rizqi', 'Ahmad.14115059', 'ahmad.14115059@student.itera.ac.id', 2015, 0, 14115059, NULL, NULL, NULL, ''),
(14115060, 'Jepri Pranata Ginting\r\n', 'Jepri Pranata', 'Jepri.14115060', 'jepri.14115060@student.itera.ac.id', 2015, 0, 14115060, NULL, NULL, NULL, ''),
(14115062, 'Ari Bambang Kurniawan\r\n', 'Ari Bambang', 'Ari.14115062', 'ari.14115062@student.itera.ac.id', 2015, 0, 14115062, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`) VALUES
(1, 'Kordinator TA'),
(2, 'Sekertaris Kordinator TA'),
(3, 'Dosen Pembimbing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nama_dosen`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id_tingkatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14115063;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
