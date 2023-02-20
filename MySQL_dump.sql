-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2022 at 07:20 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `insurance`
--

DROP TABLE IF EXISTS `insurance`;
CREATE TABLE IF NOT EXISTS `insurance` (
  `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `iname` varchar(40) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  PRIMARY KEY (`_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`_id`, `patient_id`, `iname`, `from_date`, `to_date`) VALUES
(1, 1, 'Blue Cross', '2015-10-15', '2016-10-01'),
(2, 2, 'Medicaid', '2022-10-01', '2022-10-31'),
(3, 3, 'Green Shield', '2012-10-01', '2019-10-31'),
(4, 4, 'Medicare', '2012-10-01', '2015-10-16'),
(5, 5, 'Blue Shield', '1992-10-30', '2012-10-30'),
(11, 1, 'Medicaid', '2020-10-30', '2022-10-12'),
(12, 2, 'Green Shield', '2012-10-18', '2018-10-19'),
(13, 3, 'Medicaid', '2022-10-30', '2025-10-30'),
(14, 4, 'Medicaid', '2022-10-30', '2024-10-30'),
(15, 5, 'Medicaid', '2012-10-30', '2024-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pn` varchar(11) DEFAULT NULL,
  `first` varchar(15) DEFAULT NULL,
  `last` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`_id`, `pn`, `first`, `last`, `dob`) VALUES
(1, '00000000001', 'Bob', 'Kennedy', '1987-09-22'),
(2, '00000000002', 'Amy', 'Webb', '1995-12-31'),
(3, '00000000003', 'Peeter', 'Barrett', '1997-06-09'),
(4, '00000000004', 'Juss', 'Cole', '1999-10-06'),
(5, '00000000005', 'Kate', 'Simpson', '1962-10-10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
