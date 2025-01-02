-- -------------------------------------------------------------
-- TablePlus 5.4.0(504)
--
-- https://tableplus.com/
--
-- Database: mortgagerefused
-- Generation Time: 2023-09-27 16:53:54.5110
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `f_a_q_s`;
CREATE TABLE `f_a_q_s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `post_images`;
CREATE TABLE `post_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `f_a_q_s` (`id`, `created_at`, `updated_at`, `title`, `content`) VALUES
(1, '2023-09-27 15:20:56', '2023-09-27 15:22:12', 'Can you tell me some information about the website?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non ipsum vulputate velit malesuada rhoncus. Sed commodo congue dolor a finibus. Ut elit neque, pretium ut dictum vitae, posuere non mauris. Duis in odio pulvinar tellus posuere accumsan in sit amet tellus. Nulla facilisi. Duis et varius ex. Etiam in neque massa. Donec a interdum lacus.\r\n\r\nQuisque sed velit mollis, egestas nibh eget, convallis ex. Maecenas quam risus, vulputate quis tristique ac, fermentum quis nisl. Curabitur at aliquet mi. Aliquam tincidunt lacus sollicitudin blandit commodo. Aenean malesuada quam tristique magna tincidunt, in aliquam arcu malesuada. Mauris magna erat, ultrices in magna et, porttitor fringilla tortor. Ut sodales enim id iaculis laoreet. Mauris ac eleifend est, non commodo tellus. Maecenas eu euismod velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed arcu neque, volutpat a enim eget, bibendum posuere felis. Cras nisi dolor, elementum ornare euismod eu, vehicula at lacus. Mauris vehicula, neque ac tempor dapibus, arcu neque maximus sapien, vel sagittis nisi est non sapien. Integer auctor nibh in maximus feugiat.'),
(2, '2023-09-27 15:21:31', '2023-09-27 15:21:31', 'Do you have a question?', 'Quisque sed velit mollis, egestas nibh eget, convallis ex. Maecenas quam risus, vulputate quis tristique ac, fermentum quis nisl. Curabitur at aliquet mi. Aliquam tincidunt lacus sollicitudin blandit commodo. Aenean malesuada quam tristique magna tincidunt, in aliquam arcu malesuada. Mauris magna erat, ultrices in magna et, porttitor fringilla tortor. Ut sodales enim id iaculis laoreet. Mauris ac eleifend est, non commodo tellus. Maecenas eu euismod velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed arcu neque, volutpat a enim eget, bibendum posuere felis. Cras nisi dolor, elementum ornare euismod eu, vehicula at lacus. Mauris vehicula, neque ac tempor dapibus, arcu neque maximus sapien, vel sagittis nisi est non sapien. Integer auctor nibh in maximus feugiat.');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;