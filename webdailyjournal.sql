-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 02:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Membasuh', 'Lirik yang digunakan oleh Hindia memang sederhana, namun penuh makna. Untuk menyampaikan pesan, meski kehidupan penuh dengan rintangan, selalu ada harapan untuk memulai kembali. ', 'membasuh.jpg', '2023-11-08 04:43:12', 'admin'),
(2, 'LA LA LOST YOU', 'NIKI berhasil menciptakan sebuah lagu yang tidak hanya enak didengar, tetapi juga kaya akan makna. Makna lagu La La Lost You tersirat dalam liriknya yang puitis dan penuh metafora.', 'niki.jpg', '2023-11-08 04:44:58', 'admin'),
(3, 'APT', '\"APT\" yang menjadi judul lagu ini merujuk pada dua hal, yakni merujuk pada apartemen dan Apateu, lagu APT mengisahkan tentang keinginan sepasang kekasih untuk menghabiskan Waktu Bersama secara langsung di Apartemen.', 'apt.jpg', '2023-11-08 04:44:37', 'admin'),
(4, 'Lowkey', 'Makna yang terkandung dalam lagu \"Lowkey\" membahas tentang hubungan yang tidak ingin diketahui oleh banyak orang, Makna lagu \"Lowkey\" mendeskripsikan keinginan NIKI yang ingin menjaga hubungan asmaranya tetap sederhana.', 'lowkey.jpg', '2023-11-08 04:45:33', 'admin'),
(22, 'Serana', 'makna lagu Serana yang dinyanyikan oleh For Revenge adalah tentang kesulitan melupakan seseorang yang pernah spesial di hatinya. Lirik tersebut menggambarkan bahwa seseorang tidak baik-baik saja setelah putus dengan mantannya. ', 'serana.jpg', '2023-11-08 04:51:55', 'admin'),
(28, 'Die with A Smile', 'Lagu Die with A Smile merupakan lagu kolaborasi oleh Lady Gaga dan Bruno Mars, Lagu tersebut dirilis 16 Agustus 2024, saat ini. Lagu ini menggabungkan gaya musik soul khas Bruno Mars dan suara dramatis serta emosional dari Lady gaga', 'lady.jpg', '2023-11-08 20:16:29', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
