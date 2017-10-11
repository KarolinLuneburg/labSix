-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2017 at 08:26 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `AuthorID` int(11) NOT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `SSN` char(20) DEFAULT NULL,
  `Birthyear` int(11) DEFAULT NULL,
  `Homepage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`AuthorID`, `Firstname`, `Lastname`, `SSN`, `Birthyear`, `Homepage`) VALUES
(1, 'J. K.', 'Rowling', NULL, NULL, NULL),
(2, 'Jasmin', 'J', NULL, NULL, NULL),
(3, 'Author 1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE IF NOT EXISTS `Book` (
  `Title` varchar(255) DEFAULT NULL,
  `ISBN` char(13) NOT NULL,
  `Edition number` int(11) DEFAULT NULL,
  `Number of pages` int(11) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Publishing year` int(11) DEFAULT NULL,
  `Author` varchar(60) NOT NULL,
  `Reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`Title`, `ISBN`, `Edition number`, `Number of pages`, `Publisher`, `Publishing year`, `Author`, `Reserved`) VALUES
('New book', '123456789', NULL, NULL, NULL, NULL, '3', 0),
('Alice''s Adventures in Wonderland', '9781533345455', 1, NULL, NULL, 1865, 'Lewis Carroll', 1),
('The Great Gatsby', '9781597226769', NULL, NULL, NULL, NULL, 'F. Scott Fitzgerald', 0),
('Harry Potter', '9786160403967', 1, NULL, NULL, NULL, '1', 0),
('To Kill a Mockingbird', '9788931001990', NULL, 281, 'J. B. Lippincott & Co', 1960, 'Harper Lee', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Connection`
--

CREATE TABLE IF NOT EXISTS `Connection` (
  `ISBN` varchar(13) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Connection`
--

INSERT INTO `Connection` (`ISBN`, `AuthorID`) VALUES
('9781533345455', 1),
('9781533345455', 2),
('123456789', 2),
('123456789', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Relationship`
--

CREATE TABLE IF NOT EXISTS `Relationship` (
  `ISBN` char(13) NOT NULL,
  `Author ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TestingUser`
--

CREATE TABLE IF NOT EXISTS `TestingUser` (
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `Comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TestingUser`
--

INSERT INTO `TestingUser` (`username`, `userpass`, `Comments`) VALUES
('Jessica', 'f696f59123bfbeea285c379c2b80129b17abf6d6', ''),
('Karo', '5bf0f5391007dad6122c0f376546c36b1f8f43c9', ''),
('', '', 'Jasmin'),
('', '', 'hello'),
('', '', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Relationship`
--
ALTER TABLE `Relationship`
  ADD PRIMARY KEY (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
