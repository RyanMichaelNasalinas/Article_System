-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 07:53 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_date`) VALUES
(2, 1, 'Technology', '2019-04-18 10:43:49'),
(3, 2, 'Business', '2019-04-18 12:28:38'),
(4, 2, 'School', '2019-04-18 15:15:36'),
(6, 2, 'Stocks', '2019-04-19 08:29:47'),
(8, 1, 'Foods', '2019-04-19 12:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_date`) VALUES
(1, 10, 'Ryan Michael', 'ryan@yahoo.com', '<p>This is a great posts.</p>\r\n', '2019-04-19 06:00:42'),
(2, 13, 'Ew', 'waa@yahoo.com', '<p>This is good</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2019-04-22 02:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `url_title`, `body`, `post_image`, `created_date`) VALUES
(12, 5, 1, 'Post one', 'Post-one', '<p>In viverra volutpat lorem, vel tincidunt ante dictum sed. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed bibendum odio enim, sed pulvinar nisi lobortis eget. Phasellus ac tellus odio. Mauris sit amet eros vestibulum, sollicitudin sapien eget, maximus mauris. Nulla gravida id tortor quis rhoncus. Proin eu massa fringilla elit dapibus eleifend vitae nec lectus. Curabitur at iaculis mauris. In pharetra sapien nec nibh laoreet rutrum. Quisque turpis enim, lobortis eget nisi sed, ullamcorper accumsan felis. Nullam erat odio, interdum ac mi tristique, facilisis ullamcorper dolor. Maecenas suscipit accumsan est et viverra. Duis ullamcorper bibendum maximus. Proin aliquam ex justo, in eleifend dui pharetra a. Pellentesque vel tortor est. Nam fermentum posuere enim.</p>\r\n', 'noimage.jpg', '2019-04-19 11:50:22'),
(13, 6, 1, 'Post four', 'Post-four', '<p>In viverra volutpat lorem, vel tincidunt ante dictum sed. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed bibendum odio enim, sed pulvinar nisi lobortis eget. Phasellus ac tellus odio. Mauris sit amet eros vestibulum, sollicitudin sapien eget, maximus mauris. Nulla gravida id tortor quis rhoncus. Proin eu massa fringilla elit dapibus eleifend vitae nec lectus. Curabitur at iaculis mauris. In pharetra sapien nec nibh laoreet rutrum. Quisque turpis enim, lobortis eget nisi sed, ullamcorper accumsan felis. Nullam erat odio, interdum ac mi tristique, facilisis ullamcorper dolor. Maecenas suscipit accumsan est et viverra. Duis ullamcorper bibendum maximus. Proin aliquam ex justo, in eleifend dui pharetra a. Pellentesque vel tortor est. Nam fermentum posuere enim.</p>\r\n', 'noimage.jpg', '2019-04-19 11:50:48'),
(14, 4, 1, 'Post five', 'post-five', '<p>In viverra volutpat lorem, vel tincidunt ante dictum sed. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed bibendum odio enim, sed pulvinar nisi lobortis eget. Phasellus ac tellus odio. Mauris sit amet eros vestibulum, sollicitudin sapien eget, maximus mauris. Nulla gravida id tortor quis rhoncus. Proin eu massa fringilla elit dapibus eleifend vitae nec lectus. Curabitur at iaculis mauris. In pharetra sapien nec nibh laoreet rutrum. Quisque turpis enim, lobortis eget nisi sed, ullamcorper accumsan felis. Nullam erat odio, interdum ac mi tristique, facilisis ullamcorper dolor. Maecenas suscipit accumsan est et viverra. Duis ullamcorper bibendum maximus. Proin aliquam ex justo, in eleifend dui pharetra a. Pellentesque vel tortor est. Nam fermentum posuere enim.</p>\r\n', 'noimage.jpg', '2019-04-19 11:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `authentication` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `authentication`, `email`, `username`, `password`, `registered_date`) VALUES
(1, 'Ryan Michael Nasalinas', '11234', 'ryan@email.com', 'Manticore', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-19 08:45:45'),
(2, 'Ryan', '112233', 'mike@yahoo.com', 'Ryan1234', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-19 10:51:28'),
(3, 'Ryan Nas', '123456', 'ryannas@email.com', 'Ryan12345', 'e10adc3949ba59abbe56e057f20f883e', '2019-04-19 10:57:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
