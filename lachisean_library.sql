-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 01:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lachisean_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'cover/default.png',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `title`, `author`, `category_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'cover/jujutsu_kaisen.jpg', 'Jujutsu Kaisen', 'Gege Akutami', 7, 'Although Yuji Itadori looks like your average teenager, his immense physical strength is something to behold! Every sports club wants him to join, but Itadori would rather hang out with the school outcasts in the Occult Research Club. One day, the club manages to get their hands on a sealed cursed object. Little do they know the terror they\'ll unleash when they break the seal...', NULL, NULL),
(2, 'cover/demon_slayer.jpg', 'Demon Slayer', 'Koyoharu Gotouge', 7, 'The setting is Taisho era Japan. Tanjirou is a kindhearted young boy who lived peacefully with his family as a coal seller. Their normal life changes completely when his family is slaughtered by demons. The only other survivor, Tanjirou\'s younger sister Nezuko, has become a ferocious demon. In order to return Nezuko to normal and get revenge on the demon that killed their family, the two of them depart on a journey. From a young talent, an adventure tale of blood and swords begins!', NULL, NULL),
(3, 'cover/spy_x_family.jpg', 'Spy x Family', 'Endo Tatsuya', 7, 'The master spy codenamed <Twilight> has spent his days on undercover missions, all for the dream of a better world. But one day, he receives a particularly difficult new order from command. For his mission, he must form a temporary family and start a new life?! A Spy/Action/Comedy about a one-of-a-kind family!', NULL, NULL),
(4, 'cover/the_hunger_games.jpg', 'The Hunger Games', 'Suzanne Collins', 4, 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV. Sixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she steps forward to take her sister\'s place in the Games. But Katniss has been close to dead before—and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weight survival against humanity and life against love.', NULL, NULL),
(5, 'cover/the_fault_in_our_stars.jpg', 'The Fault in Our Stars', 'John Green', 1, 'Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel\'s story is about to be completely rewritten.', NULL, NULL),
(6, 'cover/default.png', 'debitis eos', 'Mr. Marco Wuckert III', 6, 'Inventore perferendis qui rerum vel quisquam sunt tenetur. At illo omnis autem quis aut. Facilis officiis animi itaque est qui.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(7, 'cover/default.png', 'quam ipsam', 'Carmelo Rice Sr.', 4, 'Rem fugit alias et. Autem ipsa et doloremque qui voluptatum suscipit. Aliquid libero eveniet itaque libero maxime praesentium voluptatum.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(8, 'cover/default.png', 'alias omnis', 'Mrs. Beth Dickinson I', 5, 'Quos consequuntur odit corporis nostrum quia similique. Possimus cupiditate ut esse id voluptatem reiciendis excepturi. Excepturi consequuntur quisquam cupiditate at quia sed.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(9, 'cover/default.png', 'excepturi itaque', 'Nicolas Cronin', 2, 'Minima dolor voluptatem nam dolorem porro sit debitis odio. Nulla tenetur vitae alias saepe. Dolores voluptatum laudantium quae repudiandae numquam at quam.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(10, 'cover/default.png', 'vero a', 'Savanah Dietrich', 3, 'Impedit saepe eum error dicta dolorum a. Molestias unde asperiores nihil quia quo. Excepturi aliquid id iure perspiciatis.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(11, 'cover/default.png', 'quaerat fuga', 'Marcelle Lehner', 5, 'Et laudantium suscipit repudiandae ut. Aut ad totam ullam. Aut molestiae blanditiis magnam voluptatem.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(12, 'cover/default.png', 'incidunt saepe', 'Joyce Ziemann', 6, 'Voluptatem necessitatibus nesciunt doloremque temporibus tempora. Nesciunt quis placeat enim qui sapiente et. Sint atque excepturi quisquam sapiente accusantium.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(13, 'cover/default.png', 'iure est', 'Prof. Orlando Renner', 4, 'Nobis sint aut qui dolor. Dolores delectus inventore est autem consequatur. Dolorem vel quis nam aut doloribus et.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(14, 'cover/default.png', 'sequi aut', 'Mr. Kadin Crona IV', 4, 'Perferendis illo corporis repellat aut. Officiis eos tempora modi temporibus. Iure saepe aut dolorem rerum tenetur quas veniam.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(15, 'cover/default.png', 'natus alias', 'Ms. Ova Ratke', 4, 'Minus eum repellat hic voluptatem. Saepe molestiae magnam asperiores maxime soluta iure. Saepe consequuntur qui provident error.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(16, 'cover/default.png', 'cumque eligendi', 'Salma Stroman', 6, 'Laudantium id animi ab omnis. Dolores et aut nostrum voluptas assumenda consequuntur. Et sequi ea dolorem impedit corrupti accusantium possimus.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(17, 'cover/default.png', 'repudiandae rerum', 'Prof. Halie Stiedemann', 3, 'Corrupti modi qui dolore distinctio facilis. Cumque ipsa et velit autem eum quasi doloribus. Quis voluptas harum veritatis laborum deleniti.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(18, 'cover/default.png', 'unde quam', 'Jacklyn Eichmann', 5, 'Magnam quae amet sint. Rerum error consequatur ab totam aliquam quis saepe. At optio voluptatem ut quia quidem qui eum sed.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(19, 'cover/default.png', 'nesciunt incidunt', 'Scarlett Osinski', 7, 'Laborum beatae facilis est vitae. Ullam et dignissimos vel est laboriosam. Enim repellat laborum dolorum perspiciatis sed ut aliquam corrupti.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(20, 'cover/default.png', 'iste inventore', 'Dr. Domenica Schmitt II', 2, 'Tempora officia esse nam nam. Est dolores sunt nobis recusandae soluta perferendis beatae ab. Qui nihil exercitationem non non vitae quo tenetur.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(21, 'cover/default.png', 'est et', 'Adrian Padberg I', 3, 'Error tempora illum at quod dolor recusandae. Iusto fugit rerum autem voluptatum qui dolores recusandae. Numquam similique sint facere nobis et.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(22, 'cover/default.png', 'exercitationem itaque', 'Kane Schuppe', 7, 'Labore quia molestiae quis autem ullam. Omnis qui id natus voluptatem esse et id. Exercitationem ut nostrum repellat fugit quibusdam occaecati.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(23, 'cover/default.png', 'odit dolores', 'Emanuel Kuhlman', 1, 'Fuga aliquid iste quibusdam ipsa. Ut et optio quia officiis sed occaecati ut. Quo fugiat minus quibusdam illum.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(24, 'cover/default.png', 'dolores non', 'Nora Treutel', 1, 'Laborum laborum eligendi illum vel sint. Adipisci dolor pariatur iure dolorem est vel est. Est id et asperiores nostrum.', '2022-05-27 04:20:01', '2022-05-27 04:20:01'),
(25, 'cover/default.png', 'odit sint', 'Treva Haag PhD', 5, 'Eum quos quis id qui. Assumenda laboriosam ut accusantium aut soluta consequuntur. Quia enim quia sunt minima distinctio.', '2022-05-27 04:20:01', '2022-05-27 04:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Romance', NULL, NULL),
(2, 'Thriller', NULL, NULL),
(3, 'Horror', NULL, NULL),
(4, 'Fiction', NULL, NULL),
(5, 'Non Fiction', NULL, NULL),
(6, 'Education', NULL, NULL),
(7, 'Comic', NULL, NULL);

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
(383, '2014_10_12_000000_create_users_table', 1),
(384, '2014_10_12_100000_create_password_resets_table', 1),
(385, '2019_08_19_000000_create_failed_jobs_table', 1),
(386, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(387, '2022_04_21_064932_create_books_table', 1),
(388, '2022_04_21_064948_create_categories_table', 1),
(389, '2022_04_21_072216_create_reviews_table', 1);

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `content`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 25, 'Aliquam amet optio minima quos aliquid laboriosam eius. Et sed dolorum neque ut qui praesentium. Et ut assumenda nostrum. Possimus ab laborum qui exercitationem provident. Aut est amet aut at omnis velit soluta.', 3, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(2, 17, 5, 'Aut alias qui recusandae enim facilis recusandae. Iure molestiae aut recusandae incidunt. Animi libero nihil molestias vitae debitis. Voluptas temporibus quo vel fugiat. Iusto fugit optio aspernatur excepturi itaque.', 2, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(3, 11, 14, 'Voluptas a aut qui labore necessitatibus quo cumque est. Voluptatem at et omnis et. Aut qui officia voluptatem sapiente. Nam temporibus consequatur rerum eum ex. Sit neque velit earum dignissimos sunt debitis atque sed.', 4, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(4, 1, 3, 'Aliquid accusamus dolorem ut sunt eaque alias. Qui eveniet aperiam nam. Qui laboriosam cumque similique nam. Doloremque dolorem molestias aut magnam. Consectetur explicabo omnis cumque dolorem cupiditate earum exercitationem.', 4, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(5, 17, 2, 'Qui temporibus odit vel neque et dolore expedita itaque. Aspernatur odio quibusdam qui quaerat perspiciatis quo illum. Aliquid voluptatum minima excepturi ut atque quo quia cumque. Ut omnis aliquid mollitia dolores veniam. Molestiae autem est maiores quos aut aut labore in.', 2, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(6, 1, 16, 'Enim alias quidem est animi quaerat. Hic nobis eaque qui enim dolor. Nobis molestias nam suscipit blanditiis autem rerum. Molestiae voluptatum impedit autem animi iure perspiciatis. Beatae quas omnis accusamus facilis.', 3, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(7, 11, 5, 'Accusantium sunt consectetur dolorum autem et eaque. In cum temporibus voluptas fuga est. Architecto veniam aliquid assumenda et accusamus aut dignissimos. Cum ut aperiam sit necessitatibus minima est. Consequatur repudiandae vel aliquid nesciunt nisi dolores.', 5, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(8, 18, 16, 'Praesentium maxime aperiam maxime dignissimos id iste illum assumenda. Occaecati tenetur tempore ut consequatur. Accusamus amet optio molestiae est sit. Eligendi id hic eum aut. Impedit et fuga et accusantium et expedita quae.', 3, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(9, 19, 9, 'Vitae est adipisci cum earum. Facilis hic eos eveniet. Dolores sunt occaecati necessitatibus sunt doloribus natus natus quia. Libero iure inventore quis qui tenetur. Autem at dolores similique.', 5, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL),
(10, 18, 2, 'Magni magnam sunt voluptates labore sed quod. Esse sit dolorem unde aspernatur. Qui facere est repellendus delectus voluptatem aut. Ullam enim autem omnis cupiditate minus temporibus ad. Tenetur sed fugiat dolore libero.', 3, '2022-05-27 04:20:02', '2022-05-27 04:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'photo/user.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `photo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'photo/admin.png', 'admin', 'admin@email.com', '2022-05-27 04:20:00', '$2y$10$fpdpOLFevNIFoIdkOjsXMuxi2MKj3LyM6fg5PI9F2.a9Jjx2BPey2', NULL, '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(2, 0, 'photo/user.png', 'user', 'user@email.com', '2022-05-27 04:20:00', '$2y$10$fpdpOLFevNIFoIdkOjsXMuxi2MKj3LyM6fg5PI9F2.a9Jjx2BPey2', NULL, '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(3, 0, 'photo/user.png', 'Prof. Veda Mayer', 'ddavis@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7DlDzKlbfC', '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(4, 1, 'photo/user.png', 'Winnifred Gerlach', 'charles.toy@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h5LKQPqqXT', '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(5, 0, 'photo/user.png', 'Micah Rodriguez Jr.', 'beer.torey@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YXdctrMkow', '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(6, 0, 'photo/user.png', 'Vida Mills', 'cgerhold@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WF4qDHwGjG', '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(7, 0, 'photo/user.png', 'Deanna Balistreri', 'lind.iliana@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T1ufFVdNyO', '2022-05-27 04:20:00', '2022-05-27 04:20:00', NULL),
(8, 1, 'photo/user.png', 'Lavonne Bradtke', 'jcollier@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EjAIaTDQtR', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(9, 0, 'photo/user.png', 'Mae Adams', 'johnston.reyes@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sYNnS2yS9V', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(10, 1, 'photo/user.png', 'Nicholaus Lockman', 'qokuneva@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DxUcJimWZ4', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(11, 0, 'photo/user.png', 'Dr. Destany Breitenberg', 'nyasia.medhurst@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wijMEfRr3p', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(12, 0, 'photo/user.png', 'Burdette Upton', 'bwaelchi@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'R2brvSy7fF', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(13, 0, 'photo/user.png', 'Viviane Marvin', 'thurman.little@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'w54P219Rrs', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(14, 0, 'photo/user.png', 'Barton Moen', 'zachary87@example.com', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dNGNqgUM9f', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(15, 0, 'photo/user.png', 'Baron Dooley V', 'marcia.waters@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CtEU5cj3LT', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(16, 0, 'photo/user.png', 'Adrian Herman II', 'mertie52@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SyanvYmz9i', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(17, 1, 'photo/user.png', 'Evan Quitzon', 'dgrady@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bTXN7ll1iw', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(18, 0, 'photo/user.png', 'Ms. Josiane VonRueden III', 'bschiller@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tecLkxrK7F', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(19, 0, 'photo/user.png', 'Durward Corkery', 'rogahn.lon@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0ITGCjQz7d', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(20, 0, 'photo/user.png', 'Kaylie Greenfelder Jr.', 'bernier.davion@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eFKtMByqj3', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(21, 0, 'photo/user.png', 'Herman Lubowitz DDS', 'shaylee71@example.net', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PTclRRwnck', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL),
(22, 1, 'photo/user.png', 'Uriel Dicki II', 'sawayn.jimmie@example.org', '2022-05-27 04:20:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tloYfqyFSY', '2022-05-27 04:20:01', '2022-05-27 04:20:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
