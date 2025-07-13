-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 07:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Bookingid` int(11) NOT NULL,
  `PickupDate` date NOT NULL,
  `PickupTime` time NOT NULL,
  `ReturnDate` date NOT NULL,
  `ReturnTime` time NOT NULL,
  `userid` int(255) NOT NULL,
  `filterdetailsid` int(255) NOT NULL,
  `additionalDriver` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Bookingid`, `PickupDate`, `PickupTime`, `ReturnDate`, `ReturnTime`, `userid`, `filterdetailsid`, `additionalDriver`) VALUES
(15, '2025-07-10', '10:00:00', '2025-07-16', '14:00:00', 3, 7, 1),
(16, '2025-07-10', '10:00:00', '2025-07-16', '14:00:00', 3, 7, 1),
(17, '2025-07-10', '10:00:00', '2025-07-16', '14:00:00', 3, 7, 1),
(18, '2025-07-10', '10:00:00', '2025-07-16', '14:00:00', 3, 7, 1),
(19, '2025-07-16', '09:00:00', '2025-07-17', '13:00:00', 3, 7, 1),
(20, '2025-07-17', '10:00:00', '2025-07-16', '13:00:00', 3, 7, 1),
(21, '2025-07-17', '10:00:00', '2025-07-16', '13:00:00', 3, 7, 1),
(22, '2025-07-10', '10:00:00', '2025-07-24', '12:00:00', 3, 7, 2),
(23, '2025-07-15', '10:00:00', '2025-07-25', '12:00:00', 3, 7, 1),
(24, '2025-07-15', '10:00:00', '2025-07-25', '12:00:00', 3, 7, 1),
(25, '2025-07-15', '10:00:00', '2025-07-25', '11:00:00', 3, 7, 1),
(26, '2025-07-15', '10:00:00', '2025-07-25', '11:00:00', 3, 7, 1),
(27, '2025-07-11', '09:00:00', '2025-07-18', '13:00:00', 3, 9, 1),
(28, '2025-07-11', '09:00:00', '2025-07-18', '13:00:00', 3, 9, 1),
(29, '2025-07-11', '12:00:00', '2025-07-25', '10:00:00', 3, 8, 1),
(30, '2025-07-11', '12:00:00', '2025-07-25', '10:00:00', 3, 8, 1),
(31, '2025-07-11', '12:00:00', '2025-07-25', '10:00:00', 3, 8, 1),
(32, '2025-07-11', '09:00:00', '2025-07-25', '11:00:00', 3, 11, 1),
(33, '2025-07-11', '09:00:00', '2025-07-25', '11:00:00', 3, 11, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Bookingid`),
  ADD KEY `leusers` (`userid`),
  ADD KEY `lecars` (`filterdetailsid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `lecars` FOREIGN KEY (`filterdetailsid`) REFERENCES `filterdetails` (`id`),
  ADD CONSTRAINT `leusers` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
