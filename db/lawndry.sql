/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : lawndry

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-13 03:23:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for detail_merchant
-- ----------------------------
DROP TABLE IF EXISTS `detail_merchant`;
CREATE TABLE `detail_merchant` (
  `id` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `nama_layanan` int(11) NOT NULL,
  `type_pakaian` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_merchant
-- ----------------------------

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_user` varchar(3) DEFAULT NULL,
  `id_detail_order` varchar(4) DEFAULT NULL,
  `id_status_order` varchar(4) DEFAULT NULL,
  `tanggal_status` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES ('1', '195', '16', '1', '2018-12-12');
INSERT INTO `history` VALUES ('2', '195', '17', '1', '2018-12-13');
INSERT INTO `history` VALUES ('3', '195', '18', '1', '2018-12-13');
INSERT INTO `history` VALUES ('8', '195', '18', '3', '2018-12-13');
INSERT INTO `history` VALUES ('9', '195', '16', '3', '2018-12-13');
INSERT INTO `history` VALUES ('10', '195', '18', '4', '2018-12-13');
INSERT INTO `history` VALUES ('11', '195', '18', '5', '2018-12-13');

-- ----------------------------
-- Table structure for laundry
-- ----------------------------
DROP TABLE IF EXISTS `laundry`;
CREATE TABLE `laundry` (
  `id` varchar(3) NOT NULL,
  `nama_administrator` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_laundry` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `syarat_ketentuan` varchar(2000) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of laundry
-- ----------------------------
INSERT INTO `laundry` VALUES ('001', 'Eben Laundry', 'eben@gmail.com', 'Eben Laundry', '01-thumbnail5.jpg', 'Jl. Batu Raya No.12,  RT.4/RW.7, Menteng Atas, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960    ', 'Benhill', '09129078798', '21313131313', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1');
INSERT INTO `laundry` VALUES ('038', 'Shaba Laundry', 'Shaba@gmail.com', 'Shaba Laundry', '02-thumbnail1.jpg', 'Jl. Taman Setia Budi I No.5, RT.2/RW.RW, Kuningan, Setia Budi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910 ', '', '012081298987', '', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1');
INSERT INTO `laundry` VALUES ('397', 'Laundrette', 'laundrette@gmail.com', 'Laundrette', '04-thumbnail.jpg', 'Jl. Mega Kuningan Barat No.3, RT.1/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950 ', '', '092197281823', '', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1');
INSERT INTO `laundry` VALUES ('817', 'Aira Laundry', 'aira@gmail.com', 'Aira Laundry', '', 'Jl. Menteng Wadas Utara No. 22, RT.14/RW.7, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12970', '', '01281832173', '', '', '', '');

-- ----------------------------
-- Table structure for layanan
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_laundry` varchar(3) NOT NULL,
  `jenis_layanan` varchar(15) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of layanan
-- ----------------------------
INSERT INTO `layanan` VALUES ('1', '001', 'Kiloan', 'Cuci Komplit Reguler (2 HARI)', '8000');
INSERT INTO `layanan` VALUES ('2', '001', 'Kiloan', 'Cuci Komplit Kilat – Laundry 1 Hari Selesai', '15000');
INSERT INTO `layanan` VALUES ('3', '001', 'Kiloan', 'Cuci Komplit 5 Jam – Laundry Express 5 Jam Selesai', '20000');
INSERT INTO `layanan` VALUES ('4', '001', 'Satuan', 'Baju Hangat / Sweater', '20000');
INSERT INTO `layanan` VALUES ('5', '001', 'Satuan', 'Gaun/Baju Pengantin', '100000');
INSERT INTO `layanan` VALUES ('6', '038', 'Kiloan', 'Cuci Komplit Reguler (2 HARI)', '8000');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` varchar(50) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `alamat_penjemputan` varchar(100) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('19520181106557', '195', '42000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06');
INSERT INTO `order` VALUES ('19520181106109', '195', '42000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06');
INSERT INTO `order` VALUES ('19520181106387', '195', '133000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06');
INSERT INTO `order` VALUES ('19520181111871', '195', '64000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-11');
INSERT INTO `order` VALUES ('19520181127170', '195', '100000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-27');
INSERT INTO `order` VALUES ('1952018112889', '195', '80000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-28');
INSERT INTO `order` VALUES ('19520181205974', '195', '16000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-12-05');
INSERT INTO `order` VALUES ('19520181211654', '195', '30000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-12-11');
INSERT INTO `order` VALUES ('1952018121330', '195', '200000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-12-13');
INSERT INTO `order` VALUES ('19520181213397', '195', '200000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-12-13');
INSERT INTO `order` VALUES ('19520181213221', '195', '40000', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-12-13');

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(50) NOT NULL,
  `id_laundry` varchar(6) NOT NULL,
  `id_pembayaran` varchar(20) NOT NULL,
  `jenis_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` int(8) NOT NULL,
  `berat_cucian` int(3) NOT NULL,
  `jumlah_satuan` int(3) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `tanggal_penjemputan` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_status_order` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES ('5', '19520181106557', '001', '', 'Kiloan', 'Cuci Komplit 5 Jam Laundry Express 5 Jam Selesai', '21000', '2', '0', '42000', '0000-00-00', '0000-00-00', '2');
INSERT INTO `order_detail` VALUES ('6', '19520181106109', '001', '', 'Satuan', 'Baju Hangat Sweater', '21000', '0', '2', '42000', '0000-00-00', '0000-00-00', '3');
INSERT INTO `order_detail` VALUES ('7', '19520181106387', '001', '', 'Kiloan', 'Cuci Komplit Kilat Laundry 1 Hari Selesai', '16000', '2', '0', '32000', '0000-00-00', '0000-00-00', '13');
INSERT INTO `order_detail` VALUES ('8', '19520181106387', '001', '', 'Satuan', 'Gaun Baju Pengantin', '101000', '0', '1', '101000', '2018-11-10', '2018-11-15', '12');
INSERT INTO `order_detail` VALUES ('9', '19520181111871', '001', '195201811118719213', 'Kiloan', 'Cuci Komplit Reguler2 HARI ', '8000', '4', '25', '32000', '2018-11-13', '2018-11-14', '15');
INSERT INTO `order_detail` VALUES ('10', '19520181111871', '038', '', 'Kiloan', 'Cuci Komplit Reguler2 HARI ', '8000', '2', '10', '16000', '0000-00-00', '0000-00-00', '1');
INSERT INTO `order_detail` VALUES ('11', '19520181127170', '001', '', 'Satuan', 'Gaun Baju Pengantin', '100000', '0', '1', '100000', '0000-00-00', '0000-00-00', '1');
INSERT INTO `order_detail` VALUES ('12', '1952018112889', '001', '195201811288912588', 'Kiloan', 'Cuci Komplit Reguler2 HARI ', '8000', '6', '30', '48000', '2018-11-29', '2018-12-07', '15');
INSERT INTO `order_detail` VALUES ('13', '1952018112889', '001', '', 'Kiloan', 'Cuci Komplit 5 Jam Laundry Express 5 Jam Selesai', '20000', '2', '7', '40000', '0000-00-00', '0000-00-00', '3');
INSERT INTO `order_detail` VALUES ('14', '19520181205974', '001', '', 'Kiloan', 'Cuci Komplit Reguler2 HARI ', '8000', '2', '7', '16000', '0000-00-00', '0000-00-00', '1');
INSERT INTO `order_detail` VALUES ('15', '19520181211654', '001', '', 'Kiloan', 'Cuci Komplit Kilat Laundry 1 Hari Selesai', '15000', '2', '10', '30000', '0000-00-00', '0000-00-00', '1');
INSERT INTO `order_detail` VALUES ('16', '1952018121330', '001', '', 'Satuan', 'Baju Hangat Sweater', '20000', '0', '10', '200000', '0000-00-00', '0000-00-00', '3');
INSERT INTO `order_detail` VALUES ('17', '19520181213397', '001', '', 'Satuan', 'Gaun Baju Pengantin', '100000', '0', '2', '200000', '0000-00-00', '0000-00-00', '1');
INSERT INTO `order_detail` VALUES ('18', '19520181213221', '001', '', 'Satuan', 'Baju Hangat Sweater', '20000', '0', '2', '40000', '2018-12-21', '0000-00-00', '5');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` varchar(20) NOT NULL,
  `nama_rek_pengirim` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('19520181106387314', 'Arief Permana', '06-full.jpg');
INSERT INTO `pembayaran` VALUES ('19520181106557827', 'Arief Permana', '03-full5.jpg');
INSERT INTO `pembayaran` VALUES ('195201811118719213', 'Arief Permana', 'windows10hero1.jpg');
INSERT INTO `pembayaran` VALUES ('195201811288912588', 'Arief Permana', 'windows10hero11.jpg');

-- ----------------------------
-- Table structure for review
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_laundry` varchar(4) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `nilai` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of review
-- ----------------------------
INSERT INTO `review` VALUES ('2', '001', 'Arief Permana', '2018-11-12', 'sangat puas dengan layanannya, tepat waktu dan hasil cucian nya bersih', '5');
INSERT INTO `review` VALUES ('3', '001', 'Arief Permana', '2018-11-12', 'sangat puas dengan layanannya, tepat waktu dan hasil cucian nya bersih', '3');
INSERT INTO `review` VALUES ('4', '001', 'Arief Permana', '2018-11-28', 'hasil laundry bersih dan wangi , pengerjaan tepat waktu', '4');
INSERT INTO `review` VALUES ('5', '001', 'Arief Permana', '2018-11-28', 'hasil laundry bersih dan wangi , pengerjaan tepat waktu', '3');

-- ----------------------------
-- Table structure for status_order
-- ----------------------------
DROP TABLE IF EXISTS `status_order`;
CREATE TABLE `status_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status_order
-- ----------------------------
INSERT INTO `status_order` VALUES ('1', 'Menunggu Verifikasi Order');
INSERT INTO `status_order` VALUES ('2', 'Order Di Batalkan');
INSERT INTO `status_order` VALUES ('3', 'Order Terverifikasi');
INSERT INTO `status_order` VALUES ('4', 'Menuggu Penjemputan Cucian ke Tempat Tujuan');
INSERT INTO `status_order` VALUES ('5', 'Cucian Sudah diambil oleh Kurir Laundry');
INSERT INTO `status_order` VALUES ('6', 'Cucian Sampai di Tempat Laundry');
INSERT INTO `status_order` VALUES ('7', 'Cucian Sedang Diproses');
INSERT INTO `status_order` VALUES ('8', 'Cucian Selesai Di Laundry & Menunggu Konfirmasi Pembayaran');
INSERT INTO `status_order` VALUES ('9', 'Pembayaran Dikonfirmasi');
INSERT INTO `status_order` VALUES ('10', 'Pembayaran Terverikasi');
INSERT INTO `status_order` VALUES ('11', 'Menunggu Penjemputan Kurir ke Tempat Tujuan  Pelanggan');
INSERT INTO `status_order` VALUES ('12', 'Pakaian Sudah Diambil dan Siap Untuk Diantar ke Alamat Tujuan Pelanggan');
INSERT INTO `status_order` VALUES ('13', 'Pakaian Sedang Dalam Perjalanan Kurir');
INSERT INTO `status_order` VALUES ('14', 'Pakaian Sudah Diterima Pelanggan');
INSERT INTO `status_order` VALUES ('15', 'Orderan Selesai');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `handphone` varchar(13) NOT NULL,
  `address` varchar(150) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `kategori` varchar(2) NOT NULL,
  `update_password` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', '52af418220f3e991061cdd941fe5c6bfae1b06debbda7c2c979e827c552abc40d6724f8d496beff524b35f0647b97fe5f64ccf6256a78b37a10f7dd0b07d9281', '', '', '', '000', '0', '1', '1');
INSERT INTO `user` VALUES ('2', 'ebenlaundry', 'Eben Laundry', 'f02a7511e0e2b2dab160a99db86eda0316c22dda4bbcf3e9b0dd6cc98582641fd917693734fcda8ebd68527807b45a5091f80a3853e9e074f52e8879c3c4f716', 'eben@gmail.com', '09129078798', 'Jl. Batu Raya No.12,  RT.4/RW.7, Menteng Atas, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960', '001', '1', '0', '1');
INSERT INTO `user` VALUES ('5', 'laundrette', 'Laundrette', 'ae60d617fb8e52e33e375dd60f3ac1f2ebca7b38dff8ed6197cf24781618dc497c574eb90c09b342fe7e6381a780662cc3a2e6528cec32bd6fc35bc3726cdc77', 'laundrette@gmail.com', '09219728182', 'Jl. Mega Kuningan Barat No.3, RT.1/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950', '397', '1', '0', '1');
INSERT INTO `user` VALUES ('8', 'shaba', 'Shaba Laundry', '5d6bdd762b70e0e23a1e04eba85a0a035db96738e109e63be2e642c47017dbcfd99dea6e6e32dd227fb3ab1dd3f09e576d474c20937f0e514b119bb5f655e63b', 'Shaba@gmail.com', '012081298987', 'Jl. Taman Setia Budi I No.5, RT.2/RW.RW, Kuningan, Setia Budi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910', '038', '1', '0', '1');
INSERT INTO `user` VALUES ('9', 'ariefpermana', 'Arief Permana', '3a2855edd4d361e8f57ddcd0fe280942ab2e7dab4d892895cf72ac688f4b483e08c1fba18428e0e671928605b876f4a61311e98a4787ebcf4ab65d474cdb67ea', 'ariefpermana@gmail.com', '081291788799', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '195', '2', '0', '1');
INSERT INTO `user` VALUES ('10', 'airalaundry', 'Aira Laundry', 'b338020af2abae361e3dc66be778f6e981ee1339f0ba74af662f45c267e11b5a7d609224d7d9889996472e8b84efa51cf06a969d3012f86668eb6a19bac0970f', 'aira@gmail.com', '01281832173', 'Jl. Menteng Wadas Utara No. 22, RT.14/RW.7, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12970', '817', '1', '0', '1');
