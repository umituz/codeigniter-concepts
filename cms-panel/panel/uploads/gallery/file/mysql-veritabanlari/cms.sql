-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 May 2018, 16:35:48
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `production_istek`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ataturk`
--

CREATE TABLE `ataturk` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` longtext COLLATE utf8_turkish_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ataturk`
--

INSERT INTO `ataturk` (`id`, `title`, `url`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(4, 'Atatürk\'ün Hayatı 2', 'ataturk-un-hayati-2', '<p>Atatürk\'ün Hayatı 2<br></p>', 1, 1, '2018-05-28 15:21:03'),
(5, 'Atatürk\'ün İlkeleri', 'ataturk-un-ilkeleri', '<p>Atatürk\'ün İlkeleri<br></p>', 2, 0, '2018-05-28 15:22:59'),
(6, 'Atatürk\'ün Devrimleri', 'ataturk-un-devrimleri', '<p>Atatürk\'ün Devrimleri<br></p>', 3, 1, '2018-05-28 15:23:11'),
(7, 'Gençliğe Hitabe', 'genclige-hitabe', '<p>Gençliğe Hitabe<br></p>', 0, 1, '2018-05-28 15:23:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `title`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(3, 'qwe', 'karizma.png', 0, 1, '2018-05-31 12:53:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `url`, `title`, `description`, `img_url`, `event_date`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'heyecan-egitimi', 'heyecan eğitimi', '<p>&lt;section class=\"main-container\"&gt;</p><p><br></p><p>&nbsp; &lt;div class=\"container\"&gt;</p><p>&nbsp; &nbsp; &lt;div class=\"row\"&gt;</p><p><br></p><p>&nbsp; &nbsp; &nbsp; &lt;!-- main start --&gt;</p><p>&nbsp; &nbsp; &nbsp; &lt;!-- ================ --&gt;</p><p>&nbsp; &nbsp; &nbsp; &lt;div class=\"main col-12\"&gt;</p><p><br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- page-title start --&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- ================ --&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;h1 class=\"page-title\"&gt;Eğitim Listesi&lt;/h1&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"separator-2\"&gt;&lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- page-title end --&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;p class=\"lead\"&gt;Eğitimlerimizi yaklaşan tarih sırasına göre aşağıdaki listeden görebilirsiniz.&lt;/p&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;?php foreach($courses as $course){ ?&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"image-box style-3-b\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"row\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"col-md-6 col-lg-4 col-xl-3\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"overlay-container\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&lt;img src=\"&lt;?php echo base_url(\"panel/uploads/course/$course-&gt;img_url\"); ?&gt;\" alt=\"&lt;?php echo $course-&gt;title; ?&gt;\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"overlay-to-top\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p class=\"small margin-clear\"&gt;&lt;em&gt;&lt;?php echo $course-&gt;title ?&gt;&lt;/em&gt;&lt;/p&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"col-md-6 col-lg-8 col-xl-9\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"body\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;h3 class=\"title\"&gt;&lt;a href=\"course-item.html\"&gt;&lt;?php echo $course-&gt;title ?&gt;&lt;/a&gt;&lt;/h3&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p class=\"small mb-10\"&gt;&lt;i class=\"icon-calendar\"&gt;&lt;/i&gt; &lt;?php echo get_readable_date($course-&gt;event_date); ?&gt;&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/p&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;div class=\"separator-2\"&gt;&lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;p class=\"mb-10\"&gt;&lt;?php echo character_limiter(strip_tags($course-&gt;description),50); ?&gt;&lt;/p&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;a href=\"&lt;?php echo base_url(\"egitim-detay/$course-&gt;url\"); ?&gt;\" class=\"btn btn-default btn-hvr hvr-shutter-out-horizontal margin-clear\"&gt;Görüntüle&lt;i class=\"fa fa-arrow-right pl-10\"&gt;&lt;/i&gt;&lt;/a&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &lt;?php } ?&gt;</p><p><br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;!-- pagination start</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;nav aria-label=\"Page navigation\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;ul class=\"pagination justify-content-center\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;a class=\"page-link\" href=\"#\" aria-label=\"Previous\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;i aria-hidden=\"true\" class=\"fa fa-angle-left\"&gt;&lt;/i&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;span class=\"sr-only\"&gt;Previous&lt;/span&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/a&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item active\"&gt;&lt;a class=\"page-link\" href=\"#\"&gt;1&lt;/a&gt;&lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;&lt;a class=\"page-link\" href=\"#\"&gt;2&lt;/a&gt;&lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;&lt;a class=\"page-link\" href=\"#\"&gt;3&lt;/a&gt;&lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;&lt;a class=\"page-link\" href=\"#\"&gt;4&lt;/a&gt;&lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;&lt;a class=\"page-link\" href=\"#\"&gt;5&lt;/a&gt;&lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;li class=\"page-item\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;a class=\"page-link\" href=\"#\" aria-label=\"Next\"&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;i aria-hidden=\"true\" class=\"fa fa-angle-right\"&gt;&lt;/i&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;span class=\"sr-only\"&gt;Next&lt;/span&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/a&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/li&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &lt;/ul&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &lt;/nav&gt;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; pagination end --&gt;</p><p><br></p><p>&nbsp; &nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &nbsp; &nbsp; &lt;!-- main end --&gt;</p><p><br></p><p>&nbsp; &nbsp; &lt;/div&gt;</p><p>&nbsp; &lt;/div&gt;</p><p>&lt;/section&gt;</p>', 'sultangazi-1-22-.jpg', '2018-05-27 00:00:00', 0, 1, '2018-05-26 12:14:41'),
(2, 'sogukkanlilik-egitimi', 'sogukkanlılık eğitimi', '<p>sogukkanlılık eğitimi<br></p>', 'kartal-1-219-.jpg', '2018-05-26 00:00:00', 0, 1, '2018-05-26 12:15:23'),
(3, 'testere', 'testere', '<p>testere<br></p>', 'laravel-sertifika.jpg', '2018-05-31 00:00:00', 0, 1, '2018-05-31 12:37:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) NOT NULL,
  `protocol` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `host` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `port` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `from` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `to` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `protocol`, `host`, `port`, `user`, `password`, `from`, `to`, `user_name`, `isActive`, `createdAt`) VALUES
(2, 'smtp', 'ssl://smtp.gmail.com', '465', 'umituz998@gmail.com', 'leader.end98', 'umituz998@gmail.com', 'umituz998@gmail.com', 'umituz başlık', 1, '2018-05-17 19:55:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gallery_type` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `folder_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galleries`
--

