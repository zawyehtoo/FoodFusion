-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2025 at 10:57 AM
-- Server version: 8.0.41
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfusion`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `community_post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `community_post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 1, 6, 'That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum That dish looks delicious lorem ispum', '2025-05-15 16:02:20'),
(2, 1, 7, 'Wow, Pad Kra Pao is my favourite', '2025-05-15 16:02:20'),
(3, 1, 1, 'hello world', '2025-05-15 19:04:49'),
(4, 1, 1, 'bon appetie', '2025-05-15 19:05:04'),
(5, 1, 1, 'funny', '2025-05-15 19:18:22'),
(6, 2, 1, 'hahaha', '2025-05-15 19:18:48'),
(7, 6, 1, 'yes. Fried rice is my one of my favourites', '2025-05-15 20:28:51'),
(8, 6, 7, 'me too', '2025-05-15 20:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

CREATE TABLE `community_posts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `cuisine_type_id` int NOT NULL,
  `dietary_preference_id` int NOT NULL,
  `difficulty_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cooking_tips` text,
  `ingredients` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `community_posts`
--

INSERT INTO `community_posts` (`id`, `user_id`, `cuisine_type_id`, `dietary_preference_id`, `difficulty_id`, `title`, `content`, `image`, `cooking_tips`, `ingredients`, `created_at`) VALUES
(1, 1, 1, 2, 3, 'Pad Kra Pao', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'assets/recipes/pad kra pao.jpg', 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum', 'Lorem ispumLorem ispumLorem ispumLorem ispumLorem ispum', '2025-05-15 22:06:53'),
(2, 1, 3, 2, 2, 'Homemade Pasta Carbonara', 'This classic Italian dish is creamy, rich, and surprisingly simple to make. The key is to use high-quality ingredients and perfect timing when combining the eggs with the hot pasta.', 'assets/recipes/carbonara.jpg', '1. Use freshly grated Pecorino Romano cheese for authentic flavor\n2. Reserve some pasta water to adjust sauce consistency\n3. Toss the pasta quickly off heat to avoid scrambling the eggs', '200g spaghetti\n100g pancetta or guanciale\n2 large eggs\n50g Pecorino Romano cheese\nFreshly ground black pepper\nSalt', '2025-05-15 18:30:00'),
(3, 2, 1, 2, 1, 'Authentic Tom Yum Soup', 'A spicy and sour Thai soup that is bursting with flavor. This version uses shrimp but can be adapted with chicken or mushrooms for a vegetarian option.', 'assets/recipes/TomYumRice.jpg', '1. Use fresh lemongrass and kaffir lime leaves for best aroma\n2. Adjust spice level with more or less chili paste\n3. Add coconut milk for a creamier version (Tom Yum Nam Khon)', '4 cups chicken or shrimp stock\n200g shrimp, peeled and deveined\n2 stalks lemongrass, bruised and cut\n3 kaffir lime leaves, torn\n5-6 slices galangal\n2-3 Thai chilies, crushed\n2 tbsp fish sauce\n1.5 tbsp lime juice\n1 tsp sugar\n1 cup straw mushrooms\nCilantro for garnish', '2025-05-14 15:45:00'),
(4, 5, 2, 1, 3, 'Perfect BBQ Ribs', 'Slow-cooked to perfection, these fall-off-the-bone ribs are worth the wait. The secret is in the dry rub and low-temperature smoking.', 'assets/recipes/bbq-ribs.jpg', '1. Remove the membrane from the bone side for tender ribs\n2. Maintain consistent smoker temperature (225-250°F)\n3. Use the 3-2-1 method: 3 hours smoke, 2 hours wrapped, 1 hour sauced', '1 rack pork baby back ribs\n1/4 cup brown sugar\n2 tbsp paprika\n1 tbsp garlic powder\n1 tbsp onion powder\n1 tsp cayenne pepper\n1 tsp black pepper\n1 tsp salt\nYour favorite BBQ sauce', '2025-05-13 12:00:00'),
(5, 6, 3, 2, 3, 'Classic Tiramisu', 'This elegant Italian dessert layers coffee-soaked ladyfingers with a rich mascarpone cream. Perfect for dinner parties or special occasions.', 'assets/recipes/tiramisu.jpg', '1. Use freshly brewed espresso cooled to room temperature\n2. Let the tiramisu set for at least 6 hours, preferably overnight\n3. Dust with cocoa powder just before serving', '6 egg yolks\n3/4 cup granulated sugar\n1 cup mascarpone cheese\n1.5 cups heavy cream\n2 cups strong brewed coffee, cooled\n2 tbsp coffee liqueur (optional)\n24 ladyfinger cookies\nCocoa powder for dusting', '2025-05-12 20:15:00'),
(6, 1, 1, 1, 1, 'Fried rice', 'Fired rice is the traditional recipe and very easy to cook.', 'assets/recipes/fried-rice.jpg', 'Lorem ispum Lorem ispumLorem ispumLorem ispumLorem ispumLorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispum', 'Lorem ispum Lorem ispum Lorem ispum Lorem ispum Lorem ispumLorem ispumLorem ispum', '2025-05-16 03:28:16'),
(7, 7, 1, 2, 2, 'Biryani', 'This is really simple and easy to cook', 'assets/recipes/Chicken-Biryani-Recipe-SQ-scaled.jpg', 'Lorem ispum Lorem ispumLorem ispumLorem ispumLorem ispumLorem ispum Lorem ispumLorem ispumLorem ispum', 'Lorem ispum Lorem ispumLorem ispumLorem ispumLorem ispumLorem ispumLorem ispumLorem ispumLorem ispumLorem ispumLorem ispum', '2025-05-16 03:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'zaw ye', 'zawyehtoo29@gmail.com', 'hello', 'hello world this is blah blah blah', '2025-05-15 05:31:29'),
(2, 'simon', 'simon@gmail.com', 'helllo', 'loreahsdpohasdofhf', '2025-05-15 06:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_types`
--

CREATE TABLE `cuisine_types` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cuisine_types`
--

INSERT INTO `cuisine_types` (`id`, `name`) VALUES
(1, 'Thailand'),
(2, 'America'),
(3, 'Italy');

-- --------------------------------------------------------

--
-- Table structure for table `dietary_preferences`
--

CREATE TABLE `dietary_preferences` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dietary_preferences`
--

INSERT INTO `dietary_preferences` (`id`, `name`) VALUES
(1, 'High Protein'),
(2, 'Non-Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `difficulties`
--

INSERT INTO `difficulties` (`id`, `name`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `cuisine_type_id` int NOT NULL,
  `dietary_preference_id` int NOT NULL,
  `difficulty_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `user_id`, `title`, `image`, `description`, `cuisine_type_id`, `dietary_preference_id`, `difficulty_id`, `created_at`) VALUES
(1, 1, 'Pad Kra Pao', 'assets/recipes/pad kra pao.jpg', 'Delicious Thai cuisine', 1, 1, 1, '2025-05-14 15:46:37'),
(2, 1, 'Lasagna', 'assets/recipes/Lasagna.jpg', 'Delicious American cuisine', 2, 1, 2, '2025-05-14 15:46:37'),
(3, 1, 'Spaghetti', 'assets/recipes/spaghetti.jpg', 'Delicious Italian cuisine', 3, 2, 1, '2025-05-14 15:46:37'),
(4, 1, 'Tom Yum Fried Rice', 'assets/recipes/TomYumRice.jpg', 'Delicious Thai cuisine', 1, 2, 1, '2025-05-14 15:46:37'),
(5, 1, 'Green Curry', 'assets/recipes/green-curry.jpg', 'Aromatic Thai green curry with coconut milk and vegetables', 1, 2, 2, '2025-05-15 02:43:39'),
(6, 1, 'Mango Sticky Rice', 'assets/recipes/mango-sticky-rice.jpg', 'Sweet Thai dessert with ripe mango and coconut sticky rice', 1, 2, 1, '2025-05-15 02:43:39'),
(7, 1, 'Margherita Pizza', 'assets/recipes/margherita-pizza.jpg', 'Classic pizza with tomato sauce, mozzarella, and basil', 3, 2, 2, '2025-05-15 02:43:39'),
(8, 1, 'Tiramisu', 'assets/recipes/tiramisu.jpg', 'Coffee-flavored Italian dessert with mascarpone cheese', 3, 2, 3, '2025-05-15 02:43:39'),
(9, 1, 'Pasta Carbonara', 'assets/recipes/carbonara.jpg', 'Creamy pasta with eggs, cheese, pancetta, and black pepper', 3, 2, 2, '2025-05-15 02:43:39'),
(10, 1, 'Classic Burger', 'assets/recipes/classic-burger.jpg', 'Juicy beef patty with cheese, lettuce, and special sauce', 2, 2, 1, '2025-05-15 02:43:39'),
(11, 1, 'BBQ Ribs', 'assets/recipes/bbq-ribs.jpg', 'Slow-cooked pork ribs with homemade BBQ sauce', 2, 2, 3, '2025-05-15 02:43:39'),
(12, 1, 'Apple Pie', 'assets/recipes/apple-pie.jpg', 'Traditional American dessert with cinnamon-spiced apples', 2, 1, 2, '2025-05-15 02:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'scott', 'Htetsdfsdf', 'zawyehtoo29@gmail.com', '$2y$10$u5Oy6dAEMQ1kxD1EgHmou.RBjjo1KUPID5hHXSsz2nVuge4GVrIYy', '2025-05-13 13:35:45', '2025-05-13 13:35:45'),
(2, 'thar gyi', 'hto', 'thargyi@gmail.com', '$2y$10$hEsP0Bek4mhwYeYVH9Hdx.wd1JHd1o/V6iWPs1/Od7r6T1Mr5TxpS', '2025-05-13 13:43:47', '2025-05-13 13:43:47'),
(3, '', '', '', '$2y$10$9kNJxll2CgAiSd7TkpkNdOBg67B5Rc7HW5dDvlSPMj2./WxcE0tXq', '2025-05-13 17:06:24', '2025-05-13 17:06:24'),
(4, 'hello', 'world', 'hello@gmail.com', '$2y$10$c9Gz4OaC.6QixlJ9XioIGOA5qqMskTUKMkmES/F//09XN51cdOYwW', '2025-05-14 04:48:19', '2025-05-14 04:48:19'),
(5, 'Lin', 'htet', 'lin@gmail.com', '$2y$10$LbuUbv.Fxe3Ngry5AdaRTuuHSTCFF4qD0ddNQM9aXV18HoaIzmFZG', '2025-05-15 05:45:59', '2025-05-15 05:45:59'),
(6, 'Alex min', 'Xuu haha', 'myo@gmail.com', '$2y$10$mFRHRW7teDtzjgDgBqfU4en/EuHjYko7c5gfGkNwUXhDX8s.kRlEq', '2025-05-15 06:27:35', '2025-05-15 06:27:35'),
(7, 'Tin', 'hla', 'hla@gmail.com', '$2y$10$1/4HK3wtELIPfrtfTx91febK3Omf9E7m/AV9Lp2jpzMBOhcH93BaK', '2025-05-15 11:22:52', '2025-05-15 11:22:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `community_post_id` (`community_post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cuisine_type_id` (`cuisine_type_id`),
  ADD KEY `dietary_preference_id` (`dietary_preference_id`),
  ADD KEY `difficulty_id` (`difficulty_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine_types`
--
ALTER TABLE `cuisine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dietary_preferences`
--
ALTER TABLE `dietary_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cuisine_type_id` (`cuisine_type_id`),
  ADD KEY `dietary_preference_id` (`dietary_preference_id`),
  ADD KEY `difficulty_id` (`difficulty_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cuisine_types`
--
ALTER TABLE `cuisine_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dietary_preferences`
--
ALTER TABLE `dietary_preferences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`community_post_id`) REFERENCES `community_posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD CONSTRAINT `community_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `community_posts_ibfk_2` FOREIGN KEY (`cuisine_type_id`) REFERENCES `cuisine_types` (`id`),
  ADD CONSTRAINT `community_posts_ibfk_3` FOREIGN KEY (`dietary_preference_id`) REFERENCES `dietary_preferences` (`id`),
  ADD CONSTRAINT `community_posts_ibfk_4` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulties` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`cuisine_type_id`) REFERENCES `cuisine_types` (`id`),
  ADD CONSTRAINT `recipes_ibfk_3` FOREIGN KEY (`dietary_preference_id`) REFERENCES `dietary_preferences` (`id`),
  ADD CONSTRAINT `recipes_ibfk_4` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
