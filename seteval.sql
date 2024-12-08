-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 01:49 PM
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
-- Database: `seteval`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_ID` int(11) NOT NULL,
  `course_Num` varchar(20) DEFAULT NULL,
  `course_Title` varchar(100) DEFAULT NULL,
  `class_Section` char(10) DEFAULT NULL,
  `class_desc` varchar(255) DEFAULT NULL,
  `class_sched` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `course_Num`, `course_Title`, `class_Section`, `class_desc`, `class_sched`) VALUES
(1, '1001', 'Intro to Programming', 'A', 'CMSC 100', '12:00PM - 01:00PM (WedFri)'),
(2, '1002', 'Databases', 'A', 'CMSC 101', '01:30PM - 03:00PM (WedFri)'),
(3, '1003', 'Cryptography', 'B', 'CMSC 102', '6:00 PM - 07:30PM (WedFri)'),
(4, '1004', 'Operating Systems', 'D', 'CMSC 103', '09:00AM - 10:30AM (TueThu)'),
(5, '1005', 'Computer Networks', 'E', 'CMSC 104', '01:00PM - 02:30PM (MonWed)'),
(6, '1006', 'Machine Learning', 'F', 'CMSC 105', '03:00PM - 04:30PM (WedFri)'),
(7, '1007', 'Artificial Intelligence', 'G', 'CMSC 106', '11:00AM - 12:30PM (TueThu)'),
(8, '1008', 'Cybersecurity', 'H', 'CMSC 107', '04:00PM - 05:30PM (MonWed)');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_ID` int(11) NOT NULL,
  `iLast_Name` varchar(50) DEFAULT NULL,
  `iFirst_Name` varchar(50) DEFAULT NULL,
  `iMiddle_Name` varchar(50) DEFAULT NULL,
  `course_ID` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_ID`, `iLast_Name`, `iFirst_Name`, `iMiddle_Name`, `course_ID`, `dept`) VALUES
(1, 'Torvalds', 'Linus', NULL, 1, 'Computer Science'),
(2, 'Lovelace', 'Ada', NULL, 2, 'Computer Science'),
(3, 'Doe', 'John', NULL, 3, 'Computer Science'),
(4, 'Hopper', 'Grace', NULL, 4, 'Computer Science'),
(5, 'Berners-Lee', 'Tim', NULL, 5, 'Computer Science'),
(6, 'Ng', 'Andrew', NULL, 6, 'Computer Science'),
(7, 'McCarthy', 'John', NULL, 7, 'Computer Science'),
(8, 'Mitnick', 'Kevin', NULL, 8, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `question_ID` int(11) NOT NULL,
  `questions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`question_ID`, `questions`) VALUES
(1, 'Explains the objectives, expectations & various requirements of the course'),
(2, 'Encourages students to think critically and/or creatively'),
(3, 'Communicates clearly'),
(4, 'Answers students questions clearly & adequately'),
(5, 'Is able to help students understand complex ideas related to the subject matter'),
(6, 'Uses engaging and helpful learning exercises and activities'),
(7, 'Relates the subject matter to issues and developments in the discipline and real life concerns'),
(8, 'Encourages students to participate in discussions and activities'),
(9, 'Makes himself or herself available for consultation'),
(10, 'Encourages students to express their ideas and viewpoints'),
(11, 'Communicates and interacts with students in a positive way'),
(12, 'Shows respect for student diversity and individual differences'),
(13, 'Makes full use of the required hours for learning'),
(14, 'Provides fair and timely feedback on student performances'),
(15, 'Uses clear criteria to evaluate student performance');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `Evaluation_ID` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q_open1` varchar(256) DEFAULT NULL,
  `q_open2` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_ID`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`question_ID`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`Evaluation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `Evaluation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
