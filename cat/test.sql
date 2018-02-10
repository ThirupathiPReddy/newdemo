-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 08:08 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sno`, `name`, `pwd`) VALUES
(1, 'admin', 'admin@wedobest'),
(1, 'admin', 'admin@wedobest');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `sno` int(100) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(6) NOT NULL,
  `Agent` varchar(20) NOT NULL,
  `Company_Name` varchar(20) NOT NULL,
  `Contact_Person` varchar(20) NOT NULL,
  `Mobile_Number` int(10) DEFAULT NULL,
  `Alternate_Mobile_Number` int(10) DEFAULT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Zone` text NOT NULL,
  `circle` text NOT NULL,
  `ward` text NOT NULL,
  `Branches` varchar(50) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`sno`, `Date`, `Time`, `Agent`, `Company_Name`, `Contact_Person`, `Mobile_Number`, `Alternate_Mobile_Number`, `Email_Address`, `Zone`, `circle`, `ward`, `Branches`, `cat`) VALUES
(1, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Flooring,Furniture,'),
(8, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,Interior Designers,Furniture,Metal Fabrication,'),
(9, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,Painting,'),
(10, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,'),
(11, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,'),
(12, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,'),
(13, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,'),
(14, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,'),
(15, '0000-00-00', '00:00:00.000000', '', 'User', '', 0, 0, '', '', '', '', '', 'Interior Designers,'),
(16, '0000-00-00', '00:00:00.000000', '', 'Company_Name', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,Interior Designers,'),
(17, '0000-00-00', '00:00:00.000000', '', 'Company_Name', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,Interior Designers,'),
(18, '0000-00-00', '00:00:00.000000', '', 'baleshwar', '', 0, 0, '', '', '', '', '', 'Modular Kitchen,Interior Designers,Metal Fabrication,'),
(19, '0000-00-00', '00:00:00.000000', '', 'baleshwar', 'asd', 2147483647, 2147483647, 'mnhbkgfjh@kjh.com', '', '', '', '2', 'Interior Designers,Flooring,'),
(20, '2018-01-11', '00:00:00.000000', '', 'abc', 'asd', 2147483647, 2147483647, 'Q@gmai.com', '', '', '', '1', 'Modular Kitchen,Flooring,Metal Fabrication,'),
(21, '2018-01-11', '00:00:00.000000', '', 'amazon', 'xyz', 2147483647, 2147483647, 'amazon@123.com', '', '', '', '2', 'Flooring,Metal Fabrication,Baby Sitter,Electronics,Books & Stationary,Organic,'),
(22, '2018-01-12', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(23, '2018-01-16', '00:00:00.000000', '', 'amazon', 'aqwer', 1231231231, 1231231231, 'abc@xyz.com', '', '', '', '2', 'Modular Kitchen,Home Nurse,'),
(24, '2018-01-16', '00:00:00.000000', '', 'amazon', 'aqwer', 1231231231, 1231231231, 'abc@xyz.com', '', '', '', '2', 'Modular Kitchen,Home Nurse,'),
(25, '2018-01-16', '00:00:00.000000', '', 'amazon', 'asd', 2147483647, 2147483647, 'amazon@123.com', 'East Zone', 'III-B.LB Nagar', 'Hasthinapuram', '1', 'Modular Kitchen,'),
(26, '2018-01-16', '00:00:00.000000', '', '', '', 0, 0, '', 'East Zone', 'I.Kapra', 'Kapra', '', ''),
(27, '2018-01-16', '00:00:00.000000', '', 'a', 'a', 0, 0, 'a', 'East Zone', 'III-C.Saroornagar', 'Saroornagar', '', ''),
(28, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(29, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(30, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(31, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(32, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(33, '2018-01-17', '00:00:00.000000', '', 'abc', 'xyz', 2147483647, 2147483647, 'abc@123.com', 'East Zone', 'II.Uppal Kalan', 'Chilukanagar', '1', 'Modular Kitchen,Painting,'),
(34, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(35, '2018-01-17', '00:00:00.000000', '', '', '', 0, 0, '', '', '', '', '', ''),
(36, '2018-01-17', '00:00:00.000000', '', '', '', 46546, 0, 'abc@xyz.com', '', '', '', '', ''),
(37, '2018-01-17', '00:00:00.000000', '', '', '', 46546546, 0, 'amazon@123.com', '', '', '', '', ''),
(38, '2018-01-17', '00:00:00.000000', '', '', '', 465465, 0, 'Q@gmai.com', '', '', '', '', ''),
(39, '2018-01-17', '00:00:00.000000', '', '', '', 123123, 0, 'Q@gmai.com', '', '', '', '', ''),
(40, '2018-01-17', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(41, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 2147483647, 'amazon@123.com', '', '', '', '', ''),
(42, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'amazon@123.com', '', '', '', '', ''),
(43, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 2147483647, 'amazon@123.com', '', '', '', '', ''),
(44, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 2147483647, 'Q@gmai.com', '', '', '', '', ''),
(45, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(46, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'amazon@123.com', '', '', '', '', ''),
(47, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(48, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(49, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(50, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'amazon@123.com', '', '', '', '', ''),
(51, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(52, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'amazon@123.com', '', '', '', '', ''),
(53, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(54, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(55, '2018-01-18', '00:00:00.000000', '', '', '', 2147483647, 0, 'Q@gmai.com', '', '', '', '', ''),
(56, '2018-01-18', '11:23:28.000000', 'wedobest', 'amazon', 'ravi', 2147483647, 991226417, 'amazon@abc.com', 'East Zone', 'I.Kapra', 'Dr AS Rao Nagar', '1', 'Parlors and Salons,Tattoo - Body Art,'),
(57, '2018-01-18', '11:27:06.000000', 'sai', 'wedobest', 'ravi', 2147483647, 2147483647, 'wedobest@abc.com', 'East Zone', 'II.Uppal Kalan', 'Chilukanagar', '1', 'Modular Kitchen,Interior Designers,Painting,');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(3) NOT NULL,
  `state_id` int(3) NOT NULL,
  `city_name` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_name`) VALUES
(1, 1, 'Kapra'),
(2, 1, 'Dr AS Rao Nagar'),
(3, 1, 'Cherlapalli'),
(4, 1, 'Meerpet HB Colony'),
(5, 1, 'Mallapur'),
(6, 1, 'Nacharam'),
(7, 2, 'Chilukanagar'),
(8, 2, 'Habsiguda'),
(9, 2, 'Ramanthapur'),
(10, 2, 'Uppal'),
(11, 3, 'Nagole'),
(12, 3, 'Mansoorabad'),
(13, 3, 'Hayaat nagar'),
(14, 3, 'BN Reddy Nagar'),
(15, 4, 'Vanasthalipuram'),
(16, 4, 'Hasthinapuram'),
(17, 4, 'Champapet'),
(18, 4, 'Lingojiguda'),
(19, 5, 'Saroornagar'),
(20, 5, 'Rama Krishna Puram'),
(21, 5, 'Kothapet'),
(22, 5, 'Chaitanyapuri'),
(23, 5, 'Gaddiannaram'),
(24, 6, 'Saidabad'),
(25, 6, 'Moosrambagh'),
(26, 6, 'Old Malakpet'),
(27, 6, 'Akberbagh'),
(28, 6, 'Azampura'),
(29, 6, 'Chavni'),
(30, 6, 'Dabeerpura'),
(31, 6, 'Chandrayan Gutta'),
(32, 6, 'Jangammet'),
(33, 6, 'Uppuguda'),
(34, 6, 'Rein Bazar'),
(35, 6, 'Kurmaguda'),
(36, 6, 'Chavni'),
(37, 6, 'Akberbagh'),
(38, 6, 'Sri Puram Colony'),
(39, 6, 'Old Malakpet'),
(40, 6, 'Azampura'),
(41, 6, 'Dabirpura'),
(42, 6, 'Noorkhan Bazar'),
(43, 6, 'Pathergatti'),
(44, 6, 'Talabchanchalam'),
(45, 6, 'Moghalpura'),
(46, 6, 'Gowlipura'),
(47, 6, 'Aliabad'),
(48, 7, 'Barkas'),
(49, 7, 'Lalithabagh'),
(50, 8, 'Falaknuma'),
(51, 8, 'Nawab Saheb Kunta'),
(52, 8, 'Jahanuma'),
(53, 8, 'Fathe Darwaza'),
(54, 8, 'Shah Ali banda'),
(55, 8, 'Hussain Alam'),
(56, 8, 'Ghansi Bazar'),
(57, 8, 'Begum Bazar'),
(58, 8, 'Gosha Mahal'),
(59, 8, 'Dhoolpet'),
(60, 8, 'Purana pul'),
(61, 8, 'Doodbowli'),
(62, 8, 'Ramnaspura'),
(63, 8, 'Kishanbagh'),
(64, 9, 'Suleman Nagar'),
(65, 9, 'Shastri puram'),
(66, 9, 'Mylardevpally'),
(67, 9, 'Rajendra Nagar'),
(68, 9, 'Attapur'),
(69, 10, 'Karwan'),
(70, 10, 'Ziaguda'),
(71, 10, 'Dattathreyanagar'),
(72, 10, 'Manghalhat'),
(73, 10, 'Asif Nagar'),
(74, 10, 'Muradnagar'),
(75, 10, 'Mehdipatnam'),
(76, 10, 'Gudimalkapur'),
(77, 10, 'Langar Houz'),
(78, 10, 'Tolichowki'),
(79, 10, 'Nanalnagar'),
(80, 10, 'Ahmed Nagar'),
(81, 10, 'Vijayanagar Colony'),
(82, 10, 'Chintalbasti'),
(83, 10, 'Mallepally'),
(84, 10, 'Red Hills'),
(85, 11, 'Jambagh'),
(86, 11, 'Gunfoundry'),
(87, 11, 'Sultan Bazar'),
(88, 12, 'Himayathnagar'),
(89, 12, 'Barkatpura'),
(90, 12, 'Kachiguda'),
(91, 12, 'Golnaka'),
(92, 12, 'Amberpet'),
(93, 12, 'Bagh Amberpet'),
(94, 12, 'Vidyanagar'),
(95, 12, 'Nallakunta'),
(96, 12, 'Bagh Lingampally'),
(97, 12, 'Adikmet'),
(98, 12, 'Ramnagar'),
(99, 12, 'Musheerabad'),
(100, 12, 'Bholakpur'),
(101, 12, 'Gandhinagar'),
(102, 12, 'Kavadiguda'),
(103, 12, 'Domalguda'),
(104, 13, 'Khairtabad'),
(105, 13, 'Punjagutta'),
(106, 13, 'Somajiguda'),
(107, 13, 'Sanjeeva Reddy Nagar/Ameerpet'),
(108, 13, 'Balkampet'),
(109, 13, 'Sanathnagar'),
(110, 13, 'Erragadda'),
(111, 13, 'Vengalrao Nagar'),
(112, 13, 'Srinagar colony'),
(113, 13, 'Banjara Hills'),
(114, 13, 'Yousufguda'),
(115, 13, 'Rahamath Nagar'),
(116, 13, 'Borabanda'),
(117, 13, 'Jubilee Hills'),
(118, 13, 'Shaikh pet'),
(119, 14, 'Kondapur'),
(120, 14, 'Gachibowli'),
(121, 14, 'Serilingampally'),
(122, 15, 'Madhapur'),
(123, 15, 'Miyapur'),
(124, 15, 'Hafeezpet'),
(125, 15, 'Chanda Nagar'),
(126, 15, 'Bharathinagar'),
(127, 15, 'Ramachandra Puram'),
(128, 15, 'Patancheruvu'),
(129, 16, 'KPHB Colony'),
(130, 16, 'Balajinagar'),
(131, 16, 'Allapur'),
(132, 16, 'Moosapet'),
(133, 16, 'Fathe Nagar'),
(134, 16, 'Old Bowenpally'),
(135, 16, 'Balanagar'),
(136, 16, 'Kukatpally'),
(137, 16, 'Vivekananda Nagar Colony'),
(138, 16, 'Hydernagar'),
(139, 16, 'Alwyn Colony'),
(140, 17, 'Gajula Ramaram'),
(141, 17, 'Jagadgirigutta'),
(142, 17, 'Rangareddy nagar'),
(143, 17, 'Chintal'),
(144, 17, 'Suraram'),
(145, 17, 'Subhashnagar'),
(146, 17, 'Qutbullapur'),
(147, 17, 'Jeedimetla'),
(148, 18, 'Macha Bollaram'),
(149, 18, 'Alwal'),
(150, 19, 'Venkatapuram'),
(151, 19, 'Neredmett'),
(152, 20, 'Vinayakanagar'),
(153, 20, 'Moula-Ali'),
(154, 20, 'East Anandbagh'),
(155, 20, 'Malkajgiri'),
(156, 20, 'Gautham Nagar'),
(157, 21, 'Addagutta'),
(158, 21, 'Tarnaka'),
(159, 21, 'Mettuguda'),
(160, 21, 'Seethaphalmandi'),
(161, 21, 'Boudha Nagar'),
(162, 21, 'Bansilalpet'),
(163, 21, 'Ramgopal Pet'),
(164, 21, 'Begumpet'),
(165, 21, 'Monda Market');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(3) NOT NULL,
  `country_name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'East Zone'),
(2, 'South Zone'),
(3, 'Central Zone'),
(4, 'West Zone'),
(5, 'North Zone');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(3) NOT NULL,
  `country_id` int(3) NOT NULL,
  `state_name` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`) VALUES
(1, 1, 'I.Kapra'),
(2, 1, 'II.Uppal Kalan'),
(3, 1, 'III-A.Hayathnagar'),
(4, 1, 'III-B.LB Nagar'),
(5, 1, 'III-C.Saroornagar'),
(6, 2, 'IV-A.Malakpet'),
(7, 2, 'IV-C.Malakpet'),
(8, 2, 'V.Erstwhile Circle II5'),
(9, 2, 'VI.Rajendra Nagar'),
(10, 3, 'VII.Erstwhile Circle IV'),
(11, 3, 'VIII.Erstwhile Circle VI'),
(12, 3, 'IX.Erstwhile Circle III'),
(13, 3, 'X.Erstwhile Circle V'),
(14, 4, 'XI Gachibowli'),
(15, 4, 'XII.Serilingampally'),
(16, 4, 'XIII.Ramachandra Puram / Patancheru'),
(17, 4, 'XIV.Kukatpally'),
(18, 5, 'XV.Quthbullapur'),
(19, 5, 'XVI.Alwal'),
(20, 5, 'XVII.Malkajgiri'),
(21, 5, 'XVIII.Secunderabad Division');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
