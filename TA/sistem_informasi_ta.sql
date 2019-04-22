-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:44 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tingkatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `id_tingkatan`) VALUES
(7, 'Adimas Sutanto', 'adimas8', '447c3c30d18d941cd608ea687ea3a5045895b291', 1),
(8, 'Annisa Gita', 'gita8', '7c222fb2927d828af22f592134e8932480637c0d', 2),
(9, 'First Blood', 'first8', '7c222fb2927d828af22f592134e8932480637c0d', 3);

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_dospem1` int(11) NOT NULL,
  `id_dospem2` int(11) NOT NULL,
  `id_dosen_wali` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_seminar` datetime DEFAULT NULL,
  `tgl_sidang` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `id_mhs`, `id_dospem1`, `id_dospem2`, `id_dosen_wali`, `judul`, `tgl_daftar`, `tgl_seminar`, `tgl_sidang`, `status`) VALUES
(2, 23, 1, 12, 9, 'Rancang Bangun Sistem Informasi Monitoring Ketinggian Pasang Surut Permukaan Air Laut secara Realtime dengan Tide Gauge Berbasis IoT', '2019-04-02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbing_1`
--

CREATE TABLE `dosen_pembimbing_1` (
  `id_dospem1` int(11) NOT NULL,
  `nama_dospem` varchar(100) NOT NULL,
  `nip` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `beban` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_pembimbing_1`
--

INSERT INTO `dosen_pembimbing_1` (`id_dospem1`, `nama_dospem`, `nip`, `email`, `keterangan`, `beban`, `foto`) VALUES
(1, 'Rajif Agung Yunmar, S.Kom., M.Cs.', '19880309 2015 04 1002', 'rajiva@if.itera.ac.id', '(Jaringan Komputer)<br>\r\nS1 – STMIK AMIKOM Yogyakarta<br>\r\nS2 – Universitas Gadjah Mada', 5, 'rajif.png');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbing_2`
--

CREATE TABLE `dosen_pembimbing_2` (
  `id_dospem2` int(11) NOT NULL,
  `nama_dospem` varchar(100) NOT NULL,
  `nip` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `beban` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_pembimbing_2`
--

INSERT INTO `dosen_pembimbing_2` (`id_dospem2`, `nama_dospem`, `nip`, `email`, `keterangan`, `beban`, `foto`) VALUES
(2, 'Imam Ekowicaksono, S.Si., M.Si', '19890517 2017 1064', 'imam.wicaksono@if.itera.ac.id', 'Sekretaris Program Studi<br>\r\n(Kecerdasan Buatan)<br>\r\nS1 – Institut Pertanian Bogor<br>\r\nS2 – Institut Pertanian Bogor', 2, 'imam.png'),
(3, 'Raidah Hanifah, S.T., M.T.', ' 19890415 2015 04 2006', 'raidah.hanifah@if.itera.ac.id', '(Data Mining)<br>\r\nS1 – Universitas Diponegoro<br>\r\nS2 – Insitut Teknologi Bandung', 2, 'nana.png'),
(4, 'Ahmad Luky Ramdani, S.Komp., M.Kom.', '19880424 2016 1033', 'ahmadluky@if.itera.ac.id', '(Data mining)<br>\r\nS1 – Institut Pertanian Bogor<br>\r\nS2 – Institut Pertanian Bogor', 1, 'luky.png'),
(5, 'Arkham Zahri Rakhman, S.Kom., M.Eng.', '19900404 2016 1034', 'arkham@if.itera.ac.id', '(Sensor & Embedded System)<br>\r\nS1 – Universitas Islam Indonesia<br>\r\nS2 – Universitas Gadjah Mada', 2, 'arkham.png'),
(6, 'Rahman Indra Kesuma, S.Kom., M.Cs.', '19910530 2016 1035', 'rahman.indra@if.itera.ac.id', '(Kecerdasan Buatan)<br>\r\nS1 – Universitas Lampung<br>\r\nS2 – Universitas Gadjah Mada', 2, 'indra.png'),
(7, 'Hafiz Budi Firmansyah, S.Kom., M.Sc.', '19910824 2017 1048', 'hafiz.budi@if.itera.ac.id', '(Rekayasa Perangkat Lunak)<br>\r\nS1 – Universitas Gadjah Mada<br>\r\nS2 – University of Paris 7, Prancis', 1, 'hbf.png'),
(8, 'I Wayan Wiprayoga W, S.Kom., M.Kom', '19890322 2017 1071', 'wayan.wisesa@if.itera.ac.id', '(Embedded System & Mobile)<br>\r\nS1 – Universitas Indonesia<br>\r\nS2 – Universitas Indonesia', 1, 'yoga.png'),
(9, 'Angga Wijaya, S.Si., M.Si.', '19920508 2018 1098', 'angga.wijaya@if.itera.ac.id', '(Kecerdasan Buatan)<br>\r\nS1 – Universitas Lampung<br>\r\nS2 – Institut Teknologi Bandung', 2, 'angga.png'),
(10, 'Amirul Iqbal, S.Kom., M.Eng', '19910802 2018 1106', 'amirul.iqbal@if.itera.ac.id', '(Rekayasa Perangkat Lunak)<br>\r\nS1 – Universitas Islam Indonesia<br>\r\nS2 – Universitas Gadjah Mada', 1, 'iqbal.png'),
(11, 'Hartanto Tantriawan, S.Kom., M.Kom', '19920522 2018 1107', 'hartanto.tantriawan@if.itera.ac.id', '(Data Mining)<br>\r\nS1 – Universitas Lampung<br>\r\nS2 – Institut Pertanian Bogor', 2, 'tanto.png'),
(12, 'Randi Farmana Putra, S.Si., M.Si.', '19881125 2018 1120', 'randi.putra@if.itera.ac.id', '(Embedded System & Mobile)<br>\r\nS1 – Institut Teknologi Bandung<br>\r\nS2 – Institut Teknologi Bandung', 1, 'randi.png'),
(13, 'Mohamad Idris, S.Si., M.Sc.', '19861010 2018 1121', 'mohamad.idris@if.itera.ac.id', '(Kecerdasan Buatan)<br>\r\nS1 – Universitas Udayana<br>\r\nS2 – Universitas Gadjah Mada', 1, 'idris.png'),
(14, 'Arief Ichwani, S.Kom., M.Cs.', '19900811 2018 1123', 'arief.ichwani@if.itera.ac.id', '(Rekayasa Perangkat Lunak)<br>\r\nS1 – Universitas Jenderal Soedirman<br>\r\nS2 – Universitas Gadjah Mada', 1, 'arif.png'),
(15, 'Martin C.T. Manullang, S.T., M.T.', '19930109 2018 1157', 'martin.manullang@if.itera.ac.id', '(Embedded System & Mobile)<br>\r\nS1 – Universitas Diponegoro<br>\r\nS2 – Institut Teknologi Bandung', 1, 'martin.png'),
(16, 'Andika Setiawan, S.Kom., M.Cs.', '19911127 2018 1158', 'andika.setiawan@if.itera.ac.id', '(Rekayasa Perangkat Lunak)<br>\r\nS1 – Universitas Sebelas Maret<br>\r\nS2 – Universitas Gadjah Mada', 1, 'dika.png');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_wali`
--

CREATE TABLE `dosen_wali` (
  `id_dosen_wali` int(11) NOT NULL,
  `nama_dosen_wali` varchar(100) NOT NULL,
  `nip` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_wali`
--

INSERT INTO `dosen_wali` (`id_dosen_wali`, `nama_dosen_wali`, `nip`, `email`, `keterangan`, `foto`) VALUES
(3, 'Ahmad Luky Ramdani, S.Komp., M.Kom.', '19880424', 'ahmadluky@if.itera.ac.id', '(Data mining)\r\n<br>\r\nS1 – Institut Pertanian Bogor\r\nS2 – Institut Pertanian Bogor', 'luky.png'),
(4, 'Amirul Iqbal, S.Kom., M,Eng', '19910802', 'amirul.iqbal@if.itera.ac.id', '(Rekayasa Perangkat Lunak)\r\n<br>\r\nS1 – Universitas Islam Indonesia\r\nS2 – Universitas Gadjah Mada', 'iqbal.png'),
(5, 'Andika Setiawan, S.Kom., M.Cs.', '19911127', 'andika.setiawan@if.itera.ac.id', '(Rekayasa Perangkat Lunak)\r\n<br>\r\nS1 – Universitas Sebelas Maret<br>\r\nS2 – Universitas Gadjah Mada', 'dika.png'),
(6, 'Angga Wijaya, S.Si., M.Si.', '19920508', 'angga.wijaya@if.itera.ac.id', 'Kecerdasan Buatan\r\n', 'angga.png'),
(7, 'Arief Ichwani, S.Kom., M.Cs.', '19900811', 'arief.ichwani@if.itera.ac.id', 'Rekayasa Perangkat Lunak\r\n', 'arif.png'),
(8, 'Arkham Zahri Rakhman, S.Kom., M.Eng.', '19900404', 'arkham@if.itera.ac.id', 'Sensor & Embedded System\r\n', 'arkham.png'),
(9, 'Hafiz Budi Firmansyah, S.Kom., M.Sc.', '19910824', 'hafiz.budi@if.itera.ac.id', 'Rekayasa Perangkat Lunak\r\n', 'hbf.png'),
(10, 'Hartanto Tantriawan, S.Kom., M.Kom', '19920522', 'hartanto.tantriawan@if.itera.ac.id', 'Data Mining\r\n', 'tanto.png'),
(11, 'I Wayan Wiprayoga Wisesa, S.Kom., M.Kom', '19890322', 'wayan.wisesa@if.itera.ac.id', 'Embedded System & Mobile\r\n', 'yoga.png'),
(12, 'Imam EkoWicaksono, S.si., M.Si.', '19890517', 'imam.wicaksono@if.itera.ac.id', 'Kecerdasan Buatan\r\n', 'imam.png'),
(13, 'Martin  C.T. Manullang, S.T., M.T.', '19930109', 'martin.manullang@if.itera.ac.id', 'Embedded System & Mobile\r\n', 'martin.png'),
(14, 'Mohamad Idris, S.Si., M.Sc.', '19861010 2018 1121', 'mohammad.idris@if.itera.ac.id', 'Kecerdasan Buatan\r\n', 'idris.png'),
(15, 'Rahman Indra Kesuma, S.Kom., M.Cs.', '19910530', 'rahman.indra@if.itera.ac.id', 'Kecerdasan Buatan\r\n', 'indra.png'),
(16, 'Raidah Hanifah, S.T., M.T.', '19890415', 'raidah.hanifah@if.itera.ac.id', 'Data Mining\r\n', 'nana.png'),
(17, 'Rajif Agung Yunmar, S.Kom., M.Cs.', '19880309', 'rajiva@if.itera.ac.id', 'Jaringan Komputer\r\n', 'rajif.png'),
(18, 'Randi Farmana Putra, S.Si., M.Si', '19881125', 'randi.putra@if.itera.ac.id', 'Embedded System & Mobile\r\n', 'randi.png'),
(19, 'Dr. Masayu Leylia Khodra, S.T., M.T.', '197604292008122001', 'masayu@informatika.org', '(Kecerdasan Buatan)\r\n<br>\r\nS1 – Institut Teknologi Bandung<br>\r\nS2 – Institut Teknologi Bandung<br>\r\nS3 – Institut Teknologi Bandung', 'masayu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `id_dosen_wali` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `id_tingkatan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `username`, `password`, `email`, `angkatan`, `id_dosen_wali`, `nim`, `foto`, `id_tingkatan`) VALUES
(4, 'Ilham Prayudha', 'ilham.14115001', '59c87c8cba4f3b7425ad133d414575463fc3637a', 'ilham.14115001@student.itera.ac.id', 2015, 0, 14115001, '', 4),
(5, 'Muhammad Sholeh Al-Habib', 'muhammad.14115005', 'afc3815226494d4b3a03b2e6765a7a61d964e6b0', 'muhammad.14115005@student.itera.ac.id', 2015, 0, 14115005, '', 4),
(6, 'Putra Abi Akbarjune', 'putra.14116028', '0bece8b68ee01bc90839bbbca2962f5ddde96478', 'putra.14115011@student.itera.ac.id', 2015, 0, 14115011, '', 4),
(7, 'Irfan Gerard Wicaksono Mokalu', 'irfan.14115016', 'da06f00025e7bff1aa00542c893b75568508f1fb', 'irfan.14115016@student.itera.ac.id', 2015, 0, 14115016, '', 4),
(8, 'Afrizal Sofyan Afaandi', 'afrizal.14115021', 'acc2cf9533b70b45aedacf06ec0be58f984a6461', 'afrizal.14115021@student.itera.ac.id', 2015, 0, 14115021, '', 4),
(9, 'Gisella Al Khumaira', 'gisella.14115022', '23e7f6f15929995b2e97d83017edf888965548b2', 'gisella.14115022@satudent.itera.ac.id', 2015, 0, 14115022, '', 4),
(10, 'Mega Putri Sinaga', 'mega.14115023', 'b24c5f4c86212b0ae2d5becb05452663985e40f8', 'mega.14115023@student.itera.ac.id', 2015, 0, 14115023, '', 4),
(11, 'Jonathan Eprilio Soaduon Simanjuntak', 'jonathan.14115024', 'd172ae60adffa396e5e4e6a7df3c4e29ece3d475', 'jonathan.14115024@student.itera.ac.id', 2015, 0, 14115024, '', 4),
(12, 'M.Kamaludin akbar', 'kamaludin.14115028', '727abc93aeb13f54b2d44878895a4bd169bb9f55', 'kamaludin.14115028@student.itera.ac.id', 2015, 0, 14115028, '', 4),
(13, 'Tobi Santoso', 'tobi.14115029', 'd3ff6178be54850510601e93e9f72691a008f825', 'tobi.14115029@student.itera.ac.id', 2015, 0, 14115029, '', 4),
(14, 'Ningsih Nababan', 'ningsih.14115035', 'b0203c61b3b8a9175a8120dd7a3bc821a512db96', 'ningsih.14115035@student.itera.ac.id', 2015, 0, 14115035, '', 4),
(15, 'Agis Tri Wahyuji', 'agis.1411504', 'd6f86a4365d23cb593c450a2c5eed59e537960b4', 'agis.1411504@student.itera.ac.id', 2015, 0, 14115041, '', 4),
(16, 'Nurma Syanti', 'nurma.14115044', '65a8dc3a1d09ed2483bd85fef400a71b29037f83', 'nurma.14115044@student.itera.ac.id', 2015, 0, 14115044, '', 4),
(17, 'Dimas Galih Sindhutama', 'dimas.14115045', '7a8a11333a69026f7a71b367a74f1ff9aafd990c', 'dimas.14115045@student.itera.ac.id', 2015, 0, 14115045, '', 4),
(18, 'Fardiansyah S.Harahap', 'fardiansyah.14115049', 'b3a06e3baf64ea266b717d438417dfdac9f21c94', 'fardiansyah.14115049@student.itera.ac.id', 2015, 0, 14115049, '', 4),
(19, 'Ilham Perdana Kesuma', 'ilham.14115052', 'cbcd96fde6ae675567820b129803b9e1c0630240', 'ilham.14115052@student.itera.ac.id', 2015, 0, 14115052, '', 4),
(20, 'Sulaiman Osman', 'sulaiman.14115053', '739917ea48919ab927e30b36dd4a3ca555f273a7', 'sulaiman.14115053@sudent.itera.ac.id', 2015, 0, 14115053, '', 4),
(21, 'Ahmad Rizqi Abdullah Nywitadi', 'ahmad.14115059', 'aa122699983c7bc33574fedad77b50f56cdba529', 'ahmad.14115059@student.itera.ac.id', 2015, 0, 14115059, '', 4),
(22, 'Jepri Pranata Ginting', 'jepri.14115060', '9ca54afc2a0782196adb11f470acf5202d5fdd1a', 'jepri.14115060@student.itera.ac.id', 2015, 0, 14115060, '', 4),
(23, 'Ari Bambang Kurniawan', 'ari.14115062', 'd8c1e08f7a0a4647395152cd1ece5dd0257c78db', 'ari.14115062@student.itera.ac.id', 2015, 19, 14115062, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `isi_syarat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`) VALUES
(1, 'Kordinator TA'),
(2, 'Sekertaris Kordinator TA'),
(3, 'Dosen Pembimbing'),
(4, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `dosen_pembimbing_1`
--
ALTER TABLE `dosen_pembimbing_1`
  ADD PRIMARY KEY (`id_dospem1`);

--
-- Indexes for table `dosen_pembimbing_2`
--
ALTER TABLE `dosen_pembimbing_2`
  ADD PRIMARY KEY (`id_dospem2`);

--
-- Indexes for table `dosen_wali`
--
ALTER TABLE `dosen_wali`
  ADD PRIMARY KEY (`id_dosen_wali`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

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
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen_pembimbing_1`
--
ALTER TABLE `dosen_pembimbing_1`
  MODIFY `id_dospem1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen_pembimbing_2`
--
ALTER TABLE `dosen_pembimbing_2`
  MODIFY `id_dospem2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dosen_wali`
--
ALTER TABLE `dosen_wali`
  MODIFY `id_dosen_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
