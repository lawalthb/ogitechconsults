-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 10:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogitiech_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins_tb`
--

CREATE TABLE `admins_tb` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT 'lawalthb@gmail.com',
  `password` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `admin_type` varchar(30) NOT NULL,
  `status` int(1) DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins_tb`
--

INSERT INTO `admins_tb` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `username`, `admin_type`, `status`, `reg_date`) VALUES
(1, 'lawal', 'toheeb', 'lawalthb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lawal', 'admin', 1, '2021-01-24 08:26:14'),
(2, 'admin', 'admin2', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-03-20 22:12:51', '1', 1, '2021-03-20 21:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `departments_tb`
--

CREATE TABLE `departments_tb` (
  `department_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `faculty` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments_tb`
--

INSERT INTO `departments_tb` (`department_id`, `name`, `faculty`, `status`, `reg_date`) VALUES
(1, 'ACCOUNTANCY', 'SBMS', 1, '2021-01-23 15:22:44'),
(2, 'BUSINESS ADMINISTRATION', 'SBMS', 1, '2021-01-23 15:22:44'),
(3, 'MARKETING', 'SBMS', 1, '2021-02-12 20:25:25'),
(4, 'BANKING AND FINANCE', 'SBMS', 1, '2021-02-12 20:25:25'),
(5, 'PUBLIC ADMINISTRATION', 'SBMS', 1, '2021-02-12 20:29:03'),
(6, 'TAXATION', 'SBMS', 1, '2021-02-12 20:29:03'),
(7, 'COMPUTER SCIENCE', 'SPAS', 1, '2021-02-12 20:53:33'),
(8, 'Science Laboratory Technology', 'SPAS', 1, '2021-02-12 20:53:33'),
(9, 'STATISTICS', 'SPAS', 1, '2021-02-12 20:54:10'),
(10, 'ELECT-ELECT', 'ENGINEERING', 1, '2021-02-12 21:00:54'),
(11, 'CIVIL ENGINEERING', 'ENGINEERING', 1, '2021-02-12 21:00:54'),
(12, 'MECHANICAL ENGINEERING', 'ENGINEERING', 1, '2021-02-12 21:00:54'),
(13, 'COMPUTER ENGINEERING', 'ENGINEERING', 1, '2021-02-12 21:00:54'),
(14, 'ESTATE MANAGEMENT', 'ENVIRONMENTAL', 0, '2021-02-12 21:02:31'),
(15, 'BUILDING TECHNOLOGY', 'ENVIRONMENTAL', 1, '2021-02-12 21:02:31'),
(16, 'MASS COMMUNICATION', 'COMMUNICATION', 1, '2021-02-12 21:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int(20) NOT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `product_id` int(20) NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_optn` varchar(10) DEFAULT 'Cash',
  `date` date NOT NULL,
  `dare_reg` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` int(1) NOT NULL,
  `sales_status` int(1) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tb`
--

CREATE TABLE `payment_tb` (
  `payment_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `amount_in` decimal(10,2) NOT NULL,
  `amount_out` decimal(10,2) NOT NULL,
  `amount_balance` decimal(10,2) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cmment` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `sell_rate` decimal(10,2) NOT NULL,
  `purchase_rate` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `available_for` varchar(60) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_name`, `unit`, `description`, `image`, `vendor_id`, `department_id`, `sell_rate`, `purchase_rate`, `status`, `reg_date`, `available_for`, `admin_id`) VALUES
(1, 'product name 1', 'pc', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 11, '2915.00', '3115.00', 1, '0000-00-00 00:00:00', '1,2,3,4', 1),
(2, 'product name 2', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 10, 4, '1223.00', '1423.00', 1, '0000-00-00 00:00:00', '2,3,4,7,', 1),
(3, 'product name 3', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 4, 1, '1830.00', '2030.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(4, 'product name 4', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 2, 4, '1640.00', '1840.00', 1, '0000-00-00 00:00:00', '1,4,15,', 1),
(5, 'product name 5', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 8, 7, '1190.00', '1390.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,', 1),
(6, 'product name 6', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 5, 12, '822.00', '1022.00', 1, '0000-00-00 00:00:00', '15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(7, 'product name 7', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 4, '2353.00', '2553.00', 1, '0000-00-00 00:00:00', '1,4,15,13,7,10,14,9,', 1),
(8, 'product name 8', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 5, '1634.00', '1834.00', 1, '0000-00-00 00:00:00', '7,10,8,9,', 1),
(9, 'product name 9', 'pc', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 9, 10, '611.00', '811.00', 1, '0000-00-00 00:00:00', '1,2,3,4', 1),
(10, 'product name 10', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 6, 4, '1959.00', '2159.00', 1, '0000-00-00 00:00:00', '2,3,4,7,', 1),
(11, 'product name 11', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 9, 8, '2930.00', '3130.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(12, 'product name 12', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 12, '1145.00', '1345.00', 1, '0000-00-00 00:00:00', '1,4,15,', 1),
(13, 'product name 13', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 4, 9, '982.00', '1182.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,', 1),
(14, 'product name 14', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 3, '1706.00', '1906.00', 1, '0000-00-00 00:00:00', '15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(15, 'product name 15', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 6, '2111.00', '2311.00', 1, '0000-00-00 00:00:00', '1,4,15,13,7,10,14,9,', 1),
(16, 'product name 16', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 5, 4, '1594.00', '1794.00', 1, '0000-00-00 00:00:00', '7,10,8,9,', 1),
(17, 'product name 17', 'pc', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 6, 7, '1884.00', '2084.00', 1, '0000-00-00 00:00:00', '1,2,3,4', 1),
(18, 'product name 18', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 11, '1609.00', '1809.00', 1, '0000-00-00 00:00:00', '2,3,4,7,', 1),
(19, 'product name 19', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 9, 12, '2702.00', '2902.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(20, 'product name 20', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 10, 8, '2688.00', '2888.00', 1, '0000-00-00 00:00:00', '1,4,15,', 1),
(21, 'product name 21', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 2, 7, '2696.00', '2896.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,', 1),
(22, 'product name 22', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 2, 1, '1944.00', '2144.00', 1, '0000-00-00 00:00:00', '15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(23, 'product name 23', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 12, '2397.00', '2597.00', 1, '0000-00-00 00:00:00', '1,4,15,13,7,10,14,9,', 1),
(24, 'product name 24', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 4, 11, '1034.00', '1234.00', 1, '0000-00-00 00:00:00', '7,10,8,9,', 1),
(25, 'product name 25', 'pc', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 5, '1723.00', '1923.00', 1, '0000-00-00 00:00:00', '1,2,3,4', 1),
(26, 'product name 26', 'pcs', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 8, 8, '998.00', '1198.00', 1, '0000-00-00 00:00:00', '2,3,4,7,', 1),
(27, 'product name 27', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 8, '2366.00', '2566.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1),
(28, 'product name 28', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 7, 10, '2839.00', '3039.00', 1, '0000-00-00 00:00:00', '1,4,15,', 1),
(29, 'product name 29', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 5, 12, '935.00', '1135.00', 1, '0000-00-00 00:00:00', '1,4,15,2,11,13,7,', 1),
(30, 'product name 30', 'no', 'Lorem ipsum dolor sit amet, libero at malesuada ornare, odio ', 'image2.jpg', 1, 5, '1982.00', '2182.00', 1, '0000-00-00 00:00:00', '15,2,11,13,7,10,14,3,16,12,5,8,9,6,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_tb`
--

CREATE TABLE `sales_tb` (
  `sales_id` int(20) NOT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `product_id` int(20) NOT NULL,
  `vendor_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_optn` varchar(10) DEFAULT 'Cash',
  `date` date NOT NULL,
  `dare_reg` timestamp NOT NULL DEFAULT current_timestamp(),
  `sales_status` int(1) NOT NULL,
  `remark` text DEFAULT NULL,
  `checkout_by` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tb`
--

CREATE TABLE `stock_tb` (
  `stock_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 1 COMMENT 'students=2, vendoe=1,others=3',
  `item_in` decimal(10,2) NOT NULL,
  `item_out` decimal(10,2) NOT NULL,
  `item_balance` decimal(10,2) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(200) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `department` int(11) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `email_link` varchar(150) DEFAULT NULL,
  `email_comfirm` int(1) NOT NULL DEFAULT 0,
  `email_token` varchar(250) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='customers_table';

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `matric_no`, `firstname`, `lastname`, `email`, `phone`, `department`, `level`, `password`, `status`, `email_link`, `email_comfirm`, `email_token`, `reg_date`, `gender`) VALUES
(1, 'ncsf/12/0001', 'studentFirstname1', 'studentLastname1', 'student@gmail.com1', '081234567891', 1, 'ND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=1', 1, '4f89d5a8fa1e06a54703aebf526f4b14', '0000-00-00 00:00:00', 'female'),
(2, 'ncsf/12/0002', 'studentFirstname2', 'studentLastname2', 'student@gmail.com2', '081234567891', 8, 'ND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=2', 1, '4f89d5a8fa1e06a54703aebf526f4b15', '0000-00-00 00:00:00', 'male'),
(3, 'ncsf/12/0003', 'studentFirstname3', 'studentLastname3', 'student@gmail.com3', '081234567891', 13, 'ND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=3', 1, '4f89d5a8fa1e06a54703aebf526f4b16', '0000-00-00 00:00:00', 'female'),
(4, 'ncsf/12/0004', 'studentFirstname4', 'studentLastname4', 'student@gmail.com4', '081234567891', 4, 'HND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=4', 1, '4f89d5a8fa1e06a54703aebf526f4b17', '0000-00-00 00:00:00', 'male'),
(5, 'ncsf/12/0005', 'studentFirstname5', 'studentLastname5', 'student@gmail.com5', '081234567891', 5, 'HND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=5', 1, '4f89d5a8fa1e06a54703aebf526f4b18', '0000-00-00 00:00:00', 'female'),
(6, 'ncsf/12/0006', 'studentFirstname6', 'studentLastname6', 'student@gmail.com6', '081234567891', 6, 'HND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=6', 1, '4f89d5a8fa1e06a54703aebf526f4b19', '0000-00-00 00:00:00', 'male'),
(7, 'ncsf/12/0007', 'studentFirstname7', 'studentLastname7', 'student@gmail.com7', '081234567891', 15, 'ND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=7', 1, '4f89d5a8fa1e06a54703aebf526f4b20', '0000-00-00 00:00:00', 'female'),
(8, 'ncsf/12/0008', 'studentFirstname8', 'studentLastname8', 'student@gmail.com8', '081234567891', 14, 'ND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=8', 1, '4f89d5a8fa1e06a54703aebf526f4b21', '0000-00-00 00:00:00', 'male'),
(9, 'ncsf/12/0009', 'studentFirstname9', 'studentLastname9', 'student@gmail.com9', '081234567891', 8, 'ND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=9', 1, '4f89d5a8fa1e06a54703aebf526f4b22', '0000-00-00 00:00:00', 'female'),
(10, 'ncsf/12/0010', 'studentFirstname10', 'studentLastname10', 'student@gmail.com10', '081234567891', 8, 'HND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=10', 1, '4f89d5a8fa1e06a54703aebf526f4b23', '0000-00-00 00:00:00', 'male'),
(11, 'ncsf/12/0011', 'studentFirstname11', 'studentLastname11', 'student@gmail.com11', '081234567891', 12, 'HND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=11', 1, '4f89d5a8fa1e06a54703aebf526f4b24', '0000-00-00 00:00:00', 'female'),
(12, 'ncsf/12/0012', 'studentFirstname12', 'studentLastname12', 'student@gmail.com12', '081234567891', 6, 'HND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=12', 1, '4f89d5a8fa1e06a54703aebf526f4b25', '0000-00-00 00:00:00', 'male'),
(13, 'ncsf/12/0013', 'studentFirstname13', 'studentLastname13', 'student@gmail.com13', '081234567891', 15, 'ND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=13', 1, '4f89d5a8fa1e06a54703aebf526f4b26', '0000-00-00 00:00:00', 'female'),
(14, 'ncsf/12/0014', 'studentFirstname14', 'studentLastname14', 'student@gmail.com14', '081234567891', 4, 'ND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=14', 1, '4f89d5a8fa1e06a54703aebf526f4b27', '0000-00-00 00:00:00', 'male'),
(15, 'ncsf/12/0015', 'studentFirstname15', 'studentLastname15', 'student@gmail.com15', '081234567891', 8, 'ND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=15', 1, '4f89d5a8fa1e06a54703aebf526f4b28', '0000-00-00 00:00:00', 'female'),
(16, 'ncsf/12/0016', 'studentFirstname16', 'studentLastname16', 'student@gmail.com16', '081234567891', 1, 'HND 1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=16', 1, '4f89d5a8fa1e06a54703aebf526f4b29', '0000-00-00 00:00:00', 'male'),
(17, 'ncsf/12/0017', 'studentFirstname17', 'studentLastname17', 'student@gmail.com17', '081234567891', 12, 'HND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=17', 1, '4f89d5a8fa1e06a54703aebf526f4b30', '0000-00-00 00:00:00', 'female'),
(18, 'ncsf/12/0018', 'studentFirstname18', 'studentLastname18', 'student@gmail.com18', '081234567891', 3, 'HND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=18', 1, '4f89d5a8fa1e06a54703aebf526f4b31', '0000-00-00 00:00:00', 'male'),
(19, 'ncsf/12/0019', 'studentFirstname19', 'studentLastname19', 'student@gmail.com19', '081234567891', 2, 'HND 2', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=19', 1, '4f89d5a8fa1e06a54703aebf526f4b32', '0000-00-00 00:00:00', 'male'),
(20, 'ncsf/12/0020', 'studentFirstname20', 'studentLastname20', 'student@gmail.com20', '081234567891', 7, 'HND 3', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'http://ogitechconsults.com/comfirm_email.php?mail_c=4f89d5a8fa1e06a54703aebf526f4b14&user_id=20', 1, '4f89d5a8fa1e06a54703aebf526f4b33', '0000-00-00 00:00:00', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_tb`
--

CREATE TABLE `vendors_tb` (
  `vendor_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors_tb`
--

INSERT INTO `vendors_tb` (`vendor_id`, `title`, `name`, `email`, `department_id`, `status`, `reg_date`) VALUES
(1, 'Mrs.', 'vendor A', 'vendor_mail@gmail.com1', 9, 1, '0000-00-00 00:00:00'),
(2, 'Mr.', 'vendor B', 'vendor_mail@gmail.com2', 1, 1, '0000-00-00 00:00:00'),
(3, 'Mr.', 'vendor C', 'vendor_mail@gmail.com3', 9, 1, '0000-00-00 00:00:00'),
(4, 'Mrs.', 'vendor D', 'vendor_mail@gmail.com4', 1, 1, '0000-00-00 00:00:00'),
(5, 'Mrs.', 'vendor E', 'vendor_mail@gmail.com5', 4, 1, '0000-00-00 00:00:00'),
(6, 'Mr.', 'vendor F', 'vendor_mail@gmail.com6', 9, 1, '0000-00-00 00:00:00'),
(7, 'Mr.', 'vendor G', 'vendor_mail@gmail.com7', 3, 1, '0000-00-00 00:00:00'),
(8, 'Mrs.', 'vendor H', 'vendor_mail@gmail.com8', 7, 1, '0000-00-00 00:00:00'),
(9, 'Mr.', 'vendor I', 'vendor_mail@gmail.com9', 10, 1, '0000-00-00 00:00:00'),
(10, 'Mrs.', 'vendor J', 'vendor_mail@gmail.com10', 7, 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins_tb`
--
ALTER TABLE `admins_tb`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- Indexes for table `departments_tb`
--
ALTER TABLE `departments_tb`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `pn` (`product_name`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD PRIMARY KEY (`sales_id`),
  ADD UNIQUE KEY `order_no` (`order_no`),
  ADD KEY `checkout_by` (`checkout_by`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stock_tb`
--
ALTER TABLE `stock_tb`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unique_matric_no` (`matric_no`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `department` (`department`);

--
-- Indexes for table `vendors_tb`
--
ALTER TABLE `vendors_tb`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `nn` (`name`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins_tb`
--
ALTER TABLE `admins_tb`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments_tb`
--
ALTER TABLE `departments_tb`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_tb`
--
ALTER TABLE `payment_tb`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sales_tb`
--
ALTER TABLE `sales_tb`
  MODIFY `sales_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_tb`
--
ALTER TABLE `stock_tb`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors_tb`
--
ALTER TABLE `vendors_tb`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD CONSTRAINT `order_tb_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_tb` (`product_id`),
  ADD CONSTRAINT `order_tb_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors_tb` (`vendor_id`),
  ADD CONSTRAINT `order_tb_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`);

--
-- Constraints for table `payment_tb`
--
ALTER TABLE `payment_tb`
  ADD CONSTRAINT `payment_tb_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors_tb` (`vendor_id`);

--
-- Constraints for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD CONSTRAINT `products_tb_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments_tb` (`department_id`),
  ADD CONSTRAINT `products_tb_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors_tb` (`vendor_id`);

--
-- Constraints for table `sales_tb`
--
ALTER TABLE `sales_tb`
  ADD CONSTRAINT `sales_tb_ibfk_1` FOREIGN KEY (`checkout_by`) REFERENCES `admins_tb` (`admin_id`),
  ADD CONSTRAINT `sales_tb_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products_tb` (`product_id`),
  ADD CONSTRAINT `sales_tb_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendors_tb` (`vendor_id`),
  ADD CONSTRAINT `sales_tb_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users_tb` (`user_id`),
  ADD CONSTRAINT `sales_tb_ibfk_5` FOREIGN KEY (`order_no`) REFERENCES `order_tb` (`order_no`);

--
-- Constraints for table `stock_tb`
--
ALTER TABLE `stock_tb`
  ADD CONSTRAINT `stock_tb_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `products_tb` (`product_id`),
  ADD CONSTRAINT `stock_tb_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment_tb` (`payment_id`),
  ADD CONSTRAINT `stock_tb_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendors_tb` (`vendor_id`);

--
-- Constraints for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD CONSTRAINT `users_tb_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments_tb` (`department_id`);

--
-- Constraints for table `vendors_tb`
--
ALTER TABLE `vendors_tb`
  ADD CONSTRAINT `vendors_tb_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments_tb` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
