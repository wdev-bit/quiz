-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2020 at 10:10 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angorabynayabcha_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Muhammad Faiz', 'faizshah167@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL,
  `qustion_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `answered_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `user_id`, `username`, `email`, `quiz_id`, `round_id`, `qustion_id`, `answer`, `is_correct`, `answered_on`) VALUES
(4, '5fb59d559fe3f70004d543fd', 'faiz shah', 'faizabdullwahab@gmail.com', 1, 2, 5, '2', 1, '2020-11-19 21:12:49'),
(5, '5fb7038ec3f2c10004ca1f87', 'Emily', 'emily@testtest.com', 1, 2, 5, '3', 0, '2020-11-19 23:46:02'),
(6, '5fb70370e8686b00048a5dbf', 'Karin G', 'karin@testing.com', 1, 2, 5, '1', 0, '2020-11-19 23:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `round_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answers` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `round_id`, `title`, `answers`, `correct_answer`, `created_at`, `update_at`) VALUES
(5, 1, 2, 'Who is our national poet?', '[\"Quad e Azam\",\"Allama Iqbal\",\"Liaqat Ali\",\"Sir Syed\"]', '2', '2020-11-19', '2020-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `start`) VALUES
(1, 'Trivia Quiz', 1),
(3, 'matt quiz 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_sessions`
--

CREATE TABLE `quiz_sessions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_sessions`
--

INSERT INTO `quiz_sessions` (`id`, `quiz_id`, `action`, `datetime`) VALUES
(1, 1, 'start', '2020-11-19 22:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `display_on` datetime NOT NULL,
  `display_till` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `quiz_id`, `display_on`, `display_till`) VALUES
(2, 1, '2020-11-20 00:25:00', '2020-11-20 04:55:00'),
(8, 1, '2020-11-20 05:44:00', '2020-11-20 06:45:00'),
(9, 3, '2020-11-19 18:23:00', '2020-11-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `livestream_iframe` text NOT NULL,
  `mosaic_iframe` text NOT NULL,
  `chat_iframe` text NOT NULL,
  `qrcode_image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `livestream_iframe`, `mosaic_iframe`, `chat_iframe`, `qrcode_image`, `logo`) VALUES
(1, '<iframe src=\"https://video.ibm.com/embed/24009918?autoplay=true\" class=\"first-i-frame\" id=\"strem\" style=\"border: 0;\" webkitallowfullscreen allowfullscreen frameborder=\"no\" width=\"1152\" height=\"648\">\r\n</iframe> ', '<iframe class=\"mosaic-iframe\"          \r\nsrc=\"https://virtualmosaic.com/spectrumreach\" gesture=\"media\" allow=\"encrypted-media\" allowfullscreen>\r\n</iframe>\r\n', '<iframe src=\"https://video.ibm.com/socialstream/24009918?videos=0\" class=\"third-i-frame\" id=\"chat\" style=\"border: 0;\" allowfullscreen frameborder=\"no\" width=\"880\" height=\"232\">\r\n</iframe>', 'uploads/1605700858.png', 'uploads/1605824791.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_sessions`
--
ALTER TABLE `quiz_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
