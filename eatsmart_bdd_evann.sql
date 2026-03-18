-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 mars 2026 à 17:27
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eatsmart_bdd_evann`
--
CREATE DATABASE IF NOT EXISTS `eatsmart_bdd_evann` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eatsmart_bdd_evann`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(19,2) DEFAULT NULL,
  `description` text,
  `image` varchar(500) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `nom`, `prix`, `description`, `image`, `id_categorie`) VALUES
(1, 'Anchois 23cm', '7.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', 'https://assets.afcdn.com/recipe/20200523/111448_w1024h1024c1cx800cy800cxt0cyt0cxb1600cyb1600.jpeg', 1),
(2, 'Anchois 33cm', '11.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, anchois, olive', 'https://assets.afcdn.com/recipe/20200523/111448_w1024h1024c1cx800cy800cxt0cyt0cxb1600cyb1600.jpeg', 1),
(3, 'Emmental 23cm', '7.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', 'https://media.houra.fr/ART-IMG-XL/02/89/3248833088902-8.jpg', 1),
(4, 'Emmental 33cm', '11.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, emmental, basilic, olive', 'https://media.houra.fr/ART-IMG-XL/02/89/3248833088902-8.jpg', 1),
(5, 'Margherita 23cm', '7.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', 'https://eu.ooni.com/cdn/shop/articles/20220211142754-margherita-9920_0483214a-7057-4277-9a3b-f2ab17c01e13.jpg?crop=center&height=800&v=1737105958&width=800', 1),
(6, 'Margherita 33cm', '11.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella', 'https://eu.ooni.com/cdn/shop/articles/20220211142754-margherita-9920_0483214a-7057-4277-9a3b-f2ab17c01e13.jpg?crop=center&height=800&v=1737105958&width=800', 1),
(7, '3 fromages 23cm', '8.40', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', 'https://img.cuisineaz.com/1024x768/2019/08/29/i150038-pizza-trois-fromages.jpeg', 1),
(8, '3 fromages 33cm', '12.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre', 'https://img.cuisineaz.com/1024x768/2019/08/29/i150038-pizza-trois-fromages.jpeg', 1),
(9, '4 fromages 23cm', '8.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', 'http://assets.afcdn.com/recipe/20200506/110673_w1024h768c1cx3120cy2080cxt0cyt0cxb6240cyb4160.webp', 1),
(10, '4 fromages 33cm', '13.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, emmental, chevre, roquefort', 'http://assets.afcdn.com/recipe/20200506/110673_w1024h768c1cx3120cy2080cxt0cyt0cxb6240cyb4160.webp', 1),
(11, 'Royale 23cm', '8.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', 'https://cuisineitalienne.org/wp-content/uploads/2022/04/pizza-royale.jpg', 2),
(12, 'Royale 33cm', '13.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon label rouge, champignon brun, olive', 'https://cuisineitalienne.org/wp-content/uploads/2022/04/pizza-royale.jpg', 2),
(13, 'Vegetarienne 23cm', '8.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', 'https://www.immersionvegetale.com/wp-content/uploads/2021/11/recette-vegetarienne-pizza-sriracha-6.jpg', 2),
(14, 'Vegetarienne 33cm', '13.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, roquette, oignon rouge, poivron, champignon brun, olive', 'https://www.immersionvegetale.com/wp-content/uploads/2021/11/recette-vegetarienne-pizza-sriracha-6.jpg', 2),
(15, 'Provencale 23cm', '8.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhAqffCQD5nJNSrbT2yZzpbPMUkxm7PASGMg&s', 2),
(16, 'Provencale 33cm', '13.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, filets de poulet rôti, oignon rouge, poivron, olive', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhAqffCQD5nJNSrbT2yZzpbPMUkxm7PASGMg&s', 2),
(17, 'Espagnol 23cm', '8.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', 'https://pause-pizza-saint-jean.fr/36-large_default/espagnole.jpg', 2),
(18, 'Espagnol 33cm', '13.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, chorizo de León, poivron, olive', 'https://pause-pizza-saint-jean.fr/36-large_default/espagnole.jpg', 2),
(19, 'Italienne 23cm', '10.40', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', 'https://www.latourdepise.fr/wp-content/uploads/2020/01/Pizza-italienne-faite-maison-Pise-La-Tour-de-Pise.jpg', 2),
(20, 'Italienne 33cm', '16.90', 'sauce tomate premium, origan, huile d\'olive extra vierge, mozzarella, jambon cru IGP, roquette, parmigiano reggiano, olive', 'https://www.latourdepise.fr/wp-content/uploads/2020/01/Pizza-italienne-faite-maison-Pise-La-Tour-de-Pise.jpg', 2),
(21, 'Armenienne 23cm', '8.90', 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', 'https://img.cuisineaz.com/1200x675/2018/06/22/i140615-pizza-armenienne.jpeg', 3),
(22, 'Armenienne 33cm', '13.90', 'sauce crème fraîche premium, mozzarella, viande hachée 100% pur bœuf, oignon rouge, olive', 'https://img.cuisineaz.com/1200x675/2018/06/22/i140615-pizza-armenienne.jpeg', 3),
(23, 'White royale 23cm', '8.90', 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', 'https://static-resto.bewaps.com/data/159/produits/72972-6-large.jpg', 3),
(24, 'White royale 33cm', '13.90', 'sauce crème fraîche premium, mozzarella, jambon label rouge, champignon brun, olive', 'https://static-resto.bewaps.com/data/159/produits/72972-6-large.jpg', 3),
(25, 'Chevre miel 23cm', '8.90', 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', 'https://i0.wp.com/pizza-korner.fr/wp-content/uploads/2023/12/Pizza-chevre-miel-.png?fit=2268%2C2268&ssl=1', 3),
(26, 'Chevre miel 33cm', '13.90', 'sauce crème fraîche premium, mozzarella, chevre, miel, olive', 'https://i0.wp.com/pizza-korner.fr/wp-content/uploads/2023/12/Pizza-chevre-miel-.png?fit=2268%2C2268&ssl=1', 3),
(27, 'Tiramisu', '3.90', 'boudoirs imbibés ou non de café, mascarpone, œufs, sucre, arôme vanille, cacao en poudre', 'https://filicorizecchini.com/cdn/shop/articles/tiramisu-la-ricetta-originale-e-la-storica-contesa-sulle-origini-429983.jpg?v=1731499192', 4),
(28, 'Gourmande', '6.90', 'nutella, avec une glace noix de coco râpé ou chocolat, supplément fruits frais possible', 'https://www.grainedegateau.com/wp-content/uploads/2025/11/1763425669-recette-de-glace-au-nutella-maison-un-delice-gourmand-1024x576.jpg', 4),
(29, 'Eaux', '1.90', 'eaux cristalline, san pellegrino, badoit', 'https://www.echosciences-grenoble.fr/uploads/article/image/attachment/1005427241/xl_le_parcours_de_l_eau_-_couverture.jpg', 5),
(30, 'Soda 33cl', '1.90', 'coca original, zero, cherry', 'https://www.pourquoidocteur.fr/media/article/COPY_istock-1432243135-1694945688.jpg', 5),
(31, 'Soda 1L+', '3.00', 'coca, icetea, orangina, sprite, oasis', 'https://www.pourquoidocteur.fr/media/article/COPY_istock-1432243135-1694945688.jpg', 5),
(32, 'Biere', '3.50', 'desperados, heineken', 'https://upload.wikimedia.org/wikipedia/commons/6/6e/Beer_mug_transparent.png', 5),
(33, 'Vin AOP 25cl', '4.90', 'rouge, rose', 'https://chateausaintroux-vin.com/cdn/shop/articles/robe_vin_rouge.jpg?v=1680542057', 5),
(34, 'Vin AOP 50cl', '7.50', 'rouge, rose', 'https://chateausaintroux-vin.com/cdn/shop/articles/robe_vin_rouge.jpg?v=1680542057', 5);

-- --------------------------------------------------------

--
-- Structure de la table `assoc_article_commande`
--

DROP TABLE IF EXISTS `assoc_article_commande`;
CREATE TABLE IF NOT EXISTS `assoc_article_commande` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite_article` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_article`,`id_commande`),
  KEY `id_commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_article_commande`
--

INSERT INTO `assoc_article_commande` (`id_article`, `id_commande`, `quantite_article`) VALUES
(1, 1, '1.00'),
(1, 2, '1.00'),
(1, 3, '3.00'),
(1, 4, '2.00'),
(3, 2, '1.00'),
(3, 4, '1.00'),
(5, 2, '1.00'),
(5, 4, '2.00'),
(7, 5, '1.00'),
(27, 5, '1.00'),
(33, 5, '1.00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'classic'),
(2, 'tradition'),
(3, 'creme'),
(4, 'dessert maison'),
(5, 'boisson');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime DEFAULT NULL,
  `prix_total` double DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date_commande`, `prix_total`, `etat`) VALUES
(1, '2024-10-25 00:00:00', 7.9, 'en cours'),
(2, '2024-10-25 00:00:00', 23.2, 'en cours'),
(3, '2024-10-25 00:00:00', 23.7, 'en cours'),
(4, '2024-10-25 00:00:00', 34.2, 'en cours'),
(5, '2024-10-25 00:00:00', 17.7, 'en cours');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);

--
-- Contraintes pour la table `assoc_article_commande`
--
ALTER TABLE `assoc_article_commande`
  ADD CONSTRAINT `assoc_article_commande_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `assoc_article_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
