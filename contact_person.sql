-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 06:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_person`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kodeAkun` varchar(5) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `namaAkun` varchar(255) NOT NULL,
  `alamatAkun` varchar(255) NOT NULL,
  `tlpnAkun` varchar(20) NOT NULL,
  `emailAkun` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL,
  `fotoAkun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kodeAkun`, `pass`, `namaAkun`, `alamatAkun`, `tlpnAkun`, `emailAkun`, `status`, `fotoAkun`) VALUES
('11247', '81dc9bdb52d04dc20036dbd8313ed055', 'ucayan', 'ucay', '085529212252', 'ucayan@yahoo.com', 'mahasiswa', '497124675_Alfian Mahendra Ifandia.jpg'),
('47739', 'ab37ef761177c0aeb730e1d10cbced5c', 'Sony Adi Adriko', 'jalan tambak asri no 25', '085850319392', 'sonyadiadriko@gmail.com', 'mahasiswa', '609181666_');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `idKontak` varchar(5) NOT NULL,
  `kodeAkun` varchar(5) DEFAULT NULL,
  `namaKontak` varchar(255) NOT NULL,
  `alamatKontak` varchar(255) NOT NULL,
  `tlpKontak` varchar(20) NOT NULL,
  `emailKontak` varchar(30) NOT NULL,
  `fotoKontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`idKontak`, `kodeAkun`, `namaKontak`, `alamatKontak`, `tlpKontak`, `emailKontak`, `fotoKontak`) VALUES
('11', '47739', 'Ravi Vadra Addani', 'jalan sidotopo wetan gg2 no 55', '081321967083', 'ravivadra@gmail.com', '1202583544_Ravi.jpg'),
('12', '47739', 'Issac Ronggo', 'jln sememi baru 5 no 78', '085693859209', 'issacronggo_9@gmail.com', '915512995_Isaac Ronggo.jpg'),
('13', '47739', 'Sandy Hendrawan', 'Jalan beringin klakah rejo', '085646029949', 'sandy_hendrawan@gmail.com', '775122351_Sandy Hendrawan.jpg'),
('14', '47739', 'Ilham Hafidin', 'jalan ikan kerapuh', '082257318312', 'ilham_hafidin@gmail.com', '1451361291_Ilham.jpg'),
('15', '47739', 'Kasyafa Iwang', 'jalan simo pomahan no 8', '085785228376', 'iwangkasyafa1@gmail.com', '1798335052_Kasyafa Iwang Atmaja.jpg'),
('16', '47739', 'rizky dwi', 'jalan simo kalangan', '081259182338', 'rizkidwia@gmail.com', '769614600_Sapulekku.jpg'),
('17', '47739', 'Fadillah Rachmawati', 'jln banjarsugihan 2/4', '083117916409', 'fadilah_rachma@gmail.com', '436943081_Fadillah Rachmawati.jpg'),
('18834', '47739', 'Ainul Yaqin', 'Jalan Randu Barat 6/10', '082264854113', 'ainul.y9b@gmail.com', '1092541759_Muhammad Ainul Yaqin.jpg'),
('19', '47739', 'samudra setiawan', 'menganti satelit indah', '081357669671', 'samudrasetiawan@gmail.com', '1228639045_Samudera Setiawan.jpg'),
('20', '47739', 'ikhya ulumudin', 'jalan dupak bangunsari II', '0895631651536', 'ikhya_ulum@gmail.com', '1380799400_Ikhya Ullummudin.jpg'),
('21', '47739', 'Alfian Mahendra', 'jalan kedung doro', '08813298463', 'alfianmahendrai@gmail.com', '537722482_Alfian Mahendra Ifandia.jpg'),
('22', '47739', 'Ahmadin Kasyfur', 'jln tenggumung baru indah II', '089613163311', 'ahmadin_k4@gmail.com', '798605888_Ahmadin Kasyfur.jpg'),
('23', '47739', 'Vivinia Bella', 'jln manukan telaga', '085607620932', 'viviniabella@gmail.com', '1604513187_Vivinia Bella.jpg'),
('24', '47739', 'Muhammad Fauzan', 'jln sidotopo wetan gang II', '083849575737', 'fauzan_wid@gmail.com', '1479540294_Fauzan.jpg'),
('25', '47739', 'Shafa Tharsa', 'jln wonorejo III', '0895803231329', 'shafath@gmail.com', '1964794830_Shafa.jpg'),
('26', '47739', 'Muhammad Isnaini', 'jln bulak setro 3', '085693859209', 'isnaini44@gmail.com', '857169199_Isnan.jpg'),
('5', '47739', 'Abdul Latif', 'jalan blauran no 112', '0895358713560', 'abdul_latif@gmail.com', '891402662_Abdul Latif.jpg'),
('6', '47739', 'Galang Noer', 'bengkelo kidul, benjeng', '085234539604', 'galangnoer4@gmail.com', '619994543_Noer.jpg'),
('64834', '47739', 'Bagus Setiawan', 'Jalan ikan kerapuh', '085899281102', 'bagus_setiawan@gmail.com', '899902446_Bagus.jpg'),
('7', '47739', 'Alvin Andira', 'Jalan pakis gunung no 75', '083830157556', 'alvinandirap@gmail.com', '239920662_Alvin Andira.jpg'),
('8', '47739', 'Farras Aldinata', 'Tambak dalem baru gg2 no38', '08819609842', 'farrasaldinata@gmail.com', '1050654648_Farras Aldinata.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kodeAkun`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idKontak`),
  ADD KEY `kodeAkun` (`kodeAkun`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_ibfk_1` FOREIGN KEY (`kodeAkun`) REFERENCES `akun` (`kodeAkun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
