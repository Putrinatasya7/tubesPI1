-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 11:47 PM
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
  `qr_code` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(4) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `category_id`, `barang`, `merk_id`, `pict`, `stock`, `minimum_stock`, `harga`, `qr_code`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
('B001', 1, 'Dunlop SP Sport LM705 185/70 R14 Ban Mobil [Tahun 2021]', 1, 'dunlopban1.jpg', 50, 25, 560000, NULL, '2021-06-01 22:07:00', 'A001', '2021-06-01 22:07:00', 'A001'),
('B002', 1, 'Dunlop Direzza DZ101 195/50 R16 - Produksi 2021', 1, 'dunlop-dz101.jpg', 50, 25, 630000, NULL, '2021-06-01 22:14:07', 'A001', '2021-06-01 22:14:07', 'A001');

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_detail`
-- (See below for the actual view)
--
CREATE TABLE `barang_detail` (
`barang_id` varchar(10)
,`category_id` int(2)
,`category` varchar(100)
,`barang` varchar(200)
,`merk_id` int(2)
,`merk` varchar(100)
,`pict` varchar(255)
,`stock` int(6)
,`minimum_stock` int(6)
,`harga` int(11)
,`qr_code` varchar(255)
,`created_at` datetime
,`created_by` varchar(4)
,`modified_at` datetime
,`modified_by` varchar(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`, `status`) VALUES
(1, 'Suku Cadang', 'Active'),
(4, 'Accessories', 'Active');

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
-- Table structure for table `invoice_out`
--

CREATE TABLE `invoice_out` (
  `invoice_no` varchar(100) NOT NULL,
  `request_no` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
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
  `is_active` enum('1','2') DEFAULT NULL,
  `role_access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuid`, `menu`, `url`, `icon`, `collapse`, `is_active`, `role_access`) VALUES
(1, 'Dashboard', 'Auth', 'fas fa-home', 'n', '1', '1'),
(2, 'Dashboard', 'Auth/manager', 'fas fa-home', 'n', '1', '2'),
(3, 'Dashboard', 'Auth/staff', 'fas fa-home', 'n', '1', '3'),
(4, 'Barang', 'Barang', 'ni ni-app', 'n', '1', '1,2,3'),
(5, 'Supplier', 'Supplier', 'ni ni-delivery-fast', 'n', '1', '1,2,3'),
(6, 'Request', '#collapseExample', 'ni ni-bullet-list-67', 'y', '1', '1,2,3'),
(7, 'User', 'User', 'ni ni-single-02', 'n', '1', '1'),
(8, 'Elements', 'Elements', 'ni ni-tag', 'n', '1', '1,3');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` int(2) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`merk_id`, `merk`, `status`) VALUES
(1, 'Dunlop', 'Active'),
(3, 'Bridgestone', 'Active');

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
  `status` enum('Accepted','Rejected','Waiting') NOT NULL DEFAULT 'Waiting',
  `req_category` enum('In','Out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_no`, `created_by`, `created_at`, `responded_by`, `responded_at`, `status`, `req_category`) VALUES
('REQOut21060301', 'A001', '2021-06-03 23:04:25', NULL, NULL, 'Waiting', 'Out'),
('REQOut21060303', 'A001', '2021-06-04 02:59:56', NULL, NULL, 'Accepted', 'Out'),
('REQOut21060404', 'A001', '2021-06-04 04:30:51', NULL, NULL, 'Rejected', 'Out');

-- --------------------------------------------------------

