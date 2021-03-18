-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:07 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(6, 'deep@138', 'deep', 0, '2021-02-27 12:47:15'),
(7, 'deep@138', 'deep', 0, '2021-03-01 14:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int NOT NULL,
  `entityTypeId` enum('product','customer') NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(200) NOT NULL,
  `backendType` varchar(200) NOT NULL,
  `sortOrder` int NOT NULL,
  `backendModel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(30, 'product', 'color', 'product_color', 'select', 'VARCHAR(20)', 2, 'products'),
(32, 'product', 'material', 'product_material', 'Text', 'VARCHAR(20)', 1, 'products'),
(33, 'product', 'type', 'product_type', 'select', 'VARCHAR(20)', 3, 'products');

-- --------------------------------------------------------

--
-- Table structure for table `attributeoption`
--

CREATE TABLE `attributeoption` (
  `optionId` int NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `attributeId` int NOT NULL,
  `sortOrder` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attributeoption`
--

INSERT INTO `attributeoption` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(27, 'Black', 30, '1'),
(28, 'Blue', 30, '2'),
(29, 'Brown', 30, '3'),
(30, 'type 1', 33, '1'),
(31, 'type 2', 33, '2'),
(32, 'type 3', 33, '3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `parentId` int NOT NULL,
  `pathId` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `parentId`, `pathId`, `status`) VALUES
(86, 'Bedroom', 0, '86', 1),
(87, 'Bedroom Sets', 86, '86=87', 1),
(88, 'Night Stands', 86, '86=88', 1),
(89, 'Beds', 86, '86=89', 1),
(90, 'Dresser', 86, '86=90', 1),
(91, 'Dresser Mirror', 86, '86=91', 1),
(92, 'Living Room', 0, '92', 1),
(93, 'Living Room Sets', 92, '92=93', 1),
(94, 'Sofas', 92, '92=94', 1),
(95, 'Love Seats', 92, '92=95', 1),
(96, 'Chairs', 92, '92=96', 1),
(97, 'Accent Chairs', 92, '92=97', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `pageId` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(1, 'info', 'info_1', 'sdsdfsdfsfsdsdfdsdsd', 0, '2021-03-12 04:56:30'),
(3, 't1', 't1ew', '<p>hello World</p>', 1, '2021-03-12 05:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `groupId` int NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `firstName`, `lastName`, `phone`, `email`, `password`, `status`, `groupId`, `createdDate`, `updatedDate`) VALUES
(56, 'Tony', 'Stark', '0000000000', 'tony@gmail.com', 'gtredf', 1, 7, '2021-03-16 04:58:45', '2021-03-16 04:58:45'),
(57, 'Steve', 'Rogers', '0000000000', 'steve@gmail.com', 'ffffff', 1, 9, '2021-03-16 05:29:57', '2021-03-16 05:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int NOT NULL,
  `customerId` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `addresstype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `customerId`, `address`, `city`, `state`, `zip`, `country`, `addresstype`) VALUES
(34, 56, 'hhgggg', 'h', 'jh', 'jh', 'Estonia', 'billing'),
(35, 56, 'hh', 'h', 'jh', 'jh', 'Estonia', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `customer_grp`
--

CREATE TABLE `customer_grp` (
  `groupId` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_grp`
--

INSERT INTO `customer_grp` (`groupId`, `name`, `value`, `createdDate`) VALUES
(7, 'Retail', 1, '2021-03-08 04:46:44'),
(9, 'Wholesale', 2, '2021-03-08 04:48:43'),
(10, 'Group 4', 3, '2021-03-10 07:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `productId` int NOT NULL,
  `label` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Label',
  `small` tinyint(1) NOT NULL DEFAULT '0',
  `thumb` tinyint(1) NOT NULL DEFAULT '0',
  `base` tinyint(1) NOT NULL DEFAULT '0',
  `gallery` tinyint(1) NOT NULL DEFAULT '0',
  `remove` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `image`, `productId`, `label`, `small`, `thumb`, `base`, `gallery`, `remove`) VALUES
(39, 'images/89/image1.jpg', 89, 'Label', 0, 0, 1, 0, 0),
(40, 'images/95/image2.jpg', 95, 'Label', 0, 0, 1, 0, 0),
(41, 'images/89/image3.jpg', 89, 'Label', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment method`
--

CREATE TABLE `payment method` (
  `methodId` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment method`
--

INSERT INTO `payment method` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(14, 'payment 5', '123', '23344443232323', 1, '2021-03-01 09:05:33'),
(15, 'payment 6', 'dsdsd', '2334444', 1, '2021-03-01 09:16:35'),
(19, 'payment 5 ', 'ssdsdadasd', 'dsdsd', 1, '2021-03-15 16:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `quantity` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` timestamp NOT NULL,
  `updatedDate` timestamp NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `material`, `type`) VALUES
(89, 'Redmi 9A', 5000, 23, 2, 'wow wow wow', 1, '2021-03-02 04:22:42', '2021-03-16 12:59:41', 'Black', 'nuice', NULL),
(95, 'Redmi 9A', 7000, 22, 3, 'wow', 1, '2021-03-04 10:11:43', '2021-03-11 05:34:13', NULL, NULL, NULL),
(99, 'Nokiac ', 6000, 12, 1, 'ddddd', 1, '2021-03-10 14:59:04', '2021-03-16 13:53:28', 'Blue', 'silk', 'type 2'),
(106, 'Nokia', 2000, 2, 1, 'ddddd', 1, '2021-03-18 07:50:05', '2021-03-18 07:50:05', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int NOT NULL,
  `productId` int NOT NULL,
  `customerGroupId` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 89, 7, '1000.00'),
(2, 89, 9, '0.00'),
(3, 89, 10, '3000.00'),
(4, 95, 7, '20.00'),
(5, 95, 9, '200.00'),
(7, 99, 7, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `shipment method`
--

CREATE TABLE `shipment method` (
  `methodId` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shipment method`
--

INSERT INTO `shipment method` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(13, 'shipment ', 'hfhdhhd_sssjs_ssjsjs', '12000', '', 0, '2021-02-25 14:44:41'),
(16, 'shipment2 done', 'hfhdhhd_sssjs_ssjsjs', '12000', 'this is a shipment', 1, '2021-03-01 09:16:21'),
(20, 'shipment 3 ', '111', '12', '45', 1, '2021-03-15 16:14:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeoption_ibfk_1` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `customer_ibfk_1` (`groupId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `customer_address_ibfk_1` (`customerId`);

--
-- Indexes for table `customer_grp`
--
ALTER TABLE `customer_grp`
  ADD PRIMARY KEY (`groupId`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`),
  ADD UNIQUE KEY `image` (`image`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `payment method`
--
ALTER TABLE `payment method`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`),
  ADD KEY `product_group_price_ibfk_1` (`productId`),
  ADD KEY `product_group_price_ibfk_2` (`customerGroupId`);

--
-- Indexes for table `shipment method`
--
ALTER TABLE `shipment method`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `attributeoption`
--
ALTER TABLE `attributeoption`
  MODIFY `optionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `pageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customer_grp`
--
ALTER TABLE `customer_grp`
  MODIFY `groupId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment method`
--
ALTER TABLE `payment method`
  MODIFY `methodId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shipment method`
--
ALTER TABLE `shipment method`
  MODIFY `methodId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD CONSTRAINT `attributeoption_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customer_grp` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD CONSTRAINT `product_group_price_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_group_price_ibfk_2` FOREIGN KEY (`customerGroupId`) REFERENCES `customer_grp` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
