-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Sep 2021 pada 16.45
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kd_cus` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kd_cus`, `nama`, `alamat`, `no_telp`, `username`, `password`, `gambar`) VALUES
('20210821105338', 'Mochammad Ronaldo Baharsyah', 'Perum Bluru Permai FI 22', '083831672608', 'edovei', '5a8f6fda048282211ad5d214b7a7fece173005da', ''),
('20210902133040', 'Joni', 'Jepang', '089724862445', 'joni', '12345', '../admin/gambar_customer/IMG-20180121-WA0004.jpg'),
('20210907211450', 'Gembor', 'Krian', '089724862445', 'jo', '8cb2237d0679ca88db6464eac60da96345513964', '../admin/gambar_customer/antimandimandiclub.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `bayar_via` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `status` enum('Sudah Bayar','Belum Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `tanggal`, `jumlah`, `bukti_transfer`, `status`) VALUES
(1, '20200710151929', '20200710151929', 'Cash On Delivery (COD)', '2021-08-29 12:55:38', 6500000, '', 'Belum Bayar'),
(2, '20210902133040', '20210902133040', 'Cash On Delivery (COD)', '2021-09-02 13:34:28', 8000000, '0', ''),
(3, '20210907211450', '20210907211450', 'Cash On Delivery (COD)', '2021-09-11 12:29:16', 30000000, '0', ''),
(4, '20210907211450', '20210907211450', 'Cash On Delivery (COD)', '2021-09-20 21:08:02', 4000000, '0', ''),
(5, '20210907211450', '20210907211450', 'Cash On Delivery (COD)', '2021-09-20 21:13:24', 30000000, '0', 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `nopo` varchar(20) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `status` enum('Proses Masak','Otw Kirim','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`nopo`, `tanggalkirim`, `status`) VALUES
('20200710122913', '2020-07-10', 'Selesai'),
('20200710151929', '2020-07-10', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `status_pelayanan` enum('Belum Bayar','Batal','Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `nama`, `tanggal`, `qty`, `total`, `status_pelayanan`) VALUES
(1, '20200710151929', '20200710151929', 77, 'Special', '2021-08-29', 1, 6500000, 'Belum Bayar'),
(2, '20210902133040', '20210902133040', 83, 'Dekorasi Rumah', '2021-09-02', 1, 8000000, 'Belum Bayar'),
(5, '20210907211450', '20210907211450', 82, 'Dekorasi Outdoor', '2021-09-24', 1, 30000000, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `jenis`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(67, 'Bronze', 'Foto ', '2500000', 'Foto', 5, 'gambar_produk/wedding1.jpg'),
(72, 'Platinum', 'MUA', '4000000', 'Make Up Resepsi - 3 Gaun Sepasang', 5, 'gambar_produk/3.jpeg'),
(73, 'Gold', 'MUA', '1500000', 'Make up akad nikah - Kebaya Akad - Beskap/Basofi - Bunga Melati', 5, 'gambar_produk/2.jpeg'),
(74, 'Silver', 'MUA', '1000000', 'Make up Akad Nikah - Kebaya Akad - Beskap/Basofi', 1, 'gambar_produk/1.jpeg'),
(76, 'Titanium', 'MUA', '6000000', 'Make Up Resepsi, 3 Gaun Sepasang, Make Up terima Tamu, Make Up Kembar Mayang, Make Up Ibu bapak , Bunga melati + alat panggih', 1, 'gambar_produk/4.jpeg'),
(77, 'Special', 'MUA', '6500000', 'Make up resepsi, 3x ganti, make up terima tamu (4 orang + baju), make up kembar mayang (2 psang + baju), Make up ibu dan bapak + baju, bunga melati + alat panggih, sasak rambut', 0, 'gambar_produk/5.jpeg'),
(78, 'Dekorasi G Titanium', 'Dekorasi', '45000000', 'Pelaminan (16-20 m), Dekor Bunga Segar, Taman depan pelaminan, Meja & kursi Akad, Background music corner, Standing flower 6 buah, Photobooth, Pergola, Bunga Jalan, Karpet jalan, Kotak uang 2 Buah, Buket Bunga Pengantin & Boutonniere', 1, 'gambar_produk/dekor2.jpg'),
(79, 'Dekorasi G Platinum ', 'Dekorasi', '30000000', 'Pelaminan (12-14 m), Dekor Bunga Segar, Taman depan pelaminan, Meja & kursi Akad, Background music corner, Standing flower 6 buah, Photobooth, Pergola, Bunga Jalan, Karpet jalan, Kotak uang 2 Buah, Buket Bunga Pengantin & Boutonniere', 0, 'gambar_produk/dekor2.jpg'),
(80, 'Dekorasi G Gold', 'Dekorasi', '25000000', 'Pelaminan (8-10 m), Dekor Bunga Segar, Taman depan pelaminan, Meja & kursi Akad, Background music corner, Standing flower 6 buah, Photobooth, Pergola, Bunga Jalan, Karpet jalan, Kotak uang 2 Buah, Buket Bunga Pengantin & Boutonniere', 1, 'gambar_produk/dekor2.jpg'),
(81, 'Dekorasi G Silver', 'Dekorasi', '17000000', 'Pelaminan (6-8 m), Dekor Bunga Segar, Taman depan pelaminan, Meja & kursi Akad, Background music corner, Standing flower 6 buah, Photobooth, Pergola, Bunga Jalan, Karpet jalan, Kotak uang 2 Buah, Buket Bunga Pengantin & Boutonniere', 1, 'gambar_produk/dekor2.jpg'),
(82, 'Dekorasi Outdoor', 'Dekorasi', '30000000', 'Pelaminan (8-12 m), Dekor Bunga Segar, Taman depan pelaminan, Meja & Kursi Akad, Background Music Corner, Standing Flower 2, Photoboth, Pergola, Bunga Jalan, Karpet Jalan, Standing Lamp, Kotak Uang 2, Buket Bunga Pengantin & Boutonniere', 0, 'gambar_produk/dekor1.jpg'),
(83, 'Dekorasi Rumah', 'Dekorasi', '8000000', 'Pelaminan (6-8), Dekor Bunga Segar, Taman Depan Pelaminan, Standing flower 6 buah, Bunga Jalan, Kotak Uang 2, Buket Bunga Pengantin & Boutonniere, Transport Wilayah Pasuruan dan sekitarnya', 0, 'gambar_produk/dekor3.jpg'),
(84, 'Dekorasi Akad Duduk', 'Dekorasi', '4000000', 'Backdrop Ukuran 4 Meter, Meja & Kursi Akad, Table setting Akad, Bunga Segar Minimalis, Bukket Bunga Mawar, Karpet, Board & Stand, Tranpost Wilayah Pasuruan dan sekitarnya', 0, 'gambar_produk/dekor3.jpg'),
(85, 'Paket 5000 Watt', 'Sound Sistem', '3000000', '4X Malioboro, 4X Single 18 Inch, 2X Monitor Huper, 2X Mic Wireless, 2X Mic Kabel, Mixer X32 Core', 1, 'gambar_produk/sound2.jpg'),
(86, 'Paket 10000 Watt', 'Sound Sistem', '8000000', '8X Malioboro line array, 12X Sub 18inch Single, 2X Mixer Behringer X32 (FOH & Monitor, 4X Monitor Aktif Huper, 1 Set Speaker Setfill, 1X Drum Tama, 2X Backline Jazz Chorus, 1X Backline GK, 4X Mic Wireless', 1, 'gambar_produk/sound3.jpg'),
(87, 'Paket Band Wedding', 'Sound Sistem', '3000000', '7 Chanel Instrument, Stand Keyboard 1 pcs, Stand Book 4 pcs, Stand Mic 3 pcs, Stand Gitar/bass 1 pcs, Speaker Monitor 5 pcs', 1, 'gambar_produk/sound1.jpg'),
(88, 'coba', 'Foto', '1000000', 'coba', 1, 'gambar_produk/dekor1.jpg'),
(89, 'coba', 'Video', '2000000', 'coba', 1, 'gambar_produk/4.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_po_terima`
--

CREATE TABLE `tmp_po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(10) NOT NULL,
  `kd_cus` varchar(10) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'gambar_admin/start ary.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indexes for table `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tmp_po_terima`
--
ALTER TABLE `tmp_po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
