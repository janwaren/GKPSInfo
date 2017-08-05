-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 12:04 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gkps`
--

-- --------------------------------------------------------

--
-- Table structure for table `external_org`
--

CREATE TABLE `external_org` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `kota` varchar(60) NOT NULL,
  `propinsi` varchar(60) DEFAULT NULL,
  `negara` varchar(60) NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `external_org`
--

INSERT INTO `external_org` (`id`, `nama`, `alamat`, `kota`, `propinsi`, `negara`, `telp`, `email`, `website`) VALUES
(1, 'STT Abdi Sabda', NULL, 'Medan', 'Sumatera Utara', 'Indonesia', NULL, NULL, NULL),
(2, 'JPIC', NULL, 'Jakarta', 'DKI Jakarta', 'Indonesia', NULL, NULL, NULL),
(3, 'Woman Crisis Center - Sopou Damei', NULL, 'Pematangsiantar', 'Sumatera Utara', 'Indonesia', NULL, NULL, NULL),
(4, 'Lembaga Alkitab Indonesia', NULL, 'Jakarta', 'DKI Jakarta', 'Indonesia', NULL, NULL, NULL),
(5, 'SMU Plus Raya', NULL, 'Pematangraya', 'Sumatera Utara', 'Indonesia', NULL, NULL, NULL),
(6, 'STT Jakarta', NULL, 'Jakarta', NULL, 'Indonesia', NULL, NULL, NULL),
(7, 'Penginjilan Afrika', NULL, 'Johannesburg', NULL, 'Afrika Selatan', NULL, NULL, NULL),
(8, 'PGI', NULL, 'Jakarta', NULL, 'Indonesia', NULL, NULL, NULL),
(9, 'Suku Anak Dalam', NULL, 'Muara Bungo', 'Jambi', 'Indonesia', NULL, NULL, NULL),
(10, 'PGI SU', NULL, 'Medan', 'Sumatera Utara', 'Indonesia', NULL, NULL, NULL),
(11, 'Program UEM', NULL, 'Pematangsiantar', 'Sumatera Utara', 'Indonesia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `full_timer`
--

CREATE TABLE `full_timer` (
  `id` int(11) NOT NULL,
  `gelar_prefix` varchar(20) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `gelar_postfix` varchar(20) DEFAULT NULL,
  `strata_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita','?') NOT NULL,
  `email` varchar(40) NOT NULL,
  `hp` varchar(20) NOT NULL DEFAULT '?',
  `telp_rumah` varchar(20) DEFAULT NULL,
  `telp_kantor` varchar(20) DEFAULT NULL,
  `alamat_rumah` text,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_tahbis` date DEFAULT NULL,
  `tanggal_pensiun` date DEFAULT NULL,
  `tanggal_wafat` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `full_timer`
--

INSERT INTO `full_timer` (`id`, `gelar_prefix`, `nama`, `gelar_postfix`, `strata_id`, `jabatan_id`, `jenis_kelamin`, `email`, `hp`, `telp_rumah`, `telp_kantor`, `alamat_rumah`, `tanggal_lahir`, `tanggal_tahbis`, `tanggal_pensiun`, `tanggal_wafat`, `user_id`) VALUES
(1, '', 'Abdi Jekri Damanik', 'MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1965-07-29', '1994-06-26', NULL, NULL, NULL),
(2, '', 'Afrijan Haloho', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1967-04-25', '1995-07-02', NULL, NULL, NULL),
(3, '', 'Agnes Nifitri Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-12-22', '2014-06-15', NULL, NULL, NULL),
(4, '', 'Agus Freddy Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1977-08-13', '2007-06-02', NULL, NULL, NULL),
(5, '', 'Agus Jetron Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1970-08-28', '2000-06-11', NULL, NULL, NULL),
(6, '', 'Agus Rony Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-08-09', '2011-07-01', NULL, NULL, NULL),
(7, '', 'Albert Antonius Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1968-11-12', '1998-05-24', NULL, NULL, NULL),
(8, '', 'Albert Henrison Purba', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-08-02', '2002-07-01', NULL, NULL, NULL),
(9, '', 'Aleks Frank D. Sitopu', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1977-05-26', '2006-06-01', NULL, NULL, NULL),
(10, '', 'Almer Trivendi Purba', 'STh, MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1965-03-30', '1992-11-22', NULL, NULL, NULL),
(11, '', 'Aman Saud Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1973-02-28', '2002-06-30', NULL, NULL, NULL),
(12, '', 'Amri Tondang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-08-13', '2013-02-06', NULL, NULL, NULL),
(13, '', 'Andrian Raja N. Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1989-10-05', '2015-08-23', NULL, NULL, NULL),
(14, '', 'Anita Dearni Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1967-07-17', '1995-07-15', NULL, NULL, NULL),
(15, '', 'Anni Damanik', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-12-30', '2015-08-23', NULL, NULL, NULL),
(16, '', 'Anugrah Christian Barus', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-10-07', '2012-06-03', NULL, NULL, NULL),
(17, '', 'Ariamsah Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-11-11', '2013-02-06', NULL, NULL, NULL),
(18, '', 'Arifin Riklan Effendi Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-05-26', '2012-06-03', NULL, NULL, NULL),
(19, '', 'Arihta V. J. Girsang', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1963-04-05', '1989-05-15', NULL, NULL, NULL),
(20, '', 'Asendohar Tuahman Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1970-04-27', '2004-06-13', NULL, NULL, NULL),
(21, '', 'Barmen D. P. Sinaga', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1956-02-01', '1985-06-02', NULL, NULL, NULL),
(22, '', 'Basmora D. Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-12-17', '2015-11-01', NULL, NULL, NULL),
(23, '', 'Benny Elias Simbolon', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-03-22', '2013-02-06', NULL, NULL, NULL),
(24, '', 'Berlian Saragih', 'M. Lit', 4, 1, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(25, '', 'Bima Bonar Gustav Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-12-15', '2013-02-06', NULL, NULL, NULL),
(26, '', 'Bonar Dahlan Sumbayak', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(27, '', 'Bonatua Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1971-04-29', '2000-06-11', NULL, NULL, NULL),
(28, '', 'Cani Oberman Silalahi', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1989-10-22', '2015-08-23', NULL, NULL, NULL),
(29, '', 'Chandra Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1977-08-11', '2008-06-16', NULL, NULL, NULL),
(30, '', 'Chlara Shintia Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-05-06', '2015-11-01', NULL, NULL, NULL),
(31, '', 'Christianus E. Purba', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(32, '', 'Daniel Saragih', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(33, '', 'Darwita Hasiani Purba', 'MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1974-10-01', '2001-06-24', NULL, NULL, NULL),
(34, '', 'Dasmaria N. Tondang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-12-20', '2015-08-23', NULL, NULL, NULL),
(35, '', 'Dearni Triana Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1989-03-06', '2015-08-23', NULL, NULL, NULL),
(36, '', 'Debby Verayanti Simarmata', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-03-11', '2013-02-06', NULL, NULL, NULL),
(37, 'Dr.', 'Deddy Fajar Purba', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1969-06-08', '1995-07-15', NULL, NULL, NULL),
(38, '', 'Dedy Rony Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1988-02-01', '2014-06-15', NULL, NULL, NULL),
(39, '', 'Defri Judika Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-02-19', '2011-06-01', NULL, NULL, NULL),
(40, '', 'Deliana Elviwaty Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1971-11-26', '2002-06-30', NULL, NULL, NULL),
(41, '', 'Delpiana Irawati Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1981-06-04', '2010-05-17', NULL, NULL, NULL),
(42, '', 'Dendy Vando Sidauruk', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1980-09-25', '2008-06-16', NULL, NULL, NULL),
(43, '', 'Devid Hendriko', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-01-18', '2013-02-06', NULL, NULL, NULL),
(44, '', 'Dian Putra Oshar Sumbayak', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1987-09-19', '2013-02-06', NULL, NULL, NULL),
(45, '', 'Diana Wati Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-08-22', '2013-02-06', NULL, NULL, NULL),
(46, '', 'Doliaman Damanik', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-12-31', '1990-04-16', NULL, NULL, NULL),
(47, '', 'Donald Girsang', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1958-02-27', '1986-06-01', NULL, NULL, NULL),
(48, '', 'Donesarsen Saragih', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1968-04-18', '2001-07-01', NULL, NULL, NULL),
(49, '', 'Donna Silalahi', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1982-05-15', '2011-06-01', NULL, NULL, NULL),
(50, '', 'Dosmariani Sinaga', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-05-06', '2012-06-03', NULL, NULL, NULL),
(51, '', 'Edi Jasin Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1972-03-13', '2004-06-13', NULL, NULL, NULL),
(52, 'Dr.', 'Edison Munthe', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(53, '', 'Edwin R. Simarmata', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(54, '', 'Effendi Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1958-10-12', '1985-06-02', NULL, NULL, NULL),
(55, '', 'Eka Dinaria Damanik', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-07-25', '2013-02-06', NULL, NULL, NULL),
(56, '', 'El Imanson Sumbayak', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1956-03-23', '1985-06-02', NULL, NULL, NULL),
(57, '', 'Elfrida Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1969-08-16', '1997-07-01', NULL, NULL, NULL),
(58, '', 'Elizabeth Florentina Purba', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-02-11', '2009-06-01', NULL, NULL, NULL),
(59, '', 'Elva Rini Purba', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-05-08', '2014-06-15', NULL, NULL, NULL),
(60, '', 'Enida Girsang', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1962-09-06', '1988-04-04', NULL, NULL, NULL),
(61, '', 'Enita Mulaidah Silalahi', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1977-02-24', '2006-06-01', NULL, NULL, NULL),
(62, '', 'Enny Purba', 'STh, MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1974-02-03', '2004-11-28', NULL, NULL, NULL),
(63, '', 'Enos Eben Ezer Siboro', 'MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1956-04-17', '1997-07-01', NULL, NULL, NULL),
(64, '', 'Erni Julianti Purba', 'MTh', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1971-07-13', '2001-06-24', NULL, NULL, NULL),
(65, '', 'Erwin Arianto Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-01-28', '2010-05-17', NULL, NULL, NULL),
(66, '', 'Erwin Desli Mardianto Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1970-03-07', '2002-12-26', NULL, NULL, NULL),
(67, '', 'Etika Saragih', 'STh, M.Pd', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1976-10-09', '2007-06-02', NULL, NULL, NULL),
(68, '', 'Etty Saragih', 'MTh', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1972-02-07', '2002-06-30', NULL, NULL, NULL),
(69, 'Kol.', 'Ferdinand Munthe', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, NULL, NULL, NULL),
(70, '', 'Ferdy Septiady Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1983-09-08', '2012-06-03', NULL, NULL, NULL),
(71, '', 'Firdaus Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1962-02-14', '1987-11-01', NULL, NULL, NULL),
(72, '', 'Flora Ervina Hutagaol', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1980-05-20', '2009-12-10', NULL, NULL, NULL),
(73, '', 'Fraimen J. Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1973-08-27', '2000-06-11', NULL, NULL, NULL),
(74, '', 'Freddy Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1987-09-09', '2015-11-01', NULL, NULL, NULL),
(75, '', 'Fredy Jumberliaman Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1976-11-05', '2007-06-02', NULL, NULL, NULL),
(76, '', 'Freediana Bukit', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-07-04', '2013-01-02', NULL, NULL, NULL),
(77, '', 'Fridemandes Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1969-12-03', '2000-06-14', NULL, NULL, NULL),
(78, '', 'Frisko Edward Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-06-17', '2012-06-03', NULL, NULL, NULL),
(79, '', 'Gomgom Adi Sahputra Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1987-07-15', '2013-02-06', NULL, NULL, NULL),
(80, '', 'Grace Vivi Adriana Sumbayak', 'MTh', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-08-19', '2015-08-23', NULL, NULL, NULL),
(81, '', 'Gressindo Raja Sinaga', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-02-05', '2013-02-06', NULL, NULL, NULL),
(82, '', 'Grubert Kant Defit Manihuruk', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1978-07-09', '2007-06-02', NULL, NULL, NULL),
(83, '', 'Guna Wardhana Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1974-10-14', '2002-12-26', NULL, NULL, NULL),
(84, '', 'H. M. Girsang', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(85, '', 'Hamda Morawati Tondang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-07-29', '2015-08-23', NULL, NULL, NULL),
(86, '', 'Hamonangan Sinaga', 'Msi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-06-05', '2003-12-07', NULL, NULL, NULL),
(87, '', 'Henrik Barus', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-08-12', '2011-06-01', NULL, NULL, NULL),
(88, '', 'Herna Yanthi Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1982-01-26', '2009-06-01', NULL, NULL, NULL),
(89, '', 'Hier Intersan Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1958-09-12', '1986-06-01', NULL, NULL, NULL),
(90, '', 'Hot Imanson Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1958-05-21', '1984-11-18', NULL, NULL, NULL),
(91, '', 'Hotmaida Ulina Malau', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1984-03-12', '2011-06-01', NULL, NULL, NULL),
(92, '', 'Hotman P. Dasuha', '?', 3, 1, '?', '?', '?', '?', '?', '?', '1954-10-11', '1982-04-12', '2016-01-01', NULL, NULL),
(93, '', 'Hotsiaman Sipayung', 'MSi, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-12-27', '1991-08-15', NULL, NULL, NULL),
(94, '', 'Immanuel Christian S. Sitio', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-12-16', '2013-02-06', NULL, NULL, NULL),
(95, '', 'Istipanus Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1959-10-04', '1988-04-04', NULL, NULL, NULL),
(96, '', 'Ito Belihar H. Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1974-11-02', '2003-12-07', NULL, NULL, NULL),
(97, '', 'Jon Hermansyah Damanik', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1966-03-09', '1997-07-01', NULL, NULL, NULL),
(98, '', 'J. K. Purba', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(99, '', 'Jacelsius Purba', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(100, '', 'Jack Andre R. Saragih', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1977-06-13', '2007-06-02', NULL, NULL, NULL),
(101, '', 'Jadasri Dosdo Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1964-11-30', '1990-04-16', NULL, NULL, NULL),
(102, '', 'Jadiman P. Tamsar', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1959-01-10', '1986-06-01', NULL, NULL, NULL),
(103, '', 'Jaharianson Saragih', 'STh, MSc, PhD', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1962-09-07', '1989-05-15', NULL, NULL, NULL),
(104, '', 'Jahenos Saragih', 'MTh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1957-07-11', '1986-06-01', NULL, NULL, NULL),
(105, '', 'Jahesdin Damanik', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(106, '', 'Jahian Saragih', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(107, '', 'Jakardo Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-03-03', '2013-02-06', NULL, NULL, NULL),
(108, '', 'Jaksen Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-02-24', '1989-05-15', NULL, NULL, NULL),
(109, '', 'Jamarsen Purba', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(110, '', 'Jameldin Sipayung', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-07-20', '1989-05-15', NULL, NULL, NULL),
(111, '', 'Jaminton Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1958-03-22', '1986-06-01', NULL, NULL, NULL),
(112, '', 'Jan Halomoan Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-04-16', '2009-06-01', NULL, NULL, NULL),
(113, '', 'Jan Hotner Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-01-17', '2002-06-30', NULL, NULL, NULL),
(114, 'Dr.', 'Jan Jahaman Damanik', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1960-10-17', '1989-05-15', NULL, NULL, NULL),
(115, '', 'Jan Jonner Sinaga', 'M. Min', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-06-27', '1989-05-15', NULL, NULL, NULL),
(116, '', 'Jan Kris Harianto Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1970-12-15', '2001-06-24', NULL, NULL, NULL),
(117, '', 'Jan Sarman Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1968-01-13', '1997-07-01', NULL, NULL, NULL),
(118, '', 'Jan Sudiaman Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1967-10-26', '1997-07-01', NULL, NULL, NULL),
(119, 'Mayor', 'Jaokang P. Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, NULL, NULL, NULL),
(120, '', 'Jaosner Sipayung', 'STh, MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1969-05-13', '1999-07-01', NULL, NULL, NULL),
(121, '', 'Japoltak Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1988-07-17', '2015-08-23', NULL, NULL, NULL),
(122, '', 'Jasirman Sumbayak', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(123, '', 'Jatalim Sitopu', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(124, '', 'Jawalden Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1958-09-03', '1988-04-04', NULL, NULL, NULL),
(125, '', 'Jawalen P. Siboro', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(126, '', 'Jeddy Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1965-04-21', '1991-08-15', NULL, NULL, NULL),
(127, '', 'Jemmi Raya Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1972-07-13', '2000-06-24', NULL, NULL, NULL),
(128, '', 'Jenny Rossy Christine Purba', 'MA', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1980-10-07', '2006-06-01', NULL, NULL, NULL),
(129, '', 'Jeplin Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1962-02-21', '1995-07-15', NULL, NULL, NULL),
(130, '', 'Jhon Harapan Purba', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1955-09-08', '1981-04-12', '2016-01-01', NULL, NULL),
(131, '', 'Jhon Henrikson Haloho', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1970-08-12', '2002-06-30', NULL, NULL, NULL),
(132, '', 'Jhon Marthin E. Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1988-03-31', '2014-06-15', NULL, NULL, NULL),
(133, 'Dr.', 'Jhon Riahman Sipayung', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1965-04-28', '1992-11-22', NULL, NULL, NULL),
(134, '', 'Jhon Ricky Raymond Purba', 'MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1973-06-03', '2002-06-30', NULL, NULL, NULL),
(135, '', 'Jhon Rilman Sinaga', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1971-04-20', '2003-12-07', NULL, NULL, NULL),
(136, '', 'Jhon Risman Toni Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1971-01-10', '2000-06-11', NULL, NULL, NULL),
(137, '', 'Jhon Winsyah Raja Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1977-09-06', '2007-06-02', NULL, NULL, NULL),
(138, '', 'Jhonnedi Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1969-08-18', '2003-12-07', NULL, NULL, NULL),
(139, '', 'Jonsar Medi Purba', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1975-03-07', '2003-12-07', NULL, NULL, NULL),
(140, '', 'Jimmey B. Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1968-05-05', '2002-07-01', NULL, NULL, NULL),
(141, '', 'John Christian Rokarden Saragih', 'MSc', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1972-10-19', '2002-12-26', NULL, NULL, NULL),
(142, '', 'Jojor Veronika R. Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1984-02-14', '2012-06-03', NULL, NULL, NULL),
(143, '', 'Joko Selamat Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-05-30', '2012-06-03', NULL, NULL, NULL),
(144, '', 'Jon Renis Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1975-01-24', '2002-12-26', NULL, NULL, NULL),
(145, '', 'Jon Sadar Merwaldi Sitopu', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1983-04-04', '2010-05-17', NULL, NULL, NULL),
(146, '', 'Jonedy Chandra Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1983-09-28', '2012-06-03', NULL, NULL, NULL),
(147, '', 'Jonesman Saragih', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1965-05-05', '1998-06-15', NULL, NULL, NULL),
(148, '', 'Jonny Hotlan Purba', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1971-06-04', '1999-06-13', NULL, NULL, NULL),
(149, 'Dr.', 'Jontor Situmorang', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1961-06-09', '1988-04-04', NULL, NULL, NULL),
(150, '', 'Josia Siboro', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1966-12-23', '1997-07-01', NULL, NULL, NULL),
(151, '', 'Juandaha Raya Purba Dasuha', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-02-15', '2002-06-30', NULL, NULL, NULL),
(152, '', 'Julinda Sipayung', 'MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1973-07-31', '2002-12-26', NULL, NULL, NULL),
(153, '', 'Julles Purba', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1972-10-06', '2003-12-07', NULL, NULL, NULL),
(154, '', 'Jumanar Harianja', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1963-09-08', '1996-08-15', NULL, NULL, NULL),
(155, '', 'Juna Daniel Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-06-18', '2009-06-01', NULL, NULL, NULL),
(156, '', 'Juniaman Tawar Saragih', 'STh, MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-06-24', '2002-12-26', NULL, NULL, NULL),
(157, '', 'Juniati Sondang Donriana Saragih', 'MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1972-06-30', '2001-06-24', NULL, NULL, NULL),
(158, '', 'Junisman Saragih', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-06-12', '2002-06-30', NULL, NULL, NULL),
(159, '', 'Jusni Herlina Saragih', 'MTh', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1969-10-03', '1999-07-01', NULL, NULL, NULL),
(160, '', 'Kamrol Simanjorang', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(161, '', 'Karmen Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1970-02-13', '2002-07-01', NULL, NULL, NULL),
(162, '', 'Karyaman Tomy Purba', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1971-08-04', '2001-06-24', NULL, NULL, NULL),
(163, '', 'Kelurenca Rumahorbo', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1973-01-23', '2004-06-13', NULL, NULL, NULL),
(164, '', 'Krisman Purba', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1972-12-21', '2001-07-01', NULL, NULL, NULL),
(165, '', 'Krosbin Meilandi Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-05-28', '2011-07-01', NULL, NULL, NULL),
(166, '', 'Kurnia C. Darmi Girsang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-03-16', '2015-11-01', NULL, NULL, NULL),
(167, '', 'Lenni Marintan Damanik', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1977-11-23', '2004-12-28', NULL, NULL, NULL),
(168, '', 'Lesna Vrihatini Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-01-22', '2014-06-15', NULL, NULL, NULL),
(169, '', 'Letnan Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1981-12-28', '2009-06-01', NULL, NULL, NULL),
(170, '', 'Liharman Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1959-12-22', '1988-04-04', NULL, NULL, NULL),
(171, '', 'Liharson Sigiro', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1972-02-28', '2002-12-26', NULL, NULL, NULL),
(172, '', 'Lop Devijon Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1964-06-15', '1994-07-15', NULL, NULL, NULL),
(173, '', 'Lusermon Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1983-09-06', '2012-06-03', NULL, NULL, NULL),
(174, '', 'M. Rumanja Purba', 'MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-04-28', '1988-04-04', NULL, NULL, NULL),
(175, '', 'Maijon Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1966-10-26', '1995-07-15', NULL, NULL, NULL),
(176, '', 'Mangara H. Sipayung', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(177, '', 'Mannes Purba', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1974-06-15', '2003-12-07', NULL, NULL, NULL),
(178, 'Drs.', 'Mardison Sahat Maruli Simanjorang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1969-03-05', '2004-12-28', NULL, NULL, NULL),
(179, '', 'Marganda Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-02-18', '2015-08-23', NULL, NULL, NULL),
(180, '', 'Maria M. V. Girsang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1976-01-19', '2004-12-28', NULL, NULL, NULL),
(181, '', 'Marlan Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1966-05-03', '1995-07-15', NULL, NULL, NULL),
(182, '', 'Marsen Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1966-05-03', '1997-07-01', NULL, NULL, NULL),
(183, 'Dr.', 'Martin Lukito Sinaga', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1968-04-12', '1994-07-15', NULL, NULL, NULL),
(184, '', 'Marudin Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1969-12-06', '2000-06-14', NULL, NULL, NULL),
(185, '', 'Maruli Tuah Sinaga', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1980-01-09', '2009-06-01', NULL, NULL, NULL),
(186, '', 'Masniari Damanik', 'STh, MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1969-04-11', '1998-06-15', NULL, NULL, NULL),
(187, '', 'Masria Girsang', 'STh, MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1970-02-23', '2001-07-01', NULL, NULL, NULL),
(188, '', 'Massaril Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1967-04-23', '1995-07-15', NULL, NULL, NULL),
(189, '', 'Mawarisa Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-05-11', '2012-06-03', NULL, NULL, NULL),
(190, '', 'Mega Rozayani Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-03-13', '2012-06-03', NULL, NULL, NULL),
(191, '', 'Melena Fransiska Turnip', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-02-07', '2011-06-01', NULL, NULL, NULL),
(192, '', 'Melisa Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1984-08-19', '2012-06-03', NULL, NULL, NULL),
(193, '', 'Menni Rosita Purba', 'MTh', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1965-01-05', '1994-07-15', NULL, NULL, NULL),
(194, '', 'Mercy Anna Saragih', 'MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1970-10-22', '1997-06-08', NULL, NULL, NULL),
(195, '', 'Mertiolina Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-06-16', '2010-05-17', NULL, NULL, NULL),
(196, '', 'Mikhael Zwingli Sipayung', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1972-09-17', '2002-06-30', NULL, NULL, NULL),
(197, '', 'Monika R. Simanjorang', 'SSi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1989-04-25', '2015-11-01', NULL, NULL, NULL),
(198, '', 'Naek H. Damanik', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1967-09-21', '1995-07-02', NULL, NULL, NULL),
(199, '', 'Nantiaman Saragih', '?', 3, 1, '?', '?', '?', '?', '?', '?', '1953-05-12', '1984-11-18', '2016-01-01', NULL, NULL),
(200, '', 'Nirmala Ch. W. Sinaga', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1973-04-23', '2003-12-07', NULL, NULL, NULL),
(201, '', 'Nolden Lingga', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1971-12-17', '2002-06-30', NULL, NULL, NULL),
(202, '', 'Novel Saragih', 'STh, MSi', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1973-11-12', '2002-06-30', NULL, NULL, NULL),
(203, '', 'Novita Dwiyana Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-07-11', '2015-08-23', NULL, NULL, NULL),
(204, '', 'Novrando Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-11-29', '2012-06-03', NULL, NULL, NULL),
(205, '', 'Nurita Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1973-12-14', '2002-12-26', NULL, NULL, NULL),
(206, '', 'Nurmalayanti Sirait', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-01-01', '2012-06-03', NULL, NULL, NULL),
(207, '', 'Oberlin Silalahi', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1972-10-12', '2003-12-07', NULL, NULL, NULL),
(208, '', 'Pandapotan Haloho', 'STh, MBA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1957-04-21', '1983-11-15', NULL, NULL, NULL),
(209, '', 'Paran Leo Girsang', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1982-07-06', '2010-05-17', NULL, NULL, NULL),
(210, '', 'Parlin M. P. Damanik', 'STh, MA, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1966-01-05', '1999-07-01', NULL, NULL, NULL),
(211, '', 'Parulian Saragih', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(212, '', 'Parulihan Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1989-11-09', '2015-08-23', NULL, NULL, NULL),
(213, 'Dr.', 'Paul Ulrich Munthe', 'STh, MTh', 5, 1, 'Pria', '?', '?', '?', '?', '?', '1969-10-31', '1996-08-15', NULL, NULL, NULL),
(214, '', 'Pendi J. Sinaga', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(215, '', 'Philip Dexter Doloksaribu', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1988-01-19', '2013-02-06', NULL, NULL, NULL),
(216, '', 'Posma Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1973-10-30', '2004-12-28', NULL, NULL, NULL),
(217, '', 'Rakutta Ginting', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1971-03-04', '2002-06-30', NULL, NULL, NULL),
(218, '', 'Ramasni Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-12-05', '2013-02-06', NULL, NULL, NULL),
(219, '', 'Rameyana Damanik', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1980-08-08', '2010-05-17', NULL, NULL, NULL),
(220, '', 'Rasmidin Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1956-08-02', '1985-06-02', NULL, NULL, NULL),
(221, '', 'Rawalfen Saragih', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(222, '', 'Rebin J. Girsang', '?', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(223, '', 'Relson Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1972-05-15', '2003-12-07', NULL, NULL, NULL),
(224, '', 'Reni Erlina Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-12-14', '2013-02-06', NULL, NULL, NULL),
(225, '', 'Renni Hotmaida Damanik', 'STh, MSi', 4, 1, 'Wanita', '?', '?', '?', '?', '?', '1970-07-02', '1999-06-13', NULL, NULL, NULL),
(226, '', 'Repi Spana Dewi Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-12-17', '2015-08-23', NULL, NULL, NULL),
(227, '', 'Ria Ferawaty Malau', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-02-17', '2013-02-06', NULL, NULL, NULL),
(228, '', 'Riando Tondang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1969-03-23', '2001-07-01', NULL, NULL, NULL),
(229, '', 'Richard H. Siboro', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1969-07-26', '1995-07-15', NULL, NULL, NULL),
(230, '', 'Rina Winda Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-12-09', '2015-11-01', NULL, NULL, NULL),
(231, '', 'Robendi Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1985-12-31', '2012-06-03', NULL, NULL, NULL),
(232, '', 'Robert J. Saragih', 'MTh. LM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1963-03-14', '1990-04-16', NULL, NULL, NULL),
(233, '', 'Rodearni Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1984-11-26', '2012-06-03', NULL, NULL, NULL),
(234, '', 'Rohma Yuli Shovia Sinaga', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-09-06', '2015-11-01', NULL, NULL, NULL),
(235, 'Dr.', 'Rohni Pasu Sinaga', 'STh, MTh', 5, 1, 'Wanita', '?', '?', '?', '?', '?', '1969-10-05', '1999-07-01', NULL, NULL, NULL),
(236, '', 'Rolandi H. Situmorang', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1984-11-21', '2011-06-01', NULL, NULL, NULL),
(237, '', 'Roma Ulinta Girsang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1986-03-12', '2012-06-03', NULL, NULL, NULL),
(238, '', 'Romesty Silalahi', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1981-08-18', '2010-05-17', NULL, NULL, NULL),
(239, '', 'Rosenila Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1968-07-24', '2002-07-01', NULL, NULL, NULL),
(240, '', 'Rosma Dameria Sinaga', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-03-06', '2012-06-03', NULL, NULL, NULL),
(241, '', 'Rudiaman Saragih', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1972-09-08', '2002-06-30', NULL, NULL, NULL),
(242, '', 'Rudiarto Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1989-05-04', '2014-06-15', NULL, NULL, NULL),
(243, '', 'Rudyard Nicolson Saragih', 'Ssi. Teol', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1978-03-18', '2007-06-02', NULL, NULL, NULL),
(244, '', 'Rugun Romega Simanjorang', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-02-18', '2012-06-03', NULL, NULL, NULL),
(245, '', 'Rumides Hotnita Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-12-04', '2012-06-03', NULL, NULL, NULL),
(246, '', 'Ruslend Munthe', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1958-10-14', '1988-04-04', NULL, NULL, NULL),
(247, '', 'Rusmala Dewi Munthe', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1967-06-27', '1995-07-15', NULL, NULL, NULL),
(248, '', 'Ruth Liana Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-08-09', '2012-06-03', NULL, NULL, NULL),
(249, '', 'S. A. Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(250, '', 'Samson Manik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1986-04-24', '2015-08-23', NULL, NULL, NULL),
(251, '', 'Sanpendawati Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1972-02-25', '2002-06-30', NULL, NULL, NULL),
(252, '', 'Sardo Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1989-05-29', '2014-06-15', NULL, NULL, NULL),
(253, '', 'Sariahma Debora Damanik', 'SSi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-07-24', '2014-06-15', NULL, NULL, NULL),
(254, '', 'Sariaman Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1965-05-29', '1992-11-22', NULL, NULL, NULL),
(255, '', 'Sarifin Saragih', 'MTh', 4, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(256, '', 'Sarikat Purba', 'STh, MM', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1970-05-26', '2001-06-24', NULL, NULL, NULL),
(257, '', 'Sarintan Silalahi', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1977-02-16', '2004-12-28', NULL, NULL, NULL),
(258, '', 'Sarinus Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1965-09-25', '1991-08-15', NULL, NULL, NULL),
(259, '', 'Sarmen Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1983-02-14', '2011-06-01', NULL, NULL, NULL),
(260, '', 'Saudin Damanik', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(261, '', 'Saur Pardomuan Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1955-06-19', '1982-04-12', '2016-01-01', NULL, NULL),
(262, '', 'Sefrida Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-12-17', '2013-01-12', NULL, NULL, NULL),
(263, '', 'Sophia Eirene Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-04-05', '2013-01-12', NULL, NULL, NULL),
(264, '', 'Sorta Ulina Damanik', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1973-10-08', '2003-12-07', NULL, NULL, NULL),
(265, '', 'Sri Apriany Gloria Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1989-04-01', '2015-08-23', NULL, NULL, NULL),
(266, '', 'Sri Johana Purba Karo-karo', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1989-09-15', '2015-08-23', NULL, NULL, NULL),
(267, '', 'Sudiarlensius Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1960-12-12', '1988-04-04', NULL, NULL, NULL),
(268, '', 'Syahril Sitopu', 'STh, MA', 4, 1, 'Pria', '?', '?', '?', '?', '?', '1961-05-09', '1988-04-04', NULL, NULL, NULL),
(269, '', 'Syahrudin Purba', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1955-05-12', '1986-06-01', '2016-01-01', NULL, NULL),
(270, '', 'Syahrudin Sinaga', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1976-03-01', '2004-12-28', NULL, NULL, NULL),
(271, '', 'Topni Letare Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-03-22', '2012-06-03', NULL, NULL, NULL),
(272, '', 'Tri Putri Ida Rohdearni Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1975-01-20', '2003-12-07', NULL, NULL, NULL),
(273, '', 'Vivia Perpetua Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1959-07-04', '1988-04-04', NULL, NULL, NULL),
(274, 'Drs.', 'Waldemar Saragih', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1957-10-16', '1991-08-15', NULL, NULL, NULL),
(275, '', 'Washington Girsang', '?', 3, 1, '?', '?', '?', '?', '?', '?', '1955-03-16', '1980-10-19', '2016-01-01', NULL, NULL),
(276, '', 'Wilmar Girsang', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1956-04-07', '1982-04-12', NULL, NULL, NULL),
(277, '', 'Yani Apoh Saragih', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1987-07-05', '2013-01-12', NULL, NULL, NULL),
(278, '', 'Yeni Sepliani Purba', 'Ssi. Teol', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1988-07-08', '2015-11-01', NULL, NULL, NULL),
(279, '', 'Yulianita Siska Sipayung', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1985-07-17', '2012-06-03', NULL, NULL, NULL),
(280, '', 'Yuspina Margaretha Purba', 'STh', 3, 1, 'Wanita', '?', '?', '?', '?', '?', '1983-03-20', '2012-06-03', NULL, NULL, NULL),
(281, '', 'Zenriahman Sipayung', 'STh', 3, 1, 'Pria', '?', '?', '?', '?', '?', '1975-03-04', '2007-06-02', NULL, NULL, NULL),
(282, '', 'Basaria Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(283, '', 'Cici Ernike Simarmata', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1991-01-16', '2015-08-23', NULL, NULL, NULL),
(284, '', 'Dame Erlida Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1981-02-22', '2010-05-17', NULL, NULL, NULL),
(285, '', 'Daniel Lativ P. Tondang', '?', 3, 2, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(286, '', 'Darliana Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1989-04-04', '2013-06-02', NULL, NULL, NULL),
(287, '', 'Denni R. Damanik', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1969-09-17', '1995-03-01', NULL, NULL, NULL),
(288, '', 'Dertina Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1960-05-01', '1983-11-01', NULL, NULL, NULL),
(289, '', 'Eka Mahgdalena Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1988-05-10', '2013-06-02', NULL, NULL, NULL),
(290, '', 'Ella Respelita Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1971-06-05', '1994-01-01', NULL, NULL, NULL),
(291, '', 'Elmaria Silalahi', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1964-09-14', '1986-06-01', NULL, NULL, NULL),
(292, '', 'Erlina Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1976-07-11', '2002-06-30', NULL, NULL, NULL),
(293, '', 'Ermi Nurmaida Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1974-07-03', '2001-08-01', NULL, NULL, NULL),
(294, '', 'Ersihotni Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1984-08-23', '2011-05-22', NULL, NULL, NULL),
(295, '', 'Esnalida Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1969-11-24', '1996-08-01', NULL, NULL, NULL),
(296, '', 'Esrawany Sinaga', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1989-06-04', '2013-12-12', NULL, NULL, NULL),
(297, '', 'Esterlina Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1980-10-20', '2007-06-02', NULL, NULL, NULL),
(298, '', 'Febriani Damanik', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1987-02-20', '2011-05-22', NULL, NULL, NULL),
(299, '', 'Frisda Dearni Sipayung', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1989-05-02', '2013-06-02', NULL, NULL, NULL),
(300, '', 'Henny Mariani Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(301, '', 'Henrisna Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1972-10-16', '1995-03-01', NULL, NULL, NULL),
(302, '', 'Hetty Moy Lisda Sipayung', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1988-06-19', '2013-12-12', NULL, NULL, NULL),
(303, '', 'Horasmaida Sinurat', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1964-07-12', '1984-12-01', NULL, NULL, NULL),
(304, '', 'Hormaita Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1963-05-03', '1984-12-01', NULL, NULL, NULL),
(305, '', 'Hotmaria Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1965-08-03', '1995-03-01', NULL, NULL, NULL),
(306, '', 'Hotmarina Sinaga', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1975-10-30', '2002-06-30', NULL, NULL, NULL),
(307, '', 'Hotmauli Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(308, '', 'Joseph Sipayung', '?', 3, 2, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(309, '', 'Julita R. Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1970-07-17', '1997-06-01', NULL, NULL, NULL),
(310, '', 'Juni Armelince Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1972-06-29', '1997-06-01', NULL, NULL, NULL),
(311, '', 'Karmianna Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1975-05-27', '2000-06-01', NULL, NULL, NULL),
(312, '', 'Kastaria Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1961-08-27', '1984-12-01', NULL, NULL, NULL),
(313, '', 'Krisman R. Sipayung', '?', 3, 2, 'Pria', '?', '?', '?', '?', '?', '1969-07-24', '1997-06-01', NULL, NULL, NULL),
(314, '', 'Lamria E. Sitanggang', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1976-07-30', '2002-06-30', NULL, NULL, NULL),
(315, '', 'Larmawati Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1975-01-19', '2001-08-01', NULL, NULL, NULL),
(316, '', 'Lavansius Purba', '?', 3, 2, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(317, '', 'Lely Sriwati Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1985-07-20', '2011-05-22', NULL, NULL, NULL),
(318, '', 'Lermianna Girsang', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(319, '', 'Lertina Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1963-05-29', '1984-12-01', NULL, NULL, NULL),
(320, '', 'Lesnaria Damanik', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1971-08-04', '1996-08-01', NULL, NULL, NULL),
(321, '', 'Lesnaria Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(322, '', 'Lestari Sitompul', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1985-03-22', '2011-05-22', NULL, NULL, NULL),
(323, '', 'Lilis Suryani Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1967-05-25', '1990-09-01', NULL, NULL, NULL),
(324, '', 'Limerdame Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1963-05-30', '1984-12-01', NULL, NULL, NULL),
(325, '', 'Lindewati Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1975-03-05', '2001-08-01', NULL, NULL, NULL),
(326, '', 'Mahrani Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1972-09-14', '1999-06-01', NULL, NULL, NULL),
(327, '', 'Mannaida Sinaga', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1963-07-04', '1984-12-01', NULL, NULL, NULL),
(328, '', 'Mariani Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1970-02-08', '1995-03-01', NULL, NULL, NULL),
(329, '', 'Marliani Sinaga', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1975-10-19', '2002-06-30', NULL, NULL, NULL),
(330, '', 'Marsianna Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(331, '', 'Masnarena Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1956-02-11', '1984-12-01', NULL, NULL, NULL),
(332, '', 'Melti Naria Sumbayak', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1989-10-02', '2015-08-23', NULL, NULL, NULL),
(333, '', 'Meni Suryati Damanik', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1969-05-04', '1990-09-01', NULL, NULL, NULL),
(334, '', 'Menni R. Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1964-04-24', '1984-12-01', NULL, NULL, NULL),
(335, '', 'Murni Sari Sinaga', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1971-01-05', '1997-06-01', NULL, NULL, NULL),
(336, '', 'Narsinta Manik', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1967-11-10', '1997-06-01', NULL, NULL, NULL),
(337, '', 'Nemmy Damanik', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(338, '', 'Normina Saragih', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', '1971-05-30', '1994-06-01', NULL, NULL, NULL),
(339, '', 'Nurempi Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1972-11-15', '1995-03-01', NULL, NULL, NULL),
(340, '', 'Nurlinda Turnip', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1961-06-23', '1984-12-01', NULL, NULL, NULL),
(341, '', 'Nurmida saragih ', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1957-03-19', '1979-06-01', NULL, NULL, NULL),
(342, '', 'Omasnauli Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1972-12-31', '2002-06-30', NULL, NULL, NULL),
(343, '', 'Pasma R. Sitanggang', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1963-06-15', '1984-12-01', NULL, NULL, NULL),
(344, '', 'Pitriani Sinaga', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-01-21', '1995-03-01', NULL, NULL, NULL),
(345, '', 'Rasianna Damanik', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-04-21', '1997-06-01', NULL, NULL, NULL),
(346, '', 'Rasita Kembaren', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1975-04-16', '2003-01-01', NULL, NULL, NULL),
(347, '', 'Rellianna Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1969-11-23', '1997-06-01', NULL, NULL, NULL),
(348, '', 'Ris Suryani Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1968-12-29', '1994-06-01', NULL, NULL, NULL),
(349, '', 'Risdamenni Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1962-02-12', '1983-11-01', NULL, NULL, NULL),
(350, '', 'Rismawati Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1976-02-06', '2003-01-01', NULL, NULL, NULL),
(351, '', 'Risna Hotmarina Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1986-05-23', '2011-05-22', NULL, NULL, NULL),
(352, '', 'Risnaulina Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1973-04-09', '2001-08-01', NULL, NULL, NULL),
(353, '', 'Rohni H. Sipayung', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1972-07-06', '1999-06-01', NULL, NULL, NULL),
(354, '', 'Rolina Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1968-01-21', '1994-01-01', NULL, NULL, NULL),
(355, '', 'Rolince Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1974-09-11', '2002-06-30', NULL, NULL, NULL),
(356, '', 'Rose Adelina Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-08-12', '1999-07-01', NULL, NULL, NULL),
(357, '', 'Rosenny Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1975-11-19', '2002-06-30', NULL, NULL, NULL),
(358, '', 'Rosliana Sinaga', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1975-06-11', '2003-01-01', NULL, NULL, NULL),
(359, '', 'Rosliani Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1964-04-15', '1984-12-01', NULL, NULL, NULL),
(360, '', 'Roslinda Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1960-04-17', '1984-12-01', NULL, NULL, NULL),
(361, '', 'Rosmalina Damanik', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1969-03-12', '1990-09-01', NULL, NULL, NULL),
(362, '', 'Rosmaulina Naibaho', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-06-14', '1995-03-01', NULL, NULL, NULL),
(363, '', 'Rosmi Deliana Sinaga', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-03-06', '1997-06-01', NULL, NULL, NULL),
(364, '', 'Rosni Oktinar Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1972-10-03', '1995-03-01', NULL, NULL, NULL),
(365, '', 'Rouse Dearni Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1967-11-25', '1989-06-01', NULL, NULL, NULL),
(366, '', 'Rusmeri Haloho', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-06-08', '1995-03-01', NULL, NULL, NULL),
(367, '', 'Santi Rotua Sinaga', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1971-10-25', '1994-01-01', NULL, NULL, NULL),
(368, '', 'Sartianna Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1961-12-16', '1984-12-01', NULL, NULL, NULL),
(369, '', 'Saulina Purba', '?', 3, 2, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(370, '', 'Selya M. Sinaga', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1982-09-12', '2007-06-02', NULL, NULL, NULL),
(371, '', 'Serma H. Girsang', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1973-10-19', '1999-07-01', NULL, NULL, NULL),
(372, '', 'Sinta Marni Purba', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1970-06-24', '1995-03-01', NULL, NULL, NULL),
(373, '', 'Supiana Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1985-07-22', '2010-05-17', NULL, NULL, NULL),
(374, '', 'Surianita Saragih', '?', 3, 2, '?', '?', '?', '?', '?', '?', '1983-06-02', '2012-06-03', NULL, NULL, NULL),
(375, '', 'Tanim Simarmata', '?', 3, 2, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(376, '', 'Dirmansen Sinaga', '?', 1, 5, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(377, '', 'Linson Sinaga', '?', 1, 5, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(378, '', 'Minarlina Purba', '?', 1, 5, 'Wanita', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL),
(379, '', 'Risdewan Saragih', '?', 1, 5, 'Pria', '?', '?', '?', '?', '?', NULL, NULL, '2016-01-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `full_timer_jabatan`
--

CREATE TABLE `full_timer_jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `full_timer_jabatan`
--

