-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 11:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan11`
--
CREATE DATABASE IF NOT EXISTS `duan11` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `duan11`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `shiftId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `doctor_id`, `patient_id`, `status`, `date`, `shiftId`, `created_at`, `updated_at`, `file`) VALUES
(104, '151', '168', '1', '1983-02-17', 16, NULL, NULL, ''),
(105, '150', '154', '3', '1999-07-03', 19, NULL, '2022-08-19 14:05:09', 'Screenshot 2022-07-31 024841_1660943109.png'),
(106, '152', '168', '3', '1996-05-30', 21, NULL, NULL, ''),
(107, '151', '158', '3', '2022-03-14', 16, NULL, NULL, ''),
(108, '163', '157', '2', '1977-11-27', 17, NULL, NULL, ''),
(109, '151', '165', '1', '1970-07-16', 18, NULL, NULL, ''),
(110, '166', '158', '2', '2015-04-22', 18, NULL, NULL, ''),
(111, '161', '165', '2', '1984-02-02', 20, NULL, NULL, ''),
(112, '161', '168', '3', '2019-05-23', 15, NULL, NULL, ''),
(113, '150', '158', '3', '2003-04-04', 19, NULL, NULL, ''),
(114, '152', '154', '3', '1972-03-22', 16, NULL, NULL, ''),
(115, '152', '165', '1', '2004-01-03', 20, NULL, NULL, ''),
(116, '163', '162', '2', '2011-12-29', 20, NULL, NULL, ''),
(117, '150', '157', '2', '1985-03-06', 19, NULL, NULL, ''),
(118, '163', '165', '3', '1970-07-15', 20, NULL, NULL, ''),
(119, '151', '159', '1', '1996-07-12', 17, NULL, NULL, ''),
(120, '152', '157', '1', '1997-12-03', 20, NULL, NULL, ''),
(121, '152', '159', '1', '2002-07-22', 21, NULL, NULL, ''),
(122, '166', '158', '2', '1997-02-14', 19, NULL, NULL, ''),
(123, '151', '165', '2', '2014-08-11', 18, NULL, NULL, ''),
(124, '150', '154', '3', '2022-08-20', 19, '2022-08-19 11:56:52', '2022-08-19 11:56:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_shift`
--

CREATE TABLE `doctor_shift` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift_doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_shift`
--

INSERT INTO `doctor_shift` (`id`, `shift_doctor_id`, `doctor_id`, `date`, `created_at`, `updated_at`) VALUES
(50, 19, 160, '2022-08-20', NULL, NULL),
(51, 17, 163, '2022-08-20', NULL, NULL),
(52, 19, 150, '2022-08-20', NULL, NULL),
(53, 17, 166, '2022-08-20', NULL, NULL),
(55, 20, 163, '2022-08-20', NULL, NULL),
(56, 20, 161, '2022-08-20', NULL, NULL),
(58, 15, 163, '2022-08-20', NULL, NULL),
(59, 17, 151, '2022-08-20', NULL, NULL),
(60, 16, 161, '2022-08-20', NULL, NULL),
(61, 19, 166, '2022-08-20', NULL, NULL),
(62, 18, 161, '2022-08-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_01_080652_create_roles_table', 1),
(6, '2022_08_01_080739_create_shifts_table', 1),
(7, '2022_08_01_081045_add_columns_to_users_table', 1),
(8, '2022_08_01_081351_create_doctor_shift_table', 1),
(9, '2022_08_01_081522_create_bookings_table', 1),
(10, '2022_08_08_221520_create_package_cares_table', 1),
(11, '2022_08_10_225819_create_user_packages_table', 1),
(12, '2022_08_19_111254_create_news_table', 2),
(13, '2022_08_19_131845_add_column_image_to_package_cares_table', 3),
(14, '2022_08_19_195919_add_column_file_to_bookings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `subtitle`, `content`, `image`, `created_at`, `updated_at`) VALUES
(6, '123123', '123123', '<p>123123123</p>', 'screencapture-localhost-8000-2022-08-08-22_14_14 (1)_1660911715.png', '2022-08-19 05:21:55', '2022-08-19 05:21:55'),
(7, '123123123123', '123123', '<p>123123123</p>', 'screencapture-localhost-8000-2022-08-08-22_14_14 (2)_1660912864.png', '2022-08-19 05:41:04', '2022-08-19 05:41:04'),
(8, '123123123123', '123123123123', '<p>123123123</p>', 'screencapture-localhost-8000-2022-08-08-22_14_14 (2)_1660912953.png', '2022-08-19 05:42:33', '2022-08-19 05:42:33'),
(9, '123123123123', '123123123123', '<p>123123123</p>', 'carbon (1)_1660912965.png', '2022-08-19 05:42:45', '2022-08-19 05:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `package_cares`
--

CREATE TABLE `package_cares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_cares`
--

INSERT INTO `package_cares` (`id`, `name`, `description`, `price`, `count`, `created_at`, `updated_at`, `image`) VALUES
(14, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 40000000, 8, NULL, NULL, 'ok'),
(15, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 40000000, 8, NULL, NULL, 'ok'),
(16, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 40000000, 8, NULL, NULL, 'ok'),
(17, 'Lorem Ipsum', 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident', 40000000, 8, NULL, NULL, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Doctor', NULL, NULL),
(3, 'Patient', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, '08-09h', NULL, NULL, NULL),
(16, '09-10h', NULL, NULL, NULL),
(17, '11-12h', NULL, NULL, NULL),
(18, '13-14h', NULL, NULL, NULL),
(19, '14-15h', NULL, NULL, NULL),
(20, '15-16h', NULL, NULL, NULL),
(21, '16-17h', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`, `phone`, `address`, `description`, `level`, `gender`, `role_id`) VALUES
(150, 'emely.larkin', 'jeanne90@example.net', NULL, '$2y$10$4HX9lx0GmWqvsmbCbR6FEOVEhDdj/gbFkls5xWNJaLX4mQgidSmV2', NULL, NULL, NULL, 'ok', '+1-317-459-8381', '8430 Dorthy Fields\nMonahanton, SD 32831', 'Modi sit qui dolor dolor dicta aut itaque. Sapiente cupiditate id qui omnis repellendus exercitationem odit. Rem aut nobis adipisci. Maiores voluptate quisquam enim. Aliquam occaecati libero ipsam tempora neque delectus blanditiis. Aut consequatur modi mollitia hic qui fugiat hic. Aut harum et optio reprehenderit. Quaerat consequuntur sapiente quod neque nihil nam. Et ut est nihil architecto ut consequuntur qui. Sed sed velit sequi iusto. Beatae facilis maiores aliquid rerum similique ex.', 'thac si', 'male', 2),
(151, 'dwisoky', 'trevion.bosco@example.org', NULL, '$2y$10$eZVUeuDQ8txWXldt0EPq2u0g5u4MZfqGncdFhIntT4KY2MuCRqWZW', NULL, NULL, NULL, 'ok', '1-478-930-7031', '9512 Rosalinda Brooks\nRoryside, MT 17708', 'Id sit maxime qui nesciunt et ad culpa. Omnis illo beatae ducimus. Iste aut eligendi impedit omnis deleniti vel. Fugit earum eos et nostrum omnis sit expedita. Dolores et sed sequi error deleniti ut veniam. Velit quae accusantium enim voluptatem voluptas voluptas. Excepturi id necessitatibus accusamus cum quaerat autem tempora. Dolorem facilis enim corrupti tenetur soluta unde quam. Excepturi quam explicabo eos molestiae voluptatem suscipit.', 'thac si', 'male', 2),
(152, 'gmccullough', 'bwisoky@example.net', NULL, '$2y$10$aPZtu7oIsM1tP0lpschc7O34rINbVFb1XwT9q/xXe62NGx5xGHLG2', NULL, NULL, NULL, 'ok', '+1-986-707-5874', '1793 Harris Brooks Apt. 409\nTorphyfurt, ME 99520-3260', 'Omnis doloribus sed amet tempora tempore earum vel. Eligendi qui velit deleniti itaque. Vel blanditiis provident reprehenderit quas dolorum aut debitis dolore. Qui blanditiis dolore cupiditate ut. Libero quaerat incidunt tempore nam et non dolorem. Temporibus explicabo amet consequatur fugit ipsum optio. Et non debitis voluptatem voluptatem qui praesentium voluptas.', 'thac si', 'male', 2),
(153, 'bailey.verla', 'marta.king@example.com', NULL, '$2y$10$Q6SgWmQMWG4bxGm7KWuYRuZnyIMi44igOlTvLDUKO64ebImVDBGXS', NULL, NULL, NULL, 'ok', '+1-351-658-0477', '86145 Kian Freeway\nNorth Grace, WA 86524', 'Illo quos quo ex exercitationem dolore nostrum est. Ut perferendis in nemo inventore est in omnis. Sed est nesciunt quia. Dicta inventore voluptate ut earum expedita quod. Nisi blanditiis dolor sed non doloribus. Quia nisi non dignissimos consequatur accusamus aliquid. Provident maxime sapiente aut fuga dolores consequatur vel. Quos omnis eum magni rerum.', 'thac si', 'male', 1),
(154, 'lilian.kassulke', 'marks.lucile@example.org', NULL, '$2y$10$XRNu0P//L90slTn0yHf0m.2PODzkYSSyiWnfU9f7Dxz4/wUuhz7DG', NULL, NULL, NULL, 'ok', '(707) 961-8899', '80865 Jamarcus Cliff\nLake Gilberto, NV 83714-9880', 'Aut tempora officiis nihil excepturi. Velit animi non enim aliquid. Similique saepe quia sed tenetur earum reiciendis. Aut voluptas occaecati assumenda aut architecto voluptas. Quibusdam sed qui laboriosam. Nam ex sequi magnam aliquam. Magnam deserunt voluptates corrupti ea aut perferendis. Quas eos quo reiciendis quia et harum molestias. Eos vel eius quia ipsam accusamus dignissimos. Ut pariatur inventore earum iste quam.', 'thac si', 'male', 3),
(155, 'abigayle15', 'leone.effertz@example.net', NULL, '$2y$10$3.OJ2jKRHdZVsFfAiH6j9OVR7.RUbjVY.p1RnV5USoBhbS81fj4Ie', NULL, NULL, NULL, 'ok', '1-361-891-2578', '855 Hackett Station Suite 324\nNorth Suzanne, WV 77600', 'Nihil eligendi consequuntur eaque soluta. Iste sint officia pariatur qui perspiciatis. Rem sunt sit dolore tenetur quia. Nemo et voluptates architecto animi eligendi ut quis quo. Aspernatur ut ut repellat similique magni. Qui occaecati aut numquam qui numquam. Unde deserunt qui numquam dolore. Sapiente dicta dolor expedita pariatur suscipit. A hic dicta iusto. Commodi quasi voluptates eligendi hic iste nobis.', 'thac si', 'male', 1),
(156, 'jameson.zemlak', 'eyundt@example.com', NULL, '$2y$10$BjC0.cyIcFiWfX6S8yRVfOREMkfa/TTQAXKv8KKKxlaFHz6JXot7C', NULL, NULL, NULL, 'ok', '+1-469-375-8351', '307 Morris Creek Suite 209\nKurtview, OH 40871', 'Sit animi dolores nemo voluptatum distinctio dolorem. Exercitationem aliquam quam occaecati amet aliquam est. Quidem possimus beatae voluptatum quibusdam fuga. Magnam similique ullam quibusdam ea laboriosam repellat. Quis qui libero et velit. Inventore et ipsum sed. Qui ullam qui ipsa at maxime adipisci nobis.', 'thac si', 'male', 1),
(157, 'green.jaylin', 'liliane23@example.com', NULL, '$2y$10$G02yB17KEcPx9FsSwEk9Ge8agc0H.EiKx4AUqZYtGiH90dWHQFIgq', NULL, NULL, NULL, 'ok', '520.446.5975', '9725 Schulist View Apt. 974\nEast Roelland, TN 96532-3193', 'Magnam nam et eaque corrupti vitae. Earum est et aut eos qui velit consectetur. Labore iste nesciunt quia modi. Voluptate ut natus qui non hic consequuntur. Magnam animi sint libero voluptatibus ut sit officiis velit. Ab natus omnis quam qui. Nostrum voluptatem sit eum itaque porro nisi. Corporis perspiciatis sed eius aut ut deserunt placeat. Quod consequatur inventore et quia amet consequatur. Rem quia eum qui aliquid repellendus. Illo sit reiciendis odit tempore mollitia sunt omnis.', 'thac si', 'male', 3),
(158, 'leonora.veum', 'johns.cassandra@example.org', NULL, '$2y$10$SPbCk1f76cq2tw.j7QsrC.bMW3jgYiS2vZPHX.7pRKdVzqayAuydW', NULL, NULL, NULL, 'ok', '+1-862-234-5122', '37678 Lily Trail\nCassinborough, ME 79271', 'Sapiente repellendus omnis et facere accusamus. Quas animi qui aut voluptatem sunt aliquid et. Dicta est fugit quo praesentium dolores facilis aliquam et. Fugit minima quia suscipit et. Consequuntur laboriosam vero ut sequi impedit. Quos eum vitae quo sint fuga modi provident adipisci. Sit assumenda pariatur at nostrum iusto ut exercitationem tempore. Reiciendis recusandae et ea molestiae.', 'thac si', 'male', 3),
(159, 'kuhlman.alexander', 'stamm.monroe@example.org', NULL, '$2y$10$zkScq/qsfIMtZzlBgnKgDe6Fn1U2bz/HZ7c6Ttf2TU0pEFBcjO/X2', NULL, NULL, NULL, 'ok', '+18062010235', '441 Williamson Spurs\nPort Dudleystad, GA 96009-1256', 'Exercitationem officiis non quibusdam consequuntur dolores. Sed dolorum rerum et nam sit est. Ut reprehenderit ut eveniet fuga libero. Voluptas voluptas magni nihil qui facere repellendus dicta. Eos alias voluptas amet. Sunt aspernatur ut enim adipisci incidunt quae a. Nulla perferendis quam consequatur ut tempora magni optio. Architecto consequuntur saepe sapiente id voluptatem. Quibusdam et dolor voluptatem velit nostrum. Magnam omnis est sapiente repellat ratione in amet.', 'thac si', 'male', 3),
(160, 'cgreen', 'ukunze@example.net', NULL, '$2y$10$AvLuC1m2JGAWB7TyEkjd/..yNi4kO9x1p5YUbUEkc2tHPjeGFKPgG', NULL, NULL, NULL, 'ok', '(820) 720-5793', '672 Jordi Squares\nKierafurt, MA 48038', 'Unde culpa dolorem unde. Minus sit natus et inventore saepe quis. Dicta est non labore animi. Libero aut quia quo natus. Similique sed sit explicabo sed velit accusantium exercitationem blanditiis. Dolorem libero occaecati rem numquam eveniet. Unde iste impedit et. Ratione natus beatae ut in quae. Eos ad libero et suscipit exercitationem. Quae minus impedit et architecto facilis. Beatae non error rem sed dolor ut consequatur.', 'thac si', 'male', 2),
(161, 'krice', 'xgusikowski@example.org', NULL, '$2y$10$N1KQWDq10XTK9HuN9e3c9.b1ff6.DqWVawwV/aT1X40QB/oj38xOK', NULL, NULL, NULL, 'ok', '+19157847840', '419 Spinka Cove Apt. 459\nJastburgh, HI 02051-2028', 'Possimus iure dolorum dolorum maiores ut non odit et. A similique eveniet atque. Et animi voluptatem debitis eligendi. Placeat soluta est reprehenderit sint quod sit rem. Vel doloribus ut illum aut sint omnis. At beatae dignissimos eos est quibusdam iusto veritatis. Tenetur consectetur illo consequatur eveniet et et. Labore non rerum ut. Animi consequatur vel nulla qui.', 'thac si', 'male', 2),
(162, 'padberg.blanche', 'kara.koelpin@example.net', NULL, '$2y$10$cS9B0iIx2GSEM0QFUZA2b.yk8i6KyjEYhVXzzqmoAC9rmdlTTf7sW', NULL, NULL, NULL, 'ok', '1-260-822-0899', '89538 Flatley Hills\nPort Maya, ND 33507', 'Ducimus provident et doloribus eius deserunt est. Ratione id voluptatem voluptas quo ut placeat. Necessitatibus harum odit consequatur quae eius. Adipisci voluptatem quasi voluptatem nesciunt unde. Alias provident animi commodi soluta. Voluptas vero culpa qui atque id dignissimos quo itaque. Autem vitae dicta accusamus. Itaque omnis ducimus deserunt. Alias sed maxime rerum magnam veniam. Est debitis quam modi quia voluptatem.', 'thac si', 'male', 3),
(163, 'schmidt.isabelle', 'bpurdy@example.net', NULL, '$2y$10$8i1qfYqy2MssCqojx7x/4OtEzSm3tCywWs98xdmRPxAW4XTsrmAge', NULL, NULL, NULL, 'ok', '+18136308588', '474 Kareem Extensions Apt. 617\nNorth Amaniberg, MT 08261-8530', 'Quia qui accusantium facere omnis maxime suscipit impedit. Dicta odio nihil aperiam neque quos voluptatem modi. Iure quos quia deleniti perferendis asperiores. Reiciendis sint nesciunt reiciendis culpa consequatur doloremque. Occaecati earum dolorem fugiat voluptas libero voluptas animi. Explicabo accusamus ea voluptatem. Et at est aspernatur ab recusandae.', 'thac si', 'male', 2),
(164, 'ygislason', 'crystel08@example.org', NULL, '$2y$10$Qha75LQgenThzrPEDDI5/e9uj1cbDQ4MnrEo8/wI5vIXTpv2W2PqC', NULL, NULL, NULL, 'ok', '804.277.8327', '3263 Shanny Lake\nNew Forrest, DC 21903', 'Voluptatem placeat rerum et culpa deleniti ipsam quo. Eum rerum aut eum ducimus nam similique. Voluptates similique qui laboriosam ullam alias pariatur itaque. Voluptatem molestiae provident quod facere consequatur veritatis. Quia aut dolores qui laborum. Dolore suscipit est optio. Facere eos aut inventore iure. Occaecati ipsam at sed saepe amet quod adipisci. Ut sit occaecati culpa rerum dolorem omnis.', 'thac si', 'male', 1),
(165, 'bbradtke', 'murazik.trevion@example.org', NULL, '$2y$10$nat6fZEX69o1j0Kx9UZnkOIzpHx49CuVtIMfjVKc641YwiWzZE13K', NULL, NULL, NULL, 'ok', '+1-458-635-8071', '81527 Howell Way Apt. 574\nPort Buddyshire, MT 51810-1560', 'Occaecati placeat aliquam fuga. Dolorem id est voluptates rerum voluptatum quibusdam. Vel aut iste quae rerum. Consequuntur saepe voluptatem dignissimos. Et earum quis voluptatem porro. Officiis quo sint qui a quia labore ea. Nisi ad saepe delectus numquam aspernatur. Dolores numquam sequi perspiciatis autem et itaque velit laborum. Et illum culpa quis occaecati. Qui aperiam enim non eos autem. Atque sunt veniam vel.', 'thac si', 'male', 3),
(166, 'aylin.dare', 'eden51@example.org', NULL, '$2y$10$6Q8Yj0Dz5yE/4IpGeU9N3O0eompAJ9W0LDNGn2ebZQrYdG4gfRM9y', NULL, NULL, NULL, 'ok', '(762) 956-5365', '79112 Stella Valley\nSouth Yvetteville, MI 56811-3641', 'Officiis voluptates fuga ea fuga. Aut alias blanditiis aliquam est voluptatem repudiandae. Quod voluptatem maxime ut non. Illum et accusamus culpa qui. Minus asperiores delectus consequuntur in quia eius illum. Velit et eum doloribus optio corrupti. Architecto sunt voluptate optio. Quis cumque expedita sed velit. Neque nesciunt molestias molestiae repellat sint dolor dolorem.', 'thac si', 'male', 2),
(167, 'pollich.frieda', 'bernie.strosin@example.net', NULL, '$2y$10$kjfLStMA6wHKwT7721K.BebeZy9Yzd5vyrtmFWPGw1MBdyUPFYhQC', NULL, NULL, NULL, 'ok', '1-678-404-7153', '24425 Swift Path Apt. 049\nWest Shad, MO 63439-6523', 'Quae aut repellat amet accusamus impedit. Modi in maxime ipsam officia. Neque sequi enim rem perspiciatis commodi molestiae. Facere commodi ratione sint suscipit autem optio veniam. Magnam a ea in aut eum reprehenderit ut. Nihil consequuntur vitae aliquam et. Dolorem voluptates delectus ut non aut. Architecto consequatur vel porro voluptas quae nihil. Vel iure nihil ea. Porro fugit ad laboriosam adipisci tempora et. Ut facilis ut ab nihil. Quod non non quis quas.', 'thac si', 'male', 1),
(168, 'fadel.una', 'rheaney@example.net', NULL, '$2y$10$xNA3Of5tyHjJSwB1/lUIFO3XA1tkSWHrs4Jz9MwBcpn2qVzIlK/8q', NULL, NULL, NULL, 'ok', '763-410-9060', '182 Moriah View\nPort Amparo, ID 78629-9948', 'Quasi qui quia quod enim ullam. Quod deleniti ipsam molestiae molestias placeat molestias. Autem vitae facere sed consectetur nobis velit. Laboriosam dolor dolor soluta repudiandae. Quo qui repellendus rerum qui aliquam omnis est. Omnis dolor possimus odio molestiae. Praesentium at non dolores blanditiis distinctio optio. Maxime molestiae odio quaerat et et temporibus inventore. Ipsam doloribus quam vero optio nesciunt.', 'thac si', 'male', 3),
(169, 'halvorson.jade', 'florence.swift@example.org', NULL, '$2y$10$HHzgBHBzROX5Kq4ccyVdeesAlpnsoJm9FDaxaNw1kUKxt5ki7lUAS', NULL, NULL, NULL, 'ok', '(541) 706-2998', '535 Tremblay Pass Apt. 830\nLynchhaven, UT 10448-4790', 'Porro voluptas eos eum fugit. Doloremque voluptas et assumenda asperiores aut velit quod nihil. Neque aut in est omnis dolor iure autem. Incidunt nemo occaecati tempore omnis consectetur vitae ipsam. Qui aut voluptas at et. Voluptatum iste veritatis qui omnis rerum. Incidunt tempore placeat dicta neque placeat et facere velit. Omnis voluptatum ut libero.', 'thac si', 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `doctor_package_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `buy_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_shift`
--
ALTER TABLE `doctor_shift`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_shift_shift_doctor_id_doctor_id_date_unique` (`shift_doctor_id`,`doctor_id`,`date`),
  ADD KEY `doctor_shift_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_cares`
--
ALTER TABLE `package_cares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_packages_doctor_package_id_foreign` (`doctor_package_id`),
  ADD KEY `user_packages_package_id_foreign` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `doctor_shift`
--
ALTER TABLE `doctor_shift`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `package_cares`
--
ALTER TABLE `package_cares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_shift`
--
ALTER TABLE `doctor_shift`
  ADD CONSTRAINT `doctor_shift_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_shift_shift_doctor_id_foreign` FOREIGN KEY (`shift_doctor_id`) REFERENCES `shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD CONSTRAINT `user_packages_doctor_package_id_foreign` FOREIGN KEY (`doctor_package_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `package_cares` (`id`) ON DELETE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"duan11\",\"table\":\"bookings\"},{\"db\":\"duan11\",\"table\":\"user_packages\"},{\"db\":\"duan11\",\"table\":\"users\"},{\"db\":\"duan11\",\"table\":\"doctor_shift\"},{\"db\":\"duan11\",\"table\":\"package_cares\"},{\"db\":\"duan11\",\"table\":\"shifts\"},{\"db\":\"duan11\",\"table\":\"roles\"},{\"db\":\"duan11\",\"table\":\"news\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('duan11', 'bookings', 'doctor_id');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'duan11', 'package_cares', '{\"sorted_col\":\"`image` ASC\"}', '2022-08-19 18:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-08-19 20:41:39', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
