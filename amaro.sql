-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 04:05 AM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email_address`, `password`, `type`, `creation_date`, `modification_date`) VALUES
(1, 'finn', 'ste', 'iner', '69', 'mjmuyco13@gmail.com', 'finn', 'Admin', '2023-07-29 01:12:00', NULL);

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
('CAN-1', 1, '2023-07-31'),
('CAN-10', 1, NULL),
('CAN-11', 1, NULL),
('CAN-12', 1, NULL),
('CAN-13', 1, NULL),
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
(1, '1a53906aef7c20bf108bdd8626f63f4e', 'Function Hall', 69, 'FUN-1'),
(2, '51a2f7b2c117a5172c29c168b6b564c3', 'Function Hall', 69, 'FUN-2'),
(6, '20386a2a7643f5ab87587cfe7ddee5f4', 'Function Hall', 69, 'FUN-1');

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
  `reserved_check_in` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_venue_numbers`
--

INSERT INTO `event_venue_numbers` (`event_venue_number`, `event_venue_id`, `reserved_check_in`) VALUES
('BAS-1', 2, NULL),
('BAS-2', 2, NULL),
('FUN-1', 1, '2023-08-05'),
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
(1, '6494ff02ae67e69de509d08dbac83bdb', 'finn', '09612649728');

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
(1, '1a53906aef7c20bf108bdd8626f63f4e', '69696969', 'Mathew', 7, 2023, 6969);

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
(1, 'd758ac74d32a8eb2343be7eedebb5536', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph'),
(2, '51a2f7b2c117a5172c29c168b6b564c3', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph'),
(3, '20386a2a7643f5ab87587cfe7ddee5f4', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph'),
(4, '6dd672a6', 'mathewjamespmuyco@iskolarngbayan.pup.edu.ph');

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
  `res_status` enum('Pending','Paid','Visited') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `guest_id`, `reservation_type`, `reservation_date`, `payment_method`, `total_cost`, `down_payment`, `res_status`) VALUES
('1a53906aef7c20bf108bdd8626f63f4e', 1, 'Event', '2023-07-28 00:00:00', 'MasterCard', 25000, 5000, 'Paid'),
('20386a2a7643f5ab87587cfe7ddee5f4', 1, 'Event', '2023-07-28 00:00:00', 'Paypal', 25000, 5000, 'Paid'),
('51a2f7b2c117a5172c29c168b6b564c3', 1, 'Event', '2023-07-28 00:00:00', 'Paypal', 25000, 5000, 'Visited'),
('6494ff02ae67e69de509d08dbac83bdb', 1, 'Room', '2023-07-28 00:00:00', 'GCash', 4000, 800, 'Visited'),
('6dd672a6', 1, 'Swimming', '2023-07-28 00:00:00', 'Paypal', 2060, 412, 'Visited'),
('7373a49c546f64851ae6f93206fe1740', 1, 'Event', '2023-07-28 00:00:00', 'Paypal', 25000, 5000, 'Pending'),
('a419d40cdf4f80868dd11152873a5b5e', 1, 'Event', '2023-07-28 00:00:00', 'Paypal', 25000, 5000, 'Pending'),
('d758ac74d32a8eb2343be7eedebb5536', 1, 'Swimming', '2023-07-28 00:00:00', 'Paypal', 1840, 368, 'Pending'),
('d865923aef970c3790b39d29f0b20e42', 1, 'Event', '2023-07-28 00:00:00', 'Paypal', 25000, 5000, 'Pending');

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
('COU-1', 1, NULL, NULL),
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
(1, '6494ff02ae67e69de509d08dbac83bdb', 'Couple', 2, 'COU-1');

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
(1, 'd758ac74d32a8eb2343be7eedebb5536', 'Day', 3, 0, 0, 'CAN-1'),
(2, '6dd672a6', 'Day', 2, 0, 0, 'TREL1-1');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `cottage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_reservations`
--
ALTER TABLE `event_reservations`
  MODIFY `event_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `paypal_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_reservations`
--
ALTER TABLE `room_reservations`
  MODIFY `room_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `swimming_prices`
--
ALTER TABLE `swimming_prices`
  MODIFY `swimming_price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  MODIFY `swimming_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
