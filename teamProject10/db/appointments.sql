-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Mar 23, 2023 at 12:49 AM

-- Server version: 10.4.27-MariaDB

-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `testing`

--

-- --------------------------------------------------------

--

-- Table structure for table `appointments`

--

CREATE TABLE
    `appointments` (
        `id` int(6) NOT NULL AUTO_INCREMENT,
        `email` varchar(50) NOT NULL,
        `first_name` varchar(30) NOT NULL,
        `last_name` varchar(30) NOT NULL,
        `date` date DEFAULT NULL,
        `time` time DEFAULT NULL,
        `booking_number` varchar(8) NOT NULL,
        `make` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
        `model` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
        PRIMARY KEY(id)
    );

--

--

-- Indexes for table `appointments`

--

ALTER TABLE `appointments`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `booking_number` (`booking_number`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `appointments`


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;