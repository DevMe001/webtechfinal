-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 12:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slu`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `surName` varchar(20) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `username`, `password`, `firstName`, `surName`, `role`) VALUES
(30, 'mikka', '$2y$10$TKL9cd149LUlD3LmIRptW.8Ym/6I3jnPG02c2k6h8wCLOLOrmXaKq', 'Micaella', 'Santiago', 'c'),
(32, 'jc', '$2y$10$TKL9cd149LUlD3LmIRptW.8Ym/6I3jnPG02c2k6h8wCLOLOrmXaKq', 'John Christopher', 'So', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `streamCode` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `multimedia`
--

CREATE TABLE `multimedia` (
  `fileID` int(11) NOT NULL,
  `fileTitle` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `uploadTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multimedia`
--

INSERT INTO `multimedia` (`fileID`, `fileTitle`, `filePath`, `uploadTime`) VALUES
(60, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-11 03:20:33'),
(61, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-11 03:21:25'),
(62, 'clips', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:22:53'),
(63, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:25:51'),
(64, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:27:38'),
(65, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:33:03'),
(66, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:33:42'),
(67, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:34:04'),
(68, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:38:52'),
(69, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 03:39:49'),
(70, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 04:29:20'),
(71, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 04:43:04'),
(72, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 06:46:59'),
(73, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 06:50:59'),
(74, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 08:13:29'),
(75, 'apk', '../ContentCreator/uploads/Screen_Recording_20231212_224532.mp4', '2024-01-11 08:40:09'),
(76, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-11 08:46:22'),
(77, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-11 08:48:22'),
(78, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-12 08:00:09'),
(79, 'clips', '../ContentCreator/uploads/tictac.mp4', '2024-01-12 08:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `quename` varchar(100) NOT NULL,
  `quepath` varchar(100) NOT NULL,
  `uploadTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `quename`, `quepath`, `uploadTime`) VALUES
