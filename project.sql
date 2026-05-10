-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2026 at 04:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `ride_id` int(11) DEFAULT NULL,
  `passanger_id` int(11) DEFAULT NULL,
  `booking_type` enum('carpool','private') DEFAULT NULL,
  `seats_booked` int(11) DEFAULT NULL CHECK (`seats_booked` > 0),
  `booking_status` varchar(50) DEFAULT NULL,
  `booking_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `ride_id`, `passanger_id`, `booking_type`, `seats_booked`, `booking_status`, `booking_time`) VALUES
(1, 1, 2, 'carpool', 1, 'confirmed', '07:00:00'),
(2, 1, 4, 'carpool', 1, 'confirmed', '07:10:00'),
(3, 2, 6, 'carpool', 1, 'confirmed', '08:00:00'),
(4, 2, 8, 'carpool', 1, 'confirmed', '08:05:00'),
(5, 3, 10, 'private', 2, 'confirmed', '06:30:00'),
(6, 4, 12, 'carpool', 1, 'confirmed', '09:00:00'),
(7, 4, 14, 'carpool', 1, 'confirmed', '09:10:00'),
(8, 5, 16, 'carpool', 1, 'confirmed', '05:00:00'),
(9, 5, 18, 'carpool', 1, 'confirmed', '05:10:00'),
(10, 6, 20, 'carpool', 2, 'cancelled', '07:30:00'),
(11, 7, 22, 'carpool', 1, 'confirmed', '08:00:00'),
(12, 8, 24, 'private', 2, 'confirmed', '10:00:00'),
(13, 9, 26, 'carpool', 1, 'confirmed', '06:00:00'),
(14, 9, 28, 'carpool', 1, 'confirmed', '06:10:00'),
(15, 10, 30, 'carpool', 1, 'confirmed', '07:00:00'),
(16, 11, 2, 'carpool', 1, 'confirmed', '05:30:00'),
(17, 12, 4, 'carpool', 1, 'cancelled', '08:30:00'),
(18, 13, 6, 'carpool', 2, 'confirmed', '09:00:00'),
(19, 14, 8, 'carpool', 1, 'confirmed', '07:00:00'),
(20, 15, 10, 'carpool', 1, 'confirmed', '06:30:00'),
(21, 16, 12, 'carpool', 2, 'confirmed', '05:00:00'),
(22, 17, 14, 'carpool', 1, 'confirmed', '07:00:00'),
(23, 18, 16, 'carpool', 1, 'confirmed', '06:00:00'),
(24, 19, 18, 'carpool', 2, 'confirmed', '04:00:00'),
(25, 20, 20, 'carpool', 1, 'confirmed', '07:30:00'),
(26, 23, 22, 'carpool', 1, 'cancelled', '06:00:00'),
(27, 24, 24, 'carpool', 1, 'cancelled', '08:00:00'),
(28, 25, 26, 'carpool', 1, 'cancelled', '05:00:00'),
(29, 25, 28, 'carpool', 1, 'cancelled', '05:05:00'),
(30, 26, 30, 'carpool', 2, 'cancelled', '07:00:00'),
(31, 21, 32, 'carpool', 1, 'confirmed', '08:00:00'),
(32, 22, 34, 'carpool', 1, 'confirmed', '09:00:00'),
(33, 27, 36, 'carpool', 2, 'confirmed', '08:30:00'),
(34, 28, 38, 'carpool', 1, 'confirmed', '10:00:00'),
(35, 29, 40, 'carpool', 1, 'confirmed', '06:30:00'),
(36, 30, 2, 'carpool', 1, 'confirmed', '07:30:00'),
(37, 31, 4, 'carpool', 2, 'confirmed', '05:00:00'),
(38, 32, 6, 'carpool', 1, 'confirmed', '08:00:00'),
(39, 33, 8, 'carpool', 1, 'confirmed', '09:30:00'),
(40, 34, 10, 'carpool', 1, 'confirmed', '07:30:00'),
(42, 5, 4, 'carpool', 2, 'confirmed', '00:45:44'),
(43, 6, 2, 'carpool', 1, 'confirmed', '00:45:44'),
(44, 6, 4, 'carpool', 1, 'confirmed', '00:45:44'),
(45, 6, 6, 'carpool', 1, 'confirmed', '00:45:44'),
(50, 11, 2, 'carpool', 1, 'confirmed', '00:45:44'),
(51, 11, 2, 'carpool', 1, 'confirmed', '00:45:44'),
(1187, 15, 41, 'carpool', 1, 'confirmed', '10:49:45'),
(1432, 42, 43, 'carpool', 1, 'confirmed', '11:00:07'),
(1714, 16, 41, 'carpool', 1, 'confirmed', '09:51:02'),
(1933, 14, 41, 'carpool', 1, 'confirmed', '09:59:49'),
(1990, 17, 41, 'carpool', 1, 'confirmed', '09:41:45'),
(2369, 27, 41, 'carpool', 1, 'confirmed', '10:04:50'),
(2409, 44, 41, 'carpool', 1, 'confirmed', '11:29:17'),
(2882, 38, 41, 'carpool', 1, 'confirmed', '09:36:39'),
(3068, 41, 43, 'carpool', 1, 'confirmed', '11:00:27'),
(3197, 13, 41, 'carpool', 1, 'confirmed', '09:03:23'),
(3641, 40, 41, 'carpool', 1, 'confirmed', '11:24:48'),
(3929, 13, 41, 'carpool', 1, 'confirmed', '09:38:30'),
(4218, 42, 43, 'carpool', 1, 'confirmed', '11:02:09'),
(4625, 19, 41, 'carpool', 1, 'confirmed', '10:42:56'),
(4784, 44, 41, 'carpool', 1, 'confirmed', '17:39:40'),
(4981, 31, 43, 'carpool', 1, 'confirmed', '11:02:21'),
(5056, 14, 41, 'carpool', 1, 'confirmed', '09:41:19'),
(5466, 15, 41, 'carpool', 1, 'confirmed', '09:59:43'),
(5507, 21, 41, 'carpool', 1, 'confirmed', '14:50:46'),
(5542, 39, 43, 'carpool', 1, 'confirmed', '11:04:18'),
(5650, 39, 41, 'carpool', 1, 'confirmed', '11:05:45'),
(5909, 16, 41, 'carpool', 1, 'confirmed', '09:49:41'),
(6025, 32, 41, 'carpool', 1, 'confirmed', '10:06:13'),
(6164, 40, 41, 'carpool', 1, 'confirmed', '11:24:38'),
(6173, 35, 41, 'carpool', 1, 'confirmed', '17:44:07'),
(6188, 19, 41, 'carpool', 1, 'confirmed', '10:57:08'),
(7179, 18, 41, 'carpool', 1, 'confirmed', '09:56:57'),
(8516, 11, 41, 'carpool', 1, 'confirmed', '09:03:19'),
(9454, 17, 41, 'carpool', 1, 'confirmed', '17:39:27'),
(9939, 20, 41, 'carpool', 1, 'confirmed', '10:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL CHECK (`amount` > 0),
  `payment_status` enum('done','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `amount`, `payment_status`) VALUES
(1, 1, 150, 'done'),
(2, 2, 150, 'done'),
(3, 3, 300, 'done'),
(4, 4, 300, 'done'),
(5, 5, 500, 'done'),
(6, 6, 200, 'done'),
(7, 7, 200, 'done'),
(8, 8, 800, 'done'),
(9, 9, 800, 'done'),
(10, 10, 360, 'pending'),
(11, 11, 220, 'done'),
(12, 12, 700, 'done'),
(13, 13, 120, 'done'),
(14, 14, 120, 'done'),
(15, 15, 200, 'done'),
(16, 16, 400, 'pending'),
(17, 17, 250, 'pending'),
(18, 18, 320, 'pending'),
(19, 19, 130, 'pending'),
(20, 20, 220, 'pending'),
(21, 21, 1200, 'pending'),
(22, 22, 450, 'pending'),
(23, 23, 700, 'pending'),
(24, 24, 2400, 'pending'),
(25, 25, 500, 'pending'),
(26, 26, 250, 'pending'),
(27, 27, 200, 'pending'),
(28, 28, 800, 'pending'),
(29, 29, 800, 'pending'),
(30, 30, 360, 'pending'),
(31, 31, 250, 'pending'),
(32, 32, 300, 'pending'),
(33, 33, 440, 'pending'),
(34, 34, 350, 'pending'),
(35, 35, 120, 'pending'),
(36, 36, 200, 'pending'),
(37, 37, 800, 'pending'),
(38, 38, 250, 'pending'),
(39, 39, 160, 'pending'),
(40, 40, 130, 'pending'),
(51, 11, 250, 'done'),
(82842, 3929, 160, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `ride_id` int(11) DEFAULT NULL,
  `passanger_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL CHECK (`rating_value` between 1 and 5),
  `feedback` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `ride_id`, `passanger_id`, `driver_id`, `rating_value`, `feedback`) VALUES
