-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 04:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_first_name` varchar(255) NOT NULL,
  `admin_last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_password`, `admin_first_name`, `admin_last_name`) VALUES
(1, 'admin', '12345', 'พี่เฟิร์น', 'CSIT');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(10) NOT NULL,
  `chapter_type1` enum('ประชุมวิชาการ','วารสารระดับชาติ','วารสารนานาชาติ') DEFAULT NULL,
  `chapter_type2` enum('ระดับชาติ','นานาชาติ','TCI','อื่นๆระดับชาติ','ISI','SCOPUS','อื่นๆนานาชาติ') DEFAULT NULL,
  `chapter_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `chapter_name` varchar(255) DEFAULT NULL,
  `chapter_filename` varchar(255) DEFAULT NULL,
  `chapter_admin_id` int(10) DEFAULT NULL,
  `chapter_student_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `chapter_type1`, `chapter_type2`, `chapter_timestamp`, `chapter_name`, `chapter_filename`, `chapter_admin_id`, `chapter_student_id`) VALUES
(20, 'ประชุมวิชาการ', 'ระดับชาติ', '2022-10-07 14:14:54', 'งานวิจัยทางวิชาการ', 'uploads/TesT_CSIT04__071022041454.pdf', 1, 62313870),
(21, 'ประชุมวิชาการ', 'นานาชาติ', '2022-10-07 14:15:26', 'ระบบติดตามสถานะ', 'uploads/TesT_CSIT05__071022041526.pdf', 1, 62313870),
(22, 'ประชุมวิชาการ', 'ระดับชาติ', '2022-10-07 14:15:43', 'แชทบอทให้ความรู้', 'uploads/TesT_CSIT06__071022041543.pdf', 1, 62313870);

-- --------------------------------------------------------

--
-- Table structure for table `gtcsit`
--

CREATE TABLE `gtcsit` (
  `gt_id` int(10) NOT NULL,
  `gt_file_01` varchar(255) DEFAULT NULL,
  `gt_file_02` varchar(255) DEFAULT NULL,
  `gt_file_03` varchar(255) DEFAULT NULL,
  `gt_file_01_timestamp` timestamp NULL DEFAULT NULL,
  `gt_file_02_timestamp` timestamp NULL DEFAULT NULL,
  `gt_file_03_timestamp` timestamp NULL DEFAULT NULL,
  `gt_file_01_admin_id` int(10) DEFAULT NULL,
  `gt_file_02_admin_id` int(10) DEFAULT NULL,
  `gt_file_03_admin_id` int(10) DEFAULT NULL,
  `gt_student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gtcsit`
--

INSERT INTO `gtcsit` (`gt_id`, `gt_file_01`, `gt_file_02`, `gt_file_03`, `gt_file_01_timestamp`, `gt_file_02_timestamp`, `gt_file_03_timestamp`, `gt_file_01_admin_id`, `gt_file_02_admin_id`, `gt_file_03_admin_id`, `gt_student_id`) VALUES
(28, 'uploads/TesT_CSIT01__071022041421.pdf', NULL, NULL, '2022-10-07 14:14:21', NULL, NULL, 1, NULL, NULL, 62313870);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `pg_id` int(10) NOT NULL,
  `pg_file_eng` varchar(255) DEFAULT NULL,
  `pg_file_qe` varchar(255) DEFAULT NULL,
  `pg_file_adviser` varchar(255) DEFAULT NULL,
  `pg_file_outline` varchar(255) DEFAULT NULL,
  `pg_file_end` varchar(255) DEFAULT NULL,
  `pg_file_eng_time` timestamp NULL DEFAULT NULL,
  `pg_file_qe_time` timestamp NULL DEFAULT NULL,
  `pg_file_adviser_time` timestamp NULL DEFAULT NULL,
  `pg_file_outline_time` timestamp NULL DEFAULT NULL,
  `pg_file_end_time` timestamp NULL DEFAULT NULL,
  `pg_file_eng_admin_id` int(10) DEFAULT NULL,
  `pg_file_qe_admin_id` int(10) DEFAULT NULL,
  `pg_file_adviser_admin_id` int(10) DEFAULT NULL,
  `pg_file_outline_admin_id` int(10) DEFAULT NULL,
  `pg_file_end_admin_id` int(10) DEFAULT NULL,
  `pg_student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`pg_id`, `pg_file_eng`, `pg_file_qe`, `pg_file_adviser`, `pg_file_outline`, `pg_file_end`, `pg_file_eng_time`, `pg_file_qe_time`, `pg_file_adviser_time`, `pg_file_outline_time`, `pg_file_end_time`, `pg_file_eng_admin_id`, `pg_file_qe_admin_id`, `pg_file_adviser_admin_id`, `pg_file_outline_admin_id`, `pg_file_end_admin_id`, `pg_student_id`) VALUES
(18, 'uploads/TesT_CSIT02__071022041430.pdf', 'uploads/TesT_CSIT03__071022041438.pdf', NULL, NULL, NULL, '2022-10-07 14:14:30', '2022-10-07 14:14:38', NULL, NULL, NULL, 2, 2, NULL, NULL, NULL, 62313870);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `student_pic` varchar(255) NOT NULL,
  `student_user` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `student_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_pic`, `student_user`, `student_password`, `prefix`, `first_name`, `last_name`, `email`, `section`, `student_teacher_id`) VALUES
(62313870, 'pic/top__071022041320.jpg', '62313870', '13870', 'นาย', 'ภัทรดนัย', 'ชาบาง', 'pattaradanaic62@nu.ac.th', 'Information_Technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teachers_id` int(10) NOT NULL,
  `teachers_pic` varchar(255) NOT NULL,
  `teachers_user` varchar(255) NOT NULL,
  `teachers_password` varchar(255) NOT NULL,
  `teachers_prefix` varchar(255) NOT NULL,
  `teachers_first_name` varchar(255) NOT NULL,
  `teachers_last_name` varchar(255) NOT NULL,
  `teachers_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachers_id`, `teachers_pic`, `teachers_user`, `teachers_password`, `teachers_prefix`, `teachers_first_name`, `teachers_last_name`, `teachers_email`) VALUES
(6, 'pic_teachers/sanya__071022041405.jpg', 'sanya', '12345', 'ผู้ช่วยศาสตราจารย์.ดร.', 'สัญญา', 'เครือหงษ์', 'sanya@nu.ac.th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `gtcsit`
--
ALTER TABLE `gtcsit`
  ADD PRIMARY KEY (`gt_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teachers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gtcsit`
--
ALTER TABLE `gtcsit`
  MODIFY `gt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `pg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teachers_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
