/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - penduduk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`penduduk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `penduduk`;

/*Table structure for table `kartu_keluarga` */

DROP TABLE IF EXISTS `kartu_keluarga`;

CREATE TABLE `kartu_keluarga` (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kk` varchar(16) NOT NULL,
  `id_kepala_keluarga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`),
  UNIQUE KEY `FK_keluarga_penduduk` (`id_kepala_keluarga`) USING BTREE,
  UNIQUE KEY `id_kepala_keluarga` (`id_kepala_keluarga`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kartu_keluarga` */

/*Table structure for table `mutasi_keluar` */

DROP TABLE IF EXISTS `mutasi_keluar`;

CREATE TABLE `mutasi_keluar` (
  `id_mutasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `alamat_mutasi` text NOT NULL,
  `desa_kelurahan_mutasi` varchar(20) NOT NULL,
  `kecamatan_mutasi` varchar(30) NOT NULL,
  `kabupaten_kota_mutasi` varchar(20) NOT NULL,
  `provinsi_mutasi` varchar(20) NOT NULL,
  `negara_mutasi` varchar(20) NOT NULL,
  `rt_mutasi` varchar(3) NOT NULL,
  `rw_mutasi` varchar(3) NOT NULL,
  `kode_pos_mutasi` varchar(10) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alasan_pindah` varchar(20) NOT NULL,
  `jenis_pindah` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mutasi`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mutasi_keluar` */

/*Table structure for table `mutasi_masuk` */

DROP TABLE IF EXISTS `mutasi_masuk`;

CREATE TABLE `mutasi_masuk` (
  `id_mutasi_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `rt_masuk` varchar(3) NOT NULL,
  `rw_masuk` varchar(3) NOT NULL,
  `alamat_asal` text NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alasan_pindah` varchar(20) NOT NULL,
  `jenis_kepindahan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mutasi_masuk`),
  KEY `id_pdd` (`id_pdd`),
  KEY `id_keluarga` (`id_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mutasi_masuk` */

/*Table structure for table `penduduk` */

DROP TABLE IF EXISTS `penduduk`;

CREATE TABLE `penduduk` (
  `id_pdd` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat` text NOT NULL,
  `desa_kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten_kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `negara` varchar(30) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindu','Budha','Konghucu') NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` enum('Kawin','Belum Kawin') NOT NULL,
  PRIMARY KEY (`id_pdd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penduduk` */

/*Table structure for table `penduduk_has_kartu_keluarga` */

DROP TABLE IF EXISTS `penduduk_has_kartu_keluarga`;

CREATE TABLE `penduduk_has_kartu_keluarga` (
  `id_pdd` int(11) NOT NULL,
  `id_keluarga` int(11) NOT NULL,
  UNIQUE KEY `id_pdd` (`id_pdd`),
  KEY `id_penduduk` (`id_pdd`,`id_keluarga`),
  KEY `penduduk_has_kartu_keluarga_ibfk_2` (`id_keluarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penduduk_has_kartu_keluarga` */

/*Table structure for table `tbl_kelahiran` */

DROP TABLE IF EXISTS `tbl_kelahiran`;

CREATE TABLE `tbl_kelahiran` (
  `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kelahiran` date NOT NULL,
  `nama_bayi` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `berat_bayi` varchar(10) DEFAULT NULL,
  `panjang_bayi` varchar(10) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `lokasi_lahir` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  `penolong` varchar(25) NOT NULL,
  `id_pdd` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kelahiran`),
  KEY `id_pdd` (`id_pdd`),
  KEY `id_keluarga` (`id_keluarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelahiran` */

/*Table structure for table `tbl_meninggal` */

DROP TABLE IF EXISTS `tbl_meninggal`;

CREATE TABLE `tbl_meninggal` (
  `id_meninggal` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_meninggal` date NOT NULL,
  `sebab` varchar(50) DEFAULT NULL,
  `id_pdd` int(11) DEFAULT NULL,
  `tempat_kematian` varchar(100) DEFAULT NULL,
  `nama_pelapor` varchar(100) DEFAULT NULL,
  `hubungan_pelapor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_meninggal`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_meninggal` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(45) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(32) NOT NULL,
  `keterangan_user` text NOT NULL,
  `status_user` enum('Admin','Lurah') NOT NULL,
  `desa_kelurahan_user` varchar(30) NOT NULL,
  `kecamatan_user` varchar(30) NOT NULL,
  `kabupaten_kota_user` varchar(30) NOT NULL,
  `provinsi_user` varchar(30) NOT NULL,
  `negara_user` varchar(30) NOT NULL,
  `rt_user` varchar(3) NOT NULL,
  `rw_user` varchar(3) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`username_user`,`password_user`,`keterangan_user`,`status_user`,`desa_kelurahan_user`,`kecamatan_user`,`kabupaten_kota_user`,`provinsi_user`,`negara_user`,`rt_user`,`rw_user`) values 
(1,'Meisyntia','admin','21232f297a57a5a743894a0e4a801fc3','Admin di aplikasi Pendataan Penduduk','Admin','kebun jahe','binjai','medan','sumatera utara','Indonesia','001','002'),
(14,'Lurah Wae Belang','lurah','04960f28e4129aac5bdc9da32056560d','Lurah Wae Belang','Lurah','Dolor aliqua Quia v','Quod eius proident ','Ut dolor fugiat dolo','Cupidatat excepturi ','Aut duis non sunt q','003','016');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
