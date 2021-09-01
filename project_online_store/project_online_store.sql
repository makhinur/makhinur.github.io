-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2021 at 12:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group28_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `receive_commercials` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address1`, `address2`, `city`, `country`, `zip`, `receive_commercials`) VALUES
(2, 6, 'Dostyk street', '2A building, flat 45', 'Almaty', 'Kazakhstan', '052200', 'yes'),
(11, 8, 'Gogol street', '45', 'Almaty', 'Kazakhstan', '050016', 'yes'),
(12, 5, 'Passeig de Gracia', '141', 'Barcelona', 'Spain', 'GXQL202', 'no'),
(13, 12, 'Seifullin st.', '201', 'Almaty', 'Kazakhstan', '050010', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `full_name`, `access`) VALUES
(1, 'admin@gmail.com', 'qweqwe', 'John Smith', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `full_name`, `gender`) VALUES
(1, 'women_coats', 'Women Coats', 'Women'),
(2, 'men_coats', 'Men Coats', 'Men'),
(3, 'women_t-shirts', 'Women T-shirts', 'Women'),
(4, 'men_t-shirts', 'Men T-shirt', 'Men'),
(5, 'women_jeans', 'Women Jeans', 'Women'),
(6, 'men_jeans', 'Men Jeans', 'Men'),
(7, 'girls_t-shirts', 'Girls T-shirts', 'Girls'),
(8, 'girls_jackets', 'Girls Jackets', 'Girls'),
(9, 'boys_t-shirts', 'Boys T-shirts', 'Boys'),
(10, 'boys_jackets', 'Boys Jackets', 'Boys');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `producer` int(3) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `category` int(3) NOT NULL,
  `xs` int(4) NOT NULL,
  `s` int(4) NOT NULL,
  `m` int(4) NOT NULL,
  `l` int(4) NOT NULL,
  `xl` int(4) NOT NULL,
  `xxl` int(4) NOT NULL,
  `from_6_to_7_years` int(4) NOT NULL,
  `from_8_to_9_years` int(4) NOT NULL,
  `from_10_to_11_years` int(4) NOT NULL,
  `color` varchar(255) NOT NULL,
  `fabric` varchar(255) NOT NULL,
  `sale` varchar(3) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `producer`, `model`, `price`, `old_price`, `category`, `xs`, `s`, `m`, `l`, `xl`, `xxl`, `from_6_to_7_years`, `from_8_to_9_years`, `from_10_to_11_years`, `color`, `fabric`, `sale`, `img1`, `img2`, `img3`) VALUES
(1, 3, 'V-neckline essential T-shirt', 9990, 9990, 3, 0, 3, 5, 0, 1, 0, 0, 0, 0, 'Black', 'Cotton', 'no', 'https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33050745_99_D2.jpg?ts=1528908162308&imwidth=274&imdensity=2', 'https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33050745_99_D1.jpg?ts=1528908162308&imwidth=274&imdensity=2', 'https://st.mngbcn.com/rcs/pics/static/T3/fotos/S20/33050745_99_R.jpg?ts=1528908162308&imwidth=274&imdensity=2'),
(2, 2, 'T-shirt W NSW ESSNTL', 8990, 8990, 3, 1, 2, 0, 4, 0, 1, 0, 0, 0, 'Pink', 'Cotton', 'no', 'https://images.asos-media.com/products/adidas-originals-pink-trefoil-boyfriend-t-shirt/7335315-3?$XXL$&wid=513&fit=constrain', 'none', 'none'),
(3, 1, 'Футболка мужская', 8990, 8990, 4, 1, 2, 0, 4, 0, 1, 0, 0, 0, 'Black', 'Cotton', 'no', 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c4ecfdb2-ab11-44e9-b5be-f7923e2b612a/sportswear-mens-t-shirt-qbVDl7.png', 'none', 'none'),
(4, 8, 'Футболка мужская - PSTBIG', 9990, 9990, 4, 0, 3, 5, 0, 1, 0, 0, 0, 0, 'White', 'Cotton', 'no', 'none', 'none', 'none'),
(5, 3, 'Organic T-shirt', 10990, 10990, 3, 1, 3, 4, 5, 0, 0, 0, 0, 0, 'White', 'Cotton', 'no', 'none', 'none', 'none'),
(6, 8, 'Friends T-shirt', 11990, 15990, 3, 0, 3, 5, 0, 1, 0, 0, 0, 0, 'White', 'Cotton', 'yes', 'https://media2.newlookassets.com/i/newlook/630865710/womens/clothing/tops/white-cotton-friends-logo-t-shirt.jpg?strip=true&qlt=80&w=720', 'https://www.chabelazos.com/wp-content/uploads/2018/02/friends.jpg', 'https://ae01.alicdn.com/kf/H57ad450cd03f442bb80941a5c9adb149S/Friend-Tv-Show-T-Shirt-Women-Femme-Clothes-Female-Friends-T-shirt-Top-Tee-Shirts-Harajuku.jpg'),
(7, 4, 'ZW THE MARINE STRAIGHT JEANS', 15990, 15990, 5, 1, 3, 3, 4, 0, 1, 0, 0, 0, 'White', 'Denim', 'no', 'https://static.zara.net/photos///2021/V/0/1/p/8246/050/712/2/w/1700/8246050712_6_1_1.jpg?ts=1609850072412', 'https://static.zara.net/photos///2021/V/0/1/p/8246/082/712/5/w/1280/8246082712_1_1_1.jpg?ts=1617959198128', 'none'),
(8, 4, 'WIDE LEG FULL LENGTH RIPPED JEANS', 16990, 16990, 5, 1, 0, 3, 4, 0, 1, 0, 0, 0, 'Blue', 'Denim', 'no', 'https://static.zara.net/photos///2021/V/0/1/p/6045/025/400/2/w/850/6045025400_6_1_1.jpg?ts=1612182844763', 'https://static.zara.net/photos///2021/V/0/1/p/6045/025/400/2/w/1280/6045025400_2_1_1.jpg?ts=1609759628292', 'none'),
(9, 7, 'Men Coat', 36990, 36990, 2, 0, 0, 5, 4, 0, 1, 0, 0, 0, 'Black', 'Synthetic Wool', 'no', 'https://a.lmcdn.ru/product/T/O/TO030EMLANE6_12255920_1_v1_2x.jpg', 'https://a.lmcdn.ru/product/T/O/TO030EMLANE6_12255921_2_v1_2x.jpg', 'none'),
(10, 7, 'MESINA Coat', 69990, 69990, 2, 0, 0, 5, 4, 3, 0, 0, 0, 0, 'Brown', 'Synthetic Wool', 'no', 'https://a.lmcdn.ru/product/H/E/HE002EMLWRD9_12886420_1_v1_2x.jpg', 'https://a.lmcdn.ru/product/H/E/HE002EMLWRD9_12886422_3_v1_2x.jpg', 'https://a.lmcdn.ru/product/H/E/HE002EMLWRD9_12886423_4_v1_2x.jpg'),
(11, 1, 'Kids T-shirt', 12990, 12990, 7, 0, 0, 0, 0, 0, 0, 2, 1, 3, 'White', 'Cotton', 'no', 'https://static.nike.com/a/images/w_960,c_limit/2b8fdf21-90bc-4733-b522-89b92438fc0b/image.jpg', 'none', 'none'),
(12, 1, 'Kids Sportswear', 14990, 14990, 7, 0, 0, 0, 0, 0, 0, 2, 1, 3, 'Multicolor', 'Cotton', 'no', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/759dde72-48f2-45c5-811b-3b960b3d5780/sportswear-older-t-shirt-tScHBq.jpg', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5,q_80/301c329a-bbc3-4a45-9dff-281b09663991/sportswear-older-t-shirt-tScHBq.jpg', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5,q_80/aa65aaf9-7575-4c71-a449-35855c190f34/sportswear-older-t-shirt-tScHBq.jpg'),
(13, 2, 'Russian Team Home T-shirt', 19990, 19990, 9, 0, 0, 0, 0, 0, 0, 2, 4, 0, 'Red', 'Synthetic', 'no', 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/c71e3381a63c4e43910cab2700b08ac0_9366/Domashnyaya_futbolka_sbornoj_Rossii_krasnyj_GQ1196_01_laydown.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/54197d4032904feaaed1ab2700b0a25f_9366/Domashnyaya_futbolka_sbornoj_Rossii_krasnyj_GQ1196_02_laydown.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/6eb178db8e1e4910a828ab2700b0d597_9366/Domashnyaya_futbolka_sbornoj_Rossii_krasnyj_GQ1196_42_detail.jpg'),
(14, 1, 'Just Do It T-shirt', 15990, 15990, 9, 0, 0, 0, 0, 0, 0, 2, 4, 5, 'White', 'Cotton', 'no', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/rjmrjwxxdus7dsl9gv5i/younger-jdi-t-shirt-7fkTnr.jpg', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5,q_80/ijqzjqxqyvue7ox9gc7i/younger-jdi-t-shirt-7fkTnr.jpg', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5,q_80/xj1khoxormp3nxwdlgk4/younger-jdi-t-shirt-7fkTnr.jpg'),
(23, 2, 'AA T-shirt', 12990, 12990, 9, 0, 0, 0, 0, 0, 0, 0, 1, 0, 'White', 'Cotton', 'no', 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/c02239c36b8343589a49a930014dc026_9366/Futbolka_Trefoil_belyj_DV2904_01_laydown.jpg', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_model` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_size` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `item_id`, `item_model`, `item_price`, `item_size`, `item_quantity`, `item_img`, `date`) VALUES
(2, 8, 2, 'Футболка W NSW ESSNTL TOP', 8990, 'xs', 1, 'none', '2021-04-21 11:45:43'),
(3, 8, 2, 'Футболка W NSW ESSNTL TOP', 8990, 'xxl', 1, 'none', '2021-04-21 11:45:50'),
(4, 8, 1, 'Футболка - PSTBIG', 9990, 's', 1, 'none', '2021-04-21 11:45:56'),
(5, 8, 1, 'Футболка - PSTBIG', 9990, 'xl', 1, 'none', '2021-04-21 11:46:02'),
(33, 5, 13, 'Russian Team Home T-shirt', 19990, '6 - 7 years', 1, 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/c71e3381a63c4e43910cab2700b08ac0_9366/Domashnyaya_futbolka_sbornoj_Rossii_krasnyj_GQ1196_01_laydown.jpg', '2021-04-21 11:51:28'),
(34, 5, 14, 'Just Do It T-shirt', 15990, '6 - 7 years', 1, 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/rjmrjwxxdus7dsl9gv5i/younger-jdi-t-shirt-7fkTnr.jpg', '2021-04-21 11:51:28'),
(35, 5, 3, 'Футболка мужская', 8990, 'l', 1, 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/c4ecfdb2-ab11-44e9-b5be-f7923e2b612a/sportswear-mens-t-shirt-qbVDl7.png', '2021-04-21 11:56:25'),
(36, 5, 10, 'MESINA Coat', 69990, 'm', 1, 'https://a.lmcdn.ru/product/H/E/HE002EMLWRD9_12886420_1_v1_2x.jpg', '2021-04-21 12:09:33'),
(37, 12, 14, 'Just Do It T-shirt', 15990, '6 - 7 years', 1, 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/rjmrjwxxdus7dsl9gv5i/younger-jdi-t-shirt-7fkTnr.jpg', '2021-04-29 16:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_of_production` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `name`, `country_of_production`) VALUES
(1, 'Nike', 'Indonesia'),
(2, 'Addidas', 'Indonesia'),
(3, 'Mango', 'Vietnam'),
(4, 'Zara', 'Spain'),
(5, 'Levi\'s', 'USA'),
(7, 'Topshop', 'Vietnam'),
(8, 'H&M', 'Taiwan');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `stars_count` int(1) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `like_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_id`, `user_id`, `review_text`, `stars_count`, `post_date`, `like_count`) VALUES
(1, 1, 1, 'Excellent price value!', 5, '2021-04-03 12:20:27', 2),
(2, 1, 2, 'A bit slow delivery, but still good product', 3, '2021-04-03 14:26:23', 0),
(5, 2, 8, 'Beautiful colour and material, absolutely worth buying.', 5, '2021-04-24 17:16:32', 1),
(8, 3, 8, 'Quick delivery, overall pleased', 4, '2021-04-24 16:26:00', 0),
(9, 5, 8, 'Poor material quality', 1, '2021-04-24 16:54:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_liked_users`
--

CREATE TABLE `review_liked_users` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_liked_users`
--

INSERT INTO `review_liked_users` (`id`, `review_id`, `user_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`) VALUES
(1, 'smith@gmail.com', 'qweqwe', 'John Smith'),
(2, 'fran@gmail.com', 'qwerty', 'Francheska Little'),
(3, 'brown@gmail.com', '123', 'Anne Brown'),
(4, 'liam@gmail.com', 'wwwww', 'Liam Ocean'),
(5, 'leo@gmail.com', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'Leonel Messi'),
(6, 'cristiano@gmail.com', 'c5320410f64ab07e0ac5ad60bc13b07c61291b13', 'Christiano Ronaldo'),
(8, 'bee@gmail.com', '2c66c6e3c743465602c6dcd8e9412bee5fb846ed', 'Beyonce Knowles'),
(12, 'cage@gmail.com', 'd659c10e27d52b00987b65e85d99bce5480adcae', 'Nicolas Cage');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_liked_users`
--
ALTER TABLE `review_liked_users`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review_liked_users`
--
ALTER TABLE `review_liked_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
