-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 12:09 PM
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
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` char(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive` enum('Y','N') NOT NULL DEFAULT 'N',
  `role` enum('User','Editor','Administrator') NOT NULL DEFAULT 'User',
  `approval` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `country`, `date`, `archive`, `role`, `approval`) VALUES
(1, 'Administrator', 'Doris', 'dpavic@tvz.hr', 'Admin', '$2y$12$6YRL47ZK.LILMYSC9JrByODpRtjdxIyBJz9Rxr0Ske37edZWV7fY6', 'HR', '2021-11-27 17:38:10', 'Y', 'Administrator', 'Y'),
(2, 'Jelena', 'Berkovic', 'jberkovic93@gmail.com', 'jberkovic', '$2y$12$pEMTjymeMr7ETkFPv5WXYeaRIT6HWEbtVS69U.sxjpOY0SPD1HmWm', 'BZ', '2021-11-27 15:49:56', 'N', 'User', 'Y'),
(3, 'Marita', 'Simundic', 'marita@gmail.com', 'msimundic', '$2y$12$OwFxJYfp590SRDyU5AqS3.bsR4ap217UPxg2ukRmzAto9WnhKYGtm', 'LK', '2021-11-27 15:30:09', 'N', 'User', 'Y'),
(4, 'Ivan', 'Kraljevic', 'ikraljevic@gmail.com', 'ikraljevic', '$2y$12$34OgHRAvjIy6A5MJPF6NZOsTbRU5cm6UZnwf3/LZyx7GDAxPb7bwy', 'BD', '2021-11-27 15:45:48', 'N', 'User', 'N'),
(5, 'Doris', 'Pavic', 'pavicdoris@gmail.com', 'dpavic', '$2y$12$yZV8a8ZJ4MOyNjqjr7VCGukXLl/joBq/sY6EXL7sUA/Yz8fz4T0kS', 'HR', '2021-11-27 15:30:01', 'Y', 'Editor', 'Y'),
(8, 'Mislav', 'Erak', 'mijo@gmaail.com', 'merak', '$2y$12$rt58YGVtTtPnYdRJiXFRzepyZ19WvfRz7DTJ4MZdP9tihs2/TMQXO', 'AZ', '2021-11-27 15:45:54', 'Y', 'User', 'N'),
(9, 'Antonia', 'Mestrovic', 'amestrovic@gmail.com', 'amestrovic', '$2y$12$0iK2cL.YzW8Q4rtsM1snPODUqMookmxvHkNNB7Rl9phkeq4M.RFw2', 'VE', '2021-11-28 10:48:47', 'N', 'User', 'N'),
(10, 'Ivan', 'Repani?', 'irepanic@gmail.com', 'irepanic', '$2y$12$Hn3zgt99Cz/YbtuUuKisLOmVtIgbyLfA0u/GhBQhdPlZsvHumFGaW', 'MM', '2021-11-28 10:52:57', 'N', 'User', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
