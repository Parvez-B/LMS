-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 09:15 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `Bookid` int(11) NOT NULL,
  `Book_Title` varchar(25) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Branch` varchar(20) NOT NULL,
  `Publish_Year` varchar(25) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`Bookid`, `Book_Title`, `Author`, `Branch`, `Publish_Year`, `Quantity`) VALUES
(101, 'My life line', 'Parvez', 'General', '2018', 19),
(102, 'coding Life', 'Parvez', 'IT', '2024', 25),
(103, 'coding  ', 'Parvez', 'IT', '2020', 25),
(104, 'coding  ', 'Parvez', 'IT', '2002', 24),
(105, 'coding  ', 'Parvez', 'IT', '2002', 25),
(110, 'Next coder', 'parvez', 'IT', '2013', 21),
(222, 'ertyui', 'dfghjk', 'dfghj', '0000', 2),
(1111, 'sdfghj', 'sdfghjk', 'dfghjk', '2022', 12);

-- --------------------------------------------------------

--
-- Table structure for table `std_book`
--

CREATE TABLE `std_book` (
  `Email` varchar(25) NOT NULL,
  `Bookid` int(11) NOT NULL,
  `Title` varchar(25) NOT NULL,
  `Author` varchar(25) NOT NULL,
  `Branch` varchar(25) NOT NULL,
  `Publish_Year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std_book`
--

INSERT INTO `std_book` (`Email`, `Bookid`, `Title`, `Author`, `Branch`, `Publish_Year`) VALUES
('parvezbg@gmail.com', 101, 'My life line', 'Parvez', 'General', '2018'),
('parvezbg@gmail.com', 222, 'ertyui', 'dfghjk', 'dfghj', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Std_Id` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Std_Id`, `Name`, `Email`, `Password`) VALUES
(101, 'asdfghj', 'sdfgh@gmail.com', 12),
(1233, 'riya', 'riya@gmail.com', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`Bookid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Std_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
