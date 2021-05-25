-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2021 at 12:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sec_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_verification_code` varchar(255) DEFAULT NULL,
  `user_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_active` tinyint(1) NOT NULL DEFAULT 0,
  `user_is_staff` tinyint(1) NOT NULL DEFAULT 0,
  `user_last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_username`, `user_email`, `user_password`, `user_verification_code`, `user_verified`, `user_active`, `user_is_staff`, `user_last_login`, `user_created`) VALUES
(3, 'bb', 'bbb', NULL, 'b@b.com', '$2y$10$lBgjLfDAB5JOhGlfxznTduEUeZyFhA.wvcuRvwi9rfLs3TtMQ/6Te', '1609193b03af76', 0, 0, 0, '2021-05-04 18:34:24', '2021-05-04 18:34:24'),
(4, 'cc', 'ccc', NULL, 'c@c.com', '$2y$10$0sxTj/YoquLEPMjMvU4sye1YiOgCiWtPHnEIOALNU648h43XaeSiO', '16091baf89744b', 0, 0, 0, '2021-05-04 21:22:00', '2021-05-04 21:22:00'),
(5, 'dd', 'ddd', NULL, 'd@d.com', '$2y$10$3UUC7PSqmMyd77nPcey21uKILh9hwp8.b.qU7GzVduQqWNSCigPiu', '16091bc0d4adae', 0, 0, 0, '2021-05-04 21:26:37', '2021-05-04 21:26:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
