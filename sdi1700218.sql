-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 08:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1700218`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `identification` varchar(50) DEFAULT NULL,
  `diploma` varchar(50) DEFAULT NULL,
  `grades` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `identification`, `diploma`, `grades`) VALUES
(92, '61eda618c1d9e', '61eda618c2153', '61eda618c261f'),
(94, '61edab5f7a920', '61edab5f7ab69', '61edab5f7aef2'),
(95, '61edac7616aeb', '61edac7616ed2', '61edac761718a'),
(96, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `surname` varchar(15) DEFAULT NULL,
  `father_name` varchar(15) DEFAULT NULL,
  `mother_name` varchar(15) DEFAULT NULL,
  `amka` varchar(11) DEFAULT NULL,
  `afm` varchar(9) DEFAULT NULL,
  `identification_type` varchar(10) DEFAULT NULL,
  `ID_num` varchar(9) NOT NULL,
  `road` varchar(20) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `number` varchar(2) DEFAULT NULL,
  `pobox` varchar(5) DEFAULT NULL,
  `cel` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `study_cycle` varchar(20) NOT NULL,
  `diploma_country` varchar(10) NOT NULL,
  `university` varchar(50) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `consent` varchar(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `after_issued` varchar(50) NOT NULL,
  `equivalent_university` varchar(50) DEFAULT NULL,
  `equivalent_department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `surname`, `father_name`, `mother_name`, `amka`, `afm`, `identification_type`, `ID_num`, `road`, `city`, `number`, `pobox`, `cel`, `email`, `study_cycle`, `diploma_country`, `university`, `department`, `user_id`, `comment`, `consent`, `created_at`, `status`, `payment`, `after_issued`, `equivalent_university`, `equivalent_department`) VALUES
(92, 'Ren', 'Canga', 'Max', 'Jane', '17019978945', '789456123', 'Ταυτότητα', 'AK 789456', 'Oulof Palme', 'Athens', '2', '15771', '6947189568', 'renc@gmail.com', 'Μεταπτυχιακό', 'Αγγλία', 'University of Oxford', 'ΠΛΗΡΟΦΟΡΙΚΗΣ', 27, '', 'yes', '2022-01-22 22:00:00', 'standBy', 'deposit', 'Αποστολή Έντυπου και e-statement', NULL, NULL),
(94, 'Teo', 'Pagkrakiotis', 'Giannis', 'Artemis', '24029978945', '789456123', 'Ταυτότητα', 'BT 789456', 'psaron', 'Peristeri', '7', '19656', '6947189789', 'teo@gmail.com', 'Διδακτορικό', 'Γερμανία', 'Ludwig-Maximilians-University (LMU) Munich', 'ΦΥΣΙΚΗΣ', 28, '', 'yes', '2022-01-22 22:00:00', 'checked', 'deposit', 'e-statement', 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'ΤΜΗΜΑ ΦΥΣΙΚΗΣ'),
(95, 'Ren', 'Canga', 'Max', 'Jane', '17019978945', '789456123', 'Ταυτότητα', 'AK 789456', 'Oulof Palme', 'Athens', '2', '15771', '6947189568', 'renc@gmail.com', 'Βασικό Πτυχίο', 'Γαλλία', 'Institut Polytechnique de Paris', 'ΦΥΣΙΚΗΣ', 27, '', 'yes', '2022-01-22 22:00:00', 'rejected', 'credit', 'e-statement', NULL, NULL),
(96, 'Ren', 'Canga', 'Max', 'Jane', '17019978945', '789456123', 'Ταυτότητα', 'AK 789456', '', '', '', '', '', 'renc@gmail.com', '', '', '', '', 27, '', NULL, '2022-01-23 19:29:19', 'drafted', 'deposit', 'e-statement', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reject`
--

CREATE TABLE `reject` (
  `id` int(11) NOT NULL,
  `reasons` varchar(100) DEFAULT NULL,
  `comment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reject`
--

INSERT INTO `reject` (`id`, `reasons`, `comment`) VALUES
(95, 'Μη Έγκυρη Ταυτότητα, ', 'Τα στοιχεία της ταυτότητας δεν αντιστοιχούν στον αιτούντα.');

-- --------------------------------------------------------

--
-- Table structure for table `standby`
--

CREATE TABLE `standby` (
  `id` int(11) NOT NULL,
  `classes` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standby`
--

INSERT INTO `standby` (`id`, `classes`, `department`) VALUES
(92, 'Λειτουργικά Συστήματα, Μεταγλωττιστές, Αλγοριθμική Επιχειρησιακή Έρευνα, Διδακτική της Πληροφορικής, ', 'ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cel` varchar(10) DEFAULT NULL,
  `afm` varchar(9) DEFAULT NULL,
  `amka` varchar(11) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `cel`, `afm`, `amka`, `role`, `created_at`) VALUES
(15, 'admin', 'admin', 'admin@gmail.com', '$2y$10$LfN2FZEE6UhjkcF7I.T9/O0lEAJnHIlmuVq3FdXOG75x4mL3dNI0y', NULL, NULL, NULL, 'admin', '2021-12-20 22:00:00'),
(27, 'Ren', 'Canga', 'renc@gmail.com', '$2y$10$wg28SU.ah3KIVIqmOQpMiu5SVymcNdqclwOESHWk.bVUPRl3HLO7S', NULL, '789456123', '17019978945', 'user', '2022-01-23 18:39:35'),
(28, 'Teo', 'Pagkrakiotis', 'teo@gmail.com', '$2y$10$lQgju3ZIPBDx1YCKKQIP7eEQYDe5DXns5BMj/ilWbeHEJcIyi4oTy', NULL, '789456123', '24029978945', 'user', '2022-01-23 19:05:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reject`
--
ALTER TABLE `reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standby`
--
ALTER TABLE `standby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `afm` (`afm`,`amka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `reject`
--
ALTER TABLE `reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `standby`
--
ALTER TABLE `standby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `form` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reject`
--
ALTER TABLE `reject`
  ADD CONSTRAINT `reject_ibfk_1` FOREIGN KEY (`id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standby`
--
ALTER TABLE `standby`
  ADD CONSTRAINT `standby_ibfk_1` FOREIGN KEY (`id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
