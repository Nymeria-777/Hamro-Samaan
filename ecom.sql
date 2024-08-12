-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 03:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(33, 'Iron', 1),
(35, 'Televisions', 1),
(36, 'Refrigerator', 1),
(37, 'Washing Machine', 1),
(38, 'Oven', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(5, 'Anurag Paudel', 'paudelanurag123@gmail.com', '981800000', 'This is a testing box.', '2023-02-15 04:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `password`, `mobile`, `status`, `added_on`) VALUES
(32, 'Crampton', 'admin', '981800000', 1, '2023-02-14 05:33:50'),
(33, 'Anurag Paudel', 'abcdef', '9818000001', 1, '2023-02-15 03:11:55'),
(34, 'Prajwal Mahat', '1234', '9818181818', 1, '2023-02-15 06:04:43'),
(35, 'Sanil Koju', 'abcdef', '9812345678', 1, '2023-02-15 06:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `delivery_boy_id` int(12) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `cancel_by` enum('user','admin') NOT NULL,
  `cancel_at` datetime NOT NULL,
  `added_on` date NOT NULL,
  `delivered_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `email`, `mobile`, `address`, `city`, `pincode`, `delivery_boy_id`, `payment_type`, `total_price`, `payment_status`, `order_status`, `cancel_by`, `cancel_at`, `added_on`, `delivered_on`) VALUES
(116, 7, 'Crampton', '', '9818000001', 'ghfg', 'fhdh', 343, 35, 'COD', 895, 'pending', 5, 'user', '0000-00-00 00:00:00', '2022-10-04', '2023-02-15 06:03:54'),
(117, 7, 'Anurag Paudel', '', '9818199024', 'ghfg', 'fhdh', 343, 32, 'esewa', 1330, 'completed', 5, 'user', '0000-00-00 00:00:00', '2022-12-11', '0000-00-00 00:00:00'),
(118, 7, 'Anurag Paudel', '', '9818199024', 'Pasikot, kathmandu', 'Kathmandu', 44600, 0, 'COD', 332, 'pending', 4, 'user', '0000-00-00 00:00:00', '2023-01-10', '0000-00-00 00:00:00'),
(119, 7, 'Anurag Paudel', '', '9818199024', 'Pasikot, kathmandu', 'Kathmandu', 44600, 0, 'ESEWA', 1232, 'pending', 5, 'user', '0000-00-00 00:00:00', '2023-03-02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(128, 116, 60, 1, 895),
(129, 117, 61, 1, 33),
(130, 118, 49, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` varchar(500) NOT NULL,
  `best_seller` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `status`) VALUES
(49, 33, 27, 'Philips Iron', 32, 3, '105986234_p5.jpg', 'Easy to use Water tank capacity. 320 ml. ...\r\nFast crease removal Power. 2400 W. ...\r\nScale management Descaling and cleaning. Built-in Calc-Clean Slider.\r\nSize and weight Packaging dimensions (W x H x D) 33.2 x 16.7 x 13.7 cm. ...\r\nGreen efficiency User manual. 100% recycled paper.\r\nGuarantee 2 year worldwide guarantee.', 'Philips Iron', 1, 1),
(50, 33, 28, 'CG Non-Stick Dry Iron - CGID1001G', 48, 9, '105372358_cg iron.jpg', 'Brand - CG.\r\nModel - CGIDH10A.\r\nPower 1000 W.\r\nGross Weight - 4.8 Kg.\r\nDimension - 275 x 130 x 150 mm.\r\n1 Year Warranty.', 'CG Non-Stick Dry Iron - CGID1001G', 1, 1),
(51, 33, 27, 'CG iron', 29, 8, '101769530_cgiron2.jpg', 'Brand - CG. Model - CGIDH10A. Power 1000 W. Gross Weight - 4.8 Kg. Dimension - 275 x 130 x 150 mm. 1 Year Warranty.\r\n8 Bar pressure. Suitable for high rise buildings. Copper heating element. ISI marked nickel coated special element provides resistance against scale formation. Polymer coating. for corrosion protection and long life. Powder coated metallic body. Touch body for high performance. Magnesium anode. For corrosion protection.', 'CG iron', 0, 1),
(52, 38, 34, 'Whirlpool 25L Magicook Pro Grill Microwave Oven', 3500, 9, '108937470_oven.jpg', 'Auto-cook Menu\'s\r\n\r\nExpress Cooking\r\n\r\n7 Power Levels\r\n\r\nTouchpad\r\n\r\nDough setting\r\n\r\nSoft/melt features\r\n\r\n1 YEAR warranty\r\n25 ltr\r\ngrill\r\nWARM', 'Whirlpool 25L Magicook Pro Grill Microwave Oven', 0, 1),
(55, 36, 39, 'Himstar Single Door Refrigerator', 25, 8, '106242943_him-star-refrigerator-(nature)(1080.jpg', 'Door Type :- Vertical\r\nColor:- Red\r\nFeatures :- Vegetable box, Handle, Lock\r\nCapacity :- 170 Liters\r\n\r\nWarranty :- 10 Years on Compressor\r\n\r\nLock System :- Key\r\nShelves Type :- Wire Shelves\r\nStar Rating :- 4', 'Himstar Single Door Refrigerator', 1, 1),
(56, 35, 35, 'Smart - Himstar Television', 800, 5, '101963416_himtv.jpg', 'Size :- 43\"\r\nWarranty :- 1 + 2 Years (1 Year Full / 2 Years Service)\r\nSmart :- Yes.\r\nAndroid :- Yes.\r\nHD :- FHD.\r\nConnectivity :- VGA, 2 - USB, 2 - HDMI, Wi-Fi.\r\nFeatures :- Frameless, Comes with 2 build-in 10 Watts Box Speakers, Smart(1 + 8GB) with E-share App, YouTube, Miracast, Google Android 9.0.', '43\" FHD Smart - Himstar Television', 1, 1),
(58, 35, 35, '32\'\' Smart Himstar Television', 4500, 5, '104093809_himstar32.jpg', 'Size :- 32\"\r\nWarranty :- 1 + 2 Years (1 Year Full / 2 Years Service)\r\nSmart :- Yes\r\nHD :- HD Ready\r\nConnectivity :- VGA, 2 - USB, 2 - HDMI, Wi-Fi\r\nFeatures :- Comes with 2 build-in 10 Watts Box Speakers, Smart(1 + 8GB) with E-share App, YouTube, Miracast, Google Android', '32\'\' Smart Himstar Television', 0, 1),
(59, 37, 40, 'Sansui Washing Machine', 588, 2, '106207923_p1.jpg', 'Sansui 9.0 Kg Front Load Inverter Washing Machine SS-FMI90 Product Details: Model: SS-FMI90 Colour: Dark Silver Warranty: 1 Year on Product / 10 Years on Motor Touch Buttons 1400 RPM Spin Speed Inverter BLDC motor Chrome Door​ Chrome Knob​ ELED Display​ Overflow Control​ Overheating Control​ Silent Washing​ No of Programmes: 16', 'Sansui Washing Machine', 1, 1),
(60, 37, 41, 'Himstar Front Load Washing Machine', 895, 5, '101982795_himstarwm.png', 'DescriptionBrand - HimstarHimstar Wachine Machine HW‐8TG10WF/GZ\r\nWashing Capacity :- 8KG\r\nColor :- White\r\nMotor Speed :- 680RPM\r\nWarranty :- 5 Years Warranty on Motor\r\nFeatures :- - LED Display- 8 Wash Programs- 24 Hour Delay Start- 20-Minute Fast Wash- Child Lock- Auto Balance System- Overheating Control', 'Himstar Front Load Washing Machine', 1, 1),
(61, 37, 0, 'Himstar Top Load', 33, 8, '108784737_himstop.jpg', 'DescriptionBrand - HimstarHimstar Wachine Machine HW‐8TG10WF/GZWashing Capacity :- 8KGColor :- WhiteMotor Speed :- 680RPMWarranty :- 5 Years Warranty on MotorFeatures :- - LED Display- 8 Wash Programs- 24 Hour Delay Start- 20-Minute Fast Wash- Child Lock- Auto Balance System- Overheating Control', 'Himstar Top Load', 1, 1),
(63, 34, 0, 'Crampton 15ltr geyser', 45, 10, '109226627_geyser.jpg', 'PRODUCT: Crompton\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s energy efficient storage water heater with fast heating\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\nTECHNICAL SPECIFICATIONS: Wattage: 2000 W; Capacity: 15L; Star Rating 5; Pressure 8 bar\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\n3 LEVEL SAFETY: Capillary Thermostat, automatic thermal cut-out & multi-functional valve to provide higher safety\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\nANTI-RUST: Fitted with specially designed magnesium anode which prevents corrosion due to hard water quality\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\nQUALITY COMPONENTS: ISI marked nickel coated special element to provide resistance against scale formation', 'geyser', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(7, 46, '109551937_geyser1.jpg'),
(8, 47, '107416573_baltrageyser1.jpg'),
(9, 48, '108952651_baltrageyser1.jpg'),
(10, 49, '105862108_66.jpg'),
(11, 50, '103109372_cgiron2.jpg'),
(12, 51, '107892260_cg iron.jpg'),
(13, 51, '109198320_cgiron2.jpg'),
(15, 52, '109837486_oven3.jpg'),
(17, 53, '106166334_him-star-refrigerator-(nature)(1080.jpg'),
(18, 54, '108962081_himstarsingledoor1.jpeg'),
(19, 55, '105422808_himstarsingle.png'),
(21, 55, '101359327_him-star-refrigerator-(nature)(1080.jpg'),
(22, 56, '108303594_himtv.jpg'),
(23, 57, '104119153_LGTV2.jpg'),
(24, 57, '111097849_himsmart.jpg'),
(25, 58, '101906062_himstar43.jpg'),
(26, 58, '101551097_himstar55.jpg'),
(27, 58, '104338810_himstar32.jpg'),
(28, 59, '109627757_himstop.jpg'),
(29, 59, '101216033_p1.jpg'),
(30, 60, '100882769_himstarwm.png'),
(31, 62, '108738662_baltrageyser1.jpg'),
(32, 62, '104826289_baltrageyser.jpg'),
(34, 64, '104928638_baltrageyser.jpg'),
(41, 63, '107188920_geyser.jpg'),
(43, 63, '102054437_geyser3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES
(3, 63, 7, 'Worst', 'Sorry this product is useless', 1, '2023-02-14 05:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(7, 19, 'Himstar', 1),
(8, 20, 'Himstar', 1),
(9, 21, 'Crampton', 1),
(10, 22, 'Himstar', 1),
(11, 23, 'Crampton', 1),
(12, 24, 'LG', 1),
(13, 25, 'sansui', 1),
(14, 22, 'LG', 1),
(15, 25, 'LG', 1),
(16, 25, 'Himstar', 1),
(17, 26, 'Crampton', 1),
(27, 33, 'Philips', 1),
(28, 33, 'CG', 1),
(29, 33, 'Himstar', 1),
(30, 34, 'Crampton', 1),
(31, 33, 'Baltraa', 1),
(32, 34, 'LG', 1),
(34, 38, 'Whirlpool', 1),
(35, 35, 'Himstar', 1),
(36, 35, 'CG', 1),
(38, 36, 'LG', 1),
(39, 36, 'Himstar', 1),
(40, 37, 'sansui', 1),
(41, 37, 'Himstar', 1),
(42, 33, 'LG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `added_on`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '9845170950', '2022-12-01 04:51:08'),
(7, 'Rayyan', 'abc@gmail.com', '12345678', '9818199024', '2023-01-24 09:04:02'),
(8, 'anurag', 'paudelanurag123@gmail.com', '123456', '98181929023', '2023-01-25 08:39:51'),
(9, '981800000', '9818199024', 'admin', '981800000', '2023-02-15 05:54:51'),
(10, 'Anurag', 'admina@gmail.com', 'admin', '981800000', '2023-02-15 05:59:15'),
(11, 'Ram', 'ram@gmail.com', '123456789', '9818199055', '2023-02-22 13:43:13'),
(12, 'Ram', 'ram@gmail.com', '123456789', '9818199055', '2023-02-22 13:43:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
