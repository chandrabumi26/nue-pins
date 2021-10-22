-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 06:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nuepins`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'ciko', 'tujuh puluh', 'chandra.bumi@yahoo.com', '$2y$10$KAe9JmvL6nZx9coywkqdqO1jmtHXHQChQPXFFOuhck1UYnywNUtQa'),
(2, 'Ekadriani', 'Fitria', 'nuepins.admn@gmail.com', '$2y$10$nvr5qlG3edbb2Z3VNpR.teUNm1lKlaSFHbvyDYCiSNW/rgtkFKkzS');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `total_pembayaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `kode_pembayaran` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `resi` varchar(255) DEFAULT NULL,
  `total_gross` int(11) NOT NULL,
  `isDelivered` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `order_id`, `id_produk`, `id_user`, `quantity`, `status_pembayaran`, `status_pemesanan`, `payment_type`, `kode_pembayaran`, `order_date`, `pdf_url`, `resi`, `total_gross`, `isDelivered`) VALUES
(92, '1811099890', 30, 67, 1, 'pending', 'Already delivered', 'Bank Transfer bca', '82876400435', '2021-06-11', 'https://app.sandbox.midtrans.com/snap/v1/transactions/1004aa40-7a04-43df-9401-351d65b4be3a/pdf', 'JNE - 1651507071212', 90000, 1),
(93, '1853425947', 33, 67, 1, 'pending', 'Transaksi sedang diproses', 'Bank Transfer bri', '828763257913189343', '2021-06-11', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d5fb7ff3-3010-4dee-8352-53f93c0a7505/pdf', NULL, 59000, NULL),
(94, '610330539', 16, 67, 2, 'pending', 'Transaksi sedang diproses', 'CSTORE', '055882657258', '2021-06-12', 'https://app.sandbox.midtrans.com/snap/v1/transactions/84478198-7956-479e-acf8-c5f857bfd458/pdf', NULL, 90000, NULL),
(95, '610330539', 21, 67, 1, 'pending', 'Transaksi sedang diproses', 'CSTORE', '055882657258', '2021-06-12', 'https://app.sandbox.midtrans.com/snap/v1/transactions/84478198-7956-479e-acf8-c5f857bfd458/pdf', NULL, 90000, NULL),
(98, '1454531105', 18, 67, 4, 'pending', 'Already delivered', 'Bank Transfer bca', '82876635653', '2021-07-07', 'https://app.sandbox.midtrans.com/snap/v1/transactions/46d26f0b-b78d-4d8b-bacb-2dff365f4842/pdf', 'J&T - 1820918291829', 120000, 1),
(99, '254619283', 29, 67, 2, 'pending', 'Transaksi sedang diproses', 'CSTORE', '945882657258', '2021-07-07', 'https://app.sandbox.midtrans.com/snap/v1/transactions/766c5c0d-6410-47b0-90d8-6c46f8f3be64/pdf', NULL, 180000, NULL),
(100, '506836806', 19, 67, 2, 'pending', 'Already delivered', 'Bank Transfer bca', '82876222305', '2021-07-08', 'https://app.sandbox.midtrans.com/snap/v1/transactions/69a2abae-16f3-4560-bea7-b15810df983f/pdf', 'J&T - 154154141', 90000, 1),
(101, '506836806', 16, 67, 1, 'pending', 'Already delivered', 'Bank Transfer bca', '82876222305', '2021-07-08', 'https://app.sandbox.midtrans.com/snap/v1/transactions/69a2abae-16f3-4560-bea7-b15810df983f/pdf', 'J&T - 154154141', 90000, 1),
(104, '1565030658', 29, 67, 1, 'pending', 'Transaksi sedang diproses', 'Bank Transfer bca', '82876097413', '2021-07-11', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a61616cb-cdc6-41f2-8165-d6c2bfb06b0d/pdf', NULL, 90000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga_produk` double NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stock` int(11) NOT NULL,
  `total_sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar_produk`, `harga_produk`, `kategori`, `deskripsi`, `stock`, `total_sold`) VALUES
(16, 'Lemonade Hairclip', 'Screenshot_4.png', 30000, 'JepitRambut', 'Homemade hairclip / hairpins with a chrome color of wood. You should have something unique inside your bags!. Feel free to choose!', 3, 7),
(17, 'Red Du Soul Hairclip', 'Screenshot_5.png', 30000, 'JepitRambut', 'Homemade hairclip / hairpins with combine of red and yellow color on black based clip. You should have something unique inside your bags!. Feel free to choose!', 1, 4),
(18, 'Lumier Hairclip', 'Screenshot_6.png', 30000, 'JepitRambut', 'Homemade hairclip / hairpins with lumier based color. You should have something unique inside your bags!. Feel free to choose!', 1, 3),
(19, 'Rosea Hairclip', 'Screenshot_7.png', 30000, 'JepitRambut', 'Homemade hairclip / hairpins with chrome color of cream pink on black clip. You should have something unique inside your bags!. Feel free to choose!', 2, 2),
(20, 'Poppin Sun', 'Screenshot_8.png', 30000, 'JepitRambut', 'Homemade hairclip / hairpins with cute Sun buttons. You should have something unique inside your bags!. Feel free to choose!', 3, 6),
(21, 'Mollis Pink', 'Screenshot_9.png', 30000, 'JepitRambut', 'Homemade hairclip / pins with glossy pink buttons. You should have something unique inside your bags!. Feel free to choose!', 6, 2),
(22, 'Dulcinea', 'Screenshot_13.png', 30000, 'JepitRambut', 'Homemade hair clip / pin with beautiful gold and white color. You should have something unique inside your bags!. Feel free to choose!', 1, 1),
(25, 'Teardrops Heaven', 'Screenshot_1.png', 30000, 'JepitRambut', 'Homemade hairclip / pins with unique glossy gold clip color. You should have something unique inside your bags!. Feel free to choose!', 1, 4),
(26, 'Orange Pleasure Choker', 'Screen_Shot_2021-05-19_at_20_10_57.png', 90000, 'Kalung', 'Homemade Necklace with orange beautiful pearl. You should have something unique inside your bags!. Feel free to choose!', 3, 6),
(28, 'Suncation Choker', 'Screen_Shot_2021-05-19_at_20_10_45.png', 90000, 'Kalung', 'Homeamde necklace with yellow and purple beads. You should have something unique inside your bags!. Feel free to choose!', 3, 3),
(29, 'Dear Daisy Choker', 'Screen_Shot_2021-05-19_at_20_11_14.png', 90000, 'Kalung', 'Homemade necklace with cute daisy face. You should have something unique inside your bags!. Feel free to choose!', 1, 5),
(30, 'Dear Vior Choker', 'Screen_Shot_2021-05-19_at_20_11_33.png', 90000, 'Kalung', 'Homemade necklacer with beautiful red of vior. You should have something unique inside your bags!. Feel free to choose!', 3, 8),
(31, 'Dear Gloomy Choker', 'Screen_Shot_2021-05-19_at_20_12_23.png', 90000, 'Kalung', 'Homeamde necklace with colour of gloomy mood. You should have something unique inside your bags!. Feel free to choose!', 7, 6),
(32, 'Icing Crystal Choker & Bracelet', 'Screen_Shot_2021-05-19_at_20_09_42.png', 130000, 'Kalung', 'Homemade necklace and bracelet with pure color of crystals', 7, 4),
(33, 'Nue Pins', 'Screenshot_11.png', 59000, 'Strap', 'Homemade Rubber Strap with beads and extraordinary design', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_handphone` varchar(15) DEFAULT NULL,
  `is_emailActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `firstname`, `lastname`, `alamat`, `no_handphone`, `is_emailActive`) VALUES
(67, 'pablo.breakbot@gmail.com', '$2y$10$0nuEo/ZDMfUal51UDp2SKuizwM7KHhegGna71SX2thqDFPIQ3pcJa', 'Pablo', 'Cigar', NULL, '085882657258', 1),
(74, 'baihaqsani24@gmail.com', '$2y$10$Czawmxgl4OWfgjpsFMowjOVkRSw1saDKfrl9sWSrby27BoFGcwzT.', 'baqo', 'bako', NULL, '1234', 0),
(75, 'chandra.bumi@student.ub.ac.id', '$2y$10$lRtlweFihA9dGfWsxNizMu5Dg21qcWid6D23kI1GzPdfdY47A1pSm', 'Dorojatun', 'bumi', NULL, '0858826572', 0),
(76, 'chandra.bumi@yahoo.com', '$2y$10$6kl0SYgUF2YjPlWfR2UAzOpDPTkHkH3Brw1CovPetCzNcgWz0Pjpu', 'tes123', 'tes123', NULL, 'abcde', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(11, 'baihaqsani24@gmail.com', 'Hi0JwXWoIS9vRcIn45IF+7DHTd7jJ/OY1unaRsm/4KY=', 1633524573),
(12, 'chandra.bumi@student.ub.ac.id', 'dAmP2WVBcbnValy8/WELA/eEYXaiyQNWN84v8qzn09I=', 1633525392),
(13, 'chandra.bumi@yahoo.com', 'oKi2yD6BmG1TF5QHiRZyl+Ru/p9eArldiGFzNzRKSjM=', 1633526193);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `idx_user` (`id_user`),
  ADD KEY `idx_produk` (`id_produk`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `idx_userpemesanan` (`id_user`),
  ADD KEY `idx_produkpemesanan` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD CONSTRAINT `keranjang_belanja_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_belanja_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
