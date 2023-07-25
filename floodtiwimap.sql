-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 02:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floodtiwimap`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangay_list`
--

CREATE TABLE `barangay_list` (
  `BR_id` int(11) NOT NULL,
  `Barangay_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay_list`
--

INSERT INTO `barangay_list` (`BR_id`, `Barangay_Name`) VALUES
(1, 'Bagumbayan'),
(2, 'Bariis'),
(3, 'Baybay'),
(4, 'Belen (Malabog)'),
(5, 'Biyong'),
(6, 'Bolo'),
(7, 'Cale'),
(8, 'Cararayan'),
(9, 'Coro-coro'),
(10, 'Dap-dap'),
(11, 'Gajo'),
(12, 'Joroan'),
(13, 'Libjo'),
(14, 'Libtong'),
(15, 'Matalibong'),
(16, 'Maynonong'),
(17, 'Mayong'),
(18, 'Misibis'),
(19, 'Naga'),
(20, 'Nagas'),
(21, 'Oyama'),
(22, 'Putsan'),
(23, 'San Bernardo'),
(24, 'Sogod'),
(25, 'Tigbi (Poblacion)');

-- --------------------------------------------------------

--
-- Table structure for table `brpolygons`
--

CREATE TABLE `brpolygons` (
  `id` bigint(20) NOT NULL,
  `coordinates` text NOT NULL,
  `Color` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brpolygons`
--

INSERT INTO `brpolygons` (`id`, `coordinates`, `Color`) VALUES
(2, 'new google.maps.LatLng(13.46367,123.64984), new google.maps.LatLng(13.46404,123.64892), new google.maps.LatLng(13.46415,123.64617), new google.maps.LatLng(13.46252,123.64443), new google.maps.LatLng(13.46138,123.64677), ', '');

-- --------------------------------------------------------

--
-- Table structure for table `damageassessment`
--

CREATE TABLE `damageassessment` (
  `DA_Id` int(11) NOT NULL,
  `DA_Cover` varchar(40) NOT NULL,
  `DamageCost` longtext NOT NULL,
  `Barangay_Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damageassessment`
--

INSERT INTO `damageassessment` (`DA_Id`, `DA_Cover`, `DamageCost`, `Barangay_Name`) VALUES
(1, '', '', 'Bagumbayan'),
(2, '', '20000', 'Bariis'),
(3, '', '', 'Baybay'),
(4, '', '10000', 'Belen (Malabog)'),
(5, '', '', 'Biyong'),
(6, '', '', 'Bolo'),
(7, '', '', 'Cale'),
(8, '', '', 'Cararayan'),
(9, '', '10000', 'Coro-coro'),
(10, '', '', 'Dap-dap'),
(11, '', '', 'Gajo'),
(12, '', '', 'Joroan'),
(13, '', '', 'Libjo'),
(14, '', '', 'Libtong'),
(15, '', '', 'Matalibong'),
(16, '', '', 'Maynonong'),
(17, '', '', 'Mayong'),
(18, '', '', 'Misibis'),
(19, '', '', 'Naga'),
(20, '', '', 'Nagas'),
(21, '', '', 'Oyama'),
(22, '', '', 'Putsan'),
(23, '', '', 'San Bernardo'),
(24, '', '', 'Sogod'),
(25, '', '', 'Tigbi (Poblacion)');

-- --------------------------------------------------------

--
-- Table structure for table `evacuation`
--

CREATE TABLE `evacuation` (
  `ec_id` int(11) NOT NULL,
  `Longitude` decimal(10,6) DEFAULT NULL,
  `Lattitude` decimal(10,6) DEFAULT NULL,
  `Area_name` varchar(40) NOT NULL,
  `address` varchar(250) NOT NULL,
  `EvacType` varchar(40) NOT NULL,
  `Show_Hide` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuation`
--

INSERT INTO `evacuation` (`ec_id`, `Longitude`, `Lattitude`, `Area_name`, `address`, `EvacType`, `Show_Hide`) VALUES
(6, '123.662449', '13.452511', 'Tiwi Agro-Industrial School', 'Tiwi Agro-Industrial School, Tiwi, Albay, Philippines', 'School', 0),
(7, '123.679981', '13.453135', 'Tiwi Central School', 'Tiwi Central School, Tiwi, Albay, Philippines', 'School', 1);

-- --------------------------------------------------------

--
-- Table structure for table `floodassessment`
--

CREATE TABLE `floodassessment` (
  `FlooodAsmt_id` int(40) NOT NULL,
  `Damage_Infra` longtext NOT NULL,
  `Location` longtext NOT NULL,
  `Date Occured` longtext NOT NULL,
  `Assessment_Descr` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floodassessment`
--

INSERT INTO `floodassessment` (`FlooodAsmt_id`, `Damage_Infra`, `Location`, `Date Occured`, `Assessment_Descr`) VALUES
(1, 'sadsadsadsa', 'Tigbi', 'June 2, 2017', 'asdsadsaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_number`
--

CREATE TABLE `mobile_number` (
  `id` int(10) NOT NULL,
  `MobileNumber` bigint(12) NOT NULL,
  `Barangay` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_number`
--

INSERT INTO `mobile_number` (`id`, `MobileNumber`, `Barangay`) VALUES
(29, 9153725881, 'Baybay'),
(30, 9150076010, 'Libtong'),
(31, 9292322461, 'Bariis'),
(32, 9292382461, 'Bolo');

-- --------------------------------------------------------

--
-- Table structure for table `safetytips`
--

CREATE TABLE `safetytips` (
  `PM_id` int(11) NOT NULL,
  `lddrmc_id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Dateposted` date NOT NULL,
  `Time` time NOT NULL,
  `Safety_Tips_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safetytips`
--

INSERT INTO `safetytips` (`PM_id`, `lddrmc_id`, `Name`, `Dateposted`, `Time`, `Safety_Tips_content`) VALUES
(1, 1, 'SSSSS', '2018-03-08', '08:17:35', 'Goodmorning this are the Tips that should be follow inorder to lessen the damage\n1.blah blah\n2.blah blah \n3.blah blah'),
(9, 3, 'ffff', '2018-03-09', '02:54:52', 'wewqeqwe'),
(10, 3, 'wqewq', '2018-03-09', '03:00:49', 'ewqewqeqw'),
(11, 3, 'eqwe', '2018-03-09', '03:00:52', 'wqeqwewqe'),
(12, 3, 'sefsdf', '2018-03-12', '15:11:55', 'dsfdsf'),
(13, 3, '', '2018-03-31', '13:37:50', '');

-- --------------------------------------------------------

--
-- Table structure for table `tiwida`
--

CREATE TABLE `tiwida` (
  `DAid` int(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `DescriptionOFDamage` longtext NOT NULL,
  `Location` varchar(100) NOT NULL,
  `DateOccured` date NOT NULL,
  `Estimated_Cost` bigint(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `DatePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiwida`
--

INSERT INTO `tiwida` (`DAid`, `category`, `DescriptionOFDamage`, `Location`, `DateOccured`, `Estimated_Cost`, `username`, `DatePosted`) VALUES
(1, 'Flood', 'small cracks on the road', 'Bariis', '2018-04-02', 10000, 'w', '2018-04-16'),
(2, 'Flood', 'renato''s house', 'Belen (Malabog)', '2018-02-06', 10000, 'w', '2018-04-16'),
(3, 'Flood', 'asdas', 'Bariis', '2018-04-11', 10000, 'w', '2018-04-16'),
(4, 'Flood', 'asdsad', 'Coro-coro', '2017-08-16', 10000, 'w', '2018-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `triggerchange`
--

CREATE TABLE `triggerchange` (
  `id` int(11) NOT NULL,
  `changeid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triggerchange`
--

INSERT INTO `triggerchange` (`id`, `changeid_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `User_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `Username`, `Password`, `User_level`) VALUES
(1, 'Jess', 'Dimagiba', 'q', 'q', 1),
(2, 'Loisa', 'Dimatulungan', 'w', 'w', 2),
(3, 'Uga', 'Uga', 'e', 'e', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangay_list`
--
ALTER TABLE `barangay_list`
  ADD PRIMARY KEY (`BR_id`);

--
-- Indexes for table `brpolygons`
--
ALTER TABLE `brpolygons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damageassessment`
--
ALTER TABLE `damageassessment`
  ADD PRIMARY KEY (`DA_Id`);

--
-- Indexes for table `evacuation`
--
ALTER TABLE `evacuation`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indexes for table `floodassessment`
--
ALTER TABLE `floodassessment`
  ADD PRIMARY KEY (`FlooodAsmt_id`);

--
-- Indexes for table `mobile_number`
--
ALTER TABLE `mobile_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safetytips`
--
ALTER TABLE `safetytips`
  ADD PRIMARY KEY (`PM_id`);

--
-- Indexes for table `tiwida`
--
ALTER TABLE `tiwida`
  ADD PRIMARY KEY (`DAid`);

--
-- Indexes for table `triggerchange`
--
ALTER TABLE `triggerchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangay_list`
--
ALTER TABLE `barangay_list`
  MODIFY `BR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `brpolygons`
--
ALTER TABLE `brpolygons`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `damageassessment`
--
ALTER TABLE `damageassessment`
  MODIFY `DA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `evacuation`
--
ALTER TABLE `evacuation`
  MODIFY `ec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `floodassessment`
--
ALTER TABLE `floodassessment`
  MODIFY `FlooodAsmt_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mobile_number`
--
ALTER TABLE `mobile_number`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `safetytips`
--
ALTER TABLE `safetytips`
  MODIFY `PM_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tiwida`
--
ALTER TABLE `tiwida`
  MODIFY `DAid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `triggerchange`
--
ALTER TABLE `triggerchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
