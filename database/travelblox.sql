-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelblox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mst`
--

CREATE TABLE `admin_mst` (
  `Admin_id` int(11) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_mst`
--

INSERT INTO `admin_mst` (`Admin_id`, `FullName`, `Email`, `Password`, `MobileNo`, `DOB`, `Address`, `City`, `Pincode`) VALUES
(101, 'Hardik Chaudhary', 'h.b.chaudhary2003@gmail.com', 'Hardik753@', 8141780265, '2003-05-07', '8/A Gaytri Krupa Society, Outside Chhindiya Gate Near shitlamata temple.', 'Patan', 384265),
(102, 'Jaimin Raval', 'ravalbunty1310@gmail.com', '123123', 7622975351, '2002-10-13', '181, Rabari Coloni, Near Airport.', 'Ahmedabad', 380003);

-- --------------------------------------------------------

--
-- Table structure for table `booking_mst`
--

CREATE TABLE `booking_mst` (
  `Booking_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Package_Type` varchar(20) NOT NULL,
  `PrePackage_ID` int(11) NOT NULL,
  `CusPackage_ID` int(11) NOT NULL,
  `Payment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_mst`
--

INSERT INTO `booking_mst` (`Booking_ID`, `User_ID`, `Package_Type`, `PrePackage_ID`, `CusPackage_ID`, `Payment_ID`) VALUES
(4, 2, 'prePackage', 1, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cancellation_mst`
--

CREATE TABLE `cancellation_mst` (
  `Cancellation_ID` int(11) NOT NULL,
  `Booking_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `User_name` varchar(30) NOT NULL,
  `Package_Type` varchar(30) DEFAULT NULL,
  `PrePackage_ID` int(11) NOT NULL,
  `CusPackage_ID` int(11) NOT NULL,
  `PackageName` varchar(30) NOT NULL,
  `Payment_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cancellation_mst`
--

INSERT INTO `cancellation_mst` (`Cancellation_ID`, `Booking_ID`, `User_ID`, `User_name`, `Package_Type`, `PrePackage_ID`, `CusPackage_ID`, `PackageName`, `Payment_ID`) VALUES
(20, 2, 2, 'Honey Ben  Parmar', 'customPackage', 0, 4, 'Jay Ambe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chatgroup`
--

CREATE TABLE `chatgroup` (
  `User_Id` int(11) DEFAULT NULL,
  `GroupName` varchar(50) NOT NULL,
  `CreatorNumber` bigint(10) NOT NULL,
  `Code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chatgroup`
--

INSERT INTO `chatgroup` (`User_Id`, `GroupName`, `CreatorNumber`, `Code`) VALUES
(1, 'honey', 1234567890, 'I8KU4U'),
(2, 'goa', 12345690, 'SWMCIU'),
(2, 'saputara', 1234567890, 'VU9MQ1'),
(NULL, 'ersd', 1323, 'Y5BHFF');

-- --------------------------------------------------------

--
-- Table structure for table `cuspackage_mst`
--

CREATE TABLE `cuspackage_mst` (
  `CusPackage_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Package_Name` varchar(30) NOT NULL,
  `state` varchar(50) NOT NULL,
  `From_place` varchar(30) NOT NULL,
  `To_place` varchar(30) NOT NULL,
  `Duration` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `Activities` varchar(100) DEFAULT NULL,
  `Accommodations` varchar(100) NOT NULL,
  `travelers` varchar(30) NOT NULL,
  `Transportation` varchar(50) NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cuspackage_mst`
--

INSERT INTO `cuspackage_mst` (`CusPackage_ID`, `User_ID`, `Package_Name`, `state`, `From_place`, `To_place`, `Duration`, `date`, `Activities`, `Accommodations`, `travelers`, `Transportation`, `Price`) VALUES
(4, 2, 'Jay Ambe', 'Arunachal Pradesh', 'Abu', 'Tawang', '4', '2023-11-21', 'hill climbing', 'resorts', '1', 'bus', 4300),
(5, 2, 'Asam Trip', 'Assam', 'Patan', 'Jorhat', '2', '2023-11-17', 'hill climbing', 'motels', '2', 'car', 2580),
(7, 1, 'jaimin tour', 'Andhra Pradesh', 'Ahmedabad', 'Visakhapatnam', '5', '2023-11-25', 'hill climbing', 'hotel', '5', 'car', 5600);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `Desid` int(11) NOT NULL,
  `DesName` varchar(30) NOT NULL,
  `Stateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`Desid`, `DesName`, `Stateid`) VALUES
(1, 'Visakhapatnam', 1),
(2, 'Araku Valley', 1),
(3, 'Tirupati', 1),
(4, 'Vijayawada', 1),
(5, 'Amaravati', 1),
(6, 'Srisailam', 1),
(7, 'Konaseema', 1),
(8, 'Lepakshi', 1),
(9, 'Kakinada', 1),
(10, 'Belum Caves', 1),
(11, 'Itanagar', 2),
(12, 'Tawang', 2),
(13, 'Ziro', 2),
(14, 'Bomdila', 2),
(15, 'Dirang', 2),
(16, 'Pasighat', 2),
(17, 'Roing', 2),
(18, 'Bhalukpong', 2),
(19, 'Mechuka', 2),
(20, 'Anini', 2),
(21, 'Guwahati', 3),
(22, 'Kaziranga National Park', 3),
(23, 'Shillong', 3),
(24, 'Cherrapunji', 3),
(25, 'Tezpur', 3),
(26, 'Jorhat', 3),
(27, 'Sivasagar', 3),
(28, 'Majuli', 3),
(29, 'Dibrugarh', 3),
(30, 'Nameri National Park', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_mst`
--

CREATE TABLE `feedback_mst` (
  `feedback_id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback_mst`
--

INSERT INTO `feedback_mst` (`feedback_id`, `User_ID`, `feedback`) VALUES
(1, 2, 'Perfect Website For Travel Planning...With Customization Options and Also Include Group Chat Feature is very usefull...'),
(4, 1, 'very nice good website'),
(5, 4, 'Fantastic site for traveler...'),
(6, 4, 'Exceptional service! Found the perfect package for my family vacation. Travelblox made our dream trip a reality.'),
(7, 2, 'niceeeeeeeeeeee\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `User_ID`, `Message`, `timestamp`) VALUES
(11, 1, 'You Create A \"honey\" Group and The Group Code Is \"I8KU4U\"', '2023-11-24 16:58:04'),
(12, 2, 'You Create A \"goa\" Group and The Group Code Is \"SWMCIU\"', '2023-11-24 17:02:58'),
(13, 2, 'You Create A \"saputara\" Group and The Group Code Is \"VU9MQ1\"', '2023-11-24 17:04:01'),
(14, 2, 'You Create A \"ersd\" Group and The Group Code Is \"Y5BHFF\"', '2023-11-26 08:55:51'),
(15, 2, 'Your password was updated on 29-11-2023', '2023-11-29 17:15:53'),
(16, 2, 'Your password was updated on 29-11-2023', '2023-11-29 17:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_mst`
--

CREATE TABLE `payment_mst` (
  `Payment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Amount` varchar(15) NOT NULL,
  `Payment_Type` varchar(15) NOT NULL,
  `Payment_Status` varchar(20) NOT NULL DEFAULT 'Done'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_mst`
--

INSERT INTO `payment_mst` (`Payment_ID`, `User_ID`, `Amount`, `Payment_Type`, `Payment_Status`) VALUES
(1, 2, '2580', 'card', 'Done'),
(2, 2, '2999', 'card', 'Done'),
(3, 2, '12900', 'card', 'Done'),
(4, 2, '2580', 'card', 'Done'),
(5, 2, '', 'card', 'Done'),
(6, 2, '2580', 'card', 'Done'),
(7, 2, '20993', 'card', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `prepackage_mst`
--

CREATE TABLE `prepackage_mst` (
  `PrePackage_id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `PackageName` varchar(30) NOT NULL,
  `FromPlace` varchar(30) NOT NULL,
  `PlaceTo` varchar(30) NOT NULL,
  `Duration` varchar(20) NOT NULL,
  `Activity` text NOT NULL,
  `Accommodations` varchar(30) NOT NULL,
  `Transportation` varchar(50) NOT NULL,
  `Price` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prepackage_mst`
--

INSERT INTO `prepackage_mst` (`PrePackage_id`, `Admin_id`, `PackageName`, `FromPlace`, `PlaceTo`, `Duration`, `Activity`, `Accommodations`, `Transportation`, `Price`) VALUES
(1, 101, 'Saputara, Gujrat.', 'Ahmedabad', 'Saputara', '3 Days, 2 Nights', 'Nature Walks: Explore the scenic beauty of Saputar...\r\n', 'hotel', 'bus', 2999),
(2, 102, 'goa', 'ahmedabad', 'goa', '3 days,2 nights', 'Bask in the sun-kissed beaches of Goa, where you can enjoy water sports like parasailing and jet-skiing for an adrenaline rush.  Immerse yourself in the vibrant nightlife by exploring the lively beach shacks, clubs, and bars, offering a perfect blend of music and dance.  Embark on a cultural journey by visiting the historic forts like Aguada and Chapora, offering breathtaking views of the coastline.  Indulge your taste buds in the local Goan cuisine, savoring delicious seafood dishes and traditional vindaloo at the charming beachside restaurants.', 'Resort', 'Car', 13000),
(3, 102, 'Jaisalmer, Rajasthan', 'Patan', 'Rajasthan', '4 Days, 3 Nights', '1. Jaisalmer Fort Exploration:\r\nGuided tour of Jaisalmer Fort, a UNESCO World Heritage Site.\r\nVisit the Jain Temples inside the fort.\r\n\r\n2.Sam Sand Dunes Safari:\r\nCamel safari in the mesmerizing Sam Sand Dunes.\r\nEnjoy a traditional Rajasthani folk dance and music performance in the evening.\r\n\r\n3.Patwon Ki Haveli Visit:\r\nExplore the intricate architecture of Patwon Ki Haveli, a cluster of five havelis.\r\n\r\n4.Desert Camping:\r\nOvernight camping in the Thar Desert for a unique experience.\r\nStargazing in the clear desert skies.\r\n\r\n5.Photography Tour:\r\nCapture the beauty of Jaisalmer with a guided photography tour, especially during sunrise and sunset.', 'Resort', 'Car', 10000),
(4, 102, 'Kedarnath, Uttarakhand', 'Ahmedabad', 'Uttarakhand', '9 Days, 8 Nights', '1)Visit Kedarnath Temple:\r\nThe main attraction is the Kedarnath Temple. Make sure to allocate sufficient time for darshan and exploring the surroundings.\r\n\r\n2)Gaurikund Trek:\r\nInclude a trek from Gaurikund to Kedarnath. It\'s a scenic route and offers a unique perspective of the region.\r\n\r\n3)Bhairavnath Temple:\r\nVisit the Bhairavnath Temple, dedicated to Lord Bhairav, situated near Kedarnath.\r\n\r\n4)Gandhi Sarovar:\r\nPlan a visit to Gandhi Sarovar, also known as Chorabari Tal. It\'s a beautiful lake surrounded by snow-clad peaks.\r\n\r\n5)Rudra Cave:\r\nFor a spiritual experience, consider a visit to Rudra Cave, where it is believed that Lord Shiva meditated.\r\n\r\n6)Vasuki Tal Trek:\r\nIf your group is up for a more challenging trek, include the Vasuki Tal trek, which leads to a high-altitude lake.', 'Resort', 'Car', 10999);

-- --------------------------------------------------------

--
-- Table structure for table `state_mst`
--

CREATE TABLE `state_mst` (
  `Stateid` int(11) NOT NULL,
  `StateName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_mst`
--

INSERT INTO `state_mst` (`Stateid`, `StateName`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'West Bengal'),
(29, 'Andaman and Nicobar Islands'),
(30, 'Chandigarh'),
(31, 'Dadra and Nagar Haveli and Daman and Diu'),
(32, 'Lakshadweep'),
(33, 'Delhi'),
(34, 'Puducherry'),
(35, 'Ladakh'),
(36, 'Lakshadweep');

-- --------------------------------------------------------

--
-- Table structure for table `user_mst`
--

CREATE TABLE `user_mst` (
  `User_id` int(11) NOT NULL,
  `FullName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_mst`
--

INSERT INTO `user_mst` (`User_id`, `FullName`, `Email`, `Password`, `MobileNo`, `DOB`, `Address`, `City`, `Pincode`) VALUES
(1, 'Hardik B Chaudhary', 'h.b.chaudhary2003@gmail.com', '123456', 8141780265, '2003-05-07', '8/a, gaytri krupa society, outside chhindiya gate, near sitlamata tample, Patan.', 'Patan', 384265),
(2, 'Honey Ben  Parmar', 'honey123@gmail.com', '123456', 9028398290, '2004-07-19', 'Vyash mahollo', 'Mehsana', 384001),
(4, 'Krishna Yadav', 'krishna123@gmail.com', 'Krishna', 8980018025, '1970-09-01', 'Kunj Gali ', 'Virndavan', 707070),
(5, 'Trivedi Darshita A', 'trivedidarshita1212@gmail.com', '123456', 7977849579, '2002-12-12', 'opp gopinath ', 'Siddhpur', 384151),
(6, 'Hardik', 'hardikb@gmail.com', '123456', 8980018025, '2003-05-07', '8/a, gaytri krupa society, outside chhindiya gate, near sitlamata tample, patan.', 'patan', 384265),
(8, 'hardik raval', 'ravalbunty2310@gmail.com', 'jaimin123', 8160872804, '2002-10-13', 'HANSOL', 'AHMEDABAD', 325631);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mst`
--
ALTER TABLE `admin_mst`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `booking_mst`
--
ALTER TABLE `booking_mst`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Payment_ID` (`Payment_ID`);

--
-- Indexes for table `cancellation_mst`
--
ALTER TABLE `cancellation_mst`
  ADD PRIMARY KEY (`Cancellation_ID`);

--
-- Indexes for table `chatgroup`
--
ALTER TABLE `chatgroup`
  ADD PRIMARY KEY (`Code`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `cuspackage_mst`
--
ALTER TABLE `cuspackage_mst`
  ADD PRIMARY KEY (`CusPackage_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`Desid`),
  ADD KEY `Stateid` (`Stateid`);

--
-- Indexes for table `feedback_mst`
--
ALTER TABLE `feedback_mst`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `payment_mst`
--
ALTER TABLE `payment_mst`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `prepackage_mst`
--
ALTER TABLE `prepackage_mst`
  ADD PRIMARY KEY (`PrePackage_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `state_mst`
--
ALTER TABLE `state_mst`
  ADD PRIMARY KEY (`Stateid`);

--
-- Indexes for table `user_mst`
--
ALTER TABLE `user_mst`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mst`
--
ALTER TABLE `admin_mst`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `booking_mst`
--
ALTER TABLE `booking_mst`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancellation_mst`
--
ALTER TABLE `cancellation_mst`
  MODIFY `Cancellation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cuspackage_mst`
--
ALTER TABLE `cuspackage_mst`
  MODIFY `CusPackage_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `Desid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback_mst`
--
ALTER TABLE `feedback_mst`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_mst`
--
ALTER TABLE `payment_mst`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prepackage_mst`
--
ALTER TABLE `prepackage_mst`
  MODIFY `PrePackage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_mst`
--
ALTER TABLE `state_mst`
  MODIFY `Stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_mst`
--
ALTER TABLE `user_mst`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_mst`
--
ALTER TABLE `booking_mst`
  ADD CONSTRAINT `booking_mst_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`),
  ADD CONSTRAINT `booking_mst_ibfk_2` FOREIGN KEY (`Payment_ID`) REFERENCES `payment_mst` (`Payment_ID`);

--
-- Constraints for table `cancellation_mst`
--
ALTER TABLE `cancellation_mst`
  ADD CONSTRAINT `cancellation_mst_ibfk_2` FOREIGN KEY (`Payment_ID`) REFERENCES `payment_mst` (`Payment_ID`),
  ADD CONSTRAINT `cancellation_mst_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`);

--
-- Constraints for table `chatgroup`
--
ALTER TABLE `chatgroup`
  ADD CONSTRAINT `chatgroup_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user_mst` (`User_id`);

--
-- Constraints for table `cuspackage_mst`
--
ALTER TABLE `cuspackage_mst`
  ADD CONSTRAINT `cuspackage_mst_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_ibfk_1` FOREIGN KEY (`Stateid`) REFERENCES `state_mst` (`Stateid`);

--
-- Constraints for table `feedback_mst`
--
ALTER TABLE `feedback_mst`
  ADD CONSTRAINT `feedback_mst_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`);

--
-- Constraints for table `payment_mst`
--
ALTER TABLE `payment_mst`
  ADD CONSTRAINT `payment_mst_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_mst` (`User_id`);

--
-- Constraints for table `prepackage_mst`
--
ALTER TABLE `prepackage_mst`
  ADD CONSTRAINT `prepackage_mst_ibfk_1` FOREIGN KEY (`Admin_id`) REFERENCES `admin_mst` (`Admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
