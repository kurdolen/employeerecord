-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 01:31 PM
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
-- Database: `employee_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_image`
--

CREATE TABLE `employee_image` (
  `id` int(11) DEFAULT NULL,
  `filename` text NOT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_image`
--

INSERT INTO `employee_image` (`id`, `filename`, `uploaded_at`) VALUES
(NULL, 'uploads/lebron__css_name_688832602a911.jpg', '2025-07-29 10:30:56'),
(0, 'uploads/lebron__css_name_6888336da98e7.jpg', '2025-07-29 10:35:25'),
(996, 'uploads/john_wick_688833aa20a3e.jpg', '2025-07-29 10:36:26'),
(14, 'uploads/Andrei_T__Asuncion_68897efa8ae93.jpg', '2025-07-30 10:10:02'),
(15, 'uploads/Andrei_T__Asuncion_68897f53a130f.jpg', '2025-07-30 10:11:31'),
(16, 'uploads/Andrei_T__Asuncion_68897f59c891e.jpg', '2025-07-30 10:11:37'),
(17, 'uploads/Andrei_T__Asuncion_68897f5ef3bde.jpg', '2025-07-30 10:11:43'),
(18, 'uploads/Andrei_T__Asuncion_6889841db886a.jpg', '2025-07-30 10:31:57'),
(19, 'uploads/Andrei_T__Asuncion_68898437abe90.jpg', '2025-07-30 10:32:23'),
(20, 'uploads/Andrei_T__Asuncion_688e48d60d73a.jpg', '2025-07-30 10:34:50'),
(0, 'uploads/test_688c6a7168be5.png', '2025-08-01 15:19:13'),
(25, 'uploads/test_Efren__688c6ef49fe23.jpg', '2025-08-01 15:34:26'),
(26, 'img/default_profile.jpg', '2025-08-01 16:39:30'),
(27, 'uploads/BANZUELA__LEMUEL_N__688f46fa639b8.jpg', '2025-08-01 16:41:28'),
(28, 'img/default_profile.jpg', '2025-08-02 21:14:20'),
(29, 'img/default_profile.jpg', '2025-08-02 21:18:46'),
(30, 'img/default_profile.jpg', '2025-08-02 21:19:08'),
(31, 'img/default_profile.jpg', '2025-08-02 21:20:35'),
(32, 'img/default_profile.jpg', '2025-08-02 21:23:04'),
(33, 'img/default_profile.jpg', '2025-08-02 21:24:17'),
(34, 'img/default_profile.jpg', '2025-08-02 21:26:06'),
(35, 'img/default_profile.jpg', '2025-08-02 21:27:33'),
(36, 'img/default_profile.jpg', '2025-08-02 21:27:54'),
(37, 'img/default_profile.jpg', '2025-08-02 21:28:59'),
(38, 'img/default_profile.jpg', '2025-08-02 21:32:23'),
(39, 'img/default_profile.jpg', '2025-08-02 21:52:21'),
(40, 'img/default_profile.jpg', '2025-08-02 21:59:52'),
(41, 'img/default_profile.jpg', '2025-08-02 22:01:13'),
(42, 'img/default_profile.jpg', '2025-08-02 22:47:12'),
(43, 'uploads/JIT__RAN_688e4a8aac105.jpeg', '2025-08-03 01:25:04'),
(44, 'img/default_profile.jpg', '2025-08-03 01:30:52'),
(45, 'uploads/REYES__EFREN__BATA__688e4c2e534e6.jpg', '2025-08-03 01:34:38'),
(46, 'uploads/DRILON__BUGOY_688e4cbc5a2cf.png', '2025-08-03 01:37:00'),
(47, 'uploads/ROMBLON__JAMES_688f424bd5cf6.jpg', '2025-08-03 01:40:32'),
(48, 'uploads/STARK__TONY_688f415467bc6.jpg', '2025-08-03 18:58:54'),
(49, 'uploads/SQUAREPANTS__SPONGEBOB_688f44c3d1479.jpg', '2025-08-03 19:15:15'),
(50, 'uploads/GAUDIEL__MARC_688f46dd8f397.jpg', '2025-08-03 19:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `performance_rating`
--

CREATE TABLE `performance_rating` (
  `id` int(11) DEFAULT NULL,
  `rating` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `_year` int(11) DEFAULT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance_rating`
--

INSERT INTO `performance_rating` (`id`, `rating`, `duration`, `_year`, `rating_id`) VALUES
(11, '3.9', 'January to June', 2023, 1),
(11, '4.2', 'July to December', 2022, 2),
(14, '1.75', 'July to December', 2022, 3),
(14, '2.07', 'January to June', 2025, 4),
(15, '1.75', 'July to December', 2022, 5),
(16, '1.75', 'July to December', 2022, 6),
(17, '1.75', 'July to December', 2022, 7),
(18, '1.75', 'July to December', 2022, 8),
(18, '2.07', 'January to June', 2025, 9),
(24, 'rating1', 'January to June', 2020, 12),
(24, 'rating2', 'January to June', 2021, 13),
(0, 'rating1', 'January to June', 2020, 14),
(0, 'rating2', 'January to June', 2021, 15),
(42, '4.6', 'January to June', 2020, 16),
(42, '3.8', 'July to December', 2021, 17),
(41, '232', 'January to June', 512, 21),
(41, '6510', 'January to June', 2023, 23),
(20, '1.75', 'January to June', 2023, 24),
(20, '1.68', 'January to June', 2024, 25),
(20, '1.98', 'July to December', 2024, 26),
(20, '2.01', 'January to June', 2025, 27),
(43, '2.2', 'July to December', 2024, 28),
(43, '2.0', 'July to December', 2021, 29),
(45, '2.6', 'January to June', 54, 30),
(46, '4.8', 'July to December', 2019, 31),
(47, '4.2', 'January to June', 2018, 32),
(47, '3.9', 'July to December', 2023, 33),
(48, '4.8', 'July to December', 2005, 35),
(48, '4.7', 'July to December', 2006, 36),
(48, '4.6', 'January to June', 2009, 37),
(49, '4.5', 'July to December', 2011, 39),
(49, '4.8', 'January to June', 2013, 40),
(49, '4.2', 'January to June', 2015, 41),
(27, '3.7', 'July to December', 2023, 42),
(27, '3.8', 'January to June', 2023, 43);

-- --------------------------------------------------------

--
-- Table structure for table `personal_record`
--

CREATE TABLE `personal_record` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `civil_status` varchar(50) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `date_of_appointment` date DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `employment_status` varchar(50) DEFAULT NULL,
  `eligibility` text DEFAULT NULL,
  `tin` varchar(255) DEFAULT NULL,
  `philhealth` varchar(255) DEFAULT NULL,
  `pagibig` varchar(255) DEFAULT NULL,
  `gsis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_record`
--

INSERT INTO `personal_record` (`id`, `name`, `address`, `date_of_birth`, `civil_status`, `contact`, `email`, `position`, `date_of_appointment`, `salary`, `office`, `employment_status`, `eligibility`, `tin`, `philhealth`, `pagibig`, `gsis`) VALUES
(20, 'CAPY, BARA', 'San Marcos, Calumpit, Bulacan', '2001-03-11', 'Single', '09195205492', 'andreiasuncion@email.com', 'Software Engineer', '2025-06-16', '21,362.09', 'Information Office', 'Casual', 'Career Service Professional', '001', '002', '003', '004'),
(27, 'BANZUELA, LEMUEL N.', 'Sta. Barbara, Baliuag, Bulacan', '0000-00-00', 'Single', '090996465065', 'lemuelnibanzuela@yahoo.com', 'Duelist', '3333-11-22', '24,654.63', 'MENRO', 'Casual', 'Career Service Professional', '1650-651-5165', '156-6565-151', '5165-54', '6546-6121-545'),
(43, 'JIT, RAN', 'Sto. Niño, Calumpit, Bulacan', '2001-12-31', 'Divorced', '0922364512', 'ranjit@email.com', 'OJT', '2025-06-16', '0.00', 'Information Office', 'JO', 'None required', 'NA', 'NA', 'NA', 'NA'),
(46, 'DRILON, BUGOY', 'Manila, Philippines', '1992-12-05', 'Single', '16005916', 'drilonbugoy@gmail.com', 'Singer', '2018-06-05', '55,622.31', 'MO', 'Casual', 'Professional Singer', '151510', '945111', '65454', '64'),
(47, 'ROMBLON, JAMES', 'LA, California USA', '1980-01-15', 'Married', '14890', 'lbj@yahoo.com', 'Small Forward', '2003-01-31', '50,516,511.00', 'LA Lakers', 'Regular', 'Fake goat', '016515', '6510894', '65165', '65165'),
(48, 'STARK, TONY', 'New York, USA', '1975-12-05', 'Married', '044-5156-622', 'tonystark3000@gmail.com', 'Engineer', '2013-02-24', '89,541.00', 'Engineering Office', 'Regular', 'Licensed Engineer', '6515-6514-651', '54-3155-54', '652-1589-665', '515-6212-517'),
(49, 'SQUAREPANTS, SPONGEBOB', 'Bikini Bottom', '2006-01-05', 'Single', '044-1236-510', 'contact.squarepants@yahoo.com', 'Cook III', '2015-05-16', '23,251.00', 'GSO', 'JO', 'None Required', '945-5489-515', '565-5426-510', '5488-230', '126-6516-623'),
(50, 'GAUDIEL, MARC', 'Sta. Maria, Bulacan', '2002-08-23', 'Single', '0941502654', 'gaudiel@gmail.com', 'OJT', '2025-06-16', '0.00', 'MCR', 'JO', 'None Required', '03165151', '00215156126', '051581016546', '5516541651');

-- --------------------------------------------------------

--
-- Table structure for table `service_record`
--

CREATE TABLE `service_record` (
  `id` int(11) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `service_start` date NOT NULL,
  `service_end` date DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_record`
--

INSERT INTO `service_record` (`id`, `position`, `service_start`, `service_end`, `service_id`) VALUES
(8, 'PG', '2009-01-31', '2023-01-31', 1),
(8, 'SG', '2023-01-31', '2025-01-31', 2),
(9, 'koajsdona', '5120-05-04', '0132-03-21', 3),
(10, 'koajsdona', '5120-05-04', '0132-03-21', 4),
(11, 'Tanker', '0000-00-00', '6551-01-22', 5),
(12, 'PG', '2019-11-06', '5125-03-06', 6),
(14, 'First to Second Year', '2022-01-31', '2024-01-31', 7),
(14, 'Third Year', '2024-01-31', '2025-01-31', 8),
(15, 'First to Second Year', '2022-01-31', '2024-01-31', 9),
(16, 'First to Second Year', '2022-01-31', '2024-01-31', 10),
(17, 'First to Second Year', '2022-01-31', '2024-01-31', 11),
(18, 'First to Second Year', '2022-01-31', '2024-01-31', 12),
(18, 'third year', '2024-01-31', '2025-01-31', 13),
(19, 'First to Second Year', '2022-01-31', '2024-01-31', 14),
(23, '51sadkkj', '2032-01-31', '0000-00-00', 17),
(0, '51sadkkj', '2032-01-31', '0000-00-00', 18),
(24, 'service1', '2020-01-02', '2021-01-02', 19),
(24, 'service2', '2021-01-02', '2022-01-02', 20),
(0, 'service1', '2020-01-02', '2021-01-02', 21),
(0, 'service2', '2021-01-02', '2022-01-02', 22),
(0, 'service3', '2022-01-02', '2023-01-02', 23),
(41, 'Sentinel', '2015-01-31', '2018-01-31', 29),
(41, 'Initiator', '2018-01-31', '2020-01-31', 30),
(41, 'Flex', '2000-01-31', '1220-01-31', 31),
(20, 'First year', '2022-01-31', '2023-01-31', 32),
(20, 'Second year', '2023-01-31', '2024-01-31', 33),
(20, 'Third year', '2024-01-31', '2025-01-31', 34),
(43, 'Carry', '0320-03-21', '0001-05-10', 35),
(43, 'Midlane', '0051-06-05', '5101-12-03', 36),
(45, 'ihjiuafdn', '0005-05-04', '1651-06-05', 37),
(45, '11521sa', '0011-06-05', '0054-12-04', 38),
(46, 'Singer', '0320-05-04', '0003-12-12', 39),
(47, 'SF', '2003-01-31', '2020-01-31', 40),
(47, 'PG/SF', '2020-01-31', '2024-01-31', 41),
(47, 'SF', '2024-01-31', '2025-01-31', 42),
(48, 'Engineer I', '2002-01-31', '2004-11-05', 43),
(48, 'Engineer II', '2005-01-21', '2008-02-01', 44),
(48, 'Engineer III', '2008-03-20', '2018-02-10', 45),
(49, 'Cook I', '2010-01-31', '2011-01-31', 46),
(49, 'Cook II', '2013-06-26', '2015-05-15', 48),
(27, 'Controller', '2023-02-16', '2024-06-12', 49),
(27, 'Initiator', '2024-02-06', '2015-02-01', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance_rating`
--
ALTER TABLE `performance_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `personal_record`
--
ALTER TABLE `personal_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_record`
--
ALTER TABLE `service_record`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `performance_rating`
--
ALTER TABLE `performance_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_record`
--
ALTER TABLE `personal_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `service_record`
--
ALTER TABLE `service_record`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
