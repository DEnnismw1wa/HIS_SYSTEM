-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 02:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `his_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `Telephone_no` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ID_NO` int(11) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `County` varchar(80) NOT NULL,
  `sub_county` varchar(100) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Email` varchar(90) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Marital_Status` tinyint(1) NOT NULL,
  `reference_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`Telephone_no`, `Name`, `DOB`, `ID_NO`, `Adress`, `County`, `sub_county`, `Telephone`, `Email`, `Gender`, `Marital_Status`, `reference_number`) VALUES
(0, '', '', 0, '', '', '', 0, '', '', 0, 'efeb51bf8549d91df7cc');

-- --------------------------------------------------------

--
-- Table structure for table `patient_next_of_kin`
--

CREATE TABLE `patient_next_of_kin` (
  `kin_Name` varchar(100) NOT NULL,
  `kin_dob` varchar(100) NOT NULL,
  `kin_gender` varchar(50) NOT NULL,
  `kin_phone` int(11) NOT NULL,
  `kin_id` int(11) NOT NULL,
  `kin_relationship` varchar(50) NOT NULL,
  `patient_ref_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_next_of_kin`
--

INSERT INTO `patient_next_of_kin` (`kin_Name`, `kin_dob`, `kin_gender`, `kin_phone`, `kin_id`, `kin_relationship`, `patient_ref_no`) VALUES
('', '', '', 0, 0, '', 'efeb51bf8549d91df7cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD UNIQUE KEY `reference_number` (`reference_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
