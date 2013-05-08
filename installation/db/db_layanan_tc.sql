-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2013 at 01:23 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_layanan_tc_pens1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen_instruktur`
--

CREATE TABLE IF NOT EXISTS `tb_absen_instruktur` (
  `id_absen_instruktur` int(11) NOT NULL AUTO_INCREMENT,
  `id_instruktur` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status_absen` text NOT NULL,
  `tgl_absen` varchar(100) NOT NULL,
  PRIMARY KEY (`id_absen_instruktur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_absen_instruktur`
--

INSERT INTO `tb_absen_instruktur` (`id_absen_instruktur`, `id_instruktur`, `id_kelas`, `status_absen`, `tgl_absen`) VALUES
(5, 6, 1, 'Hadir', '2013/06/20'),
(4, 6, 1, 'Hadir', '2013/06/19'),
(8, 6, 1, 'Hadir', '2013/06/21'),
(9, 13, 2, 'Hadir', '2013/02/01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_absen_peserta` (
  `id_absen_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `status_absen` text NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_absen_peserta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `tb_absen_peserta`
--

INSERT INTO `tb_absen_peserta` (`id_absen_peserta`, `id_kelas`, `no_peserta`, `id_instruktur`, `status_absen`, `tanggal`) VALUES
(86, 1, 96, 6, 'Sakit', '2013/03/14'),
(85, 1, 31, 6, 'Hadir', '2013/03/14'),
(84, 1, 95, 6, 'Hadir', '2013/03/14'),
(83, 1, 94, 6, 'Sakit', '2013/03/14'),
(82, 1, 100, 6, 'Hadir', '2013/03/14'),
(81, 1, 93, 6, 'Hadir', '2013/03/14'),
(41, 2, 98, 13, 'Hadir', '2013/02/01'),
(42, 2, 97, 13, 'Hadir', '2013/02/01'),
(43, 2, 92, 13, 'Hadir', '2013/02/01'),
(44, 2, 99, 13, 'Hadir', '2013/02/01'),
(45, 2, 93, 13, 'Hadir', '2013/02/01'),
(46, 2, 100, 13, 'Hadir', '2013/02/01'),
(47, 2, 94, 13, 'Hadir', '2013/02/01'),
(48, 2, 95, 13, 'Hadir', '2013/02/01'),
(49, 2, 96, 13, 'Hadir', '2013/02/01'),
(50, 2, 3, 13, 'Hadir', '2013/02/01'),
(80, 1, 99, 6, 'Hadir', '2013/03/14'),
(79, 1, 92, 6, 'Hadir', '2013/03/14'),
(78, 1, 6, 6, 'Sakit', '2013/03/14'),
(77, 1, 97, 6, 'Hadir', '2013/03/14'),
(76, 1, 98, 6, 'Hadir', '2013/03/14'),
(88, 8, 111, 22, 'Hadir', '2013/05/16'),
(89, 8, 19, 22, 'Hadir', '2013/05/16'),
(90, 8, 8, 22, 'Hadir', '2013/05/16'),
(91, 8, 112, 22, 'Hadir', '2013/05/16'),
(92, 8, 113, 22, 'Hadir', '2013/05/16'),
(93, 8, 109, 22, 'Hadir', '2013/05/16'),
(94, 8, 114, 22, 'Hadir', '2013/05/16'),
(95, 8, 12, 22, 'Hadir', '2013/05/16'),
(96, 8, 10, 22, 'Hadir', '2013/05/16'),
(98, 2, 98, 13, 'Hadir', '2013/02/02'),
(99, 2, 97, 13, 'Hadir', '2013/02/02'),
(100, 2, 96, 13, 'Hadir', '2013/02/02'),
(101, 2, 92, 13, 'Hadir', '2013/02/02'),
(102, 2, 100, 13, 'Hadir', '2013/02/02'),
(103, 2, 99, 13, 'Hadir', '2013/02/02'),
(104, 2, 93, 13, 'Hadir', '2013/02/02'),
(105, 2, 94, 13, 'Hadir', '2013/02/02'),
(106, 2, 95, 13, 'Hadir', '2013/02/02'),
(107, 2, 3, 13, 'Hadir', '2013/02/02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aksesoris`
--

CREATE TABLE IF NOT EXISTS `tb_aksesoris` (
  `id_aks` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_aks`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_aksesoris`
--

INSERT INTO `tb_aksesoris` (`id_aks`, `nama`, `photo`, `keterangan`) VALUES
(1, 'logo', 'images/logo/2013050320130502pens.png', 'Training Center EEPIS'),
(2, 'slide', 'images/slide/3.png', 'Training Center EEPIS'),
(5, 'slide', 'images/slide/DSC04254 - Copy.JPG', 'Politeknik Elektronika Negeri Surabaya'),
(6, 'Martha Citra Dewi', '', 'ttd kwitansi'),
(7, 'about website', '', '<b>Training Center EEPIS</b> adalah kegiatan training atau pelatihan \r\nyang diadakan oleh PENS atau Politeknik Elektronika Negeri Surabaya yang\r\n bertempat di PENS Surabaya. Kami menyediakan banyak training-training \r\nyang berkualitas dan fasilitas yang memadai. Training ini boleh diikuti \r\noleh khalayak umum sesuai tingkatan pengetahuan peserta tersebut.<br><br>\r\nPengajar dan konsultan dipilih dari para profesional, penulis, \r\nkontributor yang memiliki pengalaman riil dalam mengembangkan \r\nproject-project teknologi informasi sesuai dengan core competence \r\nmasing-masing. Mudah-mudahan dapat menjadi tempat aktualisasi diri, dan \r\nyang penting juga membuka lapangan kerja baru, yang sebenarnya banyak \r\nyang potensial dan memiliki kompetensi tetapi terhambat karena masalah \r\nkesempatan, information gap, dan kendala non-teknis lainnya.\r\n\r\n<h3>Visi &amp; Misi</h3>\r\n\r\n<h4>Visi</h4>\r\nMenjadi lembaga yang inovatif, educatif dan terpercaya.\r\n\r\n<h4>Misi</h4>\r\n1. Membentuk SDM yang professional dan bertaqwa Kepada Tuhan YME<br>\r\n2. Mencerdaskan bangsa<br>\r\n3. Membantu masyarakat untuk menemukan potensi peluang usaha<br>\r\n4. Membuka peluang sukses dalam usaha.<br><br>\r\n\r\n<h3>Slogan</h3>\r\nâ€œYour partner is Training Center EEPISâ€\r\n\r\n<h3>Moto</h3>\r\nâ€œMenjadi yang terbaik untuk yang terbaikâ€<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bay_kui`
--

CREATE TABLE IF NOT EXISTS `tb_bay_kui` (
  `id_bay_kui` int(11) NOT NULL AUTO_INCREMENT,
  `no_kuitansi` varchar(11) NOT NULL,
  PRIMARY KEY (`id_bay_kui`),
  UNIQUE KEY `id_bay_kui` (`id_bay_kui`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `tb_bay_kui`
--

INSERT INTO `tb_bay_kui` (`id_bay_kui`, `no_kuitansi`) VALUES
(1, 'K001'),
(2, 'K157'),
(3, 'K002'),
(4, 'K003'),
(5, 'K004'),
(6, 'K005'),
(7, 'K006'),
(8, 'K007'),
(9, 'K008'),
(10, 'K011'),
(11, 'K009'),
(12, 'K010'),
(13, 'K012'),
(14, 'K014'),
(15, 'K015'),
(16, 'K016'),
(17, 'K017'),
(18, 'K018'),
(19, 'K019'),
(20, 'K020'),
(21, 'K021'),
(22, 'K022'),
(23, 'K023'),
(24, 'K024'),
(25, 'K025'),
(26, 'K026'),
(32, 'K032'),
(28, 'K028'),
(29, 'K029'),
(30, 'K030'),
(31, 'K031'),
(33, 'K034'),
(49, 'K048'),
(35, 'K035'),
(36, 'K036'),
(37, 'K037'),
(38, 'K038'),
(39, 'K039'),
(40, 'K040'),
(41, 'K041'),
(42, 'K042'),
(43, 'K043'),
(44, 'K044'),
(45, 'K045'),
(46, 'K046'),
(47, 'K047'),
(48, 'K033'),
(50, 'K051'),
(51, 'K052'),
(52, 'K053'),
(53, 'K054'),
(54, 'K055'),
(55, 'K056'),
(56, 'K057'),
(57, 'K058'),
(58, 'K059'),
(59, 'K060'),
(60, 'K061'),
(61, 'K062'),
(62, 'K063'),
(63, 'K064'),
(64, 'K065'),
(65, 'K066'),
(66, 'K068'),
(67, 'K067'),
(68, 'K069'),
(69, 'K070'),
(70, 'K071'),
(71, 'K072'),
(72, 'K073'),
(73, 'K074'),
(74, 'K075'),
(75, 'K076'),
(76, 'K077'),
(77, 'K078'),
(78, 'K079'),
(79, 'K080'),
(80, 'K082'),
(81, 'K083'),
(82, 'K084'),
(83, 'K085'),
(84, 'K086'),
(85, 'K087'),
(86, 'K088'),
(87, 'K089'),
(88, 'K090'),
(89, 'K091'),
(90, 'K092'),
(91, 'K093'),
(95, 'K095'),
(93, 'K094'),
(94, 'K081'),
(96, 'K096'),
(97, 'K097'),
(98, 'K098'),
(99, 'K100'),
(100, 'K101'),
(101, 'K102'),
(102, 'K103'),
(103, 'K104'),
(104, 'K105'),
(105, 'K106'),
(106, 'K107'),
(107, 'K108'),
(108, 'K099'),
(109, 'K109'),
(110, 'K110'),
(111, 'K111'),
(112, 'K112'),
(113, 'K113'),
(114, 'K114'),
(115, 'K115'),
(116, 'K116'),
(117, 'K117'),
(118, 'K118'),
(119, 'K119'),
(120, 'K120'),
(121, 'K121'),
(122, 'K122'),
(123, 'K123'),
(124, 'K124'),
(125, 'K125'),
(126, 'K126'),
(127, 'K127'),
(128, 'K128'),
(129, 'K129'),
(130, 'K130'),
(131, 'K131'),
(132, 'K132'),
(133, 'K133'),
(134, 'K134'),
(135, 'K135'),
(136, 'K136'),
(137, 'K137'),
(138, 'K138'),
(139, 'K139'),
(140, 'K140'),
(141, 'K142'),
(142, 'K143'),
(143, 'K144'),
(144, 'K145'),
(145, 'K146'),
(146, 'K147'),
(147, 'K148'),
(148, 'K149'),
(149, 'K150'),
(150, 'K151'),
(151, 'K152'),
(152, 'K153'),
(153, 'K154'),
(154, 'K155'),
(155, 'K156'),
(156, 'K141'),
(157, 'K158'),
(158, 'K158'),
(159, 'K159'),
(160, 'K001'),
(161, 'K160'),
(162, 'K161'),
(163, 'K162'),
(209, 'GK001'),
(166, 'K002'),
(167, 'K163'),
(168, 'K002'),
(169, 'K002'),
(170, 'K002'),
(171, 'K002'),
(172, 'K002'),
(173, 'K017'),
(174, 'K003'),
(175, 'K164'),
(176, 'K165'),
(177, 'K166'),
(207, 'GK001'),
(208, 'GK001'),
(181, 'K167'),
(239, 'GK002'),
(210, 'K009'),
(186, 'K005'),
(187, 'K004'),
(188, 'K042'),
(189, 'K007'),
(211, 'K009'),
(192, 'K006'),
(212, 'K009'),
(213, 'GK001'),
(197, 'K016'),
(214, 'K014'),
(202, 'K008');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_daftar_peserta` (
  `no_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nrp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instansi_peserta` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `tanggal_daftar` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`no_peserta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `tb_daftar_peserta`
--

INSERT INTO `tb_daftar_peserta` (`no_peserta`, `id_jenis_peserta`, `nama`, `nrp`, `email`, `instansi_peserta`, `jabatan`, `tempat_lahir`, `tgl_lahir`, `gender`, `tlp`, `tanggal_daftar`, `gambar`) VALUES
(1, 5, 'Zulfikar Ali', '2023412390', 'zul@ymail.com', 'Pens surabaya', 'Mahasiswa', 'Ponorogo', '1985/04/26', 'laki-laki', '087765654321', '2013/03/19', ''),
(3, 13, 'Wildan Asrori', '7865894512', 'wildan@ymail.com', 'Universitas Jember', 'Mahasiswa', 'Jember', '1986/09/18', 'laki-laki', '087765432123', '2013/03/19', ''),
(4, 13, 'Alfan Zain Kusuma', '6754896512', 'alfan@ymail.com', 'Universitas Airlangga', 'Mahasiswa', 'Surabaya', '1985/03/04', 'laki-laki', '089776554434', '2013/03/19', ''),
(5, 15, 'Bahrul Yusuf', '', 'bahrul@ymail.com', 'PT. Semen Indonesia', 'Direktur', 'Gresik', '1969/07/12', 'laki-laki', '087765654321', '2013/03/19', ''),
(6, 5, 'Bangkit Saputra', '3451234590', 'bangkit@ymail.com', 'Pens surabaya', 'Mahasiswa', 'Ponorogo', '1987/04/13', 'laki-laki', '087756543212', '2013/03/19', ''),
(7, 15, 'Sakti Nugraha', '', 'sakti@yahoo.co.id', 'Cv. Pypsoft', 'Direktur', 'Ponorogo', '1985/07/24', 'laki-laki', '087765654321', '2013/03/19', ''),
(8, 15, 'Deni kurniawan', '', 'deni@ymail.com', 'PT. Garuda Food', 'Karyawan', 'Jakarta', '1986/08/21', 'laki-laki', '087765654321', '2013/03/19', ''),
(9, 13, 'Pringgo Juni S', '9876458954', 'ody@ymail.com', 'Universitas Indonesia', 'Mahasiswa', 'Jakarta', '1984/03/06', 'laki-laki', '089765654321', '2013/03/19', ''),
(10, 13, 'Tri Bintang Yanuar', '8765124512', 'bintang@ymail.com', 'Universitas Brawijaya', 'Mahasiswa', 'Kediri', '1985/03/18', 'laki-laki', '087765432123', '2013/03/19', ''),
(11, 15, 'Muhammad Nasron', '', 'ahmad@ymail.com', 'PT. Astra ', 'Karyawan', 'Jakarta', '1985/02/25', 'laki-laki', '087765432123', '2013/03/19', ''),
(12, 13, 'Ramdan', '7865437812', 'ramdan@ymail.com', 'Universitas Airlangga', 'Mahasiswa', 'Surabaya', '1982/01/15', 'laki-laki', '089776554434', '2013/03/19', ''),
(14, 5, 'Yunintan ', '0923421234', 'yuni@ymail.com', 'Pens surabaya', 'Mahasiswa', 'Ponorogo', '1987/07/22', 'perempuan', '089765654321', '2013/03/19', ''),
(15, 13, 'Aji Ainul Hakim', '7865451234', 'aji@ymail.com', 'Universitas Indonesia', 'Mahasiswa', 'Ponorogo', '1987/08/13', 'laki-laki', '087767654321', '2013/04/06', ''),
(16, 5, 'Supriyanto', '7654567134', 'supri@ymail.com', 'Pens surabaya', 'Mahasiswa', 'Ponorogo', '1989/10/27', 'laki-laki', '088989098765', '2013/04/06', ''),
(17, 15, 'Hadi Purwanto', '', 'hadi@ymail.com', 'PT. Danone', 'Mahasiswa', 'Ponorogo', '1989/05/25', 'laki-laki', '087765432134', '2013/04/06', ''),
(18, 5, 'Niken Putri', '2345123412', 'niken@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1988/04/22', 'perempuan', '087765432134', '2013/04/06', ''),
(19, 5, 'Bambang', '5643213467', 'bambang@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1983/04/13', 'laki-laki', '087765432134', '2013/04/06', ''),
(20, 5, 'Suraya', '7896543232', 'su@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1987/04/08', 'perempuan', '089234651234', '2013/04/06', ''),
(24, 5, 'Sutejo', '8723561238', 'Sutejo@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1988/04/05', 'laki-laki', '089234651234', '2013/04/06', ''),
(27, 13, 'Tika Dewi Lestari', '9876765123', 'tika@yahoo.com', 'Universitas Indonesia', 'Mahasiswa', 'Ponorogo', '06/04/1988', 'perempuan', '089234651234', '2013/04/09', ''),
(26, 5, 'Mirza Hadi Purnama', '6576543213', 'mirza@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '06/04/1988', 'laki-laki', '089234651234', '2013/04/09', ''),
(23, 5, 'Citra Ernawati', '8656712242', 'citra@yahoo.co.id', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1988/04/06', 'perempuan', '087765432134', '2013/04/06', ''),
(25, 15, 'Nicky Saputra', '', 'Nicky@yahoo.com', 'PT. Semen indonesia', 'Manager', 'Ponorogo', '1985/08/20', 'laki-laki', '087765432134', '2013/04/06', ''),
(29, 5, 'Amalia Herdiana', '6546781234', 'Herdiana@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/08/20', 'perempuan', '087765432134', '2013/04/11', ''),
(30, 5, 'Ratih Purnawati', '8721347123', 'ratih@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/02/25', 'perempuan', '087756126543', '2013/04/11', ''),
(31, 5, 'Wawan Hadiningrat', '8912341231', 'wawan@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/02/25', 'laki-laki', '087765432134', '2013/04/11', ''),
(33, 5, 'Ratrining Tiyas Handayani', '4527127612', 'ratri@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/07/24', 'perempuan', '089732451276', '2013/04/12', ''),
(34, 5, 'Sagita Mahardika', '6527129312', 'sagita@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1982/01/15', 'perempuan', '087712341283', '2013/04/12', ''),
(41, 5, 'Habiburrahman', '8976543451', 'habib@gmail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/02/25', 'laki-laki', '089127312641', '2013/04/19', ''),
(35, 13, 'Zelinda Fahriza', '1273181298', 'zelinnda@ymail.com', 'Universitas Pajajaran', 'Mahasiswa', 'Ponorogo', '1970/05/11', 'perempuan', '087761514190', '2013/04/13', ''),
(40, 5, 'Hafiz Abdullah', '1831283146', 'hafiz@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1985/02/25', 'laki-laki', '081923712121', '2013/04/18', ''),
(36, 5, 'Brodin Mahmud', '9826167123', 'mahmud@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/02/25', 'laki-laki', '087765434534', '2013/04/13', ''),
(37, 5, 'Ahmad Suwarno', '6546781234', 'alfinspeed@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1967/06/10', 'laki-laki', '087765434534', '2013/04/15', ''),
(38, 5, 'Muhammad Kalam', '1273181298', 'alfinspeed@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1975/04/01', 'laki-laki', '087765434534', '2013/04/15', ''),
(39, 5, 'Nabila Syuaib', '8312638123', 'nabila@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1989/08/24', 'perempuan', '087726109123', '2013/04/18', ''),
(43, 13, 'Dani Fahrezi', '7815412390', 'fahre@ymail.com', 'Universitas Indonesia', 'Mahasiswa', 'Ponorogo', '1995/04/04', 'laki-laki', '088765812413', '2013/04/25', ''),
(45, 5, 'Hadi Kuncoro', '8918129121', 'ahais@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1989/10/27', 'laki-laki', '087765434534', '2013/04/25', ''),
(46, 5, 'Martono', '1273181298', 'martono@Gmail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1989/05/25', 'laki-laki', '089234651234', '2013/04/25', ''),
(47, 13, 'Sukemi', '8976543451', 'sukemi@yahoo.co.id', 'Universitas Indonesia', 'Mahasiswa', 'Madiun', '1988/04/06', 'laki-laki', '082181219101', '2013/04/25', ''),
(48, 5, 'Mardatun', '9818213812', 'maaar@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1988/04/14', 'perempuan', '088178123561', '2013/04/25', ''),
(49, 5, 'Riatmojo', '8976543451', 'riat@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1988/04/05', 'laki-laki', '088172781721', '2013/04/25', ''),
(50, 15, 'Wahyudi', '', 'wahyu@mail.com', 'PT. Semen indonesia', 'Mahasiswa', 'Madiun', '1988/04/05', 'laki-laki', '081923712121', '2013/04/25', ''),
(51, 5, 'Mudjiudi', '9810271651', 'muhji@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1987/08/13', 'laki-laki', '087716712312', '2013/04/25', ''),
(52, 13, 'Naini', '5332216712', 'naini@gmail.com', 'Universitas Islam Surabaya', 'Dosen', 'Surabaya', '1985/02/25', 'laki-laki', '082290172912', '2013/04/25', ''),
(53, 5, 'Sulbiyah ', '9182719101', 'sul@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1988/04/06', 'laki-laki', '087765434534', '2013/04/25', ''),
(54, 13, 'Suhadi', '9810128191', 'suhadi@gmail.com', 'Universitas Indonesia', 'Mahasiswa', 'Surabaya', '1987/04/13', 'laki-laki', '081128381903', '2013/04/25', ''),
(55, 5, 'Kusnowo', '1273181298', 'kus@ymail.com', 'Universitas Brawijaya Kediri', 'Mahasiswa', 'Kediri', '1988/05/11', 'laki-laki', '081718912541', '2013/04/25', ''),
(56, 5, 'Edy Satriyanto', '9816172191', 'edy@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1987/04/13', 'laki-laki', '081178123181', '2013/04/25', ''),
(57, 5, 'Hermin Suhardi', '5332216712', 'hafiz@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1980/04/22', 'perempuan', '087765432134', '2013/04/25', ''),
(58, 13, 'Soeparno', '1273181298', 'soepa@yahoo.com', 'Universitas Pajajaran', 'Mahasiswa', 'Surabaya', '1988/04/14', 'laki-laki', '082181219101', '2013/04/25', ''),
(59, 13, 'Ari Wibowo', '5332216712', 'Nicky@yahoo.com', 'Universitas Pajajaran', 'Mahasiswa', 'Ponorogo', '1985/07/24', 'laki-laki', '089732451276', '2013/04/25', ''),
(60, 15, 'Sasmita Edy', '', 'sasmi@yahoo.com', 'PT. Astra Daihatsu', 'Mahasiswa', 'Madiun', '1987/04/08', 'laki-laki', '081923712121', '2013/04/25', ''),
(61, 13, 'Ipang Hernanda', '1273181298', 'hernanda@ymail.com', 'Universitas Pajajaran', 'Mahasiswa', 'Madiun', '1987/04/08', 'laki-laki', '089732451276', '2013/04/25', ''),
(62, 13, 'Supriatmojo', '8976543451', 'Suatmo@yahoo.com', 'Universitas Indonesia', 'Mahasiswa', 'Ponorogo', '1986/09/18', 'laki-laki', '089234651234', '2013/04/25', ''),
(63, 5, 'Soekarno', '8976543451', 'soekarno@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1986/08/21', 'laki-laki', '082181219101', '2013/04/25', ''),
(64, 15, 'Harmanti', '', 'harmanti@ymail.com', 'PT. Danone', 'Manager', 'Jakarta', '1986/08/21', 'perempuan', '087765434534', '2013/04/25', ''),
(65, 5, 'Jemari', '9287827191', 'jemari@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1989/05/25', 'laki-laki', '089732451276', '2013/04/25', ''),
(66, 5, 'Nurdianto', '8976543451', 'Nurdianto@mail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1953/09/09', 'laki-laki', '089732451276', '2013/04/25', ''),
(67, 13, 'Astrid Yuliarma', '5332216712', 'astrid@yahoo.com', 'Universitas Pajajaran', 'Mahasiswa', 'Surabaya', '1977/04/19', 'perempuan', '087717181761', '2013/04/25', ''),
(68, 5, 'Muhtarom', '4527127612', 'muhtarom@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1985/02/25', 'laki-laki', '0887181911211', '2013/04/25', ''),
(69, 13, 'Akbar Yusrofi', '8976543451', 'akbar@ymail.com', 'Universitas Indonesiaa', 'Mahasiswa', 'Surabaya', '1987/07/22', 'laki-laki', '087765432134', '2013/04/25', ''),
(70, 5, 'Febri Akbar Velayati', '8976543451', 'febri@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1986/09/18', 'laki-laki', '081178123181', '2013/04/25', ''),
(71, 13, 'Dhyuharoh Nugraha', '5332216712', 'dio@ymail.com', 'Universitas Islam Surabaya', 'Mahasiswa', 'Surabaya', '1986/04/09', 'laki-laki', '089732451276', '2013/04/25', ''),
(72, 5, 'Chris Ma''rufu B.A', '1273181298', 'chris@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1987/07/22', 'laki-laki', '081128381903', '2013/04/25', ''),
(73, 15, 'Erfan Nurdianto', '', 'Nurdianto@mail.com', 'PT. Semen indonesia', 'Manager', 'Surabaya', '1987/08/13', 'laki-laki', '089234651234', '2013/04/25', ''),
(74, 5, 'Faruqi Rosyid', '1273181298', 'faruki@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1974/03/19', 'laki-laki', '087765434534', '2013/04/25', ''),
(75, 15, 'Arif Nur Sudrajat', '', 'arif@mail.com', 'PT. Astra Daihatsu', 'Manager', 'Jakarta', '1983/04/11', 'laki-laki', '08817171635', '2013/04/25', ''),
(76, 13, 'Firman Zain Firdaus', '8976543451', 'fida@gmail.com', 'Universitas Indonesiaa', 'Mahasiswa', 'Ponorogo', '1985/03/18', 'laki-laki', '081718912541', '2013/04/25', ''),
(77, 13, 'Mohammad Zulfikar', '1273181298', 'zulfikar@ymail.com', 'Universitas Brawijaya', 'Mahasiswa', 'Ponorogo', '1985/03/18', 'laki-laki', '08771231234', '2013/04/25', ''),
(78, 5, 'Romdhano Syah Qohar', '1981817927', 'ramda@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1996/04/08', 'laki-laki', '098718191231', '2013/04/25', ''),
(79, 15, 'Arif Budi Wibowo', '', 'arif@mail.com', 'PT. Putra jaya', 'Karyawan', 'Kediri', '1970/04/15', 'laki-laki', '081819190121', '2013/04/25', ''),
(80, 15, 'Bayu Gelar Nawa', '', 'bayu@ymail.com', 'PT. Sumber Rejeki', 'Karyawan', 'Jakarta', '1986/04/16', 'laki-laki', '0887281919101', '2013/04/25', ''),
(81, 5, 'Faiz Aprilian Adiyanto', '8976543451', 'fais@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1975/04/29', 'laki-laki', '087765432134', '2013/04/25', ''),
(82, 5, 'Farizal Anasrulloh', '5332216712', 'anas@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1984/04/30', 'laki-laki', '08771231234', '2013/04/25', ''),
(83, 15, 'M Rijal Isnaini M', '', 'rizal@ymail.com', 'PT. Sumber Rejeki', 'Karyawan', 'Ponorogo', '1982/04/13', 'laki-laki', '081178123181', '2013/04/25', ''),
(84, 15, 'Nufi Sahilla', '', 'shilla@gmial.com', 'PT. Semen indonesia', 'Karyawan', 'Madiun', '1978/06/19', 'laki-laki', '088178123561', '2013/04/25', ''),
(85, 5, 'Rizqi Aziza Rahmawan', '1273181298', 'aziza@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Kediri', '1986/09/18', 'laki-laki', '087765434534', '2013/04/25', ''),
(86, 15, 'Robi Abiyasa', '', 'roobi@gmial.com', 'PT. Putra jaya', 'Karyawan', 'Jakarta', '1985/04/26', 'laki-laki', '087716712312', '2013/04/25', ''),
(87, 5, 'Septi Anggita Kuniawan', '5332216712', 'riat@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Jakarta', '1985/03/04', 'perempuan', '08817171635', '2013/04/25', ''),
(88, 15, 'Yordan Wivan Probo W', '', 'yordan@ymail.com', 'PT. Semen indonesia', 'Karyawan', 'Kediri', '1956/08/08', 'laki-laki', '087712417123', '2013/04/25', ''),
(89, 15, 'Nur Wakhid Khoirul M', '', 'wahid@yamil.com', 'PT. Putra jaya', 'Karyawan', 'Surabaya', '1976/04/13', 'laki-laki', '087715181612', '2013/04/25', ''),
(90, 5, 'Reild Meideant Pratama', '1273181298', 'pratama@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1983/04/13', 'perempuan', '081819190121', '2013/04/25', ''),
(91, 5, 'Yoga Agung Kurnia', '6546781234', 'yoga@gmail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1983/04/12', 'laki-laki', '08772727828', '2013/04/25', ''),
(92, 15, 'M Annas Annafi', '', 'anas@ymail.com', 'PT. Semen indonesia', 'Karyawan', 'Ponorogo', '1985/02/25', 'laki-laki', '088178123561', '2013/04/25', ''),
(93, 15, 'Ogga Elfira Etsa', '', 'ogga_oog@yahoo.com', 'PT. Semen indonesia', 'Karyawan', 'Jakarta', '1970/05/11', 'laki-laki', '081128381903', '2013/04/25', ''),
(94, 5, 'Syamsul Mirza', '9123716123', 'syamsul@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1967/06/10', 'laki-laki', '087716712312', '2013/04/25', ''),
(95, 15, 'Tri Bintang Dewantara', '', 'bintang@yahoo.com', 'PT. Danone', 'Karyawan', 'Jakarta', '1982/01/15', 'laki-laki', '082290172912', '2013/04/25', ''),
(96, 5, 'Cahyo Saputro', '9810271651', 'asroriw@gmail.com', 'Pens Surabaya', 'Mahasiswa', 'Madiun', '1996/06/21', 'laki-laki', '087718171826', '2013/04/25', ''),
(97, 15, 'Alfin Maulana Fikri', '', 'alfinmaulana96@ymail.com', 'PT. Brigstone', 'Karyawan', 'Jakarta', '1985/03/18', 'laki-laki', '081718912541', '2013/04/25', ''),
(98, 13, 'Aji Tirta Ahyana', '9182719101', 'aji_bejek@yahoo.com', 'Universitas Pajajaran', 'Mahasiswa', 'Jakarta', '1984/04/30', 'laki-laki', '089234651234', '2013/04/25', ''),
(99, 5, 'Niken Fatmala Savitri', '9865439812', 'savitri@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Jakarta', '1984/04/30', 'laki-laki', '08817171635', '2013/04/25', ''),
(100, 5, 'Muhammad Hassim ', '6576543213', 'ramdam@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1975/04/01', 'laki-laki', '087756126543', '2013/04/25', ''),
(144, 15, 'Ahmad Sulaiman', '', 'Ahmad@ymail.com', 'PT. Eka Jaya', 'manager', 'ponorogo', '1979/05/08', 'laki-laki', '087765654321', '2013/06/15', ''),
(102, 5, 'Aziz Bayu Putra', '6527129312', 'aziz@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1953/09/09', 'laki-laki', '087715181612', '2013/04/25', ''),
(103, 5, 'Bagus Hariyadi', '9876765123', 'bagus@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1970/05/11', 'laki-laki', '08771231234', '2013/04/25', ''),
(104, 5, 'Bondan Dwicahyo Nugraha', '8656712242', 'bondan@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1980/04/22', 'laki-laki', '081819190121', '2013/04/25', ''),
(105, 15, 'Citra Yuliana', '', 'citra@yahoo.co.id', 'PT. Sumber Rejeki', 'Karyawan', 'Ponorogo', '1975/04/01', 'perempuan', '082918919441', '2013/04/25', ''),
(106, 13, 'Devia Aulia Firsty', '0918261521', 'devia@ymail.com', 'Universitas Brawijaya Kediri', 'Mahasiswa', 'Jakarta', '1982/04/13', 'perempuan', '08928289745', '2013/04/25', ''),
(107, 5, 'Febri Arimbi', '9810128191', 'febri@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1986/09/18', 'laki-laki', '098718191231', '2013/04/25', ''),
(108, 13, 'Anugrah Putri Nurmawati', '9876765123', 'anugrah@ymail.com', 'Universitas Brawijaya', 'Mahasiswa', 'Ponorogo', '1989/04/25', 'laki-laki', '08817171635', '2013/04/25', ''),
(109, 15, 'Faizal Anwar', '', 'faizal@ymail.com', 'PT. Astra Daihatsu', 'Karyawan', 'Ponorogo', '1967/06/10', 'laki-laki', '081819190121', '2013/04/25', ''),
(145, 15, 'Julia Kamelia', '', 'sulaiman@ymail.com', 'PT. Eka Jaya', 'manager', 'ponorogo', '1964/05/19', 'laki-laki', '087765654213', '2013/06/15', ''),
(111, 5, 'Arum Kusumaning T W', '9819192819', 'arum@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1980/04/22', 'perempuan', '087765432134', '2013/04/25', ''),
(112, 15, 'Dina Tri Hariyani', '', 'dina@gmail.com', 'PT. Danone', 'Karyawan', 'Kediri', '1989/05/25', 'perempuan', '082290172912', '2013/04/25', ''),
(113, 15, 'Dita Irmasari', '', 'dita@yahoo.com', 'PT. PYP soft', 'Mahasiswa', 'Surabaya', '1978/06/19', 'perempuan', '087715181612', '2013/04/25', ''),
(114, 13, 'Ilma Aliya Nurmayasari', '9826167123', 'ilma@ymail.com', 'Universitas Brawijaya Kediri', 'Mahasiswa', 'Kediri', '1978/06/19', 'perempuan', '081128381903', '2013/04/25', ''),
(115, 15, 'Khusnul Amaliyah', '', 'amaliyah@ymail.com', 'PT. Semen indonesia', 'Karyawan', 'Jakarta', '1986/09/18', 'perempuan', '087761514190', '2013/04/25', ''),
(116, 5, 'Ika Lutfi Auliana', '9810128191', 'auliana@ymail.com', 'Universitas Indonesiaa', 'Mahasiswa', 'Ponorogo', '1985/07/24', 'perempuan', '087765432134', '2013/04/25', ''),
(117, 13, 'Ika Nur Saifudin', '8351719817', 'iaka@yahoo.co.id', 'Universitas Indonesiaa', 'Mahasiswa', 'Ponorogo', '1985/07/24', 'laki-laki', '098718191231', '2013/04/25', ''),
(118, 15, 'Muhammad Iqbal', '', 'iqbal@ymail.com', 'PT. Danone', 'Karyawan', 'Surabaya', '1968/04/23', 'laki-laki', '087728171617', '2013/04/25', ''),
(119, 5, 'Sri Apriliasari', '6576543213', 'sri@ymail.com', 'Pens Surabaya', 'Dosen', 'Surabaya', '1988/04/05', 'perempuan', '089127312641', '2013/04/25', ''),
(120, 15, 'Theo Aditya Pradana', '', 'theo@ymail.com', 'PT. Semen indonesia', 'Karyawan', 'Kediri', '1966/04/19', 'laki-laki', '08928289745', '2013/04/25', ''),
(121, 5, 'Tirta Gagah Muhadzib', '8351719817', 'gagah@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1989/04/25', 'laki-laki', '0887181911211', '2013/04/25', ''),
(122, 5, 'Bella Novia Angelina', '8912341231', 'angel@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1971/04/06', 'perempuan', '0887181911211', '2013/04/25', ''),
(123, 15, 'Arfian Fahrul Rhozaky', '', 'fahrul@ymail.com', 'PT. PYP soft', 'Karyawan', 'Surabaya', '1985/04/26', 'laki-laki', '081923712121', '2013/04/25', ''),
(124, 13, 'Dea Africo Santoso', '9182719101', 'deA@ymail.com', 'Universitas Indonesia', 'Mahasiswa', 'Kediri', '1984/04/23', 'laki-laki', '087712417123', '2013/04/25', ''),
(125, 5, 'Fikki Septian Fahjri W.A', '5332216712', 'fikki@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1970/05/11', 'laki-laki', '089127312641', '2013/04/25', ''),
(126, 5, 'Ahmad Zainal Abidin', '5332216712', 'abidin@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/03/18', 'laki-laki', '08817171635', '2013/04/25', ''),
(127, 15, 'Dimas Akbar Kurniawan', '', 'dimas@yahoo.com', 'PT. PYP soft', 'Karyawan', 'Ponorogo', '1984/04/23', 'laki-laki', '087712417123', '2013/04/25', ''),
(128, 5, 'Dimas Setiaji', '8656712242', 'setiaji@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1983/04/12', 'laki-laki', '039838437617', '2013/04/25', ''),
(129, 5, 'Bagus Purwo Asmoro', '9865439812', 'bagus@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1977/04/19', 'laki-laki', '08928289745', '2013/04/25', ''),
(130, 15, 'Mahendra Mahardika', '', 'mahendra@ymail.com', 'PT. PYP soft', 'Karyawan', 'Ponorogo', '1977/04/19', 'laki-laki', '0828380494', '2013/04/25', ''),
(131, 13, 'Moh Rizzent Billy Royan ', '9865439812', 'reoyan@ymail.com', 'Universitas Brawijaya', 'Mahasiswa', 'Ponorogo', '1982/01/15', 'laki-laki', '0887181911211', '2013/04/25', ''),
(132, 5, 'Mohammad Hafiz N H', '8656712242', 'hafiz@yahoo.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1970/05/11', 'laki-laki', '089234651234', '2013/04/25', ''),
(133, 5, 'Trisno Budi Utomo', '9123716123', 'trisno@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Surabaya', '1967/06/10', 'laki-laki', '089732451276', '2013/04/25', ''),
(134, 15, 'Verry Saputro Rifai ', '', 'verry@ymail.com', 'PT. Brigstone', 'Karyawan', 'Madiun', '1964/05/19', 'laki-laki', '087729191736', '2013/04/25', ''),
(135, 15, 'Bintang', '', 'bntang@ymail.com', 'PT. Angkasa Jaya', 'Manager', 'Ponorogo', '1975/05/09', 'laki-laki', '08872728281', '2013/05/01', ''),
(136, 13, 'Mustajab', '', 'mustajab@ymail.com', 'Universitas Indonesia', 'Mahasiswa', 'Ponorogo', '1957/05/13', 'laki-laki', '0877656121415', '2013/05/02', ''),
(137, 5, 'Dihin Muriyatmoko', '8329030283', 'dihin@ymail.com', 'Pens Surabaya', 'Mahasiswa', 'Ponorogo', '1985/05/16', 'laki-laki', '0877272718172', '2013/05/02', ''),
(138, 15, 'Sahru Kahan', '', 'sahru@ymail.com', 'PT. Mulya Karya', 'Manager', 'Ponorogo', '1960/05/19', 'laki-laki', '088329191021', '2013/05/05', ''),
(139, 15, 'Ahmad Bahrudin', '', 'bahru@ymail.com', 'PT. Mulya Karya', 'Manager', 'Ponorogo', '1960/05/19', 'laki-laki', '088329191021', '2013/05/05', ''),
(140, 15, 'Maharani', '', 'maharani@ymail.com', 'PT. Angkasa Jaya', 'Manager', 'Madiun', '1986/05/14', 'laki-laki', '087716718167', '2013/05/05', ''),
(141, 15, 'Endang Saputri ', '', 'saputri@ymail.com', 'PT. Eka Jaya', 'Manager', 'Ponorogo', '1968/05/21', 'perempuan', '087756171512', '2013/05/07', ''),
(142, 15, 'Dwi Indah', '', 'dwi@ymail.com', 'PT. Samudra Raya', 'manager', 'Madiun', '1978/05/02', 'perempuan', '081234581234', '2013/05/14', ''),
(143, 15, 'Lia Rahmawati', '', 'rahma@ymail.com', 'PT. Samudra Raya', 'karyawan', 'Nganjuk', '1961/05/17', 'perempuan', '087712123412', '2013/05/14', ''),
(147, 15, 'Nabila rahma', '', 'rd@gjhnm', 'PT. Eka Jaya', 'manager', 'ponorogo', '1961/05/17', 'laki-laki', '087765654213', '2013/06/15', ''),
(152, 15, 'Jumakir', '', 'alfin@ymal', 'PT. Eka Jaya', 'manager', 'ponorogo', '1979/05/08', 'laki-laki', '087765654321', '2013/06/15', ''),
(210, 15, 'Senja', '', 'sulaiman@ymail.com', 'PT. Eka Jaya', 'manager', 'ponorogo', '2013/06/04', 'laki-laki', '56789', '2013/06/26', ''),
(156, 15, 'Rangers', '', 'alfin@ymal', 'PT. Restu Jaya', 'manager', 'ponorogo', '1964/05/19', 'laki-laki', '087765654213', '2013/06/15', ''),
(180, 15, 'Ahmad Safi''i', '', 'Ahmad@ymail.com', 'PT. PLN', 'manager', 'ponorogo', '1979/05/08', 'laki-laki', '088828287373', '2013/06/17', ''),
(181, 15, 'Toshiba', '', 'sulaiman@ymail.com', 'PT. PLN', 'manager', 'ponorogo', '1964/05/19', 'laki-laki', '087765654213', '2013/06/17', ''),
(209, 15, 'Hanjui', '', 'Ahmad@ymail.com', 'PT. Eka Jaya', 'manager', 'ponorogo', '1979/05/08', 'laki-laki', '088828287373', '2013/06/26', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pelatihan`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pelatihan` (
  `id_details_pelatihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori_training` int(11) NOT NULL,
  `pelatihan` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_details_pelatihan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tb_detail_pelatihan`
--

INSERT INTO `tb_detail_pelatihan` (`id_details_pelatihan`, `id_kategori_training`, `pelatihan`, `ket`) VALUES
(1, 15, 'Development', 'Development'),
(2, 15, 'Programming', '-'),
(6, 15, 'Graphic Design', 'Peserta diharapkan bisa memodifikasi gambar'),
(8, 15, 'Linux', 'Sistem ,cara kerja linux'),
(9, 15, 'Multimedia', 'Design, multimedia'),
(11, 15, 'Database', 'Mengolah databases'),
(17, 15, 'Management', 'Management'),
(18, 15, 'Networking', 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_director`
--

CREATE TABLE IF NOT EXISTS `tb_director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `director` varchar(100) NOT NULL,
  PRIMARY KEY (`id_director`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_director`
--

INSERT INTO `tb_director` (`id_director`, `director`) VALUES
(1, 'Ir. Dadet Pramadihanto, M.Eng, Ph.D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_group_kuitansi`
--

CREATE TABLE IF NOT EXISTS `tb_group_kuitansi` (
  `id_group_kuitansi` int(11) NOT NULL AUTO_INCREMENT,
  `no_group_kuitansi` varchar(50) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_judul_jenis_peserta` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tgl_kuitansi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group_kuitansi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `tb_group_kuitansi`
--

INSERT INTO `tb_group_kuitansi` (`id_group_kuitansi`, `no_group_kuitansi`, `no_peserta`, `id_judul_jenis_peserta`, `discount`, `tgl_kuitansi`) VALUES
(61, 'GK001', 180, 197, 5, '2013/06/17'),
(62, 'GK001', 180, 206, 5, '2013/06/17'),
(63, 'GK001', 181, 197, 5, '2013/06/17'),
(64, 'GK001', 181, 206, 5, '2013/06/17'),
(75, 'GK002', 209, 46, 0, '2013/06/26'),
(76, 'GK002', 209, 43, 0, '2013/06/26'),
(77, 'GK002', 210, 46, 0, '2013/06/26'),
(78, 'GK002', 210, 43, 0, '2013/06/26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_instruktur`
--

CREATE TABLE IF NOT EXISTS `tb_instruktur` (
  `id_instruktur` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `NIP` text NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_instruktur`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tb_instruktur`
--

INSERT INTO `tb_instruktur` (`id_instruktur`, `nama`, `NIP`, `instansi`, `jabatan`, `tempat_lahir`, `tgl_lahir`, `gender`, `tlp`, `status`, `ket`, `foto`) VALUES
(6, 'Mulyawan Sentosa, S. ST.', '0812343467', 'Universitas Brawijaya    ', 'Dosen', 'Kediri', '1961/11/03', 'laki-laki', '087765657812', 'aktif', 'Mulyawan Sentosa, S. ST. Lahir di Rangkasbitung, Banten 3 Mei 1986. Menamatkan S1 di Politeknik TEDC Bandung 2005-2009 dari VEDC (Vocational Education Development Center Jakarta) bidang Accounting and Computerized Accounting. Berpengalaman menjadi instruktur  MYOB di beberapa instansi baik formal maupun non formal. Pernah menjadi Analyzer of Accounting System Information di suatu perusahaan. Sangat familiar dan menguasai bidang Accounting: Financial Accounting (Service, Retailer, Manufacture), Proprietorship Company Accounting, Branch Company Accounting, Firm/ Partnership Company Accounting, Limited Company Accounting, Financial Report (Income Statement, Capital Statement, Balance Sheet, Cash Flow), Tax Accounting dan Computerized Accounting (MYOB). Berhasil meluncurkan Compact V.1.0 yang merupakan salah satu program pengelolaan keuangan perusahaan. Saat ini aktif sebagai instruktur MYOB.', 'id_6_Mulyawan Sentosa, S. ST._bm-mulyawan.jpg'),
(18, 'Wawan Kusdiawan, M.Kom', '2134987654', 'Universitas Airlangga    ', 'Dosen', 'Surabaya', '1951/04/03', 'laki-laki', '087767654512', 'aktif', 'Wawan Kusdiawan, M.Kom., adalah seorang praktisi di bidang IT khususnya software development dan Akademisi. Dengan pengalaman mengembangkan beberapa program aplikasi database untuk perusahaan-perusahaan multinasional dan UKM seperti sistem absensi dan payroll, sistem inventory barang, sistem komputerisasi invoicing, sistem komputerisasi layanan medis klinik, sistem komputerisasi inventory dan penjualan stokist, sistem komputerisasi perpustakaan dll.Selain itu aktif sebagai pengajar di beberapa Perguruan\r\nTinggi di Jakarta', 'id_18_Wawan Kusdiawan, M.Kom_bm-wawankusdiawan.jpg'),
(13, 'Teti Zekirae Sitompul', '2134345621', 'Universitas Indonesia  ', 'Dosen', 'Madiun', '1967/12/03', 'perempuan', '089876565412', 'aktif', 'Kelahiran 31 Januari 1971, menyelesaikan pendidikan menengah di Stella Duce Catholic, Yogyakarta pada tahun 1989. Menempuh pendidikan S1 di Universits Gadjah Mada, Yogyakarta pada tahun 1995. Menamatkan program Magister Teknologi Informasi di Universitas Indonesia, Jakarta pada tahun 2002. Tersertifikasi ITIL v3 Foundation pada tahun 2010. Saat ini aktif sebagai konsultan dan instruktur dengan bidang keahlian pada desain perangkat lunak dan analisa bisnis proses khusus pemerintahan dan database desain sejak tahun 1996, serta ITIL Foundation sejak 2010.', 'id_13_Teti Zekirae Sitompul_teti.jpg'),
(14, 'Andry', '5678567654', 'Universitas Jember   ', 'Dosen', 'Jember', '1950/03/04', 'laki-laki', '085234786512', 'aktif', 'Kelahiran Blitar, 6 November 1981. Menamatkan pendidikan Teknik Informatika di Institut Teknologi Bandung pada tahun 2004. Menguasai dengan sangat baik bahasa pemrograman Java, Android, dan iPhone. Saat ini aktif sebagai project leader, analyst dan developer aplikasi mobile (J2ME dan Android) di beberapa perusahaan swasta terkemuka. Pernah menjadi pemenang pertama pada Indosat Wireless Innovation Contest (IWIC) 4th dan 5th, kategori aplikasi Android dan commerce. Selain itu, aktif juga sebagai pembicara dan trainer baik itu Java maupun Android.', 'id_14_Andry_andry.jpg'),
(22, 'Endy Muhardin', '7564308876', 'Pens surabaya  ', 'Dosen', 'Surabaya', '1952/01/01', 'laki-laki', '089765455656', 'aktif', 'Kelahiran Jakarta, 8 Juni 1979. Menyelesaikan program S1 di Sekolah Tinggi Teknologi Telekomunikasi Bandung pada tahun 2001. Tersertifikasi PHP 4, Java 2 Platform Enterprise Edition, Java 2 non-GUI dan Java 2 Fundamentals dari Brainbench. Aktif sebagai pengajar dan pengembang software house dengan teknologi Java 6, Oracle, Spring Framework, JPOS (ISO-8583) dan MySQL.', 'id_22_Endy Muhardin_endy.jpg'),
(24, 'Ibnu Sina Wardy', '4327087654', 'Pens surabaya    ', 'Dosen', 'Sidoarjo', '1963/02/06', 'laki-laki', '089765654321', 'aktif', 'Menyelesaikan program S1 (Informatics Engineering)  di Institute of Technology Bandung pada tahun 2005. Saat ini aktif di beberapa projek pengembangan aplikasi berbasis Android Mobile. Selain mempimpin projek sejak 2005 hingga saat ini, juga aktif mengisi beberapa  workshop dan training seputer dunia Android dan Java di Indonesia baik di perusahaan, kampus maupun umum.', 'id_24_Ibnu Sina Wardy_ibnu-sina.jpg'),
(25, 'Ivan Sudirman', '1254378654', 'Pens Surabaya  ', 'Guru', 'Ponorogo', '1988/04/01', 'laki-laki', '089767875432', 'aktif', 'Lahir di Jakarta, 4 Januari 1977. Setelah lulus dari SMA Taruna Nusantara tahun 1995, kemudian masuk ke teknik elektro ITB. Menyelesaikan S1 Teknik Elektro ITB tahun 2000 dan S2 pada jurusan yang sama tahun 2002. Saat ini bekerja sebagai System Integrator dan Konsultan Teknologi Informasi di Jakarta. Network arsitektur diberbagai perusahaan di jakarta. Pengajar Cisco Networking dibeberapa lembaga pelatihan dan universitas di jakarta.', 'id_25_Ivan Sudirman_ivan-sudirman.jpg'),
(32, 'Kurnia Santoso, ST.', '6712914123', 'Pens Surabaya  ', 'Dosen', 'Ponorogo', '2013/06/19', 'laki-laki', '087454321671', 'aktif', 'Lahir di Jakarta 3 Mei 1976. Menamatkan S1 Teknik Industri pada tahun 2007. Memiliki sertifikasi internasional: Microsoft Certified Database Administrator (MCDBA), Microsoft Certified Solution Developer (MCSD) danMicrosoft Certified Technology Specialist for SQL Server 2005. Aktif sebagai konsultan di bidang Software Development Engineer dan Computer Programmer dengan berbagai jenis tools dan bahasa pemrograman yang dikuasai seperti: ASP, HTML, IIS, SQL Server, Visual Basic, Exchange Server, Visual Studio .NET dan SharePoint. Selain sebagai konsultan, juga aktif sebagai pengajar dalam bidang yang sama sejak tahun 2002 sampai sekarang.', 'id_32_Kurnia Santoso, ST._kurnia.jpg'),
(33, 'Ir. Wawalamona N.P., MMSI, PMP, CMPM,', '5613651389', 'Pens Surabaya  ', 'Dosen', 'Ponorogo', '2013/06/19', 'laki-laki', '087454321671', 'pasif', 'Menyelesaikan pendidikan S1 jurusan Teknologi Industri di IPB tahun 1988, dan S2 jurusan Manajemen Sistem Informasi di Universitas Gunadarma tahun 1996. Tersertifikasi Master of Project Management, di Brainbench USA tahun 2001 dan Project Management Professional, di PMI pada tahun 2005. Berpengalaman lebih dari 19 tahun dalam pengelolaan projek nasional maupun internasional.', 'id_33_Ir. Wawalamona N.P., MMSI, PMP, CMPM,_485121_549260678440722_131090229_n1.jpg'),
(27, 'M. Choirul Amri', '5613651389', 'Universitas Brawijaya    ', 'Dosen', 'Ponorogo', '1984/04/30', 'laki-laki', '087454321671', 'pasif', 'Lulus dari SMU Taruna Nusantara tahun 1993. Menyelesaikan pendidikan S1 dari jurusan Teknik Industri STT Telkom-Bandung pada tahun 1998. Berstatus sebagai Microsoft Certified Professional dengan sertifikasi MCSD dan MCDBA. Berpengalaman sebagai administrator sistem jaringan, desain dan administrasi database, serta pengembangan berbagai aplikasi bisnis dengan arsitektur Client/Server dan Multitier. Berpengalaman dalam aspek-aspek manajemen, accounting, serta isu-isu perubahan organisasi dalam implementasi IT. Choirul Amri adalah penulis buku Belajar Sendiri Mengelola Mail Server dengan MDaemon yang telah diterbitkan oleh PT. Elex Media Komputindo, serta sebagai webmaster situs www.IndoAdmin.Net. Saat ini mengelola milis SQL Server di sqlserver-indo@yahoogroups.comThis email address is being protected from spam bots, you need Javascript enabled to view it, serta aktif sebagai group leader VB.NET di organisasi Indonesia .Net Developer Community (INDC), yang merupakan komunitas pengembang .Net di Indonesia.', 'id_27_M. Choirul Amri_m-choirul-amry.jpg'),
(31, 'Agus Fanar Syukri', '5613651389', 'Universitas Brawijaya               ', 'Dosen', 'Ponorogo', '1978/06/19', 'laki-laki', '087454321671', 'pasif', 'Menyelesaikan program S1 (B.Eng) dalam bidang information science pada tahun 1994, di Saga University, Jepang. Dan S2 (M.Eng) dalam bidang Information Security pada tahun 1998 di Japan Advanced Institute of Science & Technology (JAIST). Dan menyelesaikan program S3 (PhD) di The University of Electro-Communications, Tokyo, Jepang. Di Indonesia berstatus sebagai peneliti pada instansi Lembaga Ilmu Pengetahuan Indonesia (LIPI), tepatnya diKalibrasi, Instrumentasi, dan Metrologi (KIM-LIPI). Berpengalaman sebagai engineer dan researcher selama beberapa tahun di perusahaan NEC, R&D Laboratory. Aktif dalam berbagai organisasi pelajar dan kemahasiswaan (pengurus PPI Jepang), dan pengurus organisasi ilmiah ISTECS dan IECI Japan', 'id_31_Agus Fanar Syukri_agus-fanar-syukri-284x300.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_training`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_training` (
  `id_jadwal_training` int(11) NOT NULL AUTO_INCREMENT,
  `id_details_pelatihan` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `tgl1` varchar(20) NOT NULL,
  `tgl2` varchar(20) NOT NULL,
  `jam_mulai` varchar(25) NOT NULL,
  `jam_selesai` varchar(25) NOT NULL,
  `ket_sertifikat` text NOT NULL,
  PRIMARY KEY (`id_jadwal_training`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `tb_jadwal_training`
--

INSERT INTO `tb_jadwal_training` (`id_jadwal_training`, `id_details_pelatihan`, `id_judul`, `tgl1`, `tgl2`, `jam_mulai`, `jam_selesai`, `ket_sertifikat`) VALUES
(12, 1, 7, '2013/01/21', '2013/01/25', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(11, 1, 5, '2013/01/16', '2013/01/20', '7:00 AM', '11:00 AM', 'PENS'),
(10, 1, 3, '2013/01/11', '2013/01/15', '7:00 AM', '11:00 AM', 'PENS'),
(8, 1, 2, '2013/01/01', '2013/01/05', '7:00 AM', '11:00 AM', 'PENS'),
(9, 1, 4, '2013/01/06', '2013/01/10', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(13, 1, 8, '2013/01/26', '2013/01/30', '7:00 AM', '11:00 AM', 'PENS'),
(14, 1, 9, '2013/02/01', '2013/02/05', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(15, 1, 10, '2013/02/06', '2013/02/10', '7:00 AM', '11:00 AM', 'PENS'),
(16, 1, 11, '2013/04/11', '2013/04/15', '7:00 AM', '11:00 AM', 'PENS'),
(17, 1, 12, '2013/02/16', '2013/02/20', '7:00 AM', '11:00 AM', 'PENS'),
(18, 1, 13, '2013/02/21', '2013/02/24', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(19, 1, 14, '2013/03/01', '2013/03/04', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(20, 1, 15, '2013/03/05', '2013/03/08', '7:00 AM', '11:00 AM', 'PENS'),
(21, 1, 28, '2013/03/09', '2013/03/13', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(22, 1, 29, '2013/03/14', '2013/03/18', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(23, 1, 30, '2013/03/19', '2013/03/22', '7:00 AM', '11:00 AM', 'PENS'),
(24, 1, 31, '2013/03/23', '2013/04/01', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(25, 1, 32, '2013/04/02', '2013/04/06', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(26, 1, 33, '2013/04/07', '2013/04/11', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(27, 1, 34, '2013/04/12', '2013/04/15', '7:00 AM', '11:00 AM', 'PENS'),
(28, 1, 35, '2013/04/16', '2013/04/19', '7:00 AM', '11:00 AM', 'PENS'),
(29, 1, 36, '2013/04/20', '2013/04/29', '7:00 AM', '11:00 AM', 'PENS'),
(30, 1, 37, '2013/04/30', '2013/05/04', '7:00 AM', '11:00 AM', 'Oracle Indonesia'),
(31, 2, 16, '2013/05/06', '2013/05/10', '7:00 AM', '11:00 AM', 'PENS'),
(32, 2, 17, '2013/05/11', '2013/05/15', '7:00 AM', '11:00 AM', 'PENS'),
(33, 2, 18, '2013/05/16', '2013/05/20', '7:00 AM', '11:00 AM', 'PENS'),
(34, 2, 19, '2013/05/21', '2013/05/25', '7:00 AM', '11:00 AM', 'PENS'),
(35, 2, 20, '2013/05/26', '2013/05/30', '7:00 AM', '11:00 AM', 'PENS'),
(36, 2, 21, '2013/06/01', '2013/06/05', '7:00 AM', '11:00 AM', 'PENS'),
(37, 2, 22, '2013/06/06', '2013/06/10', '7:00 AM', '11:00 AM', 'PENS'),
(38, 2, 23, '2013/06/11', '2013/06/13', '7:00 AM', '11:00 AM', 'PENS'),
(39, 2, 24, '2013/06/14', '2013/06/18', '7:00 AM', '11:00 AM', 'PENS'),
(40, 2, 25, '2013/06/19', '2013/06/22', '7:00 AM', '11:00 AM', 'PENS'),
(72, 2, 67, '2013/08/12', '2013/08/15', '7:00 AM', '11:00 AM', 'PENS'),
(73, 9, 72, '2013/08/26', '2013/08/29', '7:00 AM', '11:00 AM', 'PENS'),
(71, 2, 66, '2013/08/05', '2013/08/08', '7:00 AM', '11:00 AM', 'PENS'),
(70, 2, 65, '2013/07/29', '2013/08/01', '7:00 AM', '11:00 AM', 'PENS'),
(60, 8, 68, '2013/08/05', '2013/08/08', '7:00 AM', '11:00 AM', 'PENS'),
(64, 8, 69, '2013/08/12', '2013/08/16', '7:00 AM', '11:00 AM', 'PENS'),
(62, 2, 60, '2013/06/24', '2013/06/27', '7:00 AM', '11:00 AM', 'PENS'),
(63, 2, 61, '2013/07/01', '2013/07/05', '7:00 AM', '11:00 AM', 'PENS'),
(65, 8, 70, '2013/08/19', '2013/08/23', '7:00 AM', '11:00 AM', 'PENS'),
(66, 8, 71, '2013/08/26', '2013/08/30', '7:00 AM', '11:00 AM', 'PENS'),
(67, 2, 62, '2013/07/08', '2013/07/11', '7:00 AM', '11:00 AM', 'PENS'),
(68, 2, 63, '2013/07/15', '2013/07/18', '7:00 AM', '11:00 AM', 'PENS'),
(69, 2, 64, '2013/07/22', '2013/07/25', '7:00 AM', '11:00 AM', 'PENS'),
(57, 6, 56, '2013/06/23', '2013/06/24', '7:00 AM', '11:00 AM', 'PENS'),
(58, 6, 58, '2013/06/26', '2013/06/27', '7:00 AM', '11:00 AM', 'PENS'),
(59, 6, 59, '2013/07/01', '2013/07/02', '7:00 AM', '11:00 AM', 'PENS'),
(74, 9, 73, '2013/09/02', '2013/09/06', '7:00 AM', '11:00 AM', 'PENS'),
(75, 9, 74, '2013/09/09', '2013/09/12', '7:00 AM', '11:00 AM', 'PENS'),
(76, 9, 75, '2013/09/16', '2013/09/19', '7:00 AM', '11:00 AM', 'PENS'),
(77, 11, 77, '2013/09/02', '2013/09/05', '7:00 AM', '11:00 AM', 'PENS'),
(78, 11, 78, '2013/09/09', '2013/09/12', '7:00 AM', '11:00 AM', 'PENS'),
(79, 11, 79, '2013/10/07', '2013/10/10', '7:00 AM', '11:00 AM', 'PENS'),
(80, 11, 80, '2013/10/14', '2013/10/18', '7:00 AM', '11:00 AM', 'PENS'),
(81, 11, 81, '2013/10/21', '2013/10/24', '7:00 AM', '11:00 AM', 'PENS'),
(82, 11, 82, '2013/10/28', '2013/10/31', '7:00 AM', '11:00 AM', 'PENS'),
(83, 11, 84, '2013/11/04', '2013/11/07', '7:00 AM', '11:00 AM', 'PENS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_peserta` (
  `id_jenis_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_peserta` varchar(30) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_jenis_peserta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tb_jenis_peserta`
--

INSERT INTO `tb_jenis_peserta` (`id_jenis_peserta`, `jenis_peserta`, `ket`) VALUES
(5, 'Mahasiswa Pens', 'Hanya untuk Mahasiswa Pens Surabaya'),
(15, 'Umum', 'Umum'),
(13, 'Mahasiswa Non Pens', 'Mahasiswa luar pens');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul`
--

CREATE TABLE IF NOT EXISTS `tb_judul` (
  `id_judul` int(11) NOT NULL AUTO_INCREMENT,
  `id_details_pelatihan` int(11) NOT NULL,
  `judul_training` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `jmlh_hari` varchar(100) NOT NULL,
  `peserta_min` int(200) NOT NULL,
  `ket` text NOT NULL,
  `syarat` text NOT NULL,
  PRIMARY KEY (`id_judul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `tb_judul`
--

INSERT INTO `tb_judul` (`id_judul`, `id_details_pelatihan`, `judul_training`, `durasi`, `jmlh_hari`, `peserta_min`, `ket`, `syarat`) VALUES
(2, 1, 'Enterprise Cloud Computing Technology, Architectur', '20', '5', 10, 'Cloud computing menjanjikan suatu revolusi TI dan bisnis dengan membuat \r\nkomputasi yang tersedia sebagai utilitas melalui internet. Training ini \r\nditujukan terutama untuk mempraktikan software architecture yang perlu \r\nmenilai dampak dari transformasi tersebut. Ini menjelaskan evolusi \r\ninternet menjadi sebuah platform cloud computing, menjelaskan&nbsp; \r\npembangunan paradigma dan teknologi yang berkembang, dan membahas \r\nbagaimana ini akan mengubah cara aplikasi perusahaan untuk penyebaran \r\nawan (cloud).<br>\r\nPada training ini, akan diberikan \r\ngambaran teknis dari teknologi cloud computing, meliputi infrastruktur \r\nawan dan platform layanan, paradigma pemrograman seperti MapReduce, \r\nserta alat pengembangan ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¹ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œdo-it-yourselfÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¾ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ host. Selain itu, materi \r\npelatihan ini juga mencakup dasar-dasar komputasi perusahaan, termasuk \r\npengenalan teknis untuk arsitektur enterprise, sehingga akan menarik \r\nprogrammer untuk menjadi arsitek perangkat lunak dan berfungsi sebagai \r\nreferensi dalam arsitektur perangkat lunak atau rekayasa perangkat \r\nlunak.', '1. Computing platforms<br>2. Cloud platforms<br>3. Cloud technologies<br>'),
(3, 1, 'JQuery', '20', '5', 10, 'Web Development kami dengan jQuery saja mengajarkan Anda bagaimana memanfaatkan kekuatan jQuery untuk membangun sangat kaya, namun UIS web elegan menggunakan salah satu perpustakaan lintas-browser yang paling sederhana dan populer JavaScript di luar sana.', ''),
(4, 1, 'Business Process Model And Notation (BPMN) Advance', '20', '5', 10, 'Pada training BPMN Advanced ini \r\ndirancang untuk mengajarkan pemodelan proses dan otomatisasi. Program \r\nini berfokus pada pemahaman setiap langkah dan konsep mendasar dalam \r\nkeberhasilan mengotomatisasi proses dengan cara didaktik dan sederhana.<br>\r\n<br>Kursus ini menyajikan dasar-dasar \r\nBizAgi, memungkinkan peserta untuk mengidentifikasi dan memahami konsep \r\nBizAgi sebagai Proses Bisnis Manajemen solusi BPM, aplikasi, komponen \r\ndan fungsi. Untuk melakukan itu, kursus ini dibagi menjadi beberapa \r\nbagian. Masing-masing bagian ini memiliki teks singkat, yang \r\nmemungkinkan pengenalan beberapa konsep penting, dan serangkaian \r\ntutorial yang mungkin tidak hanya untuk mengamati langkah-langkah yang \r\ndieksekusi di BizAgi, tetapi juga untuk melengkapi konsep awal. \r\nSelanjutnya, setiap bagian memiliki ringkasan, yang mensintesis \r\nkonsep-konsep utama dan langkah-langkah diikuti untuk mencapai tujuan \r\ntertentu.<br>', '1. Process modeling<br>2. Date model<br>3. Creation forms<br>4. Rules associated with sequence flows<br>\r\n&nbsp;<br>'),
(5, 1, 'SQL/RDBMS Dengan PostgreSQL', '20', '5', 10, 'Di kelas ini peserta diajak mengenal dan memahami konsep RDBMS dengan \r\nperintah-perintah SQL, menguasai PostgeSQL agar dapat diterapkan dalam \r\nmelakukan manajemen database yang lebih luas dan kompleks. Dengan durari\r\n 20 jam peserta diajak mengenal dan memahami konsep database dengan \r\nperintah-perintah SQL, menguasai PostgeSQL agar dapat diterapkan dalam \r\nmelakukan manajemen database yang lebih luas dan kompleks', ''),
(7, 1, 'Blackberry Application Development', '20', '5', 10, 'Dengan training ini, Anda akan mempelajari cara untuk mengambil \r\nkeuntungan dari kemampuan media BlackBerry, termasuk kamera dan \r\npemutaran video. Training ini juga menunjukkan Anda bagaimana untuk \r\nmengirim dan menerima pesan teks dan multimedia, menggunakan \r\nperpustakaan dengan kriptografi yang kuat, dan terhubung dengan kontak \r\npengguna pribadi dan bisnis dan kalender.', '1. BlackBerry Application Overview<br>2. Media Capture<br>3. Media Playback<br>'),
(8, 1, 'Business Process Model And Notation (BPMN) Fundame', '20', '5', 10, 'Memiliki kemampuan untuk proses diagram \r\ndengan BPMN, standar nomor satu&nbsp; dalam industri, telah menjadi kebutuhan\r\n bagi pemodel, teknisi dan setiap orang yang terkait dengan proses \r\nbisnis di perusahaan.<br>\r\n<br>Meskipun kebutuhan ini, hanya \r\nsedikit orang benar-benar memahami bagaimana menggunakan standar dengan \r\nbenar dan efisien, maka dengan training ini memungkinkan Anda untuk \r\nbelajar bagaimana merancang proses bisnis menggunakan teknologi Business\r\n Process Management (BPM) secara obyektif dan cara praktis.<br>\r\n<br>Kursus yang terdiri dari 5 level, akan mengajarkan setiap bentuk dan elemen utama dari standar BPMN.', 'Business Process Model and Notation (BPMN) Advanced<br>'),
(9, 1, 'Advanced Software Testing', '20', '5', 10, 'Training ditujukan untuk analis tes teknis yang ingin mencapai \r\nketerampilan lebih lanjut dalam test analysis, design, dan execution.<br>\r\n Dengan pendekatan-pendekatan, latihan-latihan, training ini mengajarkan\r\n Anda bagaimana menentukan dan melaksanakan tugas yang dibutuhkan untuk \r\nmenempatkan strategi testing ke dalam tindakan. Selain itu, dalam \r\ntraining ini akan mempelajari bagaimana menganalisa sistem dengan \r\nmempertimbangkan aspek teknis dan karakteristik kualitas. juga akan \r\nmempelajari bagaimana mengevaluasi kebutuhan sistem dan desain sebagai \r\nbagian dari tinjauan formal dan informal, menggunakan pemahaman tentang \r\ntekonologi yang mendasarinya.<br> Setelah mengikuti training ini, Anda \r\nakan mampu mengalaisa, merancang, melaksanakan dan melaksanakan tes \r\nserta menggunakan pertimbangan risiko untuk menentukan upaya yang tepat \r\ndan prioritas untuk tes. Anda juga akan mempelajari bagaimana melaporkan\r\n progress testing dan memberikan bukti yang diperlukan untuk mendukung \r\nevaluasi kualitas sistem Anda.', '1. Test Basics<br>\r\n2. Testing Processes<br>\r\n3. Evaluating Exit Criteria and Reporting<br>\r\n4. Test Plan Documentation Templates<br>'),
(10, 1, 'Systems Analysis And Design', '20', '5', 10, 'Awal keberhasilan project pengembangan \r\nsistem adalah keberhasilan&nbsp;dalam mendefiniskan kebutuhan. Kegagalan \r\ndalam memahami kebutuhan&nbsp;sistem adalah kesalahan fatal dalam project \r\npengembangan software.&nbsp;Kesalahan ini mengakibatkan kesalahan pada \r\npengembangan tahap&nbsp;selanjutnya dan dipastikan sistem yang dikembangkan \r\ntidak menjawab&nbsp;kebutuhan. Oleh karena itulah tahap analisa requirement \r\nmerupakan&nbsp;tahap penting dalam proses pengembangan. Karena pada tahap \r\nini&nbsp;menentukan sukses tidaknya project pengembangan software.<br>\r\n<br>Training Systems Analysis and Design\r\n membahas mengenai teknik dan metodologi&nbsp;pengembangan sistem secara \r\nefektif dan efisien. Pendekatan aspek teknikal meliputi \r\nteknik&nbsp;menentukan kebutuhan sistem tangible dan intangible, analisa dan \r\npenyusunan model bisnis,&nbsp;struktur data dan sistem yang akan \r\ndikembangkan. Penyusunan desain model dibuat dengan&nbsp;notasi standar UML \r\n(Unified Modeling Language). Selain mengenai aspek teknikal pada \r\ntraining,&nbsp;materi ini juga membahas mengenai aspek manajemen project \r\npengembangan software. Aspek&nbsp;ini meliput perencanaan project, menghitung\r\n biaya project, kebutuhan staff dan estimasi durasi&nbsp;yang dibutuhkankan \r\ndalam project pengembangan software.', 'Introduction to Systems Analysis and Design'),
(11, 1, 'Java SE 7 Programmer I (1Z0-803) Exam Preparation', '20', '5', 10, 'Training ini dirancang untuk peserta \r\nyang tidak memiliki atau baru sedikit pengalaman pemrograman untuk \r\nmemulai mempelajari pemrograman menggunakan bahasa Java. Training ini \r\nmengajarkan OOP (Object Oriented Programming), konsep bahasa pemrograman\r\n Java dan langkah-langkah yang dipelrukan untuk membuat program \r\nsederhana berteknologi Java.<br>\r\n<br>Peserta akan diberikan praktik dalam mempelajari konsep dasar <em>Object-Orented</em> seperti <em>inheritance, encapsulation</em>, dan <em>abstraction</em>. Peserta akan mempelajari bagaimana membuat dan menggunakan <em>Java class</em> sederhana yang berisi <em>arrays</em>, <em>loops</em>, dan struktur kondisional. Peserta juga akan mempelajari bagaimana menggunakan dan memanipulasi <em>object references</em> dan koding <em>error handling</em> sederhana.<br>\r\n<br>Setelah mengikuti training ini, peserta diharapkan siap menghadapi ujian <em>1Z0-803 Java SE 7 Programmer I</em> untuk memperoleh sertifikasi <strong>Oracle Certified Associate (OCA), Java SE 7 Programmer.</strong>', '1. Introducing the Java Technology<br> 2. Thinking in Objects<br> 3. Introducing the Java Language<br> 4. Working with Primitive Variables<br>'),
(12, 1, 'PHP & MySQL', '20', '5', 10, 'Saat ini web merupakan salah satu sumber informasi yang banyak dipakai. \r\nSebagai suatu aplikasi, web dibuat dengan tujuan agar pemakai dapat \r\nberinteraksi dengan penyedia informasi dengan mudah dan cepat, yaitu \r\nmelalui dunia internet. Aplikasi web tidak lagi terbatas sebagai pemberi\r\n informasi informasi statis, melainkan juga mampu memberikan informasi \r\ndinamis, dengan melakukan koneksi database.', '1. Flow Control<br>2. Array<br>3. PHP dan HTML Forms<br>4. PHP Basics'),
(13, 1, 'C#.NET Programming', '16', '4', 10, 'Microsoft C# (disebut C sharp) adalah sebuah bahasa pemrograman yang \r\ndidesain untuk membangun jangkauan aplikasi enterprise yang berjalan di \r\natas framework .NET. Sebuah evolusi Microsoft C dan Microsoft C++, C# \r\nsederhana, modern, aman dan Object Oriented.<br>\r\nC# dikenal sebagai visual C# dalam \r\nVisual Studio .Net. Dukungan untuk Visual C# termasuk proyek template, \r\ndesainer, halaman poperti, kode, model objek dan fitur lain dari \r\nlingkungan pengembangan. Library untuk pemrograman visual c# adalah .NET\r\n Framework.<br>\r\n<br>Peserta akan diajarkan mulai dari \r\nkonsep Object Oriented Programming (OOP), membangun aplikasi berbasis \r\ndesktop dengan standar library .NET framework, aplikasi berbasis data \r\nbase hingga pengenalan pada pengembangan web', '1. Fundamental C# Programming<br> 2. Basic C# Programming <br> 3. Advanced C# Programming<br>'),
(14, 1, 'PHP Web Security', '16', '4', 10, 'Pembangunan sebuah sistem berbasis web PHP akan sia-sia tanpa diimbangi \r\ndengan keamanan yang memadai sekalipun sistem tersebut compleks, lengkap\r\n dengan feature dan menarik misalnya, ketika mendapat berbagai serangan \r\n(attack) maka fatalah akibatnya. Oleh sebab itu, kemanan mutlak \r\ndiperlukan dalam suatu sistem berbasis web PHP baik untuk pertahan \r\nterhadap sistem itu sendiri maupun database MySQL-nya, sehingga sistem \r\nyang Anda kembangkan menjadi tangguh dan memiliki siklus hidup yang \r\nlebih lama.<br> Training ini akan membantu Anda menigkatkan kemampuan \r\ndalam mengamankan aplikasi berbasis PHP yang mencakup berbagai topik \r\nseperti SQL injection, XSS, otentikasi pengguna. Anda akan mempelajari \r\nbagaimana megembangkan PHP yang aman, dasar enkripsi, mengamankan \r\nprotokol, serta bagaimana menyesuaikan tuntutan server-side dan kemanan \r\naplikasi web.', '1. The Importance of Security<br> 2. Practicing Secure PHP Programming<br>3. Practicing Secure Operations<br>'),
(15, 1, 'Building E-Learning System With Moodle', '16', '4', 10, 'Seiring dengan perkembangan Teknologi Informasi (TI) yang semakin pesat,\r\n kebutuhan akan suatu konsep dan mekanisme belajar mengajar (pendidikan)\r\n berbasis TI menjadi tidak terelakkan lagi. Konsep yang kemudian \r\nterkenal dengan sebutan e-Learning ini membawa pengaruh terjadinya \r\nproses transformasi pendidikan konvensional ke dalam bentuk digital, \r\nbaik secara isi (contents) dan sistemnya. Saat ini konsep e-Learning \r\nsudah banyak diterima oleh masyarakat dunia, terbukti dengan maraknya \r\nimplementasi e-Learning di lembaga pendidikan (sekolah, training dan \r\nuniversitas) maupun industri (Cisco System, IBM, HP, Oracle, dsb).<br>\r\nJohn Chambers yang merupakan CEO dari \r\nperusahaan Cisco System mengatakan bahwa untuk era ke depan, aplikasi \r\ndalam dunia pendidikan akan menjadi killer application yang sangat \r\nberpengaruh. Departemen perdagangan dan departemen pendidikan Amerika \r\nSerikat bahkan bersama-sama mencanangkan Visi 2020 berhubungan dengan \r\nkonsep pendidikan berbasis Teknologi Informasi (e-Learning) [Vision, \r\n2002]. Bagaimana seharusnya aplikasi e-Learning dikembangkan dengan \r\nmenyeimbangkan antara kebutuhan pengguna dan keinginan dari pengembang. \r\nPenjelasan akan dimulai dari pengertian eLearning, mengapa kita \r\nmemerlukan e-Learning, sejarah e-Learning, beberapa analisa kegagalan \r\neLearning dan strategi pengembangannya e-Learning.', '1. Installing and Configuring Moodle<br>\r\n2. Creating Categories and Courses<br>'),
(16, 2, 'Java Fundamentals', '20', '5', 10, 'Java Fundamentals adalah bahasa pemrograman berorientasi object. Java \r\nPlatform Standard Edition (JSE) menyediakan lingkungan yang lengkap \r\nuntuk pengembangan aplikasi di desktop dan client/server. Materi \r\npelatihan pada Java Fundamental (JSE) akan fokus ke masalah pengantar \r\naplikasi Java, pemrograman berorientasi object (OOP), dan berbagai \r\nteknik yang digunakan pada pemrograman bahasa Java. Materi disajikan \r\ndengan metode perimbangan teori-praktek, dengan harapan bahwa peserta \r\ntraining disamping memahami paradigma berorientasi objek, juga memiliki \r\nskill pemrograman Java di level dasar-intermediate.\r\n', 'Fundamentals of Java'),
(17, 2, 'Java Fundamental With Netbeans', '20', '5', 10, 'Pada kelas ini peserta diajarkan menguasai programming dengan Java, \r\nsalah satu yang populer dalam jenis pemrograman OOP yang dibutuhkan \r\ndunia kerja.', ''),
(60, 2, 'PHP Zend Framework', '16', '4', 10, 'Materi untuk menjadi Programmer PHP yang mampu menggunakan Framework.\r\nDengan Syarat sudah menguasai materi PHP & Web Dasar (Web Complete) atau lulus pretest', 'Web Dasar (Web Complete)'),
(18, 2, 'Visual Basic Standard', '20', '5', 10, 'Pemrograman berorientasikan objek (object oriented programming) OOP, \r\nkonsep event driven programming, vb controls, pembuatan menu, box \r\ndialogue, error handlers, mdi &amp; data control.', ''),
(19, 2, 'Java Web & JSF', '20', '5', 10, 'Dasar-dasar HTTP, Pemahaman servlet, Teknik bekerja dengan jdbc, \r\nMembangun web dengan java server pages (jsp), Penyatuan dan kombinasi \r\njsp dan servlet dan mengenal framework JSF.', 'Java Web Development'),
(20, 2, 'Java Enterprise', '8', '2', 10, 'Java EE didefinisikan dengan spesifikasi. Seperti dengan spesifikasi \r\nJava Community Process, Java EE informal juga dianggap menjadi standar \r\nsejak selular harus sepakat untuk conformance persyaratan tertentu untuk\r\n menyatakan mereka sebagai produk Java EE compliant; walau tanpa ISO \r\natau standar ECMA. Java Enterprise Edition (Java EE) Class juga \r\nmerupakan salah satu Java Family Suite, yang menjadi standard penting \r\nuntuk mengembangkan enterprise aplikasi multitier berbasis komponen. \r\nDiantaranya adalah untuk aplikasi e-bussiness, e-commerce dan web based \r\napplication. Materi pada pelatihan ini terpusat ke teknologi Java EE dan\r\n bagaimana teknik untuk mengembangkan aplikasi berbasis ke Java EE.', 'Java Web Services'),
(21, 2, 'Web Standard', '20', '5', 10, 'Peserta dibimbing dalam memahami dan menggunakan tag-tag HTML, membuat \r\ndokumen dan mempublikasikan website buatan sendiri, menggunakan CSS dan \r\nJavaScript dalam membangun website HTML sendiri dengan penuh kreasi, \r\ndalam lingkungan kerja.', ''),
(22, 2, 'Android For Developer', '16', '4', 10, 'Materi training Pemrograman Android Dasar ini memfokuskan pada \r\npenggunaan bahasa pemrograman java untuk membangun aplikasi di Platform \r\nPonsel Cerdas (Smartphone). Instalasi Android SDK, Konsep Pemrograman \r\nAndroid, Object dan Komponen Form, Design Layout, 2D dan multimedia.', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan seabagi berikut:<br> 1. Mengerti dan memahami algoritma pemrograman.<br> 2. Pernah membuat aplikasi sederhana dengan bahasa pemrograman apapun.<br>'),
(23, 2, 'Java Web Services', '8', '2', 10, 'Web service adalah aplikasi berbasis web yang menggunakan sistem \r\nterbuka, berbasis XML standar dan transport protocols untuk pertukaran \r\ndata dengan klien. Web service yang dikembangkan menggunakan Java API \r\nTeknologi dan tools yang disediakan oleh Stack Web Services terintegrasi\r\n yang disebut Metro. Metro stack yang terdiri dari JAX-WS, JAXB, dan \r\nWSIT, memungkinkan Anda untuk membuat dan mengembangkan Web service dan \r\nklien yang aman, handal, transaksional dan mampu dioperasikan. Metro \r\nstack merupakan bagian dari Projek Metro dan sebagai bagian dari Glass \r\nFish, Java Platform, Enterprise Edition(Java EE) dan Standard \r\nEdition(Java SE). Glass Fish dan Java EE juga mendukung turunan \r\nJAX-RPCAPI.', 'Java Web Apllications'),
(24, 2, 'Visual Basic Advanced', '16', '4', 10, 'Konsep database, pengenalan software engineering, structured technique \r\nfundamentals, SQL, data access object (DAO), active data object (ADO), \r\ncontrol for data view, data environment, membuat report dengan data \r\nreport dan Crystal Report, object oriented databases.', 'Visual Basic Standard'),
(25, 2, 'Java For Android', '16', '4', 10, 'Materi training ini memfokuskan pada penggunaan bahasa pemrograman java \r\nuntuk membangun aplikasi di Platform Ponsel Cerdas (Smartphone). Peserta\r\n diajarkan konsep pemrograman di java, Class dan Object, Konsep Object \r\nOriented Programming Java, Instalasi Android SDK, Konsep Pemrograman \r\nAndroid, Object dan Komponen Form, Design Layout, 2D dan multimedia.', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut: <br>1. Mengerti dan memahami algoritma pemrograman.<br>2. Pernah membuat aplikasi sederhana dengan bahasa pemrograman apapun.<br>'),
(28, 1, 'Apache Web Server', '16', '4', 10, 'Siswa akan mempelajari rincian dari file konfigurasi httpd.conf, menggunakan. File htaccess, virtual host, jenis MIME dan file, pemetaan URL, pengindeksan direktori, tuning kinerja, penangan, filter, server-side termasuk, script pengelolaan, keamanan dan Apache modul.', ''),
(29, 1, 'Android Bootcamp', '16', '4', 10, 'Lanjutan kami Android tentu membutuhkan pengembangan aplikasi Android ke tingkat berikutnya Dalam lanjutan Android Anda akan belajar beberapa topik lanjutan seperti bagaimana untuk menciptakan layanan remote menggunakan Binder IPC bagaimana mengembangkan bagian dari aplikasi Anda di C / C + + menggunakan NDK, bagaimana Android keamanan architected, dan bagaimana untuk menguji kode Anda . Anda juga akan belajar bagaimana menggunakan beberapa API Android lebih populer seperti Audio, Video, Lokasi, Wifi Direct, Sensor dan banyak lagi.<br><br>\r\nKursus ini adalah sekuel Android Bootcamp dan dirancang bagi mereka yang sudah memiliki pengetahuan dasar Android.<br><br>Lanjutan Android saja baru-baru ini didesain ulang dan diperluas secara signifikan.', '1. Native Development Kit (NDK)<br>2. Binder Inter Process Communications<br>'),
(30, 1, 'Javascript And JQuery Bootcamp', '16', '4', 10, 'Maksud dari bootcamp 4 hari adalah untuk menyediakan blok bangunan penting dari pemrograman Javascript dasar sebelum menyelam ke aspek yang lebih kompleks kerangka jQuery yang akan memungkinkan Anda untuk mengembangkan pengalaman web yang lebih intuitif dan interaktif. Tendangan bootcamp off dengan 2 hari Pelatihan Javascript diikuti oleh 2 hari dari jQuery.', '1. Javascript<br>2. Jquery<br>'),
(31, 1, 'HTML5 Mobile Modules', '8', '2', 10, 'HTML5 Mobile kursus dua hari maju yang terdiri dari enam hati-hati dipilih mobile-relevan Modul HTML5. Lulusan dari kursus ini harus mampu membangun proyek HTML5 yang menargetkan beberapa perangkat dan platform.', '1. jQuery Mobile 1.1.1 <br>2. Responsive Design&nbsp;&nbsp; <br>3. Touch Events<br>3. Forms&nbsp; <br>4. Application Cache&nbsp; <br>5. Single Page Applications <br>'),
(32, 1, 'Android Development', '20', '5', 10, 'Training ini adalah panduan untuk merancang dan membangun aplikasi \r\nmobile menggunakan Google Android open-source platform. Kursus ini \r\nmenjelaskan apa yang Android adalah, SDK Android, semua fitur penting, \r\nserta kemampuan canggih dan API seperti layanan latar belakang dan \r\npemberitahuan. Ini lengkap tangan-lokakarya mendorong peserta untuk \r\nbelajar dengan membangun aplikasi nyata-kehidupan kerja, yang dapat \r\nberfungsi sebagai dasar untuk proyek-proyek masa depan mereka Android. \r\nPada akhir kursus, setiap peserta akan memiliki aplikasi fungsional yang\r\n lengkap Android menggabungkan sebagian besar fitur kunci dari platform.', 'Javascript, jquery<br>'),
(33, 1, 'Unified Modeling Language (UML)', '16', '4', 10, 'Unified Modelling Language (UML) adalah sebuah bahasa yg telah menjadi \r\nstandar dalam industri untuk visualisasi, merancang dan \r\nmendokumentasikan sistem piranti lunak. UML menawarkan sebuah standar \r\nuntuk merancang model sebuah sistem.&nbsp;Dengan menggunakan UML kita dapat \r\nmembuat model untuk semua jenis aplikasi piranti lunak, dimana aplikasi \r\ntersebut dapat berjalan pada piranti keras, sistem operasi dan jaringan \r\napapun, serta ditulis dalam bahasa pemrograman apapun. Training UML \r\nberisi pembelajaran UML secara lengkap dan komprehensif. Pembelajaran \r\nmenggunakan metode lecture, discussion, case study dan practice. \r\nTraining dilengkapi dengan praktek mengembangkan software dengan UML. \r\nDengan menggunakan berbagai case study, diharapkan pemahaman peserta \r\ntentang UML bisa lebih cepat dan komprehensif.', '1. PHP Basics<br>\r\n2. Functions<br>\r\n3. Arrays<br>\r\n4. Object Oriented Programming<br>\r\n5. Security<br>'),
(34, 1, 'Zend PHP 5 Certification (200-500) Exam Preparatio', '16', '4', 10, 'Zend merupakan Perusahaan yang bergerak \r\ndalam pengembangan scripting khususnya PHP Script. Zend juga \r\nmengeluarkan PHP 5 Certification yang didalamnya merupakan upgrade dari \r\nversi PHP yang sebelumnya.<br>\r\nBagi anda yang berminat untuk untuk \r\nambil sertifikasinya Zend PHP 5 Certification bisa mengikuti exam \r\npreparation yang dibuka oleh Brainmatics. Berikut materi yang akan \r\ndibahas seputar persiapan ujain sertifkasi Zend PHP 5 Certification.<br>', ''),
(35, 1, 'Graphic Design With Adobe Photoshop', '16', '4', 10, 'Setelah Sukses dengan eLearning CCNA Exam Guide: Networking Fundamental dan Mambo Open Source, kini IlmuKomputer.Com bekerjasama dengan Brainmatics.com menyelenggarakan program training gratis yang menggunakan konsep e-Learning menggunakan media web dan radio online sebagai media pembelajarannya, dengan materi Graphic Design dengan Adobe Photoshop CS 2. Ada sebagian orang masih merasa bingung ketika pertama kali ingin terjun ke dunia desain grafis. &ldquo;Apa yang pertama kali saya lakukan untuk menjadi seorang desainer&rdquo; kalimat itu selalu muncul dari beberapa rekan yang kebetulan konsultasi online dengan ilmukomputer.com. Untuk menjawab semua itu, kami memberikan e-learning secara gratis untuk menjadi seorang desainer yang handal yaitu tentang Adobe Photoshop. Namun ini baru secuil program yang harus dikuasai, program lainnya: CorelDraw, Freehand, PageMaker dan Illustrator.<br>', ''),
(36, 1, 'HTML And CSS', '40', '10', 10, 'Training ini mempelajari konsep dan kemampuan HTML. Sejak HTML menjadi dasar pembuatan web design, konsep-konsepnya dipelajari di training ini, dan akan lebih mengekektifkan bagi peserta yang ingin menggunakan tool-tool grafik user interface, seperti Microsoft FrontPage atau Macromedia Dreamweaver, bagi pengembangan Website.<br>', '1. Creating a Web Page<br /> 2. Basic Tags and HTML Syntax<br />3. Headings &amp; Lists<br />4. Local, Remote and Image Links<br>'),
(37, 1, 'Scientific Writing Method', '20', '5', 10, 'Memberitahu orang-orang tentang penelitian adalah sama halnya dengan melakukannya. Tapi banyak peneliti, atau bahkan ilmuwan yang kompeten, masih takut menulis. Waspada terhadap aturan-aturan tak tertulis, dogma tak terucap dan gaya yang kompleks, semua yang tampaknya menggangu pemikiran konvensional tentang penulisan ilmiah.<br>\r\nTraining ini bertujuan untuk mengekspos prinsip-prinsip yang membuat komunikasi penelitian lebih mudah dan mendorong peneliti untuk menulis dengan penuh percaya diri. Selain itu, training juga&nbsp; menyajikan bagaimana cara berpikir tentang menulis layaknya cara para ilmuwan cakap tentang penelitian.<br>\r\nTraining akan berkonsentrasi pada struktur artikel, bukan hanya pada tata bahasa dan sintaks. Jadi, training ini merupakan sebuah pencerahan yang ideal bagi para peneliti dalam mempersiapkan artikel untuk jurnal ilmiah, poster, presentasi konferensi, ulasan dan artikel populer; juga bagi mahasiswa yang mempersiapkan tesis.<br>', '1. Writing Preparation<br /> 2. Editing for Readability and Style<br />3. Thinking and Writing Beyond the Scientific Article<br>'),
(59, 6, 'Desktop Publishing With Scribus', '8', '2', 10, 'Materi training Desktop Publishing with Scribus ini memfokuskan pada penggunaan aplikasi untuk membuat layout suatu publikasi (buku, majalah, bulletin, dsb). Peserta juga diajarkan tentang cara membuat Master Document, menggunakan gambar kedalam publikasi, export ke format lain<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br>\r\n1. Operasional komputer (sound, mouse,koneksi USB,file saving)<br>'),
(56, 6, 'Photo And Image Editing With GIMP ', '8', '2', 10, 'Materi training Photo &amp; Image Editing with GIMP ini memfokuskan pada penggunaan aplikasi untuk melakukan modifikasi gambar &amp; foto menggunakan fitur-fitur yang ada dalam aplikasi GIMP. Dimulai dari pengenalan tools, seleksi tingkat dasar, penggunaan curve, filter-filter hingga ke seleksi tingkat mahir (dengan menggunakan masking dan channel). Peserta juga akan diajarkan bagaimana cara membuat publikasi yang menarik. Setelah selesai training, peserta diharapkan dapat mengaplikasikan ilmunya menjadi seorang Desainer kreatif (membuka usaha sendiri / sebagai profesional).<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br />1. Operasional komputer (sound, mouse, koneksi USB, file saving). <br />2. Memiliki sense-of-art (cita rasa seni) dapat menjadi nilai tambah.<br>'),
(58, 6, 'Vector Graphic Editing With Inkscape', '8', '2', 10, 'Materi training Vector Graphic Editing with Inkscape ini memfokuskan pada penggunaan aplikasi untuk membuat dan memodifikasi gambar vektor menggunakan fitur-fitur yang ada dalam aplikasi Inkscape. Dimulai dari pengenalan interface &amp; tools, pembuatan gambar vector, komposisi warna, dan pemanfaatan beberapa efek gambar untuk menciptakan gambar vector yang menarik.<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br /> 1. Operasional komputer (sound, mouse, koneksi USB, file saving). <br />2. Memiliki sense-of-art (cita rasa seni) dapat menjadi nilai tambah.<br>'),
(61, 2, 'PHP Yii Framework ', '20', '5', 10, 'Siswa dibimbing dalam memahami Pemrograman OOP dengan PHP5 dan   menggunakan   Framework   dalam   membuat   aplikasi   web. Framework yang digunakan adalah Yii Framework.', ''),
(62, 2, 'SIPPro', '16', '4', 10, 'Menghasilkan SDM TI (teknologi informasi dan komputer) Profesional yang kreatif dan memiliki kemampuan untuk menginstal, menggunakan, membangun dan mengelola Web dengan Profesional.', ''),
(63, 2, 'Ms. Access Advanced (Access Programming)', '16', '4', 10, 'Kelas ini adalah lanjutan dari Ms.Access standard, merupakan aplikasi database untuk input data ke dalam server dilengkapi dengan materi pengantar programming dan studi kasus', 'Ms.Access standard'),
(64, 2, 'PHP & AJAX ', '16', '4', 10, 'Materi untuk menjadi Programmer PHP yang untuk dapat menguasai aplikasi AJAX. Dengan Syarat sudah menguasai materi PHP & Web Dasar (Web Complete) atau lulus pretest', 'PHP & Web Dasar (Web Complete)'),
(65, 2, 'VB.NET Standard (Visual Basic.NET) ', '16', '4', 10, 'Microsoft Visual Basic .NET adalah sebuah alat untuk mengembangkan dan membangun aplikasi yang bergerak di atas sistem .NET Framework, dengan menggunakan bahasa BASIC. Dengan menggunakan alat ini, para programmer dapat membangun aplikasi Windows Forms, Aplikasi web berbasis ASP.NET, dan juga aplikasi command-line. Alat ini dapat diperoleh secara terpisah dari beberapa produk lainnya (seperti Microsoft Visual C++, Visual C#, atau Visual J#), atau juga dapat diperoleh secara terpadu dalam Microsoft Visual Studio .NET. Bahasa Visual Basic .NET sendiri menganut paradigma bahasa pemrograman berorientasi objek yang dapat dilihat sebagai evolusi dari Microsoft Visual Basic versi sebelumnya yang diimplementasikan di atas .NET Framework. Peluncurannya mengundang kontroversi, mengingat banyak sekali perubahan yang dilakukan oleh Microsoft, dan versi baru ini tidak kompatibel dengan versi terdahulu. Materi kursus ini mengajarkan peserta untuk membuat aplikasi  desktop yang terhubung ke database dengan menggunakan bahasa pemrograman Visual Basic .NET dan database Ms.Access / SQL Server 2005, serta modul pelaporan dengan menggunakan Crystal Reports.', ''),
(66, 2, 'VB.Net Advanced ', '16', '4', 10, 'Materi kursus ini mengajarkan peserta untuk membuat aplikasi  desktop yang terhubung ke database dengan menggunakan bahasa pemrograman Visual Basic .NET dan database Ms.Access / SQL Server 2005, serta modul pelaporan dengan menggunakan Crystal Reports.\r\n\r\nMicrosoft Visual Basic .NET adalah sebuah alat untuk mengembangkan dan membangun aplikasi yang bergerak di atas sistem .NET Framework, dengan menggunakan bahasa BASIC. Dengan menggunakan alat ini, para programmer dapat membangun aplikasi Windows Forms, Aplikasi web berbasis ASP.NET, dan juga aplikasi command-line. Alat ini dapat diperoleh secara terpisah dari beberapa produk lainnya (seperti Microsoft Visual C++, Visual C#, atau Visual J#), atau juga dapat diperoleh secara terpadu dalam Microsoft Visual Studio .NET. Bahasa Visual Basic .NET sendiri menganut paradigma bahasa pemrograman berorientasi objek yang dapat dilihat sebagai evolusi dari Microsoft Visual Basic versi sebelumnya yang diimplementasikan di atas .NET Framework. Peluncurannya mengundang kontroversi, mengingat banyak sekali perubahan yang dilakukan oleh Microsoft, dan versi baru ini tidak kompatibel dengan versi terdahulu.', 'VB.NET Standard'),
(67, 2, 'ASP.NET', '16', '4', 10, 'Active Server Pages.NET (sering disingkat sebagai ASP.NET) adalah kumpulan teknologi dalam Framework .NET untuk membangun aplikasi web dinamik dan XML Web Service (Layanan Web XML).[1] Halaman ASP.NET dijalankan di server kemudian akan dibuat halaman markup (penanda) seperti HTML ( Hypertext Markup Language), WML (Wireless Markup Language), atau XML (Extensible Markup Language) yang dikirim ke browser desktop atau mobile.', ''),
(68, 8, 'Linux Basic', '16', '4', 10, 'Linux bagi pemula yang ingin mengetahui sistem dan cara kerja Linux, perintah-perintah dasarnya hingga instalasi dan bekerja di lingkungan desktop Linux.', ''),
(69, 8, 'Linux System Administration & Networking', '20', '5', 10, 'Program penguasaan Linux lanjutan dimana siswa diajarkan dan dibimbing menguasai sistem Linux dan bagaimana memahami konsep jaringan di Linux dan mempraktikannya.\r\npeserta program penguasaan Linux lanjutan dimana siswa diajarkan dan dibimbing menguasai sistem Linux dan bagaimana memahami konsep jaringan di Linux dan mempraktikannya', 'Linux Basic'),
(70, 8, 'Linux Complete', '20', '5', 10, 'Program yang dirancang dengan memadukan materi Linux basic dan Linux Sys Admin & Networking sehingga siswa mampu menguasai Linux dengan lebih cepat dan tidak setengah-setengah dalam penguasaan materinya.', 'Linux basic dan Linux Sys Admin & Networking'),
(71, 8, 'Linux Security ', '20', '5', 10, 'Program yang diperuntukkan bagi administrator sistem dan jaringan di Linux, serta yang ingin mendalami masalah security pada sistem operasi Linux dan menggunakannya untuk memproteksi keamanan suatu server ', 'Linux Basic dan Linux Sys Admin & Networking'),
(72, 9, 'Modelling Animation With Blender', '16', '4', 10, 'Kelas khusus desain grafis menggunakan program aplikasi animasi 3 dimensi Blender. Program aplikasi berbasis Open Source ini akan digunakan untuk membuat berbagai bentuk gambar 3 dimensi dan file animasi sederhana. Setelah selesai training, peserta diharapkan dapat membuat model-model 3 dimensi sederhana dan mengatur pergerakannya dalam animasi frame by frame.<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br>\r\n1. Operasional komputer (sound, mouse, koneksi USB, file saving).<br />2. Memiliki sense-of-art (cita rasa seni) dapat menjadi nilai tambah.<br />3. Teknik mengambar<br>'),
(73, 9, 'Architecture Animation With Blender', '20', '5', 10, 'Architecture Animation with Blender Merupakan lanjutan dari kelas Modelling Animation dengan fokus pembelajaran ke arah pembuatan model-model arsitektur dan berbagai bentuk propertinya. Animasi yang dihasilkan lebih banyak menggunakan teknik Walk Through dan Tracking. Setelah selesai training, peserta diharapkan dapat membuat model-model 3 dimensi di bidang arsitektur dan mengatur pergerakannya menjadi sebuah animasi walkthrough.<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br>\r\n1. Operasional komputer (sound, mouse, koneksi USB, file saving).<br>\r\n2. Memiliki sense-of-art (cita rasa seni) dapat menjadi nilai tambah 3. Teknik mengambar 4. Modelling obyek 3 dimensi<br>'),
(74, 9, 'Character Animation With Blender', '16', '4', 10, 'Level tertinggi dari paket animasi 3 dimensi menggunakan Blender. Akan dibahas teknik pembuatan karakter dan animasinya. Termasuk efek-efek khusus menggunakan Particle, Physics, dan Open GL. Setelah selesai training, peserta diharapkan dapat membuat berbagai bentuk karakter 3 dimensi dan membuat pergerakannya menjadi sebuah film animasi.<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br /> 1. Operasional komputer (sound, mouse, koneksi USB, file saving).<br /> 2. Memiliki sense-of-art (cita rasa seni) dapat menjadi nilai tambah.<br>\r\n3. Modelling obyek 3 dimensi.<br>'),
(75, 9, 'Video Editing With Kino dan Brasero ', '16', '4', 10, 'Materi training Video Editing with Kino &amp; Brasero ini memfokuskan pada penggunaan aplikasi untuk melakukan modifikasi video dan pembuatan film singkat, serta penyimpanannya kedalam media CD/ DVD. Peserta diajarkan menggunakan aplikasi Kino untuk melakukan editing video (menggabungkan beberapa video menjadi satu film/ dokumentasi, menambahkan background, sound, dan obyek multimedia lain). Peserta juga diajarkan menggunakan aplikasi Brasero untuk burning video hasil editing ke media penyimpanan CD/ DVD.<br>', 'Agar mendapatkan hasil yang maksimal dari training ini maka para peserta sebaiknya memiliki pengetahuan sebagai berikut:<br />1. Operasional komputer (sound, mouse, koneksi USB, file saving).<br /> 2. Pengalaman menggunakan alat rekam video akan sangat membantu.<br>'),
(77, 11, 'Oracle Database 11g Administration I (1Z0-052-ENU)', '16', '4', 10, 'Training ini merupakan salah satu langkah untuk menjadi seorang Oracle \r\nDatabase professional, didesain untuk memberikan Anda sebuah fondasi \r\ndasar dalam adminisitrasi database. Pada training ini, Anda akan \r\nmempelajari bagaimana menginstal dan mengelola sebuah database Oracle. \r\nAnda akan mendapatkan pemahaman konseptual arsitektur databse Oracle dan\r\n bagaimana komponen-komponen tersebut bekerja dan berinteraksi dengan \r\nyang lainnya. Anda juga akan mempelajari bagaimana membuat sebuah \r\noperasional database dan mengelolanya dengan tepat berbagai struktur \r\nsecara efektif dan efisien termasuk pemantauan kinerja, kemanan \r\ndatabase, pengelolaan user, dan teknik backup/recovery. Training ini pun\r\n ditunjang dengan praktik-praktik secara langsung. Selain itu, materi \r\njuga dirancang untuk mempersiapkan Anda untuk ujian sesuai Oracle \r\nCertified Associate.', '1. Introduction to Oracle Server Technologies<br>\r\n2. Exploring the Oracle Database Architecture<br>3. Preparing the Database Environment<br>4. Creating an Oracle Database'),
(78, 11, 'SQL Server 2005', '16', '4', 10, 'Dalam training ini akan dipelajari Konsep dan dasar penggunaan sistem \r\noperasi SQL Server 2005, dan diharapkan peserta mampu memahami konsep \r\ndasar dari system operasi Tersebut, memahami fungsi SQL Server 2005 dan \r\nmampu membangun dan mensetting aplikasi-aplikasi server.', '1. Installing SQL Server 2005<br>2. Creating and Managing Databases<br>3. Securing SQL Server<br>'),
(79, 11, 'Oracle Admin 1 Fundamental', '16', '4', 10, 'Program yang Mengajarkan Peserta Konsep, Instalasi dan Manajemen Sistem Oracle \r\nDatabase untuk keperluan basisdata perusahaan, melakukan administrasi \r\ndatabase Oracle yang berguna bagi perusahaan berbasis barang maupun jasa\r\n dengan kebutuhan storage tinggi.', ''),
(80, 11, 'Ms. Access Standard ', '20', '5', 10, 'Peserta menguasi aplikasi Microsoft Access (aplikasi \r\ndatabase) secara efektif dan efisien sesuai dengan kebutuhan dunia kerja\r\n pada umumnya di lingkungan perkantoran, kelas ini merupakan aplikasi \r\ndatabase untuk input data ke dalam server dengan konten-konten yg \r\nterstruktur sesuai dengan kebutuhan.', ''),
(81, 11, 'Ms. SQL Server', '16', '4', 10, 'Program yang membimbing siswa dalam memperdalam Database MSQL Server  \r\nyang meliputi pengenalan dan konsep database, Model relational database,\r\n  DDL dan DML SQL pada SQL Server, Menggunakan TSQL Server, VIEW, \r\nTRIGGER  dan Store Procedure, juga mempelajari Manajemen User dan Izin \r\nakses  Database, Backup dan Restore database.', ''),
(82, 11, 'MySQL', '16', '4', 10, 'Program yang membimbing siswa dalam memperdalam Database MySQL yang \r\nmeliputi pengenalan dan konsep database, Model relational database, DDL \r\ndan DML, JOIN Table, Fungsi Aggregate, VIEW, TRIGGER dan Store \r\nProcedure, juga mempelajari Manajemen User dan Izin akses Database, \r\nBackup dan Restore database.', ''),
(85, 17, 'ITIL A V3 Foundation (ITIL) Exam Preparation', '20', '5', 10, '(IT Infrastucture Library) terdiri dari 5\r\n bagian: Service Strategy, Service Design, Service Transition, Service \r\nOperation dan Continual Service Improvement. ITIL ini awalnya digunakan \r\noleh Office of Government Commerce (OGC ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ UK government) yang kemudian \r\nbanyak yang mengadopsi menjadi sebuah standar dalam pelayanan \r\nberbasiskan Teknologi Informasi. Brainmatics membuka kelas special dalam\r\n pemahaman dan implementasi standarisasi ITIL ini kepada \r\nperusahaan-perusahaan yang akan mengadopsi ITIL sebagai standar layanan \r\nberbasikan Teknologi Informasi.\r\nPeserta juga akan dibekali kemampuan untuk menghadapi ujian sertifikasi ITIL Foundation.<br>', '1. Introduction<br>2. Core guidance topics<br>3. The ITIL Service Management Lifecycle ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ core of practice<br>4. Service Strategy ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â governance and decision-making<br>'),
(84, 11, 'Oracle Admin 1 Advanced ', '16', '4', 10, 'Program tingkat lanjutan Administrasi Oracle, mengenai Keamanan, Performance \r\nmanagement hingga Disaster management pengelolaan database dengan \r\nOracle.', 'Oracle Admin 1 Fundamental'),
(86, 17, 'TOGAFA Version 9 Fundamental', '16', '4', 10, 'Training ini diutujukan untuk peserta yang memerlukan pemahaman dasar \r\nTOGAF 9; profesional yang bekerja dalam peran yang terkait dengan sebuah\r\n proyek arsitektur seperti bertanggung jawab untuk planning, execution, \r\ndevelopment, delivery, dan operation; arsitek yang membutuhkan \r\npengenalan TOGAF 9; arsitek yang ingin memperoleh sertifikasi tingkat 2 \r\nsecara bertahap dan sebelumnya tidak memenuhi syarat sebagaimana \r\nsertifikasi TOGAF 8. Sebuah pengetahuan sebelumnya dari arsitektur \r\nenterprise akan membantu Anda dalam mengikuti pelatihan ini, tetapi \r\ntidak diharuskan.', ''),
(87, 17, 'IT Project Management', '20', '5', 10, 'Meskipun Project Management telah menjadi bidang yang sudah ada selama \r\nbertahun-tahun, mengelola teknologii nformasi membutuhkan ide-ide dan \r\ninformasi yang mampu menyesuaikan dengan standar Project Management. \r\nDengan menggabungkan antara teori dan praktek, training ini menjadikan \r\nmudah dipahami, dengan wawasan konsep keterampilan yang terpadu, tools, \r\ndan teknik yang terlibat dalam Project Management. KarenabidangProject \r\nManagement dan industri berubah dengan cepat, Anda tidak bisa berasumsi \r\nbahwa apa yang berhasil bahkan lima tahun yang lalu masih merupakan \r\npendekatan yang terbaik saat ini. Oleh sebab itu, training ini juga \r\nmengedepankan informasi-informasi yang terupdate tentang Project \r\nManagement yang baik, penggunaan software yang efektif dan efisien yang \r\ndapat membantu Anda dalam mengelola proyek, terutama proyek-proyek \r\nteknologi informasi (IT).<br>\r\nIT Project Management,adalah satu-satunya training yang mengajarkan penerapan sembilan bidang pengetahuan project management: <em>project\r\n integration, scope, time, cost, quality, human resource, \r\ncommunications, risk, and procurement management. Also all five process \r\ngroups: initiating, planning, executing, monitoring and controlling, dan\r\n closing to information technology projects.</em>', ''),
(88, 17, 'ITILA Foundation (ITILF) Exam Preparation', '16', '4', 10, '(IT Infrastucture Library) terdiri dari 5 bagian: Service Strategy, \r\nService Design, Service Transition, Service Operation dan Continual \r\nService Improvement. ITIL ini awalnya digunakan oleh Office of \r\nGovernment Commerce (OGC ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œ UK government) yang kemudian banyak yang \r\nmengadopsi menjadi sebuah standar dalam pelayanan berbasiskan Teknologi \r\nInformasi. Brainmatics membuka kelas special dalam pemahaman dan \r\nimplementasi standarisasi ITIL ini kepada perusahaan-perusahaan yang \r\nakan mengadopsi ITIL sebagai standar layanan berbasikan Teknologi \r\nInformasi.', ''),
(89, 17, 'Knowledge Management', '20', '5', 10, 'Paradigma organisasi berubah dari resources-based ke knowledge-based, \r\nsehingga organisasi harus mengelola knowledge yang dimilikinya dengan \r\nbaik agar dapat bersaing dengan yang lain. Banyak organisasi semakin \r\nmenyadari pentingnya mengelola dan memanfaatkan sebaik-baiknya \r\npengetahuan dari individu-individu yang ada dalam organisasi tersebut \r\nsebagai aset organisasi. Knowledge Management memfasilitasi transfer \r\npengetahuan antara anggota untuk efektivitas kegiatan organisasi dengan \r\nmenggunakan Teknologi Informasi&nbsp;dan Komunikasi. Knowledge Management \r\nditujukan untuk membuat organisasi belajar (learning organization) \r\nsehingga bekerja dan belajar merupakan hal yang sama dalam suatu \r\ninstitusi untuk meningkatkan keunggulan kompetitif.', ''),
(90, 17, 'Cloud Computing Security', '20', '5', 10, 'Banyak perusahaan beralih ke teknologi \r\ncloud computing yang sedang berkembang untuk menghemat dan menyimpan \r\nuang, keamanan merupakan suatu hal mendasar yang perlu diherpatikan. \r\nKehilangan kontrol tertentu dan kurangnya kepercayaan membuat transisi \r\nini sulit kecuali Anda tahu bagaimana menanganinya. Cloud menawarkan \r\nfleksibilitas, kemampuan adaptasi, skalabilitas, dan dalam kasus \r\nketahanan keamanan.\r\n<p style="text-align: justify;">Pada training ini akan digambarkan \r\nbagaimana kekuatan dan kelemahan dalam mengamankan informasi perusahaan \r\nAnda dengan pendekatan Cloud yang berbeda, dimana serangan-serangan itu \r\nbiasanya fokus pada infrastruktur, jaringan komunikasi, data, atau \r\nlayanan. Materi disajikan dengan framework yang jelas dan ringkas untuk \r\nmengamankan aset bisnis Anda saat membuat teknologi baru ini.<br>', ''),
(91, 17, 'Modelling Enterprise Architecture', '16', '4', 10, 'Training Modelling Enterprise Architecture ini fokus pada kebutuhan \r\npraktis pembuatan dan pemeliharaan suatu EA yang efektif dalam bisnis \r\nmelalui penggunaan pemodelan pragmatis. Selain itu, memperkenalkan \r\nkonsep di balik arsitektur perusahaan, mengajarkan notasi pemodelan yang\r\n diperlukan secara efektif untuk mewujudkan arsitektur perusahaan dan \r\nmengeksplorasi konsep yang lebih lengkap melalui arsitektur enterprise \r\nkehidupan nyata.', ''),
(92, 18, 'CCNA Exploration 2 Routing Protocols And Concepts', '16', '4', 10, 'CCNA Exploration merupakan kurikulum baru dari Cisco yang menyediakan \r\npondasi pengetahuan tentang jaringan komputer. Metode training praktek \r\nlangsung akan&nbsp;memberikan peluang kepada peserta training \r\nuntuk&nbsp;mengembangkan keterampilan, yang otomatis&nbsp;akan membantu pesertra \r\ntraining dalam mempersiapkan diri untuk memasuki dalam dunia karir di \r\nbidang IT dan Networking. Kurikulum CCNA Exploration&nbsp;menggunakan \r\npendekatan dalam pembelajaran menggunakan media interaktif dan game \r\npembelajaran. Hal ini akan membantu peserta dalam memahami materi \r\npembelajaran dan mendukung pembelajaran mandiri baik dalam perspektif \r\nteori maupun praktek.', 'CCNA Exploration 1 Network Fundamentals'),
(93, 18, 'CCNA Exploration 4 Accessing The WAN', '16', '4', 10, 'CCNA Exploration merupakan kurikulum baru dari Cisco yang menyediakan \r\npondasi pengetahuan tentang jaringan komputer. Metode training praktek \r\nlangsung akan memberikan peluang kepada peserta training untuk \r\nmengembangkan keterampilan, yang otomatis akan membantu pesertra \r\ntraining dalam mempersiapkan diri untuk memasuki dalam dunia karir di \r\nbidang IT dan Networking. Kurikulum CCNA Exploration menggunakan \r\npendekatan dalam pembelajaran menggunakan media interaktif dan game \r\npembelajaran. Hal ini akan membantu peserta dalam memahami materi \r\npembelajaran dan mendukung pembelajaran mandiri baik dalam perspektif \r\nteori maupun praktek.', 'CCNA Exploration 3 LAN Switching and Wireless'),
(94, 18, 'Networking For Home And Small And Businesses', '16', '4', 10, 'Pens selaku Cisco Local Academy menyelenggarakan program \r\npelatihan untuk student dengan kurikulum CCNA. Kurikulum CCNA terdiri \r\ndari 4 semester (CCNA 1, CCNA 2, CCNA 3, CCNA 4). Seri kelas akademi ini\r\n adalah salah satu jalan mempersiapkan diri lebih matang untuk \r\nmendapatkan sertifikasi industri CCNA. Pada CNAP atau Cisco Networking \r\nAcademy Program ini pula akan ditawarakan 3 kurikulum yang dikeluarkan \r\noleh Cisco yaitu CCNA. Version 3.1, CCNA Discovery dan CCNA Exploration.\r\nCisco Certified Network Associate (CCNA)\r\n adalah sertifikasi bidang networking yang diakui secara internasional \r\ndan merupakan pondasi awal untuk mendapatkan jenjang sertifikasi yang \r\nlain. Lulusan CCNA mampu melakukan instalasi, konfigurasi, dan \r\nmengoperasikan LAN, WAN dan Dial Access Services untuk jaringan kecil \r\n(di bawah 100 PC) yang bekerja menggunakan protokol IP, IGRP, Serial, \r\nFrame Relay, IP RIP, VLANs, RIP, Ethernet dan Access Lists.', '<br>');
INSERT INTO `tb_judul` (`id_judul`, `id_details_pelatihan`, `judul_training`, `durasi`, `jmlh_hari`, `peserta_min`, `ket`, `syarat`) VALUES
(95, 18, 'CCNA Exploration 1 Network Fundamentals', '16', '4', 10, 'CCNA Exploration merupakan kurikulum baru dari Cisco yang menyediakan \r\npondasi pengetahuan tentang jaringan komputer. Metode training praktek \r\nlangsung akan memberikan peluang kepada peserta training untuk \r\nmengembangkan keterampilan, yang otomatis akan membantu pesertra \r\ntraining dalam mempersiapkan diri untuk memasuki dalam dunia karir di \r\nbidang IT dan Networking. Kurikulum CCNA Exploration menggunakan \r\npendekatan dalam pembelajaran menggunakan media interaktif dan game \r\npembelajaran. Hal ini akan membantu peserta dalam memahami materi \r\npembelajaran dan mendukung pembelajaran mandiri baik dalam perspektif \r\nteori maupun praktek.', ''),
(96, 18, 'CCNA Exploration 3 LAN Switching And Wireless', '16', '4', 10, 'CCNA Exploration merupakan kurikulum baru dari Cisco yang menyediakan \r\npondasi pengetahuan tentang jaringan komputer. Metode training praktek \r\nlangsung akan&nbsp;memberikan peluang kepada peserta training \r\nuntuk&nbsp;mengembangkan keterampilan, yang otomatis&nbsp;akan membantu pesertra \r\ntraining dalam mempersiapkan diri untuk memasuki dalam dunia karir di \r\nbidang IT dan Networking. Kurikulum CCNA Exploration&nbsp;menggunakan \r\npendekatan dalam pembelajaran menggunakan media interaktif dan game \r\npembelajaran. Hal ini akan membantu peserta dalam memahami materi \r\npembelajaran dan mendukung pembelajaran mandiri baik dalam perspektif \r\nteori maupun praktek.', 'CCNA Exploration 2 Routing Protocols and Concepts'),
(97, 18, 'CCNA (640-802) Exam Preparation', '16', '4', 10, 'Cisco Certified Network Associate (CCNA)\r\n adalah sertifikasi bidang networking yang diakui secara internasional \r\ndan merupakan pondasi awal untuk mendapatkan jenjang sertifikasi yang \r\nlain. Lulusan CCNA mampu melakukan instalasi, konfigurasi, dan \r\nmengoperasikan LAN, WAN dan Dial Access Services untuk jaringan kecil \r\n(di bawah 100 PC) yang bekerja menggunakan protokol IP, IGRP, Serial, \r\nFrame Relay, IP RIP, VLANs, RIP, Ethernet, Wirelless, IPv6 dan Access \r\nLists.\r\nBagi para praktisi dan profesional yang \r\ningin mendapatkan sertifikat CCNA ini, kami akan membuka kelas bimbingan\r\n dan persiapan menghadapi ujian dengan cara membahas soal-soal ujian \r\ndengan pembahasan teori dan praktek yang dilengkapi dengan Cisco Router \r\ndan Switch Catalyst dan router wireless N Class.', ''),
(98, 18, 'Designing And Supporting Computer Networks', '16', '4', 10, 'Pens selaku Cisco Local Academy menyelenggarakan program \r\npelatihan untuk student dengan kurikulum CCNA. Kurikulum CCNA terdiri \r\ndari 4 semester (CCNA 1, CCNA 2, CCNA 3, CCNA 4). Seri kelas akademi ini\r\n adalah salah satu jalan mempersiapkan diri lebih matang untuk \r\nmendapatkan sertifikasi industri CCNA. Pada CNAP atau Cisco Networking \r\nAcademy Program ini pula akan ditawarakan 3 kurikulum yang dikeluarkan \r\noleh Cisco yaitu CCNA. Version 3.1, CCNA Discovery dan CCNA Exploration.\r\nCisco Certified Network Associate (CCNA)\r\n adalah sertifikasi bidang networking yang diakui secara internasional \r\ndan merupakan pondasi awal untuk mendapatkan jenjang sertifikasi yang \r\nlain. Lulusan CCNA mampu melakukan instalasi, konfigurasi, dan \r\nmengoperasikan LAN, WAN dan Dial Access Services untuk jaringan kecil \r\n(di bawah 100 PC) yang bekerja menggunakan protokol IP, IGRP, Serial, \r\nFrame Relay, IP RIP, VLANs, RIP, Ethernet dan Access Lists.<br><br><br>', 'Working at a Small to Medium Business or ISP'),
(99, 18, 'Working At A Small To Medium Business Or ISP', '16', '4', 10, 'Pens selaku Cisco Local Academy menyelenggarakan program \r\npelatihan untuk student dengan kurikulum CCNA. Kurikulum CCNA terdiri \r\ndari 4 semester (CCNA 1, CCNA 2, CCNA 3, CCNA 4). Seri kelas akademi ini\r\n adalah salah satu jalan mempersiapkan diri lebih matang untuk \r\nmendapatkan sertifikasi industri CCNA. Pada CNAP atau Cisco Networking \r\nAcademy Program ini pula akan ditawarakan 3 kurikulum yang dikeluarkan \r\noleh Cisco yaitu CCNA. Version 3.1, CCNA Discovery dan CCNA Exploration.\r\nCisco Certified Network Associate (CCNA)\r\n adalah sertifikasi bidang networking yang diakui secara internasional \r\ndan merupakan pondasi awal untuk mendapatkan jenjang sertifikasi yang \r\nlain. Lulusan CCNA mampu melakukan instalasi, konfigurasi, dan \r\nmengoperasikan LAN, WAN dan Dial Access Services untuk jaringan kecil \r\n(di bawah 100 PC) yang bekerja menggunakan protokol IP, IGRP, Serial, \r\nFrame Relay, IP RIP, VLANs, RIP, Ethernet dan Access Lists.', 'Networking for Home and Small and Businesses'),
(100, 18, 'Interconnecting Cisco Network Devices 1', '16', '4', 10, 'Pada training ini peserta akan disiapkan untuk dapat berhasil menempuh \r\nujian CCNA 640-811 dalam 80 Jam pembelajaran.The 640-811 Cisco Certified\r\n Network Associate (CCNA) adalah gabungan ujian yang berhubungan dengan \r\nCisco Certified Jaringan Associate sertifikasi. Kandidat dapat \r\nmempersiapkan diri untuk ujian ini dengan melihat Interconnecting Cisco \r\nNetworking Devices Part 1 (ICND1) v1.0 dan Interconnecting Cisco \r\nNetworking Devices Part 2 (ICND2) v1.0. Ujian tes calon dari pengetahuan\r\n dan keterampilan yang diperlukan untuk menginstal, beroperasi, dan \r\nmasalah yang kecil untuk ukuran perusahaan media jaringan cabang.', ''),
(101, 18, 'Interconnecting Cisco Network Devices 2', '16', '4', 10, 'Pada training ini peserta akan disiapkan untuk dapat berhasil menempuh \r\nujian CCNA 640-802 dalam 80 Jam pembelajaran.The 640-802 Cisco Certified\r\n Network Associate (CCNA) adalah gabungan ujian yang berhubungan dengan \r\nCisco Certified Jaringan Associate sertifikasi. Kandidat dapat \r\nmempersiapkan diri untuk ujian ini dengan melihat Interconnecting Cisco \r\nNetworking Devices Part 1 (ICND1) v1.0 dan Interconnecting Cisco \r\nNetworking Devices Part 2 (ICND2) v1.0. Ujian tes calon dari pengetahuan\r\n dan keterampilan yang diperlukan untuk menginstal, beroperasi, dan \r\nmasalah yang kecil untuk ukuran perusahaan media jaringan cabang.', 'Interconnecting Cisco Network Devices 1'),
(102, 18, 'Computer Fundamental (Windows XP, Application & In', '16', '4', 10, 'Perkembangan teknik informatika dan komputerisasi di dunia semakin pesat\r\n berkembang. Kita dituntut untuk terus selalu mengikuti perkembangan \r\nteknologi tersebut, salah satunya yang minimal kita harus tahu pada era \r\nsekarang ini mengoperasikan computer dan bagaimana computer dapat \r\ndimanfaatkan oleh kita untuk kebutuhan kita sehari-hari.', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_judul_jenis_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_judul_jenis_peserta` (
  `id_judul_jenis_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_judul` int(11) NOT NULL,
  `id_jenis_peserta` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_judul_jenis_peserta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=252 ;

--
-- Dumping data for table `tb_judul_jenis_peserta`
--

INSERT INTO `tb_judul_jenis_peserta` (`id_judul_jenis_peserta`, `id_judul`, `id_jenis_peserta`, `biaya`) VALUES
(207, 2, 5, 150000),
(2, 3, 5, 150000),
(3, 2, 13, 450000),
(4, 2, 15, 1500000),
(5, 3, 13, 450000),
(6, 3, 15, 1500000),
(7, 4, 5, 150000),
(8, 4, 13, 450000),
(9, 4, 15, 1500000),
(10, 5, 5, 400000),
(11, 5, 13, 1200000),
(13, 5, 15, 4000000),
(14, 7, 5, 250000),
(15, 7, 13, 750000),
(16, 7, 15, 2500000),
(17, 8, 5, 150000),
(18, 8, 13, 450000),
(19, 8, 15, 1500000),
(20, 9, 5, 150000),
(21, 9, 13, 450000),
(22, 9, 15, 1500000),
(23, 10, 5, 150000),
(24, 10, 13, 450000),
(25, 10, 15, 1500000),
(26, 11, 5, 400000),
(27, 11, 13, 1200000),
(28, 11, 15, 4000000),
(29, 12, 5, 250000),
(30, 12, 13, 750000),
(31, 12, 15, 2500000),
(32, 13, 5, 150000),
(33, 13, 13, 450000),
(34, 13, 15, 1500000),
(35, 14, 5, 150000),
(36, 14, 13, 450000),
(37, 14, 15, 1500000),
(38, 15, 5, 150000),
(39, 15, 13, 450000),
(40, 15, 15, 1500000),
(41, 16, 5, 200000),
(42, 16, 13, 400000),
(43, 16, 15, 1200000),
(44, 17, 5, 150000),
(45, 17, 13, 450000),
(46, 17, 15, 2500000),
(47, 18, 5, 150000),
(48, 18, 13, 400000),
(49, 18, 15, 1200000),
(50, 19, 5, 150000),
(51, 19, 13, 450000),
(52, 19, 15, 1200000),
(53, 20, 5, 200000),
(54, 20, 13, 500000),
(55, 20, 15, 2500000),
(56, 21, 5, 200000),
(57, 21, 13, 450000),
(58, 21, 15, 1200000),
(59, 22, 5, 150000),
(60, 22, 13, 450000),
(61, 22, 15, 1200000),
(62, 23, 5, 200000),
(63, 23, 13, 450000),
(64, 23, 15, 1200000),
(66, 24, 5, 400000),
(67, 24, 13, 1200000),
(68, 24, 15, 2500000),
(69, 25, 5, 200000),
(70, 25, 13, 400000),
(71, 25, 15, 2500000),
(72, 28, 5, 150000),
(73, 28, 13, 450000),
(74, 28, 15, 1200000),
(75, 29, 5, 150000),
(76, 29, 13, 450000),
(77, 29, 15, 1200000),
(78, 30, 5, 150000),
(79, 30, 13, 450000),
(80, 30, 15, 1200000),
(81, 31, 5, 400000),
(82, 31, 13, 1200000),
(83, 31, 15, 2500000),
(84, 33, 5, 150000),
(85, 33, 13, 450000),
(86, 33, 15, 1500000),
(87, 34, 5, 150000),
(88, 34, 13, 450000),
(89, 34, 15, 1500000),
(90, 35, 5, 150000),
(91, 35, 13, 450000),
(92, 35, 15, 1500000),
(93, 36, 5, 400000),
(94, 36, 13, 1200000),
(95, 36, 15, 4000000),
(96, 37, 5, 250000),
(97, 37, 13, 750000),
(98, 37, 15, 2500000),
(99, 32, 5, 250000),
(100, 32, 13, 400000),
(101, 32, 15, 1200000),
(150, 56, 5, 150000),
(151, 56, 13, 450000),
(152, 56, 15, 1200000),
(153, 58, 5, 150000),
(154, 58, 13, 450000),
(155, 58, 15, 1200000),
(156, 59, 5, 150000),
(157, 59, 13, 450000),
(158, 59, 15, 1200000),
(159, 60, 5, 150000),
(160, 60, 13, 450000),
(161, 60, 15, 1200000),
(162, 61, 5, 150000),
(163, 61, 13, 450000),
(164, 61, 15, 14400000),
(165, 62, 5, 150000),
(166, 62, 13, 1200000),
(167, 62, 15, 14400000),
(168, 63, 5, 450000),
(169, 63, 13, 1200000),
(170, 63, 15, 4800000),
(171, 64, 5, 450000),
(172, 64, 13, 1200000),
(173, 64, 15, 14400000),
(174, 65, 5, 150000),
(175, 65, 13, 1200000),
(176, 65, 15, 4800000),
(177, 66, 5, 1200000),
(178, 66, 13, 4800000),
(179, 66, 15, 14400000),
(180, 67, 5, 450000),
(181, 67, 13, 1200000),
(182, 67, 15, 4800000),
(183, 68, 5, 450000),
(184, 68, 13, 1200000),
(185, 68, 15, 4800000),
(186, 69, 5, 150000),
(187, 69, 13, 450000),
(188, 69, 15, 14400000),
(189, 70, 5, 450000),
(190, 70, 13, 1200000),
(191, 70, 15, 4800000),
(192, 71, 5, 450000),
(193, 71, 13, 1200000),
(194, 71, 15, 4800000),
(195, 72, 5, 150000),
(196, 72, 13, 450000),
(197, 72, 15, 1200000),
(198, 73, 5, 150000),
(199, 73, 13, 450000),
(200, 73, 15, 4800000),
(201, 74, 5, 150000),
(202, 74, 13, 450000),
(203, 74, 15, 1200000),
(204, 75, 5, 150000),
(205, 75, 13, 1200000),
(206, 75, 15, 7500000),
(208, 77, 5, 150000),
(209, 77, 13, 450000),
(210, 77, 15, 1200000),
(211, 78, 5, 450000),
(212, 78, 13, 1200000),
(213, 78, 15, 4800000),
(214, 79, 5, 150000),
(215, 79, 13, 450000),
(216, 79, 15, 1200000),
(217, 80, 5, 150000),
(218, 80, 13, 1200000),
(219, 80, 15, 2400000),
(220, 81, 5, 150000),
(221, 81, 13, 450000),
(222, 81, 15, 1200000),
(223, 82, 5, 450000),
(224, 82, 13, 1200000),
(225, 82, 15, 2400000),
(226, 84, 5, 150000),
(227, 84, 13, 450000),
(228, 84, 15, 4800000),
(229, 85, 5, 150000),
(230, 85, 13, 450000),
(231, 85, 15, 1200000),
(232, 86, 5, 450000),
(233, 86, 13, 1200000),
(234, 86, 15, 4800000),
(235, 87, 5, 150000),
(236, 87, 13, 450000),
(237, 87, 15, 1200000),
(238, 88, 5, 150000),
(239, 88, 13, 1200000),
(240, 88, 15, 4800000),
(241, 89, 5, 150000),
(242, 89, 13, 450000),
(243, 89, 15, 1200000),
(244, 90, 5, 150000),
(245, 90, 13, 1200000),
(246, 90, 15, 4800000),
(247, 91, 5, 150000),
(248, 91, 13, 450000),
(249, 91, 15, 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jumlah_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_jumlah_peserta` (
  `id_jumlah_max` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_max` int(11) NOT NULL,
  PRIMARY KEY (`id_jumlah_max`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_jumlah_peserta`
--

INSERT INTO `tb_jumlah_peserta` (`id_jumlah_max`, `jumlah_max`) VALUES
(1, 10),
(2, 20),
(3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_training`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_training` (
  `id_kategori_training` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_training` text NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_kategori_training`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tb_kategori_training`
--

INSERT INTO `tb_kategori_training` (`id_kategori_training`, `kategori_training`, `ket`) VALUES
(3, 'Customize', 'Customize'),
(15, 'Regular', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal_training` int(11) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `peserta_max` int(11) NOT NULL,
  `validasi` int(11) NOT NULL,
  `tgl` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `id_jadwal_training`, `id_instruktur`, `id_tempat`, `tahun`, `nama_kelas`, `peserta_max`, `validasi`, `tgl`) VALUES
(1, 22, 6, 17, 2013, '2013 Android Bootcamp A', 12, 0, '2013/03/13'),
(2, 14, 13, 16, 2013, '2013 Advanced Software Testing A ', 11, 0, '2013/01/31'),
(4, 32, 18, 24, 2013, '2013 Java Fundamental With Netbeans A', 2, 0, '2013/05/02'),
(8, 33, 22, 24, 2013, '2013 Visual Basic Standard A', 10, 0, '2013/05/06'),
(7, 40, 14, 17, 2013, '2013 Java For Android A', 10, 0, '2013/05/04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuitansi`
--

CREATE TABLE IF NOT EXISTS `tb_kuitansi` (
  `id_kuitansi` int(11) NOT NULL AUTO_INCREMENT,
  `no_kuitansi` varchar(20) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_judul_jenis_peserta` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `tgl_kuitansi` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_kuitansi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=386 ;

--
-- Dumping data for table `tb_kuitansi`
--

INSERT INTO `tb_kuitansi` (`id_kuitansi`, `no_kuitansi`, `no_peserta`, `id_judul_jenis_peserta`, `discount`, `tgl_kuitansi`, `ket`) VALUES
(1, 'K001', 1, 2, 0, '2013/03/19', ''),
(2, 'K001', 1, 10, 0, '2013/03/19', ''),
(3, 'K001', 1, 14, 0, '2013/03/19', ''),
(353, 'K166', 59, 151, 10, '2013/06/15', ''),
(7, 'K003', 3, 21, 0, '2013/03/19', ''),
(8, 'K003', 3, 27, 0, '2013/03/19', ''),
(9, 'K003', 3, 30, 0, '2013/03/19', ''),
(10, 'K003', 3, 39, 0, '2013/03/19', ''),
(11, 'K004', 4, 18, 0, '2013/03/19', ''),
(12, 'K004', 4, 24, 0, '2013/03/19', ''),
(13, 'K004', 4, 30, 0, '2013/03/19', ''),
(14, 'K005', 5, 52, 0, '2013/03/19', ''),
(15, 'K005', 5, 61, 0, '2013/03/19', ''),
(16, 'K005', 5, 71, 0, '2013/03/19', ''),
(17, 'K006', 6, 50, 0, '2013/03/19', ''),
(18, 'K006', 6, 59, 0, '2013/03/19', ''),
(19, 'K006', 6, 69, 0, '2013/03/19', ''),
(20, 'K007', 7, 46, 0, '2013/03/19', ''),
(21, 'K007', 7, 55, 0, '2013/03/19', ''),
(22, 'K007', 7, 58, 0, '2013/03/19', ''),
(23, 'K007', 7, 68, 0, '2013/03/19', ''),
(24, 'K008', 8, 43, 0, '2013/03/19', ''),
(25, 'K008', 8, 49, 0, '2013/03/19', ''),
(26, 'K008', 8, 61, 0, '2013/03/19', ''),
(27, 'K009', 9, 3, 0, '2013/03/19', ''),
(28, 'K009', 9, 5, 0, '2013/03/19', ''),
(29, 'K009', 9, 11, 0, '2013/03/19', ''),
(30, 'K009', 9, 15, 0, '2013/03/19', ''),
(31, 'K010', 10, 42, 0, '2013/03/19', ''),
(32, 'K010', 10, 48, 0, '2013/03/19', ''),
(33, 'K010', 10, 63, 0, '2013/03/19', ''),
(34, 'K011', 11, 19, 0, '2013/03/19', ''),
(35, 'K011', 11, 25, 0, '2013/03/19', ''),
(36, 'K011', 11, 28, 0, '2013/03/19', ''),
(37, 'K011', 11, 31, 0, '2013/03/19', ''),
(38, 'K012', 12, 42, 0, '2013/03/19', ''),
(39, 'K012', 12, 48, 0, '2013/03/19', ''),
(40, 'K012', 12, 63, 0, '2013/03/19', ''),
(41, 'K013', 13, 41, 0, '2013/03/19', ''),
(42, 'K013', 13, 47, 0, '2013/03/19', ''),
(43, 'K013', 13, 62, 0, '2013/03/19', ''),
(44, 'K014', 14, 1, 0, '2013/03/19', ''),
(45, 'K014', 14, 2, 0, '2013/03/19', ''),
(46, 'K014', 14, 7, 0, '2013/03/19', ''),
(47, 'K014', 14, 10, 0, '2013/03/19', ''),
(48, 'K014', 14, 14, 0, '2013/03/19', ''),
(49, 'K015', 15, 3, 0, '2013/03/19', ''),
(50, 'K015', 15, 5, 0, '2013/03/19', ''),
(51, 'K015', 15, 8, 0, '2013/03/19', ''),
(52, 'K015', 15, 11, 0, '2013/03/19', ''),
(53, 'K015', 15, 15, 0, '2013/03/19', ''),
(54, 'K016', 16, 56, 0, '2013/03/19', ''),
(55, 'K016', 16, 62, 0, '2013/03/19', ''),
(56, 'K016', 16, 66, 0, '2013/03/19', ''),
(57, 'K017', 17, 19, 0, '2013/03/19', ''),
(58, 'K017', 17, 25, 0, '2013/03/19', ''),
(59, 'K017', 17, 31, 0, '2013/03/19', ''),
(60, 'K018', 17, 28, 0, 'Tue-March-2013', ''),
(61, 'K019', 18, 17, 0, '2013/03/19', ''),
(62, 'K019', 18, 26, 0, '2013/03/19', ''),
(63, 'K019', 18, 29, 0, '2013/03/19', ''),
(64, 'K020', 19, 41, 0, '2013/03/22', ''),
(65, 'K020', 19, 47, 0, '2013/03/22', ''),
(66, 'K020', 19, 62, 0, '2013/03/22', ''),
(67, 'K020', 19, 66, 0, '2013/03/22', ''),
(68, 'K021', 19, 59, 0, 'Fri-March-2013', ''),
(69, 'K022', 20, 44, 0, '2013/03/22', ''),
(70, 'K022', 20, 56, 0, '2013/03/22', ''),
(71, 'K022', 20, 62, 0, '2013/03/22', ''),
(72, 'K022', 20, 66, 0, '2013/03/22', ''),
(73, 'K023', 23, 72, 0, '2013/04/04', ''),
(74, 'K023', 23, 78, 0, '2013/04/04', ''),
(75, 'K023', 23, 81, 0, '2013/04/04', ''),
(81, 'K024', 23, 59, 0, '2013/04/04', ''),
(80, 'K024', 23, 69, 0, '2013/04/04', ''),
(79, 'K024', 23, 50, 0, '2013/04/04', ''),
(82, 'K025', 23, 47, 0, '2013/04/06', ''),
(83, 'K026', 24, 56, 0, '2013/04/06', ''),
(84, 'K026', 24, 59, 0, '2013/04/06', ''),
(85, 'K026', 24, 69, 0, '2013/04/06', ''),
(89, 'K028', 26, 56, 0, '2013/04/09', ''),
(90, 'K028', 26, 62, 0, '2013/04/09', ''),
(91, 'K029', 27, 85, 0, '2013/04/09', ''),
(92, 'K029', 27, 88, 0, '2013/04/09', ''),
(93, 'K029', 27, 91, 0, '2013/04/09', ''),
(94, 'K030', 29, 150, 0, '2013/04/11', ''),
(96, 'K032', 31, 72, 0, '2013/04/11', ''),
(97, 'K032', 31, 75, 0, '2013/04/11', ''),
(98, 'K033', 33, 183, 0, '2013/04/12', ''),
(99, 'K033', 33, 189, 0, '2013/04/12', ''),
(100, 'K034', 34, 183, 0, '2013/04/12', ''),
(101, 'K035', 34, 186, 0, '2013/04/12', ''),
(102, 'K036', 33, 156, 0, '2013/04/13', ''),
(103, 'K037', 35, 196, 0, '2013/04/13', ''),
(104, 'K037', 35, 205, 0, '2013/04/13', ''),
(105, 'K038', 36, 183, 0, '2013/04/13', ''),
(106, 'K039', 37, 183, 0, '2013/04/15', ''),
(107, 'K039', 37, 189, 0, '2013/04/15', ''),
(108, 'K040', 38, 150, 0, '2013/04/15', ''),
(109, 'K041', 6, 75, 0, '2013/04/15', ''),
(110, 'K042', 35, 157, 0, '2013/04/18', ''),
(111, 'K043', 39, 32, 0, '2013/04/18', ''),
(112, 'K044', 40, 153, 0, '2013/04/18', ''),
(113, 'K045', 41, 150, 0, '2013/04/19', ''),
(114, 'K045', 41, 153, 0, '2013/04/19', ''),
(115, 'K046', 27, 205, 0, '2013/04/19', ''),
(116, 'K047', 25, 34, 0, '2013/04/19', ''),
(117, 'K048', 29, 153, 0, '2013/04/22', ''),
(118, 'K049', 42, 153, 0, '2013/04/25', ''),
(119, 'K050', 42, 195, 0, '2013/04/25', ''),
(120, 'K050', 42, 204, 0, '2013/04/25', ''),
(121, 'K051', 43, 3, 0, '2013/04/25', ''),
(122, 'K051', 43, 88, 0, '2013/04/25', ''),
(123, 'K052', 43, 18, 0, '2013/04/25', ''),
(126, 'K054', 45, 26, 0, '2013/04/25', ''),
(127, 'K054', 45, 81, 0, '2013/04/25', ''),
(128, 'K055', 46, 26, 0, '2013/04/25', ''),
(129, 'K055', 46, 81, 0, '2013/04/25', ''),
(130, 'K056', 47, 27, 0, '2013/04/25', ''),
(131, 'K056', 47, 82, 0, '2013/04/25', ''),
(132, 'K057', 48, 26, 0, '2013/04/25', ''),
(133, 'K057', 48, 81, 0, '2013/04/25', ''),
(134, 'K058', 49, 26, 0, '2013/04/25', ''),
(135, 'K058', 49, 81, 0, '2013/04/25', ''),
(136, 'K059', 50, 28, 0, '2013/04/25', ''),
(137, 'K059', 50, 83, 0, '2013/04/25', ''),
(138, 'K060', 51, 26, 0, '2013/04/25', ''),
(139, 'K060', 51, 81, 0, '2013/04/25', ''),
(140, 'K061', 52, 27, 0, '2013/04/25', ''),
(141, 'K061', 52, 82, 0, '2013/04/25', ''),
(142, 'K062', 53, 186, 0, '2013/04/25', ''),
(143, 'K062', 53, 192, 0, '2013/04/25', ''),
(144, 'K063', 54, 187, 0, '2013/04/25', ''),
(145, 'K063', 54, 193, 0, '2013/04/25', ''),
(146, 'K064', 55, 186, 0, '2013/04/25', ''),
(147, 'K064', 55, 192, 0, '2013/04/25', ''),
(148, 'K065', 56, 186, 0, '2013/04/25', ''),
(149, 'K065', 56, 192, 0, '2013/04/25', ''),
(150, 'K066', 57, 186, 0, '2013/04/25', ''),
(151, 'K066', 57, 192, 0, '2013/04/25', ''),
(152, 'K067', 58, 187, 0, '2013/04/25', ''),
(153, 'K067', 58, 193, 0, '2013/04/25', ''),
(154, 'K068', 59, 187, 0, '2013/04/25', ''),
(155, 'K068', 59, 193, 0, '2013/04/25', ''),
(156, 'K069', 60, 188, 0, '2013/04/25', ''),
(157, 'K069', 60, 194, 0, '2013/04/25', ''),
(158, 'K070', 61, 187, 0, '2013/04/25', ''),
(159, 'K070', 61, 193, 0, '2013/04/25', ''),
(160, 'K071', 62, 190, 0, '2013/04/25', ''),
(161, 'K071', 62, 193, 0, '2013/04/25', ''),
(162, 'K072', 63, 183, 0, '2013/04/25', ''),
(163, 'K072', 63, 189, 0, '2013/04/25', ''),
(164, 'K073', 64, 185, 0, '2013/04/25', ''),
(165, 'K073', 64, 191, 0, '2013/04/25', ''),
(166, 'K074', 65, 183, 0, '2013/04/25', ''),
(167, 'K074', 65, 189, 0, '2013/04/25', ''),
(168, 'K075', 66, 183, 0, '2013/04/25', ''),
(169, 'K075', 66, 189, 0, '2013/04/25', ''),
(170, 'K076', 67, 184, 0, '2013/04/25', ''),
(171, 'K076', 67, 190, 0, '2013/04/25', ''),
(172, 'K077', 68, 183, 0, '2013/04/25', ''),
(173, 'K077', 68, 189, 0, '2013/04/25', ''),
(174, 'K078', 69, 196, 0, '2013/04/25', ''),
(175, 'K078', 69, 205, 0, '2013/04/25', ''),
(176, 'K079', 70, 195, 0, '2013/04/25', ''),
(177, 'K079', 70, 204, 0, '2013/04/25', ''),
(178, 'K080', 71, 196, 0, '2013/04/25', ''),
(179, 'K080', 71, 205, 0, '2013/04/25', ''),
(180, 'K081', 72, 195, 0, '2013/04/25', ''),
(181, 'K081', 72, 204, 0, '2013/04/25', ''),
(182, 'K082', 73, 197, 0, '2013/04/25', ''),
(183, 'K082', 73, 206, 0, '2013/04/25', ''),
(184, 'K083', 74, 195, 0, '2013/04/25', ''),
(185, 'K083', 74, 204, 0, '2013/04/25', ''),
(186, 'K084', 75, 197, 0, '2013/04/25', ''),
(187, 'K084', 75, 206, 0, '2013/04/25', ''),
(188, 'K085', 76, 196, 0, '2013/04/25', ''),
(189, 'K085', 76, 205, 0, '2013/04/25', ''),
(190, 'K086', 77, 60, 0, '2013/04/25', ''),
(191, 'K086', 77, 181, 0, '2013/04/25', ''),
(192, 'K087', 78, 59, 0, '2013/04/25', ''),
(193, 'K087', 78, 180, 0, '2013/04/25', ''),
(194, 'K088', 79, 61, 0, '2013/04/25', ''),
(195, 'K088', 79, 182, 0, '2013/04/25', ''),
(196, 'K089', 80, 61, 0, '2013/04/25', ''),
(197, 'K089', 80, 182, 0, '2013/04/25', ''),
(198, 'K090', 81, 59, 0, '2013/04/25', ''),
(199, 'K090', 81, 180, 0, '2013/04/25', ''),
(200, 'K091', 82, 59, 0, '2013/04/25', ''),
(201, 'K091', 82, 180, 0, '2013/04/25', ''),
(202, 'K092', 83, 61, 0, '2013/04/25', ''),
(203, 'K092', 83, 182, 0, '2013/04/25', ''),
(204, 'K093', 84, 182, 0, '2013/04/25', ''),
(205, 'K093', 84, 71, 0, '2013/04/25', ''),
(206, 'K094', 85, 180, 0, '2013/04/25', ''),
(207, 'K094', 85, 69, 0, '2013/04/25', ''),
(208, 'K095', 86, 182, 0, '2013/04/25', ''),
(209, 'K095', 86, 71, 0, '2013/04/25', ''),
(210, 'K096', 87, 53, 0, '2013/04/25', ''),
(211, 'K096', 87, 69, 0, '2013/04/25', ''),
(212, 'K097', 88, 55, 0, '2013/04/25', ''),
(213, 'K097', 88, 71, 0, '2013/04/25', ''),
(214, 'K098', 89, 55, 0, '2013/04/25', ''),
(215, 'K098', 89, 71, 0, '2013/04/25', ''),
(216, 'K099', 90, 53, 0, '2013/04/25', ''),
(217, 'K099', 90, 69, 0, '2013/04/25', ''),
(218, 'K100', 91, 53, 0, '2013/04/25', ''),
(219, 'K100', 91, 69, 0, '2013/04/25', ''),
(220, 'K101', 92, 22, 0, '2013/04/25', ''),
(221, 'K101', 92, 77, 0, '2013/04/25', ''),
(222, 'K102', 93, 22, 0, '2013/04/25', ''),
(223, 'K102', 93, 77, 0, '2013/04/25', ''),
(224, 'K103', 94, 20, 0, '2013/04/25', ''),
(225, 'K103', 94, 75, 0, '2013/04/25', ''),
(226, 'K104', 95, 22, 0, '2013/04/25', ''),
(227, 'K104', 95, 77, 0, '2013/04/25', ''),
(228, 'K105', 96, 20, 0, '2013/04/25', ''),
(229, 'K105', 96, 75, 0, '2013/04/25', ''),
(230, 'K106', 97, 22, 0, '2013/04/25', ''),
(231, 'K106', 97, 77, 0, '2013/04/25', ''),
(232, 'K107', 98, 21, 0, '2013/04/25', ''),
(233, 'K107', 98, 76, 0, '2013/04/25', ''),
(234, 'K108', 99, 20, 0, '2013/04/25', ''),
(235, 'K108', 99, 75, 0, '2013/04/25', ''),
(236, 'K109', 100, 20, 0, '2013/04/25', ''),
(237, 'K109', 100, 75, 0, '2013/04/25', ''),
(240, 'K111', 102, 156, 0, '2013/04/25', ''),
(241, 'K111', 102, 150, 0, '2013/04/25', ''),
(242, 'K111', 102, 153, 0, '2013/04/25', ''),
(243, 'K112', 103, 156, 0, '2013/04/25', ''),
(244, 'K112', 103, 150, 0, '2013/04/25', ''),
(245, 'K112', 103, 153, 0, '2013/04/25', ''),
(246, 'K113', 104, 156, 0, '2013/04/25', ''),
(247, 'K113', 104, 150, 0, '2013/04/25', ''),
(248, 'K113', 104, 153, 0, '2013/04/25', ''),
(249, 'K114', 105, 158, 0, '2013/04/25', ''),
(250, 'K114', 105, 152, 0, '2013/04/25', ''),
(251, 'K114', 105, 155, 0, '2013/04/25', ''),
(252, 'K115', 106, 157, 0, '2013/04/25', ''),
(253, 'K115', 106, 151, 0, '2013/04/25', ''),
(254, 'K115', 106, 154, 0, '2013/04/25', ''),
(255, 'K116', 107, 156, 0, '2013/04/25', ''),
(256, 'K116', 107, 150, 0, '2013/04/25', ''),
(257, 'K116', 107, 153, 0, '2013/04/25', ''),
(258, 'K117', 108, 157, 0, '2013/04/25', ''),
(259, 'K117', 108, 151, 0, '2013/04/25', ''),
(260, 'K117', 108, 154, 0, '2013/04/25', ''),
(261, 'K118', 109, 49, 0, '2013/04/25', ''),
(262, 'K118', 109, 58, 0, '2013/04/25', ''),
(266, 'K120', 111, 66, 0, '2013/04/25', ''),
(267, 'K120', 111, 47, 0, '2013/04/25', ''),
(268, 'K120', 111, 56, 0, '2013/04/25', ''),
(269, 'K121', 112, 68, 0, '2013/04/25', ''),
(270, 'K121', 112, 49, 0, '2013/04/25', ''),
(271, 'K121', 112, 58, 0, '2013/04/25', ''),
(272, 'K122', 113, 68, 0, '2013/04/25', ''),
(273, 'K122', 113, 49, 0, '2013/04/25', ''),
(274, 'K122', 113, 58, 0, '2013/04/25', ''),
(275, 'K123', 114, 67, 0, '2013/04/25', ''),
(276, 'K123', 114, 48, 0, '2013/04/25', ''),
(277, 'K123', 114, 57, 0, '2013/04/25', ''),
(278, 'K124', 115, 176, 0, '2013/04/25', ''),
(279, 'K124', 115, 58, 0, '2013/04/25', ''),
(280, 'K125', 116, 177, 0, '2013/04/25', ''),
(281, 'K125', 116, 174, 0, '2013/04/25', ''),
(282, 'K125', 116, 56, 0, '2013/04/25', ''),
(283, 'K126', 117, 178, 0, '2013/04/25', ''),
(284, 'K126', 117, 175, 0, '2013/04/25', ''),
(285, 'K127', 118, 179, 0, '2013/04/25', ''),
(286, 'K127', 118, 176, 0, '2013/04/25', ''),
(287, 'K128', 119, 177, 0, '2013/04/25', ''),
(288, 'K128', 119, 174, 0, '2013/04/25', ''),
(289, 'K129', 120, 179, 0, '2013/04/25', ''),
(290, 'K129', 120, 176, 0, '2013/04/25', ''),
(291, 'K130', 121, 177, 0, '2013/04/25', ''),
(292, 'K130', 121, 174, 0, '2013/04/25', ''),
(293, 'K131', 122, 177, 0, '2013/04/25', ''),
(294, 'K131', 122, 174, 0, '2013/04/25', ''),
(295, 'K132', 123, 179, 0, '2013/04/25', ''),
(296, 'K132', 123, 176, 0, '2013/04/25', ''),
(297, 'K133', 124, 178, 0, '2013/04/25', ''),
(298, 'K133', 124, 175, 0, '2013/04/25', ''),
(299, 'K134', 125, 165, 0, '2013/04/25', ''),
(300, 'K134', 125, 177, 0, '2013/04/25', ''),
(301, 'K135', 126, 159, 0, '2013/04/25', ''),
(302, 'K135', 126, 165, 0, '2013/04/25', ''),
(303, 'K136', 127, 161, 0, '2013/04/25', ''),
(304, 'K136', 127, 167, 0, '2013/04/25', ''),
(305, 'K137', 128, 159, 0, '2013/04/25', ''),
(306, 'K137', 128, 165, 0, '2013/04/25', ''),
(307, 'K138', 129, 159, 0, '2013/04/25', ''),
(308, 'K138', 129, 165, 0, '2013/04/25', ''),
(309, 'K139', 130, 161, 0, '2013/04/25', ''),
(310, 'K139', 130, 167, 0, '2013/04/25', ''),
(311, 'K140', 131, 160, 0, '2013/04/25', ''),
(312, 'K140', 131, 166, 0, '2013/04/25', ''),
(313, 'K141', 132, 159, 0, '2013/04/25', ''),
(314, 'K141', 132, 165, 0, '2013/04/25', ''),
(315, 'K142', 133, 159, 0, '2013/04/25', ''),
(316, 'K142', 133, 165, 0, '2013/04/25', ''),
(317, 'K143', 134, 161, 0, '2013/04/25', ''),
(318, 'K143', 134, 167, 0, '2013/04/25', ''),
(319, 'K144', 135, 158, 0, '2013/05/01', ''),
(320, 'K145', 136, 209, 0, '2013/05/02', ''),
(322, 'K147', 137, 211, 0, '2013/05/02', ''),
(323, 'K148', 59, 221, 0, '2013/05/02', ''),
(324, 'K149', 59, 221, 0, '2013/05/02', ''),
(325, 'K150', 123, 89, 0, '2013/05/03', ''),
(326, 'K151', 107, 35, 0, '2013/05/03', ''),
(327, 'K152', 114, 215, 0, '2013/05/03', ''),
(328, 'K152', 114, 209, 0, '2013/05/03', ''),
(329, 'K152', 114, 212, 0, '2013/05/03', ''),
(333, 'K154', 29, 189, 0, '2013/05/03', ''),
(334, 'K154', 29, 192, 0, '2013/05/03', ''),
(335, 'K155', 138, 191, 0, '2013/05/05', ''),
(336, 'K156', 139, 200, 0, '2013/05/05', ''),
(337, 'K156', 139, 203, 0, '2013/05/05', ''),
(338, 'K157', 140, 152, 0, '2013/05/05', ''),
(339, 'K158', 141, 173, 0, '2013/05/07', ''),
(340, 'K158', 141, 58, 0, '2013/05/07', ''),
(341, 'K159', 141, 43, 0, '2013/05/07', ''),
(342, 'K160', 142, 203, 5, '2013/05/14', ''),
(343, 'K160', 142, 206, 5, '2013/05/14', ''),
(344, 'K161', 143, 203, 5, '2013/05/14', ''),
(345, 'K161', 143, 206, 5, '2013/05/14', ''),
(354, 'K166', 59, 154, 10, '2013/06/15', ''),
(355, 'K167', 152, 206, 5, '2013/06/15', ''),
(356, 'K167', 152, 197, 5, '2013/06/15', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE IF NOT EXISTS `tb_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id_log`, `user_name`, `tgl`, `time`) VALUES
(1, 'operator', '2013-04-25', '16:28:54'),
(2, 'operator', '2013-04-27', '05:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_model_sertifikat`
--

CREATE TABLE IF NOT EXISTS `tb_model_sertifikat` (
  `id_model_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `id_details_pelatihan` int(11) NOT NULL,
  `nama_model` text NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_model_sertifikat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE IF NOT EXISTS `tb_modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `modul` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `hak_akses` text NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id_modul`, `modul`, `link`, `hak_akses`) VALUES
(17, 'kwitansi', 'kwitansi', '1,2'),
(22, 'Pelatihan', 'pelatihan', '1,2'),
(129, 'instruktur update', 'instruktur_update', '1,2'),
(25, 'Tempat', 'tempat', '1,2'),
(26, 'Jadwal', 'jadwal_view', '1,2'),
(28, 'Absen Instruktur', 'absen_instruktur_view', '1,2'),
(30, 'Nilai Peserta', 'nilai_view', '1,'),
(31, 'Sertifikat', 'sertifikat_view', '1,2'),
(127, 'daftar peserta proses pilih addjudul', 'daftar_peserta_proses_pilih_addjudul', '1,2'),
(68, 'daftar formulir', 'daftar_formulir', '1,2'),
(38, 'Modul Managemen', 'modul_managemen', '1,'),
(37, 'User Manajemen', 'user_manajemen', '1,'),
(44, 'absen instruktur delete', 'absen_instruktur_delete', '1,2'),
(39, 'Input Nilai Peserta', 'nilai_insert', '1,'),
(45, 'absen instruktur insert', 'absen_instruktur_insert', '1,2'),
(46, 'absen instruktur insert proses', 'absen_instruktur_insert_proses', '1,2'),
(47, 'absen instruktur update', 'absen_instruktur_update', '1,2'),
(48, 'absen instruktur update proses', 'absen_instruktur_update_proses', '1,2'),
(49, 'absen instruktur view', 'absen_instruktur_view', '1,2'),
(50, 'absen peserta delete', 'absen_peserta_delete', '1,2'),
(51, 'absen peserta insert', 'absen_peserta_insert', '1,2'),
(52, 'absen peserta insert proses', 'absen_peserta_insert_proses', '1,2'),
(132, 'aksesoris update proses', 'aksesoris_update_proses', '1,2'),
(54, 'absen peserta print pre', 'absen_peserta_print_pre', '1,2'),
(55, 'absen peserta print pre1', 'absen_peserta_print_pre1', '1,2'),
(130, 'instruktur update delete proses', 'instruktur_proses', '1,2'),
(57, 'absen peserta update', 'absen_peserta_update', '1,2'),
(58, 'absen peserta update proses', 'absen_peserta_update_proses', '1,2'),
(59, 'absen peserta view', 'absen_peserta_view', '1,2'),
(60, 'absen peserta view sortir', 'absen_peserta_view_sortir', '1,2'),
(61, 'backup and restore', 'backup_and_restore', '1,2'),
(62, 'biaya pelatihan', 'biaya_pelatihan', '1,2'),
(63, 'buku tamu baca', 'buku_tamu_baca', '1,2'),
(64, 'buku tamu delete', 'buku_tamu_delete', '1,2'),
(65, 'buku tamu delete all', 'buku_tamu_delete_all', '1,2'),
(66, 'buku tamu delete10', 'buku_tamu_delete10', '1,2'),
(67, 'buku tamu view', 'buku_tamu_view', '1,2'),
(70, 'daftar peserta administrasi daftar', 'daftar_peserta_administrasi_daftar', '1,2'),
(71, 'daftar peserta form1', 'daftar_peserta_form1', '1,2'),
(72, 'daftar peserta form2', 'daftar_peserta_form2', '1,2'),
(73, 'daftar peserta form2 tambah judul', 'daftar_peserta_form2_tambah_judul', '1,2'),
(74, 'daftar peserta form3', 'daftar_peserta_form3', '1,2'),
(75, 'daftar peserta form3 tambah judul', 'daftar_peserta_form3_tambah_judul', '1,2'),
(76, 'daftar peserta next pilih judul', 'daftar_peserta_next_pilih_judul', '1,2'),
(77, 'daftar peserta p pilih judul', 'daftar_peserta_p_pilihjudul', '1,2'),
(78, 'daftar peserta print', 'daftar_peserta_print', '1,2'),
(79, 'daftar peserta print tambah judul', 'daftar_peserta_print_tambah_judul', '1,2'),
(80, 'daftar peserta proses daftar', 'daftar_peserta_proses_daftar', '1,2'),
(81, 'daftar peserta proses insert', 'daftar_peserta_proses_insert', '1,2'),
(82, 'daftar peserta proses insert kwitansi', 'daftar_peserta_proses_insert_kwitansi', '1,2'),
(83, 'daftar peserta proses insert kwitansi add judul', 'daftar_peserta_proses_insert_kwitansi_addjudul', '1,2'),
(84, 'daftar peserta update', 'daftar_peserta_update', '1,2'),
(85, 'daftar peserta view peserta', 'daftar_peserta_view_peserta', '1,2'),
(86, 'aksesoris', 'aksesoris', '1,2'),
(88, 'instruktur insert', 'instruktur_insert', '1,2'),
(89, 'instruktur view', 'instruktur_view', '1,2'),
(128, 'instruktur insert proses', 'instruktur_insert_proses', '1,2'),
(91, 'jadwal training delete', 'jadwal_training_delete', '1,2'),
(92, 'jadwal training insert', 'jadwal_training_insert', '1,2'),
(93, 'jadwal training insert proses', 'jadwal_training_insert_proses', '1,2'),
(94, 'jadwal training update', 'jadwal_training_update', '1,2'),
(95, 'jadwal training update proses', 'jadwal_training_update_proses', '1,2'),
(96, 'jadwal training view', 'jadwal_training_view', '1,2'),
(97, 'jenis peserta', 'jenis_peserta', '1,'),
(98, 'judul insert', 'judul_insert', '1,2'),
(99, 'judul insert proses', 'judul_insert_proses', '1,2'),
(100, 'judul update', 'judul_update', '1,2'),
(101, 'judul update proses', 'judul_update_proses', '1,2'),
(102, 'judul view', 'judul_view', '1,2'),
(103, 'jumlah max kelas insert', 'jumlah_max_kelas_insert', '1,2'),
(104, 'jumlah max kelas proses insert', 'jumlah_max_kelas_proses_insert', '1,2'),
(105, 'kategori', 'kategori', '1,2'),
(106, 'kelas', 'kelas', '1,2'),
(107, 'kelas pembagian peserta', 'kelas_pembagian_peserta', '1,2'),
(108, 'kelas pembagian peserta proses', 'kelas_pembagian_peserta_proses', '1,2'),
(109, 'kelas pembagian view', 'kelas_pembagian_view1', '1,2'),
(110, 'kwitansi detail', 'kwitansi_detail', '1,2'),
(111, 'laporan', 'laporan', '1,2'),
(112, 'log view', 'log_view', '1,2'),
(113, 'modul managemen update', 'modul_managemen_update', '1,'),
(114, 'modul managemen update proses', 'modul_managemen_update_proses ', '1,'),
(115, 'nilai delete', 'nilai_delete', '1,'),
(116, 'nilai insert', 'nilai_insert', '1,'),
(117, 'nilai insert proses', 'nilai_insert_proses', '1,'),
(118, 'nilai update', 'nilai_update', '1,'),
(119, 'nilai update proses', 'nilai_update_proses', '1,'),
(131, 'aksesoris update', 'aksesoris_update', '1,2'),
(121, 'sertifikat excel form1', 'sertifikat_excel_form1', '1,2'),
(122, 'sertifikat proses insert', 'sertifikat_p_insert', '1,2'),
(123, 'sertifikat pdf form1', 'sertifikat_pdf_form1', '1,2'),
(124, 'sertifikat pdf form2', 'sertifikat_pdf_form2', '1,2'),
(125, 'sertifikat pdf proses', 'sertifikat_pdf_proses', '1,2'),
(126, 'user manajemen insert', 'user_manajemen_insert', '1,'),
(133, 'nilai insert tanpa status', 'nilai_insert_tanpa_status', '1,2'),
(134, 'nilai insert proses tanpa status', 'nilai_insert_proses_tanpa_status', '1,2'),
(135, 'Nilai Peserta', 'nilai_view_tanpa_status', '1,2'),
(136, 'nilai delete tanpa status', 'nilai_delete_tanpa_status', '1,2'),
(137, 'nilai update tanpa status', 'nilai_update_tanpa_status', '1,2'),
(138, 'nilai update proses tanpa status', 'nilai_update_proses_tanpa_status', '1,2'),
(139, 'sertifikat model', 'sertifikat_model', '1,2'),
(140, 'direktur', 'direktur', '1,2'),
(141, 'daftar peserta banyak', 'daftar_peserta_banyak', '1,2'),
(142, 'daftar peserta banyak proses', 'daftar_peserta_banyak_proses', '1,2'),
(143, 'daftar peserta banyak proses1', 'daftar_peserta_banyak_proses1', '1,2'),
(144, 'daftar peserta form2 banyak', 'daftar_peserta_form2_banyak', '1,2'),
(145, 'daftar peserta banyak p pilih judul', 'daftar_peserta_banyak_p_pilih_judul', '1,2'),
(146, 'daftar peserta form3 banyak', 'daftar_peserta_form3_banyak', '1,2'),
(147, 'daftar peserta banyak proses kwitansi', 'daftar_peserta_banyak_proses_kwitansi', '1,2'),
(148, 'daftar peserta banyak kwitansi pecah', 'daftar_peserta_banyak_kwitansi_pecah', '1,2'),
(149, 'kwitansi_group', 'kwitansi_group', '1,2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_details_pelatihan` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `val` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_details_pelatihan`, `id_judul`, `no_peserta`, `nilai`, `status`, `val`) VALUES
(2, 1, 29, 100, 80, 'lulus', 1),
(3, 1, 29, 99, 89, 'lulus', 1),
(4, 1, 29, 98, 80, 'lulus', 1),
(5, 1, 29, 97, 69, 'lulus', 1),
(6, 1, 29, 96, 90, 'lulus', 1),
(7, 1, 29, 95, 70, 'lulus', 1),
(8, 1, 29, 94, 75, 'lulus', 1),
(9, 1, 29, 93, 85, 'lulus', 1),
(10, 1, 29, 92, 76, 'lulus', 1),
(11, 1, 29, 6, 90, 'lulus', 1),
(12, 1, 29, 31, 90, 'lulus', 1),
(45, 2, 17, 20, 70, 'lulus', 2),
(43, 1, 9, 92, 80, 'lulus', 1),
(42, 1, 9, 93, 80, 'lulus', 1),
(41, 1, 9, 94, 80, 'lulus', 1),
(40, 1, 9, 95, 80, 'lulus', 1),
(39, 1, 9, 96, 80, 'lulus', 1),
(38, 1, 9, 97, 90, 'lulus', 1),
(37, 1, 9, 98, 90, 'lulus', 1),
(36, 1, 9, 99, 90, 'lulus', 1),
(35, 1, 9, 100, 90, 'lulus', 1),
(33, 1, 9, 3, 90, 'lulus', 1),
(55, 2, 17, 7, 20, 'lulus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_peserta_kelas` (
  `id_peserta_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_pilih_judul` int(11) NOT NULL,
  PRIMARY KEY (`id_peserta_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `tb_peserta_kelas`
--

INSERT INTO `tb_peserta_kelas` (`id_peserta_kelas`, `id_kelas`, `no_peserta`, `id_pilih_judul`) VALUES
(2, 1, 100, 244),
(3, 1, 99, 242),
(4, 1, 98, 240),
(5, 1, 97, 238),
(6, 1, 96, 236),
(7, 1, 95, 234),
(8, 1, 94, 232),
(9, 1, 93, 230),
(10, 1, 92, 228),
(11, 1, 6, 116),
(12, 1, 31, 104),
(13, 2, 3, 9),
(15, 2, 100, 243),
(16, 2, 99, 241),
(17, 2, 98, 239),
(18, 2, 97, 237),
(19, 2, 96, 235),
(20, 2, 95, 233),
(21, 2, 94, 231),
(22, 2, 93, 229),
(23, 2, 92, 227),
(49, 7, 91, 226),
(48, 7, 23, 84),
(47, 7, 24, 88),
(30, 4, 7, 22),
(29, 4, 20, 73),
(50, 7, 90, 224),
(51, 7, 89, 222),
(52, 7, 88, 220),
(53, 7, 87, 218),
(54, 7, 86, 216),
(55, 7, 85, 214),
(56, 7, 84, 212),
(57, 8, 8, 24),
(58, 8, 109, 268),
(60, 8, 111, 274),
(61, 8, 112, 277),
(62, 8, 113, 280),
(63, 8, 114, 283),
(64, 8, 10, 31),
(65, 8, 12, 38),
(66, 8, 19, 65);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pilih_judul`
--

CREATE TABLE IF NOT EXISTS `tb_pilih_judul` (
  `id_pilih_judul` int(11) NOT NULL AUTO_INCREMENT,
  `no_peserta` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  PRIMARY KEY (`id_pilih_judul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=441 ;

--
-- Dumping data for table `tb_pilih_judul`
--

INSERT INTO `tb_pilih_judul` (`id_pilih_judul`, `no_peserta`, `id_judul`) VALUES
(1, 1, 7),
(2, 1, 5),
(3, 1, 3),
(373, 152, 75),
(372, 152, 72),
(371, 59, 58),
(7, 3, 12),
(8, 3, 11),
(9, 3, 9),
(10, 3, 15),
(11, 4, 10),
(12, 4, 8),
(13, 4, 12),
(14, 5, 19),
(15, 5, 25),
(16, 5, 22),
(17, 6, 19),
(18, 6, 25),
(19, 6, 22),
(20, 7, 24),
(93, 26, 21),
(22, 7, 17),
(23, 7, 20),
(24, 8, 18),
(25, 8, 16),
(26, 8, 22),
(27, 9, 2),
(28, 9, 7),
(29, 9, 5),
(30, 9, 3),
(31, 10, 18),
(32, 10, 16),
(33, 10, 23),
(34, 11, 10),
(35, 11, 8),
(36, 11, 12),
(37, 11, 11),
(38, 12, 18),
(39, 12, 16),
(40, 12, 23),
(332, 107, 14),
(334, 114, 77),
(331, 123, 34),
(44, 14, 4),
(45, 14, 2),
(46, 14, 7),
(47, 14, 5),
(48, 14, 3),
(49, 15, 4),
(50, 15, 2),
(51, 15, 7),
(52, 15, 5),
(53, 15, 3),
(54, 16, 23),
(55, 16, 24),
(92, 25, 45),
(57, 16, 16),
(58, 17, 10),
(59, 17, 8),
(60, 17, 12),
(61, 17, 11),
(62, 18, 8),
(63, 18, 12),
(64, 18, 11),
(65, 19, 18),
(66, 19, 16),
(67, 19, 23),
(68, 19, 24),
(69, 19, 22),
(70, 20, 23),
(71, 20, 24),
(91, 25, 44),
(73, 20, 17),
(88, 24, 25),
(87, 24, 21),
(86, 23, 18),
(90, 25, 47),
(94, 26, 23),
(89, 24, 22),
(80, 23, 31),
(81, 23, 30),
(82, 23, 28),
(83, 23, 19),
(84, 23, 25),
(85, 23, 22),
(95, 27, 35),
(96, 27, 33),
(97, 27, 34),
(98, 29, 56),
(370, 59, 56),
(100, 30, 56),
(101, 30, 58),
(103, 31, 28),
(104, 31, 29),
(105, 33, 68),
(106, 33, 70),
(107, 34, 68),
(108, 34, 69),
(109, 33, 59),
(110, 35, 72),
(111, 35, 75),
(112, 36, 68),
(113, 37, 68),
(114, 37, 70),
(115, 38, 56),
(116, 6, 29),
(117, 35, 59),
(118, 39, 13),
(119, 40, 58),
(120, 41, 56),
(121, 41, 58),
(122, 27, 75),
(123, 25, 13),
(124, 29, 58),
(333, 114, 79),
(126, 42, 72),
(127, 42, 75),
(128, 43, 2),
(129, 43, 34),
(130, 43, 8),
(438, 209, 16),
(437, 209, 17),
(133, 45, 31),
(134, 45, 11),
(135, 46, 31),
(136, 46, 11),
(137, 47, 31),
(138, 47, 11),
(139, 48, 31),
(140, 48, 11),
(141, 49, 31),
(142, 49, 11),
(143, 50, 31),
(144, 50, 11),
(145, 51, 31),
(146, 51, 11),
(147, 52, 31),
(148, 52, 11),
(149, 53, 71),
(150, 53, 69),
(151, 54, 71),
(152, 54, 69),
(153, 55, 71),
(154, 55, 69),
(155, 56, 71),
(156, 56, 69),
(157, 57, 71),
(158, 57, 69),
(159, 58, 71),
(160, 58, 69),
(161, 59, 71),
(162, 59, 69),
(163, 60, 71),
(164, 60, 69),
(165, 61, 71),
(166, 61, 69),
(167, 62, 70),
(168, 62, 71),
(169, 63, 68),
(170, 63, 70),
(171, 64, 68),
(172, 64, 70),
(173, 65, 68),
(174, 65, 70),
(175, 66, 68),
(176, 66, 70),
(177, 67, 68),
(178, 67, 70),
(179, 68, 68),
(180, 68, 70),
(181, 69, 72),
(182, 69, 75),
(183, 70, 72),
(184, 70, 75),
(185, 71, 72),
(186, 71, 75),
(187, 72, 72),
(188, 72, 75),
(189, 73, 72),
(190, 73, 75),
(191, 74, 72),
(192, 74, 75),
(193, 75, 72),
(194, 75, 75),
(195, 76, 72),
(196, 76, 75),
(197, 77, 22),
(198, 77, 67),
(199, 78, 22),
(200, 78, 67),
(201, 79, 22),
(202, 79, 67),
(203, 80, 22),
(204, 80, 67),
(205, 81, 22),
(206, 81, 67),
(207, 82, 22),
(208, 82, 67),
(209, 83, 22),
(210, 83, 67),
(211, 84, 67),
(212, 84, 25),
(213, 85, 67),
(214, 85, 25),
(215, 86, 67),
(216, 86, 25),
(217, 87, 20),
(218, 87, 25),
(219, 88, 20),
(220, 88, 25),
(221, 89, 20),
(222, 89, 25),
(223, 90, 20),
(224, 90, 25),
(225, 91, 20),
(226, 91, 25),
(227, 92, 9),
(228, 92, 29),
(229, 93, 9),
(230, 93, 29),
(231, 94, 9),
(232, 94, 29),
(233, 95, 9),
(234, 95, 29),
(235, 96, 9),
(236, 96, 29),
(237, 97, 9),
(238, 97, 29),
(239, 98, 9),
(240, 98, 29),
(241, 99, 9),
(242, 99, 29),
(243, 100, 9),
(244, 100, 29),
(359, 145, 56),
(358, 144, 58),
(247, 102, 59),
(248, 102, 56),
(249, 102, 58),
(250, 103, 59),
(251, 103, 56),
(252, 103, 58),
(253, 104, 59),
(254, 104, 56),
(255, 104, 58),
(256, 105, 59),
(257, 105, 56),
(258, 105, 58),
(259, 106, 59),
(260, 106, 56),
(261, 106, 58),
(262, 107, 59),
(263, 107, 56),
(264, 107, 58),
(265, 108, 59),
(266, 108, 56),
(267, 108, 58),
(268, 109, 18),
(269, 109, 21),
(364, 147, 69),
(363, 147, 71),
(273, 111, 24),
(274, 111, 18),
(275, 111, 21),
(276, 112, 24),
(277, 112, 18),
(278, 112, 21),
(279, 113, 24),
(280, 113, 18),
(281, 113, 21),
(282, 114, 24),
(283, 114, 18),
(284, 114, 21),
(285, 115, 65),
(286, 115, 21),
(287, 116, 66),
(288, 116, 65),
(289, 116, 21),
(290, 117, 66),
(291, 117, 65),
(292, 118, 66),
(293, 118, 65),
(294, 119, 66),
(295, 119, 65),
(296, 120, 66),
(297, 120, 65),
(298, 121, 66),
(299, 121, 65),
(300, 122, 66),
(301, 122, 65),
(302, 123, 66),
(303, 123, 65),
(304, 124, 66),
(305, 124, 65),
(306, 125, 62),
(307, 125, 66),
(308, 126, 60),
(309, 126, 62),
(310, 127, 60),
(311, 127, 62),
(312, 128, 60),
(313, 128, 62),
(314, 129, 60),
(315, 129, 62),
(316, 130, 60),
(317, 130, 62),
(318, 131, 60),
(319, 131, 62),
(320, 132, 60),
(321, 132, 62),
(322, 133, 60),
(323, 133, 62),
(324, 134, 60),
(325, 134, 62),
(326, 135, 59),
(327, 136, 77),
(440, 210, 16),
(329, 137, 78),
(330, 59, 81),
(335, 114, 78),
(360, 145, 58),
(357, 144, 56),
(342, 29, 70),
(343, 29, 71),
(344, 138, 70),
(345, 139, 73),
(346, 139, 74),
(347, 140, 56),
(348, 141, 64),
(349, 141, 21),
(350, 141, 16),
(351, 142, 74),
(352, 142, 75),
(353, 143, 74),
(354, 143, 75),
(382, 156, 72),
(383, 156, 75),
(439, 210, 17),
(403, 181, 75),
(402, 181, 72),
(401, 180, 75),
(400, 180, 72);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikat`
--

CREATE TABLE IF NOT EXISTS `tb_sertifikat` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `no_sertifikat` varchar(100) NOT NULL,
  `no_peserta` int(11) NOT NULL,
  `id_pilih_judul` int(100) NOT NULL,
  `tgl_sertifikat` varchar(20) NOT NULL,
  `id_instruktur` int(100) NOT NULL,
  `id_director` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `no_barcode` int(20) NOT NULL,
  `ket` text NOT NULL,
  `kerjasama` text NOT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_sertifikat`
--

INSERT INTO `tb_sertifikat` (`id_sertifikat`, `no_sertifikat`, `no_peserta`, `id_pilih_judul`, `tgl_sertifikat`, `id_instruktur`, `id_director`, `id_nilai`, `no_barcode`, `ket`, `kerjasama`) VALUES
(4, '2013/4/1/9', 97, 237, '2013-05-07', 6, 1, 38, 201341997, 'Dalam Rangka Pelaksanaan Program Non Fisik SMK ADB Invest 2011', 'SMK Negeri 1 SURABAYA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tamu`
--

CREATE TABLE IF NOT EXISTS `tb_tamu` (
  `id_tamu` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `baca` int(1) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_tamu`
--

INSERT INTO `tb_tamu` (`id_tamu`, `nama`, `email`, `telepon`, `topik`, `pesan`, `tanggal`, `baca`) VALUES
(9, 'Alfin Maulana Fikri', 'alfinspeed@yahoo.com', '099837298732', 'Biaya Training', 'Berapa training android?', 'Kamis, 25 April 2013', 0),
(10, 'Ogga Elfirra', 'ogga_oog@yahoo.com', '090893879879', 'IT Project Management', 'Instruktur siapa?', 'Kamis, 25 April 2013', 0),
(11, 'Wildan Anasrullah', 'wildan_99@yahoo.com', '082309283097', 'Sertifikat', 'Oracle indonesia itu pens juga atau tidak?', 'Kamis, 25 April 2013', 0),
(12, 'Pringgo Juni', 'odyinggo@gmail.com', '092837882763', 'Agenda android', 'Masih ada waktu?', 'Kamis, 25 April 2013', 0),
(13, 'Aji Tirta', 'aji_bejek@yahoo.com', '085827638762', 'Pendaftaran', 'Training windows 8 berapa biayanya? di agenda tidak ada.', 'Kamis, 25 April 2013', 0),
(15, 'Ppp', 'hg@jhgjh', '987', 'Ppp', 'Ppp', 'Kamis, 27 Juni 2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE IF NOT EXISTS `tb_tempat` (
  `id_tempat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id_tempat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `nama_tempat`, `ket`) VALUES
(17, 'Lab Komputer 1', 'Pens ITS gedung A'),
(16, 'Lab Komputer 2', 'Pens ITS gedung B'),
(12, 'Lab Komputer 3', 'pens ITS gedung C'),
(23, 'Lab Komputer 5', 'Pens ITS Gedung E'),
(24, 'Lab Database 1', 'Pens ITS Gedung A'),
(22, 'Lab Komputer 4', 'Pens ITS Gedung D'),
(25, 'Lab Database 2', 'Pens ITS Gedung B'),
(26, 'Lab Database 3', 'Pens ITS Gedung C'),
(27, 'Lab Database 4', 'Pens ITS Gedung D'),
(28, 'Lab Database 5', 'Pens ITS Gedung E\r\n'),
(33, 'Lab Sistem Informasi 1', 'Pens ITS Gedung A'),
(35, 'Lab Sistem Informasi 2', 'Pens ITS Gedung A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `akses` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user_name`, `password`, `akses`, `status`) VALUES
(1, 'admin', '0cc175b9c0f1b6a831c399e269772661', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
