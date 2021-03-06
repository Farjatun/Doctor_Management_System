-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 05:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_management_system`
--
CREATE DATABASE IF NOT EXISTS `doctor_management_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `doctor_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(13) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'dreamtechnology2050@gmail.com', '12345'),
(2, 'tushar.chowdhury@gmail.com', '112233');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(13) NOT NULL,
  `c_id` int(13) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `c_id`, `name`, `mobile_no`, `email`, `age`, `gender`, `address`, `date`) VALUES
(6, 49, 'FAHIM HASAN', '01676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '22-10-2017'),
(11, 26, 'fahim hasan', '01676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '22-10-2017'),
(12, 49, 'FAHIM HASAN', '12345', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '29-10-2017'),
(13, 26, 'fahim hasan', '1676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '23-10-2017'),
(14, 26, 'fahim', '1676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '24-10-2017'),
(15, 19, 'fahim hasan', '1676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '23-10-2017'),
(16, 52, 'fahim hasan', '01676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '25-10-2017'),
(17, 45, 'fahim hasan', '1676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '23-10-2017'),
(18, 27, 'FAHIM HASAN', '01676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '29-10-2017'),
(19, 61, 'fahim', '01676081282', 'dreamtechnology2050@gmail.com', '35', 'male', 'Akbarshah railway housing society chittagong', '29-10-2017');

-- --------------------------------------------------------

--
-- Table structure for table `chamber`
--

CREATE TABLE `chamber` (
  `c_id` int(13) NOT NULL,
  `chamber_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chamber_location` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_id` int(13) NOT NULL,
  `day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `max_app_day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `max_p_limit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timeto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chamber`
--

