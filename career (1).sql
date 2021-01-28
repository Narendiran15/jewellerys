-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 12, 2020 at 04:40 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin`
--

DROP TABLE IF EXISTS `fc_admin`;
CREATE TABLE IF NOT EXISTS `fc_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `access` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tasker_signup_fee` decimal(20,0) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_admin`
--

INSERT INTO `fc_admin` (`id`, `firstname`, `lastname`, `email`, `access`, `password`, `tasker_signup_fee`, `admin_status`, `permission`) VALUES
(1, 'Admin', 'G', 'admin@gmail.com', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin_settings`
--

DROP TABLE IF EXISTS `fc_admin_settings`;
CREATE TABLE IF NOT EXISTS `fc_admin_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(200) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL,
  `site_logo` varchar(200) NOT NULL,
  `site_logo1` varchar(200) NOT NULL,
  `site_favicon` varchar(200) NOT NULL,
  `fb_app_id` varchar(200) NOT NULL,
  `fb_app_secret` varchar(200) NOT NULL,
  `fb_access_token` text NOT NULL,
  `twitter_app_id` varchar(200) NOT NULL,
  `twitter_name` varchar(200) NOT NULL,
  `home_title1` varchar(500) NOT NULL,
  `home_title2` varchar(500) NOT NULL,
  `copy_right` varchar(500) NOT NULL,
  `gmail_client_id` varchar(200) NOT NULL,
  `gmail_client_secret` varchar(200) NOT NULL,
  `gmail_redirect_url` varchar(500) NOT NULL,
  `gmap_key` varchar(200) NOT NULL,
  `service_fee_percentage` decimal(20,0) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_user` varchar(100) NOT NULL,
  `smtp_pass` varchar(100) NOT NULL,
  `cancellation_percentage` decimal(20,0) NOT NULL,
  `facebook_link` varchar(100) NOT NULL,
  `twitter_link` varchar(100) NOT NULL,
  `linkedin_link` varchar(100) NOT NULL,
  `instagram_link` varchar(100) NOT NULL,
  `google_data_studio_link` text NOT NULL,
  `google_analytics` longtext NOT NULL,
  `pagination_count` int(11) NOT NULL,
  `tasker_automation` int(11) NOT NULL,
  `banner_timings` varchar(20) NOT NULL,
  `twitter_api_key` text NOT NULL,
  `twitter_api_secrete` text NOT NULL,
  `twitter_access_token` text NOT NULL,
  `twitter_access_secrete` text NOT NULL,
  `whatsapp_text` longtext NOT NULL,
  `whatsapp_email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_admin_settings`
--

INSERT INTO `fc_admin_settings` (`id`, `site_name`, `admin_email`, `meta_title`, `meta_description`, `meta_keywords`, `site_logo`, `site_logo1`, `site_favicon`, `fb_app_id`, `fb_app_secret`, `fb_access_token`, `twitter_app_id`, `twitter_name`, `home_title1`, `home_title2`, `copy_right`, `gmail_client_id`, `gmail_client_secret`, `gmail_redirect_url`, `gmap_key`, `service_fee_percentage`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `cancellation_percentage`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `google_data_studio_link`, `google_analytics`, `pagination_count`, `tasker_automation`, `banner_timings`, `twitter_api_key`, `twitter_api_secrete`, `twitter_access_token`, `twitter_access_secrete`, `whatsapp_text`, `whatsapp_email`) VALUES
(1, 'Vellore Aavin Recruitment', 'siva.gmtechindia@gmail.com', 'Vellore Aavin Recruitment', 'Vellore Aavin Recruitment', 'Vellore Aavin Recruitment', 'logo_(1).png', 'company_logo1.jpg', 'company_logo2.jpg', '', '', '', '', '', 'Select and get any service you need with few easy clicks.', '', 'Aavin Vellore © 2020 - All rights reserved.', '750331723449-p8a488bceago3paqueomcgud7rve9f5p.apps.googleusercontent.com', '1L8B71ESYsxnT8bI0HTPWJf1', 'http://localhost/transdir/site/user/google_response/', 'AIzaSyAIWZC4QlnRzGdoAPhzff_8HvwBBhK7l04', '15', '', '', '', '', '5', 'https://www.facebook.com/pictuscode/', 'http://twitter.com', 'https://in.linkedin.com/', 'https://www.instagram.com/', '', '', 10, 0, '5000', '', '', '', '', 'Using your Mobile, Send a text message to +1 720 938 8869  to join the GLSN WhatsApp group.', 'emma@go2lnm.com');

-- --------------------------------------------------------

--
-- Table structure for table `fc_advertising`
--

DROP TABLE IF EXISTS `fc_advertising`;
CREATE TABLE IF NOT EXISTS `fc_advertising` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '',
  `status` enum('hold','pending','active','terminate') NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_advertising`
--

INSERT INTO `fc_advertising` (`id`, `company_id`, `logo`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 2, '95104e5c6067f1d3612d2c973bb6cea2.jpg', 'active', 'pictuscode.com', 1580368977, 1580368977);

-- --------------------------------------------------------

--
-- Table structure for table `fc_application`
--

DROP TABLE IF EXISTS `fc_application`;
CREATE TABLE IF NOT EXISTS `fc_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf16 NOT NULL,
  `fname` varchar(250) CHARACTER SET utf16 NOT NULL,
  `basic_details` text CHARACTER SET utf16 NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(250) CHARACTER SET utf16 NOT NULL,
  `age` int(11) NOT NULL,
  `pob` varchar(250) CHARACTER SET utf16 NOT NULL,
  `gender` varchar(250) CHARACTER SET utf16 NOT NULL,
  `mobile` varchar(250) CHARACTER SET utf16 NOT NULL,
  `email` varchar(500) CHARACTER SET utf16 NOT NULL,
  `aadhar_number` varchar(250) CHARACTER SET utf16 NOT NULL,
  `district` varchar(250) CHARACTER SET utf16 NOT NULL,
  `community` varchar(250) CHARACTER SET utf16 NOT NULL,
  `sub_caste` varchar(250) CHARACTER SET utf16 NOT NULL,
  `religion` varchar(250) CHARACTER SET utf16 NOT NULL,
  `community_certificate` text CHARACTER SET utf16 NOT NULL,
  `employment_office_status` enum('Yes','No') CHARACTER SET utf16 NOT NULL DEFAULT 'No',
  `reg_date` varchar(250) CHARACTER SET utf16 NOT NULL,
  `reg_number` varchar(250) CHARACTER SET utf16 NOT NULL,
  `priorty_status` enum('Yes','No') CHARACTER SET utf16 NOT NULL DEFAULT 'No',
  `priorty_details` text CHARACTER SET utf16 NOT NULL,
  `priority_category` varchar(250) CHARACTER SET utf16 NOT NULL,
  `cer_no` varchar(250) CHARACTER SET utf16 NOT NULL,
  `language` text CHARACTER SET utf16 NOT NULL,
  `permanent_address` text CHARACTER SET utf16 NOT NULL,
  `communication_address` text CHARACTER SET utf16 NOT NULL,
  `sslc_details` text CHARACTER SET utf16 NOT NULL,
  `plustwo_details` text CHARACTER SET utf16 NOT NULL,
  `ug_details` text CHARACTER SET utf16 NOT NULL,
  `pg_details` text CHARACTER SET utf16 NOT NULL,
  `iti_details` text CHARACTER SET utf16 NOT NULL,
  `diploma_details` int(11) NOT NULL,
  `others_details` text CHARACTER SET utf16 NOT NULL,
  `photo_file` text CHARACTER SET utf16 NOT NULL,
  `signature_file` text CHARACTER SET utf16 NOT NULL,
  `payment_ref` int(11) NOT NULL,
  `ipaddress` varchar(250) CHARACTER SET utf16 NOT NULL,
  `created_date` datetime NOT NULL,
  `admin_status` enum('Read','Active','Inactive') CHARACTER SET utf16 NOT NULL,
  `status` enum('Active','Inactive') CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_application`
--

INSERT INTO `fc_application` (`id`, `post_id`, `name`, `fname`, `basic_details`, `dob`, `marital_status`, `age`, `pob`, `gender`, `mobile`, `email`, `aadhar_number`, `district`, `community`, `sub_caste`, `religion`, `community_certificate`, `employment_office_status`, `reg_date`, `reg_number`, `priorty_status`, `priorty_details`, `priority_category`, `cer_no`, `language`, `permanent_address`, `communication_address`, `sslc_details`, `plustwo_details`, `ug_details`, `pg_details`, `iti_details`, `diploma_details`, `others_details`, `photo_file`, `signature_file`, `payment_ref`, `ipaddress`, `created_date`, `admin_status`, `status`) VALUES
(1, 1, 'Sivakumar', 'Munisamy', '{\"initial\":\"Mr.\",\"nationality\":\"India\",\"mother_tongue\":\"tamil\",\"native_state\":\"tamilnadu\",\"alternative_number\":\"9898988988\",\"name\":\"Sivakumar\",\"fname\":\"Munisamy\",\"mname\":\"Mageshwari\",\"marital_status\":\"Married\",\"wife_name\":\"dd\"}', '1992-03-03', 'Married', 28, 'walajapet', 'Male', '9789355048', 'siva.gmtechindia@gmail.com', '1234 5678 9123', '', 'MBC', 'vanniyar', 'Hindu', '{\"community_certificate_number\":\"9889989889\",\"date_of_issue\":\"2020-12-09\",\"issuing_authority\":\"tasildar\"}', 'Yes', '2020-12-10', '123456', 'Yes', '', 'Owners of land acquired by Government', '1123456', '{\"tamil\":{\"name\":\"Tamil\",\"read\":\"Yes\",\"write\":\"Yes\",\"0\":\"Yes\"},\"english\":{\"name\":\"English\",\"read\":\"No\",\"write\":\"Yes\",\"0\":\"Yes\"},\"other\":{\"name\":\"Malayalam\",\"read\":\"No\",\"write\":\"Yes\",\"0\":\"Yes\"}}', '{\"door_no\":\"No:2\\/2 \",\"street\":\"Tank Street, v.c.mottur, walajapet\",\"state\":\"TAMIL NADU\",\"district\":\"ranipet\",\"taluk\":[\"walajapet\",\"walajapet\"]}', '{\"door_no\":\"No:2\\/2 \",\"street\":\"Tank Street, v.c.mottur, walajapet\",\"state\":\"TAMIL NADU\",\"district\":\"ranipet\",\"taluk\":[\"walajapet\",\"walajapet\"]}', '{\"qualification\":\"S.S.L.C\",\"yop\":\"2006\",\"grade\":\"A\",\"total_marks\":\"500\",\"mark_secured\":\"387\",\"percentage\":\"77.40\",\"medium\":\"tamil\",\"ins\":\"govt boys\",\"marksheet\":\"10387\"}', '{\"qualification\":\"+2\",\"yop\":\"2008\",\"grade\":\"a\",\"total_marks\":\"1200\",\"mark_secured\":\"887\",\"percentage\":\"73.92\",\"medium\":\"tamil\",\"ins\":\"govt boys\",\"marksheet\":\"12887\"}', '', '', '{\"qualification\":\"ITI\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}', 0, '{\"other1\":{\"qualification\":\"Others 1\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":null,\"ins\":\"\",\"marksheet\":\"\"},\"other2\":{\"qualification\":\"Other 2\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":null,\"marksheet\":\"\"},\"other3\":{\"qualification\":\"Other 3\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}}', '2f4157ce37b371d20574a1382f466e3c.png', 'bd8ee2b017885ace840aa54172689224.png', 0, '::1', '2020-12-08 15:58:22', 'Read', 'Active'),
(2, 2, 'Nanridran', 'G', '{\"initial\":\"G\",\"nationality\":\"India\",\"mother_tongue\":\"Tmail\",\"native_state\":\"Chefsf\",\"alternative_number\":\"\",\"name\":\"Nanridran\",\"fname\":\"G\",\"mname\":\"Tamil Selvi\",\"marital_status\":\"Unmarried\",\"wife_name\":\"\"}', '1990-10-15', 'Unmarried', 30, 'Vellore', 'Male', '7601863247', 'gmtechind@gmail.com', '1234 5607 8999', 'Vellore', 'MBC', 'Vanniya', 'India', '{\"community_certificate_number\":\"\",\"date_of_issue\":\"\",\"issuing_authority\":\"\"}', 'Yes', '', '', 'Yes', '', '', '', '{\"tamil\":{\"name\":\"Tamil\",\"read\":\"Yes\",\"write\":\"Yes\",\"speak\":\"Yes\"},\"english\":{\"name\":\"English\",\"read\":\"No\",\"write\":\"No\",\"speak\":\"No\"},\"other\":{\"name\":\"\",\"read\":\"No\",\"write\":\"No\",\"speak\":\"No\"}}', '{\"door_no\":\"2\\/2\",\"street\":\"V.C.Mottur , Walajapet\",\"state\":\"TAMIL NADU\",\"district\":\"Vellore\",\"taluk\":[\"Walajapet\",\"Walajapet\"]}', '{\"door_no\":\"2\\/2\",\"street\":\"V.C.Mottur , Walajapet\",\"state\":\"TAMIL NADU\",\"district\":\"Vellore\",\"taluk\":[\"Walajapet\",\"Walajapet\"]}', '{\"qualification\":\"S.S.L.C\",\"yop\":\"Vfsd\",\"grade\":\"kjkj\",\"total_marks\":\"kj\",\"mark_secured\":\"lkjlk\",\"percentage\":\"jl\",\"medium\":\"kjl\",\"ins\":\"kjlk\",\"marksheet\":\"jlk\"}', '{\"qualification\":\"+2\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}', '{\"qualification\":\"UG\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}', '{\"qualification\":\"PG\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}', '{\"qualification\":\"ITI\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}', 0, '{\"other1\":{\"qualification\":\"Others 1\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":null,\"ins\":\"\",\"marksheet\":\"\"},\"other2\":{\"qualification\":\"Other 2\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":null,\"marksheet\":\"\"},\"other3\":{\"qualification\":\"Other 3\",\"yop\":\"\",\"grade\":\"\",\"total_marks\":\"\",\"mark_secured\":\"\",\"percentage\":\"\",\"medium\":\"\",\"ins\":\"\",\"marksheet\":\"\"}}', 'cc18a760a5d74f515949bec6ee80a1d9.png', '9162795fff2fb41f417fd1dc6d79f37c.png', 0, '::1', '2020-12-10 09:11:22', 'Read', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fc_assign_summits`
--

DROP TABLE IF EXISTS `fc_assign_summits`;
CREATE TABLE IF NOT EXISTS `fc_assign_summits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summit_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_assign_summits`
--

INSERT INTO `fc_assign_summits` (`id`, `summit_id`, `company_id`, `created`) VALUES
(1, 1, 2, '2020-02-12 10:55:47'),
(2, 2, 2, '2020-02-12 10:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `fc_banner`
--

DROP TABLE IF EXISTS `fc_banner`;
CREATE TABLE IF NOT EXISTS `fc_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_banner`
--

INSERT INTO `fc_banner` (`id`, `name`, `description`, `banner_image`, `created`) VALUES
(17, 'Welcome', 'Welcome', 'banner.png', '2019-12-12 08:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `fc_cms`
--

DROP TABLE IF EXISTS `fc_cms`;
CREATE TABLE IF NOT EXISTS `fc_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `footer_order` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `footer_menu_status` int(11) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_cms`
--

INSERT INTO `fc_cms` (`id`, `title`, `content`, `footer_order`, `url`, `footer_menu_status`, `status`, `created`) VALUES
(1, 'Terms and conditons', '&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Our advantages We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;color: #993300;&quot;&gt;&lt;strong&gt; We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage .&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage We deliver qulaity,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! &amp;nbsp;&lt;/p&gt;', 'row1', 'terms-and-conditons', 0, 'Active', '2017-05-14 01:29:51'),
(2, 'About', '								our advantage\r\n								We deliver qulaity, relevant services that completly satisfy your need.\r\n								 \r\n								\r\n									\r\n										Save your  time\r\n										Quality  Service\r\n										Everything in  one place\r\n										24/7  Service\r\n										Easy & Secure  Payment\r\n									\r\n								\r\n								\r\n										Get Your Service Now!\r\n								\r\n						', 'row1', 'about', 1, 'Active', '2017-05-14 01:42:43'),
(3, 'Privacy Policy', '&lt;p&gt;our advantage We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now!&lt;/p&gt;', 'row1', 'privacy-policy', 0, 'Active', '2017-05-14 01:43:54'),
(7, 'How it works', 'How it works', 'row1', 'how-it-works', 1, 'Active', '2017-05-14 02:41:27'),
(8, 'FAQ', 'FAQ', 'row1', 'faq', 1, 'Active', '2017-05-14 02:41:48'),
(16, 'join', '&lt;section&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-innerpage-base&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-lg-12 col-xs-12 banner-innerpage&quot;&gt;&lt;img src=&quot;http://development.pictuscode.com/glsn/images/site/fileuploads/IMG_5229.jpg&quot; alt=&quot;GSLN&quot; width=&quot;1910&quot; height=&quot;283&quot; /&gt;\r\n&lt;div class=&quot;container nopadd&quot;&gt;\r\n&lt;div class=&quot;banner-innercaption&quot;&gt;\r\n&lt;h2&gt;GLSN Membership Application:&lt;/h2&gt;\r\n&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-base&quot;&gt;\r\n&lt;div class=&quot;container nopadd&quot;&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-inner&quot;&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-lft&quot;&gt;\r\n&lt;h3 class=&quot;site-head&quot;&gt;GLSN has a simple Annual Membership Fee structure:&lt;br /&gt;&lt;br /&gt;&lt;/h3&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-price&quot;&gt;\r\n&lt;ul class=&quot;list-inline price-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD {$application_fee}&lt;/h5&gt;\r\n&lt;p&gt;per annum per company.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD {$branch}&lt;/h5&gt;\r\n&lt;p&gt;per annum for each additional branch office.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-rgt&quot;&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;br /&gt;&lt;span style=&quot;color: #224680;&quot;&gt;&lt;strong&gt;The Annual Membership Fee INCLUDES a Summit Fee for 1 delegate to attend either the following Spring or Fall Summit.&amp;nbsp;&lt;/strong&gt; &lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=&quot;color: #3ca3de;&quot;&gt;The Membership Fee is INCLUSIVE of related Summit charges (Welcome Party, Summit Hall rental, Buffet Lunches, Social Evening and all related Summit expenses excluding Airfare and Hotel Rooms).&amp;nbsp; The Summit Fee for attending a 2nd Summit and/or bringing additional delegates is USD {$additional_person}/delegate.&amp;nbsp; &lt;/span&gt;&lt;strong&gt;&lt;br /&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-features&quot; style=&quot;text-align: center;&quot;&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;Before starting this Membership Application, be aware that GLSN does NOT accept members:&lt;/p&gt;\r\n&lt;ul class=&quot;list-unstyled&quot;&gt;\r\n&lt;li style=&quot;text-align: left;&quot;&gt;Without a functioning website&lt;/li&gt;\r\n&lt;li style=&quot;text-align: left;&quot;&gt;Under 2-years in existence&lt;/li&gt;\r\n&lt;li style=&quot;text-align: left;&quot;&gt;Using free email services (yahoo.com, gmail.com, etc)&lt;/li&gt;\r\n&lt;li style=&quot;text-align: left;&quot;&gt;Listed by any industry colection agency such as &lt;a href=&quot;http://www.trans-collections.com&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Trans-Collections.com&lt;/a&gt;, FreightDeadbeats.com or FDRS.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;span class=&quot;arrow-icon&quot;&gt;&lt;img style=&quot;display: block; margin-left: auto; margin-right: auto;&quot; src=&quot;http://development.pictuscode.com/glsn/images/site/arrow-icon.png&quot; /&gt;&lt;/span&gt;&lt;a class=&quot;themebtn&quot; href=&quot;http://localhost/aavin/membership_register&quot;&gt;&lt;strong&gt;&lt;span class=&quot;arrow-icon&quot;&gt;&lt;img src=&quot;https://development.pictuscode.com/glsn/images/site/arrow-icon.png&quot; /&gt;&lt;/span&gt;Continue to Membership Application&lt;/strong&gt;&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'join', 1, 'Active', '2019-11-08 18:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `fc_company`
--

DROP TABLE IF EXISTS `fc_company`;
CREATE TABLE IF NOT EXISTS `fc_company` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `trading_name` varchar(255) DEFAULT NULL,
  `slug` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `locations` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('new','rejected','active','pending','terminated','draft','hold') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'draft',
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mobile` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fax` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `corp_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `corp_website` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `linkedin_link` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `facebook_link` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `year_started` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_of_employees` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `licenses` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `software` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tax_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `annual_revenue` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hear_about` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `others` varchar(250) NOT NULL,
  `specify` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `march` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `summits` text NOT NULL,
  `both_summit_fee` decimal(20,2) NOT NULL,
  `featured_member` int(11) NOT NULL,
  `top_listed_member` int(11) NOT NULL,
  `debts` int(11) NOT NULL,
  `olp` int(11) NOT NULL,
  `riege_software` int(11) NOT NULL,
  `cargowise_software` int(11) NOT NULL,
  `networkpay` int(11) NOT NULL,
  `buytasker` int(11) NOT NULL,
  `multi_currency` int(11) NOT NULL,
  `gsan` int(11) NOT NULL,
  `application_fee` decimal(20,2) NOT NULL,
  `featured_member_fee` decimal(20,2) NOT NULL,
  `top_listed_member_fee` decimal(20,2) NOT NULL,
  `additional_person` int(11) NOT NULL,
  `additional_person_fee` decimal(20,2) NOT NULL,
  `branch_fee` decimal(20,2) NOT NULL,
  `debts_fee` decimal(20,2) NOT NULL,
  `reference_info` longtext NOT NULL,
  `reg_date` date NOT NULL DEFAULT '0000-00-00',
  `approved_date` date NOT NULL DEFAULT '0000-00-00',
  `actived_date` date NOT NULL DEFAULT '0000-00-00',
  `terminated_date` date NOT NULL DEFAULT '0000-00-00',
  `is_advertising` tinyint(1) NOT NULL,
  `membership_status` varchar(250) NOT NULL DEFAULT 'Member',
  `questions` longtext NOT NULL,
  `logo` varchar(250) NOT NULL DEFAULT '',
  `reg_step` int(11) NOT NULL,
  `last_login_date` date DEFAULT '0000-00-00',
  `last_login_ip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_company`
--

INSERT INTO `fc_company` (`id`, `name`, `trading_name`, `slug`, `contact_name`, `email`, `password`, `temp_password`, `country_id`, `locations`, `status`, `address1`, `address2`, `city`, `state`, `zip`, `mobile`, `fax`, `corp_email`, `corp_website`, `linkedin_link`, `facebook_link`, `year_started`, `no_of_employees`, `licenses`, `software`, `tax_id`, `annual_revenue`, `hear_about`, `others`, `specify`, `description`, `march`, `october`, `summits`, `both_summit_fee`, `featured_member`, `top_listed_member`, `debts`, `olp`, `riege_software`, `cargowise_software`, `networkpay`, `buytasker`, `multi_currency`, `gsan`, `application_fee`, `featured_member_fee`, `top_listed_member_fee`, `additional_person`, `additional_person_fee`, `branch_fee`, `debts_fee`, `reference_info`, `reg_date`, `approved_date`, `actived_date`, `terminated_date`, `is_advertising`, `membership_status`, `questions`, `logo`, `reg_step`, `last_login_date`, `last_login_ip`, `password_link`, `created_at`, `updated_at`) VALUES
(3, 'aaaa', 'aaaa', 'aaaa', 'aaaa', 'aaaa@aol.com', '8f60c8102d29fcd525162d02eed4566b', 'ssss', 2, '4', 'pending', 'sss', '', 'sss', '', '', '+355 ss', '', 'ssss@aol.com', 'www.aol.com', '', '', '1985', '12', '', '', '', '12', '2', '', '', 'vfvdfvfvdfvd', 0, 0, '1', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1250.00', '0.00', '0.00', 1, '700.00', '250.00', '0.00', '{\"ref1\":{\"company_name\":\"eeee\",\"company_title\":\"eee\",\"email\":\"aaa@aol.com\"},\"ref2\":{\"company_name\":\"eee\",\"company_title\":\"eee\",\"email\":\"aaa@aol.com\"},\"ref3\":{\"company_name\":\"eee\",\"company_title\":\"eee\",\"email\":\"aaa@aol.com\"},\"ref4\":{\"company_name\":\"eee\",\"company_title\":\"eeee\",\"email\":\"aaa@aol.com\"},\"ref5\":{\"company_name\":\"eee\",\"company_title\":\"eeeee\",\"email\":\"aaa@aol.com\"}}', '0000-00-00', '2020-02-24', '0000-00-00', '0000-00-00', 0, 'Member', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\"}', '4276883b91f599639ac0c569e24f6845.jpg', 4, '2020-02-24', '98.211.179.171', '', '2020-02-24 05:00:00', '2020-02-24 05:00:00'),
(2, 'sivapicky123', 'sivapicky123', 'sivapicky123', 'sivapicky123', 'siva.pictuscode@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 87, '708,709', 'active', 'sivapicky123', 'sivapicky123', 'sivapicky123', '', '', '+91 544544545', '', 'siva@pictuscode.com', 'pictuscode.com', '', '', '1992', '250', '', '', '', '2500', '2', '', '', 'sivapicky123sivapicky123sivapicky123sivapicky123sivapicky123sivapicky123', 0, 0, '1,2', '750.00', 1, 1, 2, 0, 0, 0, 0, 0, 0, 0, '1250.00', '250.00', '250.00', 1, '700.00', '250.00', '300.00', '{\"ref1\":{\"company_name\":\"sivaaa\",\"company_title\":\"sivaa\",\"email\":\"siva.pictuscode@gmail.com\"},\"ref2\":{\"company_name\":\"siva.pictuscode@gmail.com\",\"company_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\"},\"ref3\":{\"company_name\":\"siva.pictuscode@gmail.com\",\"company_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\"},\"ref4\":{\"company_name\":\"siva.pictuscode@gmail.com\",\"company_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\"},\"ref5\":{\"company_name\":\"siva.pictuscode@gmail.com\",\"company_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\"}}', '0000-00-00', '2020-02-12', '2020-02-12', '0000-00-00', 0, 'Member', '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\"}', '95104e5c6067f1d3612d2c973bb6cea2.jpg', 4, '2020-01-30', '112.133.236.123', '', '2020-01-30 05:00:00', '2020-02-12 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_contactus`
--

DROP TABLE IF EXISTS `fc_contactus`;
CREATE TABLE IF NOT EXISTS `fc_contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `body` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fc_contact_enquiry`
--

DROP TABLE IF EXISTS `fc_contact_enquiry`;
CREATE TABLE IF NOT EXISTS `fc_contact_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `job_title` varchar(150) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `messages` text NOT NULL,
  `member_email` varchar(150) NOT NULL,
  `member_name` varchar(150) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fc_country`
--

DROP TABLE IF EXISTS `fc_country`;
CREATE TABLE IF NOT EXISTS `fc_country` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `calling_code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_country`
--

INSERT INTO `fc_country` (`id`, `name`, `slug`, `calling_code`) VALUES
(1, 'Afghanistan', 'afghanistan', '93'),
(2, 'Albania', 'albania', '355'),
(3, 'Algeria', 'algeria', '213'),
(4, 'American Samoa', 'american-samoa', '1684'),
(5, 'Andorra', 'andorra', '376'),
(6, 'Angola', 'angola', '244'),
(7, 'Anguilla', 'anguilla', '1264'),
(8, 'Antigua & Barbuda', 'antigua-barbuda', '1268'),
(9, 'Argentina', 'argentina', '54'),
(10, 'Armenia', 'armenia', '374'),
(11, 'Aruba', 'aruba', '297'),
(12, 'Australia', 'australia', '61'),
(13, 'Austria', 'austria', '43'),
(14, 'Azerbaijan', 'azerbaijan', '994'),
(15, 'Bahamas', 'bahamas', '1242'),
(16, 'Bahrain', 'bahrain', '973'),
(17, 'Bangladesh', 'bangladesh', '880'),
(18, 'Barbados', 'barbados', '1246'),
(19, 'Belarus', 'belarus', '375'),
(20, 'Belgium', 'belgium', '32'),
(21, 'Belize', 'belize', '501'),
(22, 'Benin', 'benin', '229'),
(23, 'Bermuda', 'bermuda', '1441'),
(24, 'Bhutan', 'bhutan', '975'),
(25, 'Bolivia', 'bolivia', '591'),
(26, 'Bosnia & Herzegovina', 'bosnia-herzegovina', '387'),
(27, 'Botswana', 'botswana', '267'),
(28, 'Brazil', 'brazil', '55'),
(29, 'Brunei Darussalam', 'brunei-darussalam', '673'),
(30, 'Bulgaria', 'bulgaria', '359'),
(31, 'Burkina Faso', 'burkina-faso', '226'),
(32, 'Burundi', 'burundi', '257'),
(33, 'Cambodia', 'cambodia', '855'),
(34, 'Cameroon', 'cameroon', '237'),
(35, 'Canada', 'canada', '1'),
(36, 'Cayman Islands', 'cayman-islands', '1345'),
(37, 'Central African Republic', 'central-african-republic', '236'),
(38, 'Chad', 'chad', '235'),
(39, 'Chile', 'chile', '56'),
(40, 'China', 'china', '86'),
(41, 'Colombia', 'colombia', '57'),
(42, 'Comoros', 'comoros', '269'),
(43, 'Congo-Brazzaville', 'congo-brazzaville', '242'),
(44, 'Costa Rica', 'costa-rica', '506'),
(45, 'Cote DIvoire', 'cote-divoire', '225'),
(46, 'Croatia', 'croatia', '385'),
(47, 'Cuba', 'cuba', '53'),
(48, 'Cyprus', 'cyprus', '357'),
(49, 'Czech Republic', 'czech-republic', '420'),
(50, 'Denmark', 'denmark', '45'),
(51, 'Djibouti', 'djibouti', '253'),
(52, 'Dominica', 'dominica', '1767'),
(53, 'Dominican Republic', 'dominican-republic', '1809'),
(54, 'Timor-Leste', 'east-timor', '670'),
(55, 'Ecuador', 'ecuador', '593'),
(56, 'Egypt', 'egypt', '20'),
(57, 'El Salvador', 'el-salvador', '503'),
(58, 'Equatorial Guinea', 'equatorial-guinea', '240'),
(59, 'Eritrea', 'eritrea', '291'),
(60, 'Estonia', 'estonia', '372'),
(61, 'Ethiopia', 'ethiopia', '251'),
(62, 'Falkland Islands', 'falkland-islands', '500'),
(63, 'Fiji', 'fiji', '679'),
(64, 'Finland', 'finland', '358'),
(65, 'France', 'france', '33'),
(66, 'French Guiana', 'french-guiana', '594'),
(67, 'Gabon', 'gabon', '241'),
(68, 'Gambia', 'gambia', '220'),
(69, 'Georgia', 'georgia', '995'),
(70, 'Germany', 'germany', '49'),
(71, 'Ghana', 'ghana', '233'),
(72, 'Gibraltar', 'gibraltar', '350'),
(73, 'Greece', 'greece', '30'),
(74, 'Greenland', 'greenland', '299'),
(75, 'Grenada', 'grenada', '1473'),
(76, 'Guadeloupe', 'guadeloupe', '590'),
(77, 'Guam', 'guam', '1671'),
(78, 'Guatemala', 'guatemala', '502'),
(79, 'Guinea', 'guinea', '224'),
(80, 'Guinea-Bissau', 'guinea-bissau', '245'),
(81, 'Guyana', 'guyana', '592'),
(82, 'Haiti', 'haiti', '509'),
(83, 'Honduras', 'honduras', '504'),
(84, 'Hong Kong', 'hong-kong', '852'),
(85, 'Hungary', 'hungary', '36'),
(86, 'Iceland', 'iceland', '354'),
(87, 'India', 'india', '91'),
(88, 'Indonesia', 'indonesia', '62'),
(89, 'Iran', 'iran', '98'),
(90, 'Iraq', 'iraq', '964'),
(91, 'Ireland', 'ireland', '353'),
(92, 'Israel', 'israel', '972'),
(93, 'Italy', 'italy', '39'),
(94, 'Jamaica', 'jamaica', '1876'),
(95, 'Japan', 'japan', '81'),
(96, 'Jordan', 'jordan', '962'),
(97, 'Kazakhstan', 'kazakhstan', '7'),
(98, 'Kenya', 'kenya', '254'),
(99, 'Korea, Dem. People\'s Rep', 'korea-dem-peoples-rep', '850'),
(100, 'South Korea', 'south-korea', '82'),
(101, 'Kuwait', 'kuwait', '965'),
(102, 'Kyrgyzstan', 'kyrgyzstan', '996'),
(103, 'Lao, People\'s Dem. Rep', 'lao-peoples-dem-rep', '856'),
(104, 'Latvia', 'latvia', '371'),
(105, 'Lebanon', 'lebanon', '961'),
(106, 'Lesotho', 'lesotho', '266'),
(107, 'Liberia', 'liberia', '231'),
(108, 'Libya', 'libya', '218'),
(109, 'Liechtenstein', 'liechtenstein', '423'),
(110, 'Lithuania', 'lithuania', '370'),
(111, 'Luxembourg', 'luxembourg', '352'),
(112, 'Macau', 'macau', '853'),
(113, 'Macedonia', 'macedonia-yugoslav', '389'),
(114, 'Madagascar', 'madagascar', '261'),
(115, 'Malawi', 'malawi', '265'),
(116, 'Malaysia', 'malaysia', '60'),
(117, 'Maldives', 'maldives', '960'),
(118, 'Mali', 'mali', '223'),
(119, 'Malta', 'malta', '356'),
(120, 'Martinique', 'martinique', '596'),
(121, 'Mauritania', 'mauritania', '222'),
(122, 'Mauritius', 'mauritius', '230'),
(123, 'Mexico', 'mexico', '52'),
(124, 'Moldova, Republic of,', 'moldova-republic-of', '373'),
(125, 'Monaco', 'monaco', '377'),
(126, 'Mongolia', 'mongolia', '976'),
(127, 'Montserrat', 'montserrat', '1664'),
(128, 'Morocco', 'morocco', '212'),
(129, 'Mozambique', 'mozambique', '258'),
(130, 'Myanmar', 'myanmar', '95'),
(131, 'Namibia', 'namibia', '264'),
(132, 'Nepal', 'nepal', '977'),
(133, 'Netherlands Antilles', 'netherlands-antilles', '599'),
(134, 'Netherlands', 'netherlands', '31'),
(135, 'New Zealand', 'new-zealand', '64'),
(136, 'Nicaragua', 'nicaragua', '505'),
(137, 'Niger', 'niger', '227'),
(138, 'Nigeria', 'nigeria', '234'),
(139, 'Norway', 'norway', '47'),
(140, 'Oman', 'oman', '968'),
(141, 'Pacific Islands', 'pacific-islands', '81'),
(142, 'Pakistan', 'pakistan', '92'),
(143, 'Palestinian Territory', 'palestine', '970'),
(144, 'Panama', 'panama', '507'),
(145, 'Papua New Guinea', 'papua-new-guinea', '675'),
(146, 'Paraguay', 'paraguay', '595'),
(147, 'Peru', 'peru', '51'),
(148, 'Philippines', 'philippines', '63'),
(149, 'Poland', 'poland', '48'),
(150, 'Portugal', 'portugal', '351'),
(151, 'Puerto Rico', 'puerto-rico', '1787'),
(152, 'Qatar', 'qatar', '974'),
(153, 'Romania', 'romania', '40'),
(154, 'Russian Federation', 'russian-federation', '70'),
(155, 'Rwanda', 'rwanda', '250'),
(156, 'Samoa', 'samoa', '684'),
(157, 'San Marino', 'san-marino', '378'),
(158, 'Sao Tome and Principe', 'sao-tome-and-principe', '239'),
(159, 'Saudi Arabia', 'saudi-arabia', '966'),
(160, 'Senegal', 'senegal', '221'),
(161, 'Seychelles', 'seychelles', '248'),
(162, 'Sierra Leone', 'sierra-leone', '232'),
(163, 'Singapore', 'singapore', '65'),
(164, 'Slovakia', 'slovakia', '421'),
(165, 'Slovenia', 'slovenia', '386'),
(166, 'Somalia', 'somalia', '252'),
(167, 'South Africa', 'south-africa', '27'),
(168, 'Spain', 'spain', '34'),
(169, 'Sri Lanka', 'sri-lanka', '94'),
(170, 'St Kitts & Nevis', 'st-kitts-nevis', '1869'),
(171, 'St Lucia', 'st-lucia', '1758'),
(172, 'St Pierre & Miquelon', 'st-pierre-miquelon', '508'),
(173, 'St Vincent & the Grenadines', 'st-vincent-the-grenadines', '1784'),
(174, 'Sudan', 'sudan', '249'),
(175, 'Suriname', 'suriname', '597'),
(176, 'Swaziland', 'swaziland', '268'),
(177, 'Sweden', 'sweden', '46'),
(178, 'Switzerland', 'switzerland', '41'),
(179, 'Syrian Arab Republic', 'syrian-arab-republic', '963'),
(180, 'Taiwan', 'taiwan', '886'),
(181, 'Tajikistan', 'tajikistan', '992'),
(182, 'Tanzania', 'tanzania', '255'),
(183, 'Thailand', 'thailand', '66'),
(184, 'Togo', 'togo', '228'),
(185, 'Tonga', 'tonga', '676'),
(186, 'Trinidad and Tobago', 'trinidad-and-tobago', '1868'),
(187, 'Tunisia', 'tunisia', '216'),
(188, 'Turkey', 'turkey', '90'),
(189, 'Turkmenistan', 'turkmenistan', '7370'),
(190, 'Turks & Caicos Is', 'turks-caicos-is', '1649'),
(191, 'Uganda', 'uganda', '256'),
(192, 'Ukraine', 'ukraine', '380'),
(193, 'United Arab Emirates', 'united-arab-emirates', '971'),
(194, 'United Kingdom', 'united-kingdom', '44'),
(195, 'Uruguay', 'uruguay', '598'),
(247, 'Uzbekistan', 'uzbekistan', '998'),
(248, 'Venezuela', 'venezuela', '58'),
(249, 'Vietnam', 'vietnam', '84'),
(250, 'Virgin Isles (British)', 'virgin-isles-british', '1284'),
(251, 'Virgin Isles (US)', 'virgin-isles-us', '1340'),
(252, 'Yemen', 'yemen', '967'),
(253, 'Yugoslavia', 'yugoslavia', '38'),
(254, 'Zaire', 'zaire', '243'),
(255, 'Zambia', 'zambia', '260'),
(256, 'Zimbabwe', 'zimbabwe', '263'),
(257, 'Serbia', 'serbia', '381'),
(260, 'Kosovo', '', '383'),
(261, 'North Macedonia', '', '389'),
(262, 'Vanuatu', '', '678 '),
(263, 'Northern Mariana Islands', '', '1670'),
(264, 'Cocos (Keeling) Islands', '', '61 891'),
(265, 'DR Congo', '', '243'),
(266, 'Cook Islands', '', '682'),
(267, 'Marshall Islands', '', '692'),
(268, 'Cape Verde', '', '238'),
(269, 'Solomon Islands', '', '677'),
(270, 'St. Helena Island', '', '290'),
(271, 'Western Sahara', '', '212'),
(272, 'Micronesia', '', '691'),
(273, 'New Caledonia', '', '687'),
(274, 'South Georgia', '', '500'),
(275, 'Kiribati', '', '686'),
(276, 'French Polynesia', '', '689'),
(277, 'Nauru', '', '674'),
(278, 'Reunion Island', '', '262'),
(279, 'Tuvalu', '', '688'),
(280, 'Montenegro', '', '382'),
(281, 'South Sudan', '', '211'),
(282, 'Wallis and Futuna', '', '681'),
(284, 'USA', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fc_cron_tab`
--

DROP TABLE IF EXISTS `fc_cron_tab`;
CREATE TABLE IF NOT EXISTS `fc_cron_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_cron_tab`
--

INSERT INTO `fc_cron_tab` (`id`, `company_id`, `status`, `created`) VALUES
(2, 3, 0, '2020-02-24 17:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `fc_email`
--

DROP TABLE IF EXISTS `fc_email`;
CREATE TABLE IF NOT EXISTS `fc_email` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `title` varchar(5000) NOT NULL,
  `email_desc` longtext NOT NULL,
  `dateAdded` datetime NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `bcc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_email`
--

INSERT INTO `fc_email` (`id`, `title`, `email_desc`, `dateAdded`, `subject`, `bcc`) VALUES
(3, 'Registration User', '<p style=\"text-align: justify;\"><strong>Thank you for your GLSN Membership Application that has been well received. </strong><br /><br /><strong>GLSN&nbsp; </strong>will review your Application and revert back to you with any questions.&nbsp; <strong>GLSN </strong>follows strict procedures in reviewing all applications in accordance with our documented internal procedures.&nbsp; The normal application review process takes anywhere from 24 hours to 5 work-days depending on the response from your references and whether you were referred by an existing <strong>GLSN </strong>Member.</p>\r\n<p style=\"text-align: justify;\">After your Membership Application has been accepted and the Membership Invoice generated has been paid, <strong>GLSN </strong>will grant you full access!</p>\r\n<p>Again, thank you for your application and we look forward to having you in the <strong>GLSN </strong>Family!<br /><br />Sincerely,<br /><strong>Global Logistics Summit Network (GLSN )</strong><br />e)&nbsp; <a href=\"mailto:Info@4GLSN.com\">Info@4GLSN.com</a> - w) <a href=\"http://www.4GLSN.com\">www.4GLSN.com</a> <br />&nbsp;<img style=\"margin-bottom: 0px; margin-top: 0px;\" src=\"{$logo}\" alt=\"GLSN\" width=\"225\" height=\"69\" /></p>', '0000-00-00 00:00:00', 'GLSN:  Membership Application', 'info@4GLSN.com'),
(8, 'News request to admin', '<p><span style=\"font-size: 10pt;\">&nbsp; </span><span style=\"font-size: 10pt;\">The details are as follows:<br /></span></p>\r\n<table style=\"height: 95px; width: 86.083%; border-collapse: collapse;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">From:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">{$author}</td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">News Title:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">{$title}</td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">Company:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">{$company_name}</td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">Post Date:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">{$post_date}&nbsp; &nbsp;&nbsp;</td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">Post Type:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">{$post_type}</td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">Author Email:</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\"><a href=\"mailto:&nbsp;{$author_email}\">&nbsp;{$author_email}</a></td>\r\n</tr>\r\n<tr style=\"border-style: none;\">\r\n<td style=\"width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;\">&nbsp;</td>\r\n<td style=\"width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '0000-00-00 00:00:00', 'News request from {$company_name} company', ''),
(9, 'Referral page Admin Resonse', '<p>Dear {$prospect_name}:<br /><br />We are proud to advise you that {$member_company} is one of the quality members of <strong>Global Logistics Summit Network (GLSN)</strong> - www.glsn.com.<br /><br />{$member_name} has suggested that we contact you direct as there would be mutual benefit for {$company_prospect } to also join our growing network exclusively dedicated to Ship Agencies.<br /><br />The advantages and benefits of joining \"Global Logistics Summit Network\" are many and include:</p>\r\n<ul style=\"list-style-type: square;\">\r\n<li>Exposure to those maritime companies seeking to use your services</li>\r\n<li>Access to a network of your peers with whom you can collaborate, share ideas and resources</li>\r\n<li>Ability to display the GLSN \"Seal of Approval\" logo on your literature and publications</li>\r\n<li>Participation on regional and international multi-port RFQs coordinated by GLSN corporately</li>\r\n<li>Ability to promote other non-Ship Agency maritime and logistics services offered</li>\r\n<li>Having GLSN (or a subsidized Member) represent your interests at major exhibitions and conferences</li>\r\n<li>Potential of new business via our Port &amp; Agency Estimate Request</li>\r\n<li>Reasonable Annual Membership Fees with no up-front application charges</li>\r\n<li>Aggressive Referral Program for recommending new members</li>\r\n<li>The option to participate in Sales Offices in major maritime hubs</li>\r\n<li>Guaranteed no lifetime increase in membership fees</li>\r\n<li>The option to participate in a GLSN member-wide referral program</li>\r\n<li>Use GLSN\'s escrow and international money remittance services (under development)</li>\r\n<li>Attending the Annual Conference (under development)</li>\r\n</ul>\r\n<p>For additional information, please visit our website - www.go2GLSN.com&nbsp; - and our fully automated on-line membership application can be found at http://www.go2gsan.net/demo/registration.<br /><br />We thank {$member_name} of {$member_company} for the kind introduction to your company.<br /><br />We are available to answer any questions that you may have having visited our website.<br /><br />Sincerely<br />Andrew Titley<br />Founder &amp; CEO<br />Global Logistics Summit Network</p>', '0000-00-00 00:00:00', 'Recommendation to join GLSN by member_company', ''),
(10, 'Referral Request to admin', '<p>New Referral Request from member :&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 399px;\">Prospect Company Name</td>\r\n<td style=\"width: 70px;\">:</td>\r\n<td style=\"width: 445px;\">{$company_prospect}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 399px;\">Prospect Contact Name</td>\r\n<td style=\"width: 70px;\">:</td>\r\n<td style=\"width: 445px;\">{$prospect_name}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 399px;\">Prospect Email</td>\r\n<td style=\"width: 70px;\">:</td>\r\n<td style=\"width: 445px;\">{$prospect_email}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 399px;\">Member Name</td>\r\n<td style=\"width: 70px;\">:</td>\r\n<td style=\"width: 445px;\">{$member_name}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 399px;\">Member Company Name</td>\r\n<td style=\"width: 70px;\">:</td>\r\n<td style=\"width: 445px;\">{$member_company}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>GLSN System</p>', '0000-00-00 00:00:00', 'Referral Request from GLSN', ''),
(11, 'Member Contact', '<p style=\"text-align: justify;\">Dear {$member_name},<br /><br />The following message has been sent to you via the GLSN Member Contact Form. The details are as follows:<br /><br />From:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {$name} &lt;{$email}&gt;<br />Email: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;{$email}<br />Subject:&nbsp; &nbsp; &nbsp; {$subject_msg}<br />Phone:&nbsp; &nbsp; &nbsp; &nbsp; {$phone}<br />Message:&nbsp; &nbsp;{$messages}<br /><br />------------<br />This is an automated email generated from the Contact Form in the Global Logistics Summit Network (GLSN ) website - www.glsn.com.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Please reply directly to the sender using the email address above.</p>', '0000-00-00 00:00:00', 'GLSN Message via the GLSN website', ''),
(4, 'Registration Admin', '<p><span id=\"__mce\" style=\"font-size: medium;\">A new Membership Application has been received!</span></p>\r\n<p>&nbsp;</p>\r\n<table border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Company Name:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$company_name}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Company Trading Name:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$trading_name}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Contact Name:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$contact_name}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Contact Emails:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$contact_email}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">City/Country:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$city_country}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Branches covered by Application:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$branches}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">How hear of GLSN Response:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$hear_about}</span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 438px;\"><span style=\"font-size: medium;\">Member Page:</span></td>\r\n<td style=\"width: 476px;\"><span style=\"font-size: medium;\">{$url}</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '0000-00-00 00:00:00', 'GLSN Membership Application', ''),
(12, 'Reference Request Response', '<div style=\"text-align: justify;\"><br />Reference Response from {$reference_email} for {$company_name}<br /><br /><em>This is not a solicitation; it is a legitimate request for information from a mutually known party. <br /><br /></em></div>\r\n<div style=\"text-align: justify;\">We are the \"Global Logistics Summit Network\" (GLSN).&nbsp; Our website can be found at: <a href=\"http://www.glsn.com\">www.glsn.com</a>.&nbsp; <br /><br /></div>\r\n<div style=\"text-align: justify;\">&nbsp;</div>\r\n<form action=\"{$url}\" method=\"post\">\r\n<table border=\"1\" width=\"100%\" cellspacing=\"2\" cellpadding=\"2\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">Question #1</td>\r\n<td valign=\"top\">How many years have you done business with this company:</td>\r\n<td valign=\"top\">&nbsp; {$q1} Years</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Question #2</td>\r\n<td valign=\"top\">Are they timely with their communications?</td>\r\n<td valign=\"top\">{$q2}</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Question #3</td>\r\n<td valign=\"top\">Do they perform with honesty, integrity and impartiality?</td>\r\n<td valign=\"top\">{$q3}</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Question #4</td>\r\n<td valign=\"top\">Are they competent and perform services in a conscientious, diligent and efficient manner?</td>\r\n<td valign=\"top\">{$q4}</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Question #5</td>\r\n<td valign=\"top\">Do you have any reservations in recommending this company as a GLSN Member?</td>\r\n<td valign=\"top\">{$q5}</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Notes:</td>\r\n<td valign=\"top\">{$notes}</td>\r\n<td valign=\"top\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form><br />GLSN thanks you in advance for your kind response and be assured that if we can assist you in any way, please contact us. <br /><br />Sincerely,<br />The GLSN Management Team<br />e)&nbsp; <a href=\"mailto:Admin@glsn.com\">Admin@glsn.com</a> w) <a href=\"http://www.glsn.com\">www.glsn.com</a><br /><img src=\"{$logo}\" alt=\"\" width=\"250\" height=\"66\" />', '2019-11-13 00:00:00', 'Reference Request Response  from {$reference_email} for {$company_name}', ''),
(13, 'Invoice Template', '<div style=\"padding: 30px 20px;\" align=\"center\">\r\n<table style=\"padding: 25px 20px;\" width=\"1170px\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 1170px;\">\r\n<table style=\"padding: 0px 20px; width: 1170px;\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<table style=\"width: 770px;\">\r\n<tbody>\r\n<tr style=\"width: 770px;\">\r\n<td style=\"width: 770px;\"><img src=\"{$logo}\" alt=\"GLSN Logo\" width=\"250\" height=\"66\" /></td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 770px;\">\r\n<h2 style=\"width: 770px; font-family: \'Montserrat\'; font-size: 30px; margin: 0; color: #2a2f75; font-weight: bold;\">Lighthouse Network Management, Inc.</h2>\r\n<p style=\"width: 770px; font-family: Lato; font-size: 22px; margin: 0;\">3300 West Rolling Hills Circle, Unit 607<br />Davie, FL 33328, United States of America<br />For questions :&nbsp;&nbsp; <a href=\"mailto:info@4GLSN.com\">info@4GLSN.com</a></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td style=\"width: 400px; text-align: right;\">\r\n<h2 style=\"font-family: \'Montserrat\'; font-size: 70px; font-weight: bold; margin: 0; color: #2a2f75;\">INVOICE</h2>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"margin-top: 50px; padding: 0 20px; width: 1170px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 585px;\">\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Invoice To:<br /><br /></p>\r\n<p style=\"font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;\"><span style=\"font-size: 24pt;\">{$company}</span></p>\r\n<p style=\"font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;\">{$address}</p>\r\n<p style=\"font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;\">{$city}, {$state}</p>\r\n<p style=\"font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;\">{$country}</p>\r\n</td>\r\n<td style=\"width: 585px; text-align: right; vertical-align: top;\" align=\"right\">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Invoice #:</p>\r\n</td>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">{$invoice_no}</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Date:</p>\r\n</td>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">{$invoice_date}</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Terms:</p>\r\n</td>\r\n<td>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">{$terms}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"margin-top: 50px; padding: 0 20px;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 585px; vertical-align: top;\">\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"mailto:{$email}\"> {$email}</a></p>\r\n</td>\r\n<td style=\"width: 585px; text-align: right; vertical-align: top;\">\r\n<p style=\"font-family: Lato; font-size: 28px; font-weight: bold; color: #2a2f75; margin: 0;\">Total Due:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USD {$amount}.00</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 1170px; margin-top: 35px; padding: 0 20px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 1170px; text-align: center;\">\r\n<p style=\"width: 1170px; font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;\"><strong><span style=\"font-size: 24pt;\">\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE</span></strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"margin-top: 50px; border-spacing: 0; border-bottom: 3px solid #2A2F75; width: 100%;\">\r\n<tbody>\r\n<tr style=\"background: #2A2F75; padding: 20px 0;\">\r\n<td style=\"font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 900px; padding: 20px 20px; text-align: center;\"><strong><span style=\"font-size: 18pt;\">Description:</span></strong></td>\r\n<td style=\"font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 300px; padding: 20px 20px; text-align: center;\"><strong><span style=\"font-size: 18pt;\">Total Due in USD:<br /></span></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n{$body_items}\r\n<table style=\"padding: 50px 20px 50px 20px; background: #F3F6F6;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 685px;\">\r\n<p style=\"font-family: Lato; font-size: 22px; font-weight: bold; margin: 0;\">Wire Transfer Instructions:</p>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">Bank: Wells Fargo Bank, N.A.<br />420 Montgomery St, San Francisco, CA 94104<br />A/C: Lighthouse Network Management, Inc.<br />Account #: 1384802359<br />ABA: 063107513 - SWIFT/BIC: WFBIUS6S</p>\r\n<p style=\"font-family: Lato; font-size: 22px; margin: 0;\">&nbsp;</p>\r\n</td>\r\n<td style=\"width: 485px;\" align=\"right\">\r\n<table style=\"width: 410px; border-spacing: 0;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px 10px;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0;\">&nbsp;</p>\r\n</td>\r\n<td style=\"padding: 10px 10px; text-align: right;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0; text-align: right;\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n<tbody>\r\n<tr style=\"background: #2A2F75;\">\r\n<td style=\"padding: 15px 10px;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #ffffff; margin: 0;\">USD Total:</p>\r\n</td>\r\n<td style=\"padding: 15px 10px; text-align: right;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #ffffff; margin: 0px; text-align: left;\">{$amount}.00</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 1170px; margin-top: 35px; padding: 0 20px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 1170px; text-align: center;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;\">PLEASE EXPEDITE PAYMENT OF THIS INVOICE</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 1170px; margin-top: 35px; padding: 0 20px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 585px; text-align: left;\">\r\n<table align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"{$globe_icon}\" /></td>\r\n<td style=\"text-align: left;\">\r\n<p style=\"font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;\"><a href=\"mailto:info@4GLSN.com\">info@4GLSN.com</a></p>\r\n<p style=\"font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;\"><a href=\"http://www.4GLSN.com\">www.4GLSN.com</a></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td style=\"width: 585px; text-align: center;\">\r\n<table align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"{$location_icon}\" /></td>\r\n<td style=\"text-align: left;\">\r\n<p style=\"font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;\">3300 West Rolling Hills Circle, Unit 607,<br />Davie, FL 33328, United States of America</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<!--<td style=\"width: 390px; text-align: center;\">\r\n<table align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td><img src=\"{$phone_icon}\" /></td>\r\n<td style=\"text-align: left;\">\r\n<p style=\"font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;\">Please join our OLP Whatsapp group at 516-356-7791</p>\r\n</td></tr>\r\n</tbody>\r\n</table>\r\n</td>--></tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 1170px; margin-top: 35px; padding: 0 20px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 1170px; text-align: center;\">\r\n<p style=\"font-family: Lato; font-size: 20px; color: #6b6363; margin: 0;\">{$notes}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"width: 1170px; margin-top: 35px; padding: 0 20px;\">\r\n<tbody>\r\n<tr style=\"width: 1170px;\">\r\n<td style=\"width: 1170px; text-align: center;\">\r\n<p style=\"font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;\">Lighthouse Network Management, Inc. is the proud owner of \"Global Logistics Summit Network\" (GLSN)</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '0000-00-00 00:00:00', 'Invoice Template', 'info@4glsn.com'),
(29, 'InterestedinGSAN', 'Dear<br /><br />During your application to join the Global Summit Logistics Network, you expressed an interest in Global Ship Agency Network (GSAN) and we are pleased to give you the following brief intrtoduction.&nbsp; <br />Please contact <a href=\"mailto:XXX@gsan.com\">XXX@gsan.com</a> if you have any further interest in joining this recommended netywork of Ship Agents.<br /><br />GSAN.......', '0000-00-00 00:00:00', 'GSLN:  Introduction to GSAN - Global Ship Agents Network', 'admin@go2gsan.com'),
(5, 'GLSN Reference Request', '<div style=\"text-align: justify;\">Attn:&nbsp;&nbsp; {$ReferenceName}, {$ReferenceJobTitle} of {$ReferenceCompany}<br /><br /></div>\r\n<div style=\"text-align: justify;\"><em>This is not a solicitation; it is a legitimate request for information from a mutually known party. <br /><br /></em></div>\r\n<div style=\"text-align: justify;\">This email is from <strong>\"Global Logistics Summit Network\" (GLSN)</strong> -&nbsp; <a href=\"http://www.4GLSN.com\">www.4GLSN.com</a> - and we are contacting you as <strong>{$applicant_trade_name}</strong> in <strong>{$applicant_country}</strong> has applied for GLSN membership and <strong>{$applicant_primaryContactName}</strong> has provided your name as a reference. <br /><br /></div>\r\n<div style=\"text-align: justify;\">Could we respectfully request that you give us your honest opinion of this company so that we can process their application?&nbsp;&nbsp; Your response will be kept in the strictest of confidence and not revealed back to {$applicant_trade_name} or any other third parties.<br /><br /><strong>Note:&nbsp; If you have any difficulty in completeing the automated form below, kindly click on this <a title=\"Link\" href=\"{$link}\">Link</a> to complete the reference on-line:</strong></div>\r\n<br /><form action=\"{$url}\" method=\"post\">\r\n<table border=\"1\" width=\"100%\" cellspacing=\"2\" cellpadding=\"2\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">1:</td>\r\n<td valign=\"top\">How many years have you done business with this company:</td>\r\n<td valign=\"top\">&nbsp;<input name=\"q1\" required=\"required\" type=\"text\" /> Years</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">2:</td>\r\n<td valign=\"top\">Are they timely with their communications?</td>\r\n<td valign=\"top\"><label><input name=\"q2\" required=\"required\" type=\"radio\" value=\"Yes\" />&nbsp; Yes&nbsp; /&nbsp; </label><label><input name=\"q2\" type=\"radio\" value=\"No\" /> No</label> /&nbsp;<label> <input name=\"q2\" type=\"radio\" value=\"Unknown\" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">3:</td>\r\n<td valign=\"top\">Do they perform with honesty, integrity and impartiality?</td>\r\n<td valign=\"top\"><label><input name=\"q3\" required=\"required\" type=\"radio\" value=\"Yes\" /> Yes&nbsp; /&nbsp;</label> <label><input name=\"q3\" type=\"radio\" value=\"No\" /> No&nbsp; /&nbsp;</label> <label><input name=\"q3\" type=\"radio\" value=\"Unknown\" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">4:</td>\r\n<td valign=\"top\">Are they competent and perform services in a conscientious, diligent and efficient manner?</td>\r\n<td valign=\"top\"><label><input name=\"q4\" required=\"required\" type=\"radio\" value=\"Yes\" /> Yes&nbsp; /&nbsp;</label> <label><input name=\"q4\" type=\"radio\" value=\"No\" /> No&nbsp; /&nbsp;</label><label> <input name=\"q4\" type=\"radio\" value=\"Unknown\" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">5:</td>\r\n<td valign=\"top\">Do you have any reservations in recommending this company as a GLSN Member?</td>\r\n<td valign=\"top\"><label><input name=\"q5\" required=\"required\" type=\"radio\" value=\"Yes\" /> Yes&nbsp; /&nbsp;</label> <label><input name=\"q5\" type=\"radio\" value=\"No\" />&nbsp; No&nbsp; /&nbsp;</label> <label><input name=\"q5\" type=\"radio\" value=\"Unknown\" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">Notes:</td>\r\n<td valign=\"top\">$textarea_box<input name=\"reference_email\" type=\"hidden\" value=\"{$reference_email}\" /></td>\r\n<td valign=\"top\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"3\"><button name=\"Submit\" type=\"submit\">Submit</button></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form><br />GLSN thanks you in advance for your kind response and be assured that if we can assist you in any way, please contact us. <br /><br /><br /><br />Sincerely,<br />The GLSN Management Team<br />e)&nbsp; <a href=\"mailto:Admin@4GLSN.com\">Admin@4GLSN.com</a> - <a href=\"http://www.4GLSN.com\">www.4GLSN.com</a> <br /><img src=\"https://www.glsn.com/images/site/fileuploads/glo-rgb.png\" alt=\"\" width=\"250\" height=\"66\" />', '0000-00-00 00:00:00', 'Reference Request on {$applicant_trade_name} of {$applicant_country}', 'info@4GLSN.com'),
(6, 'Branch approval request', '<p>New Branch Approval Request from member :&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Company Name</td>\r\n<td>:</td>\r\n<td>{$company_name}</td>\r\n</tr>\r\n<tr>\r\n<td>Branch Name</td>\r\n<td>:</td>\r\n<td>{$branch_name}</td>\r\n</tr>\r\n<tr>\r\n<td>IP Address</td>\r\n<td>:</td>\r\n<td>{$ip_address}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Member need to add this branch.</p>\r\n<p>&nbsp;</p>\r\n<p>GLSN System</p>', '0000-00-00 00:00:00', 'GLSN Branch approval request', ''),
(7, 'Forgot Password', '<table border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 40px;\">\r\n<table style=\"box-shadow: 0px 0px 0px #ccc;\" border=\"0\" width=\"610\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr bgcolor=\"#FFFFFF\">\r\n<td align=\"left\">\r\n<p><img title=\"{$site_name}\" src=\"{$logo}\" alt=\"logo\" /></p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3><span style=\"font-size: 12pt;\">Hi {$name},</span></h3>\r\n<h3>Please cllick below link to change your password&nbsp;&nbsp;<strong>{$link}.</strong></h3>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">\r\n<p><strong>Thanks for using&nbsp;{$site_name}&nbsp;</strong></p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr bgcolor=\"#fff\">\r\n<td height=\"30\">\r\n<div class=\"btn btn-primary space1\" style=\"text-align: center;\">&nbsp;&nbsp;</div>\r\n<div class=\"btn btn-primary space1\" style=\"font-size: 10px; color: #7f7f7f; margin: 5px auto; font-family: Arial; text-align: left;\">Thanks, &nbsp;&nbsp;<br />The {$site_name} Team</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '0000-00-00 00:00:00', 'Forgot Password - GLSN', ''),
(1, 'Admin Contact us', '<p><span style=\"font-size: 10pt;\">The following message has been sent to you via the GLSN Contact Form. </span><span style=\"font-size: 10pt;\">The details are as follows:</span></p>\r\n<p>From: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <a href=\"mailto:{$email}\">{$name}</a><br />Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$email}<br />Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$subject_message}<br /><br /></p>\r\n<p><strong><span style=\"font-size: 10pt;\">Message:</span></strong></p>\r\n<p>{$body}</p>', '0000-00-00 00:00:00', 'GLSN Contact Form:  Message from {$name} at {$email}', '    '),
(2, 'Login Confirmation', '<table border=\"0\" width=\"640\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 40px;\">\r\n<table style=\"box-shadow: 0px 0px 0px #ccc;\" border=\"0\" width=\"610\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 50%; vertical-align: top;\" width=\"50%\">\r\n<p><span style=\"font-size: 12pt;\">Dear {$company_name} :</span></p>\r\n<p>Thank you for your interest in the <strong>Global Logistics Summit Network(GLSN).</strong><br /><br />Please keep this email for your future reference.<br /><br />You can access your records at any time by logging into the &nbsp;<a href=\"http://www.glsn.com\">www.glsn.com</a> by using the following credentials:</p>\r\n<div style=\"text-align: left;\" align=\"center\">\r\n<table border=\"0\" width=\"60%\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: right;\" width=\"50%\"><strong>Email:&nbsp;&nbsp; <br /></strong></td>\r\n<td width=\"50%\"><span style=\"font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;\"><strong> <strong style=\"font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;\">{$email}</strong></strong></span></td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: right;\" width=\"50%\"><strong>Password:&nbsp;&nbsp; <br /></strong></td>\r\n<td width=\"50%\"><span style=\"font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;\"><strong> <strong style=\"font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;\">{$password}</strong></strong></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<br />Sincerely,<br /><strong>Global Logistics Summit Network(GLSN).</strong><br />E:&nbsp;&nbsp; <a href=\"mailto:admin@glsn.com\">admin@glsn.com</a><br />W:&nbsp;&nbsp; <a href=\"http://www.glsn.com\">www.glsn.com</a><br /><img title=\"{$site_name}\" src=\"{$logo}\" alt=\"logo\" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr bgcolor=\"#fff\">\r\n<td height=\"30\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '0000-00-00 00:00:00', 'GLSN: Login Confirmation', ''),
(14, 'Invoice', '<p>Dear {$company_name}:</p>\r\n<p><strong>Global Logistics Summit Network (GLSN) is pleased to confirm that your Membership Application has been accepted!</strong></p>\r\n<p>Please click the link below for our Membership/Summit Fee invoice that is in .pdf format.</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\"><strong><a title=\"Open Invoice #{$invoice_no}\" href=\"{$invoice_url}\" target=\"_blank\" rel=\"noopener\">Open Invoice #{$invoice_no}</a></strong></span></p>\r\n<p style=\"text-align: justify;\">The invoice contacins payment/wire transfer details for your easy reference.&nbsp;&nbsp; Kindly send a copy of your Wire Transfer Instructions so that we can ensure correct allocation.<br /><br />Upon payment GLSN will activate your Membership and grant you access to the Member Dashboard.</p>\r\n<p style=\"text-align: justify;\">The GLSN Management Team<br />e)&nbsp; <a href=\"mailto:info@4GLSN.com\">info@4GLSN.com</a> - w)&nbsp; <a href=\"http://www.4GLSN.com\">www.4GLSN.com</a><br /><br /></p>', '0000-00-00 00:00:00', 'GLSN Membership/Summit Invoice', 'info@4GLSN.com'),
(15, 'Activation Member mail', '<p style=\"text-align: justify;\">A sincere <strong>Thank You</strong> for your application to join Global Logistics Summit Network (GLSN) and <strong>Welcome on board!</strong></p>\r\n<p style=\"text-align: justify;\">GLSN is pleased to acknowledge receipt of your fees and you are now a Member in good standing of our growing, quality-focused Network.</p>\r\n<p style=\"text-align: justify;\">Within the next few days we will be sending you a <strong>Membership Certificate</strong> for each of your offices.</p>\r\n<p style=\"text-align: justify;\">The following are some important notes that we recommend you retain and also share with your staff:<br /><br /><strong>ANNOUNCEMENTS:<br /></strong>We will send out an internal broadcast to all of our GLSN Members within the immediate future so please be prepared for many warm welcome messages!&nbsp; In addition, we use our periodic eNewsletter to advise GSAN Members of new events such as your joining our network.</p>\r\n<p style=\"text-align: justify;\">Again, we would like to welcome you on-board the GLSN. We believe you have joined the best network around but we are only as good as our Members. You only get out of the GLSN network what YOU are prepared to put into it!</p>\r\n<p style=\"text-align: justify;\">Regards,</p>\r\n<p style=\"text-align: justify;\">The GLSN Management Team</p>', '0000-00-00 00:00:00', 'GLSN Membership Activation', ''),
(30, 'IntroductionTrans-Collections', 'Dear XXXX:<br /><br />During your application to join GLSN, you expressend an interest in Trans-Collections and we are please to provide you with the following informationm......', '0000-00-00 00:00:00', 'GLSN:  Introdyction to Trans-Collections', 'debts@trans-collections.com');

-- --------------------------------------------------------

--
-- Table structure for table `fc_fees`
--

DROP TABLE IF EXISTS `fc_fees`;
CREATE TABLE IF NOT EXISTS `fc_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_fee` decimal(20,2) NOT NULL,
  `featured_member` decimal(20,2) NOT NULL,
  `featured_member_discount` decimal(20,2) NOT NULL,
  `featured_discount` int(11) NOT NULL,
  `top_listed_member` decimal(20,2) NOT NULL,
  `top_listed_member_discount` decimal(20,0) NOT NULL,
  `top_listed_discount` int(11) NOT NULL,
  `branch` decimal(20,2) NOT NULL,
  `pay1` decimal(20,2) NOT NULL,
  `pay2` decimal(20,2) NOT NULL,
  `pay1_desc` varchar(250) NOT NULL,
  `pay2_desc` varchar(250) NOT NULL,
  `additional_person` decimal(20,2) NOT NULL,
  `wire` decimal(20,2) NOT NULL,
  `both_summit` decimal(20,2) NOT NULL,
  `head_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `branch_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `featured_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `toplist_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `summit_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addtional_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_fees`
--

INSERT INTO `fc_fees` (`id`, `application_fee`, `featured_member`, `featured_member_discount`, `featured_discount`, `top_listed_member`, `top_listed_member_discount`, `top_listed_discount`, `branch`, `pay1`, `pay2`, `pay1_desc`, `pay2_desc`, `additional_person`, `wire`, `both_summit`, `head_text`, `branch_text`, `payment_text`, `featured_text`, `toplist_text`, `summit_text`, `addtional_text`, `updatedAt`) VALUES
(1, '1250.00', '500.00', '250.00', 1, '500.00', '250', 1, '250.00', '150.00', '300.00', '5000.00', '10,000.00', '700.00', '25.00', '750.00', 'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your ', 'Annual Membership Fee in respect of additional office: ', 'Payment Protection - up to USD [amount] per incident ', 'Advertizing: Displayed as Featured Member on GLSN Homepage ', 'Advertizing: Displayed as Top Listing on [country] Member Directory ', 'Summit Fee for attending 2nd Bi-Annual Conference ', 'Additional person for the summits.', '2019-11-11 07:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `fc_fileuploads`
--

DROP TABLE IF EXISTS `fc_fileuploads`;
CREATE TABLE IF NOT EXISTS `fc_fileuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_fileuploads`
--

INSERT INTO `fc_fileuploads` (`id`, `file_name`, `created`) VALUES
(7, '7f2ad1dbf176909cd8b0c20614bf7613.jpg', '2019-12-27 07:35:00'),
(8, 'Favicon.jpg', '2019-12-28 06:13:11'),
(9, 'GLSN_Logo_cropped.jpg', '2019-12-28 10:02:48'),
(10, 'IMG_5229.jpg', '2019-12-30 06:52:31'),
(11, '2020FallSummit.jpg', '2020-01-21 09:05:08'),
(12, '2021SpingSummit.jpg', '2020-01-21 09:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `fc_footer`
--

DROP TABLE IF EXISTS `fc_footer`;
CREATE TABLE IF NOT EXISTS `fc_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_text` text NOT NULL,
  `home_about_text1` text NOT NULL,
  `home_about_text2` longtext NOT NULL,
  `address` text NOT NULL,
  `address1` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `accounting_email` text NOT NULL,
  `general_email` text NOT NULL,
  `google_link` text NOT NULL,
  `linked_in` text NOT NULL,
  `client_img` varchar(250) NOT NULL,
  `banner_text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `membership_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `summit_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `member_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contact_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `summits_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_footer`
--

INSERT INTO `fc_footer` (`id`, `subscriber_text`, `home_about_text1`, `home_about_text2`, `address`, `address1`, `email`, `phone`, `accounting_email`, `general_email`, `google_link`, `linked_in`, `client_img`, `banner_text`, `membership_text`, `summit_text`, `member_text`, `contact_text`, `summits_text`) VALUES
(1, '', '&lt;div style=&quot;text-align: justify;&quot;&gt;&lt;strong&gt;Global Logistics Summit Network (GLSN)&lt;/strong&gt; is unlike any of the 100+ traditional freight forwarding networks. .&amp;nbsp; &lt;strong&gt;For a low annual fee &amp;ndash; comparable to attending a traditional network conference - GLSN offers attendance at a well-organized Bi-Annual Summit INCLUSIVE of being a member of a well-functioning network with full website capabilities and neutrally managed by a team of industry and network veterans.&lt;br /&gt;&lt;br /&gt;&lt;/strong&gt;The GLSN concept is based on the fact that the greatest benefit of any network derives from periodic Face-to-Face Meetings and this is the cornerstone of GLSN. &lt;br /&gt;&lt;br /&gt;&lt;/div&gt;\r\n&lt;div style=&quot;text-align: justify;&quot;&gt;GLSN Summits are held every 6-months and are professionally organized with a full agenda of pre-arranged Face-to-Face Meetings and social events all designed to foster long-term friendships and camaraderie between Members leading to greater sales and business.&lt;/div&gt;', '&lt;p class=&quot;common-para&quot;&gt;Qminds facilitates enhanced competitiveness through multi-faceted interventions leading to Business Improvement through consulting, people, process and operational assessments, benchmarking &amp;amp; resource provisioning through Quality Outsourcing.&lt;/p&gt;\r\n&lt;p class=&quot;common-para&quot;&gt;We helps Organizations to achieve Operational Excellence through deployment of best practices and processes in areas of Business Process Re-engineering, Quality Management, Information Security, Project Management, IT Service Management and others.&lt;/p&gt;\r\n&lt;p class=&quot;common-para&quot;&gt;Qminds family worldwide works with organizations for enterprise-wide deployment of process improvement, quality and security various models like SEISM\'\'s CMMI&amp;reg;, People CMM and Six Sigma, Risk Management, Information Security, Business Continuity, Project Management to name a few.&lt;/p&gt;', 'GLSN\r\nUSA', '', 'Info@4GLSN.com', '', 'Accounting@4GLSN.com', 'Info@4GLSN.com', 'https://www.linkedin.com/', 'https://www.linkedin.com', 'clients2.jpg', 'Global Logistics Summit Network (GLSN) ...... the only quality-focused network dedicated to member business development at Bi-Annual Summits', 'Apply to join GLSN by completing our on-line Membership Application.', 'View GLSN\'s upcoming Bi-Annual Summit schedule.', 'View GLSN Member Profiles by name or location.', 'Contact GLSN for additional information.', 'GLSN Summits are held every 6-months at premier venue in Bangkok, Thailand taking advantage of a global hub with international flights, a great climate, reasonable hotel prices, easy to obtain visas and outstanding food and entertainment.  GLSN has the following Bi-Annual Summit schedule:');

-- --------------------------------------------------------

--
-- Table structure for table `fc_gallery`
--

DROP TABLE IF EXISTS `fc_gallery`;
CREATE TABLE IF NOT EXISTS `fc_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_gallery`
--

INSERT INTO `fc_gallery` (`id`, `file_name`, `created`) VALUES
(33, '2020FallSummit4.jpg', '2020-01-21 11:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `fc_hears`
--

DROP TABLE IF EXISTS `fc_hears`;
CREATE TABLE IF NOT EXISTS `fc_hears` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hears_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_hears`
--

INSERT INTO `fc_hears` (`id`, `hears_name`, `status`, `created`, `order_number`) VALUES
(1, 'Search Engine', 1, '2019-01-13 10:05:06', 0),
(2, 'News Release', 1, '2019-01-13 10:05:06', 0),
(3, 'Industry Publication', 1, '2019-01-13 10:05:06', 0),
(4, 'Email Solicitation', 1, '2019-01-13 10:05:06', 0),
(5, 'Friend/Colleague', 1, '2019-01-13 10:05:06', 0),
(6, 'Facebook', 1, '2019-01-13 10:05:06', 0),
(7, 'LinkedIn', 1, '2019-01-13 10:05:06', 0),
(8, 'Twitter', 1, '2019-01-13 10:05:06', 0),
(9, 'Asked for Reference', 1, '2019-01-28 17:16:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fc_iata`
--

DROP TABLE IF EXISTS `fc_iata`;
CREATE TABLE IF NOT EXISTS `fc_iata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `short_code` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1968 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_iata`
--

INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
(1, 1, 'Afghanistan', 'Jalalabad     ', 'JAA', 1, '2019-09-14 07:14:27'),
(2, 1, 'Afghanistan', 'Kabul - Khwaja Rawash Apt ', 'KBL', 1, '2019-09-14 07:14:27'),
(3, 1, 'Afghanistan', 'Uruzgan ', 'URZ', 1, '2019-09-14 07:14:27'),
(4, 2, 'Albania', 'Tirana - Rinas ', 'TIA', 1, '2019-09-14 07:14:27'),
(5, 3, 'Algeria', 'Algiers, Houari Boumediene Apt ', 'ALG', 1, '2019-09-14 07:14:27'),
(9, 3, 'Algeria', 'Oran (Ouahran) ', 'ORN', 1, '2019-09-14 07:14:27'),
(10, 4, 'American Samoa', 'Pago Pago ', 'PPG', 1, '2019-09-14 07:14:27'),
(11, 5, 'Andorra', 'Andorra La Vella - Heliport ', 'ALV', 1, '2019-09-14 07:14:27'),
(12, 6, 'Angola', 'Benguela ', 'BUG', 1, '2019-09-14 07:14:27'),
(13, 6, 'Angola', 'Cabinda ', 'CAB', 1, '2019-09-14 07:14:27'),
(15, 6, 'Angola', 'Luanda - 4 de Fevereiro ', 'LAD', 1, '2019-09-14 07:14:27'),
(17, 7, 'Anguilla', 'Anguilla ', 'AXA', 1, '2019-09-14 07:14:27'),
(18, 8, 'Antigua & Barbuda', 'Antigua, V.C. Bird Int\'l ', 'ANU', 1, '2019-09-14 07:14:27'),
(19, 9, 'Argentina', 'Buenos Aires ', 'BUE', 1, '2019-09-14 07:14:27'),
(22, 9, 'Argentina', 'Cordoba ', 'COR', 1, '2019-09-14 07:14:27'),
(27, 9, 'Argentina', 'Mar del Plata ', 'MDQ', 1, '2019-09-14 07:14:27'),
(28, 9, 'Argentina', 'Mendoza ', 'MDZ', 1, '2019-09-14 07:14:27'),
(30, 9, 'Argentina', 'Salta, Gen Belgrano ', 'SLA', 1, '2019-09-14 07:14:27'),
(31, 9, 'Argentina', 'San Carlos de Bariloche ', 'BRC', 1, '2019-09-14 07:14:27'),
(32, 9, 'Argentina', 'Santa Rosa ', 'RSA', 1, '2019-09-14 07:14:27'),
(34, 10, 'Armenia', 'Eriwan (Yerevan, Jerevan) ', 'EVN', 1, '2019-09-14 07:14:27'),
(35, 11, 'Aruba', 'Oranjestad - Reina Beatrix Int\'l ', 'AUA', 1, '2019-09-14 07:14:27'),
(36, 12, 'Australia', 'Adelaide ', 'ADL', 1, '2019-09-14 07:14:27'),
(47, 12, 'Australia', 'Brisbane ', 'BNE', 1, '2019-09-14 07:14:27'),
(52, 12, 'Australia', 'Cairns ', 'CNS', 1, '2019-09-14 07:14:27'),
(53, 12, 'Australia', 'Canberra - Canberra Apt ', 'CBR', 1, '2019-09-14 07:14:27'),
(66, 12, 'Australia', 'Darwin ', 'DRW', 1, '2019-09-14 07:14:27'),
(86, 12, 'Australia', 'Hamilton ', 'HLT', 1, '2019-09-14 07:14:27'),
(91, 12, 'Australia', 'Hobart ', 'HBA', 1, '2019-09-14 07:14:27'),
(106, 12, 'Australia', 'Launceston ', 'LST', 1, '2019-09-14 07:14:28'),
(120, 12, 'Australia', 'Melbourne (Tullamarine) ', 'MEL', 1, '2019-09-14 07:14:28'),
(133, 12, 'Australia', 'Newcastle - Williamtown ', 'NTL', 1, '2019-09-14 07:14:28'),
(141, 12, 'Australia', 'Perth Int\'l ', 'PER', 1, '2019-09-14 07:14:28'),
(156, 12, 'Australia', 'Sydney - Sydney Apt ', 'SYD', 1, '2019-09-14 07:14:28'),
(164, 12, 'Australia', 'Townsville ', 'TSV', 1, '2019-09-14 07:14:28'),
(175, 13, 'Austria', 'Graz ', 'GRZ', 1, '2019-09-14 07:14:28'),
(176, 13, 'Austria', 'Innsbruck - Kranebitten ', 'INN', 1, '2019-09-14 07:14:28'),
(178, 13, 'Austria', 'Linz - Hoersching ', 'LNZ', 1, '2019-09-14 07:14:28'),
(179, 13, 'Austria', 'Salzburg - W.A. Mozart ', 'SZG', 1, '2019-09-14 07:14:28'),
(180, 13, 'Austria', 'Wien (Vienna) - Vienna Int\'l ', 'VIE', 1, '2019-09-14 07:14:28'),
(181, 14, 'Azerbaijan', 'Baku - Heydar Aliyev Int\'l Apt ', 'BAK', 1, '2019-09-14 07:14:28'),
(185, 15, 'Bahamas', 'Freeport - Grand Bahama Int\'l Apt ', 'FPO', 1, '2019-09-14 07:14:28'),
(192, 16, 'Bahrain', 'Bahrain - Bahrain Int\'l Apt ', 'BAH', 1, '2019-09-14 07:14:28'),
(194, 17, 'Bangladesh', 'Chittagong ', 'CGP', 1, '2019-09-14 07:14:28'),
(195, 17, 'Bangladesh', 'Dhaka - Zia Int\'l Apt ', 'DAC', 1, '2019-09-14 07:14:28'),
(198, 18, 'Barbados', 'Bridgetown - Grantley Adams Int\'l ', 'BGI', 1, '2019-09-14 07:14:28'),
(199, 19, 'Belarus', 'Minsk, Int\'l ', 'MSQ', 1, '2019-09-14 07:14:28'),
(200, 20, 'Belgium', 'Antwerp ', 'ANR', 1, '2019-09-14 07:14:28'),
(201, 20, 'Belgium', 'Brussels - Brussels Apt ', 'BRU', 1, '2019-09-14 07:14:28'),
(202, 20, 'Belgium', 'Ghent (Gent) ', 'GNE', 1, '2019-09-14 07:14:28'),
(203, 20, 'Belgium', 'Liege ', 'LGG', 1, '2019-09-14 07:14:28'),
(204, 21, 'Belize', 'Belize City - Philip S.W.Goldson Int\'l ', 'BZE', 1, '2019-09-14 07:14:28'),
(205, 22, 'Benin', 'Cotonou - Cotonou Cadjehoun Apt ', 'COO', 1, '2019-09-14 07:14:28'),
(206, 23, 'Bermuda', 'Bermuda - L.F. Wade Int\'l Apt ', 'BDA', 1, '2019-09-14 07:14:28'),
(207, 24, 'Bhutan', 'Paro ', 'PBH', 1, '2019-09-14 07:14:28'),
(208, 25, 'Bolivia', 'Cochabamba ', 'CBB', 1, '2019-09-14 07:14:28'),
(209, 25, 'Bolivia', 'La Paz - El Alto ', 'LPB', 1, '2019-09-14 07:14:28'),
(210, 25, 'Bolivia', 'Santa Cruz de la Sierra ', 'SRZ', 1, '2019-09-14 07:14:28'),
(211, 25, 'Bolivia', 'Santa Rosa ', 'SRB', 1, '2019-09-14 07:14:28'),
(212, 26, 'Bosnia & Herzegovina', 'Mostar ', 'OMO', 1, '2019-09-14 07:14:28'),
(213, 26, 'Bosnia & Herzegovina', 'Sarajevo ', 'SJJ', 1, '2019-09-14 07:14:28'),
(214, 27, 'Botswana', 'Francistown ', 'FRW', 1, '2019-09-14 07:14:28'),
(215, 27, 'Botswana', 'Gaborone - Sir Seretse Khama Int\'l Apt ', 'GBE', 1, '2019-09-14 07:14:28'),
(216, 27, 'Botswana', 'Jwaneng ', 'JWA', 1, '2019-09-14 07:14:28'),
(217, 27, 'Botswana', 'Maun ', 'MUB', 1, '2019-09-14 07:14:28'),
(218, 27, 'Botswana', 'Selibi Phikwe ', 'PKW', 1, '2019-09-14 07:14:28'),
(220, 28, 'Brazil', 'Belem - Val de Cans Int\'l Apt ', 'BEL', 1, '2019-09-14 07:14:28'),
(221, 28, 'Brazil', 'Belo Horizonte - Tancredo Neves Int\'l Apt ', 'CNF', 1, '2019-09-14 07:14:28'),
(223, 28, 'Brazil', 'Brasilia - Pres Juscelino Kubitschek Int\'l ', 'BSB', 1, '2019-09-14 07:14:28'),
(226, 28, 'Brazil', 'Curitiba - Afonso Pena Int\'l Apt ', 'CWB', 1, '2019-09-14 07:14:28'),
(227, 28, 'Brazil', 'Florianopolis ', 'FLN', 1, '2019-09-14 07:14:28'),
(228, 28, 'Brazil', 'Fortaleza - Pinto Martins Apt ', 'FOR', 1, '2019-09-14 07:14:28'),
(229, 28, 'Brazil', 'Goiania, Santa Genoveva Apt ', 'GYN', 1, '2019-09-14 07:14:28'),
(239, 28, 'Brazil', 'Maceio - Zumbi dos Palmares Int\'l Apt ', 'MCZ', 1, '2019-09-14 07:14:28'),
(240, 28, 'Brazil', 'Manaus - Eduardo Gomes Int\'l Apt ', 'MAO', 1, '2019-09-14 07:14:28'),
(242, 28, 'Brazil', 'Natal - Augusto Severo Int\'l Apt ', 'NAT', 1, '2019-09-14 07:14:28'),
(244, 28, 'Brazil', 'Porto Alegre - Salgado Filho Int\'l Apt ', 'POA', 1, '2019-09-14 07:14:28'),
(246, 28, 'Brazil', 'Recife - Guararapes-Gilberto Freyre Int\'l ', 'REC', 1, '2019-09-14 07:14:28'),
(248, 28, 'Brazil', 'Rio de Janeiro ', 'RIO', 1, '2019-09-14 07:14:28'),
(251, 28, 'Brazil', 'Salvador - Salvador Int\'l Apt ', 'SSA', 1, '2019-09-14 07:14:28'),
(254, 28, 'Brazil', 'Sao Paulo ', 'SAO', 1, '2019-09-14 07:14:28'),
(263, 28, 'Brazil', 'Vitoria - Eurico de Aguiar Salles Apt ', 'VIX', 1, '2019-09-14 07:14:28'),
(264, 29, 'Brunei Darussalam', 'Bandar Seri Begawan - Brunei Int\'l Apt ', 'BWN', 1, '2019-09-14 07:14:28'),
(265, 30, 'Bulgaria', 'Bourgas/Burgas ', 'BOJ', 1, '2019-09-14 07:14:28'),
(266, 30, 'Bulgaria', 'Gorna ', 'GOZ', 1, '2019-09-14 07:14:28'),
(267, 30, 'Bulgaria', 'Jambol ', 'JAM', 1, '2019-09-14 07:14:28'),
(268, 30, 'Bulgaria', 'Ruse ', 'ROU', 1, '2019-09-14 07:14:28'),
(269, 30, 'Bulgaria', 'Silistra ', 'SLS', 1, '2019-09-14 07:14:28'),
(270, 30, 'Bulgaria', 'Sofia - Vrazhdebna ', 'SOF', 1, '2019-09-14 07:14:28'),
(271, 30, 'Bulgaria', 'Targovishte ', 'TGV', 1, '2019-09-14 07:14:28'),
(272, 30, 'Bulgaria', 'Varna ', 'VAR', 1, '2019-09-14 07:14:28'),
(273, 30, 'Bulgaria', 'Vidin ', 'VID', 1, '2019-09-14 07:14:28'),
(274, 31, 'Burkina Faso', 'Bobo/Dioulasso ', 'BOY', 1, '2019-09-14 07:14:28'),
(275, 31, 'Burkina Faso', 'Ouagadougou ', 'OUA', 1, '2019-09-14 07:14:28'),
(276, 32, 'Burundi', 'Bujumbura - Bujumbura Int\'l Apt ', 'BJM', 1, '2019-09-14 07:14:28'),
(277, 33, 'Cambodia', 'Phnom Penh - Pochentong ', 'PNH', 1, '2019-09-14 07:14:28'),
(278, 34, 'Cameroon', 'Douala ', 'DLA', 1, '2019-09-14 07:14:28'),
(279, 34, 'Cameroon', 'Garoua ', 'GOU', 1, '2019-09-14 07:14:28'),
(280, 34, 'Cameroon', 'Maroua ', 'MVR', 1, '2019-09-14 07:14:28'),
(281, 34, 'Cameroon', 'N\'Gaoundere ', 'NGE', 1, '2019-09-14 07:14:28'),
(282, 34, 'Cameroon', 'Yaounde ', 'YAO', 1, '2019-09-14 07:14:28'),
(285, 35, 'Canada', 'Calgary - Calgary Int\'l Apt ', 'YYC', 1, '2019-09-14 07:14:28'),
(290, 35, 'Canada', 'Edmonton, Int\'l ', 'YEG', 1, '2019-09-14 07:14:28'),
(301, 35, 'Canada', 'Halifax Int\'l ', 'YHZ', 1, '2019-09-14 07:14:28'),
(303, 35, 'Canada', 'Hamilton ', 'YHM', 1, '2019-09-14 07:14:28'),
(305, 35, 'Canada', 'Inuvik ', 'YEV', 1, '2019-09-14 07:14:28'),
(318, 35, 'Canada', 'Montreal - Dorval (Montréal-Trudeau) ', 'YUL', 1, '2019-09-14 07:14:28'),
(322, 35, 'Canada', 'Ottawa - Hull ', 'YOW', 1, '2019-09-14 07:14:28'),
(327, 35, 'Canada', 'Quebec - Quebec Int\'l ', 'YQB', 1, '2019-09-14 07:14:28'),
(346, 35, 'Canada', 'Toronto - Toronto Pearson Int\'l Apt ', 'YYZ', 1, '2019-09-14 07:14:28'),
(350, 35, 'Canada', 'Vancouver - Vancouver Int\'l ', 'YVR', 1, '2019-09-14 07:14:28'),
(355, 35, 'Canada', 'Windsor Ontario ', 'YQG', 1, '2019-09-14 07:14:28'),
(356, 35, 'Canada', 'Winnipeg Int\'l ', 'YWG', 1, '2019-09-14 07:14:28'),
(358, 0, 'Cape Verde', 'Praia - Nelson Mandela Int\'l Apt ', 'RAI', 1, '2019-09-14 07:14:28'),
(359, 0, 'Cape Verde', 'Sal ', 'SID', 1, '2019-09-14 07:14:28'),
(360, 36, 'Cayman Islands', 'Grand Cayman - Owen Roberts Int\'l ', 'GCM', 1, '2019-09-14 07:14:28'),
(361, 37, 'Central African Republic', 'Bambari ', 'BBY', 1, '2019-09-14 07:14:28'),
(362, 37, 'Central African Republic', 'Bangassou ', 'BGU', 1, '2019-09-14 07:14:28'),
(363, 37, 'Central African Republic', 'Bangui - M\'Poko Int\'l Apt ', 'BGF', 1, '2019-09-14 07:14:28'),
(364, 37, 'Central African Republic', 'Berberati ', 'BBT', 1, '2019-09-14 07:14:28'),
(365, 37, 'Central African Republic', 'Biraro ', 'IRO', 1, '2019-09-14 07:14:28'),
(366, 37, 'Central African Republic', 'Bria ', 'BIV', 1, '2019-09-14 07:14:28'),
(367, 37, 'Central African Republic', 'Carnot ', 'CRF', 1, '2019-09-14 07:14:28'),
(368, 37, 'Central African Republic', 'Ouadda ', 'ODA', 1, '2019-09-14 07:14:28'),
(369, 38, 'Chad', 'Abeche ', 'AEH', 1, '2019-09-14 07:14:28'),
(370, 38, 'Chad', 'Moundou ', 'MQQ', 1, '2019-09-14 07:14:28'),
(371, 38, 'Chad', 'N\'Djamena ', 'NDJ', 1, '2019-09-14 07:14:28'),
(372, 39, 'Chile', 'Calama - El Loa ', 'CJC', 1, '2019-09-14 07:14:28'),
(373, 39, 'Chile', 'Easter Island ', 'IPC', 1, '2019-09-14 07:14:28'),
(374, 39, 'Chile', 'Punta Arenas - Pres Carlos Ibáñez del Campo ', 'PUQ', 1, '2019-09-14 07:14:28'),
(375, 39, 'Chile', 'Santiago de Chile - Arturo Merino Benitez ', 'SCL', 1, '2019-09-14 07:14:28'),
(376, 39, 'Chile', 'Valparaiso ', 'VAP', 1, '2019-09-14 07:14:28'),
(377, 40, 'China', 'Beijing ', 'PEK', 1, '2019-09-14 07:14:28'),
(378, 40, 'China', 'Beijing - Nanyuan Apt ', 'NAY', 1, '2019-09-14 07:14:28'),
(379, 40, 'China', 'Changchun ', 'CGQ', 1, '2019-09-14 07:14:28'),
(380, 40, 'China', 'Dalian - Zhoushuizi Int\'l Apt ', 'DLC', 1, '2019-09-14 07:14:28'),
(381, 40, 'China', 'Guangzhou (Canton) - Baiyun Int\'l Apt ', 'CAN', 1, '2019-09-14 07:14:28'),
(382, 40, 'China', 'Guilin - Liangjiang ', 'KWL', 1, '2019-09-14 07:14:28'),
(383, 40, 'China', 'Hangchow (Hangzhou) ', 'HGH', 1, '2019-09-14 07:14:28'),
(384, 40, 'China', 'Harbin (Haerbin) ', 'HRB', 1, '2019-09-14 07:14:28'),
(385, 40, 'China', 'Ji\'an ', 'JGS', 1, '2019-09-14 07:14:28'),
(386, 40, 'China', 'Luxi - Mangshi ', 'LUM', 1, '2019-09-14 07:14:28'),
(387, 40, 'China', 'Nanning ', 'NNG', 1, '2019-09-14 07:14:28'),
(388, 40, 'China', 'Shanghai - Hongqiao ', 'SHA', 1, '2019-09-14 07:14:28'),
(389, 40, 'China', 'Shanghai - Pu Dong ', 'PVG', 1, '2019-09-14 07:14:28'),
(390, 40, 'China', 'Shenyang ', 'SHE', 1, '2019-09-14 07:14:28'),
(391, 40, 'China', 'Shenzhen - Shenzhen Bao\'an Int\'l ', 'SZX', 1, '2019-09-14 07:14:28'),
(392, 40, 'China', 'Tianjin ', 'TSN', 1, '2019-09-14 07:14:28'),
(393, 40, 'China', 'Urumqi ', 'URC', 1, '2019-09-14 07:14:28'),
(394, 40, 'China', 'Wuhan ', 'WUH', 1, '2019-09-14 07:14:28'),
(395, 40, 'China', 'Xiamen ', 'XMN', 1, '2019-09-14 07:14:28'),
(396, 40, 'China', 'Yichang ', 'YIH', 1, '2019-09-14 07:14:28'),
(397, 40, 'China ', 'Altay ', 'AAT', 1, '2019-09-14 07:14:28'),
(398, 40, 'China ', 'Chaoyang, Beijing - Chaoyang Apt ', 'CHG', 1, '2019-09-14 07:14:28'),
(399, 40, 'China ', 'Chengdu - Shuangliu ', 'CTU', 1, '2019-09-14 07:14:28'),
(400, 40, 'China ', 'Chongqing - Jiangbei Int\'l Apt ', 'CKG', 1, '2019-09-14 07:14:28'),
(401, 40, 'China ', 'Jiamusi - Jiamusi Apt ', 'JMU', 1, '2019-09-14 07:14:28'),
(402, 40, 'China ', 'Jiayuguan - Jiayuguan Apt ', 'JGN', 1, '2019-09-14 07:14:28'),
(403, 40, 'China ', 'Jilin ', 'JIL', 1, '2019-09-14 07:14:28'),
(404, 40, 'China ', 'Jinan ', 'TNA', 1, '2019-09-14 07:14:28'),
(405, 40, 'China ', 'Jingdezhen ', 'JDZ', 1, '2019-09-14 07:14:28'),
(406, 40, 'China ', 'Jinghong - Gasa Apt ', 'JHG', 1, '2019-09-14 07:14:28'),
(407, 40, 'China ', 'Jining ', 'JNG', 1, '2019-09-14 07:14:28'),
(408, 40, 'China ', 'Jinjiang ', 'JJN', 1, '2019-09-14 07:14:28'),
(409, 40, 'China ', 'Jinzhou - Jinzhou Apt ', 'JNZ', 1, '2019-09-14 07:14:28'),
(410, 40, 'China ', 'Jiujiang - Jiujiang Lushan Apt ', 'JIU', 1, '2019-09-14 07:14:28'),
(411, 40, 'China ', 'Qingdao ', 'TAO', 1, '2019-09-14 07:14:28'),
(412, 40, 'China ', 'Taiyuan ', 'TYN', 1, '2019-09-14 07:14:28'),
(413, 40, 'China ', 'Ulanhot ', 'HLH', 1, '2019-09-14 07:14:28'),
(414, 40, 'China ', 'Xi\'an - Xianyang ', 'XIY', 1, '2019-09-14 07:14:28'),
(415, 0, 'Cocos (Keeling) Islands', 'Not Applicable', 'COC', 1, '2019-09-14 07:14:28'),
(416, 41, 'Colombia', 'Barranquilla ', 'BAQ', 1, '2019-09-14 07:14:28'),
(417, 41, 'Colombia', 'Bogota - El Nuevo Dorado Int\'l Apt ', 'BOG', 1, '2019-09-14 07:14:28'),
(418, 41, 'Colombia', 'Bucaramanga ', 'BGA', 1, '2019-09-14 07:14:28'),
(419, 41, 'Colombia', 'Cali ', 'CLO', 1, '2019-09-14 07:14:28'),
(420, 41, 'Colombia', 'Cartagena - Rafael Núñez Int\'l Apt ', 'CTG', 1, '2019-09-14 07:14:28'),
(421, 41, 'Colombia', 'Medellin - José María Córdova Int\'l ', 'MDE', 1, '2019-09-14 07:14:28'),
(422, 41, 'Colombia', 'Pereira ', 'PEI', 1, '2019-09-14 07:14:28'),
(423, 41, 'Colombia', 'San Andres ', 'ADZ', 1, '2019-09-14 07:14:28'),
(424, 41, 'Colombia', 'Santa Rosalia ', 'SSL', 1, '2019-09-14 07:14:28'),
(425, 42, 'Comoros', 'Anjouan - Anjouan Apt ', 'AJN', 1, '2019-09-14 07:14:28'),
(426, 42, 'Comoros', 'Moroni - Prince Said Ibrahim ', 'HAH', 1, '2019-09-14 07:14:28'),
(427, 43, 'Congo-Brazzaville', 'Brazzaville - Maya-Maya Apt ', 'BZV', 1, '2019-09-14 07:14:28'),
(428, 43, 'Congo-Brazzaville', 'Pointe Noire ', 'PNR', 1, '2019-09-14 07:14:28'),
(429, 0, 'Cook Islands', 'Rarotonga ', 'RAR', 1, '2019-09-14 07:14:28'),
(430, 44, 'Costa Rica', 'San Jose ', 'SJO', 1, '2019-09-14 07:14:28'),
(431, 44, 'Costa Rica', 'Upala ', 'UPL', 1, '2019-09-14 07:14:28'),
(432, 0, 'Cote DIvoire', 'Abidjan ', 'ABJ', 1, '2019-09-14 07:14:28'),
(433, 0, 'Cote DIvoire', 'Bouake ', 'BYK', 1, '2019-09-14 07:14:28'),
(434, 0, 'Cote DIvoire', 'Daloa ', 'DJO', 1, '2019-09-14 07:14:28'),
(435, 0, 'Cote DIvoire', 'Korhogo ', 'HGO', 1, '2019-09-14 07:14:28'),
(436, 0, 'Cote DIvoire', 'Man ', 'MJC', 1, '2019-09-14 07:14:28'),
(437, 0, 'Cote DIvoire', 'San Pedro ', 'SPY', 1, '2019-09-14 07:14:28'),
(438, 0, 'Cote DIvoire', 'Sassandra ', 'ZSS', 1, '2019-09-14 07:14:28'),
(439, 0, 'Cote DIvoire', 'Yamoussoukro ', 'ASK', 1, '2019-09-14 07:14:28'),
(440, 46, 'Croatia', 'Dubrovnik ', 'DBV', 1, '2019-09-14 07:14:28'),
(441, 46, 'Croatia', 'Losinj - Losinj Arpt ', 'LSZ', 1, '2019-09-14 07:14:28'),
(442, 46, 'Croatia', 'Osijek ', 'OSI', 1, '2019-09-14 07:14:28'),
(443, 46, 'Croatia', 'Pula ', 'PUY', 1, '2019-09-14 07:14:28'),
(444, 46, 'Croatia', 'Rijeka ', 'RJK', 1, '2019-09-14 07:14:28'),
(445, 46, 'Croatia', 'Split ', 'SPU', 1, '2019-09-14 07:14:28'),
(446, 46, 'Croatia', 'Zadar ', 'ZAD', 1, '2019-09-14 07:14:28'),
(447, 46, 'Croatia', 'Zagreb - Zagreb Apt Pleso ', 'ZAG', 1, '2019-09-14 07:14:28'),
(448, 47, 'Cuba', 'Cienfuegos - Jaime González Apt ', 'CFG', 1, '2019-09-14 07:14:28'),
(449, 47, 'Cuba', 'Havana - José Martí Int\'l ', 'HAV', 1, '2019-09-14 07:14:28'),
(450, 47, 'Cuba', 'Holguin ', 'HOG', 1, '2019-09-14 07:14:28'),
(451, 47, 'Cuba', 'Santiago - Antonio Maceo Apt ', 'SCU', 1, '2019-09-14 07:14:28'),
(452, 47, 'Cuba', 'Varadero ', 'VRA', 1, '2019-09-14 07:14:28'),
(453, 48, 'Cyprus', 'Akrotiri - RAF ', 'AKT', 1, '2019-09-14 07:14:28'),
(454, 48, 'Cyprus', 'Larnaca ', 'LCA', 1, '2019-09-14 07:14:28'),
(455, 48, 'Cyprus', 'Limassol ', 'QLI', 1, '2019-09-14 07:14:28'),
(456, 48, 'Cyprus', 'Nicosia ', 'NIC', 1, '2019-09-14 07:14:28'),
(457, 48, 'Cyprus', 'Paphos ', 'PFO', 1, '2019-09-14 07:14:28'),
(458, 49, 'Czech Republic', 'Prague - Václav Havel Apt (formerly Ruzyne) ', 'PRG', 1, '2019-09-14 07:14:28'),
(459, 49, 'Czech Republic', 'Uherske Hradiste ', 'UHE', 1, '2019-09-14 07:14:28'),
(460, 50, 'Denmark', 'Aarhus ', 'AAR', 1, '2019-09-14 07:14:28'),
(461, 50, 'Denmark', 'Alborg ', 'AAL', 1, '2019-09-14 07:14:28'),
(462, 50, 'Denmark', 'Billund ', 'BLL', 1, '2019-09-14 07:14:28'),
(463, 50, 'Denmark', 'Copenhagen - Copenhagen Apt ', 'CPH', 1, '2019-09-14 07:14:28'),
(464, 50, 'Denmark', 'Esbjerg ', 'EBJ', 1, '2019-09-14 07:14:28'),
(465, 50, 'Denmark', 'Faroer - Vágar Apt ', 'FAE', 1, '2019-09-14 07:14:28'),
(466, 50, 'Denmark', 'Karup ', 'KRP', 1, '2019-09-14 07:14:28'),
(467, 50, 'Denmark', 'Odense ', 'ODE', 1, '2019-09-14 07:14:28'),
(468, 50, 'Denmark', 'Roenne ', 'RNN', 1, '2019-09-14 07:14:28'),
(469, 50, 'Denmark', 'Skrydstrup ', 'SKS', 1, '2019-09-14 07:14:28'),
(470, 50, 'Denmark', 'Soenderborg ', 'SGD', 1, '2019-09-14 07:14:28'),
(471, 50, 'Denmark', 'Thisted ', 'TED', 1, '2019-09-14 07:14:28'),
(472, 51, 'Djibouti', 'Djibouti (city) - Djibouti-Ambouli Int\'l Apt ', 'JIB', 1, '2019-09-14 07:14:28'),
(473, 52, 'Dominica', 'Melville Hall ', 'DOM', 1, '2019-09-14 07:14:28'),
(474, 53, 'Dominican Republic', 'Casa de Campo - La Romana Int\'l Apt ', 'LRM', 1, '2019-09-14 07:14:28'),
(475, 53, 'Dominican Republic', 'Puerto Plata ', 'POP', 1, '2019-09-14 07:14:28'),
(476, 53, 'Dominican Republic', 'Punta Cana - Punta Cana Int\'l ', 'PUJ', 1, '2019-09-14 07:14:28'),
(477, 53, 'Dominican Republic', 'Samana - Samaná El Catey Int\'l Apt ', 'AZS', 1, '2019-09-14 07:14:28'),
(478, 53, 'Dominican Republic', 'Santo Domingo ', 'SDQ', 1, '2019-09-14 07:14:28'),
(479, 0, 'DR Congo', 'Kinshasa - N\'Djili ', 'FIH', 1, '2019-09-14 07:14:28'),
(480, 0, 'DR Congo', 'Kisangani ', 'FKI', 1, '2019-09-14 07:14:28'),
(481, 0, 'DR Congo', 'Lisala ', 'LIQ', 1, '2019-09-14 07:14:28'),
(482, 0, 'DR Congo', 'Lumbumbashi ', 'FBM', 1, '2019-09-14 07:14:28'),
(483, 55, 'Ecuador', 'Guayaquil - Simon Bolivar ', 'GYE', 1, '2019-09-14 07:14:28'),
(484, 55, 'Ecuador', 'Jipijapa ', 'JIP', 1, '2019-09-14 07:14:28'),
(485, 55, 'Ecuador', 'Quito - Mariscal Sucre Int\'l Apt ', 'UIO', 1, '2019-09-14 07:14:28'),
(486, 55, 'Ecuador', 'Salinas ', 'SNC', 1, '2019-09-14 07:14:28'),
(487, 56, 'Egypt', 'Abu Rudeis ', 'AUE', 1, '2019-09-14 07:14:28'),
(488, 56, 'Egypt', 'Abu Simbel ', 'ABS', 1, '2019-09-14 07:14:28'),
(489, 56, 'Egypt', 'Al Arish ', 'AAC', 1, '2019-09-14 07:14:28'),
(490, 56, 'Egypt', 'Alexandria - Borg el Arab Apt ', 'HBH', 1, '2019-09-14 07:14:28'),
(491, 56, 'Egypt', 'Alexandria - El Nhouza Apt ', 'ALY', 1, '2019-09-14 07:14:28'),
(492, 56, 'Egypt', 'Assiut ', 'ATZ', 1, '2019-09-14 07:14:28'),
(493, 56, 'Egypt', 'Aswan - Daraw Apt ', 'ASW', 1, '2019-09-14 07:14:28'),
(494, 56, 'Egypt', 'Cairo - Cairo Int\'l Apt ', 'CAI', 1, '2019-09-14 07:14:28'),
(495, 56, 'Egypt', 'El Minya ', 'EMY', 1, '2019-09-14 07:14:28'),
(496, 56, 'Egypt', 'Hurghada Int\'l ', 'HRG', 1, '2019-09-14 07:14:28'),
(497, 56, 'Egypt', 'Kharga - New Valley ', 'UVL', 1, '2019-09-14 07:14:28'),
(498, 56, 'Egypt', 'Luxor ', 'LXR', 1, '2019-09-14 07:14:28'),
(499, 56, 'Egypt', 'Marsa Alam ', 'RMF', 1, '2019-09-14 07:14:28'),
(500, 56, 'Egypt', 'Marsa Matrah (Marsa Matruh) ', 'MUH', 1, '2019-09-14 07:14:28'),
(501, 56, 'Egypt', 'Port Said ', 'PSD', 1, '2019-09-14 07:14:28'),
(502, 56, 'Egypt', 'Santa Katarina - Mount Sinai ', 'SKV', 1, '2019-09-14 07:14:28'),
(503, 56, 'Egypt', 'Sharm El Sheikh ', 'SSH', 1, '2019-09-14 07:14:28'),
(504, 56, 'Egypt', 'Siwa ', 'SEW', 1, '2019-09-14 07:14:28'),
(505, 57, 'El Salvador', 'San Salvador ', 'SAL', 1, '2019-09-14 07:14:28'),
(506, 58, 'Equatorial Guinea', 'Malabo - Malabo Int\'l Apt ', 'SSG', 1, '2019-09-14 07:14:28'),
(507, 59, 'Eritrea', 'Asmara - Asmara Int\'l ', 'ASM', 1, '2019-09-14 07:14:28'),
(508, 60, 'Estonia', 'Tallinn - Pirita Harbour ', 'QUF', 1, '2019-09-14 07:14:28'),
(509, 60, 'Estonia', 'Tallinn - Ulemiste ', 'TLL', 1, '2019-09-14 07:14:28'),
(510, 61, 'Ethiopia', 'Addis Ababa - Bole Int\'l Apt ', 'ADD', 1, '2019-09-14 07:14:28'),
(511, 61, 'Ethiopia', 'Jijiga ', 'JIJ', 1, '2019-09-14 07:14:28'),
(512, 61, 'Ethiopia', 'Jimma ', 'JIM', 1, '2019-09-14 07:14:28'),
(513, 61, 'Ethiopia', 'Jinka - Baco/Jinka Apt ', 'BCO', 1, '2019-09-14 07:14:28'),
(514, 62, 'Falkland Islands', 'Not Applicable', 'FAL', 1, '2019-09-14 07:14:28'),
(515, 63, 'Fiji', 'Castaway ', 'CST', 1, '2019-09-14 07:14:28'),
(516, 63, 'Fiji', 'Nadi ', 'NAN', 1, '2019-09-14 07:14:28'),
(517, 63, 'Fiji', 'Suva - Nausori Apt (Luvuluvu) ', 'SUV', 1, '2019-09-14 07:14:28'),
(518, 64, 'Finland', 'Enontekioe ', 'ENF', 1, '2019-09-14 07:14:28'),
(519, 64, 'Finland', 'Helsinki - Vantaa ', 'HEL', 1, '2019-09-14 07:14:28'),
(520, 64, 'Finland', 'Ivalo ', 'IVL', 1, '2019-09-14 07:14:28'),
(521, 64, 'Finland', 'Joensuu ', 'JOE', 1, '2019-09-14 07:14:28'),
(522, 64, 'Finland', 'Jyväskylä (Jyvaskyla) ', 'JYV', 1, '2019-09-14 07:14:28'),
(523, 64, 'Finland', 'Kajaani ', 'KAJ', 1, '2019-09-14 07:14:28'),
(524, 64, 'Finland', 'Kauhajoki ', 'KHJ', 1, '2019-09-14 07:14:28'),
(525, 64, 'Finland', 'Kemi/Tornio ', 'KEM', 1, '2019-09-14 07:14:28'),
(526, 64, 'Finland', 'Kittilä ', 'KTT', 1, '2019-09-14 07:14:29'),
(527, 64, 'Finland', 'Kokkola/Pietarsaari ', 'KOK', 1, '2019-09-14 07:14:29'),
(528, 64, 'Finland', 'Kuopio ', 'KUO', 1, '2019-09-14 07:14:29'),
(529, 64, 'Finland', 'Kuusamo ', 'KAO', 1, '2019-09-14 07:14:29'),
(530, 64, 'Finland', 'Lappeenranta ', 'LPP', 1, '2019-09-14 07:14:29'),
(531, 64, 'Finland', 'Mariehamn (Maarianhamina) ', 'MHQ', 1, '2019-09-14 07:14:29'),
(532, 64, 'Finland', 'Mikkeli ', 'MIK', 1, '2019-09-14 07:14:29'),
(533, 64, 'Finland', 'Oulu ', 'OUL', 1, '2019-09-14 07:14:29'),
(534, 64, 'Finland', 'Pori ', 'POR', 1, '2019-09-14 07:14:29'),
(535, 64, 'Finland', 'Rovaniemi ', 'RVN', 1, '2019-09-14 07:14:29'),
(536, 64, 'Finland', 'Savonlinna ', 'SVL', 1, '2019-09-14 07:14:29'),
(537, 64, 'Finland', 'Seinaejoki ', 'SJY', 1, '2019-09-14 07:14:29'),
(538, 64, 'Finland', 'Sodankylae ', 'SOT', 1, '2019-09-14 07:14:29'),
(539, 64, 'Finland', 'Tampere ', 'TMP', 1, '2019-09-14 07:14:29'),
(540, 64, 'Finland', 'Turku ', 'TKU', 1, '2019-09-14 07:14:29'),
(541, 64, 'Finland', 'Vaasa ', 'VAA', 1, '2019-09-14 07:14:29'),
(542, 64, 'Finland', 'Varkaus ', 'VRK', 1, '2019-09-14 07:14:29'),
(543, 65, 'France', 'Ajaccio ', 'AJA', 1, '2019-09-14 07:14:29'),
(544, 65, 'France', 'Albi ', 'LBI', 1, '2019-09-14 07:14:29'),
(545, 65, 'France', 'Annecy ', 'NCY', 1, '2019-09-14 07:14:29'),
(546, 65, 'France', 'Aurillac ', 'AUR', 1, '2019-09-14 07:14:29'),
(547, 65, 'France', 'Bastia ', 'BIA', 1, '2019-09-14 07:14:29'),
(548, 65, 'France', 'Bergerac - Roumanieres ', 'EGC', 1, '2019-09-14 07:14:29'),
(549, 65, 'France', 'Biarritz ', 'BIQ', 1, '2019-09-14 07:14:29'),
(550, 65, 'France', 'Bordeaux - Bordeaux Apt ', 'BOD', 1, '2019-09-14 07:14:29'),
(551, 65, 'France', 'Brest ', 'BES', 1, '2019-09-14 07:14:29'),
(552, 65, 'France', 'Calvi ', 'CLY', 1, '2019-09-14 07:14:29'),
(553, 65, 'France', 'Cannes – Mandelieu Apt ', 'CEQ', 1, '2019-09-14 07:14:29'),
(554, 65, 'France', 'Chambery ', 'CMF', 1, '2019-09-14 07:14:29'),
(555, 65, 'France', 'Clermont Ferrand ', 'CFE', 1, '2019-09-14 07:14:29'),
(556, 65, 'France', 'Dinard ', 'DNR', 1, '2019-09-14 07:14:29'),
(557, 65, 'France', 'Disneyland Paris ', 'DLP', 1, '2019-09-14 07:14:29'),
(558, 65, 'France', 'Figari ', 'FSC', 1, '2019-09-14 07:14:29'),
(559, 65, 'France', 'Frejus ', 'FRJ', 1, '2019-09-14 07:14:29'),
(560, 65, 'France', 'Grenoble ', 'GNB', 1, '2019-09-14 07:14:29'),
(561, 65, 'France', 'La Rochelle ', 'LRH', 1, '2019-09-14 07:14:29'),
(562, 65, 'France', 'Lannion ', 'LAI', 1, '2019-09-14 07:14:29'),
(563, 65, 'France', 'Lille - Lille Apt ', 'LIL', 1, '2019-09-14 07:14:29'),
(564, 65, 'France', 'Limoges ', 'LIG', 1, '2019-09-14 07:14:29'),
(565, 65, 'France', 'Lorient ', 'LRT', 1, '2019-09-14 07:14:29'),
(566, 65, 'France', 'Lourdes/Tarbes ', 'LDE', 1, '2019-09-14 07:14:29'),
(567, 65, 'France', 'Lyon - Lyon-Saint Exupéry', 'LYS', 1, '2019-09-14 07:14:29'),
(568, 65, 'France', 'Marseille - Marseille Provence Apt ', 'MRS', 1, '2019-09-14 07:14:29'),
(569, 65, 'France', 'Metz -  Frescaty ', 'MZM', 1, '2019-09-14 07:14:29'),
(570, 65, 'France', 'Metz/Nancy Metz-Nancy-Lorraine ', 'ETZ', 1, '2019-09-14 07:14:29'),
(571, 65, 'France', 'Montpellier - Méditerranée Apt ', 'MPL', 1, '2019-09-14 07:14:29'),
(572, 65, 'France', 'Mulhouse ', 'MLH', 1, '2019-09-14 07:14:29'),
(573, 65, 'France', 'Nancy ', 'ENC', 1, '2019-09-14 07:14:29'),
(574, 65, 'France', 'Nantes - Nantes Atlantique Apt ', 'NTE', 1, '2019-09-14 07:14:29'),
(575, 65, 'France', 'Nice - Cote D\'Azur Apt ', 'NCE', 1, '2019-09-14 07:14:29'),
(576, 65, 'France', 'Nimes ', 'FNI', 1, '2019-09-14 07:14:29'),
(577, 65, 'France', 'Paris ', 'PAR', 1, '2019-09-14 07:14:29'),
(578, 65, 'France', 'Paris - Charles de Gaulle ', 'CDG', 1, '2019-09-14 07:14:29'),
(579, 65, 'France', 'Paris - Le Bourget ', 'LBG', 1, '2019-09-14 07:14:29'),
(580, 65, 'France', 'Paris - Orly ', 'ORY', 1, '2019-09-14 07:14:29'),
(581, 65, 'France', 'Pau ', 'PUF', 1, '2019-09-14 07:14:29'),
(582, 65, 'France', 'Perpignan ', 'PGF', 1, '2019-09-14 07:14:29'),
(583, 65, 'France', 'Poitiers - Biard ', 'PIS', 1, '2019-09-14 07:14:29'),
(584, 65, 'France', 'Quimper ', 'UIP', 1, '2019-09-14 07:14:29'),
(585, 65, 'France', 'Rennes ', 'RNS', 1, '2019-09-14 07:14:29'),
(586, 65, 'France', 'Roanne ', 'RNE', 1, '2019-09-14 07:14:29'),
(587, 65, 'France', 'Rodez ', 'RDZ', 1, '2019-09-14 07:14:29'),
(588, 65, 'France', 'Saint Brieuc ', 'SBK', 1, '2019-09-14 07:14:29'),
(589, 65, 'France', 'St. Etienne ', 'EBU', 1, '2019-09-14 07:14:29'),
(590, 65, 'France', 'Strasbourg - Strasbourg Apt ', 'SXB', 1, '2019-09-14 07:14:29'),
(591, 65, 'France', 'Toulouse - Blagnac Apt ', 'TLS', 1, '2019-09-14 07:14:29'),
(592, 66, 'French Guiana', 'Cayenne - Cayenne-Rochambeau Apt ', 'CAY', 1, '2019-09-14 07:14:29'),
(593, 0, 'French Polynesia', 'Bora Bora ', 'BOB', 1, '2019-09-14 07:14:29'),
(594, 0, 'French Polynesia', 'Huahine ', 'HUH', 1, '2019-09-14 07:14:29'),
(595, 0, 'French Polynesia', 'Manihi ', 'XMH', 1, '2019-09-14 07:14:29'),
(596, 0, 'French Polynesia', 'Maupiti ', 'MAU', 1, '2019-09-14 07:14:29'),
(597, 0, 'French Polynesia', 'Moorea ', 'MOZ', 1, '2019-09-14 07:14:29'),
(598, 0, 'French Polynesia', 'Papeete - Faaa ', 'PPT', 1, '2019-09-14 07:14:29'),
(599, 0, 'French Polynesia', 'Raiatea ', 'RFP', 1, '2019-09-14 07:14:29'),
(600, 0, 'French Polynesia', 'Rangiroa ', 'RGI', 1, '2019-09-14 07:14:29'),
(601, 0, 'French Polynesia', 'Ua Huka ', 'UAH', 1, '2019-09-14 07:14:29'),
(602, 0, 'French Polynesia', 'Ua Pou ', 'UAP', 1, '2019-09-14 07:14:29'),
(603, 67, 'Gabon', 'Lambarene ', 'LBQ', 1, '2019-09-14 07:14:29'),
(604, 67, 'Gabon', 'Libreville ', 'LBV', 1, '2019-09-14 07:14:29'),
(605, 67, 'Gabon', 'Moanda ', 'MFF', 1, '2019-09-14 07:14:29'),
(606, 67, 'Gabon', 'Mouila ', 'MJL', 1, '2019-09-14 07:14:29'),
(607, 67, 'Gabon', 'Mvengue ', 'MVB', 1, '2019-09-14 07:14:29'),
(608, 67, 'Gabon', 'Oyem ', 'UVE', 1, '2019-09-14 07:14:29'),
(609, 67, 'Gabon', 'Port Gentil ', 'POG', 1, '2019-09-14 07:14:29'),
(610, 68, 'Gambia', 'Banjul - Banjul Int\'l Apt (Yundum Int\'l) ', 'BJL', 1, '2019-09-14 07:14:29'),
(611, 69, 'Georgia', 'Tbilisi - Novo Alexeyevka ', 'TBS', 1, '2019-09-14 07:14:29'),
(614, 70, 'Germany', 'Berlin ', 'BER', 1, '2019-09-14 07:14:29'),
(618, 70, 'Germany', 'Bremen - Bremen Apt (Flughafen Bremen) ', 'BRE', 1, '2019-09-14 07:14:29'),
(619, 70, 'Germany', 'Cologne - Cologne Apt (Flughafen Köln/Bonn) ', 'CGN', 1, '2019-09-14 07:14:29'),
(621, 70, 'Germany', 'Dortmund ', 'DTM', 1, '2019-09-14 07:14:29'),
(622, 70, 'Germany', 'Dresden - Dresden Apt ', 'DRS', 1, '2019-09-14 07:14:29'),
(623, 70, 'Germany', 'Duesseldorf - Düsseldorf Int\'l Apt ', 'DUS', 1, '2019-09-14 07:14:29'),
(626, 70, 'Germany', 'Frankfurt/Main  (Rhein-Main-Flughafen) ', 'FRA', 1, '2019-09-14 07:14:29'),
(629, 70, 'Germany', 'Hamburg - Fuhlsbuettel ', 'HAM', 1, '2019-09-14 07:14:29'),
(630, 70, 'Germany', 'Hannover ', 'HAJ', 1, '2019-09-14 07:14:29'),
(634, 70, 'Germany', 'Kiel - Holtenau ', 'KEL', 1, '2019-09-14 07:14:29'),
(635, 70, 'Germany', 'Leipzig ', 'LEJ', 1, '2019-09-14 07:14:29'),
(636, 70, 'Germany', 'Muenchen (Munich) - Franz Josef Strauss ', 'MUC', 1, '2019-09-14 07:14:29'),
(638, 70, 'Germany', 'Nürnberg (Nuremberg) ', 'NUE', 1, '2019-09-14 07:14:29'),
(641, 70, 'Germany', 'Stuttgart - Echterdingen ', 'STR', 1, '2019-09-14 07:14:29'),
(644, 71, 'Ghana', 'Accra - Kotoka Int\'l Apt ', 'ACC', 1, '2019-09-14 07:14:29'),
(645, 72, 'Gibraltar', 'Gibraltar ', 'GIB', 1, '2019-09-14 07:14:29'),
(646, 73, 'Greece', 'Araxos ', 'GPA', 1, '2019-09-14 07:14:29'),
(647, 73, 'Greece', 'Athens - Elefthérios Venizélos Int\'l Apt ', 'ATH', 1, '2019-09-14 07:14:29'),
(648, 73, 'Greece', 'Athens, Hellinikon Apt ', 'HEW', 1, '2019-09-14 07:14:29'),
(649, 73, 'Greece', 'Chania ', 'CHQ', 1, '2019-09-14 07:14:29'),
(650, 73, 'Greece', 'Chios ', 'JKH', 1, '2019-09-14 07:14:29'),
(651, 73, 'Greece', 'Corfu ', 'CFU', 1, '2019-09-14 07:14:29'),
(652, 73, 'Greece', 'Heraklion ', 'HER', 1, '2019-09-14 07:14:29'),
(653, 73, 'Greece', 'Kalamata ', 'KLX', 1, '2019-09-14 07:14:29'),
(654, 73, 'Greece', 'Karpathos ', 'AOK', 1, '2019-09-14 07:14:29'),
(655, 73, 'Greece', 'Kavalla ', 'KVA', 1, '2019-09-14 07:14:29'),
(656, 73, 'Greece', 'Kos ', 'KGS', 1, '2019-09-14 07:14:29'),
(657, 73, 'Greece', 'Mykonos ', 'JMK', 1, '2019-09-14 07:14:29'),
(658, 73, 'Greece', 'Mytilene (Lesbos) ', 'MJT', 1, '2019-09-14 07:14:29'),
(659, 73, 'Greece', 'Naxos - Naxos Apt ', 'JNX', 1, '2019-09-14 07:14:29'),
(660, 73, 'Greece', 'Preveza/Lefkas ', 'PVK', 1, '2019-09-14 07:14:29'),
(661, 73, 'Greece', 'Rhodos ', 'RHO', 1, '2019-09-14 07:14:29'),
(662, 73, 'Greece', 'Saloniki Thessaloniki - Makedonia Apt.', 'SKG', 1, '2019-09-14 07:14:29'),
(663, 73, 'Greece', 'Samos ', 'SMI', 1, '2019-09-14 07:14:29'),
(664, 73, 'Greece', 'Skiathos ', 'JSI', 1, '2019-09-14 07:14:29'),
(665, 73, 'Greece', 'Thira ', 'JTR', 1, '2019-09-14 07:14:29'),
(666, 73, 'Greece', 'Zakynthos ', 'ZTH', 1, '2019-09-14 07:14:29'),
(667, 74, 'Greenland', 'Narsarsuaq ', 'UAK', 1, '2019-09-14 07:14:29'),
(668, 74, 'Greenland', 'Soendre Stroemfjord ', 'SFJ', 1, '2019-09-14 07:14:29'),
(669, 74, 'Greenland', 'Upernavik - Upernavik Heliport ', 'JUV', 1, '2019-09-14 07:14:29'),
(670, 74, 'Greenland', 'Uummannaq ', 'UMD', 1, '2019-09-14 07:14:29'),
(671, 75, 'Grenada', 'Grenada - Point Salines Apt & Maurice Bishop ', 'GND', 1, '2019-09-14 07:14:29'),
(672, 76, 'Guadeloupe', 'Basse-Terre - Pointe-à-Pitre Int\'l Apt ', 'PTP', 1, '2019-09-14 07:14:29'),
(673, 76, 'Guadeloupe', 'St. Martin ', 'SFG', 1, '2019-09-14 07:14:29'),
(674, 77, 'Guam', 'Agana (Hagåtña) ', 'SUM', 1, '2019-09-14 07:14:29'),
(675, 77, 'Guam', 'Guam ', 'GUM', 1, '2019-09-14 07:14:29'),
(676, 78, 'Guatemala', 'Guatemala City - La Aurora Int\'l Apt ', 'GUA', 1, '2019-09-14 07:14:29'),
(677, 79, 'Guinea', 'Conakry - Conakry Int\'l Apt ', 'CKY', 1, '2019-09-14 07:14:29'),
(678, 79, 'Guinea', 'Labe ', 'LEK', 1, '2019-09-14 07:14:29'),
(679, 80, 'Guinea-Bissau', 'Bissau - Osvaldo Vieiro Int\'l Apt ', 'BXO', 1, '2019-09-14 07:14:29'),
(680, 81, 'Guyana', 'Georgetown - Cheddi Jagan Int\'l Apt ', 'GEO', 1, '2019-09-14 07:14:29'),
(681, 82, 'Haiti', 'Jacmel    ', 'JAK', 1, '2019-09-14 07:14:29'),
(682, 82, 'Haiti', 'Jeremie - Jeremie Apt ', 'JEE', 1, '2019-09-14 07:14:29'),
(683, 82, 'Haiti', 'Port au Prince ', 'PAP', 1, '2019-09-14 07:14:29'),
(684, 83, 'Honduras', 'Juticalpa ', 'JUT', 1, '2019-09-14 07:14:29'),
(685, 83, 'Honduras', 'Roatan ', 'RTB', 1, '2019-09-14 07:14:29'),
(686, 83, 'Honduras', 'San Pedro Sula ', 'SAP', 1, '2019-09-14 07:14:29'),
(687, 83, 'Honduras', 'Santa Rosa, Copan ', 'SDH', 1, '2019-09-14 07:14:29'),
(688, 83, 'Honduras', 'Tegucigalpa ', 'TGU', 1, '2019-09-14 07:14:29'),
(689, 83, 'Honduras', 'Utila ', 'UII', 1, '2019-09-14 07:14:29'),
(690, 84, 'Hong Kong', 'Hong Kong - Chek Lap Kok ', 'ZJK', 1, '2019-09-14 07:14:29'),
(691, 84, 'Hong Kong', 'Hong Kong - Int\'l Apt (HKIA) ', 'HKG', 1, '2019-09-14 07:14:29'),
(692, 85, 'Hungary', 'Budapest - Budapest Ferihegy Int\'l Apt ', 'BUD', 1, '2019-09-14 07:14:29'),
(693, 86, 'Iceland', 'Egilsstadir ', 'EGS', 1, '2019-09-14 07:14:29'),
(694, 86, 'Iceland', 'Reykjavik - Keflavik Int\'l ', 'KEF', 1, '2019-09-14 07:14:29'),
(695, 86, 'Iceland', 'Reykjavik - Metropolitan Area ', 'REK', 1, '2019-09-14 07:14:29'),
(696, 87, 'India', 'Ahmedabad ', 'AMD', 1, '2019-09-14 07:14:29'),
(697, 87, 'India', 'Amritsar ', 'ATQ', 1, '2019-09-14 07:14:29'),
(698, 87, 'India', 'Anand ', 'QNB', 1, '2019-09-14 07:14:29'),
(699, 87, 'India', 'Bagdogra ', 'IXB', 1, '2019-09-14 07:14:29'),
(700, 87, 'India', 'Bangalore ', 'BLR', 1, '2019-09-14 07:14:29'),
(701, 87, 'India', 'Baroda ', 'BDQ', 1, '2019-09-14 07:14:29'),
(703, 87, 'India', 'Bhopal ', 'BHO', 1, '2019-09-14 07:14:29'),
(704, 87, 'India', 'Bhubaneswar ', 'BBI', 1, '2019-09-14 07:14:29'),
(705, 87, 'India', 'Bombay (Mumbai) - Chhatrapati Shivaji Int\'l ', 'BOM', 1, '2019-09-14 07:14:29'),
(706, 87, 'India', 'Calicut ', 'CCJ', 1, '2019-09-14 07:14:29'),
(707, 87, 'India', 'Chandigarh - Chandigarh Int\'l Apt ', 'IXC', 1, '2019-09-14 07:14:29'),
(708, 87, 'India', 'Chennai (Madras) ', 'MAA', 1, '2019-09-14 07:14:29'),
(709, 87, 'India', 'Cochin ', 'COK', 1, '2019-09-14 07:14:29'),
(710, 87, 'India', 'Coimbatore ', 'CJB', 1, '2019-09-14 07:14:29'),
(711, 87, 'India', 'Delhi - Indira Gandhi Int\'l Apt ', 'DEL', 1, '2019-09-14 07:14:29'),
(712, 87, 'India', 'Goa ', 'GOI', 1, '2019-09-14 07:14:29'),
(713, 87, 'India', 'Guwahati ', 'GAU', 1, '2019-09-14 07:14:29'),
(714, 87, 'India', 'Hyderabad - Rajiv Gandhi Int\'l Apt ', 'HYD', 1, '2019-09-14 07:14:29'),
(715, 87, 'India', 'Jagdalpur ', 'JGB', 1, '2019-09-14 07:14:29'),
(716, 87, 'India', 'Jaipur - Sanganeer ', 'JAI', 1, '2019-09-14 07:14:29'),
(717, 87, 'India', 'Jaisalmer    ', 'JSA', 1, '2019-09-14 07:14:29'),
(718, 87, 'India', 'Jalandhar ', 'JLR', 1, '2019-09-14 07:14:29'),
(719, 87, 'India', 'Jammu - Satwari ', 'IXJ', 1, '2019-09-14 07:14:29'),
(720, 87, 'India', 'Jamnagar - Govardhanpur ', 'JGA', 1, '2019-09-14 07:14:29'),
(721, 87, 'India', 'Jamshedpur - Sonari Apt ', 'IXW', 1, '2019-09-14 07:14:29'),
(722, 87, 'India', 'Jeypore - Jeypore Apt ', 'PYB', 1, '2019-09-14 07:14:29'),
(723, 87, 'India', 'Jodhpur ', 'JDH', 1, '2019-09-14 07:14:29'),
(724, 87, 'India', 'Jorhat - Rowriah Apt ', 'JRH', 1, '2019-09-14 07:14:29'),
(725, 87, 'India', 'Kanpur ', 'KNU', 1, '2019-09-14 07:14:29'),
(726, 87, 'India', 'Kolkata (Calcutta) - Netaji Subhas Chandra ', 'CCU', 1, '2019-09-14 07:14:29'),
(727, 87, 'India', 'Lucknow ', 'LKO', 1, '2019-09-14 07:14:29'),
(728, 87, 'India', 'Mysore ', 'MYQ', 1, '2019-09-14 07:14:29'),
(729, 87, 'India', 'Nagpur ', 'NAG', 1, '2019-09-14 07:14:29'),
(730, 87, 'India', 'Patna ', 'PAT', 1, '2019-09-14 07:14:29'),
(731, 87, 'India', 'Pune ', 'PNQ', 1, '2019-09-14 07:14:29'),
(732, 87, 'India', 'Rajkot ', 'RAJ', 1, '2019-09-14 07:14:29'),
(733, 87, 'India', 'Ranchi ', 'IXR', 1, '2019-09-14 07:14:29'),
(734, 87, 'India', 'Srinagar ', 'SXR', 1, '2019-09-14 07:14:29'),
(735, 87, 'India', 'Surat ', 'STV', 1, '2019-09-14 07:14:29'),
(736, 87, 'India', 'Thiruvananthapuram ', 'TRV', 1, '2019-09-14 07:14:29'),
(737, 87, 'India', 'Tiruchirapally ', 'TRZ', 1, '2019-09-14 07:14:29'),
(738, 87, 'India', 'Udaipur - Dabok Apt ', 'UDR', 1, '2019-09-14 07:14:29'),
(739, 87, 'India', 'Varanasi ', 'VNS', 1, '2019-09-14 07:14:29'),
(740, 88, 'Indonesia', 'Ayawasi ', 'AYW', 1, '2019-09-14 07:14:29'),
(741, 88, 'Indonesia', 'Bandung - Husein Sastranegara Int\'l Apt ', 'BDO', 1, '2019-09-14 07:14:29'),
(742, 88, 'Indonesia', 'Denpasar/Bali ', 'DPS', 1, '2019-09-14 07:14:29'),
(743, 88, 'Indonesia', 'Jakarta - Halim Perdana Kusuma ', 'HLP', 1, '2019-09-14 07:14:29'),
(744, 88, 'Indonesia', 'Jakarta - Metropolitan Area ', 'JKT', 1, '2019-09-14 07:14:29'),
(745, 88, 'Indonesia', 'Jakarta - Soekarno-Hatta Int\'l ', 'CGK', 1, '2019-09-14 07:14:29'),
(746, 88, 'Indonesia', 'Jambi - Sultan Taha Syarifudn ', 'DJB', 1, '2019-09-14 07:14:29'),
(747, 88, 'Indonesia', 'Jayapura - Sentani ', 'DJJ', 1, '2019-09-14 07:14:29'),
(748, 88, 'Indonesia', 'Manado ', 'MDC', 1, '2019-09-14 07:14:29'),
(749, 88, 'Indonesia', 'Medan - Kualanamu Int\'l ', 'KNO', 1, '2019-09-14 07:14:29'),
(750, 88, 'Indonesia', 'Medan - Polania Int\'l (now Soewondo AFB) ', 'MES', 1, '2019-09-14 07:14:29'),
(751, 88, 'Indonesia', 'Surabaya - Juanda ', 'SUB', 1, '2019-09-14 07:14:29'),
(752, 88, 'Indonesia', 'Tioman ', 'TOD', 1, '2019-09-14 07:14:29'),
(753, 88, 'Indonesia', 'Ujung Pandang - Hasanudin Apt ', 'UPG', 1, '2019-09-14 07:14:29'),
(754, 89, 'Iran', 'Abadan ', 'ABD', 1, '2019-09-14 07:14:29'),
(755, 89, 'Iran', 'Tehran (Teheran) - Mehrabad ', 'THR', 1, '2019-09-14 07:14:29'),
(756, 89, 'Iran', 'Urmiehm (Orumieh) ', 'OMH', 1, '2019-09-14 07:14:29'),
(757, 90, 'Iraq', 'Bagdad - Baghdad Int\'l Apt ', 'BGW', 1, '2019-09-14 07:14:29'),
(758, 90, 'Iraq', 'Basra, Basrah ', 'BSR', 1, '2019-09-14 07:14:29'),
(759, 90, 'Iraq', 'Kirkuk ', 'KIK', 1, '2019-09-14 07:14:29'),
(760, 90, 'Iraq', 'Mosul ', 'OSM', 1, '2019-09-14 07:14:29'),
(761, 91, 'Ireland', 'Cork ', 'ORK', 1, '2019-09-14 07:14:29'),
(762, 91, 'Ireland', 'Donegal (Carrickfin) ', 'CFN', 1, '2019-09-14 07:14:29'),
(763, 91, 'Ireland', 'Dublin - Dublin Int\'l Apt ', 'DUB', 1, '2019-09-14 07:14:29'),
(764, 91, 'Ireland', 'Galway ', 'GWY', 1, '2019-09-14 07:14:29'),
(765, 91, 'Ireland', 'Kerry County ', 'KIR', 1, '2019-09-14 07:14:29'),
(766, 91, 'Ireland', 'Knock ', 'NOC', 1, '2019-09-14 07:14:29'),
(767, 91, 'Ireland', 'Shannon (Limerick) ', 'SNN', 1, '2019-09-14 07:14:29'),
(768, 91, 'Ireland', 'Sligo ', 'SXL', 1, '2019-09-14 07:14:29'),
(769, 92, 'Israel', 'Elat ', 'ETH', 1, '2019-09-14 07:14:29'),
(770, 92, 'Israel', 'Elat, Ovula ', 'VDA', 1, '2019-09-14 07:14:29'),
(771, 92, 'Israel', 'Haifa ', 'HFA', 1, '2019-09-14 07:14:29'),
(772, 92, 'Israel', 'Jerusalem - Atarot Apt', 'JRS', 1, '2019-09-14 07:14:29'),
(773, 92, 'Israel', 'Tel Aviv - Ben Gurion Int\'l ', 'TLV', 1, '2019-09-14 07:14:29'),
(778, 93, 'Italy', 'Bologna ', 'BLQ', 1, '2019-09-14 07:14:29'),
(779, 93, 'Italy', 'Brindisi ', 'BDS', 1, '2019-09-14 07:14:29'),
(783, 93, 'Italy', 'Florence (Firenze) - Peretola Apt ', 'FLR', 1, '2019-09-14 07:14:29'),
(784, 93, 'Italy', 'Genoa ', 'GOA', 1, '2019-09-14 07:14:29'),
(787, 93, 'Italy', 'Milan ', 'MIL', 1, '2019-09-14 07:14:29'),
(790, 93, 'Italy', 'Naples - Naples Capodichino Apt ', 'NAP', 1, '2019-09-14 07:14:29'),
(792, 93, 'Italy', 'Palermo - Punta Raisi ', 'PMO', 1, '2019-09-14 07:14:29'),
(796, 93, 'Italy', 'Pisa - Galileo Galilei ', 'PSA', 1, '2019-09-14 07:14:29'),
(799, 93, 'Italy', 'Rome ', 'ROM', 1, '2019-09-14 07:14:29'),
(804, 93, 'Italy', 'Trieste ', 'TRS', 1, '2019-09-14 07:14:29'),
(805, 93, 'Italy', 'Turin ', 'TRN', 1, '2019-09-14 07:14:29'),
(806, 93, 'Italy', 'Venice - Marco Polo ', 'VCE', 1, '2019-09-14 07:14:29'),
(809, 94, 'Jamaica', 'Kingston - Norman Manley ', 'KIN', 1, '2019-09-14 07:14:29'),
(810, 94, 'Jamaica', 'Montego Bay - Sangster Int\'l ', 'MBJ', 1, '2019-09-14 07:14:29'),
(815, 95, 'Japan', 'Fukuoka ', 'FUK', 1, '2019-09-14 07:14:29'),
(816, 95, 'Japan', 'Fukushima - Fukushima Apt ', 'FKS', 1, '2019-09-14 07:14:29'),
(822, 95, 'Japan', 'Kobe ', 'UKB', 1, '2019-09-14 07:14:29'),
(827, 95, 'Japan', 'Kyoto ', 'UKY', 1, '2019-09-14 07:14:29'),
(833, 95, 'Japan', 'Nagasaki ', 'NGS', 1, '2019-09-14 07:14:29'),
(841, 95, 'Japan', 'Osaka, Metropolitan Area ', 'OSA', 1, '2019-09-14 07:14:29'),
(849, 95, 'Japan', 'Tokyo ', 'TYO', 1, '2019-09-14 07:14:29'),
(855, 95, 'Japan', 'Yokohama ', 'YOK', 1, '2019-09-14 07:14:29'),
(856, 96, 'Jordan', 'Amman - Amman-Marka Int\'l Apt ', 'ADJ', 1, '2019-09-14 07:14:29'),
(857, 96, 'Jordan', 'Amman - Queen Alia Int\'l Apt ', 'AMM', 1, '2019-09-14 07:14:29'),
(858, 96, 'Jordan', 'Aqaba ', 'AQJ', 1, '2019-09-14 07:14:29'),
(859, 97, 'Kazakhstan', 'Almaty (Alma Ata) - Almaty Int\'l Apt ', 'ALA', 1, '2019-09-14 07:14:29'),
(860, 97, 'Kazakhstan', 'Astana - Astana Int\'l Apt ', 'TSE', 1, '2019-09-14 07:14:29'),
(861, 98, 'Kenya', 'Malindi ', 'MYD', 1, '2019-09-14 07:14:29'),
(862, 98, 'Kenya', 'Mombasa - Moi Int\'l ', 'MBA', 1, '2019-09-14 07:14:29'),
(863, 98, 'Kenya', 'Nairobi ', 'NBO', 1, '2019-09-14 07:14:29'),
(864, 0, 'Kiribati', 'Kiritimati (island) - Cassidy Int\'l Apt ', 'CXI', 1, '2019-09-14 07:14:29'),
(865, 99, 'Korea, Dem. People\'s Rep', 'Pyongyang - Sunan Int\'l Apt ', 'FNJ', 1, '2019-09-14 07:14:29'),
(866, 0, 'Kosovo', 'Not Applicable', 'KOS', 1, '2019-09-14 07:14:29'),
(867, 101, 'Kuwait', 'Kuwait - Kuwait Int\'l ', 'KWI', 1, '2019-09-14 07:14:29'),
(868, 102, 'Kyrgyzstan', 'Bishkek - Manas Int\'l Apt ', 'FRU', 1, '2019-09-14 07:14:29'),
(869, 103, 'Lao, People\'s Dem. Rep', 'Vientiane - Wattay ', 'VTE', 1, '2019-09-14 07:14:29'),
(870, 104, 'Latvia', 'Riga ', 'RIX', 1, '2019-09-14 07:14:29'),
(871, 105, 'Lebanon', 'Beirut - Beirut Rafic Hariri Int\'l Apt ', 'BEY', 1, '2019-09-14 07:14:29'),
(872, 106, 'Lesotho', 'Maseru - Moshoeshoe Int\'l ', 'MSU', 1, '2019-09-14 07:14:29'),
(873, 107, 'Liberia', 'Monrovia - Metropolitan Area ', 'MLW', 1, '2019-09-14 07:14:29'),
(874, 107, 'Liberia', 'Monrovia - Roberts Int\'l ', 'ROB', 1, '2019-09-14 07:14:29'),
(875, 108, 'Libya', 'Benghazi (Bengasi) ', 'BEN', 1, '2019-09-14 07:14:29'),
(876, 108, 'Libya', 'Sehba ', 'SEB', 1, '2019-09-14 07:14:29'),
(877, 108, 'Libya', 'Tripoli - Tripoli Int\'l ', 'TIP', 1, '2019-09-14 07:14:29'),
(878, 109, 'Liechtenstein', 'Not Applicable', 'LIC', 1, '2019-09-14 07:14:29'),
(879, 110, 'Lithuania', 'Wilna (Vilnius) ', 'VNO', 1, '2019-09-14 07:14:29'),
(880, 111, 'Luxembourg', 'Luxembourg ', 'LUX', 1, '2019-09-14 07:14:29'),
(881, 112, 'Macau', 'Macau - Macau Int\'l Apt ', 'MFM', 1, '2019-09-14 07:14:29'),
(882, 0, 'Macedonia', 'Ohrid ', 'OHD', 1, '2019-09-14 07:14:29'),
(883, 0, 'Macedonia', 'Skopje ', 'SKP', 1, '2019-09-14 07:14:29'),
(884, 114, 'Madagascar', 'Antananarivo (Tanannarive) - Ivato Int\'l Apt ', 'TNR', 1, '2019-09-14 07:14:29'),
(885, 114, 'Madagascar', 'Majunga ', 'MJN', 1, '2019-09-14 07:14:29'),
(886, 115, 'Malawi', 'Blantyre (Mandala) - Chileka Int\'l Apt ', 'BLZ', 1, '2019-09-14 07:14:29'),
(887, 115, 'Malawi', 'Lilongwe - Lilongwe Int\'l ', 'LLW', 1, '2019-09-14 07:14:29'),
(888, 116, 'Malaysia', 'Bintulu ', 'BTU', 1, '2019-09-14 07:14:29'),
(889, 116, 'Malaysia', 'Johor Bahru - Sultan Ismail Int\'l ', 'JHB', 1, '2019-09-14 07:14:29'),
(890, 116, 'Malaysia', 'Kota Kinabalu ', 'BKI', 1, '2019-09-14 07:14:29'),
(891, 116, 'Malaysia', 'Kuala Lumpur - Int\'l Apt ', 'KUL', 1, '2019-09-14 07:14:29'),
(892, 116, 'Malaysia', 'Kuala Lumpur - Sultan Abdul Aziz Shah ', 'SZB', 1, '2019-09-14 07:14:29'),
(893, 116, 'Malaysia', 'Kuantan ', 'KUA', 1, '2019-09-14 07:14:29'),
(894, 116, 'Malaysia', 'Kuching ', 'KCH', 1, '2019-09-14 07:14:29'),
(895, 116, 'Malaysia', 'Labuan ', 'LBU', 1, '2019-09-14 07:14:29'),
(896, 116, 'Malaysia', 'Langkawi (islands) ', 'LGK', 1, '2019-09-14 07:14:29'),
(897, 116, 'Malaysia', 'Miri ', 'MYY', 1, '2019-09-14 07:14:29'),
(898, 116, 'Malaysia', 'Penang Int\'l ', 'PEN', 1, '2019-09-14 07:14:29'),
(899, 116, 'Malaysia', 'Sibu ', 'SBW', 1, '2019-09-14 07:14:29'),
(900, 116, 'Malaysia', 'Tawau ', 'TWU', 1, '2019-09-14 07:14:29'),
(901, 117, 'Maldives', 'Male - Velana Int\'l Apt ', 'MLE', 1, '2019-09-14 07:14:29'),
(902, 118, 'Mali', 'Bamako - Bamako-Sénou Int\'l Apt ', 'BKO', 1, '2019-09-14 07:14:29'),
(903, 119, 'Malta', 'Luga ', 'MLA', 1, '2019-09-14 07:14:29'),
(904, 0, 'Marshall Islands', 'Jaluit Island   ', 'UIT', 1, '2019-09-14 07:14:29'),
(905, 120, 'Martinique', 'Fort de France - Martinique Aimé Césaire Int\'l ', 'FDF', 1, '2019-09-14 07:14:29'),
(906, 121, 'Mauritania', 'Nouadhibou ', 'NDB', 1, '2019-09-14 07:14:29'),
(907, 121, 'Mauritania', 'Nouakchott ', 'NKC', 1, '2019-09-14 07:14:29'),
(908, 121, 'Mauritania', 'Zouerate ', 'OUZ', 1, '2019-09-14 07:14:29'),
(909, 122, 'Mauritius', 'Mauritius - S.Seewoosagur Ram Int\'l ', 'MRU', 1, '2019-09-14 07:14:29'),
(910, 122, 'Mauritius', 'Rodrigues Island ', 'RRG', 1, '2019-09-14 07:14:29'),
(911, 123, 'Mexico', 'Acapulco ', 'ACA', 1, '2019-09-14 07:14:29'),
(913, 123, 'Mexico', 'Cancun ', 'CUN', 1, '2019-09-14 07:14:29'),
(918, 123, 'Mexico', 'Ciudad Obregon ', 'CEN', 1, '2019-09-14 07:14:29'),
(921, 123, 'Mexico', 'Cozmel ', 'CZM', 1, '2019-09-14 07:14:29'),
(922, 123, 'Mexico', 'Culiacan ', 'CUL', 1, '2019-09-14 07:14:29'),
(923, 123, 'Mexico', 'Guadalajara ', 'GDL', 1, '2019-09-14 07:14:29'),
(939, 123, 'Mexico', 'Mexico City - Mexico City Int\'l Apt ', 'MEX', 1, '2019-09-14 07:14:30'),
(943, 123, 'Mexico', 'Monterrey - Gen. Mariano Escobedo ', 'MTY', 1, '2019-09-14 07:14:30'),
(949, 123, 'Mexico', 'Puerto Vallarta ', 'PVR', 1, '2019-09-14 07:14:30'),
(956, 123, 'Mexico', 'Veracruz ', 'VER', 1, '2019-09-14 07:14:30'),
(957, 123, 'Mexico', 'Villahermosa ', 'VSA', 1, '2019-09-14 07:14:30'),
(959, 0, 'Micronesia', 'Pohnpei ', 'PNI', 1, '2019-09-14 07:14:30'),
(960, 124, 'Moldova, Republic of,', 'Chisinau - Chişinău Int\'l Apt ', 'KIV', 1, '2019-09-14 07:14:30'),
(961, 125, 'Monaco', 'Not Applicable', 'MON', 1, '2019-09-14 07:14:30'),
(962, 126, 'Mongolia', 'Ulaanbaatar - Buyant Uhaa Apt ', 'ULN', 1, '2019-09-14 07:14:30'),
(963, 0, 'Montenegro ', 'Podgorica ', 'TGD', 1, '2019-09-14 07:14:30'),
(964, 0, 'Montenegro ', 'Tivat ', 'TIV', 1, '2019-09-14 07:14:30'),
(965, 127, 'Montserrat', 'Not Applicable', 'MOS', 1, '2019-09-14 07:14:30'),
(966, 128, 'Morocco', 'Agadir ', 'AGA', 1, '2019-09-14 07:14:30'),
(967, 128, 'Morocco', 'Al Hoceima ', 'AHU', 1, '2019-09-14 07:14:30'),
(968, 128, 'Morocco', 'Casablanca ', 'CAS', 1, '2019-09-14 07:14:30'),
(969, 128, 'Morocco', 'Casablanca, Mohamed V ', 'CMN', 1, '2019-09-14 07:14:30'),
(970, 128, 'Morocco', 'Fes ', 'FEZ', 1, '2019-09-14 07:14:30'),
(971, 128, 'Morocco', 'Marrakesh - Menara Apt ', 'RAK', 1, '2019-09-14 07:14:30'),
(972, 128, 'Morocco', 'Ouarzazate ', 'OZZ', 1, '2019-09-14 07:14:30'),
(973, 128, 'Morocco', 'Oujda ', 'OUD', 1, '2019-09-14 07:14:30'),
(974, 128, 'Morocco', 'Rabat - Rabat-Salé Apt ', 'RBA', 1, '2019-09-14 07:14:30'),
(975, 128, 'Morocco', 'Tangier - Boukhalef ', 'TNG', 1, '2019-09-14 07:14:30'),
(976, 129, 'Mozambique', 'Beira ', 'BEW', 1, '2019-09-14 07:14:30'),
(977, 129, 'Mozambique', 'Maputo - Maputo Int\'l ', 'MPM', 1, '2019-09-14 07:14:30'),
(978, 130, 'Myanmar', 'Mandalay - Mandalay-Annisaton Apt ', 'MDL', 1, '2019-09-14 07:14:30'),
(979, 130, 'Myanmar', 'Rangoon (Yangon) - Mingaladon ', 'RGN', 1, '2019-09-14 07:14:30'),
(980, 131, 'Namibia', 'Katima Mulilo/Mpacha ', 'MPA', 1, '2019-09-14 07:14:30'),
(981, 131, 'Namibia', 'Keetmanshoop ', 'KMP', 1, '2019-09-14 07:14:30'),
(982, 131, 'Namibia', 'Luederitz ', 'LUD', 1, '2019-09-14 07:14:30'),
(983, 131, 'Namibia', 'Mokuti ', 'OKU', 1, '2019-09-14 07:14:30'),
(984, 131, 'Namibia', 'Ondangwa ', 'OND', 1, '2019-09-14 07:14:30'),
(985, 131, 'Namibia', 'Oranjemund ', 'OMD', 1, '2019-09-14 07:14:30'),
(986, 131, 'Namibia', 'Rundu ', 'NDU', 1, '2019-09-14 07:14:30'),
(987, 131, 'Namibia', 'Swakopmund ', 'SWP', 1, '2019-09-14 07:14:30'),
(988, 131, 'Namibia', 'Tsumeb ', 'TSB', 1, '2019-09-14 07:14:30'),
(989, 131, 'Namibia', 'Windhoek - Eros ', 'ERS', 1, '2019-09-14 07:14:30'),
(990, 131, 'Namibia', 'Windhoek - Hosea Kutako Int\'l ', 'WDH', 1, '2019-09-14 07:14:30'),
(991, 0, 'Nauru', 'Not Applicable', 'NAU', 1, '2019-09-14 07:14:30'),
(992, 132, 'Nepal', 'Janakpur ', 'JKR', 1, '2019-09-14 07:14:30'),
(993, 132, 'Nepal', 'Jiri ', 'JIR', 1, '2019-09-14 07:14:30'),
(994, 132, 'Nepal', 'Jomsom ', 'JMO', 1, '2019-09-14 07:14:30'),
(995, 132, 'Nepal', 'Jumla ', 'JUM', 1, '2019-09-14 07:14:30'),
(996, 132, 'Nepal', 'Kathmandu - Tribhuvan Int\'l Apt ', 'KTM', 1, '2019-09-14 07:14:30'),
(997, 134, 'Netherlands', 'Amsterdam - Amsterdam Apt Schiphol ', 'AMS', 1, '2019-09-14 07:14:30'),
(998, 134, 'Netherlands', 'Den Haag (The Hague) ', 'HAG', 1, '2019-09-14 07:14:30'),
(999, 134, 'Netherlands', 'Eindhoven ', 'EIN', 1, '2019-09-14 07:14:30'),
(1000, 134, 'Netherlands', 'Groningen - Eelde ', 'GRQ', 1, '2019-09-14 07:14:30'),
(1001, 134, 'Netherlands', 'Lelystad ', 'LEY', 1, '2019-09-14 07:14:30'),
(1002, 134, 'Netherlands', 'Maastricht/Aachen ', 'MST', 1, '2019-09-14 07:14:30'),
(1003, 134, 'Netherlands', 'Rotterdam ', 'RTM', 1, '2019-09-14 07:14:30'),
(1004, 134, 'Netherlands', 'Uden - Volkel Apt ', 'UDE', 1, '2019-09-14 07:14:30'),
(1005, 133, 'Netherlands Antilles', 'Bonaire ', 'BON', 1, '2019-09-14 07:14:30'),
(1006, 133, 'Netherlands Antilles', 'Curacao - Curaçao Int\'l Apt ', 'CUR', 1, '2019-09-14 07:14:30'),
(1007, 133, 'Netherlands Antilles', 'St. Marteen ', 'SXM', 1, '2019-09-14 07:14:30'),
(1008, 0, 'New Caledonia', 'Ile des Pins ', 'ILP', 1, '2019-09-14 07:14:30'),
(1009, 0, 'New Caledonia', 'Ile Ouen ', 'IOU', 1, '2019-09-14 07:14:30'),
(1010, 0, 'New Caledonia', 'Mare ', 'MEE', 1, '2019-09-14 07:14:30'),
(1011, 0, 'New Caledonia', 'Noumea ', 'NOU', 1, '2019-09-14 07:14:30'),
(1012, 0, 'New Caledonia', 'Touho ', 'TOU', 1, '2019-09-14 07:14:30'),
(1013, 135, 'New Zealand', 'Auckland - Auckland Int\'l Apt ', 'AKL', 1, '2019-09-14 07:14:30'),
(1014, 135, 'New Zealand', 'Blenheim ', 'BHE', 1, '2019-09-14 07:14:30'),
(1015, 135, 'New Zealand', 'Christchurch ', 'CHC', 1, '2019-09-14 07:14:30'),
(1016, 135, 'New Zealand', 'Dunedin ', 'DUD', 1, '2019-09-14 07:14:30'),
(1017, 135, 'New Zealand', 'Hamilton ', 'HLZ', 1, '2019-09-14 07:14:30'),
(1018, 135, 'New Zealand', 'Incercargill ', 'IVC', 1, '2019-09-14 07:14:30'),
(1019, 135, 'New Zealand', 'Milford Sound ', 'MFN', 1, '2019-09-14 07:14:30'),
(1020, 135, 'New Zealand', 'Mount Cook ', 'GTN', 1, '2019-09-14 07:14:30'),
(1021, 135, 'New Zealand', 'Nelson ', 'NSN', 1, '2019-09-14 07:14:30'),
(1022, 135, 'New Zealand', 'Palmerston North ', 'PMR', 1, '2019-09-14 07:14:30'),
(1023, 135, 'New Zealand', 'Queenstown ', 'ZQN', 1, '2019-09-14 07:14:30'),
(1024, 135, 'New Zealand', 'Rotorua ', 'ROT', 1, '2019-09-14 07:14:30'),
(1025, 135, 'New Zealand', 'Te Anau ', 'TEU', 1, '2019-09-14 07:14:30'),
(1026, 135, 'New Zealand', 'Wellington ', 'WLG', 1, '2019-09-14 07:14:30'),
(1027, 135, 'New Zealand', 'Whakatane ', 'WHK', 1, '2019-09-14 07:14:30'),
(1028, 135, 'New Zealand', 'Whangarei ', 'WRE', 1, '2019-09-14 07:14:30'),
(1029, 136, 'Nicaragua', 'Managua - Augusto C Sandino ', 'MGA', 1, '2019-09-14 07:14:30'),
(1030, 137, 'Niger', 'Agades ', 'AJY', 1, '2019-09-14 07:14:30'),
(1031, 137, 'Niger', 'Arlit ', 'RLT', 1, '2019-09-14 07:14:30'),
(1032, 137, 'Niger', 'Maradi ', 'MFQ', 1, '2019-09-14 07:14:30');
INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
(1033, 137, 'Niger', 'Niamey ', 'NIM', 1, '2019-09-14 07:14:30'),
(1034, 137, 'Niger', 'Zinder ', 'ZND', 1, '2019-09-14 07:14:30'),
(1035, 138, 'Nigeria', 'Abuja - Nnamdi Azikiwe Int\'l Apt ', 'ABV', 1, '2019-09-14 07:14:30'),
(1036, 138, 'Nigeria', 'Jos ', 'JOS', 1, '2019-09-14 07:14:30'),
(1037, 138, 'Nigeria', 'Kano ', 'KAN', 1, '2019-09-14 07:14:30'),
(1038, 138, 'Nigeria', 'Lagos - Murtala Muhammed Apt ', 'LOS', 1, '2019-09-14 07:14:30'),
(1039, 138, 'Nigeria', 'Port Harcourt ', 'PHC', 1, '2019-09-14 07:14:30'),
(1040, 0, 'North Macedonia', 'Not Applicable', 'NMC', 1, '2019-09-14 07:14:30'),
(1041, 0, 'Northern Mariana Islands', 'Saipan ', 'SPN', 1, '2019-09-14 07:14:30'),
(1042, 139, 'Norway', 'Alesund ', 'AES', 1, '2019-09-14 07:14:30'),
(1043, 139, 'Norway', 'Alta ', 'ALF', 1, '2019-09-14 07:14:30'),
(1044, 139, 'Norway', 'Bardufoss ', 'BDU', 1, '2019-09-14 07:14:30'),
(1045, 139, 'Norway', 'Bergen ', 'BGO', 1, '2019-09-14 07:14:30'),
(1046, 139, 'Norway', 'Bodo ', 'BOO', 1, '2019-09-14 07:14:30'),
(1047, 139, 'Norway', 'Broennoeysund ', 'BNN', 1, '2019-09-14 07:14:30'),
(1048, 139, 'Norway', 'Evenes ', 'EVE', 1, '2019-09-14 07:14:30'),
(1049, 139, 'Norway', 'Floro ', 'FRO', 1, '2019-09-14 07:14:30'),
(1050, 139, 'Norway', 'Hammerfest ', 'HFT', 1, '2019-09-14 07:14:30'),
(1051, 139, 'Norway', 'Haugesund ', 'HAU', 1, '2019-09-14 07:14:30'),
(1052, 139, 'Norway', 'Kirkenes ', 'KKN', 1, '2019-09-14 07:14:30'),
(1053, 139, 'Norway', 'Kristiansand ', 'KRS', 1, '2019-09-14 07:14:30'),
(1054, 139, 'Norway', 'Kristiansund ', 'KSU', 1, '2019-09-14 07:14:30'),
(1055, 139, 'Norway', 'Lakselv ', 'LKL', 1, '2019-09-14 07:14:30'),
(1056, 139, 'Norway', 'Longyearbyen - Svalbard ', 'LYR', 1, '2019-09-14 07:14:30'),
(1057, 139, 'Norway', 'Oslo - Fornebu ', 'FBU', 1, '2019-09-14 07:14:30'),
(1058, 139, 'Norway', 'Oslo - Oslo Apt, Gardermoen ', 'OSL', 1, '2019-09-14 07:14:30'),
(1059, 139, 'Norway', 'Oslo - Sandefjord ', 'TRF', 1, '2019-09-14 07:14:30'),
(1060, 139, 'Norway', 'Sogndal ', 'SOG', 1, '2019-09-14 07:14:30'),
(1061, 139, 'Norway', 'Stavanger ', 'SVG', 1, '2019-09-14 07:14:30'),
(1062, 139, 'Norway', 'Tromsoe ', 'TOS', 1, '2019-09-14 07:14:30'),
(1063, 139, 'Norway', 'Trondheim ', 'TRD', 1, '2019-09-14 07:14:30'),
(1064, 140, 'Oman', 'Muscat - Seeb ', 'MCT', 1, '2019-09-14 07:14:30'),
(1065, 140, 'Oman', 'Salalah ', 'SLL', 1, '2019-09-14 07:14:30'),
(1066, 141, 'Pacific Islands', 'Not Applicable', 'PIL', 1, '2019-09-14 07:14:30'),
(1067, 142, 'Pakistan', 'Bahawalpur ', 'BHV', 1, '2019-09-14 07:14:30'),
(1068, 142, 'Pakistan', 'Bannu ', 'BNP', 1, '2019-09-14 07:14:30'),
(1069, 142, 'Pakistan', 'Chitral ', 'CJL', 1, '2019-09-14 07:14:30'),
(1070, 142, 'Pakistan', 'Dera Ismail Khan - Dera Ismail Khan Apt ', 'DSK', 1, '2019-09-14 07:14:30'),
(1071, 142, 'Pakistan', 'Faisalabad ', 'LYP', 1, '2019-09-14 07:14:30'),
(1072, 142, 'Pakistan', 'Gilgit ', 'GIL', 1, '2019-09-14 07:14:30'),
(1073, 142, 'Pakistan', 'Gwadar ', 'GWD', 1, '2019-09-14 07:14:30'),
(1074, 142, 'Pakistan', 'Hyderabad ', 'HDD', 1, '2019-09-14 07:14:30'),
(1075, 142, 'Pakistan', 'Islamabad - Benazir Bhutto Int\'l Apt ', 'ISB', 1, '2019-09-14 07:14:30'),
(1076, 142, 'Pakistan', 'Jacobabad ', 'JAG', 1, '2019-09-14 07:14:30'),
(1077, 142, 'Pakistan', 'Jiwani ', 'JIW', 1, '2019-09-14 07:14:30'),
(1078, 142, 'Pakistan', 'Karachi - Jinnah Int\'l Apt ', 'KHI', 1, '2019-09-14 07:14:30'),
(1079, 142, 'Pakistan', 'Khuzdar ', 'KDD', 1, '2019-09-14 07:14:30'),
(1080, 142, 'Pakistan', 'Kohat ', 'OHT', 1, '2019-09-14 07:14:30'),
(1081, 142, 'Pakistan', 'Lahore ', 'LHE', 1, '2019-09-14 07:14:30'),
(1082, 142, 'Pakistan', 'Mianwali ', 'MWD', 1, '2019-09-14 07:14:30'),
(1083, 142, 'Pakistan', 'Mirpur ', 'QML', 1, '2019-09-14 07:14:30'),
(1084, 142, 'Pakistan', 'Moenjodaro ', 'MJD', 1, '2019-09-14 07:14:30'),
(1085, 142, 'Pakistan', 'Multan ', 'MUX', 1, '2019-09-14 07:14:30'),
(1086, 142, 'Pakistan', 'Muzaffarabad ', 'MFG', 1, '2019-09-14 07:14:30'),
(1087, 142, 'Pakistan', 'Nawab Shah ', 'WNS', 1, '2019-09-14 07:14:30'),
(1088, 142, 'Pakistan', 'Panjgur ', 'PJG', 1, '2019-09-14 07:14:30'),
(1089, 142, 'Pakistan', 'Pasni ', 'PSI', 1, '2019-09-14 07:14:30'),
(1090, 142, 'Pakistan', 'Peshawar ', 'PEW', 1, '2019-09-14 07:14:30'),
(1091, 142, 'Pakistan', 'Quetta ', 'UET', 1, '2019-09-14 07:14:30'),
(1092, 142, 'Pakistan', 'Rahim Yar Khan - Shaikh Zayed Int\'l Apt ', 'RYK', 1, '2019-09-14 07:14:30'),
(1093, 142, 'Pakistan', 'Rawala Kot ', 'RAZ', 1, '2019-09-14 07:14:30'),
(1094, 142, 'Pakistan', 'Rawalpindi ', 'RWP', 1, '2019-09-14 07:14:30'),
(1095, 142, 'Pakistan', 'Saidu Sharif ', 'SDT', 1, '2019-09-14 07:14:30'),
(1096, 142, 'Pakistan', 'Sindhri ', 'MPD', 1, '2019-09-14 07:14:30'),
(1097, 142, 'Pakistan', 'Skardu ', 'KDU', 1, '2019-09-14 07:14:30'),
(1098, 142, 'Pakistan', 'Sui ', 'SUL', 1, '2019-09-14 07:14:30'),
(1099, 142, 'Pakistan', 'Sukkur ', 'SKZ', 1, '2019-09-14 07:14:30'),
(1100, 142, 'Pakistan', 'Turbat ', 'TUK', 1, '2019-09-14 07:14:30'),
(1101, 142, 'Pakistan', 'Zhob ', 'PZH', 1, '2019-09-14 07:14:30'),
(1102, 0, 'Palestinian Territory ', 'Gaza City - Gaza Int\'l Apt ', 'GZA', 1, '2019-09-14 07:14:30'),
(1103, 144, 'Panama', 'Jaque    ', 'JQE', 1, '2019-09-14 07:14:30'),
(1104, 144, 'Panama', 'Panama City - Tocumen Int\'l ', 'PTY', 1, '2019-09-14 07:14:30'),
(1105, 145, 'Papua New Guinea', 'Aiyura ', 'AYU', 1, '2019-09-14 07:14:30'),
(1106, 145, 'Papua New Guinea', 'Amazon Bay ', 'AZB', 1, '2019-09-14 07:14:30'),
(1107, 145, 'Papua New Guinea', 'Jacquinot Bay ', 'JAQ', 1, '2019-09-14 07:14:30'),
(1108, 145, 'Papua New Guinea', 'Lae - Lae Nadzab Apt ', 'LAE', 1, '2019-09-14 07:14:30'),
(1109, 145, 'Papua New Guinea', 'Manguna ', 'MFO', 1, '2019-09-14 07:14:30'),
(1110, 145, 'Papua New Guinea', 'Port Moresby - Jackson Field ', 'POM', 1, '2019-09-14 07:14:30'),
(1111, 146, 'Paraguay', 'Asuncion - Asunción Int\'l Apt ', 'ASU', 1, '2019-09-14 07:14:30'),
(1112, 147, 'Peru', 'Iquitos ', 'IQT', 1, '2019-09-14 07:14:30'),
(1113, 147, 'Peru', 'Jauja ', 'JAU', 1, '2019-09-14 07:14:30'),
(1114, 147, 'Peru', 'Juanjui ', 'JJI', 1, '2019-09-14 07:14:30'),
(1115, 147, 'Peru', 'Juliaca ', 'JUL', 1, '2019-09-14 07:14:30'),
(1116, 147, 'Peru', 'Lima - J Chavez Int\'l ', 'LIM', 1, '2019-09-14 07:14:30'),
(1117, 148, 'Philippines', 'Cebu City - Mactan-Cebu Int\'l ', 'CEB', 1, '2019-09-14 07:14:30'),
(1118, 148, 'Philippines', 'Cuyo ', 'CYU', 1, '2019-09-14 07:14:30'),
(1119, 148, 'Philippines', 'Jolo ', 'JOL', 1, '2019-09-14 07:14:30'),
(1120, 148, 'Philippines', 'Mactan Island - Nab ', 'NOP', 1, '2019-09-14 07:14:30'),
(1121, 148, 'Philippines', 'Manila - Ninoy Aquino Int\'l ', 'MNL', 1, '2019-09-14 07:14:30'),
(1122, 149, 'Poland', 'Gdansk ', 'GDN', 1, '2019-09-14 07:14:30'),
(1123, 149, 'Poland', 'Krakow (Cracow) - John Paul II Int\'l Apt ', 'KRK', 1, '2019-09-14 07:14:30'),
(1124, 149, 'Poland', 'Poznan, Lawica ', 'POZ', 1, '2019-09-14 07:14:30'),
(1125, 149, 'Poland', 'Stettin ', 'SZZ', 1, '2019-09-14 07:14:30'),
(1126, 149, 'Poland', 'Warsaw - Frédéric Chopin ', 'WAW', 1, '2019-09-14 07:14:30'),
(1127, 150, 'Portugal', 'Faro ', 'FAO', 1, '2019-09-14 07:14:30'),
(1128, 150, 'Portugal', 'Funchal ', 'FNC', 1, '2019-09-14 07:14:30'),
(1129, 150, 'Portugal', 'Horta ', 'HOR', 1, '2019-09-14 07:14:30'),
(1130, 150, 'Portugal', 'Lisbon - Lisboa ', 'LIS', 1, '2019-09-14 07:14:30'),
(1131, 150, 'Portugal', 'Ponta Delgada ', 'PDL', 1, '2019-09-14 07:14:30'),
(1132, 150, 'Portugal', 'Porto ', 'OPO', 1, '2019-09-14 07:14:30'),
(1133, 150, 'Portugal', 'Porto Santo ', 'PXO', 1, '2019-09-14 07:14:30'),
(1134, 150, 'Portugal', 'Santa Maria ', 'SMA', 1, '2019-09-14 07:14:30'),
(1135, 150, 'Portugal', 'Terceira ', 'TER', 1, '2019-09-14 07:14:30'),
(1136, 151, 'Puerto Rico', 'Aguadilla ', 'BQN', 1, '2019-09-14 07:14:30'),
(1137, 151, 'Puerto Rico', 'Mayaguez ', 'MAZ', 1, '2019-09-14 07:14:30'),
(1138, 151, 'Puerto Rico', 'Ponce ', 'PSE', 1, '2019-09-14 07:14:30'),
(1139, 151, 'Puerto Rico', 'San Juan - Luis Munoz Marin Int\'l Apt ', 'SJU', 1, '2019-09-14 07:14:30'),
(1140, 152, 'Qatar', 'Doha - Doha Int\'l Apt ', 'DOH', 1, '2019-09-14 07:14:30'),
(1141, 0, 'Reunion Island', 'Saint Denis - Roland Garros Apt ', 'RUN', 1, '2019-09-14 07:14:30'),
(1142, 153, 'Romania', 'Bucharest ', 'BUH', 1, '2019-09-14 07:14:30'),
(1143, 153, 'Romania', 'Bucharest - Henri Coandă Int\'l Apt ', 'OTP', 1, '2019-09-14 07:14:30'),
(1144, 153, 'Romania', 'Constanta (Constanța) - Constanta Int\'l Apt ', 'CND', 1, '2019-09-14 07:14:30'),
(1145, 154, 'Russian Federation', 'Adler/Sochi ', 'AER', 1, '2019-09-14 07:14:30'),
(1146, 154, 'Russian Federation', 'Arkhangelsk ', 'ARH', 1, '2019-09-14 07:14:30'),
(1147, 154, 'Russian Federation', 'Chabarovsk (Khabarovsk) ', 'KHV', 1, '2019-09-14 07:14:30'),
(1148, 154, 'Russian Federation', 'Chita (Tschita) ', 'HTA', 1, '2019-09-14 07:14:30'),
(1149, 154, 'Russian Federation', 'Irkutsk ', 'IKT', 1, '2019-09-14 07:14:30'),
(1150, 154, 'Russian Federation', 'Kaliningrad ', 'KGD', 1, '2019-09-14 07:14:30'),
(1151, 154, 'Russian Federation', 'Kazan - Kazan Int\'l Apt ', 'KZN', 1, '2019-09-14 07:14:30'),
(1152, 154, 'Russian Federation', 'Mineralnye Vody ', 'MRV', 1, '2019-09-14 07:14:30'),
(1153, 154, 'Russian Federation', 'Moscow - Domodedovo ', 'DME', 1, '2019-09-14 07:14:30'),
(1154, 154, 'Russian Federation', 'Moscow - Metropolitan Area ', 'MOW', 1, '2019-09-14 07:14:30'),
(1155, 154, 'Russian Federation', 'Moscow - Sheremetyevo ', 'SVO', 1, '2019-09-14 07:14:30'),
(1156, 154, 'Russian Federation', 'Moscow - Vnukovo ', 'VKO', 1, '2019-09-14 07:14:30'),
(1157, 154, 'Russian Federation', 'Murmansk ', 'MMK', 1, '2019-09-14 07:14:30'),
(1158, 154, 'Russian Federation', 'Nizhny Novgorod - Strigino Int\'l Apt ', 'GOJ', 1, '2019-09-14 07:14:30'),
(1159, 154, 'Russian Federation', 'Novosibirsk - Tolmachevo Apt ', 'OVB', 1, '2019-09-14 07:14:30'),
(1160, 154, 'Russian Federation', 'Rostov-on-Don - Platov Int\'l Apt ', 'ROV', 1, '2019-09-14 07:14:30'),
(1161, 154, 'Russian Federation', 'Rostov-on-Don - Rostov-on-Don Apt ', 'RVI', 1, '2019-09-14 07:14:30'),
(1162, 154, 'Russian Federation', 'Samara - Kurumoch Int\'l Apt ', 'KUF', 1, '2019-09-14 07:14:30'),
(1163, 154, 'Russian Federation', 'Saransk - Saransk Apt ', 'SKX', 1, '2019-09-14 07:14:30'),
(1164, 154, 'Russian Federation', 'St. Petersburg (Leningrad) - Pulkovo ', 'LED', 1, '2019-09-14 07:14:30'),
(1165, 154, 'Russian Federation', 'Ufa ', 'UFA', 1, '2019-09-14 07:14:30'),
(1166, 154, 'Russian Federation', 'Ukhta ', 'UCT', 1, '2019-09-14 07:14:30'),
(1167, 154, 'Russian Federation', 'Ulan-Ude ', 'UUD', 1, '2019-09-14 07:14:30'),
(1168, 154, 'Russian Federation', 'Velikiye Luki (Welikije Luki) ', 'VLU', 1, '2019-09-14 07:14:30'),
(1169, 154, 'Russian Federation', 'Yakutsk ', 'YKS', 1, '2019-09-14 07:14:30'),
(1170, 154, 'Russian Federation', 'Yekaterinburg - Koltsovo Apt ', 'SVX', 1, '2019-09-14 07:14:30'),
(1171, 155, 'Rwanda', 'Kigali - Gregoire Kayibanda ', 'KGL', 1, '2019-09-14 07:14:30'),
(1172, 156, 'Samoa', 'Apia - Faleolo Int\'l Apt ', 'APW', 1, '2019-09-14 07:14:30'),
(1173, 157, 'San Marino', 'Not Applicable', 'SMO', 1, '2019-09-14 07:14:30'),
(1174, 158, 'Sao Tome and Principe', 'Sao Tome ', 'TMS', 1, '2019-09-14 07:14:30'),
(1175, 159, 'Saudi Arabia', 'Dammam, King Fahad Int\'l ', 'DMM', 1, '2019-09-14 07:14:30'),
(1176, 159, 'Saudi Arabia', 'Dhahran ', 'DHA', 1, '2019-09-14 07:14:30'),
(1177, 159, 'Saudi Arabia', 'Jeddah - King Abdulaziz Int\'l ', 'JED', 1, '2019-09-14 07:14:30'),
(1178, 159, 'Saudi Arabia', 'Jouf ', 'AJF', 1, '2019-09-14 07:14:30'),
(1179, 159, 'Saudi Arabia', 'Khamis Mushayat ', 'AHB', 1, '2019-09-14 07:14:30'),
(1180, 159, 'Saudi Arabia', 'Madinah (Medina) - Mohammad Bin Abdulaziz ', 'MED', 1, '2019-09-14 07:14:30'),
(1181, 159, 'Saudi Arabia', 'Riyadh - King Khaled Int\'l ', 'RUH', 1, '2019-09-14 07:14:30'),
(1182, 159, 'Saudi Arabia', 'Tabuk ', 'TUU', 1, '2019-09-14 07:14:30'),
(1183, 159, 'Saudi Arabia', 'Taif ', 'TIF', 1, '2019-09-14 07:14:30'),
(1184, 159, 'Saudi Arabia', 'Yanbu ', 'YNB', 1, '2019-09-14 07:14:30'),
(1185, 160, 'Senegal', 'Dakar - Léopold Sédar Senghor Int\'l Apt ', 'DKR', 1, '2019-09-14 07:14:30'),
(1186, 257, 'Serbia', 'Belgrad (Beograd) - Nikola Tesla Int\'l ', 'BEG', 1, '2019-09-14 07:14:30'),
(1187, 257, 'Serbia', 'Nis ', 'INI', 1, '2019-09-14 07:14:30'),
(1188, 257, 'Serbia', 'Novi Sad ', 'QND', 1, '2019-09-14 07:14:30'),
(1189, 257, 'Serbia', 'Pristina ', 'PRN', 1, '2019-09-14 07:14:30'),
(1190, 161, 'Seychelles', 'Mahe - Seychelles Int\'l ', 'SEZ', 1, '2019-09-14 07:14:30'),
(1191, 162, 'Sierra Leone', 'Freetown - Freetown-Lungi Int\'l Apt ', 'FNA', 1, '2019-09-14 07:14:30'),
(1192, 163, 'Singapore', 'Singapore - Changi ', 'SIN', 1, '2019-09-14 07:14:30'),
(1193, 163, 'Singapore', 'Singapore - Paya Lebar ', 'QPG', 1, '2019-09-14 07:14:30'),
(1194, 163, 'Singapore', 'Singapore - Seletar ', 'XSP', 1, '2019-09-14 07:14:30'),
(1195, 164, 'Slovakia', 'Bratislava - M. R. Štefánik Apt ', 'BTS', 1, '2019-09-14 07:14:30'),
(1196, 165, 'Slovenia', 'Ljubljana - Brnik ', 'LJU', 1, '2019-09-14 07:14:30'),
(1197, 165, 'Slovenia', 'Maribor ', 'MBX', 1, '2019-09-14 07:14:30'),
(1198, 0, 'Solomon Islands', 'Guadalcanal ', 'GSI', 1, '2019-09-14 07:14:30'),
(1199, 0, 'Solomon Islands', 'Honiara Henderson Int\'l ', 'HIR', 1, '2019-09-14 07:14:30'),
(1200, 166, 'Somalia', 'Mogadishu ', 'MGQ', 1, '2019-09-14 07:14:30'),
(1201, 167, 'South Africa', 'Aggeneys ', 'AGZ', 1, '2019-09-14 07:14:30'),
(1202, 167, 'South Africa', 'Alexander Bay - Kortdoorn ', 'ALJ', 1, '2019-09-14 07:14:30'),
(1203, 167, 'South Africa', 'Alldays ', 'ADY', 1, '2019-09-14 07:14:30'),
(1204, 167, 'South Africa', 'Bloemfontein - Bloemfontein Apt ', 'BFN', 1, '2019-09-14 07:14:30'),
(1205, 167, 'South Africa', 'Cape Town - Cape Town Int\'l Apt ', 'CPT', 1, '2019-09-14 07:14:30'),
(1206, 167, 'South Africa', 'Durban ', 'DUR', 1, '2019-09-14 07:14:30'),
(1207, 167, 'South Africa', 'East London ', 'ELS', 1, '2019-09-14 07:14:30'),
(1209, 167, 'South Africa', 'George ', 'GRJ', 1, '2019-09-14 07:14:30'),
(1210, 167, 'South Africa', 'Johannesburg - OR Tambo Int\'l Apt ', 'JNB', 1, '2019-09-14 07:14:30'),
(1211, 167, 'South Africa', 'Kimberley ', 'KIM', 1, '2019-09-14 07:14:30'),
(1212, 167, 'South Africa', 'Kleinsee ', 'KLZ', 1, '2019-09-14 07:14:30'),
(1213, 167, 'South Africa', 'Lanseria ', 'HLA', 1, '2019-09-14 07:14:30'),
(1214, 167, 'South Africa', 'Lusisiki ', 'LUJ', 1, '2019-09-14 07:14:30'),
(1215, 167, 'South Africa', 'Margate ', 'MGH', 1, '2019-09-14 07:14:30'),
(1216, 167, 'South Africa', 'Messina ', 'MEZ', 1, '2019-09-14 07:14:30'),
(1217, 167, 'South Africa', 'Mkambati ', 'MBM', 1, '2019-09-14 07:14:30'),
(1218, 167, 'South Africa', 'Mossel Bay ', 'MZY', 1, '2019-09-14 07:14:30'),
(1219, 167, 'South Africa', 'Mzamba ', 'MZF', 1, '2019-09-14 07:14:30'),
(1220, 167, 'South Africa', 'Nelspruit ', 'NLP', 1, '2019-09-14 07:14:30'),
(1221, 167, 'South Africa', 'Nelspruit - Kruger Mpumalanga Int\'l Apt ', 'MQP', 1, '2019-09-14 07:14:30'),
(1222, 167, 'South Africa', 'Newcastle ', 'NCS', 1, '2019-09-14 07:14:30'),
(1223, 167, 'South Africa', 'Oudtshoorn ', 'OUH', 1, '2019-09-14 07:14:30'),
(1224, 167, 'South Africa', 'Phalaborwa ', 'PHW', 1, '2019-09-14 07:14:30'),
(1225, 167, 'South Africa', 'Pietermaritzburg ', 'PZB', 1, '2019-09-14 07:14:30'),
(1226, 167, 'South Africa', 'Pietersburg ', 'PTG', 1, '2019-09-14 07:14:30'),
(1227, 167, 'South Africa', 'Pilanesberg/Sun City ', 'NTY', 1, '2019-09-14 07:14:30'),
(1228, 167, 'South Africa', 'Plettenberg Bay ', 'PBZ', 1, '2019-09-14 07:14:30'),
(1229, 167, 'South Africa', 'Port Elizabeth ', 'PLZ', 1, '2019-09-14 07:14:30'),
(1230, 167, 'South Africa', 'Pretoria - Wonderboom Apt. ', 'PRY', 1, '2019-09-14 07:14:30'),
(1231, 167, 'South Africa', 'Richards Bay ', 'RCB', 1, '2019-09-14 07:14:30'),
(1232, 167, 'South Africa', 'Sishen ', 'SIS', 1, '2019-09-14 07:14:30'),
(1233, 167, 'South Africa', 'Skukuza ', 'SZK', 1, '2019-09-14 07:14:30'),
(1234, 167, 'South Africa', 'Springbok ', 'SBU', 1, '2019-09-14 07:14:30'),
(1235, 167, 'South Africa', 'Thaba\'Nchu ', 'TCU', 1, '2019-09-14 07:14:30'),
(1236, 167, 'South Africa', 'Ulundi ', 'ULD', 1, '2019-09-14 07:14:30'),
(1237, 167, 'South Africa', 'Umtata ', 'UTT', 1, '2019-09-14 07:14:30'),
(1238, 167, 'South Africa', 'Upington ', 'UTN', 1, '2019-09-14 07:14:30'),
(1239, 167, 'South Africa', 'Vryheid ', 'VYD', 1, '2019-09-14 07:14:30'),
(1240, 167, 'South Africa', 'Walvis Bay ', 'WVB', 1, '2019-09-14 07:14:30'),
(1241, 167, 'South Africa', 'Welkom ', 'WEL', 1, '2019-09-14 07:14:30'),
(1242, 0, 'South Georgia', 'Not Applicable', 'STG', 1, '2019-09-14 07:14:30'),
(1243, 100, 'South Korea', 'Incheon, Incheon Int\'l Apt ', 'ICN', 1, '2019-09-14 07:14:30'),
(1244, 100, 'South Korea', 'Pu San (Busan) - Gimhae Int\'l Apt ', 'PUS', 1, '2019-09-14 07:14:30'),
(1245, 100, 'South Korea', 'Seoul - Kimpo ', 'SEL', 1, '2019-09-14 07:14:30'),
(1246, 100, 'South Korea', 'Ulsan ', 'USN', 1, '2019-09-14 07:14:30'),
(1247, 0, 'South Sudan', 'Juba ', 'JUB', 1, '2019-09-14 07:14:30'),
(1248, 168, 'Spain', 'Alicante ', 'ALC', 1, '2019-09-14 07:14:30'),
(1249, 168, 'Spain', 'Almeria ', 'LEI', 1, '2019-09-14 07:14:30'),
(1250, 168, 'Spain', 'Arrecife/Lanzarote ', 'ACE', 1, '2019-09-14 07:14:30'),
(1251, 168, 'Spain', 'Badajoz ', 'BJZ', 1, '2019-09-14 07:14:30'),
(1252, 168, 'Spain', 'Barcelona ', 'BCN', 1, '2019-09-14 07:14:30'),
(1253, 168, 'Spain', 'Bilbao ', 'BIO', 1, '2019-09-14 07:14:30'),
(1254, 168, 'Spain', 'Cordoba ', 'ODB', 1, '2019-09-14 07:14:30'),
(1255, 168, 'Spain', 'Fuerteventura ', 'FUE', 1, '2019-09-14 07:14:30'),
(1256, 168, 'Spain', 'Gerona ', 'GRO', 1, '2019-09-14 07:14:30'),
(1257, 168, 'Spain', 'Granada ', 'GRX', 1, '2019-09-14 07:14:30'),
(1258, 168, 'Spain', 'Ibiza ', 'IBZ', 1, '2019-09-14 07:14:30'),
(1259, 168, 'Spain', 'Jerez de la Frontera/Cadiz - La Parra ', 'XRY', 1, '2019-09-14 07:14:30'),
(1260, 168, 'Spain', 'La Coruna ', 'LCG', 1, '2019-09-14 07:14:30'),
(1261, 168, 'Spain', 'Las Palmas ', 'LPA', 1, '2019-09-14 07:14:30'),
(1262, 168, 'Spain', 'Madrid - Barajas Apt ', 'MAD', 1, '2019-09-14 07:14:30'),
(1263, 168, 'Spain', 'Mahon ', 'MAH', 1, '2019-09-14 07:14:30'),
(1264, 168, 'Spain', 'Malaga ', 'AGP', 1, '2019-09-14 07:14:30'),
(1265, 168, 'Spain', 'Murcia ', 'MJV', 1, '2019-09-14 07:14:30'),
(1266, 168, 'Spain', 'Oviedo ', 'OVD', 1, '2019-09-14 07:14:30'),
(1267, 168, 'Spain', 'Palma de Mallorca ', 'PMI', 1, '2019-09-14 07:14:30'),
(1268, 168, 'Spain', 'Reus ', 'REU', 1, '2019-09-14 07:14:30'),
(1269, 168, 'Spain', 'San Sebastian ', 'EAS', 1, '2019-09-14 07:14:30'),
(1270, 168, 'Spain', 'Santa Cruz de la Palma ', 'SPC', 1, '2019-09-14 07:14:30'),
(1271, 168, 'Spain', 'Santander ', 'SDR', 1, '2019-09-14 07:14:30'),
(1272, 168, 'Spain', 'Santiago de Compostela ', 'SCQ', 1, '2019-09-14 07:14:30'),
(1273, 168, 'Spain', 'Sevilla ', 'SVQ', 1, '2019-09-14 07:14:30'),
(1274, 168, 'Spain', 'Tenerife ', 'TCI', 1, '2019-09-14 07:14:30'),
(1275, 168, 'Spain', 'Tenerife - Norte Los Rodeos ', 'TFN', 1, '2019-09-14 07:14:30'),
(1276, 168, 'Spain', 'Valencia ', 'VLC', 1, '2019-09-14 07:14:30'),
(1277, 168, 'Spain', 'Valladolid ', 'VLL', 1, '2019-09-14 07:14:30'),
(1278, 168, 'Spain', 'Valverde ', 'VDE', 1, '2019-09-14 07:14:30'),
(1279, 168, 'Spain', 'Vigo ', 'VGO', 1, '2019-09-14 07:14:30'),
(1280, 168, 'Spain', 'Vitoria ', 'VIT', 1, '2019-09-14 07:14:30'),
(1281, 168, 'Spain', 'Zaragoza ', 'ZAZ', 1, '2019-09-14 07:14:30'),
(1282, 0, 'Spian', 'Tenerife - Sur Reina Sofia ', 'TFS', 1, '2019-09-14 07:14:30'),
(1283, 169, 'Sri Lanka', 'Colombo - Bandaranaike Int\'l Apt ', 'CMB', 1, '2019-09-14 07:14:30'),
(1284, 169, 'Sri Lanka', 'Jaffna - Kankesanturai ', 'JAF', 1, '2019-09-14 07:14:30'),
(1285, 170, 'St Kitts & Nevis', 'Basseterre - Robert L. Bradshaw Int\'l Apt ', 'SKB', 1, '2019-09-14 07:14:30'),
(1286, 170, 'St Kitts & Nevis', 'Nevis ', 'NEV', 1, '2019-09-14 07:14:30'),
(1287, 171, 'St Lucia', 'Castries/St. Lucia Vigle - George FL Charles Apt ', 'SLU', 1, '2019-09-14 07:14:30'),
(1288, 171, 'St Lucia', 'St. Lucia Hewanorra ', 'UVF', 1, '2019-09-14 07:14:30'),
(1289, 172, 'St Pierre & Miquelon', 'Not Applicable', 'PNM', 1, '2019-09-14 07:14:30'),
(1290, 173, 'St Vincent & the Grenadines', 'Canouan (island) - Canouan Apt ', 'CIW', 1, '2019-09-14 07:14:30'),
(1291, 173, 'St Vincent & the Grenadines', 'St. Vincent  Kingstown - E. T. Joshua Apt ', 'SVD', 1, '2019-09-14 07:14:30'),
(1292, 173, 'St Vincent & the Grenadines', 'Union Island ', 'UNI', 1, '2019-09-14 07:14:30'),
(1293, 0, 'St. Helena Island', 'Not Applicable', 'STH', 1, '2019-09-14 07:14:30'),
(1294, 174, 'Sudan', 'Kassala ', 'KSL', 1, '2019-09-14 07:14:31'),
(1295, 174, 'Sudan', 'Khartoum - Khartoum Int\'l Apt ', 'KRT', 1, '2019-09-14 07:14:31'),
(1296, 175, 'Suriname', 'Paramaribo - Zanderij Int\'l ', 'PBM', 1, '2019-09-14 07:14:31'),
(1297, 176, 'Swaziland', 'Manzini - Matsapha Int\'l ', 'MTS', 1, '2019-09-14 07:14:31'),
(1298, 177, 'Sweden', 'Gothenburg (Göteborg) - Landvetter ', 'GOT', 1, '2019-09-14 07:14:31'),
(1299, 177, 'Sweden', 'Helsingborg ', 'JHE', 1, '2019-09-14 07:14:31'),
(1300, 177, 'Sweden', 'Jönköping (Jonkoping) - Axamo Apt ', 'JKG', 1, '2019-09-14 07:14:31'),
(1301, 177, 'Sweden', 'Kalmar ', 'KLR', 1, '2019-09-14 07:14:31'),
(1302, 177, 'Sweden', 'Karlstad ', 'KSD', 1, '2019-09-14 07:14:31'),
(1303, 177, 'Sweden', 'Kiruna ', 'KRN', 1, '2019-09-14 07:14:31'),
(1304, 177, 'Sweden', 'Kristianstad ', 'KID', 1, '2019-09-14 07:14:31'),
(1305, 177, 'Sweden', 'Lidkoeping ', 'LDK', 1, '2019-09-14 07:14:31'),
(1306, 177, 'Sweden', 'Lulea ', 'LLA', 1, '2019-09-14 07:14:31'),
(1307, 177, 'Sweden', 'Malmo (Malmö) - Malmö Apt ', 'MMX', 1, '2019-09-14 07:14:31'),
(1308, 177, 'Sweden', 'Malmo (Malmoe) ', 'MMA', 1, '2019-09-14 07:14:31'),
(1309, 177, 'Sweden', 'Norrkoeping ', 'NRK', 1, '2019-09-14 07:14:31'),
(1310, 177, 'Sweden', 'Oerebro ', 'ORB', 1, '2019-09-14 07:14:31'),
(1311, 177, 'Sweden', 'Ronneby ', 'RNB', 1, '2019-09-14 07:14:31'),
(1312, 177, 'Sweden', 'Stockholm - Arlanda ', 'ARN', 1, '2019-09-14 07:14:31'),
(1313, 177, 'Sweden', 'Stockholm - Bromma ', 'BMA', 1, '2019-09-14 07:14:31'),
(1314, 177, 'Sweden', 'Stockholm Metropolitan Area ', 'STO', 1, '2019-09-14 07:14:31'),
(1315, 177, 'Sweden', 'Sundsvall ', 'SDL', 1, '2019-09-14 07:14:31'),
(1316, 177, 'Sweden', 'Umea ', 'UME', 1, '2019-09-14 07:14:31'),
(1317, 177, 'Sweden', 'Vaexjoe ', 'VXO', 1, '2019-09-14 07:14:31'),
(1318, 177, 'Sweden', 'Vasteras ', 'VST', 1, '2019-09-14 07:14:31'),
(1319, 177, 'Sweden', 'Visby ', 'VBY', 1, '2019-09-14 07:14:31'),
(1320, 178, 'Switzerland', 'Altenrhein ', 'ACH', 1, '2019-09-14 07:14:31'),
(1321, 178, 'Switzerland', 'Basel ', 'BSL', 1, '2019-09-14 07:14:31'),
(1322, 178, 'Switzerland', 'Basel/Mulhouse ', 'EAP', 1, '2019-09-14 07:14:31'),
(1323, 178, 'Switzerland', 'Berne, Bern-Belp ', 'BRN', 1, '2019-09-14 07:14:31'),
(1324, 178, 'Switzerland', 'Berne, Railway Service ', 'ZDJ', 1, '2019-09-14 07:14:31'),
(1325, 178, 'Switzerland', 'Geneva - Geneva-Cointrin Int\'l Apt ', 'GVA', 1, '2019-09-14 07:14:31'),
(1326, 178, 'Switzerland', 'Lugano ', 'LUG', 1, '2019-09-14 07:14:31'),
(1327, 178, 'Switzerland', 'Zurich (Zürich) - Kloten ', 'ZRH', 1, '2019-09-14 07:14:31'),
(1328, 179, 'Syrian Arab Republic', 'Aleppo ', 'ALP', 1, '2019-09-14 07:14:31'),
(1329, 179, 'Syrian Arab Republic', 'Damascus, Int\'l ', 'DAM', 1, '2019-09-14 07:14:31'),
(1330, 180, 'Taiwan', 'Kaohsiung Int\'l ', 'KHH', 1, '2019-09-14 07:14:31'),
(1331, 180, 'Taiwan', 'Makung ', 'MZG', 1, '2019-09-14 07:14:31'),
(1332, 180, 'Taiwan', 'Taipei - Chiang Kai Shek ', 'TPE', 1, '2019-09-14 07:14:31'),
(1333, 180, 'Taiwan', 'Taipei - Sung Shan ', 'TAY', 1, '2019-09-14 07:14:31'),
(1334, 181, 'Tajikistan', 'Dushanbe (Duschanbe) - Dushanbe Apt ', 'DYU', 1, '2019-09-14 07:14:31'),
(1335, 182, 'Tanzania', 'Arusha ', 'ARK', 1, '2019-09-14 07:14:31'),
(1336, 182, 'Tanzania', 'Dar es Salam (Daressalam) - Julius Nyerere Int\'l ', 'DAR', 1, '2019-09-14 07:14:31'),
(1337, 182, 'Tanzania', 'Dodoma - Dodoma Apt ', 'DOD', 1, '2019-09-14 07:14:31'),
(1338, 182, 'Tanzania', 'Kilimadjaro ', 'JRO', 1, '2019-09-14 07:14:31'),
(1339, 183, 'Thailand', 'Bangkok, Don Muang ', 'DMK', 1, '2019-09-14 07:14:31'),
(1340, 183, 'Thailand', 'Bangkok, Suvarnabhumi Int\'l ', 'BKK', 1, '2019-09-14 07:14:31'),
(1341, 183, 'Thailand', 'Chiang Mai - Chiang Mai Int\'l Apt ', 'CNX', 1, '2019-09-14 07:14:31'),
(1342, 183, 'Thailand', 'Hatyai (Hat Yai) ', 'HDY', 1, '2019-09-14 07:14:31'),
(1343, 183, 'Thailand', 'Nakhon Si Thammarat ', 'NST', 1, '2019-09-14 07:14:31'),
(1344, 183, 'Thailand', 'Pattaya ', 'PYX', 1, '2019-09-14 07:14:31'),
(1345, 183, 'Thailand', 'Phuket ', 'HKT', 1, '2019-09-14 07:14:31'),
(1346, 183, 'Thailand', 'Ubon Ratchathani - Muang Ubon Apt ', 'UBP', 1, '2019-09-14 07:14:31'),
(1347, 183, 'Thailand', 'Udon Thani ', 'UTH', 1, '2019-09-14 07:14:31'),
(1348, 183, 'Thailand', 'Utapao (Pattaya) ', 'UTP', 1, '2019-09-14 07:14:31'),
(1349, 0, 'Timor-Leste', 'Dili - Nicolau Lobato Int\'l Apt ', 'DIL', 1, '2019-09-14 07:14:31'),
(1350, 184, 'Togo', 'Lome ', 'LFW', 1, '2019-09-14 07:14:31'),
(1351, 185, 'Tonga', 'Nuku\'alofa - Fua\'Amotu Int\'l ', 'TBU', 1, '2019-09-14 07:14:31'),
(1352, 186, 'Trinidad and Tobago', 'Port of Spain - Piarco Int\'l ', 'POS', 1, '2019-09-14 07:14:31'),
(1353, 186, 'Trinidad and Tobago', 'Tobago Scarborough - Crown Point Int\'l ', 'TAB', 1, '2019-09-14 07:14:31'),
(1354, 187, 'Tunisia', 'Djerba ', 'DJE', 1, '2019-09-14 07:14:31'),
(1355, 187, 'Tunisia', 'Monastir ', 'MIR', 1, '2019-09-14 07:14:31'),
(1356, 187, 'Tunisia', 'Sfax ', 'SFA', 1, '2019-09-14 07:14:31'),
(1357, 187, 'Tunisia', 'Tunis - Carthage ', 'TUN', 1, '2019-09-14 07:14:31'),
(1358, 188, 'Turkey', 'Adana ', 'ADA', 1, '2019-09-14 07:14:31'),
(1359, 188, 'Turkey', 'Adiyaman ', 'ADF', 1, '2019-09-14 07:14:31'),
(1360, 188, 'Turkey', 'Ankara ', 'ANK', 1, '2019-09-14 07:14:31'),
(1361, 188, 'Turkey', 'Ankara - Esenboğa Int\'l Apt ', 'ESB', 1, '2019-09-14 07:14:31'),
(1362, 188, 'Turkey', 'Antalya ', 'AYT', 1, '2019-09-14 07:14:31'),
(1363, 188, 'Turkey', 'Bodrum - Milas Apt ', 'BJV', 1, '2019-09-14 07:14:31'),
(1364, 188, 'Turkey', 'Dalaman ', 'DLM', 1, '2019-09-14 07:14:31'),
(1365, 188, 'Turkey', 'Denizli ', 'DNZ', 1, '2019-09-14 07:14:31'),
(1366, 188, 'Turkey', 'Erzincan ', 'ERC', 1, '2019-09-14 07:14:31'),
(1367, 188, 'Turkey', 'Erzurum ', 'ERZ', 1, '2019-09-14 07:14:31'),
(1368, 188, 'Turkey', 'Gaziantep ', 'GZT', 1, '2019-09-14 07:14:31'),
(1369, 188, 'Turkey', 'Istanbul - Istanbul Atatürk Apt ', 'IST', 1, '2019-09-14 07:14:31'),
(1370, 188, 'Turkey', 'Istanbul - Sabiha Gokcen ', 'SAW', 1, '2019-09-14 07:14:31'),
(1371, 188, 'Turkey', 'Izmir ', 'IZM', 1, '2019-09-14 07:14:31'),
(1372, 188, 'Turkey', 'Izmir - Adnan Menderes Apt ', 'ADB', 1, '2019-09-14 07:14:31'),
(1373, 188, 'Turkey', 'Kahramanmaras ', 'KCM', 1, '2019-09-14 07:14:31'),
(1374, 188, 'Turkey', 'Kars ', 'KYS', 1, '2019-09-14 07:14:31'),
(1375, 188, 'Turkey', 'Kayseri ', 'ASR', 1, '2019-09-14 07:14:31'),
(1376, 188, 'Turkey', 'Konya ', 'KYA', 1, '2019-09-14 07:14:31'),
(1377, 188, 'Turkey', 'Malatya ', 'MLX', 1, '2019-09-14 07:14:31'),
(1378, 188, 'Turkey', 'Mardin ', 'MQM', 1, '2019-09-14 07:14:31'),
(1379, 188, 'Turkey', 'Mus ', 'MSR', 1, '2019-09-14 07:14:31'),
(1380, 188, 'Turkey', 'Samsun ', 'SZF', 1, '2019-09-14 07:14:31'),
(1381, 188, 'Turkey', 'Sivas ', 'VAS', 1, '2019-09-14 07:14:31'),
(1382, 188, 'Turkey', 'Tekirdag - Corlu ', 'TEQ', 1, '2019-09-14 07:14:31'),
(1383, 188, 'Turkey', 'Trabzon ', 'TZX', 1, '2019-09-14 07:14:31'),
(1384, 188, 'Turkey', 'Van - Ferit Melen ', 'VAN', 1, '2019-09-14 07:14:31'),
(1385, 189, 'Turkmenistan', 'Ashgabat - Saparmurat Turkmenbashy Int. Apt ', 'ASB', 1, '2019-09-14 07:14:31'),
(1386, 190, 'Turks & Caicos Is', 'Not Applicable', 'TNC', 1, '2019-09-14 07:14:31'),
(1387, 0, 'Tuvalu', 'Not Applicable', 'TUV', 1, '2019-09-14 07:14:31'),
(1388, 191, 'Uganda', 'Entebbe - Entebbe Int\'l Apt ', 'EBB', 1, '2019-09-14 07:14:31'),
(1389, 191, 'Uganda', 'Gulu ', 'ULU', 1, '2019-09-14 07:14:31'),
(1390, 191, 'Uganda', 'Jinja ', 'JIN', 1, '2019-09-14 07:14:31'),
(1391, 192, 'Ukraine', 'Kharkov ', 'HRK', 1, '2019-09-14 07:14:31'),
(1392, 192, 'Ukraine', 'Kiev - Borispol ', 'KBP', 1, '2019-09-14 07:14:31'),
(1393, 192, 'Ukraine', 'Kiev - Zhulhany ', 'IEV', 1, '2019-09-14 07:14:31'),
(1394, 192, 'Ukraine', 'Lvov (Lwow, Lemberg) ', 'LWO', 1, '2019-09-14 07:14:31'),
(1395, 192, 'Ukraine', 'Nikolaev ', 'NLV', 1, '2019-09-14 07:14:31'),
(1396, 192, 'Ukraine', 'Odessa ', 'ODS', 1, '2019-09-14 07:14:31'),
(1397, 192, 'Ukraine', 'Simferopol ', 'SIP', 1, '2019-09-14 07:14:31'),
(1398, 192, 'Ukraine', 'Uzhgorod ', 'UDJ', 1, '2019-09-14 07:14:31'),
(1399, 193, 'United Arab Emirates', 'Abu Dhabi - Abu Dhabi Int\'l ', 'AUH', 1, '2019-09-14 07:14:31'),
(1400, 193, 'United Arab Emirates', 'Al Ain ', 'AAN', 1, '2019-09-14 07:14:31'),
(1401, 193, 'United Arab Emirates', 'Alfujairah (Fujairah) ', 'FJR', 1, '2019-09-14 07:14:31'),
(1402, 193, 'United Arab Emirates', 'Dubai - Dubai Int\'l Apt ', 'DXB', 1, '2019-09-14 07:14:31'),
(1403, 193, 'United Arab Emirates', 'Ras al Khaymah (Ras al Khaimah) ', 'RKT', 1, '2019-09-14 07:14:31'),
(1404, 193, 'United Arab Emirates', 'Sharjah ', 'SHJ', 1, '2019-09-14 07:14:31'),
(1405, 194, 'United Kingdom', 'Aberdeen ', 'ABZ', 1, '2019-09-14 07:14:31'),
(1408, 194, 'United Kingdom', 'Belfast - Belfast Int\'l Apt ', 'BFS', 1, '2019-09-14 07:14:31'),
(1411, 194, 'United Kingdom', 'Birmingham - Birmingham Int\'l Apt ', 'BHX', 1, '2019-09-14 07:14:31'),
(1412, 194, 'United Kingdom', 'Blackpool ', 'BLK', 1, '2019-09-14 07:14:31'),
(1413, 194, 'United Kingdom', 'Bournemouth ', 'BOH', 1, '2019-09-14 07:14:31'),
(1414, 194, 'United Kingdom', 'Bristol ', 'BRS', 1, '2019-09-14 07:14:31'),
(1415, 194, 'United Kingdom', 'Cambrigde ', 'CBG', 1, '2019-09-14 07:14:31'),
(1417, 194, 'United Kingdom', 'Cardiff - Cardiff Apt ', 'CWL', 1, '2019-09-14 07:14:31'),
(1418, 194, 'United Kingdom', 'Coventry - Baginton ', 'CVT', 1, '2019-09-14 07:14:31'),
(1420, 194, 'United Kingdom', 'Doncaster/Sheffield, Robin Hood Int\'l Apt ', 'DSA', 1, '2019-09-14 07:14:31'),
(1421, 194, 'United Kingdom', 'Dundee ', 'DND', 1, '2019-09-14 07:14:31'),
(1422, 194, 'United Kingdom', 'Edinburgh - Edinburgh Apt ', 'EDI', 1, '2019-09-14 07:14:31'),
(1423, 194, 'United Kingdom', 'Exeter ', 'EXT', 1, '2019-09-14 07:14:31'),
(1427, 194, 'United Kingdom', 'Glasgow, Prestwick ', 'PIK', 1, '2019-09-14 07:14:31'),
(1429, 194, 'United Kingdom', 'Humberside ', 'HUY', 1, '2019-09-14 07:14:31'),
(1433, 194, 'United Kingdom', 'Jersey ', 'JER', 1, '2019-09-14 07:14:31'),
(1434, 194, 'United Kingdom', 'Kent (Manston) Kent Int\'l ', 'MSE', 1, '2019-09-14 07:14:31'),
(1437, 194, 'United Kingdom', 'Leeds/Bradford ', 'LBA', 1, '2019-09-14 07:14:31'),
(1439, 194, 'United Kingdom', 'Liverpool ', 'LPL', 1, '2019-09-14 07:14:31'),
(1441, 194, 'United Kingdom', 'London - Gatwick ', 'LGW', 1, '2019-09-14 07:14:31'),
(1442, 194, 'United Kingdom', 'London - Heathrow ', 'LHR', 1, '2019-09-14 07:14:31'),
(1443, 194, 'United Kingdom', 'London - Luton ', 'LTN', 1, '2019-09-14 07:14:31'),
(1447, 194, 'United Kingdom', 'Manchester ', 'MAN', 1, '2019-09-14 07:14:31'),
(1448, 194, 'United Kingdom', 'Newcastle ', 'NCL', 1, '2019-09-14 07:14:31'),
(1450, 194, 'United Kingdom', 'Norwich ', 'NWI', 1, '2019-09-14 07:14:31'),
(1451, 194, 'United Kingdom', 'Nottingham - East Midlands ', 'EMA', 1, '2019-09-14 07:14:31'),
(1453, 194, 'United Kingdom', 'Sheffield, City Apt ', 'SZD', 1, '2019-09-14 07:14:31'),
(1454, 194, 'United Kingdom', 'Southampton - Eastleigh ', 'SOU', 1, '2019-09-14 07:14:31'),
(1455, 194, 'United Kingdom', 'Southend (London) ', 'SEN', 1, '2019-09-14 07:14:31'),
(1458, 194, 'United Kingdom', 'Teesside, Durham Tees Valley ', 'MME', 1, '2019-09-14 07:14:31'),
(1461, 195, 'Uruguay', 'Montevideo - Carrasco Int\'l Apt ', 'MVD', 1, '2019-09-14 07:14:31'),
(1463, 284, 'USA', 'Birmingham (AL) ', 'BHM', 1, '2019-09-14 07:14:31'),
(1466, 284, 'USA', 'Huntsville (AL) ', 'HSV', 1, '2019-09-14 07:14:31'),
(1467, 284, 'USA', 'Mobile (AL) - Pascagoula (MS) ', 'MOB', 1, '2019-09-14 07:14:31'),
(1468, 284, 'USA', 'Montgomery (AL) - Montgomery Regnl Apt ', 'MGM', 1, '2019-09-14 07:14:31'),
(1471, 284, 'USA', 'Anchorage (AK) - Ted Stevens Anchorage Int\'l ', 'ANC', 1, '2019-09-14 07:14:31'),
(1477, 284, 'USA', 'Dutch Harbor (AK) ', 'DUT', 1, '2019-09-14 07:14:31'),
(1478, 284, 'USA', 'Fairbanks (AK) ', 'FAI', 1, '2019-09-14 07:14:31'),
(1484, 284, 'USA', 'Juneau (AK) - Juneau Int\'l Apt ', 'JNU', 1, '2019-09-14 07:14:31'),
(1489, 284, 'USA', 'Kodiak (AK) ', 'ADQ', 1, '2019-09-14 07:14:31'),
(1495, 284, 'USA', 'Nome (AK) ', 'OME', 1, '2019-09-14 07:14:31'),
(1506, 284, 'USA', 'Flagstaff (AZ) ', 'FLG', 1, '2019-09-14 07:14:31'),
(1511, 284, 'USA', 'Phoenix (AZ) - Sky Harbor Int\'l ', 'PHX', 1, '2019-09-14 07:14:31'),
(1512, 284, 'USA', 'Scottsdale (AZ) ', 'SCF', 1, '2019-09-14 07:14:31'),
(1513, 284, 'USA', 'Tucson (AZ) ', 'TUS', 1, '2019-09-14 07:14:31'),
(1517, 284, 'USA', 'Jacksonville (AR)  Little Rock AFB    ', 'LRF', 1, '2019-09-14 07:14:31'),
(1519, 284, 'USA', 'Little Rock (AR) ', 'LIT', 1, '2019-09-14 07:14:31'),
(1523, 284, 'USA', 'Burbank (CA) ', 'BUR', 1, '2019-09-14 07:14:31'),
(1533, 284, 'USA', 'Long Beach (CA) ', 'LGB', 1, '2019-09-14 07:14:31'),
(1534, 284, 'USA', 'Los Angeles (CA) - Int\'l ', 'LAX', 1, '2019-09-14 07:14:31'),
(1538, 284, 'USA', 'Oakland (CA) ', 'OAK', 1, '2019-09-14 07:14:31'),
(1539, 284, 'USA', 'Ontario (CA) ', 'ONT', 1, '2019-09-14 07:14:31'),
(1540, 284, 'USA', 'Orange County (Santa Ana) (CA) ', 'SNA', 1, '2019-09-14 07:14:31'),
(1542, 284, 'USA', 'Palm Springs (CA) ', 'PSP', 1, '2019-09-14 07:14:31'),
(1545, 284, 'USA', 'Sacramento (CA) ', 'SMF', 1, '2019-09-14 07:14:31'),
(1547, 284, 'USA', 'San Diego - Lindberg Field Int\'l (CA) ', 'SAN', 1, '2019-09-14 07:14:31'),
(1548, 284, 'USA', 'San Francisco - Int\'l Apt, SA ', 'SFO', 1, '2019-09-14 07:14:31'),
(1549, 284, 'USA', 'San Jose (CA) ', 'SJC', 1, '2019-09-14 07:14:31'),
(1558, 284, 'USA', 'Colorado Springs (CO) ', 'COS', 1, '2019-09-14 07:14:31'),
(1559, 284, 'USA', 'Denver (CO) - Denver Int\'l Apt ', 'DEN', 1, '2019-09-14 07:14:31'),
(1570, 284, 'USA', 'Hartford (CT) /Springfield (MA) ', 'BDL', 1, '2019-09-14 07:14:31'),
(1574, 284, 'USA', 'Fort Lauderdale/Hollywood (FL) ', 'FLL', 1, '2019-09-14 07:14:31'),
(1581, 284, 'USA', 'Jacksonville (FL) - Int\'l ', 'JAX', 1, '2019-09-14 07:14:31'),
(1586, 284, 'USA', 'Miami (FL) ', 'MIA', 1, '2019-09-14 07:14:31'),
(1588, 284, 'USA', 'Orlando - Int\'l Apt (FL) ', 'MCO', 1, '2019-09-14 07:14:31'),
(1593, 284, 'USA', 'Tallahassee (FL) ', 'TLH', 1, '2019-09-14 07:14:31'),
(1594, 284, 'USA', 'Tampa - Int\'l (FL) ', 'TPA', 1, '2019-09-14 07:14:31'),
(1596, 284, 'USA', 'West Palm Beach (FL) ', 'PBI', 1, '2019-09-14 07:14:31'),
(1599, 284, 'USA', 'Atlanta (GA) - Hartsfield Atlanta Int\'l Apt ', 'ATL', 1, '2019-09-14 07:14:31'),
(1604, 284, 'USA', 'Savannah (GA) ', 'SAV', 1, '2019-09-14 07:14:31'),
(1606, 284, 'USA', 'Hilo (HI) ', 'ITO', 1, '2019-09-14 07:14:31'),
(1607, 284, 'USA', 'Honolulu (HI) - Honolulu Int\'l Apt ', 'HNL', 1, '2019-09-14 07:14:31'),
(1616, 284, 'USA', 'Boise (ID) - Boise Air Terminal ', 'BOI', 1, '2019-09-14 07:14:31'),
(1626, 284, 'USA', 'Chicago (IL), O\'Hare Int\'l Apt ', 'ORD', 1, '2019-09-14 07:14:31'),
(1639, 284, 'USA', 'Indianapolis (IN) Int\'l ', 'IND', 1, '2019-09-14 07:14:31'),
(1641, 284, 'USA', 'South Bend (IN) ', 'SBN', 1, '2019-09-14 07:14:31'),
(1644, 284, 'USA', 'Cedar Rapids IA ', 'CID', 1, '2019-09-14 07:14:31'),
(1645, 284, 'USA', 'Des Moines (IA) - Des Moines Int\'l Apt ', 'DSM', 1, '2019-09-14 07:14:31'),
(1649, 284, 'USA', 'Sioux City IA ', 'SUX', 1, '2019-09-14 07:14:31'),
(1653, 284, 'USA', 'Wichita (KS) ', 'ICT', 1, '2019-09-14 07:14:31'),
(1654, 284, 'USA', 'Lexington (KY) ', 'LEX', 1, '2019-09-14 07:14:31'),
(1655, 284, 'USA', 'Louisville (KY) ', 'SDF', 1, '2019-09-14 07:14:31'),
(1659, 284, 'USA', 'Baton Rouge Metropolitan Apt ', 'BTR', 1, '2019-09-14 07:14:31'),
(1663, 284, 'USA', 'New Orleans, LA', 'MSY', 1, '2019-09-14 07:14:32'),
(1664, 284, 'USA', 'Shreveport, LA', 'SHV', 1, '2019-09-14 07:14:32'),
(1670, 284, 'USA', 'Baltimore (MD) - Washington Int\'l Apt ', 'BWI', 1, '2019-09-14 07:14:32'),
(1672, 284, 'USA', 'Boston- General Edward Lawrence Logan ', 'BOS', 1, '2019-09-14 07:14:32'),
(1681, 284, 'USA', 'Detroit (MI) , Wayne County Apt ', 'DTW', 1, '2019-09-14 07:14:32'),
(1684, 284, 'USA', 'Grand Rapids (MI) ', 'GRR', 1, '2019-09-14 07:14:32'),
(1697, 284, 'USA', 'Grand Rapids (MN) ', 'GPZ', 1, '2019-09-14 07:14:32'),
(1701, 284, 'USA', 'Minneapolis - St. Paul Int\'l Apt (MN) ', 'MSP', 1, '2019-09-14 07:14:32'),
(1713, 284, 'USA', 'Kansas City (MO) - Kansas City Int\'l Apt ', 'MCI', 1, '2019-09-14 07:14:32'),
(1715, 284, 'USA', 'St. Louis (MO) Lambert–St. Louis Int\'l Apt ', 'STL', 1, '2019-09-14 07:14:32'),
(1731, 284, 'USA', 'Lincoln (NE) ', 'LNK', 1, '2019-09-14 07:14:32'),
(1732, 284, 'USA', 'Omaha (NE) ', 'OMA', 1, '2019-09-14 07:14:32'),
(1737, 284, 'USA', 'Las Vegas (NV) ', 'LAS', 1, '2019-09-14 07:14:32'),
(1738, 284, 'USA', 'Reno (NV) ', 'RNO', 1, '2019-09-14 07:14:32'),
(1741, 284, 'USA', 'Manchester (NH) ', 'MHT', 1, '2019-09-14 07:14:32'),
(1743, 284, 'USA', 'Newark (NJ) ', 'EWR', 1, '2019-09-14 07:14:32'),
(1745, 284, 'USA', 'Albuquerque (NM) ', 'ABQ', 1, '2019-09-14 07:14:32'),
(1747, 284, 'USA', 'Albany (NY) - Albany Int\'l Apt ', 'ALB', 1, '2019-09-14 07:14:32'),
(1748, 284, 'USA', 'Buffalo/Niagara Falls (NY) ', 'BUF', 1, '2019-09-14 07:14:32'),
(1753, 284, 'USA', 'Long Island, Islip (NY) - Mac Arthur ', 'ISP', 1, '2019-09-14 07:14:32'),
(1754, 284, 'USA', 'New York - John F. Kennedy (NY) ', 'JFK', 1, '2019-09-14 07:14:32'),
(1755, 284, 'USA', 'New York - LaGuardia (NY) ', 'LGA', 1, '2019-09-14 07:14:32'),
(1761, 284, 'USA', 'Rochester (NY) ', 'ROC', 1, '2019-09-14 07:14:32'),
(1762, 284, 'USA', 'Syracuse (NY) ', 'SYR', 1, '2019-09-14 07:14:32'),
(1766, 284, 'USA', 'Charlotte (NC) ', 'CLT', 1, '2019-09-14 07:14:32'),
(1768, 284, 'USA', 'Greensboro/Winston Salem (NC) ', 'GSO', 1, '2019-09-14 07:14:32'),
(1769, 284, 'USA', 'Greenville (NC) ', 'PGV', 1, '2019-09-14 07:14:32'),
(1774, 284, 'USA', 'Raleigh/Durham (NC) ', 'RDU', 1, '2019-09-14 07:14:32'),
(1780, 284, 'USA', 'Grand Forks (ND) ', 'GFK', 1, '2019-09-14 07:14:32'),
(1784, 284, 'USA', 'Akron (OH) ', 'CAK', 1, '2019-09-14 07:14:32'),
(1786, 284, 'USA', 'Cincinnati (OH) - Cincinnati/N Kentucky Int\'l ', 'CVG', 1, '2019-09-14 07:14:32'),
(1787, 284, 'USA', 'Cleveland (OH) - Cleveland Hopkins Int\'l ', 'CLE', 1, '2019-09-14 07:14:32'),
(1788, 284, 'USA', 'Cleveland (OH) , Burke Lakefront ', 'BKL', 1, '2019-09-14 07:14:32'),
(1789, 284, 'USA', 'Columbus (OH) - Port Columbus Int\'l ', 'CMH', 1, '2019-09-14 07:14:32'),
(1790, 284, 'USA', 'Dayton (OH) ', 'DAY', 1, '2019-09-14 07:14:32'),
(1792, 284, 'USA', 'Toledo (OH) ', 'TOL', 1, '2019-09-14 07:14:32'),
(1795, 284, 'USA', 'Oklahoma City (OK) - Will Rogers World ', 'OKC', 1, '2019-09-14 07:14:32'),
(1796, 284, 'USA', 'Tulsa (OK) ', 'TUL', 1, '2019-09-14 07:14:32'),
(1802, 284, 'USA', 'Portland Int\'l (OR) ', 'PDX', 1, '2019-09-14 07:14:32'),
(1816, 284, 'USA', 'Philadelphia (PA) - Int\'l ', 'PHL', 1, '2019-09-14 07:14:32'),
(1817, 284, 'USA', 'Pittsburgh Int\'l Apt (PA) ', 'PIT', 1, '2019-09-14 07:14:32'),
(1822, 284, 'USA', 'Providence (RI) ', 'PVD', 1, '2019-09-14 07:14:32'),
(1823, 284, 'USA', 'Charleston (SC) ', 'CHS', 1, '2019-09-14 07:14:32'),
(1824, 284, 'USA', 'Columbia (SC) - Columbia Metropolitan Apt ', 'CAE', 1, '2019-09-14 07:14:32'),
(1826, 284, 'USA', 'Greenville/Spartanburg (SC) ', 'GSP', 1, '2019-09-14 07:14:32'),
(1841, 284, 'USA', 'Memphis (TN) ', 'MEM', 1, '2019-09-14 07:14:32'),
(1842, 284, 'USA', 'Nashville (TN) ', 'BNA', 1, '2019-09-14 07:14:32'),
(1846, 284, 'USA', 'Austin (TX) - Austin-Bergstrom Apt ', 'AUS', 1, '2019-09-14 07:14:32'),
(1851, 284, 'USA', 'Dallas/Ft. Worth', 'DFW', 1, '2019-09-14 07:14:32'),
(1852, 284, 'USA', 'El Paso (TX) - El Paso Int\'l Apt ', 'ELP', 1, '2019-09-14 07:14:32'),
(1855, 284, 'USA', 'Houston, TX - George Bush Intercontinental Apt ', 'IAH', 1, '2019-09-14 07:14:32'),
(1858, 284, 'USA', 'Laredo (TX) ', 'LRD', 1, '2019-09-14 07:14:32'),
(1864, 284, 'USA', 'San Antonio (TX) ', 'SAT', 1, '2019-09-14 07:14:32'),
(1869, 284, 'USA', 'Salt Lake City (UT) ', 'SLC', 1, '2019-09-14 07:14:32'),
(1877, 284, 'USA', 'Norfolk/Virginia Beach (VA) ', 'ORF', 1, '2019-09-14 07:14:32'),
(1882, 284, 'USA', 'Washington DC - Dulles Int\'l ', 'IAD', 1, '2019-09-14 07:14:32'),
(1889, 284, 'USA', 'Seattle/Tacoma (WA) ', 'SEA', 1, '2019-09-14 07:14:32'),
(1896, 284, 'USA', 'Charleston (WV) - Yeager Apt ', 'CRW', 1, '2019-09-14 07:14:32'),
(1908, 284, 'USA', 'Milwaukee (WI) ', 'MKE', 1, '2019-09-14 07:14:32'),
(1921, 247, 'Uzbekistan', 'Samarkand - Samarkand Int\'l Apt ', 'SKD', 1, '2019-09-14 07:14:32'),
(1922, 247, 'Uzbekistan', 'Tashkent - Int\'l ', 'TAS', 1, '2019-09-14 07:14:32'),
(1923, 247, 'Uzbekistan', 'Termez (Termes) ', 'TMZ', 1, '2019-09-14 07:14:32'),
(1924, 247, 'Uzbekistan', 'Urgench ', 'UGC', 1, '2019-09-14 07:14:32'),
(1925, 0, 'Vanuatu', 'Port Vila ', 'VLI', 1, '2019-09-14 07:14:32'),
(1926, 0, 'Vanuatu', 'Santo ', 'SON', 1, '2019-09-14 07:14:32'),
(1927, 0, 'Vanuatu', 'Ulei ', 'ULB', 1, '2019-09-14 07:14:32'),
(1928, 248, 'Venezuela', 'Barcelona ', 'BLA', 1, '2019-09-14 07:14:32'),
(1929, 248, 'Venezuela', 'Caracas - Simón Bolívar Int\'l Apt ', 'CCS', 1, '2019-09-14 07:14:32'),
(1930, 248, 'Venezuela', 'Ciudad Guayana ', 'CGU', 1, '2019-09-14 07:14:32'),
(1931, 248, 'Venezuela', 'Maracaibo - La Chinita Int\'l ', 'MAR', 1, '2019-09-14 07:14:32'),
(1932, 248, 'Venezuela', 'Margerita ', 'PMV', 1, '2019-09-14 07:14:32'),
(1933, 248, 'Venezuela', 'Puerto Ordaz ', 'PZO', 1, '2019-09-14 07:14:32'),
(1934, 248, 'Venezuela', 'Uriman ', 'URM', 1, '2019-09-14 07:14:32'),
(1935, 248, 'Venezuela', 'Valencia ', 'VLN', 1, '2019-09-14 07:14:32'),
(1936, 249, 'Vietnam', 'Hanoi - Noi Bai Int\'l Apt ', 'HAN', 1, '2019-09-14 07:14:32'),
(1937, 249, 'Vietnam', 'HoChiMinh City (Saigon) - Tan Son Nhat Int\'l ', 'SGN', 1, '2019-09-14 07:14:32'),
(1938, 249, 'Vietnam', 'Hue - Phu Bai ', 'HUI', 1, '2019-09-14 07:14:32'),
(1939, 250, 'Virgin Isles (British)', 'Beef Island - Terrance B. Lettsome ', 'EIS', 1, '2019-09-14 07:14:32'),
(1940, 250, 'Virgin Isles (British)', 'Tortola ', 'TOV', 1, '2019-09-14 07:14:32'),
(1941, 250, 'Virgin Isles (British)', 'Virgin Gorda ', 'VIJ', 1, '2019-09-14 07:14:32'),
(1942, 251, 'Virgin Isles (US)', 'St. Croix ', 'STX', 1, '2019-09-14 07:14:32'),
(1943, 251, 'Virgin Isles (US)', 'St. Thomas ', 'STT', 1, '2019-09-14 07:14:32'),
(1944, 0, 'Wallis and Futuna', 'Futuna ', 'FUT', 1, '2019-09-14 07:14:32'),
(1945, 0, 'Wallis and Futuna', 'Wallis ', 'WLS', 1, '2019-09-14 07:14:32'),
(1946, 0, 'Western Sahara', 'Not Applicable', 'WSH', 1, '2019-09-14 07:14:32'),
(1947, 252, 'Yemen', 'Aden - Aden Int\'l Apt ', 'ADE', 1, '2019-09-14 07:14:32'),
(1948, 252, 'Yemen', 'Sanaa (Sana\'a) - Sana\'a Int\'l ', 'SAH', 1, '2019-09-14 07:14:32'),
(1949, 253, 'Yugoslavia', 'Not Applicable', 'YUG', 1, '2019-09-14 07:14:32'),
(1950, 254, 'Zaire', 'Not Applicable', 'ZAI', 1, '2019-09-14 07:14:32'),
(1951, 255, 'Zambia', 'Chipata ', 'CIP', 1, '2019-09-14 07:14:32'),
(1952, 255, 'Zambia', 'Kitwe ', 'KIW', 1, '2019-09-14 07:14:32'),
(1953, 255, 'Zambia', 'Lusaka - Lusaka Int\'l Apt ', 'LUN', 1, '2019-09-14 07:14:32'),
(1954, 255, 'Zambia', 'Mfuwe ', 'MFU', 1, '2019-09-14 07:14:32'),
(1955, 255, 'Zambia', 'N\'Dola ', 'NLA', 1, '2019-09-14 07:14:32'),
(1956, 256, 'Zimbabwe', 'Buffalo Range ', 'BFO', 1, '2019-09-14 07:14:32'),
(1957, 256, 'Zimbabwe', 'Bulawayo ', 'BUQ', 1, '2019-09-14 07:14:32'),
(1958, 256, 'Zimbabwe', 'Gweru ', 'GWE', 1, '2019-09-14 07:14:32'),
(1959, 256, 'Zimbabwe', 'Harare - Harare Int\'l Apt ', 'HRE', 1, '2019-09-14 07:14:32'),
(1962, 256, 'Zimbabwe', 'Salisbury ', 'SAY', 1, '2019-09-14 07:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `fc_invoice`
--

DROP TABLE IF EXISTS `fc_invoice`;
CREATE TABLE IF NOT EXISTS `fc_invoice` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `bill_to` text NOT NULL,
  `company_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `company_mail` varchar(255) NOT NULL,
  `address1` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address2` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `zip` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description_text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `transfer_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `inv_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `inv_number` varchar(10) NOT NULL,
  `inv_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `inv_file` varchar(255) NOT NULL DEFAULT '',
  `notes` text,
  `terms` varchar(255) NOT NULL,
  `status` enum('new','void','open','paid','partial') NOT NULL DEFAULT 'new',
  `sent_date` date NOT NULL DEFAULT '0000-00-00',
  `paid_date` date NOT NULL DEFAULT '0000-00-00',
  `void_date` date NOT NULL DEFAULT '0000-00-00',
  `access_key` varchar(250) NOT NULL DEFAULT '',
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`inv_number`),
  KEY `status` (`status`),
  KEY `access_key` (`access_key`)
) ENGINE=MyISAM AUTO_INCREMENT=318 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_invoice`
--

INSERT INTO `fc_invoice` (`id`, `company_id`, `bill_to`, `company_name`, `company_mail`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `description_text`, `transfer_desc`, `inv_desc`, `inv_number`, `inv_date`, `amount`, `paid`, `balance`, `inv_file`, `notes`, `terms`, `status`, `sent_date`, `paid_date`, `void_date`, `access_key`, `created_at`, `updated_at`) VALUES
(307, 0, '', 'Sivakumar Munisamy', 'siva.pictuscode@gmail.com', 'No: 2,2 Tank Street, V.c.mottur,', 'Walajapet', 'Vellore', 'Tamilnadu', 'India', '632513', '[{\"inv_line\":\"Annual Membership\",\"amount\":\"2500\"},{\"inv_line\":\"Pay\",\"amount\":\"25\"}]', 'Bank: Wells Fargo Bank, N.A. 420 Montgomery St, San Francisco, CA 94104 A/C: Lighthouse Network Management, Inc. Account #: 1384802359 ABA: 063107513 - SWIFT/BIC: WFBIUS6S', 'Invoice for Annual Membership', '2020-307', '2020-02-13', '2525.00', '0.00', '0.00', '2020-307', 'Thank you - we appreciate your support of the Global Logistics Summit Network!1', 'Terms', 'paid', '0000-00-00', '0000-00-00', '0000-00-00', '', 1581486569, 1581486569),
(308, 2, 'sivapicky123 \\t Walajapet,Vellore \\t Vellore \\t Tamilandu \\t India', 'Pictuscode Pvt Ltd', '', 'Walajapet', 'Vellore', 'Vellore', 'Tamilandu', 'India', '632513', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Chennai (Madras)  (MAA)\"},{\"amount\":\"250\",\"description\":\"Annual Membership Fee in respect of additional office:  Cochin  (COK)\"},{\"amount\":\"300.00\",\"description\":\"Payment Protection - up to USD 10,000.00 per incident \"},{\"amount\":\"250.00\",\"description\":\"Advertizing: Displayed as Featured Member on GLSN Homepage \"},{\"amount\":\"250.00\",\"description\":\"Advertizing: Displayed as Top Listing on India Member Directory \"},{\"amount\":\"750.00\",\"description\":\"Summit Fee for attending 2nd Bi-Annual Conference \"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"},{\"amount\":\"-75\",\"description\":\"Discount\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S1\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE1', '2020-308', '2020-02-12', '3700.00', '0.00', '3700.00', '2020-308', 'Thank you - we appreciate your support of the Global Logistics Summit Network1!', 'Due on receipt1', 'paid', '2020-02-12', '2020-02-12', '0000-00-00', '', 1581486722, 1581486722),
(309, 0, '', 'magesh', 'magi@gm.com', '13E1,s Street', '', 'Walajapet', 'tamil nadu', 'india', '635213', '[{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"5000\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"200\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"-200\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"-10\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"40000\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"1000\"},{\"inv_line\":\"v\",\"amount\":\"-3000\"},{\"inv_line\":\"line one for the details of description where you can add and delete lines \",\"amount\":\"5000\"}]', 'Bank: Wells Fargo Bank, N.A. 420 Montgomery St, San Francisco, CA 94104 A/C: Lighthouse Network Management, Inc. Account #: 1384802359 ABA: 063107513 - SWIFT/BIC: WFBIUS6S', 'detail description about invoice', '2020-309', '2020-02-11', '47990.00', '0.00', '0.00', '2020-309', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'this is forwards', 'paid', '0000-00-00', '0000-00-00', '0000-00-00', '', 1581490240, 1581490240),
(310, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"},{\"amount\":\"125\",\"description\":\"breakfast\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-310', '2020-02-24', '2100.00', '0.00', '2100.00', '2020-310', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582548565, 1582548565),
(311, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-311', '2020-02-24', '1975.00', '0.00', '1975.00', '2020-311', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582551545, 1582551545),
(312, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-312', '2020-02-24', '1975.00', '0.00', '1975.00', '2020-312', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582551849, 1582551849),
(313, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"},{\"amount\":\"150\",\"description\":\"Member fee\"},{\"amount\":\"250\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"150\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"250\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"550\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"25000\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-313', '2020-02-24', '28325.00', '0.00', '28325.00', '2020-313', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582551922, 1582551922),
(314, 0, '', 'Sivakumar Munisamy', 'siva.pictuscode@gmail.com', 'No:2/175 tank street, v.c.mottur, walajapet', 'Vellore', 'vellore', 'tamilnadu', 'india', '632513', '[{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"2500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"150\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"253\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"150\"}]', 'Bank: Wells Fargo Bank, N.A. 420 Montgomery St, San Francisco, CA 94104 A/C: Lighthouse Network Management, Inc. Account #: 1384802359 ABA: 063107513 - SWIFT/BIC: WFBIUS6S', 'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)', '2020-314', '2020-02-26', '3053.00', '0.00', '0.00', '2020-314', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Please pay before 10th', 'open', '0000-00-00', '0000-00-00', '0000-00-00', '', 1582552110, 1582552110),
(315, 0, '', 'Sivakumar Munisamy', 'siva.pictuscode@gmail.com', 'No:2/175 tank street, v.c.mottur, walajapet', 'Vellore', 'vellore', 'tamilnadu', 'india', '632513', '[{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"2500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"1500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"150\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"3500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"2562\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"1500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"1500\"},{\"inv_line\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\",\"amount\":\"250\"}]', 'Bank: Wells Fargo Bank, N.A. 420 Montgomery St, San Francisco, CA 94104 A/C: Lighthouse Network Management, Inc. Account #: 1384802359 ABA: 063107513 - SWIFT/BIC: WFBIUS6S', 'Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)', '2020-315', '2020-02-25', '13462.00', '0.00', '0.00', '2020-315', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Please pay before 10th', 'open', '0000-00-00', '0000-00-00', '0000-00-00', '', 1582552172, 1582552172),
(316, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"},{\"amount\":\"2250\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"3500\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"1500\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"152\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"550\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-316', '2020-02-24', '9927.00', '0.00', '9927.00', '2020-316', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582552307, 1582552307),
(317, 3, 'aaaa \\t sss,sss \\t sss \\t  \\t Albania', 'aaaa', '', 'sss', 'sss', 'sss', '', 'Albania', '', '[{\"amount\":\"1250.00\",\"description\":\"Annual Membership Fees (inclusive of 1 Summit Fee) in respect of your Tirana - Rinas  (TIA)\"},{\"amount\":\"700.00\",\"description\":\"Additional person for the summits.\"},{\"amount\":\"25.00\",\"description\":\"Inbound Wire Transfer Fee\"}]', 'Bank: Wells Fargo Bank, N.A.\r\n420 Montgomery St, San Francisco, CA 94104\r\nA/C: Lighthouse Network Management, Inc.\r\nAccount #: 1384802359\r\nABA: 063107513 - SWIFT/BIC: WFBIUS6S\r\n', '\"GLOBAL LOGISTICS SUMMIT NETWORK\" (GLSN) - MEMBERSHIP INVOICE', '2020-317', '2020-02-24', '1975.00', '0.00', '1975.00', '2020-317', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2020-02-24', '0000-00-00', '0000-00-00', '', 1582552373, 1582552373);

-- --------------------------------------------------------

--
-- Table structure for table `fc_invoice_payment`
--

DROP TABLE IF EXISTS `fc_invoice_payment`;
CREATE TABLE IF NOT EXISTS `fc_invoice_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` int(11) NOT NULL,
  `pay_amount` decimal(25,2) NOT NULL,
  `paid_on` datetime NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_invoice_payment`
--

INSERT INTO `fc_invoice_payment` (`payment_id`, `inv_id`, `pay_amount`, `paid_on`, `created`) VALUES
(1, 307, '2525.00', '2020-02-12 00:00:00', '2020-02-12 00:49:54'),
(2, 308, '3700.00', '2020-02-12 00:00:00', '2020-02-12 00:55:47'),
(3, 309, '4700.00', '2020-02-12 00:00:00', '2020-02-12 01:52:40'),
(4, 309, '43000.00', '2020-02-15 00:00:00', '2020-02-12 01:53:02'),
(5, 309, '290.00', '2020-02-21 00:00:00', '2020-02-12 01:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `fc_mailing_list`
--

DROP TABLE IF EXISTS `fc_mailing_list`;
CREATE TABLE IF NOT EXISTS `fc_mailing_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `meta` text,
  `member` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `port_estimates` int(11) NOT NULL,
  `created_at` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_mailing_list`
--

INSERT INTO `fc_mailing_list` (`id`, `email`, `meta`, `member`, `public`, `reference`, `port_estimates`, `created_at`, `updated_at`) VALUES
(1, 'siva.pictuscode@gmail.com', NULL, 1, 0, 0, 0, 1581486947, 1581486947),
(2, 'siva@pictuscode.com', NULL, 1, 0, 0, 0, 1581486947, 1581486947);

-- --------------------------------------------------------

--
-- Table structure for table `fc_member_news`
--

DROP TABLE IF EXISTS `fc_member_news`;
CREATE TABLE IF NOT EXISTS `fc_member_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `author_email` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `archive` varchar(50) NOT NULL,
  `archeived_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `document` varchar(100) NOT NULL,
  `post_date` date NOT NULL DEFAULT '0000-00-00',
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_member_news`
--

INSERT INTO `fc_member_news` (`id`, `author`, `author_email`, `company_id`, `post_type`, `title`, `content`, `archive`, `archeived_date`, `document`, `post_date`, `status`, `created`) VALUES
(1, 'Andy', 'Andy@go2LNM.com', 4, 0, 'New office location', 'We have opened up in Dallas TZ!', '1week', '2020-01-28 00:00:00', '', '2020-01-21', 1, '2020-01-21 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_news`
--

DROP TABLE IF EXISTS `fc_news`;
CREATE TABLE IF NOT EXISTS `fc_news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner_id` bigint(20) DEFAULT '0',
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('draft','publish','terminated') NOT NULL DEFAULT 'publish',
  `display_order` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`,`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_news`
--

INSERT INTO `fc_news` (`id`, `owner_id`, `title`, `slug`, `content`, `img`, `post_date`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'GSAN welcomes Sharaf Shipping Agency (SSA)', 'gsan-welcomes-sharaf-shipping-agency-ssa', '<p style=\"text-align: justify;\"><span style=\"text-decoration: underline;\">May 13, 2017</span>:&nbsp; GSAN welcomes Sharaf Shipping Agency (SSA) as its latest member.</p>\r\n<p style=\"text-align: justify;\">SSA was founded in 1976 as a Ship Agency its core activity has evolved to include Hub Services, Offshore Supply, Freight Forwarding, Project Cargo, Chartering &amp; Brokering and Logistics &amp; Warehousing Services. SSA has continuously expanded its network of owned offices throughout the Middle East/Africa and, today, employs over 1,000 multinational executives with proven shipping experience. Their website at: <a href=\"http://www.sharafshipping.com\">www.sharafshipping.com</a></p>', '', '2015-04-04 19:34:50', 'draft', 0, '2015-04-04 19:34:50', '2018-11-26 10:34:07'),
(5, 6, 'Interport Ship Agents Ltd of Bangladesh becomes GSAN member', 'interport-ship-agents-ltd-of-bangladesh-becomes-gsan-member', '<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">GSAN is pleased to announce that <strong>Interport Ship Agents Ltd</strong> (ISAL) of <strong>Bangladesh</strong> has <strong>joined</strong> our growing and dynamic Global Ship Agencies Network.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Since 2001 Interport Ship Agents Ltd (ISAL) provides an extensive range of services to ship owners and operators in both tramp and liner shipping sectors, as well as ship management companies and charterers. Interport offers comprehensive range of agency services, tailor-made for today\'s liner and tramp vessels calling at the Bangladeshi ports of Chittagong and Mongla. These services cover both ship husbandry and cargo services involving bulk, containers, RoRo, break bulk, LPG, project and heavy lift cargoes.<br />Interport is also working as an International Freight Forwarder incl. LCL consolidation and NVOCC.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Last but not least, Interport is also correspondent for a number of the International Group P&amp;I Clubs and able to assists with claims or problems, which may be of concern to the P&amp;I Clubs and their Members.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">The Key Contact is Syed Golam Gous Waheed, Director Sales. Additional information can be found on their Member Profile or their website at: <a style=\"color: #cc3300; text-decoration: underline;\" href=\"http://www.interport.org\">www.interport.org</a></p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Please join GSAN in welcoming Interport to GSAN. Please work with them to develop mutual business.</p>', '', '2018-05-23 00:47:20', 'publish', 0, '2018-05-22 06:07:44', '2018-05-23 00:48:02'),
(4, 6, 'GSAN invites you to join Bimco webinar on new FONASBA General Agency Agreement', 'gsan-invites-you-to-join-bimco-webinar-on-new-fonasba-general-agency-agreement', '<p style=\"margin: 0px 0px 10px; line-height: 22px;\"><span style=\"font-size: 14px;\"><strong>\"GSAN invites you to join Bimco webinar on new FONASBA General Agency Agreement</strong></span><span style=\"font-size: 14px;\"><strong>\"<br /></strong></span></p>\r\n<p style=\"margin: 0px 0px 10px; line-height: 22px;\">Dear Sir/Madam,</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">We herewith invite you to join the <strong>free</strong> Bimco <strong>webinar</strong> on <strong>Thursday 5 April at 9.00 CET</strong> (10.00 CEST) to hear about the<strong> newly published BIMCO/FONASBA General Agency Agreement</strong>.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Agency appointments are often agreed over the phone or by email. But with ship operations becoming ever more complex,</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">there is a growing need for a standard agreement that clearly sets out the services to be performed by the agents and the liabilities and responsibilities of both parties.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">A panel will discuss the new agreement and explain why agents and their principals would benefit from using it:</p>\r\n<ul style=\"margin-top: 0px; margin-bottom: 10px;\">\r\n<li>John Foord - FONASBA President</li>\r\n<li>Han van Blanken - BIMCO Documentary Committee member &amp; GSAN Executive Director</li>\r\n<li>Luis Bernat &ndash; Danish Shipbrokers Association &amp; Chaiman of the Institute of Chartered Shipbrokers Branch in Denmark</li>\r\n</ul>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\"><a style=\"color: #cc3300; text-decoration: underline;\" href=\"https://ukbimco.doodle.com/poll/yczr6wzf6mwb5bxx\" target=\"_blank\">Sign up</a> to watch this free webinar.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\"><strong>UPDATE:</strong> the webinar can be viewed on YouTube via following link: <a href=\"https://www.youtube.com/watch?v=56NCZzUHh6k&amp;feature=youtu.be\" target=\"_blank\" rel=\"nofollow\" data-ft=\"{&quot;tn&quot;:&quot;-U&quot;}\" data-lynx-mode=\"asynclazy\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D56NCZzUHh6k%26feature%3Dyoutu.be&amp;h=ATNhc0yeWGgiInHkroc3PSSZ-DlYuGHXp7LIUGKuSLiH6w7jB5wk9aLkIP_fT4aXClksnJ4icPyNm0NhVNxDZLPYaGRXUj3Sw0AqjuJyHvyTKv6aJWXHfSUT4i5nrDeRAXQzKU1eJ4jca5Y178GFegG-0khYslCR1v1-k3DW\">https://www.youtube.com/watch?v=56NCZzUHh6k&amp;feature=youtu.be</a></p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Viewers will be able to submit questions to the panel in advance. Send your questions to <a style=\"color: #cc3300; text-decoration: underline;\" href=\"mailto:contracts@bimco.org\" target=\"_blank\">contracts@bimco.org</a>.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">The General Agency Agreement can be found on the&nbsp; found on the <a style=\"color: #cc3300; text-decoration: underline;\" href=\"https://www.bimco.org/contracts-and-clauses/bimco-contracts/general-agency-agreement\" target=\"_blank\">BIMCO website</a>.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">We are available to answer any questions that you may have.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Yours sincerely,<br />Han van Blanken</p>', '', '2018-03-27 03:11:49', 'publish', 0, '2018-03-27 02:59:27', '2018-04-13 05:32:50'),
(130, 1, 'Albion Internation of Miami and Fort Lauderdale, FL, USA joins GLSN', 'albion-internation-of-miami-and-fort-lauderdale-fl-usa-joins-glsn', 'GSAN Welcome Albion Internation of Miami and Fort Lauderdale, FL, USA&lt;br /&gt;GSAN Welcome Albion Internation of Miami and Fort Lauderdale, FL, USA&lt;br /&gt;GSAN Welcome Albion Internation of Miami and Fort Lauderdale, FL, USA', 'A.png', '2020-01-22 00:00:00', 'publish', 0, '2020-01-21 05:14:47', '0000-00-00 00:00:00'),
(6, 6, 'McLarens Logistics Limited of Sri Lanka added new ports.', 'mclarens-logistics-limited-of-sri-lanka-added-new-ports', '<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">GSAN is pleased to announce that messrs <strong>McLarens Logistics Limited</strong> has <strong>added new ports</strong> to their services in <strong>Sri Lanka</strong>.<strong><br /></strong></p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">McLarens Logistics is a fully fledged Shipping and Freight Forwarding Company providing an array of services which include; International Freight Forwarding, NVOCC Agency (Dry, Reefer, Special &amp; ISO Tank Containers), Liner Agency Services (Containerized, Break Bulk, Ro-Ro etc.,) Supply of Bunkers, Arrangement of Surveys, Crew Change, Ship Supply Services etc.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">The Key Contact is Dumindha Saman, Commercial Manager of McLarens. Additional information can be found on their Member Profile or their website at: <a style=\"color: #cc3300; text-decoration: underline;\" href=\"http://www.mclarenslogistics.lk\">www.mclarenslogistics.lk</a></p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Please join GSAN in welcoming McLarens extending their services in Sri Lanka. Please work with them to develop mutual business.</p>', '', '2018-05-22 07:01:58', 'publish', 0, '2018-05-22 06:17:06', '2018-05-22 07:03:13'),
(7, 6, 'Emcar Ltd - Shipping Dept of Mauritius becomes GSAN member', 'emcar-ltd-shipping-dept-of-mauritius-becomes-gsan-member', '<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\"><strong>GSAN</strong> is pleased to announce that <strong>Emcar Ltd - Shipping Dept</strong> of <strong>Mauritius</strong> has joined our Global Ship Agencies Network as its latest member to serve <strong>Port Louis, Mauritius</strong>.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">In 1970, Emcar Ltd expanded its activities in the Shipping business, to include the export of commodities, mainly sugar and molasses. Since then, they have accumulated almost forty years worth of solid experience in the Shipping trade, from acting as an agent for liner vessels and bulk carriers, to handling Bulk Coal, Sugar shipments and tankers. Emcar\'s major asset are the people, who spare no effort to satisfy customers&rsquo; needs. Emcar\'s expertise &ndash; acquired both on-the-job and through academic training &ndash; is what gives Emcar its competitive edge.</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Emcar Ltd offers you services as Port Agent in Port Louis, Mauritius. They are situated near the port and ensure efficient Port services in the wake of a vision: &ldquo;The strategic location of Mauritius, Midway between Asia, Africa and Australia makes Mauritius the ideal hub of the Indian Ocean for International Trade&rdquo;.&nbsp;</p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">The Key Contacts are Finck Gaetan, Shipping Manager &amp; Charles Lam-I-Song, Head of Operation Department. Additional information can be found on their Member Profile or their website: <a style=\"color: #cc3300; text-decoration: underline;\" href=\"http://shipping.emcar.mu\">http://shipping.emcar.mu</a></p>\r\n<p style=\"margin: 0px 0px 10px 0px; line-height: 22px;\">Please join GSAN in welcoming Emcar Ltd to our network. Please work with them to develop mutual business.</p>', '', '2018-06-04 00:05:15', 'publish', 0, '2018-05-30 08:29:21', '2018-06-04 00:05:15'),
(8, 6, 'James Mackintosh and Company Pvt. Ltd., India joins GSAN', 'james-mackintosh-and-company-pvt-ltd-india-joins-gsan', '<p><strong>GSAN</strong> is pleased to announce that<strong> James Mackintosh and Company Pvt. Ltd.</strong> of <strong>India</strong> has joined our Global Ship Agencies Network as its latest member and serves seventeen ports across the Indian coast.</p>\r\n<p>James Mackintosh and Company Pvt. Ltd started their operations in Bombay in the year 1854 and was subsequently registered as a Private Ltd company in the year 1946. Over the years the company developed offices at several locations on the east and west coast of India,manned by competent personnel.&nbsp;James Mackintosh is well known in shipping circles in India with good relations with port and customs authorities. The Company also functions as P&amp;I correspondents for many major IG group clubs and fixed premium underwriters.</p>\r\n<p>James Mackintosh Agency Division represents Ship Owners, Managers, Operators and Charterers from across the world and provide 24 -hour assistance and information on all aspects of cargo operations, repairs, surveys and bunkering.</p>\r\n<p>GSAN is proud to add another quality company under our agency network and with James Mackintosh&rsquo;s presence at all major Indian ports it enables us to provide clients with the same level of professional expertise.</p>\r\n<p>The key contacts are Cdr Sanjiv Deoras, Sr. Vice President and Cecil Thomas, Sr. Manager. Additional information can be found on their GSAN Member Profile or their website: <a href=\"http://www.jamesmackintosh.com\">www.jamesmackintosh.com</a></p>\r\n<p>Please join GSAN in welcoming James Mackintosh and Company Pvt. Ltd. to our network and please liaise with them to develop mutual beneficial business.</p>\r\n<p>&nbsp;</p>', '', '2018-08-09 11:34:05', 'publish', 0, '2018-08-08 03:58:54', '2018-08-09 11:34:05'),
(9, 6, 'Gulf Harbor Shipping LLC, USA joined GSAN', 'gulf-harbor-shipping-llc-usa-joined-gsan', '<p>GSAN is pleased to announce that <strong>Gulf Harbor Shipping L.L.C.</strong> of <strong>United States of America</strong> has joined our Global Ship Agencies Network as its latest member to serve eleven ports within the <strong>USG and</strong><br /><strong>USEC area.</strong></p>\r\n<p>Gulf Harbor Shipping L.L.C. is a progressive shipping agency focused on customer service with a unique approach to port representation. It was formed in 2001 in New Orleans by seasoned executives<br />that today remain active in day-to-day operations. Drawing from years of handson experience in the shipping agency, the staff of Gulf Harbor is well-versed in operations, agency accounting, and management requirements. This balance of knowledge provides for the delivery of superior agency representation.</p>\r\n<p>Just like GSAN is Gulf Harbor focused on our trade; shipping agency. No hidden alliances or smoke and mirror perceptions. The commitment to the industry is reflected in the quality of service offered and ultimately the continuous support of customers world wide resulting in smooth voyages.</p>\r\n<p>The Key Contacts are Marshall Adams, Sales and Marketing Manager and David Kerns, Operations Manager. Additional information can be found on their Member Profile or their website: <a href=\"http://www.gulfharbor.com\">http://www.gulfharbor.com</a><br />Please join GSAN in welcoming Gulf Harbor Shipping L.L.C. to our network and please liaise with them to develop mutual beneficial business.</p>', '', '2018-08-29 01:12:40', 'publish', 0, '2018-08-28 01:07:50', '2018-08-29 01:12:40'),
(10, 6, 'Sabay Shipping Co. Ltd., Turkey joined GSAN', 'sabay-shipping-co-ltd-turkey-joined-gsan', '<p>GSAN is pleased to announce that messrs<strong> Sabay Shipping Co. Ltd.</strong> of <strong>Turkey</strong> has joined our Global Ship Agencies Network as its latest member and serves the ports of <strong>Iskenderun</strong> and <strong>Istanbul</strong>, <strong>Turkey</strong>.<br /><br />Sabay Shipping was established in 1984 and acts as ship agent and broker from their home port Iskenderun. Over the years the company opened branches in Mersin (1987), Istanbul (1998), Izmir (2002) and Izmit (2004) reflecting a stable and successful growth of their business.<br />The core business was serving world wide known ship owners and managers, which is still an important part of the activities, but today they also maintain close relation with Charterers.<br />Sabay nowadays concentrates on dealing with a wide range of dry cargoes including steels, fertilizers and project cargoes both as ship agent and broker.<br /><br />The key contacts are Mr. Bulent Aymen, CEO and Mr. Yusuf Yuncu, Agency Manager. Additional information can be found on their GSAN Member Profile or their website: <a href=\"http://www.sabayshipping.com\">www.sabayshipping.com</a><br /><br />Please join GSAN in welcoming Sabay Shipping Co. Ltd. to our network and please liaise with them to develop mutual beneficial business.</p>', '', '2018-11-27 02:08:40', 'publish', 0, '2018-11-26 10:37:21', '2018-11-27 02:08:40'),
(128, 1, 'Join the GSAN mailing list to be notified of GSAN and other industry news', 'join-the-gsan-mailing-list-to-be-notified-of-gsan-and-other-industry-news', '&lt;span style=&quot;color: #ff0000; font-size: 18pt;&quot;&gt;&lt;strong&gt;Pakka test&lt;/strong&gt;&lt;/span&gt;', 'news1.png', '2019-10-24 00:00:00', 'publish', 0, '2019-10-24 11:45:26', '0000-00-00 00:00:00'),
(129, 1, 'GLSN welcomes Trans-Copllections of Bolivia', 'glsn-welcomes-trans-copllections-of-bolivia', 'GLSN is pleased to announce its 1st Member in Bolivia.&amp;nbsp;', '2021SpringtSummit.png', '2019-12-30 00:00:00', 'publish', 0, '2019-12-30 04:05:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_newsletter`
--

DROP TABLE IF EXISTS `fc_newsletter`;
CREATE TABLE IF NOT EXISTS `fc_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fc_office`
--

DROP TABLE IF EXISTS `fc_office`;
CREATE TABLE IF NOT EXISTS `fc_office` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `info` varchar(250) NOT NULL,
  `is_ho` int(11) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `contact_info` longtext NOT NULL,
  `branch_email` varchar(250) NOT NULL,
  `iata_id` bigint(20) NOT NULL DEFAULT '0',
  `reg_date` date NOT NULL DEFAULT '0000-00-00',
  `approved_date` date NOT NULL DEFAULT '0000-00-00',
  `actived_date` date NOT NULL DEFAULT '0000-00-00',
  `terminated_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('draft','new','pending','active','terminated','hold') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`,`country_id`),
  KEY `port_id` (`iata_id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_office`
--

INSERT INTO `fc_office` (`id`, `company_id`, `country_id`, `info`, `is_ho`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `fax`, `contact_info`, `branch_email`, `iata_id`, `reg_date`, `approved_date`, `actived_date`, `terminated_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 87, '', 0, '', '', '', '', '', '', '', '', '', 708, '2020-01-29', '0000-00-00', '0000-00-00', '0000-00-00', 'draft', '2020-01-29 05:00:00', '2020-01-29 05:00:00'),
(2, 1, 87, '', 0, '', '', '', '', '', '', '', '', '', 710, '2020-01-29', '0000-00-00', '0000-00-00', '0000-00-00', 'draft', '2020-01-29 05:00:00', '2020-01-29 05:00:00'),
(3, 1, 87, '', 0, '', '', '', '', '', '', '', '', '', 736, '2020-01-29', '0000-00-00', '0000-00-00', '0000-00-00', 'draft', '2020-01-29 05:00:00', '2020-01-29 05:00:00'),
(4, 2, 87, '', 1, 'sivapicky123', 'sivapicky123', 'sivapicky123', '', '', '+91 544544545', '', '[{\"name\":\"sivapicky123\",\"job_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"}]', 'siva.pictuscode@gmail.com', 708, '2020-01-30', '2020-02-12', '2020-02-12', '0000-00-00', 'active', '2020-01-30 05:00:00', '2020-01-30 12:22:23'),
(5, 2, 87, '', 1, 'sivapicky123', 'sivapicky123', 'sivapicky123', '', '', '+91 544544545', '', '[{\"name\":\"sivapicky123\",\"job_title\":\"siva.pictuscode@gmail.com\",\"email\":\"siva.pictuscode@gmail.com\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"}]', 'siva.pictuscode@gmail.com', 709, '2020-01-30', '2020-02-12', '2020-02-12', '0000-00-00', 'active', '2020-01-30 05:00:00', '2020-01-30 12:22:35'),
(6, 3, 2, '', 1, 'sss', '', 'sss', '', '', '+355 ss', '', '[{\"name\":\"aaaa\",\"job_title\":\"wwww\",\"email\":\"aaaa@aol.com\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"},{\"name\":\"\",\"job_title\":\"\",\"email\":\"\",\"skype\":\"\",\"mobile\":\"\"}]', 'aaa@aol.com', 4, '2020-02-24', '2020-02-24', '0000-00-00', '0000-00-00', 'pending', '2020-02-24 05:00:00', '2020-02-24 17:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `fc_post`
--

DROP TABLE IF EXISTS `fc_post`;
CREATE TABLE IF NOT EXISTS `fc_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_name` text NOT NULL,
  `post_description` text NOT NULL,
  `documents` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `age_limit` int(11) NOT NULL,
  `priority_age_limit` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `qualification_option` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL COMMENT '1=>SSLC Details 2=>+2 3=>ITI 4=>Diploma 5=>UG Degree 6=>PG Degree 7=>Typewriting 8=>Shorthand 9=>Others 1 10=>Others 2 11=>Others 3',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `fc_post`
--

INSERT INTO `fc_post` (`id`, `post_name`, `post_description`, `documents`, `start_date`, `end_date`, `age_limit`, `priority_age_limit`, `remarks`, `qualification_option`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Test Post      ', 'Eligible candidates should apply through online mode only. Candidates who have been sponsored by Employment Exchange and Ex-Serviceman candidates sponsored by the Directorate of Ex-serviceman Welfare should also apply through online mode only.', '', '2020-12-07 02:00:00', '2020-12-31 02:00:00', 30, 50, 'test', '1,2,3,4,6,7,8', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Asst Manager (Veterinary)          ', 'Eligible candidates should apply through online mode only. Candidates who have been sponsored by Employment Exchange and Ex-Serviceman candidates sponsored by the Directorate of Ex-serviceman Welfare should also apply through online mode only.', '', '2020-12-07 00:00:00', '2020-12-31 00:00:00', 32, 50, 'test', '2,3,5,11', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Asst Manager ', 'Eligible candidates should apply through online mode only. Candidates who have been sponsored by Employment Exchange and Ex-Serviceman candidates sponsored by the Directorate of Ex-serviceman Welfare should also apply through online mode only.', '', '2020-12-07 00:00:00', '2020-12-31 00:00:00', 40, 50, 'test', '1,2,3', 'Active', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_priority`
--

DROP TABLE IF EXISTS `fc_priority`;
CREATE TABLE IF NOT EXISTS `fc_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priority_name` varchar(500) NOT NULL,
  `age_limit` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fc_priority`
--

INSERT INTO `fc_priority` (`id`, `priority_name`, `age_limit`, `created`) VALUES
(1, 'Destitute Widow', 35, '2020-12-08 10:13:30'),
(2, 'Differently abled', 45, '2020-12-08 10:13:30'),
(3, 'Inter caste marriage', 45, '2020-12-08 10:13:30'),
(4, 'Ex-Serviceman', 53, '2020-12-08 10:13:30'),
(5, 'Dependants of Ex-Servicem', 53, '2020-12-08 10:13:30'),
(6, 'Freedom Fighter', 53, '2020-12-08 10:13:30'),
(7, 'Burma / Ceylon Repatriates', 53, '2020-12-08 10:13:30'),
(8, 'Owners of land acquired by Government', 53, '2020-12-08 10:13:30'),
(9, 'Orphans', 53, '2020-12-08 10:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `fc_questions`
--

DROP TABLE IF EXISTS `fc_questions`;
CREATE TABLE IF NOT EXISTS `fc_questions` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `title` varchar(5000) NOT NULL,
  `description` longtext NOT NULL,
  `email_template` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_questions`
--

INSERT INTO `fc_questions` (`id`, `title`, `description`, `email_template`, `status`, `created`) VALUES
(1, 'Organization of Logistics Professionals', 'Are you interested in additional information on the&amp;nbsp;&quot;&lt;a href=&quot;http://www.4olp.com&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;&lt;strong&gt;Organization of Logistics Professionals&lt;/strong&gt;&quot;&lt;/a&gt;&amp;nbsp;and their accreditation services for your employees?', 3, 1, '2020-01-13 08:28:14'),
(2, 'Riege', 'Are you interested in additional information on the Riege Software System?', 1, 1, '2020-01-13 08:30:21'),
(3, 'Cargowise Software System', 'Are you interested in additional information on WiseTech &amp;amp; their Cargowise Software System?', 6, 1, '2020-01-13 08:30:43'),
(4, 'NetworkPay', 'Are you interested in additional information about &lt;strong&gt;NetworkPay&lt;/strong&gt;? (a multi-currency &amp;amp; non-fee payment/receipt facility)', 5, 1, '2020-01-13 08:31:36'),
(5, 'BuyTasker', 'Are you interested in additional information about BuyTasker? (a trading platform for your clients combined with a freight RFQ facility)', 15, 1, '2020-01-13 08:32:05'),
(6, 'TransferWise', 'Are you interested in joining TransferWise? (a multi-currency &amp;amp; non-fee payment/receipt facility)', 10, 1, '2020-01-13 08:32:31'),
(7, 'GSAN', 'Are you a Ships Agency interested in joining &lt;strong&gt;Global Ships Agency Network (GSAN)&lt;/strong&gt;?', 29, 1, '2020-01-13 08:32:47'),
(8, 'Trans-Collections', 'Are you interested in additional information on &quot;&lt;a href=&quot;http://www.trans-collections.com&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Trans-Collections&lt;/a&gt;&quot; - for the recovery of delinquent debts from transportation companies?', 30, 1, '2020-01-21 10:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `fc_references`
--

DROP TABLE IF EXISTS `fc_references`;
CREATE TABLE IF NOT EXISTS `fc_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `reference_email` varchar(250) NOT NULL,
  `q1` varchar(50) NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(50) NOT NULL,
  `q4` varchar(50) NOT NULL,
  `q5` varchar(50) NOT NULL,
  `notes` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_referral`
--

DROP TABLE IF EXISTS `fc_referral`;
CREATE TABLE IF NOT EXISTS `fc_referral` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_email` varchar(250) NOT NULL,
  `prospect_company` varchar(250) NOT NULL,
  `prospect_contact_name` varchar(250) NOT NULL,
  `prospect_email` varchar(250) NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT '0',
  `sent_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reg_date` date NOT NULL DEFAULT '0000-00-00',
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_state`
--

DROP TABLE IF EXISTS `fc_state`;
CREATE TABLE IF NOT EXISTS `fc_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `fc_state`
--

INSERT INTO `fc_state` (`id`, `name`, `status`, `created`) VALUES
(1, 'ANDHRA PRADESH', 1, '2020-12-06 17:06:25'),
(2, 'ASSAM', 1, '2020-12-06 17:06:25'),
(3, 'ARUNACHAL PRADESH', 1, '2020-12-06 17:06:25'),
(4, 'BIHAR', 1, '2020-12-06 17:06:25'),
(5, 'GUJRAT', 1, '2020-12-06 17:06:25'),
(6, 'HARYANA', 1, '2020-12-06 17:06:25'),
(7, 'HIMACHAL PRADESH', 1, '2020-12-06 17:06:25'),
(8, 'JAMMU & KASHMIR', 1, '2020-12-06 17:06:25'),
(9, 'KARNATAKA', 1, '2020-12-06 17:06:25'),
(10, 'KERALA', 1, '2020-12-06 17:06:25'),
(11, 'MADHYA PRADESH', 1, '2020-12-06 17:06:25'),
(12, 'MAHARASHTRA', 1, '2020-12-06 17:06:25'),
(13, 'MANIPUR', 1, '2020-12-06 17:06:25'),
(14, 'MEGHALAYA', 1, '2020-12-06 17:06:25'),
(15, 'MIZORAM', 1, '2020-12-06 17:06:25'),
(16, 'NAGALAND', 1, '2020-12-06 17:06:25'),
(17, 'ORISSA', 1, '2020-12-06 17:06:25'),
(18, 'PUNJAB', 1, '2020-12-06 17:06:25'),
(19, 'RAJASTHAN', 1, '2020-12-06 17:06:25'),
(20, 'SIKKIM', 1, '2020-12-06 17:06:25'),
(21, 'TAMIL NADU', 1, '2020-12-06 17:06:25'),
(22, 'TRIPURA', 1, '2020-12-06 17:06:25'),
(23, 'UTTAR PRADESH', 1, '2020-12-06 17:06:25'),
(24, 'WEST BENGAL', 1, '2020-12-06 17:06:25'),
(25, 'DELHI', 1, '2020-12-06 17:06:25'),
(26, 'GOA', 1, '2020-12-06 17:06:25'),
(27, 'PONDICHERY', 1, '2020-12-06 17:06:25'),
(28, 'LAKSHDWEEP', 1, '2020-12-06 17:06:25'),
(29, 'DAMAN & DIU', 1, '2020-12-06 17:06:25'),
(30, 'DADRA & NAGAR', 1, '2020-12-06 17:06:25'),
(31, 'CHANDIGARH', 1, '2020-12-06 17:06:25'),
(32, 'ANDAMAN & NICOBAR', 1, '2020-12-06 17:06:25'),
(33, 'UTTARANCHAL', 1, '2020-12-06 17:06:25'),
(34, 'JHARKHAND', 1, '2020-12-06 17:06:25'),
(35, 'CHATTISGARH', 1, '2020-12-06 17:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `fc_summits`
--

DROP TABLE IF EXISTS `fc_summits`;
CREATE TABLE IF NOT EXISTS `fc_summits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `venue` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_summits`
--

INSERT INTO `fc_summits` (`id`, `name`, `start_date`, `end_date`, `venue`, `city`, `country`, `description`, `img`, `status`, `created_at`, `updated_at`, `link`) VALUES
(1, '2020 Fall GLSN Summit', '2020-10-16', '2020-10-18', 'Amari Watergate Hotel', 'Bangkok  ', 'Thailand', '&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-lft&quot;&gt;\r\n&lt;h3 class=&quot;site-head&quot;&gt;GLSN base Membership Fee is simple:&lt;/h3&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-price&quot;&gt;\r\n&lt;ul class=&quot;list-inline price-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD 1250.00&lt;/h5&gt;\r\n&lt;p&gt;per annum per company.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD 250.00&lt;/h5&gt;\r\n&lt;p&gt;per annum for each additional branch office.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-rgt&quot;&gt;\r\n&lt;p&gt;The Membership Fee INCLUDES a Summit Fee for&amp;nbsp;&lt;strong&gt;1 delegate&amp;nbsp;&lt;/strong&gt;to attend one of the following&amp;nbsp;&lt;strong&gt;2 Bi-Annual Summits.&lt;/strong&gt;&amp;nbsp;The Summit Fee for attending a 2nd Summit and/or bringing&amp;nbsp;&lt;strong&gt;additional delegates is USD 700.00/person.&lt;/strong&gt;&amp;nbsp;This fee is INCLUSIVE of charges relating to attending one of either the following&amp;nbsp;&lt;strong&gt;March or October GLSN Summits&amp;nbsp;&lt;/strong&gt;(Welcome Party, Summit Hall, Buffer Lunches, Social Evening and all related Summit expenses included - excludes Airfare and Hotel Rooms). The Summit Fee for attending a&amp;nbsp;&lt;strong&gt;2nd Summit and/or additional delegates is USD 700.00/person.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;', '2020FallSummit41.jpg', 1, '2019-12-12 09:28:43', '2019-12-12 09:28:43', 'https://development.pictuscode.com/glsn/summits'),
(2, '2021 Spring GLSN Summit', '2021-03-21', '2021-03-23', 'The Pullman Grande Sukhumvit Hotel', 'Bangkok', 'Thailand', 'The LandMark Hotel, Bangkok, Thailand', '2021SpringtSummit.jpg', 1, '2019-12-13 14:49:59', '2019-12-13 14:49:59', 'https://development.pictuscode.com/glsn/summits'),
(3, '2021 Fall GLSN Summit', '2021-10-17', '2021-10-19', 'Amari Watergate Hotel', 'Bangkok', 'Thailand', '&lt;span class=&quot;under_line&quot;&gt;&amp;nbsp;&lt;/span&gt;\r\n&lt;div class=&quot;clearfix&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;philosophy_inner_lft col-md-5 col-sm-5 col-xs-12 nopadd&quot;&gt;\r\n&lt;div class=&quot;philosophy_section col-md-12 col-sm-12 col-xs-12&quot;&gt;\r\n&lt;h3&gt;Great is not Good Enough!&lt;/h3&gt;\r\n&lt;p&gt;The ideology adopted at Pictuscode is to develop things simple but productive as well. This motto does not apply to our clients alone but also for the customers they are striving to enthrall. We are proficient in developing websites which are stunning and very simple to manipulate.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '2021FallSummit.jpg', 1, '2019-12-27 07:29:08', '2019-12-27 07:29:08', 'https://development.pictuscode.com/glsn/summits');

-- --------------------------------------------------------

--
-- Table structure for table `fc_users`
--

DROP TABLE IF EXISTS `fc_users`;
CREATE TABLE IF NOT EXISTS `fc_users` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `company_id` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `last_login_date` datetime NOT NULL,
  `last_logout_date` datetime NOT NULL,
  `last_login_ip` varchar(50) NOT NULL,
  `email_code` varchar(50) NOT NULL,
  `password_link` varchar(50) NOT NULL,
  `login_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_users`
--

INSERT INTO `fc_users` (`id`, `company_id`, `email`, `password`, `status`, `created`, `modified`, `last_login_date`, `last_logout_date`, `last_login_ip`, `email_code`, `password_link`, `login_type`) VALUES
(1, 2, 'siva.pictuscode@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-01-30 07:21:40', '0000-00-00 00:00:00', '2020-01-30 07:21:40', '0000-00-00 00:00:00', '112.133.236.123', '', '', 1),
(2, 3, 'aaaa@aol.com', '8f60c8102d29fcd525162d02eed4566b', 1, '2020-02-24 12:46:16', '0000-00-00 00:00:00', '2020-02-24 12:46:16', '0000-00-00 00:00:00', '98.211.179.171', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fc_whatsappgroup`
--

DROP TABLE IF EXISTS `fc_whatsappgroup`;
CREATE TABLE IF NOT EXISTS `fc_whatsappgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company` varchar(250) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
