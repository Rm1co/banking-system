-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 07:56 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phonenumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`, `phonenumber`) VALUES
(3, 'wilson', 'mutuawilson85@gmail.com', '$2y$10$U1J1zJk8pywsMom6u/2rV.7yd6X5B8mVEEqd3ZZGnsEYSmErXxFfa', '2025-07-08 12:45:24', '0702476236'),
(4, 'Florence', 'waynekioko@gmail.com', '$2y$10$TlZf7YZUFRSlisgIDLwyheui9GXhXw/cEj1rpW5bx/9crVRC3bBJy', '2025-07-08 19:11:09', '0722589759'),
(5, 'Peter', 'wilson.mutua@strathmore.edu', '$2y$10$Y46iCEttsu/r3o6ijd/nduljvK1ZQCx6Lq5RkybmDaKzg3Fsu/svm', '2025-07-08 20:09:29', '0722341936'),
(6, 'ASHLEE', 'ojalashlee@gmail.com', '$2y$10$QS.lnPGWgaHlT334pBqkouNJnD76u/hbGaWm9VPS.ELehgcQ/BEKC', '2025-07-09 11:22:41', '0731321790');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
