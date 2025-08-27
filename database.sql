/*
SQLyog Ultimate
MySQL - 10.4.28-MariaDB : Database - monitoring_pusdatin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_bulan` */

CREATE TABLE `tb_bulan` (
  `id` int(5) DEFAULT NULL,
  `bulan` varchar(40) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tb_bulan` */

insert  into `tb_bulan`(`id`,`bulan`) values (1,'Januari');
insert  into `tb_bulan`(`id`,`bulan`) values (2,'Februari');
insert  into `tb_bulan`(`id`,`bulan`) values (3,'Maret');
insert  into `tb_bulan`(`id`,`bulan`) values (4,'April');
insert  into `tb_bulan`(`id`,`bulan`) values (5,'Mei');
insert  into `tb_bulan`(`id`,`bulan`) values (6,'Juni');
insert  into `tb_bulan`(`id`,`bulan`) values (7,'Juli');
insert  into `tb_bulan`(`id`,`bulan`) values (8,'Agustus');
insert  into `tb_bulan`(`id`,`bulan`) values (9,'September');
insert  into `tb_bulan`(`id`,`bulan`) values (10,'Oktober');
insert  into `tb_bulan`(`id`,`bulan`) values (11,'November');
insert  into `tb_bulan`(`id`,`bulan`) values (12,'Desember');

/*Table structure for table `tb_kegiatan` */

CREATE TABLE `tb_kegiatan` (
  `idkegiatan` int(5) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) DEFAULT NULL,
  `kode_kegiatan` varchar(40) DEFAULT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `pagu` bigint(40) DEFAULT NULL,
  `pagu_blokir` bigint(40) DEFAULT NULL,
  `pj` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`idkegiatan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_kegiatan` */

insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (9,2025,'1749.EBC.954','Layanan Manajemen SDM',NULL,NULL,NULL,'2025-08-14 14:24:41','2025-08-14 14:24:41');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (10,2025,'4576.EBA.956','Layanan BMN',NULL,NULL,'TU','2025-08-21 10:52:17','2025-08-21 10:52:17');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (11,2025,'4576.EBA.962','Layanan Umum',NULL,NULL,'TU','2025-08-21 10:52:24','2025-08-21 10:52:24');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (12,2025,'4576.EBD.953','Layanan Pemantauan dan Evaluasi',NULL,NULL,'TU','2025-08-21 10:52:33','2025-08-21 10:52:33');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (13,2025,'4576.EBD.955','Layanan Manajemen Keuangan',NULL,NULL,'PPK','2025-08-21 10:52:41','2025-08-21 10:52:41');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (14,2025,'4577.AEA.111','Koordinasi, Bimtek, Monev dan Pelaporan',NULL,NULL,'TU','2025-08-21 10:52:48','2025-08-21 10:52:48');
insert  into `tb_kegiatan`(`idkegiatan`,`tahun`,`kode_kegiatan`,`nama_kegiatan`,`pagu`,`pagu_blokir`,`pj`,`created_at`,`updated_at`) values (15,2025,'4577.EBA.963','Layanan Data dan Informasi',NULL,NULL,'TP HOR','2025-08-21 10:53:49',NULL);

/*Table structure for table `tb_komponen` */

CREATE TABLE `tb_komponen` (
  `idkomponen` int(5) NOT NULL AUTO_INCREMENT,
  `idsubkegiatan` int(5) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `kode_komponen` varchar(40) DEFAULT NULL,
  `nama_komponen` varchar(100) DEFAULT NULL,
  `pagu` bigint(40) DEFAULT NULL,
  `tagging` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`idkomponen`),
  KEY `idsubkegiatan` (`idsubkegiatan`),
  CONSTRAINT `tb_komponen_ibfk_1` FOREIGN KEY (`idsubkegiatan`) REFERENCES `tb_subkegiatan` (`idsubkegiatan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_komponen` */

insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (11,20,2025,'888888','Belanja Barang Non Operasional Lainnya',153639000,'non_perjadin','2025-08-22 22:46:01','2025-08-22 22:46:01');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (12,38,2025,'888888','Belanja Bahan',NULL,NULL,'2025-08-21 14:23:14','2025-08-21 14:23:14');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (13,38,2025,'999999','Belanja Jasa Profesi',NULL,NULL,'2025-08-21 14:23:26','2025-08-21 14:23:26');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (14,38,2025,'524111','Belanja Perjalanan Dinas Biasa',NULL,NULL,'2025-08-21 14:23:46',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (15,38,2025,'524114','Belanja Perjalanan Dinas Paket Meeting Dalam Kota',NULL,NULL,'2025-08-21 14:24:08',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (16,41,2025,'888888','Belanja Bahan',NULL,NULL,'2025-08-21 14:34:52',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (17,41,2025,'524111','Belanja Perjalanan Dinas Biasa\r\n',NULL,NULL,'2025-08-21 14:35:22',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (18,41,2025,'524113','Belanja Perjalanan Dinas Dalam Kota',NULL,NULL,'2025-08-21 14:35:42',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (19,44,2025,'888888','Belanja Bahan',1620000,'non_perjadin','2025-08-22 22:34:35','2025-08-22 22:34:35');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (20,44,2025,'524111','Belanja Perjalanan Dinas Biasa',7990000,'perjadin','2025-08-22 22:06:47','2025-08-22 22:06:47');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (21,44,2025,'524119','Belanja Perjalanan Dinas Paket Meeting Luar Kota',260000,'perjadin','2025-08-22 22:06:55','2025-08-22 22:06:55');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (22,37,2025,'888888','Belanja Bahan',24300000,'non_perjadin','2025-08-22 22:34:21','2025-08-22 22:34:21');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (23,37,2025,'524111','Belanja Perjalanan Dinas Biasa',64674000,'perjadin','2025-08-22 22:08:47','2025-08-22 22:08:47');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (24,37,2025,'524111','Belanja Perjalanan Dinas Biasa (pimpinan)',61696000,'perjadin','2025-08-22 22:08:52','2025-08-22 22:08:52');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (25,37,2025,'524113','Belanja Perjalanan Dinas Dalam Kota',3400000,'perjadin','2025-08-22 22:08:57','2025-08-22 22:08:57');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (26,37,2025,'524114','Belanja Perjalanan Dinas Paket Meeting Dalam Kota',1060000,'perjadin','2025-08-22 22:09:03','2025-08-22 22:09:03');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (27,24,2025,'888888','Belanja Bahan',11340000,'non_perjadin','2025-08-22 22:51:09',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (28,24,2025,'524111','Belanja Perjalanan Dinas Biasa',108846000,'perjadin','2025-08-22 22:53:00',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (29,24,2025,'524111','Belanja Perjalanan Dinas Biasa (PPK)',8100000,'perjadin','2025-08-22 22:54:37','2025-08-22 22:54:37');
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (30,24,2025,'524111','Belanja Perjalanan Dinas Biasa (pimpinan)',111714000,'perjadin','2025-08-22 22:55:03',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (31,27,2025,'888888','Belanja Bahan',16200000,'non_perjadin','2025-08-22 23:07:56',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (32,27,2025,'524111','Belanja Perjalanan Dinas Biasa',73800000,'perjadin','2025-08-22 23:08:35',NULL);
insert  into `tb_komponen`(`idkomponen`,`idsubkegiatan`,`tahun`,`kode_komponen`,`nama_komponen`,`pagu`,`tagging`,`created_at`,`updated_at`) values (33,27,2025,'524114','Belanja Perjalanan Dinas Paket Meeting Dalam Kota',0,'perjadin','2025-08-22 23:08:58',NULL);

/*Table structure for table `tb_realisasi` */

CREATE TABLE `tb_realisasi` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idkomponen` varchar(40) DEFAULT NULL,
  `minggu` varchar(10) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `rp_realisasi` bigint(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tb_realisasi` */

insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (1,'19','1','1','2025',1125000,'2025-08-22 10:45:32','2025-08-22 21:17:18');
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (2,'20','1','1','2025',1720000,'2025-08-22 20:50:40','2025-08-22 21:17:33');
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (3,'21','1','1','2025',260000,'2025-08-22 21:17:45',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (4,'22','1','1','2025',5753600,'2025-08-22 21:22:16',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (5,'23','1','1','2025',53432398,'2025-08-22 21:22:46',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (6,'24','1','1','2025',61268732,'2025-08-22 21:23:08',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (7,'25','1','1','2025',1360000,'2025-08-22 21:23:22',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (8,'26','1','1','2025',1060000,'2025-08-22 21:23:34',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (9,'11','1','1','2025',3500000,'2025-08-22 22:46:36',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (10,'27','1','1','2025',2756000,'2025-08-22 22:55:25',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (11,'28','1','1','2025',70591125,'2025-08-22 22:56:42',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (12,'29','1','1','2025',6183121,'2025-08-22 22:56:55',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (13,'30','1','1','2025',111713468,'2025-08-22 22:57:07',NULL);
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (14,'31','1','1','2025',4443200,'2025-08-22 23:09:50','2025-08-22 23:11:04');
insert  into `tb_realisasi`(`id`,`idkomponen`,`minggu`,`bulan`,`tahun`,`rp_realisasi`,`created_at`,`updated_at`) values (15,'32','1','1','2025',67757838,'2025-08-22 23:10:33','2025-08-22 23:11:16');

/*Table structure for table `tb_realisasi_bop` */

CREATE TABLE `tb_realisasi_bop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkegiatan` int(11) DEFAULT NULL,
  `insentif_pusat` decimal(15,2) DEFAULT NULL,
  `honor_pusat` decimal(15,2) DEFAULT NULL,
  `bpjs_pusat` decimal(15,2) DEFAULT NULL,
  `insentif_terima` decimal(15,2) DEFAULT NULL,
  `tgl_insentif` date DEFAULT NULL,
  `bukti_insentif` varchar(255) DEFAULT NULL,
  `honor_terima` decimal(15,2) DEFAULT NULL,
  `tgl_honor` date DEFAULT NULL,
  `bukti_honor` varchar(255) DEFAULT NULL,
  `bpjs_terima` decimal(15,2) DEFAULT NULL,
  `tgl_bpjs` date DEFAULT NULL,
  `bukti_bpjs` varchar(255) DEFAULT NULL,
  `status_penyuluh` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_realisasi_bop` */

/*Table structure for table `tb_subkegiatan` */

CREATE TABLE `tb_subkegiatan` (
  `idsubkegiatan` int(5) NOT NULL AUTO_INCREMENT,
  `idkegiatan` int(5) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `kode_subkegiatan` varchar(40) DEFAULT NULL,
  `nama_subkegiatan` varchar(100) DEFAULT NULL,
  `pagu` bigint(40) DEFAULT NULL,
  `pagu_blokir` bigint(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`idsubkegiatan`),
  KEY `idkegiatan` (`idkegiatan`),
  CONSTRAINT `tb_subkegiatan_ibfk_1` FOREIGN KEY (`idkegiatan`) REFERENCES `tb_kegiatan` (`idkegiatan`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_subkegiatan` */

insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (20,9,2025,'112.A','Pengembangan Kapasitas SDM',NULL,NULL,'2025-07-14 20:43:17',NULL);
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (24,12,2025,'000000','Komponen Layanan Pemantauan dan Evaluasi',0,0,'2025-08-22 22:49:03','2025-08-22 22:49:03');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (27,13,2025,'000000','Komponen Layanan Manajemen Keuangan',0,0,'2025-08-22 23:10:11','2025-08-22 23:10:11');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (28,14,2025,'524111','Belanja Perjalanan Dinas Biasa',0,0,'2025-08-22 23:10:12','2025-08-22 23:10:12');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (33,14,2025,'524113','Belanja Perjalanan Dinas Dalam Kota',0,0,'2025-08-22 23:10:13','2025-08-22 23:10:13');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (34,14,2025,'524114','Belanja Perjalanan Dinas Paket Meeting Dalam Kota',0,0,'2025-08-22 23:10:13','2025-08-22 23:10:13');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (35,14,2025,'524119','Belanja Perjalanan Dinas Paket Meeting Luar Kota',0,0,'2025-08-22 23:10:14','2025-08-22 23:10:14');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (37,11,2025,'000000','Belanja Bahan',0,0,'2025-08-21 09:51:44',NULL);
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (38,15,2025,'111.A','Perencanaan Data dan Sistem Informasi',0,0,'2025-08-21 11:36:51','2025-08-21 11:36:51');
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (41,15,2025,'112.A','Pengelolaan Data dan Sistem Informasi (TP HOR)',0,0,'2025-08-21 13:58:07',NULL);
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (42,15,2025,'112.B','Pengelolaan Data dan Sistem Informasi (BUN NAK)',0,0,'2025-08-21 13:59:09',NULL);
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (43,15,2025,'112.B	','Pengelolaan Data dan Sistem Informasi (SARPRAS)',0,0,'2025-08-21 13:59:52',NULL);
insert  into `tb_subkegiatan`(`idsubkegiatan`,`idkegiatan`,`tahun`,`kode_subkegiatan`,`nama_subkegiatan`,`pagu`,`pagu_blokir`,`created_at`,`updated_at`) values (44,10,2025,'000','Komponen Layanan BMN',0,0,'2025-08-21 14:47:05',NULL);

/*Table structure for table `tb_tahun` */

CREATE TABLE `tb_tahun` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tahun` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tb_tahun` */

insert  into `tb_tahun`(`id`,`tahun`) values (5,2025);

/*Table structure for table `tb_user` */

CREATE TABLE `tb_user` (
  `idusr` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL DEFAULT 0,
  `username` varchar(40) DEFAULT NULL,
  `password_new` varchar(100) DEFAULT NULL COMMENT '$2y$10$aaVGIfLTC70Vi5w1MASNsOIvyMQWK/pbN8xxNFwb3EEmYWQ3.aX4m',
  `kode_prop` varchar(5) DEFAULT NULL,
  `kode_kab` varchar(5) DEFAULT NULL,
  `nama_kab` varchar(100) DEFAULT NULL,
  `id_prop` varchar(4) DEFAULT NULL,
  `id_dati2` varchar(5) DEFAULT NULL,
  `nama_dati2` varchar(100) DEFAULT NULL,
  `tipe_dana` int(1) DEFAULT 1,
  `akses_kegiatan` varchar(20) DEFAULT NULL,
  `level` int(1) DEFAULT NULL COMMENT '1=kab,2=prop',
  `edited` int(1) DEFAULT 0,
  PRIMARY KEY (`idusr`)
) ENGINE=InnoDB AUTO_INCREMENT=1169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`idusr`,`id_user`,`username`,`password_new`,`kode_prop`,`kode_kab`,`nama_kab`,`id_prop`,`id_dati2`,`nama_dati2`,`tipe_dana`,`akses_kegiatan`,`level`,`edited`) values (515,515,'perencanaan','$2y$10$TCo2QKltMa2eiT1ttICqd.uBqa10xNgNpQeqarApERPEQGovlLNMu','99','99','Perencanaan','9900','9999','Perencanaan',1,'all',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
