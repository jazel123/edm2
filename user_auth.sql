-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 04:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Jazel', '$2y$10$ZAiwHvAcryKxwuAuuCyqU.9Z1sWAiAyrlb1zgsWzRbfP9Gx5zI09S', 'admin', '2024-10-19 01:40:15'),
(2, 'hakdog', '$2y$10$bRzCgiEBQXbIJPSUQUFG1exXdefgSYGbGvm7PvI3VXvLDzunH62M2', 'user', '2024-10-19 01:48:42'),
(3, 'Daryl', '$2y$10$/VRh9Al0Ob2E8wwtFX0FGe5W14AxNfCg6d30qIvc5dFXtZTTYaxYa', 'user', '2024-10-19 02:10:59'),
(4, 'edsel', '$2y$10$3LTx1RLUMUZQeIzmNlMRIO5cxoFjwMvPH5PrErR6aKwD.p7auCHNi', 'user', '2024-10-19 02:15:34'),
(5, 'baw', '$2y$10$zmdOYgmnNvRDMe2k5aN7pO6V92iLN8ph0awCjUzgAqcG/Z6WiO75e', 'user', '2024-10-19 02:17:31'),
(6, 'nimo', '$2y$10$Z8KiPwDHwDHlHLdeARMyauQ9UGIvL2cJjI5qz9cUltrfLXhNXK4Ne', 'user', '2024-10-19 02:25:34'),
(7, 'lia', '$2y$10$rENMiAYEY/ITiAu7DwtTa.fGVRvrVmp6Ts8ynv.lQ7PivJeiL/46u', 'user', '2024-10-19 02:25:53'),
(8, 'san', '$2y$10$D4ou/tsu.fcfxhoqvPoPpuftrkEOLy2JcmzfYm4HiycQukDKkhidm', 'user', '2024-10-19 02:30:41'),
(9, 'zel', '$2y$10$Y3HgYn3HsVKRCUDJjtFsXuDfNzRk888UgBU7p747NC0S7.JtjDxV6', 'user', '2024-10-19 02:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
