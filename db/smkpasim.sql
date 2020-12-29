-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 01:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkpasim`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_reg` varchar(25) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `kode_pos_siswa` varchar(10) NOT NULL,
  `email_siswa` varchar(225) NOT NULL,
  `hp_siswa` varchar(15) NOT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_ijazah` varchar(100) NOT NULL,
  `no_skhun` varchar(100) NOT NULL,
  `verifikasi` enum('N','Y') NOT NULL,
  `nm_ayah` varchar(225) NOT NULL,
  `pekerjaan_ayah` varchar(225) NOT NULL,
  `pendidikan_ayah` varchar(10) NOT NULL,
  `nm_ibu` varchar(225) NOT NULL,
  `pekerjaan_ibu` varchar(225) NOT NULL,
  `pendidikan_ibu` varchar(10) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `kode_pos_ortu` varchar(10) NOT NULL,
  `hp_ortu` varchar(15) NOT NULL,
  `rat_rangking` varchar(10) NOT NULL,
  `rat_nilai_ijazah` double NOT NULL,
  `beasiswa` varchar(225) NOT NULL,
  `beasiswa_thn` year(4) NOT NULL,
  `minat` varchar(225) NOT NULL,
  `sekolah_asal` varchar(225) NOT NULL,
  `thn_msk_sekolah_asal` year(4) NOT NULL,
  `thn_lulus_sekolah_asal` year(4) NOT NULL,
  `alamat_sekolah_asal` text NOT NULL,
  `dapat_informasi` varchar(225) NOT NULL,
  `ijazah` varchar(225) NOT NULL,
  `kk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_reg`, `nisn`, `nm_siswa`, `id_jurusan`, `jenkel`, `tgl_lahir`, `tempat_lahir`, `agama`, `alamat_siswa`, `kode_pos_siswa`, `email_siswa`, `hp_siswa`, `foto_siswa`, `tgl_daftar`, `no_ijazah`, `no_skhun`, `verifikasi`, `nm_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `nm_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `alamat_ortu`, `kode_pos_ortu`, `hp_ortu`, `rat_rangking`, `rat_nilai_ijazah`, `beasiswa`, `beasiswa_thn`, `minat`, `sekolah_asal`, `thn_msk_sekolah_asal`, `thn_lulus_sekolah_asal`, `alamat_sekolah_asal`, `dapat_informasi`, `ijazah`, `kk`) VALUES
('PSB1811001', '01273847238472', 'Adnan Al-fariri Rahmat', '11', 'L', '2018-12-31', 'Sukabumi', 'Islam', 'jl.pelabuhan 2 km 7 lembursitu rt 01 rw 05 sukabumi jawa barataaaaaaaaaaaaaaaaaaaaaaaaaaa', '10', 'asdasdasd@mail.com', '01271', 'foto_siswa-PSB1811001.png', '2018-11-03', '1029', '10298', 'N', 'Ayah', 'pekerjaan ayah', 'SMA', 'ibu', 'pekerjaan ibu', 'SMP', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '21', '212', '1-5', 10, 'prestasi', 2001, 'Seni', 'Smp 3', 2001, 2010, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Brosur', 'ijazah-PSB1811001.png', 'kk-PSB1811001.png'),
('PSB1904003', '121132020003', 'LEDIA YUNITA SARI ', '12', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-04-09', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1904006', '0034225732', 'SILVIA WULANDARI', '12', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-04-13', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1905007', '0038554781', 'Maulani purnamasari', '10', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-05-14', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1905011', '0035707677', 'Lia Yuliana', '9', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-05-24', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1906012', '161707670040774476', 'Aufa Rafiqi Yunus', '8', 'L', '0000-00-00', '', '', '', '', '', '', '', '2019-06-12', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1906013', '0036457425', 'Bunga Ananda Desdhenyra', '12', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-06-16', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1906014', '0034124386', 'Elsa Triramdiani', '7', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-06-17', '', '', 'Y', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1906015', '0034124386', 'Elsa Triramdiani', '8', 'P', '0000-00-00', '', '', '', '', '', '', '', '2019-06-17', '', '', 'N', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1906016', '0038099168', 'TARISSYA NUR OCTAVIANA', '7', 'P', '2003-10-21', 'Sukabumi', 'Islam', 'Kp. Cikaret Jl.Goalpara RT 005 RW 001 , des. sukaraja , kec.Sukaraja, Kab.Sukabumi', '43192', 'nuroctavianatarissya@gmail.com', '089512105737', '', '2019-06-29', '420/277-SMP.01/V/2019', '420/277-SMP.01/V/2019', 'N', 'Hanafi Sastrasayudha ( Alm ) ', '- ', 'SARJANA', 'Tati Nuraeni', 'IRT', 'SARJANA', 'Kp. Cikaret Jl.Goalpara RT 005 RW 001 , des. sukaraja , kec.Sukaraja, Kab.Sukabumi', '43192', '081385007843', '1-5', 261, '-', 2019, 'Seni', 'SMPN 1 Kota Sukabumi ', 2017, 2019, 'Jl. Ir . H Juanda No. 6 , kota Sukabumi', 'Internet', '', ''),
('PSB1906017', '0050550480', 'AHMAD ZIRIEL RUSLINANDA', '8', 'L', '2003-09-26', 'Pekanbaru', 'Islam', 'Jl.bhayangkara 177\r\nRt:04 Rw:08, karamat, gunung puyuh, \r\nKota sukabumi', '43122', 'sy3ch88@gmail.com', '083811786999', '', '2019-06-29', '420/277-SMP.01/V/2019', '186', 'N', 'THAUFIK QUROHMAN', 'Wiraswasta', 'SMA', 'LINDA WINDASARI YUNIZAR', 'Ibu rumah tangga', 'SMA', 'Jl.bhayangkara 177\r\nRt:04 Rw:08, karamat, gunung puyuh, \r\nKota sukabumi', '43122', '081317261718', '11-20', 0, '', 0000, 'Olahraga', 'SMPN 1 KOTA SUKABUMI', 2015, 2019, 'Jalan ir.H juanda No:6 kota sukabumi', 'Internet', '', 'kk-PSB1906017.jpg'),
('PSB1906018', '0045644426', 'Wafda Firdaus Sofyan', '9', 'L', '0000-00-00', '', '', '', '', '', '', '', '2019-06-30', '', '', 'N', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1907019', '1234567890', 'satria wibisono', '10', 'L', '0000-00-00', '', '', '', '', '', '', '', '2019-07-04', '', '', 'N', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', ''),
('PSB1907020', '12596380005', 'Jono kartono', '12', 'L', '0000-00-00', '', '', '', '', '', '', '', '2019-07-30', '', '', 'N', '', '', '', '', '', '', '', '', '', '', 0, '', 0000, '', '', 0000, 0000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seting`
--

