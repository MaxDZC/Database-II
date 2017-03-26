-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 11:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organization`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `student_id` varchar(16) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `picture` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `student_id`, `timestamp`, `message`, `picture`) VALUES
(1, '14103150', '2017-03-04 10:14:59', 'This is our page', 'img/1.jpg'),
(3, '14103150', '2017-03-04 10:15:20', 'Hello Hi', 'img/screenshot.png'),
(4, '14103150', '2017-03-06 05:34:04', 'Please be advised', 'img/Cover.jpg'),
(5, '14103150', '2017-03-07 05:18:44', 'Please attend the research forum', 'img/enemies_spritesheet.png'),
(6, '14103150', '2017-03-26 07:29:12', 'Please help me!', 'img/16938469_10208755988679030_3470765305482977118_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ces`
--

CREATE TABLE `ces` (
  `ces_id` int(11) NOT NULL,
  `ces_title` varchar(64) NOT NULL,
  `ces_venue` varchar(64) NOT NULL,
  `ces_date_start` datetime NOT NULL,
  `ces_date_end` datetime NOT NULL,
  `ces_description` varchar(256) NOT NULL,
  `ces_organizer` varchar(64) NOT NULL,
  `ces_contact_person` varchar(64) NOT NULL,
  `ces_contact_pnum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ces`
--

INSERT INTO `ces` (`ces_id`, `ces_title`, `ces_venue`, `ces_date_start`, `ces_date_end`, `ces_description`, `ces_organizer`, `ces_contact_person`, `ces_contact_pnum`) VALUES
(1, 'Home teaching', 'San Carlos - TC', '2017-03-04 05:00:00', '2017-03-04 22:00:00', 'Teach people at San Carlos good home management skills', 'Father Bucia', 'Karl Ducao', '0914105018'),
(2, 'Home teaching', 'San Carlos - TC', '2017-03-04 05:00:00', '2017-03-04 22:00:00', 'Teach people at San Carlos good home management skills', 'Father Bucia', 'Karl Ducao', '0914105018'),
(5, 'Give it a name!', 'No venue', '2014-12-30 00:58:00', '2017-12-30 00:59:00', 'Hello', 'People', 'Sirs', 'ANumber');

-- --------------------------------------------------------

--
-- Table structure for table `ces_participation`
--

CREATE TABLE `ces_participation` (
  `student_id` varchar(16) NOT NULL,
  `ces_id` int(11) NOT NULL,
  `ces_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(16) NOT NULL,
  `event_venue` varchar(16) NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `event_organizer` varchar(32) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `mandatory_status` tinyint(1) NOT NULL,
  `target_audience` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_venue`, `event_date_start`, `event_date_end`, `event_organizer`, `event_description`, `mandatory_status`, `target_audience`) VALUES
(1, 'Hello', 'Family Park', '2017-03-11 00:00:00', '2017-03-11 00:00:00', 'Datalogics Society', 'Learn how to be a leader in this team leadership and building activity!', 0, ''),
(2, 'Recolection', 'St nino', '2017-03-06 10:00:00', '2017-03-07 17:30:00', 'Religious Groups', 'to know more about your classmates', 1, 'Students'),
(3, 'High School Musi', 'What is this?', '2017-03-03 15:00:00', '2017-03-18 06:00:00', 'Mr. RIvas', 'Troy', 0, 'Teenage girls'),
(4, 'High School Musi', 'MKINUYBHTgvrf', '2017-03-03 15:00:00', '2017-03-18 06:00:00', 'Mr. RIvas', 'Troy', 0, 'Teenage girls');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendance`
--

CREATE TABLE `event_attendance` (
  `student_id` varchar(16) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_attendance`
--

INSERT INTO `event_attendance` (`student_id`, `event_id`, `event_date`) VALUES
('13105125', 2, '0000-00-00'),
('14103150', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `membership_status`
--

CREATE TABLE `membership_status` (
  `student_id` varchar(16) NOT NULL,
  `student_status` enum('Ok','Blocked','Suspended') NOT NULL DEFAULT 'Ok',
  `school_year` varchar(16) NOT NULL,
  `membership_active` enum('Yes - Paid','No - Unpaid','Yes - Attends Meetings','No - Absent in Meetings') NOT NULL DEFAULT 'No - Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_status`
--

INSERT INTO `membership_status` (`student_id`, `student_status`, `school_year`, `membership_active`) VALUES
('14103150', 'Ok', '2016 - 2017', 'Yes - Attends Meetings'),
('14101334', 'Ok', '2016 - 2017', 'Yes - Paid'),
('13105125', 'Ok', '2016 - 2017', 'Yes - Paid'),
('14107440', 'Ok', '2017-infinity', 'Yes - Attends Meetings');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `student_id` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `login_password` varchar(32) NOT NULL,
  `position` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`student_id`, `username`, `login_password`, `position`) VALUES
('14103150', 'admin_zuorba', 'hello', 'President'),
('14107440', 'username', '', 'President of Herself');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `receipt_num` int(11) NOT NULL,
  `student_id` varchar(16) NOT NULL,
  `description` varchar(256) NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `date_paid` date NOT NULL,
  `payment_receiver` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`receipt_num`, `student_id`, `description`, `payment_amount`, `date_paid`, `payment_receiver`) VALUES
(1, '14103150', 'Officership', '0', '2017-03-03', 'Self'),
(38, '14103150', 'MemFee', '100', '2017-03-04', 'Max'),
(42, '14104446', 'Membership Fee', '100', '2017-03-11', 'Max'),
(45, '14101334', 'Membership Fee', '500', '2017-03-04', 'Max'),
(46, '14101334', 'Membership Fee', '500', '2017-03-04', 'Max'),
(47, '14101334', 'Membership Fee', '500', '2017-03-04', 'Max'),
(48, '13105125', 'Membership Fee', '100', '2017-03-02', 'Mr T'),
(49, '13105125', 'Membership Fee', '100', '2017-03-02', 'Mr T'),
(50, '14104314', 'Membership Fee', '50', '2017-03-04', 'Coline'),
(51, '14107440', 'Officership', '0', '2017-03-09', 'Self');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(16) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(16) DEFAULT 'None',
  `last_name` varchar(32) NOT NULL,
  `program` varchar(32) NOT NULL,
  `standing_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `last_name`, `program`, `standing_year`) VALUES
('13105125', 'Jan Joshua', 'Ocanada', 'Velasco', 'HRM', 3),
('14101334', 'John Rexes', 'Berdin', 'Murro', 'BS CompE', 3),
('14103150', 'Max', 'Delante', 'Zuorba', 'BSCS', 3),
('14103152', 'Maxine', 'Zuorba', 'Delante', 'BSCE', 5),
('1410355', 'Maximillian', 'Bob', 'Davidson', 'BSNetworking', 3),
('14104314', 'Kevin Keir', 'Sopuso', 'Colina', 'BSIT', 4),
('14104446', 'Celine Louise', 'Orjalesa', 'Olan', 'BSCS', 3),
('14105018', 'Karl', 'S', 'Ducao', 'BSIT', 3),
('14105050', 'Rei', 'Karl', 'Adam', 'Tourism', 5),
('14105799', 'Monina', '', 'So', 'BSARCH', 4),
('14107440', 'Yares', 'Roa', 'Yares', 'BSCS', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `ces`
--
ALTER TABLE `ces`
  ADD PRIMARY KEY (`ces_id`);

--
-- Indexes for table `ces_participation`
--
ALTER TABLE `ces_participation`
  ADD KEY `ces_id` (`ces_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `membership_status`
--
ALTER TABLE `membership_status`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`receipt_num`),
  ADD KEY `student_id_2` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ces`
--
ALTER TABLE `ces`
  MODIFY `ces_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `receipt_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `officer` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ces_participation`
--
ALTER TABLE `ces_participation`
  ADD CONSTRAINT `ces_participation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ces_participation_ibfk_2` FOREIGN KEY (`ces_id`) REFERENCES `ces` (`ces_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD CONSTRAINT `event_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_attendance_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membership_status`
--
ALTER TABLE `membership_status`
  ADD CONSTRAINT `membership_status_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `payment` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `officer`
--
ALTER TABLE `officer`
  ADD CONSTRAINT `officer_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