INSERT INTO `full_timer_jabatan` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Pendeta', 'Pendeta sebagai pemimpin jemaat'),
(2, 'Penginjil', 'Pelayan penyebaran Injil'),
(3, 'Dokter', 'Pelayan dalam bidang kesehatan'),
(4, 'Pengajar', 'Full timer yang mengajar pendidikan Kristen di sekolah'),
(5, 'Sintua', 'Posisi full timer sebagain Sintua atau Penatua');

-- --------------------------------------------------------

--
-- Table structure for table `full_timer_strata`
--

CREATE TABLE `full_timer_strata` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `full_timer_strata`
--

INSERT INTO `full_timer_strata` (`id`, `nama`) VALUES
(1, 'Tidak Ada'),
(2, 'D3'),
(3, 'S1'),
(4, 'S2'),
(5, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `gelar`
--

CREATE TABLE `gelar` (
  `id` int(11) NOT NULL,
  `singkatan` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `posisi` enum('belakang','depan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gelar`
--

INSERT INTO `gelar` (`id`, `singkatan`, `nama`, `posisi`) VALUES
(1, 'S.Th.', 'Sarjana Theologia', 'belakang'),
(2, 'S.Si. (Teol.)', 'Sarjana Sains (Teologi)', 'belakang'),
(3, 'M.Th.', 'Magister Theologia', 'belakang'),
(4, 'M.Th. LM', 'Master of Theology (Liturgical Music)', 'belakang'),
(5, 'M.Sc.', 'Master of Science', 'belakang'),
(6, 'M.Si.', 'Magister Sains', 'belakang'),
(7, 'M.A.', 'Master of Arts', 'belakang'),
(8, 'M.M.', 'Magister Manajemen', 'belakang'),
(9, 'M.Pd.', 'Magister Pendidikan', 'belakang'),
(10, 'M.B.A', 'Master of Business Arts', 'belakang'),
(11, 'M.Min.', 'Master of Ministry', 'belakang'),
(12, 'M.S.Litt.', 'Master of Sacred Literature', 'belakang'),
(13, 'Ph.D.', 'Doctor of Philosophy', 'belakang'),
(14, 'Dr.', 'Doctor', 'depan'),
(15, 'Drs.', 'Doktorandus', 'depan'),
(16, 'Kol.', 'Kolonel', 'depan'),
(17, 'May.', 'Mayor', 'depan');

-- --------------------------------------------------------

--
-- Table structure for table `internal_org`
--

CREATE TABLE `internal_org` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `super_id` int(11) DEFAULT NULL,
  `level_internal_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_internal_org_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `super_id` int(11) DEFAULT NULL,
  `level_jemaat_id` int(11) NOT NULL,
  `deskripsi` text,
  `alamat` text,
  `telp` varchar(30) NOT NULL DEFAULT '0622-111111',
  `email` varchar(50) NOT NULL,
  `tanggal_berdiri` date DEFAULT NULL,
  `status_jemaat_id` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`id`, `nama`, `super_id`, `level_jemaat_id`, `deskripsi`, `alamat`, `telp`, `email`, `tanggal_berdiri`, `status_jemaat_id`) VALUES
(1, 'Sinode GKPS', NULL, 0, 'Sinode Jemaat GKPS sebagai lembaga tertinggi dalam struktur jemaat GKPS', NULL, '0622-111111', 'sinode@gkps.or.id', NULL, 3),
(2, 'I', 1, 1, 'Berkedudukan di Pematang Siantar, terdiri atas 28 resort, yang menaungi 132 jemaat.', 'Pematangsiantar', '0622-111111', 'distrik1@gkps.or.id', NULL, 3),
(3, 'II', 1, 1, 'Berkedudukan di Pematang Raya, terdiri atas 15 resort, yang menaungi 88 jemaat.', 'Pematangraya', '0622-111111', 'distrik2@gkps.or.id', NULL, 3),
(4, 'III', 1, 1, 'Berkedudukan di Saribudolok, terdiri atas 23 resort, yang menaungi 124 jemaat.', 'Saribudolok', '0622-111111', 'distrik3@gkps.or.id', NULL, 3),
(5, 'IV', 1, 1, 'Berkedudukan di Medan, terdiri atas 17 resort, yang menaungi 93 jemaat.', 'Medan', '0622-111111', 'distrik4@gkps.or.id', NULL, 3),
(6, 'V', 1, 1, 'Berkedudukan di Tebing Tinggi, terdiri atas 18 resort, yang menaungi 99 jemaat.', 'Tebingtinggi', '0622-111111', 'distrik5@gkps.or.id', NULL, 3),
(7, 'VI', 1, 1, 'Berkedudukan di Pekanbaru, terdiri atas 11 resort, yang menaungi 52 jemaat.', 'Pekanbaru', '0622-111111', 'distrik6@gkps.or.id', NULL, 3),
(8, 'VII', 1, 1, 'Berkedudukan di Jakarta, terdiri atas 12 resort, yang menaungi 50 jemaat.', 'Jakarta', '0622-111111', 'distrik7@gkps.or.id', NULL, 3),
(9, 'VIII', 1, 1, 'Diresmikan pada Minggu, 23 Maret 2014, merupakan pemekaran Rayon Serdang (9 resort) dari Distrik IV. Berkedudukan di Galang, terdiri atas 9 resort, yang menaungi 93 jemaat.', 'Galang', '0622-111111', 'distrik8@gkps.or.id', '2014-03-23', 3),
(10, 'Tangerang', 8, 2, 'Resort di Tangerang', 'Tangerang', '0622-111111', 'resorttangerang@gkps.or.id', NULL, 3),
(11, 'Tegal Alur', 10, 3, 'Jemaat Tegal Alur', 'Tegal Alur, Tangerang', '0622-111111', 'gkpstegalalur@gkps.or.id', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jemaat_details`
--

CREATE TABLE `jemaat_details` (
  `id` int(11) NOT NULL,
  `jemaat_id` int(11) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `geo_lat` int(11) NOT NULL,
  `geo_long` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `karir`
--

CREATE TABLE `karir` (
  `id` int(11) NOT NULL,
  `full_timer_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `penempatan_id` int(11) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karir`
--

INSERT INTO `karir` (`id`, `full_timer_id`, `posisi_id`, `penempatan_id`, `tanggal_mulai`) VALUES
(1, 1, 13, 55, '1994-07-15'),
(2, 1, 13, 98, '1998-06-15'),
(3, 1, 27, 278, '1999-06-01'),
(4, 1, 13, 211, '2002-07-01'),
(5, 1, 23, 78, '2005-07-19'),
(6, 1, 23, 77, '2010-07-16'),
(7, 1, 23, 80, '2015-07-10'),
(8, 2, 13, 139, '1995-07-15'),
(9, 2, 13, 104, '2000-08-15'),
(10, 2, 13, 210, '2006-06-01'),
(11, 2, 13, 272, '2010-07-16'),
(12, 2, 13, 269, '2013-06-17'),
(13, 3, 13, 89, '2014-07-01'),
(14, 4, 13, 128, '2007-06-02'),
(15, 4, 13, 178, '2010-07-16'),
(16, 5, 14, 224, '2000-06-14'),
(17, 5, 13, 231, '2000-07-01'),
(18, 5, 27, 250, '2002-07-01'),
(19, 5, 2, 250, '2005-03-01'),
(20, 6, 13, 156, '2011-06-01'),
(21, 7, 13, 57, '1998-06-15'),
(22, 7, 13, 256, '2003-12-07'),
(23, 7, 13, 153, '2006-06-01'),
(24, 7, 13, 233, '2012-06-16'),
(25, 7, 13, 233, '2012-07-17'),
(26, 8, 13, 190, '2002-07-01'),
(27, 8, 27, 249, '2007-09-17'),
(28, 8, 13, 220, '2011-06-01'),
(29, 8, 4, 72, '2015-07-10'),
(30, 9, 13, 238, '2006-06-01'),
(31, 9, 13, 91, '2012-07-17'),
(32, 9, 4, 73, '2015-07-10'),
(33, 10, 13, 247, '1992-12-01'),
(34, 10, 13, 107, '1996-08-15'),
(35, 10, 14, 163, '1998-06-15'),
(36, 10, 13, 111, '1999-11-21'),
(37, 10, 13, 96, '2000-07-01'),
(38, 10, 4, 72, '2004-06-15'),
(39, 10, 13, 94, '2005-07-19'),
(40, 10, 23, 81, '2010-07-16'),
(41, 10, 13, 155, '2015-07-10'),
(42, 11, 14, 271, '2002-07-01'),
(43, 11, 13, 178, '2004-06-15'),
(44, 11, 13, 210, '2010-07-16'),
(45, 11, 4, 45, '2013-01-02'),
(46, 12, 13, 275, '2013-06-17'),
(47, 13, 13, 23, '2015-09-01'),
(48, 14, 14, 181, '1995-07-15'),
(49, 14, 13, 182, '1996-03-15'),
(50, 14, 13, 129, '2001-07-01'),
(51, 14, 13, 184, '2007-06-02'),
(52, 14, 13, 219, '2013-06-17'),
(53, 14, 4, 248, '2015-09-01'),
(54, 15, 13, 210, '2015-09-01'),
(55, 16, 13, 59, '2012-06-16'),
(56, 16, 13, 109, '2014-02-06'),
(57, 17, 13, 97, '2013-06-17'),
(58, 18, 13, 60, '2012-06-16'),
(59, 18, 13, 108, '2014-10-12'),
(60, 19, 13, 153, '1989-06-01'),
(61, 19, 13, 224, '1995-07-15'),
(62, 19, 27, 122, '2000-02-15'),
(63, 19, 14, 65, '2003-01-01'),
(64, 19, 14, 64, '2005-07-19'),
(65, 19, 13, 180, '2008-09-16'),
(66, 19, 23, 83, '2010-07-16'),
(67, 19, 4, 73, '2012-06-16'),
(68, 19, 18, 83, '2015-07-10'),
(69, 20, 13, 96, '2004-06-15'),
(70, 20, 13, 191, '2010-07-16'),
(71, 21, 13, 182, '1985-07-01'),
(72, 21, 13, 181, '1989-06-01'),
(73, 21, 27, 249, '1995-11-01'),
(74, 21, 13, 143, '1999-01-15'),
(75, 21, 10, 127, '2000-06-01'),
(76, 21, 13, 224, '2001-07-01'),
(77, 21, 2, 250, '2006-06-01'),
(78, 21, 27, 249, '2008-08-19'),
(79, 21, 13, 106, '2014-07-01'),
(80, 22, 13, 103, '2015-01-16'),
(81, 23, 13, 86, '2013-06-17'),
(82, 25, 13, 215, '2013-06-17'),
(83, 27, 13, 275, '2000-07-01'),
(84, 27, 14, 143, '2003-10-16'),
(85, 27, 14, 222, '2007-09-19'),
(86, 27, 13, 240, '2010-03-01'),
(87, 27, 13, 270, '2015-07-10'),
(88, 28, 13, 153, '2015-09-01'),
(89, 29, 13, 139, '2008-06-16'),
(90, 29, 13, 153, '2012-06-16'),
(91, 30, 13, 238, '2015-01-16'),
(92, 33, 13, 100, '2001-07-01'),
(93, 33, 27, 279, '2004-09-06'),
(94, 33, 10, 280, '2007-05-01'),
(95, 33, 27, 202, '2013-06-17'),
(96, 34, 13, 95, '2015-09-01'),
(97, 35, 13, 102, '2015-09-01'),
(98, 36, 13, 242, '2013-06-17'),
(99, 36, 13, 98, '2014-07-01'),
(100, 37, 13, 187, '1995-06-15'),
(101, 37, 4, 41, '1999-09-01'),
(102, 37, 4, 34, '2002-01-15'),
(103, 37, 27, 195, '2002-08-01'),
(104, 37, 4, 74, '2005-07-19'),
(105, 37, 4, 45, '2006-06-01'),
(106, 37, 27, 202, '2009-03-02'),
(107, 37, 2, 250, '2013-08-18'),
(108, 38, 13, 54, '2014-07-01'),
(109, 39, 13, 99, '2011-06-01'),
(110, 40, 14, 185, '2002-07-01'),
(111, 40, 14, 169, '2003-02-15'),
(112, 40, 13, 103, '2004-08-29'),
(113, 40, 13, 267, '2007-06-02'),
(114, 40, 13, 268, '2010-03-01'),
(115, 41, 13, 5, '2010-05-17'),
(116, 41, 13, 4, '2010-10-01'),
(117, 42, 13, 193, '2008-06-16'),
(118, 42, 27, 171, '2012-01-16'),
(119, 42, 27, 6, '2014-02-12'),
(120, 43, 13, 179, '2013-06-17'),
(121, 44, 13, 87, '2013-06-17'),
(122, 45, 13, 237, '2013-06-17'),
(123, 46, 14, 269, '1990-05-01'),
(124, 46, 13, 139, '1990-07-07'),
(125, 46, 13, 189, '1995-06-15'),
(126, 46, 13, 148, '1998-06-15'),
(127, 46, 13, 233, '2004-12-01'),
(128, 46, 13, 144, '2012-07-17'),
(129, 47, 14, 153, '1986-06-01'),
(130, 47, 13, 214, '1987-07-15'),
(131, 47, 13, 97, '1991-08-15'),
(132, 47, 13, 159, '1998-03-13'),
(133, 47, 13, 94, '2000-07-01'),
(134, 47, 4, 72, '2005-07-19'),
(135, 47, 13, 217, '2010-07-16'),
(136, 47, 4, 47, '2015-07-10'),
(137, 48, 13, 192, '2001-07-01'),
(138, 48, 13, 103, '2007-06-01'),
(139, 48, 24, 273, '2010-07-16'),
(140, 48, 4, 67, '2011-06-01'),
(141, 49, 13, 192, '2011-06-01'),
(142, 50, 13, 85, '2012-06-16'),
(143, 51, 13, 207, '2004-06-15'),
(144, 51, 13, 16, '2009-06-01'),
(145, 51, 4, 38, '2015-09-01'),
(146, 54, 13, 139, '1985-07-01'),
(147, 54, 13, 244, '1988-04-15'),
(148, 54, 13, 229, '1994-06-15'),
(149, 54, 13, 152, '1998-06-15'),
(150, 54, 13, 77, '2000-01-01'),
(151, 54, 13, 89, '2000-07-01'),
(152, 54, 23, 81, '2003-07-15'),
(153, 54, 13, 189, '2004-06-15'),
(154, 54, 14, 267, '2006-06-01'),
(155, 54, 14, 80, '2007-06-02'),
(156, 55, 13, 157, '2013-06-17'),
(157, 56, 13, 268, '1985-07-01'),
(158, 56, 13, 52, '1987-07-15'),
(159, 56, 17, 80, '1994-11-15'),
(160, 56, 13, 219, '2000-07-01'),
(161, 56, 13, 142, '2004-06-15'),
(162, 56, 23, 81, '2005-07-19'),
(163, 56, 25, 112, '2010-07-16'),
(164, 56, 13, 167, '2015-07-10'),
(165, 57, 14, 222, '1997-07-01'),
(166, 57, 13, 161, '1999-07-01'),
(167, 57, 14, 176, '2002-07-01'),
(168, 57, 13, 89, '2008-06-16'),
(169, 57, 13, 29, '2014-07-01'),
(170, 58, 13, 216, '2009-06-01'),
(171, 58, 13, 264, '2012-09-01'),
(172, 58, 10, 154, '2015-09-01'),
(173, 59, 13, 206, '2014-07-01'),
(174, 60, 13, 28, '1988-04-15'),
(175, 60, 13, 210, '1990-07-07'),
(176, 60, 13, 140, '1994-07-15'),
(177, 60, 13, 269, '1998-03-13'),
(178, 60, 27, 277, '2000-01-01'),
(179, 60, 4, 46, '2002-07-01'),
(180, 60, 4, 74, '2004-02-16'),
(181, 60, 13, 222, '2005-07-19'),
(182, 60, 13, 64, '2007-09-19'),
(183, 60, 23, 83, '2010-01-15'),
(184, 60, 5, 133, '2010-07-16'),
(185, 61, 14, 220, '2006-06-01'),
(186, 61, 13, 220, '2008-09-23'),
(187, 61, 13, 119, '2010-07-16'),
(188, 62, 10, 112, '2004-11-28'),
(189, 62, 14, 56, '2007-06-02'),
(190, 62, 27, 249, '2010-08-01'),
(191, 62, 10, 74, '2013-10-01'),
(192, 62, 4, 42, '2014-07-01'),
(193, 62, 13, 107, '2015-07-10'),
(194, 63, 14, 256, '1997-07-01'),
(195, 63, 27, 277, '2000-10-01'),
(196, 63, 14, 260, '2007-06-02'),
(197, 63, 13, 61, '2009-08-01'),
(198, 64, 13, 214, '2001-07-01'),
(199, 64, 27, 249, '2003-12-07'),
(200, 64, 10, 115, '2007-06-02'),
(201, 64, 10, 116, '2007-09-19'),
(202, 64, 10, 72, '2011-06-01'),
(203, 64, 10, 116, '2015-07-10'),
(204, 65, 13, 156, '2010-05-17'),
(205, 65, 13, 31, '2010-07-16'),
(206, 65, 13, 222, '2013-06-17'),
(207, 65, 10, 72, '2014-07-01'),
(208, 65, 27, 171, '2015-07-10'),
(209, 66, 13, 150, '2003-07-01'),
(210, 66, 14, 143, '2009-06-01'),
(211, 66, 13, 96, '2010-07-16'),
(212, 67, 13, 258, '2011-06-01'),
(213, 67, 1, 175, '2012-06-16'),
(214, 68, 14, 209, '2002-07-01'),
(215, 68, 13, 185, '2003-07-15'),
(216, 68, 27, 195, '2011-01-01'),
(217, 68, 13, 211, '2014-01-02'),
(218, 68, 13, 211, '2015-07-10'),
(219, 70, 13, 243, '2012-06-16'),
(220, 71, 13, 87, '1987-11-01'),
(221, 71, 13, 161, '1993-06-01'),
(222, 71, 13, 184, '1999-07-01'),
(223, 71, 13, 100, '2004-12-01'),
(224, 71, 13, 266, '2009-06-01'),
(225, 71, 4, 37, '2013-06-17'),
(226, 72, 14, 226, '2008-06-01'),
(227, 72, 13, 232, '2009-12-10'),
(228, 72, 13, 245, '2014-07-01'),
(229, 73, 13, 153, '2000-07-01'),
(230, 73, 13, 255, '2003-02-15'),
(231, 73, 13, 262, '2010-07-16'),
(232, 74, 13, 150, '2015-01-16'),
(233, 75, 13, 234, '2007-06-02'),
(234, 75, 13, 130, '2012-06-16'),
(235, 75, 13, 138, '2014-07-01'),
(236, 76, 13, 156, '2014-01-02'),
(237, 76, 13, 30, '2014-03-09'),
(238, 77, 14, 163, '2000-06-14'),
(239, 77, 13, 191, '2001-01-01'),
(240, 77, 13, 134, '2006-06-01'),
(241, 77, 13, 270, '2012-06-16'),
(242, 77, 6, 106, '2013-06-17'),
(243, 78, 13, 15, '2012-06-24'),
(244, 79, 13, 207, '2013-06-17'),
(245, 80, 13, 118, '2015-09-01'),
(246, 81, 13, 93, '2013-06-17'),
(247, 81, 13, 91, '2015-07-10'),
(248, 82, 13, 7, '2007-06-02'),
(249, 82, 13, 244, '2013-06-17'),
(250, 83, 13, 8, '2003-01-01'),
(251, 83, 14, 58, '2006-06-01'),
(252, 83, 13, 214, '2008-06-16'),
(253, 83, 13, 266, '2013-06-17'),
(254, 85, 13, 11, '2015-09-01'),
(255, 86, 13, 134, '2003-12-07'),
(256, 86, 14, 283, '2006-06-01'),
(257, 86, 13, 85, '2007-06-02'),
(258, 86, 13, 244, '2012-06-16'),
(259, 86, 27, 200, '2013-06-17'),
(260, 86, 4, 45, '2015-05-09'),
(261, 87, 13, 136, '2011-06-01'),
(262, 87, 13, 214, '2013-06-17'),
(263, 88, 13, 179, '2009-06-01'),
(264, 88, 13, 144, '2013-06-17'),
(265, 89, 13, 215, '1987-07-15'),
(266, 89, 13, 98, '1993-06-01'),
(267, 89, 13, 189, '1998-06-15'),
(268, 89, 13, 25, '2004-06-15'),
(269, 89, 13, 256, '2010-07-16'),
(270, 90, 13, 226, '1984-12-01'),
(271, 90, 13, 247, '1985-07-01'),
(272, 90, 11, 112, '1990-07-01'),
(273, 90, 13, 163, '1992-12-01'),
(274, 90, 13, 146, '2000-07-01'),
(275, 90, 23, 82, '2005-07-19'),
(276, 90, 23, 80, '2010-07-16'),
(277, 90, 29, 1039, '2015-11-02'),
(278, 91, 13, 255, '2011-06-01'),
(279, 92, 13, 231, '1982-04-15'),
(280, 92, 13, 271, '1986-06-01'),
(281, 92, 13, 182, '1989-06-01'),
(282, 92, 4, 46, '1996-03-15'),
(283, 92, 13, 163, '2000-07-01'),
(284, 92, 14, 163, '2006-06-01'),
(285, 92, 13, 163, '2009-06-01'),
(286, 92, 8, 1039, '2015-06-01'),
(287, 93, 13, 96, '1991-08-15'),
(288, 93, 13, 100, '1997-07-01'),
(289, 93, 27, 200, '2001-06-11'),
(290, 93, 13, 113, '2004-02-16'),
(291, 93, 13, 226, '2006-06-01'),
(292, 93, 13, 140, '2011-06-01'),
(293, 94, 13, 55, '2013-06-17'),
(294, 95, 13, 275, '1988-04-15'),
(295, 95, 13, 233, '1994-07-15'),
(296, 95, 13, 210, '2000-07-01'),
(297, 95, 13, 256, '2006-06-01'),
(298, 95, 13, 94, '2010-07-16'),
(299, 95, 23, 84, '2014-04-01'),
(300, 95, 13, 113, '2015-07-10'),
(301, 96, 13, 214, '2003-12-07'),
(302, 96, 14, 176, '2008-06-16'),
(303, 96, 27, 171, '2013-06-17'),
(304, 100, 13, 88, '2007-06-02'),
(305, 100, 13, 282, '2012-06-16'),
(306, 101, 14, 100, '1990-05-01'),
(307, 101, 14, 163, '1990-07-07'),
(308, 101, 4, 75, '1995-01-01'),
(309, 101, 13, 256, '1999-07-01'),
(310, 101, 27, 171, '2003-12-07'),
(311, 101, 14, 52, '2007-09-19'),
(312, 101, 13, 31, '2009-06-01'),
(313, 101, 30, 106, '2010-07-16'),
(314, 101, 6, 106, '2011-04-06'),
(315, 101, 6, 281, '2013-06-17'),
(316, 102, 13, 148, '1986-06-01'),
(317, 102, 13, 207, '1989-06-01'),
(318, 102, 13, 143, '1996-03-15'),
(319, 102, 13, 214, '1998-06-15'),
(320, 102, 13, 131, '2001-07-01'),
(321, 102, 13, 43, '2006-06-01'),
(322, 102, 13, 104, '2012-06-16'),
(323, 103, 13, 148, '1989-06-01'),
(324, 103, 2, 250, '1991-08-15'),
(325, 103, 27, 92, '1995-06-01'),
(326, 103, 2, 250, '2003-07-15'),
(327, 103, 3, 112, '2010-07-16'),
(328, 103, 2, 250, '2015-07-01'),
(329, 104, 13, 241, '1996-06-01'),
(330, 104, 13, 56, '1987-07-15'),
(331, 104, 14, 20, '1995-02-15'),
(332, 104, 2, 250, '2000-06-01'),
(333, 104, 27, 149, '2002-10-01'),
(334, 104, 2, 250, '2005-07-19'),
(335, 104, 13, 21, '2010-07-16'),
(336, 107, 13, 128, '2013-06-17'),
(337, 108, 13, 178, '1989-06-01'),
(338, 108, 13, 212, '1991-08-15'),
(339, 108, 13, 229, '1998-06-16'),
(340, 108, 13, 143, '2004-06-15'),
(341, 108, 13, 52, '2010-08-01'),
(342, 110, 13, 271, '1989-06-01'),
(343, 110, 13, 94, '1995-07-15'),
(344, 110, 13, 181, '2000-07-01'),
(345, 110, 13, 107, '2002-07-01'),
(346, 110, 23, 79, '2005-07-19'),
(347, 110, 23, 82, '2010-07-16'),
(348, 110, 23, 83, '2015-07-10'),
(349, 111, 14, 113, '1986-06-01'),
(350, 111, 13, 119, '1987-07-17'),
(351, 111, 13, 148, '1993-11-01'),
(352, 111, 13, 107, '1998-06-15'),
(353, 111, 13, 222, '2002-07-01'),
(354, 111, 24, 39, '2004-02-16'),
(355, 111, 13, 143, '2010-08-01'),
(356, 112, 13, 58, '2009-06-01'),
(357, 112, 13, 95, '2011-06-01'),
(358, 112, 10, 69, '2015-09-01'),
(359, 113, 17, 83, '2002-07-01'),
(360, 113, 13, 55, '2006-06-01'),
(361, 113, 27, 195, '2006-06-02'),
(362, 113, 4, 72, '2010-07-16'),
(363, 113, 27, 172, '2012-06-16'),
(364, 113, 27, 202, '2012-08-01'),
(365, 114, 13, 96, '1989-07-01'),
(366, 114, 13, 113, '1991-08-15'),
(367, 114, 27, 195, '1993-03-01'),
(368, 114, 13, 181, '1995-11-01'),
(369, 114, 27, 172, '2000-05-15'),
(370, 114, 10, 127, '2001-07-01'),
(371, 114, 27, 205, '2002-01-14'),
(372, 114, 2, 250, '2009-06-16'),
(373, 115, 14, 229, '1989-07-01'),
(374, 115, 13, 232, '1990-07-07'),
(375, 115, 13, 176, '1997-07-01'),
(376, 115, 4, 46, '2000-07-01'),
(377, 115, 27, 198, '2002-04-01'),
(378, 115, 13, 56, '2004-06-15'),
(379, 115, 13, 269, '2010-07-16'),
(380, 116, 13, 17, '2001-07-01'),
(381, 116, 13, 182, '2007-06-02'),
(382, 116, 13, 242, '2012-06-16'),
(383, 118, 13, 96, '1997-07-01'),
(384, 118, 13, 85, '2000-07-01'),
(385, 118, 13, 98, '2004-12-01'),
(386, 118, 28, 125, '2009-06-01'),
(387, 117, 13, 87, '1997-07-01'),
(388, 117, 13, 181, '2002-07-01'),
(389, 117, 13, 159, '2010-07-16'),
(390, 120, 14, 60, '1999-07-01'),
(391, 120, 13, 282, '2003-01-01'),
(392, 120, 13, 129, '2007-01-02'),
(393, 120, 13, 222, '2012-06-16'),
(394, 121, 13, 16, '2015-09-01'),
(395, 124, 13, 99, '1988-04-15'),
(396, 124, 13, 113, '1993-03-01'),
(397, 124, 13, 178, '1997-07-01'),
(398, 124, 13, 219, '2004-06-15'),
(399, 124, 13, 65, '2010-07-16'),
(400, 124, 13, 142, '2011-06-01'),
(401, 126, 13, 190, '1991-08-15'),
(402, 126, 13, 97, '1998-03-13'),
(403, 126, 4, 74, '2001-07-01'),
(404, 126, 4, 45, '2004-02-16'),
(405, 126, 27, 252, '2006-06-01'),
(406, 126, 13, 28, '2008-06-16'),
(407, 126, 13, 260, '2008-09-10'),
(408, 126, 13, 176, '2015-07-10'),
(409, 127, 13, 139, '2000-07-01'),
(410, 127, 13, 77, '2004-12-07'),
(411, 127, 14, 220, '2004-06-15'),
(412, 127, 14, 218, '2006-01-01'),
(413, 127, 13, 77, '2007-06-02'),
(414, 127, 10, 68, '2008-06-16'),
(415, 127, 13, 128, '2010-07-01'),
(416, 127, 10, 112, '2011-06-01'),
(417, 127, 4, 13, '2011-09-01'),
(418, 127, 4, 248, '2014-04-01'),
(419, 127, 4, 32, '2015-09-01'),
(420, 128, 13, 209, '2006-06-01'),
(421, 128, 14, 85, '2007-06-02'),
(422, 128, 10, 106, '2010-01-01'),
(423, 128, 24, 106, '2010-08-01'),
(424, 128, 4, 40, '2011-06-01'),
(425, 128, 27, 195, '2013-06-01'),
(426, 128, 4, 73, '2015-06-01'),
(427, 129, 14, 60, '1995-07-15'),
(428, 129, 13, 275, '1999-01-15'),
(429, 129, 14, 226, '2000-07-01'),
(430, 129, 26, 49, '2001-08-01'),
(431, 129, 26, 72, '2003-02-15'),
(432, 129, 26, 170, '2005-07-01'),
(433, 129, 14, 247, '2008-06-16'),
(434, 129, 13, 166, '2009-06-01'),
(435, 129, 4, 170, '2012-08-01'),
(436, 130, 13, 129, '1981-04-15'),
(437, 130, 13, 153, '1983-06-01'),
(438, 130, 14, 269, '1990-07-07'),
(439, 130, 13, 146, '1991-10-06'),
(440, 130, 13, 56, '1997-07-01'),
(441, 130, 27, 195, '2004-06-15'),
(442, 130, 13, 163, '2006-06-01'),
(443, 130, 23, 83, '2012-06-16'),
(444, 130, 15, 83, '2015-07-10'),
(445, 131, 14, 80, '2002-07-01'),
(446, 131, 13, 79, '2003-07-15'),
(447, 131, 14, 209, '2003-12-07'),
(448, 131, 13, 119, '2004-06-15'),
(449, 131, 14, 25, '2010-07-16'),
(450, 131, 13, 27, '2011-10-30'),
(451, 132, 13, 186, '2014-07-01'),
(452, 144, 26, 112, '2002-12-22'),
(453, 144, 27, 199, '2003-02-01'),
(454, 144, 2, 250, '2005-07-19'),
(455, 134, 14, 153, '2002-07-01'),
(456, 134, 13, 238, '2003-02-15'),
(457, 134, 13, 104, '2006-06-01'),
(458, 134, 27, 171, '2012-06-16'),
(459, 134, 27, 195, '2012-07-09'),
(460, 134, 4, 12, '2014-04-01'),
(461, 134, 13, 185, '2015-07-10'),
(462, 135, 14, 152, '2003-12-07'),
(463, 135, 13, 272, '2005-07-19'),
(464, 135, 13, 181, '2010-07-16'),
(465, 137, 14, 124, '2007-06-02'),
(466, 137, 13, 60, '2008-06-16'),
(467, 137, 13, 275, '2009-06-01'),
(468, 137, 13, 272, '2013-06-17'),
(469, 138, 13, 139, '2003-12-07'),
(470, 138, 13, 97, '2008-06-16'),
(471, 138, 13, 260, '2013-06-17'),
(472, 140, 14, 222, '2002-07-01'),
(473, 140, 13, 232, '2003-07-15'),
(474, 140, 13, 152, '2009-06-01'),
(475, 140, 13, 53, '2013-06-17'),
(476, 141, 13, 189, '2003-01-01'),
(477, 141, 13, 244, '2003-07-15'),
(478, 141, 27, 197, '2007-05-04'),
(479, 141, 26, 73, '2010-07-16'),
(480, 141, 4, 73, '2011-01-13'),
(481, 141, 4, 72, '2012-06-16'),
(482, 141, 13, 56, '2015-07-10'),
(483, 136, 13, 276, '2000-07-01'),
(484, 136, 13, 86, '2008-06-16'),
(485, 136, 13, 10, '2011-06-01'),
(486, 142, 13, 271, '2012-06-16'),
(487, 142, 13, 121, '2014-04-01'),
(488, 143, 13, 238, '2012-06-16'),
(489, 97, 14, 233, '1997-07-01'),
(490, 97, 13, 255, '1997-08-24'),
(491, 97, 13, 183, '2002-07-01'),
(492, 97, 13, 270, '2007-06-04'),
(493, 97, 13, 28, '2012-06-16'),
(494, 133, 14, 148, '1992-12-01'),
(495, 133, 13, 119, '1993-11-01'),
(496, 133, 27, 195, '1997-01-15'),
(497, 133, 17, 83, '2000-07-01'),
(498, 133, 13, 260, '2001-07-01'),
(499, 133, 2, 250, '2003-07-15'),
(500, 133, 27, 204, '2005-09-01'),
(501, 133, 2, 250, '2009-01-15'),
(502, 145, 13, 264, '2010-05-17'),
(503, 145, 13, 216, '2012-09-01'),
(504, 145, 13, 146, '2015-07-10'),
(505, 146, 13, 57, '2012-06-16'),
(506, 146, 13, 110, '2013-09-30'),
(507, 147, 13, 55, '1998-06-15'),
(508, 147, 13, 95, '2000-07-01'),
(509, 147, 14, 142, '2006-06-01'),
(510, 147, 13, 107, '2011-06-01'),
(511, 147, 23, 79, '2015-07-01'),
(512, 148, 13, 136, '1997-07-01'),
(513, 148, 14, 257, '2002-07-01'),
(514, 148, 13, 192, '2007-06-02'),
(515, 148, 27, 171, '2011-06-01'),
(516, 148, 27, 195, '2011-08-01'),
(517, 148, 13, 22, '2015-07-10'),
(518, 139, 14, 224, '2003-12-07'),
(519, 139, 14, 163, '2004-12-01'),
(520, 139, 13, 191, '2006-06-01'),
(521, 139, 13, 118, '2010-07-16'),
(522, 139, 13, 222, '2015-09-01'),
(523, 149, 13, 220, '1988-04-15'),
(524, 149, 13, 215, '1993-06-01'),
(525, 149, 13, 113, '1997-07-01'),
(526, 149, 4, 72, '1999-07-01'),
(527, 149, 4, 74, '2000-07-01'),
(528, 149, 2, 250, '2001-01-01'),
(529, 149, 27, 195, '2002-04-15'),
(530, 149, 2, 250, '2005-07-19'),
(531, 149, 5, 133, '2015-01-01'),
(532, 150, 14, 231, '1997-07-01'),
(533, 150, 13, 128, '1997-11-16'),
(534, 150, 13, 22, '2003-12-07'),
(535, 150, 13, 189, '2010-07-16'),
(536, 150, 27, 195, '2012-06-16'),
(537, 150, 13, 210, '2013-01-02'),
(538, 151, 13, 255, '2002-07-01'),
(539, 151, 13, 275, '2003-10-16'),
(540, 151, 27, 195, '2006-06-01'),
(541, 151, 19, 126, '2009-06-01'),
(542, 151, 19, 127, '2010-07-16'),
(543, 151, 4, 127, '2011-09-01'),
(544, 151, 13, 100, '2015-07-10'),
(545, 152, 13, 90, '2003-01-01'),
(546, 152, 13, 153, '2003-02-15'),
(547, 152, 13, 131, '2006-06-01'),
(548, 152, 14, 269, '2007-12-01'),
(549, 152, 27, 195, '2008-06-09'),
(550, 152, 13, 229, '2010-08-01'),
(551, 152, 13, 280, '2013-06-17'),
(552, 153, 13, 128, '2003-12-07'),
(553, 153, 13, 90, '2007-06-02'),
(554, 153, 13, 276, '2012-06-16'),
(555, 153, 13, 240, '2015-07-10'),
(556, 154, 13, 31, '1996-08-15'),
(557, 154, 13, 271, '2000-07-01'),
(558, 154, 13, 247, '2007-10-27'),
(559, 154, 13, 223, '2012-06-16'),
(560, 154, 13, 226, '2013-06-17'),
(561, 155, 13, 93, '2009-06-01'),
(562, 155, 13, 176, '2013-06-17'),
(563, 156, 13, 86, '2003-01-01'),
(564, 156, 13, 231, '2008-06-16'),
(565, 156, 13, 63, '2013-06-17'),
(566, 156, 13, 120, '2014-07-01'),
(567, 157, 13, 182, '2001-07-01'),
(568, 157, 27, 195, '2007-06-02'),
(569, 157, 14, 65, '2009-06-01'),
(570, 157, 27, 172, '2013-06-17'),
(571, 157, 24, 114, '2014-11-15'),
(572, 157, 13, 163, '2015-07-01'),
(573, 158, 13, 136, '2002-07-01'),
(574, 158, 13, 152, '2004-06-15'),
(575, 158, 13, 242, '2009-06-01'),
(576, 158, 13, 267, '2012-06-16'),
(577, 158, 13, 76, '2013-12-08'),
(578, 159, 13, 113, '1999-07-01'),
(579, 159, 13, 242, '2000-07-01'),
(580, 159, 13, 107, '2006-06-01'),
(581, 159, 27, 195, '2007-06-02'),
(582, 159, 23, 79, '2010-07-16'),
(583, 159, 27, 202, '2015-07-10'),
(584, 161, 13, 87, '2002-07-01'),
(585, 161, 14, 19, '2008-06-16'),
(586, 161, 13, 163, '2012-06-16'),
(587, 161, 13, 276, '2015-07-10'),
(588, 162, 14, 58, '2001-07-01'),
(589, 162, 14, 222, '2006-06-01'),
(590, 162, 13, 222, '2007-10-27'),
(591, 162, 13, 43, '2012-06-16'),
(592, 163, 13, 136, '2004-06-15'),
(593, 163, 13, 183, '2007-06-02'),
(594, 163, 26, 70, '2012-06-16'),
(595, 164, 13, 97, '2001-07-01'),
(596, 164, 14, 146, '2006-06-01'),
(597, 164, 13, 190, '2007-09-19'),
(598, 164, 27, 195, '2008-09-01'),
(599, 164, 14, 144, '2011-10-15'),
(600, 164, 13, 65, '2013-06-17'),
(601, 165, 13, 128, '2011-06-01'),
(602, 165, 13, 270, '2013-06-17'),
(603, 165, 26, 72, '2014-07-01'),
(604, 166, 13, 104, '2015-01-16'),
(605, 167, 20, 246, '2004-12-01'),
(606, 167, 13, 215, '2005-12-01'),
(607, 167, 13, 244, '2007-06-02'),
(608, 167, 13, 169, '2012-06-16'),
(609, 168, 13, 283, '2014-07-01'),
(610, 169, 13, 54, '2009-06-01'),
(611, 169, 10, 71, '2014-07-01'),
(612, 170, 13, 98, '1988-04-15'),
(613, 170, 13, 87, '1993-06-01'),
(614, 170, 13, 119, '1997-07-01'),
(615, 170, 13, 159, '2004-06-15'),
(616, 170, 13, 220, '2010-07-16'),
(617, 170, 13, 113, '2011-06-01'),
(618, 170, 23, 81, '2015-07-10'),
(619, 171, 13, 25, '2003-01-15'),
(620, 171, 13, 93, '2006-06-01'),
(621, 171, 10, 66, '2008-06-16'),
(622, 172, 13, 234, '1994-07-15'),
(623, 172, 13, 123, '2000-07-01'),
(624, 172, 13, 261, '2006-06-01'),
(625, 172, 13, 140, '2012-06-16'),
(626, 173, 13, 17, '2012-06-16'),
(627, 174, 13, 107, '1988-04-15'),
(628, 174, 27, 195, '1994-07-15'),
(629, 174, 4, 44, '1999-05-15'),
(630, 174, 25, 112, '2000-06-25'),
(631, 174, 25, 112, '2005-01-01'),
(632, 174, 13, 56, '2010-07-16'),
(633, 174, 3, 112, '2015-01-01'),
(634, 175, 13, 136, '1995-07-15'),
(635, 175, 13, 253, '1999-07-01'),
(636, 175, 13, 93, '2000-07-01'),
(637, 175, 13, 155, '2006-06-01'),
(638, 175, 13, 226, '2011-06-01'),
(639, 175, 13, 143, '2013-06-17'),
(640, 177, 14, 226, '2003-12-07'),
(641, 177, 13, 99, '2004-02-16'),
(642, 177, 13, 169, '2007-10-27'),
(643, 177, 10, 74, '2012-06-16'),
(644, 177, 27, 195, '2013-06-03'),
(645, 178, 14, 164, '2004-12-01'),
(646, 178, 13, 275, '2006-06-01'),
(647, 178, 13, 60, '2009-06-01'),
(648, 178, 27, 195, '2010-10-01'),
(649, 179, 13, 194, '2015-09-01'),
(650, 180, 13, 162, '2004-12-28'),
(651, 180, 13, 54, '2006-06-01'),
(652, 180, 13, 135, '2009-06-01'),
(653, 180, 14, 96, '2013-01-02'),
(654, 181, 14, 77, '1995-07-15'),
(655, 181, 13, 207, '1996-03-15'),
(656, 181, 13, 268, '2001-07-01'),
(657, 181, 13, 188, '2006-06-01'),
(658, 181, 23, 78, '2010-07-16'),
(659, 181, 13, 220, '2015-07-10'),
(660, 182, 13, 99, '1997-07-01'),
(661, 182, 13, 118, '2004-02-16'),
(662, 182, 13, 121, '2010-07-16'),
(663, 182, 13, 94, '2014-04-01'),
(664, 183, 27, 198, '1994-07-15'),
(665, 183, 2, 251, '1996-07-01'),
(666, 183, 27, 203, '2010-08-26'),
(667, 183, 13, 62, '2014-07-01'),
(668, 184, 13, 234, '2000-07-01'),
(669, 184, 13, 10, '2003-07-15'),
(670, 184, 13, 97, '2006-06-01'),
(671, 184, 13, 18, '2008-06-16'),
(672, 184, 13, 155, '2011-06-01'),
(673, 184, 12, 2, '2015-07-10'),
(674, 185, 13, 190, '2009-06-01'),
(675, 186, 14, 271, '1998-06-12'),
(676, 186, 13, 98, '1999-07-01'),
(677, 186, 14, 269, '2004-12-01'),
(678, 186, 13, 129, '2007-12-01'),
(679, 186, 13, 142, '2012-06-16'),
(680, 187, 14, 56, '2001-07-01'),
(681, 187, 14, 145, '2007-06-02'),
(682, 187, 13, 103, '2010-07-16'),
(683, 188, 13, 271, '1995-07-15'),
(684, 188, 14, 105, '2000-07-01'),
(685, 188, 13, 155, '2003-04-12'),
(686, 188, 13, 10, '2006-06-01'),
(687, 188, 13, 86, '2011-06-01'),
(688, 188, 13, 58, '2013-06-17'),
(689, 188, 13, 109, '2013-10-27'),
(690, 189, 13, 235, '2012-06-16'),
(691, 189, 22, 1, '2013-06-17'),
(692, 189, 13, 29, '2014-09-16'),
(693, 190, 13, 208, '2012-06-16'),
(694, 190, 13, 135, '2013-01-02'),
(695, 191, 13, 257, '2011-06-01'),
(696, 191, 13, 182, '2012-06-16'),
(697, 192, 13, 257, '2012-06-16'),
(698, 193, 13, 241, '1994-07-15'),
(699, 193, 14, 141, '2000-07-01'),
(700, 193, 13, 43, '2003-05-25'),
(701, 193, 27, 195, '2003-12-07'),
(702, 193, 13, 158, '2006-03-01'),
(703, 193, 13, 209, '2011-06-01'),
(704, 194, 14, 176, '1997-07-01'),
(705, 194, 13, 142, '1999-11-27'),
(706, 194, 4, 73, '2001-07-01'),
(707, 194, 27, 195, '2005-08-01'),
(708, 194, 5, 115, '2007-08-16'),
(709, 194, 14, 52, '2009-06-30'),
(710, 194, 5, 117, '2013-06-17'),
(711, 195, 13, 235, '2010-05-17'),
(712, 195, 10, 154, '2012-06-16'),
(713, 195, 13, 219, '2015-09-01'),
(714, 196, 14, 87, '2002-07-01'),
(715, 196, 13, 88, '2003-05-18'),
(716, 196, 13, 107, '2007-06-02'),
(717, 196, 13, 65, '2011-06-01'),
(718, 196, 4, 48, '2015-07-10'),
(719, 197, 13, 239, '2015-01-16'),
(720, 198, 14, 268, '1995-07-15'),
(721, 198, 13, 17, '1996-03-15'),
(722, 198, 14, 219, '2001-07-01'),
(723, 198, 13, 259, '2004-03-01'),
(724, 198, 13, 161, '2009-06-01'),
(725, 200, 14, 220, '2003-12-07'),
(726, 200, 9, 173, '2004-06-01'),
(727, 200, 7, 82, '2007-06-02'),
(728, 200, 13, 243, '2008-06-16'),
(729, 200, 13, 247, '2012-06-16'),
(730, 200, 27, 195, '2015-07-10'),
(731, 201, 13, 161, '2002-07-01'),
(732, 201, 13, 14, '2009-06-01'),
(733, 201, 13, 148, '2014-07-01'),
(734, 202, 17, 80, '2002-07-01'),
(735, 202, 14, 255, '2003-02-15'),
(736, 202, 13, 262, '2003-07-20'),
(737, 202, 14, 260, '2004-06-15'),
(738, 202, 17, 83, '2006-06-01'),
(739, 202, 14, 64, '2008-09-16'),
(740, 202, 13, 64, '2010-01-15'),
(741, 202, 13, 60, '2010-07-16'),
(742, 202, 27, 171, '2012-03-01'),
(743, 202, 17, 83, '2014-07-01'),
(744, 202, 13, 65, '2015-07-10'),
(745, 203, 13, 264, '2015-09-01'),
(746, 204, 13, 234, '2012-06-16'),
(747, 204, 27, 171, '2014-07-01'),
(748, 204, 27, 195, '2014-11-01'),
(749, 205, 13, 26, '2003-01-01'),
(750, 205, 13, 207, '2009-06-01'),
(751, 205, 13, 165, '2013-06-17'),
(752, 206, 13, 139, '2012-06-16'),
(753, 206, 13, 271, '2014-01-02'),
(754, 207, 13, 57, '2003-12-07'),
(755, 207, 13, 87, '2008-06-16'),
(756, 207, 13, 229, '2013-06-17'),
(757, 208, 13, 187, '1983-11-15'),
(758, 208, 14, 247, '1989-11-01'),
(759, 208, 13, 231, '1990-07-07'),
(760, 208, 13, 247, '1996-08-15'),
(761, 208, 1, 175, '1998-02-16'),
(762, 208, 4, 50, '2002-05-01'),
(763, 208, 4, 51, '2004-02-16'),
(764, 208, 4, 73, '2005-07-19'),
(765, 208, 13, 224, '2006-06-01'),
(766, 208, 4, 9, '2010-08-01'),
(767, 208, 4, 49, '2013-06-17'),
(768, 208, 13, 77, '2015-07-10'),
(769, 209, 13, 151, '2010-05-17'),
(770, 209, 13, 150, '2011-11-20'),
(771, 210, 13, 18, '1999-07-01'),
(772, 210, 13, 43, '2003-12-07'),
(773, 210, 4, 73, '2006-06-01'),
(774, 210, 13, 123, '2010-07-16'),
(775, 210, 27, 195, '2011-06-01'),
(776, 210, 13, 219, '2013-06-17'),
(777, 210, 23, 77, '2015-07-10'),
(778, 212, 10, 72, '2015-09-01'),
(779, 213, 13, 95, '1996-08-15'),
(780, 213, 27, 196, '2000-01-01'),
(781, 213, 10, 127, '2002-01-14'),
(782, 213, 4, 127, '2003-02-01'),
(783, 213, 27, 202, '2006-06-01'),
(784, 213, 4, 45, '2010-07-16'),
(785, 213, 13, 176, '2013-01-02'),
(786, 213, 25, 112, '2015-01-01'),
(787, 215, 13, 136, '2013-06-17'),
(788, 216, 13, 85, '2004-12-01'),
(789, 216, 13, 282, '2007-06-02'),
(790, 216, 4, 127, '2012-06-16'),
(791, 216, 13, 270, '2014-07-01'),
(792, 216, 13, 219, '2015-07-10'),
(793, 217, 13, 31, '2002-07-01'),
(794, 217, 13, 98, '2009-06-01'),
(795, 217, 13, 222, '2014-07-01'),
(796, 217, 13, 247, '2015-07-10'),
(797, 218, 13, 283, '2013-06-17'),
(798, 218, 13, 231, '2014-07-01'),
(799, 219, 13, 266, '2010-05-17'),
(800, 219, 13, 134, '2012-06-16'),
(801, 220, 13, 96, '1985-07-01'),
(802, 220, 13, 161, '1988-04-15'),
(803, 220, 13, 99, '1993-06-01'),
(804, 220, 13, 232, '1997-07-01'),
(805, 220, 13, 260, '2003-07-15'),
(806, 220, 14, 65, '2005-06-01'),
(807, 220, 13, 142, '2008-11-01'),
(808, 220, 13, 20, '2011-06-01'),
(809, 220, 13, 25, '2015-07-10'),
(810, 223, 13, 18, '2003-12-07'),
(811, 223, 13, 276, '2008-06-16'),
(812, 223, 13, 221, '2012-06-16'),
(813, 224, 13, 231, '2013-06-17'),
(814, 224, 13, 97, '2014-07-01'),
(815, 225, 14, 21, '1999-07-01'),
(816, 225, 13, 21, '2001-03-18'),
(817, 225, 13, 113, '2006-06-01'),
(818, 225, 27, 195, '2011-06-01'),
(819, 225, 14, 282, '2012-06-01'),
(820, 225, 13, 56, '2013-06-17'),
(821, 225, 13, 24, '2015-07-10'),
(822, 226, 21, 254, '2015-09-01'),
(823, 227, 13, 235, '2013-06-17'),
(824, 228, 13, 55, '2001-07-01'),
(825, 228, 14, 25, '2006-06-01'),
(826, 228, 13, 180, '2010-07-16'),
(827, 229, 14, 21, '1995-07-15'),
(828, 229, 13, 25, '1999-07-01'),
(829, 229, 27, 195, '2004-06-15'),
(830, 229, 13, 229, '2007-06-02'),
(831, 229, 13, 209, '2010-08-10'),
(832, 229, 27, 202, '2012-09-01'),
(833, 230, 13, 28, '2015-01-16'),
(834, 231, 13, 189, '2012-06-16'),
(835, 232, 13, 265, '1987-07-01'),
(836, 232, 13, 229, '1990-07-01'),
(837, 232, 13, 209, '1992-07-01'),
(838, 232, 13, 211, '1997-07-01'),
(839, 232, 27, 171, '2002-03-01'),
(840, 232, 4, 72, '2003-07-15'),
(841, 232, 27, 195, '2004-05-18'),
(842, 232, 4, 36, '2006-06-01'),
(843, 232, 4, 74, '2008-06-01'),
(844, 232, 4, 36, '2012-06-16'),
(845, 232, 4, 74, '2015-07-10'),
(846, 233, 13, 124, '2012-06-16'),
(847, 233, 13, 209, '2013-07-08'),
(848, 233, 13, 93, '2015-07-10'),
(849, 234, 13, 20, '2015-01-16'),
(850, 235, 13, 187, '1999-07-01'),
(851, 235, 27, 195, '2002-01-10'),
(852, 235, 2, 250, '2004-01-01'),
(853, 235, 27, 202, '2009-01-12'),
(854, 235, 2, 250, '2014-07-01'),
(855, 236, 13, 58, '2011-06-01'),
(856, 236, 27, 171, '2013-06-17'),
(857, 237, 13, 101, '2012-06-16'),
(858, 237, 13, 228, '2013-11-17'),
(859, 238, 13, 237, '2010-05-17'),
(860, 238, 13, 152, '2013-06-17'),
(861, 239, 14, 227, '2002-07-01'),
(862, 239, 14, 140, '2003-12-07'),
(863, 239, 13, 215, '2007-06-02'),
(864, 239, 13, 148, '2010-08-01'),
(865, 239, 13, 226, '2014-07-01'),
(866, 240, 13, 236, '2012-06-16'),
(867, 241, 14, 77, '2002-07-01'),
(868, 241, 13, 234, '2003-07-15'),
(869, 241, 13, 140, '2007-06-02'),
(870, 241, 13, 129, '2012-06-16'),
(871, 242, 13, 234, '2014-07-01'),
(872, 243, 13, 17, '2007-06-02'),
(873, 243, 13, 261, '2012-06-16'),
(874, 244, 13, 183, '2012-06-16'),
(875, 245, 13, 88, '2012-06-16'),
(876, 246, 13, 139, '1988-04-15'),
(877, 246, 13, 169, '1990-07-07'),
(878, 246, 13, 209, '1997-07-01'),
(879, 246, 13, 222, '2004-02-16'),
(880, 246, 23, 77, '2005-07-19'),
(881, 246, 13, 64, '2010-07-16'),
(882, 247, 14, 222, '1995-07-15'),
(883, 247, 13, 132, '1996-12-01'),
(884, 247, 4, 50, '2001-07-01'),
(885, 247, 13, 240, '2003-02-15'),
(886, 247, 13, 21, '2006-06-01'),
(887, 247, 14, 56, '2010-07-16'),
(888, 247, 13, 260, '2015-07-10'),
(889, 248, 13, 160, '2012-06-16'),
(890, 248, 13, 137, '2014-01-18'),
(891, 248, 13, 216, '2015-07-10'),
(892, 261, 13, 99, '1982-04-15'),
(893, 261, 16, 174, '1985-07-01'),
(894, 261, 13, 56, '1994-04-01'),
(895, 261, 13, 256, '1997-07-01'),
(896, 261, 17, 79, '1999-07-01'),
(897, 261, 4, 50, '2000-07-01'),
(898, 261, 13, 142, '2001-07-01'),
(899, 261, 13, 168, '2004-12-01'),
(900, 261, 4, 274, '2010-07-16'),
(901, 261, 8, 1039, '2015-07-01'),
(902, 250, 13, 209, '2015-09-01'),
(903, 251, 14, 159, '2002-07-01'),
(904, 251, 13, 231, '2002-10-01'),
(905, 251, 14, 269, '2008-06-16'),
(906, 251, 13, 184, '2013-06-17'),
(907, 252, 13, 63, '2014-07-01'),
(908, 253, 13, 232, '2014-07-01'),
(909, 254, 13, 100, '1992-12-01'),
(910, 254, 13, 163, '1995-01-01'),
(911, 254, 13, 25, '1996-11-24'),
(912, 254, 13, 184, '1997-07-01'),
(913, 254, 13, 269, '1999-07-01'),
(914, 254, 27, 171, '2001-07-01'),
(915, 254, 27, 201, '2001-10-09'),
(916, 254, 13, 121, '2008-01-28'),
(917, 254, 17, 83, '2010-07-16'),
(918, 254, 13, 20, '2015-07-10'),
(919, 256, 13, 207, '2001-07-01'),
(920, 256, 13, 242, '2005-06-01'),
(921, 256, 13, 259, '2009-06-01'),
(922, 257, 13, 225, '2004-12-28'),
(923, 257, 13, 271, '2007-10-27'),
(924, 257, 13, 131, '2012-06-16'),
(925, 258, 14, 153, '1991-08-15'),
(926, 258, 13, 31, '1992-10-11'),
(927, 258, 13, 118, '1996-08-15'),
(928, 258, 13, 209, '2004-02-16'),
(929, 258, 13, 224, '2010-08-01'),
(930, 259, 13, 18, '2011-06-01'),
(931, 262, 13, 139, '2014-01-02'),
(932, 263, 17, 25, '2014-01-02'),
(933, 264, 14, 222, '2003-12-07'),
(934, 264, 13, 95, '2006-06-01'),
(935, 264, 13, 158, '2011-06-01'),
(936, 265, 21, 254, '2015-09-01'),
(937, 266, 13, 147, '2015-09-01'),
(938, 267, 13, 242, '1988-04-15'),
(939, 267, 13, 210, '1994-07-15'),
(940, 267, 13, 64, '2000-07-01'),
(941, 267, 13, 29, '2005-07-19'),
(942, 267, 13, 25, '2010-07-16'),
(943, 267, 13, 56, '2015-07-10'),
(944, 268, 13, 234, '1988-04-15'),
(945, 268, 13, 95, '1992-07-01'),
(946, 268, 4, 281, '1996-07-01'),
(947, 268, 14, 28, '1999-10-01'),
(948, 268, 13, 240, '2000-03-05'),
(949, 268, 4, 50, '2003-02-15'),
(950, 268, 4, 35, '2004-02-16'),
(951, 268, 13, 184, '2004-12-01'),
(952, 268, 13, 146, '2007-06-02'),
(953, 268, 4, 74, '2012-06-16'),
(954, 268, 23, 84, '2015-07-10'),
(955, 269, 13, 188, '1986-06-01'),
(956, 269, 13, 233, '1991-08-15'),
(957, 269, 13, 275, '1994-08-01'),
(958, 269, 13, 169, '1999-01-15'),
(959, 269, 13, 262, '2005-07-18'),
(960, 269, 13, 217, '2007-10-27'),
(961, 269, 13, 185, '2010-07-16'),
(962, 269, 8, 1039, '2015-07-01'),
(963, 270, 13, 213, '2004-12-01'),
(964, 270, 13, 262, '2005-07-19'),
(965, 270, 13, 255, '2010-07-16'),
(966, 270, 6, 69, '2011-06-01'),
(967, 271, 13, 193, '2012-06-16'),
(968, 272, 14, 269, '2003-12-07'),
(969, 272, 10, 177, '2004-08-23'),
(970, 272, 4, 41, '2005-07-19'),
(971, 272, 13, 269, '2010-01-15'),
(972, 272, 13, 22, '2010-07-16'),
(973, 272, 4, 33, '2015-07-10'),
(974, 273, 13, 178, '1988-04-15'),
(975, 273, 13, 129, '1989-06-01'),
(976, 273, 4, 3, '1991-08-15'),
(977, 273, 14, 220, '2000-07-01'),
(978, 273, 13, 159, '2002-10-01'),
(979, 273, 14, 226, '2004-06-15'),
(980, 273, 13, 28, '2006-07-01'),
(981, 273, 13, 146, '2012-06-16'),
(982, 273, 23, 78, '2015-07-10'),
(983, 274, 13, 159, '1991-08-05'),
(984, 274, 13, 247, '1998-03-13'),
(985, 274, 13, 89, '2003-07-15'),
(986, 274, 13, 65, '2008-06-16'),
(987, 274, 13, 257, '2010-07-16'),
(988, 274, 13, 64, '2011-06-01'),
(989, 275, 13, 97, '1980-11-01'),
(990, 275, 13, 232, '1985-07-15'),
(991, 275, 13, 152, '1990-07-07'),
(992, 275, 13, 268, '1998-06-15'),
(993, 275, 13, 242, '2001-07-01'),
(994, 275, 13, 93, '2008-06-16'),
(995, 275, 13, 100, '2009-06-01'),
(996, 275, 8, 1039, '2015-07-01'),
(997, 276, 13, 139, '1982-04-15'),
(998, 276, 13, 107, '1985-07-01'),
(999, 276, 13, 169, '1988-04-15'),
(1000, 276, 14, 94, '1989-06-01'),
(1001, 276, 13, 187, '1990-07-07'),
(1002, 276, 13, 185, '1995-07-15'),
(1003, 276, 13, 226, '2003-07-15'),
(1004, 276, 13, 123, '2006-06-01'),
(1005, 276, 13, 29, '2010-07-16'),
(1006, 276, 15, 83, '2014-09-16'),
(1007, 276, 13, 56, '2015-07-10'),
(1008, 277, 13, 74, '2013-06-17'),
(1009, 277, 13, 247, '2015-07-10'),
(1010, 278, 13, 91, '2015-01-16'),
(1011, 279, 13, 230, '2012-06-16'),
(1012, 279, 13, 31, '2014-07-01'),
(1013, 280, 13, 209, '2012-06-16'),
(1014, 280, 13, 270, '2014-07-01'),
(1015, 281, 13, 136, '2007-06-02'),
(1016, 281, 13, 26, '2011-06-01'),
(1017, 281, 13, 263, '2011-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `karir_external`
--

CREATE TABLE `karir_external` (
  `id` int(11) NOT NULL,
  `full_timer_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `external_org_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karir_external`
--

INSERT INTO `karir_external` (`id`, `full_timer_id`, `posisi_id`, `external_org_id`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 5, 2, 1, '2005-03-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(2, 21, 2, 1, '2006-06-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(3, 21, 13, 2, '2014-07-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(4, 33, 10, 3, '2007-05-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(5, 37, 2, 1, '2013-08-18', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(6, 77, 6, 2, '2013-06-17', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(7, 101, 30, 2, '2010-07-16', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(8, 101, 6, 2, '2011-04-06', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(9, 103, 2, 1, '1991-08-15', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(10, 103, 2, 1, '2003-07-15', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(11, 103, 2, 1, '2015-07-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(12, 104, 2, 1, '2000-06-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(13, 104, 2, 1, '2005-07-19', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(14, 114, 2, 1, '2009-06-16', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(15, 118, 28, 4, '2009-06-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(16, 128, 10, 2, '2010-01-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(17, 128, 24, 2, '2010-08-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(18, 144, 2, 1, '2005-07-19', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(19, 133, 2, 1, '2003-07-15', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(20, 133, 2, 1, '2009-01-15', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(21, 149, 2, 1, '2001-01-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(22, 149, 2, 1, '2005-07-19', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(23, 152, 13, 3, '2013-06-17', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(24, 167, 20, 5, '2004-12-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(25, 183, 2, 6, '1996-07-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(26, 189, 22, 7, '2013-06-17', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(27, 200, 9, 8, '2004-06-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(28, 226, 21, 9, '2015-09-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(29, 235, 2, 1, '2004-01-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(30, 235, 2, 1, '2014-07-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(31, 261, 16, 10, '1985-07-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(32, 265, 21, 9, '2015-09-01', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1),
(33, 272, 10, 11, '2004-08-23', NULL, '2016-05-09 18:20:35', '2016-05-09 18:20:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `karir_internal`
--

CREATE TABLE `karir_internal` (
  `id` int(11) NOT NULL,
  `full_timer_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `internal_org_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `karir_jemaat`
--

CREATE TABLE `karir_jemaat` (
  `id` int(11) NOT NULL,
  `full_timer_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `jemaat_id` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `karir_studi`
--

CREATE TABLE `karir_studi` (
  `id` int(11) NOT NULL,
  `full_timer_id` int(11) NOT NULL,
  `studi_id` int(11) NOT NULL,
  `strata_id` int(11) NOT NULL,
  `gelar_id` int(11) NOT NULL,
  `judul_thesis` varchar(300) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karir_studi`
--

INSERT INTO `karir_studi` (`id`, `full_timer_id`, `studi_id`, `strata_id`, `gelar_id`, `judul_thesis`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(2, 2, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(3, 3, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(4, 4, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(5, 5, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(6, 6, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(7, 7, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(8, 8, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(9, 9, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(10, 10, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(11, 11, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(12, 12, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(13, 13, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(14, 14, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(15, 15, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(16, 16, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(17, 17, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(18, 18, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(19, 19, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(20, 20, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(21, 21, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(22, 22, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(23, 23, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(24, 24, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(25, 25, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(26, 26, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(27, 27, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(28, 28, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(29, 29, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(30, 30, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(31, 31, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(32, 32, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(33, 33, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(34, 34, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(35, 35, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(36, 36, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(37, 37, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(38, 38, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(39, 39, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(40, 40, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(41, 41, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(42, 42, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(43, 43, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(44, 44, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(45, 45, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(46, 46, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(47, 47, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(48, 48, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(49, 49, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(50, 50, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(51, 51, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(52, 52, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(53, 53, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(54, 54, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(55, 55, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(56, 56, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(57, 57, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(58, 58, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(59, 59, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(60, 60, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(61, 61, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(62, 62, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(63, 63, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(64, 64, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(65, 65, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(66, 66, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(67, 67, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(68, 68, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(69, 69, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(70, 70, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(71, 71, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(72, 72, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(73, 73, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(74, 74, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(75, 75, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(76, 76, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(77, 77, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(78, 78, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(79, 79, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(80, 80, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(81, 81, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(82, 82, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(83, 83, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(84, 84, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(85, 85, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(86, 86, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(87, 87, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(88, 88, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(89, 89, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(90, 90, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(91, 91, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(92, 92, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(93, 93, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(94, 94, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(95, 95, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(96, 96, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(97, 97, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(98, 98, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(99, 99, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(100, 100, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(101, 101, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(102, 102, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(103, 103, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(104, 104, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(105, 105, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(106, 106, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(107, 107, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(108, 108, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(109, 109, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(110, 110, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(111, 111, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(112, 112, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(113, 113, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(114, 114, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(115, 115, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(116, 116, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(117, 117, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(118, 118, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(119, 119, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(120, 120, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(121, 121, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(122, 122, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(123, 123, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(124, 124, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(125, 125, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(126, 126, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(127, 127, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(128, 128, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(129, 129, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(130, 130, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(131, 131, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(132, 132, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(133, 133, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(134, 134, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(135, 135, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(136, 136, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(137, 137, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(138, 138, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(139, 139, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(140, 140, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(141, 141, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(142, 142, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(143, 143, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(144, 144, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(145, 145, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(146, 146, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(147, 147, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(148, 148, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(149, 149, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(150, 150, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(151, 151, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(152, 152, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(153, 153, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(154, 154, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(155, 155, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(156, 156, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(157, 157, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(158, 158, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(159, 159, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(160, 160, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(161, 161, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(162, 162, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(163, 163, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(164, 164, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(165, 165, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(166, 166, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(167, 167, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(168, 168, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(169, 169, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(170, 170, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(171, 171, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(172, 172, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(173, 173, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(174, 174, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(175, 175, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(176, 176, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(177, 177, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(178, 178, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(179, 179, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(180, 180, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(181, 181, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(182, 182, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(183, 183, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(184, 184, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(185, 185, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(186, 186, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(187, 187, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(188, 188, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(189, 189, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(190, 190, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(191, 191, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(192, 192, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(193, 193, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(194, 194, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(195, 195, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(196, 196, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(197, 197, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(198, 198, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(199, 199, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(200, 200, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(201, 201, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(202, 202, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(203, 203, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(204, 204, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(205, 205, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(206, 206, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(207, 207, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(208, 208, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(209, 209, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(210, 210, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(211, 211, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(212, 212, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(213, 213, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(214, 214, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(215, 215, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(216, 216, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(217, 217, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(218, 218, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(219, 219, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(220, 220, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(221, 221, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(222, 222, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(223, 223, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(224, 224, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(225, 225, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(226, 226, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(227, 227, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(228, 228, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(229, 229, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(230, 230, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(231, 231, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(232, 232, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(233, 233, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(234, 234, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(235, 235, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(236, 236, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(237, 237, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(238, 238, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(239, 239, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(240, 240, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(241, 241, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(242, 242, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(243, 243, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(244, 244, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(245, 245, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(246, 246, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(247, 247, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(248, 248, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(249, 249, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(250, 250, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(251, 251, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(252, 252, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(253, 253, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(254, 254, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(255, 255, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(256, 256, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(257, 257, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(258, 258, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(259, 259, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(260, 260, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(261, 261, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(262, 262, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(263, 263, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(264, 264, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(265, 265, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(266, 266, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(267, 267, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(268, 268, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(269, 269, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(270, 270, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(271, 271, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(272, 272, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(273, 273, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(274, 274, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(275, 275, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(276, 276, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(277, 277, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(278, 278, 1, 3, 2, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(279, 279, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(280, 280, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(281, 281, 1, 3, 1, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(282, 5, 2, 4, 3, '', '2002-07-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(283, 8, 1, 4, 3, '', '2007-09-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(284, 21, 1, 4, 3, '', '1995-11-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(285, 37, 1, 4, 3, '', '2002-08-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(286, 52, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(287, 56, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(288, 60, 7, 4, 3, '', '2000-01-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(289, 64, 1, 4, 3, '', '2003-12-07', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(290, 68, 1, 4, 3, '', '2011-01-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(291, 80, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(292, 104, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(293, 108, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(294, 113, 1, 4, 3, '', '2006-06-02', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(295, 114, 1, 4, 3, '', '1993-03-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(296, 126, 3, 4, 3, '', '2006-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(297, 133, 1, 4, 3, '', '1997-01-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(298, 144, 7, 4, 3, '', '2003-02-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(299, 148, 15, 4, 3, '', '2011-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(300, 149, 1, 4, 3, '', '2002-04-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(301, 151, 1, 4, 3, '', '2006-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(302, 159, 1, 4, 3, '', '2007-06-02', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(303, 164, 1, 4, 3, '', '2008-09-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(304, 183, 4, 4, 3, '', '1994-07-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(305, 193, 1, 4, 3, '', '2003-12-07', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(306, 213, 11, 4, 3, '', '2000-01-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(307, 229, 1, 4, 3, '', '2004-06-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(308, 232, 15, 4, 4, '', '2002-03-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(309, 235, 1, 4, 3, '', '2002-01-10', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(310, 255, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(311, 103, 12, 4, 5, '', '1995-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(312, 141, 12, 4, 5, '', '2007-05-04', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(313, 1, 6, 4, 6, '', '1999-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(314, 10, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(315, 33, 1, 4, 6, '', '2004-09-06', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(316, 62, 1, 4, 6, '', '2010-08-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(317, 63, 7, 4, 6, '', '2000-10-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(318, 86, 6, 4, 6, '', '2013-06-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(319, 93, 6, 4, 6, '', '2001-06-11', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(320, 120, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(321, 134, 15, 4, 6, '', '2012-06-16', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(322, 152, 1, 4, 6, '', '2008-06-09', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(323, 156, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(324, 157, 1, 4, 6, '', '2007-06-02', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(325, 174, 1, 4, 6, '', '1994-07-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(326, 186, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(327, 187, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(328, 194, 1, 4, 6, '', '2005-08-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(329, 202, 15, 4, 6, '', '2012-03-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(330, 225, 1, 4, 6, '', '2011-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(331, 46, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(332, 47, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(333, 93, 9, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(334, 110, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(335, 128, 1, 4, 7, '', '2013-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(336, 131, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(337, 135, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(338, 153, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(339, 162, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(340, 177, 1, 4, 7, '', '2013-06-03', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(341, 196, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(342, 201, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(343, 210, 1, 4, 7, '', '2011-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(344, 241, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(345, 246, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(346, 268, 1, 4, 7, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(347, 19, 5, 4, 8, '', '2000-02-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(348, 48, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(349, 97, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(350, 104, 1, 4, 8, '', '2002-10-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(351, 139, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(352, 147, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(353, 150, 1, 4, 8, '', '2012-06-16', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(354, 154, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(355, 158, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(356, 198, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(357, 210, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(358, 256, 1, 4, 8, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(359, 67, 1, 4, 9, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(360, 208, 1, 4, 10, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(361, 115, 4, 4, 11, '', '2002-04-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(362, 24, 1, 4, 12, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(363, 103, 1, 5, 13, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(364, 37, 1, 5, 14, '', '2009-03-02', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(365, 52, 1, 5, 14, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(366, 114, 16, 5, 14, '', '2000-05-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(367, 133, 14, 5, 14, '', '2005-09-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(368, 149, 1, 5, 14, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(369, 183, 13, 5, 14, '', '2010-08-26', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(370, 213, 1, 5, 14, '', '2006-06-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(371, 235, 1, 5, 14, '', '2009-01-12', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(372, 178, 1, 3, 15, '', '2010-10-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(373, 274, 1, 3, 15, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(374, 69, 1, 6, 16, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(375, 119, 1, 6, 17, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(376, 95, 1, 4, 3, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(377, 95, 1, 5, 14, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(378, 21, 1, 5, 14, '', '2008-08-19', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(379, 33, 1, 5, 14, '', '2013-06-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(380, 42, 15, 4, 3, '', '2012-01-16', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(381, 42, 10, 4, 3, '', '2014-02-12', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(382, 65, 15, 4, 3, '', '2015-07-10', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(383, 96, 15, 4, 3, '', '2013-06-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(384, 101, 15, 4, 3, '', '2003-12-07', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(385, 113, 16, 5, 14, '', '2012-06-16', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(386, 113, 1, 5, 14, '', '2012-08-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(387, 114, 4, 5, 14, '', '2002-01-14', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(388, 130, 1, 4, 3, '', '2004-06-15', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(389, 134, 1, 4, 6, '', '2012-07-09', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(390, 148, 1, 4, 3, '', '2011-08-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(391, 157, 16, 5, 14, '', '2013-06-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(392, 159, 1, 5, 14, '', '2015-07-10', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(393, 200, 1, 4, 3, '', '2015-07-10', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(394, 202, 1, 4, 6, '', NULL, NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(395, 204, 15, 4, 3, '', '2014-07-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(396, 204, 1, 4, 3, '', '2014-11-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(397, 229, 1, 5, 14, '', '2012-09-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(398, 232, 1, 4, 4, '', '2004-05-18', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(399, 236, 15, 4, 3, '', '2013-06-17', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(400, 254, 15, 4, 5, '', '2001-07-01', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1),
(401, 254, 8, 4, 5, '', '2001-10-09', NULL, '2016-05-06 07:16:28', '2016-05-06 07:16:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_internal`
--

CREATE TABLE `level_internal` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `posisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_internal`
--

INSERT INTO `level_internal` (`id`, `nama`, `deskripsi`, `posisi_id`) VALUES
(1, 'Kantor Pusat', 'Kantor Pusat administrasi GKPS', 25),
(2, 'Departemen', 'Departemen di struktur organisasi GKPS', 4),
(3, 'Biro', 'Biro di dalam struktur organisasi GKPS', 4),
(4, 'Bagian', 'Bagian di dalam struktur organisasi GKPS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `level_jemaat`
--

CREATE TABLE `level_jemaat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `posisi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_jemaat`
--

INSERT INTO `level_jemaat` (`id`, `nama`, `deskripsi`, `posisi_id`) VALUES
(0, 'Sinode GKPS', 'Pimpinan tertinggi dalam struktur jemaat GKPS', 3),
(1, 'Distrik', 'Lembaga yang menaungi beberapa resort. Dipimpin oleh seorang Praeses.', 23),
(2, 'Resort', 'Lembaga di bawah Distrik yang menaungi beberapa jemaat. Dimpimpin oleh seorang Pendeta Resort.', 13),
(3, 'Jemaat', 'Jemaat mandiri yang dipimpin oleh seorang Pendeta.', 13),
(4, 'Jemaat Persiapan', 'Bakal jemaat yang sedang dalam masa persiapan. Biasanya di bawah pengawasan jemaat.', 13);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1460134638),
('m130524_201442_init', 1460134659);

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id` int(11) NOT NULL,
  `penempatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id`, `penempatan`) VALUES
(1039, '-'),
(1, 'Afrika'),
(2, 'Ambilan pakon Barita'),
(3, 'Asrama Putra'),
(4, 'August Theis Tigaras'),
(5, 'August Theis Tigaras (Persiapan)'),
(6, 'Australia'),
(7, 'B R Pasar'),
(8, 'B. Bolon Raya'),
(9, 'Badan Pendidikan'),
(10, 'Bagan Batu'),
(11, 'Bagan Batu / Balam'),
(12, 'Bagian Penelitian / Perencanaan LitKom'),
(13, 'Bagian Perencanaan di Litbang'),
(14, 'Bah Kapul'),
(15, 'Bah Pasunsang'),
(16, 'Bah Sulung'),
(17, 'Bah Tonang'),
(18, 'Bahapal Raya'),
(19, 'Balikpapan'),
(20, 'Bandar Lampung'),
(21, 'Bandung'),
(22, 'Bangun Tani'),
(23, 'Banjarmasin'),
(24, 'Baringin Raya'),
(25, 'Batam'),
(26, 'Batam / Tanjung Pinang'),
(27, 'Batam Barat'),
(28, 'Batu Onom'),
(29, 'Bekasi'),
(30, 'Bengkulu'),
(31, 'Betania Silou Kehen'),
(32, 'Bidang Dialog & Hubungan Antar Agama di Departemen Kesaksian'),
(33, 'Bidang Kategorial'),
(34, 'Bidang Kebaktian/PWG'),
(35, 'Bidang Kesaksian'),
(36, 'Bidang Liturgi & Musik Gereja'),
(37, 'Bidang Pelayanan'),
(38, 'Bidang Pelayanan Sosial'),
(39, 'Bidang Pendidikan'),
(40, 'Bidang Pengmas di Dep Pelayanan'),
(41, 'Bidang Persekutuan'),
(42, 'Bidang Persekutuan Jemaat'),
(43, 'Binjai'),
(44, 'Biro  Dana'),
(45, 'Biro Administrasi'),
(46, 'Biro Daya / Personalia'),
(47, 'Biro Keuangan'),
(48, 'Biro Litkom'),
(49, 'Biro Personalia'),
(50, 'Biro Sarana / Pra-Sarana'),
(51, 'Biro Usaha'),
(52, 'Bogor'),
(53, 'Bogor / Depok'),
(54, 'Buah Bolon Raya'),
(55, 'Bulu Raya Pasar'),
(56, 'Cempaka Putih'),
(57, 'Cempaka Putih / Balikpapan'),
(58, 'Cempaka Putih / Palangkaraya'),
(59, 'Cempaka Putih / Pangkalan Bun'),
(60, 'Cempaka Putih / Pontianak'),
(61, 'Cengkareng Jakarta Barat'),
(62, 'Cijantung'),
(63, 'Cikampak'),
(64, 'Cikoko'),
(65, 'Cililitan'),
(66, 'CU GKPS Saribudolok'),
(67, 'CU Gratia'),
(68, 'CU KORPEG'),
(69, 'CUM Talenta'),
(70, 'CUM Talenta P. Siantar'),
(71, 'CUM Talenta Pematang Raya'),
(72, 'Departemen Kesaksian'),
(73, 'Departemen Pelayanan'),
(74, 'Departemen Persekutuan'),
(75, 'Departemen PI'),
(76, 'Desa Pon'),
(77, 'Distrik I'),
(78, 'Distrik II'),
(79, 'Distrik III'),
(80, 'Distrik IV'),
(81, 'Distrik V'),
(82, 'Distrik VI'),
(83, 'Distrik VII'),
(84, 'Distrik VIII'),
(85, 'Dolok Huluan'),
(86, 'Dolok Masihol'),
(87, 'Dolok Pardamean'),
(88, 'Dolok Saribu'),
(89, 'Dumai'),
(90, 'Dumai / Duri'),
(91, 'Duri'),
(92, 'Filipina'),
(93, 'Gajapokki'),
(94, 'Galang'),
(95, 'Gloria Haranggaol'),
(96, 'Gunung Monako'),
(97, 'Haranggaol'),
(98, 'Hinalang'),
(99, 'Horisan Tambun Raya'),
(100, 'Immanuel Saribudolok'),
(101, 'Immanuel Saribudolok / Bangun Saribu'),
(102, 'Immanuel Saribudolok / Purbatua Etek'),
(103, 'Indrapura'),
(104, 'Jambi'),
(105, 'Jambi / Palembang'),
(106, 'JPIC'),
(107, 'Kabanjahe'),
(108, 'Kalimantan Barat'),
(109, 'Kalimantan Tengah'),
(110, 'Kalimantan Timur'),
(111, 'Kampar'),
(112, 'Kantor Pusat'),
(113, 'Kisaran'),
(114, 'Klinik Pastoral'),
(116, 'Klinik Pastoral Distrik I'),
(115, 'Klinik Pastoral Distrik IV'),
(117, 'Klinik Pastoral Jakarta'),
(118, 'Kotarih'),
(119, 'Kp. Baru Sd. Raya'),
(120, 'Krakatau'),
(121, 'Kuala Bali'),
(122, 'Labora, Jakarta'),
(123, 'Lampung'),
(124, 'Lampung / Bratasena'),
(125, 'Lembaga Alkitab Indonesia'),
(126, 'Litbang di Raya'),
(127, 'Litbang GKPS Kantor Pusat'),
(128, 'Longkung Raya'),
(129, 'Lubuk Pakam'),
(130, 'Lubuk Pakam / Perbaungan'),
(131, 'Lubuk Pakam Barat'),
(132, 'Lubuk Pakam Barat I'),
(133, 'Majelis Pendeta'),
(134, 'Manik Saribu'),
(135, 'Mardingding'),
(136, 'Mariah Dolok'),
(137, 'Martua Siak'),
(138, 'Marturia Siak'),
(139, 'Marubun Longkung'),
(140, 'Medan Barat'),
(141, 'Medan Barat / Binjai'),
(142, 'Medan Selatan'),
(143, 'Medan Timur'),
(144, 'Medan Utara'),
(145, 'Medan Utara / Martubung'),
(146, 'Menteng Indah'),
(147, 'Menteng Indah / Marindal'),
(148, 'Merek Raya'),
(149, 'MM'),
(150, 'Muara Bungo'),
(151, 'Muara Bungo (Persiapan)'),
(152, 'Nagasaribu'),
(153, 'Nagoridolok'),
(154, 'PA BKM'),
(155, 'Palembang'),
(156, 'Palembang / Bengkulu'),
(157, 'Palembang / Pangkal Pinang'),
(158, 'Pamatang Purba'),
(159, 'Panei Tongah'),
(160, 'Pangkalan Kerinci'),
(161, 'Panombean Panei'),
(162, 'Pekalongan'),
(163, 'Pekan Baru'),
(164, 'Pekan Baru / Kandis'),
(165, 'Pekan Baru / Sei Putih'),
(166, 'Pematangsiantar'),
(167, 'Pembimbing Wanita'),
(168, 'Pemuda & Mahasiswa'),
(169, 'Perdagangan'),
(170, 'Perpustakaan'),
(171, 'Persiapan Studi S2'),
(172, 'Persiapan Studi S3'),
(173, 'PGI'),
(174, 'PGISU'),
(175, 'PKR'),
(176, 'Polonia'),
(177, 'Program UEM'),
(178, 'Purba'),
(179, 'Rakut Besi'),
(180, 'Rantau Prapat'),
(181, 'Raya'),
(182, 'Raya Bayu'),
(183, 'Raya Huluan'),
(184, 'Raya II'),
(185, 'Raya Kota'),
(186, 'Raya Usang'),
(187, 'Rayahuluan'),
(188, 'Rayakahean'),
(189, 'Rayakahean I'),
(190, 'Rayakahean II'),
(191, 'Rayakahean III'),
(192, 'Rayakahean IV'),
(193, 'Rayakahean V'),
(194, 'Rimanata'),
(195, 'S2'),
(196, 'S2 Korea'),
(197, 'S2 Philipina'),
(198, 'S2 STT Jakarta'),
(199, 'S2 UKDW'),
(200, 'S2 UKSW'),
(201, 'S2 YAI'),
(202, 'S3'),
(203, 'S3 Geneva'),
(204, 'S3 Hongkong'),
(205, 'S3 STT Jakarta'),
(206, 'Samarinda'),
(207, 'Saranpadang'),
(208, 'Saranpadang / Huta Bayu'),
(209, 'Saribudolok'),
(210, 'Sarimatondang'),
(211, 'Satia Negara'),
(212, 'Serdang'),
(213, 'Serdang Bedagai'),
(214, 'Serdang I'),
(215, 'Serdang II'),
(216, 'Serdang III'),
(217, 'Setia Negara'),
(218, 'Setia Negara - Tiga Dolok'),
(219, 'Siantar I'),
(220, 'Siantar II'),
(221, 'Siantar II / Bane'),
(222, 'Siantar III'),
(223, 'Siantar III / Siantar Timur'),
(224, 'Siantar IV'),
(225, 'Siantar IV / Serbelawan'),
(226, 'Siantar V'),
(227, 'Siantar VI'),
(228, 'Sibangun Mariah'),
(229, 'Sibolga'),
(230, 'Sibolga / Nias'),
(231, 'Sibuntuon'),
(232, 'Sidamanik'),
(233, 'Sidikalang'),
(234, 'Simanabun'),
(235, 'Simbou Kehen'),
(236, 'Sinaman Labah'),
(237, 'Sinar Baru'),
(238, 'Sinasih'),
(239, 'Singkawang'),
(240, 'Sion Siantar'),
(241, 'Sipituhuta'),
(242, 'Sipituhuta I'),
(243, 'Sipituhuta II'),
(244, 'Sirpang Sigodang'),
(245, 'Sitalasari Bah Kapul'),
(246, 'SMU Plus Raya'),
(247, 'Sondiraya'),
(248, 'SPI'),
(249, 'STT'),
(250, 'STT Abdi Sabda'),
(251, 'STT Jakarta'),
(252, 'STT Nomensen'),
(253, 'Subuntuon'),
(254, 'Suku Anak Dalam - Muara Bungo'),
(255, 'Sumbul'),
(256, 'Surabaya'),
(257, 'Surabaya / Denpasar'),
(258, 'Syalom Sinaman Labah'),
(259, 'Tanah Jawa'),
(260, 'Tangerang'),
(261, 'Tanjung Balai'),
(262, 'Tanjung Beringin'),
(263, 'Tanjung Pinang'),
(264, 'Tarutung'),
(265, 'Tebing Tinggi'),
(266, 'Tebing Tinggi I'),
(267, 'Tebing Tinggi I / Kp. Pon'),
(268, 'Tebing Tinggi II'),
(269, 'Teladan'),
(270, 'Tiga Dolok'),
(271, 'Tigarunggu'),
(272, 'Tigarunggu II'),
(273, 'Tim Pel. Dist V'),
(274, 'Tim Pelayana Distrik IV'),
(275, 'Tongging'),
(276, 'Ujung Batu Rokan'),
(277, 'UKDW'),
(278, 'UKSW'),
(279, 'Univ. Airlangga'),
(280, 'Woman Crisis Center - Sopou Damei'),
(281, 'Yayasan Pendidikan GKPS'),
(282, 'Yogyakarta'),
(283, 'Yogyakarta / Pekalongan');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `posisi`) VALUES
(1, 'Direktur'),
(2, 'Dosen'),
(3, 'Ephorus'),
(4, 'Kepala'),
(5, 'Ketua'),
(6, 'Kordinator'),
(7, 'Kordinator Pelayanan Pemuda & Buruh'),
(8, 'MPP'),
(9, 'Nakerman'),
(10, 'Pelaksana'),
(11, 'Pembimbing Pemuda'),
(12, 'Pemipin Redaksi'),
(13, 'Pendeta'),
(14, 'Pendeta Diperbantukan'),
(15, 'Pendeta Lansia'),
(16, 'Pendeta Mahasiswa'),
(17, 'Pendeta Pemuda'),
(18, 'Pendeta SM'),
(19, 'Peneliti'),
(20, 'Pengajar'),
(21, 'Penginjilan'),
(22, 'Perwakilan'),
(23, 'Praeses'),
(24, 'Sekretaris'),
(25, 'Sekretaris Jendral'),
(26, 'Staf'),
(27, 'Studi'),
(28, 'Tenaga Penuh Waktu '),
(29, 'Wafat'),
(30, 'Wakil Kordinator');

-- --------------------------------------------------------

--
-- Table structure for table `status_internal_org`
--

CREATE TABLE `status_internal_org` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_internal_org`
--

INSERT INTO `status_internal_org` (`id`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `status_jemaat`
--

CREATE TABLE `status_jemaat` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_jemaat`
--

INSERT INTO `status_jemaat` (`id`, `status`) VALUES
(1, 'Pos PI'),
(2, 'Persiapan'),
(3, 'Aktif'),
(4, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `studi`
--

CREATE TABLE `studi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text,
  `kota` varchar(60) NOT NULL,
  `propinsi` varchar(60) NOT NULL,
  `negara` varchar(60) NOT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studi`
--

INSERT INTO `studi` (`id`, `nama`, `alamat`, `kota`, `propinsi`, `negara`, `telp`, `email`, `website`) VALUES
(1, 'STT/Universitas/Akademi', '-', '-', '-', 'Indonesia', '', '', ''),
(2, 'STT Abdi Sabda', '-', 'Medan', 'Sumatera Utara', 'Indonesia', '', '', ''),
(3, 'STT HKBP/Nomensen', '-', 'Pematangsiantar', 'Sumatera Utara', 'Indonesia', '', '', ''),
(4, 'STT Jakarta', '-', 'Jakarta', 'DKI Jakarta', 'Indonesia', '', '', ''),
(5, 'STT Labora', '-', 'Jakarta', 'DKI Jakarta', 'Indonesia', '', '', ''),
(6, 'Universitas Kristen Satya Wacana (UKSW)', 'Jl. Diponegoro No. 52-60 Sidorejo, Salatiga Jawa Tengah 50711', 'Salatiga', 'Jawa Tengah', 'Indonesia', '(0298) 321212', '', 'www.uksw.edu'),
(7, 'Universitas Kristen Duta Wacana (UKDW)', '-', 'Yogyakarta', 'DI Yogyakarta', 'Indonesia', '', '', 'www.ukdw.ac.id'),
(8, 'Universitas Persada Indonesia YAI', 'Jl. Salemba', 'Jakarta', 'DKI Jakarta', 'Indonesia', '', '', ''),
(9, 'Universitas Airlangga', '-', 'Surabaya', 'Jawa Timur', 'Indonesia', '', '', 'www.unair.ac.id'),
(10, 'STT Australia', '-', '-', '-', 'Australia', '', '', ''),
(11, 'STT Korea', '-', 'Seoul', 'Seoul Capital Area', 'Korea', '', '', ''),
(12, 'STT Filipina', '-', 'Manila', 'Metro Manila', 'Filipina', '', '', ''),
(13, 'STT Swiss', '-', 'Geneva', 'N/A', 'Swiss', '', '', ''),
(14, 'STT Hong Kong', '-', 'Hong Kong', 'Hong Kong', 'RRT', '', '', ''),
(15, 'Persiapan Studi S2', '-', '-', '-', 'Indonesia', '-', '-', '-'),
(16, 'Persiapan Studi S3', '-', '-', '-', 'Indonesia', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` smallint(6) NOT NULL DEFAULT '1',
  `user_status_id` smallint(6) NOT NULL DEFAULT '1',
  `user_type_id` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `user_role_id`, `user_status_id`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '-Pc7h551xjnSWPtAbfynXaT0cIh8OTMH', '$2y$13$XTmYMjQ72K7rNcDD9sZYSe61TdM1AljBpbMf648uQT6tytpXgACdm', NULL, 'admin.gkpsnet@gmail.com', 2, 1, 1, 1460137578, 1460137578);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` smallint(6) NOT NULL,
  `user_role_name` varchar(45) NOT NULL,
  `user_role_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_role_name`, `user_role_value`) VALUES
(1, 'User', 10),
(2, 'Admin', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` smallint(6) NOT NULL,
  `user_status_name` varchar(45) NOT NULL,
  `user_status_value` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `user_status_name`, `user_status_value`) VALUES
(1, 'Tidak Aktif', 0),
(2, 'Pending', 1),
(3, 'Aktif', 2),
(4, 'Dihapus/Diblok', -1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` smallint(6) NOT NULL,
  `user_type_name` varchar(45) NOT NULL,
  `user_type_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type_name`, `user_type_value`) VALUES
(1, 'Jemaat Umum', 0),
(2, 'Full Timer', 1),
(3, 'Pegawai GKPS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `external_org`
--
ALTER TABLE `external_org`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `website` (`website`);

--
-- Indexes for table `full_timer`
--
ALTER TABLE `full_timer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`user_id`),
  ADD KEY `userid_2` (`user_id`),
  ADD KEY `strata_id` (`strata_id`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `full_timer_jabatan`
--
ALTER TABLE `full_timer_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_timer_strata`
--
ALTER TABLE `full_timer_strata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gelar`
--
ALTER TABLE `gelar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `singkatan` (`singkatan`);

--
-- Indexes for table `internal_org`
--
ALTER TABLE `internal_org`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `super_id` (`super_id`),
  ADD KEY `level_internal_id` (`level_internal_id`),
  ADD KEY `status_internal_org_id` (`status_internal_org_id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `super_id` (`super_id`),
  ADD KEY `leveljemaat_id` (`level_jemaat_id`),
  ADD KEY `status_id` (`status_jemaat_id`);

--
-- Indexes for table `jemaat_details`
--
ALTER TABLE `jemaat_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jemaat_id` (`jemaat_id`);

--
-- Indexes for table `karir`
--
ALTER TABLE `karir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fulltimer_id` (`full_timer_id`),
  ADD KEY `posisi` (`posisi_id`,`penempatan_id`),
  ADD KEY `tempat` (`penempatan_id`);

--
-- Indexes for table `karir_external`
--
ALTER TABLE `karir_external`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fulltimer_id` (`full_timer_id`),
  ADD KEY `posisi_id` (`posisi_id`),
  ADD KEY `external_id` (`external_org_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `karir_internal`
--
ALTER TABLE `karir_internal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fulltimer_id` (`full_timer_id`),
  ADD KEY `posisi_id` (`posisi_id`),
  ADD KEY `internal_id` (`internal_org_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `karir_jemaat`
--
ALTER TABLE `karir_jemaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fulltimer_id` (`full_timer_id`),
  ADD KEY `posisi_id` (`posisi_id`),
  ADD KEY `jemaat_id` (`jemaat_id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `karir_studi`
--
ALTER TABLE `karir_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fulltimer_id` (`full_timer_id`),
  ADD KEY `studi_id` (`studi_id`),
  ADD KEY `strata_id` (`strata_id`),
  ADD KEY `gelar_id` (`gelar_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `level_internal`
--
ALTER TABLE `level_internal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `posisi_id` (`posisi_id`);

--
-- Indexes for table `level_jemaat`
--
ALTER TABLE `level_jemaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posisi_id` (`posisi_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penempatan` (`penempatan`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posisi` (`posisi`);

--
-- Indexes for table `status_internal_org`
--
ALTER TABLE `status_internal_org`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `status_jemaat`
--
ALTER TABLE `status_jemaat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studi`
--
ALTER TABLE `studi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `role_id` (`user_role_id`),
  ADD KEY `status_id` (`user_status_id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `external_org`
--
ALTER TABLE `external_org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `full_timer`
--
ALTER TABLE `full_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;
--
-- AUTO_INCREMENT for table `full_timer_jabatan`
--
ALTER TABLE `full_timer_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `full_timer_strata`
--
ALTER TABLE `full_timer_strata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gelar`
--
ALTER TABLE `gelar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `internal_org`
--
ALTER TABLE `internal_org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jemaat_details`
--
ALTER TABLE `jemaat_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karir`
--
ALTER TABLE `karir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018;
--
-- AUTO_INCREMENT for table `karir_external`
--
ALTER TABLE `karir_external`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `karir_internal`
--
ALTER TABLE `karir_internal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karir_jemaat`
--
ALTER TABLE `karir_jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `karir_studi`
--
ALTER TABLE `karir_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;
--
-- AUTO_INCREMENT for table `level_internal`
--
ALTER TABLE `level_internal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `status_internal_org`
--
ALTER TABLE `status_internal_org`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_jemaat`
--
ALTER TABLE `status_jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studi`
--
ALTER TABLE `studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `full_timer`
--
ALTER TABLE `full_timer`
  ADD CONSTRAINT `full_timer_ibfk_1` FOREIGN KEY (`strata_id`) REFERENCES `full_timer_strata` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `full_timer_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `full_timer_jabatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `full_timer_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `internal_org`
--
ALTER TABLE `internal_org`
  ADD CONSTRAINT `internal_org_ibfk_1` FOREIGN KEY (`status_internal_org_id`) REFERENCES `status_internal_org` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD CONSTRAINT `jemaat_ibfk_1` FOREIGN KEY (`super_id`) REFERENCES `jemaat` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jemaat_ibfk_2` FOREIGN KEY (`level_jemaat_id`) REFERENCES `level_jemaat` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jemaat_ibfk_3` FOREIGN KEY (`status_jemaat_id`) REFERENCES `status_jemaat` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jemaat_details`
--
ALTER TABLE `jemaat_details`
  ADD CONSTRAINT `jemaat_details_ibfk_1` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaat` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `karir`
--
ALTER TABLE `karir`
  ADD CONSTRAINT `karir_ibfk_1` FOREIGN KEY (`full_timer_id`) REFERENCES `full_timer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_ibfk_2` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_ibfk_3` FOREIGN KEY (`penempatan_id`) REFERENCES `penempatan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `karir_external`
--
ALTER TABLE `karir_external`
  ADD CONSTRAINT `karir_external_ibfk_1` FOREIGN KEY (`full_timer_id`) REFERENCES `full_timer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_external_ibfk_2` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_external_ibfk_3` FOREIGN KEY (`external_org_id`) REFERENCES `external_org` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_external_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_external_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `karir_jemaat`
--
ALTER TABLE `karir_jemaat`
  ADD CONSTRAINT `karir_jemaat_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_jemaat_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `karir_studi`
--
ALTER TABLE `karir_studi`
  ADD CONSTRAINT `karir_studi_ibfk_1` FOREIGN KEY (`full_timer_id`) REFERENCES `full_timer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_studi_ibfk_2` FOREIGN KEY (`studi_id`) REFERENCES `studi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_studi_ibfk_3` FOREIGN KEY (`strata_id`) REFERENCES `gelar` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `karir_studi_ibfk_4` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `karir_studi_ibfk_5` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `karir_studi_ibfk_6` FOREIGN KEY (`gelar_id`) REFERENCES `gelar` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `level_jemaat`
--
ALTER TABLE `level_jemaat`
  ADD CONSTRAINT `level_jemaat_ibfk_1` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
