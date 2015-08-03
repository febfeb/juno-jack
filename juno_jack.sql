-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `kode` varchar(20) NOT NULL COMMENT 'SKU',
  `warna` int(11) NOT NULL,
  `review` decimal(3,2) NOT NULL DEFAULT '0.00' COMMENT 'rata2 review',
  `kelompok` int(10) NOT NULL COMMENT 'kelompok untuk mengelompokkan warna',
  `harga_beli` bigint(20) NOT NULL,
  `harga_normal` bigint(20) NOT NULL,
  `harga_promo` bigint(20) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `overview_1` text,
  `overview_2` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `warna` (`warna`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`warna`) REFERENCES `warna` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `barang_stok`;
CREATE TABLE `barang_stok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `barang_id` (`barang_id`),
  KEY `toko_id` (`toko_id`),
  CONSTRAINT `barang_stok_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`),
  CONSTRAINT `barang_stok_ibfk_2` FOREIGN KEY (`toko_id`) REFERENCES `toko` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `barang_thumbnail`;
CREATE TABLE `barang_thumbnail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `url` varchar(50) NOT NULL COMMENT 'URL foto',
  PRIMARY KEY (`id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `barang_thumbnail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL DEFAULT '0' COMMENT 'jumlah barang pada kategori tersebut. tidak real time',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'parent id dari kategori jika kategori bertingkat',
  `tingkat` int(11) NOT NULL DEFAULT '1' COMMENT 'tingkat dari kedalaman kategori',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `total_biaya` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `keranjang_detail`;
CREATE TABLE `keranjang_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `keranjang_id` (`keranjang_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `keranjang_detail_ibfk_1` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`),
  CONSTRAINT `keranjang_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toko_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `toko_id` (`toko_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`toko_id`) REFERENCES `toko` (`id`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  `total_harga` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 = belum lunas, 1 = lunas',
  `batas_garansi` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `barang_id` (`barang_id`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `toko`;
CREATE TABLE `toko` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keterangan_buka` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `toko` (`id`, `nama`, `alamat`, `longitude`, `latitude`, `telepon`, `email`, `keterangan_buka`) VALUES
(1,	'Surabaya',	'SPR C-22',	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL COMMENT 'URL tidak boleh sama',
  `jenis` varchar(1) NOT NULL DEFAULT 'b' COMMENT 'b = barang, k = kategori, m = merk',
  `data_id` int(11) NOT NULL COMMENT 'primary key dari record',
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `level_id` int(1) NOT NULL DEFAULT '3' COMMENT '1 = admin, 2 = pegawai, 3 = user biasa ',
  `alamat` varchar(100) DEFAULT NULL,
  `login_terakhir` datetime NOT NULL,
  `logout_terakhir` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `warna`;
CREATE TABLE `warna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `rgb` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `warna` (`id`, `nama`, `rgb`) VALUES
(1,	'Black',	'000000'),
(2,	'White',	'FFFFFF');

-- 2015-07-27 06:45:51
