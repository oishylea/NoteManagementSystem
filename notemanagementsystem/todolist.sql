-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 09:15 AM
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
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `taskId` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duedate` date DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `noteStatus` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`taskId`, `date`, `title`, `description`, `duedate`, `users_id`, `noteStatus`, `category`) VALUES
(54, '2024-01-18', 'Final test', 'Notebook. Testing\r\n', '2024-01-11', 42, 'In Progress', 'Urgent'),
(59, '2024-01-18', 'Buy Gift', '-', '2024-01-11', 42, 'Not Started', 'Work'),
(60, '2024-01-27', 'Cook dinner', 'Update cook dinner', '2024-01-30', 42, 'On Hold', 'Urgent'),
(61, '2024-01-23', 'Study Coding', '-', '0000-00-00', 42, 'Completed', 'Urgent'),
(62, '2024-01-04', 'Test title', 'aaa', '0000-00-00', 42, 'In Progress', 'Urgent');

-- --------------------------------------------------------

--
-- Table structure for table `users_izzah`
--

CREATE TABLE `users_izzah` (
  `users_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_izzah`
--

INSERT INTO `users_izzah` (`users_id`, `username`, `password`) VALUES
(40, 'aufa', '$2y$10$3bceuCkbK0yaleQOx3/U7uhACgzwZVUEtI6HPbu.cJj2p.sQgDFFu'),
(42, 'izzah', '$2y$10$u.RYQSTGYXV2hDn2RklgQeqwWeQsTio5Qp9z8ppe0ZrLB9jnS4Hfe'),
(44, 'alia', '$2y$10$GNVS8S1OULjmpFCiCXt6vOqvczG4/Bxa8AQgv74NmQd8Lffl839ou'),
(45, 'siti', '$2y$10$MY3zQbeVjqPEpUVmx7KwLuq/2JRVeyoSqs4WYZkAgCKDoQy/lHoi2'),
(47, 'amal', '$2y$10$i1yUNkfR.8ZZ4/g/7uoX2.63AsFyOTZU2UpccYVuYzValndhbKqHm'),
(48, 'ayaz', '$2y$10$Uenlb.QMq0zZ1qysHkY9gOJKFGLzf9EVEPW33a16ipZUAFGjSr5ky'),
(50, 'aufaa', '$2y$10$OVoq4UkWxVbSjcSBKC8F4eNM7L2hrxiHQK0xm5k2ZkhizPuWnQYuq'),
(51, 'kuda', '$2y$10$H2bk1kkUguu.2pCIhn7C4.lIb43oIKQ9TJiYqdgoDDWgW99sLlB76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`taskId`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users_izzah`
--
ALTER TABLE `users_izzah`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users_izzah`
--
ALTER TABLE `users_izzah`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD CONSTRAINT `users_id` FOREIGN KEY (`users_id`) REFERENCES `users_izzah` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
