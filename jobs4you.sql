-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2021 at 02:15 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs4you`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(4) NOT NULL,
  `adm_fnm` varchar(30) NOT NULL,
  `adm_lnm` varchar(30) NOT NULL,
  `adm_pwd` varchar(10) NOT NULL,
  `adm_phno` varchar(10) NOT NULL,
  `adm_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_fnm`, `adm_lnm`, `adm_pwd`, `adm_phno`, `adm_email`) VALUES
(12, 'Gilbert ', 'Merama', '123456', '0702758892', 'gilberty@gmail.com'),
(13, 'Wilson', 'wambua', '123456', '0703459330', 'willie@gmail.com'),
(14, 'David', 'Onguti', '123456', '0702758892', 'davie@gmail.com'),
(15, 'Dancun', 'Kip', '123456', '0702758892', 'dan@gmail.com'),
(16, 'Benson ', 'Kamau', '123456', '0702758892', 'ben@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `a_id` int(4) NOT NULL,
  `a_uid` varchar(30) NOT NULL,
  `a_jid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`a_id`, `a_uid`, `a_jid`) VALUES
(1, '11', '25'),
(2, '14', '23'),
(3, '12', '22'),
(4, '13', '24'),
(5, '15', '21'),
(24, '1', '21'),
(25, '1', '21'),
(26, '1', '21'),
(27, '1', '21'),
(28, '1', '21'),
(29, '1', '21'),
(30, '1', '21'),
(31, '1', '21'),
(32, '1', '21'),
(33, '1', '21'),
(34, '1', '21'),
(35, '1', '21'),
(36, '1', '21'),
(37, '1', '21'),
(38, '1', '21'),
(39, '1', '21'),
(40, '1', '21'),
(41, '1', '21'),
(42, '1', '21'),
(43, '1', '21'),
(44, '1', '21'),
(45, '1', '21'),
(46, '1', '21'),
(47, '1', '21'),
(48, '1', '21'),
(49, '1', '21'),
(50, '1', '21'),
(51, '1', '21'),
(52, '1', '21'),
(53, '1', '21'),
(54, '1', '21'),
(55, '1', '21'),
(56, '1', '21'),
(57, '1', '21'),
(58, '1', '21'),
(59, '1', '21'),
(60, '1', '21'),
(61, '1', '21'),
(62, '1', '21'),
(63, '1', '21'),
(64, '1', '21'),
(65, '1', '21'),
(66, '1', '21'),
(67, '1', '21'),
(68, '1', '21'),
(69, '1', '21'),
(70, '1', '21'),
(71, '1', '21'),
(72, '1', '21'),
(73, '1', '21'),
(74, '1', '21'),
(75, '1', '21'),
(76, '1', '21'),
(77, '1', '21'),
(78, '1', '21'),
(79, '1', '21'),
(80, '1', '21'),
(81, '1', '21'),
(82, '1', '21'),
(83, '1', '21'),
(84, '1', '21'),
(85, '1', '21'),
(86, '1', '21'),
(87, '1', '22'),
(88, '1', '22'),
(89, '1', '22'),
(90, '1', '22'),
(91, '4', '23'),
(92, '1', '23'),
(93, '4', '23'),
(94, '1', '21'),
(95, '1', '24'),
(96, '1', '23'),
(97, '1', '23'),
(98, '1', '21'),
(99, '1', '21'),
(100, '1', '29'),
(101, '1', '29'),
(102, '2', '25'),
(103, '2', '27'),
(104, '4', '31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_nm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_nm`) VALUES
(10, 'Software Engineering'),
(12, 'IT Experts'),
(15, 'Project Management'),
(21, 'Banking'),
(24, 'Banking');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cont_id` int(4) NOT NULL,
  `cont_fnm` varchar(30) NOT NULL,
  `cont_email` varchar(20) NOT NULL,
  `cont_query` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cont_id`, `cont_fnm`, `cont_email`, `cont_query`) VALUES
(1, 'gilbert', 'gilbert@gmail.com', 'Hello Gilbert'),
(2, 'dancun', 'dansatiago@yahoo.com', 'Hi Dan');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ee_id` int(4) NOT NULL,
  `ee_fnm` varchar(30) NOT NULL,
  `ee_lnm` varchar(30) NOT NULL,
  `ee_pwd` varchar(10) NOT NULL,
  `ee_email` varchar(30) NOT NULL,
  `ee_addr` varchar(300) NOT NULL,
  `ee_phno` varchar(10) NOT NULL,
  `ee_current_location` varchar(20) NOT NULL,
  `ee_qualification` varchar(30) NOT NULL,
  `ee_resume` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ee_id`, `ee_fnm`, `ee_lnm`, `ee_pwd`, `ee_email`, `ee_addr`, `ee_phno`, `ee_current_location`, `ee_qualification`, `ee_resume`) VALUES
