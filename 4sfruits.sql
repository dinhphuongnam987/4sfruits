-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2023 lúc 02:35 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `4sfruits`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `url_logo`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8000/uploads/brand/1.png', NULL, NULL),
(2, 'http://127.0.0.1:8000/uploads/brand/2.png', NULL, NULL),
(3, 'http://127.0.0.1:8000/uploads/brand/3.png', NULL, NULL),
(4, 'http://127.0.0.1:8000/uploads/brand/4.png', NULL, NULL),
(5, 'http://127.0.0.1:8000/uploads/brand/5.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `headers`
--

CREATE TABLE `headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `headers`
--

INSERT INTO `headers` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8000/uploads/logo.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `slug` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'index', '2022-02-07 01:25:46', '2022-02-07 01:25:46'),
(2, 'About', 'about', '2022-02-07 01:26:15', '2022-02-07 01:26:15'),
(3, 'Shop', 'shop', '2022-02-07 01:26:24', '2022-02-07 01:26:24'),
(4, 'News', 'news', '2022-02-07 01:26:33', '2022-02-07 01:26:33'),
(5, 'Contact', 'contact', '2022-02-08 08:00:28', '2022-02-09 01:35:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_childs`
--

CREATE TABLE `menu_childs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `slug` char(50) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_childs`
--

INSERT INTO `menu_childs` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Cart', 'cart', 3, '2022-02-09 01:40:41', '2022-02-09 01:44:52'),
(2, 'Check Out', 'check-out', 3, '2022-02-09 01:45:11', '2022-02-09 01:45:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(180, '2014_10_12_000000_create_users_table', 1),
(181, '2014_10_12_100000_create_password_resets_table', 1),
(182, '2019_08_19_000000_create_failed_jobs_table', 1),
(183, '2022_01_18_130218_create_products_table', 1),
(184, '2022_01_19_063325_create_menus_table', 1),
(185, '2022_01_19_132253_create_menu_childs_table', 1),
(186, '2022_01_21_025154_create_product_cats_table', 1),
(187, '2022_01_21_025214_create_product_to_cats_table', 1),
(188, '2022_02_04_095947_create_brands_table', 1),
(189, '2022_02_04_102618_create_headers_table', 1),
(190, '2022_02_05_084815_create_posts_table', 1),
(191, '2022_02_05_093955_create_post_to_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `thumbnail`, `url_image`, `title`, `slug`, `user`, `description`, `created_at`, `updated_at`) VALUES
(1, 'news-bg-11683193789.jpg', 'http://127.0.0.1:8000/uploads/post/news-bg-11683193789.jpg', 'You will vainly look for fruit on it in autumn', 'you-will-vainly-look-for-fruit-on-it-in-autumn', 'Marry Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.', '2022-02-07 01:45:25', '2023-05-04 02:49:49'),
(2, 'news-bg-21683193804.jpg', 'http://127.0.0.1:8000/uploads/post/news-bg-21683193804.jpg', 'A man worth has its season like tomato', 'a-man-worth-has-its-season-like-tomato', 'Marry Doe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.', '2022-02-07 01:45:58', '2023-05-04 02:50:04'),
(3, 'news-bg-31683193952.jpg', 'http://127.0.0.1:8000/uploads/post/news-bg-31683193952.jpg', 'Bright red pomegranate', 'bright-red-pomegranate', 'Simon Joe', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus laborum autem, dolores inventore, beatae nam.', '2023-05-04 02:52:32', '2023-05-04 02:52:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_to_users`
--

CREATE TABLE `post_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_to_users`
--

INSERT INTO `post_to_users` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-02-07 01:45:25', '2023-05-04 02:49:49'),
(2, 2, 1, '2022-02-07 01:45:58', '2023-05-04 02:50:04'),
(3, 3, 2, '2023-05-04 02:52:32', '2023-05-04 02:52:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `name` char(25) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `thumbnail`, `url_image`, `name`, `slug`, `unit`, `price`, `description`, `created_at`, `updated_at`) VALUES
(4, 'product-img-1.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-1.jpg', 'Strawberry', 'strawberry', 'Kg', 35, 'Strawberry', '2023-05-03 22:19:05', '2023-05-04 02:30:20'),
(5, 'product-img-2.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-2.jpg', 'Grapes', 'grapes', 'Kg', 30, 'Grapes', '2023-05-04 02:32:23', '2023-05-04 02:32:23'),
(6, 'product-img-3.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-3.jpg', 'Lemon', 'lemon', 'Kg', 10, 'Lemon', '2023-05-04 02:34:04', '2023-05-04 02:34:04'),
(7, 'product-img-4.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-4.jpg', 'Kiwi', 'kiwi', 'Kg', 50, 'Kiwi', '2023-05-04 02:35:07', '2023-05-04 02:35:07'),
(8, 'product-img-5.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-5.jpg', 'Apple', 'apple', 'Kg', 23, 'Apple', '2023-05-04 02:36:01', '2023-05-04 02:36:01'),
(9, 'product-img-6.jpg', 'http://127.0.0.1:8000/uploads/product/product-img-6.jpg', 'Red raspberry', 'red-raspberry', 'Kg', 60, 'Red raspberry', '2023-05-04 02:37:26', '2023-05-04 02:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cats`
--

CREATE TABLE `product_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_cats`
--

INSERT INTO `product_cats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apples and pears', '2022-02-07 01:41:45', '2022-02-07 01:41:45'),
(2, 'Stone fruit', '2022-02-07 01:41:51', '2022-02-07 01:41:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_to_cats`
--

CREATE TABLE `product_to_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_to_cats`
--

INSERT INTO `product_to_cats` (`id`, `product_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(4, 4, 2, '2023-05-04 02:30:20', '2023-05-04 02:30:20'),
(5, 5, 2, '2023-05-04 02:32:23', '2023-05-04 02:32:23'),
(6, 6, 2, '2023-05-04 02:34:04', '2023-05-04 02:34:04'),
(7, 7, 1, '2023-05-04 02:35:07', '2023-05-04 02:35:07'),
(8, 8, 1, '2023-05-04 02:36:01', '2023-05-04 02:36:01'),
(9, 9, 2, '2023-05-04 02:37:26', '2023-05-04 02:37:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marry Doe', 'marry@gmail.com', NULL, '731998nam', NULL, NULL, NULL),
(2, 'Simon Joe', 'simon@gmail.com', NULL, '731998nam', NULL, NULL, NULL),
(4, 'admin', 'admin@gmail.com', NULL, 'admin123', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_childs`
--
ALTER TABLE `menu_childs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_childs_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_to_users`
--
ALTER TABLE `post_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_to_users_post_id_foreign` (`post_id`),
  ADD KEY `post_to_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_cats`
--
ALTER TABLE `product_cats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_to_cats`
--
ALTER TABLE `product_to_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_to_cats_product_id_foreign` (`product_id`),
  ADD KEY `product_to_cats_cat_id_foreign` (`cat_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `headers`
--
ALTER TABLE `headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `menu_childs`
--
ALTER TABLE `menu_childs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `post_to_users`
--
ALTER TABLE `post_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_cats`
--
ALTER TABLE `product_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_to_cats`
--
ALTER TABLE `product_to_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menu_childs`
--
ALTER TABLE `menu_childs`
  ADD CONSTRAINT `menu_childs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post_to_users`
--
ALTER TABLE `post_to_users`
  ADD CONSTRAINT `post_to_users_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_to_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_to_cats`
--
ALTER TABLE `product_to_cats`
  ADD CONSTRAINT `product_to_cats_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `product_cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_to_cats_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
