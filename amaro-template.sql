-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('User','Admin','','') NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modification_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email_address`, `password`, `type`, `creation_date`, `modification_date`) VALUES
(1, 'Christian Roed', 'Panes', 'Boyles', '09183579673', 'flldwthr@gmail.com', 'thisisapassword', 'User', '2023-07-22 19:24:00', NULL),
(7, 'Saitama', NULL, 'Saitama', '09485938495', 'saitamasaitama@gmail.com', 'onepunchman', 'User', '2023-07-24 21:41:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
