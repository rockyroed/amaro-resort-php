-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 06:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(2, 'Christian Roed', 'Panes', 'Boyles', '09685768495', 'chrstnrdbyls@gmail.com', '$2y$10$7sApkqpkhK9qSupHaAE76.kW7crAddNXfiK0ORzUTUJGdx1JQll1u', 'User', '2024-02-20 01:14:00', NULL);

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
('CAN-1', 1, NULL),
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
('FUN-1', 1, NULL),
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
(8, 'John', 'Michael', 'Vincent', '09675849385', 'johnmichael@gmail.com', '$2y$10$X9j75SdXYR2v9Lir3SKHYOTpyboEWodPxPjglx8Pk5KzjE9cte9hC', 'User', '2024-02-20 01:00:13', NULL),
(9, 'Christian Roed', 'Panes', 'Boyles', '09685768495', 'chrstnrdbyls@gmail.com', '$2y$10$s8rX4zFEx3CoB5JO5YH/8.JKhqw5xotvT4dTrYegXQQ.gn.0iBzcy', 'User', '2024-02-20 01:12:41', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payment_details`
--

CREATE TABLE `paypal_payment_details` (
  `paypal_payment_id` int(11) NOT NULL,
  `reservation_id` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
