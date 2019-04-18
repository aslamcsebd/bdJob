-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 10:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
(1, 'Chittagong'),
(2, 'Dhaka'),
(3, 'Rajshahi'),
(4, 'Rangpur'),
(5, 'Barisal'),
(6, 'Sylhet'),
(7, 'Mymensingh'),
(8, 'Khulna');

-- --------------------------------------------------------

--
-- Table structure for table `joblist`
--

CREATE TABLE `joblist` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `jobType` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `applyDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joblist`
--

INSERT INTO `joblist` (`id`, `area`, `jobType`, `education`, `experience`, `salary`, `applyDate`) VALUES
(1, 'Chittagong', 'Mechanical Engineering', 'BSC', 'Disciplines within the mechanical engineering fiel', '40000', '2021-11-24'),
(2, 'Dhaka', ' Electrical Engineering', 'Diploma', 'On a day to day basis, engineers are responsible f', '45000', '2021-11-09'),
(3, 'Dhaka', ' Electrical Engineering', 'BSC', 'On a day to day basis, engineers are responsible f', '45000', '2021-11-09'),
(4, 'Dhaka', ' Industrial Engineering', 'Diploma', 'Industrial engineers use a combination of science,', '50000', '2021-12-07'),
(5, 'Rajshahi', 'Chemical Engineering', 'BSC', ' Chemical engineers use a combination of engineeri', '42000', '2021-11-25'),
(6, 'Dhaka', 'Civil Engineering', 'Diploma', 'Basically, without civil engineers, cities, as we ', '52000', '2021-12-07'),
(7, 'Dhaka', 'Computer engineer', 'BSC', 'Computer engineers work with the software and hard', '60000', '2021-11-17'),
(8, 'Chittagong', 'Software engineer', 'BSC', 'Software engineers design, develop, install and ma', '75000', '2021-11-24'),
(9, 'Dhaka', 'Aeronautical engineer', 'Diploma', 'Aeronautical engineers, also referred to as aerosp', '35000', '2021-11-16'),
(10, 'Dhaka', 'Chemical engineer', 'BSC', 'Chemical engineers typically work with pharmaceuti', '53000', '2021-12-15'),
(11, 'Khulna', 'Materials engineer', 'Diploma', ' A materials engineer is responsible for developin', '63000', '2021-12-07'),
(12, 'Dhaka', 'Nuclear engineer', 'BSC', 'Nuclear engineers work with nuclear energy and rad', '85000', '2021-11-17'),
(13, 'Dhaka', 'Petroleum engineer', 'BSC', 'Petroleum engineers work with the equipment that d', '65000', '2021-12-09'),
(14, 'Chittagong', 'Petroleum engineer', 'Diploma', 'Petroleum engineers work with the equipment that d', '68000', '2021-11-24'),
(15, 'Chittagong', 'Petroleum engineer', 'BSC', 'Petroleum engineers work with the equipment that d', '68000', '2021-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `jobrequest`
--

CREATE TABLE `jobrequest` (
  `id` int(30) NOT NULL,
  `jobId` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobtype`
--

CREATE TABLE `jobtype` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`id`, `name`) VALUES
(1, 'Mechanical Engineering'),
(2, ' Electrical Engineering'),
(3, ' Industrial Engineering'),
(4, 'Chemical Engineering'),
(5, 'Civil Engineering'),
(6, 'Computer engineer'),
(7, 'Software engineer'),
(8, 'Aeronautical engineer'),
(9, 'Chemical engineer'),
(10, 'Materials engineer'),
(11, 'Nuclear engineer'),
(12, 'Petroleum engineer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `email`, `password`) VALUES
(1, 'Aslam', 'aslamcsebd@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobrequest`
--
ALTER TABLE `jobrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `joblist`
--
ALTER TABLE `joblist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobrequest`
--
ALTER TABLE `jobrequest`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
