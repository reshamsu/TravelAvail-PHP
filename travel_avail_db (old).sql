-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 05:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_avail_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE `booking_tbl` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `carrental_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_date` date NOT NULL,
  `people` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_tbl`
--

INSERT INTO `booking_tbl` (`id`, `flight_id`, `hotel_id`, `carrental_id`, `user_id`, `payment_id`, `status`, `start_date`, `end_date`, `created_date`, `people`) VALUES
(1, 1, 0, 0, 1, 0, 'Active', '2024-02-24', '2024-02-27', '0000-00-00', 2),
(2, 0, 1, 0, 1, 0, 'Active', '2024-02-24', '2024-02-27', '0000-00-00', 3),
(3, 0, 0, 1, 2, 0, 'Active', '2024-02-24', '2024-02-25', '0000-00-00', 1),
(4, 1, 1, 0, 2, 0, 'Active', '2024-02-24', '2024-02-29', '0000-00-00', 2),
(5, 0, 1, 1, 2, 0, 'Inactive', '2024-02-27', '2024-02-29', '0000-00-00', 3),
(12, 1, 0, 0, 2, 31, 'Active', '2024-02-29', '2024-02-29', '2024-02-28', NULL),
(13, 1, 0, 0, 2, 32, 'Active', '2024-02-29', '2024-02-29', '2024-02-28', NULL),
(14, 1, 0, 0, 2, 33, 'Active', '2024-02-29', '2024-02-29', '2024-02-28', NULL),
(15, 1, 0, 0, 2, 34, 'Active', '2024-02-29', '2024-02-29', '2024-02-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carrental_tbl`
--

