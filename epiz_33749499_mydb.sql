-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.epizy.com
-- Generation Time: Mar 08, 2023 at 03:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33749499_mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `picture`) VALUES
(1, 'ghfdjh', 'shivam574488@gmail.com', '$2y$10$tm74zGpviy8vmQg3wIDYH.DeSAUtvObq9ZnGKhrtydnNO82dhTTHW', 'uploads/6408ace463e10_creator.png'),
(2, 'shivam574488@gmail.com', 'shiv44458@gmail.com', '$2y$10$xbh.Q.Tr/b5sU6pvr/T8.ONJ1e8XK6divEzxD3UG4kzv7DEHmf0QW', 'uploads/6408ad1aa4871_backend.png'),
(3, 'hjkfh', 'jsam@gmail.com', '$2y$10$dQOjODi.reAleEam4b0C3e6o4BrvvU3YXXRTHtLAHwqpF75cxR63u', 'uploads/6408ad3accb6a_carrent.png'),
(4, 'jgjfu', 'shffjmfh@gmail.com', '$2y$10$cUfBaZDyVj56wDMesLIfTuzBVj0NhdduEcxgCI6fYRscLqXCg4lD2', 'uploads/6408ae0d0f7b6_herobg.png'),
(5, 'Shivam Pandey ', 'shffjmfh@gmail.com', '$2y$10$38XHRRCGNxIXudM8VDgu2O9uSdk1CY3O4te3q2TypRf9GItdKFWnq', 'uploads/6408ae46651fd_jobit.png'),
(6, 'Shivam Pandey ', 'jsam@gmail.com', '$2y$10$EpXclr7dkkAu/y6AvidcaOmTphb.rtUsVnQ.8AY8FOebaUN/oDdZ2', 'uploads/6408ae6556484_jobit.png'),
(7, 'sam', 'shiv44458@gmail.com', '$2y$10$z1k8i4Ss1R2giKEsumxVg.ciUgaH3H/4lCJRAZ2x8cGCHjxVW2WUe', 'uploads/6408b096ab943_creator.png'),
(8, 'fgf', 'shivam574488@gmail.com', '$2y$10$2rhmc69EwohlrpuRaD/IAerJ.Hg4m6QP.qIIKumk9L.2HfmcgQ.fW', 'uploads/6408b6462602d_creator.png'),
(9, 'test', 'test@gmail.com', '$2y$10$GB3vpAhZ1XESJrknO7E0Vevbn.fg/nIVI3wwzeymjilvA0Q0YPGqq', 'uploads/6408c534e0957_tripguide.png'),
(10, 'sam', 'shffjmfh@gmail.com', '$2y$10$Huf9cvhcQIEPuGzwHjM4I.sXKWF8lyZctAPxk/PPji.tcRw/pCYnq', 'uploads/6408d3d71c1af_backend.png'),
(11, 'admin', 'admin@gmail.com', '$2y$10$8gXnfo1.61oB2gbi2SBavOS3ROVkOk3VW9cIUuS0rgE.ok507QR8W', 'uploads/6408ec573be14_mobile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
