-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 03:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawndry`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_merchant`
--

CREATE TABLE `detail_merchant` (
  `id` int(11) NOT NULL,
  `id_merchant` int(11) NOT NULL,
  `nama_layanan` int(11) NOT NULL,
  `type_pakaian` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE `laundry` (
  `id` varchar(3) NOT NULL,
  `nama_administrator` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_laundry` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `syarat_ketentuan` varchar(2000) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`id`, `nama_administrator`, `email`, `nama_laundry`, `logo`, `alamat`, `no_hp`, `deskripsi`, `syarat_ketentuan`, `status`) VALUES
('001', 'Eben Laundry', 'eben@gmail.com', 'Eben Laundry', '01-thumbnail5.jpg', 'Jl. Batu Raya No.12,  RT.4/RW.7, Menteng Atas, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960', '09129078798', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1'),
('038', 'Shaba Laundry', 'Shaba@gmail.com', 'Shaba Laundry', '02-thumbnail1.jpg', 'Jl. Taman Setia Budi I No.5, RT.2/RW.RW, Kuningan, Setia Budi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910 ', '012081298987', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1'),
('397', 'Laundrette', 'laundrette@gmail.com', 'Laundrette', '04-thumbnail.jpg', 'Jl. Mega Kuningan Barat No.3, RT.1/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950 ', '092197281823', 'Laundry jemput antar memudahkan para pelanggan untuk tetap nyaman di rumah sampai cucian bersih dan siap dipakai. Tidak Repot dan efisien.', '1.	Cuci kiloan diproses langsung dengan mesin cuci memakai aturan normal cycle dan dikeringkan dengan tumble dryer memakai aturan normal heat.\r\n2.	Kami tidak bertanggung jawab atas kerusakan pakaian yang diakibatkan oleh mesin. Apabila bahan pakaian Anda membutuhkan penanganan khusus, harap memakai jasa cuci satuan kami.\r\n3.	Harap menghitung sendiri dan infokan kepada admin tentang jumlah pakaian Anda sebelum kami proses. Apabila tidak dihitung dan diinformasikan, kami tidak bertanggung jawab atas segala kehilangan yang ada. Apabila sudah dihitung dan ada yang hilang, maka kami akan memberikan diskon 10% untuk transaksi selanjutnya.\r\n4.	Kerusakan atau kehilangan cuci satuan akan kami ganti rugi sebesar 3 kali lipat dari transaksi dan kami berhak mengambil pakaian yang rusak tersebut.\r\n5.	Klaim hanya berlaku maksimal 3 jam setelah pengambilan laundry.\r\n6.	Periksa saku sebelum ke binatu. Kami tidak bertanggung jawab atas barang yang hilang karena tertinggal di dalam cucian.\r\n7.	Cucian yang tidak diambil dalam waktu lebih dari 30 hari di luar tanggung jawab kami. Lebih dari 60 hari maka akan kami donasikan kepada yang membutuhkan.\r\n8.	Cucian yang diambil harus disertai struk dan harus sudah dilunasi. Karyawan kami berhak untuk tidak memberikan cucian apabila customer tidak membawa struk atau belum melunasi pembayaran untuk menghindari hal-hal yang tidak diinginkan.\r\n9.	Transaksi Anda gratis apabila karyawan kami tidak memberikan struk print berlogo COECI.\r\n10.	Delivery hanya untuk lokasi berjarak maksimal 3 kilometer dari lokasi COECI dengan minimal order Rp. 70.000,-. Delivery akan ditiadakan apabila kurir sedang berhalangan masuk kerja.', '1'),
('817', 'Aira Laundry', 'aira@gmail.com', 'Aira Laundry', '', 'Jl. Menteng Wadas Utara No. 22, RT.14/RW.7, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12970', '01281832173', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `id_laundry` varchar(3) NOT NULL,
  `jenis_layanan` varchar(15) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `id_laundry`, `jenis_layanan`, `nama_layanan`, `biaya`) VALUES
(1, '001', 'Kiloan', 'Cuci Komplit Reguler (2 HARI)', 8000),
(2, '001', 'Kiloan', 'Cuci Komplit Kilat – Laundry 1 Hari Selesai', 15000),
(3, '001', 'Kiloan', 'Cuci Komplit 5 Jam – Laundry Express 5 Jam Selesai', 20000),
(4, '001', 'Satuan', 'Baju Hangat / Sweater', 20000),
(5, '001', 'Satuan', 'Gaun/Baju Pengantin', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` varchar(50) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `id_pembayaran` varchar(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `alamat_penjemputan` varchar(100) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_pelanggan`, `id_pembayaran`, `total_harga`, `alamat_penjemputan`, `tanggal_transaksi`) VALUES
('19520181106557', '195', '19520181106557827', 42000, 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06'),
('19520181106109', '195', '0', 42000, 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06'),
('19520181106387', '195', '19520181106387314', 133000, 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '2018-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_laundry` varchar(6) NOT NULL,
  `jenis_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` int(8) NOT NULL,
  `berat_cucian` int(3) NOT NULL,
  `jumlah_satuan` int(3) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `tanggal_penjemputan` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_status_order` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_laundry`, `jenis_layanan`, `nama_layanan`, `harga`, `berat_cucian`, `jumlah_satuan`, `subtotal`, `tanggal_penjemputan`, `tanggal_pengembalian`, `id_status_order`) VALUES
(5, '19520181106557', '001', 'Kiloan', 'Cuci Komplit 5 Jam Laundry Express 5 Jam Selesai', 21000, 2, 0, 42000, '0000-00-00', '0000-00-00', '2'),
(6, '19520181106109', '001', 'Satuan', 'Baju Hangat Sweater', 21000, 0, 2, 42000, '0000-00-00', '0000-00-00', '1'),
(7, '19520181106387', '001', 'Kiloan', 'Cuci Komplit Kilat Laundry 1 Hari Selesai', 16000, 2, 0, 32000, '0000-00-00', '0000-00-00', '13'),
(8, '19520181106387', '001', 'Satuan', 'Gaun Baju Pengantin', 101000, 0, 1, 101000, '2018-11-10', '2018-11-15', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` varchar(20) NOT NULL,
  `nama_rek_pengirim` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nama_rek_pengirim`, `bukti_pembayaran`) VALUES
('19520181106387314', 'Arief Permana', '06-full.jpg'),
('19520181106557827', 'Arief Permana', '03-full5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id`, `status`) VALUES
(1, 'Menunggu Konfirmasi Pembayaran'),
(2, 'Menunggu Verifikasi Pembayaran'),
(3, 'Pembayaran Terverifikasi'),
(4, 'Menuggu Penjemputan Cucian ke Tempat Tujuan'),
(5, 'Cucian Sudah diambil oleh Kurir Laundry'),
(6, 'Cucian Sampai di Tempat Laundry'),
(7, 'Cucian Sedang Diproses'),
(8, 'Cucian Selesai Di Laundry'),
(9, 'Menunggu Penjemputan Kurir ke Tempat Tujuan  Pelanggan'),
(10, 'Pakaian Sudah Diambil dan Siap Untuk Diantar ke Alamat Tujuan Pelanggan'),
(11, 'Pakaian Sedang Dalam Perjalanan Kurir'),
(12, 'Pakaian Sudah Diterima Pelanggan'),
(13, 'Orderan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(120) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `handphone` varchar(13) NOT NULL,
  `address` varchar(150) NOT NULL,
  `kode` varchar(4) NOT NULL,
  `kategori` varchar(2) NOT NULL,
  `update_password` int(1) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `email`, `handphone`, `address`, `kode`, `kategori`, `update_password`, `status`) VALUES
(1, 'admin', 'admin', '52af418220f3e991061cdd941fe5c6bfae1b06debbda7c2c979e827c552abc40d6724f8d496beff524b35f0647b97fe5f64ccf6256a78b37a10f7dd0b07d9281', '', '', '', '000', '0', 1, '1'),
(2, 'ebenlaundry', 'Eben Laundry', 'f02a7511e0e2b2dab160a99db86eda0316c22dda4bbcf3e9b0dd6cc98582641fd917693734fcda8ebd68527807b45a5091f80a3853e9e074f52e8879c3c4f716', 'eben@gmail.com', '09129078798', 'Jl. Batu Raya No.12,  RT.4/RW.7, Menteng Atas, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12960', '001', '1', 0, '1'),
(5, 'laundrette', 'Laundrette', 'ae60d617fb8e52e33e375dd60f3ac1f2ebca7b38dff8ed6197cf24781618dc497c574eb90c09b342fe7e6381a780662cc3a2e6528cec32bd6fc35bc3726cdc77', 'laundrette@gmail.com', '09219728182', 'Jl. Mega Kuningan Barat No.3, RT.1/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950', '397', '1', 0, '1'),
(8, 'shaba', 'Shaba Laundry', '5d6bdd762b70e0e23a1e04eba85a0a035db96738e109e63be2e642c47017dbcfd99dea6e6e32dd227fb3ab1dd3f09e576d474c20937f0e514b119bb5f655e63b', 'Shaba@gmail.com', '012081298987', 'Jl. Taman Setia Budi I No.5, RT.2/RW.RW, Kuningan, Setia Budi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12910', '038', '1', 0, '1'),
(9, 'ariefpermana', 'Arief Permana', '3a2855edd4d361e8f57ddcd0fe280942ab2e7dab4d892895cf72ac688f4b483e08c1fba18428e0e671928605b876f4a61311e98a4787ebcf4ab65d474cdb67ea', 'ariefpermana@gmail.com', '081291788799', 'jl. Anjelin 1 B-31/50 Pd. Indah rt/rw 005/008 Kutabumi, pasarkemis', '195', '2', 0, '1'),
(10, 'airalaundry', 'Aira Laundry', 'b338020af2abae361e3dc66be778f6e981ee1339f0ba74af662f45c267e11b5a7d609224d7d9889996472e8b84efa51cf06a969d3012f86668eb6a19bac0970f', 'aira@gmail.com', '01281832173', 'Jl. Menteng Wadas Utara No. 22, RT.14/RW.7, Ps. Manggis, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12970', '817', '1', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
