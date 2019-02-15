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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbbarang` */

insert  into `tbbarang`(`id_barang`,`kd_barang`,`nama_barang`,`nama_tipe`,`harga_beli`,`stok`,`min`,`satuan`,`gudang`) values 
(1,'S-SMC-09','Smash Cakram th 2015','Suzuki',10500000,30,20,'unit','B'),
(2,'S-SRU-09','Satria RU 120LSC th 2015','Suzuki',13200000,30,10,'unit','B'),
(3,'H-ASF-09','Astrea Supra Fit th 2015','Honda',12000000,20,20,'unit','A'),
(4,'H-ASX-09','Astrea Supra X th 2015','Honda',10500000,20,20,'unit','A'),
(5,'K-KH-09','Kharisma th 2015','Honda',13300000,35,10,'unit','A'),
(6,'S-AXSD-09','Shogun XSD th 2015','Suzuki',11200000,40,10,'unit','B'),
(7,'S-TOR-09','Tornado th 2015','Suzuki',9150000,25,5,'unit','B'),
(8,'Y-F1ZR-09','F 1 ZR th 2015','Yamaha',8850000,25,5,'unit','C'),
(9,'Y-VR-09','Vega R th 2015','Yamaha',8850000,25,5,'unit','C'),
(10,'Y-JZ-09','Jupiter Z th 2015','Yamaha',11700000,30,10,'unit','C');

/*Table structure for table `tbbayar` */

DROP TABLE IF EXISTS `tbbayar`;

CREATE TABLE `tbbayar` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi2` int(11) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL,
  `no_cek` varchar(15) DEFAULT NULL,
  `no_bkk` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbbayar` */

insert  into `tbbayar`(`id_pembayaran`,`id_transaksi2`,`tgl_pembayaran`,`jml_bayar`,`status_pembayaran`,`no_cek`,`no_bkk`) values 
(22,39,'2019-02-13',213300000,'Lunas',NULL,NULL);

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
  `id_supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_terima`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `tbjurnal` */

insert  into `tbjurnal`(`id_terima`,`tgl_terima`,`keterangan`,`no_bukti`,`kas`,`potongan`,`penjualan`,`piutang_dg`,`rek`,`jumlah`,`id_supplier`) values 
(56,'2019-02-13','Retur barang (Barang Cacat)','267313',23760000,2640000,23760000,0,0,21120000,1);

/*Table structure for table `tbjurnalkeluar` */

DROP TABLE IF EXISTS `tbjurnalkeluar`;

CREATE TABLE `tbjurnalkeluar` (
  `id_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_keluar` date DEFAULT NULL,
  `keterangan_keluar` text,
  `no_bukti_keluar` varchar(20) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `potongan_keluar` int(11) DEFAULT NULL,
  `pembelian` int(11) DEFAULT NULL,
  `hutang_dg` int(11) DEFAULT NULL,
  `rek_keluar` varchar(20) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbjurnalkeluar` */

insert  into `tbjurnalkeluar`(`id_keluar`,`tgl_keluar`,`keterangan_keluar`,`no_bukti_keluar`,`kas_keluar`,`potongan_keluar`,`pembelian`,`hutang_dg`,`rek_keluar`,`jumlah_keluar`,`id_supplier`) values 
(6,'2019-02-13','Beli Barang Dari Supplier','OBOQ2019-02',237000000,10,237000000,0,'0',213300000,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `tbpesan` */

insert  into `tbpesan`(`id_pesan`,`id_barang`,`no_pesan`,`tgl_pesan`,`jenis_pesan`,`jml_pesan`,`ukuran`,`penjelasan`,`tgl_batas_pesan`,`kondisi`,`status_pesanan`,`id_transaksi`,`total_pesan`) values 
(62,1,430829,'2019-02-12','Biasa',10,'-','-','2019-02-20','Baik','pending',39,105000000),
(63,2,861939,'2019-02-12','Biasa',10,'-','-','2019-02-20','Baik','pending',39,132000000);

/*Table structure for table `tbretur` */

DROP TABLE IF EXISTS `tbretur`;

CREATE TABLE `tbretur` (
  `id_retur` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_retur` date DEFAULT NULL,
  `status_retur` varchar(15) DEFAULT NULL,
  `total_retur` int(20) DEFAULT NULL,
  `keterangan_retur` text,
  `potongan_retur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tbretur` */

insert  into `tbretur`(`id_retur`,`tgl_retur`,`status_retur`,`total_retur`,`keterangan_retur`,`potongan_retur`) values 
(19,'2019-02-13','Diterima',0,'Barang Cacat',10);

/*Table structure for table `tbreturdetail` */

DROP TABLE IF EXISTS `tbreturdetail`;

CREATE TABLE `tbreturdetail` (
  `id_rdetail` int(11) NOT NULL AUTO_INCREMENT,
  `id_retur` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jml_returbarang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rdetail`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `tbreturdetail` */

insert  into `tbreturdetail`(`id_rdetail`,`id_retur`,`id_barang`,`jml_returbarang`) values 
(29,19,2,2);

/*Table structure for table `tbsupplier` */

DROP TABLE IF EXISTS `tbsupplier`;

CREATE TABLE `tbsupplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamat_supplier` text,
  `no_telp` varchar(15) DEFAULT NULL,
  `keterangan_supp` text,
  `no_rek` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbsupplier` */

insert  into `tbsupplier`(`id_supplier`,`nama_supplier`,`alamat_supplier`,`no_telp`,`keterangan_supp`,`no_rek`) values 
(0,'PT. Honda Putra',NULL,NULL,NULL,'512773884778'),
(1,'PT. Suzuki Putra','Jl. Basuki Rahmad  01','081288388288',NULL,'510992883998'),
(3,'PT. Ymaha Putra','Jl. Raigor','077777777777',NULL,'519883778477');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `tbtransaksi` */

insert  into `tbtransaksi`(`id_transaksi`,`tgl_transaksi`,`id_supplier`,`no_transaksi`,`sub_total`,`potongan`,`grand_total`,`status_transaksi`,`gudang_from`,`tgl_konf`,`tgl_kirim`) values 
(39,'2019-02-13',1,'OBOQ2019-02',237000000,10,213300000,'Sukses','A','2019-02-13','2019-02-13');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
