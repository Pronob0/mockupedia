-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 03:44 AM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_infos`
--

CREATE TABLE `about_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cv_question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mycv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `myname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_infos`
--

INSERT INTO `about_infos` (`id`, `cv_question`, `cv_title`, `cv_description`, `mycv`, `myname`, `birthdate`, `email`, `phone`, `address`, `social`, `social_link`, `my_avatar`, `created_at`, `updated_at`) VALUES
(1, 'Who am I ?', 'A Web Designer / Developer Located In Our Lovely Earth', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.sit amet, Qui deserunt consequatur fugit repellendusillo voluptas?</span><br></p>', '1668825668-pdf', 'John Doe', '1996-02-18', 'softwarebakery71@gmail.com', '8801976814812', 'uttara, Dhaka-1230', 'skype', 'software', '1668825668-jpg', NULL, '2022-11-19 10:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '+8801976814812', NULL, '$2y$10$4JPRcVvnkkumu.7whN6saOy3GRpt31Qyt7RSyPw9.x1aN8s8sx7Om', NULL, '2022-10-31 10:32:02', '2023-01-12 12:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `description`, `image`, `source`, `view`, `status`, `tags`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 5, 'Winners of the World Illustration Awards 2022 announced', 'winners-of-the-world-illustration-awards-2022-announced', '<p style=\"color:rgb(0,0,0);font-family:ABCDiatype, sans-serif;font-size:20px;\">Last night saw the winners of the World Illustration Awards crowned in a special online event hosted by renowned illustrator Oliver Jeffers and a host of special guest presenters. With over 5,000 entrants from 77 countries, competition was fierce, and the overall winners were selected from a shortlist of 200 projects.</p>\r\n\r\n<p style=\"color:rgb(0,0,0);font-family:ABCDiatype, sans-serif;font-size:20px;\">Split across ten award categories, including Advertising, Editorial, Children\'s Publishing, Design, Product and Packaging, the judges whittled down hopeful candidates from a long list of 500 illustrations to 20 Category Winners, 20 Highly Commended projects, four Cross-Category Award Winners, and two Overall Winners who each receive a cash prize.</p>\r\n\r\n<p style=\"color:rgb(0,0,0);font-family:ABCDiatype, sans-serif;font-size:20px;\">AOI CEO Rachel Hill says: \"As the awards grow year after year, so has the incredible quality of the entries. We have been delighted to receive such a varied mix of themes and influences from around the globe, united in their fearless approach to their craft.</p>', '1667627581.jpg', 'https://www.creativeboom.com/news/winners-of-the-world-illustration-awards-2022-announced/', 33, 1, 'art,illustration,award winning,art', NULL, '', NULL, '2022-11-05 13:05:51', '2023-01-12 12:42:19'),
(3, 4, 'Meta slapped with 5.5 mn euro fine for EU data breach', 'meta-slapped-with-55-mn-euro-fine-for-eu-data-breach', '<p style=\"font-family:Merriweather, Roboto, Arial, Helvetica, monospace;color:rgb(18,18,18);\">Social media giant Meta has been fined an additional 5.5 million euros ($5.9 million) for violating EU data protection regulations with its instant messaging platform WhatsApp, Ireland\'s regulator announced Thursday.</p>\r\n\r\n<p style=\"font-family:Merriweather, Roboto, Arial, Helvetica, monospace;color:rgb(18,18,18);\">The penalty follows a far larger 390-million-euro fine for Meta\'s Instagram and Facebook platforms two weeks ago after they were found to have flouted the same EU rules.</p>\r\n\r\n<p style=\"font-family:Merriweather, Roboto, Arial, Helvetica, monospace;color:rgb(18,18,18);\">In its new decision, the Irish Data Protection Commission (DPC) found the group acted \"in breach of its obligations in relation to transparency,\" the watchdog said in a statement.</p>', '1674196663.jpg', 'https://en.prothomalo.com/corporate/jgb9i0hm3b', 1, 1, 'Meta,blog,software', 'this is blog', '[{\"value\":\"new\"},{\"value\":\"soft\"},{\"value\":\"blog\"},{\"value\":\"bakery\"}]', 'This is blog meta description', '2023-01-20 14:23:49', '2023-01-20 15:16:02'),
(4, 5, 'HOW TO COMBINE YOUR TALENTS FOR GREATER SUCCESS WITH DAVID EPSTEIN', 'how-to-combine-your-talents-for-greater-success-with-david-epstein', '<p style=\"font-family:\'proxima-nova\', \'Open Sans\', sans-serif;color:rgb(79,79,79);\">We’ve all heard it in TED Talks and read it on motivational posters before, but the notion that it takes 10,000 hours to become a master at something may not be entirely true.</p>\r\n\r\n<p style=\"font-family:\'proxima-nova\', \'Open Sans\', sans-serif;color:rgb(79,79,79);\">David points out that the original study responsible for inspiring it had some pretty gaping flaws.</p>\r\n\r\n<p style=\"font-family:\'proxima-nova\', \'Open Sans\', sans-serif;color:rgb(79,79,79);\">Conducted in the early nineties, the research was conducted on 30 violinists who were already pre-screened as world-class talents. The 10 best had each spent an average of 10,000 hours in so-called deliberate practice, meaning effortful and focused training, by age 20.</p>', '1674197976.jpg', 'https://en.prothomalo.com/corporate/jgb9i0hm3b', 0, 1, 'photography,international', 'photography', '[{\"value\":\"blog\"},{\"value\":\"photography\"}]', 'This is photography meta description', '2023-01-20 14:59:37', '2023-01-20 14:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'DIY craft blogs', 'diy-craft-blogs', '2022-11-01 11:13:58', '2022-11-01 11:13:58'),
(2, 'Food blogs', 'food-blogs', '2022-11-01 11:15:36', '2022-11-01 11:15:36'),
(3, 'Travel blogs', 'travel-blogs', '2022-11-01 11:19:52', '2022-11-01 11:19:52'),
(4, 'Lifestyle blogs', 'lifestyle-blogs', '2022-11-01 11:20:40', '2022-11-01 11:20:40'),
(5, 'Photography blogs', 'photography-blogs', '2022-11-01 11:24:02', '2022-11-01 11:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `location`, `phone`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Uttara, Sector 10, Dhaka, Bangladesh', '+8801976814812', 'softwarebakery71@gmail.com', 'https://www.fiverr.com/softwarebakery?up_rollout=true', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `institute`, `year`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Secondary School Certificate', 'Comilla Modern High School', '2012', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></p>', '2022-11-21 11:02:33', '2022-11-21 11:02:33'),
(2, 'Higher Secondary School Certificate', 'Adhyapak Abdul Majid College', '2014-2016', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime hic assumenda vel mollitia similique aspernatur deserunt corrupti explicabo blanditiis delectus.</span><br></p>', '2022-12-20 23:37:47', '2022-12-20 23:37:47'),
(3, 'Bachelor of Computer Science', 'International University', '2016-2020', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime hic assumenda vel mollitia similique aspernatur deserunt corrupti explicabo blanditiis delectus.</span><br></p>', '2022-12-20 23:39:01', '2022-12-20 23:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertises`
--

INSERT INTO `expertises` (`id`, `title`, `slug`, `icon`, `description`, `icon_color`, `created_at`, `updated_at`) VALUES
(2, 'UX Design', 'ux-design', 'fas fa-bug', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">exercitat Repellendus, corrupt.</span><br></p>', '#1E92F8', '2022-12-20 22:27:12', '2023-01-12 12:43:30'),
(3, 'Web Development', 'web-development', 'fas fa-fill-drip', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">voluptate commodi illo voluptatib.</span><br></p>', '#1E92F8', '2022-12-20 22:33:23', '2023-01-12 12:43:38'),
(4, 'Digital Marketing', 'digital-marketing', 'fab fa-amazon-pay', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">voluptate commodi illo voluptatib.</span><br></p>', '#1E92F8', '2022-12-20 22:35:05', '2023-01-12 12:43:45');

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_cookies` tinyint(5) DEFAULT NULL,
  `copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `mail_driver`, `mail_host`, `mail_port`, `mail_encryption`, `mail_user`, `mail_pass`, `from_email`, `from_name`, `fav`, `website_title`, `education`, `skill`, `service`, `portfolio`, `blog`, `contact`, `website_color`, `is_cookies`, `copyright_text`, `meta_title`, `meta_tags`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'smtp.mailtrap.io', '2525', 'TLS', '5e46da662c0115', 'b8f51ca4e227df', 'softwarebakery71@gmail.com', 'SoftwareBakery', '1672637920-png', 'Portfolio', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', 'Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Quisquam, incidunt.', '#1E92F8', 1, 'copyright@Software Bakery', 'Software Bakery', 'portfolio,software,bakery', 'This is meta description', NULL, '2023-01-20 13:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`id`, `title`, `category_id`, `image`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'WEB', 2, '1671944934.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:09:00', '2022-12-25 13:09:00'),
(4, 'Web', 2, '1671945053.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:10:53', '2022-12-25 13:10:53'),
(5, 'WEB', 2, '1671945104.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:11:44', '2022-12-25 13:19:34'),
(6, 'WEB', 2, '1671945144.jpg', '<p><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:12:24', '2022-12-25 13:19:01'),
(7, 'Adevertising', 4, '1671945196.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:13:17', '2022-12-25 13:13:17'),
(8, 'Advertising', 4, '1671945238.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:13:58', '2022-12-25 13:13:58'),
(9, 'Advertisement', 4, '1671945305.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:15:05', '2022-12-25 13:15:05'),
(10, 'Adevertisement', 4, '1671945343.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:15:43', '2022-12-25 13:15:43'),
(11, 'Branding', 5, '1671945659.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:20:59', '2022-12-25 13:20:59'),
(12, 'Branding', 5, '1671945691.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:21:31', '2022-12-25 13:21:31'),
(13, 'Branding', 5, '1671945724.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:22:04', '2022-12-25 13:22:04'),
(14, 'Branding', 5, '1671945767.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:22:47', '2022-12-25 13:22:47'),
(15, 'Branding', 5, '1671945833.jpg', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span><br></p>', 'https://www.fiverr.com/softwarebakery?up_rollout=true', 1, '2022-12-25 13:23:53', '2022-12-25 13:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `gig_categories`
--

CREATE TABLE `gig_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gig_categories`
--

INSERT INTO `gig_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Web', 1, '2022-11-29 22:24:08', '2022-12-25 00:21:30'),
(3, 'New', 1, '2022-12-24 23:31:09', '2022-12-24 23:31:09'),
(4, 'Advertising', 1, '2022-12-24 23:32:56', '2022-12-24 23:32:56'),
(5, 'Branding', 1, '2022-12-24 23:33:22', '2022-12-24 23:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `header_subtitle`, `header_title`, `header_profession`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'Hello, I am', 'John Doe', 'Frond end Designer | Developer', '1671465200-jpg', '2022-12-19 15:38:51', '2022-12-19 23:53:20');

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
(5, '2022_10_31_080756_create_admins_table', 1),
(6, '2022_10_31_110703_create_blog_categories_table', 2),
(7, '2022_11_01_053118_create_blogs_table', 3),
(8, '2022_11_07_044809_create_general_settings_table', 4),
(11, '2022_11_17_042528_create_about_infos_table', 5),
(14, '2022_11_19_031728_create_expertises_table', 6),
(15, '2022_11_20_015834_create_education_table', 7),
(16, '2022_11_21_040754_create_skills_table', 8),
(18, '2022_11_21_050646_create_services_table', 9),
(19, '2022_11_28_132732_create_gig_categories_table', 10),
(20, '2022_11_28_143726_create_gigs_table', 11),
(21, '2022_12_06_150048_create_contacts_table', 12),
(22, '2022_12_19_151847_create_home_banners_table', 13);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'Ullam', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fas fa-anchor', '2022-12-24 22:48:40', '2022-12-24 22:48:40'),
(3, 'Asperiores', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fab fa-codepen', '2022-12-24 22:54:04', '2022-12-24 22:54:04'),
(4, 'Tempora', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fas fa-box', '2022-12-24 22:54:49', '2022-12-24 22:54:49'),
(5, 'Provident', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fas fa-map-marked-alt', '2022-12-24 22:55:31', '2022-12-24 22:55:31'),
(6, 'Consectetur', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fas fa-chart-bar', '2022-12-24 22:56:03', '2022-12-24 22:56:03'),
(7, 'Veritatis', '<p><span style=\"color:rgb(68,68,68);font-family:\'Source Sans Pro\', sans-serif;font-size:14.066px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</span><br></p>', 'fas fa-notes-medical', '2022-12-24 22:56:52', '2022-12-24 22:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`, `type`, `created_at`, `updated_at`) VALUES
(2, 'hTL5 & CSS3', '90', 'skill', '2022-12-21 00:37:18', '2022-12-21 00:37:18'),
(3, 'JavaScript', '80', 'skill', '2022-12-21 00:37:41', '2022-12-21 00:37:41'),
(4, 'php', '80', 'skill', '2022-12-24 22:34:34', '2022-12-24 22:34:34'),
(5, 'SQL', '95', 'skill', '2022-12-24 22:35:10', '2022-12-24 22:35:10'),
(6, 'Laborum', '75', 'skill', '2022-12-24 22:35:43', '2022-12-24 22:35:43'),
(7, 'Tempora', '85', 'skill', '2022-12-24 22:36:11', '2022-12-24 22:36:11'),
(8, 'English', '90', 'language', '2022-12-24 22:36:36', '2022-12-24 22:36:36'),
(9, 'French', '75', 'language', '2022-12-24 22:39:13', '2022-12-24 22:39:13'),
(10, 'Hindi', '95', 'language', '2022-12-24 22:39:30', '2022-12-24 22:39:30'),
(11, 'Bengali', '100', 'language', '2022-12-24 22:40:00', '2022-12-24 22:40:00');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_infos`
--
ALTER TABLE `about_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_categories`
--
ALTER TABLE `gig_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `about_infos`
--
ALTER TABLE `about_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gig_categories`
--
ALTER TABLE `gig_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
