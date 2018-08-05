-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2018 at 01:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KenSwag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `users_id`, `name`, `email`, `message`, `created_at`, `updated_at`, `status`) VALUES
(2, 25, 'salman iqbal', 'si87841@gmail.com', 'how are you?', '2018-02-06 04:12:11', '2018-02-14 04:09:08', 1),
(3, 1, 'mubbasir hayat', 'mubi@yahoo.com', 'how dude?', '2018-02-23 03:09:10', '2018-02-23 04:11:10', 1),
(4, 2, 'salman iqbal', 'salmaniqbal937@gmail.com', 'hello world?', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `products_id` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `discount_value` int(11) NOT NULL,
  `discount_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `products_id`, `seller_id`, `coupon_code`, `quantity`, `expire_date`, `discount_value`, `discount_type`) VALUES
(3, '9', 2, 'PEW2018', 0, '2018-12-31', 10, '%'),
(4, '12,13,14,16', 2, 'ksdfjo9o8098', 90809, '2018-03-14', 12, '%'),
(5, '12,13,14,16', 2, 'dsfds', 980, '2018-03-14', 22, '%');

-- --------------------------------------------------------

--
-- Table structure for table `coupons_avalied`
--

CREATE TABLE `coupons_avalied` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `availed_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_products`
--

CREATE TABLE `favourite_products` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite_products`
--

INSERT INTO `favourite_products` (`id`, `users_id`, `products_id`) VALUES
(2, 14, 16),
(3, 14, 12),
(6, 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'buyer', 'Buyer'),
(3, 'seller', 'Seller');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `seen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `users_id`, `messages`, `seen`) VALUES
(1, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1),
(2, 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 0),
(3, 2, 'hello world', 1),
(4, 2, 'this is you message replay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `withdraw_status` tinyint(4) NOT NULL,
  `order_date` date NOT NULL,
  `payment_date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `card_cvc` int(10) NOT NULL,
  `card_num` bigint(50) NOT NULL,
  `card_exp_month` varchar(255) NOT NULL,
  `card_exp_year` varchar(255) NOT NULL,
  `paid_amount_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `seller_id`, `users_id`, `order_status`, `withdraw_status`, `order_date`, `payment_date`, `total_price`, `percentage`, `address`, `city`, `state`, `country`, `postal_code`, `card_cvc`, `card_num`, `card_exp_month`, `card_exp_year`, `paid_amount_currency`, `txn_id`, `created_at`, `updated_at`) VALUES
(1, 2, 14, '2', 1, '2018-02-28', '2018-02-28', 865, '5', 'mingora', 'swat', 'swat', 'pakistan', '25000', 0, 0, '', '', '', '', '2018-02-28 03:03:11', '2018-02-28 01:01:04'),
(2, 2, 20, '0', 1, '2018-03-09', '2018-03-09', 70, '10', 'peshawar', 'peshawar', 'peshawar', 'pakistan', '13000', 0, 0, '', '', '', '', '2018-03-09 03:08:14', '2018-03-09 03:07:02'),
(3, 4, 14, '0', 0, '2018-04-25', '2018-04-25', 450, '5', 'slkjfsldkjf', 'sldfkjsdljf', 'sldfjsldj', 'slkfjsldj', '', 123, 4900000000000086, '09', '2022', 'USD', '3WY04559RB0633351', '2018-04-25 11:20:30', '2018-04-25 11:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `products_id`, `orders_id`, `quantity`, `price`, `comments`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, 432, 'bla bla', '2018-02-28 04:03:07', '2018-02-28 02:05:10'),
(2, 13, 1, 1, 433, 'bla', '2018-02-28 02:07:06', '2018-02-28 05:07:05'),
(3, 13, 3, 1, 450, '', '2018-04-25 11:04:20', '2018-04-25 11:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `products_categories_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `products_categories_id`, `users_id`, `title`, `price`, `description`, `quantity`, `featured`, `email`, `phone_number`, `location`, `created_at`, `updated_at`, `approved`) VALUES
(12, 1, 2, 'Samsung Grand Prime Plus - Dual Sim - 8GB - LTE - Gold', 300, 'sfsdfdsf', 45, 1, 'si87841@gmail.com', '23323', 'pakistan', '2018-03-13 06:25:31', '2018-03-13 06:25:31', 0),
(13, 1, 4, 'Sony PlayStation 4 Slim - 500 GB - PAL - Black', 450, 'Sony PlayStation 4 Slim - 500 GB - PAL - Black', 23, 0, 'salmaniqbal937@gmail.com', '555', 'pakistan', '2018-01-23 11:24:56', '2018-01-23 11:24:56', 0),
(14, 1, 2, 'I have edit this product', 90, 'Added new description', 10, 1, 'salmaniqbal937@gmail.com', '4534535', 'pakistan', '2018-03-13 08:04:04', '2018-03-13 08:04:04', 0),
(16, 33, 2, 'Shop Quite Pack of 2 - Black & Grey Cotton Tshirts for Men', 443, 'Shop Quite Pack of 2 - Black & Grey Cotton Tshirts for Men', 43, 0, 'salmaniqbal937@gmail.com', '34535', 'pakistan', '2018-03-13 07:40:47', '2018-03-13 07:40:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `parent_id`, `level`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 0, 0, 'Automobile', '2018-01-21 00:00:00', '2018-01-21', 'Automobile'),
(2, 0, 0, 'Appliances', '2018-01-21 00:00:00', '2018-01-21', 'Appliances'),
(3, 0, 0, 'Automobile Parts', '2018-01-21 00:00:00', '2018-01-21', 'Automobile-Parts'),
(4, 0, 0, 'Apps & Games', '0000-00-00 00:00:00', '0000-00-00', 'Apps-Games'),
(5, 0, 0, 'Bedroom', '0000-00-00 00:00:00', '0000-00-00', 'Bedroom'),
(6, 0, 0, 'Books New and Used', '0000-00-00 00:00:00', '0000-00-00', 'Books-New-and-Used'),
(7, 0, 0, 'Bus Booking Services', '0000-00-00 00:00:00', '0000-00-00', 'Bus-Booking-Services'),
(8, 0, 0, 'Baby', '0000-00-00 00:00:00', '0000-00-00', 'Baby'),
(9, 0, 0, 'Business Services', '0000-00-00 00:00:00', '0000-00-00', 'Business-Services'),
(10, 0, 0, 'Beauty, Makeup, And Cosmetics', '0000-00-00 00:00:00', '0000-00-00', 'Beauty-Makeup-And-Cosmetics'),
(11, 0, 0, 'Basic Health Advise Center', '0000-00-00 00:00:00', '0000-00-00', 'Basic-Health-Advise-Center'),
(12, 0, 0, 'Bath & Body', '0000-00-00 00:00:00', '0000-00-00', 'Bath-Body'),
(13, 0, 0, 'Cell Phones', '0000-00-00 00:00:00', '0000-00-00', 'Cell-phones'),
(14, 0, 0, 'Cell Phone Accessories', '0000-00-00 00:00:00', '0000-00-00', 'Cell-phone-accessories'),
(15, 0, 0, 'Clothing', '0000-00-00 00:00:00', '0000-00-00', 'Clothing'),
(16, 0, 0, 'Computers', '0000-00-00 00:00:00', '0000-00-00', 'Computers'),
(17, 0, 0, 'Car Rental Services', '0000-00-00 00:00:00', '0000-00-00', 'Car-Rental-Services'),
(18, 0, 0, 'Electronics', '0000-00-00 00:00:00', '0000-00-00', 'Electronics'),
(19, 0, 0, 'Entertainment', '0000-00-00 00:00:00', '0000-00-00', 'Entertainment'),
(20, 0, 0, 'Expert Services', '0000-00-00 00:00:00', '0000-00-00', 'Expert-Services'),
(21, 0, 0, 'Farming Center', '0000-00-00 00:00:00', '0000-00-00', 'Farming-Center'),
(22, 0, 0, 'Fashion And Design', '0000-00-00 00:00:00', '0000-00-00', 'Fashion-And-Design'),
(23, 0, 0, 'Flight Services', '0000-00-00 00:00:00', '0000-00-00', 'Flight-Services'),
(24, 0, 0, 'Food Services', '0000-00-00 00:00:00', '0000-00-00', 'Food-Services'),
(25, 0, 0, 'Furniture\n', '0000-00-00 00:00:00', '0000-00-00', 'Furniture'),
(26, 0, 0, 'Gift Cards', '0000-00-00 00:00:00', '0000-00-00', 'Gift-Cards'),
(27, 0, 0, 'Gym And Sports Services', '0000-00-00 00:00:00', '0000-00-00', 'Gym-And-Sports-Services'),
(28, 0, 0, 'Groceries', '0000-00-00 00:00:00', '0000-00-00', 'Groceries'),
(29, 0, 0, 'Hair, And Salon (beauty shop)', '0000-00-00 00:00:00', '0000-00-00', 'Hair-And-Salon'),
(30, 0, 0, 'Home Cleaning And Mowing Services', '0000-00-00 00:00:00', '0000-00-00', 'Home-Cleaning-And-Mowing-Services'),
(31, 0, 0, 'Hotel And Social Function Reservation                       ', '0000-00-00 00:00:00', '0000-00-00', 'Hotel-And-Social-Function-Reservation               '),
(32, 0, 0, 'Household Utensils', '2018-01-22 00:00:00', '2018-01-22', 'Household-Utensils'),
(33, 0, 0, 'Institutions Center', '2018-01-22 00:00:00', '2018-01-22', 'Institutions-Center'),
(34, 0, 0, 'International Calling Services', '2018-01-22 00:00:00', '2018-01-22', 'GirlsInternational-Calling-Services'),
(35, 0, 0, 'Jewelry', '2018-01-22 00:00:00', '2018-01-22', 'Boys-Jewelry'),
(36, 0, 0, 'Job Vacancies', '2018-01-22 00:00:00', '2018-01-22', 'Job-Vacancies'),
(37, 0, 0, 'Legal Services', '0000-00-00 00:00:00', '0000-00-00', 'Legal-Services'),
(38, 0, 0, 'Luggage & Travel', '2018-03-20 03:00:00', '2018-03-20', 'Luggage-Travel'),
(39, 0, 0, 'Living Room', '2018-03-20 00:00:00', '2018-03-14', 'living-room'),
(40, 0, 0, 'Medical Supplies', '0000-00-00 00:00:00', '0000-00-00', 'Medical-Supplies'),
(41, 0, 0, 'Office And Bookeeping Supplies ', '0000-00-00 00:00:00', '0000-00-00', 'Office-And-Bookeeping-Supplies '),
(42, 0, 0, 'Pet Supplies', '0000-00-00 00:00:00', '0000-00-00', 'Pet-Supplies'),
(43, 0, 0, 'Real Estate', '0000-00-00 00:00:00', '0000-00-00', 'Real-Estate'),
(44, 0, 0, 'Shipping Services from USA to KENYA And Vics Versa', '0000-00-00 00:00:00', '0000-00-00', 'Shipping-Services-from-USA-to-KENYA-And Vics-Versa'),
(45, 0, 0, 'Spa And Message Services', '0000-00-00 00:00:00', '0000-00-00', 'Spa-And-Message-Services'),
(46, 0, 0, 'Shoes', '0000-00-00 00:00:00', '0000-00-00', 'Shoes'),
(47, 0, 0, 'Toys', '0000-00-00 00:00:00', '0000-00-00', 'toys'),
(48, 0, 0, 'Waste Disposal Services', '0000-00-00 00:00:00', '0000-00-00', 'Waste-Disposal-Services'),
(49, 0, 0, 'Wedding And Other Ceremonies', '0000-00-00 00:00:00', '0000-00-00', 'Wedding-And-Other-Ceremonies');

-- --------------------------------------------------------

--
-- Table structure for table `products_ratings`
--

CREATE TABLE `products_ratings` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_ratings`
--

INSERT INTO `products_ratings` (`id`, `products_id`, `users_id`, `rating`, `created_at`, `updated_at`) VALUES
(6, 13, 14, 1, '2018-04-12 13:18:16', '2018-04-12 13:18:16'),
(15, 12, 14, 1, '2018-03-20 12:19:11', '2018-03-20 12:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `products_resources`
--

CREATE TABLE `products_resources` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_resources`
--

INSERT INTO `products_resources` (`id`, `products_id`, `url`) VALUES
(13, 12, 'http://localhost/techease_projects/kenswag/upload/product_images/mobile1.jpg'),
(14, 12, 'http://localhost/techease_projects/kenswag/upload/product_images/mobile2.jpg'),
(15, 12, 'http://localhost/techease_projects/kenswag/upload/product_images/mobile3.jpg'),
(16, 13, 'http://localhost/techease_projects/kenswag/upload/product_images/game.jpg'),
(17, 13, 'http://localhost/techease_projects/kenswag/upload/product_images/game1.jpg'),
(18, 13, 'http://localhost/techease_projects/kenswag/upload/product_images/game3.jpg'),
(24, 16, 'http://localhost/techease_projects/kenswag/upload/product_images/chair.jpg'),
(25, 16, 'http://localhost/techease_projects/kenswag/upload/product_images/2_(1).jpg'),
(26, 14, 'http://localhost/techease_projects/kenswag/upload/product_images/frige1.jpg'),
(27, 14, 'http://localhost/techease_projects/kenswag/upload/product_images/frige21.jpg'),
(28, 14, 'http://localhost/techease_projects/kenswag/upload/product_images/iqbaal1.png'),
(29, 14, 'http://localhost/techease_projects/kenswag/upload/product_images/24_Selection_24.png'),
(30, 14, 'http://localhost/techease_projects/kenswag/upload/product_images/iqbaal2.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_views`
--

CREATE TABLE `product_views` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `views` int(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_views`
--

INSERT INTO `product_views` (`id`, `seller_id`, `products_id`, `views`, `created_at`, `updated_at`) VALUES
(2, 2, 16, 7, '2018-03-13', '2018-04-30'),
(3, 2, 14, 6, '2018-03-13', '2018-04-30'),
(4, 2, 13, 1, '2018-03-13', '2018-03-21'),
(5, 2, 12, 3, '2018-04-16', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `value` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `value`, `created_at`, `updated_at`) VALUES
(3, 'commissions', 'commissions', '["10%","5%","1%"]', '2018-02-26 12:27:55', '2018-02-26 12:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `suspended_user` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `oauth_uid`, `oauth_provider`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `address`, `city`, `state`, `country`, `user_img`, `postal_code`, `verification_code`, `suspended_user`) VALUES
(2, '::1', '', '', 'salman_iqbal889', '$2y$08$EYNZZBbuEq7GRL2I3KWCE.ecoElEfiXBPtPeCLnN19j6s/Yu2qZGe', NULL, 'salmaniqbal937@gmail.com', NULL, NULL, NULL, 'hu16Y9YfOg.k5E2U80oRAO', 1516022300, 1529648200, 1, 'Salman', 'iqbal', '12345', 'swat', 'mingora', 'swat', 'pakistan', 'salman_fb23.jpg', '35345', '797957', 1),
(16, '::1', '', '', 'sklfjsdkl', '$2y$08$CVJdl.KrNBXMQuPcxLb/te4no88V/1wcwUGLHS9P1726OhQMVY0.O', NULL, 'sdfsdfsdf@admin.com', '2f1254562f3ede56f9d54aba5cd18afd6f48230e', NULL, NULL, NULL, 1516262400, NULL, 0, 'sdfkldsj', 'lsjdfklj', '98789789', '', '', '', '', '', '', '', 0),
(15, '::1', '', '', 'mubi', '$2y$08$WmRJyXG88P8165Rw3VYV0.bpR.Qn9AQ.2/xYi2nZHZpw9y8ksihJO', NULL, 'mubi@yahoo.com', '715275811f410bd6f0b09c8e0a95fd68ac8f6259', NULL, NULL, NULL, 1516260164, NULL, 0, 'mubassir', 'khan', '98798798', '', '', '', '', '', '', '', 0),
(13, '::1', '', '', 'asifkhan', '$2y$08$M8Vd165g9/rPD3zXazZEHes9xTJutu6a5vuN4LqLmFx9Ij7g7DGEm', NULL, 'admin@wpseochecker.com', NULL, NULL, NULL, NULL, 1516259851, NULL, 1, 'asif', 'khan', '8098098', '', '', '', '', '', '', '', 1),
(14, '::1', '', '', 'allu', '$2y$08$EYNZZBbuEq7GRL2I3KWCE.ecoElEfiXBPtPeCLnN19j6s/Yu2qZGe', NULL, 'alludin@gmail.com', NULL, NULL, NULL, NULL, 1516259928, 1525330597, 1, 'allu', 'khan', '0980980', 'salmlskjdskl', 'Mingora', 'swat', 'pakistan', 'salman_fb25.jpg', '25000', '', 1),
(17, '::1', '', '', 'aklsdfjklj', '$2y$08$.YziJCEy21.9jAIS6vRJs.EH7eksugxVjrPpyNk1isnrVYSMmiJD2', NULL, 'abdul@gmail.com', 'a03261b3697cc7ff5c974d1b733a1e14c81c6fd2', NULL, NULL, NULL, 1516277940, NULL, 0, 'salman', 'ksdjfk', '9798798', '', '', '', '', '', '', '224541', 0),
(18, '::1', '', '', 'kashoo', '$2y$08$UGWkYmub82cRLGT6wVkxVOGULlGWO7IfIziWtUPJqHqTbXypiMbxy', NULL, 'kashoo@gmail.com', '4d256dc35999cd2a0b0fc804cf9259e0712f9599', NULL, NULL, NULL, 1516278038, NULL, 0, 'kahshif', 'taj', '00000', '', 'jgjgjhgjhg', 'jhkjhkj', 'khkjhk', '', '', '717470', 0),
(19, '::1', '', '', 'majid khan', '$2y$08$BjtXpGFlSoi17FYdEgkBb.MPin86ssycbQnG.slTK8NVzEfHp1PuW', NULL, 'majidkhan@gmail.com', 'f30f6c8e0f2bcbd023d4dee13af1063d24c0f61e', NULL, NULL, NULL, 1516278087, NULL, 0, 'majid', 'khan', '23424234', 'peshawar', 'peshawa', 'peshawar', 'pakistan', '', '33000', '138274', 0),
(20, '::1', '', '', 'almg@yahoo.com', '$2y$08$KZy/qlaliL9wQYiDCwuaEuRPFWk9hR5lp7LTK/02Spn2f2zVgLwCK', NULL, 'alamgir@gmail.com', '2f671db768cb273cb59d987f4b87e7829682929c', NULL, NULL, NULL, 1516281238, 1516281316, 0, 'alamgir', 'khan', '234234234', '', '', '', '', '', '', '685069', 0),
(21, '::1', '', '', 'sdfsdf', '$2y$08$we2Tvv9W8pgRvOc/xnvapO/6WTgXGrfz3kfCPFuIfN0q6eKqbr9BS', NULL, 'admin@admin.com', '1d4e9f60b4b9affff04c372d4ffc0c9689a02a89', NULL, NULL, NULL, 1517289065, NULL, 0, 'sdfsdf', 'sdfds', '234232', '', '', '', '', '', '', '957721', 0),
(25, '::1', '117961473626683238554', 'google', 'salman iqbal', '$2y$08$OWS9QfSMT6VV0M8CB4AFnuJeKcoxRPaevB3aQO1aPeXzV4J7JvWKy', NULL, 'si87841@gmail.com', NULL, NULL, NULL, 'Y9THhOHJvX6noW1l2ouJwO', 1518604871, 1518604871, 1, 'salman', 'iqbal', NULL, '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 3),
(22, 22, 2),
(21, 14, 2),
(20, 20, 2),
(19, 19, 3),
(18, 18, 2),
(17, 17, 2),
(23, 23, 3),
(24, 24, 2),
(25, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `withdrawal` varchar(255) NOT NULL,
  `withdraw_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `seller_id`, `withdrawal`, `withdraw_date`) VALUES
(10, 2, '884.75', '2018-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_avalied`
--
ALTER TABLE `coupons_avalied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_products`
--
ALTER TABLE `favourite_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_ratings`
--
ALTER TABLE `products_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_resources`
--
ALTER TABLE `products_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_views`
--
ALTER TABLE `product_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coupons_avalied`
--
ALTER TABLE `coupons_avalied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favourite_products`
--
ALTER TABLE `favourite_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `products_ratings`
--
ALTER TABLE `products_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products_resources`
--
ALTER TABLE `products_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `product_views`
--
ALTER TABLE `product_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
