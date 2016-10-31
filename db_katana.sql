-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2015 pada 10.19
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_katana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `namaAd` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `hpAd` varchar(12) NOT NULL,
  `alamatAd` varchar(50) NOT NULL,
  `pekerjaanAd` varchar(50) NOT NULL,
  `id_karangtaruna` int(11) NOT NULL,
  `dataShow` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_admin`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `namaAd`, `username`, `password`, `hpAd`, `alamatAd`, `pekerjaanAd`, `id_karangtaruna`, `dataShow`) VALUES
(1, 'Rochmad Widianto', 'rochmad', '25d55ad283aa400af464c76d713c07ad', '085725655554', 'Karangkundi', 'Mahasiswa', 1, 0),
(2, 'Klaten', 'klaten', '9aa0444991b878cf6229d0fad17360d7', '089787878787', 'Klaten', 'Mahasiswa', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(500) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `ringkasan` text NOT NULL,
  `isi` text NOT NULL,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show, 0 Hide',
  `tanggal` date NOT NULL,
  `id_karangtaruna` int(11) NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `slug` (`slug`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `slug`, `ringkasan`, `isi`, `dataShow`, `tanggal`, `id_karangtaruna`) VALUES
(2, 'Percobaannn', 'Percobaan', 'Percobaannn', 'Percobaannn', 1, '2020-09-02', 1),
(6, 'judul', 'alug', 'ring', 'isi', 1, '2015-01-31', 1),
(7, 'wq', 'dwq', 'wdq', 'qdw', 0, '2015-09-23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(99) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan` text NOT NULL,
  `id_karangtaruna` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `user`, `waktu`, `pesan`, `id_karangtaruna`) VALUES
