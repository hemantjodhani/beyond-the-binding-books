-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2023 at 08:43 PM
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
-- Database: `beyond-the-binding-books`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_description` varchar(255) NOT NULL,
  `book_per_day_price` float NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `book_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_description`, `book_per_day_price`, `book_image`, `book_category`) VALUES
(1, 'Beyond worthy', 'These words are for the one looking for hope, for the one questioning whether they’ll ever truly be okay. These words are for us all. Hold this book in your hands and hold onto hope. Trust that you will find', 12.8, 'Product photo.jpg', 'poetry'),
(11, 'harry potter', 'Harry Potter was first introduced in the novel Harry Potter and the Philosopher\'s Stone (1997; also published as Harry Potter and the Sorcerer\'s Stone), as an orphan who is mistreated by his guardian aunt and uncle and their son', 10, 'download.jpeg', 'crime'),
(12, 'The great gatsby', 'The Great Gatsby I Summary, Context, Reception, & Analysis ...\r\nThe Great Gatsby, third novel by F. Scott Fitzgerald, published in 1925 by Charles Scribner\'s Sons. Set in Jazz', 16, 'the-great-gatsby-11.jpg', 'crime');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Crime\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `num_of_days` int(11) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date NOT NULL,
  `delayed_by` int(11) NOT NULL,
  `total_issue_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`issue_id`, `user_id`, `book_id`, `phone_no`, `email_address`, `num_of_days`, `issued_date`, `return_date`, `delayed_by`, `total_issue_amount`) VALUES
(25, 1, 11, '08319770020', 'jodhani.hemant@gmail.com', 9, '2023-08-26', '2023-09-04', 0, 90),
(26, 1, 1, '08319770020', 'jodhani.hemant@gmail.com', 9, '2023-08-26', '2023-09-04', 0, 115.2),
(27, 1, 12, '08319770020', 'jodhani.hemant@gmail.com', 15, '2023-08-26', '2023-09-10', 0, 240);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'hemantjodhani', 'jodhani.hemant@gmail.com', '123@admin', 'customer'),
(10, 'admin_hemant_ji', 'jodhani.hemant@outlook.com', 'hemant1124', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
