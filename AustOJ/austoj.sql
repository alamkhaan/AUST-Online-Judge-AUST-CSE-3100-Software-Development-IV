-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 09:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `austoj`
--

-- --------------------------------------------------------

--
-- Table structure for table `input-output`
--

CREATE TABLE `input-output` (
  `id` varchar(200) NOT NULL,
  `input` longtext NOT NULL,
  `output` longtext NOT NULL,
  `isSample` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `problemset`
--

CREATE TABLE `problemset` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `difficulty` varchar(200) NOT NULL,
  `totalsolved` int(11) NOT NULL,
  `timelimit` int(11) NOT NULL,
  `statement` longtext NOT NULL,
  `inputformat` longtext NOT NULL,
  `constraints` longtext NOT NULL,
  `outputformat` longtext NOT NULL,
  `sampleinput` longtext NOT NULL,
  `sampleoutput` longtext NOT NULL,
  `hiddeninput` longtext NOT NULL,
  `hiddenoutput` longtext NOT NULL,
  `author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problemset`
--

INSERT INTO `problemset` (`id`, `name`, `difficulty`, `totalsolved`, `timelimit`, `statement`, `inputformat`, `constraints`, `outputformat`, `sampleinput`, `sampleoutput`, `hiddeninput`, `hiddenoutput`, `author`) VALUES
(10000, 'yuj', 'ghkjgh', 0, 5, '', '', '', '', '', '', '', '', 'rgfds'),
(10002, 'Three Occurrences', 'Hard', 0, 6, 'You are given an array a consisting of n integers. We denote the subarray a[l..r] as the array [al,al+1,…,ar] (1≤l≤r≤n).\r\n\r\nA subarray is considered good if every integer that occurs in this subarray occurs there exactly thrice. For example, the array [1,2,2,2,1,1,2,2,2] has three good subarrays:\r\n\r\na[1..6]=[1,2,2,2,1,1];\r\na[2..4]=[2,2,2];\r\na[7..9]=[2,2,2].\r\nCalculate the number of good subarrays of the given array a.', 'The first line contains one integer n.\r\n\r\nThe second line contains n integers a1, a2, ..., an.', ' 1≤n≤5⋅10^5\r\n\r\n 1≤ai≤n', 'Print one integer — the number of good subarrays of the array a.', '12\r\n1 2 3 4 3 4 2 1 3 4 2 1\r\n', '1', '9\r\n1 2 2 2 1 1 2 2 2\r\n', '3', 'alamkhan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `gender`, `contactno`, `birthdate`) VALUES
(6, 'alamkhaan', '170204084@aust.edu', '123456', 'Male', '01729652322', '1998-01-03'),
(7, 'alamkhan', 'alamkhaan1997@gmail.com', '123456', 'Male', '01643993279', '1998-01-03'),
(12, 'root', '5@gmail.com', 'dgbfdgfsdgfdgdfr', 'Female', '01500000000', '2020-09-01'),
(14, 'Ashiqul Islam', '170204070@aust.edu', '123456789', 'Male', '01989023211', '1998-10-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `problemset`
--
ALTER TABLE `problemset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `problemset`
--
ALTER TABLE `problemset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