(1, 1, 2, 1, 5, 'Excellent driver!'),
(2, 1, 4, 1, 4, 'Smooth ride'),
(3, 2, 6, 3, 5, 'Very punctual'),
(4, 2, 8, 3, 4, 'Good experience'),
(5, 3, 10, 5, 5, 'Very comfortable'),
(6, 4, 12, 7, 4, 'Nice and clean car'),
(7, 4, 14, 7, 3, 'Slightly late'),
(8, 5, 16, 9, 5, 'Amazing trip!'),
(9, 5, 18, 9, 4, 'Good driver'),
(10, 6, 20, 11, 5, 'Would ride again'),
(11, 7, 22, 13, 4, 'Friendly driver'),
(12, 8, 24, 15, 5, 'Very professional'),
(13, 9, 26, 17, 3, 'Average experience'),
(14, 9, 28, 17, 4, 'Decent ride'),
(15, 10, 30, 19, 5, 'Highly recommend'),
(16, 2, 2, 3, 5, 'Great again!'),
(17, 3, 4, 5, 4, 'Comfortable seats'),
(18, 4, 10, 7, 5, 'On time always'),
(19, 5, 6, 9, 4, 'Pleasant journey'),
(20, 6, 8, 11, 5, 'Best carpool ever'),
(21, 7, 12, 13, 3, 'Could improve'),
(22, 8, 14, 15, 4, 'Good driver overall'),
(23, 9, 16, 17, 5, 'Very safe driver'),
(24, 10, 18, 19, 4, 'Will book again'),
(25, 1, 20, 1, 5, 'Superb experience'),
(26, 2, 4, 3, 4, 'Good morning ride'),
(27, 3, 6, 5, 5, 'Arrived on time'),
(28, 4, 8, 7, 4, 'Neat and tidy car'),
(29, 5, 10, 9, 5, 'Very helpful'),
(30, 6, 12, 11, 3, 'Okay experience'),
(31, 7, 14, 13, 4, 'Polite driver'),
(32, 8, 16, 15, 5, 'Loved the trip'),
(33, 9, 18, 17, 4, 'Safe and fast'),
(34, 10, 20, 19, 5, 'Top notch driver'),
(35, 1, 22, 1, 4, 'Reliable driver'),
(36, 2, 24, 3, 3, 'Average ride'),
(37, 3, 26, 5, 4, 'Comfortable trip'),
(38, 4, 28, 7, 5, 'Excellent service'),
(39, 5, 30, 9, 4, 'Good overall'),
(40, 6, 32, 11, 5, 'Perfect ride!');

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `ride_date` date DEFAULT NULL,
  `ride_time` time DEFAULT NULL,
  `available_seats` int(11) DEFAULT NULL CHECK (`available_seats` > 0),
  `fare` decimal(10,2) DEFAULT NULL,
  `status` enum('active','completed','cancelled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `driver_id`, `vehicle_id`, `source`, `destination`, `ride_date`, `ride_time`, `available_seats`, `fare`, `status`) VALUES
(1, 1, 1, 'Islamabad', 'Rawalpindi', '2026-05-10', '08:00:00', 3, 150.00, 'cancelled'),
(2, 3, 2, 'Lahore', 'Faisalabad', '2026-05-10', '09:00:00', 2, 300.00, 'completed'),
(3, 5, 3, 'Karachi', 'Hyderabad', '2026-05-11', '07:30:00', 2, 250.00, 'completed'),
(4, 7, 4, 'Peshawar', 'Nowshera', '2026-05-11', '10:00:00', 4, 200.00, 'completed'),
(5, 9, 5, 'Islamabad', 'Lahore', '2026-05-12', '06:00:00', 1, 800.00, 'completed'),
(6, 11, 6, 'Multan', 'Bahawalpur', '2026-05-12', '08:30:00', 1, 180.00, 'completed'),
(7, 13, 7, 'Quetta', 'Mastung', '2026-05-13', '09:00:00', 5, 220.00, 'completed'),
(8, 15, 8, 'Islamabad', 'Murree', '2026-05-13', '11:00:00', 2, 350.00, 'completed'),
(9, 17, 9, 'Lahore', 'Gujranwala', '2026-05-14', '07:00:00', 3, 120.00, 'completed'),
(10, 19, 10, 'Karachi', 'Thatta', '2026-05-14', '08:00:00', 2, 200.00, 'completed'),
(11, 21, 11, 'Islamabad', 'Abbottabad', '2026-05-15', '06:30:00', 1, 400.00, 'active'),
(12, 23, 12, 'Lahore', 'Sialkot', '2026-05-15', '09:30:00', 3, 250.00, 'cancelled'),
(13, 25, 13, 'Multan', 'Sahiwal', '2026-05-15', '10:00:00', 1, 160.00, 'active'),
(14, 27, 14, 'Peshawar', 'Mardan', '2026-05-16', '08:00:00', 1, 130.00, 'active'),
(15, 29, 15, 'Islamabad', 'Chakwal', '2026-05-16', '07:30:00', 1, 220.00, 'active'),
(16, 31, 16, 'Karachi', 'Sukkur', '2026-05-17', '06:00:00', 1, 600.00, 'active'),
(17, 33, 17, 'Lahore', 'Multan', '2026-05-17', '08:00:00', 2, 450.00, 'active'),
(18, 35, 18, 'Quetta', 'Turbat', '2026-05-18', '07:00:00', 2, 700.00, 'active'),
(19, 37, 19, 'Islamabad', 'Gilgit', '2026-05-18', '05:00:00', 4, 1200.00, 'active'),
(20, 39, 20, 'Karachi', 'Larkana', '2026-05-19', '08:30:00', 2, 500.00, 'active'),
(21, 1, 21, 'Rawalpindi', 'Islamabad', '2026-05-20', '09:00:00', 3, 150.00, 'active'),
(22, 3, 22, 'Faisalabad', 'Lahore', '2026-05-20', '10:00:00', 3, 300.00, 'active'),
(23, 5, 23, 'Hyderabad', 'Karachi', '2026-05-21', '07:00:00', 3, 250.00, 'cancelled'),
(24, 7, 24, 'Nowshera', 'Peshawar', '2026-05-21', '09:00:00', 4, 200.00, 'cancelled'),
(25, 9, 25, 'Lahore', 'Islamabad', '2026-05-22', '06:00:00', 3, 800.00, 'cancelled'),
(26, 11, 26, 'Bahawalpur', 'Multan', '2026-05-22', '08:00:00', 4, 180.00, 'cancelled'),
(27, 13, 27, 'Mastung', 'Quetta', '2026-05-23', '09:30:00', 4, 220.00, 'active'),
(28, 15, 28, 'Murree', 'Islamabad', '2026-05-23', '11:00:00', 2, 350.00, 'active'),
(29, 17, 29, 'Gujranwala', 'Lahore', '2026-05-24', '07:30:00', 3, 120.00, 'active'),
(30, 19, 30, 'Thatta', 'Karachi', '2026-05-24', '08:30:00', 2, 200.00, 'active'),
(31, 21, 31, 'Abbottabad', 'Islamabad', '2026-05-25', '06:00:00', 3, 400.00, 'active'),
(32, 23, 32, 'Sialkot', 'Lahore', '2026-05-25', '09:00:00', 2, 250.00, 'active'),
(33, 25, 33, 'Sahiwal', 'Multan', '2026-05-26', '10:30:00', 3, 160.00, 'active'),
(34, 27, 34, 'Mardan', 'Peshawar', '2026-05-26', '08:30:00', 3, 130.00, 'active'),
(35, 29, 35, 'Chakwal', 'Islamabad', '2026-05-27', '07:00:00', 2, 220.00, 'active'),
(36, 31, 36, 'Sukkur', 'Karachi', '2026-05-27', '06:30:00', 3, 600.00, 'active'),
(37, 33, 37, 'Multan', 'Lahore', '2026-05-28', '08:00:00', 4, 450.00, 'active'),
(38, 35, 38, 'Turbat', 'Quetta', '2026-05-28', '07:30:00', 2, 700.00, 'active'),
(39, 37, 39, 'Gilgit', 'Islamabad', '2026-05-29', '05:30:00', 4, 1200.00, 'active'),
(40, 39, 40, 'Larkana', 'Karachi', '2026-05-29', '08:00:00', 1, 500.00, 'active'),
(41, 1, 1, 'Murree', 'Lahore', '2026-07-15', '00:00:00', 4, 1000.00, 'active'),
(42, 1, 21, 'Murree', 'Karachi', '2026-06-21', '12:00:00', 6, 500.00, 'cancelled'),
(43, 1, 21, 'Murree', 'Karachi', '2026-06-21', '12:00:00', 4, 500.00, 'active'),
(44, 1, 1, 'Islamabad', 'Quetta', '2026-05-29', '03:45:00', 3, 2500.00, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `role` enum('Driver','Passanger') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone_no`, `role`) VALUES
(1, 'Ali Hassan', 'ali.hassan@gmail.com', 3001234, 'Driver'),
(2, 'Sara Khan', 'sara.khan@gmail.com', 3012345, 'Passanger'),
(3, 'Ahmed Raza', 'ahmed.raza@gmail.com', 3023456, 'Driver'),
(4, 'Fatima Noor', 'fatima.noor@gmail.com', 3034567, 'Passanger'),
(5, 'Usman Ali', 'usman.ali@gmail.com', 3045678, 'Driver'),
(6, 'Zara Malik', 'zara.malik@gmail.com', 3056789, 'Passanger'),
(7, 'Bilal Ahmed', 'bilal.ahmed@gmail.com', 3067890, 'Driver'),
(8, 'Hina Siddiqui', 'hina.sid@gmail.com', 3078901, 'Passanger'),
(9, 'Kamran Shah', 'kamran.shah@gmail.com', 3089012, 'Driver'),
(10, 'Nadia Iqbal', 'nadia.iqbal@gmail.com', 3090123, 'Passanger'),
(11, 'Tariq Mehmood', 'tariq.m@gmail.com', 3101234, 'Driver'),
(12, 'Sana Javed', 'sana.javed@gmail.com', 3112345, 'Passanger'),
(13, 'Omer Farooq', 'omer.farooq@gmail.com', 3123456, 'Driver'),
(14, 'Rabia Zahid', 'rabia.zahid@gmail.com', 3134567, 'Passanger'),
(15, 'Faisal Mirza', 'faisal.mirza@gmail.com', 3145678, 'Driver'),
(16, 'Ayesha Tariq', 'ayesha.tariq@gmail.com', 3156789, 'Passanger'),
(17, 'Hamza Butt', 'hamza.butt@gmail.com', 3167890, 'Driver'),
(18, 'Maham Riaz', 'maham.riaz@gmail.com', 3178901, 'Passanger'),
(19, 'Saad Qureshi', 'saad.q@gmail.com', 3189012, 'Driver'),
(20, 'Iqra Hussain', 'iqra.hussain@gmail.com', 3190123, 'Passanger'),
(21, 'Zain Ul Abideen', 'zain.ua@gmail.com', 3201234, 'Driver'),
(22, 'Maryam Asif', 'maryam.asif@gmail.com', 3212345, 'Passanger'),
(23, 'Shahid Latif', 'shahid.latif@gmail.com', 3223456, 'Driver'),
(24, 'Amna Waseem', 'amna.waseem@gmail.com', 3234567, 'Passanger'),
(25, 'Rehan Chaudhry', 'rehan.c@gmail.com', 3245678, 'Driver'),
(26, 'Lubna Farhan', 'lubna.farhan@gmail.com', 3256789, 'Passanger'),
(27, 'Imran Yousaf', 'imran.yousaf@gmail.com', 3267890, 'Driver'),
(28, 'Mehwish Alam', 'mehwish.alam@gmail.com', 3278901, 'Passanger'),
(29, 'Danish Saleem', 'danish.saleem@gmail.com', 3289012, 'Driver'),
(30, 'Sadia Nawaz', 'sadia.nawaz@gmail.com', 3290123, 'Passanger'),
(31, 'Arslan Khattak', 'arslan.k@gmail.com', 3301234, 'Driver'),
(32, 'Huma Bashir', 'huma.bashir@gmail.com', 3312345, 'Passanger'),
(33, 'Nabeel Akhtar', 'nabeel.akhtar@gmail.com', 3323456, 'Driver'),
(34, 'Farah Zaman', 'farah.zaman@gmail.com', 3334567, 'Passanger'),
(35, 'Waqas Anwar', 'waqas.anwar@gmail.com', 3345678, 'Driver'),
(36, 'Sumera Ijaz', 'sumera.ijaz@gmail.com', 3356789, 'Passanger'),
(37, 'Junaid Baig', 'junaid.baig@gmail.com', 3367890, 'Driver'),
(38, 'Noor Fatima', 'noor.fatima@gmail.com', 3378901, 'Passanger'),
(39, 'Asad Rehman', 'asad.rehman@gmail.com', 3389012, 'Driver'),
(40, 'Bushra Malik', 'bushra.malik@gmail.com', 3390123, 'Passanger'),
(41, 'Najah', 'najahsaad05@gmail.com', 1272317387, 'Passanger'),
(42, 'zavi', 'zavi@gmail.com', 752975, 'Driver'),
(43, 'iram', 'iram@gmail.com', 57892731, 'Passanger'),
(44, 'Syed Mustafa Ali', 'mustafa@gmail.com', 2147483647, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `car_model` varchar(50) DEFAULT NULL,
  `plate_no` varchar(50) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `driver_id`, `car_model`, `plate_no`, `capacity`) VALUES
(1, 1, 'Toyota Corolla', 'ABC-123', 4),
(2, 3, 'Honda Civic', 'DEF-456', 4),
(3, 5, 'Suzuki Alto', 'GHI-789', 3),
(4, 7, 'Hyundai Tucson', 'JKL-012', 5),
(5, 9, 'Toyota Prius', 'MNO-345', 4),
(6, 11, 'Kia', 'PQR-678', 5),
(7, 13, 'Honda BRV', 'STU-901', 6),
(8, 15, 'Suzuki Mehran', 'VWX-234', 3),
(9, 17, 'Toyota Vitz', 'YZA-567', 4),
(10, 19, 'Honda city', 'BCD-890', 3),
(11, 21, 'Toyota Fortuner', 'EFG-123', 7),
(12, 23, 'Honda City', 'HIJ-456', 4),
(13, 25, 'Suzuki Cultus', 'KLM-789', 4),
(14, 27, 'Hyundai Elantra', 'NOP-012', 4),
(15, 29, 'Toyota Yaris', 'QRS-345', 4),
(16, 31, 'Kia Picanto', 'TUV-678', 4),
(17, 33, 'Honda Vezel', 'WXY-901', 5),
(18, 35, 'Suzuki Wagon R', 'ZAB-234', 4),
(19, 37, 'Toyota Land Cruiser', 'CDE-567', 7),
(20, 39, 'Mitsubishi Lancer', 'FGH-890', 4),
(21, 1, 'Toyota Hilux', 'IJK-111', 5),
(22, 3, 'Honda Accord', 'LMN-222', 4),
(23, 5, 'Suzuki Swift', 'OPQ-333', 4),
(24, 7, 'Hyundai Sonata', 'RST-444', 4),
(25, 9, 'Toyota Camry', 'UVW-555', 4),
(26, 11, 'Kia Stinger', 'XYZ-666', 4),
(27, 13, 'Honda Fit', 'ABC-777', 4),
(28, 15, 'Suzuki Jimny', 'DEF-888', 3),
(29, 17, 'Toyota Rush', 'GHI-999', 6),
(30, 19, 'Daihatsu Cuore', 'JKL-000', 3),
(31, 21, 'Toyota Revo', 'MNO-111', 5),
(32, 23, 'Honda Freed', 'PQR-222', 6),
(33, 25, 'Suzuki Bolan', 'STU-333', 7),
(34, 27, 'Hyundai Venue', 'VWX-444', 4),
(35, 29, 'Toyota Aqua', 'YZA-555', 4),
(36, 31, 'Kia Sonet', 'BCD-666', 4),
(37, 33, 'Honda WRV', 'EFG-777', 5),
(38, 35, 'Suzuki Ertiga', 'HIJ-888', 6),
(39, 37, 'Toyota Prado', 'KLM-999', 7),
(40, 39, 'Mitsubishi Pajero', 'NOP-000', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `ride_id` (`ride_id`),
  ADD KEY `passanger_id` (`passanger_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD UNIQUE KEY `passanger_id` (`passanger_id`,`ride_id`),
  ADD KEY `ride_id` (`ride_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `ride` (`ride_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`passanger_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `ride` (`ride_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`passanger_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
