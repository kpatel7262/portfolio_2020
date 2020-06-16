-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2020 at 03:59 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calorie_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(15) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calculator_form`
--

CREATE TABLE `calculator_form` (
  `id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `height` decimal(65,0) NOT NULL,
  `weight` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calorie_alert`
--

CREATE TABLE `calorie_alert` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `calorie` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calorie_alert`
--

INSERT INTO `calorie_alert` (`id`, `username`, `calorie`, `message`) VALUES
(1, 'smith', '2080', 'fghj'),
(2, 'Krina', '4000', ''),
(4, 'Krina', '3000', ''),
(5, 'Krina', '3000', ''),
(6, 'Krina', '4000', ''),
(7, 'Krina', '50000', '');

-- --------------------------------------------------------

--
-- Table structure for table `calorie_facts`
--

CREATE TABLE `calorie_facts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calorie_facts`
--

INSERT INTO `calorie_facts` (`id`, `title`, `content`) VALUES
(2, 'Calories keep you alive, help you build new tissue, and give you energy to move around.', 'Yes, you really do burn calories when you\'re just laying down And every time you eat food, your body breaks it down, releasing that stored-up energy for a whole bunch of uses. '),
(3, 'The number of calories you need to eat may not be the standard 2,000.', 'You might need way more or less than 2,000 calories that 2,000-calorie benchmark is a general figure. Your individual calorie needs could be more or less depending your age, sex, activity level, your current weight, and whether you want the number on the scale to go up, down, or stay the same. There are also significant person-to-person differences in metabolism and hormones that can affect how many calories your body burns. '),
(9, 'Food Quality Does Not Affect Weight More Than Calories..test update', 'People are eating higher quality foods, and they are feeling virtuous about their choices, but they are simply not getting anywhere with their weight loss.  It has to be a frustrating feeling to be making all of these good choices, and still not seeing progress on the scale. ');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `gender`, `phone`, `email`, `message`, `reply`) VALUES
(4, 'Krishna', 'Patel1', 'female', 1234567898, 'patelkrishna6129@gmail.com', 'abc', ''),
(11, 'abc567', 'abc4566789', 'female', 1234567891, 'shikha9.6goyal@gmail.com', 'sjbdnkm', 'fskdjglkhf;lyju');

-- --------------------------------------------------------

--
-- Table structure for table `dietry_chart`
--

CREATE TABLE `dietry_chart` (
  `id` int(100) NOT NULL,
  `meal/snack` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `food_item` varchar(100) NOT NULL,
  `qty` mediumtext NOT NULL,
  `messure` mediumtext NOT NULL,
  `calories` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dietry_chart`
--

INSERT INTO `dietry_chart` (`id`, `meal/snack`, `category`, `food_item`, `qty`, `messure`, `calories`) VALUES
(1, 'breakfast', 'cereal', 'whole wheat', '0.5', '1 slice', '43'),
(2, 'lunch', 'vegetables', 'tomatos', '2', '2', '44');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `description`, `status`) VALUES
(1, 'lili.smith@gmail.com', 'Good work...Keep it up......', 'ON'),
(5, 'adsrft', 'Useful for all type of users', 'ON'),
(10, 'abc@abc.com', 'aaaaaaaddddddyyyyyyyyyy', 'OFF'),
(11, 'jonny@gmail.com', 'goodwork...jkl', 'OFF'),
(12, 'lili@gmail.com', 'nice work..', 'OFF'),
(16, 'add@gmail.com', 'good worl....', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `home_nav_links`
--

CREATE TABLE `home_nav_links` (
  `id` int(11) NOT NULL,
  `nav_link_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `emailid`, `password`) VALUES
(4, 'smith', 'smith@gmail.com', 'Smith@123'),
(5, 'Joanna', 'Joanna@gmail.com', 'Joanna@@1234'),
(11, 'Krina', 'Krina@gmail.com', 'Krina##123'),
(14, 'user', 'user@gmail.com', 'User##123'),
(16, 'mohanaaa', 'mohan@gmail.com', 'Mohan##123'),
(17, 'joy', 'joy@gmail.com', 'Joy##1234');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `calories` int(15) NOT NULL,
  `food` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `protein` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `name`, `email`, `calories`, `food`, `quantity`, `protein`) VALUES
(9, 'balmeet', 'balmeetkaur52@gmail.com', 3456, 'Rice', '10', '20'),
(10, 'aman', 'amandeepbilling169@gmail.com', 80, 'salad ', '2 plates', '20'),
(13, 'shikhagoyal', 'shikha9.6goyal@gmail.com', 4000, 'jsak', '5kg', '60'),
(15, 'amn', 'amandeepbilling169@gmail.com', 3456, 'salad ', '2 plates', '20'),
(17, 'Aman', 'amandeepbilling169@gmail.com', 500, 'rice', '5kg', '50g');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `policy_question` varchar(255) NOT NULL,
  `policy_answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `policy_question`, `policy_answer`) VALUES
(6, 'How do we use this information? ', 'To provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. '),
(7, 'What kinds of information do we collect?', 'The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie TrackerTo provide the Products, we must process information about you. The types of information we collect depend on how you use our Products. You can learn how to access and delete information we collect by visiting the Calorie Tracker'),
(8, 'How is this information shared? ', 'People and accounts you share and communicate with When you share and communicate using our Products, you choose the audience for what you share.');

-- --------------------------------------------------------

--
-- Table structure for table `products_calorie`
--

CREATE TABLE `products_calorie` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_calorie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_calorie`
--

INSERT INTO `products_calorie` (`id`, `pro_name`, `pro_calorie`) VALUES
(1, 'apple', '50'),
(4, 'pineapple', '52'),
(5, 'Sugar', '376.7'),
(6, 'banana', '89');

-- --------------------------------------------------------

--
-- Table structure for table `products_calorie1`
--

CREATE TABLE `products_calorie1` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_calorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_calorie1`
--

INSERT INTO `products_calorie1` (`id`, `pro_name`, `pro_calorie`) VALUES
(5, 'sugar', '100'),
(7, 'apple', '50'),
(8, 'pineapple', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculator_form`
--
ALTER TABLE `calculator_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calorie_alert`
--
ALTER TABLE `calorie_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calorie_facts`
--
ALTER TABLE `calorie_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietry_chart`
--
ALTER TABLE `dietry_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_nav_links`
--
ALTER TABLE `home_nav_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_calorie`
--
ALTER TABLE `products_calorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_calorie1`
--
ALTER TABLE `products_calorie1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calculator_form`
--
ALTER TABLE `calculator_form`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calorie_alert`
--
ALTER TABLE `calorie_alert`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `calorie_facts`
--
ALTER TABLE `calorie_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dietry_chart`
--
ALTER TABLE `dietry_chart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_nav_links`
--
ALTER TABLE `home_nav_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_calorie`
--
ALTER TABLE `products_calorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_calorie1`
--
ALTER TABLE `products_calorie1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
