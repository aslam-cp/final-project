-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 12:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ksii`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `LogID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Action` varchar(80) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` int(11) NOT NULL,
  `request_id` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Success','Failed') NOT NULL,
  `gateway_response` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`id`, `request_id`, `amount`, `status`, `gateway_response`, `created_at`, `updated_at`) VALUES
(1, '34', 1200.00, 'Success', 'ys', '2025-08-27 13:21:40', '2025-08-27 13:21:40'),
(2, '34', 1200.00, 'Pending', 'ys', '2025-08-27 11:53:08', '2025-08-27 11:53:08'),
(3, '34', 1200.00, 'Pending', 'yd', '2025-08-27 11:54:31', '2025-08-27 11:54:31'),
(4, '7', 89.00, 'Success', 'n', '2025-08-27 11:54:48', '2025-08-27 11:54:48'),
(5, '78', 9800.00, 'Success', 'THanks', '2025-08-27 15:26:54', '2025-08-27 15:26:54'),
(6, '34', 1200.00, 'Pending', 'ys', '2025-08-27 12:00:19', '2025-08-27 12:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `RequestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ServiceType` varchar(80) NOT NULL,
  `Description` varchar(80) NOT NULL,
  `FeeAmount` int(11) NOT NULL,
  `Status` varchar(80) NOT NULL,
  `CreatedAt` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`RequestID`, `UserID`, `ServiceType`, `Description`, `FeeAmount`, `Status`, `CreatedAt`) VALUES
(1, 5, 'Birth Cerficate', 'pleaee let speed up', 2000, 'Pending', '2025-08-27 11:17:58'),
(2, 5, 'caste Certificate', 'please make it speed up', 700, 'Pending', '2025-08-27 11:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'Aslam@2003'),
(2, 'admin@gmail.com', 'Aslam@2003'),
(3, 'admin@gmail.com', 'Aslam@2003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officer`
--

CREATE TABLE `tbl_officer` (
  `officer_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_officer`
--

INSERT INTO `tbl_officer` (`officer_id`, `email`, `password`) VALUES
(1, 'akh041781@gmail.com', 'Aslam@2003'),
(2, 'officer@gmail.com', 'Aslam@2003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Salt` varchar(50) NOT NULL,
  `PasswordHash` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `CreatedAT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Mobile`, `Salt`, `PasswordHash`, `Role`, `CreatedAT`) VALUES
(3, 'MUHAMMED ASLAM KH', 'aslam123@gmail.com', 7025715578, '', 'Aslam@2003', 'Citizen', '2025-08-27 08:29:53'),
(4, 'Gothm', 'akh041781@gmail.com', 7025715578, '', 'Aslam@2003', 'Citizen', '2025-08-27 08:37:01'),
(5, 'HASSAN KA', 'citizen@gmail.com', 7025715578, '', 'Aslam@2003', 'Citizen', '2025-08-27 11:03:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_officer`
--
ALTER TABLE `tbl_officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_officer`
--
ALTER TABLE `tbl_officer`
  MODIFY `officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
