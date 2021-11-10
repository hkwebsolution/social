-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 07:51 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social18`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `edu` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cell`, `username`, `password`, `gender`, `photo`, `age`, `edu`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(4, 'Nadim', 'nadim@gmail.com', '01711223344 ', 'nadim', '$2y$10$1wf3dkkRHkoHDsCDSF2FsuQhkSmOkE53VvvoyFHW/lN.Lgue6KsEy', 'Male', '1635178559_1383388502_fab icon.png', 50, 'BSs', 1, 0, '2021-10-25 18:31:00', '2021-11-02 08:11:03'),
(5, 'Kamal', 'kamal@gmail.com', '01711223311', ' Kamal', '$2y$10$qaZbu/WHmXiyTu6UrPHAvukbSbG9I38SRVUIDaAmVVWNjNOh9AvBy', 'Male', '1635339967_1056591332_jermey.jpg', 50, 'BS', 1, 0, '2021-10-25 18:32:14', '2021-10-29 10:10:16'),
(6, 'Rima', 'rima@gmail.com', '01711223355', ' rima', '$2y$10$odI8881pAXkC6rfSY8VhwOjYy.DTiXlhXP/w6Ki0neTwCZOMX7fNy', 'Female', '1635496358_1408160440_download.jpg', NULL, NULL, 1, 0, '2021-10-25 18:52:26', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
