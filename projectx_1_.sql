-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2018 at 08:57 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectx(1)`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `added_by` text NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '', 'money he to honey he', 0, '', '', '02-Nov-2018 Fri 02:43:44am Asia/Kolkata +05:30'),
(2, 'Food', '', '', 1, '', '', NULL),
(3, 'Education', '', '', 1, '', '', NULL),
(4, 'Clothes', '', '', 1, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email_id`, `query`, `created_at`) VALUES
(1, 'jayminzap@gmail.com', 'hello', '0000-00-00 00:00:00'),
(2, 'jayminzap@gmail.com', 'llasdlakldsasd', '0000-00-00 00:00:00'),
(3, 'jayminsejpal@gmail.com', 'Here', '0000-00-00 00:00:00'),
(4, 'jayminsejpal@gmail.com', 'asdasdasd', '0000-00-00 00:00:00'),
(5, 'jayminsejpal@gmail.com', 'asdasdasd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `donation_details`
--

CREATE TABLE `donation_details` (
  `id` int(20) NOT NULL,
  `donation_id` int(20) NOT NULL,
  `invoice` text NOT NULL,
  `added_by` int(20) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation_master`
--

CREATE TABLE `donation_master` (
  `id` int(20) NOT NULL,
  `donor_id` int(20) NOT NULL,
  `reciever_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `description` text NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_master`
--

INSERT INTO `donation_master` (`id`, `donor_id`, `reciever_id`, `c_id`, `amount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(15, 7, 1, 2, 200, 'description', 1, '2018-11-01 17:11:24', NULL),
(16, 7, 2, 3, 350, 'Please this should be given to well wishers', 1, '2018-11-01 17:11:01', NULL),
(17, 7, 1, 2, 200, 'i like to donate', 1, '2018-11-01 23:11:49', NULL),
(20, 7, 1, 3, 2000, 'edu kop\r\n', 1, '2018-11-02 08:11:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `organization_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `comment` text NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo_events`
--

CREATE TABLE `ngo_events` (
  `id` int(255) NOT NULL,
  `event_id` int(255) NOT NULL,
  `event_name` text NOT NULL,
  `ngo_id` int(255) NOT NULL,
  `event_date` text NOT NULL,
  `event_address` text NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_events`
--

INSERT INTO `ngo_events` (`id`, `event_id`, `event_name`, `ngo_id`, `event_date`, `event_address`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 101, 'book sharing', 1, '11/15/2018', 'ravinagar school', 'yuva sharing books at ravinagar school', 25, '11/2/2018', '11/2/2018');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(20) NOT NULL,
  `to_id` int(20) NOT NULL,
  `from_id` int(20) NOT NULL,
  `description` text NOT NULL,
  `read` int(20) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization_detail_master`
--

CREATE TABLE `organization_detail_master` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `cover_image` text NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_detail_master`
--

INSERT INTO `organization_detail_master` (`id`, `user_id`, `name`, `address`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 0, 'ABCD Foundation', '', '', '', NULL),
(2, 0, 'XYZ Foundation', '', '', '', NULL),
(3, 19, 'yuva cg road', '', '', '02-Nov-2018 Fri 01:11:27pm Asia/Kolkata +05:30', '02-Nov-2018 Fri 01:11:27pm Asia/Kolkata +05:30');

-- --------------------------------------------------------

--
-- Table structure for table `organization_images`
--

CREATE TABLE `organization_images` (
  `id` int(20) NOT NULL,
  `org_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL COMMENT 'user''s unique id',
  `fname` varchar(20) NOT NULL COMMENT 'user''s first name',
  `lname` varchar(20) NOT NULL COMMENT 'user''s last name',
  `emailid` text NOT NULL COMMENT 'user''s email id',
  `password` text NOT NULL COMMENT 'user''s password',
  `cno` bigint(20) DEFAULT NULL COMMENT 'User''s contact Number',
  `role` int(2) NOT NULL COMMENT 'user''s role like donor ngo and admin role',
  `status` int(2) NOT NULL COMMENT 'user''s status active or block\\denied user''s activation',
  `forget_pwd_link` int(255) NOT NULL DEFAULT '0',
  `created` text NOT NULL COMMENT 'date of user''s form of signup',
  `updated` text COMMENT 'update profile of user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `emailid`, `password`, `cno`, `role`, `status`, `forget_pwd_link`, `created`, `updated`) VALUES
(5, 'Mihir', 'Soni', 'charity.board2018@gmail.com', '1234', 918469527897, 3, 1, 0, '05-Sep-2018 Wed 04:29:07pm Asia/Kolkata +05:30', '11-Sep-2018 Tue 12:42:48pm Asia/Kolkata +05:30'),
(7, 'mihir', 'Soni', 'sonimihir07@gmail.com', '1234', 8469527897, 1, 1, 2, '13-Sep-2018 Thu 10:18:52pm Asia/Kolkata +05:30', '13-Oct-2018 Sat 06:51:33pm Asia/Kolkata +05:30'),
(11, 'Mihir', 'Soni', 'xyz@g.c', '1234', NULL, 0, 0, 0, '', NULL),
(18, 'jaymin', 'sejpal', 'jayminsejpal@gmail.com', '1234', NULL, 2, 1, 0, '02-Nov-2018 Fri 03:32:37am Asia/Kolkata +05:30', '02-Nov-2018 Fri 03:32:37am Asia/Kolkata +05:30'),
(20, 'dharvi', 'sanghvi', 'dharvisanghvi46@gmail.com', '1234', NULL, 3, 1, 0, '02-Nov-2018 Fri 01:24:18pm Asia/Kolkata +05:30', '02-Nov-2018 Fri 01:24:18pm Asia/Kolkata +05:30'),
(21, 'Hemal', 'Brahmbhatt', 'hemal2510@gmail.com', '1234', NULL, 3, 1, 0, '02-Nov-2018 Fri 01:25:35pm Asia/Kolkata +05:30', '02-Nov-2018 Fri 01:25:35pm Asia/Kolkata +05:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `user_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_master`
--
ALTER TABLE `donation_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo_events`
--
ALTER TABLE `ngo_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_detail_master`
--
ALTER TABLE `organization_detail_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_images`
--
ALTER TABLE `organization_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation_master`
--
ALTER TABLE `donation_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ngo_events`
--
ALTER TABLE `ngo_events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_detail_master`
--
ALTER TABLE `organization_detail_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization_images`
--
ALTER TABLE `organization_images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'user''s unique id', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
