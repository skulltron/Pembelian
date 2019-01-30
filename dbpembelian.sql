/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.36-MariaDB : Database - dbpembelian
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbpembelian` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbpembelian`;

/*Table structure for table `tbbarang` */

DROP TABLE IF EXISTS `tbbarang`;

CREATE TABLE `tbbarang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kd_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `nama_tipe` varchar(11) DEFAULT NULL,
  `harga_beli` int(20) DEFAULT NULL,
  `stok` int(15) DEFAULT NULL,
  `min` int(15) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `gudang` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbbarang` */

insert  into `tbbarang`(`id_barang`,`kd_barang`,`nama_barang`,`nama_tipe`,`harga_beli`,`stok`,`min`,`satuan`,`gudang`) values 
(1,'S-SMC-09','Smash Cakram th 2015','Suzuki',10500000,30,20,'unit','B'),
(2,'S-SRU-09','Satria RU 120LSC th 2015','Suzuki',13200000,30,10,'unit','B');

/*Table structure for table `tbbayar` */

DROP TABLE IF EXISTS `tbbayar`;

CREATE TABLE `tbbayar` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL,
  `no_cek` varchar(15) DEFAULT NULL,
  `no_bkk` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbbayar` */

insert  into `tbbayar`(`id_pembayaran`,`id_transaksi`,`tgl_pembayaran`,`jml_bayar`,`status_pembayaran`,`no_cek`,`no_bkk`) values 
(1,26,'2019-01-22',118500000,'Lunas',NULL,NULL),
(2,29,'2019-01-22',21000000,'Lunas',NULL,NULL),
(3,27,'2019-01-22',10500000,'Lunas',NULL,NULL),
(4,26,'2019-01-22',118500000,'Lunas',NULL,NULL),
(5,27,'2019-01-22',10500000,'Lunas',NULL,NULL),
(6,29,'2019-01-22',21000000,'Lunas',NULL,NULL),
(7,29,'2019-01-22',21000000,'Lunas',NULL,NULL),
(8,29,'2019-01-22',21000000,'Lunas',NULL,NULL),
(9,28,'2019-01-22',232260000,'Lunas',NULL,NULL),
(10,31,'2019-01-22',237000000,'Lunas',NULL,NULL),
(11,31,'2019-01-30',237000000,'Lunas',NULL,NULL),
(12,31,'2019-01-30',237000000,'Lunas',NULL,NULL),
(13,31,'2019-01-30',237000000,'Lunas',NULL,NULL),
(14,31,'2019-01-30',237000000,'Lunas',NULL,NULL),
(15,32,'2019-01-30',26400000,'Lunas',NULL,NULL);

/*Table structure for table `tbjurnal` */

DROP TABLE IF EXISTS `tbjurnal`;

CREATE TABLE `tbjurnal` (
  `id_terima` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_terima` date DEFAULT NULL,
  `keterangan` text,
  `no_bukti` varchar(20) DEFAULT NULL,
  `kas` int(20) DEFAULT NULL,
  `potongan` int(20) DEFAULT NULL,
  `penjualan` int(20) DEFAULT NULL,
  `piutang_dg` int(20) DEFAULT NULL,
  `rek` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_terima`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tbjurnal` */

insert  into `tbjurnal`(`id_terima`,`tgl_terima`,`keterangan`,`no_bukti`,`kas`,`potongan`,`penjualan`,`piutang_dg`,`rek`,`jumlah`) values 
(33,'2019-01-30','Retur barang (Kurang Mangstab)','777955',39600000,0,39600000,0,0,0),
(34,'2019-01-30','Retur barang (Kurang Mangstab)','777955',31500000,0,31500000,0,0,0),
(35,'2019-01-23','Retur barang (Barang Terlalu Bagus)','606192',210000000,0,210000000,0,0,0),
(36,'2019-01-23','Retur barang (Barang Terlalu Bagus)','161791',210000000,0,210000000,0,0,0);

/*Table structure for table `tbpesan` */

DROP TABLE IF EXISTS `tbpesan`;