CREATE TABLE `seting` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `moto` varchar(500) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `sambutan` text NOT NULL,
  `kepsek` varchar(250) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `header` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `telp` varchar(250) NOT NULL,
  `ig` varchar(250) NOT NULL,
  `twit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seting`
--

INSERT INTO `seting` (`id`, `nama`, `moto`, `deskripsi`, `alamat`, `sambutan`, `kepsek`, `foto`, `logo`, `header`, `email`, `fb`, `telp`, `ig`, `twit`) VALUES
(1, 'SMK', 'Motto ', 'Sekolah smk Paling Oke                        ', 'Jalan ', '<p>Kepala Sekolah Kitu Weh</p>\r\n', 'Nama  Kepsek', 'kepsek1.jpg', 'logo1.png', 'logo21.png', 'email@gmail.com', 'https://web.facebook.com/', '082316590047', 'https://www.instagram.com/a', 'https://twitter.com/t');

-- --------------------------------------------------------

--
-- Table structure for table `setup_slide`
--

CREATE TABLE `setup_slide` (
  `id_slide` int(5) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `setup_slide`
--

INSERT INTO `setup_slide` (`id_slide`, `judul`, `gambar`, `deskripsi`) VALUES
(13, 'Welcome1', '131.jpg', 'SMK JAMPANG KULON'),
(14, 'Welcome2', '141.jpg', 'SMK JAMPANG KULON'),
(15, 'Welcome3', '15.jpg', 'aaaa'),
(17, 'Welcome5', '17.jpg', 'aa'),
(18, 'Welcome6', 'Welcome6.jpg', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `id_berita` char(10) NOT NULL,
  `id_ktg_berita` int(5) NOT NULL,
  `tgl_input` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `iduser` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`id_berita`, `id_ktg_berita`, `tgl_input`, `gambar`, `judul`, `konten`, `slug`, `iduser`) VALUES
('BRT0001', 1, '2018-10-16', 'BRT00016.jpg', 'SMK Bisa, SMK Pasim Luar Biasa', '<p>SUKABUMIUPDATE.COM - SMK Pengembangan Sistem Informasi dan Manajemen (Pasim) Plus Sukabumi merupakan salah satu sekolah SMK swasta favorit di Kota Sukabumi. Hal tersebut dibuktikan dengan banyaknya lulusan SMP yang berminat belajar di sekolah yang beralamat di Jalan Prana No. 8A Kota Sukabumi.</p>\r\n\r\n<p>Kendati&nbsp; baru berdiri di tahun 2011, SMK Pasim Plus telah terakreditasi A (amat baik), dengan jumlah siswa yang terdaftar mencapai 426 siswa. Meskipun SMK Pasim Plus merupakan SMK swasta, sekolah yang berada dibawah pembinaan Universitas Nasional Pasim Bandung itu, memiliki standar khusus untuk calon siswa baru. Tapi perlu di ingat, standar yang diterapkan di SMK Pasim Plus bukanlah standar tes masuk, melainkan tes kepribadian (psikotes) untuk pemilihan paket keahlian, yang sesuai dengan karakter, bakat, dan minat siswa.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kita sengaja ada Psikotest dengan tujuan agar siswa nyaman dalam kondisi belajar, mereka tidak lagi harus terpaksa apalagi sampai terbebani saat mereka menerima pelajaran. Tidak hanya murid, calon guru yang akan mengajar di sini pun kami lakukan psikotest juga,kata Kepala Sekolah SMK Pasim Plus saat diwawancara, Senin, (01/08).</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SMK Pasim Plus Sukabumi menyediakan enam paket keahlian, yaitu administrasi perkantoran, rekayasa perangkat lunak, Teknik Komputer Jaringan (TKJ), Akuntasi, Teknik <em>Broadcasting</em>, dan film animasi.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Enam jurusan yang ditawarkan SMK Pasim Plus tersebut ditunjang dengan fasilitas yang memadai, seperti ruang belajar berbasis audio visual, laboratorium komputer, perpustakaan, <em>representatif class</em>, <em>live streaming</em>, Pasim <em>information center</em>, kolam renang, futsal<em> indoor</em>, basket <em>ball</em>, <em>hotspot area, outbond area</em>, kantin sehat, sarana ibadah, ruang UKS, ruang ekstrakulikuler, dengan ekstrakurikuler kabaret, pramuka, paskibraka, basket, dan renang.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Berbicara mengenai prestasi, SMK Pasim Plus banyak meraih juara di beberapa ajang perlombaan, baik di tingkat Kota/Kabupaten, Provinsi, dan Nasional. Yaitu juara I Festival Film Pelajar Yogyakarta tingkat Nasional 2013, <em>the best schooler movie</em> Tasikmalaya tingkat Nasional 2013, juara I <em>indie movie </em>festival Sukabumi kreatif 2013, juara II LKS Animasi Kota Sukabumi 2013.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Juara III LKS <em>Web Design </em>Kota Sukabumi 2013, juara III LKS <em>Design Grafis </em>Kota Sukabumi 2013, juara III Anggar Sable Kejurda Jawa Barat 2013, juara II LKBB Paskibra tingkat Kota/Kab Sukabumi 2013, juara III <em>website</em> tingkat Provinsi Jawa Barat 2012, juara II LKS Bahasa Inggris Kota Sukabumi 2012, juara II LKS Bahasa Jepang Kota Sukabumi 2012, juara II LKS <em>Web Design</em> Kota sukabumi 2012, <em>the best concept</em> lomba foto Kota Sukabumi 2012, dan lain sebagainya.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SMK yang berdiri atas empat pilar itu, yakni <em>best lecture</em>, <em>best curriculum</em>, <em>best facilities</em>, dan <em>best service</em>, hingga saat ini memiliki pegawai dan guru berjumlah 60 orang, di mana sebagai besar tenaga pengajarnya merupakan praktisi yang ahli dibidangnya masing-masing.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SMK Pasim Plus Sukabumi sendiri, hanya menerima 35 siswa untuk masing-masing jurusan setiap tahunnya, dan lebih mengedepankan praktik langsung dalam proses belajar mengajar. Kini, sebagian besar alumni SMK Pasim Plus Sukabumi telah tersebar di perusahaan-perusahaan besar di Kota Sukabumi&nbsp; dan dibeberapa universitas ternama Indonesia.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mari bergabung bersama kami untuk menjadi generasi penerus yang lebih baik, yang bisa memberikan manfaat bagi kehidupan, SMK bisa, SMK Pasim luar biasa, ajak Dian Romdiani penuh semangat.</p>\r\n', '263214-smk-bisa-smk-pasim-luar-biasa', 0),
('BRT0002', 1, '2018-10-18', 'BRT00025.jpg', 'Siswa SMK PASIM', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '203521-siswa-smk-pasim', 0),
('BRT0003', 1, '2018-10-18', 'BRT00034.jpg', 'PASKIBRAKA 2018', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo&nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '829498-paskibraka-2018', 0),
('BRT0004', 1, '2018-10-18', 'BRT00044.jpg', 'Menjaga Lingkungan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '213928-menjaga-lingkungan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbberita_kategori`
--

CREATE TABLE `tbberita_kategori` (
  `id_ktg_berita` int(5) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `slug_kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbberita_kategori`
--

INSERT INTO `tbberita_kategori` (`id_ktg_berita`, `kategori`, `slug_kat`) VALUES
(1, 'sekolah', '1680-sekolah'),
(3, 'pendaftaran', '7040-pendaftaran'),
(5, 'UNBK', '7689-unbk');

-- --------------------------------------------------------

--
-- Table structure for table `tbgaleri`
--

CREATE TABLE `tbgaleri` (
  `id_galeri` char(10) NOT NULL,
  `id_ktg_galeri` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbgaleri`
--

INSERT INTO `tbgaleri` (`id_galeri`, `id_ktg_galeri`, `tgl`, `deskripsi`, `gambar`) VALUES
('GLR0001', 2, '2018-10-18', 'Teaching Factory', 'GLR00014.jpg'),
('GLR0002', 2, '2018-10-18', 'Teaching Factory', 'GLR00021.jpg'),
('GLR0003', 2, '2018-10-18', 'Teaching Factory', 'GLR00031.jpg'),
('GLR0004', 2, '2018-10-18', 'Teaching Factory', 'GLR00041.jpg'),
('GLR0005', 2, '2018-10-18', 'Teaching Factory', 'GLR00051.jpg'),
('GLR0006', 2, '2018-10-18', 'Teaching Factory', 'GLR00061.jpg'),
('GLR0007', 2, '2018-10-18', 'Teaching Factory', 'GLR00071.jpg'),
('GLR0008', 2, '2018-10-18', 'Teaching Factory', 'GLR00081.jpg'),
('GLR0009', 2, '2018-10-18', 'Teaching Factory', 'GLR0009.jpg'),
('GLR0010', 2, '2018-10-18', 'Teaching Factory', 'GLR0010.jpg'),
('GLR0011', 2, '2018-10-18', 'Teaching Factory', 'GLR0011.jpg'),
('GLR0012', 2, '2018-10-18', 'Teaching Factory', 'GLR0012.jpg'),
('GLR0013', 3, '2018-10-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'GLR0013.jpg'),
('GLR0014', 4, '2018-10-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore', 'GLR0014.jpg'),
('GLR0001', 2, '2018-12-13', 'foto tefa', 'GLR0001.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbgaleri_kategori`
--

CREATE TABLE `tbgaleri_kategori` (
  `id_ktg_galeri` int(5) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbgaleri_kategori`
--

INSERT INTO `tbgaleri_kategori` (`id_ktg_galeri`, `kategori`) VALUES
(2, 'TEFA'),
(3, '17-Agustus-an'),
(4, 'MPLS-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbguru`
--

CREATE TABLE `tbguru` (
  `id_guru` char(10) NOT NULL,
  `nm_guru` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `mapel` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbguru`
--

INSERT INTO `tbguru` (`id_guru`, `nm_guru`, `alamat`, `foto`, `mapel`) VALUES
('GR0001', 'Devi Kunaefi, S.Pd', 'aa', '20180820093501_IMG_9326.jpg', 'PAI'),
('GR0002', 'Tatang Erwanto, AMd', 'aa', '20180820092056_IMG_9300.jpg', 'Matematika'),
('GR0003', 'Fitriyani, S.Pd', 'aa', '20180820092203_IMG_9305.jpg', 'Bahasa Indonesia'),
('GR0004', 'Ratna Siti Nurhayati, S.Pd', 'aa', '20180820092956_IMG_9315.jpg', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `tbhackel`
--

CREATE TABLE `tbhackel` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `protocol` varchar(50) NOT NULL,
  `port` varchar(50) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `cookie` varchar(50) NOT NULL,
  `hostname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbhackel`
--

INSERT INTO `tbhackel` (`id`, `ip`, `protocol`, `port`, `agent`, `ref`, `cookie`, `hostname`) VALUES
(8, '182.253.78.186', 'HTTP/1.1', '49218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login/aksi_log', '', 'ezioark.com'),
(9, '36.90.254.97', 'HTTP/1.1', '45412', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1803) AppleW', 'https://smkpasimplus.sch.id/login', '', '36.90.254.97'),
(10, '36.90.254.97', 'HTTP/1.1', '45496', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 'https://smkpasimplus.sch.id/backend/login', '', '36.90.254.97'),
(11, '116.206.14.33', 'HTTP/1.1', '49614', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A) Apple', 'https://smkpasimplus.sch.id/login', '', 'subs30-116-206-14-33.three.co.id'),
(12, '116.206.14.33', 'HTTP/1.1', '60811', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A) Apple', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(13, '116.206.14.33', 'HTTP/1.1', '60811', 'Mozilla/5.0 (Linux; Android 8.1.0; Redmi 5A) Apple', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(14, '116.206.14.33', 'HTTP/1.1', '60820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(15, '116.206.14.33', 'HTTP/1.1', '60820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(16, '116.206.14.33', 'HTTP/1.1', '60820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(17, '116.206.14.33', 'HTTP/1.1', '60820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(18, '116.206.14.33', 'HTTP/1.1', '60820', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/Login', '', 'subs30-116-206-14-33.three.co.id'),
(19, '116.206.14.33', 'HTTP/1.1', '49624', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login/aksi_log', '', 'subs30-116-206-14-33.three.co.id'),
(20, '116.206.14.33', 'HTTP/1.1', '49633', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(21, '116.206.14.33', 'HTTP/1.1', '49633', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', 'subs30-116-206-14-33.three.co.id'),
(23, '182.253.162.52', 'HTTP/1.1', '15793', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/login', '', '182.253.162.52'),
(24, '182.253.162.52', 'HTTP/1.1', '15793', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'https://smkpasimplus.sch.id/backend/login', '', '182.253.162.52'),
(25, '::1', 'HTTP/1.1', '52435', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 'http://localhost/smkpasim/backend/login', '', 'DESKTOP-VGB1CCE');

-- --------------------------------------------------------

--
-- Table structure for table `tbjurusan`
--

CREATE TABLE `tbjurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nm_jurusan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `slug` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbjurusan`
--

INSERT INTO `tbjurusan` (`id_jurusan`, `nm_jurusan`, `deskripsi`, `gambar`, `slug`) VALUES
(7, 'Administrasi Perkatoran', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Administrasi_Perkatoran6.jpg', '362609'),
(9, 'Film Animasi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Film_Animasi.jpg', '781005'),
(10, 'Teknik Komputer dan Jaringan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Teknik_Komputer_dan_Jaringan1.jpg', '320068'),
(11, 'Rekayasa Perangkat Lunak', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non&nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'Rekayasa_Perangkat_Lunak.jpg', '389190');

-- --------------------------------------------------------

--
-- Table structure for table `tbprestasi`
--

CREATE TABLE `tbprestasi` (
  `id_prestasi` int(11) NOT NULL,
  `nm_prestasi` varchar(100) NOT NULL,
  `ke` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbprestasi`
--

INSERT INTO `tbprestasi` (`id_prestasi`, `nm_prestasi`, `ke`, `gambar`, `deskripsi`, `tgl_input`) VALUES
(1, 'Satu Siswa Lolos Sebagai PASKIBRA Kota Sukabumi', '0', 'DSCF8042.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-10-18'),
(2, 'LKS Tingkat Provinsi Jawa Barat', '0', 'IMG-20181017-WA0002.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-10-20'),
(3, 'Tim Basket Puteri Juara I Tingkat SMK - KOKAB 2017', '1', 'IMG-20171024-WA0009.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-10-18'),
(4, 'Juara III LKS Bidang Animasi', '3', 'IMG-20171017-WA0002.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbprofil`
--

CREATE TABLE `tbprofil` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `slug` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbprofil`
--

INSERT INTO `tbprofil` (`id`, `judul`, `deskripsi`, `slug`) VALUES
(5, 'Profil SMK ', '<ol>\r\n	<li><strong><strong>IDENTITAS SEKOLAH</strong></strong><br />\r\n	<strong>&nbsp;</strong><br />\r\n	Nama Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: SMK PASIM PLUS SUKABUMI<br />\r\n	NSS/ NPSN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 323026204005/ 20270889<br />\r\n	Alamat Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jl. Prana No. 8 Cikole-Sukabumi.<br />\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp. (0266) 241000 / HP. 085798989000<br />\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : smkspasimplus2011@gmail.com&nbsp;<br />\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Website : smkpasimplus.sch.id<br />\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provinsi Jawa Barat.<br />\r\n	Status Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Swasta<br />\r\n	Izin Operasional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 800/063/KEP KADISDIK/IX/2011<br />\r\n	<strong>&nbsp;</strong><br />\r\n	<strong>&nbsp;</strong></li>\r\n	<li><strong><strong>IDENTITAS KEPALA SEKOLAH</strong></strong><br />\r\n	<strong>&nbsp;</strong><br />\r\n	Nama Kepala Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Dian Romdiani, M.Pd.<br />\r\n	Tempat Tanggal lahir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jakarta, 07 Oktober 1973<br />\r\n	Pendidikan Terakhir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : S2 Manajemen Pendidikan<br />\r\n	No. KTP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 3272024710730901<br />\r\n	SK Yang mengangkat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Ketua Yayasan Pasim Plus Sukabumi<br />\r\n	No. SK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 021/SK/YAPASIM/XI/2015<br />\r\n	Nomor Induk Yayasan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 2012.05.01.027<br />\r\n	Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 30 November 2015<br />\r\n	Rekening Bank Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Bank Jabar Banten<br />\r\n	No. rekening&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 0030004833100</li>\r\n</ol>\r\n', '6973-profil-smk'),
(7, 'Visi Misi', '<p><strong>VISI</strong></p>\r\n\r\n<p>Menjadi Sekolah Menengah Kejuruan berstandar Nasional dan Internasional untuk menghantarkan peserta didik menjadi tamatan yang mampu mengembangkan sikap Profesional, Bebudi Luhur dan mampu berkompetisi secara Global melalui pelayanan profesional dan berkualitas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MISI</strong></p>\r\n\r\n<p>1.&nbsp; Menghasilkan tamatan yang memiliki ketaqwaan yang tinggi kepada Tuhan Yang Maha Esa.</p>\r\n\r\n<p>2.&nbsp; Menghasilkan tamatan yang memiliki kompetensi tinggi, mampu bersaing di pasar tenaga</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; kerja Nasional dan Internasional.</p>\r\n\r\n<p>3.&nbsp; Menghasilkan tamatan yang mampu memenuhi tuntutan ilmu pengetahuan dan teknologi</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; sebagai bekal untuk mengembangkan dirinya.</p>\r\n\r\n<p>4.&nbsp; Menyelenggarakan pendidikan dan pelatihan di bidang teknologi dan bisnis manajemen bagi</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; masyarakat.</p>\r\n\r\n<p>5.&nbsp; Menyelenggarakan proses belajar mengajar dengan mengedepankan pembentukan karakter</p>\r\n', '8079-visi-misi'),
(8, 'Sejarah Singkat', '<p>Universitas Nasional Pasim berawal dari Sekolah Tinggi Bahasa Asing Puragabaya (STBA Puragabaya) pada Tahun 1991, dan Sekolah Tinggi Ilmu Ekonomi Nasional (STIENAS) pada tahun 1997. Pada tahun 2000 untuk memenuhi kebutuhan dunia industri dan masyarakat STIENAS dan STBA Puragabaya dikembangkan menjadi Universitas Nasional Bandung (UNB). Pada Tahun 2007 UNB dikelola oleh manajemen baru yang lebih professional serta berubah namanya menjadi Universitas Nasional PASIM (Unas PASIM). Melihat dari perkembangan dunia industri pada saat ini banyak membutuhkan tenaga operator dari SMK, maka Unas PASIM terinspirasi untuk membuka SMK PASIM PLUS di Sukabumi.</p>\r\n\r\n<p>&nbsp;&nbsp;</p>\r\n\r\n<p>Pendidikan memegang peranan yang sangat penting untuk menjamin kelangsungan hidup negara dan bangsa, Maka Pada bulan Februari tahun 2011 dibuka SMK PASIM PLUS Sukabumi yang ada dibawah naungan UNAS PASIM Bandung untuk memenuhi kebutuhan dunia pendidikan khususnya pendidikan kejuruan untuk meningkatkan dan mengembangkan kualitas sumber daya manusia. Undang-undang No. 20 tahun 2003 tentang Sistem Pendidikan Nasional menyatakan bahwa tujuan pendidikan adalah&ldquo; agar menjadi manusia yang beriman dan bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, sehat, berilmu, cakap, kreatif, mandiri, dan menjadi warga negara yang demokratis serta bertanggung jawab&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Melihat kondisi sekarang dan akan datang, ketersediaan SDM yang memiliki kemampuan paripurna seperti dimaksud dalam UU tersebut merupakan kebutuhan yang amat vital. Ini harus dilakukan untuk mempersiapkan tantangan global dan daya saing bangsa saat ini sehingga diperlukan lahirnya umat yang mandiri dan berkepribadian yang berlandaskan pada identitas dan kemampuan diri dan semuanya harus ditopang dengan integritas moral yang tinggi. Sehingga SDM ideal tersebut dapat memberikan kontribusi positif yang signifikan terhadap pembangunan ekonomi bangsa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hampir semua negara, tak terkecuali Indonesia, sangat berkepentingan terhadap peningkatan pertumbuhan ekonominya. Pertumbuhan ekonomi tinggi diyakini mencerminkan peningkatan kesejahteraan masyarakat. Untuk mening- katkan pertumbuhan ekonominya, strategi yang dianggap efektif adalah dengan melakukan industrialisasi. Industrialisasi, pada derajat tertentu, mengimplikasikan pergeseran proses produksi dari <em>labouring</em> menjadi <em>manufacturing</em> dalam arti tenaga kerja manusia tergantikan oleh <em>hard technology</em>. Ini berarti industrialisasi membutuhkan tenaga-tenaga kerja terampil <em>(</em><em>skilled workers</em><em>)</em> yang tidak hanya mampu mengoperasikan teknologi tersebut, melainkan juga memeliharanya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Industrialisasi juga berpotensi menciptakan pengangguran jika pergeseran proses produksi tersebut tidak dibarengi dengan perubahan orientasi pendidikan dari akademis menjadi vokasional. Oleh karena, dalam rangka menunjang pertumbuhan ekonomi, pendidikan semacam SMK, menjadi penting.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Berlandaskan pada pemikiran diatas, maka Yayasan Pengembangan Sistem Informasi Manajemen (YAPASIM) Sukabumi bermaksud mendirikan Sekolah Menengah Kejuruan Swasta (SMKS) PASIM PLUS dengan Bidang Keahlian:</p>\r\n\r\n<p>1.&nbsp;&nbsp; Teknologi Informasi dan Komunikasi<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Program Keahlian:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.&nbsp; Rekayasa Perangkat Lunak</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b.&nbsp; Teknik Komputer Jaringan</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c.&nbsp;&nbsp;Broadcasting TV</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d.&nbsp; Film Animasi</p>\r\n\r\n<p>2.&nbsp;&nbsp;&nbsp;Bisnis Manajemen dan Keuangan<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Program Keahllian:</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a.&nbsp; Administrasi Perkantoran</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b.&nbsp; Akuntansi</p>\r\n', '7237-sejarah-singkat');

-- --------------------------------------------------------

--
-- Table structure for table `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(2) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbstream`
--

CREATE TABLE `tbstream` (
  `id` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbstream`
--

INSERT INTO `tbstream` (`id`, `judul`, `link`) VALUES
(1, 'SEKOLAH KU', 'https://www.youtube.com/embed/b-zplVztmWI');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(5) NOT NULL,
  `u` varchar(20) NOT NULL,
  `p` varchar(250) NOT NULL,
  `namalengkap` varchar(35) NOT NULL,
  `level` enum('Admin','Super Admin') NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `u`, `p`, `namalengkap`, `level`, `log`) VALUES
(5, 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'Admin SMK PASIM', 'Super Admin', '2020-06-07 05:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbvideo`
--

CREATE TABLE `tbvideo` (
  `id_video` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link_video` varchar(250) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbvideo`
--

INSERT INTO `tbvideo` (`id_video`, `title`, `link_video`, `tgl`) VALUES
(3, 'Profil', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b-zplVztmWI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>\n', '2018-10-08'),
(4, 'Profil2', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/b-zplVztmWI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', '2018-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `tefa_galeri`
--

CREATE TABLE `tefa_galeri` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(191) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tefa_kegiatan`
--

CREATE TABLE `tefa_kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(191) NOT NULL,
  `des` text NOT NULL,
  `slug` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tefa_kegiatan`
--

INSERT INTO `tefa_kegiatan` (`id`, `judul`, `tgl`, `foto`, `des`, `slug`) VALUES
(3, 'Tefa RPL', '0021-12-12', '623960-Tefa_RPL.png', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\n&nbsp;&nbsp; &nbsp;tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\n&nbsp;&nbsp; &nbsp;quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\n&nbsp;&nbsp; &nbsp;consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\n&nbsp;&nbsp; &nbsp;cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\n&nbsp;&nbsp; &nbsp;proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '463058-tefa-rpl');

-- --------------------------------------------------------

--
-- Table structure for table `tefa_konten`
--

CREATE TABLE `tefa_konten` (
  `id_tefa` int(11) NOT NULL,
  `foto` text NOT NULL,
  `judul` varchar(191) NOT NULL,
  `tgl` date NOT NULL,
  `des` text NOT NULL,
  `slug` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tefa_konten`
--

INSERT INTO `tefa_konten` (`id_tefa`, `foto`, `judul`, `tgl`, `des`, `slug`) VALUES
(1, '154422-Tefa_RPL.png', 'Pengertian', '0212-12-12', '<p><br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '938583-pengertian'),
(2, '912492-Manfaat.png', 'Manfaat', '1211-03-12', '<p><br />\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '381240-manfaat');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_masuk`
--

CREATE TABLE `ujian_masuk` (
  `no_ujian` varchar(10) NOT NULL,
  `no_reg` varchar(15) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `hasil` double NOT NULL,
  `ket_ujian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_reg`) USING BTREE;

--
-- Indexes for table `seting`
--
ALTER TABLE `seting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup_slide`
--
ALTER TABLE `setup_slide`
  ADD PRIMARY KEY (`id_slide`) USING BTREE;

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`id_berita`) USING BTREE;

--
-- Indexes for table `tbberita_kategori`
--
ALTER TABLE `tbberita_kategori`
  ADD PRIMARY KEY (`id_ktg_berita`) USING BTREE;

--
-- Indexes for table `tbgaleri_kategori`
--
ALTER TABLE `tbgaleri_kategori`
  ADD PRIMARY KEY (`id_ktg_galeri`) USING BTREE;

--
-- Indexes for table `tbguru`
--
ALTER TABLE `tbguru`
  ADD PRIMARY KEY (`id_guru`) USING BTREE;

--
-- Indexes for table `tbhackel`
--
ALTER TABLE `tbhackel`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  ADD PRIMARY KEY (`id_jurusan`) USING BTREE;

--
-- Indexes for table `tbprestasi`
--
ALTER TABLE `tbprestasi`
  ADD PRIMARY KEY (`id_prestasi`) USING BTREE;

--
-- Indexes for table `tbprofil`
--
ALTER TABLE `tbprofil`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`nis`) USING BTREE;

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`) USING BTREE;

--
-- Indexes for table `tbvideo`
--
ALTER TABLE `tbvideo`
  ADD PRIMARY KEY (`id_video`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seting`
--
ALTER TABLE `seting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_slide`
--
ALTER TABLE `setup_slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbberita_kategori`
--
ALTER TABLE `tbberita_kategori`
  MODIFY `id_ktg_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbgaleri_kategori`
--
ALTER TABLE `tbgaleri_kategori`
  MODIFY `id_ktg_galeri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbhackel`
--
ALTER TABLE `tbhackel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbjurusan`
--
ALTER TABLE `tbjurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbprestasi`
--
ALTER TABLE `tbprestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbprofil`
--
ALTER TABLE `tbprofil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbvideo`
--
ALTER TABLE `tbvideo`
  MODIFY `id_video` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
