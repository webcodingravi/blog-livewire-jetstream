-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2026 at 11:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:10:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"create_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"edit_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"delete_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"publish_post\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"manage_categories\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"manage_users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"manage_settings\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:14:\"create_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:14:\"delete_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:15:\"approve_comment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"author\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:4:\"user\";s:1:\"c\";s:3:\"web\";}}}', 1775057613);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Laravel', 'laravel', 1, 'Laravel', 'Laravel', '2026-03-27 15:53:49', '2026-03-30 18:50:26', NULL),
(2, 'PHP', 'php', 1, 'PHP', 'PHP', '2026-03-27 15:53:49', '2026-03-30 18:50:18', NULL),
(3, 'Livewire', 'livewire', 1, NULL, NULL, '2026-03-27 15:53:49', '2026-03-27 15:53:49', NULL),
(4, 'Frontend', 'frontend', 1, 'Frontend', 'Frontend', '2026-03-27 15:53:49', '2026-03-30 18:50:06', NULL),
(5, 'Backend', 'backend', 1, 'Backend', 'Backend', '2026-03-27 15:53:49', '2026-03-30 18:49:58', NULL),
(6, 'API Development', 'api-development', 1, 'API Development', 'API Development', '2026-03-27 15:53:49', '2026-03-30 18:49:51', NULL),
(7, 'Database', 'database', 1, 'Database', 'Database', '2026-03-27 15:53:49', '2026-03-30 18:49:43', NULL),
(8, 'DevOps', 'devops', 1, 'DevOps', 'DevOps', '2026-03-27 15:53:49', '2026-03-30 18:49:33', NULL),
(9, 'UI/UX', 'uiux', 1, 'UI/UX', 'UI/UX', '2026-03-27 15:53:49', '2026-03-30 18:49:26', NULL),
(10, 'Debugging', 'debugging', 1, 'Debugging', 'Debugging', '2026-03-27 15:53:49', '2026-03-30 18:49:19', NULL),
(11, 'Tips & Tricks', 'tips-tricks', 1, 'Tips & Tricks', 'Tips & Tricks', '2026-03-27 15:53:49', '2026-03-30 18:49:11', NULL),
(12, 'Project', 'project', 1, 'Project', 'Project', '2026-03-27 15:53:49', '2026-03-30 18:49:04', NULL),
(13, 'Beginner Guide', 'beginner-guide', 1, 'Beginner Guide', 'Beginner Guide', '2026-03-27 15:53:49', '2026-03-30 18:48:56', NULL),
(14, 'Advanced Tutorials', 'advanced-tutorials', 1, 'Advanced Tutorials', 'Advanced Tutorials', '2026-03-27 15:53:49', '2026-03-30 18:48:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `is_approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 1, 'best post', 1, '2026-03-30 12:02:19', '2026-03-30 12:02:19', NULL),
(2, 6, 1, 'good', 1, '2026-03-30 12:05:27', '2026-03-30 12:05:27', NULL),
(3, 6, 1, 'best post', 1, '2026-03-30 12:14:59', '2026-03-30 15:22:42', NULL),
(4, 6, 1, 'krish', 0, '2026-03-30 12:56:03', '2026-03-30 12:56:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_15_074407_add_two_factor_columns_to_users_table', 1),
(5, '2026_03_15_074451_create_personal_access_tokens_table', 1),
(6, '2026_03_23_165313_create_permission_tables', 1),
(7, '2026_03_23_184029_create_categories_table', 1),
(8, '2026_03_23_184253_create_posts_table', 1),
(9, '2026_03_23_190537_create_system_settings_table', 1),
(10, '2026_03_23_190610_create_smtp_settings_table', 1),
(11, '2026_03_23_191805_create_comments_table', 1),
(12, '2026_03_25_180547_create_tags_table', 1),
(13, '2026_03_27_003930_create_post_tags_table', 1),
(14, '2026_03_30_203338_update_comments_table', 2),
(15, '2026_03_31_202022_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1405d5f0-65fb-4567-bbee-8165822e7d2e', 'App\\Notifications\\NewUserRegisterNotification', 'App\\Models\\User', 3, '{\"message\":\"raju has registered.\",\"id\":9,\"email\":\"raju@gmail.com\"}', '2026-03-31 18:05:45', '2026-03-31 18:04:15', '2026-03-31 18:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ravi@gmail.com', '$2y$12$j.9dH7pNmb4LwjPAGueq.upYDKfp1btwZ85NnM0giyTeXfNfCh.r2', '2026-03-31 14:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_post', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(2, 'edit_post', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(3, 'delete_post', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(4, 'publish_post', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(5, 'manage_categories', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(6, 'manage_users', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(7, 'manage_settings', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(8, 'create_comment', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(9, 'delete_comment', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(10, 'approve_comment', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `description`, `category_id`, `user_id`, `status`, `views`, `meta_title`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'dummy', 'dummy', '69c9624ed2970.jpg', '<p><img src=\"http://localhost:8000/storage/uploads/posts/3HsxDudpRxJvRx0e1FzjmQRSm4ooKYLEeUun4QFF.jpg\" style=\"width: 100%px;\" class=\"fr-fic fr-dib\"></p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br></p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br></p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 3, 'published', 0, 'laravel', 'laravel', '2026-03-29 17:33:02', '2026-03-29 17:43:42', NULL),
(4, 'Laravel Livewire: JavaScript ke bina Dynamic UI ka Smart Tarika', 'laravel-livewire-javascript-ke-bina-dynamic-ui-ka-smart-tarika', '69cabf174ff33.png', '<p><img src=\"http://localhost:8000/storage/uploads/posts/p54zmQ1ODjwNFhz0cvc1hkEByIWjNPBlkmTShTbB.png\" style=\"width: 1047px;\" class=\"fr-fic fr-dib\"></p><p data-pasted=\"true\"><strong><span style=\"font-size: 18px;\">🚀 Laravel Livewire: JavaScript ke bina Dynamic UI ka Smart Tarika</span></strong></p><p>अगर तुम Laravel use कर रहे हो और dynamic UI बनाना चाहते हो लेकिन JavaScript में struggle करते हो, तो Laravel Livewire तुम्हारे लिए game changer है।</p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 Livewire क्या है?</strong></span></p><p>Livewire एक full-stack framework है जो तुम्हें Laravel के अंदर ही dynamic, reactive interfaces बनाने देता है &mdash; बिना heavy JavaScript के।</p><p>Simple शब्दों में:<br>👉 PHP से ही frontend control कर सकते हो<br data-start=\"672\" data-end=\"675\">👉 Page reload के बिना UI update होता है</p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 Livewire कैसे काम करता है?</strong></span></p><p>यहाँ असली magic है 👇</p><ol data-start=\"781\" data-end=\"966\"><li data-section-id=\"1895ljx\" data-start=\"781\" data-end=\"811\">User button click करता है</li><li data-section-id=\"727skx\" data-start=\"812\" data-end=\"863\">Request server (Livewire component) पर जाती है</li><li data-section-id=\"1fdkj8u\" data-start=\"864\" data-end=\"890\">PHP logic run होता है</li><li data-section-id=\"t1qmcy\" data-start=\"891\" data-end=\"926\">सिर्फ updated HTML वापस आता है</li><li data-section-id=\"10gil0t\" data-start=\"927\" data-end=\"966\">UI automatically update हो जाता है</li></ol><p>👉 बिना full page reload के</p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 Livewire क्यों use करें?</strong></span></p><p>1. JavaScript कम लिखना पड़ता है</p><p>तुम PHP में ही काम कर सकते हो</p><p>2. Fast development</p><p>CRUD, forms, validation &mdash; सब जल्दी बन जाता है</p><p>3. Laravel के साथ perfect integration</p><ul data-start=\"1214\" data-end=\"1259\"><li data-section-id=\"sceqtw\" data-start=\"1214\" data-end=\"1225\">Routing</li><li data-section-id=\"k2cqg3\" data-start=\"1226\" data-end=\"1240\">Validation</li><li data-section-id=\"11utya0\" data-start=\"1241\" data-end=\"1259\">Authentication</li></ul><p>सब smoothly काम करता है</p><p><br></p><p><strong><span style=\"font-size: 18px;\">🔹 Livewire का simple example</span></strong></p><p><strong>Step 1: Component बनाओ</strong></p><p><br></p><div id=\"code-block-viewer\" dir=\"ltr\"><strong><span style=\"color: rgb(41, 105, 176);\">php artisan make:livewire counter</span></strong></div><p><span style=\"color: rgb(41, 105, 176);\"><strong><br></strong></span></p><p><span style=\"color: rgb(41, 105, 176);\"><strong>Step 2: Component class</strong></span></p><p><span style=\"color: rgb(41, 105, 176);\"><strong><br></strong></span></p><div id=\"code-block-viewer\" dir=\"ltr\"><span style=\"color: rgb(41, 105, 176);\"><strong>class Counter extends Component<br>{<br>&nbsp; &nbsp; public $count = 0;<br><br>&nbsp; &nbsp; public function increment()<br>&nbsp; &nbsp; {<br>&nbsp; &nbsp; &nbsp; &nbsp; $this-&gt;count++;<br>&nbsp; &nbsp; }<br><br>&nbsp; &nbsp; public function render()<br>&nbsp; &nbsp; {<br>&nbsp; &nbsp; &nbsp; &nbsp; return view(&#39;livewire.counter&#39;);<br>&nbsp; &nbsp; }<br>}</strong></span></div><p><span style=\"color: rgb(41, 105, 176);\"><strong><br></strong></span></p><p><span style=\"color: rgb(41, 105, 176);\"><strong>Step 3: Blade file</strong></span></p><p><span style=\"color: rgb(41, 105, 176);\"><strong><br></strong></span></p><div id=\"code-block-viewer\" dir=\"ltr\"><strong><span style=\"color: rgb(41, 105, 176);\">&lt;div&gt;<br>&nbsp; &nbsp; &lt;h1&gt;{{ $count }}&lt;/h1&gt;<br>&nbsp; &nbsp; &lt;button wire:click=&quot;increment&quot;&gt;+&lt;/button&gt;<br>&lt;/div&gt;</span></strong></div><p><br></p><p><strong><span style=\"font-size: 18px;\">👉 Button click करते ही count update होगा &mdash; बिना page reload</span></strong></p><p><br></p><p><strong><span style=\"font-size: 18px;\">🔹 Livewire के important features</span></strong></p><p>✅ Data Binding</p><p><br></p><div id=\"code-block-viewer\" dir=\"ltr\">&lt;input type=&quot;text&quot; wire:model=&quot;name&quot;&gt;</div><p><br></p><p>👉 input change होते ही value update</p><p>✅ Validation</p><p><br></p><div id=\"code-block-viewer\" dir=\"ltr\">$this-&gt;validate([<br>&nbsp; &nbsp; &#39;name&#39; =&gt; &#39;required|min:3&#39;<br>]);</div><p><br></p><p>✅ Events &amp; Actions</p><ul data-start=\"2113\" data-end=\"2159\"><li data-section-id=\"vvzt2t\" data-start=\"2113\" data-end=\"2127\">wire:click</li><li data-section-id=\"g9m7bj\" data-start=\"2128\" data-end=\"2143\">wire:submit</li><li data-section-id=\"12j5871\" data-start=\"2144\" data-end=\"2159\">wire:change</li><li data-section-id=\"12j5871\" data-start=\"2144\" data-end=\"2159\"><br></li></ul><p><strong><span style=\"font-size: 24px;\">🔹 Livewire + Real Use Cases</span></strong></p><p>Livewire का use real projects में होता है:</p><ul data-start=\"2243\" data-end=\"2328\"><li data-section-id=\"169g3m\" data-start=\"2243\" data-end=\"2259\">Admin panels</li><li data-section-id=\"1qltc1k\" data-start=\"2260\" data-end=\"2276\">Blog systems</li><li data-section-id=\"rfds9h\" data-start=\"2277\" data-end=\"2295\">Search filters</li><li data-section-id=\"198l8xd\" data-start=\"2296\" data-end=\"2313\">Form handling</li><li data-section-id=\"18cqnhb\" data-start=\"2314\" data-end=\"2328\">Dashboards</li><li data-section-id=\"18cqnhb\" data-start=\"2314\" data-end=\"2328\"><br></li></ul><p>👉 खासकर जहाँ dynamic UI चाहिए लेकिन JS heavy नहीं करना</p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 Livewire vs JavaScript Frameworks</strong></span></p><p><br></p><table data-start=\"2433\" data-end=\"2644\"><thead data-start=\"2433\" data-end=\"2482\"><tr data-start=\"2433\" data-end=\"2482\"><th data-start=\"2433\" data-end=\"2443\" data-col-size=\"sm\">Feature</th><th data-start=\"2443\" data-end=\"2454\" data-col-size=\"sm\">Livewire</th><th data-start=\"2454\" data-end=\"2482\" data-col-size=\"sm\">JS Framework (React/Vue)</th></tr></thead><tbody data-start=\"2531\" data-end=\"2644\"><tr data-start=\"2531\" data-end=\"2562\"><td data-start=\"2531\" data-end=\"2542\" data-col-size=\"sm\">Language</td><td data-start=\"2542\" data-end=\"2548\" data-col-size=\"sm\">PHP</td><td data-col-size=\"sm\" data-start=\"2548\" data-end=\"2562\">JavaScript</td></tr><tr data-start=\"2563\" data-end=\"2591\"><td data-start=\"2563\" data-end=\"2574\" data-col-size=\"sm\">Learning</td><td data-start=\"2574\" data-end=\"2581\" data-col-size=\"sm\">Easy</td><td data-col-size=\"sm\" data-start=\"2581\" data-end=\"2591\">Medium</td></tr><tr data-start=\"2592\" data-end=\"2620\"><td data-start=\"2592\" data-end=\"2600\" data-col-size=\"sm\">Setup</td><td data-col-size=\"sm\" data-start=\"2600\" data-end=\"2609\">Simple</td><td data-col-size=\"sm\" data-start=\"2609\" data-end=\"2620\">Complex</td></tr><tr data-start=\"2621\" data-end=\"2644\"><td data-start=\"2621\" data-end=\"2629\" data-col-size=\"sm\">Speed</td><td data-col-size=\"sm\" data-start=\"2629\" data-end=\"2636\">Fast</td><td data-col-size=\"sm\" data-start=\"2636\" data-end=\"2644\">Fast</td></tr></tbody></table><p><br></p><p><strong>👉 अगर तुम Laravel dev हो, Livewire ज्यादा आसान लगेगा</strong></p><p><br></p><p><strong><span style=\"font-size: 18px;\">🔹 Beginners के लिए roadmap</span></strong></p><ol data-start=\"2738\" data-end=\"2906\"><li data-section-id=\"15olvut\" data-start=\"2738\" data-end=\"2767\">Laravel basics clear करो</li><li data-section-id=\"1imqyix\" data-start=\"2768\" data-end=\"2793\">Livewire install करो</li><li data-section-id=\"1c68o5f\" data-start=\"2794\" data-end=\"2821\">Simple components बनाओ</li><li data-section-id=\"1v59en7\" data-start=\"2822\" data-end=\"2844\">CRUD project बनाओ</li><li data-section-id=\"2bdh70\" data-start=\"2845\" data-end=\"2877\">Validation + events use करो</li><li data-section-id=\"1lyilty\" data-start=\"2878\" data-end=\"2906\">Alpine JS integrate करो</li><li data-section-id=\"1lyilty\" data-start=\"2878\" data-end=\"2906\"><br></li></ol><p><span style=\"font-size: 18px;\"><strong>🔹 Conclusion</strong></span></p><p>Livewire उन developers के लिए best है जो Laravel में रहकर modern UI बनाना चाहते हैं। यह development को fast, simple और efficient बना देता है।</p><p>👉 अगर तुम PHP developer हो, तो Livewire सीखना एक smart move है।</p>', 3, 3, 'published', 0, 'Laravel Livewire: JavaScript ke bina Dynamic UI ka Smart Tarika', 'Laravel Livewire: JavaScript ke bina Dynamic UI ka Smart Tarika', '2026-03-29 18:04:25', '2026-03-30 18:21:11', NULL),
(5, 'PHP: Web Development ki Backbone Language', 'php-web-development-ki-backbone-language', '69cabc40c091c.jpg', '<p><img src=\"http://localhost:8000/storage/uploads/posts/4lxeyhk1fsNRtQT52LdtrSM5LArr6nw4qib4GUUx.jpg\" style=\"width: 1047px;\" class=\"fr-fic fr-dib\"></p><p data-pasted=\"true\"><strong><span style=\"font-size: 18px;\">🚀 PHP: Web Development ki Backbone Language</span></strong></p><p>अगर तुम web development की दुनिया में आना चाहते हो, तो PHP एक ऐसी language है जिसे ignore करना मुश्किल है। आज भी लाखों websites PHP पर चल रही हैं, और इसकी demand अभी भी strong है।</p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 PHP क्या है?</strong></span></p><p>PHP एक server-side scripting language है, जिसका use dynamic websites बनाने के लिए किया जाता है।</p><p>Simple समझो:</p><ul data-start=\"546\" data-end=\"655\"><li data-section-id=\"avzd9i\" data-start=\"546\" data-end=\"582\">User browser से request भेजता है</li><li data-section-id=\"1h71dap\" data-start=\"583\" data-end=\"612\">PHP server पर run होती है</li><li data-section-id=\"1yt021k\" data-start=\"613\" data-end=\"655\">HTML generate करके browser को भेजती है</li><li data-section-id=\"1yt021k\" data-start=\"613\" data-end=\"655\"><br></li></ul><p><span style=\"font-size: 18px;\"><strong>🔹 PHP क्यों सीखनी चाहिए?</strong></span></p><p>यहाँ बात practical है &mdash; PHP अभी भी relevant है।</p><p>1. Easy to Learn</p><p>अगर तुम beginner हो, तो PHP समझना आसान है। Syntax simple है।</p><p>2. Widely Used</p><p>आज भी बड़ी websites PHP use करती हैं जैसे:</p><ul data-start=\"886\" data-end=\"999\"><li data-section-id=\"zslftj\" data-start=\"886\" data-end=\"941\">Facebook (initially PHP)</li><li data-section-id=\"13dz54j\" data-start=\"942\" data-end=\"999\">WordPress (पूरी तरह PHP पर)</li></ul><p>3. Database Integration</p><p>PHP आसानी से database से connect हो जाती है, खासकर:</p><ul data-start=\"1086\" data-end=\"1127\"><li data-section-id=\"cgv1px\" data-start=\"1086\" data-end=\"1127\">MySQL</li></ul><p>4. Framework Support</p><p>PHP के powerful frameworks development को fast बनाते हैं:</p><ul data-start=\"1217\" data-end=\"1286\"><li data-section-id=\"eyrt5h\" data-start=\"1217\" data-end=\"1258\">Laravel</li><li data-section-id=\"5lxhv3\" data-start=\"1259\" data-end=\"1274\">CodeIgniter</li><li data-section-id=\"16rdx1t\" data-start=\"1275\" data-end=\"1286\">Symfony</li><li data-section-id=\"16rdx1t\" data-start=\"1275\" data-end=\"1286\"><br></li></ul><p><strong><span style=\"font-size: 18px;\">🔹 PHP कैसे काम करती है?</span></strong></p><p>चलो simple flow समझते हैं:</p><ol data-start=\"1350\" data-end=\"1508\"><li data-section-id=\"1r757ai\" data-start=\"1350\" data-end=\"1380\">User website open करता है</li><li data-section-id=\"kqn2e8\" data-start=\"1381\" data-end=\"1411\">Request server पर जाती है</li><li data-section-id=\"1pafrjv\" data-start=\"1412\" data-end=\"1441\">PHP code execute होता है</li><li data-section-id=\"1se00jy\" data-start=\"1442\" data-end=\"1478\">Result HTML में convert होता है</li><li data-section-id=\"1n5kieb\" data-start=\"1479\" data-end=\"1508\">Browser में show होता है</li><li data-section-id=\"1n5kieb\" data-start=\"1479\" data-end=\"1508\"><br></li></ol><p><span style=\"font-size: 18px;\"><strong>🔹 Simple PHP Example</strong></span></p><div id=\"code-block-viewer\" dir=\"ltr\">&lt;?php<br>echo &quot;Hello World!&quot;;<br>?&gt;</div><p><br></p><p><span style=\"font-size: 18px;\"><strong>👉 ये code browser पर &quot;Hello World!&quot; दिखाएगा</strong></span></p><p><br></p><p><span style=\"font-size: 18px;\"><strong>🔹 PHP का Real Use</strong></span></p><p>PHP का use real-world projects में होता है:</p><ul data-start=\"1702\" data-end=\"1766\"><li data-section-id=\"19sipra\" data-start=\"1702\" data-end=\"1719\">Blog websites</li><li data-section-id=\"1kn2u1x\" data-start=\"1720\" data-end=\"1740\">E-commerce sites</li><li data-section-id=\"1h835jc\" data-start=\"1741\" data-end=\"1757\">Login सिस्टम</li><li data-section-id=\"1vvopmr\" data-start=\"1758\" data-end=\"1766\">APIs</li></ul><p>अगर तुम freelancing करना चाहते हो, तो PHP एक strong base बना सकती है।</p><p><br></p><p><strong><span style=\"font-size: 18px;\">🔹 PHP सीखने का रोडमैप</span></strong></p><p>अगर तुम शुरू कर रहे हो, तो ये follow करो:</p><ol data-start=\"1914\" data-end=\"2080\"><li data-section-id=\"hmn898\" data-start=\"1914\" data-end=\"1936\">Basic syntax सीखो</li><li data-section-id=\"ytizgn\" data-start=\"1937\" data-end=\"1965\">Variables और loops समझो</li><li data-section-id=\"1d4cha9\" data-start=\"1966\" data-end=\"1993\">Forms handle करना सीखो</li><li data-section-id=\"1vx070x\" data-start=\"1994\" data-end=\"2027\">Database (MySQL) connect करो</li><li data-section-id=\"6q5qo2\" data-start=\"2028\" data-end=\"2050\">CRUD project बनाओ</li><li data-section-id=\"1tr52qs\" data-start=\"2051\" data-end=\"2080\">Framework (Laravel) सीखो</li><li data-section-id=\"1tr52qs\" data-start=\"2051\" data-end=\"2080\"><br></li></ol><p><strong><span style=\"font-size: 18px;\">🔹 Conclusion</span></strong></p><p>PHP एक powerful और practical language है जो beginners और professionals दोनों के लिए useful है। अगर तुम web development में career बनाना चाहते हो, तो PHP सीखना एक smart decision है।</p>', 2, 3, 'published', 2, 'Web Development ki Backbone Language', 'Web Development ki Backbone Language', '2026-03-29 18:07:33', '2026-04-01 09:37:19', NULL),
(6, 'Laravel: Modern Web Development ka Powerful Framework', 'laravel-modern-web-development-ka-powerful-framework', '69cab5edbcad9.png', '<p><br></p><p><img src=\"http://localhost:8000/storage/uploads/posts/pP0pGHTc30Vm3ZDUk5miPekUptwi1pUdgldg1Mul.png\" style=\"width: 1047px;\" class=\"fr-fic fr-dib\"></p><p data-pasted=\"true\">🚀<strong><span style=\"font-size: 24px;\">&nbsp;Laravel: Modern Web Development ka Powerful Framework</span></strong></p><p>Agar tum web development सीख रहे हो ya already PHP use karte ho, to Laravel ek aisa framework hai jo tumhari productivity ko next level par le ja sakta hai. Ye sirf ek framework nahi, balki ek complete ecosystem hai jo clean code, fast development aur security provide karta hai.</p><p><br></p><p data-pasted=\"true\"><span style=\"font-size: 18px;\"><strong>🔹 Laravel kya hai?</strong></span></p><p>Laravel ek open-source PHP framework hai jo MVC (Model-View-Controller) architecture follow karta hai. Iska main goal hai development ko simple aur elegant banana.</p><p>Simple words me:</p><ul><li data-section-id=\"15s15e\" data-start=\"728\" data-end=\"751\" data-pasted=\"true\">Code clean hota hai</li><li data-section-id=\"5203vl\" data-start=\"752\" data-end=\"773\">Reusable hota hai</li><li data-section-id=\"1x4oxoa\" data-start=\"774\" data-end=\"806\">Maintain karna easy hota hai</li></ul><p><br></p><p data-pasted=\"true\"><strong><span style=\"font-size: 18px;\">🔹 Laravel use kyu kare?</span></strong></p><p>Yahan baat seedhi hai &mdash; Laravel tumhari life easy bana deta hai.</p><p>1. Clean Syntax<br>Laravel ka code likhna bahut readable hota hai. Tum easily samajh sakte ho ki kya ho raha hai.</p><p>2. Built-in Features<br>Bahut saari cheeze already ready milti hain:</p><ul data-start=\"1095\" data-end=\"1170\"><li data-section-id=\"4i54y4\" data-start=\"1095\" data-end=\"1128\">Authentication (Login/Register)</li><li data-section-id=\"ax2ono\" data-start=\"1129\" data-end=\"1138\">Routing</li><li data-section-id=\"1vgmmzn\" data-start=\"1139\" data-end=\"1151\">Validation</li><li data-section-id=\"sck81l\" data-start=\"1152\" data-end=\"1170\">Session handling</li></ul><p>3. Security<br>Laravel built-in protection deta hai:</p><ul data-start=\"1226\" data-end=\"1270\"><li data-section-id=\"1rg9kvl\" data-start=\"1226\" data-end=\"1241\">SQL Injection</li><li data-section-id=\"1au65cn\" data-start=\"1242\" data-end=\"1256\">CSRF attacks</li><li data-section-id=\"l2j2j\" data-start=\"1257\" data-end=\"1270\">XSS attacks</li></ul><p>4. Fast Development<br>Tumhe sab kuch scratch se nahi banana padta. Isse time bachata hai.</p><p data-pasted=\"true\"><br></p><h3 data-section-id=\"1df38hx\" data-start=\"1370\" data-end=\"1401\"><span style=\"font-size: 18px;\"><strong>🔹 Laravel ke Core Concepts</strong></span></h3><p data-start=\"1403\" data-end=\"1469\">Agar tum Laravel seekh rahe ho, to ye concepts clear hone chahiye:</p><p data-start=\"1471\" data-end=\"1552\">1. Routing<br>User request kis page ya function par jayegi, ye define karta hai.</p><p data-start=\"1554\" data-end=\"1604\">2. Controller<br>Business logic handle karta hai.</p><p data-start=\"1606\" data-end=\"1652\">3. Model<br>Database ke saath kaam karta hai.</p><p data-start=\"1654\" data-end=\"1711\">4. View<br>Frontend UI show karta hai (Blade templates).</p><p data-start=\"1654\" data-end=\"1711\"><br></p><h3 data-section-id=\"4plsg\" data-start=\"1718\" data-end=\"1744\"><strong><span style=\"font-size: 18px;\">🔹 Laravel ka Real Use</span></strong></h3><p data-start=\"1746\" data-end=\"1793\">Laravel ka use real projects me hota hai jaise:</p><ul data-start=\"1794\" data-end=\"1881\"><li data-section-id=\"6sqmol\" data-start=\"1794\" data-end=\"1817\">E-commerce websites</li><li data-section-id=\"169g3m\" data-start=\"1818\" data-end=\"1834\">Admin panels</li><li data-section-id=\"16okguf\" data-start=\"1835\" data-end=\"1865\">APIs (Mobile apps ke liye)</li><li data-section-id=\"3os9sy\" data-start=\"1866\" data-end=\"1881\">CRM systems</li></ul><p data-start=\"1883\" data-end=\"1961\">Agar tum startup ya freelancing karna chahte ho, Laravel ek strong choice hai.</p><p data-start=\"1883\" data-end=\"1961\"><br></p><h3 data-section-id=\"rqdtu8\" data-start=\"1968\" data-end=\"2010\"><span style=\"font-size: 18px;\"><strong>🔹 Laravel Tools jo tumhe aane chahiye</strong></span></h3><p data-start=\"2012\" data-end=\"2058\">Thoda practical socho &mdash; ye tools aane chahiye:</p><ul data-start=\"2060\" data-end=\"2217\"><li data-section-id=\"4fhve2\" data-start=\"2060\" data-end=\"2089\">Artisan (command line tool)</li><li data-section-id=\"1t0epvy\" data-start=\"2090\" data-end=\"2124\">Eloquent ORM (database handling)</li><li data-section-id=\"sxiv77\" data-start=\"2125\" data-end=\"2143\">Blade templating</li><li data-section-id=\"1s8m63u\" data-start=\"2144\" data-end=\"2178\">Livewire (dynamic UI without JS)</li><li data-section-id=\"ddftfn\" data-start=\"2179\" data-end=\"2217\">Laravel Sanctum (API authentication)</li><li data-section-id=\"ddftfn\" data-start=\"2179\" data-end=\"2217\"><br></li></ul><h3 data-section-id=\"1cbc9y4\" data-start=\"2224\" data-end=\"2256\"><span style=\"font-size: 18px;\"><strong>🔹 Beginners ke liye roadmap</strong></span></h3><p data-start=\"2258\" data-end=\"2304\">Agar tum start kar rahe ho, to ye follow karo:</p><ol data-start=\"2306\" data-end=\"2458\"><li data-section-id=\"z4lmfp\" data-start=\"2306\" data-end=\"2332\">PHP basics clear karo</li><li data-section-id=\"18tgdwz\" data-start=\"2333\" data-end=\"2356\">MVC concept samjho</li><li data-section-id=\"17c9m7j\" data-start=\"2357\" data-end=\"2382\">Laravel install karo</li><li data-section-id=\"1xtudk9\" data-start=\"2383\" data-end=\"2406\">CRUD project banao</li><li data-section-id=\"9j7j0o\" data-start=\"2407\" data-end=\"2435\">Authentication add karo</li><li data-section-id=\"v9gh95\" data-start=\"2436\" data-end=\"2458\">API banana seekho</li><li data-section-id=\"v9gh95\" data-start=\"2436\" data-end=\"2458\"><br></li></ol><h3 data-section-id=\"l2kidd\" data-start=\"2465\" data-end=\"2482\"><span style=\"font-size: 18px;\"><strong>🔹 Conclusion</strong></span></h3><p data-start=\"2484\" data-end=\"2703\">Laravel ek powerful aur developer-friendly framework hai jo beginners aur professionals dono ke liye perfect hai. Agar tum clean, secure aur fast web applications banana chahte ho, to Laravel definitely seekhna chahiye.</p><p data-start=\"2710\" data-end=\"2730\">Agar chaaho to main:</p><ul data-start=\"2731\" data-end=\"2914\"><li data-section-id=\"mrkmch\" data-start=\"2731\" data-end=\"2778\">isi article ko SEO optimized bana deta hoon</li><li data-section-id=\"gysnxt\" data-start=\"2779\" data-end=\"2838\">ya LinkedIn / blog post format me convert kar deta hoon</li><li data-section-id=\"2alkq3\" data-start=\"2839\" data-end=\"2914\">ya tumhare level ke hisaab se beginner &rarr; advanced series bana deta hoon</li></ul><p data-start=\"2916\" data-end=\"2940\" data-is-last-node=\"\" data-is-only-node=\"\">bolo next kya chahiye 👍</p><div data-edge=\"true\"><br></div>', 1, 3, 'published', 14, 'Modern Web Development ka Powerful Framework', 'Modern Web Development ka Powerful Framework', '2026-03-29 19:19:50', '2026-04-01 09:37:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL),
(7, 6, 1, NULL, NULL),
(8, 6, 4, NULL, NULL),
(9, 5, 5, NULL, NULL),
(10, 5, 6, NULL, NULL),
(11, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(2, 'author', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48'),
(3, 'user', 'web', '2026-03-27 15:53:48', '2026-03-27 15:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(8, 3),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp_settings`
--

CREATE TABLE `smtp_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `mail_mailer` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_from_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtp_settings`
--

INSERT INTO `smtp_settings` (`id`, `website_name`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `created_at`, `updated_at`) VALUES
(1, 'News Blog', 'smtp', 'sandbox.smtp.mailtrap.io', '2525', 'e4e5f591a98113', 'e94b59362cc681', 'tls', 'ravi@gmail.com', '2026-03-28 18:45:51', '2026-03-28 18:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `website_name`, `logo`, `favicon`, `address`, `mobile_no`, `email`, `facebook_link`, `instagram_link`, `twitter_link`, `created_at`, `updated_at`) VALUES
(1, 'News Blog', 'website-name_logo.png', 'website-name_favicon.png', 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore - 560016\n', '9821345742', 'ravi@gmail.com', 'www.facebook.com', 'www.instagram.com', 'www.twitter.com', '2026-03-28 18:42:30', '2026-03-28 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'laravel', '2026-03-28 18:12:39', '2026-03-28 18:12:39'),
(2, 'hello', '2026-03-28 18:12:39', '2026-03-28 18:12:39'),
(3, 'livewire', '2026-03-29 18:07:33', '2026-03-29 18:07:33'),
(4, 'model framework', '2026-03-30 17:42:05', '2026-03-30 17:42:05'),
(5, 'php', '2026-03-30 18:09:04', '2026-03-30 18:09:04'),
(6, 'web devlopment', '2026-03-30 18:09:04', '2026-03-30 18:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'approved',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$12$SUe4T.j2EYpiw3hsEDUwpeK7RiJSNkZJyB1nEsE.IjgkwlrnnLR1q', NULL, NULL, NULL, NULL, NULL, NULL, 'approved', NULL, '2026-03-27 15:53:48', '2026-03-27 16:04:15'),
(2, 'Author', 'author@gmail.com', NULL, '$2y$12$d7b0S6OYCREV0Y9P4Kf/hemc27rTD1SUrwtZvot6DGo9icvbevyYa', NULL, NULL, NULL, NULL, NULL, NULL, 'approved', NULL, '2026-03-27 15:53:49', '2026-03-27 15:53:49'),
(3, 'Ravi kumar', 'ravi@gmail.com', NULL, '$2y$12$wk04bnJ7JclBRaZp4koZROt9VugWHBI40VB/akWqQwgExvfxDpZxq', NULL, NULL, NULL, NULL, NULL, 'profile-photos/xhujHmlzj7jWtVvOQXRPJYPWBL1WBMdyrsGTRMXw.png', 'approved', NULL, '2026-03-27 15:53:49', '2026-03-31 14:40:24'),
(9, 'raju', 'raju@gmail.com', NULL, '$2y$12$.lTSL0Ly3r1/4v5B5v3K2eKBsirZUkkwfpUikt9.0VMMa3XXahdZ.', NULL, NULL, NULL, NULL, NULL, NULL, 'approved', NULL, '2026-03-31 18:04:15', '2026-03-31 18:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_available_at_index` (`queue`,`reserved_at`,`available_at`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tags_post_id_foreign` (`post_id`),
  ADD KEY `post_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `smtp_settings`
--
ALTER TABLE `smtp_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `post_tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
