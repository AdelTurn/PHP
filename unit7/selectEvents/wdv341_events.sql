-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 12:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdv341`
--

-- --------------------------------------------------------

--
-- Table structure for table `wdv341_events`
--

CREATE TABLE `wdv341_events` (
  `events_id` int(11) NOT NULL,
  `events_name` varchar(500) NOT NULL,
  `events_description` longtext NOT NULL,
  `events_presenter` varchar(500) NOT NULL,
  `events_date` date NOT NULL,
  `events_times` time NOT NULL,
  `events_date_inserted` date NOT NULL,
  `events_date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wdv341_events`
--

INSERT INTO `wdv341_events` (`events_id`, `events_name`, `events_description`, `events_presenter`, `events_date`, `events_times`, `events_date_inserted`, `events_date_updated`) VALUES
(1, 'WDV 341 Intro PHP Course', 'An Introduction to the server side language known as PHP.', 'Jeff Gullion', '2021-10-17', '13:00:00', '2021-10-17', '2021-10-17'),
(2, 'WDV321 Advanced JavaScript', 'Advanced JavaScript discusses JS objects and AJAX calls.', 'Jeff Gullion', '2021-10-18', '15:00:00', '2021-10-18', '2021-10-18'),
(3, 'WDV351 Website Application Components', 'Focus on third party pieces of functionality that clients would like implemented on their websites.', 'Jeff Gullion', '2021-10-18', '20:00:00', '2021-10-18', '2021-10-18'),
(4, 'MKT135 Content Marketing', 'Learn how to do various content marketing strategies.', 'Andrew Felix', '2021-10-18', '12:00:00', '2021-10-18', '2021-10-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wdv341_events`
--
ALTER TABLE `wdv341_events`
  ADD PRIMARY KEY (`events_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wdv341_events`
--
ALTER TABLE `wdv341_events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
