-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 05:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_class`
--

CREATE TABLE `tb_class` (
  `id` int(11) NOT NULL,
  `room_name` varchar(10) NOT NULL,
  `quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_class`
--

INSERT INTO `tb_class` (`id`, `room_name`, `quota`) VALUES
(1, 'ISC01', 50),
(2, 'ISC02', 50),
(3, 'ISC03', 50),
(4, 'ISC04', 50),
(5, 'ISC05', 50),
(6, 'ISC06', 100),
(7, 'ISC07', 100),
(8, 'ISC08', 100),
(9, 'SDL1', 50),
(10, 'SDL2', 50),
(11, 'SDL3', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_courses`
--

CREATE TABLE `tb_courses` (
  `id` int(11) NOT NULL,
  `studyprogram_id` int(11) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `lecturer_id` varchar(15) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_courses`
--

INSERT INTO `tb_courses` (`id`, `studyprogram_id`, `course_id`, `course_name`, `semester_id`, `lecturer_id`, `credits`) VALUES
(1, 31, 'BCIS3101', ' Computer Architecture and Organization', 1, '0231001', 3),
(2, 31, 'BCIS3102', 'Information System Mathematic', 1, '0231002', 3),
(3, 31, 'BCIS3103', 'Programming Techniques', 1, '0231006', 3),
(4, 31, 'BCIS3104', 'Multimedia System', 1, '0231004', 3),
(5, 31, 'BCIS1105', ' Introduction to Information Systems', 1, '0231005', 1),
(6, 31, 'BCIS1103', 'Lab. Programming Technique', 1, '0231092', 1),
(7, 31, 'BCIS3201	', 'Data Communication and Networking', 2, '0231001', 3),
(8, 31, 'BCIS3202', '2D Animation', 2, '0231004', 3),
(10, 31, 'BCIS3203', 'Database System', 2, '0231005', 3),
(11, 31, 'BCIS1204', 'Operating System', 2, '0231001', 1),
(13, 31, 'BCIS1202', 'Data Structure', 2, '0231010', 1),
(14, 31, 'BCIS1203', 'Lab. Database System', 2, '0231092', 1),
(15, 31, 'BCIS1104', 'Lab. Multimedia System', 1, '0231004', 1),
(16, 31, 'BCIS1201', 'Lab. Data Communication and Networking', 2, '0231002', 1),
(17, 31, 'BCIS1202', 'Lab. 2D Animation', 2, '0231007', 1),
(18, 31, 'BCIS1101	', 'Lab. Computer Architecture and Organization', 1, '0231001', 1),
(19, 31, 'BCIS3301', 'Applied Network', 3, '0231008', 3),
(20, 31, 'BCIS1301', 'Lab. Applied Network', 3, '0231008', 1),
(21, 31, 'BCIS3302', 'Database Programming', 3, '0231006', 3),
(22, 31, 'BCIS1302', 'Lab. Database Programming', 3, '0231092', 1),
(23, 31, 'BCIS3303', 'Website Design', 3, '0231010', 3),
(24, 31, 'BCIS1303', 'Lab. Website Design', 3, '0231010', 1),
(25, 31, 'BCIS3304', 'Game Technology', 3, '0231007', 3),
(26, 31, 'BCIS1304', 'Lab. Game Technology', 3, '0231007', 1),
(27, 31, 'BCIS3305', 'Object Oriented Programming', 3, '0231002', 3),
(28, 31, 'BCIS1305', 'Lab. Object Oriented Programming', 3, '0231002', 1),
(29, 31, 'BCIS3401', 'Web Programming', 4, '0231010', 3),
(30, 31, 'BCIS14001', 'Lab. Web Programming', 4, '0231010', 1),
(31, 31, 'BCIS3402', 'Database Enterprise', 4, '0231005', 3),
(32, 31, 'BCIS1402', 'Lab. Database Enterprise', 4, '0231092', 1),
(33, 31, 'BCIS3403', 'Networking Enterprise', 4, '0231001', 3),
(34, 31, 'BCIS1403', 'Lab. Networking Enterprise', 4, '0231008', 3),
(35, 31, 'BCIS3404', 'Strategic Information System Planning', 4, '0231003', 3),
(36, 31, 'BCIS1404', 'Lab. Strategic Information System Planning', 4, '0231003', 1),
(37, 31, 'BCIS3405', 'Photography', 4, '0231004', 3),
(38, 31, 'BCIS1405', 'Lab. Photography', 4, '0231004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lecturer`
--

CREATE TABLE `tb_lecturer` (
  `id` int(11) NOT NULL,
  `lecturer_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `studyprogram_id` int(11) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lecturer`
--

INSERT INTO `tb_lecturer` (`id`, `lecturer_id`, `name`, `studyprogram_id`, `birth_place`, `birth_date`, `phone_num`, `gender`, `religion_id`, `status`) VALUES
(1, '0231001', 'Laura Brandimarte', 31, '', '', '', '', 0, 1),
(2, '0231002', 'Susan Brown', 31, '', '', '', '', 0, 1),
(3, '0231003', 'Judee Burgon', 31, '', '', '', '', 0, 1),
(4, '0231004', 'Michael Byrd', 31, '', '', '', '', 0, 1),
(5, '0231005', 'Hsinchun Chen', 31, '', '', '', '', 0, 1),
(6, '0231006', 'Wei Chen', 31, '', '', '', '', 0, 1),
(7, '0231092', 'Lin Xiao Ping', 31, 'Bogor', '12 October 1999', '08123123123123', 'Male', 1, 1),
(8, '0231010', 'Daniel Lim', 31, '', '', '', '', 0, 1),
(9, '0231007', 'Eve Cran', 31, '', '', '', '', 0, 1),
(10, '0231008', 'Faiz Currim', 31, '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mark`
--

CREATE TABLE `tb_mark` (
  `id` int(11) NOT NULL,
  `mark` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mark`
--

INSERT INTO `tb_mark` (`id`, `mark`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `category_id`, `title`, `content`, `create_at`, `create_by`) VALUES
(1, 1, 'Welcome to Black Currant Student Portal', 'BC University, merupakan salah satu universitas swasta yang berlokasi di Batam, Indonesia. Berawal dari sebuah institusi pelatihan komputer dan seni rupa , dan berkembang dan akhirnya berubah menjadi Universitas pada 18 April, BC University. Program kuliah, Fakultas dan program studi BC University: Fakultas Desain: Desain Komunikasi Visual. Sekolah Ilmu Komputer: Teknik Informatika dan Sistem Informasi.', '2019-04-28 15:00:58', 'BC University'),
(2, 1, 'BC University Information System 2nd Anniversary', 'Information System 2nd Anniversary, we will celebrate the event in Hall A, dont miss it!', '2019-04-28 15:03:39', 'BC University'),
(3, 1, 'BC University Officially Open 2 Study Program', 'BC University Officially Open 2 Study Program in Mei 2019: Information Technique and Visual Communication and Design', '2019-04-28 15:05:08', 'BC University'),
(4, 4, 'BC University Officially Open Student Activity : Chinese Club ', 'Chinese Club is First Student Activity in BC University that provide event, festival, knowledge sharing and activity about Chinese Culture and Language', '2019-04-28 15:08:26', 'BC University');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_category`
--

CREATE TABLE `tb_news_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_news_category`
--

INSERT INTO `tb_news_category` (`id`, `category_id`, `category`) VALUES
(1, 1, 'BC University'),
(2, 2, 'Achievement'),
(3, 3, 'Campus Event'),
(4, 4, 'Student Activity'),
(5, 5, 'Collaboration'),
(6, 6, 'Blog'),
(7, 7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tb_religion`
--

CREATE TABLE `tb_religion` (
  `id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `religion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_religion`
--

INSERT INTO `tb_religion` (`id`, `religion_id`, `religion`) VALUES
(1, 1, 'Buddha'),
(2, 2, ' Catholic'),
(3, 3, ' Christian'),
(4, 4, 'Islam'),
(5, 5, 'Kong Hu Chu'),
(6, 6, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_schedule`
--

CREATE TABLE `tb_schedule` (
  `s_id` int(11) NOT NULL,
  `schedule_id` varchar(15) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `room_name` varchar(10) NOT NULL,
  `time_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_schedule`
--

INSERT INTO `tb_schedule` (`s_id`, `schedule_id`, `class_name`, `course_id`, `room_name`, `time_id`) VALUES
(1, 'S31_1', '', 'BCIS1105', 'ISC01', 1),
(2, 'S31_2', '', 'BCIS3101', 'ISC01', 2),
(3, 'S31_3', '', 'BCIS3102', 'ISC01', 5),
(4, 'S31_4', '', 'BCIS3103', 'ISC01', 6),
(5, 'S31_5', '', 'BCIS3104', 'ISC01', 9),
(6, 'S31_6', '', 'BCIS1104', 'SDL2', 10),
(8, 'S31_7', '', 'BCIS1103', 'SDL1', 11),
(9, 'S31_8', '', 'BCIS1101	', 'SDL3', 12),
(10, 'S31_9', '', 'BCIS3202', 'ISC02', 1),
(11, 'S31_10', '', 'BCIS1204', 'ISC02', 2),
(12, 'S31_11', '', 'BCIS3203', 'ISC02', 5),
(14, 'S31_12', '', 'BCIS1203', 'SDL1', 6),
(15, 'S31_13', '', 'BCIS1202', 'ISC02', 9),
(17, 'S31_16', '', 'BCIS1201', 'SDL3', 11),
(18, 'S31_17', '', 'BCIS1203', 'SDL2', 12),
(19, 'S31_18', '', 'BCIS3201	', 'ISC02', 12),
(20, 'S31_19', '', 'BCIS3301', 'ISC03', 1),
(21, 'S31_20', '', 'BCIS1301', 'SDL3', 3),
(22, 'S31_21', '', 'BCIS3303', 'ISC03', 7),
(23, 'S31_22', '', 'BCIS1303', 'SDL1', 8),
(24, 'S31_23', '', 'BCIS3305', 'ISC03', 13),
(25, 'S31_24', '', 'BCIS1305', 'SDL1', 14),
(26, 'S31_25', '', 'BCIS3304', 'ISC03', 11),
(27, 'S31_26', '', 'BCIS1304', 'SDL2', 15),
(28, 'S31_27', '', 'BCIS3302', 'ISC03', 16),
(29, 'S31_28', '', 'BCIS1302', 'SDL1', 17),
(30, 'S31_28', '', 'BCIS3401', 'ISC04', 4),
(31, 'S31_29', '', 'BCIS14001', 'SDL1', 14),
(32, 'S31_30', '', 'BCIS3404', 'ISC04', 3),
(33, 'S31_31', '', 'BCIS1404', 'SDL1', 7),
(34, 'S31_32', '', 'BCIS3403', 'ISC04', 10),
(35, 'S31_33', '', 'BCIS1403', 'SDL3', 13),
(36, 'S31_34', '', 'BCIS3402', 'ISC04', 12),
(37, 'S31_35', '', 'BCIS1402', 'SDL1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id`, `semester_id`, `semester_name`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '3'),
(4, 4, '4'),
(5, 5, '5'),
(6, 6, '6'),
(7, 7, '7'),
(8, 8, '8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `studyprogram_id` int(11) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `religion_id` varchar(20) NOT NULL,
  `current_semester` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`id`, `student_id`, `name`, `studyprogram_id`, `birth_place`, `birth_date`, `phone_num`, `religion_id`, `current_semester`, `status`, `gender`) VALUES
(1, '1731001', 'Jimmy Chandra', 31, 'Test', '01 January 219', '0813777227727', '3', 4, 1, 'Male'),
(2, '1731092', 'Alvin Matthew Pratama', 31, 'Bogor', '12 October 1999', '0813777227721', '1', 4, 1, 'Male'),
(3, '1751001', 'Alvin Lim', 51, '', '', '', '', 4, 1, ''),
(4, '1741001', 'Michelle Angelia', 41, '', '', '', '', 4, 1, ''),
(5, '1731002', 'Bill Delvin', 31, '', '', '', '', 4, 1, ''),
(6, '1731003', 'Vincent Eng', 31, '', '', '', '', 4, 1, ''),
(7, '1731004', 'Derick', 31, '', '', '', '', 4, 1, ''),
(8, '1831001', 'Fiqih Yuandivo', 31, '', '', '', '', 2, 1, ''),
(9, '1831002', 'Erwan Anugrah', 31, '', '', '', '', 2, 1, ''),
(10, '1831003', 'Nurul Hassanah', 31, '', '', '', '', 2, 1, ''),
(11, '1831004', 'Erwin Kho', 31, '', '', '', '', 2, 1, ''),
(12, '1831005', 'Arif Kurniadi', 31, '', '', '', '', 2, 1, ''),
(14, '1831006', 'Cindy Adonia', 31, '', '', '', '', 3, 1, ''),
(15, '1831007', 'Edi Hendry', 31, '', '', '', '', 3, 1, ''),
(16, '1831008', 'Denny Alfath', 31, '', '', '', '', 3, 1, ''),
(17, '1831009', 'Rahmad Fadillah', 31, '', '', '', '', 3, 1, ''),
(18, '1831010', 'Tiffany', 31, '', '', '', '', 3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_courses`
--

CREATE TABLE `tb_student_courses` (
  `ss_id` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `schedule_id` varchar(15) NOT NULL,
  `takein_semester` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_student_courses`
--

INSERT INTO `tb_student_courses` (`ss_id`, `student_id`, `schedule_id`, `takein_semester`, `grade`) VALUES
(34, '1731001', 'S31_1', 1, 'B'),
(35, '1731001', 'S31_2', 1, 'B'),
(36, '1731001', 'S31_3', 1, 'B'),
(37, '1731001', 'S31_4', 1, 'B'),
(39, '1731001', 'S31_5', 1, 'B'),
(40, '1731001', 'S31_7', 1, 'A'),
(50, '1731092', 'S31_3', 1, 'A'),
(51, '1731092', 'S31_1', 1, 'A'),
(52, '1731092', 'S31_2', 1, 'A'),
(53, '1731092', 'S31_4', 1, 'A'),
(54, '1731092', 'S31_5', 1, 'A'),
(57, '1731092', 'S31_6', 1, 'A'),
(58, '1731092', 'S31_7', 1, 'A'),
(59, '1731092', 'S31_8', 1, 'A'),
(60, '1731092', 'S31_9', 2, 'A'),
(61, '1731092', 'S31_10', 2, 'A'),
(62, '1731092', 'S31_11', 2, 'A'),
(63, '1731092', 'S31_12', 2, 'A'),
(64, '1731092', 'S31_13', 2, 'A'),
(65, '1731092', 'S31_16', 2, 'A'),
(66, '1731092', 'S31_17', 2, 'A'),
(67, '1731092', 'S31_18', 2, 'A'),
(68, '1731092', 'S31_19', 3, 'A'),
(69, '1731092', 'S31_20', 3, 'A'),
(70, '1731092', 'S31_27', 3, 'A'),
(72, '1731092', 'S31_21', 3, 'A'),
(73, '1731092', 'S31_22', 3, 'A'),
(74, '1731092', 'S31_25', 3, 'A'),
(75, '1731092', 'S31_26', 3, 'A'),
(76, '1731092', 'S31_23', 3, 'A'),
(77, '1731092', 'S31_24', 3, 'A'),
(78, '1831001', 'S31_18', 2, ''),
(79, '1831001', 'S31_9', 2, ''),
(80, '1831001', 'S31_11', 2, ''),
(81, '1831001', 'S31_10', 2, ''),
(82, '1831001', 'S31_13', 2, ''),
(83, '1831001', 'S31_12', 2, 'C'),
(84, '1831001', 'S31_17', 2, ''),
(85, '1831001', 'S31_16', 2, ''),
(86, '1831002', 'S31_13', 2, ''),
(87, '1831004', 'S31_13', 2, ''),
(88, '1731092', 'S31_29', 4, ''),
(89, '1731092', 'S31_34', 4, ''),
(90, '1731092', 'S31_35', 4, ''),
(91, '1731092', 'S31_32', 4, ''),
(92, '1731092', 'S31_33', 4, ''),
(93, '1731092', 'S31_30', 4, ''),
(94, '1731092', 'S31_31', 4, ''),
(95, '1731001', 'S31_28', 4, ''),
(96, '1731001', 'S31_29', 4, ''),
(97, '1731001', 'S31_34', 4, ''),
(98, '1731001', 'S31_35', 4, ''),
(99, '1731001', 'S31_32', 4, ''),
(100, '1731001', 'S31_33', 4, ''),
(101, '1731001', 'S31_30', 4, ''),
(102, '1731001', 'S31_31', 4, ''),
(103, '1731002', 'S31_28', 4, ''),
(104, '1731002', 'S31_29', 4, ''),
(105, '1731002', 'S31_34', 4, ''),
(106, '1731002', 'S31_35', 4, ''),
(107, '1731002', 'S31_32', 4, ''),
(108, '1731002', 'S31_33', 4, ''),
(109, '1731002', 'S31_30', 4, ''),
(110, '1731002', 'S31_31', 4, ''),
(111, '1731003', 'S31_28', 4, ''),
(112, '1731003', 'S31_29', 4, ''),
(113, '1731003', 'S31_34', 4, ''),
(114, '1731003', 'S31_35', 4, ''),
(115, '1731003', 'S31_32', 4, ''),
(116, '1731003', 'S31_33', 4, ''),
(117, '1731003', 'S31_30', 4, ''),
(118, '1731003', 'S31_31', 4, ''),
(119, '1731004', 'S31_28', 4, ''),
(120, '1731004', 'S31_29', 4, ''),
(121, '1731004', 'S31_34', 4, ''),
(122, '1731004', 'S31_35', 4, ''),
(123, '1731004', 'S31_32', 4, ''),
(124, '1731004', 'S31_33', 4, ''),
(125, '1731004', 'S31_30', 4, ''),
(126, '1731004', 'S31_31', 4, ''),
(127, '1831003', 'S31_18', 2, ''),
(128, '1831003', 'S31_9', 2, ''),
(129, '1831003', 'S31_11', 2, ''),
(130, '1831003', 'S31_10', 2, ''),
(131, '1831003', 'S31_13', 2, ''),
(132, '1831003', 'S31_12', 2, ''),
(133, '1831003', 'S31_17', 2, ''),
(134, '1831003', 'S31_16', 2, ''),
(135, '1831006', 'S31_19', 3, ''),
(136, '1831006', 'S31_20', 3, ''),
(137, '1831006', 'S31_27', 3, ''),
(138, '1831006', 'S31_28', 3, ''),
(139, '1831006', 'S31_21', 3, ''),
(140, '1831006', 'S31_22', 3, ''),
(141, '1831006', 'S31_25', 3, ''),
(142, '1831006', 'S31_26', 3, ''),
(143, '1831006', 'S31_23', 3, ''),
(144, '1831006', 'S31_24', 3, ''),
(145, '1831007', 'S31_19', 3, ''),
(146, '1831007', 'S31_20', 3, ''),
(147, '1831007', 'S31_27', 3, ''),
(148, '1831007', 'S31_28', 3, ''),
(149, '1831007', 'S31_21', 3, ''),
(150, '1831007', 'S31_22', 3, ''),
(151, '1831007', 'S31_25', 3, ''),
(152, '1831007', 'S31_26', 3, ''),
(153, '1831007', 'S31_23', 3, ''),
(154, '1831007', 'S31_24', 3, ''),
(155, '1831008', 'S31_19', 3, ''),
(156, '1831008', 'S31_20', 3, ''),
(157, '1831008', 'S31_27', 3, ''),
(158, '1831008', 'S31_28', 3, ''),
(159, '1831008', 'S31_21', 3, ''),
(160, '1831008', 'S31_22', 3, ''),
(161, '1831008', 'S31_25', 3, ''),
(162, '1831008', 'S31_26', 3, ''),
(163, '1831008', 'S31_23', 3, ''),
(164, '1831008', 'S31_24', 3, ''),
(165, '1831009', 'S31_19', 3, ''),
(166, '1831009', 'S31_20', 3, ''),
(167, '1831009', 'S31_27', 3, ''),
(168, '1831009', 'S31_28', 3, ''),
(169, '1831009', 'S31_21', 3, ''),
(170, '1831009', 'S31_22', 3, ''),
(171, '1831009', 'S31_25', 3, ''),
(172, '1831009', 'S31_26', 3, ''),
(173, '1831009', 'S31_23', 3, ''),
(174, '1831009', 'S31_24', 3, ''),
(175, '1831010', 'S31_19', 3, ''),
(176, '1831010', 'S31_20', 3, ''),
(177, '1831010', 'S31_27', 3, ''),
(178, '1831010', 'S31_28', 3, ''),
(179, '1831010', 'S31_21', 3, ''),
(180, '1831010', 'S31_22', 3, ''),
(181, '1831010', 'S31_25', 3, ''),
(182, '1831010', 'S31_26', 3, ''),
(183, '1831010', 'S31_23', 3, ''),
(184, '1831010', 'S31_24', 3, ''),
(185, '1731092', 'S31_28', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_studyprogram`
--

CREATE TABLE `tb_studyprogram` (
  `id` int(11) NOT NULL,
  `studyprogram_id` int(11) NOT NULL,
  `studyprogram` varchar(255) NOT NULL,
  `abbreviation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_studyprogram`
--

INSERT INTO `tb_studyprogram` (`id`, `studyprogram_id`, `studyprogram`, `abbreviation`) VALUES
(1, 31, 'Information System', 'is'),
(2, 41, 'Information Technology', 'it'),
(3, 51, 'Visual Communication Design', 'vcd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_time`
--

CREATE TABLE `tb_time` (
  `time_id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_time`
--

INSERT INTO `tb_time` (`time_id`, `day`, `time`) VALUES
(1, 'Monday', '09:00-11:00'),
(2, 'Monday', '11:00-13:00'),
(3, 'Monday', '14:00-16:00'),
(4, 'Monday', '16:00-18:00'),
(5, 'Tuesday', '09:00-11:00'),
(6, 'Tuesday', '11:00-13:00'),
(7, 'Tuesday', '14:00-16:00'),
(8, 'Tuesday', '16:00-18:00'),
(9, 'Wednesday', '09:00-11:00'),
(10, 'Wednesday', '11:00-13:00'),
(11, 'Thursday', '09:00-11:00'),
(12, 'Thursday', '11:00-13:00'),
(13, 'Thursday', '14:00-16:00'),
(14, 'Thursday', '16:00-18:00'),
(15, 'Friday', '09:00-11:00'),
(16, 'Friday', '14:00-16:00'),
(17, 'Friday', '16:00-18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uni_profile`
--

CREATE TABLE `tb_uni_profile` (
  `id` int(11) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `since` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `vision` text NOT NULL,
  `mision` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_uni_profile`
--

INSERT INTO `tb_uni_profile` (`id`, `uni_id`, `uni_name`, `address`, `since`, `description`, `vision`, `mision`) VALUES
(1, 1, 'Black Currant University', 'Batam, Indonesia', '2019', 'BC University, merupakan salah satu universitas swasta yang berlokasi di Batam, Indonesia. Berawal dari sebuah institusi pelatihan komputer dan seni rupa , dan berkembang dan akhirnya berubah menjadi Universitas pada 18 April, BC University.\r\n\r\nProgram kuliah, Fakultas dan program studi BC University: Fakultas Desain: Desain Komunikasi Visual. Sekolah Ilmu Komputer: Teknik Informatika dan Sistem Informasi.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `salt`, `user_role`, `user_id`) VALUES
(0, 'admin', '257daf50221abd0bee91c9e572d09d5eff0e3bb11e4e0076f9e9e527b5237d39', 'µˆä0hçF=ÀgÚD’Õ¤¾Ž7¸ýÖuæÛCGîEî', 3, '0'),
(1, '1731001', 'c17a4357c1352fecde97e4be329ec49cbe60c8dbbd5963bc0335daadcf5d1bc2', 'ðWœ:GO¦ã]¡Ð§è8SF_£Nˆðr1àMÉËØ', 1, '1731001'),
(3, '1731092', '1de48f5442c9278a2d40d508b804d3bb3b4886bd21e6a437fc43ff854626ed94', 'ýæ\n\nÔÎP±Ðœ¿í€_k%Vßã»BS\"$è¨Å', 1, '1731092'),
(6, '0231001', '9ac0d595fe7bfd50eb34363943b73343c3168831ece91335eceec780bdd37ca7', '0C»¾*\nn öá„hA‚Wß	 —úÐ—¹½ÛÐD¦', 2, '0231001'),
(7, '0231002', '3ca0a2215f223e0c1b266d3a8b99f6bbca6b733ca3ed2712b267dade9f38dfc5', '¸ôŒŽrŠ2µ©;}µ8g`™v_ò^§á®òwÿI¸v', 2, '0231002'),
(8, '0231003', '32b229d730a428ed0a680f7c88208a03e201bbc94849f3f03aa2ce3968f6aaa3', '–Vºœ¼2\ZaäY]¢îõ!ý¤ã³\0Œ‹UßC`	™nä', 2, '0231003'),
(9, '0231004', 'fe8a36110c89f87b3ab2cb1fc703043bf86ea4c1940be63b6489769f8e81f629', 'ãÇå:pY›ü’oNmþ£²M~?î²W2aŒZHú6?', 2, '0231004'),
(10, '0231005', '1e8e03523ecc760fce43498c5d7e9e718ff4ddfe2777160b0be613758fea77ba', '„$Ø’?û?_€§ªÅÓÔ8ÎÎØÑBéphz', 2, '0231005'),
(11, '0231006', 'f24d8bb2c9698664c922afa6460619ed48337f9c8a66f7d320dfe813debd6866', 'Þ^[uTCß¬çè¶œaÛ}5_#	­ökˆèë–Ùü', 2, '0231006'),
(12, '0231092', '1742167f9afb5c562ca2ad174827425875593d32fd97dc28dcbf48bff6a33d56', '«ôþD]›˜ƒ‡ò´Ù	Šßž#Y|6¹Î%(ßu(1', 2, '0231092'),
(13, '1731002', '9e212f7045d649871b2b8ad992080a6582c81a52870bcdf4e01d3edfe12007e4', 'âÌ¸ƒDu0ÚÚC˜t@ÖM™C²ÏaÂi¦lJ¾gâ\"ž', 1, '1731002'),
(14, '0231010', 'bf326439907414ee8ff8bb0985c82840014394c5e6207a44764d8a3fa0cb3f2e', 'mqiÏ–º)±9h¼&\0*F…eXx£6Œ¤øo‹H¼', 2, '0231010'),
(15, '0231007', 'e8e1cf4bce0049b61c037a94599d117e1a59005c3bcf26b08f31d2320bd13dc0', 'Aóö ˜þçôŒ{­°­þtš{Cò!ÍÜ9ôÍÍ', 2, '0231007'),
(16, '0231008', '46a7450694ce6c9e5cc51f19f4d1526f05e3cb40aaf2ac03f738a9d507b2644d', 'Ï³ŽÝo¾_>7ÜmY–!5ù;à?™gPs3¢=ÞÓ', 2, '0231008'),
(17, '1731003', 'f6753e52645d9cf9a0da8a33779e9cde014c7fd588e5e3398209e05265021cec', 'pÍÁœÌ®ZƒæÅ†çÚ•RÕ7(\0¨u5[]@(wCIY%', 1, '1731003'),
(18, '1731004', 'f6db351eb40f09dad4b7a0de226be9f7ebe563ad3148df4536a9153fb4851496', '¾‘ÇÉv®Ù.ÖBÇ•þ9¹æ\Zˆü°Æ‹Ð)÷ô¦wË', 1, '1731004'),
(19, '1831001', '4d9fd00fe7e515e95273c5f8015e0e8d3795e8429f1cc1293fb937c0055a2ec9', 'ÅÜ‡—Ìâ&×PéUÒŸW5Ô™¥‰P·ˆÙ…0ËÐ ëê²', 1, '1831001'),
(20, '1831002', 'd6bcd52bd9e81ba6663174f05dc5e1d24d6219ecd575928be22fb10c2b6081e4', '7yô<b•uRbq÷ZÏjÕ¿\r®K,—O¥õXá©¨ú‹„s', 1, '1831002'),
(21, '1831004', 'fc12ab47eac1549a21d968468053e747887a4d52ecae542e98baf345f270a161', '´:ÔÈ°áRŒLZ5\Zûñ¹KhÝx­XP\rQÆƒ¦\0', 1, '1831004'),
(22, '1831003', '5e32d0cbd4e7423b2c930b816bdd626693ceba6498f9525f606764bb621de6f8', '‡Êú‡’k|nî™÷–£â)ê†‰ˆw¼þw[Ñv2Ïm', 1, '1831003'),
(23, '1831006', 'a0915534a3e956395fc7b0060af05f11a9388b9302f7bd2e5226b5c05f179f68', 'îÉ¦^BuuYsöÃ?`˜¡:<^ž±AV[œ-aq(½S', 1, '1831006'),
(24, '1831007', '9f0c4f0522ff7c62d7ab70b99d431ce94bea97472cca72f5e4ffc9830305923c', 'êˆš;¢k,˜Ï*È »8|\"®Ë» Yt[Z:û.ü', 1, '1831007'),
(25, '1831008', 'b95f7a8b81d39e4eb62fb8e9dcbdc4d0833182bc93e3999334a8614139384722', 'íüT“¯r‹£¹Ll…üV²½+´;‡î$$o™ô6²âçT\n', 1, '1831008'),
(26, '1831009', '0f935870d579ceca3777424b587597547f9f84b9961b6524dd40dda367b99f10', 'Ã—zPgùÍž•$)îm»C5Ù¾™ø÷Œ)…Ž_¬’tz', 1, '1831009'),
(27, '1831010', 'aafe48d96a46bf828749d550fc47f9069517297989b3c0d3a0ac3c49997a4c6c', '|Æ÷6QÕ!!^…éÌàïrêËWÚ3Ÿe«ÙgÆ', 1, '1831010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_courses`
--
ALTER TABLE `tb_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lecturer`
--
ALTER TABLE `tb_lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mark`
--
ALTER TABLE `tb_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news_category`
--
ALTER TABLE `tb_news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_religion`
--
ALTER TABLE `tb_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student_courses`
--
ALTER TABLE `tb_student_courses`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `tb_studyprogram`
--
ALTER TABLE `tb_studyprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_time`
--
ALTER TABLE `tb_time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `tb_uni_profile`
--
ALTER TABLE `tb_uni_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_courses`
--
ALTER TABLE `tb_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_lecturer`
--
ALTER TABLE `tb_lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_mark`
--
ALTER TABLE `tb_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_news_category`
--
ALTER TABLE `tb_news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_religion`
--
ALTER TABLE `tb_religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_student_courses`
--
ALTER TABLE `tb_student_courses`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tb_studyprogram`
--
ALTER TABLE `tb_studyprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_time`
--
ALTER TABLE `tb_time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_uni_profile`
--
ALTER TABLE `tb_uni_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
