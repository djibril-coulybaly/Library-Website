-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 07:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novelladb`
--
CREATE DATABASE IF NOT EXISTS `novelladb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `novelladb`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `ISBN` varchar(150) NOT NULL,
  `BookTitle` varchar(150) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Edition` int(2) NOT NULL,
  `Year` int(4) NOT NULL,
  `Category` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Reserved` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `BookTitle`, `Author`, `Edition`, `Year`, `Category`, `Reserved`) VALUES
('093-403992', 'Computers in Business\r\n', 'Alicia Oneill\r\n', 3, 1997, 003, 'N'),
('23472-8729', 'Exploring Peru\r\n', 'Stephanie Birchi\r\n', 4, 2005, 005, 'N'),
('237-34823', 'Business Strategy\r\n', 'Joe Peppard\r\n', 2, 2002, 002, 'N'),
('23u8-923849', 'A guide to nutrition\r\n', 'John Thorpe\r\n', 2, 1997, 001, 'N'),
('2983-3494', 'Cooking for children\r\n', 'Anabelle Sharpe\r\n', 1, 2003, 007, 'N'),
('82n8-308', 'Computers for idiots\r\n', 'Susan O\'Neill\r\n', 5, 1998, 004, 'N'),
('9823-23984', 'My life in picture\r\n', 'Kevin Graham\r\n', 8, 2004, 001, 'N'),
('9823-2403-0', 'DaVinci Code\r\n', 'Dan Brown\r\n', 1, 2003, 008, 'N'),
('9823-98345', 'How to cook Italian food\r\n', 'Jamie Oliver\r\n', 2, 2005, 007, 'Y'),
('9823-98487', 'Optimising your business\r\n', 'Cleo Blair\r\n', 1, 2001, 002, 'N'),
('98234-029384', 'My ranch in Texas\r\n', 'George Bush\r\n', 1, 2005, 007, 'Y'),
('988745-234', 'Tara Road\r\n', 'Maeve Binchy\r\n', 4, 2002, 008, 'N'),
('993-004-00', 'My life in bits\r\n', 'John Smith\r\n', 1, 2001, 001, 'N'),
('9987-0039882', 'Shooting History\r\n', 'Jon Snow\r\n', 1, 2003, 001, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `CategoryID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `CategoryDescription` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryDescription`) VALUES
(001, 'Health'),
(002, 'Business'),
(003, 'Biography'),
(004, 'Technology'),
(005, 'Travel'),
(006, 'Self-Help'),
(007, 'Cookery'),
(008, 'Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `reservedbook`
--

DROP TABLE IF EXISTS `reservedbook`;
CREATE TABLE `reservedbook` (
  `ISBN` varchar(150) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `ReservedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservedbook`
--

INSERT INTO `reservedbook` (`ISBN`, `UserName`, `ReservedDate`) VALUES
('9823-98345', 'tommy100', '2008-10-11'),
('98234-029384', 'joecrotty', '2008-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `UserName` varchar(150) NOT NULL,
  `Password` varchar(6) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `AddressLine1` varchar(150) NOT NULL,
  `AddressLine2` varchar(150) NOT NULL,
  `City` varchar(150) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `Password`, `FirstName`, `LastName`, `AddressLine1`, `AddressLine2`, `City`, `Telephone`, `Mobile`) VALUES
('alanjmckenna\r\n', 't1234s', 'Alan', 'McKenna', '38 Cranley Road\r\n', 'Fairview', 'Dublin', 9998377, 856625567),
('joecrotty', 'kj7899', 'Joseph', 'Crotty', 'Apt 5 Clyde Road\r\n', 'Donnybrook', 'Dublin', 8887889, 876654456),
('tommy100', '123456', 'tom\r\n', 'behan', '14 Hyde Road\r\n', 'dalkey', 'dublin', 9983747, 876738782);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `category` (`Category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `reservedbook`
--
ALTER TABLE `reservedbook`
  ADD PRIMARY KEY (`ISBN`,`UserName`),
  ADD KEY `fk_users_reservedBook_userName` (`UserName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservedbook`
--
ALTER TABLE `reservedbook`
  ADD CONSTRAINT `fk_book_reservedbook_ISBN` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
