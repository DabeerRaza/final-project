-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 08:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(40) NOT NULL,
  `city_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Lahore'),
(2, 'Islamabad'),
(3, 'Karachi'),
(4, 'Peshawar'),
(5, 'Faislabad');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `comments` text NOT NULL,
  `mechanic_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mechanic_id` int(11) NOT NULL,
  `mechanic_name` varchar(40) NOT NULL,
  `mechanic_shop_address` varchar(38) NOT NULL,
  `mechanic_image` varchar(250) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `city_id` int(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mechanic_id`, `mechanic_name`, `mechanic_shop_address`, `mechanic_image`, `email`, `password`, `city_id`, `status`) VALUES
(28, 'Danish Raza', 'lawrence Road', '1554472150education.jpg', 'danishraza@gmail.com', 'danishraza', 2, 'approved'),
(39, 'Hamza Saleem', 'Bahria Town ', '1555439165(3) C++ Tutorial for Beginners - Full Course - YouTube - Google Chrome 2019-04-07 23.47.35.png', 'hamzasaleem@gmail.com', 'hamza', 2, 'approved'),
(40, 'Ameer Hamza', 'Ameen Bazar', '15547270132.jpg', 'ameerhamza@gmail.com', 'ameer', 5, 'approved'),
(27, 'Ali Haider', 'Model Town, Lahore.', '', 'alihaider@gmail.com', 'alihaider', 3, 'rejected'),
(26, 'Dabeer Raza', 'Liaqat Chowk Lahore.', '1554538213g.jpg', 'dabeerofficial@gmail.com', 'dabeer1212', 1, 'approved'),
(29, 'Ali hassan', 'ali chowk', '1554472235index.png', 'alihassan@gmail.com', 'alihassan', 4, 'approved'),
(36, 'Moiz Khan', 'liyari main bazar', '', 'moizkhan@gmail.com', 'moiz', 3, 'approved'),
(37, 'Saeed', 'hoksbay beech', '', 'saeed@gmail.com', 'saeed', 3, 'approved'),
(38, 'Imran Pathan', 'khan main bazar', '', 'imranpathan@gmail.com', 'imran', 4, 'approved'),
(30, 'ejaz', 'fane road', '', 'ejaz@gmail.com', 'ejaz', 5, 'approved'),
(34, 'Adil Amjad', 'Raj Garh', '', 'adilamjad@gmail.com', 'adil', 1, 'approved'),
(35, 'Nehal Amjad', 'National Town', '', 'nehalamjad@gmail.com', 'nehal', 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `re_enter_password` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `re_enter_password`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', '12345', 'approved'),
(3, 'dabeer', 'dabeer@gmail.com', '54321', '54321', 'approved'),
(4, 'ali', 'ali@gmail.com', '1234', '1234', 'rejected'),
(5, 'Ali Hassan', 'alihassan@gmail.com', '121212', '121212', 'approved'),
(7, 'ejaz', 'ejaz@gmail.com', 'ejaz', 'ejaz', 'approved'),
(8, 'waheed', 'waheed@gmail.com', '121212', '121212', 'approved'),
(9, 'taimoor', 'taimoor@gmail.com', '121212', '121212', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `user_request_to_mechanic`
--

CREATE TABLE `user_request_to_mechanic` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `mechanic_name` varchar(40) NOT NULL,
  `user_request_status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_request_to_mechanic`
--

INSERT INTO `user_request_to_mechanic` (`id`, `username`, `mechanic_name`, `user_request_status`) VALUES
(1, 'waheed', 'Hamza Saleem', 'rejected'),
(14, 'dabeer', 'Hamza Saleem', 'approved'),
(15, 'dabeer', 'Danish Raza', 'rejected'),
(16, 'dabeer', 'Ameer Hamza', 'approved'),
(17, 'dabeer', 'Dabeer Raza', 'rejected'),
(18, 'dabeer', 'Adil Amjad', 'approved'),
(19, 'dabeer', 'Moiz Khan', 'approved'),
(20, 'waheed', 'Moiz Khan', 'approved'),
(21, 'waheed', 'Dabeer Raza', 'approved'),
(22, 'ejaz', 'Dabeer Raza', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_request_to_mechanic`
--
ALTER TABLE `user_request_to_mechanic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_request_to_mechanic`
--
ALTER TABLE `user_request_to_mechanic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
