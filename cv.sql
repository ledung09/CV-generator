-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 03:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `certificate_name` varchar(100) NOT NULL,
  `certifying_institution` varchar(100) NOT NULL,
  `certificate_date` year(4) NOT NULL,
  `certificate_link` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `cv_id`, `certificate_name`, `certifying_institution`, `certificate_date`, `certificate_link`, `user_id`) VALUES
(1, 12, 'test', 'test', '2002', 'https://www.google.com/search?q=bkel&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQoxNDY4MzZqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8', 11),
(2, 12, 'testthree', 'testthree', '2002', 'https://www.google.com/search?q=bkel&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQoxNDY4MzZqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8', 11),
(3, 12, 'testthreeneww', 'testthreeneww', '2002', 'https://www.google.com/search?q=bkel&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQoxNDY4MzZqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8', 11),
(4, 15, 'admin', 'admin', '2002', 'https://www.google.com/search?q=bkel&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQoxNDY4MzZqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8', 12),
(5, 15, 'adminonetow', 'adminonetow', '2002', 'https://www.google.com/search?q=bkel&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQRRg7GMIDMgkIBxBFGDsYwgPSAQoxNDY4MzZqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8', 12);

-- --------------------------------------------------------

--
-- Table structure for table `cv_management`
--

CREATE TABLE `cv_management` (
  `cv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cv_management`
--

INSERT INTO `cv_management` (`cv_id`, `user_id`, `created_date`, `updated_date`) VALUES
(1, 1, '2023-12-02 00:00:00', '2023-12-02 00:00:00'),
(2, 1, '2023-12-01 00:00:00', '2023-12-02 00:00:00'),
(3, 2, '2023-11-01 00:00:00', '2023-12-02 00:00:00'),
(4, 2, '2023-11-15 00:00:00', '2023-12-02 00:00:00'),
(5, 2, '2023-12-03 00:00:00', '2023-12-02 00:00:00'),
(6, 5, '2023-11-20 00:00:00', '2023-12-02 00:00:00'),
(7, 7, '2023-11-21 00:00:00', '2023-12-02 00:00:00'),
(8, 8, '2023-11-05 00:00:00', '2023-12-02 00:00:00'),
(9, 9, '2023-12-01 00:00:00', '2023-12-02 00:00:00'),
(10, 9, '2023-12-01 00:00:00', '2023-12-02 00:00:00'),
(11, 10, '2023-12-01 00:00:00', '2023-12-02 00:00:00'),
(12, 11, '2023-12-04 08:33:39', '2023-12-04 08:33:39'),
(13, 11, '2023-12-04 08:41:50', '2023-12-04 08:41:50'),
(14, 11, '2023-12-04 08:49:24', '2023-12-04 08:49:24'),
(15, 12, '2023-12-04 08:55:47', '2023-12-04 08:55:47'),
(16, 12, '2023-12-04 09:11:56', '2023-12-04 09:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `edu_des` varchar(100) NOT NULL,
  `institution_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `cv_id`, `edu_des`, `institution_name`, `start_date`, `end_date`, `user_id`) VALUES
(1, 1, 'Bachelor of Computer Science', 'Ho Chi Minh University of Technology', '2019-09-20', '2024-11-20', 1),
(2, 3, 'Bachelor of Computer Science', 'Ho Chi Minh University of Technology', '1995-05-21', '1999-05-01', 2),
(3, 5, 'Bachelor of Economics', 'Stanford University', '1999-04-21', '2003-10-01', 5),
(4, 6, 'Bachelor of Chemistry Engineering', 'Sydney University', '1980-05-12', '1984-09-06', 5),
(5, 7, 'Bachelor of Computer Engineering', 'Ho Chi Minh University of Technology', '2005-05-21', '2009-05-01', 8),
(6, 8, 'Bachelor of Business Administration', 'Oxford University', '1985-05-21', '1989-05-01', 9),
(7, 9, 'Bachelor of Economics', 'Havard University', '1995-05-21', '1999-05-01', 10),
(8, 11, 'Bachelor of Construction Engineering', 'Ho Chi Minh University of Technology', '1995-05-21', '1999-05-01', 10),
(9, 12, 'test', 'test', '2023-11-27', '2023-12-02', NULL),
(10, 12, 'testthree', 'testthree', '2023-11-28', '2023-12-02', NULL),
(11, 12, 'testthreeneww', 'testthreeneww', '2023-11-27', '2023-12-02', NULL),
(12, 15, 'admin', 'admin', '2023-11-27', '2023-12-02', NULL),
(13, 15, 'adminonetow', 'adminonetow', '2023-11-28', '2023-12-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `cv_id`, `email_address`, `user_id`) VALUES
(1, 1, 'vomanhcuongadv25@gmail.com', 1),
(2, 1, 'cuong.vo_cris25@hcmut.edu.vn', 1),
(3, 12, 'robotanh15@gmail.com', 11),
(4, 12, 'robotanh15@gmail.com', 11),
(5, 12, 'robotanh15@gmail.com', 11),
(6, 15, 'robotanh15@gmail.com', 12),
(7, 15, 'robotanh15@gmail.com', 12);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `job_title` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `cv_id`, `company_name`, `job_title`, `start_date`, `end_date`, `user_id`) VALUES
(1, 1, 'Lotus Vietnam', 'Developer Intern', '2023-06-01', '2023-08-31', NULL),
(2, 12, 'test', 'test', '2023-11-27', '2023-12-02', 11),
(3, 12, 'testthree', 'testthree', '2023-11-28', '2023-12-02', 11),
(4, 12, 'testthreeneww', 'testthreeneww', '2023-11-29', '2023-12-02', 11),
(5, 15, 'adminone', 'adminone', '2023-11-27', '2023-12-02', 12),
(6, 15, 'adminonetow', 'adminonetow', '2023-11-26', '2023-12-02', 12);

-- --------------------------------------------------------

--
-- Table structure for table `experience_description`
--

CREATE TABLE `experience_description` (
  `description_id` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experience_description`
--

INSERT INTO `experience_description` (`description_id`, `experience_id`, `description`) VALUES
(1, 1, 'Design and develop a smart agricultural cabinet system, while integrating artificial intelligence in scheduling irrigation for each type of crop and detecting plant condition through images of leaves.'),
(2, 1, 'Apply Python to control water valve on/off relays and sensors in the cabinet system.'),
(3, 2, 'Array'),
(4, 2, 'Array'),
(5, 2, 'Array'),
(6, 5, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `phone_number`
--

CREATE TABLE `phone_number` (
  `phone_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phone_number`
--

INSERT INTO `phone_number` (`phone_id`, `cv_id`, `phone_number`, `user_id`) VALUES
(1, 1, '0946805819', 1),
(2, 12, '0868990502', 11),
(3, 12, '0868990502', 11),
(4, 12, '0868990502', 11),
(5, 15, '0868990502', 12),
(6, 15, '0868990502', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pinfo`
--

CREATE TABLE `pinfo` (
  `applicant_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `professional_title` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `profile_pic` longblob NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pinfo`
--

INSERT INTO `pinfo` (`applicant_id`, `cv_id`, `fullname`, `professional_title`, `country`, `city`, `address`, `profile_pic`, `user_id`) VALUES
(1, 1, 'Vo Manh Cuong', '', 'Vietnam', 'Hồ Chí Minh', 'Vo Nguyen Giap street', 0x494d475f32303232313032335f3130313335322e6a7067, 1),
(2, 3, 'Alice Rose', 'PhD', 'Germany', 'Berlin', '255', '', 2),
(3, 6, 'Amit Smith', 'M.S', 'Canada', 'Toronto', '1023', '', 5),
(4, 7, 'David Carr', 'B.Sc', 'America', 'New York', '14', '', 7),
(5, 8, 'Ram Candy', 'MBA', 'America', 'Ohio', '356', '', 8),
(6, 9, 'Tim Phillip', 'BCA', 'America', 'California', '223', '', 9),
(7, 11, 'Chen Long', 'BBA', 'Singapore', 'Singapore', '5 Green Hills', '', 10),
(8, 12, 'testthree', 'testthree', 'Vietnam', 'Hồ Chí Minh', 'testthree', 0x32353632643161652d346331302d343266302d393664352d6635663063306138616430622e706e67, 11),
(9, 12, 'testthreeneww', 'testthreeneww', 'Vietnam', 'Hồ Chí Minh', 'testthreeneww', 0x32353632643161652d346331302d343266302d393664352d6635663063306138616430622e706e67, 11),
(10, 15, 'adminone', 'adminone', 'Vietnam', 'Hồ Chí Minh', 'admin', 0x32353632643161652d346331302d343266302d393664352d6635663063306138616430622e706e67, 12),
(11, 15, 'adminonetow', 'adminonetow', 'Vietnam', 'Hồ Chí Minh', 'adminonetow', 0x32353632643161652d346331302d343266302d393664352d6635663063306138616430622e706e67, 12);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_year` varchar(4) NOT NULL,
  `description` varchar(250) NOT NULL,
  `project_link` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `cv_id`, `project_name`, `project_year`, `description`, `project_link`, `user_id`) VALUES
(1, 1, 'Urban Waste Collector 2.0', '2021', '', 'https://github.com/UrbanWasteCollectorVer2/SE_Project', 1),
(2, 1, 'Smart Agriculture IOT', '2023', '', 'https://github.com/truongtran19315/Smart-agricultural-IoT-HTC_HK223', 1),
(3, 1, 'test', '2002', 'test', 'https://meet.google.com/sva-czts-rie?fbclid=IwAR3-feS2-sbsLbQnK8dUYbDN-WV84rIFCeWYEaU5jWUQOIW36I246zZqdgY', 1),
(4, 1, 'testthree', '2002', 'testthree', 'https://meet.google.com/sva-czts-rie?fbclid=IwAR3-feS2-sbsLbQnK8dUYbDN-WV84rIFCeWYEaU5jWUQOIW36I246zZqdgY', 1),
(5, 1, 'testthreeneww', '2002', 'testthreeneww', 'https://meet.google.com/sva-czts-rie?fbclid=IwAR3-feS2-sbsLbQnK8dUYbDN-WV84rIFCeWYEaU5jWUQOIW36I246zZqdgY', 1),
(6, 1, 'admin', '2002', 'admin', 'https://meet.google.com/sva-czts-rie?fbclid=IwAR3-feS2-sbsLbQnK8dUYbDN-WV84rIFCeWYEaU5jWUQOIW36I246zZqdgY', 1),
(7, 1, 'adminonetow', '2002', 'adminonetow', 'https://meet.google.com/sva-czts-rie?fbclid=IwAR3-feS2-sbsLbQnK8dUYbDN-WV84rIFCeWYEaU5jWUQOIW36I246zZqdgY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `reference_name` varchar(100) NOT NULL,
  `institution_name` varchar(50) NOT NULL,
  `ref_email` varchar(255) NOT NULL,
  `ref_phone` varchar(20) NOT NULL,
  `ref_relation` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`reference_id`, `cv_id`, `reference_name`, `institution_name`, `ref_email`, `ref_phone`, `ref_relation`, `user_id`) VALUES
(1, 1, 'test', 'test', 'robotanh15@gmail.com', '0868990502', 'test', 1),
(2, 1, 'test', 'test', 'robotanh15@gmail.com', '0868990502', 'test', 1),
(3, 1, 'testthree', 'testthree', 'robotanh15@gmail.com', '0868990502', 'testthree', 1),
(4, 1, 'testthree', 'testthree', 'robotanh15@gmail.com', '0868990502', 'testthree', 1),
(5, 1, 'testthreeneww', 'testthreeneww', 'robotanh15@gmail.com', '0868990502', 'testthreeneww', 1),
(6, 1, 'testthreeneww', 'testthreeneww', 'robotanh15@gmail.com', '0868990502', 'testthreeneww', 1),
(7, 1, 'admin', 'admin', 'robotanh15@gmail.com', '0868990502', 'admin', 1),
(8, 1, 'admin', 'admin', 'robotanh15@gmail.com', '0868990502', 'admin', 1),
(9, 1, 'adminonetow', 'adminonetow', 'robotanh15@gmail.comeee', '086899050222', 'adminonetow', 1),
(10, 1, 'adminonetow', 'adminonetow', 'robotanh15@gmail.comeee', '086899050222', 'adminonetow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `skill_type` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_id`, `cv_id`, `skill_type`, `user_id`) VALUES
(1, 1, 'Coding', 1),
(2, 1, 'Technology', 1),
(3, 12, 'testnew', 11),
(4, 12, 'testthreenew', 11),
(5, 15, 'adminone', 12);

-- --------------------------------------------------------

--
-- Table structure for table `skillname`
--

CREATE TABLE `skillname` (
  `skillname_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skillname`
--

INSERT INTO `skillname` (`skillname_id`, `skill_id`, `skill_name`) VALUES
(1, 1, 'Python'),
(2, 1, 'C++'),
(3, 1, 'Java'),
(4, 3, 'testnew'),
(5, 4, 'testthreenew'),
(6, 5, 'adminone');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia_link`
--

CREATE TABLE `socialmedia_link` (
  `socialmedia_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `socialmedia_name` varchar(100) NOT NULL,
  `socialmedia_link` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `socialmedia_link`
--

INSERT INTO `socialmedia_link` (`socialmedia_id`, `cv_id`, `socialmedia_name`, `socialmedia_link`, `user_id`) VALUES
(1, 1, 'Facebook\r\n', 'https://www.facebook.com/criscuong.2503', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'cris', 'cris123'),
(2, 'amit', 'amit123'),
(3, 'ram', 'ram123'),
(4, 'alice', 'alice123'),
(5, 'alia', 'alia123'),
(6, 'david', 'david123'),
(7, 'fennik', 'fennik123'),
(8, 'sonic', 'sonic123'),
(9, 'thor', 'thor123'),
(10, 'captain', 'captain123'),
(11, 'test', '$2y$10$D2k9aSaAiO02/NkN4FLwI.fwR/XdjbR2VZM4JDkN7IvwcBea0Ee8a'),
(12, 'admin', '$2y$10$YEwKvSYp06OuW2FVQ3D5P.JNz.v67T5XF7ioDhvPp12ngAJ5ccdeC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cv_management`
--
ALTER TABLE `cv_management`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `cv_id` (`cv_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user3_id` (`user_id`);

--
-- Indexes for table `experience_description`
--
ALTER TABLE `experience_description`
  ADD PRIMARY KEY (`description_id`),
  ADD KEY `experience_id` (`experience_id`);

--
-- Indexes for table `phone_number`
--
ALTER TABLE `phone_number`
  ADD PRIMARY KEY (`phone_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pinfo`
--
ALTER TABLE `pinfo`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skillname`
--
ALTER TABLE `skillname`
  ADD PRIMARY KEY (`skillname_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `socialmedia_link`
--
ALTER TABLE `socialmedia_link`
  ADD PRIMARY KEY (`socialmedia_id`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cv_management`
--
ALTER TABLE `cv_management`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `experience_description`
--
ALTER TABLE `experience_description`
  MODIFY `description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phone_number`
--
ALTER TABLE `phone_number`
  MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pinfo`
--
ALTER TABLE `pinfo`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skillname`
--
ALTER TABLE `skillname`
  MODIFY `skillname_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socialmedia_link`
--
ALTER TABLE `socialmedia_link`
  MODIFY `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `cv_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `cv_management`
--
ALTER TABLE `cv_management`
  ADD CONSTRAINT `cv_management_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `cv2_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user1_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `fkcv_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user2_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `cv1_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user3_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `experience_description`
--
ALTER TABLE `experience_description`
  ADD CONSTRAINT `experience_description_ibfk_1` FOREIGN KEY (`experience_id`) REFERENCES `experience` (`experience_id`);

--
-- Constraints for table `phone_number`
--
ALTER TABLE `phone_number`
  ADD CONSTRAINT `cv3_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user4_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pinfo`
--
ALTER TABLE `pinfo`
  ADD CONSTRAINT `cv4_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user5_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `cv5_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user6_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `cv6_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user7_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `cv7_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user8_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `skillname`
--
ALTER TABLE `skillname`
  ADD CONSTRAINT `skillname_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`);

--
-- Constraints for table `socialmedia_link`
--
ALTER TABLE `socialmedia_link`
  ADD CONSTRAINT `cv8_id` FOREIGN KEY (`cv_id`) REFERENCES `cv_management` (`cv_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user9_id` FOREIGN KEY (`user_id`) REFERENCES `cv_management` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
