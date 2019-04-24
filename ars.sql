-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 09:09 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(2) NOT NULL,
  `admin_id` int(2) NOT NULL,
  `last_active` time NOT NULL,
  `last_login` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ad_detail_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `ad_detail_id` int(6) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `M.I.` char(3) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender(0-male,1-female)` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alum_id` int(6) NOT NULL,
  `Course_id` int(6) NOT NULL,
  `College_id` int(6) NOT NULL,
  `alum_detail_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alumni_details`
--

CREATE TABLE `alumni_details` (
  `alum_detail_id` int(6) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `M.I.` char(3) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `thesis` varchar(300) DEFAULT NULL,
  `rating_id` int(2) DEFAULT NULL,
  `grad_year` int(4) NOT NULL,
  `suffix` char(3) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(2) NOT NULL,
  `college_label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_label`) VALUES
(1, 'CBA'),
(2, 'CASE'),
(3, 'CEAFA'),
(4, 'CHS'),
(5, 'College of Law'),
(6, 'GS');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(2) NOT NULL,
  `college_id` int(2) NOT NULL,
  `course_label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `college_id`, `course_label`) VALUES
(1, 1, 'BSA'),
(2, 1, 'BSBA Major in Marketing Management'),
(3, 1, 'BSBA Major in Financial Management'),
(4, 1, 'BSBA Major in Human Resource Development Management'),
(5, 1, 'BSHM'),
(6, 1, 'BSTM'),
(7, 1, 'BS Entrep'),
(8, 2, 'BA Comm'),
(9, 2, 'BA Philo'),
(10, 2, 'BA PolSci'),
(11, 2, 'BS Psych'),
(12, 2, 'BS Chem'),
(13, 2, 'BSEd Major in English'),
(14, 2, 'BSEd Major in Mathematics'),
(15, 2, 'BSEd Major in Science'),
(16, 2, 'BEEd General Curriculum'),
(17, 2, 'BEEd Major in Early Childhood Development'),
(18, 3, 'BSCE'),
(19, 3, 'BSIE'),
(20, 3, 'BSCpE'),
(21, 3, 'BSECE'),
(22, 3, 'BS Arch'),
(23, 3, 'BFA with specialization in Visual Communicaction'),
(24, 3, 'BSCS'),
(25, 3, 'BLIS'),
(26, 4, 'BSN'),
(27, 4, 'BS Pharm'),
(28, 4, 'BS MedTech'),
(29, 5, 'LL.B.'),
(30, 6, 'MAEd Major in Math and Science Teaching'),
(31, 6, 'MAEd Major in Religious Education'),
(32, 6, 'MAEd Major in Guidance and Counseling'),
(33, 6, 'MAEd Major in Educational Management'),
(34, 6, 'MBA General Curriculum'),
(35, 6, 'MBA Executive Program for Clergy (Plan B)'),
(36, 6, 'MPA Plan A'),
(37, 6, 'MPA Plan B'),
(38, 6, 'MAN'),
(39, 6, 'MSME'),
(40, 6, 'PhD Major in Development Education'),
(41, 6, 'PhD Major in Public Administration'),
(42, 6, 'PhD Major in Counselor Education'),
(43, 6, 'DBA');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(2) NOT NULL,
  `rating_label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_label`) VALUES
(1, 'MERITUS'),
(2, 'BENEMERITUS'),
(3, 'MERITISSIMUS'),
(4, 'BENE PROBATUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`ad_detail_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alum_id`);

--
-- Indexes for table `alumni_details`
--
ALTER TABLE `alumni_details`
  ADD PRIMARY KEY (`alum_detail_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
