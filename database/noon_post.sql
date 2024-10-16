-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2024 at 03:46 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noon_post`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_tbl`
--

DROP TABLE IF EXISTS `about_tbl`;
CREATE TABLE IF NOT EXISTS `about_tbl` (
  `about_id` int NOT NULL AUTO_INCREMENT,
  `about_img` varchar(100) NOT NULL,
  `about_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_tbl`
--

INSERT INTO `about_tbl` (`about_id`, `about_img`, `about_description`, `status`, `created_at`) VALUES
(1, 'download.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum magnam fuga reiciendis placeat eligendi vitae iste ullam praesentium porro maiores, quisquam tenetur quo ad, distinctio sapiente natus aut. Illum, iste! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos exercitationem impedit cupiditate iusto quam, maxime qui ullam officia, saepe minima itaque libero a quo suscipit quod laboriosam nemo tenetur. Facere libero cum illum sint, praesentium ipsa provident tenetur maiores excepturi impedit neque tempora doloribus nam aspernatur omnis architecto rerum alias, eligendi dolorum. Labore sit, ducimus necessitatibus illum voluptates vel itaque, nihil accusamus, aspernatur est rerum! In cum debitis quasi eos voluptas quas optio! Et nihil, velit minima quae deleniti blanditiis obcaecati tenetur excepturi? Odit illum minima officiis sapiente omnis id aut consectetur, sunt autem hic minus doloribus error, cumque mollitia!<br></p>', 1, '2024-09-26 14:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `add_blog`
--

DROP TABLE IF EXISTS `add_blog`;
CREATE TABLE IF NOT EXISTS `add_blog` (
  `blog_id` int NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(100) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blog_long_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blog_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blog_tag` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_blog`
--

INSERT INTO `add_blog` (`blog_id`, `blog_title`, `blog_date`, `blog_short_desc`, `blog_long_desc`, `blog_img`, `blog_tag`, `author_name`, `author_img`, `slug`, `status`, `created_at`) VALUES
(1, 'blog 1', '2024-09-25', 'description', 'description', '597565.jpg', 'blog 1', 'author', '597565.jpg', 'blog-1', 1, '2024-09-25 16:40:55'),
(3, 'test', '2024-09-26', 'test', 'test test', 'Screenshot Capture - 2024-09-26 - 10-25-31.png', 'tag', 'author', 'Screenshot Capture - 2024-09-26 - 10-25-31.png', 'test', 1, '2024-09-26 15:18:45'),
(4, 'blog new', '2024-10-13', 'blog new', 'blog new', 'Screenshot (295).png', 'blog', 'author', 'Screenshot (339).png', 'blog-new', 1, '2024-10-13 15:32:28'),
(5, 'test 2', '2024-10-13', 'test 2', 'test 2', 'Screenshot (877).png', 'tag', 'author', 'Screenshot (882).png', 'test-2', 1, '2024-10-13 15:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `banner_tbl`
--

DROP TABLE IF EXISTS `banner_tbl`;
CREATE TABLE IF NOT EXISTS `banner_tbl` (
  `banner_id` int NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(100) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner_tbl`
--

INSERT INTO `banner_tbl` (`banner_id`, `banner_title`, `banner_img`, `status`, `created_at`) VALUES
(1, 'Capturing Moments, Sharing Stories, Inspiring Others!', 'pexels-amjed-wani-1355393378-25786776.jpg', 1, '0000-00-00 00:00:00'),
(4, 'Capturing Moments, Sharing Stories, Inspiring Others!', 'pexels-tauseefkhaliq-12750077.jpg', 1, '2024-07-12 06:04:08'),
(5, 'Capturing Moments, Sharing Stories, Inspiring Others!', 'pexels-sanket-barik-2808574-7846474.jpg', 1, '2024-07-12 06:06:56'),
(6, 'Capturing Moments, Sharing Stories, Inspiring Others!', 'pexels-magda-ehlers-pexels-6364965.jpg', 1, '2024-07-12 06:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments_tbl`
--

DROP TABLE IF EXISTS `comments_tbl`;
CREATE TABLE IF NOT EXISTS `comments_tbl` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `person_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blog_id` int NOT NULL,
  `parent_id` int NOT NULL,
  `person_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `person_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments_tbl`
--

INSERT INTO `comments_tbl` (`comment_id`, `person_comment`, `blog_id`, `parent_id`, `person_name`, `person_email`, `status`, `created_at`) VALUES
(1, 'this is comment.', 1, 0, 'xyz', 'anita@gmail.com', 1, '2024-09-26 14:10:17'),
(2, 'test comment', 3, 0, 'anita', 'anita@mail.com', 1, '2024-09-29 16:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

DROP TABLE IF EXISTS `contact_tbl`;
CREATE TABLE IF NOT EXISTS `contact_tbl` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

DROP TABLE IF EXISTS `login_tbl`;
CREATE TABLE IF NOT EXISTS `login_tbl` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`log_id`, `email`, `password`) VALUES
(1, 'anita@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_tbl`
--

DROP TABLE IF EXISTS `newsletter_tbl`;
CREATE TABLE IF NOT EXISTS `newsletter_tbl` (
  `newsletter_id` int NOT NULL AUTO_INCREMENT,
  `newsletter_email` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `newsletter_tbl`
--

INSERT INTO `newsletter_tbl` (`newsletter_id`, `newsletter_email`, `status`, `created_at`) VALUES
(1, 'annu@gmail.com', 1, '2024-10-13 17:32:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
