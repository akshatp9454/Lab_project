-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `User_ID` int(11) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`User_ID`, `Password`) VALUES
(111, 'priyam@123'),
(222, 'akshat@123');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exam_ID` int(11) NOT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Start_Time` time DEFAULT NULL,
  `End_Time` time DEFAULT NULL,
  `Duration` time DEFAULT NULL,
  `Total_Marks` int(11) DEFAULT NULL,
  `Exam_Link` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exam_ID`, `Subject_ID`, `Date`, `Start_Time`, `End_Time`, `Duration`, `Total_Marks`, `Exam_Link`) VALUES
(4, 23, '2021-05-06', '12:30:00', '13:45:00', '01:15:00', 20, 'https://www.google.com'),
(5, 24, '2021-05-06', '16:30:00', '17:45:00', '01:15:00', 20, 'https://www.yahoo.com'),
(6, 25, '2021-05-07', '12:30:00', '13:45:00', '01:15:00', 20, 'https://www.github.com'),
(7, 26, '2021-05-07', '16:30:00', '17:45:00', '01:15:00', 20, 'https://www.gmail.com'),
(8, 27, '2021-05-08', '12:30:00', '13:45:00', '01:15:00', 20, 'https://www.youtube.com'),
(9, 28, '2021-05-08', '16:30:00', '17:45:00', '01:15:00', 20, 'https://www.wikipedia.com'),
(10, 29, '2021-05-09', '12:30:00', '13:45:00', '01:15:00', 20, 'https://www.amazon.com'),
(11, 30, '2021-05-09', '16:30:00', '17:45:00', '01:15:00', 20, 'https://www.javatpoint.com'),
(12, 31, '2021-05-10', '12:30:00', '13:45:00', '01:15:00', 20, 'https://www.flipkart.in'),
(13, 32, '2021-05-10', '16:30:00', '17:45:00', '01:15:00', 20, 'https://www.geeksforgeeks.org');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `User_ID` int(11) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`User_ID`, `Password`, `Email`, `Name`, `Phone`) VALUES
(17, 'a123', 'a@gmail.com', 'Ajay Shekhawat', '1234567890'),
(18, 'b123', 'b@gmail.com', 'Bablu Jhinga', '7348925874'),
(19, 'c123', 'c@gmail.com', 'Chetan Pujiya', '2736827639'),
(20, 'd123', 'd@gmail.com', 'Dinesh Kartik', '2769982639'),
(21, 'e123', 'e@gmail.com', 'Ekta Paniwala', '8798797009'),
(22, 'f123', 'f@gmail.com', 'Feroze Shah', '9859758598'),
(23, 'g123', 'g@gmail.com', 'Gandhi Garg', '7236987692'),
(24, 'h123', 'h@gmail.com', 'Harsh Dubey', '2839767293'),
(25, 'i123', 'i@gmail.com', 'Ishita Shetty', '9709869986'),
(26, 'j123', 'j@gmail.com', 'Jagat Kapoor', '8062938692');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `User_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` int(10) NOT NULL,
  `Subject_name` varchar(20) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_name`, `Credits`) VALUES
(23, 'EM-IV', 3),
(24, 'Economics', 2),
(25, 'OS', 4),
(26, 'RDBMS', 4),
(27, 'CN', 4),
(28, 'OE', 2),
(29, 'VEG', 3),
(30, 'OS-Lab', 1),
(31, 'RDBMS-Lab', 1),
(32, 'CN-Lab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `User_ID` int(11) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`User_ID`, `Password`, `Email`, `Name`, `Subject_ID`, `Phone`) VALUES
(449, 'abc123', 'tia@gmail.com', 'Tia Mohan', 23, '8236148667'),
(450, '123abc', 'sia@gmail.com', 'Sia Sharma', 24, '6734590234'),
(451, 'xyz123', 'raghu@gmail.com', 'Raghu Ram', 25, '7942629847'),
(452, '123xyz', 'teena@gmail.com', 'Teena Jain', 26, '9237646298'),
(453, 'jkl123', 'diya@gmail.com', 'Diya Goenka', 27, '8923236882'),
(454, '123jkl', 'farhan@gmail.com', 'Farhan Khan', 28, '8912983782'),
(455, 'qwe123', 'sahil@gmail.com', 'Sahil Mehta', 29, '9209897293'),
(456, '123qwe', 'chirag@gmail.com', 'Chirag Singh', 30, '9823762372'),
(457, 'asd123', 'pakhi@gmail.com', 'Pakhi Chauhan', 31, '7982438762'),
(458, '123asd', 'raju@gmail.com', 'Raju Rastogi', 32, '9273986222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`Exam_ID`),
  ADD KEY `exam_ibfk_1` (`Subject_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`User_ID`,`Subject_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exam_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `student` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