(1, 'ivan2', '2015-09-09 05:18:28', 'Selamat siang', 1),
(2, 'ivan2', '2015-09-09 05:18:40', 'Apa kabar', 1),
(3, 'ivan2', '2015-09-17 05:12:11', 'test', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karangtaruna`
--

CREATE TABLE IF NOT EXISTS `karangtaruna` (
  `id_karangtaruna` int(11) NOT NULL AUTO_INCREMENT,
  `namaKt` varchar(50) NOT NULL,
  `alamatKt` varchar(50) NOT NULL,
  `tentangKt` varchar(250) NOT NULL,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show, 0 Hide',
  PRIMARY KEY (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `karangtaruna`
--

INSERT INTO `karangtaruna` (`id_karangtaruna`, `namaKt`, `alamatKt`, `tentangKt`, `dataShow`) VALUES
(1, 'Cendrawasih', 'Kapungan', 'Generasi Muda Penerus Bangsa', 0),
(2, 'Klaten', 'Klaten', 'Klaten Klaten Klaten', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kt_anggota`
--

CREATE TABLE IF NOT EXISTS `kt_anggota` (
  `idAgg` int(5) NOT NULL AUTO_INCREMENT,
  `namaAgg` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agamaAgg` varchar(11) NOT NULL,
  `ttlAgg` date NOT NULL,
  `alamatAgg` varchar(50) NOT NULL,
  `hpAgg` varchar(15) NOT NULL,
  `statusAgg` varchar(10) NOT NULL,
  `pekerjaanAgg` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `fotoAgg` varchar(250) NOT NULL,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show , 0 Hide',
  `id_karangtaruna` int(11) NOT NULL,
  PRIMARY KEY (`idAgg`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `kt_anggota`
--

INSERT INTO `kt_anggota` (`idAgg`, `namaAgg`, `jk`, `agamaAgg`, `ttlAgg`, `alamatAgg`, `hpAgg`, `statusAgg`, `pekerjaanAgg`, `username`, `password`, `email`, `active`, `fotoAgg`, `dataShow`, `id_karangtaruna`) VALUES
(2, 'Ivan Aditya Nugraha gitu', '1', '1', '2015-09-09', 'Polanharjoo', '086123456777', '2', 'Pelajar b', 'ivan2', '25d55ad283aa400af464c76d713c07ad', 'rochmad_widianto@yahoo.com', 1, 'Alamsyah_Rauf__Circle_for_togetherness_11467.jpg', 0, 2),
(3, 'Klaten Klaten', '1', '1', '2015-09-10', 'Klaten', '09876890776', '1', 'Mahasiswa', 'rochmad', 'ebecf868c14c5f88146da2608a1feed2', 'rochmad_widianto@yahoo.com', 0, '', 1, 2),
(4, 'Klaten Klaten', '1', '1', '2015-09-03', 'Klaten', '', '1', '', 'rochmad', 'ebecf868c14c5f88146da2608a1feed2', '', 1, '', 1, 2),
(5, 'lengkap', '2', '1', '2014-12-31', 'sini', '06456457667', '1', 'tani', 'rochmad', 'ebecf868c14c5f88146da2608a1feed2', 'email@mail.com', 0, 'Adam_Szathmary-Kiraly_EFIAPb_The_Trumpeter_8555.jpg', 0, 2),
(6, 'lengkap', '2', '2', '2014-12-31', 'sini', '06456457667', '1', 'tani', 'rochmad', '827ccb0eea8a706c4c34a16891f84e7b', 'email@mail.com', 0, 'Adam_Szathmary-Kiraly_EFIAPb_The_Trumpeter_85551.jpg', 0, 1),
(7, 'lengkap', '2', '2', '2014-12-31', 'sini', '06456457667', '1', 'tani', 'rochmadr', '912ec803b2ce49e4a541068d495ab570', 'email@mail.com', 0, 'Adam_Szathmary-Kiraly_EFIAPb_The_Trumpeter_85552.jpg', 0, 1),
(8, 'lengkap', '2', '2', '2014-12-31', 'sini', '06456457667', '1', 'tani', 'rochmadr', '92bb94f6ffcc38875d3faa8c54ef3944', 'email@mail.com', 0, 'Adam_Szathmary-Kiraly_EFIAPb_The_Trumpeter_85553.jpg', 0, 1),
(9, 'lengkaprrr', '1', '1', '2017-12-31', 'siniii', '06456457667', '1', 'tani', 'rochmadr', '25d55ad283aa400af464c76d713c07ad', 'fendys7@gmail.com', 0, 'Adhy_Gunawan__Lighthouse_12634.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kt_kegiatan`
--

CREATE TABLE IF NOT EXISTS `kt_kegiatan` (
  `idKeg` int(11) NOT NULL AUTO_INCREMENT,
  `namaKeg` varchar(100) NOT NULL,
  `deskripsiKeg` varchar(250) NOT NULL,
  `tanggalKeg` date NOT NULL,
  `id_karangtaruna` int(11) NOT NULL,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show, 0 Hide',
  PRIMARY KEY (`idKeg`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kt_kegiatan`
--

INSERT INTO `kt_kegiatan` (`idKeg`, `namaKeg`, `deskripsiKeg`, `tanggalKeg`, `id_karangtaruna`, `dataShow`) VALUES
(1, 'Peringatan Kemerdekaan Indonesia', 'Hari kemerdekaan Indonesia yang ke - 70 akan diadakan lomba pentas seni.', '2015-08-17', 1, 1),
(2, 'Karang Taruna Edit', 'Edit Kegiatan karang taruna untuk memeriahkan malam pergantian tahun 2014-2015', '2016-12-31', 1, 1),
(3, 'Kegiatan Klaten', 'Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten Kegiatan Klaten ', '2015-09-09', 2, 0),
(4, 'wdq', 'qd', '2015-09-17', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  `tgl` datetime NOT NULL,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show, 0 Hide',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`, `tgl`, `dataShow`) VALUES
(1, 'Rochmad Widianto', 'widiantorochmad@gmail.com', 'Sistemnya OKE', '2015-09-04 14:54:20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `user`, `password`) VALUES
(2, 'jamal', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'admin', '0192023a7bbd73250516f069df18b500'),
(4, 'rochmad', '9911efafbb28cde33eb46b12ec67b1af');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `tanya` varchar(255) NOT NULL,
  `op_1` varchar(200) NOT NULL,
  `op_2` varchar(200) NOT NULL,
  `op_3` varchar(200) NOT NULL,
  `op_4` varchar(200) NOT NULL,
  `j_1` int(3) NOT NULL,
  `j_2` int(3) NOT NULL,
  `j_3` int(3) NOT NULL,
  `j_4` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `poll`
--

INSERT INTO `poll` (`id`, `tanya`, `op_1`, `op_2`, `op_3`, `op_4`, `j_1`, `j_2`, `j_3`, `j_4`) VALUES
(1, 'Bagaimana desain website ini?', 'Sangat Baik', 'Baik', 'Cukup', 'Kurang', 11, 9, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_uploadimage`
--

CREATE TABLE IF NOT EXISTS `tb_uploadimage` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nm_gbr` varchar(35) DEFAULT NULL,
  `tipe_gbr` varchar(10) DEFAULT NULL,
  `ket_gbr` text,
  `dataShow` int(1) NOT NULL COMMENT '1 = Show, 0 Hide',
  `id_karangtaruna` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_karangtaruna` (`id_karangtaruna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tb_uploadimage`
--

INSERT INTO `tb_uploadimage` (`id`, `nm_gbr`, `tipe_gbr`, `ket_gbr`, `dataShow`, `id_karangtaruna`) VALUES
(1, 'file_1441775261.jpg', 'image/jpeg', 'Ivan Aditya', 1, 1),
(2, 'file_1441972894.jpg', 'image/jpeg', 'Klaten', 1, 2),
(3, 'file_1442423037.jpg', 'image/jpeg', 'dqd', 1, 1),
(4, 'file_1442423047.jpg', 'image/jpeg', 'dwq', 1, 1),
(5, 'file_1442425243.jpg', 'image/jpeg', 'lkl', 1, 1),
(6, 'file_1442466841.jpg', 'image/jpeg', 'AX', 0, 2),
(7, 'file_1442467525.jpg', 'image/jpeg', 'af', 1, 1),
(8, 'file_1442467883.jpg', 'image/jpeg', 'aD', 1, 1),
(9, 'file_1442468282.jpg', 'image/jpeg', 's', 0, 2),
(10, 'file_1442468290.jpg', 'image/jpeg', 'xa', 0, 2),
(11, 'file_1442468300.jpg', 'image/jpeg', 'xz', 0, 2),
(12, 'file_1442468316.jpg', 'image/jpeg', 'AD', 1, 2),
(13, 'file_1442468445.jpg', 'image/jpeg', 'wq', 0, 2),
(14, 'file_1442475257.jpg', 'image/jpeg', 'sfaaaaaaaaaaafasf', 0, 2),
(15, 'file_1442475559.jpg', 'image/jpeg', 'ewf', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activity`
--

CREATE TABLE IF NOT EXISTS `user_activity` (
  `ip` varchar(15) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_activity`
--

INSERT INTO `user_activity` (`ip`, `tanggal`) VALUES
('::1', '2015-09-16'),
('::1', '2015-09-16'),
('::1', '2015-09-17'),
('::1', '2015-09-17');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kt_anggota`
--
ALTER TABLE `kt_anggota`
  ADD CONSTRAINT `kt_anggota_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kt_kegiatan`
--
ALTER TABLE `kt_kegiatan`
  ADD CONSTRAINT `kt_kegiatan_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_uploadimage`
--
ALTER TABLE `tb_uploadimage`
  ADD CONSTRAINT `tb_uploadimage_ibfk_1` FOREIGN KEY (`id_karangtaruna`) REFERENCES `karangtaruna` (`id_karangtaruna`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
