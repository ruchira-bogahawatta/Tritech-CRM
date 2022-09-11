-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tritech-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `user_email`, `user_type`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin'),
(2, 'UCSC', 'ucsc', 'd32934b31349d77e70957e057b1bcd28', 'ucsc@gmail.com', 'Admin'),
(3, 'Kivi A', 'kivi', '3b25287a3a3f667e8b5c45c58f1dda6c', 'kivia@gmail.com', 'User'),
(4, 'USER', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_campaign`
--

CREATE TABLE `tbl_campaign` (
  `id` int(10) UNSIGNED NOT NULL,
  `camp_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `budget` int(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_campaign`
--

INSERT INTO `tbl_campaign` (`id`, `camp_name`, `start_date`, `end_date`, `budget`, `type`) VALUES
(1, 'Christmas Offer Campaign', '2022-02-14', '2022-02-25', 25000, 'TV Commercial'),
(2, 'New Year Season', '2022-02-01', '2022-02-14', 45000, 'Facebook Ad'),
(3, 'Seasonal Offer - Youtube ad', '2022-02-17', '2022-02-27', 15000, 'Youtube Commercial'),
(4, 'Commercial Ad', '2022-02-24', '2022-03-24', 75000, 'TV Commercial'),
(5, 'Annual Charity - March', '2022-03-01', '2022-03-02', 45000, 'Donation'),
(6, 'Donation', '2022-03-03', '2022-02-04', 20000, 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'direct'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `full_name`, `contact`, `email`, `reg_date`, `address`, `type`) VALUES
(1, 'Kivi A', 712015205, 'kivi@gmail.com', '2022-02-14', 'Galle', 'direct'),
(2, 'Dewmini', 712015487, 'dew@gmail.com', '2022-02-23', 'Colombo 8', 'direct'),
(3, 'Pathum', 71546465, 'pathum33@gmail.com', '2022-02-04', 'Kandy', 'direct'),
(4, 'Ruchira V', 715465465, 'ruchirav2@gmail.com', '2022-02-03', 'Kelaniya', 'direct'),
(7, 'Chris', 745455155, 'chris@gmail.com', '2022-02-04', 'Matara', 'direct'),
(8, 'Nisal', 712015487, 'nisal@gmail.com', '2022-02-10', '', 'converted'),
(9, 'Saman', 787878787, 'saman@gmail.com', '2022-02-14', '', 'converted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead`
--

CREATE TABLE `tbl_lead` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `campaign_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lead`
--

INSERT INTO `tbl_lead` (`id`, `full_name`, `email`, `contact`, `date`, `status`, `source`, `campaign_id`) VALUES
(1, 'Ruchira', 'ruchira@gmail.com', 712015205, '2022-02-14', 'Follow up', 'TV Commercial', 1),
(2, 'Kivi', 'kivi@gmail.com', 712015487, '2022-02-02', 'Consideration', 'Referral', 0),
(3, 'Dewmini', 'dew@gmail.com', 712015487, '2022-02-05', 'Follow up', 'Facebook Ad', 2),
(4, 'Pathum', 'pathum@gmail.com', 712015205, '2022-02-14', 'Not Interested', 'Facebook Ad', 2),
(5, 'Santha', 'santha@gmail.com', 712015205, '2022-02-03', 'Follow up', 'Other Social Media', 0),
(7, 'Kivi A', 'kivi2@gmail.com', 712015487, '2022-02-05', 'Follow up', 'Youtube Commercial', 0),
(8, 'Dew', 'dew23@gmail.com', 712015487, '2022-02-03', 'Interested', 'Youtube Commercial', 0),
(9, 'Sahan', 'Sahan@gmail.com', 712015487, '2022-02-05', 'Interested', 'Referral', 0),
(11, 'Ruchira B', 'ruchirabb@gmail.com', 712015487, '2022-02-05', 'Follow up', 'Youtube Commercial', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_campaign`
--
ALTER TABLE `tbl_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_campaign`
--
ALTER TABLE `tbl_campaign`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