CREATE TABLE `tbpesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `no_pesan` int(11) DEFAULT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `jenis_pesan` varchar(15) DEFAULT NULL,
  `jml_pesan` int(11) DEFAULT NULL,
  `ukuran` varchar(15) DEFAULT NULL,
  `penjelasan` text,
  `tgl_batas_pesan` date DEFAULT NULL,
  `kondisi` varchar(11) DEFAULT NULL,
  `status_pesanan` varchar(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `total_pesan` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tbpesan` */

insert  into `tbpesan`(`id_pesan`,`id_barang`,`no_pesan`,`tgl_pesan`,`jenis_pesan`,`jml_pesan`,`ukuran`,`penjelasan`,`tgl_batas_pesan`,`kondisi`,`status_pesanan`,`id_transaksi`,`total_pesan`) values 
(46,1,502395,'2019-01-22','Biasa',10,'-','Dikirim Sebelum Tanggal 20 Des 2016','2019-01-30','Baik','pending',31,105000000),
(47,2,572275,'2019-01-22','Biasa',10,'-','Dikirim Sebelum Tanggal 20 Des 2016','2019-01-30','Baik','pending',31,132000000),
(48,2,907612,'2019-01-22','Biasa',2,'-','-','2019-01-30','Baik','pending',32,26400000),
(49,1,856211,'2019-01-22','Segera',10,'-','Kirim Sebelum Tanggal 20','2019-01-26','Baik','pending',33,105000000),
(50,2,404992,'2019-01-22','Biasa',10,'-','Kirim Sebelum Tanggal 20 ','2019-01-30','Baik','pending',33,132000000);

/*Table structure for table `tbretur` */

DROP TABLE IF EXISTS `tbretur`;

CREATE TABLE `tbretur` (
  `id_retur` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_retur` date DEFAULT NULL,
  `status_retur` varchar(15) DEFAULT NULL,
  `total_retur` int(20) DEFAULT NULL,
  `keterangan_retur` text,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbretur` */

insert  into `tbretur`(`id_retur`,`tgl_retur`,`status_retur`,`total_retur`,`keterangan_retur`) values 
(10,'2019-01-22','Diterima',36900000,'Barang Jelek'),
(11,'2019-01-23','Diterima',210000000,'Barang Terlalu Bagus'),
(12,'2019-01-30','Diterima',71100000,'Kurang Mangstab');

/*Table structure for table `tbreturdetail` */

DROP TABLE IF EXISTS `tbreturdetail`;

CREATE TABLE `tbreturdetail` (
  `id_rdetail` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml_returbarang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rdetail`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbreturdetail` */

insert  into `tbreturdetail`(`id_rdetail`,`id_retur`,`id_barang`,`jml_returbarang`) values 
(9,10,1,1),
(10,10,2,2),
(12,11,1,20),
(14,12,2,3),
(15,0,1,3),
(16,12,1,3);

/*Table structure for table `tbsupplier` */

DROP TABLE IF EXISTS `tbsupplier`;

CREATE TABLE `tbsupplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbsupplier` */

insert  into `tbsupplier`(`id_supplier`,`nama_supplier`,`alamat_supplier`,`no_telp`,`keterangan`) values 
(1,'PT. Suzuki Putra','Jl. Basuki Rahmad  01','081288388288',NULL);

/*Table structure for table `tbtransaksi` */

DROP TABLE IF EXISTS `tbtransaksi`;

CREATE TABLE `tbtransaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi` date DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `no_transaksi` varchar(15) DEFAULT NULL,
  `sub_total` int(20) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `grand_total` int(20) DEFAULT NULL,
  `status_transaksi` varchar(20) DEFAULT NULL,
  `gudang_from` varchar(2) DEFAULT NULL,
  `tgl_konf` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `tbtransaksi` */

insert  into `tbtransaksi`(`id_transaksi`,`tgl_transaksi`,`id_supplier`,`no_transaksi`,`sub_total`,`potongan`,`grand_total`,`status_transaksi`,`gudang_from`,`tgl_konf`,`tgl_kirim`) values 
(31,'2019-01-22',1,'5OT02019-01',237000000,0,237000000,'Terkirim','A','2019-01-30','2019-01-30'),
(32,'2019-01-22',1,'GV192019-01',26400000,0,26400000,'Sukses','A','2019-01-30','2019-01-30'),
(33,'2019-01-23',1,'C1V02019-01',237000000,0,237000000,'Terkirim','A','2019-01-30','2019-01-30');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
