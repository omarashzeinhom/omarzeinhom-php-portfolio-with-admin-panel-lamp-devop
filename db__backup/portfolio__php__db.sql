-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 11:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `portfolio__php__db`
--
-- --------------------------------------------------------
--
-- Table structure for table `abouts`
--
CREATE TABLE `abouts` (
  `id` int(8) UNSIGNED NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_body` text NOT NULL,
  `about_thumbnail` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `abouts`
--
INSERT INTO
  `abouts` (
    `id`,
    `about_title`,
    `about_body`,
    `about_thumbnail`
  )
VALUES
  (
    1,
    'CSS3',
    '       CSS3        ',
    '1663964736Smart watch and Hand_02_9_11zon.webp'
  );

-- --------------------------------------------------------
--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `categories`
--
INSERT INTO
  `categories` (`id`, `title`, `description`)
VALUES
  (6, 'JavaScript  ', 'JavaScript Posts '),
  (7, 'TypeScript  ', 'TypeScript Posts');

-- --------------------------------------------------------
--
-- Table structure for table `downloads`
--
CREATE TABLE `downloads` (
  `id` int(100) UNSIGNED NOT NULL,
  `download_title` varchar(255) NOT NULL,
  `download_link` text NOT NULL,
  `download_alt_title` varchar(255) NOT NULL,
  `download_alt_link` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `posts`
--
CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `posts`
--
INSERT INTO
  `posts` (
    `id`,
    `title`,
    `body`,
    `thumbnail`,
    `date_time`,
    `category_id`,
    `author_id`,
    `is_featured`
  )
VALUES
  (
    1,
    'Post 1 Test Update',
    '                But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that proasdadadasdasdasdasdadadadasdasdduces no resultant pleasure?&quot;  \r\ntest                                                                                                                                                                                                   ',
    '1662568117quran search api with ionic 6 -react-youtube-thumbnail TODO-LIST-APP-1.png',
    '2022-09-07 16:28:37',
    6,
    8,
    1
  ),
  (
    2,
    'Post 2',
    'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;                                                                                                                ',
    '1663807125Duffle bag_01_10_11zon.webp',
    '2022-09-22 00:38:45',
    6,
    8,
    1
  ),
  (
    3,
    'Post 3',
    'In dignissim, justo ac faucibus laoreet, lorem lectus pretium mi, tempor elementum magna ante et nisi. Vestibulum malesuada convallis ligula, id tincidunt arcu aliquet sit amet. Duis iaculis odio vitae sem vulputate finibus. Donec sit amet augue justo. Sed maximus nisi at dui sodales, eu egestas sem ultrices. Nam efficitur odio vitae erat facilisis, non scelerisque nisi maximus. Sed est lorem, convallis a pellentesque vitae, maximus id lacus. Aenean ultricies sodales rhoncus. Ut gravida ultricies nulla, quis accumsan leo malesuada vel. Duis varius felis sed neque tempus porttitor. In turpis urna, lacinia a neque consectetur, accumsan laoreet ligula.                                                                                                 ',
    '1663822171Weight machine_01_3_11zon.webp',
    '2022-09-22 04:49:31',
    7,
    8,
    1
  );

-- --------------------------------------------------------
--
-- Table structure for table `products`
--
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(7, 2) NOT NULL,
  `retailprice` int(7) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `products`
--
INSERT INTO
  `products` (
    `id`,
    `name`,
    `description`,
    `price`,
    `retailprice`,
    `quantity`,
    `img`,
    `date_added`
  )
VALUES
  (
    1,
    'Proudct Name 1',
    'Product Description 1',
    '25.00',
    27,
    5,
    '1663871886Gym Bottle_01_6_11zon.webp',
    '2022-09-22 18:38:25'
  ),
  (
    4,
    'Product Test',
    'Product Test 3                                                                                                               ',
    '47.00',
    50,
    4,
    '1663872855Trademill_03_2_11zon.webp',
    '2022-09-23 02:45:08'
  );

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (
    `id`,
    `firstname`,
    `lastname`,
    `username`,
    `email`,
    `password`,
    `avatar`,
    `is_admin`
  )
VALUES
  (
    8,
    'Verification',
    'User',
    'verifyuser',
    'verifyuser123@email.com',
    '$2y$10$JWJXwmKgQ./3LdqxJzgvdukfeD8S1zeq3tdgQRpWZzzuMRtMrwcAq',
    '16611419011660857274952.jpg',
    1
  ),
  (
    9,
    'Author',
    'Johns',
    'authorjohn',
    'authorjohn@email.com',
    '$2y$10$T7PJO.s0rNe3wNF1TZOC1OM.yLCzUFIs2xWTAZzyNrD/HmZahVnR.',
    '1661199667ANDGO_MENU_ICON_zokgob.svg',
    0
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `abouts`
--
ALTER TABLE
  `abouts`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE
  `categories`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `id` (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE
  `downloads`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE
  `posts`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `FK_blog_category` (`category_id`),
ADD
  KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `products`
--
ALTER TABLE
  `products`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE
  `abouts`
MODIFY
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE
  `categories`
MODIFY
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE
  `downloads`
MODIFY
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE
  `posts`
MODIFY
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE
  `products`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 17;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `posts`
--
ALTER TABLE
  `posts`
ADD
  CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD
  CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE
SET
  NULL;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;