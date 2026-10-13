-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2026 at 01:59 PM
-- Server version: 8.0.46
-- PHP Version: 8.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvsunaic_cvsudatabase123qwe`
--

-- --------------------------------------------------------

--
-- Table structure for table `documenttb`
--

CREATE TABLE `documenttb` (
  `doc_id` int NOT NULL,
  `doc_name` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `excel` varchar(255) DEFAULT NULL,
  `word` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) DEFAULT NULL,
  `log` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `enrollgradestbl`
--

CREATE TABLE `enrollgradestbl` (
  `subjectcode` varchar(25) DEFAULT '',
  `creditsubjectcode` varchar(25) DEFAULT 'N/A',
  `studentnumber` varchar(11) DEFAULT '',
  `schedcode` varchar(11) DEFAULT '',
  `mygrade` varchar(5) DEFAULT '',
  `makeupgrade` varchar(5) DEFAULT '-',
  `units` decimal(5,2) DEFAULT '0.00',
  `semester` varchar(15) DEFAULT '',
  `schoolyear` varchar(15) DEFAULT '',
  `graded` enum('Y','N') DEFAULT 'Y',
  `wh` enum('Y','N') DEFAULT 'N',
  `id` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollscheduletbl`
--

CREATE TABLE `enrollscheduletbl` (
  `schedcode` varchar(50) DEFAULT '',
  `subjectCode` varchar(50) DEFAULT '',
  `units` varchar(10) DEFAULT '',
  `semester` varchar(15) DEFAULT '',
  `schoolyear` varchar(15) DEFAULT '',
  `slots` int DEFAULT '0',
  `subjectype` varchar(50) DEFAULT '',
  `section` varchar(15) DEFAULT '',
  `instructor` varchar(50) DEFAULT '',
  `tuition` enum('Y','N') DEFAULT 'Y',
  `graded` enum('Y','N') DEFAULT 'Y',
  `gradeddate` varchar(25) DEFAULT 'N/A',
  `timein1` varchar(15) DEFAULT 'N/A',
  `timeout1` varchar(15) DEFAULT 'N/A',
  `day1` varchar(15) DEFAULT 'N/A',
  `room1` varchar(15) DEFAULT 'N/A',
  `timein2` varchar(15) DEFAULT 'N/A',
  `timeout2` varchar(15) DEFAULT 'N/A',
  `day2` varchar(15) DEFAULT 'N/A',
  `room2` varchar(15) DEFAULT 'N/A',
  `timein3` varchar(15) DEFAULT 'N/A',
  `timeout3` varchar(15) DEFAULT 'N/A',
  `day3` varchar(15) DEFAULT 'N/A',
  `room3` varchar(15) DEFAULT 'N/A',
  `timein4` varchar(15) DEFAULT 'N/A',
  `timeout4` varchar(15) DEFAULT 'N/A',
  `day4` varchar(15) DEFAULT 'N/A',
  `room4` varchar(15) DEFAULT 'N/A',
  `ok1` enum('Y','N') DEFAULT 'N',
  `ok2` enum('Y','N') DEFAULT 'N',
  `ok3` enum('Y','N') DEFAULT 'N',
  `ok4` enum('Y','N') DEFAULT 'N',
  `oras` varchar(10) DEFAULT '',
  `ojt` enum('Y','N') DEFAULT 'N',
  `petition` enum('Y','N') DEFAULT 'N',
  `thesis` enum('Y','N') DEFAULT 'N',
  `labunits` varchar(10) DEFAULT '',
  `internet` enum('Y','N') DEFAULT 'N',
  `residency` enum('Y','N') DEFAULT 'N',
  `encodegrade` varchar(50) DEFAULT 'N/A',
  `gradingpart` enum('Y','N') DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollstudentenroll`
--

CREATE TABLE `enrollstudentenroll` (
  `studentnumber` varchar(15) DEFAULT '',
  `semester` varchar(15) DEFAULT '',
  `schoolyear` varchar(15) DEFAULT '',
  `edate` datetime DEFAULT '0000-00-00 00:00:00',
  `status` varchar(15) DEFAULT '',
  `scholarship` varchar(150) DEFAULT '',
  `majorCourse` varchar(255) DEFAULT '',
  `yearLevel` varchar(255) DEFAULT '',
  `statusII` varchar(255) DEFAULT '',
  `coursenow` varchar(25) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollstudentinformation`
--

CREATE TABLE `enrollstudentinformation` (
  `studentNumber` varchar(15) DEFAULT '',
  `firstName` varchar(255) DEFAULT '',
  `lastName` varchar(255) DEFAULT '',
  `middleName` varchar(255) DEFAULT '',
  `suffix` varchar(100) DEFAULT '',
  `street` varchar(255) DEFAULT '',
  `barangay` varchar(255) DEFAULT '',
  `municipality` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `dateOfBirth` date DEFAULT '0000-00-00',
  `gender` varchar(6) DEFAULT '',
  `religion` varchar(255) DEFAULT '',
  `citizenship` varchar(50) DEFAULT '',
  `status` varchar(20) DEFAULT '',
  `guardian` varchar(255) DEFAULT '',
  `mobilePhone` varchar(20) DEFAULT '',
  `yearAdmitted` varchar(25) DEFAULT '',
  `SemesterAdmitted` varchar(25) DEFAULT '',
  `course` varchar(255) DEFAULT '',
  `cardNumber` varchar(100) DEFAULT 'N/A',
  `studentincrement` int NOT NULL,
  `lastupdate` varchar(5) DEFAULT '2007',
  `highschool` varchar(255) DEFAULT 'N/A',
  `curriculumid` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollsubjectenrolled`
--

CREATE TABLE `enrollsubjectenrolled` (
  `studentnumber` varchar(15) DEFAULT '0',
  `schedcode` varchar(15) DEFAULT '',
  `edate` datetime DEFAULT '0000-00-00 00:00:00',
  `status` varchar(15) DEFAULT '',
  `semester` varchar(15) DEFAULT '',
  `schoolyear` varchar(15) DEFAULT '',
  `evaluate` char(1) DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollsubjectstbl`
--

CREATE TABLE `enrollsubjectstbl` (
  `subjectcode` varchar(50) DEFAULT '',
  `description` text,
  `lectUnits` float(5,2) DEFAULT '0.00',
  `pr1` varchar(50) DEFAULT '',
  `pr2` varchar(50) DEFAULT '',
  `pr3` varchar(50) DEFAULT '',
  `pr4` varchar(50) DEFAULT '',
  `pr5` varchar(50) DEFAULT '',
  `pr6` varchar(50) DEFAULT '',
  `pr7` varchar(50) DEFAULT '',
  `pr8` varchar(50) DEFAULT '',
  `pr9` varchar(50) DEFAULT '',
  `pr10` varchar(50) DEFAULT '',
  `subjectTitle` varchar(255) DEFAULT '',
  `labunits` float(5,2) DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollgradestbl`
--
ALTER TABLE `enrollgradestbl`
  ADD KEY `id` (`id`);

--
-- Indexes for table `enrollstudentinformation`
--
ALTER TABLE `enrollstudentinformation`
  ADD PRIMARY KEY (`studentincrement`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollgradestbl`
--
ALTER TABLE `enrollgradestbl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollstudentinformation`
--
ALTER TABLE `enrollstudentinformation`
  MODIFY `studentincrement` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
