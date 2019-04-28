-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 09:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bowling_green_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ID` int(3) NOT NULL,
  `Stars` int(1) NOT NULL,
  `Comment` varchar(10000) DEFAULT NULL,
  `UserName` varchar(40) NOT NULL,
  `ServiceID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`ID`, `Stars`, `Comment`, `UserName`, `ServiceID`) VALUES
(1, 5, 'What a wonderful place.', 'Austin', 1),
(2, 4, 'Great pizza, a little expensive.', 'Austin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Name` varchar(50) NOT NULL,
  `IDno` int(4) NOT NULL,
  `Description` varchar(10000) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Name`, `IDno`, `Description`, `Address`, `Type`) VALUES
('Shanty Hollow Lake', 1, 'Shanty Hollow Lake is a 135-acre reservoir mostly in Warren County, Kentucky, but also extending into Edmonson County. It was constructed in 1951. The lake is located approximately 17 miles north of Bowling Green and is used for fishing.', '1200 Shanty Hollow Road, Bowling Green, KY', 'visit'),
('National Corvette Museum', 2, 'The National Corvette Museum showcases the Chevrolet Corvette, an American sports car that has been in production since 1953. It is located in Bowling Green, Kentucky, off Interstate 65\'s Exit 28. It was constructed in 1994, and opened to the public in September of that year.', '350 Corvette Dr, Bowling Green, KY 42101', 'visit'),
('Lost River Pizza Co.', 3, 'Lost River Pizza is one of Bowling Green\'s most loved restaurants. The food, the beer, and the vibe all come together to make sure you walk out with a big smile and a full belly.', '2440 Nashville Rd, Bowling Green, KY 42101', 'food'),
('Double Dogs', 4, 'Eatery & sports bar known for craft brews & casual American eats, including signature nachos.', '1780 Scottsville Rd, Bowling Green, KY 42104', 'food'),
('Crye Leike Executive Realty', 5, 'We welcome the opportunity to assist with your move. Our proven home selling program can assist in the marketing of your home, finding the right buyer and closing the sale with the lowest level of stress. Our years of experience combined with up to date technology, allows us to attract buyers within the South Central Kentucky area or nationwide. Whether you are relocating from across town or across the country, we can provide the local knowledge and superior service needed to make your home buying move as smooth as possible!', '1278 Campbell Ln, Bowling Green, KY 42104', 'live'),
('Coldwell Banker Real Estate Group', 6, 'For over 20 years, Coldwell Banker Commercial Legacy Real Estate Group has been a company on the move. Our creative approach to real estate sets us apart from the competition by effectively fine-tuning our extensive expertise, intimate knowledge of local markets and research capabilities earning us a reputation for service excellence and performance. Our business is about more than just providing real estate services. CBC Legacy Real Estate Group was founded on the belief that a successful commercial real estate firm is measured on how well it serves the diverse needs of its clientele. Anticipating and resolving our clients\' needs shapes the way Legacy Real Estate does business. In an industry that historically has taken a transactional approach to real estate,CBC Legacy Real Estate Group focuses on developing client relationships built on collaboration, communication, integrity, teamwork and trust. That\'s easy enough for any company to say, but our goal is to provide an unsurpassed quality of commercial real estate services.', '2435 Fitzgerald Industrial Drive,\r\nSuite # 102,\r\nBowling Green, KY 42104', 'live');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
('Austin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'),
('Jermaine', 'c40dbb01a0ae2ed2db5ce64b57b4492867839e53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`IDno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `IDno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
