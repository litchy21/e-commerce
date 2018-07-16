-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 16 juil. 2018 à 14:19
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Stockage'),
(2, 'Carte Graphique'),
(3, 'Processeur'),
(4, 'Alimentation PC');

-- --------------------------------------------------------

--
-- Structure de la table `international_shippings`
--

CREATE TABLE `international_shippings` (
  `id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180712080332');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `international_shipping_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift_wrap` tinyint(1) NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `tags` longtext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `date` datetime NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `tags`, `date`, `sub_category_id`, `category_id`) VALUES
(1, 'ClГ© USB', 'ClГ© USB', NULL, '2018-06-20 00:00:00', NULL, NULL),
(2, 'Ordinateur', 'A computer is a device that can be instructed to carry out sequences of arithmetic or logical operations automatically via computer programming. Modern computers have the ability to follow generalized sets of operations, called programs.', 'a:0:{}', '2019-09-17 00:00:00', NULL, NULL),
(4, 'Seagate BarraCuda 3.5', 'Une fiabilitГ© Г  toute Г©preuve fondГ©e sur plus de 20 ans d\'innovation de la gamme BarraCuda. Un mГ©lange flexible de capacitГ© et de prix adaptГ© Г  tous les budgets. La technologie de mise en mГ©moire cache multi niveau garantit d\'excellentes performances.', 'a:0:{}', '2018-07-11 00:00:00', 2, 1),
(5, 'Seagate Skyhawk 3.5', 'L\'audacieux firmware ImagePerfect garantit des flux vidГ©o fluides et nets dans les systГЁmes de surveillance fonctionnant en permanence. Votre entreprise a ainsi l\'assurance de disposer d\'une protection optimale.', 'a:0:{}', '2018-07-11 00:00:00', 2, 1),
(6, 'LaCie Rugged', 'Ce disque a l\'avantage de combiner la lГ©gendaire longГ©vitГ© des produits Rugged avec les technologies de port USB-C les plus rГ©centes afin d\'ГЄtre compatible avec la nouvelle gГ©nГ©ration d\'ordinateurs, tels que le dernier AppleВ® MacbookВ®.', 'a:0:{}', '2018-07-11 00:00:00', 1, 1),
(7, 'Seagate Backup Plus Ultra Slim', 'Le disque dur externe Backup Plus Ultra Slim fait parti des disques portables les plus fins de Seagate. Son Г©paisseur de 9,6 mm ne sacrifie rien Г  la capacitГ©, et le disque, vous permet d\'emporter vos fichiers importants partout avec vous. Disponible dans des coloris originaux, or et platine (un style Г  la hauteur de ses capacitГ©s), il se glisse aisГ©ment dans votre sac Г  dos avec toutes vos affaires. Avec le Backup Plus Ultra Slim, votre univers numГ©rique ne risque pas de manquer de place.', 'a:0:{}', '2018-07-11 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_details`
--

INSERT INTO `product_details` (`id`, `photo`, `price`, `stock`, `discount`, `new`, `product_id`) VALUES
(4, 'https://www.materiel.net/live/398293.350.350.jpg', 109, 100, NULL, 0, 4),
(5, 'https://www.materiel.net/live/400739.350.350.jpg', 82, 100, NULL, 0, 4),
(6, 'https://www.materiel.net/live/360615.350.350.jpg', 129, 100, NULL, 0, 5),
(7, 'https://www.materiel.net/live/360616.350.350.jpg', 200, 100, NULL, 0, 5),
(8, 'https://www.materiel.net/live/365202.350.350.jpg', 100, 100, NULL, 0, 7),
(9, 'https://www.materiel.net/live/364830.350.350.png', 100, 100, NULL, 0, 7),
(10, 'https://www.materiel.net/live/416241.350.350.jpg', 120, 9, NULL, 0, 6),
(11, 'https://www.materiel.net/live/416241.350.350.jpg', 180, 0, NULL, 0, 6),
(12, 'https://www.materiel.net/live/416241.350.350.jpg', 260, 100, NULL, 0, 6);

-- --------------------------------------------------------

--
-- Structure de la table `product_details_variant_options`
--

CREATE TABLE `product_details_variant_options` (
  `product_details_id` int(11) NOT NULL,
  `variant_options_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_details_variant_options`
--

INSERT INTO `product_details_variant_options` (`product_details_id`, `variant_options_id`) VALUES
(4, 9),
(4, 11),
(4, 12),
(4, 15),
(4, 16),
(5, 10),
(5, 12),
(6, 9),
(6, 12),
(6, 15),
(6, 16),
(7, 12),
(7, 14),
(7, 15),
(7, 16),
(8, 18),
(8, 19),
(8, 20),
(8, 21),
(9, 18),
(9, 20),
(9, 21),
(9, 22),
(10, 18),
(10, 20),
(10, 21),
(11, 10),
(11, 20),
(11, 21),
(12, 9),
(12, 20),
(12, 21);

-- --------------------------------------------------------

--
-- Structure de la table `product_to_orders`
--

CREATE TABLE `product_to_orders` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `product_detail_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `payment` tinyint(1) NOT NULL,
  `shipped` tinyint(1) NOT NULL,
  `item_recieved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`) VALUES
(1, 1, 'Disque dur externe'),
(2, 1, 'Disque dur interne'),
(3, 1, 'ClГ© USB'),
(4, 3, 'Processeur Intel'),
(5, 3, 'Processeur AMD'),
(6, 2, 'NDIVIA'),
(7, 2, 'AMD'),
(8, 2, 'PRO'),
(9, 4, 'Micro-PC Raspberry Pi');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_token` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `created_at` datetime NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `variants`
--

CREATE TABLE `variants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `variants`
--

INSERT INTO `variants` (`id`, `name`) VALUES
(1, 'Stockage'),
(2, 'Vitesse de lecture'),
(3, 'Couleur'),
(4, 'Taille'),
(5, 'Vitesse de rotation'),
(6, 'Interface'),
(7, 'Format'),
(8, 'MГ©moire cache');

-- --------------------------------------------------------

--
-- Structure de la table `variant_options`
--

CREATE TABLE `variant_options` (
  `id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `variant_options`
--

INSERT INTO `variant_options` (`id`, `variant_id`, `detail`) VALUES
(1, 1, '128 GB'),
(2, 1, '256 GB'),
(3, 2, '100 Mo/s'),
(4, 2, '200 Mo/s'),
(5, 3, 'Rouge'),
(6, 4, '5 cm'),
(8, 3, 'Rouge'),
(9, 1, '4 To'),
(10, 1, '2 To'),
(11, 5, '5900 trs/min'),
(12, 6, 'SATA 3'),
(13, 5, '5400 trs/min'),
(14, 1, '8 To'),
(15, 7, '3.5\'\''),
(16, 8, '256 Mo'),
(17, 1, '6 To'),
(18, 1, '1 To'),
(19, 3, 'Or'),
(20, 7, '2.5\'\''),
(21, 6, 'USB 3.0'),
(22, 3, 'Platinum');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `international_shippings`
--
ALTER TABLE `international_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEE6BF700BD` (`status_id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEEB8B5B102` (`international_shipping_id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEE4C3A3BB` (`payment_id`),
  ADD UNIQUE KEY `UNIQ_E52FFDEE4887F3F8` (`shipping_id`),
  ADD KEY `IDX_E52FFDEEA76ED395` (`user_id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B3BA5A5AF7BFE87C` (`sub_category_id`),
  ADD KEY `IDX_B3BA5A5A12469DE2` (`category_id`);

--
-- Index pour la table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A3FF103A4584665A` (`product_id`);

--
-- Index pour la table `product_details_variant_options`
--
ALTER TABLE `product_details_variant_options`
  ADD PRIMARY KEY (`product_details_id`,`variant_options_id`),
  ADD KEY `IDX_12D4BAD0287D5809` (`product_details_id`),
  ADD KEY `IDX_12D4BAD0C85AF964` (`variant_options_id`);

--
-- Index pour la table `product_to_orders`
--
ALTER TABLE `product_to_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AD5D47FECFFE9AD6` (`orders_id`),
  ADD KEY `IDX_AD5D47FEB670B536` (`product_detail_id`);

--
-- Index pour la table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1638D5A512469DE2` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- Index pour la table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `variant_options`
--
ALTER TABLE `variant_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BF90D7C13B69A9AF` (`variant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `international_shippings`
--
ALTER TABLE `international_shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `product_to_orders`
--
ALTER TABLE `product_to_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `variant_options`
--
ALTER TABLE `variant_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE4887F3F8` FOREIGN KEY (`shipping_id`) REFERENCES `shipping_address` (`id`),
  ADD CONSTRAINT `FK_E52FFDEE4C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `FK_E52FFDEE6BF700BD` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_E52FFDEEB8B5B102` FOREIGN KEY (`international_shipping_id`) REFERENCES `international_shippings` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_B3BA5A5AF7BFE87C` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Contraintes pour la table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `FK_A3FF103A4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `product_details_variant_options`
--
ALTER TABLE `product_details_variant_options`
  ADD CONSTRAINT `FK_12D4BAD0287D5809` FOREIGN KEY (`product_details_id`) REFERENCES `product_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12D4BAD0C85AF964` FOREIGN KEY (`variant_options_id`) REFERENCES `variant_options` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `product_to_orders`
--
ALTER TABLE `product_to_orders`
  ADD CONSTRAINT `FK_AD5D47FEB670B536` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`),
  ADD CONSTRAINT `FK_AD5D47FECFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `FK_1638D5A512469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `variant_options`
--
ALTER TABLE `variant_options`
  ADD CONSTRAINT `FK_BF90D7C13B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`);
