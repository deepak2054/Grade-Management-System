-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 01:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` char(6) NOT NULL,
  `instructor` char(25) NOT NULL,
  `semester` char(15) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `batch` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `instructor`, `semester`, `course_code`, `batch`) VALUES
('1s2015', 'rbista@ku.edu.np', '1', 'COMP 502', 2015),
('1s2015', 'dhiraj@ku.edu.np', '1', 'COMP 503', 2015),
('1s2015', 'skhanal@ku.edu.np', '1', 'COMP 504', 2015),
('1s2015', 'sushil@ku.edu.np', '1', 'COMP 505', 2015),
('1s2015', 'sushilnepal@ku.edu.np', '1', 'COMP 506', 2015),
('2s2015', 'sushil@ku.edu.np', '2', 'COMP 502', 2015),
('2s2015', 'samir_dkharel@ku.edu.np', '2', 'COMP 503', 2015),
('2s2015', 'TBA', '2', 'COMP 505', 2015),
('2s2015', 'bal@ku.edu.np', '2', 'COMP 506', 2015),
('2s2015', 'bal@ku.edu.np', '2', 'COMP 551', 2015),
('1s2016', 'bal@ku.edu.np', '1', 'COMP 502', 2016),
('1s2016', 'TBA', '1', 'COMP 504', 2016),
('1s2016', 'samir_dkharel@ku.edu.np', '1', 'COMP 551', 2016),
('1s2016', 'TBA', '1', 'COMP 557', 2016),
('1s2016', 'TBA', '1', 'COMP 561', 2016),
('1s2016', 'samir_dkharel@ku.edu.np', '1', 'COMP 567', 2016),
('1s2016', 'TBA', '1', 'COMP 579', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` char(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `credit` tinyint(2) NOT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table keeps the details of the courses offered.';

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `credit`, `description`) VALUES
('COMP 502', 'Design And Analysis Of Algorithm', 3, ''),
('COMP 503', 'Advance Database Management System', 3, ''),
('COMP 504', 'Software Engineering ', 3, ''),
('COMP 505', 'Computer Network And Architecture', 3, ''),
('COMP 506', 'Advance Operating System', 3, ''),
('COMP 551', 'Computer Graphics', 3, ''),
('COMP 552', 'Software Architecture', 3, ''),
('COMP 553', 'Software Project Management', 3, ''),
('COMP 554', 'Data Structure And Algorithm', 3, ''),
('COMP 556', 'Microprocessor-based System Design', 3, ''),
('COMP 557', 'Network Programming', 3, ''),
('COMP 558', 'Management Information System', 3, ''),
('COMP 559', 'Distributed System', 3, ''),
('COMP 560', 'Information Security And Cryptography', 3, ''),
('COMP 561', 'Cryptography', 3, ''),
('COMP 562', 'High Speed Networks', 3, ''),
('COMP 563', 'Software Reuse', 3, ''),
('COMP 564', 'Aritficial Intelligence', 3, ''),
('COMP 565', 'Theory Of Computation', 3, ''),
('COMP 566', 'Compiler Design', 3, ''),
('COMP 567', 'E-Commerce', 3, ''),
('COMP 568', 'Tools And Techniques For Research', 3, ''),
('COMP 569', 'Data Mining ', 3, ''),
('COMP 570', 'Machine Learning ', 3, ''),
('COMP 571', 'Data Warehousing', 3, ''),
('COMP 573', 'E-Governance', 3, ''),
('COMP 574', 'Knowledge Management ', 3, ''),
('COMP 576', 'Natural Language Processing', 3, ''),
('COMP 577', 'Speech And Language Processing ', 3, ''),
('COMP 578', 'Artificial Neural Network', 3, ''),
('COMP 579', 'Genetic Algorithm', 3, ''),
('COMP 580', 'Project Work I', 3, ''),
('COMP 581', 'Project Work II', 3, ''),
('COMP 582', 'Game Programming', 3, ''),
('COMP 583', 'Knowledge Engineering And Expert System ', 3, ''),
('COMP 601', 'Computational Linguistics ', 3, ''),
('COMP 602', 'Software Process Improvement ', 3, ''),
('COMP 603', 'Evidence Based Software Engineering', 3, ''),
('COMP 604', 'Program Analysis', 3, ''),
('COMP 605', 'Computer Speech Processing ', 3, ''),
('COMP 606', 'Phonetic And Phonology', 3, ''),
('COMP 607', 'Machine Translation', 3, ''),
('COMP 608', 'Internationalization And Localization Of Software ', 3, ''),
('COMP 609', 'Artificial Intelligence In Games', 3, ''),
('COMP 610', 'Script Processing ', 3, ''),
('COMP 611', 'Morphology And Syntax', 3, ''),
('ECPG 503', 'Random Process', 3, ''),
('EPGC 560', 'Information Theory And Coding  ', 3, ''),
('ITPG 502', 'Data Structure And Algorithms', 3, ''),
('ITPG 503', 'Computer Networks', 3, ''),
('ITPG 504', 'Computer Architecture', 3, ''),
('ITPG 511', 'Software Architecture', 3, ''),
('ITPG 512', 'Software Project Management', 3, ''),
('ITPG 513', 'Software Quality Assurance   ', 3, ''),
('ITPG 517', 'Management Of Information Systems', 3, ''),
('ITPG 520', 'Information Security', 3, ''),
('ITPG 522', 'E-Commerce', 3, ''),
('ITPG 523', 'Database Management System', 3, ''),
('ITPG 528', 'Computer Stimulation And Modeling', 3, ''),
('ITPG 529', 'Human Computer Interaction', 3, ''),
('ITPG 530', 'Technical Entrepreneurship  ', 3, ''),
('ITPG 531', 'Ingredients For Innovation', 3, ''),
('ITPG 532', 'Integrated Decision Making', 3, ''),
('ITPG 533', 'Research Methodology', 3, ''),
('ITPG 547', 'Emerging Technologies ', 3, ''),
('ITPG 551', 'Multimedia Technology ', 3, ''),
('MATH 503', 'Mathematical Foundation For Computer Science', 3, ''),
('MEPG 510', 'Economics For Engineers ', 3, ''),
('MEPG 511', 'System Safety And Reliability', 3, ''),
('MEPG 512', 'Social Impact Of Engineering Systems', 3, ''),
('MEPG 513', 'Project Management', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `reg_no` varchar(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `doe` date DEFAULT NULL,
  `batch` char(4) DEFAULT NULL,
  `permanent_address` varchar(100) DEFAULT NULL,
  `temporary_address` varchar(100) DEFAULT NULL,
  `cell_no` varchar(15) DEFAULT NULL,
  `landline` varchar(15) DEFAULT NULL,
  `photo` varchar(5) DEFAULT NULL,
  `past_document` varchar(20) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `full_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `first_name`, `middle_name`, `last_name`, `nationality`, `dob`, `doe`, `batch`, `permanent_address`, `temporary_address`, `cell_no`, `landline`, `photo`, `past_document`, `email_address`, `password`, `full_name`) VALUES
('000001-16', 'kushal', 'rai', 'bantawa', 'Nepali', '1996-06-12', '2016-08-23', '2016', 'Dhangadi', 'KUUBH', '9834321234', '', NULL, NULL, 'kushal_bhatta@gmail.com', '2237990dafec4520b7939528171f0a74', 'kushal rai bantawa'),
('000002-16', 'Amit', '', 'upreti', 'nepali', '1996-12-31', '2016-08-23', '2016', 'Sarlahi', 'KUBH', '9844714534', '01423546', NULL, NULL, 'a.u.aua937@gmail.com', '7dd97a9fff3712a2ca8ba88f0cddd478', 'Amit upreti'),
('000003-16', 'shirshak', '', 'bajagain', 'NEPALI', '1996-08-29', '2016-08-24', '2016', 'thankot', 'KUBH', '9843423981', '', NULL, NULL, 'bhatta@gmail.com', 'c97e1352aeab75585514261752955030', 'shirshak bajagain'),
('000004-16', 'Deepak', '', 'Shrestha', 'nepali', '1996-08-28', '2016-08-21', '2016', 'Sindhuli', 'KUBH', '9843423981', '', NULL, NULL, 'Deepak421@gmail.com', '03534cb1e76264f958d1d9d4ec65d56d', 'Deepak Shrestha'),
('000005-16', 'yugesh', '', 'rai', 'nepali', '1995-10-21', '2016-08-17', '2016', 'sikkim', 'KUBH', '9843423921', '', NULL, NULL, 'bantawarai@gmail.com', '8d24074c48ea888dc271c2bf9e0c3eed', 'yugesh rai'),
('000006-16', 'Beeshal', '', 'adhikari', 'nepali', '1997-08-25', '2016-08-22', '2016', 'Dang', 'KUBH', '9860135478', '', NULL, NULL, 'Beeshal_adh@gmail.com', 'a70f8fd99df7e72533dc8232328b2166', 'Beeshal adhikari'),
('000007-16', 'Rajan', 'prasad', 'Kalwar', 'nepali', '1996-12-26', '2016-09-29', '2016', 'birgunj', 'KUBH', '9867546743', '', NULL, NULL, 'kalwarrajan@gmail.com', '6a64722a8561205904d2eaa832e26faa', 'Rajan prasad Kalwar'),
('000008-16', 'Akash', '', 'Bashyal', 'nepali', '1996-10-29', '2016-09-29', '2016', 'butwal', 'KUBH', '9876447363', '', NULL, NULL, 'aks2@gmail.com', 'ecb143a78d88e035608cd55bd7b46b7d', 'Akash Bashyal'),
('000201-11', 'admin11', '', 'q', 'a', '2015-12-19', '2015-12-12', '2015', 'afwdadsda', 'dasdada', '9818902387', '', NULL, NULL, 'hero@noobe.com', '30465f069c70cf8bbadbd51a584bbbc7', 'admin11 q'),
('1-15', 'amit', '', 'shrestha', 'Nepali', '2009-10-10', '2015-09-16', '2015', 'dasdsa', '', '9818902387', '0', NULL, NULL, 'thapa.aalok@gmail.com', '3ab7c95c349a8baec6c7bf9c9a061ed3', 'amit shrestha'),
('111111-11', 'amit', 'a', 'shrestha', 'fafad', '2015-12-19', '2015-12-19', '2016', 'a', 'a', '1111111111', '', NULL, NULL, 'bhatta@gmail.com', 'b71d6990c581799a168dd276e2a33485', 'amit a shrestha'),
('2-15', 'Prasamsa ', '', 'Khanal', 'Nepali', '2009-10-10', '2015-09-16', '2015', '', '', '', '0', NULL, NULL, 'prasamsa.khanal@gmail.com', '0239a179cd1e90fd4cccd880cfd279fa', 'Prasamsa Khanal'),
('3-15', 'Navin', '', 'Joshi', 'Nepali', '2009-10-10', '2015-09-16', '2015', '', '', '', '0', NULL, NULL, 'joshenavin0@gmail.com', '37b6d699c5856ad295b75d0a3ee105b0', 'Navin Joshi'),
('4-15', 'Nirmal', '', 'Wagle', 'Nepali', '2009-10-10', '2015-09-16', '2015', '', '', '', '0', NULL, NULL, 'nirmal.wagle@gmail.com', '34709ee21804392fdfcc97ad19894b43', 'Nirmal Wagle'),
('5-15', 'Manish ', '', 'Joshi', 'Nepali', '2009-10-10', '2015-09-16', '2015', '', '', '', '0', NULL, NULL, 'mnzjoshi@gmail.com', '33d58674cc8c5c482981ad614ddf0936', 'Manish Joshi'),
('6-15', 'kushal', '', 'bhatta', 'Nepali', '2009-10-10', '2015-09-16', '2015', '', '', '', '0', NULL, NULL, 'thapa.ajaythapa@gmail.com', 'bc2a9f0281a92419fb97178cdfdce36e', 'kushal bhatta');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `reg_no` varchar(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `grade` char(3) DEFAULT NULL,
  `class_id` char(6) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`reg_no`, `course_code`, `grade`, `class_id`, `remarks`) VALUES
('3-15', 'COMP 502', 'A', '1s2015', 'fsdf'),
('3-15', 'COMP 503', 'TBD', '1s2015', NULL),
('1-15', 'COMP 502', 'C-', '1s2015', 'poor'),
('1-15', 'COMP 503', 'TBD', '1s2015', 'OK'),
('1-15', 'COMP 504', 'B+', '1s2015', 'sano bantawa'),
('5-15', 'COMP 505', '', '1s2015', ''),
('5-15', 'COMP 506', '', '1s2015', ''),
('2-15', 'COMP 502', NULL, '2s2015', NULL),
('2-15', 'COMP 503', NULL, '2s2015', NULL),
('2-15', 'COMP 505', NULL, '2s2015', NULL),
('2-15', 'COMP 506', NULL, '2s2015', NULL),
('000001-16', 'COMP 502', NULL, '1s2016', NULL),
('000001-16', 'COMP 504', NULL, '1s2016', NULL),
('000001-16', 'COMP 551', NULL, '1s2016', NULL),
('000001-16', 'COMP 557', NULL, '1s2016', NULL),
('000001-16', 'COMP 561', '', '1s2016', 'r'),
('000001-16', 'COMP 567', NULL, '1s2016', NULL),
('000001-16', 'COMP 579', NULL, '1s2016', NULL),
('1-15', 'COMP 502', 'C-', '2s2015', 'poor'),
('1-15', 'COMP 503', 'TBD', '2s2015', 'OK'),
('1-15', 'COMP 505', NULL, '2s2015', NULL),
('1-15', 'COMP 506', NULL, '2s2015', NULL),
('1-15', 'COMP 551', NULL, '2s2015', NULL),
('000004-16', 'COMP 502', NULL, '1s2016', NULL),
('000004-16', 'COMP 504', NULL, '1s2016', NULL),
('000004-16', 'COMP 551', NULL, '1s2016', NULL),
('000004-16', 'COMP 557', NULL, '1s2016', NULL),
('000004-16', 'COMP 561', NULL, '1s2016', NULL),
('000004-16', 'COMP 567', NULL, '1s2016', NULL),
('000004-16', 'COMP 579', NULL, '1s2016', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_detail`
--

CREATE TABLE `teacher_detail` (
  `email_id` char(25) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_detail`
--

INSERT INTO `teacher_detail` (`email_id`, `first_name`, `last_name`, `department`, `designation`) VALUES
('bal@ku.edu.np', 'Dr. Bal', 'Krishna Bal ', 'DoCSE', 'Assistant Professor'),
('dhiraj@ku.edu.np', 'Dhiraj', 'Shrestha', 'DoCSE', 'Lecturer'),
('gajendra.sharma@ku.edu.np', 'Dr. Gajendra', 'Sharma', 'DoCSE', 'Teaching Assistant'),
('manish@ku.edu.np', 'Dr. Manish', 'Pokharel', 'DoCSE', 'Teaching Assistant'),
('manoj@ku.edu.np', 'Mr. Manoj ', 'Shakya', 'DoCSE', 'Assistant Professor'),
('pdawadi@ku.edu.np', 'Pankaj', 'Raj Dawadi', 'DoCSE', 'Assistant Professor'),
('pkharel@ku.edu.np', 'Dr. Purusottam', 'Kharel', 'DoCSE', 'Assistant Professor'),
('rbista@ku.edu.np', 'Dr. Rabindra', 'Bista', 'DoCSE', 'Assistant Professor'),
('samir_dkharel@ku.edu.np', 'Sameer', 'Kharel', 'DoCSE', 'Lecturer'),
('satyendra.lohani@ku.edu.n', 'Satyendra', 'Lohani', 'DoCSE', 'Lecturer'),
('skhanal@ku.edu.np', 'Santosh', 'Khanal', 'DoCSE', 'Assistant Professor'),
('sushil@ku.edu.np', 'Sushil', 'Shrestha', 'DoCSE', 'Assistant Professor'),
('sushilnepal@ku.edu.np', 'Sushil', 'Nepal', 'DoCSE', 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'example@example.com',
  `username` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `name`, `password`) VALUES
(1, 'example@something.com', 'admin', '', '21232f297a57a5a743894a0e4a801fc3'),
(32, 'rai@bantawa.com', 'bantawa123', '', 'c4ca4238a0b923820dcc509a6f75849b'),
(33, 'deeoesh@gmail.com', 'Deepesh', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(34, 'amite@amite.com', 'amite', '', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_id` int(4) NOT NULL,
  `access` varchar(15) NOT NULL DEFAULT 'student',
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(10) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_id`, `access`, `user_name`, `first_name`, `middle_name`, `last_name`, `email_id`, `Address`, `department`, `designation`) VALUES
(1, 'admin', 'admin', 'admin', '', 'User', 'example@something.com', 'admin', '', ''),
(20, 'professor', 'deepak123', 'deepak', '', 'shrestha', 'deepakshrestha@gmail.com', 'user', 'DoCSE', 'professot'),
(21, 'professor', 'bantawa123', 'yugesh', '', 'rai', 'rai@bantawa.com', 'user', 'DoCSE', 'student'),
(22, 'professor', 'Deepesh', 'Deepesh', 'No name', 'Shrestha', 'deeoesh@gmail.com', 'user', 'DoCSE', 'Er.'),
(23, 'professor', 'amite', 'Amite', 'Amite', 'Amite', 'amite@amite.com', 'user', 'DoCSE', 'Er.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `teacher_detail`
--
ALTER TABLE `teacher_detail`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
