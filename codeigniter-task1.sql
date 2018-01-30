-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 08:59 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter-task1`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(4, 'Osama', 'Hamza', 'osama@gmail.com', '123'),
(5, 'Owais ', 'Tariq', 'owais@gmail.com', '123'),
(6, 'Zshan', 'Tariq', 'zshan@gmail.com', '123'),
(8, 'Adnan', 'Babar', 'adnan@gmail.com', '123'),
(9, 'Umer', 'Ehsan', 'umer@gmail.com', '123'),
(10, 'Haris', 'Ali', 'haris@gmail.com', '123'),
(11, 'Munsab', 'Mohammad', 'munsab@gmail.com', '123'),
(12, 'Sajid', 'Mehmood', 'sajid@gmail.com', '8493'),
(13, 'Omair', 'Bhai', 'omair@gmail.com', '123'),
(25, 'Zia', 'Hassan', 'zia@gmail.com', '123'),
(26, 'Khateeb', 'Rehman', 'khateeb@gmail.com', '123'),
(27, 'Fahad', 'Naseem', 'fahad@gmail.com', '123'),
(28, 'Moon', 'Qasim', 'moon@gmail.com', '123'),
(29, 'Test', 'Test', 'nn_stop@yahoo.com', '123'),
(31, 'Irfan', 'Mehmood', 'irfanmehmood207@hotmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
