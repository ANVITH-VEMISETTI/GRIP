-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 08:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(100) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amount` int(155) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `amount`, `dateandtime`) VALUES
(1, 'Prem', 'Anvith', 3000, '2022-01-03 14:28:19'),
(2, 'mani', 'charan', 5000, '2022-01-03 14:53:54'),
(3, 'Anvith', 'Prem', 10000, '2022-01-04 06:33:51'),
(4, 'Anvith', 'charan', 3000, '2022-01-04 06:55:37'),
(5, 'charan', 'Anvith', 2200, '2022-01-04 11:20:44'),
(6, 'badhri', 'Anvith', 800, '2022-01-04 11:21:27'),
(7, 'Anvith', 'badhri', 1200, '2022-01-06 07:46:48'),
(8, 'Anvith', 'badhri', 1200, '2022-01-06 07:47:54'),
(9, 'Prem', 'Anvith', 2000, '2022-01-06 07:48:14'),
(10, 'Anvith', 'charan', 3000, '2022-01-09 11:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Anvith', 'anvith@gmail.com', 136600),
(2, 'Prem', 'prem@gmail.com', 58000),
(3, 'sai', 'sai123@gmail.com', 12000),
(4, 'charan', 'charan@gmail.com', 10000),
(5, 'mani', 'mani@gmail.com', 7000),
(6, 'shravan', 'shravan@gmail.com', 2000),
(7, 'badhri', 'badhri@gmail.com', 13600),
(8, 'Harsha', 'harsha@gmail.com', 12000),
(9, 'Rasagnya', 'rassu@gmail.com', 18000),
(10, 'Supraja', 'suppi@gmail.com', 12000),
(11, 'Vasantha', 'vasantha@gmail.com', 100000),
(12, 'Sahithi', 'sahithi@gmail.com', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
