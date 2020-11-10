-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 01:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `animal_name` varchar(100) NOT NULL,
  `animal_type` varchar(100) NOT NULL,
  `animal_owner_name` varchar(100) NOT NULL,
  `animal_owner_email` varchar(100) NOT NULL,
  `status` enum('active','deactivated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animal_name`, `animal_type`, `animal_owner_name`, `animal_owner_email`, `status`) VALUES
(4, 'Boen', 'Dog', 'Ruey Agcang', 'ruey@gmail.com', 'active'),
(5, 'Ako', 'Cat', 'Ghea', 'ghea@gmail.com', 'active'),
(7, 'Cathy', 'Dog', 'Ruey Agcang', 'ruey@gmail.com', 'active'),
(8, 'Bruce', 'Fish', 'Ruey Agcang', 'ruey@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `car_rating`
--

CREATE TABLE `car_rating` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_rating`
--

INSERT INTO `car_rating` (`id`, `car_id`, `rating`, `comment`, `comment_date`, `user`) VALUES
(1, 1, 4, 'test comment one', '2019-03-27', 'Anonymous'),
(2, 1, 4, 'test two comment', '2019-03-27', 'Anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `sellparts_id` int(11) NOT NULL,
  `price_range` int(11) NOT NULL,
  `parts_category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL,
  `desc` text NOT NULL,
  `note` varchar(200) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `pictureTwo` varchar(200) NOT NULL,
  `pictureThree` varchar(200) NOT NULL,
  `seller_name` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `status` enum('approved','pending','sold','removed') NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `rfs` varchar(200) NOT NULL,
  `update_part_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`sellparts_id`, `price_range`, `parts_category`, `brand`, `color`, `desc`, `note`, `seller_id`, `picture`, `pictureTwo`, `pictureThree`, `seller_name`, `post_date`, `status`, `model_name`, `rfs`, `update_part_on`) VALUES
(1, 28290, 'WHEELS', 'COOPER', 'Black', 'The tyre that will never disappoint.', 'All-terrain tyre', 21, '5bf644465447d1.JPG', '5bf6444655f502.JPG', '5bf644465c7353.JPG', 'RUEY AGCANG', '2018-12-19', 'approved', 'Discoverer', 'Extra parts in the garage', '2018-12-19'),
(2, 0, 'TIRES', 'PIRELLI', 'Black', 'qweasd', 'None', 22, '5bfbe83a7dcb91957-Ferrari-250-GT-California.jpg', '5bfbe83a83a441957-Ferrari-250-TR-750x422.jpg', '5bfbe83a8544b1957-Ferrari-250-GT-California.jpg', 'REYNANTE CRISTOBAL', '2018-11-26', 'approved', 'Angel', 'None', '2018-03-02'),
(3, 29000, 'INTERNAL ACCESSORIES', 'COOPER', 'Black', 'The king of all.', 'None', 21, '5c0284aaa4c02566x566-WranglerTrippleMax-Nameontop-300x300.png', '5c0284aaaaabcoptimok415.jpg', '5c0284aaac15cwmtrk-angle2-300x300.png', 'RUEY AGCANG', '2018-12-01', 'pending', 'Discoverer', 'None', '2019-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `part_rating`
--

CREATE TABLE `part_rating` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user` varchar(100) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_rating`
--

INSERT INTO `part_rating` (`id`, `part_id`, `rating`, `comment`, `user`, `comment_date`) VALUES
(1, 1, 4, 'test one comment part', 'Anonymous', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sellcar_id` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `make` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `pictureOne` varchar(200) NOT NULL,
  `status` enum('sold','pending','approved','removed') NOT NULL,
  `year` year(4) NOT NULL,
  `transmission` enum('AT','MT','CVT') NOT NULL,
  `seating_capacity` varchar(200) NOT NULL,
  `bodystyle` varchar(200) NOT NULL,
  `mileage` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `cylinder_engine` varchar(100) NOT NULL,
  `door` varchar(10) NOT NULL,
  `drive_type` varchar(20) NOT NULL,
  `fuel_type` varchar(10) NOT NULL,
  `note` varchar(200) NOT NULL,
  `rfs` varchar(100) NOT NULL,
  `pictureTwo` varchar(200) NOT NULL,
  `pictureThree` varchar(200) NOT NULL,
  `pictureFour` varchar(200) NOT NULL,
  `pictureFive` varchar(200) NOT NULL,
  `seller_name` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `update_car_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sellcar_id`, `sellerId`, `make`, `price`, `model`, `pictureOne`, `status`, `year`, `transmission`, `seating_capacity`, `bodystyle`, `mileage`, `color`, `cylinder_engine`, `door`, `drive_type`, `fuel_type`, `note`, `rfs`, `pictureTwo`, `pictureThree`, `pictureFour`, `pictureFive`, `seller_name`, `post_date`, `update_car_on`) VALUES
(1, 21, 'NISSAN', 1800000, 'JUKE', '5bf63e146ddecjuke1.JPG', 'approved', 2018, 'CVT', '4', 'SUV', 12000, 'Yellow', 'Twin Turbo', '4', 'AWD', 'Diesel', 'None', 'Bought a new car already', '5bf63e14dced9juke2.JPG', '5bf63e14de6fbjuke3.JPG', '5bf63e14eacd8juke4.JPG', '5bf63e14ec54djuke5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-11'),
(2, 21, 'NISSAN', 919000, 'NAVARA', '5bf63f1163a02navara1.JPG', 'approved', 2018, 'AT', '4', 'Trucks', 500, 'Brown', 'Bi-turbo', '4', '4WD', 'Diesel', 'The prince of pick-up trucks', 'None', '5bf63f11661a8navara2.JPG', '5bf63f1167adfnavara3.JPG', '5bf63f11696f7navara4.JPG', '5bf63f116b3dfnavara5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-11-29'),
(3, 21, 'HYUNDAI', 526000, 'EON', '5bf63ffd8e8d4eon1.JPG', 'approved', 2016, 'MT', '4', 'Sedan', 20000, 'Red', 'V6', '5', 'FWD', 'Diesel', 'Needs to be maintained every 6 months', 'Too much car in the garage', '5bf63ffd901a5eon2.JPG', '5bf63ffd91beaeon3.JPG', '5bf63ffd93555eon4.JPG', '5bf63ffd9c558eon5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-18'),
(4, 21, 'HYUNDAI', 25520421, 'I20', '5bf640ac8cfd4i20-1.JPG', 'approved', 2018, 'CVT', '4', 'Sedan', 10000, 'Blue', '2.0 Diesel', '5', '4WD', 'Petrol', 'The most expensive sedan yet', 'Need funds', '5bf640ac8e8bfi20-2.JPG', '5bf640ac8ff01i20-3.JPG', '5bf640ac916f4i20-4.JPG', '5bf640ac9306ei20-5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-27'),
(5, 21, 'FORD', 1168000, 'ECOSPORT', '5bf64172577a3eco1.JPG', 'approved', 2017, 'AT', '5', 'SUV', 5000, 'Blue', '2.5 Turbo Diesel', '5', '4WD', 'Diesel', 'Fuel-efficient sub-compact SUV', 'Brought a brand new Ford Everest', '5bf64172590e9eco2.JPG', '5bf641725a8baeco3.JPG', '5bf641725c509eco4.JPG', '5bf641725dc97eco5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-11-30'),
(6, 21, 'FORD', 1695000, 'RANGER', '5bf641ddd4599ranger1.JPG', 'approved', 2018, 'AT', '5', 'Trucks', 2000, 'Brown', '3.0 Bi-turbo', '4', '4WD', 'Diesel', 'The king of pick-up trucks', 'Too much car in the garage', '5bf641dddb9ffranger2.JPG', '5bf641dddd2ebranger3.JPG', '5bf641dde109cranger4.JPG', '5bf641dde2a61ranger5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-13'),
(7, 21, 'FORD', 2228000, 'EVEREST', '5bf64287c7417eve1.JPG', 'approved', 2018, 'CVT', '7', 'SUV', 1000, 'Red', 'V8 engine', '5', '4WD', 'Petrol', 'Fuel-hungry type of SUV', 'Cannot accommodate it in the garage', '5bf64287c8baeeve2.JPG', '5bf64287cd39feve3.JPG', '5bf64287ceb73eve4.JPG', '5bf64287d0594eve5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-31'),
(8, 21, 'HONDA', 1288000, 'CIVIC', '5bf642fb9ce5dcivic1.JPG', 'approved', 2017, 'CVT', '4', 'Sedan', 15000, 'Red', '2.0 Diesel', '5', 'RWD', 'Diesel', 'One of the most popular city car', 'Need funds for new SUV', '5bf642fba3050civic2.JPG', '5bf642fba47e5civic3.JPG', '5bf642fba5d3fcivic4.JPG', '5bf642fba7a8acivic5.JPG', 'RUEY AGCANG', '2018-11-22', '2018-12-23'),
(10, 21, 'TOYOTA', 700000, 'WIGO', '5c0350817e9f4wigo1.JPG', 'approved', 2018, 'AT', '5', 'Sedan', 20000, 'Red', 'V8 engine', '5', 'FWD', 'Diesel', 'None', 'None', '5c035081a803awigo2.JPG', '5c035081aaf04wigo3.JPG', '5c035081b473bwigo4.JPG', '5c035081b6ce4wigo5.JPG', 'RUEY AGCANG', '2018-12-02', '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `type` enum('seller','admin') NOT NULL,
  `status` enum('active','deactivated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fname`, `lname`, `address`, `contact`, `type`, `status`) VALUES
(20, 'ccap@admin.com', 'admin', 'Ruey', 'Agcang', 'Nasipit, Talamban, Cebu City, Philippines', '09476436562', 'admin', 'active'),
(21, 'ruey@gmail.com', 'ruey1234', 'Ruey', 'Agcang', 'Bahak, Liloan, Cebu', '424-4485', 'seller', 'deactivated'),
(22, 'reynante@gmail.com', 'qwertyui', 'reynante', 'cristobal', 'Bahak, Poblacion, Liloan, Cebu', '09171552501', 'seller', 'deactivated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_rating`
--
ALTER TABLE `car_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_carRating` (`car_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`sellparts_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `part_rating`
--
ALTER TABLE `part_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sellcar_id`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `car_rating`
--
ALTER TABLE `car_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `sellparts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `part_rating`
--
ALTER TABLE `part_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sellcar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_rating`
--
ALTER TABLE `car_rating`
  ADD CONSTRAINT `FK_carRating` FOREIGN KEY (`car_id`) REFERENCES `product` (`sellcar_id`);

--
-- Constraints for table `parts`
--
ALTER TABLE `parts`
  ADD CONSTRAINT `parts_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
