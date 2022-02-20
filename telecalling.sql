-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 02:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telecalling`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`) VALUES
(1, 'Diadema', 1),
(2, 'Mauá', 1),
(3, 'Rio Grande da Serra', 1),
(4, 'Angra dos Reis', 2),
(5, 'Barra Mansa', 2),
(6, 'Belford Roxo', 2),
(7, 'Cabo Frio', 2),
(8, 'Aquiraz', 3),
(9, 'Canindé', 3),
(10, 'Caucaia', 3),
(11, 'Crato', 3),
(12, 'Blumenau', 4),
(13, 'Chapecó', 4),
(14, 'Criciúma', 4),
(15, 'Lages', 4),
(16, 'Aracruz', 5),
(17, 'Cariacica', 5),
(18, 'Colatina', 5),
(19, 'Linhares', 5),
(20, 'Guangzhou', 6),
(21, 'Shanghai', 6),
(22, 'Chongqing', 6),
(23, 'Beijing', 6),
(24, 'Baoding', 7),
(25, 'Qinhuangdao', 7),
(26, 'Tangshan', 8),
(27, 'Sanhe', 8),
(28, 'Paris', 11),
(29, 'Poissy', 11),
(30, 'Torbes', 12),
(31, 'Rodrez', 12),
(32, 'Auger-Saint-Vincent', 13),
(33, 'Aumatre', 13),
(34, 'Belfort', 14),
(35, 'Dole', 14),
(36, 'Colmar', 15),
(37, 'Obernai', 15),
(38, 'Gurugram', 16),
(39, 'Panipat', 16),
(40, 'Rewari', 16),
(41, 'Chandigarh', 16),
(42, 'Tirupati', 17),
(43, 'Vijayvada', 17),
(44, 'Elluru', 17),
(45, 'Nellore', 17),
(46, 'New Delhi', 18),
(47, 'Faridabad', 18),
(48, 'Chennai', 19),
(49, 'Madurai', 19),
(50, 'Coimbatore', 19),
(51, 'Salem', 19),
(52, 'Ballia', 20),
(53, 'Varanasi', 20),
(54, 'Lucknow', 20),
(55, 'Kanpur', 20),
(56, 'Los Angeles', 21),
(57, 'San Francisco', 21),
(58, 'San Diego', 21),
(59, 'Oakland', 21),
(60, 'lowa city', 22),
(61, 'Ames', 22),
(62, 'Waterloo', 22),
(63, 'Mason city', 22),
(64, 'New york city', 23),
(65, 'Buffalo', 23),
(66, 'Albany', 23),
(67, 'Yonkers', 23),
(68, 'Trenton', 24),
(69, 'Princeton', 24),
(70, 'Atlantic city', 24),
(71, 'Paterson', 24),
(72, 'Boston', 25),
(73, 'Cambridge', 25),
(74, 'Springfield', 25),
(75, 'Lowell', 25);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `call_status` int(11) DEFAULT 1 COMMENT '1=picked, 2=not picked',
  `assigned_member_id` varchar(255) DEFAULT NULL,
  `lead_status` varchar(255) DEFAULT NULL COMMENT '1=hot, 2=cold, 3=warm',
  `remarks` varchar(255) DEFAULT NULL,
  `called_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_mobile`, `contact_email`, `call_status`, `assigned_member_id`, `lead_status`, `remarks`, `called_date`) VALUES
(2, 'fbgfcbg', '9153358390', 'ab@gmail.com', 2, '2', '2', '0', '2022-02-13 15:09:20'),
(3, 'fbgfcbg', '9153358391', 'ab@gmail.com', 1, '2', '2', 'fgfg', '2022-02-13 15:09:42'),
(6, 'fbgfcbg', '9153358390', 'ab@gmail.com', 1, '2', '2', 'cdvdvg', NULL),
(7, 'fbgfcbg', '9153358390', 'ab@gmail.com', 1, '7', '2', 'edfedf', '2022-02-13 15:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'Brazil'),
(2, 'China'),
(3, 'France'),
(4, 'India'),
(5, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `leads_category` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `leads_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leads_category`
--

CREATE TABLE `leads_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads_category`
--

INSERT INTO `leads_category` (`id`, `category_name`, `status`) VALUES
(1, 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leads_remarks`
--

CREATE TABLE `leads_remarks` (
  `id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads_remarks`
--

INSERT INTO `leads_remarks` (`id`, `remarks`) VALUES
(1, 'hot'),
(2, 'cold'),
(3, 'warm');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `crm_access` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `crm_access`) VALUES
(2, 'abc', 'abc@gmail.com', '9114950910', 0),
(7, 'Aditya', 'admin@gmail.com', '9114950911', 1),
(8, 'admin', 'admin@gmail.com', '9114950911', 0),
(12, 'fr', 'fr@gmail.com', '9114950911', 0),
(13, 'admin', 'admin@gmail.com', '9114950911', 1),
(15, 'admin', 'admin@gmail.com', '9114950911', 1),
(16, 'admin', 'admin@gmail.com', '9114950911', 1),
(17, 'Adityaa', 'sudipta@gmail.com', '9114950911', 1),
(18, 'Adityaa', 'sudipta@gmail.com', '9114950911', 1),
(19, 'Adityaa', 'sudipta@gmail.com', '9114950911', 1),
(20, 'Adityaa', 'sudipta@gmail.com', '9114950911', 1),
(21, 'admin', 'admin@gmail.com', '9114950911', 1),
(22, 'admin', 'sudipta@gmail.com', '9114950911', 1),
(23, 'Adityaa', 'ab@gmail.com', '9114950911', 1),
(24, 'abc', 'abc@gmail.com', '9114950910', 1),
(25, 'Aditya', 'admin@gmail.com', '9114950911', 1),
(26, 'abc', 'abc@gmail.com', '9114950910', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Sao Paulo', 1),
(2, 'Rio de Janeiro', 1),
(3, 'Ceara', 1),
(4, 'Santa Catarina', 1),
(5, 'Espirito Santo', 1),
(6, 'Beijing', 2),
(7, 'Hebei', 2),
(8, 'Jiangsu', 2),
(9, 'Guangdong', 2),
(10, 'Guangdong', 2),
(11, 'Ile-de-France', 3),
(12, 'Midi-Pyrenees', 3),
(13, 'Picardie', 3),
(14, 'Franche-Comte', 3),
(15, 'Alsace', 3),
(16, 'Haryana', 4),
(17, 'Andhra Pradesh', 4),
(18, 'Delhi', 4),
(19, 'Tamil Nadu', 4),
(20, 'Uttar Pradesh', 4),
(21, 'California', 5),
(22, 'Iowa', 5),
(23, 'New York', 5),
(24, 'New Jersey', 5),
(25, 'Massachusetts', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(8, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-11 00:09:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_category`
--
ALTER TABLE `leads_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads_remarks`
--
ALTER TABLE `leads_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads_category`
--
ALTER TABLE `leads_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads_remarks`
--
ALTER TABLE `leads_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
