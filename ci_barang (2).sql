-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2021 pada 08.16
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`) VALUES
('B000001', 'Lenovo Ideapad 1550', 1, 1, 3),
('B000002', 'Samsung Galaxy J1 Ace', 50, 1, 4),
('B000003', 'Aqua 1,5 Liter', 20, 3, 2),
('B000004', 'Mouse Wireless Logitech M220', 20, 1, 7),
('B000005', 'sukro', 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `user_id`, `barang_id`, `jumlah_keluar`, `tanggal_keluar`) VALUES
('T-BK-19082000001', 1, 'B000003', 35, '2019-08-20'),
('T-BK-19082000002', 1, 'B000002', 10, '2019-08-20'),
('T-BK-19092000003', 1, 'B000001', 5, '2019-09-20'),
('T-BK-19092000004', 1, 'B000003', 150, '2019-09-20'),
('T-BK-19092000005', 1, 'B000004', 10, '2019-09-20'),
('T-BK-19092200006', 1, 'B000003', 100, '2019-09-22'),
('T-BK-21010100001', 1, 'B000003', 700, '2021-01-01'),
('T-BK-21011400001', 1, 'B000001', 1, '2021-01-14'),
('T-BK-21011500001', 1, 'B000001', 2, '2021-01-15'),
('T-BK-21011500002', 1, 'B000001', 26, '2021-01-15');

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `supplier_id`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-19082000001', 2, 1, 'B000003', 800, '2019-08-20'),
('T-BM-19082000002', 3, 1, 'B000001', 20, '2019-08-20'),
('T-BM-19082000003', 3, 1, 'B000002', 10, '2019-08-20'),
('T-BM-19082000004', 1, 1, 'B000004', 15, '2019-08-20'),
('T-BM-19092000005', 3, 1, 'B000002', 40, '2019-09-20'),
('T-BM-19092000006', 2, 1, 'B000003', 50, '2019-09-20'),
('T-BM-19092200007', 3, 1, 'B000004', 15, '2019-09-22'),
('T-BM-19092200008', 1, 1, 'B000003', 135, '2019-09-22'),
('T-BM-21010100001', 1, 1, 'B000003', 20, '2021-01-01'),
('T-BM-21010800001', 1, 1, 'B000001', 15, '2021-01-08'),
('T-BM-21011500001', 1, 1, 'B000005', 1, '2021-01-15');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detail_barang` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `id_barang` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_barang`
--

INSERT INTO `detail_barang` (`id_detail_barang`, `nama_barang`, `id_barang`) VALUES
(1, 'lqwer', 'B000001'),
(2, 'asdw1', 'B000002'),
(3, 'asdw2', 'B000003'),
(4, 'asdw3', 'B000004'),
(5, 'asdw4', 'B000005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Laptop'),
(4, 'Handphone'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Pack'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'Ahmad Hasanudin', '085688772971', 'Kec. Cigudeg, Bogor - Jawa Barat'),
(2, 'Asep Salahudin', '081341879246', 'Kec. Ciampea, Bogor - Jawa Barat'),
(3, 'Filo Lial', '087728164328', 'Kec. Ciomas, Bogor - Jawa Barat'),
(4, 'hasan', '09090909', 'jl.cikapundung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('gudang','admin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 'd5f22535b639d55be7d099a7315e1f7f.png', 1),
(7, 'Arfan ID', 'arfandotid', 'arfandotid@gmail.com', '081221528805', 'gudang', '$2y$10$5es8WhFQj8xCmrhDtH86Fu71j97og9f8aR4T22soa7716kAusmaeK', 1568691611, 'user.png', 1),
(8, 'Muhammad Ghifari Arfananda', 'mghifariarfan', 'mghifariarfan@gmail.com', '085697442673', 'gudang', '$2y$10$5SGUIbRyEXH7JslhtEegEOpp6cvxtK6X.qdiQ1eZR7nd0RZjjx3qe', 1568691629, 'user.png', 1),
(13, 'Arfan Kashilukato', 'arfankashilukato', 'arfankashilukato@gmail.com', '081623123181', 'gudang', '$2y$10$/QpTunAD9alBV5NSRJ7ytupS2ibUrbmS3ia3u5B26H6f3mCjOD92W', 1569192547, 'user.png', 1),
(14, 'Muhammad Dzihan', 'dzihan', 'muhammaddzihan55@gmail.com', '085864998312', 'gudang', '$2y$10$blJXQ4xegp8Dm6J/xJFwjeLvCshM6I9MDTCeU71d0RY6SvXmCWt4G', 1608801814, 'user.png', 1),
(15, 'dwidzi', 'dzihan98', 'muhammaddzihan@yahoo.com', '085864998312', 'gudang', '$2y$10$yZ4sHa4EkszNA5J7HdCKguCQUHnCdewMaGyKgbm0Ri1YXDqzACicK', 1608801970, 'user.png', 1),
(16, 'c', 'asdw', 'c@g.com', '09090909', 'gudang', '$2y$10$knxeV9maltHI2mhNw7pbi.y0I.Z7Kgir8W/CVHhTBsVShr9Bbb5U2', 1609486658, 'user.png', 1),
(17, 'hans', 'dz', 'muhammaddzihan66@yahoo.com', '085864998312', 'gudang', '$2y$10$tSK1zZ6XVy7eQJVqfEr23uCpQfwbvSRvGfgGus67YhT7qJniT5G7a', 1610067580, 'user.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detail_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
