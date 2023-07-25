-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 10:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('User','Admin','','') NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modification_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cottages`
--

CREATE TABLE `cottages` (
  `cottage_id` int(11) NOT NULL,
  `cottage_type` enum('Canopy','Trellis 1','Trellis 2','Kubo','Pavilion 1','Pavilion 2','Pavilion 3') NOT NULL,
  `pax_min` int(11) NOT NULL,
  `pax_max` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cottages`
--

INSERT INTO `cottages` (`cottage_id`, `cottage_type`, `pax_min`, `pax_max`, `price`) VALUES
(1, 'Canopy', 5, 10, 1000),
(2, 'Trellis 1', 10, 15, 1500),
(3, 'Trellis 2', 15, 20, 2000),
(4, 'Kubo', 5, 10, 1200),
(5, 'Pavilion 1', 40, 50, 7500),
(6, 'Pavilion 2', 55, 65, 6500),
(7, 'Pavilion 3', 90, 100, 9500);

-- --------------------------------------------------------

--
-- Table structure for table `cottage_numbers`
--

CREATE TABLE `cottage_numbers` (
  `cottage_number` varchar(11) NOT NULL,
  `cottage_id` int(11) NOT NULL,
  `reserved_check_in` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cottage_numbers`
--

INSERT INTO `cottage_numbers` (`cottage_number`, `cottage_id`, `reserved_check_in`) VALUES
('CAN-1', 1, '0000-00-00'),
('CAN-10', 1, '2023-07-27'),
('CAN-11', 1, '2023-07-26'),
('CAN-12', 1, '2023-07-26'),
('CAN-13', 1, '2023-07-19'),
('CAN-14', 1, NULL),
('CAN-15', 1, NULL),
('CAN-16', 1, NULL),
('CAN-17', 1, NULL),
('CAN-18', 1, NULL),
('CAN-19', 1, NULL),
('CAN-2', 1, NULL),
('CAN-20', 1, NULL),
('CAN-3', 1, NULL),
('CAN-4', 1, NULL),
('CAN-5', 1, NULL),
('CAN-6', 1, NULL),
('CAN-7', 1, NULL),
('CAN-8', 1, NULL),
('CAN-9', 1, NULL),
('KUB-1', 4, NULL),
('KUB-10', 4, NULL),
('KUB-2', 4, NULL),
('KUB-3', 4, NULL),
('KUB-4', 4, NULL),
('KUB-5', 4, NULL),
('KUB-6', 4, NULL),
('KUB-7', 4, NULL),
('KUB-8', 4, NULL),
('KUB-9', 4, NULL),
('PAV1-1', 5, NULL),
('PAV1-2', 5, NULL),
('PAV1-3', 5, NULL),
('PAV1-4', 5, NULL),
('PAV1-5', 5, NULL),
('PAV2-1', 6, NULL),
('PAV2-2', 6, NULL),
('PAV2-3', 6, NULL),
('PAV2-4', 6, NULL),
('PAV2-5', 6, NULL),
('PAV3-1', 7, NULL),
('PAV3-2', 7, NULL),
('TREL1-1', 2, NULL),
('TREL1-10', 2, NULL),
('TREL1-2', 2, NULL),
('TREL1-3', 2, NULL),
('TREL1-4', 2, NULL),
('TREL1-5', 2, NULL),
('TREL1-6', 2, NULL),
('TREL1-7', 2, NULL),
('TREL1-8', 2, NULL),
('TREL1-9', 2, NULL),
('TREL2-1', 3, NULL),
('TREL2-10', 3, NULL),
('TREL2-2', 3, NULL),
('TREL2-3', 3, NULL),
('TREL2-4', 3, NULL),
('TREL2-5', 3, NULL),
('TREL2-6', 3, NULL),
('TREL2-7', 3, NULL),
('TREL2-8', 3, NULL),
('TREL2-9', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_reservations`
--

CREATE TABLE `event_reservations` (
  `event_reservation_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `event_type` enum('Function Hall','Court','','') NOT NULL,
  `pax_number` int(11) NOT NULL,
  `event_venue_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_reservations`
--

INSERT INTO `event_reservations` (`event_reservation_id`, `reservation_id`, `event_type`, `pax_number`, `event_venue_number`) VALUES
(3, 'cef0939984c9932d4301d96ad58cff1e', 'Function Hall', 4, 'FUN-1'),
(4, '71ae43f9441f93c65e7cf14606ba2409', 'Function Hall', 4, 'FUN-1');

-- --------------------------------------------------------

--
-- Table structure for table `event_venues`
--

CREATE TABLE `event_venues` (
  `event_venue_id` int(11) NOT NULL,
  `event_type` enum('Function Hall','Court','','') NOT NULL,
  `pax_min` int(11) NOT NULL,
  `pax_max` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_venues`
--

INSERT INTO `event_venues` (`event_venue_id`, `event_type`, `pax_min`, `pax_max`, `price`) VALUES
(1, 'Function Hall', 70, 80, 25000),
(2, 'Court', 200, 250, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `event_venue_numbers`
--

CREATE TABLE `event_venue_numbers` (
  `event_venue_number` varchar(11) NOT NULL,
  `event_venue_id` int(11) NOT NULL,
  `reserved_check_in` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_venue_numbers`
--

INSERT INTO `event_venue_numbers` (`event_venue_number`, `event_venue_id`, `reserved_check_in`) VALUES
('BAS-1', 2, NULL),
('BAS-2', 2, NULL),
('FUN-1', 1, 2023),
('FUN-2', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payment_details`
--

CREATE TABLE `gcash_payment_details` (
  `gcash_payment_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gcash_payment_details`
--

INSERT INTO `gcash_payment_details` (`gcash_payment_id`, `reservation_id`, `account_name`, `account_number`) VALUES
(1, '51120cea49c14810d476355127e6c8b3', 'finn', '09612649728');

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
(1, 'Finn', 'Palma', 'Muyco', '09612649728', 'mjmuyco13@gmail.com', 'thisisapassword', 'User', '2023-07-22 19:24:00', NULL),
(7, 'Saitama', NULL, 'Saitama', '09485938495', 'saitamasaitama@gmail.com', 'onepunchman', 'User', '2023-07-24 21:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mastercard_payment_details`
--

CREATE TABLE `mastercard_payment_details` (
  `mastercard_payment_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `cardholder_number` varchar(15) NOT NULL,
  `cardholder_name` varchar(100) NOT NULL,
  `mm` int(11) NOT NULL,
  `yyyy` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mastercard_payment_details`
--

INSERT INTO `mastercard_payment_details` (`mastercard_payment_id`, `reservation_id`, `cardholder_number`, `cardholder_name`, `mm`, `yyyy`, `cvv`) VALUES
(1, '4fccba0d0f9e5c254e67d215f348ce48', '504', 'Finn', 7, 2023, 504);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payment_details`
--

CREATE TABLE `paypal_payment_details` (
  `paypal_payment_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_payment_details`
--

INSERT INTO `paypal_payment_details` (`paypal_payment_id`, `reservation_id`, `email_address`) VALUES
(2, '4d594c9beb34a0086dcdd1dc4ee28b98', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` varchar(255) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `reservation_type` enum('Swimming','Room','Event','') NOT NULL,
  `reservation_date` datetime NOT NULL,
  `payment_method` enum('GCash','Paypal','MasterCard','') NOT NULL,
  `total_cost` float NOT NULL,
  `down_payment` float NOT NULL,
  `payment_status` enum('Pending','Paid','Visited','Rated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `guest_id`, `reservation_type`, `reservation_date`, `payment_method`, `total_cost`, `down_payment`, `payment_status`) VALUES
('01459f02ef0297b6ccaae2240c3d4e2c', 1, 'Swimming', '2023-07-25 07:49:45', 'GCash', 1840, 368, 'Pending'),
('02c345ac143c5ecd189cc2e9eabc264d', 1, 'Event', '2023-07-25 22:07:22', 'Paypal', 25000, 5000, 'Pending'),
('081a7403b7a5838f8ccab42e4964307f', 1, 'Swimming', '2023-07-24 21:53:12', 'Paypal', 1560, 312, 'Pending'),
('0b6dd8d965c86c0cef9c18561ea0a165', 1, 'Swimming', '2023-07-25 22:26:42', 'MasterCard', 1560, 312, 'Pending'),
('0be57beec5b959b7e47e72e46c426367', 1, 'Swimming', '2023-07-24 21:56:52', 'Paypal', 1560, 312, 'Pending'),
('198fc7983f1e5488aa91913600fff0db', 1, 'Event', '2023-07-24 21:49:25', 'Paypal', 25000, 5000, 'Pending'),
('1a8c304e0b7555da36f2b3e50e675830', 1, 'Event', '2023-07-25 22:11:00', 'Paypal', 25000, 5000, 'Pending'),
('2bf43805cb4dcdf187a7bbc34f1d98a5', 1, 'Room', '2023-07-24 21:04:45', 'Paypal', 2000, 400, 'Pending'),
('2e21444e736a39b60908e59e11ce8e72', 1, 'Event', '2023-07-24 20:27:47', 'Paypal', 25000, 5000, 'Pending'),
('2f948962d23aa2a1ca1efb8886055823', 1, 'Event', '2023-07-25 22:09:26', 'Paypal', 25000, 5000, 'Pending'),
('31af83d125a8e62c00622f5e8bed954a', 1, 'Swimming', '2023-07-25 22:14:58', 'Paypal', 1560, 312, 'Pending'),
('33456c7e726dba085bd345f1bcd082a5', 1, 'Room', '2023-07-25 22:00:08', 'Paypal', 5600, 1120, 'Pending'),
('37ba9dddfdc149c03c35e0c65a7872e8', 1, 'Swimming', '2023-07-24 21:56:51', 'Paypal', 1560, 312, 'Pending'),
('4d594c9beb34a0086dcdd1dc4ee28b98', 1, 'Swimming', '2023-07-25 22:25:19', 'Paypal', 1560, 312, 'Pending'),
('4fccba0d0f9e5c254e67d215f348ce48', 1, 'Swimming', '2023-07-25 22:29:35', 'MasterCard', 1560, 312, 'Pending'),
('5075c66f2be2a213d4b855759e603a42', 1, 'Swimming', '2023-07-25 22:26:58', 'MasterCard', 1560, 312, 'Pending'),
('51120cea49c14810d476355127e6c8b3', 1, 'Swimming', '2023-07-25 22:26:02', 'GCash', 1560, 312, 'Pending'),
('66413480c6ea01c56d91f04384108a04', 1, 'Swimming', '2023-07-25 22:22:27', 'Paypal', 1560, 312, 'Pending'),
('6c5fde5a824e9854c15b9e10d4bf4c6f', 1, 'Swimming', '2023-07-24 21:56:23', 'Paypal', 1560, 312, 'Pending'),
('707b0ac4fc9b3af471fb4f49ec16ac6b', 1, 'Room', '2023-07-25 21:56:32', 'Paypal', 2000, 400, 'Pending'),
('71ae43f9441f93c65e7cf14606ba2409', 1, 'Event', '2023-07-25 22:18:51', 'Paypal', 25000, 5000, 'Pending'),
('767ce509082e1f91ef709c5919f4d601', 1, 'Swimming', '2023-07-25 21:34:13', 'Paypal', 1560, 312, 'Pending'),
('78b52aa39a920605593610c45a274d88', 1, 'Room', '2023-07-25 21:58:40', 'Paypal', 4000, 800, 'Pending'),
('7ac445e7b9aac4791a95118c6a086bde', 1, 'Room', '2023-07-25 21:58:13', 'Paypal', 2000, 400, 'Pending'),
('84b0f43355ea11e90cb1d841b632bb56', 1, 'Room', '2023-07-25 22:17:50', 'Paypal', 2000, 400, 'Pending'),
('8d96ab486a8e499fcb7bea6991fe079d', 1, 'Room', '2023-07-25 21:57:19', 'Paypal', 2000, 400, 'Pending'),
('98e7bebb095b4b18f5207609f5fc5c8d', 1, 'Swimming', '2023-07-25 22:28:08', 'MasterCard', 1560, 312, 'Pending'),
('9d2d3d659708976f3bfb1b69e2ea9713', 1, 'Room', '2023-07-25 21:58:06', 'Paypal', 2000, 400, 'Pending'),
('9ea4c78fb7005f4a70a71610a2c57d7f', 1, 'Swimming', '2023-07-25 21:53:04', 'Paypal', 1560, 312, 'Pending'),
('9fcc2b420585396bdc4392440fe59096', 1, 'Swimming', '2023-07-25 21:50:55', 'Paypal', 2060, 412, 'Pending'),
('ac8d5725432b6c1dd5315733b148e765', 1, 'Event', '2023-07-25 22:08:51', 'Paypal', 25000, 5000, 'Pending'),
('b2d6af2524dbc049065cc8374972862d', 1, 'Swimming', '2023-07-25 22:28:40', 'MasterCard', 1560, 312, 'Pending'),
('b7b71ddcf37ed147caadb2285a85d210', 1, 'Swimming', '2023-07-24 21:56:52', 'Paypal', 1560, 312, 'Pending'),
('c4577ebf169d2057b0ea19ed5a126ad8', 1, 'Room', '2023-07-24 20:52:08', 'Paypal', 2000, 400, 'Pending'),
('c599972d5332ed318ecb6ca26faf7b64', 1, 'Swimming', '2023-07-24 21:55:59', 'Paypal', 1560, 312, 'Pending'),
('cef0939984c9932d4301d96ad58cff1e', 1, 'Event', '2023-07-25 22:18:25', 'Paypal', 25000, 5000, 'Pending'),
('d1c7241bbde5fd84415ebdf9b76f8d46', 1, 'Event', '2023-07-25 22:08:13', 'Paypal', 25000, 5000, 'Pending'),
('d6e53717945df67f15d47e11b8f7d625', 1, 'Event', '2023-07-24 21:51:56', 'Paypal', 25000, 5000, 'Pending'),
('dacbf303391d365955bd4a1707c03d2e', 1, 'Swimming', '2023-07-25 21:32:08', 'Paypal', 1560, 312, 'Pending'),
('ded634c1b9af4721ca1712cef61c3cc6', 1, 'Swimming', '2023-07-25 22:29:24', 'MasterCard', 1560, 312, 'Pending'),
('e6936bdca9ecd65cee001ea7de355271', 1, 'Room', '2023-07-24 20:54:22', 'Paypal', 2000, 400, 'Pending'),
('ebc3bd32acdc4fcad6ef88aa5e72bcc0', 1, 'Swimming', '2023-07-25 22:24:39', 'Paypal', 1560, 312, 'Pending'),
('ee94f21c79c331e13e10fe3a2db98511', 1, 'Swimming', '2023-07-25 22:27:37', 'MasterCard', 1560, 312, 'Pending'),
('f8213918c57ae9c6796316866bc6b04b', 1, 'Swimming', '2023-07-24 21:54:04', 'Paypal', 1560, 312, 'Pending'),
('f8e877e3238976e1a7ccedca4791be2d', 1, 'Swimming', '2023-07-24 21:54:32', 'Paypal', 1560, 312, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` enum('Couple','Family','','') NOT NULL,
  `pax_min` int(11) NOT NULL,
  `pax_max` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `pax_min`, `pax_max`, `price`) VALUES
(1, 'Couple', 1, 2, 2000),
(2, 'Family', 2, 4, 2800);

-- --------------------------------------------------------

--
-- Table structure for table `room_numbers`
--

CREATE TABLE `room_numbers` (
  `room_number` varchar(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reserved_check_in` date DEFAULT NULL,
  `reserved_check_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_numbers`
--

INSERT INTO `room_numbers` (`room_number`, `room_id`, `reserved_check_in`, `reserved_check_out`) VALUES
('COU-1', 1, '2023-07-28', '2023-07-29'),
('COU-10', 1, NULL, NULL),
('COU-2', 1, NULL, NULL),
('COU-3', 1, NULL, NULL),
('COU-4', 1, NULL, NULL),
('COU-5', 1, NULL, NULL),
('COU-6', 1, NULL, NULL),
('COU-7', 1, NULL, NULL),
('COU-8', 1, NULL, NULL),
('COU-9', 1, NULL, NULL),
('FAM-1', 2, NULL, NULL),
('FAM-10', 2, NULL, NULL),
('FAM-2', 2, NULL, NULL),
('FAM-3', 2, NULL, NULL),
('FAM-4', 2, NULL, NULL),
('FAM-5', 2, NULL, NULL),
('FAM-6', 2, NULL, NULL),
('FAM-7', 2, NULL, NULL),
('FAM-8', 2, NULL, NULL),
('FAM-9', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_reservations`
--

CREATE TABLE `room_reservations` (
  `room_reservation_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `room_type` enum('Couple','Family','','') NOT NULL,
  `pax_number` int(11) NOT NULL,
  `room_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_reservations`
--

INSERT INTO `room_reservations` (`room_reservation_id`, `reservation_id`, `room_type`, `pax_number`, `room_number`) VALUES
(6, '84b0f43355ea11e90cb1d841b632bb56', 'Couple', 2, 'COU-1');

-- --------------------------------------------------------

--
-- Table structure for table `swimming_prices`
--

CREATE TABLE `swimming_prices` (
  `swimming_price_id` int(11) NOT NULL,
  `chosen_hour` enum('Day','Night','','') NOT NULL,
  `guest_type` enum('Adult','Child','Senior','') NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `swimming_prices`
--

INSERT INTO `swimming_prices` (`swimming_price_id`, `chosen_hour`, `guest_type`, `price`) VALUES
(1, 'Day', 'Adult', 280),
(2, 'Day', 'Child', 250),
(3, 'Day', 'Senior', 224),
(4, 'Night', 'Adult', 300),
(5, 'Night', 'Child', 250),
(6, 'Night', 'Senior', 240);

-- --------------------------------------------------------

--
-- Table structure for table `swimming_reservations`
--

CREATE TABLE `swimming_reservations` (
  `swimming_reservation_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `chosen_hour` enum('Day','Night','','') NOT NULL,
  `pax_adults` int(11) NOT NULL,
  `pax_children` int(11) NOT NULL,
  `pax_senior` int(11) NOT NULL,
  `cottage_number` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `swimming_reservations`
--

INSERT INTO `swimming_reservations` (`swimming_reservation_id`, `reservation_id`, `chosen_hour`, `pax_adults`, `pax_children`, `pax_senior`, `cottage_number`) VALUES
(11, '9fcc2b420585396bdc4392440fe59096', 'Day', 2, 2, 0, 'CAN-10'),
(12, '9ea4c78fb7005f4a70a71610a2c57d7f', 'Day', 2, 0, 0, 'CAN-10'),
(13, '31af83d125a8e62c00622f5e8bed954a', 'Day', 2, 0, 0, 'CAN-10'),
(14, '66413480c6ea01c56d91f04384108a04', 'Day', 2, 0, 0, 'CAN-11'),
(15, 'ebc3bd32acdc4fcad6ef88aa5e72bcc0', 'Day', 2, 0, 0, 'CAN-11'),
(16, '4d594c9beb34a0086dcdd1dc4ee28b98', 'Day', 2, 0, 0, 'CAN-11'),
(17, '51120cea49c14810d476355127e6c8b3', 'Day', 2, 0, 0, 'CAN-12'),
(18, '0b6dd8d965c86c0cef9c18561ea0a165', 'Day', 2, 0, 0, 'CAN-13'),
(19, '5075c66f2be2a213d4b855759e603a42', 'Day', 2, 0, 0, 'CAN-13'),
(20, 'ee94f21c79c331e13e10fe3a2db98511', 'Day', 2, 0, 0, 'CAN-13'),
(21, '98e7bebb095b4b18f5207609f5fc5c8d', 'Day', 2, 0, 0, 'CAN-13'),
(22, 'b2d6af2524dbc049065cc8374972862d', 'Day', 2, 0, 0, 'CAN-13'),
(23, 'ded634c1b9af4721ca1712cef61c3cc6', 'Day', 2, 0, 0, 'CAN-13'),
(24, '4fccba0d0f9e5c254e67d215f348ce48', 'Day', 2, 0, 0, 'CAN-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cottages`
--
ALTER TABLE `cottages`
  ADD PRIMARY KEY (`cottage_id`);

--
-- Indexes for table `cottage_numbers`
--
ALTER TABLE `cottage_numbers`
  ADD PRIMARY KEY (`cottage_number`),
  ADD KEY `cottage_number_to_cottage_id` (`cottage_id`);

--
-- Indexes for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD PRIMARY KEY (`event_reservation_id`),
  ADD KEY `event_to_reservation` (`reservation_id`),
  ADD KEY `event_to_venue` (`event_venue_number`);

--
-- Indexes for table `event_venues`
--
ALTER TABLE `event_venues`
  ADD PRIMARY KEY (`event_venue_id`);

--
-- Indexes for table `event_venue_numbers`
--
ALTER TABLE `event_venue_numbers`
  ADD PRIMARY KEY (`event_venue_number`),
  ADD KEY `event_venue_numbers_to_event_venue_types` (`event_venue_id`);

--
-- Indexes for table `gcash_payment_details`
--
ALTER TABLE `gcash_payment_details`
  ADD PRIMARY KEY (`gcash_payment_id`),
  ADD KEY `gcash_to_reservation` (`reservation_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `mastercard_payment_details`
--
ALTER TABLE `mastercard_payment_details`
  ADD PRIMARY KEY (`mastercard_payment_id`),
  ADD KEY `mastercard_to_reservation` (`reservation_id`);

--
-- Indexes for table `paypal_payment_details`
--
ALTER TABLE `paypal_payment_details`
  ADD PRIMARY KEY (`paypal_payment_id`),
  ADD KEY `paypal_to_reservation` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservation_to_guest` (`guest_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_numbers`
--
ALTER TABLE `room_numbers`
  ADD PRIMARY KEY (`room_number`),
  ADD KEY `room_number_to_room_type` (`room_id`);

--
-- Indexes for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD PRIMARY KEY (`room_reservation_id`),
  ADD KEY `room_to_reservation` (`reservation_id`),
  ADD KEY `room_to_room` (`room_number`);

--
-- Indexes for table `swimming_prices`
--
ALTER TABLE `swimming_prices`
  ADD PRIMARY KEY (`swimming_price_id`);

--
-- Indexes for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  ADD PRIMARY KEY (`swimming_reservation_id`),
  ADD KEY `swimming_to_reservation` (`reservation_id`),
  ADD KEY `swimming_to_cottage_number` (`cottage_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `cottage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_reservations`
--
ALTER TABLE `event_reservations`
  MODIFY `event_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_venues`
--
ALTER TABLE `event_venues`
  MODIFY `event_venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gcash_payment_details`
--
ALTER TABLE `gcash_payment_details`
  MODIFY `gcash_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mastercard_payment_details`
--
ALTER TABLE `mastercard_payment_details`
  MODIFY `mastercard_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paypal_payment_details`
--
ALTER TABLE `paypal_payment_details`
  MODIFY `paypal_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_reservations`
--
ALTER TABLE `room_reservations`
  MODIFY `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `swimming_prices`
--
ALTER TABLE `swimming_prices`
  MODIFY `swimming_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  MODIFY `swimming_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cottage_numbers`
--
ALTER TABLE `cottage_numbers`
  ADD CONSTRAINT `cottage_number_to_cottage_id` FOREIGN KEY (`cottage_id`) REFERENCES `cottages` (`cottage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD CONSTRAINT `event_to_event_number` FOREIGN KEY (`event_venue_number`) REFERENCES `event_venue_numbers` (`event_venue_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_venue_numbers`
--
ALTER TABLE `event_venue_numbers`
  ADD CONSTRAINT `event_venue_numbers_to_event_venue_types` FOREIGN KEY (`event_venue_id`) REFERENCES `event_venues` (`event_venue_id`);

--
-- Constraints for table `gcash_payment_details`
--
ALTER TABLE `gcash_payment_details`
  ADD CONSTRAINT `gcash_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mastercard_payment_details`
--
ALTER TABLE `mastercard_payment_details`
  ADD CONSTRAINT `mastercard_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paypal_payment_details`
--
ALTER TABLE `paypal_payment_details`
  ADD CONSTRAINT `paypal_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservation_to_guest` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`guest_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_numbers`
--
ALTER TABLE `room_numbers`
  ADD CONSTRAINT `room_number_to_room_type` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD CONSTRAINT `room_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_to_room` FOREIGN KEY (`room_number`) REFERENCES `room_numbers` (`room_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  ADD CONSTRAINT `swimming_to_cottage_number` FOREIGN KEY (`cottage_number`) REFERENCES `cottage_numbers` (`cottage_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `swimming_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
