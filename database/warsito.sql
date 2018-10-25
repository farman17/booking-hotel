-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 04:03 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `warsito`
--
CREATE DATABASE IF NOT EXISTS `warsito` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `warsito`;

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE IF NOT EXISTS `catering` (
  `ID_CATERING` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PAKET` varchar(225) NOT NULL,
  `MENU_PEMBUKA` varchar(225) NOT NULL,
  `MENU_UTAMA` varchar(225) NOT NULL,
  `MENU_PENUTUP` varchar(225) NOT NULL,
  `HARGA` bigint(15) NOT NULL,
  PRIMARY KEY (`ID_CATERING`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`ID_CATERING`, `NAMA_PAKET`, `MENU_PEMBUKA`, `MENU_UTAMA`, `MENU_PENUTUP`, `HARGA`) VALUES
(1, 'Paket Hemat 1', 'Rendang kuda dengan saus ikan tuna basi', 'Ikan pari', 'Otak Kera', 150000),
(2, 'Paket Hemat 2', 'Anggur Merah', 'Ayam Hitam Putih ', 'Otak sapi dengan saus tiram', 175000),
(3, 'Paket Hemat 3', 'Puding Lumpur Lapindo', 'Abu Vulkanik Merapi dengan saus tiram', 'Lahar dingin gunung krakatau yang meletus 400 tahun yang lalu', 135000),
(4, 'Paket Hemat 4', 'Coklat bekas becekan hujan', 'Nasi ama kecap dan garem ditambah kerupuk pasir', 'Coca cola rasa yang pernah ada', 156000),
(5, 'Paket Hemat 5', 'Hot Chocolate With Hot Mama', 'Nasi Lemak Jahat', 'Fresh Fruit from the open', 75000),
(6, 'Premium Indian Package', 'Crispy Vagetable Pakoras', 'Sweet Curry With Garlic And Tomatoes', 'Spicy Lenti Dip', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE IF NOT EXISTS `gedung` (
  `ID_GEDUNG` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_GEDUNG` varchar(255) NOT NULL,
  `KAPASITAS` int(11) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `HARGA_SEWA` bigint(11) NOT NULL,
  `DESKRIPSI_GEDUNG` text NOT NULL,
  PRIMARY KEY (`ID_GEDUNG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`ID_GEDUNG`, `NAMA_GEDUNG`, `KAPASITAS`, `ALAMAT`, `HARGA_SEWA`, `DESKRIPSI_GEDUNG`) VALUES
(1, 'The Ritz Carlton Jakarta', 450, 'Jl. MH Thamrin Kebun Sirih Jakarta Pusat', 500000000, 'Gedung premium dengan kualitas dan harga terjangkau'),
(2, 'Pullman Hotel Jakarta', 800, 'Jl. Tomang Raya Tomang Jakarta Barat', 500000000, 'Hotel yang dilengkapi dengan ballroom untuk anda '),
(3, 'Hotel Santika Bintaro', 750, 'Jl. Boulevard Bintaro Jaya Bintaro Tangerang Selatan Banten', 552000000, 'Hotel santika bintaro cocok untuk dijadikan sebagai acara pernikahan dan seminar anda'),
(4, 'Milennium Hotel Jakarta', 500, 'Jl. KH Mas Mansyur 2 Tanah Abang, Thamrin Jakarta Pusat', 765000000, 'Milennium hotel adalah salah satu hotel mewah dengan standar pelayanan bintang 5 dan dapat dinikmati oleh semua kalangan');

-- --------------------------------------------------------

--
-- Table structure for table `gedung_img`
--

CREATE TABLE IF NOT EXISTS `gedung_img` (
  `ID_IMG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_GEDUNG` int(11) NOT NULL,
  `NAMA_GEDUNG` varchar(225) NOT NULL,
  `PATH` varchar(225) NOT NULL,
  `IMG_NAME` varchar(225) NOT NULL,
  PRIMARY KEY (`ID_IMG`),
  KEY `gedung_img_ibfk_1` (`ID_GEDUNG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gedung_img`
--

INSERT INTO `gedung_img` (`ID_IMG`, `ID_GEDUNG`, `NAMA_GEDUNG`, `PATH`, `IMG_NAME`) VALUES
(1, 1, 'The Ritz Carlton', 'http://localhost/Warsito/assets/images/gedung/', 'ritz_carlton.jpg'),
(2, 2, 'Pullman Hotel Jakarta', 'http://localhost/Warsito/assets/images/gedung/', 'pullman_ballroom.jpg'),
(3, 3, 'Hotel Santika Bintaro', 'http://localhost/Warsito/assets/images/gedung/', 'binareka.jpg'),
(4, 4, 'Milennium Hotel Jakarta', 'http://localhost/Warsito/assets/images/gedung/', 'milenium.jpg'),
(7, 1, 'The Ritz Carlton', 'http://localhost/Warsito/assets/images/gedung/', 'ritz_carlton2.jpg'),
(8, 1, 'The Ritz Carlton', 'http://localhost/Warsito/assets/images/gedung/', 'ritz_carlton3.jpg'),
(9, 1, 'The Ritz Carlton', 'http://localhost/Warsito/assets/images/gedung/', 'ritz_carlton4.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `home_data`
--
CREATE TABLE IF NOT EXISTS `home_data` (
`ID_GEDUNG` int(11)
,`HARGA_SEWA` bigint(11)
,`NAMA_GEDUNG` varchar(255)
,`KAPASITAS` int(11)
,`PATH` varchar(225)
,`IMG_NAME` varchar(225)
);
-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `KODE_PEMBAYARAN` varchar(225) NOT NULL DEFAULT 'TRS000',
  `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_PEMESANAN` varchar(225) NOT NULL DEFAULT 'PMSN000',
  `ID_PEMESANAN` int(11) NOT NULL,
  `ATAS_NAMA` varchar(225) NOT NULL,
  `NOMINAL_TRANSFER` bigint(20) NOT NULL,
  `BANK_PENGIRIM` varchar(225) NOT NULL,
  `TANGGAL_TRANSFER` date NOT NULL,
  `FLAG` int(11) NOT NULL,
  `PATH` varchar(225) NOT NULL,
  `IMG_NAME` varchar(225) NOT NULL,
  PRIMARY KEY (`ID_PEMBAYARAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`KODE_PEMBAYARAN`, `ID_PEMBAYARAN`, `KODE_PEMESANAN`, `ID_PEMESANAN`, `ATAS_NAMA`, `NOMINAL_TRANSFER`, `BANK_PENGIRIM`, `TANGGAL_TRANSFER`, `FLAG`, `PATH`, `IMG_NAME`) VALUES
('TRS000', 1, 'PMSN000', 6, 'Anton Prio Hutomo', 5826250, 'BCA', '2016-12-25', 1, 'http://localhost/Warsito/assets/images/client-bukti-pembayaran/', 'client-trf_15012017_062106.jpg'),
('TRS000', 2, 'PMSN000', 7, 'Muhammad Dzakwan', 5270000, 'Mandiri', '2016-12-26', 1, 'http://localhost/Warsito/assets/images/client-bukti-pembayaran/', 'client-trf_15012017_062515.jpg'),
('TRS000', 3, 'PMSN000', 9, 'Karina Novilda', 5722500, 'BNI', '2016-12-26', 1, 'http://localhost/Warsito/assets/images/client-bukti-pembayaran/', 'client-trf_15012017_062838.jpg'),
('TRS000', 4, 'PMSN000', 22, 'Muhammad Dzakwan', 5225000, 'BCA', '2017-01-04', 1, 'http://localhost/Warsito/assets/images/client-bukti-pembayaran/', 'client-trf_15012017_063041.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `ID_PEMESANAN` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TANGGAL_PEMESANAN` date NOT NULL,
  `ID_CATERING` int(11) DEFAULT NULL,
  `ID_GEDUNG` int(11) NOT NULL,
  `JUMLAH_CATERING` int(11) DEFAULT NULL,
  `STATUS` int(1) NOT NULL,
  `REMARKS` varchar(225) DEFAULT NULL,
  `FLAG` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_PEMESANAN`),
  KEY `USERNAME` (`USERNAME`),
  KEY `ID_GEDUNG` (`ID_GEDUNG`),
  KEY `ID_CATERING` (`ID_CATERING`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `USERNAME`, `EMAIL`, `TANGGAL_PEMESANAN`, `ID_CATERING`, `ID_GEDUNG`, `JUMLAH_CATERING`, `STATUS`, `REMARKS`, `FLAG`) VALUES
(2, 'antonprio', 'antonpriohutomo@gmail.com', '2016-12-16', 3, 1, 500, 2, NULL, 0),
(6, 'antonprio', 'antonpriohutomo@gmail.com', '2017-01-07', 2, 3, 175, 1, NULL, 0),
(7, 'warsiwan', 'antonprio22@gmail.com', '2016-12-31', 3, 1, 200, 1, NULL, 0),
(9, 'awkarin', 'awakarin_gendut@gmail.com', '2016-12-31', 3, 3, 150, 1, NULL, 0),
(22, 'warsiwan', 'warsito.rakhman@gmail.com', '2017-01-07', 1, 1, 150, 1, NULL, 2),
(23, 'pogbay', 'antonprio22@gmail.com', '2017-02-04', 3, 4, 100, 3, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_details`
--

CREATE TABLE IF NOT EXISTS `pemesanan_details` (
  `ID_DETAILS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMESANAN` int(11) NOT NULL,
  `PATH` varchar(225) NOT NULL,
  `FILE_NAME` varchar(225) NOT NULL,
  `DESKRIPSI_ACARA` varchar(225) NOT NULL,
  PRIMARY KEY (`ID_DETAILS`),
  KEY `ID_PEMESANAN` (`ID_PEMESANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pemesanan_details`
--

INSERT INTO `pemesanan_details` (`ID_DETAILS`, `ID_PEMESANAN`, `PATH`, `FILE_NAME`, `DESKRIPSI_ACARA`) VALUES
(2, 2, 'http://localhost/Warsito/assets/user-proposal/', 'antonprio_16122016_100106.pdf', 'Perinakahan warsito dan presiden zambia'),
(4, 6, 'http://localhost/Warsito/assets/user-proposal/', 'antonprio_24122016_035551.pdf', 'Gathering nasional komunitas pecinta reptil provinsi jawa barat'),
(5, 7, 'http://localhost/Warsito/assets/user-proposal/', 'warsiwan_24122016_040328.pdf', 'Event tahun baru RCTI'),
(6, 9, 'http://localhost/Warsito/assets/user-proposal/', 'awkarin_25122016_103514.pdf', 'Seminar "A Good Tablemanner" fakultas ilmu komunikasi Universitas Pelita Harapan'),
(11, 22, 'http://localhost/Warsito/assets/user-proposal/', 'warsiwan_02012017_014204.doc', 'Peresmian PT. Mamang Bois dan pesta kebun oleh CEO PT. Mamang Bois'),
(12, 23, 'http://localhost/Warsito/assets/user-proposal/', 'pogbay_22012017_035010.pdf', 'Peresmian gedung kantor baru PT. Mamang Bois');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_fix_detail`
--

CREATE TABLE IF NOT EXISTS `pemesanan_fix_detail` (
  `ID_FIX_DETAIL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMESANAN` int(11) NOT NULL,
  `USERNAME` varchar(225) NOT NULL,
  `TANGGAL_APPROVAL` date NOT NULL,
  `TANGGAL_FINAL_PEMESANAN` date NOT NULL,
  `TANGGAL_DEADLINE` date NOT NULL,
  `FINAL_STATUS` int(1) NOT NULL,
  PRIMARY KEY (`ID_FIX_DETAIL`),
  KEY `ID_PEMESANAN` (`ID_PEMESANAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `pemesanan_fix_detail`
--

INSERT INTO `pemesanan_fix_detail` (`ID_FIX_DETAIL`, `ID_PEMESANAN`, `USERNAME`, `TANGGAL_APPROVAL`, `TANGGAL_FINAL_PEMESANAN`, `TANGGAL_DEADLINE`, `FINAL_STATUS`) VALUES
(6, 6, 'antonprio', '2016-12-24', '2017-01-07', '2016-12-26', 1),
(7, 7, 'warsiwan', '2016-12-24', '2016-12-31', '2016-12-26', 1),
(8, 9, 'awkarin', '2016-12-25', '2016-12-31', '2016-12-27', 1),
(27, 22, 'warsiwan', '2017-01-22', '2017-01-07', '2017-01-24', 1),
(47, 23, 'pogbay', '2017-01-24', '2017-02-04', '2017-01-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE IF NOT EXISTS `perawatan` (
  `ID_PERAWATAN` int(11) NOT NULL AUTO_INCREMENT,
  `NO_ID` varchar(225) NOT NULL,
  `NAMA_PERAWATAN` varchar(225) NOT NULL,
  `NAMA_GEDUNG` varchar(225) NOT NULL,
  `TANGGAL_PEMBAYARAN` date NOT NULL,
  `BIAYA` bigint(15) NOT NULL,
  `PATH` varchar(225) NOT NULL,
  `IMG_NAME` varchar(225) NOT NULL,
  PRIMARY KEY (`ID_PERAWATAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`ID_PERAWATAN`, `NO_ID`, `NAMA_PERAWATAN`, `NAMA_GEDUNG`, `TANGGAL_PEMBAYARAN`, `BIAYA`, `PATH`, `IMG_NAME`) VALUES
(2, 'REFFF1123344212FF332', 'Pembayaran Listrik', 'Millenium Hotel Jakarta', '2016-12-13', 2500000, 'http://localhost/Warsito/assets/images/bukti-pembayaran/', 'Listrik_10122016_075521'),
(3, 'RFF009II887244', 'Pembayaran Air', 'Hotel Santika Bintaro', '2016-12-20', 6500000, 'http://localhost/Warsito/assets/images/bukti-pembayaran/', 'Air_10122016_075943'),
(6, 'KBRSHN1109231113', 'Pembayaran Kebersihan', 'Pullman Hotel Jakarta', '2016-12-24', 500000, 'http://localhost/Warsito/assets/images/bukti-pembayaran/', 'Kebersihan_10122016_080518'),
(7, 'REF1442123321', 'Pembayaran Air', 'The Ritz Carlton Jakarta', '2017-01-19', 150000000, 'http://localhost/Warsito/assets/images/bukti-pembayaran/', 'Air_29012017_063355');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(225) NOT NULL,
  `NAMA_LENGKAP` varchar(225) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NO_TELEPON` varchar(15) NOT NULL,
  `ALAMAT` varchar(225) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `NAMA_LENGKAP`, `PASSWORD`, `EMAIL`, `NO_TELEPON`, `ALAMAT`, `TANGGAL_LAHIR`) VALUES
('antonprio', 'Anton Prio Hutomo', '123321', 'antonpriohutomo@gmail.com', '087877878215', 'Jl. Bintaro Raya 6 No 18 RT 011 RW 12 Tangerang Selatan Banten Indonesia 11232', '1995-01-22'),
('awkarin', 'Karin Novilda', 'warsito', 'awakarin_gendut@gmail.com', '08562443213', 'Jl. Pembangunan Jaya no 11 Bintaro Tangerang Selatan', '1997-06-04'),
('matumbam', 'Rudi Purnomo', 'password123321', 'warsito.rakhman@gmail.com', '081384224244', 'Jl. Damar 12 RT 02 RW 13 Kelurahan Ragunan Kecamatan Pasar Minggu Jakarta Selatan', '1994-07-18'),
('pogbay', 'Paul Pogbay Anapi', 'qwerty', 'antonprio22@gmail.com', '0217810626', 'Jl. Tegalrotan 3 No 11 RT 03 RW 01 Kelurahan Pondok Aren Kecamatan Jurangmangu Tangerang Selatan', '1992-01-03'),
('SG', 'Shania Gracia', 'tested123', 'antonprio22@gmail.com', '08778785543', 'Jl. Jaha No 27 RT 015 RW 01 Kelurahan Cilandak Timur Kecamatan Pasar Minggu Kotamadya Jakarta Selatan', '1999-08-31'),
('warsiwan', 'Muhammad Warsito Dzakwan Valdiansyah Rakhman', 'password123', 'antonprio22@gmail.com', '08134457833', 'Jl. Sepatan Utara No 11 Sepatan Barat Kabupaten Tangerang, Provinsi Banten ', '1992-06-14');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemesanan`
--
CREATE TABLE IF NOT EXISTS `v_pemesanan` (
`ID_PEMESANAN` varchar(18)
,`USERNAME` varchar(255)
,`TANGGAL_PEMESANAN` date
,`EMAIL` varchar(100)
,`JUMLAH_CATERING` varchar(11)
,`NAMA_PAKET` varchar(225)
,`NAMA_GEDUNG` varchar(255)
,`HARGA_SATUAN` bigint(15)
,`TOTAL_HARGA` bigint(30)
,`STATUS` varchar(23)
,`HARGA_SEWA` bigint(11)
,`TOTAL_KESELURUHAN` bigint(31)
,`DESKRIPSI_ACARA` varchar(225)
,`REMARKS` varchar(225)
);
-- --------------------------------------------------------

--
-- Structure for view `home_data`
--
DROP TABLE IF EXISTS `home_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `home_data` AS select `gedung`.`ID_GEDUNG` AS `ID_GEDUNG`,`gedung`.`HARGA_SEWA` AS `HARGA_SEWA`,`gedung`.`NAMA_GEDUNG` AS `NAMA_GEDUNG`,`gedung`.`KAPASITAS` AS `KAPASITAS`,`gedung_img`.`PATH` AS `PATH`,`gedung_img`.`IMG_NAME` AS `IMG_NAME` from (`gedung` join `gedung_img` on((`gedung_img`.`ID_GEDUNG` = `gedung`.`ID_GEDUNG`))) group by `gedung`.`ID_GEDUNG`;

-- --------------------------------------------------------

--
-- Structure for view `v_pemesanan`
--
DROP TABLE IF EXISTS `v_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemesanan` AS select concat('PMSN000',`p`.`ID_PEMESANAN`) AS `ID_PEMESANAN`,`p`.`USERNAME` AS `USERNAME`,`p`.`TANGGAL_PEMESANAN` AS `TANGGAL_PEMESANAN`,`p`.`EMAIL` AS `EMAIL`,coalesce(`p`.`JUMLAH_CATERING`,'Tidak Ada') AS `JUMLAH_CATERING`,coalesce(`c`.`NAMA_PAKET`,'Tidak Ada') AS `NAMA_PAKET`,`g`.`NAMA_GEDUNG` AS `NAMA_GEDUNG`,`c`.`HARGA` AS `HARGA_SATUAN`,coalesce((`c`.`HARGA` * `p`.`JUMLAH_CATERING`),0) AS `TOTAL_HARGA`,(case `p`.`STATUS` when 0 then 'PENDING' when 1 then 'DISETUJUI' when 2 then 'DITOLAK' when 3 then 'CANCELED WITH REFUND' when 4 then 'CANCELED WITHOUT REFUND' end) AS `STATUS`,`g`.`HARGA_SEWA` AS `HARGA_SEWA`,(`g`.`HARGA_SEWA` + coalesce((`c`.`HARGA` * `p`.`JUMLAH_CATERING`),0)) AS `TOTAL_KESELURUHAN`,`pemesanan_details`.`DESKRIPSI_ACARA` AS `DESKRIPSI_ACARA`,`p`.`REMARKS` AS `REMARKS` from (((`pemesanan` `p` left join `catering` `c` on((`c`.`ID_CATERING` = `p`.`ID_CATERING`))) left join `gedung` `g` on((`g`.`ID_GEDUNG` = `p`.`ID_GEDUNG`))) left join `pemesanan_details` on((`pemesanan_details`.`ID_PEMESANAN` = `p`.`ID_PEMESANAN`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gedung_img`
--
ALTER TABLE `gedung_img`
  ADD CONSTRAINT `gedung_img_ibfk_1` FOREIGN KEY (`ID_GEDUNG`) REFERENCES `gedung` (`ID_GEDUNG`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`USERNAME`) REFERENCES `user` (`USERNAME`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`ID_GEDUNG`) REFERENCES `gedung` (`ID_GEDUNG`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`ID_CATERING`) REFERENCES `catering` (`ID_CATERING`);

--
-- Constraints for table `pemesanan_details`
--
ALTER TABLE `pemesanan_details`
  ADD CONSTRAINT `pemesanan_details_ibfk_1` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_fix_detail`
--
ALTER TABLE `pemesanan_fix_detail`
  ADD CONSTRAINT `pemesanan_fix_detail_ibfk_1` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `pemesanan` (`ID_PEMESANAN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
