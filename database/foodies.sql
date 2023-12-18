-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 04:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodies`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(12, 'Side Dish', 'side-dish', 'Perfect side-kicks for perfect main dishes', 0, 1, '1702819351.jpg', 'Side dishes', 'Explore a variety of flavorful and nutritious side dishes perfect for complementing any meal', 'side dish, flavorful, nutritious, delicious', '2023-12-17 13:22:31'),
(13, 'Main Dish', 'main-dish', 'Must-have', 0, 1, '1702824726.jpg', 'Main Dish', 'Discover an array of mouthwatering main dish recipes. From succulent fish dishes to indulgent beef meals, explore fresh and flavorful main courses perfect for any occasion.', 'main dishes, flavourful, mouthwatering, fresh, delicious, spectacular', '2023-12-17 13:27:11'),
(14, 'Dessert', 'dessert', 'Wide array of delectable sweets and treats', 0, 1, '1702819929.jpg', 'Indulgent Dessert Recipes', 'Satisfy your sweet cravings with our collection of exquisite dessert recipes. From decadent cakes to refreshing sorbets, explore a delightful array of dessert options perfect for every palate.', 'dessert, recipes, sweet treats, cake recipes, pastry, indulgent desserts, ice cream', '2023-12-17 13:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(19, 13, 'Les Huitres Gratiness', 'les-huitres-gratiness', '\"Les Huitres Gratiness\" is a savory French dish featuring briny and succulent oysters, exquisitely prepared to tantalize the taste buds. The dish delivers a harmonious blend of fresh flavors and delicate textures, making it a delightful choice for seafood enthusiasts.', '\"Les Huitres Gratiness\" is a delightful French culinary creation that showcases the finest oysters meticulously prepared to perfection. Each bite offers a delightful burst of maritime freshness, accentuated by subtle yet rich flavor profiles. The dish is a testament to culinary craftsmanship, offering a remarkable indulgence for seafood connoisseurs.', 150000, 120000, '1702820115.jpeg', 30, 0, 1, 'Les Huitres Gratiness: Exquisite French Oyster Delicacy', 'oysters, French seafood, seafood delicacy, French cuisine', 'Savor the ocean\'s treasures with Les Huitres Gratiness, a French delicacy featuring impeccably crafted oysters, offering a symphony of fresh flavors and exquisite textures', '2023-12-17 13:35:15'),
(20, 13, 'La Fricassée de Lotte', 'la-Fricassee-de-lotte', '\"La Fricassée de Lotte\" is a delectable French dish featuring monkfish, expertly prepared with flavorful ingredients to deliver a rich, savory experience, showcasing the culinary artistry of French cuisine.', '\"La Fricassée de Lotte\" is a classic French culinary masterpiece that highlights the delicate and firm texture of monkfish, combined with aromatic herbs, savory sauces, and perfectly balanced seasonings. This dish presents a harmonious blend of flavors and textures, creating a memorable dining experience that reflects the essence of French gastronomy.', 200000, 170000, '1702820492.jpeg', 20, 0, 1, ' a suitable representation might be \"Savor the Excellence of La Fricassée de Lotte | Classic French Monkfish Dish.', 'monkfish recipe, French seafood dish, classic French cuisine, gourmet fish dish', 'Experience the allure of La Fricassée de Lotte, a classic French dish elevating monkfish to new heights with its exquisite blend of flavors and culinary expertise.', '2023-12-17 13:41:32'),
(21, 13, 'Le Boeuf du Boucher', 'le-boeuf-du-boucher', '\"Le Boeuf du Boucher\" translates to \"Butcher\'s Beef\" in English and is a delectable French dish that showcases the finest cuts of beef, skillfully prepared to perfection, representing the epitome of French culinary expertise.', '\"Le Boeuf du Boucher\" is a culinary delight that epitomizes the art of French butchery, featuring premium cuts of beef expertly seasoned and cooked to showcase the natural flavors and textures of the meat. This dish embodies the essence of French gastronomy, offering a succulent and unforgettable dining experience.', 250000, 210000, '1702824697.jpg', 40, 0, 1, 'A fitting meta title for ', 'French beef dish, gourmet beef recipe, traditional French cuisine, premium beef cuts.', 'Savor the exquisite flavors of Le Boeuf du Boucher, a premium French beef dish that embodies culinary mastery and gourmet delight.', '2023-12-17 13:47:12'),
(22, 14, 'Pot de Crème à la Citrouille', 'pot-de-creme-a-la-citrouille', 'Indulge in the rich and creamy flavors of \"Pot de Crème à la Citrouille,\" a delightful French dessert with a seasonal twist, featuring the warm essence of pumpkin in every spoonful.', '\"Pot de Crème à la Citrouille\" is a luxurious French dessert that artfully combines velvety smooth custard with the comforting flavors of pumpkin and a hint of seasonal spices. This indulgent treat embodies the essence of autumn, offering a delectable fusion of creamy textures and warm, fragrant undertones.', 190000, 160000, '1702821998.jpg', 40, 0, 1, 'Savor the Splendor of Autumn with Pot de Crème à la Citrouille | Pumpkin French Dessert', 'French dessert, pumpkin custard, autumn flavors, seasonal dessert, pumpkin spice, creamy dessert', 'Experience the allure of Pot de Crème à la Citrouille, a French dessert that celebrates the enchanting flavors of pumpkin and the comforting embrace of autumn\'s finest spices.', '2023-12-17 13:49:21'),
(23, 14, 'Baba au Rum', 'baba-au-rum', 'Indulge in the timeless elegance of Baba au Rum, a classic French dessert soaked in rum syrup. Savor the rich flavors and moist texture of this delectable treat, perfect for those who appreciate the artistry of fine pastry.', 'Baba au Rum, a culinary masterpiece originating from France, is a dessert that embodies sophistication and indulgence. This delectable treat features a light and airy yeast cake, perfectly infused with a generous amount of rum syrup. The result is a moist, flavorful delight that captivates the palate with every bite. Whether served plain or with a dollop of whipped cream, Baba au Rum is a celebration of the harmonious marriage between sweet pastry and the robust notes of rum. Elevate your dessert experience with this exquisite classic that has stood the test of time.', 140000, 90000, '1702823245.jpg', 25, 0, 1, 'Baba au Rum: A French Classic Infused with Rum Elegance', 'Baba au Rum, French Dessert, Rum-Soaked Cake, Yeast Pastry, Culinary Elegance, Classic Dessert, Indulgent Treat, Exquisite Flavors, Pastry Artistry, Decadent Delight.', 'Discover the allure of Baba au Rum, a timeless French dessert renowned for its exquisite taste and luxurious infusion of rum. Immerse yourself in the decadent experience of this moist yeast cake, creating a perfect balance of flavors that will leave you craving more.', '2023-12-17 14:26:19'),
(24, 12, 'Salad de Chou', 'salad-de-chou', 'Experience the crisp freshness of Salad de Chou, a delightful French cabbage salad that combines vibrant vegetables with a zesty dressing. Elevate your palate with this light and flavorful dish.', 'Salad de Chou, a French cabbage salad, is a celebration of freshness and simplicity. Crisp shredded cabbage is paired with an array of colorful vegetables, creating a visually appealing and nutrition-packed dish. The salad is elevated with a tangy and flavorful dressing, perfectly balancing the textures and tastes. Whether served as a refreshing side or a light main course, Salad de Chou is a culinary delight that brings together the goodness of garden-fresh ingredients with the artistry of French cuisine. Immerse yourself in a symphony of flavors with every forkful of this vibrant salad.', 120000, 95000, '1702823476.jpg', 50, 0, 1, 'Salad de Chou: A Fresh and Flavorful French Cabbage Salad', 'Salad de Chou, French Cabbage Salad, Fresh Vegetables, Zesty Dressing, Culinary Delight, Vibrant Flavors, Crisp Texture, Light and Flavorful, French Cuisine, Nutrient-packed Dish.', 'Delight your senses with Salad de Chou, a French cabbage salad that combines crisp textures and vibrant flavors. This refreshing dish, enhanced with a zesty dressing, is a perfect blend of simplicity and culinary finesse.', '2023-12-17 14:31:16'),
(25, 14, 'Opera', 'opera', 'Indulge in the opulent layers of Opera, a French pastry masterpiece. This decadent dessert features delicate layers of almond sponge, coffee buttercream, and rich chocolate ganache.', 'Opera, a quintessential French pastry, is a symphony of flavors and textures that delights dessert enthusiasts worldwide. This luxurious creation consists of meticulously crafted layers, including almond sponge, coffee buttercream, and sumptuous chocolate ganache. The almond sponge provides a delicate and nutty base, while the coffee-infused buttercream adds a subtle richness. The ensemble is harmonized with a velvety chocolate ganache, creating a perfect balance of sweetness and depth. Each slice of Opera is a journey through layers of indulgence, making it a centerpiece of refined pastry artistry.', 80000, 65000, '1702823763.jpg', 45, 0, 1, 'Opera: Decadent Layers of Almond, Coffee, and Chocolate Bliss', 'Opera, French Pastry, Almond Sponge, Coffee Buttercream, Chocolate Ganache, Decadent Dessert, Pastry Artistry, Sweet Symphony, Gourmet Delight, Layered Indulgence.', 'Discover the exquisite allure of Opera, a French pastry masterpiece featuring layers of almond sponge, coffee buttercream, and rich chocolate ganache. Indulge in the decadence of this harmonious blend of flavors.', '2023-12-17 14:36:03'),
(26, 12, 'Pommes Dauphine', 'pommes-dauphine', 'Delight in the crispy elegance of Pommes Dauphine, a French fancy side dish marrying mashed potatoes and choux pastry, resulting in golden, bite-sized orbs with a creamy interio', 'Pommes Dauphine, a whimsical French creation, transforms the humble potato into a culinary work of art. Mashed potatoes are skillfully combined with choux pastry, creating a light and airy dough. The mixture is then shaped into small rounds and deep-fried to a golden perfection. The result is Pommes Dauphine—crispy on the outside, soft and creamy on the inside. Each bite is a symphony of textures and flavors, making this side dish a delightful addition to any gastronomic affair. Elevate your dining experience with the sophisticated charm of Pommes Dauphine.', 150000, 110000, '1702824085.jpg', 60, 0, 1, 'Pommes Dauphine: Crispy Golden Delights of Mashed Potato Elegance', 'Pommes Dauphine, French Fancy Side Dish, Mashed Potatoes, Choux Pastry, Golden Delights, Crispy Elegance, Culinary Magic, Bite-Sized Perfection, Creamy Interior, French Gastronomy.', 'Experience the culinary magic of Pommes Dauphine, a French side dish that marries mashed potatoes and choux pastry to create golden, bite-sized orbs with a creamy interior. Indulge in the perfect blend of crispy elegance.', '2023-12-17 14:39:54'),
(27, 12, 'Haricots Verts Amandine', 'haricots-verts-amandine', 'Elevate your plate with Haricots Verts Amandine, a sophisticated French fancy side dish featuring tender green beans adorned with buttery almond slivers, creating a harmonious balance of flavors and textures.', 'Haricots Verts Amandine, a refined French side dish, showcases the delicate beauty of slender green beans paired with the rich nuttiness of almonds. The beans are blanched to perfection, maintaining their vibrant color and crispness. Buttered almond slivers are generously sprinkled over the beans, adding a layer of richness and a delightful crunch. This elegant combination creates a symphony of flavors, making Haricots Verts Amandine a sophisticated addition to any dining experience. Immerse yourself in the world of French culinary finesse with this exquisite side dish.', 170000, 170000, '1702824305.jpg', 25, 0, 0, 'Haricots Verts Amandine: French Elegance in Every Green Bean', 'Haricots Verts Amandine, French Fancy Side Dish, Green Beans, Buttered Almonds, Culinary Finesse, Sophisticated Dining, Elegance on the Plate, French Cuisine, Vibrant Flavors, Nutty Crunch.', 'Indulge in sophistication with Haricots Verts Amandine, a French side dish featuring tender green beans adorned with buttery almond slivers. Experience a harmonious balance of flavors and textures in every bite.', '2023-12-17 14:45:05'),
(28, 13, 'Ratatouille au Fromage', 'ratatouille-au-fromage', 'Savor the indulgent twist with Ratatouille au Fromage, a flavorful dish where layers of zucchini, eggplant, and tomatoes are nestled in a rich cheese blend, creating a mouthwatering symphony of textures and tastes.', 'Ratatouille au Fromage takes the classic French dish to new heights by introducing a luscious layer of melted cheese to the traditional vegetable medley. Thinly sliced zucchini, eggplant, and tomatoes are skillfully arranged and baked to perfection. A decadent blend of cheeses, including mozzarella, Parmesan, and goat cheese, is melted over the vegetables, creating a gooey and flavorful topping. The result is a dish that marries the rustic charm of Ratatouille with the irresistible allure of melted cheese. Each forkful is a journey through layers of savory goodness, making Ratatouille au Fromage a delightful centerpiece for any gourmet occasion.', 240000, 240000, '1702824611.jpg', 60, 0, 1, 'Ratatouille au Fromage: A Gourmet Fusion of Vegetables and Melting Cheeses', 'Ratatouille au Fromage, Gourmet Fusion, Vegetable Medley, Melted Cheeses, French Cuisine, Savory Delight, Decadent Blend, Rustic Charm, Culinary Fusion, Irresistible Gourmet.', 'Experience culinary bliss with Ratatouille au Fromage, where layers of zucchini, eggplant, and tomatoes are baked to perfection, topped with a rich blend of melted cheeses. Indulge in a mouthwatering symphony of textures and tastes.', '2023-12-17 14:50:11'),
(29, 14, 'Fraise Napoléon', 'fraise-napoleon', 'Savor the sweet delicacy of Fraise Napoléon, a refined French dessert featuring crispy layers of puff pastry, light pastry cream, and fresh strawberries.', 'Fraise Napoléon is an elegant sweet creation that captivates lovers of French desserts. This delight consists of thin layers of puff pastry, carefully baked to achieve a crispy texture. Between these layers, a light and creamy pastry cream adds a touch of finesse. The ensemble is crowned with fresh strawberries, bringing a fruity and sweet note to each bite. Fraise Napoléon embodies the art of French pastry with its perfect marriage of textures and flavors. Enjoy this exquisite dessert for an unparalleled culinary experience.', 110000, 87000, '1702824913.jpg', 43, 0, 0, 'Fraise Napoléon: A French Pastry Delight with Fresh Strawberries', 'Fraise Napoléon, French Dessert, Puff Pastry, Pastry Cream, Fresh Strawberries, Pastry Delight, French Flavors, Art of Pastry, Gourmet Sweetness, Fine Pastr', 'Discover the sweet delicacy of Fraise Napoléon, a refined French dessert featuring crispy layers of puff pastry, light pastry cream, and fresh strawberries. An unparalleled culinary experience.', '2023-12-17 14:55:13'),
(30, 13, 'Coq au Vin Blanc', 'coq-au-vin-blanc', 'Elevate your dining experience with Coq au Vin Blanc, a French culinary masterpiece where tender chicken is bathed in a velvety white wine sauce, accompanied by mushrooms and pearl onions.', 'Coq au Vin Blanc is a culinary symphony that brings together the delicate flavors of tender chicken, white wine, and aromatic vegetables. The chicken is braised to perfection, resulting in succulent, fall-off-the-bone meat. The dish is elevated with a velvety white wine sauce that infuses every bite with richness and depth. Mushrooms and pearl onions add a delightful complexity, creating a harmonious ensemble. Coq au Vin Blanc is a celebration of French gastronomy, offering a refined and comforting dining experience. Immerse yourself in the art of French cooking with this exquisite main dish.', 230000, 230000, '1702825561.jpg', 20, 0, 0, 'Coq au Vin Blanc: A Culinary Symphony of Tender Chicken and White Wine Elegance', 'Coq au Vin Blanc, French Culinary Masterpiece, Tender Chicken, White Wine Sauce, Mushrooms, Pearl Onions, Culinary Symphony, French Gastronomy, Gourmet Dining, Exquisite Main Dish.', 'Elevate your dining experience with Coq au Vin Blanc, a French culinary masterpiece where tender chicken is bathed in a velvety white wine sauce, accompanied by mushrooms and pearl onions. A harmonious ensemble of flavors.', '2023-12-17 15:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `adult` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(191) DEFAULT 'default.jpg',
  `verification_code` varchar(6) DEFAULT NULL,
  `verify_status` tinyint(4) DEFAULT 0 COMMENT '0=no, 1=yes',
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `verification_code`, `verify_status`, `password`, `role_as`, `created_at`) VALUES
(22, 'Phạm Nguyệt Quỳnh', 'phamnguyetquynh0307@gmail.com', 989598472, 'default.jpg', '394481', 1, '$2y$10$J8tjpZRK.1C7KDU48Knq7OU5R4VkMJRDwWIxavrNJpIwZAZnRRXHq', 1, '2023-12-17 15:25:10');
COMMIT;


-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