(1, 'gilbert', 'Merama', '123456', 'gilberty@gmail.com', 'MMU,Nairobi', '0702758892', 'Rongai', 'Project Manager', 'uploads/'),
(2, 'David ', 'Onguti', '123456', 'davie@gmail.com', 'MMU,Nairobi', '0702758892', 'Rongai', 'Project Manager', 'uploads/'),
(3, 'Dancun ', 'Kip', '123456', 'dansantiago@gmail.com', 'MMU,Nairobi', '0702758892', 'Rongai', 'Project Manager', 'uploads/dan.doc'),
(4, 'Wilson ', 'Wambua', '123456', 'willie@gmail.com', 'MMU,Nairobi', '0702758892', 'Rongai', 'Project Manager', 'uploads/willie.doc'),
(5, 'Benson ', 'Kamau', '123456', 'ben@gmail.com', 'MMU, Rongai', '0702758892', 'Rongai', 'Project Manager', 'uploads/willie.doc'),
(14, 'gilberty', 'pius', '123456', 'gilly@gmail.com', 'MMU,Rongai', '0702758892', 'rongai', 'degree', 'uploads/gilly.doc'),
(15, 'last', 'first', '1234567', 'g@gmail', 'ronga', '0788888888', 'rongai', 'degree', 'uploads/ben.doc');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `er_id` int(4) NOT NULL,
  `er_fnm` varchar(30) NOT NULL,
  `er_lnm` varchar(30) NOT NULL,
  `er_pwd` varchar(10) NOT NULL,
  `er_company` varchar(30) NOT NULL,
  `er_addr` varchar(100) NOT NULL,
  `er_phno` varchar(10) NOT NULL,
  `er_email` varchar(30) NOT NULL,
  `er_company_profile` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`er_id`, `er_fnm`, `er_lnm`, `er_pwd`, `er_company`, `er_addr`, `er_phno`, `er_email`, `er_company_profile`) VALUES
(12, 'Gilbert ', 'Merama', '123456', 'Gtech solutions', 'Rongai, Main branch', '0702758892', 'gilberty@gmail.com', ''),
(13, 'David ', 'Ong\'uti', '123456', 'Gtech solutions', 'Kisii Branch', '0702758892', 'davie@gmail.com', 'Tech oriented company'),
(14, 'Dancun', 'Kip', '123456', 'Gtech solutions', 'Eld Branch', '0702758892', 'dan@gmail.com', 'Tech oriented company'),
(15, 'Wilson', 'Wambua', '123456', 'Gtech solutions', 'Kitui Branch', '0702758892', 'willie@gmail.com', 'Tech oriented company'),
(16, 'Benson', 'Kamau', '123456', 'Gtech solutions', 'Nyeri Branch', '0702758892', 'ben@gmail.com', 'Tech oriented company'),
(18, 'gilbert', 'Pius', '12345678', 'gtech', '123456', '0700000000', 'tashwillie@gmail.com', 'hello'),
(19, 'gilbert', 'merama', '123456', 'gtech', 'rongai', '0702758892', 'gilberty@pius.com', 'tech oriented');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `j_id` int(4) NOT NULL,
  `j_category` varchar(100) NOT NULL,
  `j_owner_name` varchar(50) NOT NULL,
  `j_title` varchar(100) NOT NULL,
  `j_hours` int(3) NOT NULL,
  `j_salary` int(10) NOT NULL,
  `j_experience` int(3) NOT NULL,
  `j_discription` varchar(300) NOT NULL,
  `j_city` varchar(50) NOT NULL,
  `j_active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`j_id`, `j_category`, `j_owner_name`, `j_title`, `j_hours`, `j_salary`, `j_experience`, `j_discription`, `j_city`, `j_active`) VALUES
(21, 'Software Engineering', 'Gilbert', 'Need for competent software developer', 10, 400000, 6, 'mobile and web application development', 'Nairobi', 1),
(22, 'Banking', 'Wilson', 'Need for Finance manager', 8, 350000, 4, 'to manager accounting activities', 'Kitui', 1),
(23, 'IT Experts', 'David', 'Need for an IT specialist', 10, 185000, 2, 'to handle all company activities in the IT sector', 'Kisii', 1),
(24, 'Import-Export', 'Dancun', 'Need for a procurement specialist  ', 12, 1280000, 5, 'to procure and manage available tenders', 'Eldoret', 1),
(25, 'Project Management', 'Benson', 'Need for a Project manager', 8, 220000, 3, 'to manage comapny projects', 'Nyeri', 1),
(27, 'Software Engineering', 'willie tash', 'android app developer', 10, 300000, 4, 'develop mobile applications', 'nairobi', 1),
(28, 'IT Experts', 'Gilbert Merama', 'Data analyst', 9, 250000, 3, 'to analyse data in the company', 'nairobi kenya', 1),
(29, 'Software Engineering', 'Gilbert Merama', 'Hello world', 8, 80000, 3, 'Hello world', 'nairobi', 1),
(31, 'Banking', 'Wilson', 'Loans', 9, 80000, 3, 'Make maoneuy', 'Machakos', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`er_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`j_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cont_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ee_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `er_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `j_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