--
-- Stand-in structure for view `request_out_detail`
-- (See below for the actual view)
--
CREATE TABLE `request_out_detail` (
`request_no` varchar(100)
,`created_by` varchar(4)
,`creator_name` varchar(50)
,`created_at` datetime
,`barang_id` varchar(10)
,`barang` varchar(200)
,`qty` int(6)
,`alasan_keluar` text
,`responded_by` varchar(4)
,`responder_name` varchar(50)
,`responded_at` datetime
,`status` enum('Accepted','Rejected','Waiting')
);

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
  `qty` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_item_out`
--

INSERT INTO `req_item_out` (`request_no`, `barang_id`, `qty`) VALUES
('REQOut21060301', 'B001', 4),
('REQOut21060301', 'B002', 8),
('REQOut21060303', 'B001', 1),
('REQOut21060404', 'B001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `req_out_reason`
--

CREATE TABLE `req_out_reason` (
  `request_no` varchar(100) NOT NULL,
  `alasan_keluar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_out_reason`
--

INSERT INTO `req_out_reason` (`request_no`, `alasan_keluar`) VALUES
('REQOut21060301', 'Pembuatan mobil baru'),
('REQOut21060303', 'Alasan tidak tahu apa alasan oke'),
('REQOut21060404', 'Lihat tanggal');

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
(1, 6, 'Permintaan Masuk', 'Request/addIn', '', '1'),
(2, 6, 'Permintaan Keluar', 'Request/addOut', '', '1');

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
(1, 'PT Makmur Jaya', 'makmurjaya@gmail.com', 'Active'),
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
('A001', 'Jessica Wong', 'jessiwong', 'jessicawong@mail.com', '$2y$10$PSddpuQGDS0AbCtDbriDWe2jSyUA9P.DYG6oRCJ/z/czDpgb1y5Tm', 'defaultusrpict.jpg', '2021-05-25 22:10:25', '2021-05-25 22:10:25', 1, 'Active'),
('A002', 'Putri Natasya', 'punat', 'putrinatasya@gmail.com', '$2y$10$uqqACchko3qRn5FHiZ4LC.nU6QwqZCF3.X/I8IM68fI8XOEfZs8wS', 'PicsArt_01-17-07_40_19.jpg', '2021-05-28 11:09:21', '2021-05-28 11:09:21', 1, 'Active'),
('M001', 'Patrisia Tambunan', 'patty', 'patrisia@gmail.com', '$2y$10$ML6DaOcIbM3YNtDMwWTXpOZbrfsSpEqXNAKimuhIb0.csoAUNRIm6', 'defaultusrpict.jpg', '2021-05-28 01:27:51', '2021-05-28 01:27:51', 2, 'Active'),
('S001', 'Mita Amelia', 'mita', 'mitaamelia@gmail.com', '$2y$10$tpxwesVPE2AQFcpyEtaiauxjxSyI6Db21fzZXRDfWPwSg0xQ3Kply', 'defaultusrpict.jpg', '2021-05-28 11:08:18', '2021-05-28 11:08:18', 3, 'Active'),
('S002', 'Ruhami Sukma Putri', 'puti', 'puti@gmail.com', '$2y$10$FXpuJLovoksjUoxlREbL.OI.Y39jGw3Bv04YR78bU2Q8VJ8ACk6t2', 'defaultusrpict.jpg', '2021-05-29 20:15:31', '2021-05-29 20:15:31', 3, 'Active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_detail`
-- (See below for the actual view)
--
CREATE TABLE `user_detail` (
`uid` varchar(4)
,`name` varchar(50)
,`uname` varchar(50)
,`email` varchar(100)
,`password` varchar(255)
,`pict` varchar(255)
,`created_at` datetime
,`modified_at` datetime
,`role_id` int(1)
,`role` varchar(50)
,`is_active` enum('Active','Inactive')
);

-- --------------------------------------------------------

--
-- Structure for view `barang_detail`
--
DROP TABLE IF EXISTS `barang_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_detail`  AS SELECT `b`.`barang_id` AS `barang_id`, `b`.`category_id` AS `category_id`, `c`.`category` AS `category`, `b`.`barang` AS `barang`, `b`.`merk_id` AS `merk_id`, `m`.`merk` AS `merk`, `b`.`pict` AS `pict`, `b`.`stock` AS `stock`, `b`.`minimum_stock` AS `minimum_stock`, `b`.`harga` AS `harga`, `b`.`qr_code` AS `qr_code`, `b`.`created_at` AS `created_at`, `b`.`created_by` AS `created_by`, `b`.`modified_at` AS `modified_at`, `b`.`modified_by` AS `modified_by` FROM ((`barang` `b` join `category` `c` on(`c`.`category_id` = `b`.`category_id`)) join `merk` `m` on(`m`.`merk_id` = `b`.`merk_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `request_out_detail`
--
DROP TABLE IF EXISTS `request_out_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `request_out_detail`  AS SELECT `r`.`request_no` AS `request_no`, `r`.`created_by` AS `created_by`, `u`.`name` AS `creator_name`, `r`.`created_at` AS `created_at`, `i`.`barang_id` AS `barang_id`, `b`.`barang` AS `barang`, `i`.`qty` AS `qty`, `a`.`alasan_keluar` AS `alasan_keluar`, `r`.`responded_by` AS `responded_by`, `u2`.`name` AS `responder_name`, `r`.`responded_at` AS `responded_at`, `r`.`status` AS `status` FROM (((((`request` `r` join `user` `u` on(`u`.`uid` = `r`.`created_by`)) left join `user` `u2` on(`u2`.`uid` = `r`.`responded_by`)) join `req_item_out` `i` on(`i`.`request_no` = `r`.`request_no`)) join `barang` `b` on(`i`.`barang_id` = `b`.`barang_id`)) join `req_out_reason` `a` on(`a`.`request_no` = `r`.`request_no`)) WHERE `r`.`req_category` = 'Out' ;

-- --------------------------------------------------------

--
-- Structure for view `user_detail`
--
DROP TABLE IF EXISTS `user_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_detail`  AS SELECT `u`.`uid` AS `uid`, `u`.`name` AS `name`, `u`.`uname` AS `uname`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`pict` AS `pict`, `u`.`created_at` AS `created_at`, `u`.`modified_at` AS `modified_at`, `u`.`role_id` AS `role_id`, `r`.`role` AS `role`, `u`.`is_active` AS `is_active` FROM (`user` `u` join `role` `r` on(`r`.`role_id` = `u`.`role_id`)) ;

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
-- Indexes for table `invoice_out`
--
ALTER TABLE `invoice_out`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `fk_invreqnoout` (`request_no`);

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
  ADD KEY `brgiditemout` (`barang_id`);

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
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `merk_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `supplier_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `invoice_out`
--
ALTER TABLE `invoice_out`
  ADD CONSTRAINT `fk_invreqnoout` FOREIGN KEY (`request_no`) REFERENCES `request` (`request_no`) ON UPDATE CASCADE;

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
