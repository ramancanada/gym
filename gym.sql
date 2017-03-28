-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2017 at 02:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `aerobics`
--

CREATE TABLE `aerobics` (
  `data` varchar(500) COLLATE utf8_bin NOT NULL,
  `userg` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `aerobics`
--

INSERT INTO `aerobics` (`data`, `userg`) VALUES
('Yoga #1 on Monday to Friday From 8:00 to 9:30,', ''),
('Yoga #1 on Monday to Friday From 10:00 to 11:30,', 'jkp'),
('Yoga #1 on Monday to Friday From 8:00 to 9:30,', 'man');

-- --------------------------------------------------------

--
-- Table structure for table `grouptraining`
--

CREATE TABLE `grouptraining` (
  `technology` varchar(500) COLLATE utf8_bin NOT NULL,
  `userg` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `grouptraining`
--

INSERT INTO `grouptraining` (`technology`, `userg`) VALUES
('Belly Dancing on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Belly Dancing on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Belly Dancing on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Body Blast On Tuesday and Thursday from 18:00 to 20:00,', ''),
('Belly Dancing on Monday,Wednesday,Friday From 18:00 to 20:00,', 'man'),
('Body Blast On Tuesday and Thursday from 18:00 to 20:00,', 'man'),
('Belly Dancing on Monday,Wednesday,Friday From 18:00 to 20:00,', 'man');

-- --------------------------------------------------------

--
-- Table structure for table `personaltraining`
--

CREATE TABLE `personaltraining` (
  `Data` varchar(500) COLLATE utf8_bin NOT NULL,
  `userg` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `personaltraining`
--

INSERT INTO `personaltraining` (`Data`, `userg`) VALUES
('Training #1 on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Training #1 on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Training #2 On Tuesday and Thursday from 18:00 to 20:00,', ''),
('Training #1 on Monday,Wednesday,Friday From 18:00 to 20:00,', ''),
('Training #1 on Monday,Wednesday,Friday From 18:00 to 20:00,', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `category_id` varchar(4) COLLATE utf8_bin NOT NULL,
  `program_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `program_days` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `program_begin_time` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `program_end_time` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `is_opened` varchar(1) COLLATE utf8_bin NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `category_id`, `program_name`, `program_days`, `program_begin_time`, `program_end_time`, `is_opened`, `id`) VALUES
(1, '0001', 'Belly Dancing', '1,3,5', '18:00', '20:00', 'Y', 0),
(2, '0001', 'Body Blast', '2,4', '18:00', '20:00', 'Y', 0),
(3, '0001', 'Group Cycling', '1,3,5', '20:00', '22:00', 'Y', 0),
(4, '0001', 'Hip Hop B-Boying', '2,4', '20:00', '22:00', 'Y', 0),
(5, '0001', 'Physioball', '1,3,5', '22:00', '23:00', 'Y', 0),
(6, '0001', 'Sculptiing with Weghts', '2,4', '22:00', '23:00', 'Y', 0),
(7, '0001', 'Salsa Dancing', '1,2,3,4,5,6,7', '18:00', '24:00', 'N', 0),
(8, '0002', 'Training #1', '1,3,5', '18:00', '20:00', 'Y', 0),
(9, '0002', 'Training #2', '2,4', '18:00', '20:00', 'Y', 0),
(10, '0002', 'Training #3', '1,3,5', '20:00', '22:00', 'Y', 0),
(11, '0002', 'Training #4', '2,4', '20:00', '22:00', 'Y', 0),
(12, '0002', 'Training #5', '1,2,3,4,5,6,7', '18:00', '24:00', 'N', 0),
(13, '0003', 'Yoga #1', '1,2,3,4,5,6,7', '18:00', '20:00', 'Y', 0),
(14, '0003', 'Yogo #2', '1,2,3,4,5,6,7', '20:00', '22:00', 'Y', 0),
(15, '0004', 'Aerobics #1', '1,2,3,4,5,6,7', '08:00', '09:00', 'Y', 0),
(16, '0004', 'Aerobics #2', '1,2,3,4,5,6,7', '09:00', '10:00', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `tel`, `id`) VALUES
('a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 0),
('b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'b', 0),
('e', 'e', 'e1671797c52e15f763380b45e841ec32', 'e', 'e', 0),
('f', 'f', '8fa14cdd754f91cc6554c9e71929cce7', 'f', 'f', 0),
('q', 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'q', 'q', 0),
('t', 't', 'e358efa489f58062f10dd7316b65649e', 't', 'tt', 0),
('test1', 'tester1', 'test1', 'test1@abc.com', '(647)123-4567', 0),
('test2', 'tester2', 'test2', 'test2@efg.com', '(864)456-7890', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yoga`
--

CREATE TABLE `yoga` (
  `data` varchar(500) COLLATE utf8_bin NOT NULL,
  `userg` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Dumping data for table `yoga`
--

INSERT INTO `yoga` (`data`, `userg`) VALUES
('Yoga #6 On Tuesday and Thursday from 20:00 to 23:00,', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aerobics`
--
ALTER TABLE `aerobics`
  ADD UNIQUE KEY `userg` (`userg`);

--
-- Indexes for table `grouptraining`
--
ALTER TABLE `grouptraining`
  ADD KEY `user1` (`userg`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`,`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