CREATE TABLE `carrental_tbl` (
  `id` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `dropoff_location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `people` varchar(255) NOT NULL,
  `no.ofseats` int(11) NOT NULL,
  `trip_fare` varchar(255) NOT NULL,
  `rental_title` varchar(255) NOT NULL,
  `rental_img` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrental_tbl`
--

INSERT INTO `carrental_tbl` (`id`, `pickup_location`, `dropoff_location`, `description`, `people`, `no.ofseats`, `trip_fare`, `rental_title`, `rental_img`, `created_date`) VALUES
(1, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 2 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>1 Small Bag</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\r\n', '2-Seater', 0, '$34', 'Honda s660', '1708711976Hondas660(2Seater).jpg', '2024-02-23'),
(2, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 2 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>3-4 Large Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\r\n', '1-Seater, 2-Seater, 3-Seater, 4-Seater', 0, '$26', 'Suzuki Jimny', '1708952306suzuki-jinmy(4seater).jpg', '2024-02-26'),
(3, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 2 Seater</p>\n\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\n\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>4-5 Small Bags</p>\n\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\n', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$42', 'Suzuki Swift', '1708956785suzuki-swift(5seater).png', '2024-02-26'),
(4, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 2 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>2-3 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\r\n', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$65', 'Suzuki Ignis', '1708957332suzuki-ignis(5seater).jpg', '2024-02-26'),
(5, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\n\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\n\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\n\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\n', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$78', 'Volkswagon Arteon', '1708958867volvo-arteon(5seater).png', '2024-02-26'),
(7, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 4-6 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>\r\n', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$41', 'Honda Civic', '1709046902honda-civic-sedan(5Seater).jpg', '2024-02-27'),
(8, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$100', 'Hyunai Sonata ', '1709048251hyundai-sonata(5seater).png', '2024-02-27'),
(9, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '1-Seater, 2-Seater, 3-Seater, 4-Seater,-5 Seater', 0, '$65', 'Toyota CH-R', '1709048775toyota-ch-r(5seater).png', '2024-02-27'),
(10, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>3-4 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$50', 'Volkswagon Tiguan', '1709048986wolkswagon-tiguan(5seater).png', '2024-02-27'),
(11, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$37', 'Honda CR-V', '1709050200honda-crv(5seater).jpg', '2024-02-27'),
(12, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>2-3 Large Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '1-Seater, 2-Seater, 3-Seater, 4-Seater, 5-Seater', 0, '$36', 'Hyundai Santa Fe 2050', '1709050541santa-fesport(5seater).png', '2024-02-27'),
(13, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 7 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>4-8 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '4-Seater, 5-Seater, 6-Seater, 7-Seater', 0, '$190', 'Volvo xc90', '1709050872volvo-xc90(6seater).jpg', '2024-02-27'),
(14, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 7 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5-6 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', ' 4-Seater, 5-Seater, 6-Seater, 7-Seater', 0, '$39', 'Kia Sorento', '1709051428kia-sorento(7seater).jpg', '2024-02-27'),
(15, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 7 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 7-8 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', ' 5-Seater, 6-Seater, 7-Seater', 0, '$96', 'Toyota Fortuner', '1709052622toyota_fortuner(7seater).jpg', '2024-02-27'),
(16, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>  7 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', ' 5-Seater, 6-Seater, 7-Seater', 0, '$135', 'Toyota Land Cruiser', '1709052992toyota-land-cruiser(5seater).jpg', '2024-02-27'),
(17, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-9 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '4-Seater, 5-Seater', 0, '$78', 'Land Rover Range Rover', '1709053591landrover-rangerover(5seater).png', '2024-02-27'),
(18, 'Colombo, Sri Lanka', 'Galle, Sri Lanka', '<p><i class=\"fa-solid fa-person\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> 5-7 Seater</p>\r\n\r\n<p><i class=\"bi bi-fan\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Air Conditioning</p>\r\n\r\n<p><i class=\"fa-solid fa-suitcase-rolling\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i>5-7 Medium Bags</p>\r\n\r\n<p><i class=\"fa-solid fa-gas-pump\" style=\"font-size: 18px; color: #333; margin-right: 6px;\"></i> Full-to-full</p>', '5-Seater, 6-Seater, 7-Seater', 0, '$54', 'Mercedes V-Class AMG', '1709054038mercedes-v-class-amg(6seater).jpg', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `flight_tbl`
--

CREATE TABLE `flight_tbl` (
  `id` int(11) NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `location_code1` varchar(255) NOT NULL,
  `location_code2` varchar(255) NOT NULL,
  `flight_detail1` varchar(255) NOT NULL,
  `flight_detail2` varchar(255) NOT NULL,
  `airline_time1` varchar(255) NOT NULL,
  `airline_time2` varchar(255) NOT NULL,
  `no_of_hours1` varchar(255) NOT NULL,
  `no_of_hours2` varchar(255) NOT NULL,
  `flight_info` varchar(255) NOT NULL,
  `trip_fare` varchar(255) NOT NULL,
  `location_info` varchar(255) NOT NULL,
  `airline_title` varchar(255) NOT NULL,
  `airline_img1` varchar(255) NOT NULL,
  `airline_img2` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_tbl`
--

INSERT INTO `flight_tbl` (`id`, `from_location`, `to_location`, `location_code1`, `location_code2`, `flight_detail1`, `flight_detail2`, `airline_time1`, `airline_time2`, `no_of_hours1`, `no_of_hours2`, `flight_info`, `trip_fare`, `location_info`, `airline_title`, `airline_img1`, `airline_img2`, `created_date`) VALUES
(1, 'Colombo, Sri Lanka (CMB)', 'Paris, France (PAR)', 'CMB', 'PAR', 'CMB - PAR, Qatar Airways', 'CDG - PAR, Air India', '8:15 PM - 6:20 AM', '11:15 AM - 8:30 PM', '14h 35m', '13h 45m', '1 stop', '$1034', 'CMB - PAR', 'Airline', '1708685724qatar.png', '1708685724air_india.jpg', '2024-02-23'),
(2, 'Colombo, Sri Lanka (CMB)', 'Paris, France (PAR)', 'CMB', 'PAR', 'CMB - ORY, Multiple Airlines', 'CDG - CMB, Qatar Airways', '4:35AM - 8:50PM', '8:05Am - 1:55AM', '20h 45m', '13h 20m', '2 stops', '$1034', 'CMB - PAR', 'Airline', '1708783567airline.png', '1708783567qatar.png', '2024-02-24'),
(3, 'Colombo, Sri Lanka (CMB)', 'Paris, France (PAR)', 'CMB', 'PAR', 'CMB - CDG, Qatar Airways', 'CDG - CMB, Qatar Airways', '11:15 AM - 8:30 PM', '10:00 AM - 8:25 AM', '13h 45m', '14h 20m', '1 stop', '$1,054', 'CMB - PAR', 'Qatar Airways', '1709057149qatar.png', '1709057149qatar.png', '2024-02-27'),
(4, 'Colombo, Sri Lanka (CMB)', 'London, United Kingdom (LON)', 'CMB', 'LON', 'CMB - CDG, Air India', 'CDG - CMB, Air India', '8:20 AM - 5:55 PM', '7:35 PM - 3:45 PM', '14h 5m', '15h 40m', '1 stops', '$867', 'CMB - LON', 'Air India', '1709057598air_india.jpg', '1709057598air_india.jpg', '2024-02-27'),
(5, 'Colombo, Sri Lanka (CMB)', 'London, United Kingdom (LON)', 'CMB', 'LON', 'CMB - CDG, Qatar Airways', 'CDG - CMB, Qatar Airways', '11:15 AM - 8:30 PM', '8:05 AM - 2:55 AM', '13h 45m', '14h 20m', '1 stop', '$1,339', 'CMB - LON', 'Qatar Airways', '1709057984qatar.png', '1709057984qatar.png', '2024-02-27'),
(6, 'Colombo, Sri Lanka (CMB)', 'London, United Kingdom (LON)', 'CMB', 'LON', 'CMB - CDG, Emirates', 'CDG - CMB, Emirates', '2:55 AM - 12:25 PM', '9:35 PM - 9:55 PM', '14h 0m', '19h 50m', '1 stop', '$1,348', 'CMB - LON', 'Emirates', '1709058189emirates.png', '1709058189emirates.png', '2024-02-27'),
(7, 'Colombo, Sri Lanka (CMB)', 'London, United Kingdom (LON)', 'CMB', 'LON', 'CMB - CDG, Air India', 'CDG - CMB, Multiple Airlines', '8:20 AM - 5:55 PM', '8:05 AM - 7:20 AM', '14h 5m', '18h 45m', '2 stops', '$1,259', 'CMB - LON', 'Air India', '1709058489air_india.jpg', '1709058489airline.png', '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_tbl`
--

CREATE TABLE `hotel_tbl` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `trip_fare` varchar(255) NOT NULL,
  `hotel_title` varchar(255) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_tbl`
--

INSERT INTO `hotel_tbl` (`id`, `hotel_name`, `description`, `trip_fare`, `hotel_title`, `hotel_img`, `created_date`) VALUES
(1, 'Cinnamon Grand, Colombo', 'Cinnamon Hotels & Resorts is a major Sri Lankan luxury hotel chain brand. Cinnamon Hotels was recognized as the most valuable hospitality brand in Sri Lanka for 2019.', '$145', 'Cinnamon Grand', '1708685864cinnamon.jpg', '2024-02-23'),
(2, 'Mövenpick, Colombo', 'Located in the heart of the city facing Galle Road and just 35 kilometers from the airport it provides the 5-star hotel with Luxury.', '$86', 'Mövenpick', '1708686166movenpick.jpg', '2024-02-23'),
(3, 'The Kingsbury Colombo', 'In the heart of Colombo, nestled between Galle Face Green and the city\'s busiest hub, the World Trade Centre. ', '$77', 'The Kingsbury', '1708686295kingsbury.jpg', '2024-02-23'),
(4, 'Shangri-La, Colombo', 'Enjoy world-class service amidst tranquil surroundings, coupled with inspirational design and transformative experiences in some of the world\'s finest urban addresses and resort destinations.', '$247', 'Shangri-La Colombo', '1708687819shangri-la-col.jpg', '2024-02-23'),
(5, 'Radission, Colombo', 'Welcome to Sri Lanka\'s diverse and tropical capital at Radisson Hotel Colombo. Featuring 158 rooms and suites with amenities for business and leisure travelers.', '$135', 'Raddission Colombo\r\n', '1708706619radisson.png', '2024-02-23'),
(6, 'Galle Face, Colombo', 'Sri Lanka\'s iconic landmark, The Galle Face Hotel, is situated in the heart of Colombo, along the seafront and facing the famous Galle Face Green. One of the oldest hotels east of the Suez, The Galle Face Hotel embraces its rich history and legendary trad', '$138', 'Galle Face Colombo', '1708706926galle_face.jpg', '2024-02-23'),
(7, 'Hilton, Colombo', 'Hilton Colombo Hotel offers direct access to Colombo\'s World Trade Centre. It features an outdoor pool, a 24-hour business center, and 10 dining outlets. Hilton Colombo Hotel is a 45-minute drive from the Bandaranaike International Airport. It is within w', '$99', 'Hilton Colombo', '1708767739hilton.jpg', '2024-02-24'),
(8, 'Shangri-La, La Paris', 'A former residence of Prince Roland Bonaparte and listed in the French \"Monuments Histories\", Shangri-La Hotel, Paris is a hotel palace located across the Seine and facing the Eiffel Tower. It reflects both Asian hospitality and French art de vivre.', '$1875', 'Shangri-La Paris', '1708769132shangri-la-paris.jpg', '2024-02-24'),
(9, 'Pullman Paris Tour Eiffel', 'Set on a tree-lined street, this high-end hotel on the Left Bank is a 4-minute walk from the Eiffel Tower, a 5-minute\' walk from Champ de Marks - Tour Effiel RER station, and 5 minutes from The Louvre.', '$354', 'Pullman Paris', '1708776589pullman-paris.jpg', '2024-02-24'),
(10, 'Hilton Paris La Defence', 'This contemporary business hotel set within the glass-fronted CNIT convention center is a 4-minute walk from the La Defence metro station and 9km from the Effiel Tower.', '$177', 'Hilton Paris La Defence', '1708777786hilton_paris_la_defence.jpg', '2024-02-24'),
(11, 'London Hilton on Park Lane', 'A 5-minute walk from the Hyde Park Corner tube station, this upscale high-rise hotel is also an 11-minute walk from Buckingham Palace. Amenities include an acclaimed restaurant with panoramic city views, a contemporary brasserie, and a fashionable 28th-fl', '$411', 'London Hilton', '1708778415london_hilton.jpg', '2024-02-24'),
(12, 'InterContinental London Park Lane, An IHG Hotel', 'A 3-minute walk from Hyde Park Corner tube station, this upscale hotel across the road from Green Park is also a 10-minute walk from Buckingham Palace and a mile from Hyde Park. The property has 2 restaurants and a cocktail lounge, plus a spa, exercise ro', '$388', 'InterContinental London', '1708778860intercontinental_park_lane_london.jpg', '2024-02-24'),
(13, 'Pan Pacific London', 'Set among eateries and office blocks, this refined luxury hotel is a 2-minute walk from Liverpool Street tube and train station. It\'s 17 minutes\' walk from the medieval Tower of London, a mile from St. Paul\'s Cathedral, and 7 miles from London City Airpor', '$506', 'Pan Pacific London', '1708782360pan_pacific_london.jpg', '2024-02-24'),
(14, 'Royal Lancaster London', 'Situated above Lancaster Gate tube station, this upscale hotel overlooking Hyde Park is 0.3 miles from Paddington tube and train station, offering direct links to Heathrow Airport. There\'s also a 24-hour exercise room. Business facilities include conferen', '$328', 'Royal Lancaster London', '1708782547royal_lancaster_london.jpg', '2024-02-24'),
(15, 'Hôtel du Louvre part of The Unbound Collection by Hyatt Paris', 'Across from the Louvre, this upscale hotel in the 1st arr. is steps from Palais Royal - Musée du Louvre metro station and a 13-minute walk from fine art at the Musée d\'Orsay. Other amenities include a fitness room, a 24-hour business center, and 8 meeting', '$723', 'Hôtel du Louvre Paris', '1708791220hôtel_du_louvre_paris.jpg', '2024-02-24'),
(16, 'Madison Hôtel Paris', 'A 1-minute walk from Saint-Germain-des-Prés metro stop, this refined hotel is 1 km from Sainte-Chapelle and the Conciergerie, a 13th-century gothic chapel. Breakfast is served (surcharge) in a plush lounge. There\'s a bar serving fine wine selections in an', '$495', 'Madison Hôtel Paris', '1708791641madison_paris.jpg', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `id` int(11) NOT NULL,
  `transaction_number` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `security_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `status` enum('Complete','','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`id`, `transaction_number`, `expiry_date`, `security_code`, `user_id`, `transaction_date`, `status`) VALUES
(1, 2147483647, '2025-01-14', 122, 1, '2024-02-25', 'Complete'),
(2, 1234567887, '2024-02-14', 243, 2, '2024-02-15', 'Complete'),
(3, 2147483647, '2024-02-08', 111, 1, '2024-02-26', 'Complete'),
(4, 2147483647, '2024-02-08', 111, 2, '2024-02-26', 'Complete'),
(5, 2147483647, '2024-02-08', 111, 2, '2024-02-26', 'Complete'),
(6, 2147483647, '2024-02-08', 111, 2, '2024-02-26', 'Complete'),
(9, 2147483647, '2024-02-29', 324, 2, '2024-02-26', 'Complete'),
(10, 2147483647, '2024-02-29', 324, 2, '2024-02-26', 'Complete'),
(11, 2147483647, '2024-04-29', 437, 2, '2024-02-27', 'Complete'),
(12, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(13, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(14, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(15, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(16, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(17, 2147483647, '2024-02-29', 767, 1, '2024-02-27', 'Complete'),
(18, 2147483647, '2024-04-30', 100, 1, '2024-02-27', 'Complete'),
(19, 2147483647, '2024-04-30', 100, 1, '2024-02-27', 'Complete'),
(20, 1234, '2024-04-30', 765, 2, '2024-02-28', 'Complete'),
(21, 1234, '2024-04-30', 765, 2, '2024-02-28', 'Complete'),
(22, 1234, '2024-04-30', 767, 2, '2024-02-28', 'Complete'),
(23, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(24, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(25, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(26, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(27, 1234, '2024-02-29', 767, 2, '2024-02-28', 'Complete'),
(28, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(29, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(30, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(31, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(32, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(33, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete'),
(34, 1234, '2024-04-29', 767, 2, '2024-02-28', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('User','Admin') NOT NULL,
  `status` enum('Active','Inactive','Official','') NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `address`, `role`, `status`, `created_date`) VALUES
(1, 'Administrator', 'TA', 'Admin', 'admin@travelavail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '11 col 54', 'Admin', 'Official', '2024-02-23'),
(2, 'Johndoe', 'John ', 'Doe', 'johndoe@gmail.com', '6c074fa94c98638dfe3e3b74240573eb128b3d16', '45th Station Avenue', 'User', 'Active', '2024-02-24'),
(3, 'Gayandj', 'Gayan', 'Dj', 'gayan@gmail.com', '658f84d99c4fddd858c83103cd2da053b3823dcd', '11 col Street', 'User', 'Active', '2024-02-24'),
(4, 'Drewliu', 'Drew', 'Liu', 'drewliu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '11 col Street', 'User', 'Active', '2024-02-24'),
(5, 'Adamreed', 'Adam ', 'Reed', 'adamreed@gmail.com', '9d6cb588a66fe21d47f583b75ef0820fcb0d59ff', '41st Park Street', 'User', 'Active', '2024-02-25'),
(6, 'Arthurcurrry', 'Arthur', 'Curry', 'arthurcurry@gmail.com', '814524856169845791c2a5a39b6c0ce9a1d3f79a', '9th Fork Town', 'User', 'Active', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrental_tbl`
--
ALTER TABLE `carrental_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_tbl`
--
ALTER TABLE `flight_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_tbl`
--
ALTER TABLE `hotel_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carrental_tbl`
--
ALTER TABLE `carrental_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `flight_tbl`
--
ALTER TABLE `flight_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel_tbl`
--
ALTER TABLE `hotel_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