INSERT INTO `galleries` (`id`, `url`, `title`, `gallery_type`, `folder_name`, `rank`, `isActive`, `createdAt`) VALUES
(13, 'istek-okul-fotograf-galerisi', 'İstek Okul Fotoğraf Galerisi', 'image', 'istek-okul-fotograf-galerisi', 0, 1, '2018-05-25 12:37:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_files`
--

CREATE TABLE `gallery_files` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/goztepe-2-160-.jpg', 0, 1, '2018-05-25 12:37:50'),
(2, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/kartal-1-219-.jpg', 0, 1, '2018-05-25 12:37:51'),
(3, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/goztepe-3-441-.jpg', 0, 1, '2018-05-25 12:37:51'),
(4, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/kartal-3-212-.jpg', 0, 1, '2018-05-25 12:37:51'),
(5, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/sultangazi-1-22-.jpg', 0, 1, '2018-05-25 12:37:52'),
(6, 13, 'uploads/gallery/image/istek-okul-fotograf-galerisi/sultangazi-1-22-.jpg', 0, 1, '2018-05-25 12:38:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery_videos`
--

CREATE TABLE `gallery_videos` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gallery_videos`
--

INSERT INTO `gallery_videos` (`id`, `gallery_id`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(3, 9, 'https://www.youtube.com/embed/OfbmC1L4V_k', 2, 0, '2018-05-16 14:35:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(50) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `type` int(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `top`, `title`, `type`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(39, 0, 'Anasayfa', 1, '', 0, 1, '0000-00-00 00:00:00'),
(42, 0, 'İletişim', 1, 'iletisim', 4, 1, '0000-00-00 00:00:00'),
(49, 0, 'Kurumsal', 0, 'kurumsal', 1, 1, '2018-05-28 12:50:24'),
(50, 0, 'Kayıt', 0, 'kayit', 3, 1, '2018-05-28 12:50:37'),
(51, 0, 'Kampüsler', 0, 'kampusler', 2, 1, '2018-05-28 12:51:59'),
(52, 49, 'Bizi Tanıyın', 0, 'bizi-taniyin', 0, 1, '2018-05-28 12:56:00'),
(53, 49, 'Basın Odası', 0, 'basin-odasi', 0, 1, '2018-05-28 13:09:31'),
(54, 49, 'Sosyal Sorumluluk', 0, 'sosyal-sorumluluk', 0, 1, '2018-05-28 13:12:31'),
(55, 49, 'Sorularla İstek', 0, 'sorularla-istek', 0, 1, '2018-05-28 13:12:53'),
(56, 49, 'İstek Dergi', 0, 'istek-dergi', 0, 1, '2018-05-28 13:13:15'),
(57, 49, 'Fotoğraf Galerisi', 0, 'fotograf-galerisi', 0, 1, '2018-05-28 13:13:36'),
(58, 49, 'Video Galerisi', 0, 'video-galerisi', 0, 1, '2018-05-28 13:13:44'),
(59, 49, 'İnsan Kaynakları', 0, 'insan-kaynaklari', 0, 1, '2018-05-28 13:27:15'),
(60, 49, 'Destek Hizmetler', 0, 'destek-hizmetler', 0, 1, '2018-05-28 13:27:31'),
(61, 50, 'Kayıt Kabul Şartları', 0, 'kayit-kabul-sartlari', 0, 1, '2018-05-28 13:28:12'),
(62, 50, 'Kayıt Ücretleri', 0, 'kayit-ucretleri', 0, 1, '2018-05-28 13:28:24'),
(63, 50, 'Ön Kayıt Formu', 0, 'on-kayit-formu', 0, 1, '2018-05-28 13:28:34'),
(64, 50, 'İndirimli Kayıtlar', 0, 'indirimli-kayitlar', 0, 1, '2018-05-28 13:28:49'),
(65, 50, 'Burs Felsefemiz', 0, 'burs-felsefemiz', 0, 1, '2018-05-28 13:29:06'),
(66, 50, 'Burs Hakkında', 0, 'burs-hakkinda', 0, 1, '2018-05-28 13:29:14'),
(67, 0, 'Galeri', 0, 'galeri', 0, 1, '2018-05-28 15:39:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `news_type` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `viewCount` int(11) NOT NULL,
  `rank` int(11) DEFAULT '0',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `url`, `title`, `description`, `news_type`, `img_url`, `video_url`, `viewCount`, `rank`, `isActive`, `createdAt`) VALUES
(23, 'deneme-silincek', 'Deneme Silincek', '<p>qwre</p>', 'video', '#', '91J8pLHdDB0', 95, 0, 1, '2018-05-30 11:39:06'),
(24, 'q', 'q', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores mollitia natus, labore doloribus eveniet enim vel assumenda aspernatur, distinctio. Voluptate impedit similique perferendis ipsam ex. Laborum tempore sequi, eaque voluptates.</p>', 'image', 'opencart.png', '#', 26, 0, 1, '2018-05-30 11:39:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` longtext COLLATE utf8_turkish_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `menu_tur` int(1) NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `img_url`, `menu_tur`, `url`, `rank`, `isActive`, `createdAt`) VALUES
(72, 'Bizi Tanıyın', '<p>lorem</p>', '', 0, 'bizi-taniyin', 0, 1, '2018-05-28 23:33:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popups`
--

CREATE TABLE `popups` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `page` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `rank` int(11) DEFAULT '0',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `finishedAt` datetime NOT NULL,
  `client` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `place` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `portfolio_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolios`
--

INSERT INTO `portfolios` (`id`, `url`, `title`, `description`, `rank`, `isActive`, `createdAt`, `finishedAt`, `client`, `category_id`, `place`, `portfolio_url`) VALUES
(3, 'ask-ipek', 'AŞK İPEK', '<p>seviyorumlan</p>', 0, 1, '2018-05-31 12:05:08', '2018-05-31 00:00:00', 'İpek Cemre Cingisiz', 5, 'Gaziantep', 'AŞK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `isActive`, `createdAt`) VALUES
(1, 'Web Tasarımcı', 1, NULL),
(2, 'Grafik Tasarımcı', 1, '2018-05-25 20:04:04'),
(4, 'Güvenlik Kameraları', 1, '2018-05-25 21:22:51'),
(5, 'Sen Benim Sevdamsın', 1, '2018-05-31 12:04:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `rank` int(11) DEFAULT '0',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `url`, `title`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(25, 'umit-uz', 'Ümit UZ', '<p>Ümit UZ<br></p>', 0, 1, '2018-05-31 11:48:00'),
(26, 'mrrobog', 'Mrrobog', '<p>Mrrobog<br></p>', 0, 1, '2018-05-31 11:57:16'),
(27, 'exe', 'exe', '<p>exe</p>', 0, 1, '2018-05-31 13:48:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(75, 10, 'kalem-01.jpeg', 1, 1, 0, '2018-05-14 09:43:37'),
(76, 10, 'kupa-01.jpeg', 0, 0, 1, '2018-05-14 09:46:07'),
(77, 10, 'masa-seti-05.jpeg', 2, 1, 0, '2018-05-14 09:46:20'),
(79, 20, 'indir--1-.jpg', 0, 1, 0, '2018-05-21 16:39:47'),
(80, 20, 'images.jpg', 0, 1, 0, '2018-05-21 16:39:47'),
(81, 20, 'indir--3-.jpg', 0, 1, 0, '2018-05-21 16:39:48'),
(82, 20, 'indir.jpg', 0, 1, 0, '2018-05-21 16:39:48'),
(83, 23, 'indir.jpg', 0, 1, 1, '2018-05-24 15:11:58'),
(84, 23, 'indir--1-.jpg', 0, 1, 0, '2018-05-24 15:12:18'),
(85, 24, 'indir--1-.jpg', 0, 1, 0, '2018-05-24 16:03:21'),
(86, 24, 'images.jpg', 0, 1, 0, '2018-05-24 16:03:21'),
(87, 24, 'indir--3-.jpg', 0, 1, 0, '2018-05-24 16:03:21'),
(88, 24, 'indir.jpg', 0, 1, 1, '2018-05-24 16:03:21'),
(92, 25, '19x25.jpg', 0, 1, 0, '2018-05-31 11:48:40'),
(93, 25, '19x26.jpg', 0, 1, 0, '2018-05-31 11:48:45'),
(94, 25, '20x25.jpg', 0, 1, 0, '2018-05-31 11:48:51'),
(95, 25, '20x26-hesap-makinali-deri-cantali-ajanda-59d225dab9ca3.jpg', 0, 1, 0, '2018-05-31 11:48:56'),
(96, 25, '28x27.jpg', 0, 1, 0, '2018-05-31 11:49:01'),
(97, 25, '35-x-50-cm-105-gr-kuse-afis-51973f177584b.jpg', 0, 1, 0, '2018-05-31 11:49:04'),
(98, 25, '50-x-70-cm-105-gr-kuse-afis-51973f83032f2.jpg', 0, 1, 0, '2018-05-31 11:49:06'),
(99, 25, '70-x-100-cm-105-gr-kuse-afis-51973f92811df.jpg', 0, 1, 0, '2018-05-31 11:49:09'),
(100, 25, '582d4a9de30b8.jpg', 0, 1, 0, '2018-05-31 11:49:11'),
(101, 25, '582d4a698fc26.jpg', 0, 1, 0, '2018-05-31 11:49:13'),
(102, 25, '902-a-sertifika-ve-menu-kabi-50816c41e3fe1.jpg', 0, 1, 0, '2018-05-31 11:49:15'),
(103, 25, '902-b-sertifika-ve-menu-kabi-50816cef3deda.jpg', 0, 1, 0, '2018-05-31 11:49:18'),
(104, 25, '902-c-sertifika-ve-menu-kabi-50816d64de850.jpg', 0, 1, 0, '2018-05-31 11:49:21'),
(105, 25, '902-s-menu-kabi-50817123a3e85.jpg', 0, 1, 0, '2018-05-31 11:49:24'),
(106, 25, '925-sertifika-ve-menu-kabi-508170c2b861f.jpg', 0, 1, 0, '2018-05-31 11:49:26'),
(107, 25, '950-np-lazer-baskili-anahtarlik-tek-taraf-552505fbca9b0.jpg', 0, 1, 0, '2018-05-31 11:49:29'),
(108, 25, '966-a-sertifika-ve-menu-kabi-50816fa18ad69.jpg', 0, 1, 0, '2018-05-31 11:49:32'),
(109, 25, '966-b-sertifika-ve-menu-kabi-50816ffa938c4.jpg', 0, 1, 0, '2018-05-31 11:49:34'),
(110, 25, '966-c-sertifika-ve-menu-kabi-508170523e554.jpg', 0, 1, 0, '2018-05-31 11:49:37'),
(111, 25, '1211-metal-tukenmez-kalem-52619c923d828.jpg', 0, 1, 0, '2018-05-31 11:49:39'),
(112, 25, '1233-metal-tukenmez-kalem-etiket-uygulamali-5261882f641b3.jpg', 0, 1, 0, '2018-05-31 11:49:41'),
(113, 25, '1384-koseli-silgili-naturel-kursun-kalem-54228dce869e6.jpg', 0, 1, 0, '2018-05-31 11:49:43'),
(114, 25, '1824-spiralli-tablali-plastik-tukenmez-kalemi-525950feb1847.jpg', 0, 1, 0, '2018-05-31 11:49:45'),
(115, 25, '1848-spiralli-banko-plastik-tukenmez-kalemi-ve-tutamaci-52593ede5922c.jpg', 0, 1, 0, '2018-05-31 11:49:47'),
(116, 25, '2234-vip-masa-saati-541aaeb956219.jpg', 0, 1, 0, '2018-05-31 11:49:49'),
(117, 25, '2238-vip-masa-saati-541aa9b7d2f2b.jpg', 0, 1, 0, '2018-05-31 11:49:51'),
(118, 25, '5120-erkek-metal-anahtarlik-5273c5c4312b1.jpg', 0, 1, 0, '2018-05-31 11:49:53'),
(119, 25, '5122-bayan-metal-anahtarlik-5273c6230c037.jpg', 0, 1, 0, '2018-05-31 11:49:55'),
(120, 25, '226739-10151193562016190-1611418577-n.jpg', 0, 1, 0, '2018-05-31 11:50:00'),
(121, 25, '1379486-10151685381616190-58284233-n.jpg', 0, 1, 0, '2018-05-31 11:50:04'),
(122, 25, 'a4-ideal-toplanti-sekreter-bloknotu-6344-52726e9533102.jpg', 0, 1, 0, '2018-05-31 11:50:05'),
(123, 25, 'ahsa.jpg', 0, 1, 0, '2018-05-31 11:50:07'),
(124, 25, 'ajanda.jpg', 0, 1, 0, '2018-05-31 11:50:11'),
(125, 25, 'ajanda-seti.jpg', 0, 1, 0, '2018-05-31 11:50:16'),
(126, 25, 'akilli.jpg', 0, 1, 0, '2018-05-31 11:50:18'),
(127, 25, 'anahtarlik.jpg', 0, 1, 0, '2018-05-31 11:50:21'),
(128, 25, 'anahtarlik.jpg', 0, 1, 0, '2018-05-31 11:50:26'),
(129, 25, 'araba-sekilli-kutulu-anahtarlik-an5295-5412f10d87a36.jpg', 0, 1, 0, '2018-05-31 11:50:28'),
(130, 25, 'avci-sapkasi.jpg', 0, 1, 0, '2018-05-31 11:50:31'),
(131, 25, 'bebek-resimli-hasir-takvimi-h-28-5274b89fc8ab7.jpg', 0, 1, 0, '2018-05-31 11:50:33'),
(132, 25, 'bianco-masa-seti-5a0062c42c926.jpg', 0, 1, 0, '2018-05-31 11:50:36'),
(133, 25, 'bluetof-fare.jpg', 0, 1, 0, '2018-05-31 11:50:39'),
(134, 25, 'bodrum-kalesi-manzarali-hasir-takvimi-h-26-5274b81838ca2.jpg', 0, 1, 0, '2018-05-31 11:50:41'),
(135, 25, 'buzdolabi-saati-521626bbbdfac.jpg', 0, 1, 0, '2018-05-31 11:50:44'),
(136, 25, 'canakkale-ay-yildiz-donmeyi-dusunmediler-hasir-takvimi-h-19-5274b59803c6e.jpg', 0, 1, 0, '2018-05-31 11:50:47'),
(137, 25, 'caner-masa-seti-d1106-5062e3fa26d69.jpg', 0, 1, 0, '2018-05-31 11:50:50'),
(138, 25, 'capa-figurlu-masa-seti-ms-1020-5062ecb03068f.jpg', 0, 1, 0, '2018-05-31 11:50:51'),
(139, 25, 'casua.jpg', 0, 1, 0, '2018-05-31 11:50:53'),
(140, 25, 'cirea-.jpg', 0, 1, 0, '2018-05-31 11:50:58'),
(141, 25, 'cricket-sibopsuz-tasli-cakmak-52419510476fc.jpg', 0, 1, 0, '2018-05-31 11:51:00'),
(142, 25, 'd1022-masa-seti-5062f163ce819.jpg', 0, 1, 0, '2018-05-31 11:51:02'),
(143, 25, 'defter.jpg', 0, 1, 0, '2018-05-31 11:51:06'),
(144, 25, 'dik-bloknot-dk-01-5416a66fcc502.jpg', 0, 1, 0, '2018-05-31 11:51:07'),
(145, 25, 'doga-sapkasi.jpg', 0, 1, 0, '2018-05-31 11:51:10'),
(146, 25, 'dolma-kalem.jpg', 0, 1, 0, '2018-05-31 11:51:12'),
(147, 25, 'dunya-kosem-saatli-masa-seti-d1083-5062eff467666.jpg', 0, 1, 0, '2018-05-31 11:51:14'),
(148, 25, 'duvar-saat.jpg', 0, 1, 0, '2018-05-31 11:51:16'),
(149, 25, 'duvar-saati.jpg', 0, 1, 0, '2018-05-31 11:51:21'),
(150, 25, 'ege-masa-seti-5a006702d0d6f.jpg', 0, 1, 0, '2018-05-31 11:51:24'),
(151, 25, 'ekonomik-kucuk-boy-gemici-takvim-59ff4704326cf.jpg', 0, 1, 0, '2018-05-31 11:51:29'),
(152, 25, 'ekvator-masa-seti-4900-5062e4a647d60.jpg', 0, 1, 0, '2018-05-31 11:51:31'),
(153, 25, 'elektro.jpg', 0, 1, 0, '2018-05-31 11:51:34'),
(154, 25, 'elektronik-urunler.jpg', 0, 1, 0, '2018-05-31 11:51:37'),
(155, 25, 'enjoy-masa-seti-4800-5062e45087843.jpg', 0, 1, 0, '2018-05-31 11:51:40'),
(156, 25, 'eskihisar-.jpg', 0, 1, 0, '2018-05-31 11:51:42'),
(157, 25, 'eski-model-araba-figurlu-masa-seti-ms-1030-5062ebb5a4e0e.jpg', 0, 1, 0, '2018-05-31 11:51:44'),
(159, 25, 'firmaniza-ozel-takvimlik-bloknot-ank-01-5421821b394e6.jpg', 0, 1, 0, '2018-05-31 11:51:50'),
(160, 25, 'firmaya-ozel-ucgen-masa-takvimleri-59fe63db35b09.jpg', 0, 1, 0, '2018-05-31 11:51:55'),
(162, 25, 'flas-cep-bloknot-kalemli-5416a817308d0.jpg', 0, 1, 0, '2018-05-31 11:52:02'),
(163, 25, 'fosfortlu-kalem.jpg', 0, 1, 0, '2018-05-31 11:52:04'),
(164, 25, 'gcc-siboplu-manyetolu-cakmak-524195c654127.jpg', 0, 1, 0, '2018-05-31 11:52:06'),
(165, 25, 'hp-sistembilgi.png', 0, 1, 0, '2018-05-31 11:52:10'),
(166, 25, 'kablolu-mouse.jpg', 0, 1, 1, '2018-05-31 11:52:15'),
(167, 25, 'kablosuz-mouse.jpg', 0, 1, 0, '2018-05-31 11:52:17'),
(168, 25, 'kalem.jpg', 0, 1, 0, '2018-05-31 11:52:21'),
(169, 25, 'kamuflaj.jpg', 0, 1, 0, '2018-05-31 11:52:23'),
(170, 25, 'kapakli-bloknot-tmbl-02-15x21-cm-5416a6c528e0a.jpg', 0, 1, 0, '2018-05-31 11:52:26'),
(171, 25, 'kapakli-bloknot-tmbl-03-10x15-cm-5416a6e1d1057.jpg', 0, 1, 0, '2018-05-31 11:52:29'),
(172, 25, 'kapaksiz-alti-karton-bloknot-tmbl-04-10x14-cm-5416a6f63d4f7.jpg', 0, 1, 0, '2018-05-31 11:52:31'),
(173, 25, 'kapaksiz-alti-karton-bloknot-tmbl-06-15x20-cm-5416a71500f7c--1-.jpg', 0, 1, 0, '2018-05-31 11:52:34'),
(174, 25, 'kapaksiz-alti-karton-bloknot-tmbl-06-15x20-cm-5416a71500f7c.jpg', 0, 1, 0, '2018-05-31 11:52:37'),
(175, 25, 'kaptan-masa-seti-6200-5062e30a6b711.jpg', 0, 1, 0, '2018-05-31 11:52:40'),
(176, 25, 'kartal-figurlu-saatli-masa-seti-ms-1040-5062ed8a8d064.jpg', 0, 1, 0, '2018-05-31 11:52:42'),
(177, 25, 'karton-kraft-kutu-canta-kc-07-23x17x9-cm-50a5e55cabf7a.jpg', 0, 1, 0, '2018-05-31 11:52:47'),
(178, 25, 'karton-kraft-kutu-canta-kc-08-25x39x8-cm-50a5e5c346741.jpg', 0, 1, 0, '2018-05-31 11:52:50'),
(179, 25, 'karton-kraft-kutu-canta-kc-09-13x16x6-cm-50a5e6250c0a0.jpg', 0, 1, 0, '2018-05-31 11:52:52'),
(180, 25, 'kartvizitlik-nm-0041-510b8d90cf3f5.jpg', 0, 1, 0, '2018-05-31 11:52:55'),
(181, 25, 'kartvizitlik-nm-0070-510b8fc68e902.jpg', 0, 1, 0, '2018-05-31 11:52:57'),
(182, 25, 'kartvizitlik-nm-0080-56e14c540d64b.jpg', 0, 1, 0, '2018-05-31 11:53:01'),
(183, 25, 'kartvizitlik-nm-0095-57b18a03330a2.jpg', 0, 1, 0, '2018-05-31 11:53:04'),
(184, 25, 'kartvizitlik-nm-0133-510b8f0fb0510.jpg', 0, 1, 0, '2018-05-31 11:53:06'),
(185, 25, 'kartvizitlik-nm-0735-510b8e7a6be9f.jpg', 0, 1, 0, '2018-05-31 11:53:09'),
(186, 25, 'kirtasiye-kategori-bg.png', 0, 1, 0, '2018-05-31 11:53:12'),
(187, 25, 'kizil-otesi-fare.jpg', 0, 1, 0, '2018-05-31 11:53:16'),
(188, 25, 'kl-419-masa-ustu-kulluk-50850d8f06b5b.jpg', 0, 1, 0, '2018-05-31 11:53:19'),
(189, 25, 'kl-9535-masa-ustu-kulluk-5085105a1aa9e.jpg', 0, 1, 0, '2018-05-31 11:53:21'),
(190, 25, 'kl-95195-masa-ustu-mekanizmali-kulluk-508510ef183ad.jpg', 0, 1, 0, '2018-05-31 11:53:24'),
(191, 25, 'klavye.jpg', 0, 1, 0, '2018-05-31 11:53:28'),
(192, 25, 'kms-2205-kristal-masa-saati-50658a941ed38.jpg', 0, 1, 0, '2018-05-31 11:53:30'),
(193, 25, 'kms-2207-kristal-masa-saati-506585253b7a5.jpg', 0, 1, 0, '2018-05-31 11:53:32'),
(194, 25, 'kms-2208-kristal-masa-saati-506589af94c20.jpg', 0, 1, 0, '2018-05-31 11:53:35'),
(195, 25, 'kms-2211-kristal-masa-saati-5a65038f9847b.jpg', 0, 1, 0, '2018-05-31 11:53:37'),
(196, 25, 'kms-2213-kristal-masa-saati-5a65071c954a7.jpg', 0, 1, 0, '2018-05-31 11:53:40'),
(197, 25, 'kms-2216-kristal-masa-saati-5a650e55b613f.jpg', 0, 1, 0, '2018-05-31 11:53:42'),
(198, 25, 'kms-2218-kristal-masa-saati-50658b700143f.jpg', 0, 1, 0, '2018-05-31 11:53:44'),
(199, 25, 'kms-2221-kristal-masa-saati-506588bb2166a.jpg', 0, 1, 0, '2018-05-31 11:53:47'),
(200, 25, 'kms-2226-kristal-masa-saati-5065881e44d76.jpg', 0, 1, 0, '2018-05-31 11:53:49'),
(201, 25, 'kms-2227-kristal-masa-saati-5065892cb9ab5.jpg', 0, 1, 0, '2018-05-31 11:53:53'),
(202, 25, 'kms-2238-kristal-masa-saati-50658bf541df6.jpg', 0, 1, 0, '2018-05-31 11:53:55'),
(203, 25, 'kol.jpg', 0, 1, 0, '2018-05-31 11:53:57'),
(205, 25, 'kol-saat.jpg', 0, 1, 0, '2018-05-31 11:54:02'),
(206, 25, 'kol-saattt.jpg', 0, 1, 0, '2018-05-31 11:54:07'),
(207, 25, 'krampon-figurlu-saatli-masa-seti-ms-1060-5062eeb826873.jpg', 0, 1, 0, '2018-05-31 11:54:10'),
(208, 25, 'kupa.jpg', 0, 1, 0, '2018-05-31 11:54:12'),
(209, 25, 'kup-bloknot-br-02-519c9f4dbc8c7.jpg', 0, 1, 0, '2018-05-31 11:54:29'),
(210, 25, 'kup-bloknot-br-03-519c9f92c32d9.jpg', 0, 1, 0, '2018-05-31 11:54:31'),
(211, 25, 'kutulu-anahtarlik-an0017-5412f052f3519.jpg', 0, 1, 0, '2018-05-31 11:54:34'),
(212, 25, 'kutulu-anahtarlik-an0020-5412f0a4e0956.jpg', 0, 1, 0, '2018-05-31 11:54:36'),
(213, 25, 'kutulu-anahtarlik-an0040-5412f0b7861b9.jpg', 0, 1, 0, '2018-05-31 11:54:38'),
(214, 25, 'kutulu-anahtarlik-an1016-5412f08a95941.jpg', 0, 1, 0, '2018-05-31 11:54:40'),
(215, 25, 'kutulu-anahtarlik-an5018-52502899c81c5.jpg', 0, 1, 0, '2018-05-31 11:54:43'),
(216, 25, 'kutulu-anahtarlik-an5135-52502d0ca89ee.jpg', 0, 1, 0, '2018-05-31 11:54:45'),
(217, 25, 'kutulu-anahtarlik-an5140-5412f0cbc5906.jpg', 0, 1, 0, '2018-05-31 11:54:47'),
(218, 25, 'kutulu-anahtarlik-an5450-52502d41128f0.jpg', 0, 1, 0, '2018-05-31 11:54:49'),
(219, 25, 'laptop-cantasi-300907-508167f2e9d2b.jpg', 0, 1, 0, '2018-05-31 11:54:51'),
(220, 25, 'lazer-baskili-anahtarlik-cy0017-cift-yon-5412ee74e2039.jpg', 0, 1, 0, '2018-05-31 11:54:53'),
(221, 25, 'led-mouse.jpg', 0, 1, 0, '2018-05-31 11:54:55'),
(222, 25, 'manolya-masa-seti-3910-5062e29980274.jpg', 0, 1, 0, '2018-05-31 11:54:59'),
(223, 25, 'manzarali-hazir-ucgen-masa-takvimleri-59fe634a5a7eb.jpg', 0, 1, 0, '2018-05-31 11:55:04'),
(224, 25, 'metalize.jpg', 0, 1, 0, '2018-05-31 11:55:07'),
(225, 25, 'motorsiklet-figurlu-masa-seti-ms-1010-5062ec3c13dc0.jpg', 0, 1, 0, '2018-05-31 11:55:08'),
(226, 25, 'optik-fare.jpg', 0, 1, 0, '2018-05-31 11:55:12'),
(227, 25, 'osmanli-armasi-gumus-yaldiz-duvar-panosu-507fceb30a422.jpg', 0, 1, 0, '2018-05-31 11:55:17'),
(228, 25, 'osmanli-armasi-altin-yaldiz-duvar-panosu-507fce61840a0.jpg', 0, 1, 0, '2018-05-31 11:55:19'),
(229, 26, 'e-41.jpg', 0, 1, 0, '2018-05-31 11:57:39'),
(230, 26, 'e-53.jpg', 0, 1, 0, '2018-05-31 11:57:45'),
(231, 26, 'ezgif-1-efdf7398c3-pdf-1.png', 0, 1, 0, '2018-05-31 11:57:51'),
(232, 26, 'h-5.jpg', 0, 1, 0, '2018-05-31 11:57:57'),
(233, 26, 'h-15.jpg', 0, 1, 0, '2018-05-31 11:58:04'),
(234, 26, 'hc-1.jpg', 0, 1, 0, '2018-05-31 11:58:10'),
(235, 26, 'karizma.png', 0, 1, 0, '2018-05-31 11:58:14'),
(236, 26, 'kr1006.jpg', 0, 1, 0, '2018-05-31 11:58:19'),
(237, 26, 'logo.png', 0, 1, 0, '2018-05-31 11:58:20'),
(238, 26, 'm-3.jpg', 0, 1, 0, '2018-05-31 11:58:25'),
(239, 26, 'm-26--1-.jpg', 0, 1, 0, '2018-05-31 11:58:29'),
(240, 26, 'm-26.jpg', 0, 1, 0, '2018-05-31 11:58:32'),
(241, 26, 'qrsample--1-.png', 0, 1, 0, '2018-05-31 11:58:33'),
(242, 26, 'qrsample--2-.png', 0, 1, 0, '2018-05-31 11:58:35'),
(243, 26, 'qrsample.png', 0, 1, 1, '2018-05-31 11:58:35'),
(244, 26, 'sh-2.jpg', 0, 1, 0, '2018-05-31 11:58:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

CREATE TABLE `references` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `references`
--

INSERT INTO `references` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(2, 'sen-kimsin', 'sen kimsin', '<p>sen kimsin</p>', 'qrsample--1-.png', 0, 1, '2018-05-14 18:21:58'),
(4, 'suslan', 'suslan', '<p>suslan<br></p>', 'm-26.jpg', 1, 1, '2018-05-14 18:38:34'),
(5, 'abdullah', 'abdullah', '<p>abdullah<br></p>', 'tyfun-ecommerce.png', 0, 1, '2018-05-31 12:45:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `img_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(15, 'q', 'q', '<p>q</p>', '902-a-sertifika-ve-menu-kabi-50816c41e3fe1.jpg', 0, 1, '2018-05-31 11:27:09'),
(16, 'ewq', 'ewq', '<p>ewq</p>', 'register.png', 0, 1, '2018-05-31 13:41:33'),
(17, 'dsa', 'dsa', '<p>asd</p>', 'tyfun-ecommerce.png', 0, 1, '2018-05-31 13:42:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `about_us` longtext COLLATE utf8_turkish_ci,
  `mission` longtext COLLATE utf8_turkish_ci,
  `vision` longtext COLLATE utf8_turkish_ci,
  `address` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_1` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax_2` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `slogan`, `about_us`, `mission`, `vision`, `address`, `logo`, `phone_1`, `phone_2`, `fax_1`, `fax_2`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `createdAt`, `updatedAt`) VALUES
(3, 'İstek Dershane', 'Zorluk, gücün kadardır.', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed imperdiet sapien. Nam id feugiat dolor, in convallis mi. Aliquam eu ultricies diam, eget aliquam nunc. Praesent egestas elit nisl, eu aliquet magna dignissim facilisis. Integer vehicula eu odio nec elementum. Suspendisse viverra, ligula quis facilisis ullamcorper, massa sem rhoncus felis, sed fermentum nisi eros vel est. Fusce euismod velit in nisi eleifend posuere. Donec id purus orci. Sed eu accumsan sapien, at varius lacus. Maecenas volutpat sem urna, nec condimentum eros pellentesque et. Maecenas sagittis lobortis dui pharetra cursus.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Praesent eros libero, posuere eleifend lectus at, viverra vehicula lectus. Donec dapibus feugiat ullamcorper. Etiam eget felis vel mauris aliquet aliquam. Sed in mi eget massa ullamcorper fermentum. Ut ut tortor blandit, ornare justo eget, volutpat metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ultrices rutrum arcu, eu tempus ipsum dapibus ut. Phasellus cursus massa non nunc aliquet facilisis. Nullam mollis porttitor pellentesque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet bibendum nunc, sed congue nunc. Nulla nec nibh nisl. Duis porta id massa ac sagittis. Integer sodales, ante non iaculis consectetur, nisl odio gravida tortor, in pretium mauris odio quis turpis. Curabitur vulputate lacus ipsum, in porttitor erat placerat in.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Proin et condimentum massa. Integer rutrum euismod ipsum, vel dignissim metus aliquam vel. Nulla auctor cursus turpis euismod hendrerit. Nullam lectus metus, ultricies cursus dolor vitae, congue molestie mi. Cras finibus congue mi. Nam dolor neque, laoreet sit amet vehicula id, sollicitudin quis ligula. Aliquam a sagittis odio. Vestibulum luctus porta velit, eu bibendum orci ullamcorper eget. Donec fermentum varius pellentesque.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Aliquam molestie odio nec diam tincidunt hendrerit. Donec consectetur est felis, at semper sem congue in. Nam quam dui, feugiat non gravida in, auctor ac nulla. Aenean at magna at arcu congue tempus. Curabitur tempor lobortis augue, a faucibus erat vehicula eget. Praesent bibendum purus quis velit mattis consequat. Sed elit ante, laoreet vel urna id, volutpat iaculis elit. Sed laoreet, lectus a convallis tincidunt, tellus elit posuere eros, a condimentum magna justo eu massa. Integer vitae turpis dictum, tincidunt purus a, feugiat sem. Etiam quis mauris in sapien bibendum sodales. Mauris quis urna quis sapien pellentesque hendrerit. Vivamus lorem quam, aliquet in nunc nec, tincidunt sollicitudin turpis.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Morbi vel congue ipsum. Phasellus molestie nulla odio, a tincidunt orci congue in. Aenean in sem ac ex finibus posuere. Etiam tristique cursus mauris, eu sollicitudin neque ullamcorper non. Aliquam sollicitudin felis a eros bibendum interdum. Aliquam erat volutpat. Fusce at nunc eu sapien blandit placerat sit amet a nisl. Mauris mi orci, consequat quis facilisis ut, fermentum fringilla nunc. Nunc vitae sodales neque. Fusce ut metus eu mi porta placerat a id elit. Fusce quis molestie velit. Curabitur a nisi a ipsum auctor dictum quis ut velit.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Donec porttitor ipsum quam, nec lacinia neque hendrerit varius. Sed finibus luctus libero ac tempor. Ut eget convallis nibh. Fusce sit amet nunc cursus sem rutrum laoreet. Ut sollicitudin sem at mattis ultricies. Sed id porta nisl, gravida viverra nisl. Pellentesque eu euismod lectus. Nullam justo tellus, commodo at pretium eu, molestie sed sapien. Aenean faucibus nisl eget aliquet vulputate. Aliquam auctor sem ut lacus mollis volutpat. Mauris ex dolor, pellentesque vel tellus a, convallis tempus erat. Vestibulum posuere sem ut justo aliquet, a varius ex semper. Nulla maximus facilisis risus, non viverra nisl tristique eget. Integer vulputate orci dolor, eu vestibulum purus ornare vel. Fusce arcu odio, cursus sed molestie sed, ultrices eget erat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif;\">Suspendisse mollis faucibus malesuada. Morbi finibus vulputate orci, vel rutrum est tempus in. Quisque blandit et velit sed bibendum. Donec sodales ante pulvinar, tincidunt eros quis, convallis massa. Ut eget libero ac sem accumsan dapibus lobortis eget eros. Fusce sodales aliquet velit ac vulputate. Quisque et mollis purus, ac auctor ligula. Suspendisse dignissim risus velit, ac fringilla lorem ultricies vitae. Nunc interdum urna eget nisi ultrices iaculis. Nullam gravida pharetra odio ac dapibus. Cras tristique viverra tempor. Donec congue rutrum porttitor. Nullam facilisis ipsum non tincidunt imperdiet. Quisque pellentesque tortor eget eros tempor, vitae congue felis accumsan. Aenean vehicula auctor commodo.</p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. Eğer bir Lorem Ipsum pasajı kullanacaksanız, metin aralarına utandırıcı sözcükler gizlenmediğinden emin olmanız gerekir. İnternet\'teki tüm Lorem Ipsum üreteçleri önceden belirlenmiş metin bloklarını yineler. Bu da, bu üreteci İnternet üzerindeki gerçek Lorem Ipsum üreteci yapar. Bu üreteç, 200\'den fazla Latince sözcük ve onlara ait cümle yapılarını içeren bir sözlük kullanır. Bu nedenle, üretilen Lorem Ipsum metinleri yinelemelerden, mizahtan ve karakteristik olmayan sözcüklerden uzaktır.</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; text-align: justify;\">Yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock, bir Lorem Ipsum pasajında geçen ve anlaşılması en güç sözcüklerden biri olan \'consectetur\' sözcüğünün klasik edebiyattaki örneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, Çiçero tarafından M.Ö. 45 tarihinde kaleme alınan \"de Finibus Bonorum et Malorum\" (İyi ve Kötünün Uç Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı bölümlerinden gelmektedir. Bu kitap, ahlak kuramı üzerine bir tezdir ve Rönesans döneminde çok popüler olmuştur. Lorem Ipsum pasajının ilk satırı olan \"Lorem ipsum dolor sit amet\" 1.10.32 sayılı bölümdeki bir satırdan gelmektedir.</span><br></p>', 'Gaziantep', 'laravel-sertifika.jpg', '05427840151', '05427840151', '05427840151', '05427840151', 'umituz998@gmail.com', 'https://www.facebook.com/umituzzz', 'https://twitter.com/umituzz', 'https://www.instagram.com/umituzzz/', 'https://www.linkedin.com/in/umituzzz/', '2018-05-29 10:07:46', '2018-05-31 13:06:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slides`
--

CREATE TABLE `slides` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `allowButton` tinyint(4) DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `button_caption` varchar(25) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `animation_time` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slides`
--

INSERT INTO `slides` (`id`, `img_url`, `title`, `description`, `allowButton`, `button_url`, `button_caption`, `animation_type`, `animation_time`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'default.jpg', 'İstek Okul Fotoğraf Galerisi Düzenlendi', '<p>Düzenlendi</p>', 0, '', '', NULL, NULL, 1, 1, '2018-05-25 16:12:25'),
(2, 'kartal-3-212-.jpg', 'spider', '<p>spider<br></p>', 1, 'oo', 'öğrenci', NULL, NULL, 0, 1, '2018-05-28 11:09:33'),
(3, 'goztepe-3-441-.jpg', 'titanyum', '<p>t</p>', 0, '', '', NULL, NULL, 0, 1, '2018-05-28 11:16:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `password`, `isActive`, `createdAt`) VALUES
(1, 'kagni', 'Ümit UZ', 'atarabasi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL),
(2, 'umituz', 'Ümit UZ', 'umituz998@gmail.com', '018af9d8c8dbef801bc0238fc980432f', 1, '2018-05-16 17:16:38');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ataturk`
--
ALTER TABLE `ataturk`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_files`
--
ALTER TABLE `gallery_files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gallery_videos`
--
ALTER TABLE `gallery_videos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ataturk`
--
ALTER TABLE `ataturk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_files`
--
ALTER TABLE `gallery_files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `gallery_videos`
--
ALTER TABLE `gallery_videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `popups`
--
ALTER TABLE `popups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- Tablo için AUTO_INCREMENT değeri `references`
--
ALTER TABLE `references`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
