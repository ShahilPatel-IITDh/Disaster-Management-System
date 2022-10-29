-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 06:40 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleloan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `pass`) VALUES
(1, 'admin@mail.com', '6812f136d636e737248d365016f8cfd5139e387c');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(300, 'Male'),
(301, 'Female'),
(302, 'Youth'),
(303, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `region_id`) VALUES
(50, 'Itilima', 25),
(51, 'Bariadi', 25),
(52, 'Meatu', 25),
(53, 'Busega', 25),
(54, 'Maswa', 25),
(56, 'Ucreossau', 32),
(57, 'Maspistan', 32),
(58, 'Aflary', 32),
(59, 'Whairrusk District', 33),
(60, 'Wrelbemp District', 33);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`, `district_id`) VALUES
(100, 'Itilima', 50),
(102, 'Kinang\'weli', 50),
(104, 'Brouc Skium', 56),
(105, 'Gruip Thos', 56),
(106, 'Zoshor Div', 57),
(107, 'Cloaque Div', 58),
(108, 'Smaules Div', 57),
(109, 'Staggol Division', 59),
(110, 'Bommek Division', 59),
(111, 'Woweg Division', 60),
(112, 'Spripret Division', 60);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` char(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `ward` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `group_activity` varchar(50) NOT NULL,
  `group_category` varchar(50) NOT NULL,
  `group_total_members` varchar(50) NOT NULL,
  `group_leader` varchar(50) NOT NULL,
  `loan_information` text NOT NULL,
  `group_capital` varchar(100) NOT NULL,
  `group_creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `region`, `district`, `division`, `ward`, `village`, `registration_number`, `group_activity`, `group_category`, `group_total_members`, `group_leader`, `loan_information`, `group_capital`, `group_creation_date`) VALUES
(5, 'Astro Group', '32', '57', '106', '127', '234', 'CA101145', 'Activity 2', 'Group of Youth only', '7', 'Liam Moore', 'Demo Information', '250000', '2022-08-27'),
(6, 'Shark Dynamos', '33', '60', '112', '138', '255', 'CA101234', 'Activity 4', 'Group of both Men and Women', '11', 'Betty Cooper', 'Sample Loan Info', '11550', '2022-08-27'),
(7, 'Team Frog', '32', '57', '106', '129', '236', 'CA101699', 'Activity 3', 'Group of Women only', '3', 'Nathalie Hope', 'Demo Loan Info', '9900', '2022-08-27'),
(8, 'Plexus Group', '32', '57', '106', '129', '235', 'CA104470', 'Activity 1', 'Group of Women only', '6', 'Marie Lopez', 'Test Test', '95000', '2022-08-27'),
(9, 'Digi Group', '33', '60', '112', '138', '255', 'CA107969', 'Activity 3', 'Group of Youth only', '7', 'Curtis Johns', 'Test Info', '100000', '2022-08-27'),
(10, 'Ether Group', '33', '60', '111', '136', '249', 'CA105557', 'Activity 3', 'Group of both Men and Women', '9', 'Christine Moore', 'Demo Loan Info', '99500', '2022-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `loan_come_from` varchar(50) NOT NULL,
  `loan_amount` varchar(50) NOT NULL,
  `loan_interest` varchar(10) NOT NULL,
  `payment_term` varchar(50) NOT NULL,
  `total_payment_with_intereset` varchar(50) NOT NULL,
  `emi_per_month` varchar(50) NOT NULL,
  `payment_schedule` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `group_id`, `loan_come_from`, `loan_amount`, `loan_interest`, `payment_term`, `total_payment_with_intereset`, `emi_per_month`, `payment_schedule`, `due_date`) VALUES
(6, '5', 'Government', '485000', '10', '7', '824500', '9815.47619047619', '2022-08-27', '2022-09-26'),
(7, '7', 'Public and Private Banks', '250000', '10', '3', '325000', '9027.777777777777', '2022-08-27', '2025-12-11'),
(8, '10', 'Public and Private Banks', '110000', '10', '5', '165000', '2750', '2022-08-27', '2027-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `group_id` int(11) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `gender`, `group_id`, `join_date`) VALUES
(1, 'Fred', 'Hutchens', 'm', 5, '2016-08-11'),
(13, 'Thomas', 'Selvidge', 'm', 5, '2022-08-27'),
(14, 'Darrel', 'Rutland', 'm', 5, '2022-08-27'),
(15, 'Leslie', 'Stearns', 'f', 5, '2022-08-27'),
(16, 'Clara', 'Feeney', 'f', 5, '2022-08-27'),
(17, 'Betty', 'Cooper', 'f', 6, '2022-08-27'),
(18, 'Emma', 'Merida', 'f', 6, '2022-08-27'),
(19, 'John', 'Wilson', 'm', 6, '2022-08-27'),
(20, 'Michael', 'Schwartz', 'm', 6, '2022-08-27'),
(21, 'Gerald', 'Walston', 'm', 6, '2022-08-27'),
(22, 'Stephanie', 'Grosse', 'f', 6, '2022-08-27'),
(23, 'Cynthia', 'Sites', 'f', 5, '2022-08-27'),
(24, 'Stephen', 'Martinez', 'm', 6, '2022-08-27'),
(25, 'Liam', 'Moore', 'm', 5, '2022-08-27'),
(26, 'Nathalie', 'Hope', 'f', 7, '2022-08-27'),
(27, 'Henry', 'Doe', 'm', 7, '2022-08-27'),
(28, 'Marie', 'Lopez', 'f', 8, '2022-08-27'),
(29, 'Kathryn', 'Cruiz', 'f', 8, '2022-08-27'),
(30, 'Nancy', 'Jane', 'f', 8, '2022-08-27'),
(31, 'Elton', 'Simmons', 'm', 6, '2022-08-27'),
(32, 'Andrew', 'Rosinski', 'm', 7, '2022-08-27'),
(33, 'Curtis', 'Johns', 'm', 9, '2022-08-27'),
(34, 'Rebecca', 'Vaughn', 'f', 9, '2022-08-27'),
(35, 'Helen', 'Reardon', 'f', 9, '2022-08-27'),
(36, 'Joseph', 'Murphy', 'm', 9, '2022-08-27'),
(37, 'Christine', 'Moore', 'f', 10, '2022-08-27'),
(38, 'Kate', 'Lenz', 'f', 10, '2022-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `payment_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`payment_id`, `group_id`, `amount_paid`, `payment_date`) VALUES
(3, 5, 9815, '2022-08-27'),
(4, 7, 9030, '2022-08-27'),
(5, 10, 2750, '2022-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(25, 'Region One'),
(32, 'Region Two'),
(33, 'Region Three');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `village_id` int(11) NOT NULL,
  `village_name` varchar(255) NOT NULL,
  `ward_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`village_id`, `village_name`, `ward_id`) VALUES
(156, 'Mwalushu', 111),
(157, 'Mwamigagani', 111),
(158, 'Mwamanyangu', 111),
(159, 'Mwanunui', 111),
(160, 'Ng\'homango', 111),
(161, 'Ntagaswa', 111),
(162, 'Mwamapalala', 112),
(163, 'Nkololo Itilima', 112),
(164, 'Ngeme', 112),
(165, 'Mwamunhu', 112),
(166, 'Idoselo', 112),
(167, 'Nkoma', 113),
(168, 'Dasina', 113),
(169, 'Gambasingu', 113),
(170, 'Ng\'wang\'wita', 113),
(171, 'Musoma', 113),
(172, 'Mwambagwa', 113),
(173, 'Nyamalapa', 114),
(174, 'Kimali', 114),
(175, 'Itilima', 114),
(176, 'B/Mbugani', 114),
(177, 'Isakang\'hwale', 114),
(204, 'Mwakilangi', 121),
(205, 'Isengwa', 121),
(206, 'Kinang\'weli', 121),
(207, 'Mwagimagi', 121),
(208, 'Lalang\'ombe', 121),
(209, 'Luguru', 122),
(210, 'Ikungulipu', 122),
(211, 'Itubilo', 122),
(212, 'Inalo', 122),
(213, 'Kidula', 123),
(214, 'Sunzula', 123),
(215, 'Ng\'hesha Itilima', 123),
(216, 'Mwamnemha', 123),
(217, 'Nhobora', 124),
(218, 'Mwabuyunge', 124),
(219, 'Mwaumisheni', 124),
(220, 'Tagawi', 124),
(221, 'Kilugala', 124),
(222, 'Sawida', 125),
(223, 'Isagala', 125),
(224, 'Mahembe', 125),
(225, 'Songambele', 125),
(226, 'Bukingwamizi', 126),
(227, 'Zanzui', 126),
(228, 'Mlimani', 126),
(229, 'Sasago', 126),
(230, 'Kabale', 126),
(231, 'Kashishi', 126),
(232, 'Aflurg Village', 127),
(233, 'Aflurg Village', 128),
(234, 'Espar Village', 127),
(235, 'Troy Village', 129),
(236, 'Desp Village', 129),
(237, 'Neey Village', 130),
(238, 'QWER Village', 130),
(239, 'Modok Village', 131),
(240, 'Western Bid Village', 131),
(241, 'Beyside Village', 132),
(242, 'Xuggen L Village', 132),
(243, 'DXC Village', 133),
(244, 'Getteamlift Village', 133),
(245, 'Western Bloe Village', 134),
(246, 'Eastern WTR Village', 134),
(247, 'Droogoston Village', 135),
(248, 'Dracary Village', 135),
(249, 'SW Village', 136),
(250, 'NS Village', 136),
(251, 'SNP Village', 137),
(252, 'SNP Village', 137),
(253, 'Deweect North Village', 137),
(254, 'Skeganlic Village', 138),
(255, 'Sphek Cross Village', 138);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(11) NOT NULL,
  `ward_name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `division_id`) VALUES
(111, 'Mwalushu', 100),
(112, 'Mwamapalala', 100),
(113, 'Nkoma', 100),
(114, 'Nyamalapa', 100),
(121, 'Kinang\'weli', 102),
(122, 'Luguru', 102),
(123, 'Mbita', 102),
(124, 'Nhobora', 102),
(125, 'Sawida', 102),
(126, 'Zagayu', 102),
(127, 'Oplil Ward', 106),
(128, 'Oplil Ward', 107),
(129, 'Ecla Ward', 106),
(130, 'Stad Ward', 106),
(131, 'Reeot Ward', 109),
(132, 'Peggot Ward One', 109),
(133, 'Stareb Ward', 110),
(134, 'Myclone Ward T', 110),
(135, 'Stareb Ward', 111),
(136, 'Joccark Ward', 111),
(137, 'Taffeost Ward', 112),
(138, 'Stareb Ward', 112);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`village_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
