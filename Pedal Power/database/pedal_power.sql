-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2022 at 07:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedal_power`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_code` int(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_start_venue` varchar(255) NOT NULL,
  `route_description` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `event_format` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_code`, `event_name`, `event_date`, `event_start_venue`, `route_description`, `distance`, `event_format`) VALUES
(331, 'FunRide', '2022-03-30', 'Hugenote Primary, Wellington', '52km around the Wellington terrain', '52km ', ' first-to-the-finish style format'),
(332, 'FunRide', '2022-02-02', 'Durbanville Race Course - Cape Town', 'Around the Durbanville Area', '100KM', ' first-to-the-finish style format'),
(333, 'FunRide', '2022-03-10', 'Val De Vie Estate Paarl -Western Cape', '196km North', '196km', 'Mixed Category format'),
(334, 'FunRide', '2022-02-15', 'Boksburg City Stadium - Gauteng', 'Boksburg mountain terrains', '46km', 'Mixed Category format'),
(335, 'FunRides', '2021-12-31', 'Montecasino - Gauteng', 'Along the N1', '79km', 'first-to-the-finish style format'),
(336, 'FunRides', '2022-12-21', 'Sun Time Square', 'Sun Time Square terrain', '30km', 'first-to-the-finish style format'),
(337, 'FunRides', '2022-06-15', 'Table Mountain', 'circles the Cape Peninsula', '45km', 'first-to-the-finish style format');

-- --------------------------------------------------------

--
-- Table structure for table `event_results`
--

CREATE TABLE `event_results` (
  `event_code` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `ride_result` varchar(255) NOT NULL,
  `average_time` varchar(255) NOT NULL,
  `seeding_group` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_results`
--

INSERT INTO `event_results` (`event_code`, `member_id`, `ride_result`, `average_time`, `seeding_group`) VALUES
(331, 2, '19km/hr', '2hr 35min', 'C'),
(334, 3, '26km/hr', '2hrs 5min', 'B'),
(335, 4, '20km/hr', '3hrs 25min', 'B'),
(332, 5, '26km/hr', '5hr 25min', 'B'),
(332, 6, '30km/hr', '3hrs', 'A'),
(333, 7, '34km/hr', '6hrs', 'A'),
(336, 8, '16km/hr', '5hrs 30min', 'C'),
(334, 9, '26km/hr', '2hrs 10min', 'B'),
(335, 10, '24km/hr', '3hrs', 'B'),
(331, 11, '28km/hr', '1hr 45min', 'B'),
(336, 12, '18km/hr', '3hrs', 'C'),
(332, 13, '42km/hr', '4hrs', 'A'),
(331, 14, '33km/hr', '1hr 20min', 'A'),
(337, 15, '22km/hr', '2hrs 24min', 'B'),
(332, 16, '32km/hr', '3hrs', 'A'),
(332, 17, '35km/hr', '6hrs 33min', 'A'),
(334, 18, '25km/hr', '3hrs 49min', 'B'),
(331, 19, '33km/hr', '1hr 50min', 'A'),
(334, 20, '21km/hr', '2hrs 41min', 'B'),
(336, 21, '18km/hr', '3hrs 2min', 'C'),
(336, 22, '19', '3hrs20min', 'C'),
(337, 23, '22km/hr', '2hrs25min', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `member_id` int(255) NOT NULL,
  `subscription_type` varchar(255) NOT NULL,
  `date_joined` date NOT NULL,
  `main_member` varchar(255) NOT NULL,
  `subscription_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`member_id`, `subscription_type`, `date_joined`, `main_member`, `subscription_status`) VALUES
