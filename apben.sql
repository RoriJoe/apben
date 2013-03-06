-- Adminer 3.6.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `detail_input`;
CREATE TABLE `detail_input` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dipa_id` bigint(20) NOT NULL,
  `dipa_version` int(11) NOT NULL,
  `mak_uid` bigint(20) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `volume` bigint(20) NOT NULL,
  `satuan_volume` varchar(25) NOT NULL,
  `frequensi` bigint(20) NOT NULL,
  `satuan_frequensi` varchar(25) NOT NULL,
  `tarif` bigint(20) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `detail_input` (`id`, `dipa_id`, `dipa_version`, `mak_uid`, `uraian`, `volume`, `satuan_volume`, `frequensi`, `satuan_frequensi`, `tarif`, `jumlah`, `uid`, `version`, `trash`) VALUES
(1,	0,	0,	0,	'',	0,	'',	0,	'',	0,	9223372036854775807,	0,	1,	0);

DROP TABLE IF EXISTS `dipa`;
CREATE TABLE `dipa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun_anggaran` int(11) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `kode_kegiatan` varchar(25) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal_dipa` varchar(20) NOT NULL,
  `nomor_dipa` varchar(30) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dipa` (`id`, `tahun_anggaran`, `satker`, `kode_kegiatan`, `kegiatan`, `tanggal_dipa`, `nomor_dipa`, `version`) VALUES
(1,	2013,	'Pusat Pendidikan dan Pelatihan Pengembangan Sumber Daya Manusia - BPPK',	'1737',	'Pengembangan SDM Melalui Penyelenggaran Diklat Kepemimpinan dan Manajemen Serta Pendidikan Pascasarjana Bagi Pegawai Departemen Keuangan',	'13 Desember 2012',	'015.11.1.675709/2013',	1);

DROP TABLE IF EXISTS `mak`;
CREATE TABLE `mak` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dipa_id` bigint(20) NOT NULL,
  `dipa_version` int(11) NOT NULL,
  `suboutput_uid` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `suboutput_id` (`suboutput_uid`),
  KEY `dipa_id` (`dipa_id`),
  CONSTRAINT `mak_ibfk_1` FOREIGN KEY (`dipa_id`) REFERENCES `dipa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `master_mak`;
CREATE TABLE `master_mak` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `master_mak` (`id`, `kode`, `uraian`, `uid`, `version`, `trash`) VALUES
(3,	'521211',	'Belanja Bahan',	3,	1,	0),
(4,	'521219',	'Belanja Barang Non Operasional Lainnya',	4,	1,	0),
(5,	'522191',	'Belanja Jasa Lainnya',	5,	1,	0),
(6,	'524119',	'Belanja Perjalanan Lainnya',	6,	1,	0),
(7,	'522151',	'Belanja Jasa Profesi',	7,	1,	0),
(8,	'521213',	'Honor Output Kegiatan',	8,	1,	0),
(9,	'522141',	'Belanja Sewa',	9,	1,	0),
(10,	'511111',	'Belanja Gaji Pokok PNS',	10,	1,	0),
(11,	'511119',	'Belanja Pembulatan Gaji PNS',	11,	1,	0),
(12,	'511121',	'Belanja Tunj. Suami/Istri PNS',	12,	1,	0),
(13,	'511122',	'Belanja Tunj. Anak PNS',	13,	1,	0),
(14,	'511123',	'Belanja Tunj. Struktural PNS',	14,	1,	0),
(15,	'511124',	'Belanja Tunj. Fungsional PNS',	15,	1,	0),
(16,	'511125',	'Belanja Tunj. PPh PNS',	16,	1,	0),
(17,	'511126',	'Belanja Tunj. Beras PNS',	17,	1,	0),
(18,	'511129',	'Belanja Uang Makan PNS',	18,	1,	0),
(19,	'511151',	'Belanja Tunjangan Umum PNS',	19,	1,	0),
(20,	'512211',	'Belanja uang lembur',	20,	1,	0),
(21,	'521111',	'Belanja Keperluan Perkantoran',	21,	1,	0),
(22,	'522111',	'Belanja Langganan Listrik',	22,	1,	0),
(23,	'522112',	'Belanja Langganan Telepon',	23,	1,	0),
(24,	'521114',	'Belanja pengiriman surat dinas pos pusat',	24,	1,	0),
(25,	'521119',	'Belanja Barang Operasional Lainnya',	25,	1,	0),
(26,	'521115',	'Honor Operasional Satuan Kerja',	26,	1,	0);

DROP TABLE IF EXISTS `master_output`;
CREATE TABLE `master_output` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `master_output` (`id`, `kode`, `uraian`, `uid`, `version`, `trash`) VALUES
(64,	'003',	'Laporan Keuangan dan Kegiatan',	64,	1,	0),
(65,	'004',	'Jumlah Peserta Diklat',	65,	1,	0),
(66,	'994',	'Layanan Perkantoran',	66,	1,	0),
(67,	'996',	'Perangkat Pengolah Data dan Komunikasi',	67,	1,	0),
(68,	'997',	'Peralatan dan Fasilitas Perkantoran',	68,	1,	0),
(69,	'998',	'Gedung/Bangunan',	69,	1,	0);

DROP TABLE IF EXISTS `master_suboutput`;
CREATE TABLE `master_suboutput` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `master_suboutput` (`id`, `kode`, `uraian`, `uid`, `version`, `trash`) VALUES
(15,	'001',	'DIKLAT UJIAN DINAS',	15,	1,	0),
(16,	'002',	'DIKLAT UJIAN DINAS MENGULANG',	16,	1,	0),
(17,	'004',	'Diklat Prajabatan Golongan II',	17,	1,	0),
(18,	'005',	'Diklat Prajabatan Golongan III',	18,	1,	0),
(19,	'006',	'DIKLATPIM (ILT) IV PAJAK DAN BEA CUKAI',	19,	1,	0),
(20,	'007',	'DIKLATPIM (ILT) III PAJAK',	20,	1,	0),
(21,	'016',	'DIKLAT PRAJABATAN GOLONGAN II DAERAH',	21,	1,	0),
(22,	'024',	'PROGRAM PHRDP III (JICA)',	22,	1,	0),
(23,	'025',	'PROGRAM SPIRIT (WORLD BANK)',	23,	1,	0),
(24,	'026',	'Penyelenggaraan Persiapan Beasiswa Luar Negeri',	24,	1,	0),
(25,	'027',	'EXECUTIVE TRAINING',	25,	1,	0),
(26,	'001',	'DUKUNGAN MANAJEMEN DAN DUKUNGAN TEKNIS',	26,	1,	0),
(27,	'002',	'DUKUNGAN Perkantoran Lainnya',	27,	1,	0),
(28,	'001',	'Perangkat Pengolah Data',	28,	1,	0),
(29,	'001',	'PENGADAAN FASILITAS PERKANTORAN',	29,	1,	0),
(30,	'002',	'SARANA PRASARANA INSTANSI',	30,	1,	0);

DROP TABLE IF EXISTS `output`;
CREATE TABLE `output` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dipa_id` bigint(20) NOT NULL,
  `dipa_version` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `satker_id` (`dipa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `suboutput`;
CREATE TABLE `suboutput` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dipa_id` bigint(20) NOT NULL,
  `dipa_version` int(11) NOT NULL,
  `output_uid` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `output_id` (`output_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2013-03-06 12:19:10