(1, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-11 18:52:07'),
(2, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 18:59:23'),
(3, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-11 19:15:39'),
(4, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-11 19:19:04'),
(5, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 19:20:12'),
(6, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-11 19:20:29'),
(7, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-11 19:21:35'),
(8, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-11 19:21:49'),
(9, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-11 19:32:07'),
(10, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-11 19:32:20'),
(11, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-11 19:32:24'),
(12, 'apk', '../ContentCreator/uploads/Screen_Recording_20231212_224532.mp4', '2024-01-11 19:42:56'),
(13, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-11 19:43:11'),
(14, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-12 15:42:43'),
(15, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-12 15:42:47'),
(16, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-12 15:43:31'),
(17, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-12 15:43:53'),
(18, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-12 15:44:10'),
(19, 'clips', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-12 15:44:18'),
(20, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-12 15:44:48'),
(21, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-12 15:45:01'),
(22, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-12 15:45:31'),
(23, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-12 15:52:12'),
(24, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-12 15:52:18'),
(25, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-12 15:52:31'),
(26, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-12 15:56:36'),
(27, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-12 16:00:12'),
(28, 'clips', '../ContentCreator/uploads/tictac.mp4', '2024-01-12 16:00:38'),
(29, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-12 18:11:03'),
(30, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-12 18:11:03'),
(31, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 09:49:49'),
(32, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 09:50:00'),
(33, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 09:50:16'),
(34, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 09:50:22'),
(35, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 09:50:30'),
(36, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 09:52:10'),
(37, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 09:55:16'),
(38, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 09:55:33'),
(39, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 09:59:04'),
(40, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 09:59:48'),
(41, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 10:05:03'),
(42, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 10:05:13'),
(43, 'clips', '../ContentCreator/uploads/tictac.mp4', '2024-01-13 10:05:16'),
(44, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:06:01'),
(45, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 10:07:10'),
(46, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 10:08:05'),
(47, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 10:08:48'),
(48, 'clips', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 10:08:53'),
(49, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:19:09'),
(50, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 10:40:00'),
(51, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 10:40:07'),
(52, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 10:40:26'),
(53, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 10:40:38'),
(54, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 10:42:29'),
(55, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:42:35'),
(56, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:43:28'),
(57, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 10:44:14'),
(58, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 10:44:21'),
(59, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 10:45:38'),
(60, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 10:46:24'),
(61, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 10:46:35'),
(62, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:49:53'),
(63, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 10:51:36'),
(64, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 10:52:03'),
(65, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 10:54:13'),
(66, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 10:55:57'),
(67, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 10:56:44'),
(68, 'clips', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 11:07:41'),
(69, 'clips', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 11:07:42'),
(70, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:08:44'),
(71, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 11:10:05'),
(72, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 11:11:04'),
(73, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 11:13:15'),
(74, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 11:13:24'),
(75, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:20:19'),
(76, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-13 11:20:24'),
(77, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 11:33:26'),
(78, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-13 11:38:56'),
(79, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:39:25'),
(80, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-13 11:41:21'),
(81, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:44:03'),
(82, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:51:02'),
(83, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 11:51:05'),
(84, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 11:53:19'),
(85, 'drama movie', '../ContentCreator/uploads/videoplayback.mp4', '2024-01-13 11:53:34'),
(86, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:56:44'),
(87, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:56:57'),
(88, 'tetvideo', '../ContentCreator/uploads/wood-mp4.mp4', '2024-01-13 11:57:01'),
(89, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 11:57:30'),
(90, 'tetvideo', '../ContentCreator/uploads/Wood of Crimson-video.mp4', '2024-01-13 12:02:10'),
(91, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-13 12:02:22'),
(92, 'tetvideo', '../ContentCreator/uploads/1 minute funny videos.mp4', '2024-01-13 12:07:24'),
(93, 'countdown', '../ContentCreator/uploads/Countdown.mp4', '2024-01-13 12:15:21'),
(94, 'clips', '../ContentCreator/uploads/3d-glass.mp4', '2024-01-13 12:16:13'),
(95, 'tetvideo', '../ContentCreator/uploads/Geometric-mp4.mp4', '2024-01-13 12:27:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `recentplaylist`
-- (See below for the actual view)
--
CREATE TABLE `recentplaylist` (
`fileID` int(11)
,`fileTitle` varchar(255)
,`filePath` varchar(255)
,`uploadTime` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `recentqueue`
-- (See below for the actual view)
--
CREATE TABLE `recentqueue` (
`id` int(11)
,`quename` varchar(100)
,`quepath` varchar(100)
,`uploadTime` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `recorded`
--

CREATE TABLE `recorded` (
  `recordID` int(11) NOT NULL,
  `streamcode` int(11) NOT NULL,
  `recFile` varchar(260) NOT NULL,
  `dateOfStream` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `recentplaylist`
--
DROP TABLE IF EXISTS `recentplaylist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recentplaylist`  AS SELECT `multimedia`.`fileID` AS `fileID`, `multimedia`.`fileTitle` AS `fileTitle`, `multimedia`.`filePath` AS `filePath`, `multimedia`.`uploadTime` AS `uploadTime` FROM `multimedia` WHERE `multimedia`.`uploadTime` >= curdate() AND `multimedia`.`uploadTime` < curdate() + interval 1 day ORDER BY `multimedia`.`uploadTime` DESC LIMIT 0, 1 ;

-- --------------------------------------------------------

--
-- Structure for view `recentqueue`
--
DROP TABLE IF EXISTS `recentqueue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recentqueue`  AS SELECT `queue`.`id` AS `id`, `queue`.`quename` AS `quename`, `queue`.`quepath` AS `quepath`, `queue`.`uploadTime` AS `uploadTime` FROM `queue` WHERE cast(`queue`.`uploadTime` as date) >= curdate() AND `queue`.`uploadTime` < curdate() + interval 1 day ORDER BY `queue`.`uploadTime` DESC LIMIT 0, 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`streamCode`),
  ADD KEY `fkuserID` (`userID`);

--
-- Indexes for table `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recorded`
--
ALTER TABLE `recorded`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `fkstreamcode` (`streamcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `streamCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `recorded`
--
ALTER TABLE `recorded`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fkuserID` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`);

--
-- Constraints for table `recorded`
--
ALTER TABLE `recorded`
  ADD CONSTRAINT `fkstreamcode` FOREIGN KEY (`streamcode`) REFERENCES `logs` (`streamCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
