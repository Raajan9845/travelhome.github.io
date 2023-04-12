-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 09:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`id`, `admin_name`, `admin_pass`) VALUES
(1, 'travelhome', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leavings` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `address`, `location`, `guests`, `arrivals`, `leavings`) VALUES
(14, 'Rajan kumar jaiswal', 'raajan9845@gmail.com', '+9779812234803', 'pepsicola 32, kathmandu', 'npl', 2, '2023-02-28', '2023-03-07'),
(16, 'sandip kumar jaiswal', 'raajan9845@gmail.com', '+9779812234803', 'pepsicola 32, kathmandu', 'npl', 5, '2023-02-28', '2023-03-02'),
(17, 'ravi', 'raajan9845@gmail.com', '+9779812234803', 'pepsicola 32, kathmandu', 'npl', 3, '2023-02-28', '2023-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `image`, `name`, `description`, `removed`) VALUES
(42, 'IMG_74401.png', 'sd', 's', 1),
(43, 'IMG_62152.png', 'sc', 'df', 1),
(44, 'IMG_36818.jpg', 'scnsan,dcs', 'dfghjkl;scascascascas', 1),
(45, 'IMG_59064.jpg', 'treeking', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Expedita Et, Recusandae Nobis Fugit Modi Quibusdam Ea Assumenda, Nulla Quisquam Repellat Rem Aliquid Sequi Maxime Sapiente Autem Ipsum? Nobis, Provident Voluptate?', 0),
(47, 'IMG_51770.jpg', 'rajan', 'vdvdjcshjkachgcxabjdknasxfhgjvbaksnghj', 1),
(48, 'IMG_30630.png', 'mountaineering', 'cxzghjbcnkMZXZFGHvjbkn', 0),
(49, 'IMG_26729.jpg', 'rafting', 'wedghbuasduyaghwagubyuhabs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_image`
--

CREATE TABLE `package_image` (
  `sr_no` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_image`
--

INSERT INTO `package_image` (`sr_no`, `package_id`, `image`, `thumb`) VALUES
(13, 45, 'IMG_35191.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(255) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Travel Home', 'tours and travel \n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`id`, `name`, `email`, `message`, `date`, `seen`) VALUES
(7, 'Rajan kumar jaiswal', 'raajan9845@gmail.com', 'hvgmnv', '2023-02-28', 1),
(8, 'Rajan kumar jaiswal', 'raajan9845@gmail.com', 'hvgmnv', '2023-02-15', 1),
(9, 'Rajan kumar jaiswal', 'raajan9845@gmail.com', 'ertfyg', '2023-02-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_image`
--
ALTER TABLE `package_image`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `package_image`
--
ALTER TABLE `package_image`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `package_image`
--
ALTER TABLE `package_image`
  ADD CONSTRAINT `package_image_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