INSERT INTO `chamber` (`c_id`, `chamber_name`, `chamber_location`, `phone_no`, `d_id`, `day`, `max_app_day`, `max_p_limit`, `timeto`, `time`) VALUES
(19, 'Medical Centre', 'medical centre near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01917261337', 24, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '20', '18:00', '21:00'),
(20, 'CMC', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01912233678', 24, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '50', '10:00', '13:00'),
(21, 'Medical Center', 'medical center near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01717117372', 25, 'Saturday, Sunday, Monday, Tuesday, Thursday', '7', '50', '16:00', '18:00'),
(22, 'Keurex Diagonistic & Consultation Center', 'Keurex Diagonistic & Consultation Center,Halishahar, H/A, Chittagong', '01717117372', 25, 'Saturday, Monday, Tuesday, Thursday', '7', '60', '18:30', '20:00'),
(23, 'Chittagong Medical College', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01717117372', 25, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '7', '40', '10:00', '13:00'),
(24, 'Chittagong Bellview', 'Chittagong Bellview Lmt. ,O. R . Nizam Road,Chittagong', '01791936625', 23, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday, Friday', '6', '50', '17:00', '21:00'),
(25, 'Ideal Lab', 'Ideal Lab, Chittagong, Chittagong Division, Bangladesh', '01752154690', 26, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '30', '18:00', '21:00'),
(26, 'Medical Centre', 'medical centre near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01990376538', 27, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '30', '17:00', '21:00'),
(27, 'Medical Center', 'medical center near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01709937221', 29, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '3', '50', '19:00', '22:00'),
(28, 'Chittagong Medical College', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01709937221', 29, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '1', '100', '10:00', '13:00'),
(29, ' Medical center', 'medical center near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01711748893', 30, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '50', '18:00', '21:00'),
(30, 'Chittagong Medical College', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01711748893', 30, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '40', '10:00', '13:00'),
(31, 'Ideal Lab', 'Ideal Lab, Chittagong, Chittagong Division, Bangladesh', '01814498089', 31, 'Saturday, Sunday, Monday, Tuesday, Thursday', '3', '40', '19:00', '21:00'),
(32, 'Chittagong Medical College ', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01814498089', 31, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '1', '70', '10:00', '13:30'),
(33, 'Medical center ', 'medical center near GEC Circle Bus Stop, CDA Avenue, Chittagong, Chittagong Division, Bangladesh', '01817748640', 32, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '4', '50', '18:00', '21:00'),
(34, 'Chevron ', 'Chevron Clinical Laboratory Pvt Ltd, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01756203720', 33, 'Saturday, Monday, Wednesday', '4', '60', '19:00', '22:00'),
(35, 'Chevron', 'Chevron Clinical Laboratory Pvt Ltd, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01756203720', 34, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '3', '60', '07:00', '22:00'),
(36, 'Chevron', 'Chevron Clinical Laboratory Pvt Ltd, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01756203720', 35, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '4', '50', '17:00', '20:00'),
(37, 'Chevron', 'Chevron Clinical Laboratory Pvt Ltd, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01756203720', 36, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '5', '70', '17:00', '20:00'),
(38, 'Chevron ', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 37, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '4', '70', '15:00', '20:00'),
(39, 'Chevron ', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 38, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '5', '60', '17:00', '21:00'),
(40, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 39, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '6', '50', '19:00', '22:00'),
(41, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 40, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '5', '40', '18:00', '21:00'),
(42, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 41, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '4', '60', '10:00', '13:00'),
(43, ' Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 42, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '3', '40', '16:30', '19:00'),
(44, 'Chittagong Medical College', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01799203720', 42, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '1', '60', '10:00', '14:00'),
(45, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 43, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '50', '18:00', '22:00'),
(46, ' Chevron ', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 44, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '3', '60', '17:00', '22:30'),
(47, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 45, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '5', '70', '17:00', '22:00'),
(48, 'Chevron ', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 46, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '3', '60', '18:00', '22:00'),
(49, 'Chevron', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 47, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '2', '60', '10:00', '13:00'),
(50, 'Chevron ', 'Chevron Clinical Laboratory (Pte.) Ltd., Chittagong, Chittagong Division, Bangladesh', '01756203720', 47, 'Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday', '5', '70', '17:00', '22:00'),
(52, 'Metropolitan Clinic', 'Metropolitan Clinic, Chittagong, Chittagong Division, Bangladesh', '01715894863', 49, 'Saturday, Monday, Wednesday', '3', '40', '18:00', '22:00'),
(53, 'Chittagong Maa-O-Shishu Hospital Medical College', 'Chittagong Maa-O-Shishu Hospital Medical College, Chittagong, Chittagong Division, Bangladesh', '01873085215', 51, 'Monday, Tuesday, Wednesday', '2', '20', '18:00', '22:00'),
(54, 'Metropolitan Clinic', 'Metropolitan Clinic, Chittagong, Chittagong Division, Bangladesh', '01600554238', 51, 'Saturday, Monday, Thursday', '2', '20', '10:00', '12:00'),
(55, 'Alpha Lab', 'Alpha Lab, Road No. 1, Chittagong, Chittagong Division, Bangladesh', '01911305007', 52, 'Saturday, Sunday, Monday', '2', '30', '19:00', '23:00'),
(56, 'The Chittagong Lab', 'The Chittagong Lab, Chittagong, Chittagong Division, Bangladesh', '01554269102', 52, 'Tuesday, Wednesday, Thursday, Friday', '3', '40', '17:00', '20:00'),
(57, 'CSCR', 'CSCR, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01899423841', 53, 'Sunday, Monday, Thursday, Friday', '3', '40', '17:00', '22:00'),
(58, 'CSCR', 'CSCR, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01795559555', 54, 'Monday, Tuesday, Wednesday', '3', '30', '10:00', '13:00'),
(59, 'Chittagong Eye Emplementry Hospital', 'Chittagong Eye Emplementry Hospital, Foiz Lak  Golpahar Moor, Chittagong, Bangladesh', '01817708408', 55, 'Saturday, Monday, Friday', '4', '40', '10:00', '13:00'),
(60, 'CSCR', 'CSCR, O.R. Nizam Road, Chittagong, Chittagong Division, Bangladesh', '01618142091', 56, 'Sunday, Monday, Tuesday, Wednesday', '3', '40', '18:30', '21:30'),
(61, 'Chittagong Medical', 'Chittagong Medical College Hospital, Chittagong, Chittagong Division, Bangladesh', '01676081282', 58, 'Saturday, Sunday, Monday, Tuesday, Wednesday', '1', '20', '8:00am', '2:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(13) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bmdc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `working_field` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fees` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discounted_fees` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_real` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `last_name`, `email`, `password`, `bmdc`, `designation`, `working_field`, `experience`, `fees`, `discounted_fees`, `email_verified`, `is_real`) VALUES
(23, 'Md. Nasim', 'Vuiya', 'nasim.vuiya987@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '9876', 'MBBS, D Card', 'Cardiologist', '3', '500', '400', 'Yes', '2017-10-24 19:22:10'),
(24, 'Kamal Krishna', 'Pramanik', 'pramanik.kama8976@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '5346', 'MBBS, FCPS', 'ENT Specialist', '5', '700', '500', 'Yes', '2017-10-22 13:11:11'),
(25, 'Alamgir', 'Md. Soyeb', 'soyeb872_alamgir@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '3546', 'MBBS, DLO(BSMMU)', 'ENT Specialist', '7', '800', '500', 'Yes', '2017-10-22 13:11:10'),
(26, 'Sharmin Hossen', 'Munni', 'munni.sharmin@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2354', 'MBBS, DGO', 'Gynaecologist', '3', '500', '300', 'Yes', '2017-10-22 13:11:09'),
(27, 'A. A. M. Rayhan ', 'Uddin', 'rayhan874_uddin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3548', 'MBBS, MCPS, FCCS(USA), FCPS', 'Medicine', '10', '1000', '500', 'Yes', '2017-10-22 13:11:08'),
(29, 'Md Anwarul', 'Kibria', 'kibria872.anwar@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '3244', 'MBBS, BCS(Health), MD(Neuro medicine)', 'Neurologist', '5', '600', '500', 'Yes', '2017-10-22 13:11:08'),
(30, 'MD. Rabiul', 'Karim', 'karim2763.rabi@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2435', 'MBBS, MS(Neuro Surgery), Assistant Professor(CMC)', 'Neurologist', '10', '600', '500', 'Yes', '2017-10-22 13:11:07'),
(31, 'Jahidul', 'Hasan', 'jahid651@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2432', 'MBBS, BCS(Health), DDV, MD(Course)', 'Skin & Venereal diseases', '7', '1000', '800', 'Yes', '2017-10-22 13:11:06'),
(32, 'Md. MIzanur', 'Rahman', 'mizanuro@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2332', 'MBBS, BCs(Health), MS(Urology)', 'Urology', '6', '1000', '700', 'Yes', '2017-10-22 13:11:05'),
(33, 'Md.Kafil', 'Uddin', 'kafiluddin123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'MBBS,MD(Cardiologist)', 'Cardiologist', '5', '500', '300', 'Yes', '2017-10-22 13:11:04'),
(34, 'Zhinuk', 'Baidya', 'zhinukbaidya123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1231', 'MBBS,MD,PhD', 'Cardiologist', '5', '1000', '800', 'Yes', '2017-10-22 13:11:03'),
(35, 'A.K.M Monzur', 'Morshed', 'monzur.morsed456@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '4568', 'MBBS,FCPS,DME', 'Cardiologist', '3', '1500', '1300', 'Yes', '2017-10-22 13:11:02'),
(36, 'Ujjal', 'Barua', 'ujjalbarua789@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '4567', 'MBBS,BCS,FCPS(Urology)', 'Urology', '2', '1000', '800', 'Yes', '2017-10-22 13:11:01'),
(37, 'Md.Nurul', 'Huda', 'nurulhuda576@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '4550', 'MBBS,MCPS(M),FCPS(M),MD(Nephrology)', 'Nephrology', '2', '1000', '800', 'Yes', '2017-10-22 13:11:00'),
(38, 'Munir Ahsan', 'Khan', 'munirahsan6534@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1322', 'MBBS,M.MED SCI(UK)', 'Nephrology', '2', '1500', '1300', 'Yes', '2017-10-22 13:10:59'),
(39, 'Purnendu Bikash', 'Roy', 'purnendubikash.roy43@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1235', 'MBBS,FRCS(Edin),FCPS', 'Nephrology', '5', '1000', '800', 'Yes', '2017-10-22 13:10:58'),
(40, 'Md.Masud', 'Karim', 'masudkarim48@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2113', 'MBBS,FCPS,FNUH', 'General Surgery', '3', '500', '600', 'Yes', '2017-10-22 13:10:57'),
(41, 'Shagorika', 'Sharmeen', 'shagorikasharmeen1232@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1321', 'MBBS,BCS,FCPS,EMCH', 'General Surgery', '3', '500', '500', 'Yes', '2017-10-22 13:10:56'),
(42, 'Samira', ' Jamal', 'samira3321.jjamal@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2342', 'MBBS,BCS,MD(Dermatology)', 'Skin & Venereal diseases', '3', '500', '400', 'Yes', '2017-10-22 13:10:55'),
(43, 'Mohd. Ibrahim Khalil', ' Ullah', 'ibrahim4544halilUllah@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1255', 'MBBS.DTCD.MS', 'Chest and Respiratory Medicine', '3', '400', '300', 'Yes', '2017-10-22 13:10:51'),
(44, 'Md. Shahadat', 'Hossain', 'shahadat333.hossain@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '4444', 'MBBS.MCPS.FCPS.FCCP', 'Chest and Respiratory Medicine', '2', '300', '300', 'Yes', '2017-10-22 13:10:49'),
(45, 'Uzzwal Kanti ', 'Das', 'uzzwalkanti778.das@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6676', 'MBBS.DTCD.FCPS.FCCP', 'Chest and Respiratory Medicine', '4', '800', '600', 'Yes', '2017-10-22 13:10:48'),
(46, 'Shimul Kumar ', 'Bhowmik', 'shimulkumar999.bhowmik@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1121', 'MD(Chest Diseases)', 'Chest and Respiratory Medicine', '2', '750', '700', 'Yes', '2017-10-22 13:10:47'),
(47, 'S.M. Sarwar', 'Alam', 'sarwaralam121@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '3343', 'BDS.PGT', 'Dentist', '3', '450', '400', 'Yes', '2017-10-22 13:10:46'),
(49, 'Didarul ', 'Alam', 'didarulalam@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2345', 'FCPS, MD, DCH, MBBS', 'Child Specialist', '15', '500', '400', 'Yes', '2017-10-23 20:19:35'),
(51, ' MD. ABUL HOSSEIN', ' SHAHIN', 'abulhossein@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '7894', 'MBBS, BCS, BSMMU', 'Cardiologist', '6', '700', '600', 'Yes', '2017-10-23 20:19:35'),
(52, 'Tanjila', ' Karim', 'tanjila123@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '8542', 'MBBS, FCPS, BSC', 'Gynaecologist', '8', '1000', '800', 'Yes', '2017-10-23 20:19:35'),
(53, 'Md. Abdul', ' Alim', 'abdulalim567@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '5236', 'MBBS, FCPS (ENT), DLO', 'ENT Specialist', '10', '650', '', 'Yes', '2017-10-23 20:19:47'),
(54, 'Md. Hasanuzzaman', 'Khan', 'khan009988@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '5874', 'MBBS, FCPS (Medicine), MD (Neurology)', 'Neurologist', '5', '500', '300', 'Yes', '2017-10-23 20:19:47'),
(55, ' Golam Mostafa ', 'Chowdhury', 'golam.mostofa23@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '8523', 'MBBS. DCO (Ophthalmologist)', 'Eye Specialist', '9', '1000', '800', 'Yes', '2017-10-23 20:19:47'),
(56, 'Prof. S. M. Tariq', 'Alam', 'tariq123@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '9632', 'MBBS, DO (DU), MS (London)', 'Eye Specialist', '10', '700', '600', 'Yes', '2017-10-23 20:19:53'),
(58, 'fahim', 'hasan', 'dreamtechnology2050@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'MBBS', 'Medicine', '5', '600', '500', 'Yes', '2017-10-24 19:25:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `chamber`
--
ALTER TABLE `chamber`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `chamber_id` (`d_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `chamber`
--
ALTER TABLE `chamber`
  MODIFY `c_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `chamber` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chamber`
--
ALTER TABLE `chamber`
  ADD CONSTRAINT `chamber_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
