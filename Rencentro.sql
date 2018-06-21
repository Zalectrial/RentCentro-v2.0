
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rencentro`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) UNSIGNED NOT NULL,
  `street_no` varchar(10) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(12) NOT NULL,
  `book_price` double(10,2) UNSIGNED NOT NULL,
  `commission_rate` float UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `availablity` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `street_no`, `street_name`, `city`, `postcode`, `book_price`, `commission_rate`, `description`, `availablity`, `image`) VALUES
(1, '3749', 'Stratford Court', 'Raleigh', '27612', 4299.00, 5, 'Very nice property located nearby park ', '2018-05-15', '1.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `property_specs`
--

CREATE TABLE `property_specs` (
  `property_id` int(11) NOT NULL,
  `bedroom` decimal(3,1) NOT NULL,
  `bathroom` decimal(3,1) NOT NULL,
  `parking` decimal(3,0) NOT NULL,
  `pet_friendly` tinyint(1) NOT NULL,
  `building_size` decimal(10,2) NOT NULL,
  `land_size` decimal(10,2) NOT NULL,
  `furnished` tinyint(1) NOT NULL,
  `air_condition` tinyint(1) NOT NULL,
  `swimming_pool` tinyint(1) NOT NULL,
  `spa` tinyint(1) NOT NULL,
  `energy` varchar(10) NOT NULL,
  `internet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_specs`
--

INSERT INTO `property_specs` (`property_id`, `bedroom`, `bathroom`, `parking`, `pet_friendly`, `building_size`, `land_size`, `furnished`, `air_condition`, `swimming_pool`, `spa`, `energy`, `internet`) VALUES
(1, '2.0', '2.0', '2', 0, '1250.00', '1550.00', 1, 1, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `fname`, `lname`, `phone`, `status`, `type`) VALUES
(1, '$2y$10$/Fk.Scj./kIkyqb6ywpvN.A7H2mTaGp5aaFxyFEBsqby1i6OsGTGu', 'admin@admin.com', 'Admin', '', 0, 'active', 'admin'),
(2, '*5AE090B8FB2588DD94082747DBB4C8E9B465ADE5', 'john@example.com', 'John', 'Doe', 0, 'active', 'regular'),
(3, '*977C3B3FA9BA0C59D45E50872A5500A74856CCD5', 'willsmith@gmail.com', 'Will', 'Smith', 0, 'active', 'regular'),
(4, '$2y$10$fbSlSjWvt7EWFCYb.MA5oOyefzfc.9XmUPMS4cWaU6oglfw2Fmtty', 'richard@gmail.com', 'Richard', 'johnson', 789456123, '', ''),
(5, '$2y$10$NMSGaZeGjjQ7NizRlrYaTuQBFuxZvtiDs6X5aWhTI0cCytBbvSP/i', '', '', '', 0, '', ''),
(6, '$2y$10$a.Fj/lGVfu.lK.4Vr5u1VOoTukrFgkauWSPFtaOMh509jkciipgy.', '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_image`
--
ALTER TABLE `property_image`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_specs`
--
ALTER TABLE `property_specs`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
