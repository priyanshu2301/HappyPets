-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 06:13 PM
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
-- Table structure for table `adoption_list`
--

CREATE TABLE `adoption_list` (
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
  `pet_price` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoption_list`
--

INSERT INTO `adoption_list` (`pt_id`, `u_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `pet_type`, `address`, `pet_photo`, `pet_description`, `pet_breed`, `pet_date_of_birth`, `pet_price`) VALUES
(7, 26, 'Priya', 'Patel', 'priya@gmail.com', 9429655154, 'Dog', 'D/27 sterling', '1618206745-7.JPG', 'Happy and healthy', 'Labro', '2021-04-09', 1000),
(8, 27, 'Priyanshu', 'Patel', 'priyanshu@gmail.com', 8128706065, 'Rabbit', 'C/27 Sterling City', '1618206824-5.JPG', 'Happy and healthy', 'Normal', '2021-04-03', 10000);

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
  `specialist` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker`
--

INSERT INTO `caretaker` (`c_id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`, `address`, `date_of_birth`, `photo`, `status`, `specialist`, `gender`) VALUES
(25, 'Shrey', 'Patel', 'shrey@gmail.com', 9484668161, '1234', 'C27 Sterling', '2003-03-02', '1617378787-5.JPG', 'On', 'Dog', 'MALE'),
(27, 'Kavan', 'Pandya', 'kavan@gmail.com', 8123456780, '1234', 'E27 Sterling', '1999-03-24', '1617638023-2.JPG', 'Off', 'Dog', 'MALE'),
(28, 'Bhavya', 'Prajapati', 'bhavya@gmail.com', 9429665154, '1234', 'E/27 Sterling City', '2003-02-23', '1617981893-4.JPG', 'On', 'Cat', 'MALE');

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
-- Table structure for table `caretaker_feedback`
--

CREATE TABLE `caretaker_feedback` (
  `cf_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker_feedback`
--

INSERT INTO `caretaker_feedback` (`cf_id`, `u_id`, `c_id`, `feedback_date`, `rating`) VALUES
(1, 26, 25, '2021-04-12', 4),
(2, 26, 25, '2021-04-12', 4),
(3, 26, 25, '2021-04-12', 5),
(4, 26, 27, '2021-04-12', 3),
(5, 27, 25, '2021-04-13', 4),
(6, 27, 27, '2021-04-13', 4),
(7, 26, 25, '2021-04-14', 4);

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
(15, 'Aryan', 'Gadhia', 'aryan@gmail.com', 9429655254, '1234', 'C/28 Sterling city', '1618334867-6.JPG', 'City hospital', '1617886950-20.JPG', 'Cat', 'verified', 'On', 'Male');

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
-- Table structure for table `doctor_feedback`
--

CREATE TABLE `doctor_feedback` (
  `df_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `feedback_date` date NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_feedback`
--

INSERT INTO `doctor_feedback` (`df_id`, `u_id`, `d_id`, `feedback_date`, `rating`) VALUES
(1, 26, 14, '2021-04-13', 4),
(2, 26, 14, '2021-04-13', 4),
(3, 26, 15, '2021-04-13', 3),
(4, 27, 14, '2021-04-13', 3),
(5, 26, 14, '2021-04-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `q_id` int(11) NOT NULL,
  `que_title` varchar(100) NOT NULL,
  `que_desc` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`q_id`, `que_title`, `que_desc`, `date`) VALUES
(6, 'Hello', 'Hiiiiiiiii', '2021-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `faq_ans`
--

CREATE TABLE `faq_ans` (
  `ans_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_ans`
--

INSERT INTO `faq_ans` (`ans_id`, `q_id`, `answer`) VALUES
(1, 6, 'Hellooo'),
(2, 6, 'haha');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`email_id`);

--
-- Indexes for table `adoption_list`
--
ALTER TABLE `adoption_list`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `adaption_fk` (`u_id`);

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
-- Indexes for table `caretaker_feedback`
--
ALTER TABLE `caretaker_feedback`
  ADD PRIMARY KEY (`cf_id`),
  ADD KEY `ct_fb_fk` (`c_id`),
  ADD KEY `c_p_fb_fk` (`u_id`);

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
-- Indexes for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  ADD PRIMARY KEY (`df_id`),
  ADD KEY `d_fb_fk` (`d_id`),
  ADD KEY `d_p_fb_fk` (`u_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `faq_ans`
--
ALTER TABLE `faq_ans`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `faq_fk` (`q_id`);

--
-- Indexes for table `petowner`
--
ALTER TABLE `petowner`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoption_list`
--
ALTER TABLE `adoption_list`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `caretaker`
--
ALTER TABLE `caretaker`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  MODIFY `c_req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `caretaker_feedback`
--
ALTER TABLE `caretaker_feedback`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  MODIFY `df_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq_ans`
--
ALTER TABLE `faq_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petowner`
--
ALTER TABLE `petowner`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- Constraints for table `adoption_list`
--
ALTER TABLE `adoption_list`
  ADD CONSTRAINT `adaption_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caretaker_client_req`
--
ALTER TABLE `caretaker_client_req`
  ADD CONSTRAINT `caretaker_fk` FOREIGN KEY (`c_id`) REFERENCES `caretaker` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `caretaker_user_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `caretaker_feedback`
--
ALTER TABLE `caretaker_feedback`
  ADD CONSTRAINT `c_p_fb_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ct_fb_fk` FOREIGN KEY (`c_id`) REFERENCES `caretaker` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_client_req`
--
ALTER TABLE `doctor_client_req`
  ADD CONSTRAINT `doctor_fk` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_user_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_feedback`
--
ALTER TABLE `doctor_feedback`
  ADD CONSTRAINT `d_fb_fk` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_p_fb_fk` FOREIGN KEY (`u_id`) REFERENCES `petowner` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faq_ans`
--
ALTER TABLE `faq_ans`
  ADD CONSTRAINT `faq_fk` FOREIGN KEY (`q_id`) REFERENCES `faq` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store_product`
--
ALTER TABLE `store_product`
  ADD CONSTRAINT `seller_product` FOREIGN KEY (`s_id`) REFERENCES `seller` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
