-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 10:16 AM
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
-- Database: `corememories`
--

-- --------------------------------------------------------

--
-- Table structure for table `islandcontents`
--

CREATE TABLE `islandcontents` (
  `islandContentID` int(4) NOT NULL,
  `islandOfPersonalityID` int(4) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `content` varchar(300) NOT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandcontents`
--

INSERT INTO `islandcontents` (`islandContentID`, `islandOfPersonalityID`, `image`, `content`, `color`) VALUES
(1, 1, 'server1.png', '', '#FFD700'),
(2, 1, 'server2.jpg', '', '#FFD700'),
(3, 1, 'server3.jpg', '', '#FFD700'),
(4, 2, 'sport1.jpg', '', '#FFD700'),
(5, 2, 'sport2.jpg', '', '#FFD700'),
(6, 2, 'sport3.jpg', '', '#FFD700'),
(7, 3, 'friends1.jpg', '', '#87CEEB'),
(8, 3, 'friends2.jpg', '', '#87CEEB'),
(9, 3, 'friends3.jpg', '', '#87CEEB'),
(10, 4, 'fam1.jpg', '', '#32CD32'),
(11, 4, 'fam2.jpg', '', '#32CD32'),
(12, 4, 'fam3.jpg', '', '#32CD32');

-- --------------------------------------------------------

--
-- Table structure for table `islandsofpersonality`
--

CREATE TABLE `islandsofpersonality` (
  `islandOfPersonalityID` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `shortDescription` varchar(300) DEFAULT NULL,
  `longDescription` varchar(900) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `islandsofpersonality`
--

INSERT INTO `islandsofpersonality` (`islandOfPersonalityID`, `name`, `shortDescription`, `longDescription`, `color`, `image`, `status`) VALUES
(1, 'Server Island', 'A place for peace', 'Serving as an altar server is a privilege and a calling to assist at the heart of the Church\'s sacred celebration. It\'s a journey of faith, discipline, and humility, offering service to God and the community with reverence and joy.', '#FFD700', 'server1.png', 'active'),
(2, 'Sports Island', 'A place for cammaraderie', 'This island symbolizes sportmanship ', '#87CEEB', 'sport1.jpg', 'active'),
(3, 'Frienship Island', 'A place for get together and small bond', 'This island symbolizes the bonds of friendship, laughter, and shared moments.', '#32CD32', 'friends1.jpg', 'active'),
(4, 'Family Island', 'A place where love was nurtured', 'This island focuses on love, respect, joy, and satisfaction.', '#FF4500', 'fam3.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `islandcontents`
--
ALTER TABLE `islandcontents`
  ADD PRIMARY KEY (`islandContentID`);

--
-- Indexes for table `islandsofpersonality`
--
ALTER TABLE `islandsofpersonality`
  ADD PRIMARY KEY (`islandOfPersonalityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `islandcontents`
--
ALTER TABLE `islandcontents`
  MODIFY `islandContentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
