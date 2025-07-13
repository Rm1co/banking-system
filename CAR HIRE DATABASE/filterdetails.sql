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
-- Table structure for table `filterdetails`
--

CREATE TABLE `filterdetails` (
  `id` int(20) NOT NULL,
  `carname` varchar(150) NOT NULL,
  `cartype` varchar(150) NOT NULL,
  `capacity` int(100) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `feature` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`feature`)),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filterdetails`
--

INSERT INTO `filterdetails` (`id`, `carname`, `cartype`, `capacity`, `transmission`, `price`, `feature`, `image`) VALUES
(7, 'Mercedes-Benz E200', 'Luxury Sedans', 5, 'Automatic', 160000, '[\"GPS Navigation\",\"Leather seats\"]', 'uploads/WhatsApp Image 2025-07-07 at 21.42.37_25a9ad8b.jpg'),
(8, 'Range Rover Vogue', 'SUVs', 5, 'Automatic', 200000, '[\"Panoramic Roof\",\"PWD\",\"Premium sound\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.15.29_b7659aea.jpg'),
(9, 'Porsche 911 Carrera', 'Sports Cars', 2, 'Manual', 300000, '[\"Sport Mode\",\"Carbon Fiber interior\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.21.27_5ddb8d6d.jpg'),
(10, 'Toyota Land Cruiser', 'SUVs', 7, 'Automatic', 150000, '[\"Towing capacity\",\"Off-road Package\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.25.43_d8041233.jpg'),
(11, 'BMW 740i', 'Luxury Sedans', 5, 'Automatic', 250000, '[\"Gesture Control\",\"Massage Seats\",\"Night Vision\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.31.08_fb243031.jpg'),
(12, 'Cadillac Escalade', 'Executive', 7, 'Automatic', 280000, '[\"Studio Sound System\",\"Super Cruise Technology\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.37.47_8f2cb5fb.jpg'),
(13, 'Mclaren P1', 'Sports Cars', 2, 'Manual', 300000, '[\"V8 Engine\",\"Race Mode\",\"Carbon Fiber body\"]', 'uploads/WhatsApp Image 2025-07-07 at 22.59.09_119e26bc.jpg'),
(14, 'Rolls-Royce Phantom', 'Executive', 5, 'Automatic', 320000, '[\"Powerful V12 Engine\",\"Bespoke interior\",\"Advanced Technology\"]', 'uploads/WhatsApp Image 2025-07-07 at 23.07.24_9c77200a.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filterdetails`
--
ALTER TABLE `filterdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filterdetails`
--
ALTER TABLE `filterdetails`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
