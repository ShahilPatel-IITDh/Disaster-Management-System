-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2021 at 09:26 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `BloodStock`
--

CREATE TABLE `BloodStock` (
  `id` int NOT NULL,
  `dateDonated` date NOT NULL,
  `typeID` int NOT NULL,
  `donorID` int NOT NULL,
  `isRecieved` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `BloodType`
--

CREATE TABLE `BloodType` (
  `typeID` int NOT NULL,
  `typeName` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `BloodType`
--

INSERT INTO `BloodType` (`typeID`, `typeName`) VALUES
(1, 'O+'),
(2, 'O-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `canDonate`
--

CREATE TABLE `canDonate` (
  `typeIDDonor` int NOT NULL,
  `typeIDRecipient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `canDonate`
--

INSERT INTO `canDonate` (`typeIDDonor`, `typeIDRecipient`) VALUES
(1, 1),
(1, 3),
(1, 5),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 3),
(3, 7),
(4, 3),
(4, 4),
(4, 7),
(4, 8),
(5, 5),
(5, 7),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(7, 7),
(8, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Donor`
--

CREATE TABLE `Donor` (
  `donorID` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `isSmoker` int NOT NULL,
  `majorDiseases` int NOT NULL,
  `contactNo` char(10) NOT NULL,
  `typeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Donor`
--

INSERT INTO `Donor` (`donorID`, `name`, `gender`, `DOB`, `address`, `isSmoker`, `majorDiseases`, `contactNo`, `typeID`) VALUES
(1, 'et', 'set', '2000-11-11', 'test', 0, 0, '3243657687', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recieves`
--

CREATE TABLE `recieves` (
  `id` int NOT NULL,
  `recipientID` int NOT NULL,
  `dateRecieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Recipient`
--

CREATE TABLE `Recipient` (
  `recipientID` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `typeID` int NOT NULL,
  `contactNo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Recipient`
--

INSERT INTO `Recipient` (`recipientID`, `name`, `gender`, `DOB`, `address`, `typeID`, `contactNo`) VALUES
(1, 'trest', 'set', '2000-02-12', 'Test', 1, '1111111111'),
(2, 'Test', 'Test', '1998-12-02', 'Dhartest', 1, '3434546555'),
(3, 'Test', 'Test', '1998-12-02', 'Dhartest', 2, '3434546555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BloodStock`
--
ALTER TABLE `BloodStock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `donorID` (`donorID`);

--
-- Indexes for table `BloodType`
--
ALTER TABLE `BloodType`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `canDonate`
--
ALTER TABLE `canDonate`
  ADD PRIMARY KEY (`typeIDDonor`,`typeIDRecipient`);

--
-- Indexes for table `Donor`
--
ALTER TABLE `Donor`
  ADD PRIMARY KEY (`donorID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `recieves`
--
ALTER TABLE `recieves`
  ADD PRIMARY KEY (`id`,`recipientID`),
  ADD KEY `recipientID` (`recipientID`);

--
-- Indexes for table `Recipient`
--
ALTER TABLE `Recipient`
  ADD PRIMARY KEY (`recipientID`),
  ADD KEY `typeID` (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BloodStock`
--
ALTER TABLE `BloodStock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `BloodType`
--
ALTER TABLE `BloodType`
  MODIFY `typeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Donor`
--
ALTER TABLE `Donor`
  MODIFY `donorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Recipient`
--
ALTER TABLE `Recipient`
  MODIFY `recipientID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BloodStock`
--
ALTER TABLE `BloodStock`
  ADD CONSTRAINT `BloodStock_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `BloodType` (`typeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `BloodStock_ibfk_2` FOREIGN KEY (`donorID`) REFERENCES `Donor` (`donorID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `canDonate`
--
ALTER TABLE `canDonate`
  ADD CONSTRAINT `canDonate_ibfk_1` FOREIGN KEY (`typeIDDonor`) REFERENCES `BloodType` (`typeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Donor`
--
ALTER TABLE `Donor`
  ADD CONSTRAINT `Donor_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `BloodType` (`typeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `recieves`
--
ALTER TABLE `recieves`
  ADD CONSTRAINT `recieves_ibfk_1` FOREIGN KEY (`id`) REFERENCES `BloodStock` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `recieves_ibfk_2` FOREIGN KEY (`recipientID`) REFERENCES `Recipient` (`recipientID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Recipient`
--
ALTER TABLE `Recipient`
  ADD CONSTRAINT `Recipient_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `BloodType` (`typeID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
