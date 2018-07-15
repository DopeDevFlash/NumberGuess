-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 09:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `random_number`
--

-- --------------------------------------------------------

--
-- Table structure for table `savednumber`
--

CREATE TABLE `savednumber` (
  `ID` int(11) NOT NULL,
  `User` text NOT NULL,
  `savedNumber` text NOT NULL,
  `timeStamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savednumber`
--

INSERT INTO `savednumber` (`ID`, `User`, `savedNumber`, `timeStamp`) VALUES
(0, 'Nico', '52', '0000-00-00'),
(1, 'Nico', '23', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `savedtries`
--

CREATE TABLE `savedtries` (
  `ID` int(11) NOT NULL,
  `User` text NOT NULL,
  `savedTries` int(11) NOT NULL,
  `result` tinyint(1) NOT NULL,
  `ranking` int(11) NOT NULL,
  `timeStamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savednumber`
--
ALTER TABLE `savednumber`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `savedtries`
--
ALTER TABLE `savedtries`
  ADD UNIQUE KEY `ID` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