(2, 'individual', '2022-08-08', 'Dakalo', 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_events`
--

CREATE TABLE `upcoming_events` (
  `date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `entries_close` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upcoming_events`
--

INSERT INTO `upcoming_events` (`date`, `event_type`, `event_name`, `region`, `entries_close`) VALUES
('2023-03-09', 'FunRides', 'Winelands Cycle Race', 'Western Cape', '2023-02-09'),
('2023-06-16', 'FunRides', 'Die Groot Trap 2023', 'Western Cape', '2023-05-17'),
('2023-03-02', 'FunRides', '2023 Lions Karoo', 'Western Cape', '2023-02-02'),
('2023-08-25', 'Fun Rides', 'Dis-Chem Ride', 'Gauteng', '2023-08-01'),
('2023-04-11', 'Fun Rides', 'Tour du Cap', 'Western Cape', '2023-04-01'),
('2023-06-10', 'Fun Rides', 'Midvaal Fast One Cycle Challenge', 'Western Cape', '2023-05-11'),
('2023-06-17', 'Fun Rides', 'Montecasino Classic 2023', 'Gauteng', '2023-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `member_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL DEFAULT 'member',
  `chip_number` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_id`, `email`, `password`, `first_name`, `last_name`, `member_type`, `chip_number`, `user_type`) VALUES
(1, 'admin@pedalpower.co.za', 'adminpower', 'Alex', 'K', '-', '-', 'admin'),
(2, 'dakimakatu@icloud.com', 'MAK123', 'Dakalo', 'Makatu', 'Elite', 'RC657tec', 'member'),
(3, 'PeggyGou@gmail.com', 'Gou88', 'Peggy', 'Gou', 'Ladies', 'RC432tec', 'member'),
(4, 'Phinjo@gmail.com', 'njo5', 'Philiswa', 'Njo', 'Elites', 'RC111tec', 'member'),
(5, 'nj@icloud.com', 'ntwan0', 'Ntwanano', 'Junior', 'Elites', 'RC063tec', 'member'),
(6, 'JohnDoe@gmail.con', 'doe4', 'John', 'Doe', 'Veteran', 'RC151tec', 'member'),
(7, 'Mpho@yahoo.com', '17mph', 'Mpho', 'Mak', 'Sub_veteran', 'RC093tec', 'member'),
(8, 'momo@yahoo.com', 'warrior64', 'Mo', 'Mo', 'Elites', 'RC312tec', 'member'),
(9, 'Jane@icloud.com', 'jane1973', 'Jane', 'Doe', 'Ladies', 'RC948tec', 'member'),
(10, 'NkaviShilenge@gmail.com', 'silenge', 'Nkavi', 'Shilenge', 'Master', 'RC543tec', 'member'),
(11, 'ntsako@icloud.com', 'Ntsaki2008', 'Ntsako', 'Mbele', 'Elites', 'RC141tec', 'member'),
(12, 'ChristopherB@icloud.com', 'blonded28', 'Christopher ', 'Breaux', 'Junior_Scholar', 'RC108tec', 'member'),
(13, 'BongiNkuja@gmail.com', 'sbongi1231', 'Bongiwe', 'Nkuja', 'Master', 'RC251tec', 'member'),
(14, 'brian@icloud.com', 'briiian656', 'Brian', 'Sinthumule', 'Master', 'RC109tec', 'member'),
(15, 'Emily@yahoo.com', '1675passcode', 'Emily', 'Andrews', 'Junior_Scholar', 'RC626tec', 'member'),
(16, 'Chadkyle@hotmail.com', 'chadyk', 'Chad', 'Chad', 'Veteran', 'RC908tec', 'member'),
(17, 'Owen@icloud.com', '97password', 'Owen', 'Greys', 'Sub_veteran', 'RC009tec', 'member'),
(18, 'Miley102@gmail.com', 'smilessss', 'Miley', 'Gomez', 'Ladies', 'RC789tec', 'member'),
(19, 'Andreasmth@mail.com', 'andreacapt', 'Andrea', 'Smith', 'Sub_veteran', 'RC005tec', 'member'),
(20, 'peterman@icloud.com', 'spidey111', 'Peter', 'Parker', 'Junior_Scholar', 'RC767tec', 'memeber'),
(21, 'Cee2cee@gmail.com', 'C2Cee0909', 'CeeCee', 'Abrahams', 'Ladies', 'RC190tec', 'member'),
(22, 'khloe@coporate.co.za', 'khloe12odom5', 'Chloe', 'Odom', 'Sub_veteran', 'RC342tec', 'member'),
(23, 'kourzspring@icloud.com', 'springkourtney1990', 'Kourtney', 'Springs', 'Junior_Scholar', 'RC762tec', 'member'),
(24, 'thompsonTri@icloud.com', 'tritri1990', 'Tristan', 'Thompson', 'Elite', 'RC093tec', 'member'),
(25, 'kobek@yahoo.com', 'kobe1212', 'Kobe', 'Klaus', 'Veteran', 'RC171tec', 'member'),
(26, 'ritomashele@gamil.com', 'mashelerito123', 'Rito', 'Mashele', 'Ladies', 'RC112tec', 'member'),
(27, 'graceangel@icloud.com', 'gracieee45', 'Grace', 'Angels', 'Master', 'RC474tec', 'member'),
(28, 'Muleyarodney@icloud.com', 'rodneyyy2', 'Rodney', 'Muleya', 'Master', 'RC152tec', 'member'),
(29, 'Abigailkhatu31@yahoo.com', 'abbykha123', 'Abigail', 'Khathu', 'Master', 'RC925tec', 'master'),
(30, 'Mksi121@gmail.com', 'february121', 'Emkay', 'Mkize', 'Sub_veteran', 'RC601tec', 'member'),
(32, 'Nathyph@gmail.com', 'nathi903', 'Unathi', 'Phala', 'Ladies', 'RC737tec', 'member'),
(33, 'admin2@pedalpower.co.za', 'admin2power', 'Adam', 'Jeffs', '-', '-', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_code`);

--
-- Indexes for table `event_results`
--
ALTER TABLE `event_results`
  ADD KEY `member_id_fk` (`member_id`),
  ADD KEY `event_code_fk` (`event_code`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD KEY `member_id_fk` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_code` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_results`
--
ALTER TABLE `event_results`
  ADD CONSTRAINT `event_results_ibfk_1` FOREIGN KEY (`event_code`) REFERENCES `event` (`event_code`),
  ADD CONSTRAINT `event_results_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `users` (`member_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
