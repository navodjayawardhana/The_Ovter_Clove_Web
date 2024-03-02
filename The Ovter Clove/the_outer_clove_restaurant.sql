-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 03:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_outer_clove_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(350) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`, `id`, `email`, `type`) VALUES
('Punsara', '$2y$10$5K3bAEpT1Eg3WYJpO4WJF.O5n0kN1IWi1yTyQAjI5fFVbHbMa3d.C', 6, 'punsar@gmail.com', 'admin'),
('Navod', '$2y$10$C5ik20eZJ139i/7VkewaQOJbdUp3gFBRDV4e7UfIOKj9xGAzxIbJ6', 7, 'navodthishan@gmail.com', 'super_admin'),
('Himaya', '$2y$10$TXeEgG0JxhKZDJ1mp2G.d.Ovzksh4JoUOpIabiof./JOy74TDbxri', 8, 'himaya1@gmail.com', 'admin'),
('admin', '$2y$10$2AAN.pmOX/5kzAU7ekEc4uSvoWF7g6Qpt2mVWeVvD8KPgpuzYD9ZC', 9, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `datetime` varchar(40) NOT NULL,
  `people` varchar(25) NOT NULL,
  `special_request` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `datetime`, `people`, `special_request`) VALUES
(2, 'navod', 'navodthishan@gmail.com', '12/30', '2', 'dffdfd'),
(4, 'navod', 'navodthishan@gmail.com', '12/21/2023', '4', 'dsaffa');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

CREATE TABLE `chef` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`id`, `name`, `image`) VALUES
(2, 'Robin', 'team-1.jpg'),
(3, 'Krish', 'team-4.jpg'),
(6, 'Brain', 'team-2.jpg'),
(7, 'Stina', 'team-3.jpg'),
(10, 'karsha', 'b8396ae14a3b9cb506668dabdd462cfd.jpg'),
(12, 'Rahuman', 'Food Photographer of the Year.jfif'),
(13, 'Kirth', 'download.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'navod thishan', 'navodthishan@gmail.com', 'fdg', 'fdscdscsdsa dfsadf'),
(2, 'navod thishan', 'navodthishan@gmail.com', 'fdg', 'ිවනඉ ජං'),
(3, 'Sarath', 'sarath@gmail.com', 'Oder', 'I can Oder '),
(4, 'Navod Jayathilakejkl', 'jnk@kjk.lk', 'lkl', 'kml  ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `user_id`, `password`) VALUES
('navod', 'navodthishan@gmail.com', 1, '$2y$10$zQlGQzVsITdW8mhTPV6xn.l3kdnZzpjOb7/sZBCtdhbkx/jH2ekRK'),
('Dulan', 'navodthishan@gmail.com', 2, '$2y$10$nQ3L.3j3yGqklOCQlWfJIeen2d4690th73.vagtlvabJm8.x/oIxm'),
('Dulan', 'dulan@gmail.com', 3, '$2y$10$EOFHD2AO3Eezv4BjHcx12.PqX4gywVChcOUfFeA2O0cRIqTA0/kKS'),
('admin', 'admin@gmail.com', 4, '$2y$10$/lNN6SJNC/vtlXcsO7.pw.GNnn5QQB/IOGDljOBLjWuOIUI3NtnmG'),
('Navod Thishan ', 'navodthishan4@gmail.com', 5, '$2y$10$PSiuN9bv62UPA69NXIlbquZ/U8o/P9Qppgl6qfcNcfc6EdjQJteXy');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'navod thishan', 'navodthishan@gmail.com', 'Good Product', 'Fast delivery'),
(3, 'Navod Jayathilake', 'sda@gmail.com', 'jkjn', 'vgkjl  kjnsa m kjnsa dnm ;kjba sd,n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `price`, `order_date`) VALUES
(21, '1', '35', '1', '1000', '2023-12-20 02:31:40'),
(22, '1', '35', '1', '1000', '2023-12-20 02:37:16'),
(23, '1', '35', '2', '1000', '2023-12-20 04:38:56'),
(24, '1', '36', '1', '1300', '2023-12-20 04:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(5500) NOT NULL,
  `category` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `category`) VALUES
(34, 'Vegetable Chow Mein Noodles', '500', 'Vegetable Chow Mein Noodles.jpg', 'Hong Kong-style Cantonese vegetable chow mein is a vegetarian alternative to traditional chow mein dishes, featuring crispy pan-fried noodles, bok choy, mushrooms, and bean sprouts.', '1'),
(35, 'Gobi Manchurian', '1000', 'Gobi Manchurian.jpg', 'Popular Indo-Chinese dish where fried cauluflower florets are tossed in a flavorful manchurian sauce. Gobi Manchurian is great with noodles! Vegan.', '1'),
(36, 'Kimchi Noodle Soup with Dumplings', '1300', 'Kimchi Noodle Soup with Dumplings.jpg', 'A warm and hearty bowl of Kimchi Noodle Soup with Dumplings! Noodles in a really flavourful and umami kimchi broth with mushrooms, dumplings, and veggies. This is one of those really easy one-pot recipes that you can easily whip-up when you’re craving a bowl of noodles!', '1'),
(37, '15-Minute Korean Noodle Soup', '1200', '15-Minute Korean Noodle Soup.jpg', 'This 15-minute Korean noodle soup is a perfect one-pot dinner for your busy weekdays. ', '1'),
(38, 'Fettuccine Alfredo With Shrimp', '800', 'Fettuccine Alfredo With Shrimp.jpg', 'There is nothing better than mixing up fettuccine noodles in a homemade Alfredo sauce tossed with shrimp! This easy recipe will make you feel like a chef your family will love.', '2'),
(39, 'Alfredo Sauce', '750', 'Alfredo Sauce.jpg', 'creamy sauce is delicious over pasta, roasted vegetables, and more.', '2'),
(40, 'Penne Arrabbiata', '800', 'Penne Arrabbiata.jpg', 'Penne Arrabbiata is spicy, saucy, and so easy! The combination of penne noodles, spicy tomato sauce, and parmesan cheese is simply irresistible.', '2'),
(42, 'Creamy Vegetable Soup', '500', 'Creamy Vegetable Soup.jpg', 'This Creamy Vegetable Soup is a cozy, comforting vegan recipe that\'s gluten-free, easy-to-make & loaded with veggies- great for lunch or as a dinner starter', '3'),
(43, 'Roasted Butternut Squash and Red Pepper Soup', '900', 'Roasted Butternut Squash and Red Pepper Soup.jpg', 'This butternut squash and red pepper soup is perfect for making on chilly days. It\'s quick and easy to make and packed full of flavor as the vegetables are roasted', '3'),
(44, 'Roasted Vegetable Soup', '1200', 'Roasted Vegetable Soup.jpg', 'This mixed vegetable soup is about to be your new go-to soup recipe. The vegetables are spiced and roasted for a more intense flavour!', '3'),
(45, 'Wonton Soup', '780', 'Wonton Soup.jpg', 'Recipe VIDEO above. Homemade wontons are amazing! No fillers, just real ingredients in the filling. Terrific standby freezer meal!', '3'),
(46, 'Homemade Creamy Vegetable Soup', '700', 'Homemade Creamy Vegetable Soup.jpg', 'Homemade Creamy Vegetable Soup is an insanely delicious, creamy vegetable soup without any cream', '3'),
(47, 'Tortilla Soup', '1000', 'Tortilla Soup.jpg', 'This delicious and easy Tortilla Soup is a great way to use up your leftover Thanksgiving turkey or chicken', '3'),
(48, 'Creamy Pesto Rigatoni', '900', 'Creamy Pesto Rigatoni.jpg', 'Creamy Pesto Rigatoni with Chili Garlic Breadcrumbs is the pasta recipe you didn’t know you needed', '2'),
(49, 'Ultimate Lasagna Bolognese', '1500', 'Ultimate Lasagna Bolognese.jpg', 'Rich meat sauce, creamy béchamel and loads of mozzarella make up this ultimate lasagna', '2'),
(50, 'Sweet and Spicy Tempeh with Garlic Curry Noodles', '1400', 'Sweet and Spicy Tempeh with Garlic Curry Noodles.jpg', 'Strips of tempeh pan-fried before being cooked with a kecap manis (sweet soy sauce)-based sauce with some garlic, onion, and chili', '1'),
(51, 'Quick and Easy Chinese Noodle Soup', '1000', 'Quick and Easy Chinese Noodle Soup.jpg', 'A delicious soup with plenty of vibrant flavors that are brought together in one pot. Once you try this recipe, you’ll never go back to the packaged soups again!', '3'),
(52, 'Penne Arrabbiata', '800', 'Penne Arrabbiata.jfif', 'Arrabbiata is spicy, saucy, and so easy! The combination of penne noodles, spicy tomato sauce, and parmesan cheese is simply irresistible. But the best part is this Italian pasta recipe is ready in about 20 minutes.', '2'),
(53, 'Cajun Shrimp Pasta', '1800', 'Cajun Shrimp Pasta - Baker by Nature.jfif', 'Cajun Shrimp Pasta is creamy, spicy, and loaded with flavor! Ready in about 30 minutes, this pasta dish is sure to become a family favorite. Use fresh or frozen shrimp.', '2'),
(54, 'Quick Spicy Garlic Shrimp Noodles', '1500', 'Quick Spicy Garlic Shrimp Noodles Recipe & Video - Seonkyoung Longest.jfif', 'Spicy Garlic Shrimp Noodles! We all LOVE garlic shrimp, especially spicy garlic shrimp. We all also love noodles... why not put them together as one dish?!', '1'),
(55, 'Roasted Vegetable Soup', '600', 'Roasted Vegetable Soup_ A Flavorful and Nutritious Delight.jfif', 'This wonderful recipe for roasted vegetable soup is the tastiest roasted vegetable soup recipe full of tomatoes, root vegetables and more. Perfect all year round.', '3'),
(56, 'Warm & Cozy Italian Meatball Soup', '800', 'Warm & Cozy Italian Meatball Soup Recipe _ Little Spice Jar.jfif', 'This meal comes complete with homemade meatballs, the most delicious tomato sauce, and cooked pasta!', '2'),
(57, 'Vegan Potato Soup', '700', 'Vegan Potato Soup Recipe.jfif', 'leeks, carrots, celery and green peas. It’s creamy, savory and good for you with a lovely Tuscan vibe from fresh rosemary. A simple comforting veggie stew in any season.', '3'),
(58, 'Creamy Tortellini Soup', '700', 'Creamy Tortellini Soup Recipe _ Creamy Soup Recipes _ Damn Delicious.jfif', 'Loaded with tender tortellini, sausage and kale!', '3'),
(59, 'Yaki Udon with Shrimp (Japanese Stir Fried Noodles)', '800', 'Yaki Udon with Shrimp (Japanese Stir Fried Noodles) - Chili to Choc.jfif', 'Yaki Udon with Shrimp is a Japanese stir fried noodles', '1');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(5) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `image`) VALUES
(6, 'promotion 1', 'promotion_1.jpg'),
(7, 'promotion 2', 'promotion_2.jpg'),
(8, 'promotion 3', 'promotion_3.jpg'),
(9, 'promotion 4', 'promotion_4.jpg'),
(10, 'promotion 5', 'Screenshot (57).png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`) VALUES
(1, 'Master Chefs', 'Overclove\'s Master Chefs Create A Curated Menu Blending Traditional And Avant-Garde Culinary Techniques, Ensuring Every Dish Is A Revelation, Showcasing Their Culinary Artistry.'),
(2, 'Quality Food', 'Our culinary sanctuary aims to elevate dining experiences by sourcing the finest, freshest ingredients to create dishes that exceed expectations.'),
(3, 'Online Order', 'Our online menu offers a diverse range of dishes, healthy options, and decadent desserts to cater to your preferences, allowing you to enjoy our menu from anywhere.'),
(4, '24/7 Service', 'Quality Food offers round-the-clock service, catering to all times of the day and night, with a diverse menu featuring culinary masterpieces for flexibility and convenience.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(12) NOT NULL,
  `usersName` varchar(25) NOT NULL,
  `usersEmail` varchar(16) NOT NULL,
  `usersUId` varchar(32) NOT NULL,
  `UsersPwd` varchar(25) NOT NULL,
  `userstype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUId`, `UsersPwd`, `userstype`) VALUES
(1, 'navod', 'navodthishan@gma', 'navod', '$2y$10$kHm0vMKnoacNU1Xn71', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `chef`
--
ALTER TABLE `chef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
