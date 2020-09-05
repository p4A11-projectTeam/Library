-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 08:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `contact`, `username`, `password`, `address`) VALUES
(1, 'Librarian', 'librarian@gmail.com', 1234567891, 'admin', 'abc123', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `img` varchar(5000) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `name`, `author`, `edition`, `price`, `qty`, `img`, `availability`) VALUES
(123456, 'Analysis and Design of Algorithms', 'ada', 3, 234, 10, 'books_image/9aefdece53ee9d697174c417896f2c35Introduction to the Design and Analysis of Algorithms.jpg', 8),
(253467, 'Microcontroller Embedded Systems', 'mmc', 3, 345, 10, 'books_image/b8bc52c4339d7cb3d40a83935e24ff50book3.jpg', 9),
(343544, 'Engineering Chemistry', 'fgfgf', 3, 223, 40, 'books_image/41ba763dc955c3c74184b8ddbfba3d5bA Text book of Engineering Chemistry - by P. C. Jain and Monica Jain.png', 39);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fiid` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `usn` varchar(30) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `edition` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'not paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`fiid`, `issue_id`, `usn`, `book_name`, `edition`, `issue_date`, `return_date`, `amount`, `status`) VALUES
(147, 31, '1BM18CS017', 'Engineering Chemistry', 5, '2020-05-10', '2020-06-12', 90, 'paid'),
(150, 32, '1BM18CS031', 'Analysis and Design of Algorithms', 3, '2020-05-01', '2020-06-10', 125, 'paid'),
(166, 36, '1BM18CS069', 'Microcontroller Embedded Systems', 3, '2020-05-12', '0000-00-00', 180, 'not paid'),
(185, 35, '1BM18CS017', 'Engineering Chemistry', 3, '2020-06-12', '0000-00-00', 45, 'not paid'),
(187, 38, '1BM18CS017', 'Analysis and Design of Algorithms', 3, '2020-06-12', '0000-00-00', 45, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `issueid` int(11) NOT NULL,
  `usn` varchar(30) NOT NULL,
  `books_name` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `edition` int(11) DEFAULT NULL,
  `student_name` varchar(30) DEFAULT NULL,
  `return_status` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`issueid`, `usn`, `books_name`, `issue_date`, `return_date`, `edition`, `student_name`, `return_status`) VALUES
(30, '1BM18CS017', 'Analysis and Design of Algorithms', '2020-06-10', '2020-06-10', 3, 'Anusree K', 'yes'),
(31, '1BM18CS017', 'Engineering Chemistry', '2020-05-10', '2020-06-12', 5, 'Anusree K', 'yes'),
(32, '1BM18CS031', 'Analysis and Design of Algorithms', '2020-05-01', '2020-06-10', 3, 'Nanma Guru', 'yes'),
(33, '1BM18CS149', 'Microcontroller Embedded Systems', '2020-06-10', '2020-06-12', 3, 'Shikha N', 'yes'),
(34, '1BM18CS031', 'Analysis and Design of Algorithms', '2020-06-12', '2020-06-12', 3, 'Nanma Guru', 'yes'),
(35, '1BM18CS017', 'Engineering Chemistry', '2020-06-12', '0000-00-00', 3, 'Anusree K', 'no'),
(36, '1BM18CS069', 'Microcontroller Embedded Systems', '2020-05-12', '0000-00-00', 3, 'Pooja Srinivasan', 'no'),
(37, '1BM18CS069', 'Analysis and Design of Algorithms', '2020-06-12', '2020-06-12', 3, 'Pooja Srinivasan', 'yes'),
(38, '1BM18CS017', 'Analysis and Design of Algorithms', '2020-06-12', '0000-00-00', 3, 'Anusree K', 'no'),
(39, '1BM18CS149', 'Analysis and Design of Algorithms', '2020-06-12', '2020-06-12', 3, 'Shikha N', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `susername` varchar(50) NOT NULL,
  `dusername` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `read1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `susername`, `dusername`, `title`, `msg`, `read1`) VALUES
(10, 'smartgirl', 'admin', 'check val', 'checked', 'y'),
(11, 'admin', 'smartgirl', 'Test message', 'Hope this message has reached you!', 'y'),
(12, 'smartgirl', 'admin', 'check the dahsboard val', 'Hey there!', 'y'),
(13, 'admin', 'shikha', 'Hi', 'Hi Shikha!', 'y'),
(14, 'admin', 'anu', 'Fine Alert', 'Your fine is due', 'y'),
(15, 'anu', 'admin', 'Fine', 'I have paid the fine!', 'y'),
(16, 'admin', 'anu', 'Test', 'Hello test msg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `request_books`
--

CREATE TABLE `request_books` (
  `rid` int(11) NOT NULL,
  `books_name` varchar(100) NOT NULL,
  `edition` int(11) NOT NULL,
  `usn` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_books`
--

INSERT INTO `request_books` (`rid`, `books_name`, `edition`, `usn`, `status`) VALUES
(6, 'DBMS', 4, '1BM18CS017', 'yes'),
(7, 'Maths', 3, '1BM18CS149', 'no'),
(8, 'Physics', 4, '1BM18CS069', 'yes'),
(9, 'Physics', 4, '1BM18CS017', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usn` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` varchar(3) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first`, `last`, `username`, `email`, `usn`, `password`, `status`, `answer`) VALUES
(8, 'Anu', 'K', 'smartgirl', 'smartgirl@gmail.com', '1BM18CS018', '2468', 'yes', 'Wings of Fire'),
(9, 'Shikha', 'N', 'shikha', 'shikha@gmail.com', '1BM18CS149', '2468', 'yes', 'DBMS'),
(10, 'Nanma', 'Guru', 'nanma', 'nanma@gmail.com', '1BM18CS031', '2468', 'yes', 'ADA'),
(11, 'Anusree', 'K', 'anu', 'anusree@gmail.com', '1BM18CS017', '2468', 'yes', 'MATHS'),
(12, 'Pooja', 'Srinivasan', 'pooja', 'pooja@gmail.com', '1BM18CS069', '2468', 'yes', 'DBMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fiid`),
  ADD UNIQUE KEY `issue_id` (`issue_id`),
  ADD KEY `usn` (`usn`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`issueid`),
  ADD KEY `issue_books_ibfk_1` (`usn`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_books`
--
ALTER TABLE `request_books`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usn` (`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fine`
--
ALTER TABLE `fine`
  MODIFY `fiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `issueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request_books`
--
ALTER TABLE `request_books`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `fine_ibfk_2` FOREIGN KEY (`issue_id`) REFERENCES `issue_books` (`issueid`);

--
-- Constraints for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD CONSTRAINT `issue_books_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
