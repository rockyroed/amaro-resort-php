-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 08:45 PM
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
  `type` enum('User','Admin','','') NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `event_reservations`
--

CREATE TABLE `event_reservations` (
  `event_reservation_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `event_type` enum('Function Hall','Court','','') NOT NULL,
  `pax_adults` int(11) NOT NULL,
  `pax_children` int(11) NOT NULL,
  `event_venue_id` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `gcash_payment_details`
--

CREATE TABLE `gcash_payment_details` (
  `gcash_payment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `transaction_id` int(100) NOT NULL
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
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email_address`, `password`, `type`, `creation_date`) VALUES
(1, 'Christian Roed', 'Panes', 'Boyles', '09183579673', 'flldwthr@gmail.com', 'thisisapassword', 'User', '2023-07-22 19:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `mastercard_payment_details`
--

CREATE TABLE `mastercard_payment_details` (
  `mastercard_payment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `cardholder_number` varchar(15) NOT NULL,
  `cardholder_name` varchar(100) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payment_details`
--

CREATE TABLE `paypal_payment_details` (
  `paypal_payment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `email_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `reservation_type` enum('Swimming','Room','Event','') NOT NULL,
  `reservation_date` datetime NOT NULL,
  `payment_method` enum('GCash','Paypal','MasterCard','') NOT NULL,
  `down_payment` float NOT NULL,
  `payment_status` enum('Pending','Paid','Visited','Rated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `guest_id`, `reservation_type`, `reservation_date`, `payment_method`, `down_payment`, `payment_status`) VALUES
(1, 1, 'Swimming', '2023-07-22 12:01:44', 'GCash', 550, 'Paid');

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

-- --------------------------------------------------------

--
-- Table structure for table `room_reservations`
--

CREATE TABLE `room_reservations` (
  `swimming_reservation_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `room_type` enum('Couple','Family','','') NOT NULL,
  `pax_adults` int(11) NOT NULL,
  `pax_children` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `swimming_prices`
--

CREATE TABLE `swimming_prices` (
  `swimming_price_id` int(11) NOT NULL,
  `chosen_hour` enum('Day','Night','','') NOT NULL,
  `pool_type` enum('Above 4 Ft.','Below 4 Ft.','','') NOT NULL,
  `guest_type` enum('Adult','Child','','') NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `swimming_reservations`
--

CREATE TABLE `swimming_reservations` (
  `swimming_reservation_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `chosen_hour` enum('Day','Night','','') NOT NULL,
  `pax_adults` int(11) NOT NULL,
  `pax_children` int(11) NOT NULL,
  `pool_type` enum('Below 4 Ft.','Above 4 Ft.','','') NOT NULL,
  `cottage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `swimming_reservations`
--

INSERT INTO `swimming_reservations` (`swimming_reservation_id`, `reservation_id`, `chosen_hour`, `pax_adults`, `pax_children`, `pool_type`, `cottage_id`) VALUES
(1, 1, 'Day', 1, 0, 'Above 4 Ft.', NULL);

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
-- Indexes for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD PRIMARY KEY (`event_reservation_id`),
  ADD KEY `event_to_reservation` (`reservation_id`),
  ADD KEY `event_to_venue` (`event_venue_id`);

--
-- Indexes for table `event_venues`
--
ALTER TABLE `event_venues`
  ADD PRIMARY KEY (`event_venue_id`);

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
-- Indexes for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD PRIMARY KEY (`swimming_reservation_id`),
  ADD KEY `room_to_reservation` (`reservation_id`),
  ADD KEY `room_to_room` (`room_id`);

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
  ADD KEY `swimming_to_cottage` (`cottage_id`);

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
  MODIFY `cottage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_reservations`
--
ALTER TABLE `event_reservations`
  MODIFY `event_reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_venues`
--
ALTER TABLE `event_venues`
  MODIFY `event_venue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gcash_payment_details`
--
ALTER TABLE `gcash_payment_details`
  MODIFY `gcash_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mastercard_payment_details`
--
ALTER TABLE `mastercard_payment_details`
  MODIFY `mastercard_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_payment_details`
--
ALTER TABLE `paypal_payment_details`
  MODIFY `paypal_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_reservations`
--
ALTER TABLE `room_reservations`
  MODIFY `swimming_reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swimming_prices`
--
ALTER TABLE `swimming_prices`
  MODIFY `swimming_price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  MODIFY `swimming_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_reservations`
--
ALTER TABLE `event_reservations`
  ADD CONSTRAINT `event_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_to_venue` FOREIGN KEY (`event_venue_id`) REFERENCES `event_venues` (`event_venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD CONSTRAINT `room_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_to_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `swimming_reservations`
--
ALTER TABLE `swimming_reservations`
  ADD CONSTRAINT `swimming_to_cottage` FOREIGN KEY (`cottage_id`) REFERENCES `cottages` (`cottage_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `swimming_to_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
