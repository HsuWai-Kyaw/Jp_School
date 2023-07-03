-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 09:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `associated`
--

CREATE TABLE `associated` (
  `associated_id` int(11) NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_s_date` date NOT NULL,
  `education_e_date` date NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialize_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_s_date_2` date DEFAULT NULL,
  `education_e_date_2` date DEFAULT NULL,
  `school_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialize_subject_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_s_date` date NOT NULL,
  `job_e_date` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type_and_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` int(11) NOT NULL,
  `job_s_date_2` date DEFAULT NULL,
  `job_e_date_2` date DEFAULT NULL,
  `company_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type_and_position_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_2` int(11) DEFAULT NULL,
  `family_member` int(11) NOT NULL,
  `family_member_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_member_age` int(11) NOT NULL,
  `family_member_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `living` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_member_2` int(11) DEFAULT NULL,
  `family_member_type_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member_age_2` int(11) DEFAULT NULL,
  `family_member_job_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member_3` int(11) DEFAULT NULL,
  `family_member_type_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member_age_3` int(11) DEFAULT NULL,
  `family_member_job_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_3` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jp_family_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associated`
--

INSERT INTO `associated` (`associated_id`, `student_id`, `education_s_date`, `education_e_date`, `school_name`, `specialize_subject`, `skills`, `education_s_date_2`, `education_e_date_2`, `school_name_2`, `specialize_subject_2`, `skills_2`, `job_s_date`, `job_e_date`, `company_name`, `job_type_and_position`, `income`, `job_s_date_2`, `job_e_date_2`, `company_name_2`, `job_type_and_position_2`, `income_2`, `family_member`, `family_member_type`, `family_member_age`, `family_member_job`, `living`, `family_member_2`, `family_member_type_2`, `family_member_age_2`, `family_member_job_2`, `living_2`, `family_member_3`, `family_member_type_3`, `family_member_age_3`, `family_member_job_3`, `living_3`, `relative`, `jp_family_member`, `accept`) VALUES
(1, 'S001', '2023-07-04', '2023-07-04', '-------', '-------------', '----', '0000-00-00', '0000-00-00', '', '', '', '2023-07-04', 2023, 'None', '-', 15, '2023-07-04', '2023-07-02', 'None', '-', 16, 0, 'a', 41, 'q', 'stay_apart', 0, '', 0, '', NULL, 0, '', 0, '', NULL, '有', '', '賛成');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district`) VALUES
(1, '1/'),
(2, '2/'),
(3, '3/'),
(4, '4/'),
(5, '5/'),
(6, '6/'),
(7, '7/'),
(8, '8/'),
(9, '9/'),
(10, '10/'),
(11, '11/'),
(12, '12/');

-- --------------------------------------------------------

--
-- Table structure for table `nrc`
--

CREATE TABLE `nrc` (
  `nrc_id` int(11) NOT NULL,
  `nrc_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `nrc_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nrc`
--

INSERT INTO `nrc` (`nrc_id`, `nrc_type`, `state_id`, `nrc_no`) VALUES
(1, '(N)', 1, 111111);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `district_id`) VALUES
(1, 'BaPaNa', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kana_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jp_lan_skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `marriage` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eye_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_blind` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hand` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cook` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tattoo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smoke` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drunk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamwork` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_income` int(11) NOT NULL,
  `type_of_visa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `planning_money` int(11) NOT NULL,
  `myanmar_job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_visa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `photo`, `name`, `kana_name`, `gender`, `dob`, `age`, `country`, `religion`, `nrc_id`, `passport`, `address`, `per_address`, `tel`, `start_date`, `jp_lan_skill`, `height`, `weight`, `marriage`, `blood_type`, `eye_test`, `color_blind`, `hand`, `cook`, `disease`, `tattoo`, `smoke`, `drunk`, `languages`, `certificate`, `objective`, `teamwork`, `family_income`, `type_of_visa`, `planning_money`, `myanmar_job`, `form`, `old_visa`) VALUES
(1, 'S001', 'c9.jpg', 'Test', 'Jaime Garza', '男', '1987-02-06', 39, 'Libero sit eaque re', 'Quis nobis provident', '1', 'Odio iste et atque i', 'Eius ea esse ducimu', 'Est voluptatibus ex ', '+1 (838) 356-1706', '1974-02-27 17:30:00', 'Culpa ipsum optio ', 55, 41, '無し', 'Et et laudantium ev', 'Blanditiis voluptati', '有', '左', '無し', '有', '無し', '有', '有', 'Laborum Occaecat eo', 'Sequi excepturi ad d', 'Quia sunt provident', '無し', 223, 'Et in voluptas dolor', 9, 'Blanditiis harum pra', '有', 'Ullamco natus expedi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associated`
--
ALTER TABLE `associated`
  ADD PRIMARY KEY (`associated_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `nrc`
--
ALTER TABLE `nrc`
  ADD PRIMARY KEY (`nrc_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associated`
--
ALTER TABLE `associated`
  MODIFY `associated_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nrc`
--
ALTER TABLE `nrc`
  MODIFY `nrc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
