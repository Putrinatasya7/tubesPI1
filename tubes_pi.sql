-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 06:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` varchar(10) NOT NULL,
  `category_id` int(2) NOT NULL,
  `barang` varchar(200) NOT NULL,
  `merk_id` int(2) NOT NULL,
  `pict` varchar(255) NOT NULL,
  `stock` int(6) NOT NULL,
  `minimum_stock` int(6) NOT NULL,
  `harga` int(11) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(4) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` varchar(100) NOT NULL,
  `request_no` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `received_by` varchar(4) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `status` enum('received','waiting for delivery','to be ordered','sent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuid` int(2) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `collapse` enum('y','n') NOT NULL DEFAULT 'n',
  `is_active` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `menu`, `url`, `icon`, `collapse`, `is_active`) VALUES
(1, 'Dashboard', 'Auth', 'fas fa-home', 'n', '1'),
(2, 'Barang', 'Barang', 'ni ni-app', 'n', '1'),
(3, 'Supplier', 'Supplier', 'ni ni-delivery-fast', 'n', '1'),
(4, 'Request', '#collapseExample', 'ni ni-bullet-list-67', 'y', '1'),
(5, 'User', 'User', 'ni ni-single-02', 'n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` int(2) NOT NULL,
  `merk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_no` varchar(100) NOT NULL,
  `created_by` varchar(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `responded_by` varchar(4) DEFAULT NULL,
  `responded_at` datetime DEFAULT NULL,
  `status` enum('Accepted','Rejected') NOT NULL,
  `req_category` enum('In','Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_item_in`
--

CREATE TABLE `req_item_in` (
  `request_no` varchar(100) NOT NULL,
  `barang_id` varchar(10) NOT NULL,
  `qty` int(6) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `supplier_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_item_out`
--

CREATE TABLE `req_item_out` (
  `request_no` varchar(100) NOT NULL,
  `barang_id` varchar(10) NOT NULL,
  `qty` int(6) NOT NULL,
  `supplier_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_out_reason`
--

CREATE TABLE `req_out_reason` (
  `request_no` varchar(100) NOT NULL,
  `alasan_keluar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `submenuid` int(2) NOT NULL,
  `menuid` int(2) NOT NULL,
  `submenu` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`submenuid`, `menuid`, `submenu`, `url`, `icon`, `is_active`) VALUES
(1, 4, 'Permintaan Masuk', 'Request/addIn', '', '1'),
(2, 4, 'Permintaan Keluar', 'Request/addOut', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(3) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier`, `contact`, `status`) VALUES
(1, 'PT Makmur Jaya', 'makmurjaya@gmail.com', 'Inactive'),
(2, 'PT Bersama Maju', 'bersamamajupt@ptbersama.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pict` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role_id` int(1) NOT NULL,
  `is_active` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `uname`, `email`, `password`, `pict`, `created_at`, `modified_at`, `role_id`, `is_active`) VALUES
('A001', 'Jessica Wong', 'jessiwong', 'jessicawong@mail.com', '........', '', '2021-05-25 22:10:25', '2021-05-25 22:10:25', 1, 'Active'),
('A002', 'Putri Natasya', 'punat', 'putrinatasya@gmail.com', '$2y$10$uqqACchko3qRn5FHiZ4LC.nU6QwqZCF3.X/I8IM68fI8XOEfZs8wS', 'defaultusrpict.jpg', '2021-05-28 11:09:21', '2021-05-28 11:09:21', 1, 'Active'),
('M001', 'Patrisia Tambunan', 'patty', 'patrisia@gmail.com', '$2y$10$AbjVvlitpxR/DiBeXUqYuOjqLh.PqMjV2tqMIVF8/kfvtzSppX.3C', 'defaultusrpict.jpg', '2021-05-28 01:27:51', '2021-05-28 01:27:51', 2, 'Active'),
('S001', 'Mita Amelia', 'mita', 'mitaamelia@gmail.com', '$2y$10$tpxwesVPE2AQFcpyEtaiauxjxSyI6Db21fzZXRDfWPwSg0xQ3Kply', 'defaultusrpict.jpg', '2021-05-28 11:08:18', '2021-05-28 11:08:18', 3, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_merk` (`merk_id`),
  ADD KEY `fk_createdby` (`created_by`),
  ADD KEY `fk_modifiedby` (`modified_by`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `fk_invoicereqno` (`request_no`),
  ADD KEY `fk_invoicercvby` (`received_by`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_no`),
  ADD KEY `fk_reqby` (`created_by`),
  ADD KEY `fk_respby` (`responded_by`);

--
-- Indexes for table `req_item_in`
--
ALTER TABLE `req_item_in`
  ADD PRIMARY KEY (`request_no`,`barang_id`),
  ADD KEY `brgiditemin` (`barang_id`),
  ADD KEY `fk_supid_itemin` (`supplier_id`);

--
-- Indexes for table `req_item_out`
--
ALTER TABLE `req_item_out`
  ADD PRIMARY KEY (`request_no`,`barang_id`),
  ADD KEY `brgiditemout` (`barang_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `req_out_reason`
--
ALTER TABLE `req_out_reason`
  ADD PRIMARY KEY (`request_no`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`submenuid`),
  ADD KEY `fk_menuid` (`menuid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `merk_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `submenuid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_createdby` FOREIGN KEY (`created_by`) REFERENCES `user` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_merk` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`merk_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_modifiedby` FOREIGN KEY (`modified_by`) REFERENCES `user` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoicercvby` FOREIGN KEY (`received_by`) REFERENCES `user` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_invoicereqno` FOREIGN KEY (`request_no`) REFERENCES `request` (`request_no`) ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_reqby` FOREIGN KEY (`created_by`) REFERENCES `user` (`uid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respby` FOREIGN KEY (`responded_by`) REFERENCES `user` (`uid`) ON UPDATE CASCADE;

--
-- Constraints for table `req_item_in`
--
ALTER TABLE `req_item_in`
  ADD CONSTRAINT `brgiditemin` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supid_itemin` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reqnoitemin` FOREIGN KEY (`request_no`) REFERENCES `request` (`request_no`) ON UPDATE CASCADE;

--
-- Constraints for table `req_item_out`
--
ALTER TABLE `req_item_out`
  ADD CONSTRAINT `brgiditemout` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `req_item_out_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reqnoitemout` FOREIGN KEY (`request_no`) REFERENCES `request` (`request_no`) ON UPDATE CASCADE;

--
-- Constraints for table `req_out_reason`
--
ALTER TABLE `req_out_reason`
  ADD CONSTRAINT `fk_reqnoout` FOREIGN KEY (`request_no`) REFERENCES `request` (`request_no`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `fk_menuid` FOREIGN KEY (`menuid`) REFERENCES `menu` (`menuid`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
