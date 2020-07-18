-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 06:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `aid` int(11) NOT NULL,
  `date1` date NOT NULL,
  `time1` time NOT NULL,
  `ampm` varchar(5) NOT NULL DEFAULT 'am',
  `msg` varchar(500) NOT NULL,
  `eid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`aid`, `date1`, `time1`, `ampm`, `msg`, `eid`) VALUES
(65, '2018-06-13', '04:39:11', 'pm', 'Created new Project \'Project 1\'.', 'admin'),
(66, '2018-06-13', '04:41:38', 'pm', 'Added new subtask to Project Subtask 1 of Project No:5', '201800'),
(67, '2018-06-13', '04:43:02', 'pm', 'Added new subtask to Project Subtask 2 of Project No:5', '201800'),
(68, '2018-06-13', '04:43:48', 'pm', 'Added new subtask to Project subtask 3 of Project No:5', '201800'),
(69, '2018-06-13', '04:45:11', 'pm', 'Added new subtask to Project Subtask 4 of Project No:5', '201800');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(10) NOT NULL,
  `ename` varchar(20) DEFAULT NULL,
  `uname` varchar(40) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'Male',
  `short_bio` longtext,
  `address` text,
  `s_ans_1` varchar(20) DEFAULT NULL,
  `s_ans_2` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `proj_mgr` tinyint(1) NOT NULL DEFAULT '0',
  `credits` float NOT NULL DEFAULT '0',
  `first_log` int(1) NOT NULL DEFAULT '0',
  `avatar_url` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `vh_efficiency` float NOT NULL DEFAULT '0',
  `h_efficiency` float NOT NULL DEFAULT '0',
  `m_efficiency` float NOT NULL DEFAULT '0',
  `l_efficiency` float NOT NULL DEFAULT '0',
  `vl_efficiency` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `ename`, `uname`, `email`, `password`, `phone`, `dob`, `gender`, `short_bio`, `address`, `s_ans_1`, `s_ans_2`, `admin`, `proj_mgr`, `credits`, `first_log`, `avatar_url`, `vh_efficiency`, `h_efficiency`, `m_efficiency`, `l_efficiency`, `vl_efficiency`) VALUES
('201800', 'Amith Shankar', '', 'manager@gmail.com', '6ee4a469cd4e91053847f5d3fcb61dbcc91e8f0ef10be7748da4c4a1ba382d17', '8625331167', '2015-07-14', 'male', 'Palu  kudi, employee @wipro', 'Palu, puttur', 'john', 'cena', 0, 1, 0, 1, '3.png', 0, 0, 0, 0, 0),
('201801', 'Aditya Rao', '', 'emp@gmail.com', '36cdfcec47d26e934f3b0c0b9ca761bbe09fae6d37581ab2e4bb4a52b66623ab', '9678455564', '2016-11-07', 'male', 'Emp @erachana technologies', 'soorikumer', 'taka', 'taka', 0, 0, 0, 1, '5.png', 0, 0, 0, 0, 0),
('201802', 'Dwarakanath', '', 'emp2@gmail.com', 'e5dc127f9f0a1c2ce3d61e6321670602931f1d50c43abfb9b004594bd283d878', '7760794880', '2016-09-25', 'male', 'emp @wipro', 'tharikambla house, bajpe', 'taka', 'taka', 0, 0, 0, 1, '6.png', 0, 0, 0, 0, 0),
('201803', 'Bharathraj M', '', 'emp3@gmail.com', '573a49dec7189d5ee5b0957aecb620bff05f4b57461dd8d231bd01bc8168654e', '9587642314', '2012-09-03', '', 'emp  @@wipro', 'mavanji house', 'taka', 'taka', 0, 0, 0, 1, '8.png', 0, 0, 0, 0, 0),
('admin', 'admin', '', 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '9785461237', '2018-05-24', 'male', 'From Bangalore, Experience 10 year @Global Edge', 'nehrunagar', 'taka', 'taka', 1, 0, 0, 1, '1.png', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `prim` int(1) NOT NULL,
  `cred_threshold` varchar(10) NOT NULL,
  `min_cred` varchar(10) NOT NULL,
  `p_very_hard` varchar(20) NOT NULL,
  `p_hard` varchar(10) NOT NULL,
  `p_med` varchar(10) NOT NULL,
  `p_low` varchar(10) NOT NULL,
  `p_very_low` varchar(20) NOT NULL,
  `s_very_hard` varchar(20) NOT NULL,
  `s_hard` varchar(10) NOT NULL,
  `s_med` varchar(10) NOT NULL,
  `s_low` varchar(10) NOT NULL,
  `s_very_low` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`prim`, `cred_threshold`, `min_cred`, `p_very_hard`, `p_hard`, `p_med`, `p_low`, `p_very_low`, `s_very_hard`, `s_hard`, `s_med`, `s_low`, `s_very_low`) VALUES
(1, '4', '1', '5000', '4000', '3000', '2000', '1000', '500', '400', '300', '200', '100');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `from1` varchar(20) NOT NULL,
  `to1` varchar(20) NOT NULL,
  `first` int(11) NOT NULL DEFAULT '1',
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `subject`, `message`, `from1`, `to1`, `first`, `date1`) VALUES
(46, 'Project Assignment', 'Project \"Project 1\" of PNO: 5 is assigned to you. Select the employees and carry out the Task within due date 2018-06-22', 'admin', '201800', 0, '2018-06-13'),
(47, 'Subtask Assignment', 'You have been assigned to a new subtask Subtask 1 of Project No:5', '201800', '201801', 1, '2018-06-13'),
(48, 'Subtask Assignment', 'You have been assigned to a new subtask Subtask 2 of Project No:5', '201800', '201802', 1, '2018-06-13'),
(49, 'Subtask Assignment', 'You have been assigned to a new subtask subtask 3 of Project No:5', '201800', '201801', 1, '2018-06-13'),
(50, 'Subtask Assignment', 'You have been assigned to a new subtask Subtask 4 of Project No:5', '201800', '201802', 1, '2018-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pno` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `p_mgr_id` varchar(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `submitdate` date NOT NULL,
  `priority` text NOT NULL,
  `difficulty` varchar(20) NOT NULL DEFAULT 'very_low',
  `lender` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `description` varchar(1000) NOT NULL,
  `field` varchar(50) NOT NULL,
  `credits` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pno`, `pname`, `p_mgr_id`, `startdate`, `enddate`, `submitdate`, `priority`, `difficulty`, `lender`, `remarks`, `status`, `description`, `field`, `credits`) VALUES
(5, 'Project 1', '201800', '2018-06-13', '2018-06-22', '0000-00-00', 'medium', 'medium', 'Lender 1', '', 'pending', 'Test Project 1', 'Test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE `subtasks` (
  `stid` int(11) NOT NULL,
  `pno` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `submitdate` date NOT NULL,
  `priority` text NOT NULL,
  `difficulty` varchar(20) NOT NULL DEFAULT 'very_low',
  `remarks` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `description` varchar(1000) NOT NULL,
  `credits` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`stid`, `pno`, `sno`, `sname`, `eid`, `startdate`, `enddate`, `submitdate`, `priority`, `difficulty`, `remarks`, `status`, `description`, `credits`) VALUES
(10, 5, 0, 'Subtask 1', '201801', '2018-06-12', '2018-06-15', '0000-00-00', 'medium', 'medium', '', 'pending', 'Subtask 1 description', 0),
(11, 5, 0, 'Subtask 2', '201802', '2018-06-03', '2018-06-12', '0000-00-00', 'high', 'low', '', 'pending', 'Subtask 2 description', 0),
(12, 5, 0, 'subtask 3', '201801', '2018-06-05', '2018-06-14', '0000-00-00', 'medium', 'hard', '', 'pending', 'Subtask 3 Decription', 0),
(13, 5, 0, 'Subtask 4', '201802', '2018-06-06', '2018-06-16', '0000-00-00', 'high', 'very_hard', '', 'pending', 'Subtask 4 decription', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `stid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `ff` (`eid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`prim`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pno`),
  ADD KEY `p_mgr_id` (`p_mgr_id`);

--
-- Indexes for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `pno` (`pno`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `prim` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subtasks`
--
ALTER TABLE `subtasks`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `ff` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`p_mgr_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD CONSTRAINT `subtasks_ibfk_1` FOREIGN KEY (`pno`) REFERENCES `projects` (`pno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subtasks_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
