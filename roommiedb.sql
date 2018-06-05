-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 06:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roommiedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `resetToken` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `resetComplete` varchar(3) COLLATE utf8mb4_bin DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `oglas_za_cimera`
--

CREATE TABLE `oglas_za_cimera` (
  `cimer_id` int(11) NOT NULL,
  `pol` char(1) COLLATE utf8mb4_bin NOT NULL,
  `lifestyle` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `raspon_godina` int(11) NOT NULL,
  `osobine` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `hobi` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `radni_odnos` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `id_za_stan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `oglas_za_stan`
--

CREATE TABLE `oglas_za_stan` (
  `stan_id` int(11) NOT NULL,
  //`longituda` decimal(9,6) NOT NULL,
 // `latituda` decimal(9,6) NOT NULL,
 // `namestenost` varchar(20) COLLATE utf8mb4_bin NOT NULL,
 // `tip_objekta` varchar(20) COLLATE utf8mb4_bin NOT NULL, 
 // `grejanje` varchar(20) COLLATE utf8mb4_bin NOT NULL,
 // `pomocne_strukture` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  //`cena` int(11) NOT NULL,
  //`kvadratura` int(11) NOT NULL,
  //`broj_soba` int(11) NOT NULL,
  //`sprat` int(11) NOT NULL,
 // `lokacija` varchar(70) COLLATE utf8mb4_bin NOT NULL,
  //`telefon` varchar(20) COLLATE utf8mb4_bin NOT NULL,
 // `dodatno` varchar(255) COLLATE utf8mb4_bin NOT NULL,
 // `uknjizenost` char(2) COLLATE utf8mb4_bin NOT NULL,
  `datum_postavljanja` date NOT NULL,
  `memberID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `oglas_za_cimera`
--
ALTER TABLE `oglas_za_cimera`
  ADD PRIMARY KEY (`cimer_id`),
  ADD KEY `id_za_stan` (`id_za_stan`);

--
-- Indexes for table `oglas_za_stan`
--
ALTER TABLE `oglas_za_stan`
  ADD PRIMARY KEY (`stan_id`),
  ADD KEY `memberID` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
