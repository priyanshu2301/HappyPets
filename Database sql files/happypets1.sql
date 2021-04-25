-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 05:54 AM
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
(25, 'Shrey', 'Patel', 'shrey@gmail.com', 9484668161, '1234', 'C27 Sterling', '2003-03-02', '1617378787-5.JPG', 'On', 'Dog'),
(27, 'Kavan', 'Pandya', 'kavan@gmail.com', 8123456780, '1234', 'E27 Sterling', '1999-03-24', '1617638023-2.JPG', 'Off', 'Dog'),
(28, 'Bhavya', 'Prajapati', 'bhavya@gmail.com', 9429665154, '1234', 'E/27 Sterling City', '2003-02-23', '1617981893-4.JPG', 'On', 'Cat');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_client_req`
--

CREATE TABLE `caretaker_client_req` (
  `c_req_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `req_date` date NOT NULL,
  `time_period` varchar(20) NOT NULL,
  `pet_type` varchar(20) NOT NULL,
  `req` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker_client_req`
--

INSERT INTO `caretaker_client_req` (`c_req_id`, `c_id`, `u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `req_date`, `time_period`, `pet_type`, `req`) VALUES
(44, 27, 27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, '2021-04-11', 'Days', 'Rabbit', 'Accept'),
(45, 27, 27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, '2021-04-11', 'Days', 'Rabbit', 'Accept'),
(46, 27, 27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, '2021-04-11', 'Days', 'Rabbit', 'Accept'),
(50, 25, 27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, '2021-04-04', 'Weeks', 'Cat', 'Accept'),
(51, 25, 26, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, '2021-04-17', 'Days', 'Dog', 'Accept'),
(52, 27, 26, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, '2021-04-03', 'Days', 'Dog', 'Accept');

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
(14, 'Bhoomi', 'Zala', 'bhoomi@gmail.com', 8153909935, '1234', 'C/27 Sterling City', '1617886872-_3.jpg', 'City hosital', '1617886872-_2.jpg', 'Dog', 'verified', 'On', 'Female'),
(15, 'Aryan', 'Gadhia', 'aryan@gmail.com', 9429655254, '1234', 'C/28 Sterling city', '1617886950-11.JPG', 'City hospital', '1617886950-20.JPG', 'Cat', 'verified', 'On', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_client_req`
--

CREATE TABLE `doctor_client_req` (
  `d_req_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_number` bigint(10) NOT NULL,
  `pet_type` varchar(20) NOT NULL,
  `pet_problem` varchar(50) NOT NULL,
  `problem_description` varchar(2000) NOT NULL,
  `req_date` date NOT NULL,
  `req` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_client_req`
--

INSERT INTO `doctor_client_req` (`d_req_id`, `u_id`, `d_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `pet_type`, `pet_problem`, `problem_description`, `req_date`, `req`) VALUES
(1, 26, 14, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, 'Dog', 'teeth', 'Teeth is bleeding', '2021-04-08', 'Accept'),
(4, 27, 15, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, 'Cat', 'teeth', 'Teeth is bleeding', '2021-04-09', 'Accept');

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
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petowner`
--

INSERT INTO `petowner` (`u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `gender`, `photo`) VALUES
(26, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, '1234', 'D/27 sterling', 'FEMALE', '1617637814-37.JPG'),
(27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, '1234', 'C/27 Sterling City', 'MALE', '1617637879-photo-1545658969-19d8799171f3.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `q_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` longtext NOT NULL,
  `que_date` date NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`q_id`, `question`, `answer`, `que_date`, `email_id`) VALUES
(4, 'Hey', 'Hello! I am Priya Patel', '2021-03-01', 'priya@gmail.com'),
(5, 'Heyyy', 'Hellooo! I am Shrey Patel', '2021-03-02', 'shrey@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `store_address` varchar(500) NOT NULL,
  `product_photo` varchar(50) NOT NULL,
  `product_description` varchar(3000) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `delivery_option` varchar(10) NOT NULL
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
  ADD UNIQUE KEY `contact_number` (`contact_number`),
  ADD KEY `adaption_fk` (`u_id`);

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
  ADD PRIMARY KEY (`c_req_id`),
  ADD KEY `caretaker_user_fk` (`u_id`),
  ADD KEY `caretaker_fk` (`c_id`);

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
  ADD PRIMARY KEY (`d_req_id`),
  ADD KEY `doctor_fk` (`d_id`),
  ADD KEY `doctor_user_fk` (`u_id`);

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
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `seller_product` (`s_id`);

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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  MODIFY `c_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor_client_req`
--
ALTER TABLE `doctor_client_req`
  MODIFY `d_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petowner`
--
ALTER TABLE `petowner`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adaption_list`
--
ALTER TABLE `adaption_list`
  ADD CONSTRAINT `adaption_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  ADD CONSTRAINT `caretaker_fk` FOREIGN KEY (`c_id`) REFERENCES `caretaker` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `caretaker_user_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_client_req`
--
ALTER TABLE `doctor_client_req`
  ADD CONSTRAINT `doctor_fk` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_user_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_product`
--
ALTER TABLE `store_product`
  ADD CONSTRAINT `seller_product` FOREIGN KEY (`s_id`) REFERENCES `seller` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
