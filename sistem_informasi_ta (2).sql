-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2019 pada 09.00
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
  `NIP/NRK` int(50) NOT NULL,
  `E-Mail` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Tingkatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Nama`, `NIP/NRK`, `E-Mail`, `Password`, `Tingkatan`) VALUES
('Ahmad Luky Ramdani, S.Komp., M.Kom.', 0, 'ahmadluky@if.itera.ac.id', 'luky.ahmad', 0),
('Amirul Iqbal, S.Kom., M,Eng', 0, 'amirul.iqbal@if.itera.ac.id', 'iqbal.amirul', 0),
('Andika Setiawan, S.Kom., M.Cs.', 0, 'andika.setiawan@if.itera.ac.id', 'setiawan.andika', 0),
('Angga Wijaya, S.Si., M.Si.', 0, 'angga.wijaya@if.itera.ac.id', 'wijaya.angga', 0),
('Arief Ichwani, S.Kom., M.Cs.', 0, 'arief.ichwani@if.itera.ac.id', 'ichwani.arief', 0),
('Arkham Zahri Rakhman, S.Kom., M.Eng.', 0, 'arkham@if.itera.ac.id', 'arkham', 0),
('Hafiz Budi Firmansyah, S.Kom., M.Sc.', 0, 'hafiz.budi@if.itera.ac.id', 'budi.hafiz', 0),
('Hartanto Tantriawan, S.Kom., M.Kom', 0, 'hartanto.tantriawan@if.itera.ac.id', 'tantriawan.hartanto', 0),
('I Wayan Wiprayoga Wisesa, S.Kom., M.Kom', 0, 'wayan.wisesa@if.itera.ac.id', 'wisesa.wayan', 0),
('Imam EkoWicaksono, S.si., M.Si.', 0, 'imam.wicaksono@if.itera.ac.id', 'wicaksono.imam', 0),
('Martin  C.T. Manullang, S.T., M.T.', 0, 'martin.manullang@if.itera.ac.id', 'manullang.martin', 0),
('Mohamad Idris, S.Si., M.Sc.', 0, 'mohammad.idris@if.itera.ac.id', 'idris.mohammad', 0),
('Rahman Indra Kesuma, S.Kom., M.Cs.', 0, 'rahman.indra@if.itera.ac.id', 'indra.rahman', 0),
('Raidah Hanifah, S.T., M.T.', 0, 'raidah.hanifah@if.itera.ac.id', 'hanifah.raidah', 0),
('Rajif Agung Yunmar, S.Kom., M.Cs.', 0, 'rajiva@if.itera.ac.id', 'rajiva', 0),
('Randi Farmana Putra, S.Si., M.Si', 0, 'randi.putra@if.itera.ac.id', 'putra.randi', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen pembimbing`
--

CREATE TABLE `dosen pembimbing` (
  `NIP/NRK` int(20) NOT NULL,
  `Nim` int(11) NOT NULL
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
  `E-Mail` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Angkatan` int(5) NOT NULL,
  `Judul TA` varchar(50) NOT NULL,
  `Dosen Pembimbing` varchar(50) NOT NULL,
  `Tanggal Sidang` date NOT NULL,
  `Riwayat Bimbingan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nama`, `Nim`, `E-Mail`, `Password`, `Angkatan`, `Judul TA`, `Dosen Pembimbing`, `Tanggal Sidang`, `Riwayat Bimbingan`) VALUES
('Afrizal Sofyan Afaandi', 14115021, 'Afaandi.14115021@student.itera.ac.id', 'Afaandi.14115021', 2015, '', '', '0000-00-00', ''),
('Agis Tri Wahyuji', 14115041, 'Wahyuji.14115041@student.itera.ac.id', 'Wahyuji.14115041', 2015, '', '', '0000-00-00', ''),
('Ahmad Rizqi Abdullah Nywitadi', 14115059, 'Nywitadi.14115059@student.itera.ac.id', 'Nywitadi.14115059', 2015, '', '', '0000-00-00', ''),
('Ari Bambang Kurniawan', 14115062, 'Kurniawan.14115062@student.itera.ac.id', 'Kurniawan.14115062', 2015, '', '', '0000-00-00', ''),
('Dimas Galih Sindhutama', 14115045, 'Sindhutama.14115045@student.itera.ac.id', 'Sindhutama,14115045', 2015, '', '', '0000-00-00', ''),
('Fardiansyah S.Harahap', 14115049, 'Harahap.14115049@student.itera.ac.id', 'Harahap.14115049', 2015, '', '', '0000-00-00', ''),
('Gisella Al Khumaira', 14115022, 'Khumaira.14115022@student.itera.ac.id', 'Khumaira.14115022', 2015, '', '', '0000-00-00', ''),
('Ilham Perdana Kesuma', 14115052, 'Kesuma.14115052@student.itera.ac.id', 'Kesuma.14115052', 2015, '', '', '0000-00-00', ''),
('Ilham Prayudha', 14115001, 'prayudha.14115001@sttudent.itera.ac.id', 'prayudha.14115001', 2015, '', '', '0000-00-00', ''),
('Irfan Gerard Wicaksono Mokalu', 14115016, 'Mokalu.14115016@student.itera.ac.id', 'Mokalu.14115016', 2015, '', '', '0000-00-00', ''),
('Jepri Pranata Ginting', 14115060, 'Ginting.14115060@student.itera.ac.id', 'Ginting.14115060', 2015, '', '', '0000-00-00', ''),
('Jonathan Eprilio Soaduon Simanjuntak', 14115024, 'Simanjuntak.14115024@student.itera.ac.id', 'Simanjuntak.14115024', 2015, '', '', '0000-00-00', ''),
('M.Kamaludin Akbar', 14115028, 'Akbar.14115028@student.itera.ac.id', 'Akbar.14115028', 2015, '', '', '0000-00-00', ''),
('Mega Putri Sinaga', 14115023, 'Sinaga.14115023@student.itera.ac.id', 'Sinaga.14115023', 2015, '', '', '0000-00-00', ''),
('Muhammad Sholeh Al-Habib', 14115005, 'Habib.14115005@student.itera.ac.id', 'Habib.14115005', 2015, '', '', '0000-00-00', ''),
('Ningsih Nababan', 14115035, 'Nababan.14115035@student.itera.ac.id', 'Nababan.14115035', 2015, '', '', '0000-00-00', ''),
('Nurma Syanti', 14115044, 'Syanti.14115044@student.itera.ac.id', 'Syanti.14115044', 2015, '', '', '0000-00-00', ''),
('Putra Abi Akbarjune', 14115011, 'Akbarjune.14115011@student.itera.ac.id', 'Akbarjune.14115011', 2015, '', '', '0000-00-00', ''),
('Sulaiman Osman', 14115053, 'Osman.14115053@student.itera.ac.id', 'Osman.14115053', 2015, '', '', '0000-00-00', ''),
('Tobi Santoso', 14115029, 'Santosos.14115029@student.itera.ac.id', 'Santoso.14115029', 2015, '', '', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Nama`,`NIP/NRK`,`E-Mail`,`Password`,`Tingkatan`);

--
-- Indexes for table `dosen pembimbing`
--
ALTER TABLE `dosen pembimbing`
  ADD PRIMARY KEY (`NIP/NRK`,`Nim`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
