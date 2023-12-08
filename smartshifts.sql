-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 09:27 PM
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
-- Database: `smartshifts`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartmentID` int(15) NOT NULL,
  `DepartmentName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(15) NOT NULL,
  `DepartmentID` int(15) NOT NULL,
  `EmployeeName` varchar(20) NOT NULL,
  `EmployeeContact` varchar(15) NOT NULL,
  `EmployeeAvailability` varchar(15) NOT NULL,
  `UserID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationID` int(15) NOT NULL,
  `UserID` int(15) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `TimeStamp` datetime(5) NOT NULL,
  `ReadStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `AssignmentID` int(15) NOT NULL,
  `EmployeeName` varchar(15) NOT NULL,
  `ShiftStartTime` time(1) NOT NULL,
  `ShiftEndTime` time(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `ShiftID` int(10) NOT NULL,
  `DepartmentID` int(10) NOT NULL,
  `ShiftDate` date NOT NULL,
  `StartTime` time(5) NOT NULL,
  `EndTime` time(5) NOT NULL,
  `Designation` varchar(10) NOT NULL,
  `Notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shiftsrequests`
--

CREATE TABLE `shiftsrequests` (
  `RequestID` int(15) NOT NULL,
  `DepartmentID` int(15) NOT NULL,
  `EmployeeID` int(15) NOT NULL,
  `RequestedDate` date NOT NULL,
  `RequestType` varchar(255) NOT NULL,
  `RequestStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `MobileNumber` int(10) NOT NULL,
  `AltNumber` int(10) NOT NULL,
  `BirthDate` text NOT NULL,
  `Pronouns` text NOT NULL,
  `Language` text NOT NULL,
  `EmrName` text NOT NULL,
  `EmrNumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `UserEmail`, `MobileNumber`, `AltNumber`, `BirthDate`, `Pronouns`, `Language`, `EmrName`, `EmrNumber`) VALUES
(1, 'admin', 'admin123', '', 0, 0, '', '', '', '', 0),
(2, 'user', 'user123', '', 0, 0, '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`AssignmentID`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `shiftsrequests`
--
ALTER TABLE `shiftsrequests`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
