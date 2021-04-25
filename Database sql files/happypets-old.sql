-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 06:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happypets`
--

-- --------------------------------------------------------

--
-- Table structure for table `adaption_list`
--

CREATE TABLE `adaption_list` (
  `pt_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `pet_type` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pet_photo` varchar(50) NOT NULL,
  `pet_description` varchar(2000) NOT NULL,
  `pet_breed` varchar(30) NOT NULL,
  `pet_date_of_birth` date NOT NULL,
  `pet_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `user_name`, `email_id`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker`
--

CREATE TABLE `caretaker` (
  `c_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `specialist` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker`
--

INSERT INTO `caretaker` (`c_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `date_of_birth`, `photo`, `status`, `specialist`) VALUES
(23, 'Bhavya', 'Prajapati', 'bhavya@gmail.com', 9876567801, '1234', 'B/27', '2021-03-04', '1616815728-IMG_0825.JPG', 'On', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_client_req`
--

CREATE TABLE `caretaker_client_req` (
  `c_req_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `req_date` date NOT NULL,
  `time_period` varchar(2) NOT NULL,
  `pet_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker_client_req`
--

INSERT INTO `caretaker_client_req` (`c_req_id`, `first_name`, `last_name`, `req_date`, `time_period`, `pet_type`) VALUES
(1, 'Priya', 'Patel', '2021-03-02', '2', 'Dog'),
(2, 'Shrey', 'Patel', '2021-03-10', '2', 'Dog'),
(3, 'Priya', 'Patel', '2021-03-02', '2', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `hospital_name` varchar(30) NOT NULL,
  `certificate` varchar(50) NOT NULL,
  `specialist` varchar(30) NOT NULL,
  `verification` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `photo`, `hospital_name`, `certificate`, `specialist`, `verification`, `status`, `gender`) VALUES
(10, 'Bhoomi', 'Zala', 'bhoomi@gmail.com', 9898989898, '1234', 'c/27', '1616814426-IMG_0805.JPG', 'City Hospital', '1616814426-IMG_0803.JPG', 'Dog', 'verified', 'Off', 'Female'),
(11, 'Yug', 'Patel', 'yug@gmail.com', 9123456780, '1234', 'E/27', '1616815957-IMG_0834.JPG', 'City Hospital', '1616815957-IMG_0818.JPG', 'Dog', 'verified', 'On', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_client_req`
--

CREATE TABLE `doctor_client_req` (
  `d_req_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `pet_type` varchar(20) NOT NULL,
  `pet_problem` varchar(50) NOT NULL,
  `problem_description` varchar(2000) NOT NULL,
  `req_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `feedback_date` datetime(6) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petowner`
--

CREATE TABLE `petowner` (
  `u_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gender` varchar(9) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petowner`
--

INSERT INTO `petowner` (`u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `gender`, `photo`) VALUES
(20, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, '1234', 'c/27  sterling city', 'FEMALE', 0x313631363738353731372d4550464745303837322e4a5047),
(21, 'Kavan', 'Pandya', 'kavan@gmail.com', 9876543210, '1234', 'A/41', 'MALE', 0x313631363831353630322d42584c4a383633392e4a5047),
(22, 'Bharat', 'Patel', 'bharat@gmail.com', 98989990020, '1234', 'C/27 sterling city', 'MALE', 0x313631363831373631392d42584c4a383633392e4a5047);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `q_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` longtext NOT NULL,
  `que_date_time` datetime(6) NOT NULL,
  `que_picture` longblob NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `s_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `photo`, `shop_name`, `status`, `date_of_birth`) VALUES
(6, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 9897969897, '1234', 'c/27', '1616787210-IMG_0801.JPG', 'Happy', 'Off', '2021-03-19'),
(7, 'Aryan', 'Gadhia', 'aryan@gmail.com', 9876543450, '1234', 'D/27', '1616815849-IMG_0817.JPG', 'Happy', 'On', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `p_id` int(11) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `store_address` varchar(500) NOT NULL,
  `product_photo` longblob NOT NULL,
  `product_description` varchar(3000) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `delivery_option` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histroy`
--

CREATE TABLE `transaction_histroy` (
  `t_id` int(11) NOT NULL,
  `amount` int(6) NOT NULL,
  `date_of_transaction` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adaption_list`
--
ALTER TABLE `adaption_list`
  ADD PRIMARY KEY (`pt_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email_id`);

--
-- Indexes for table `caretaker`
--
ALTER TABLE `caretaker`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  ADD PRIMARY KEY (`c_req_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `doctor_client_req`
--
ALTER TABLE `doctor_client_req`
  ADD PRIMARY KEY (`d_req_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `petowner`
--
ALTER TABLE `petowner`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`q_id`),
  ADD UNIQUE KEY `email` (`email_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `conatct_number` (`contact_number`);

--
-- Indexes for table `store_product`
--
ALTER TABLE `store_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `transaction_histroy`
--
ALTER TABLE `transaction_histroy`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adaption_list`
--
ALTER TABLE `adaption_list`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `caretaker`
--
ALTER TABLE `caretaker`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  MODIFY `c_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_client_req`
--
ALTER TABLE `doctor_client_req`
  MODIFY `d_req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petowner`
--
ALTER TABLE `petowner`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_product`
--
ALTER TABLE `store_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_histroy`
--
ALTER TABLE `transaction_histroy`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
