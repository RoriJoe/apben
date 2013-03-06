-- Adminer 3.6.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `detail_input`;
CREATE TABLE `detail_input` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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

INSERT INTO `detail_input` (`id`, `mak_uid`, `uraian`, `volume`, `satuan_volume`, `frequensi`, `satuan_frequensi`, `tarif`, `jumlah`, `uid`, `version`, `trash`) VALUES
(1,	0,	'',	0,	'',	0,	'',	0,	9223372036854775807,	0,	1,	0);

DROP TABLE IF EXISTS `mak`;
CREATE TABLE `mak` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `suboutput_uid` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `suboutput_id` (`suboutput_uid`)
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
(28,	'123123',	'123123',	28,	1,	0),
(29,	'123123',	'abcd',	28,	2,	0),
(30,	'bcdef',	'abcd',	28,	3,	0),
(38,	'bcdef',	'ini bisa di rubah',	28,	4,	0),
(39,	'bcdef',	'masih bisa di rubah',	28,	5,	0),
(40,	'123123',	'sebelum di hapus',	28,	3,	0),
(41,	'bcdef',	'test',	28,	6,	0),
(43,	'09123',	'qiwpdjqiowjd',	43,	1,	0),
(44,	'09123',	'jossss',	43,	2,	0),
(45,	'12380172',	'qwdqwdqw',	45,	1,	0),
(47,	'josss',	'jummm\r\n',	47,	1,	0),
(48,	'josss',	'bisa ter trackk',	47,	2,	0),
(49,	'josss',	'mulai dari awal',	47,	3,	0),
(50,	'09123',	'jossss',	43,	3,	0),
(52,	'12380172',	'harusnya bisa di rubah',	45,	2,	0),
(53,	'wewew',	'harusnya bisa di rubah',	45,	3,	0),
(54,	'12312412',	'jossss',	43,	4,	0),
(55,	'qweqw',	'harusnya bisa di rubah',	45,	4,	0),
(56,	'qweqw',	'harusnya bisa di rubah',	45,	5,	1),
(57,	'bcdef',	'test',	28,	7,	0),
(58,	'12312412',	'jossss',	43,	5,	0),
(59,	'bcdef',	'test',	28,	8,	0),
(60,	'12312412',	'jossss',	43,	6,	0),
(61,	'josss',	'mulai dari awal',	47,	4,	1);

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
(1,	'qweqwe',	'qweqw',	1,	1,	0),
(2,	'qwe',	'qweqwe',	2,	1,	0),
(3,	'qweqwe',	'qweqw',	1,	2,	0),
(4,	'qweqwe',	'qweqw',	1,	3,	0),
(5,	'qweqwe',	'qweqw',	1,	4,	1),
(6,	'jos',	'godan',	6,	1,	0),
(7,	'qwdqw',	'qwdqwe',	2,	2,	0),
(8,	'wefwe',	'wefwefwe',	2,	3,	0),
(9,	'123123',	'godan',	6,	2,	0);

DROP TABLE IF EXISTS `output`;
CREATE TABLE `output` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `satker_id` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `satker_id` (`satker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `satker`;
CREATE TABLE `satker` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(25) NOT NULL,
  `satker` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal_dipa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nomor_dipa` varchar(30) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `suboutput`;
CREATE TABLE `suboutput` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `output_uid` bigint(20) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '1',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `output_id` (`output_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2013-03-06 00:25:06
