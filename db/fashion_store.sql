-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_produk`, `quantity`) VALUES
(39, 1, 18, 1),
(41, 1, 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'baju anak'),
(2, 'baju perempuan'),
(5, 'baju laki-laki'),
(7, 'aksesoris'),
(8, 'laki-laki'),
(9, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `total_harga` decimal(10,2) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `ppn` decimal(10,2) DEFAULT 0.00,
  `alamat_pengiriman` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `status`, `total_harga`, `tanggal_order`, `ppn`, `alamat_pengiriman`, `catatan`, `id_admin`) VALUES
(18, 1, 'approved', 400000.00, '2024-12-05 02:17:57', 0.00, 'Jl  pipa putih dusun 4 pipa putih pemulutan', 'bawanya harus hati-hati', 5),
(19, 1, 'approved', 897750.00, '2024-12-05 15:47:59', 0.00, 'jl meranti pipa putih rt 08 rw 4 kertapati kota palembang', 'Tolong Dibawa dengan hati-hati', 5),
(20, 1, 'rejected', 200000.00, '2024-12-06 15:18:37', 0.00, 'Jl  pipa putih dusun 4 pipa putih pemulutan', 'dibawah hati2 agar aman', 5),
(21, 1, 'approved', 240000.00, '2024-12-06 15:34:38', 0.00, 'jl meranti pipa putih rt 08 rw 4 kertapati kota palembang', 'bagus', 5),
(22, 1, 'rejected', 362000.00, '2024-12-08 16:12:29', 0.00, 'Jl  pipa putih dusun 4 pipa putih pemulutan', 'barang harus dibawa dengan hati-hati', 5),
(24, 1, 'pending', 222000.00, '2024-12-08 16:39:35', 0.00, 'Jl  pipa putih dusun 4 pipa putih pemulutan', 'Harus dibawa hati-hati', NULL),
(25, 1, 'pending', 140000.00, '2024-12-08 16:40:18', 0.00, 'jl meranti pipa putih rt 08 rw 4 kertapati kota palembang', 'Barang Harus sampai tujuan tanpa lecet', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id_order_item`, `id_order`, `id_produk`, `quantity`, `harga`) VALUES
(1, 1, 17, 1, 97750.00),
(2, 2, 4, 1, 222000.00),
(3, 2, 15, 1, 250000.00),
(4, 3, 13, 1, 220000.00),
(5, 3, 17, 1, 97750.00),
(6, 4, 4, 1, 222000.00),
(7, 5, 13, 1, 220000.00),
(8, 6, 15, 1, 250000.00),
(9, 7, 4, 1, 222000.00),
(10, 8, 15, 1, 250000.00),
(11, 9, 15, 1, 250000.00),
(12, 10, 13, 1, 220000.00),
(13, 11, 15, 1, 250000.00),
(14, 12, 18, 1, 240000.00),
(15, 13, 4, 1, 222000.00),
(16, 13, 17, 1, 97750.00),
(17, 14, 10, 1, 220000.00),
(18, 15, 39, 1, 270000.00),
(19, 16, 38, 1, 350000.00),
(20, 17, 25, 1, 150000.00),
(21, 18, 35, 1, 400000.00),
(22, 19, 17, 1, 97750.00),
(23, 19, 18, 1, 240000.00),
(24, 19, 37, 2, 280000.00),
(25, 20, 19, 1, 200000.00),
(26, 21, 18, 1, 240000.00),
(27, 22, 4, 1, 222000.00),
(28, 22, 28, 2, 70000.00),
(29, 23, 27, 1, 190000.00),
(30, 24, 4, 1, 222000.00),
(31, 25, 28, 2, 70000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok` int(255) NOT NULL,
  `diskon` int(11) DEFAULT 0,
  `harga_diskon` decimal(10,2) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `nama`, `harga`, `deskripsi_produk`, `gambar_produk`, `stok`, `diskon`, `harga_diskon`, `kategori`, `id_kategori`) VALUES
(4, 'Cardigan Knit Coklat Muda', 222000.00, 'Cardigan rajut dengan warna coklat muda yang hangat dan nyaman.', 'cardi1.jpg', 15, 0, 222000.00, NULL, 9),
(17, 'Gelang Aesthetic', 115000.00, 'kualitas barang bagus', 'sale1.png', 15, 15, 97750.00, NULL, 7),
(18, 'Sepatu Sneakers Stylish', 300000.00, 'kualitas sepatu bagus', 'sale2.png', 30, 20, 240000.00, NULL, 9),
(19, 'Cardigan white', 200000.00, 'barang bagus', 'cardi4.jpg', 20, 5, 190000.00, NULL, 9),
(20, 'Cardigan peach', 220000.00, 'barang bagus', 'cardi10.jpg', 22, 0, NULL, NULL, 9),
(21, 'Celana Jeans', 250000.00, 'bagus', 'celana1.jpg', 25, 0, NULL, NULL, 9),
(22, 'Baret Peach', 100000.00, 'bagus', 'topiwanita1.jpg', 10, 0, NULL, NULL, 9),
(23, 'Tas Pink', 300000.00, 'bagus', 'tas1.jpg', 30, 0, NULL, NULL, 9),
(24, 'Rok Brown', 250000.00, 'bagus', 'rok2.jpg', 25, 0, NULL, NULL, 9),
(25, 'Hodie Grey', 150000.00, 'kualitas bagus', 'hoodie1.jpg', 15, 0, NULL, NULL, 8),
(28, 'Topi Black', 70000.00, 'bagus', 'topicowo5.jpg', 7, 0, NULL, NULL, 8),
(29, 'Tas Black', 240000.00, 'bagus', 'tascowo3.jpg', 25, 0, NULL, NULL, 8),
(31, 'Celana Hitam', 280000.00, 'bagus', 'celanacowo4.jpg', 28, 0, NULL, NULL, 8),
(32, 'anting-anting emas', 290000.00, 'bagus', 'anting1.jpg', 29, 0, NULL, NULL, 7),
(33, 'anting-anting Pita', 320000.00, 'bagus', 'anting2.jpg', 32, 0, NULL, NULL, 7),
(34, 'Gelang Mutiara', 330000.00, 'bagus', 'gelang1.jpg', 33, 0, NULL, NULL, 7),
(35, 'Gelang Kristal', 400000.00, 'bagus', 'gelang8.jpg', 4, 0, NULL, NULL, 7),
(36, 'Tas Pinky', 290000.00, 'bagus', 'taswanita3.jpg', 29, 0, NULL, NULL, 7),
(37, 'Tas Cookie', 280000.00, 'bagus', 'taswanita2.jpg', 28, 0, NULL, NULL, 7),
(38, 'Heels Aesthetic', 350000.00, 'bagus', 'heels7.jpg', 36, 0, NULL, NULL, 7),
(40, 'Jam Tangan Perak', 350000.00, 'bagus', 'jam6.jpg', 5, 0, 350000.00, NULL, 7),
(44, 'Flat Shoes Aeshtetic', 250000.00, 'Barangnya, bahan dan kualitasnya bagus.', 'flatshoes12.jpg', 25, 0, NULL, NULL, 7),
(45, 'Kacamata Black', 150000.00, 'Kualitas Barang Bagus', 'kacamata2.jpg', 15, 0, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_review`, `id_order`, `id_user`, `rating`, `review`, `created_at`) VALUES
(0, 19, 1, 5, 'Kualitas Barangnya bagus', '2024-12-08 16:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'utari', '$2y$10$r5Vty9IhJNNTb.MtjJjkd.v.g1l8d7Dt.lF/R.78RPfkIWtJGwmeO', 'user'),
(5, 'admin', '$2y$10$.6YbbU0nfSGtn7zrrV63JunaD12xJl6OJP8NwdiAUomlyL36Eyx7i', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_order_item`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
