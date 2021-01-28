-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 04:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glsn`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin`
--

CREATE TABLE `fc_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `access` varchar(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tasker_signup_fee` decimal(20,0) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `permission` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_admin`
--

INSERT INTO `fc_admin` (`id`, `firstname`, `lastname`, `email`, `access`, `password`, `tasker_signup_fee`, `admin_status`, `permission`) VALUES
(1, 'Admin', 'G', 'admin@gmail.com', '0', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `fc_admin_settings`
--

CREATE TABLE `fc_admin_settings` (
  `id` int(11) NOT NULL,
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
  `twitter_access_secrete` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_admin_settings`
--

INSERT INTO `fc_admin_settings` (`id`, `site_name`, `admin_email`, `meta_title`, `meta_description`, `meta_keywords`, `site_logo`, `site_logo1`, `site_favicon`, `fb_app_id`, `fb_app_secret`, `fb_access_token`, `twitter_app_id`, `twitter_name`, `home_title1`, `home_title2`, `copy_right`, `gmail_client_id`, `gmail_client_secret`, `gmail_redirect_url`, `gmap_key`, `service_fee_percentage`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `cancellation_percentage`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `google_data_studio_link`, `google_analytics`, `pagination_count`, `tasker_automation`, `banner_timings`, `twitter_api_key`, `twitter_api_secrete`, `twitter_access_token`, `twitter_access_secrete`) VALUES
(1, 'GLSN | Global Logistics Summit Network!', 'siva.pictuscode@gmail.com', 'Welcome to | Global Logistics Summit Network!', 'Welcome to | Global Logistics Summit Network!', 'Welcome to | Global Logistics Summit Network!', 'logo.png', 'foot-logo.png', 'logo1.png', '1238885706283937', '9d7b8db77f46fdce5263d80034ff24f1', 'EAARmwo5wu6EBAIMUeWLi3PoYMaMJdYtxiUaZCzURD7fhvV1ZBLEfYBTo44E2q5I1o1HhFfDuXU6Lmaacc80ECFiEJ01sPZAlnApuObOy1HCSMnPwX6rnwXWA0iNhZCGW1ZAJqQ3Ou1GZAZA2RzOR1BxbVdHGVQrgWhbrITmZCsZCYoQZDZD', '', '', 'Select and get any service you need with few easy clicks.', '', 'Inc, is the proud owner of the global logistics summit Network. © 2019 - All rights reserved.', '750331723449-p8a488bceago3paqueomcgud7rve9f5p.apps.googleusercontent.com', '1L8B71ESYsxnT8bI0HTPWJf1', 'http://localhost/transdir/site/user/google_response/', 'AIzaSyAIWZC4QlnRzGdoAPhzff_8HvwBBhK7l04', '15', 'ssl://smtp.gmail.com', '465', 'noreply.pictuscode.com@gmail.com', 'siva@123#', '5', 'https://www.facebook.com/pictuscode/', 'http://twitter.com', 'https://in.linkedin.com/', 'https://www.instagram.com/', 'https://datastudio.google.com/embed/reporting/13f-sZY1sO95oBtKgzf2VzEIV9AhOyrn6/page/1M', '&lt;!-- Global site tag (gtag.js) - Google Analytics --&gt;\r\n&lt;script async src=&quot;https://www.googletagmanager.com/gtag/js?id=UA-113362863-1&quot;&gt;&lt;/script&gt;\r\n&lt;script&gt;\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-113362863-1\');\r\n&lt;/script&gt;\r\n', 10, 0, '5000', 'hjI4ahos5J5okSiLryxQhDIcF', 'DYvXsxtAsU4Grqdy0lKSd4f8ILpOoCkAVHduQWE4Emt81a3smZ', '475441597-JkLeNSNOO5wSa57Mv1oDmQxMD5QDDSo6IY8LIzxG', 'dFTeKMwM8AoPx4cQdmhkeagqGJc47kX0wSm0TS9pu8Zyx');

-- --------------------------------------------------------

--
-- Table structure for table `fc_advertising`
--

CREATE TABLE `fc_advertising` (
  `id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '',
  `status` enum('hold','pending','active','terminate') NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_advertising`
--

INSERT INTO `fc_advertising` (`id`, `company_id`, `logo`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 3, '757a0c0c7e0751a0d3b68b90a95e8e0c.png', 'active', 'pictuscode.com', 1576215913, 1576215955);

-- --------------------------------------------------------

--
-- Table structure for table `fc_assign_summits`
--

CREATE TABLE `fc_assign_summits` (
  `id` int(11) NOT NULL,
  `summit_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_assign_summits`
--

INSERT INTO `fc_assign_summits` (`id`, `summit_id`, `company_id`, `created`) VALUES
(1, 1, 5, '2019-12-13 14:12:06'),
(2, 1, 3, '2019-12-13 14:27:40'),
(3, 2, 4, '2019-12-13 14:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `fc_banner`
--

CREATE TABLE `fc_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_banner`
--

INSERT INTO `fc_banner` (`id`, `name`, `description`, `banner_image`, `created`) VALUES
(17, 'Welcome', 'Welcome', 'banner.png', '2019-12-12 08:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `fc_cms`
--

CREATE TABLE `fc_cms` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `footer_order` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `footer_menu_status` int(11) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_cms`
--

INSERT INTO `fc_cms` (`id`, `title`, `content`, `footer_order`, `url`, `footer_menu_status`, `status`, `created`) VALUES
(1, 'Terms and conditons', '&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; Our advantages We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage&lt;/p&gt;\r\n&lt;blockquote&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;span style=&quot;color: #993300;&quot;&gt;&lt;strong&gt; We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage .&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;/blockquote&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! our advantage We deliver qulaity,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now! &amp;nbsp;&lt;/p&gt;', 'row1', 'terms-and-conditons', 0, 'Active', '2017-05-14 01:29:51'),
(2, 'About', '								our advantage\r\n								We deliver qulaity, relevant services that completly satisfy your need.\r\n								 \r\n								\r\n									\r\n										Save your  time\r\n										Quality  Service\r\n										Everything in  one place\r\n										24/7  Service\r\n										Easy & Secure  Payment\r\n									\r\n								\r\n								\r\n										Get Your Service Now!\r\n								\r\n						', 'row1', 'about', 1, 'Active', '2017-05-14 01:42:43'),
(3, 'Privacy Policy', '&lt;p&gt;our advantage We deliver qulaity, relevant services that completly satisfy your need. &amp;nbsp; Save your time Quality Service Everything in one place 24/7 Service Easy &amp;amp; Secure Payment Get Your Service Now!&lt;/p&gt;', 'row1', 'privacy-policy', 0, 'Active', '2017-05-14 01:43:54'),
(7, 'How it works', 'How it works', 'row1', 'how-it-works', 1, 'Active', '2017-05-14 02:41:27'),
(8, 'FAQ', 'FAQ', 'row1', 'faq', 1, 'Active', '2017-05-14 02:41:48'),
(14, 'Membership Application', '&lt;section&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-innerpage-base&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-lg-12 col-xs-12 banner-innerpage&quot;&gt;&lt;img src=&quot;http://localhost/glsn/images/site/member-application.png&quot; alt=&quot;GSLN&quot; /&gt;\r\n&lt;div class=&quot;container nopadd&quot;&gt;\r\n&lt;div class=&quot;banner-innercaption&quot;&gt;\r\n&lt;h2&gt;GLSN Membership Application&lt;/h2&gt;\r\n&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-base&quot;&gt;\r\n&lt;div class=&quot;container nopadd&quot;&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-inner&quot;&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-lft&quot;&gt;\r\n&lt;h3 class=&quot;site-head&quot;&gt;GLSN base Membership Fee is simple:&lt;/h3&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-price&quot;&gt;\r\n&lt;ul class=&quot;list-inline price-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD {$application_fee}&lt;/h5&gt;\r\n&lt;p&gt;per annum per company.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD {$branch}&lt;/h5&gt;\r\n&lt;p&gt;per annum for each additional branch office.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-rgt&quot;&gt;\r\n&lt;p&gt;The Membership Fee INCLUDES a Summit Fee for &lt;strong&gt;1 delegate &lt;/strong&gt;to attend one of the following &lt;strong&gt;2 Bi-Annual Summits.&lt;/strong&gt; The Summit Fee for attending a 2nd Summit and/or bringing &lt;strong&gt;additional delegates is USD {$additional_person}/person.&lt;/strong&gt; This fee is INCLUSIVE of charges relating to attending one of either the following &lt;strong&gt;March or October GLSN Summits &lt;/strong&gt;(Welcome Party, Summit Hall, Buffer Lunches, Social Evening and all related Summit expenses included - excludes Airfare and Hotel Rooms). The Summit Fee for attending a &lt;strong&gt;2nd Summit and/or additional delegates is USD {$additional_person}/person.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-features&quot;&gt;\r\n&lt;p&gt;Before starting this Membership Application, &lt;strong&gt; be aware that GLSN does NOT accept members:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ul class=&quot;list-unstyled&quot;&gt;\r\n&lt;li&gt;Without a Website&lt;/li&gt;\r\n&lt;li&gt;Under 3 years in existence&lt;/li&gt;\r\n&lt;li&gt;Using free email services (yahoo.com, gmail, etc)&lt;/li&gt;\r\n&lt;li&gt;Listed by any industry colection agency such as FreightDeadbeats or FDRS.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 app_input_base text-center margin-small&quot;&gt;&lt;a class=&quot;themebtn&quot; href=&quot;http://localhost/glsn/membership_register&quot;&gt;&lt;span class=&quot;arrow-icon&quot;&gt;&lt;img src=&quot;http://localhost/glsn/images/site/arrow-icon.png&quot; /&gt;&lt;/span&gt;Continue to Membership Application&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'membership-application', 1, 'Active', '2019-11-08 07:32:47'),
(15, 'Benefits', '&lt;section&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-base&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner&quot;&gt;\r\n&lt;h2 class=&quot;page-title&quot;&gt;Global Ship Agencies Network&lt;/h2&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner-content&quot;&gt;\r\n&lt;h3 class=&quot;sub-head&quot;&gt;Benefits:-&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 benefits-base&quot;&gt;\r\n&lt;p&gt;The advantages and benefits of joining the &quot;Global Ship Agencies Network&quot; are many and include:&lt;/p&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 benefits-inner&quot;&gt;\r\n&lt;ul class=&quot;theme-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Exposure to those maritime companies seeking to use your services&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Access to a network of your peers with whom you can collaborate, share ideas and resources&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Ability to display the GSAN &quot;Seal of Approval&quot; logo on your literature and publications&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Participation on regional and international multi-port RFQs coordinated by GSAN corporately&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Ability to promote other non-Ship Agency maritime and logistics services offered.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Having GSAN (or a subsidized Member) represent your interests at major exhibitions and conferences&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Potential of new business via our &lt;a href=&quot;http://localhost/gsan/port_estimate&quot;&gt;Port &amp;amp; Agency Estimate Request&lt;/a&gt;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Reasonable Annual Membership Fees with no up-front application charges&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Aggressive &lt;a href=&quot;http://localhost/gsan/page/referral-program&quot;&gt;Referral Program&lt;/a&gt; for recommending new members&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;The option to participate in Sales Offices in major maritime hubs&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Guaranteed no lifetime increase in membership fees&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;The option to participate in a GSAN member-wide referral program&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Use GSAN\'s escrow and international money remittance services (under development)&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Attending the Annual Conference (under development)&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;h6&gt;Proceed to Step 2 - &lt;a href=&quot;http://localhost/gsan/page/membership-fees&quot;&gt;Agree to the GSAN Annual Membership Fee structure&lt;/a&gt;&lt;/h6&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'benefits', 1, 'Active', '2019-11-08 07:39:43'),
(16, 'Membership Fees', '&lt;section&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-base&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner&quot;&gt;\r\n&lt;h2 class=&quot;page-title&quot;&gt;Global Ship Agencies Network&lt;/h2&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner-content&quot;&gt;\r\n&lt;h3 class=&quot;sub-head&quot;&gt;Membership Fees:-&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 fees-base&quot;&gt;\r\n&lt;p&gt;GSAN\'s Annual Membership Fees &lt;strong&gt; effective for 1 year&lt;/strong&gt; from the date of acceptance are as follows:&lt;/p&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 fees-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container text-center&quot;&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;1st Port Location&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;USD {$first_port}&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container text-center&quot;&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;Next 4 Port Locations&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;USD {$next4_port} each&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container text-center&quot;&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;Additional Port Locations over 5&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;USD {$additonal_port}&amp;nbsp; each&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container text-center&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 payment-details-container-common text-left&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center payment-details-container-lft&quot;&gt;\r\n&lt;p&gt;Pay USD {$advert_fee}&amp;nbsp; to add your LOGO on Homepage&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 fees-ul text-left&quot;&gt;\r\n&lt;ul class=&quot;theme-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;No Application Fee are applicable. Fees include Head Office and Sub-Port(s) listings at no additional cost.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Payment can be by US Dollar Check or Wire Transfer upon GSAN\'s acceptance of your Application which is subject to the checking of references.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 fees-bottom text-left&quot;&gt;\r\n&lt;p&gt;If the above conditions are accepted,&lt;/p&gt;\r\n&lt;h6&gt;Proceed to Step 3 - &lt;a href=&quot;http://localhost/gsan/start_application&quot;&gt;Complete the On-line Application covering your Head Office&lt;/a&gt;&lt;/h6&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'membership-fees', 1, 'Active', '2019-11-08 07:41:24'),
(17, 'Gsan Managements', '&lt;section&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-base&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner&quot;&gt;\r\n&lt;h2 class=&quot;page-title&quot;&gt;Global Ship Agencies Network&lt;/h2&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner-content&quot;&gt;\r\n&lt;h3 class=&quot;sub-head&quot;&gt;Management Team&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-base&quot;&gt;\r\n&lt;p&gt;&lt;strong class=&quot;strong-text&quot;&gt;&quot;Global Ship Agencies Network&quot; (GSAN) &lt;/strong&gt;is managed by shipping, transportation and logistics industry veterans who are completely neutral and who are guided by the best interests of the network members in accordance with GSAN\'s objectives, philosophy and methodology.&lt;/p&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-content-container&quot;&gt;\r\n&lt;h3 class=&quot;profile-name&quot;&gt;Executive Director (Primary Contact)&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 management-profile-img&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center management-content-container&quot;&gt;\r\n&lt;div class=&quot;image-container&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/ernst.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;name-container&quot;&gt;\r\n&lt;h4&gt;Ernst van der Heijden&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-lg-8 col-xs-12 management-profile-content&quot;&gt;\r\n&lt;p&gt;Ernst is, at heart, a logistician with strong operational knowledge of the forwarding &amp;amp; the shipping industry for many years in several countries. He is a problem-solver and has already put his experience and knowledge. He speaks 5 languages and is a people-person who greatly enjoys interacting with Members. He works in the best interests of ALL GSAN Members. Ernst is also the Executive Director of &lt;a href=&quot;#&quot;&gt; Global Logistics Network (GLN)&lt;/a&gt; and Ernst can be contacted at &lt;a href=&quot;#&quot;&gt;Ernst@go2GSAN.com&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-content-container&quot;&gt;\r\n&lt;h3 class=&quot;profile-name&quot;&gt;Executive Director&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 management-profile-img&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center management-content-container&quot;&gt;\r\n&lt;div class=&quot;image-container&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/han.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;name-container&quot;&gt;\r\n&lt;h4&gt;Han van Blanken&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-lg-8 col-xs-12 management-profile-content&quot;&gt;\r\n&lt;p&gt;Han van Blanken started his career in shipping at sea as an HBO Radio Officer. After seven years at sea he moved ashore to become a partner in RMCA, a reputable Dutch shipbroker, founded by two ex Nedlloyd executives, focussing on chartering and ship management. On Han\'s initiative, RMCA became a shipowner in 2004 owning and operating vessels together with investors. Apart from his activities in RMCA, Han became Managing Director of J. Bekkers Co bv in 2004, a Rotterdam based deep sea ship owner, a position he held for over 11 years. Han has used strategic insight, market intelligence and analysis to generate better results in ship investment and commercial management. Earlier this year Han has returned to RMCA to further pursue and take advantage of the opportunity in the dry bulk cycle, having outperformed the previous cycle. Han is member of the Bimco Documentary Committee since 2010 and is also is a guest teacher at the Nautical and Transport College of Rotterdam (STC). Recently as April 2018 Han was elected Chairman of the Dutch Shipbrokers Association www.dutchshipbrokers.nl&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-content-container&quot;&gt;\r\n&lt;h3 class=&quot;profile-name&quot;&gt;Executive Director (Primary Contact)&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 management-profile-img&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center management-content-container&quot;&gt;\r\n&lt;div class=&quot;image-container&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/evert.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;name-container&quot;&gt;\r\n&lt;h4&gt;Evert Hoogwerf&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-lg-8 col-xs-12 management-profile-content&quot;&gt;\r\n&lt;p&gt;Evert Hoogwerf is a multi-market Chartering and Operations professional. Evert started his career with container liner Evergreen. Then he became Operations and Chartering specialist in a successful shortsea shipowner company in Rotterdam. Following his ambitions, Evert then joined JBekkers co bv in Rotterdam, a worldwide tramping deepsea shipping company with large tankers and bulk carriers upto Cape size. In JBekkers, Evert very soon became Chartering Manager and was also made responsible for integrated Operations. Evert pro-actively follows the dry and liquid freight market developments, generates income strategies, negotiates the best possible contract terms and keeps control of the entire commercial and operational activity with an aim for a long term high quality relationship with his partners. Evert has the typical Rotterdam no nonsense mentality: &quot;Don\'t say it &amp;ndash; just DO IT!&quot;.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-content-container&quot;&gt;\r\n&lt;h3 class=&quot;profile-name&quot;&gt;Executive Director (Primary Contact)&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 management-profile-img&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center management-content-container&quot;&gt;\r\n&lt;div class=&quot;image-container&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/Andy.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;name-container&quot;&gt;\r\n&lt;h4&gt;Andy Titley&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-lg-8 col-xs-12 management-profile-content&quot;&gt;\r\n&lt;p&gt;Andy is a UK Accountant who has 30+ years experience in the logistics, freight forwarding and shipping industries, starting out his career as a Voyage Accountant with Cunard Steamship Line in Southampton and subsequently holding several financial positions with OC(E)L (Now P&amp;amp;O Nedlloyd). Since 1991, Andy has been Managing Director of the Albion Group of Companies, industry consultants. Andy is also the former Executive Director of &lt;a href=&quot;#&quot;&gt;Global Logistics Network (GLN) &lt;/a&gt; and can be contacted at &lt;a href=&quot;#&quot;&gt;Andy@go2gsan.com&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 management-content-container&quot;&gt;\r\n&lt;h3 class=&quot;profile-name&quot;&gt;Executive Director (Primary Contact)&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 management-profile-img&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center management-content-container&quot;&gt;\r\n&lt;div class=&quot;image-container&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/Trevor.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;name-container&quot;&gt;\r\n&lt;h4&gt;Trevor Titley&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-lg-8 col-xs-12 management-profile-content&quot;&gt;\r\n&lt;p&gt;Trevor, son of Andy Titley, is a graduate in communications from the University of Buffalo and was involved in assisting various networks before establishing &lt;a href=&quot;#&quot;&gt;Five Star Logistics Network (5-SLN)&lt;/a&gt; in September 2014. He is in charge of sales and development activities of GSAN including public relations. In his spare time, he enjoys MMA (Mixed Martial Arts) and has trained in Muay Thai in Thailand. Trevor can be contacted at &lt;a href=&quot;#&quot;&gt;Trevor@go2gsan.com.&lt;/a&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'gsan-managements', 1, 'Active', '2019-11-08 07:58:25'),
(18, 'Contact Gsan', '&lt;section&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-base&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner&quot;&gt;\r\n&lt;h2 class=&quot;page-title&quot;&gt;Global Ship Agencies Network&lt;/h2&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-base&quot;&gt;\r\n&lt;h3 class=&quot;sub-head&quot;&gt;Contact and Feedback&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-inner&quot;&gt;\r\n&lt;p&gt;As a network whose primary focus is ensuring the highest of quality standards, the &quot;Global Ship Agencies Network&quot; would like to hear from you concerning any feedback that you have concerning GSAN matters or any feedback concerning our Members - their performance, capabilities and recommendations.&lt;/p&gt;\r\n&lt;p&gt;All feedback - both positive and negative - is shared with the relevant Member and will ultimately lead to improved services.&lt;/p&gt;\r\n&lt;h5 class=&quot;grey-title&quot;&gt;It may take a minute for all information to upload, please be patient!&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-inner-fields&quot;&gt;{$contact_form}&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly&quot;&gt;\r\n&lt;h5 class=&quot;grey-title&quot;&gt;Contact us Directly&lt;/h5&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-base nopadd&quot;&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 contactus-directly-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-inner-base &quot;&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 contactus-image&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/dir1.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-xs-12 col-lg-8 contactus-content&quot;&gt;\r\n&lt;h6&gt;Primary Contact&lt;/h6&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-us-details-content&quot;&gt;\r\n&lt;h2&gt;Ernst van der Heijden&lt;/h2&gt;\r\n&lt;h3&gt;Executive Director&lt;/h3&gt;\r\n&lt;h4&gt;Mobile :+31 10 2614777&lt;/h4&gt;\r\n&lt;h4&gt;Office :+31 6 14478447&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 contactus-directly-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-inner-base &quot;&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 contactus-image&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/dir2.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-xs-12 col-lg-8 contactus-content&quot;&gt;\r\n&lt;h6&gt;Primary Contact&lt;/h6&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-us-details-content&quot;&gt;\r\n&lt;h2&gt;Han van Blanken&lt;/h2&gt;\r\n&lt;h3&gt;Executive Director&lt;/h3&gt;\r\n&lt;h4&gt;Mobile :+31 10 2614777&lt;/h4&gt;\r\n&lt;h4&gt;Office :+31 6 14478447&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 contactus-directly-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-inner-base &quot;&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 contactus-image&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/dir3.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-xs-12 col-lg-8 contactus-content&quot;&gt;\r\n&lt;h6&gt;Primary Contact&lt;/h6&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-us-details-content&quot;&gt;\r\n&lt;h2&gt;Evert Hoogwerf&lt;/h2&gt;\r\n&lt;h3&gt;Executive Director&lt;/h3&gt;\r\n&lt;h4&gt;Mobile :+31 6 1062 6984&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 contactus-directly-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-inner-base &quot;&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 contactus-image&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/dir4.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-xs-12 col-lg-8 contactus-content&quot;&gt;\r\n&lt;h6&gt;Primary Contact&lt;/h6&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-us-details-content&quot;&gt;\r\n&lt;h2&gt;Andrew Titley&lt;/h2&gt;\r\n&lt;h3&gt;Executive Director&lt;/h3&gt;\r\n&lt;h4&gt;Mobile :+001 516-356-7791&lt;/h4&gt;\r\n&lt;h5&gt;&lt;img src=&quot;http://localhost/gsan/images/site/skypeicon.png&quot; /&gt;albion.andy&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-6 col-sm-6 col-xs-12 col-lg-6 contactus-directly-inner&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contactus-directly-inner-base &quot;&gt;\r\n&lt;div class=&quot;col-md-4 col-sm-4 col-xs-12 col-lg-4 contactus-image&quot;&gt;&lt;img src=&quot;http://localhost/gsan/images/site/dir5.png&quot; alt=&quot;GSAN Director&quot; /&gt;&lt;/div&gt;\r\n&lt;div class=&quot;col-md-8 col-sm-8 col-xs-12 col-lg-8 contactus-content&quot;&gt;\r\n&lt;h6&gt;Primary Contact&lt;/h6&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 contact-us-details-content&quot;&gt;\r\n&lt;h2&gt;Trevor Titley&lt;/h2&gt;\r\n&lt;h3&gt;Network Development Executive&lt;/h3&gt;\r\n&lt;h4&gt;Mobile :+001 516-633-3841&lt;/h4&gt;\r\n&lt;h5&gt;&lt;img src=&quot;http://localhost/gsan/images/site/skypeicon.png&quot; /&gt;Trevor.Titley&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-lg-12 col-xs-12 contact-send-mail&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;Snail Mail :&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;2520 NW 97th Ave; Ste 110&lt;/p&gt;\r\n&lt;p&gt;Miami FL 33172, USA&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'contact-gsan', 1, 'Active', '2019-11-08 08:02:44'),
(19, 'Referral Program', '&lt;section&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-base&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner&quot;&gt;\r\n&lt;h2 class=&quot;page-title&quot;&gt;Global Ship Agencies Network&lt;/h2&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 application-inner-content&quot;&gt;\r\n&lt;h3 class=&quot;sub-head&quot;&gt;Referrals:-&lt;/h3&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 benefits-base&quot;&gt;\r\n&lt;div class=&quot;col-md-12 col-sm-12 col-xs-12 col-lg-12 benefits-inner&quot;&gt;\r\n&lt;ul class=&quot;theme-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;We believe that the best source of new GSAN members is from recommendations from existing members.&amp;nbsp; With this in mind, GSAN is offering a Referral Bonus of&amp;nbsp;USD 100 against your next membership renewal fees for each new member that you recommend who subsequently joins GSAN.&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Referrals can be either from you contacting the prospective member directly or, alternatively, by passing a contact name and details onto GSAN and having us contact them directly.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;', 'other', 'referral-program', 1, 'Active', '2019-11-13 13:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `fc_company`
--

CREATE TABLE `fc_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `trading_name` varchar(255) DEFAULT NULL,
  `slug` varchar(250) CHARACTER SET latin1 NOT NULL,
  `contact_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `locations` text CHARACTER SET latin1 NOT NULL,
  `status` enum('new','rejected','active','pending','terminated','draft','hold') CHARACTER SET latin1 NOT NULL DEFAULT 'draft',
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) CHARACTER SET latin1 NOT NULL,
  `city` varchar(250) CHARACTER SET latin1 NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(250) CHARACTER SET latin1 NOT NULL,
  `fax` varchar(250) CHARACTER SET latin1 NOT NULL,
  `corp_email` varchar(250) CHARACTER SET latin1 NOT NULL,
  `corp_website` varchar(250) CHARACTER SET latin1 NOT NULL,
  `linkedin_link` varchar(250) CHARACTER SET latin1 NOT NULL,
  `facebook_link` varchar(250) CHARACTER SET latin1 NOT NULL,
  `year_started` varchar(50) CHARACTER SET latin1 NOT NULL,
  `no_of_employees` varchar(100) CHARACTER SET latin1 NOT NULL,
  `licenses` varchar(150) CHARACTER SET latin1 NOT NULL,
  `software` varchar(150) CHARACTER SET latin1 NOT NULL,
  `tax_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `annual_revenue` varchar(250) CHARACTER SET latin1 NOT NULL,
  `hear_about` varchar(250) CHARACTER SET latin1 NOT NULL,
  `others` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `march` int(11) NOT NULL,
  `october` int(11) NOT NULL,
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
  `branch_fee` decimal(20,2) NOT NULL,
  `debts_fee` decimal(20,2) NOT NULL,
  `reference_info` longtext NOT NULL,
  `reg_date` date NOT NULL DEFAULT '0000-00-00',
  `approved_date` date NOT NULL DEFAULT '0000-00-00',
  `actived_date` date NOT NULL DEFAULT '0000-00-00',
  `terminated_date` date NOT NULL DEFAULT '0000-00-00',
  `is_advertising` tinyint(1) NOT NULL,
  `membership_status` varchar(250) NOT NULL DEFAULT 'Regular',
  `logo` varchar(250) NOT NULL DEFAULT '',
  `reg_step` int(11) NOT NULL,
  `last_login_date` date DEFAULT '0000-00-00',
  `last_login_ip` varchar(25) CHARACTER SET latin1 NOT NULL,
  `password_link` varchar(100) CHARACTER SET latin1 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_company`
--

INSERT INTO `fc_company` (`id`, `name`, `trading_name`, `slug`, `contact_name`, `email`, `password`, `temp_password`, `country_id`, `locations`, `status`, `address1`, `address2`, `city`, `state`, `zip`, `mobile`, `fax`, `corp_email`, `corp_website`, `linkedin_link`, `facebook_link`, `year_started`, `no_of_employees`, `licenses`, `software`, `tax_id`, `annual_revenue`, `hear_about`, `others`, `description`, `march`, `october`, `featured_member`, `top_listed_member`, `debts`, `olp`, `riege_software`, `cargowise_software`, `networkpay`, `buytasker`, `multi_currency`, `gsan`, `application_fee`, `featured_member_fee`, `top_listed_member_fee`, `branch_fee`, `debts_fee`, `reference_info`, `reg_date`, `approved_date`, `actived_date`, `terminated_date`, `is_advertising`, `membership_status`, `logo`, `reg_step`, `last_login_date`, `last_login_ip`, `password_link`, `created_at`, `updated_at`) VALUES
(1, 'siva', NULL, '', '', 'siva.gmtechindia@gmail.com', '', '', 87, '', 'terminated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', '0.00', 'The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"  1914 translation by H. Rackham "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"  Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."  1914 translation by H. Rackham "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"  1914 translation by H. Rackham "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"  Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."  1914 translation by H. Rackham "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"  1914 translation by H. Rackham "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"  Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."  1914 translation by H. Rackham "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"  1914 translation by H. Rackham "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"  Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."  1914 translation by H. Rackham "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."siva', '2019-11-29', '2019-11-29', '2019-11-21', '2019-12-13', 1, 'Regular', '', 1, '2019-11-28', '', '', '2019-11-29 13:31:41', '2019-11-29 13:31:41'),
(3, 'Pictuscode Pvt Ltd', 'Pictuscode Pvt Ltd', 'pictuscode-pvt-ltd', 'Siva', 'siva.pictuscode@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 87, '708,709,710,711', 'active', 'No: 2/2 Tank Street1', 'VC Mottur1', 'Walajapet1', 'Tamilnadu1', '6325131', '+91 97893550481', '+91 97893550481', 'siva@pictuscode1.com', 'www.pictuscode1.com', 'siva331', 'siva331', '1991', '251', 'I35251', 'SAP1', 'I25351', '250001', '1', 'working due', 'Egestas integer eget aliquet nibh praesent tristique. Vulputate mi sit amet mauris. Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra. pakka dude sivaa', 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, '1250.00', '250.00', '0.00', '250.00', '300.00', '{"ref1":{"company_name":"siva1","company_title":"siva1","email":"siva.pictuscode1@gmail.com"},"ref2":{"company_name":"siva2","company_title":"siva2","email":"siva.pictuscode2@gmail.com"},"ref3":{"company_name":"siva3","company_title":"siva3","email":"siva.pictuscode3@gmail.com"},"ref4":{"company_name":"siva4","company_title":"siva4","email":"siva.pictuscode4@gmail.com"},"ref5":{"company_name":"siva5","company_title":"siva5","email":"siva.pictuscode5@gmail.com"}}', '0000-00-00', '0000-00-00', '2019-12-31', '0000-00-00', 0, 'Prime', 'd9fe803c980555d842f8a104ca0c9ea3.png', 4, '2019-12-13', '::1', '1576078276192', '2019-12-03 18:30:00', '2019-12-12 18:30:00'),
(4, 'Sivaaa', 'sivaaa', 'sivaaa', 'siva', 'siva.pictuscode1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 87, '696,697', 'active', 'vellore', 'vellore', 'vellore', '', '', '+91 6946565655656', '+91 566565656556', 'siva@pictuscode.com', 'picky.com', 'test', 'test', '1992', '25', '25445', '', '', '250000000', '', '', 'The dollar lost ground to the yen and pound, while consolidating gains seen on Friday against the euro and Canadian dollar, among other currencies. The narrow trade-weighted USD index (DXY) was little changed heading into the New York interbank open after rallying nearly 0.5% on Friday. The yen picked up a safe haven bid as European stock markets corrected after rallying on Friday in the wake of the U.S. jobs', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, '1250.00', '250.00', '0.00', '250.00', '0.00', '{"ref1":{"company_name":"sivaa","company_title":"sivaa","email":"siva.pictuscode1@gmail.com"},"ref2":{"company_name":"siva.pictuscode1@gmail.com","company_title":"siva.pictuscode1@gmail.com","email":"siva.pictuscode1@gmail.com"},"ref3":{"company_name":"siva.pictuscode1@gmail.com","company_title":"siva.pictuscode1@gmail.com","email":"siva.pictuscode1@gmail.com"},"ref4":{"company_name":"siva.pictuscode1@gmail.com","company_title":"siva.pictuscode1@gmail.com","email":"siva.pictuscode1@gmail.com"},"ref5":{"company_name":"siva.pictuscode1@gmail.com","company_title":"siva.pictuscode1@gmail.com","email":"siva.pictuscode1@gmail.com"}}', '0000-00-00', '0000-00-00', '2019-12-13', '0000-00-00', 0, 'Regular', '7636e25ea1dbdf8c54c52e09be1fcf33.png', 4, '2019-12-10', '::1', '', '2019-12-09 18:30:00', '2019-12-09 18:30:00'),
(5, 'Siva33', 'sivaa33', 'siva33', 'sivaa', 'sivakumar.cse12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 87, '708,709,710', 'active', 'Vellore', 'vellore', 'chennai', 'Tamilnadu', '632513', '+91 8248914613', '+91 989889898989', 'siva@pictuscode.com', 'pictuscode.com', 'siva33', 'siva33', '1992', '25', '25', '25', '25', '250000', '5', '', 'Egestas integer eget aliquet nibh praesent tristique. Vulputate mi sit amet mauris. Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra. Porta nibh venenatis cras sed felis eget. Aliquam ultrices sagittis orci a. Dignissim diam quis enim lobortis. Aliquet porttitor lacus luctus accumsan. Dignissim convallis aenean et ', 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, '1250.00', '250.00', '0.00', '250.00', '300.00', '{"ref1":{"company_name":"Siva","company_title":"siva","email":"siva.pictuscode1@gmail.com"},"ref2":{"company_name":"Siva","company_title":"Siva","email":"siva.pictuscode@gmail.com"},"ref3":{"company_name":"Siva","company_title":"Siva","email":"siva.pictuscode@gmail.com"},"ref4":{"company_name":"Siva","company_title":"Siva","email":"siva.pictuscode@gmail.com"},"ref5":{"company_name":"Siva","company_title":"Siva","email":"siva.pictuscode@gmail.com"}}', '0000-00-00', '2019-12-13', '2019-12-13', '0000-00-00', 0, 'Regular', '067ae64eef2278da7444fb03ad87460a.jpg', 4, '2019-12-13', '::1', '', '2019-12-12 18:30:00', '2019-12-12 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_contactus`
--

CREATE TABLE `fc_contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `body` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_contactus`
--

INSERT INTO `fc_contactus` (`id`, `name`, `email`, `subject`, `phone`, `body`, `date`) VALUES
(22, 'Sivaaa', 'siva.pictucode@gmail.com', 'Test-subject', '', 'Message', '2019-12-12 19:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `fc_contact_enquiry`
--

CREATE TABLE `fc_contact_enquiry` (
  `id` int(11) NOT NULL,
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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_contact_enquiry`
--

INSERT INTO `fc_contact_enquiry` (`id`, `name`, `job_title`, `company_name`, `city`, `country`, `email`, `phone`, `fax`, `subject`, `messages`, `member_email`, `member_name`, `created`) VALUES
(1, 'siva', 'siv', 'siv', 'siv', 'India', 'siva@gmail.com', '9789355048', '89779797', 'sdfsdf', 'sdfsdf', 'mmarques.shipping@agents.com.br', 'Marcelo Marques', '2019-11-06 15:25:29'),
(2, 'siva', 'siv', 'siv', 'siv', 'India', 'siva@gmail.com', '9789355048', '89779797', 'sdfsdf', 'sdfsdf', 'mmarques.shipping@agents.com.br', 'Marcelo Marques', '2019-11-06 15:26:12'),
(3, 'shivtestst', 'sivs', 'sivs', 'siv', 'India', 'siv@g.com', '97899255', '565665', '565656', '565665', 'gfinck@emcar.mu', 'Finck Gaetan', '2019-11-06 15:37:07'),
(4, 'siva', 'php develoer', 'gmtechindia', 'vellore', 'India', 'siva.pictuscode@gmail.com', '9789355048', 'test', 'test', 'test', 's@s.com', 'sf', '2019-11-13 19:35:40'),
(5, 'Siva', 'PHP Developer', 'Pictuscode', 'Chennai', 'India', 'siva.pictuscode@gmail.com', '9789355048', '9789355048', 'ANNOUNCEMENTS', 'ANNOUNCEMENTS:\r\nWe will send out an internal broadcast to all of our GSAN Members within the immediate future so please be prepared for many warm welcome messages!  In addition, we use our periodic eNewsletter to advise GSAN Members of new events such as your joining our network.\r\n\r\nAgain, we would like to welcome you on-board the GSAN. We believe you have joined the best network around but we are only as good as our Members. You only get out of the GSAN network what YOU are prepared to put into it!', 'siva.gmtechindia@gmail.com', 'siv', '2019-11-13 19:39:09'),
(6, 'Siva', '', '', '', '', 'Sivacas@gmail.com', '97878787878', '', 'test subject', 'test messae', 'siva.pictuscode@gmail.com', '', '2019-12-11 18:50:35'),
(7, 'sivaa', '', '', '', '', 'siva@g.com', '546565656', '', 'test subject', 'test message', 'siva.pictuscode@gmail.com', '', '2019-12-11 18:51:26'),
(8, 'sss', '', '', '', '', 'ss@ss.com', '978935454545', '', 'testtttt', 'testtttt', 'siva.pictuscode@gmail.com', '', '2019-12-11 18:56:16'),
(9, 'sivaa', '', '', '', '', 'siva@gmail.com', '56456', '', 'subj', 'mess', 'siva.pictuscode@gmail.com', 'Siva', '2019-12-11 18:58:11'),
(10, 'sivaa', '', '', '', '', 'isvaa@g.com', '4556464', '', 'sub', 'mess', 'siva.pictuscode@gmail.com', 'Sivakumar ', '2019-12-11 18:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `fc_country`
--

CREATE TABLE `fc_country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `calling_code` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(196, 'USA_Alabama', 'usa-alabama', '1'),
(197, 'USA_Alaska', 'usa-alaska', '1'),
(198, 'USA_Arizona', 'usa-arizona', '1'),
(199, 'USA_Arkansas', 'usa-arkansas', '1'),
(200, 'USA_California', 'usa-california', '1'),
(201, 'USA_Colorado', 'usa-colorado', '1'),
(202, 'USA_Connecticut', 'usa-connecticut', '1'),
(203, 'USA_Delaware', 'usa-delaware', '1'),
(204, 'USA_Florida', 'usa-florida', '1'),
(205, 'USA_Georgia', 'usa-georgia', '1'),
(206, 'USA_Hawaii', 'usa-hawaii', '1'),
(207, 'USA_Idaho', 'usa-idaho', '1'),
(208, 'USA_Illinois', 'usa-illinois', '1'),
(209, 'USA_Indiana', 'usa-indiana', '1'),
(210, 'USA_Iowa', 'usa-iowa', '1'),
(211, 'USA_Kansas', 'usa-kansas', '1'),
(212, 'USA_Kentucky', 'usa-kentucky', '1'),
(213, 'USA_Louisiana', 'usa-louisiana', '1'),
(214, 'USA_Maine', 'usa-maine', '1'),
(215, 'USA_Maryland', 'usa-maryland', '1'),
(216, 'USA_Massachusetts', 'usa-massachusetts', '1'),
(217, 'USA_Michigan', 'usa-michigan', '1'),
(218, 'USA_Minnesota', 'usa-minnesota', '1'),
(219, 'USA_Mississippi', 'usa-mississippi', '1'),
(220, 'USA_Missouri', 'usa-missouri', '1'),
(221, 'USA_Montana', 'usa-montana', '1'),
(222, 'USA_Nebraska', 'usa-nebraska', '1'),
(223, 'USA_Nevada', 'usa-nevada', '1'),
(224, 'USA_New Hampshire', 'usa-new-hampshire', '1'),
(225, 'USA_New Jersey', 'usa-new-jersey', '1'),
(226, 'USA_New Mexico', 'usa-new-mexico', '1'),
(227, 'USA_New York', 'usa-new-york', '1'),
(228, 'USA_North Carolina', 'usa-north-carolina', '1'),
(229, 'USA_North Dakota', 'usa-north-dakota', '1'),
(230, 'USA_Ohio', 'usa-ohio', '1'),
(231, 'USA_Oklahoma', 'usa-oklahoma', '1'),
(232, 'USA_Oregon', 'usa-oregon', '1'),
(233, 'USA_Pennsylvania', 'usa-pennsylvania', '1'),
(234, 'USA_Rhode Island', 'usa-rhode-island', '1'),
(235, 'USA_South Carolina', 'usa-south-carolina', '1'),
(236, 'USA_South Dakota', 'usa-south-dakota', '1'),
(237, 'USA_Tennessee', 'usa-tennessee', '1'),
(238, 'USA_Texas', 'usa-texas', '1'),
(239, 'USA_Utah', 'usa-utah', '1'),
(240, 'USA_Vermont', 'usa-vermont', '1'),
(241, 'USA_Virginia', 'usa-virginia', '1'),
(242, 'USA_Wash, D.C.', 'usa-wash-dc', '1'),
(243, 'USA_Washington', 'usa-washington', '1'),
(244, 'USA_West Virginia', 'usa-west-virginia', '1'),
(245, 'USA_Wisconsin', 'usa-wisconsin', '1'),
(246, 'USA_Wyoming', 'usa-wyoming', '1'),
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
(282, 'Wallis and Futuna', '', '681');

-- --------------------------------------------------------

--
-- Table structure for table `fc_email`
--

CREATE TABLE `fc_email` (
  `id` int(200) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `email_desc` longtext NOT NULL,
  `dateAdded` datetime NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `bcc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_email`
--

INSERT INTO `fc_email` (`id`, `title`, `email_desc`, `dateAdded`, `subject`, `bcc`) VALUES
(3, 'Registration User', '<p style="text-align: justify;"><strong>Thank you for your GLSN Membership Application that has been well received. </strong><br /><br /><strong>GLSN&nbsp; </strong>will review your Application and revert back to you with any questions.&nbsp; <strong>GLSN </strong>follows strict procedures in reviewing all applications in accordance with our documented internal procedures.&nbsp; The normal application review process takes anywhere from 24 hours to 5 work-days depending on the response from your references and whether you were referred by an existing <strong>GLSN </strong>Member.</p>\r\n<p style="text-align: justify;">After your Membership Application has been accepted and the Membership Invoice generated has been paid, <strong>GLSN </strong>will grant you full access!</p>\r\n<p>Again, thank you for your application and we look forward to having you in the <strong>GLSN </strong>Family!<br /><br />Sincerely,<br />Andy Titley<br /><strong>Global Logistics Summit Network (GLSN )</strong><br />Admin@glsn.com - www.glsn.com<br />m)&nbsp; +1-516-356-7791&nbsp; s)&nbsp; Albion.Andy</p>\r\n<p>&nbsp;<img style="margin-bottom: 0px; margin-top: 0px;" src="{$logo}" alt="GLSN" width="175" height="54" /></p>\r\n<noscript>activate javascript</noscript>', '0000-00-00 00:00:00', 'GLSN Membership', ''),
(8, 'News request to admin', '<p><span style="font-size: 10pt;">&nbsp; </span><span style="font-size: 10pt;">The details are as follows:<br /></span></p>\r\n<table style="height: 95px; width: 86.083%; border-collapse: collapse;" border="1">\r\n<tbody>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">From:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">{$author}</td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">News Title:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">{$title}</td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">Company:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">{$company_name}</td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">Post Date:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">{$post_date}&nbsp; &nbsp;&nbsp;</td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">Post Type:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">{$post_type}</td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">Author Email:</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;"><a href="mailto:&nbsp;{$author_email}">&nbsp;{$author_email}</a></td>\r\n</tr>\r\n<tr style="border-style: none;">\r\n<td style="width: 27.9461%; height: 15px; border-style: none; background-color: #f5eded;">&nbsp;</td>\r\n<td style="width: 71.9617%; height: 15px; border-style: none; background-color: #f5eded;">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '0000-00-00 00:00:00', 'News request from {$company_name} company', ''),
(9, 'Referral page Admin Resonse', '<p>Dear {$prospect_name}:<br /><br />We are proud to advise you that {$member_company} is one of the quality members of <strong>Global Ship Agencies Network (GSAN)</strong> - www.go2GSAN.com.<br /><br />{$member_name} has suggested that we contact you direct as there would be mutual benefit for {$company_prospect } to also join our growing network exclusively dedicated to Ship Agencies.<br /><br />The advantages and benefits of joining "Global Ship Agencies Network" are many and include:</p>\r\n<ul style="list-style-type: square;">\r\n<li>Exposure to those maritime companies seeking to use your services</li>\r\n<li>Access to a network of your peers with whom you can collaborate, share ideas and resources</li>\r\n<li>Ability to display the GSAN "Seal of Approval" logo on your literature and publications</li>\r\n<li>Participation on regional and international multi-port RFQs coordinated by GSAN corporately</li>\r\n<li>Ability to promote other non-Ship Agency maritime and logistics services offered</li>\r\n<li>Having GSAN (or a subsidized Member) represent your interests at major exhibitions and conferences</li>\r\n<li>Potential of new business via our Port &amp; Agency Estimate Request</li>\r\n<li>Reasonable Annual Membership Fees with no up-front application charges</li>\r\n<li>Aggressive Referral Program for recommending new members</li>\r\n<li>The option to participate in Sales Offices in major maritime hubs</li>\r\n<li>Guaranteed no lifetime increase in membership fees</li>\r\n<li>The option to participate in a GSAN member-wide referral program</li>\r\n<li>Use GSAN\'s escrow and international money remittance services (under development)</li>\r\n<li>Attending the Annual Conference (under development)</li>\r\n</ul>\r\n<p>For additional information, please visit our website - www.go2GSAN.com&nbsp; - and our fully automated on-line membership application can be found at http://www.go2gsan.net/demo/registration.<br /><br />We thank {$member_name} of {$member_company} for the kind introduction to your company.<br /><br />We are available to answer any questions that you may have having visited our website.<br /><br />Sincerely<br />Andrew Titley<br />Founder &amp; CEO<br />Global Ship Agencies Network</p>', '0000-00-00 00:00:00', 'Recommendation to join GLSN by member_company', ''),
(10, 'Referral Request to admin', '<p>New Referral Request from member :&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style="width: 399px;">Prospect Company Name</td>\r\n<td style="width: 70px;">:</td>\r\n<td style="width: 445px;">{$company_prospect}</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 399px;">Prospect Contact Name</td>\r\n<td style="width: 70px;">:</td>\r\n<td style="width: 445px;">{$prospect_name}</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 399px;">Prospect Email</td>\r\n<td style="width: 70px;">:</td>\r\n<td style="width: 445px;">{$prospect_email}</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 399px;">Member Name</td>\r\n<td style="width: 70px;">:</td>\r\n<td style="width: 445px;">{$member_name}</td>\r\n</tr>\r\n<tr>\r\n<td style="width: 399px;">Member Company Name</td>\r\n<td style="width: 70px;">:</td>\r\n<td style="width: 445px;">{$member_company}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>GLSN System</p>', '0000-00-00 00:00:00', 'Referral Request from GLSN', ''),
(11, 'Member Contact', '<p style="text-align: justify;">Dear {$member_name},<br /><br />The following message has been sent to you via the GLSN Member Contact Form. The details are as follows:<br /><br />From:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {$name} &lt;{$email}&gt;<br />Email: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;{$email}<br />Subject:&nbsp; &nbsp; &nbsp; {$subject_msg}<br />Phone:&nbsp; &nbsp; &nbsp; &nbsp; {$phone}<br />Message:&nbsp; &nbsp;{$messages}<br /><br />------------<br />This is an automated email generated from the Contact Form in the Global Logistics Summit Network (GLSN ) website - www.go2GLSN .com.&nbsp;</p>\r\n<p style="text-align: justify;">Please reply directly to the sender using the email address above.</p>', '0000-00-00 00:00:00', 'GLSN Message via the GLSN website', ''),
(4, 'Registration Admin', '<p><span id="__mce" style="font-size: medium;">New application submitted:</span></p>\r\n<p>&nbsp;</p>\r\n<table border="0">\r\n<tbody>\r\n<tr>\r\n<td><span style="font-size: medium;">Company Name</span></td>\r\n<td><span style="font-size: medium;">{$company_name}</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style="font-size: medium;">Contact Name</span></td>\r\n<td><span style="font-size: medium;">{$contact_name}</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style="font-size: medium;">Contact Email</span></td>\r\n<td><span style="font-size: medium;">{$contact_email}</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style="font-size: medium;">City/Country</span></td>\r\n<td><span style="font-size: medium;">{$city_country}</span></td>\r\n</tr>\r\n<tr>\r\n<td><span style="font-size: medium;">Member Page</span></td>\r\n<td><span style="font-size: medium;">{$url}</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '0000-00-00 00:00:00', 'GLSN Membership Request', ''),
(12, 'Reference Request Response', '<div style="text-align: justify;"><br />Reference Response from {$reference_email} for {$company_name}<br /><br /><em>This is not a solicitation; it is a legitimate request for information from a mutually known party. <br /><br /></em></div>\r\n<div style="text-align: justify;">We are the "Global Ship Agencies Network" (GSAN).&nbsp; Our website can be found at: <a href="http://www.go2GSAN.com">www.go2GSAN.com</a>.&nbsp; <br /><br /></div>\r\n<div style="text-align: justify;">&nbsp;</div>\r\n<form action="{$url}" method="post">\r\n<table border="1" width="100%" cellspacing="2" cellpadding="2">\r\n<tbody>\r\n<tr>\r\n<td valign="top">Question #1</td>\r\n<td valign="top">How many years have you done business with this company:</td>\r\n<td valign="top">&nbsp; {$q1} Years</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #2</td>\r\n<td valign="top">Are they timely with their communications?</td>\r\n<td valign="top">{$q2}</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #3</td>\r\n<td valign="top">Do they perform with honesty, integrity and impartiality?</td>\r\n<td valign="top">{$q3}</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #4</td>\r\n<td valign="top">Are they competent and perform services in a conscientious, diligent and efficient manner?</td>\r\n<td valign="top">{$q4}</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #5</td>\r\n<td valign="top">Do you have any reservations in recommending this company as a GSAN Member?</td>\r\n<td valign="top">{$q5}</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Notes:</td>\r\n<td valign="top">{$notes}</td>\r\n<td valign="top">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form><br />GSAN thanks you in advance for your kind response and be assured that if we can assist you in any way, please contact us. <br /><br />Sincerely,<br />The GSAN Management Team<br />e)&nbsp; <a href="mailto:Admin@go2GSAN.com">Admin@go2GSAN.com</a> w) <a href="http://www.go2GSAN.com">www.go2GSAN.com</a><br /><img src="{$logo}" alt="" width="250" height="66" />', '2019-11-13 00:00:00', 'Reference Request Response  from {$reference_email} for {$company_name}', ''),
(13, 'Invoice Template', '<div style="padding: 30px 20px;" align="center">\r\n<table style="padding: 25px 20px;" width="1170px">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 1170px;">\r\n<table style="padding: 0px 20px; width: 1170px;">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<table style="width: 770px;">\r\n<tbody>\r\n<tr style="width: 770px;">\r\n<td style="width: 770px;"><img src="{$logo}" alt="GLSN Logo" width="250" height="66" /></td>\r\n</tr>\r\n<tr>\r\n<td style="width: 770px;">\r\n<h2 style="width: 770px; font-family: \'Montserrat\'; font-size: 30px; margin: 0; color: #2a2f75; font-weight: bold;">Lighthouse Network Management, Inc.</h2>\r\n<p style="width: 770px; font-family: Lato; font-size: 22px; margin: 0;">3300 West Rolling Hills Circle, Suite 607<br />Davie, FL, 33328, United States of America.<br />For questions :&nbsp;&nbsp; <a href="mailto:admin@go2glsn.com">admin@go2glsn.com</a></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td style="width: 400px; text-align: right;">\r\n<h2 style="font-family: \'Montserrat\'; font-size: 70px; font-weight: bold; margin: 0; color: #2a2f75;">INVOICE</h2>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="margin-top: 50px; padding: 0 20px; width: 1170px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 585px;">\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">Invoice To:<br /><br /></p>\r\n<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;"><span style="font-size: 24pt;">{$company}</span></p>\r\n<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;">{$address}</p>\r\n<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;">{$city}, {$state}</p>\r\n<p style="font-family: Lato; font-size: 25px; margin: 0; font-weight: bold;">{$country}</p>\r\n</td>\r\n<td style="width: 585px; text-align: right; vertical-align: top;" align="right">\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">Invoice #: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <strong>{$invoice_no}</strong><br /><br />&nbsp; Date: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{$invoice_date} </strong></p>\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;"><strong>&nbsp;</strong></p>\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">Terms:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{$terms}</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="margin-top: 50px; padding: 0 20px;">\r\n<tbody>\r\n<tr>\r\n<td style="width: 585px; vertical-align: top;">\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:{$email}"> {$email}</a></p>\r\n</td>\r\n<td style="width: 585px; text-align: right; vertical-align: top;">\r\n<p style="font-family: Lato; font-size: 28px; font-weight: bold; color: #2a2f75; margin: 0;">Total Due:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USD {$amount}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 1170px; text-align: center;">\r\n<p style="width: 1170px; font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;"><strong><span style="font-size: 24pt;">"GLOBAL LOGISTICS SUMMIT NETWORK" (GLSN) - MEMBERSHIP INVOICE</span></strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="margin-top: 50px; border-spacing: 0; border-bottom: 3px solid #2A2F75; width: 100%;">\r\n<tbody>\r\n<tr style="background: #2A2F75; padding: 20px 0;">\r\n<td style="font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 900px; padding: 20px 20px; text-align: center;"><strong><span style="font-size: 18pt;">Item Description:</span></strong></td>\r\n<td style="font-family: Lato; font-size: 22px; color: #ffffff; margin: 0; width: 300px; padding: 20px 20px; text-align: center;"><strong><span style="font-size: 18pt;">Total Due in USD:<br /></span></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n{$body_items}\r\n<table style="padding: 50px 20px 50px 20px; background: #F3F6F6;">\r\n<tbody>\r\n<tr>\r\n<td style="width: 685px;">\r\n<p style="font-family: Lato; font-size: 22px; font-weight: bold; margin: 0;">Wire Transfer Instructions:</p>\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">Bank: Wells Fargo Bank, N.A.<br />420 Montgomery St, San Francisco, CA 94104<br />A/C: Lighthouse Network Management, Inc.<br />Account #: 1384802359<br />ABA: 063107513 - SWIFT/BIC: WFBIUS6S</p>\r\n<p style="font-family: Lato; font-size: 22px; margin: 0;">&nbsp;</p>\r\n</td>\r\n<td style="width: 485px;" align="right">\r\n<table style="width: 410px; border-spacing: 0;">\r\n<tbody>\r\n<tr>\r\n<td style="padding: 10px 10px;">\r\n<p style="font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0;">&nbsp;</p>\r\n</td>\r\n<td style="padding: 10px 10px; text-align: right;">\r\n<p style="font-family: Lato; font-size: 24px; color: #8b8c8c; margin: 0; text-align: right;">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n<tbody>\r\n<tr style="background: #2A2F75;">\r\n<td style="padding: 15px 10px;">\r\n<p style="font-family: Lato; font-size: 24px; color: #ffffff; margin: 0;">USD Total:</p>\r\n</td>\r\n<td style="padding: 15px 10px; text-align: right;">\r\n<p style="font-family: Lato; font-size: 24px; color: #ffffff; margin: 0;">{$amount}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 1170px; text-align: center;">\r\n<p style="font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;">PLEASE EXPEDITE PAYMENT OF THIS INVOICE TO MAINTAIN UNINTERUPTED MEMBERSHIP</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 585px; text-align: left;">\r\n<table align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="{$globe_icon}" /></td>\r\n<td style="text-align: left;">\r\n<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;"><a href="mailto:admin@go2gsan.com">admin@go2gsan.com</a></p>\r\n<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;"><a href="http://www.go2gsan.com">www.go2gsan.com</a></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<td style="width: 585px; text-align: center;">\r\n<table align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="{$location_icon}" /></td>\r\n<td style="text-align: left;">\r\n<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;">3300 West Rolling Hills Circle, Suite 607<br />David, FL 33328, United States of America</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n<!--<td style="width: 390px; text-align: center;">\r\n<table align="center">\r\n<tbody>\r\n<tr>\r\n<td><img src="{$phone_icon}" /></td>\r\n<td style="text-align: left;">\r\n<p style="font-family: Lato; font-size: 22px; color: #4d4d4e; margin: 0 0px 0 10px;">Please join our OLP Whatsapp group at 516-356-7791</p>\r\n</td></tr>\r\n</tbody>\r\n</table>\r\n</td>--></tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 1170px; text-align: center;">\r\n<p style="font-family: Lato; font-size: 20px; color: #6b6363; margin: 0;">{$notes}</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style="width: 1170px; margin-top: 35px; padding: 0 20px;">\r\n<tbody>\r\n<tr style="width: 1170px;">\r\n<td style="width: 1170px; text-align: center;">\r\n<p style="font-family: Lato; font-size: 24px; color: #4d4d4e; margin: 0; font-weight: bold;">Lighthouse Network Management, Inc. is the proud owner of "Global Logistics Summit Network" (GLSN). <strong><a href="https://www.go2glsn.com/">www.go2glsn.com.</a></strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '0000-00-00 00:00:00', 'Invoice Template', ''),
(5, 'GLSN Reference Request', '<div style="text-align: justify;">Attn:&nbsp;&nbsp; {$ReferenceName}, {$ReferenceJobTitle} of {$ReferenceCompany}<br /><br /></div>\r\n<div style="text-align: justify;"><em>This is not a solicitation; it is a legitimate request for information from a mutually known party. <br /><br /></em></div>\r\n<div style="text-align: justify;">We are the "Global Ship Agencies Network" (GSAN).&nbsp; Our website can be found at: <a href="http://www.go2GSAN.com">www.go2GSAN.com</a>.&nbsp; <br /><br /></div>\r\n<div style="text-align: justify;">{$applicant_trade_name} in {$applicant_country} has applied for GSAN membership and {$applicant_primaryContactName} has provided your name as a trade reference. <br /><br /></div>\r\n<div style="text-align: justify;">Could we respectfully request that you give us your honest opinion of this company so that we can process their application?&nbsp;&nbsp; Your response will be kept in the strictest of confidence and not revealed back to {$applicant_trade_name} or any other third parties.</div>\r\n<br /><form action="{$url}" method="post">\r\n<table border="1" width="100%" cellspacing="2" cellpadding="2">\r\n<tbody>\r\n<tr>\r\n<td valign="top">Question #1</td>\r\n<td valign="top">How many years have you done business with this company:</td>\r\n<td valign="top">&nbsp;<input name="q1" required="required" type="text" /> Years</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #2</td>\r\n<td valign="top">Are they timely with their communications?</td>\r\n<td valign="top"><label><input name="q2" required="required" type="radio" value="Yes" />&nbsp; Yes&nbsp; /&nbsp; </label><label><input name="q2" type="radio" value="No" /> No</label> /&nbsp;<label> <input name="q2" type="radio" value="Unknown" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #3</td>\r\n<td valign="top">Do they perform with honesty, integrity and impartiality?</td>\r\n<td valign="top"><label><input name="q3" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q3" type="radio" value="No" /> No&nbsp; /&nbsp;</label> <label><input name="q3" type="radio" value="Unknown" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #4</td>\r\n<td valign="top">Are they competent and perform services in a conscientious, diligent and efficient manner?</td>\r\n<td valign="top"><label><input name="q4" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q4" type="radio" value="No" /> No&nbsp; /&nbsp;</label><label> <input name="q4" type="radio" value="Unknown" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Question #5</td>\r\n<td valign="top">Do you have any reservations in recommending this company as a GSAN Member?</td>\r\n<td valign="top"><label><input name="q5" required="required" type="radio" value="Yes" /> Yes&nbsp; /&nbsp;</label> <label><input name="q5" type="radio" value="No" />&nbsp; No&nbsp; /&nbsp;</label> <label><input name="q5" type="radio" value="Unknown" /> Unknown</label></td>\r\n</tr>\r\n<tr>\r\n<td valign="top">Notes:</td>\r\n<td valign="top">$textarea_box<input name="reference_email" type="hidden" value="{$reference_email}" /></td>\r\n<td valign="top"><button name="Submit" type="submit">Submit</button></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</form><br />GSAN thanks you in advance for your kind response and be assured that if we can assist you in any way, please contact us. <br /><br />Sincerely,<br />The GSAN Management Team<br />e)&nbsp; <a href="mailto:Admin@go2GSAN.com">Admin@go2GSAN.com</a> w) <a href="http://www.go2GSAN.com">www.go2GSAN.com</a><br /><img src="https://www.go2gsan.com/images/site/fileuploads/glo-rgb.png" alt="" width="250" height="66" />', '0000-00-00 00:00:00', 'GLSN:  Reference Request on {$applicant_trade_name} of {$applicant_country}', ''),
(6, 'Branch approval request', '<p>New Branch Approval Request from member :&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Company Name</td>\r\n<td>:</td>\r\n<td>{$company_name}</td>\r\n</tr>\r\n<tr>\r\n<td>Branch Name</td>\r\n<td>:</td>\r\n<td>{$branch_name}</td>\r\n</tr>\r\n<tr>\r\n<td>IP Address</td>\r\n<td>:</td>\r\n<td>{$ip_address}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Member need to add this branch.</p>\r\n<p>&nbsp;</p>\r\n<p>GLSN System</p>', '0000-00-00 00:00:00', 'GLSN Branch approval request', ''),
(7, 'Forgot Password', '<table border="0" width="640" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td style="padding: 40px;">\r\n<table style="box-shadow: 0px 0px 0px #ccc;" border="0" width="610" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr bgcolor="#FFFFFF">\r\n<td align="left">\r\n<p><img title="{$site_name}" src="{$logo}" alt="logo" /></p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td valign="top">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<h3><span style="font-size: 12pt;">Hi {$name},</span></h3>\r\n<h3>Please cllick below link to change your password&nbsp;&nbsp;<strong>{$link}.</strong></h3>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td width="50%">\r\n<p><strong>Thanks for using&nbsp;{$site_name}&nbsp;</strong></p>\r\n<p>&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr bgcolor="#fff">\r\n<td height="30">\r\n<div class="btn btn-primary space1" style="text-align: center;">&nbsp;&nbsp;</div>\r\n<div class="btn btn-primary space1" style="font-size: 10px; color: #7f7f7f; margin: 5px auto; font-family: Arial; text-align: left;">Thanks, &nbsp;&nbsp;<br />The {$site_name} Team</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '0000-00-00 00:00:00', 'Forgot Password - GLSN', ''),
(1, 'Admin Contact us', '<p><span style="font-size: 10pt;">The following message has been sent to you via the GLSN&nbsp; Contact Form. </span><span style="font-size: 10pt;">The details are as follows:</span></p>\r\n<p>From: {NAME} &lt;{$email}&gt;<br />Email:&nbsp; {$email}<br />Subject: {$subject_message}<br /><br /></p>\r\n<p><span style="font-size: 10pt;">Message:</span></p>\r\n<p>{$body}</p>\r\n<p>&nbsp;</p>\r\n<p><em>This is an automated email generated from the Contact Form in the Global Logistics Summit Network(GLSN ) website - <a href="http://www.glsn.com">www.glsn.com</a>.&nbsp; Please reply directly to the sender using the Best Way to Contact specified above.</em></p>', '0000-00-00 00:00:00', 'GLSN Contact Form from {$name} at {$email}', ''),
(2, 'Login Confirmation', '<table border="0" width="640" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td style="padding: 40px;">\r\n<table style="box-shadow: 0px 0px 0px #ccc;" border="0" width="610" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td valign="top">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td style="width: 50%; vertical-align: top;" width="50%">\r\n<p><span style="font-size: 12pt;">Dear {$company_name} :</span></p>\r\n<p>Thank you for your interest in the <strong>Global Logistics Summit Network(GLSN).</strong><br /><br />Please keep this email for your future reference.<br /><br />You can access your records at any time by logging into the <a href="{$site_url}login">OLP website</a> at: <a href="http://www.glsn.com">www.glsn.com</a> by using the following credentials:</p>\r\n<div style="text-align: left;" align="center">\r\n<table border="0" width="60%">\r\n<tbody>\r\n<tr>\r\n<td style="text-align: right;" width="50%"><strong>Email:&nbsp;&nbsp; <br /></strong></td>\r\n<td width="50%"><span style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;"><strong> <strong style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;">{$email}</strong></strong></span></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: right;" width="50%"><strong>Password:&nbsp;&nbsp; <br /></strong></td>\r\n<td width="50%"><span style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;"><strong> <strong style="font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit;">{$password}</strong></strong></span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<br />Sincerely,<br /><strong>Global Logistics Summit Network(GLSN).</strong><br />E:&nbsp;&nbsp; <a href="mailto:admin@glsn.com">admin@glsn.com</a><br />W:&nbsp;&nbsp; <a href="http://www.glsn.com">www.glsn.com</a><br /><img title="{$site_name}" src="{$logo}" alt="logo" /></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr bgcolor="#fff">\r\n<td height="30">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '0000-00-00 00:00:00', 'GLSN: Login Confirmation', ''),
(14, 'Invoice', '<p>Dear {$company_name}:</p>\r\n<p>You receive an invoice from our management.</p>\r\n<p>Please click the link below to view the invoice details or open the attachment pdf file:</p>\r\n<p><a title="Open Invoice #{$invoice_no}" href="{$invoice_url}" target="_blank" rel="noopener">Open Invoice #{$invoice_no}</a></p>\r\n<p style="text-align: justify;">Regards,</p>\r\n<p style="text-align: justify;">The GLSN Management Team</p>', '0000-00-00 00:00:00', 'GLSN Invoice Invoice #invoice_no', ''),
(15, 'Activation Member mail', '<p style="text-align: justify;">A sincere <strong>Thank You</strong> for your application to join Global Logistics Summit Network (GLSN) and <strong>Welcome on board!</strong></p>\r\n<p style="text-align: justify;">We are pleased to acknowledge receipt of your membership fees and you are now a Member in good standing of our growing, quality-focused Network.</p>\r\n<p style="text-align: justify;">Within the next few days we will be sending you a <strong>Membership Certificate</strong> for each of your offices.</p>\r\n<p style="text-align: justify;">The following are some important notes that we recommend you retain and also share with your staff:<br /><br /><strong>ANNOUNCEMENTS:<br /></strong>We will send out an internal broadcast to all of our GLSN Members within the immediate future so please be prepared for many warm welcome messages!&nbsp; In addition, we use our periodic eNewsletter to advise GSAN Members of new events such as your joining our network.</p>\r\n<p style="text-align: justify;">Again, we would like to welcome you on-board the GLSN. We believe you have joined the best network around but we are only as good as our Members. You only get out of the GLSN network what YOU are prepared to put into it!</p>\r\n<p style="text-align: justify;">Regards,</p>\r\n<p style="text-align: justify;">The GLSN Management Team</p>', '0000-00-00 00:00:00', 'Global Logistics Summit Network Member Activation company_name', '');

-- --------------------------------------------------------

--
-- Table structure for table `fc_fees`
--

CREATE TABLE `fc_fees` (
  `id` int(11) NOT NULL,
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
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_fees`
--

INSERT INTO `fc_fees` (`id`, `application_fee`, `featured_member`, `featured_member_discount`, `featured_discount`, `top_listed_member`, `top_listed_member_discount`, `top_listed_discount`, `branch`, `pay1`, `pay2`, `pay1_desc`, `pay2_desc`, `additional_person`, `updatedAt`) VALUES
(1, '1250.00', '500.00', '250.00', 1, '500.00', '250', 1, '250.00', '150.00', '300.00', '5000', '10,000', '700.00', '2019-11-11 07:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `fc_fileuploads`
--

CREATE TABLE `fc_fileuploads` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fc_footer`
--

CREATE TABLE `fc_footer` (
  `id` int(11) NOT NULL,
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
  `client_img` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_footer`
--

INSERT INTO `fc_footer` (`id`, `subscriber_text`, `home_about_text1`, `home_about_text2`, `address`, `address1`, `email`, `phone`, `accounting_email`, `general_email`, `google_link`, `linked_in`, `client_img`) VALUES
(1, 'The Membership Fee INCLUDES a Summit Fee for 1 delegate to attend one of the following 2 Bi-Annual Summits.', '&lt;p&gt;&lt;em&gt;Egestas integer eget aliquet nibh praesent tristique. Vulputate mi sit amet mauris. Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra. Porta nibh venenatis cras sed felis eget. Aliquam ultrices sagittis orci a. Dignissim diam quis enim lobortis. Aliquet porttitor lacus luctus accumsan. Dignissim convallis aenean et tortor at risus viverra adipiscing at.&lt;/em&gt;&lt;/p&gt;\r\n&lt;p&gt;Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra. Porta nibh venenatis cras sed felis eget. Aliquam ultrices sagittis orci a. Dignissim diam quis enim lobortis.&lt;/p&gt;', '&lt;p class=&quot;common-para&quot;&gt;Qminds facilitates enhanced competitiveness through multi-faceted interventions leading to Business Improvement through consulting, people, process and operational assessments, benchmarking &amp;amp; resource provisioning through Quality Outsourcing.&lt;/p&gt;\r\n&lt;p class=&quot;common-para&quot;&gt;We helps Organizations to achieve Operational Excellence through deployment of best practices and processes in areas of Business Process Re-engineering, Quality Management, Information Security, Project Management, IT Service Management and others.&lt;/p&gt;\r\n&lt;p class=&quot;common-para&quot;&gt;Qminds family worldwide works with organizations for enterprise-wide deployment of process improvement, quality and security various models like SEISM\'\'s CMMI&amp;reg;, People CMM and Six Sigma, Risk Management, Information Security, Business Continuity, Project Management to name a few.&lt;/p&gt;', 'GSAN\r\nUSA', '', 'info@go2gsan.com', '', 'Admin@go2GLSN.com', 'info@go2GLSN.com', 'https://www.linkedin.com/', 'https://www.linkedin.com', 'clients2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fc_gallery`
--

CREATE TABLE `fc_gallery` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_gallery`
--

INSERT INTO `fc_gallery` (`id`, `file_name`, `created`) VALUES
(15, 'ban-cont31.png', '2019-12-13 14:48:21'),
(14, 'ban-cont21.png', '2019-12-13 14:48:20'),
(13, 'ban-cont11.png', '2019-12-13 14:48:20'),
(12, 'ban-cont3.png', '2019-12-13 14:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `fc_hears`
--

CREATE TABLE `fc_hears` (
  `id` int(11) NOT NULL,
  `hears_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_number` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `fc_iata` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `short_code` varchar(150) CHARACTER SET utf8 NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_iata`
--

INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
(1, 1, 'Afghanistan', 'Jalalabad     ', 'JAA', 1, '2019-09-14 07:14:27'),
(2, 1, 'Afghanistan', 'Kabul - Khwaja Rawash Apt ', 'KBL', 1, '2019-09-14 07:14:27'),
(3, 1, 'Afghanistan', 'Uruzgan ', 'URZ', 1, '2019-09-14 07:14:27'),
(4, 2, 'Albania', 'Tirana - Rinas ', 'TIA', 1, '2019-09-14 07:14:27'),
(5, 3, 'Algeria', 'Algiers, Houari Boumediene Apt ', 'ALG', 1, '2019-09-14 07:14:27'),
(6, 3, 'Algeria', 'Annaba ', 'AAE', 1, '2019-09-14 07:14:27'),
(7, 3, 'Algeria', 'Constantine ', 'CZL', 1, '2019-09-14 07:14:27'),
(8, 3, 'Algeria', 'Jijel ', 'GJL', 1, '2019-09-14 07:14:27'),
(9, 3, 'Algeria', 'Oran (Ouahran) ', 'ORN', 1, '2019-09-14 07:14:27'),
(10, 4, 'American Samoa', 'Pago Pago ', 'PPG', 1, '2019-09-14 07:14:27'),
(11, 5, 'Andorra', 'Andorra La Vella - Heliport ', 'ALV', 1, '2019-09-14 07:14:27'),
(12, 6, 'Angola', 'Benguela ', 'BUG', 1, '2019-09-14 07:14:27'),
(13, 6, 'Angola', 'Cabinda ', 'CAB', 1, '2019-09-14 07:14:27'),
(14, 6, 'Angola', 'Jamba ', 'JMB', 1, '2019-09-14 07:14:27'),
(15, 6, 'Angola', 'Luanda - 4 de Fevereiro ', 'LAD', 1, '2019-09-14 07:14:27'),
(16, 6, 'Angola', 'Uige ', 'UGO', 1, '2019-09-14 07:14:27'),
(17, 7, 'Anguilla', 'Anguilla ', 'AXA', 1, '2019-09-14 07:14:27'),
(18, 8, 'Antigua & Barbuda', 'Antigua, V.C. Bird Int\'l ', 'ANU', 1, '2019-09-14 07:14:27'),
(19, 9, 'Argentina', 'Buenos Aires ', 'BUE', 1, '2019-09-14 07:14:27'),
(20, 9, 'Argentina', 'Buenos Aires, Ezeiza Int\'l Apt ', 'EZE', 1, '2019-09-14 07:14:27'),
(21, 9, 'Argentina', 'Buenos Aires, Jorge Newbery ', 'AEP', 1, '2019-09-14 07:14:27'),
(22, 9, 'Argentina', 'Cordoba ', 'COR', 1, '2019-09-14 07:14:27'),
(23, 9, 'Argentina', 'Iguazu, Cataratas ', 'IGR', 1, '2019-09-14 07:14:27'),
(24, 9, 'Argentina', 'Jose De San Martin ', 'JSM', 1, '2019-09-14 07:14:27'),
(25, 9, 'Argentina', 'Jujuy - El Cadillal Apt ', 'JUJ', 1, '2019-09-14 07:14:27'),
(26, 9, 'Argentina', 'Junin ', 'JNI', 1, '2019-09-14 07:14:27'),
(27, 9, 'Argentina', 'Mar del Plata ', 'MDQ', 1, '2019-09-14 07:14:27'),
(28, 9, 'Argentina', 'Mendoza ', 'MDZ', 1, '2019-09-14 07:14:27'),
(29, 9, 'Argentina', 'Rosario ', 'ROS', 1, '2019-09-14 07:14:27'),
(30, 9, 'Argentina', 'Salta, Gen Belgrano ', 'SLA', 1, '2019-09-14 07:14:27'),
(31, 9, 'Argentina', 'San Carlos de Bariloche ', 'BRC', 1, '2019-09-14 07:14:27'),
(32, 9, 'Argentina', 'Santa Rosa ', 'RSA', 1, '2019-09-14 07:14:27'),
(33, 9, 'Argentina', 'Ushuaia - Islas Malvinas Apt ', 'USH', 1, '2019-09-14 07:14:27'),
(34, 10, 'Armenia', 'Eriwan (Yerevan, Jerevan) ', 'EVN', 1, '2019-09-14 07:14:27'),
(35, 11, 'Aruba', 'Oranjestad - Reina Beatrix Int\'l ', 'AUA', 1, '2019-09-14 07:14:27'),
(36, 12, 'Australia', 'Adelaide ', 'ADL', 1, '2019-09-14 07:14:27'),
(37, 12, 'Australia', 'Albany ', 'ALH', 1, '2019-09-14 07:14:27'),
(38, 12, 'Australia', 'Albury ', 'ABX', 1, '2019-09-14 07:14:27'),
(39, 12, 'Australia', 'Alice Springs ', 'ASP', 1, '2019-09-14 07:14:27'),
(40, 12, 'Australia', 'Ayers Rock - Connellan ', 'AYQ', 1, '2019-09-14 07:14:27'),
(41, 12, 'Australia', 'Ayr ', 'AYR', 1, '2019-09-14 07:14:27'),
(42, 12, 'Australia', 'Ballina ', 'BNK', 1, '2019-09-14 07:14:27'),
(43, 12, 'Australia', 'Bamaga ', 'ABM', 1, '2019-09-14 07:14:27'),
(44, 12, 'Australia', 'Blackwater ', 'BLT', 1, '2019-09-14 07:14:27'),
(45, 12, 'Australia', 'Bowen ', 'ZBO', 1, '2019-09-14 07:14:27'),
(46, 12, 'Australia', 'Brampton Island ', 'BMP', 1, '2019-09-14 07:14:27'),
(47, 12, 'Australia', 'Brisbane ', 'BNE', 1, '2019-09-14 07:14:27'),
(48, 12, 'Australia', 'Broken Hill ', 'BHQ', 1, '2019-09-14 07:14:27'),
(49, 12, 'Australia', 'Broome ', 'BME', 1, '2019-09-14 07:14:27'),
(50, 12, 'Australia', 'Bundaberg ', 'BDB', 1, '2019-09-14 07:14:27'),
(51, 12, 'Australia', 'Burnie (Wynyard) ', 'BWT', 1, '2019-09-14 07:14:27'),
(52, 12, 'Australia', 'Cairns ', 'CNS', 1, '2019-09-14 07:14:27'),
(53, 12, 'Australia', 'Canberra - Canberra Apt ', 'CBR', 1, '2019-09-14 07:14:27'),
(54, 12, 'Australia', 'Carnarvon ', 'CVQ', 1, '2019-09-14 07:14:27'),
(55, 12, 'Australia', 'Casino ', 'CSI', 1, '2019-09-14 07:14:27'),
(56, 12, 'Australia', 'Ceduna ', 'CED', 1, '2019-09-14 07:14:27'),
(57, 12, 'Australia', 'Cessnock ', 'CES', 1, '2019-09-14 07:14:27'),
(58, 12, 'Australia', 'Charters Towers ', 'CXT', 1, '2019-09-14 07:14:27'),
(59, 12, 'Australia', 'Clermont ', 'CMQ', 1, '2019-09-14 07:14:27'),
(60, 12, 'Australia', 'Coffs Harbour ', 'CFS', 1, '2019-09-14 07:14:27'),
(61, 12, 'Australia', 'Collinsville ', 'KCE', 1, '2019-09-14 07:14:27'),
(62, 12, 'Australia', 'Coober Pedy ', 'CPD', 1, '2019-09-14 07:14:27'),
(63, 12, 'Australia', 'Cooktown ', 'CTN', 1, '2019-09-14 07:14:27'),
(64, 12, 'Australia', 'Cooma ', 'OOM', 1, '2019-09-14 07:14:27'),
(65, 12, 'Australia', 'Dalby ', 'DBY', 1, '2019-09-14 07:14:27'),
(66, 12, 'Australia', 'Darwin ', 'DRW', 1, '2019-09-14 07:14:27'),
(67, 12, 'Australia', 'Daydream Island ', 'DDI', 1, '2019-09-14 07:14:27'),
(68, 12, 'Australia', 'Derby ', 'DRB', 1, '2019-09-14 07:14:27'),
(69, 12, 'Australia', 'Devonport ', 'DPO', 1, '2019-09-14 07:14:27'),
(70, 12, 'Australia', 'Dubbo ', 'DBO', 1, '2019-09-14 07:14:27'),
(71, 12, 'Australia', 'Dunk Island ', 'DKI', 1, '2019-09-14 07:14:27'),
(72, 12, 'Australia', 'Dysart ', 'DYA', 1, '2019-09-14 07:14:27'),
(73, 12, 'Australia', 'Emerald ', 'EDR', 1, '2019-09-14 07:14:27'),
(74, 12, 'Australia', 'Emerald ', 'EMD', 1, '2019-09-14 07:14:27'),
(75, 12, 'Australia', 'Esperance ', 'EPR', 1, '2019-09-14 07:14:27'),
(76, 12, 'Australia', 'Geelong ', 'GEX', 1, '2019-09-14 07:14:27'),
(77, 12, 'Australia', 'Geraldton ', 'GET', 1, '2019-09-14 07:14:27'),
(78, 12, 'Australia', 'Gladstone ', 'GLT', 1, '2019-09-14 07:14:27'),
(79, 12, 'Australia', 'Gold Coast ', 'OOL', 1, '2019-09-14 07:14:27'),
(80, 12, 'Australia', 'Goondiwindi ', 'GOO', 1, '2019-09-14 07:14:27'),
(81, 12, 'Australia', 'Gove (Nhulunbuy) ', 'GOV', 1, '2019-09-14 07:14:27'),
(82, 12, 'Australia', 'Great Keppel Island ', 'GKL', 1, '2019-09-14 07:14:27'),
(83, 12, 'Australia', 'Griffith ', 'GFF', 1, '2019-09-14 07:14:27'),
(84, 12, 'Australia', 'Groote Eylandt - Alyangula ', 'GTE', 1, '2019-09-14 07:14:27'),
(85, 12, 'Australia', 'Gympie ', 'GYP', 1, '2019-09-14 07:14:27'),
(86, 12, 'Australia', 'Hamilton ', 'HLT', 1, '2019-09-14 07:14:27'),
(87, 12, 'Australia', 'Hamilton Island ', 'HTI', 1, '2019-09-14 07:14:27'),
(88, 12, 'Australia', 'Hayman Island ', 'HIS', 1, '2019-09-14 07:14:27'),
(89, 12, 'Australia', 'Hervey Bay ', 'HVB', 1, '2019-09-14 07:14:27'),
(90, 12, 'Australia', 'Hinchinbrook Island ', 'HNK', 1, '2019-09-14 07:14:27'),
(91, 12, 'Australia', 'Hobart ', 'HBA', 1, '2019-09-14 07:14:27'),
(92, 12, 'Australia', 'Home Hill ', 'HMH', 1, '2019-09-14 07:14:27'),
(93, 12, 'Australia', 'Ingham ', 'IGH', 1, '2019-09-14 07:14:27'),
(94, 12, 'Australia', 'Innisfail ', 'IFL', 1, '2019-09-14 07:14:27'),
(95, 12, 'Australia', 'Jandakot ', 'JAD', 1, '2019-09-14 07:14:27'),
(96, 12, 'Australia', 'Julia Creek ', 'JCK', 1, '2019-09-14 07:14:27'),
(97, 12, 'Australia', 'Jundah ', 'JUN', 1, '2019-09-14 07:14:27'),
(98, 12, 'Australia', 'Kalgoorlie ', 'KGI', 1, '2019-09-14 07:14:27'),
(99, 12, 'Australia', 'Karratha ', 'KTA', 1, '2019-09-14 07:14:27'),
(100, 12, 'Australia', 'Karumba ', 'KRB', 1, '2019-09-14 07:14:27'),
(101, 12, 'Australia', 'Katherine ', 'KTR', 1, '2019-09-14 07:14:27'),
(102, 12, 'Australia', 'King Island ', 'KNS', 1, '2019-09-14 07:14:27'),
(103, 12, 'Australia', 'Kingscote ', 'KGC', 1, '2019-09-14 07:14:27'),
(104, 12, 'Australia', 'Kowanyama ', 'KWM', 1, '2019-09-14 07:14:28'),
(105, 12, 'Australia', 'Kununurra ', 'KNX', 1, '2019-09-14 07:14:28'),
(106, 12, 'Australia', 'Launceston ', 'LST', 1, '2019-09-14 07:14:28'),
(107, 12, 'Australia', 'Laverton ', 'LVO', 1, '2019-09-14 07:14:28'),
(108, 12, 'Australia', 'Learmouth (Exmouth) ', 'LEA', 1, '2019-09-14 07:14:28'),
(109, 12, 'Australia', 'Leinster ', 'LER', 1, '2019-09-14 07:14:28'),
(110, 12, 'Australia', 'Leonora ', 'LNO', 1, '2019-09-14 07:14:28'),
(111, 12, 'Australia', 'Lindeman Island ', 'LDC', 1, '2019-09-14 07:14:28'),
(112, 12, 'Australia', 'Lismore ', 'LSY', 1, '2019-09-14 07:14:28'),
(113, 12, 'Australia', 'Lizard Island ', 'LZR', 1, '2019-09-14 07:14:28'),
(114, 12, 'Australia', 'Lockhart River ', 'IRG', 1, '2019-09-14 07:14:28'),
(115, 12, 'Australia', 'Longreach ', 'LRE', 1, '2019-09-14 07:14:28'),
(116, 12, 'Australia', 'Mackay ', 'MKY', 1, '2019-09-14 07:14:28'),
(117, 12, 'Australia', 'Maitland ', 'MTL', 1, '2019-09-14 07:14:28'),
(118, 12, 'Australia', 'Maryborough ', 'MBH', 1, '2019-09-14 07:14:28'),
(119, 12, 'Australia', 'Meekatharra ', 'MKR', 1, '2019-09-14 07:14:28'),
(120, 12, 'Australia', 'Melbourne (Tullamarine) ', 'MEL', 1, '2019-09-14 07:14:28'),
(121, 12, 'Australia', 'Merimbula ', 'MIM', 1, '2019-09-14 07:14:28'),
(122, 12, 'Australia', 'Middlemount ', 'MMM', 1, '2019-09-14 07:14:28'),
(123, 12, 'Australia', 'Mildura ', 'MQL', 1, '2019-09-14 07:14:28'),
(124, 12, 'Australia', 'Moranbah ', 'MOV', 1, '2019-09-14 07:14:28'),
(125, 12, 'Australia', 'Moree ', 'MRZ', 1, '2019-09-14 07:14:28'),
(126, 12, 'Australia', 'Moruya ', 'MYA', 1, '2019-09-14 07:14:28'),
(127, 12, 'Australia', 'Mount Gambier ', 'MGB', 1, '2019-09-14 07:14:28'),
(128, 12, 'Australia', 'Mount Magnet ', 'MMG', 1, '2019-09-14 07:14:28'),
(129, 12, 'Australia', 'Mt. Isa ', 'ISA', 1, '2019-09-14 07:14:28'),
(130, 12, 'Australia', 'Narrabri ', 'NAA', 1, '2019-09-14 07:14:28'),
(131, 12, 'Australia', 'Narrandera ', 'NRA', 1, '2019-09-14 07:14:28'),
(132, 12, 'Australia', 'Newcastle - Belmont ', 'BEO', 1, '2019-09-14 07:14:28'),
(133, 12, 'Australia', 'Newcastle - Williamtown ', 'NTL', 1, '2019-09-14 07:14:28'),
(134, 12, 'Australia', 'Newman ', 'ZNE', 1, '2019-09-14 07:14:28'),
(135, 12, 'Australia', 'Noosa ', 'NSA', 1, '2019-09-14 07:14:28'),
(136, 12, 'Australia', 'Norfolk Island ', 'NLK', 1, '2019-09-14 07:14:28'),
(137, 12, 'Australia', 'Olympic Dam ', 'OLP', 1, '2019-09-14 07:14:28'),
(138, 12, 'Australia', 'Orange ', 'OAG', 1, '2019-09-14 07:14:28'),
(139, 12, 'Australia', 'Orpheus Island ', 'ORS', 1, '2019-09-14 07:14:28'),
(140, 12, 'Australia', 'Paraburdoo ', 'PBO', 1, '2019-09-14 07:14:28'),
(141, 12, 'Australia', 'Perth Int\'l ', 'PER', 1, '2019-09-14 07:14:28'),
(142, 12, 'Australia', 'Port Augusta ', 'PUG', 1, '2019-09-14 07:14:28'),
(143, 12, 'Australia', 'Port Hedland ', 'PHE', 1, '2019-09-14 07:14:28'),
(144, 12, 'Australia', 'Port Lincoln ', 'PLO', 1, '2019-09-14 07:14:28'),
(145, 12, 'Australia', 'Port Macquarie ', 'PQQ', 1, '2019-09-14 07:14:28'),
(146, 12, 'Australia', 'Portland ', 'PTJ', 1, '2019-09-14 07:14:28'),
(147, 12, 'Australia', 'Prosperpine ', 'PPP', 1, '2019-09-14 07:14:28'),
(148, 12, 'Australia', 'Queenstown ', 'UEE', 1, '2019-09-14 07:14:28'),
(149, 12, 'Australia', 'Rockhampton ', 'ROK', 1, '2019-09-14 07:14:28'),
(150, 12, 'Australia', 'Scone ', 'NSO', 1, '2019-09-14 07:14:28'),
(151, 12, 'Australia', 'Shute Harbour ', 'JHQ', 1, '2019-09-14 07:14:28'),
(152, 12, 'Australia', 'Singleton ', 'SIX', 1, '2019-09-14 07:14:28'),
(153, 12, 'Australia', 'South Molle Island ', 'SOI', 1, '2019-09-14 07:14:28'),
(154, 12, 'Australia', 'Streaky Bay ', 'KBY', 1, '2019-09-14 07:14:28'),
(155, 12, 'Australia', 'Sunshine Coast ', 'MCY', 1, '2019-09-14 07:14:28'),
(156, 12, 'Australia', 'Sydney - Sydney Apt ', 'SYD', 1, '2019-09-14 07:14:28'),
(157, 12, 'Australia', 'Tamworth ', 'TMW', 1, '2019-09-14 07:14:28'),
(158, 12, 'Australia', 'Taree ', 'TRO', 1, '2019-09-14 07:14:28'),
(159, 12, 'Australia', 'Temora ', 'TEM', 1, '2019-09-14 07:14:28'),
(160, 12, 'Australia', 'Tennant Creek ', 'TCA', 1, '2019-09-14 07:14:28'),
(161, 12, 'Australia', 'Thursday Island ', 'TIS', 1, '2019-09-14 07:14:28'),
(162, 12, 'Australia', 'Tom Price ', 'TPR', 1, '2019-09-14 07:14:28'),
(163, 12, 'Australia', 'Toowoomba ', 'TWB', 1, '2019-09-14 07:14:28'),
(164, 12, 'Australia', 'Townsville ', 'TSV', 1, '2019-09-14 07:14:28'),
(165, 12, 'Australia', 'Wagga ', 'WGA', 1, '2019-09-14 07:14:28'),
(166, 12, 'Australia', 'Warrnambool ', 'WMB', 1, '2019-09-14 07:14:28'),
(167, 12, 'Australia', 'Weipa ', 'WEI', 1, '2019-09-14 07:14:28'),
(168, 12, 'Australia', 'Whitsunday Resort ', 'HAP', 1, '2019-09-14 07:14:28'),
(169, 12, 'Australia', 'Whyalla ', 'WYA', 1, '2019-09-14 07:14:28'),
(170, 12, 'Australia', 'Wickham ', 'WHM', 1, '2019-09-14 07:14:28'),
(171, 12, 'Australia', 'Wiluna ', 'WUN', 1, '2019-09-14 07:14:28'),
(172, 12, 'Australia', 'Wollongong ', 'WOL', 1, '2019-09-14 07:14:28'),
(173, 12, 'Australia', 'Woomera ', 'UMR', 1, '2019-09-14 07:14:28'),
(174, 12, 'Australia', 'Wyndham ', 'WYN', 1, '2019-09-14 07:14:28'),
(175, 13, 'Austria', 'Graz ', 'GRZ', 1, '2019-09-14 07:14:28'),
(176, 13, 'Austria', 'Innsbruck - Kranebitten ', 'INN', 1, '2019-09-14 07:14:28'),
(177, 13, 'Austria', 'Klagenfurt ', 'KLU', 1, '2019-09-14 07:14:28'),
(178, 13, 'Austria', 'Linz - Hoersching ', 'LNZ', 1, '2019-09-14 07:14:28'),
(179, 13, 'Austria', 'Salzburg - W.A. Mozart ', 'SZG', 1, '2019-09-14 07:14:28'),
(180, 13, 'Austria', 'Wien (Vienna) - Vienna Int\'l ', 'VIE', 1, '2019-09-14 07:14:28'),
(181, 14, 'Azerbaijan', 'Baku - Heydar Aliyev Int\'l Apt ', 'BAK', 1, '2019-09-14 07:14:28'),
(182, 14, 'Azerbaijan', 'Nakhichevan ', 'NAJ', 1, '2019-09-14 07:14:28'),
(183, 15, 'Bahamas', 'Bahamas - Lynden Pindling Int\'l Apt ', 'NAS', 1, '2019-09-14 07:14:28'),
(184, 15, 'Bahamas', 'Chub Cay ', 'CCZ', 1, '2019-09-14 07:14:28'),
(185, 15, 'Bahamas', 'Freeport - Grand Bahama Int\'l Apt ', 'FPO', 1, '2019-09-14 07:14:28'),
(186, 15, 'Bahamas', 'Govenors Harbour ', 'GHB', 1, '2019-09-14 07:14:28'),
(187, 15, 'Bahamas', 'Marsh Harbour ', 'MHH', 1, '2019-09-14 07:14:28'),
(188, 15, 'Bahamas', 'North Eleuthera ', 'ELH', 1, '2019-09-14 07:14:28'),
(189, 15, 'Bahamas', 'Rock Sound ', 'RSD', 1, '2019-09-14 07:14:28'),
(190, 15, 'Bahamas', 'San Salvador ', 'ZSA', 1, '2019-09-14 07:14:28'),
(191, 15, 'Bahamas', 'Treasure Cay ', 'TCB', 1, '2019-09-14 07:14:28'),
(192, 16, 'Bahrain', 'Bahrain - Bahrain Int\'l Apt ', 'BAH', 1, '2019-09-14 07:14:28'),
(193, 17, 'Bangladesh', 'Barisal ', 'BZL', 1, '2019-09-14 07:14:28'),
(194, 17, 'Bangladesh', 'Chittagong ', 'CGP', 1, '2019-09-14 07:14:28'),
(195, 17, 'Bangladesh', 'Dhaka - Zia Int\'l Apt ', 'DAC', 1, '2019-09-14 07:14:28'),
(196, 17, 'Bangladesh', 'Jessore - Jessore Apt ', 'JSR', 1, '2019-09-14 07:14:28'),
(197, 17, 'Bangladesh', 'Sylhet ', 'ZYL', 1, '2019-09-14 07:14:28'),
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
(219, 28, 'Brazil', 'Aracaju ', 'AJU', 1, '2019-09-14 07:14:28'),
(220, 28, 'Brazil', 'Belem - Val de Cans Int\'l Apt ', 'BEL', 1, '2019-09-14 07:14:28'),
(221, 28, 'Brazil', 'Belo Horizonte - Tancredo Neves Int\'l Apt ', 'CNF', 1, '2019-09-14 07:14:28'),
(222, 28, 'Brazil', 'Boa Vista ', 'BVB', 1, '2019-09-14 07:14:28'),
(223, 28, 'Brazil', 'Brasilia - Pres Juscelino Kubitschek Int\'l ', 'BSB', 1, '2019-09-14 07:14:28'),
(224, 28, 'Brazil', 'Campo Grande ', 'CGR', 1, '2019-09-14 07:14:28'),
(225, 28, 'Brazil', 'Cuiaba - Marechal Rondon Int\'l Apt ', 'CGB', 1, '2019-09-14 07:14:28'),
(226, 28, 'Brazil', 'Curitiba - Afonso Pena Int\'l Apt ', 'CWB', 1, '2019-09-14 07:14:28'),
(227, 28, 'Brazil', 'Florianopolis ', 'FLN', 1, '2019-09-14 07:14:28'),
(228, 28, 'Brazil', 'Fortaleza - Pinto Martins Apt ', 'FOR', 1, '2019-09-14 07:14:28'),
(229, 28, 'Brazil', 'Goiania, Santa Genoveva Apt ', 'GYN', 1, '2019-09-14 07:14:28'),
(230, 28, 'Brazil', 'Jacobina    ', 'JCM', 1, '2019-09-14 07:14:28'),
(231, 28, 'Brazil', 'Jales ', 'JLS', 1, '2019-09-14 07:14:28'),
(232, 28, 'Brazil', 'Januaria ', 'JNA', 1, '2019-09-14 07:14:28'),
(233, 28, 'Brazil', 'Jatai ', 'JTI', 1, '2019-09-14 07:14:28'),
(234, 28, 'Brazil', 'Joacaba ', 'JCB', 1, '2019-09-14 07:14:28'),
(235, 28, 'Brazil', 'Joao Pessoa - Castro Pinto Apt ', 'JPA', 1, '2019-09-14 07:14:28'),
(236, 28, 'Brazil', 'Joinville - Cubatao Apt ', 'JOI', 1, '2019-09-14 07:14:28'),
(237, 28, 'Brazil', 'Juiz De Fora - Francisco De Assis Apt ', 'JDF', 1, '2019-09-14 07:14:28'),
(238, 28, 'Brazil', 'Macapa - Alberto Alcolumbre Int\'l Apt ', 'MCP', 1, '2019-09-14 07:14:28'),
(239, 28, 'Brazil', 'Maceio - Zumbi dos Palmares Int\'l Apt ', 'MCZ', 1, '2019-09-14 07:14:28'),
(240, 28, 'Brazil', 'Manaus - Eduardo Gomes Int\'l Apt ', 'MAO', 1, '2019-09-14 07:14:28'),
(241, 28, 'Brazil', 'Montenegro ', 'QGF', 1, '2019-09-14 07:14:28'),
(242, 28, 'Brazil', 'Natal - Augusto Severo Int\'l Apt ', 'NAT', 1, '2019-09-14 07:14:28'),
(243, 28, 'Brazil', 'Palmas ', 'PMW', 1, '2019-09-14 07:14:28'),
(244, 28, 'Brazil', 'Porto Alegre - Salgado Filho Int\'l Apt ', 'POA', 1, '2019-09-14 07:14:28'),
(245, 28, 'Brazil', 'Porto Velho ', 'PVH', 1, '2019-09-14 07:14:28'),
(246, 28, 'Brazil', 'Recife - Guararapes-Gilberto Freyre Int\'l ', 'REC', 1, '2019-09-14 07:14:28'),
(247, 28, 'Brazil', 'Rio Branco - Plácido de Castro Int\'l Apt ', 'RBR', 1, '2019-09-14 07:14:28'),
(248, 28, 'Brazil', 'Rio de Janeiro ', 'RIO', 1, '2019-09-14 07:14:28'),
(249, 28, 'Brazil', 'Rio de Janeiro - Galeao ', 'GIG', 1, '2019-09-14 07:14:28'),
(250, 28, 'Brazil', 'Rio de Janeiro - Santos Dumont ', 'SDU', 1, '2019-09-14 07:14:28'),
(251, 28, 'Brazil', 'Salvador - Salvador Int\'l Apt ', 'SSA', 1, '2019-09-14 07:14:28'),
(252, 28, 'Brazil', 'Santa Rosa ', 'SRA', 1, '2019-09-14 07:14:28'),
(253, 28, 'Brazil', 'Sao Luis - Marechal Cunha Machado Int\'l ', 'SLZ', 1, '2019-09-14 07:14:28'),
(254, 28, 'Brazil', 'Sao Paulo ', 'SAO', 1, '2019-09-14 07:14:28'),
(255, 28, 'Brazil', 'Sao Paulo - Congonhas ', 'CGH', 1, '2019-09-14 07:14:28'),
(256, 28, 'Brazil', 'Sao Paulo - Guarulhos Int\'l ', 'GRU', 1, '2019-09-14 07:14:28'),
(257, 28, 'Brazil', 'Sao Paulo - Viracopos ', 'VCP', 1, '2019-09-14 07:14:28'),
(258, 28, 'Brazil', 'Teresina ', 'THE', 1, '2019-09-14 07:14:28'),
(259, 28, 'Brazil', 'Uberaba ', 'UBA', 1, '2019-09-14 07:14:28'),
(260, 28, 'Brazil', 'Uberlandia - Eduardo Gomes Apt ', 'UDI', 1, '2019-09-14 07:14:28'),
(261, 28, 'Brazil', 'Urubupunga - Ernesto Pochler Apt ', 'URB', 1, '2019-09-14 07:14:28'),
(262, 28, 'Brazil', 'Uruguaiana - Ruben Berta Apt ', 'URG', 1, '2019-09-14 07:14:28'),
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
(283, 35, 'Canada', 'Attawapiskat, NT ', 'YAT', 1, '2019-09-14 07:14:28'),
(284, 35, 'Canada', 'Bonaventure, PQ ', 'YVB', 1, '2019-09-14 07:14:28'),
(285, 35, 'Canada', 'Calgary - Calgary Int\'l Apt ', 'YYC', 1, '2019-09-14 07:14:28'),
(286, 35, 'Canada', 'Cambridge Bay ', 'YCB', 1, '2019-09-14 07:14:28'),
(287, 35, 'Canada', 'Churchill ', 'YYQ', 1, '2019-09-14 07:14:28'),
(288, 35, 'Canada', 'Deer Lake/Corner Brook ', 'YDF', 1, '2019-09-14 07:14:28'),
(289, 35, 'Canada', 'Edmonton ', 'YEA', 1, '2019-09-14 07:14:28'),
(290, 35, 'Canada', 'Edmonton, Int\'l ', 'YEG', 1, '2019-09-14 07:14:28'),
(291, 35, 'Canada', 'Edmonton, Municipal ', 'YXD', 1, '2019-09-14 07:14:28'),
(292, 35, 'Canada', 'Flin Flon ', 'YFO', 1, '2019-09-14 07:14:28'),
(293, 35, 'Canada', 'Fort Albert ', 'YFA', 1, '2019-09-14 07:14:28'),
(294, 35, 'Canada', 'Fort McMurray ', 'YMM', 1, '2019-09-14 07:14:28'),
(295, 35, 'Canada', 'Fort Smith ', 'YSM', 1, '2019-09-14 07:14:28'),
(296, 35, 'Canada', 'Fort St. John ', 'YXJ', 1, '2019-09-14 07:14:28'),
(297, 35, 'Canada', 'Fredericton ', 'YFC', 1, '2019-09-14 07:14:28'),
(298, 35, 'Canada', 'Gander ', 'YQX', 1, '2019-09-14 07:14:28'),
(299, 35, 'Canada', 'Gillam ', 'YGX', 1, '2019-09-14 07:14:28'),
(300, 35, 'Canada', 'Goose Bay ', 'YYR', 1, '2019-09-14 07:14:28'),
(301, 35, 'Canada', 'Halifax Int\'l ', 'YHZ', 1, '2019-09-14 07:14:28'),
(302, 35, 'Canada', 'Hall Beach ', 'YUX', 1, '2019-09-14 07:14:28'),
(303, 35, 'Canada', 'Hamilton ', 'YHM', 1, '2019-09-14 07:14:28'),
(304, 35, 'Canada', 'Harrington Harbour, PQ ', 'YHR', 1, '2019-09-14 07:14:28'),
(305, 35, 'Canada', 'Inuvik ', 'YEV', 1, '2019-09-14 07:14:28'),
(306, 35, 'Canada', 'Iqaluit (Frobisher Bay) ', 'YFB', 1, '2019-09-14 07:14:28'),
(307, 35, 'Canada', 'Kamloops, BC ', 'YKA', 1, '2019-09-14 07:14:28'),
(308, 35, 'Canada', 'Kaschechawan, PQ ', 'ZKE', 1, '2019-09-14 07:14:28'),
(309, 35, 'Canada', 'Kelowna, BC ', 'YLW', 1, '2019-09-14 07:14:28'),
(310, 35, 'Canada', 'Kuujjuaq (FortChimo) ', 'YVP', 1, '2019-09-14 07:14:28'),
(311, 35, 'Canada', 'Kuujjuarapik ', 'YGW', 1, '2019-09-14 07:14:28'),
(312, 35, 'Canada', 'La Grande ', 'YGL', 1, '2019-09-14 07:14:28'),
(313, 35, 'Canada', 'Lac Brochet, MB ', 'XLB', 1, '2019-09-14 07:14:28'),
(314, 35, 'Canada', 'Leaf Rapids ', 'YLR', 1, '2019-09-14 07:14:28'),
(315, 35, 'Canada', 'London ', 'YXU', 1, '2019-09-14 07:14:28'),
(316, 35, 'Canada', 'Moncton ', 'YQM', 1, '2019-09-14 07:14:28'),
(317, 35, 'Canada', 'Montreal ', 'YMQ', 1, '2019-09-14 07:14:28'),
(318, 35, 'Canada', 'Montreal - Dorval (Montréal-Trudeau) ', 'YUL', 1, '2019-09-14 07:14:28'),
(319, 35, 'Canada', 'Montreal - Mirabel ', 'YMX', 1, '2019-09-14 07:14:28'),
(320, 35, 'Canada', 'Nanisivik ', 'YSR', 1, '2019-09-14 07:14:28'),
(321, 35, 'Canada', 'Norman Wells ', 'YVQ', 1, '2019-09-14 07:14:28'),
(322, 35, 'Canada', 'Ottawa - Hull ', 'YOW', 1, '2019-09-14 07:14:28'),
(323, 35, 'Canada', 'Port Menier, PQ ', 'YPN', 1, '2019-09-14 07:14:28'),
(324, 35, 'Canada', 'Prince George ', 'YXS', 1, '2019-09-14 07:14:28'),
(325, 35, 'Canada', 'Prince Rupert/Digby Island ', 'YPR', 1, '2019-09-14 07:14:28'),
(326, 35, 'Canada', 'Pukatawagan ', 'XPK', 1, '2019-09-14 07:14:28'),
(327, 35, 'Canada', 'Quebec - Quebec Int\'l ', 'YQB', 1, '2019-09-14 07:14:28'),
(328, 35, 'Canada', 'Rainbow Lake, AB ', 'YOP', 1, '2019-09-14 07:14:28'),
(329, 35, 'Canada', 'Regina ', 'YQR', 1, '2019-09-14 07:14:28'),
(330, 35, 'Canada', 'Resolute Bay ', 'YRB', 1, '2019-09-14 07:14:28'),
(331, 35, 'Canada', 'Saint John ', 'YSJ', 1, '2019-09-14 07:14:28'),
(332, 35, 'Canada', 'Sandspit ', 'YZP', 1, '2019-09-14 07:14:28'),
(333, 35, 'Canada', 'Saskatoon ', 'YXE', 1, '2019-09-14 07:14:28'),
(334, 35, 'Canada', 'Shamattawa, MB ', 'ZTM', 1, '2019-09-14 07:14:28'),
(335, 35, 'Canada', 'Smithers ', 'YYD', 1, '2019-09-14 07:14:28'),
(336, 35, 'Canada', 'South Indian Lake, MB ', 'XSI', 1, '2019-09-14 07:14:28'),
(337, 35, 'Canada', 'St. Augustin, PQ ', 'YIF', 1, '2019-09-14 07:14:28'),
(338, 35, 'Canada', 'St. John\'s ', 'YYT', 1, '2019-09-14 07:14:28'),
(339, 35, 'Canada', 'St. Pierre, NF ', 'FSP', 1, '2019-09-14 07:14:28'),
(340, 35, 'Canada', 'Terrace ', 'YXT', 1, '2019-09-14 07:14:28'),
(341, 35, 'Canada', 'The Pas ', 'YQD', 1, '2019-09-14 07:14:28'),
(342, 35, 'Canada', 'Thompson ', 'YTH', 1, '2019-09-14 07:14:28'),
(343, 35, 'Canada', 'Thunder Bay ', 'YQT', 1, '2019-09-14 07:14:28'),
(344, 35, 'Canada', 'Toronto ', 'YTO', 1, '2019-09-14 07:14:28'),
(345, 35, 'Canada', 'Toronto - Billy Bishop Toronto City Apt ', 'YTZ', 1, '2019-09-14 07:14:28'),
(346, 35, 'Canada', 'Toronto - Toronto Pearson Int\'l Apt ', 'YYZ', 1, '2019-09-14 07:14:28'),
(347, 35, 'Canada', 'Umiujaq ', 'YUD', 1, '2019-09-14 07:14:28'),
(348, 35, 'Canada', 'Uranium City ', 'YBE', 1, '2019-09-14 07:14:28'),
(349, 35, 'Canada', 'Val d\'Or ', 'YVO', 1, '2019-09-14 07:14:28'),
(350, 35, 'Canada', 'Vancouver - Vancouver Int\'l ', 'YVR', 1, '2019-09-14 07:14:28'),
(351, 35, 'Canada', 'Victoria ', 'YYJ', 1, '2019-09-14 07:14:28'),
(352, 35, 'Canada', 'Wabush ', 'YWK', 1, '2019-09-14 07:14:28'),
(353, 35, 'Canada', 'Whale Cove, NT ', 'YXN', 1, '2019-09-14 07:14:28'),
(354, 35, 'Canada', 'Whitehorse ', 'YXY', 1, '2019-09-14 07:14:28'),
(355, 35, 'Canada', 'Windsor Ontario ', 'YQG', 1, '2019-09-14 07:14:28'),
(356, 35, 'Canada', 'Winnipeg Int\'l ', 'YWG', 1, '2019-09-14 07:14:28'),
(357, 35, 'Canada', 'Yellowknife ', 'YZF', 1, '2019-09-14 07:14:28'),
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
(612, 70, 'Germany', 'Augsburg - Augsbur gApt ', 'AGB', 1, '2019-09-14 07:14:29'),
(613, 70, 'Germany', 'Bayreuth - Bindlacher-Berg ', 'BYU', 1, '2019-09-14 07:14:29'),
(614, 70, 'Germany', 'Berlin ', 'BER', 1, '2019-09-14 07:14:29'),
(615, 70, 'Germany', 'Berlin, Schoenefeld ', 'SXF', 1, '2019-09-14 07:14:29'),
(616, 70, 'Germany', 'Berlin, Tegel ', 'TXL', 1, '2019-09-14 07:14:29'),
(617, 70, 'Germany', 'Berlin, Tempelhof ', 'THF', 1, '2019-09-14 07:14:29'),
(618, 70, 'Germany', 'Bremen - Bremen Apt (Flughafen Bremen) ', 'BRE', 1, '2019-09-14 07:14:29'),
(619, 70, 'Germany', 'Cologne - Cologne Apt (Flughafen Köln/Bonn) ', 'CGN', 1, '2019-09-14 07:14:29'),
(620, 70, 'Germany', 'Cottbus - Cottbus-Drewitz Apt ', 'CBU', 1, '2019-09-14 07:14:29'),
(621, 70, 'Germany', 'Dortmund ', 'DTM', 1, '2019-09-14 07:14:29'),
(622, 70, 'Germany', 'Dresden - Dresden Apt ', 'DRS', 1, '2019-09-14 07:14:29'),
(623, 70, 'Germany', 'Duesseldorf - Düsseldorf Int\'l Apt ', 'DUS', 1, '2019-09-14 07:14:29'),
(624, 70, 'Germany', 'Erfurt - Erfurt Apt (Flughafen Erfurt) ', 'ERF', 1, '2019-09-14 07:14:29'),
(625, 70, 'Germany', 'Frankfurt/Hahn ', 'HHN', 1, '2019-09-14 07:14:29'),
(626, 70, 'Germany', 'Frankfurt/Main  (Rhein-Main-Flughafen) ', 'FRA', 1, '2019-09-14 07:14:29'),
(627, 70, 'Germany', 'Friedrichshafen - Bodensee-Apt Friedrichshafen ', 'FDH', 1, '2019-09-14 07:14:29'),
(628, 70, 'Germany', 'Guettin ', 'GTI', 1, '2019-09-14 07:14:29'),
(629, 70, 'Germany', 'Hamburg - Fuhlsbuettel ', 'HAM', 1, '2019-09-14 07:14:29'),
(630, 70, 'Germany', 'Hannover ', 'HAJ', 1, '2019-09-14 07:14:29'),
(631, 70, 'Germany', 'Hof ', 'HOQ', 1, '2019-09-14 07:14:29'),
(632, 70, 'Germany', 'Juist (island) ', 'JUI', 1, '2019-09-14 07:14:29'),
(633, 70, 'Germany', 'Karlsruhe-Baden - Soellingen ', 'FKB', 1, '2019-09-14 07:14:29'),
(634, 70, 'Germany', 'Kiel - Holtenau ', 'KEL', 1, '2019-09-14 07:14:29'),
(635, 70, 'Germany', 'Leipzig ', 'LEJ', 1, '2019-09-14 07:14:29'),
(636, 70, 'Germany', 'Muenchen (Munich) - Franz Josef Strauss ', 'MUC', 1, '2019-09-14 07:14:29'),
(637, 70, 'Germany', 'Muenster/Osnabrueck ', 'FMO', 1, '2019-09-14 07:14:29'),
(638, 70, 'Germany', 'Nürnberg (Nuremberg) ', 'NUE', 1, '2019-09-14 07:14:29'),
(639, 70, 'Germany', 'Paderborn/Lippstadt ', 'PAD', 1, '2019-09-14 07:14:29'),
(640, 70, 'Germany', 'Saarbruecken ', 'SCN', 1, '2019-09-14 07:14:29'),
(641, 70, 'Germany', 'Stuttgart - Echterdingen ', 'STR', 1, '2019-09-14 07:14:29'),
(642, 70, 'Germany', 'Westerland, Sylt Apt ', 'GWT', 1, '2019-09-14 07:14:29'),
(643, 70, 'Germany', 'Wiesbaden, Air Base ', 'WIE', 1, '2019-09-14 07:14:29'),
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
(684, 83, 'Honduras', 'Juticalpa ', 'JUT', 1, '2019-09-14 07:14:29');
INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
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
(702, 87, 'India', 'Belgaum ', 'IXG', 1, '2019-09-14 07:14:29'),
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
(772, 92, 'Israel', 'Jerusalem - Atarot Apt (closed) ', 'JRS', 1, '2019-09-14 07:14:29'),
(773, 92, 'Israel', 'Tel Aviv - Ben Gurion Int\'l ', 'TLV', 1, '2019-09-14 07:14:29'),
(774, 93, 'Italy', 'Alghero Sassari ', 'AHO', 1, '2019-09-14 07:14:29'),
(775, 93, 'Italy', 'Ancona - Ancona Falconara Apt ', 'AOI', 1, '2019-09-14 07:14:29'),
(776, 93, 'Italy', 'Bari ', 'BRI', 1, '2019-09-14 07:14:29'),
(777, 93, 'Italy', 'Bergamo/Milan - Orio Al Serio ', 'BGY', 1, '2019-09-14 07:14:29'),
(778, 93, 'Italy', 'Bologna ', 'BLQ', 1, '2019-09-14 07:14:29'),
(779, 93, 'Italy', 'Brindisi ', 'BDS', 1, '2019-09-14 07:14:29'),
(780, 93, 'Italy', 'Cagliari ', 'CAG', 1, '2019-09-14 07:14:29'),
(781, 93, 'Italy', 'Catania ', 'CTA', 1, '2019-09-14 07:14:29'),
(782, 93, 'Italy', 'Elba Island, Marina Di Campo ', 'EBA', 1, '2019-09-14 07:14:29'),
(783, 93, 'Italy', 'Florence (Firenze) - Peretola Apt ', 'FLR', 1, '2019-09-14 07:14:29'),
(784, 93, 'Italy', 'Genoa ', 'GOA', 1, '2019-09-14 07:14:29'),
(785, 93, 'Italy', 'Lamezia Terme ', 'SUF', 1, '2019-09-14 07:14:29'),
(786, 93, 'Italy', 'Lampedusa ', 'LMP', 1, '2019-09-14 07:14:29'),
(787, 93, 'Italy', 'Milan ', 'MIL', 1, '2019-09-14 07:14:29'),
(788, 93, 'Italy', 'Milan - Linate ', 'LIN', 1, '2019-09-14 07:14:29'),
(789, 93, 'Italy', 'Milan - Malpensa ', 'MXP', 1, '2019-09-14 07:14:29'),
(790, 93, 'Italy', 'Naples - Naples Capodichino Apt ', 'NAP', 1, '2019-09-14 07:14:29'),
(791, 93, 'Italy', 'Olbia ', 'OLB', 1, '2019-09-14 07:14:29'),
(792, 93, 'Italy', 'Palermo - Punta Raisi ', 'PMO', 1, '2019-09-14 07:14:29'),
(793, 93, 'Italy', 'Pantelleria ', 'PNL', 1, '2019-09-14 07:14:29'),
(794, 93, 'Italy', 'Perugia ', 'PEG', 1, '2019-09-14 07:14:29'),
(795, 93, 'Italy', 'Pescara ', 'PSR', 1, '2019-09-14 07:14:29'),
(796, 93, 'Italy', 'Pisa - Galileo Galilei ', 'PSA', 1, '2019-09-14 07:14:29'),
(797, 93, 'Italy', 'Reggio Calabria ', 'REG', 1, '2019-09-14 07:14:29'),
(798, 93, 'Italy', 'Rimini ', 'RMI', 1, '2019-09-14 07:14:29'),
(799, 93, 'Italy', 'Rome ', 'ROM', 1, '2019-09-14 07:14:29'),
(800, 93, 'Italy', 'Rome - Ciampino ', 'CIA', 1, '2019-09-14 07:14:29'),
(801, 93, 'Italy', 'Rome - Fuimicino ', 'FCO', 1, '2019-09-14 07:14:29'),
(802, 93, 'Italy', 'Trapani ', 'TPS', 1, '2019-09-14 07:14:29'),
(803, 93, 'Italy', 'Treviso ', 'TSF', 1, '2019-09-14 07:14:29'),
(804, 93, 'Italy', 'Trieste ', 'TRS', 1, '2019-09-14 07:14:29'),
(805, 93, 'Italy', 'Turin ', 'TRN', 1, '2019-09-14 07:14:29'),
(806, 93, 'Italy', 'Venice - Marco Polo ', 'VCE', 1, '2019-09-14 07:14:29'),
(807, 93, 'Italy', 'Verona ', 'VRN', 1, '2019-09-14 07:14:29'),
(808, 93, 'Italy', 'Verona (Brescia) Montichiari ', 'VBS', 1, '2019-09-14 07:14:29'),
(809, 94, 'Jamaica', 'Kingston - Norman Manley ', 'KIN', 1, '2019-09-14 07:14:29'),
(810, 94, 'Jamaica', 'Montego Bay - Sangster Int\'l ', 'MBJ', 1, '2019-09-14 07:14:29'),
(811, 95, 'Japan', 'Akita ', 'AXT', 1, '2019-09-14 07:14:29'),
(812, 95, 'Japan', 'Amami ', 'ASJ', 1, '2019-09-14 07:14:29'),
(813, 95, 'Japan', 'Aomori ', 'AOJ', 1, '2019-09-14 07:14:29'),
(814, 95, 'Japan', 'Chiba City ', 'QCB', 1, '2019-09-14 07:14:29'),
(815, 95, 'Japan', 'Fukuoka ', 'FUK', 1, '2019-09-14 07:14:29'),
(816, 95, 'Japan', 'Fukushima - Fukushima Apt ', 'FKS', 1, '2019-09-14 07:14:29'),
(817, 95, 'Japan', 'Hachijo Jima ', 'HAC', 1, '2019-09-14 07:14:29'),
(818, 95, 'Japan', 'Hakodate ', 'HKD', 1, '2019-09-14 07:14:29'),
(819, 95, 'Japan', 'Hiroshima Int\'l ', 'HIJ', 1, '2019-09-14 07:14:29'),
(820, 95, 'Japan', 'Ishigaki - New Ishigaki Apt ', 'ISG', 1, '2019-09-14 07:14:29'),
(821, 95, 'Japan', 'Kagoshima ', 'KOJ', 1, '2019-09-14 07:14:29'),
(822, 95, 'Japan', 'Kobe ', 'UKB', 1, '2019-09-14 07:14:29'),
(823, 95, 'Japan', 'Kochi ', 'KCZ', 1, '2019-09-14 07:14:29'),
(824, 95, 'Japan', 'Komatsu ', 'KMQ', 1, '2019-09-14 07:14:29'),
(825, 95, 'Japan', 'Kumamoto ', 'KMJ', 1, '2019-09-14 07:14:29'),
(826, 95, 'Japan', 'Kushiro ', 'KUH', 1, '2019-09-14 07:14:29'),
(827, 95, 'Japan', 'Kyoto ', 'UKY', 1, '2019-09-14 07:14:29'),
(828, 95, 'Japan', 'Matsumoto, Nagano ', 'MMJ', 1, '2019-09-14 07:14:29'),
(829, 95, 'Japan', 'Matsuyama ', 'MYJ', 1, '2019-09-14 07:14:29'),
(830, 95, 'Japan', 'Miyako Jima (Ryuku Islands) - Hirara ', 'MMY', 1, '2019-09-14 07:14:29'),
(831, 95, 'Japan', 'Miyazaki ', 'KMI', 1, '2019-09-14 07:14:29'),
(832, 95, 'Japan', 'Morioka, Hanamaki ', 'HNA', 1, '2019-09-14 07:14:29'),
(833, 95, 'Japan', 'Nagasaki ', 'NGS', 1, '2019-09-14 07:14:29'),
(834, 95, 'Japan', 'Nagoya - Komaki AFB ', 'NGO', 1, '2019-09-14 07:14:29'),
(835, 95, 'Japan', 'Niigata ', 'KIJ', 1, '2019-09-14 07:14:29'),
(836, 95, 'Japan', 'Oita ', 'OIT', 1, '2019-09-14 07:14:29'),
(837, 95, 'Japan', 'Okayama ', 'OKJ', 1, '2019-09-14 07:14:29'),
(838, 95, 'Japan', 'Okinawa, Ryukyo Island - Naha ', 'OKA', 1, '2019-09-14 07:14:29'),
(839, 95, 'Japan', 'Osaka - Itami ', 'ITM', 1, '2019-09-14 07:14:29'),
(840, 95, 'Japan', 'Osaka - Kansai Int\'l Apt ', 'KIX', 1, '2019-09-14 07:14:29'),
(841, 95, 'Japan', 'Osaka, Metropolitan Area ', 'OSA', 1, '2019-09-14 07:14:29'),
(842, 95, 'Japan', 'Sado Shima ', 'SDS', 1, '2019-09-14 07:14:29'),
(843, 95, 'Japan', 'Sapporo ', 'SPK', 1, '2019-09-14 07:14:29'),
(844, 95, 'Japan', 'Sapporo - New Chitose Apt ', 'CTS', 1, '2019-09-14 07:14:29'),
(845, 95, 'Japan', 'Sapporo - Okadama ', 'OKD', 1, '2019-09-14 07:14:29'),
(846, 95, 'Japan', 'Sendai ', 'SDJ', 1, '2019-09-14 07:14:29'),
(847, 95, 'Japan', 'Takamatsu ', 'TAK', 1, '2019-09-14 07:14:29'),
(848, 95, 'Japan', 'Tokushima ', 'TKS', 1, '2019-09-14 07:14:29'),
(849, 95, 'Japan', 'Tokyo ', 'TYO', 1, '2019-09-14 07:14:29'),
(850, 95, 'Japan', 'Tokyo - Haneda ', 'HND', 1, '2019-09-14 07:14:29'),
(851, 95, 'Japan', 'Tokyo - Narita ', 'NRT', 1, '2019-09-14 07:14:29'),
(852, 95, 'Japan', 'Toyama ', 'TOY', 1, '2019-09-14 07:14:29'),
(853, 95, 'Japan', 'Ube ', 'UBJ', 1, '2019-09-14 07:14:29'),
(854, 95, 'Japan', 'Yamagata, Junmachi ', 'GAJ', 1, '2019-09-14 07:14:29'),
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
(912, 123, 'Mexico', 'Aguascaliente ', 'AGU', 1, '2019-09-14 07:14:29'),
(913, 123, 'Mexico', 'Cancun ', 'CUN', 1, '2019-09-14 07:14:29'),
(914, 123, 'Mexico', 'Chichen Itza ', 'CZA', 1, '2019-09-14 07:14:29'),
(915, 123, 'Mexico', 'Chihuahua - Gen Fierro Villalobos ', 'CUU', 1, '2019-09-14 07:14:29'),
(916, 123, 'Mexico', 'Ciudad Del Carmen ', 'CME', 1, '2019-09-14 07:14:29'),
(917, 123, 'Mexico', 'Ciudad Juarez ', 'CJS', 1, '2019-09-14 07:14:29'),
(918, 123, 'Mexico', 'Ciudad Obregon ', 'CEN', 1, '2019-09-14 07:14:29'),
(919, 123, 'Mexico', 'Ciudad Victoria ', 'CVM', 1, '2019-09-14 07:14:29'),
(920, 123, 'Mexico', 'Colima ', 'CLQ', 1, '2019-09-14 07:14:29'),
(921, 123, 'Mexico', 'Cozmel ', 'CZM', 1, '2019-09-14 07:14:29'),
(922, 123, 'Mexico', 'Culiacan ', 'CUL', 1, '2019-09-14 07:14:29'),
(923, 123, 'Mexico', 'Guadalajara ', 'GDL', 1, '2019-09-14 07:14:29'),
(924, 123, 'Mexico', 'Hermosillo - Gen. Pesqueira Garcia ', 'HMO', 1, '2019-09-14 07:14:29'),
(925, 123, 'Mexico', 'Huatulco ', 'HUX', 1, '2019-09-14 07:14:29'),
(926, 123, 'Mexico', 'Ixtapa/Zihuatenejo ', 'ZIH', 1, '2019-09-14 07:14:29'),
(927, 123, 'Mexico', 'Jalapa ', 'JAL', 1, '2019-09-14 07:14:30'),
(928, 123, 'Mexico', 'La Paz - Leon ', 'LAP', 1, '2019-09-14 07:14:30'),
(929, 123, 'Mexico', 'Lazaro Cardenas ', 'LZC', 1, '2019-09-14 07:14:30'),
(930, 123, 'Mexico', 'Leon ', 'BJX', 1, '2019-09-14 07:14:30'),
(931, 123, 'Mexico', 'Loreto ', 'LTO', 1, '2019-09-14 07:14:30'),
(932, 123, 'Mexico', 'Los Cabos ', 'SJD', 1, '2019-09-14 07:14:30'),
(933, 123, 'Mexico', 'Los Mochis ', 'LMM', 1, '2019-09-14 07:14:30'),
(934, 123, 'Mexico', 'Manzanillo ', 'ZLO', 1, '2019-09-14 07:14:30'),
(935, 123, 'Mexico', 'Mazatlan ', 'MZT', 1, '2019-09-14 07:14:30'),
(936, 123, 'Mexico', 'Merida ', 'MID', 1, '2019-09-14 07:14:30'),
(937, 123, 'Mexico', 'Mexicali ', 'MXL', 1, '2019-09-14 07:14:30'),
(938, 123, 'Mexico', 'Mexico City - Atizapan ', 'AZP', 1, '2019-09-14 07:14:30'),
(939, 123, 'Mexico', 'Mexico City - Mexico City Int\'l Apt ', 'MEX', 1, '2019-09-14 07:14:30'),
(940, 123, 'Mexico', 'Mexico City - Santa Lucia ', 'NLU', 1, '2019-09-14 07:14:30'),
(941, 123, 'Mexico', 'Minatitlan ', 'MTT', 1, '2019-09-14 07:14:30'),
(942, 123, 'Mexico', 'Monterrey - Aeropuerto Del Norte ', 'NTR', 1, '2019-09-14 07:14:30'),
(943, 123, 'Mexico', 'Monterrey - Gen. Mariano Escobedo ', 'MTY', 1, '2019-09-14 07:14:30'),
(944, 123, 'Mexico', 'Morelia ', 'MLM', 1, '2019-09-14 07:14:30'),
(945, 123, 'Mexico', 'Nuevo Laredo ', 'NLD', 1, '2019-09-14 07:14:30'),
(946, 123, 'Mexico', 'Oaxaca - Xoxocotlan ', 'OAX', 1, '2019-09-14 07:14:30'),
(947, 123, 'Mexico', 'Puebla ', 'PBC', 1, '2019-09-14 07:14:30'),
(948, 123, 'Mexico', 'Puerto Escondido ', 'PXM', 1, '2019-09-14 07:14:30'),
(949, 123, 'Mexico', 'Puerto Vallarta ', 'PVR', 1, '2019-09-14 07:14:30'),
(950, 123, 'Mexico', 'San Luis Potosi ', 'SLP', 1, '2019-09-14 07:14:30'),
(951, 123, 'Mexico', 'Santa Rosalia ', 'SRL', 1, '2019-09-14 07:14:30'),
(952, 123, 'Mexico', 'Tampico - Gen. F. Javier Mina ', 'TAM', 1, '2019-09-14 07:14:30'),
(953, 123, 'Mexico', 'Tijuana - Rodriguez ', 'TIJ', 1, '2019-09-14 07:14:30'),
(954, 123, 'Mexico', 'Tuxtla Gutierrez ', 'TGZ', 1, '2019-09-14 07:14:30'),
(955, 123, 'Mexico', 'Uruapan ', 'UPN', 1, '2019-09-14 07:14:30'),
(956, 123, 'Mexico', 'Veracruz ', 'VER', 1, '2019-09-14 07:14:30'),
(957, 123, 'Mexico', 'Villahermosa ', 'VSA', 1, '2019-09-14 07:14:30'),
(958, 123, 'Mexico', 'Zacatecas ', 'ZCL', 1, '2019-09-14 07:14:30'),
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
(1032, 137, 'Niger', 'Maradi ', 'MFQ', 1, '2019-09-14 07:14:30'),
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
(1208, 167, 'South Africa', 'Ellisras ', 'ELL', 1, '2019-09-14 07:14:30'),
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
(1348, 183, 'Thailand', 'Utapao (Pattaya) ', 'UTP', 1, '2019-09-14 07:14:31');
INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
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
(1406, 194, 'United Kingdom', 'Alderney ', 'ACI', 1, '2019-09-14 07:14:31'),
(1407, 194, 'United Kingdom', 'Barra (the famous tidal beach landing) ', 'BRR', 1, '2019-09-14 07:14:31'),
(1408, 194, 'United Kingdom', 'Belfast - Belfast Int\'l Apt ', 'BFS', 1, '2019-09-14 07:14:31'),
(1409, 194, 'United Kingdom', 'Belfast - George Best Belfast City Apt ', 'BHD', 1, '2019-09-14 07:14:31'),
(1410, 194, 'United Kingdom', 'Benbecula ', 'BEB', 1, '2019-09-14 07:14:31'),
(1411, 194, 'United Kingdom', 'Birmingham - Birmingham Int\'l Apt ', 'BHX', 1, '2019-09-14 07:14:31'),
(1412, 194, 'United Kingdom', 'Blackpool ', 'BLK', 1, '2019-09-14 07:14:31'),
(1413, 194, 'United Kingdom', 'Bournemouth ', 'BOH', 1, '2019-09-14 07:14:31'),
(1414, 194, 'United Kingdom', 'Bristol ', 'BRS', 1, '2019-09-14 07:14:31'),
(1415, 194, 'United Kingdom', 'Cambrigde ', 'CBG', 1, '2019-09-14 07:14:31'),
(1416, 194, 'United Kingdom', 'Campbeltown ', 'CAL', 1, '2019-09-14 07:14:31'),
(1417, 194, 'United Kingdom', 'Cardiff - Cardiff Apt ', 'CWL', 1, '2019-09-14 07:14:31'),
(1418, 194, 'United Kingdom', 'Coventry - Baginton ', 'CVT', 1, '2019-09-14 07:14:31'),
(1419, 194, 'United Kingdom', 'Derry (Londonderry) ', 'LDY', 1, '2019-09-14 07:14:31'),
(1420, 194, 'United Kingdom', 'Doncaster/Sheffield, Robin Hood Int\'l Apt ', 'DSA', 1, '2019-09-14 07:14:31'),
(1421, 194, 'United Kingdom', 'Dundee ', 'DND', 1, '2019-09-14 07:14:31'),
(1422, 194, 'United Kingdom', 'Edinburgh - Edinburgh Apt ', 'EDI', 1, '2019-09-14 07:14:31'),
(1423, 194, 'United Kingdom', 'Exeter ', 'EXT', 1, '2019-09-14 07:14:31'),
(1424, 194, 'United Kingdom', 'Fair Isle (Shetland) ', 'FIE', 1, '2019-09-14 07:14:31'),
(1425, 194, 'United Kingdom', 'Foula (Shetland) ', 'FOU', 1, '2019-09-14 07:14:31'),
(1426, 194, 'United Kingdom', 'Glasgow ', 'GLA', 1, '2019-09-14 07:14:31'),
(1427, 194, 'United Kingdom', 'Glasgow, Prestwick ', 'PIK', 1, '2019-09-14 07:14:31'),
(1428, 194, 'United Kingdom', 'Guernsey ', 'GCI', 1, '2019-09-14 07:14:31'),
(1429, 194, 'United Kingdom', 'Humberside ', 'HUY', 1, '2019-09-14 07:14:31'),
(1430, 194, 'United Kingdom', 'Inverness ', 'INV', 1, '2019-09-14 07:14:31'),
(1431, 194, 'United Kingdom', 'Islay ', 'ILY', 1, '2019-09-14 07:14:31'),
(1432, 194, 'United Kingdom', 'Isle of Man ', 'IOM', 1, '2019-09-14 07:14:31'),
(1433, 194, 'United Kingdom', 'Jersey ', 'JER', 1, '2019-09-14 07:14:31'),
(1434, 194, 'United Kingdom', 'Kent (Manston) Kent Int\'l ', 'MSE', 1, '2019-09-14 07:14:31'),
(1435, 194, 'United Kingdom', 'Kirkwall (Orkney) ', 'KOI', 1, '2019-09-14 07:14:31'),
(1436, 194, 'United Kingdom', 'Land\'s End ', 'LEQ', 1, '2019-09-14 07:14:31'),
(1437, 194, 'United Kingdom', 'Leeds/Bradford ', 'LBA', 1, '2019-09-14 07:14:31'),
(1438, 194, 'United Kingdom', 'Lerwick/Tingwall (Shetland Islands) ', 'LWK', 1, '2019-09-14 07:14:31'),
(1439, 194, 'United Kingdom', 'Liverpool ', 'LPL', 1, '2019-09-14 07:14:31'),
(1440, 194, 'United Kingdom', 'London - City Apt ', 'LCY', 1, '2019-09-14 07:14:31'),
(1441, 194, 'United Kingdom', 'London - Gatwick ', 'LGW', 1, '2019-09-14 07:14:31'),
(1442, 194, 'United Kingdom', 'London - Heathrow ', 'LHR', 1, '2019-09-14 07:14:31'),
(1443, 194, 'United Kingdom', 'London - Luton ', 'LTN', 1, '2019-09-14 07:14:31'),
(1444, 194, 'United Kingdom', 'London - Stansted ', 'STN', 1, '2019-09-14 07:14:31'),
(1445, 194, 'United Kingdom', 'London Metropolitan Area ', 'LON', 1, '2019-09-14 07:14:31'),
(1446, 194, 'United Kingdom', 'Lydd - Lydd Int\'l Apt ', 'LYX', 1, '2019-09-14 07:14:31'),
(1447, 194, 'United Kingdom', 'Manchester ', 'MAN', 1, '2019-09-14 07:14:31'),
(1448, 194, 'United Kingdom', 'Newcastle ', 'NCL', 1, '2019-09-14 07:14:31'),
(1449, 194, 'United Kingdom', 'Newquay ', 'NQY', 1, '2019-09-14 07:14:31'),
(1450, 194, 'United Kingdom', 'Norwich ', 'NWI', 1, '2019-09-14 07:14:31'),
(1451, 194, 'United Kingdom', 'Nottingham - East Midlands ', 'EMA', 1, '2019-09-14 07:14:31'),
(1452, 194, 'United Kingdom', 'Out Skerries (Shetland) ', 'OUK', 1, '2019-09-14 07:14:31'),
(1453, 194, 'United Kingdom', 'Sheffield, City Apt ', 'SZD', 1, '2019-09-14 07:14:31'),
(1454, 194, 'United Kingdom', 'Southampton - Eastleigh ', 'SOU', 1, '2019-09-14 07:14:31'),
(1455, 194, 'United Kingdom', 'Southend (London) ', 'SEN', 1, '2019-09-14 07:14:31'),
(1456, 194, 'United Kingdom', 'Stornway ', 'SYY', 1, '2019-09-14 07:14:31'),
(1457, 194, 'United Kingdom', 'Sumburgh (Shetland) ', 'LSI', 1, '2019-09-14 07:14:31'),
(1458, 194, 'United Kingdom', 'Teesside, Durham Tees Valley ', 'MME', 1, '2019-09-14 07:14:31'),
(1459, 194, 'United Kingdom', 'Unst (Shetland Island) - Baltasound Apt ', 'UNT', 1, '2019-09-14 07:14:31'),
(1460, 194, 'United Kingdom', 'Wick ', 'WIC', 1, '2019-09-14 07:14:31'),
(1461, 195, 'Uruguay', 'Montevideo - Carrasco Int\'l Apt ', 'MVD', 1, '2019-09-14 07:14:31'),
(1462, 196, 'USA_Alabama', 'Anniston (AL) ', 'ANB', 1, '2019-09-14 07:14:31'),
(1463, 196, 'USA_Alabama', 'Birmingham (AL) ', 'BHM', 1, '2019-09-14 07:14:31'),
(1464, 196, 'USA_Alabama', 'Dothan (AL) ', 'DHN', 1, '2019-09-14 07:14:31'),
(1465, 196, 'USA_Alabama', 'Gadsden (AL) ', 'GAD', 1, '2019-09-14 07:14:31'),
(1466, 196, 'USA_Alabama', 'Huntsville (AL) ', 'HSV', 1, '2019-09-14 07:14:31'),
(1467, 196, 'USA_Alabama', 'Mobile (AL) - Pascagoula (MS) ', 'MOB', 1, '2019-09-14 07:14:31'),
(1468, 196, 'USA_Alabama', 'Montgomery (AL) - Montgomery Regnl Apt ', 'MGM', 1, '2019-09-14 07:14:31'),
(1469, 196, 'USA_Alabama', 'Muscle Shoals (AL) ', 'MSL', 1, '2019-09-14 07:14:31'),
(1470, 196, 'USA_Alabama', 'Tuscaloosa (AL) ', 'TCL', 1, '2019-09-14 07:14:31'),
(1471, 197, 'USA_Alaska', 'Anchorage (AK) - Ted Stevens Anchorage Int\'l ', 'ANC', 1, '2019-09-14 07:14:31'),
(1472, 197, 'USA_Alaska', 'Bethel (AK) ', 'BET', 1, '2019-09-14 07:14:31'),
(1473, 197, 'USA_Alaska', 'Coffmann Cove (AK) ', 'KCC', 1, '2019-09-14 07:14:31'),
(1474, 197, 'USA_Alaska', 'Cordova (AK) ', 'CDV', 1, '2019-09-14 07:14:31'),
(1475, 197, 'USA_Alaska', 'Craig (AK) ', 'CGA', 1, '2019-09-14 07:14:31'),
(1476, 197, 'USA_Alaska', 'Dillingham (AK) ', 'DLG', 1, '2019-09-14 07:14:31'),
(1477, 197, 'USA_Alaska', 'Dutch Harbor (AK) ', 'DUT', 1, '2019-09-14 07:14:31'),
(1478, 197, 'USA_Alaska', 'Fairbanks (AK) ', 'FAI', 1, '2019-09-14 07:14:31'),
(1479, 197, 'USA_Alaska', 'Haines (AK) ', 'HNS', 1, '2019-09-14 07:14:31'),
(1480, 197, 'USA_Alaska', 'Homer (AK) ', 'HOM', 1, '2019-09-14 07:14:31'),
(1481, 197, 'USA_Alaska', 'Hoonah (AK) ', 'HNH', 1, '2019-09-14 07:14:31'),
(1482, 197, 'USA_Alaska', 'Hydaburg (AK) ', 'HYG', 1, '2019-09-14 07:14:31'),
(1483, 197, 'USA_Alaska', 'Iliamna (AK) ', 'ILI', 1, '2019-09-14 07:14:31'),
(1484, 197, 'USA_Alaska', 'Juneau (AK) - Juneau Int\'l Apt ', 'JNU', 1, '2019-09-14 07:14:31'),
(1485, 197, 'USA_Alaska', 'Kenai (AK) ', 'ENA', 1, '2019-09-14 07:14:31'),
(1486, 197, 'USA_Alaska', 'Ketchikan (AK) ', 'KTN', 1, '2019-09-14 07:14:31'),
(1487, 197, 'USA_Alaska', 'King Salomon (AK) ', 'AKN', 1, '2019-09-14 07:14:31'),
(1488, 197, 'USA_Alaska', 'Klawock (AK) ', 'KLW', 1, '2019-09-14 07:14:31'),
(1489, 197, 'USA_Alaska', 'Kodiak (AK) ', 'ADQ', 1, '2019-09-14 07:14:31'),
(1490, 197, 'USA_Alaska', 'Kotzbue (AK) ', 'OTZ', 1, '2019-09-14 07:14:31'),
(1491, 197, 'USA_Alaska', 'Labouchere Bay (AK) ', 'WLB', 1, '2019-09-14 07:14:31'),
(1492, 197, 'USA_Alaska', 'Long Island (AK) ', 'LIJ', 1, '2019-09-14 07:14:31'),
(1493, 197, 'USA_Alaska', 'Metlakatla (AK) ', 'MTM', 1, '2019-09-14 07:14:31'),
(1494, 197, 'USA_Alaska', 'Mt. McKinley (AK) ', 'MCL', 1, '2019-09-14 07:14:31'),
(1495, 197, 'USA_Alaska', 'Nome (AK) ', 'OME', 1, '2019-09-14 07:14:31'),
(1496, 197, 'USA_Alaska', 'Petersburg (AK) ', 'PSG', 1, '2019-09-14 07:14:31'),
(1497, 197, 'USA_Alaska', 'Prudhoe Bay (AK) ', 'SCC', 1, '2019-09-14 07:14:31'),
(1498, 197, 'USA_Alaska', 'Sitka (AK) ', 'SIT', 1, '2019-09-14 07:14:31'),
(1499, 197, 'USA_Alaska', 'Skagway (AK) ', 'SGY', 1, '2019-09-14 07:14:31'),
(1500, 197, 'USA_Alaska', 'Talkeetna (AK) ', 'TKA', 1, '2019-09-14 07:14:31'),
(1501, 197, 'USA_Alaska', 'Thorne Bay (AK) ', 'KTB', 1, '2019-09-14 07:14:31'),
(1502, 197, 'USA_Alaska', 'Unalakleet (AK) ', 'UNK', 1, '2019-09-14 07:14:31'),
(1503, 197, 'USA_Alaska', 'Valdez (AK) ', 'VDZ', 1, '2019-09-14 07:14:31'),
(1504, 197, 'USA_Alaska', 'Wrangell (AK) ', 'WRG', 1, '2019-09-14 07:14:31'),
(1505, 197, 'USA_Alaska', 'Yakutat (AK) ', 'YAK', 1, '2019-09-14 07:14:31'),
(1506, 198, 'USA_Arizona', 'Flagstaff (AZ) ', 'FLG', 1, '2019-09-14 07:14:31'),
(1507, 198, 'USA_Arizona', 'Fort Huachuca/Sierra Vista (AZ) ', 'FHU', 1, '2019-09-14 07:14:31'),
(1508, 198, 'USA_Arizona', 'Grand Canyon (AZ) ', 'GCN', 1, '2019-09-14 07:14:31'),
(1509, 198, 'USA_Arizona', 'Lake Havasu City (AZ) ', 'HII', 1, '2019-09-14 07:14:31'),
(1510, 198, 'USA_Arizona', 'Page/Lake Powell (AZ) ', 'PGA', 1, '2019-09-14 07:14:31'),
(1511, 198, 'USA_Arizona', 'Phoenix (AZ) - Sky Harbor Int\'l ', 'PHX', 1, '2019-09-14 07:14:31'),
(1512, 198, 'USA_Arizona', 'Scottsdale (AZ) ', 'SCF', 1, '2019-09-14 07:14:31'),
(1513, 198, 'USA_Arizona', 'Tucson (AZ) ', 'TUS', 1, '2019-09-14 07:14:31'),
(1514, 198, 'USA_Arizona', 'Yuma (AZ) ', 'YUM', 1, '2019-09-14 07:14:31'),
(1515, 199, 'USA_Arkansas', 'Fayetteville (AR) ', 'FYV', 1, '2019-09-14 07:14:31'),
(1516, 199, 'USA_Arkansas', 'Fort Smith (AR) ', 'FSM', 1, '2019-09-14 07:14:31'),
(1517, 199, 'USA_Arkansas', 'Jacksonville (AR)  Little Rock AFB    ', 'LRF', 1, '2019-09-14 07:14:31'),
(1518, 199, 'USA_Arkansas', 'Jonesboro (AR)  Jonesboro Apt ', 'JBR', 1, '2019-09-14 07:14:31'),
(1519, 199, 'USA_Arkansas', 'Little Rock (AR) ', 'LIT', 1, '2019-09-14 07:14:31'),
(1520, 199, 'USA_Arkansas', 'Texarkana (AR) ', 'TXK', 1, '2019-09-14 07:14:31'),
(1521, 200, 'USA_California', 'Bakersfield (CA) ', 'BFL', 1, '2019-09-14 07:14:31'),
(1522, 200, 'USA_California', 'Borrego Springs (CA) ', 'BXS', 1, '2019-09-14 07:14:31'),
(1523, 200, 'USA_California', 'Burbank (CA) ', 'BUR', 1, '2019-09-14 07:14:31'),
(1524, 200, 'USA_California', 'Carlsbad (CA) ', 'CLD', 1, '2019-09-14 07:14:31'),
(1525, 200, 'USA_California', 'Chico (CA) ', 'CIC', 1, '2019-09-14 07:14:31'),
(1526, 200, 'USA_California', 'Concord (CA) - Buchanan Field ', 'CCR', 1, '2019-09-14 07:14:31'),
(1527, 200, 'USA_California', 'Crescent City (CA) ', 'CEC', 1, '2019-09-14 07:14:31'),
(1528, 200, 'USA_California', 'Eureka (CA) ', 'ACV', 1, '2019-09-14 07:14:31'),
(1529, 200, 'USA_California', 'Fresno (CA) ', 'FAT', 1, '2019-09-14 07:14:31'),
(1530, 200, 'USA_California', 'Imperial (CA) ', 'IPL', 1, '2019-09-14 07:14:31'),
(1531, 200, 'USA_California', 'Inykern (CA) ', 'IYK', 1, '2019-09-14 07:14:31'),
(1532, 200, 'USA_California', 'Lake Tahoe (CA) ', 'TVL', 1, '2019-09-14 07:14:31'),
(1533, 200, 'USA_California', 'Long Beach (CA) ', 'LGB', 1, '2019-09-14 07:14:31'),
(1534, 200, 'USA_California', 'Los Angeles (CA) - Int\'l ', 'LAX', 1, '2019-09-14 07:14:31'),
(1535, 200, 'USA_California', 'Merced (CA) ', 'MCE', 1, '2019-09-14 07:14:31'),
(1536, 200, 'USA_California', 'Modesto (CA) ', 'MOD', 1, '2019-09-14 07:14:31'),
(1537, 200, 'USA_California', 'Monterey (CA) ', 'MRY', 1, '2019-09-14 07:14:31'),
(1538, 200, 'USA_California', 'Oakland (CA) ', 'OAK', 1, '2019-09-14 07:14:31'),
(1539, 200, 'USA_California', 'Ontario (CA) ', 'ONT', 1, '2019-09-14 07:14:31'),
(1540, 200, 'USA_California', 'Orange County (Santa Ana) (CA) ', 'SNA', 1, '2019-09-14 07:14:31'),
(1541, 200, 'USA_California', 'Oxnard (CA) ', 'OXR', 1, '2019-09-14 07:14:31'),
(1542, 200, 'USA_California', 'Palm Springs (CA) ', 'PSP', 1, '2019-09-14 07:14:31'),
(1543, 200, 'USA_California', 'Palmdale/Lancaster (CA) ', 'PMD', 1, '2019-09-14 07:14:31'),
(1544, 200, 'USA_California', 'Redding (CA) ', 'RDD', 1, '2019-09-14 07:14:31'),
(1545, 200, 'USA_California', 'Sacramento (CA) ', 'SMF', 1, '2019-09-14 07:14:31'),
(1546, 200, 'USA_California', 'Salinas (CA) ', 'SNS', 1, '2019-09-14 07:14:31'),
(1547, 200, 'USA_California', 'San Diego - Lindberg Field Int\'l (CA) ', 'SAN', 1, '2019-09-14 07:14:31'),
(1548, 200, 'USA_California', 'San Francisco - Int\'l Apt, SA ', 'SFO', 1, '2019-09-14 07:14:31'),
(1549, 200, 'USA_California', 'San Jose (CA) ', 'SJC', 1, '2019-09-14 07:14:31'),
(1550, 200, 'USA_California', 'San Luis Obisco (CA) ', 'SBP', 1, '2019-09-14 07:14:31'),
(1551, 200, 'USA_California', 'Santa Barbara (CA) ', 'SBA', 1, '2019-09-14 07:14:31'),
(1552, 200, 'USA_California', 'Santa Maria (CA) ', 'SMX', 1, '2019-09-14 07:14:31'),
(1553, 200, 'USA_California', 'Santa Rosa (CA) ', 'STS', 1, '2019-09-14 07:14:31'),
(1554, 200, 'USA_California', 'Stockton (CA) ', 'SCK', 1, '2019-09-14 07:14:31'),
(1555, 200, 'USA_California', 'Ukiah (CA) ', 'UKI', 1, '2019-09-14 07:14:31'),
(1556, 200, 'USA_California', 'Visalia (CA) ', 'VIS', 1, '2019-09-14 07:14:31'),
(1557, 201, 'USA_Colorado', 'Aspen, (CO) - Aspen-Pitkin County Apt ', 'ASE', 1, '2019-09-14 07:14:31'),
(1558, 201, 'USA_Colorado', 'Colorado Springs (CO) ', 'COS', 1, '2019-09-14 07:14:31'),
(1559, 201, 'USA_Colorado', 'Denver (CO) - Denver Int\'l Apt ', 'DEN', 1, '2019-09-14 07:14:31'),
(1560, 201, 'USA_Colorado', 'Durango (CO) ', 'DRO', 1, '2019-09-14 07:14:31'),
(1561, 201, 'USA_Colorado', 'Grand Junction (CO) ', 'GJT', 1, '2019-09-14 07:14:31'),
(1562, 201, 'USA_Colorado', 'Gunnison/Crested Butte (CO) ', 'GUC', 1, '2019-09-14 07:14:31'),
(1563, 201, 'USA_Colorado', 'Montrose/Tellruide (CO) ', 'MTJ', 1, '2019-09-14 07:14:31'),
(1564, 201, 'USA_Colorado', 'Pueblo (CO) ', 'PUB', 1, '2019-09-14 07:14:31'),
(1565, 201, 'USA_Colorado', 'Steamboat Springs (CO) ', 'HDN', 1, '2019-09-14 07:14:31'),
(1566, 201, 'USA_Colorado', 'Telluride (CO) ', 'TEX', 1, '2019-09-14 07:14:31'),
(1567, 201, 'USA_Colorado', 'Vail (CO) ', 'EGE', 1, '2019-09-14 07:14:31'),
(1568, 202, 'USA_Connecticut', 'Bridgeport (CT) ', 'BDR', 1, '2019-09-14 07:14:31'),
(1569, 202, 'USA_Connecticut', 'Groton/New London (CT) ', 'GON', 1, '2019-09-14 07:14:31'),
(1570, 202, 'USA_Connecticut', 'Hartford (CT) /Springfield (MA) ', 'BDL', 1, '2019-09-14 07:14:31'),
(1571, 202, 'USA_Connecticut', 'New Haven (CT) ', 'HVN', 1, '2019-09-14 07:14:31'),
(1572, 203, 'USA_Delaware', 'Not Applicable', 'UDL', 1, '2019-09-14 07:14:31'),
(1573, 204, 'USA_Florida', 'Daytona Beach (FL) ', 'DAB', 1, '2019-09-14 07:14:31'),
(1574, 204, 'USA_Florida', 'Fort Lauderdale/Hollywood (FL) ', 'FLL', 1, '2019-09-14 07:14:31'),
(1575, 204, 'USA_Florida', 'Fort Myers, Metropolitan Area (FL) ', 'FMY', 1, '2019-09-14 07:14:31'),
(1576, 204, 'USA_Florida', 'Fort Myers, Southwest Florida Reg (FL) ', 'RSW', 1, '2019-09-14 07:14:31'),
(1577, 204, 'USA_Florida', 'Fort Walton Beach (FL) ', 'VPS', 1, '2019-09-14 07:14:31'),
(1578, 204, 'USA_Florida', 'Gainesville (FL) ', 'GNV', 1, '2019-09-14 07:14:31'),
(1579, 204, 'USA_Florida', 'Jacksonville (FL) - Cecil Field NAS    ', 'NZC', 1, '2019-09-14 07:14:31'),
(1580, 204, 'USA_Florida', 'Jacksonville (FL) - Craig Municipal    ', 'CRG', 1, '2019-09-14 07:14:31'),
(1581, 204, 'USA_Florida', 'Jacksonville (FL) - Int\'l ', 'JAX', 1, '2019-09-14 07:14:31'),
(1582, 204, 'USA_Florida', 'Jacksonville (FL) Jacksonville NAS    ', 'NIP', 1, '2019-09-14 07:14:31'),
(1583, 204, 'USA_Florida', 'Key West (FL) ', 'EYW', 1, '2019-09-14 07:14:31'),
(1584, 204, 'USA_Florida', 'Marathon (FL) ', 'MTH', 1, '2019-09-14 07:14:31'),
(1585, 204, 'USA_Florida', 'Melbourne (FL) ', 'MLB', 1, '2019-09-14 07:14:31'),
(1586, 204, 'USA_Florida', 'Miami (FL) ', 'MIA', 1, '2019-09-14 07:14:31'),
(1587, 204, 'USA_Florida', 'Naples (FL) ', 'APF', 1, '2019-09-14 07:14:31'),
(1588, 204, 'USA_Florida', 'Orlando - Int\'l Apt (FL) ', 'MCO', 1, '2019-09-14 07:14:31'),
(1589, 204, 'USA_Florida', 'Orlando Metropolitan Area (FL) ', 'ORL', 1, '2019-09-14 07:14:31'),
(1590, 204, 'USA_Florida', 'Panama City (FL) ', 'PFN', 1, '2019-09-14 07:14:31'),
(1591, 204, 'USA_Florida', 'Pensacola (FL) ', 'PNS', 1, '2019-09-14 07:14:31'),
(1592, 204, 'USA_Florida', 'Sarasota/Bradenton (FL) ', 'SRQ', 1, '2019-09-14 07:14:31'),
(1593, 204, 'USA_Florida', 'Tallahassee (FL) ', 'TLH', 1, '2019-09-14 07:14:31'),
(1594, 204, 'USA_Florida', 'Tampa - Int\'l (FL) ', 'TPA', 1, '2019-09-14 07:14:31'),
(1595, 204, 'USA_Florida', 'Vero Beach/Ft. Pierce (FL) ', 'VRB', 1, '2019-09-14 07:14:31'),
(1596, 204, 'USA_Florida', 'West Palm Beach (FL) ', 'PBI', 1, '2019-09-14 07:14:31'),
(1597, 205, 'USA_Georgia', 'Albany (GA) ', 'ABY', 1, '2019-09-14 07:14:31'),
(1598, 205, 'USA_Georgia', 'Athens (GA) ', 'AHN', 1, '2019-09-14 07:14:31'),
(1599, 205, 'USA_Georgia', 'Atlanta (GA) - Hartsfield Atlanta Int\'l Apt ', 'ATL', 1, '2019-09-14 07:14:31'),
(1600, 205, 'USA_Georgia', 'Augusta (GA) ', 'AGS', 1, '2019-09-14 07:14:31'),
(1601, 205, 'USA_Georgia', 'Brunswick (GA) ', 'BQK', 1, '2019-09-14 07:14:31'),
(1602, 205, 'USA_Georgia', 'Columbus (GA) ', 'CSG', 1, '2019-09-14 07:14:31'),
(1603, 205, 'USA_Georgia', 'Macon (GA) ', 'MCN', 1, '2019-09-14 07:14:31'),
(1604, 205, 'USA_Georgia', 'Savannah (GA) ', 'SAV', 1, '2019-09-14 07:14:31'),
(1605, 205, 'USA_Georgia', 'Valdosta (GA) ', 'VLD', 1, '2019-09-14 07:14:31'),
(1606, 206, 'USA_Hawaii', 'Hilo (HI) ', 'ITO', 1, '2019-09-14 07:14:31'),
(1607, 206, 'USA_Hawaii', 'Honolulu (HI) - Honolulu Int\'l Apt ', 'HNL', 1, '2019-09-14 07:14:31'),
(1608, 206, 'USA_Hawaii', 'Kahului (HI) ', 'OGG', 1, '2019-09-14 07:14:31'),
(1609, 206, 'USA_Hawaii', 'Kamuela (HI) ', 'MUE', 1, '2019-09-14 07:14:31'),
(1610, 206, 'USA_Hawaii', 'Kapalua West (HI) ', 'JHM', 1, '2019-09-14 07:14:31'),
(1611, 206, 'USA_Hawaii', 'Kaunakakai (HI) ', 'MKK', 1, '2019-09-14 07:14:31'),
(1612, 206, 'USA_Hawaii', 'Kona (HI) ', 'KOA', 1, '2019-09-14 07:14:31'),
(1613, 206, 'USA_Hawaii', 'Lanai City (HI) ', 'LNY', 1, '2019-09-14 07:14:31'),
(1614, 206, 'USA_Hawaii', 'Lihue (HI) ', 'LIH', 1, '2019-09-14 07:14:31'),
(1615, 206, 'USA_Hawaii', 'Upolu Point (HI) ', 'UPP', 1, '2019-09-14 07:14:31'),
(1616, 207, 'USA_Idaho', 'Boise (ID) - Boise Air Terminal ', 'BOI', 1, '2019-09-14 07:14:31'),
(1617, 207, 'USA_Idaho', 'Idaho Falls (ID) ', 'IDA', 1, '2019-09-14 07:14:31'),
(1618, 207, 'USA_Idaho', 'Lewiston (ID) ', 'LWS', 1, '2019-09-14 07:14:31'),
(1619, 207, 'USA_Idaho', 'Pocatello (ID) ', 'PIH', 1, '2019-09-14 07:14:31'),
(1620, 207, 'USA_Idaho', 'Sun Valley (ID) ', 'SUN', 1, '2019-09-14 07:14:31'),
(1621, 207, 'USA_Idaho', 'Twin Falls (ID) ', 'TWF', 1, '2019-09-14 07:14:31'),
(1622, 208, 'USA_Illinois', 'Bloomington (IL) ', 'BMI', 1, '2019-09-14 07:14:31'),
(1623, 208, 'USA_Illinois', 'Champaign (IL) ', 'CMI', 1, '2019-09-14 07:14:31'),
(1624, 208, 'USA_Illinois', 'Chicago (IL) ', 'CHI', 1, '2019-09-14 07:14:31'),
(1625, 208, 'USA_Illinois', 'Chicago (IL), Midway ', 'MDW', 1, '2019-09-14 07:14:31'),
(1626, 208, 'USA_Illinois', 'Chicago (IL), O\'Hare Int\'l Apt ', 'ORD', 1, '2019-09-14 07:14:31'),
(1627, 208, 'USA_Illinois', 'Decatur (IL) ', 'DEC', 1, '2019-09-14 07:14:31'),
(1628, 208, 'USA_Illinois', 'Jacksonville (IL) - Municipal Apt ', 'IJX', 1, '2019-09-14 07:14:31'),
(1629, 208, 'USA_Illinois', 'Mattoon (IL) ', 'MTO', 1, '2019-09-14 07:14:31'),
(1630, 208, 'USA_Illinois', 'Moline/Quad Cities (IL) ', 'MLI', 1, '2019-09-14 07:14:31'),
(1631, 208, 'USA_Illinois', 'Peoria/Bloomington (IL) ', 'PIA', 1, '2019-09-14 07:14:31'),
(1632, 208, 'USA_Illinois', 'Quincy (IL) ', 'UIN', 1, '2019-09-14 07:14:31'),
(1633, 208, 'USA_Illinois', 'Rockford (IL) ', 'RFD', 1, '2019-09-14 07:14:31'),
(1634, 208, 'USA_Illinois', 'Springfield (IL) ', 'SPI', 1, '2019-09-14 07:14:31'),
(1635, 209, 'USA_Indiana', 'Bloomington (IN) ', 'BMG', 1, '2019-09-14 07:14:31'),
(1636, 209, 'USA_Indiana', 'Elkhart (IN) ', 'EKI', 1, '2019-09-14 07:14:31'),
(1637, 209, 'USA_Indiana', 'Evansville (IN) ', 'EVV', 1, '2019-09-14 07:14:31'),
(1638, 209, 'USA_Indiana', 'Fort Wayne (IN) ', 'FWA', 1, '2019-09-14 07:14:31'),
(1639, 209, 'USA_Indiana', 'Indianapolis (IN) Int\'l ', 'IND', 1, '2019-09-14 07:14:31'),
(1640, 209, 'USA_Indiana', 'Lafayette (IN) ', 'LAF', 1, '2019-09-14 07:14:31'),
(1641, 209, 'USA_Indiana', 'South Bend (IN) ', 'SBN', 1, '2019-09-14 07:14:31'),
(1642, 209, 'USA_Indiana', 'Terre Haute (IN) ', 'HUF', 1, '2019-09-14 07:14:31'),
(1643, 210, 'USA_Iowa', 'Burlington IA ', 'BRL', 1, '2019-09-14 07:14:31'),
(1644, 210, 'USA_Iowa', 'Cedar Rapids IA ', 'CID', 1, '2019-09-14 07:14:31'),
(1645, 210, 'USA_Iowa', 'Des Moines (IA) - Des Moines Int\'l Apt ', 'DSM', 1, '2019-09-14 07:14:31'),
(1646, 210, 'USA_Iowa', 'Dubuque IA ', 'DBQ', 1, '2019-09-14 07:14:31'),
(1647, 210, 'USA_Iowa', 'Fort Dodge IA ', 'FOD', 1, '2019-09-14 07:14:31'),
(1648, 210, 'USA_Iowa', 'Mason City IA ', 'MCW', 1, '2019-09-14 07:14:31'),
(1649, 210, 'USA_Iowa', 'Sioux City IA ', 'SUX', 1, '2019-09-14 07:14:31'),
(1650, 210, 'USA_Iowa', 'Waterloo IA ', 'ALO', 1, '2019-09-14 07:14:31'),
(1651, 211, 'USA_Kansas', 'Fort Riley (KS) - Marshall AAF ', 'FRI', 1, '2019-09-14 07:14:31'),
(1652, 211, 'USA_Kansas', 'Lyons (KS) - Rice County Municipal ', 'LYO', 1, '2019-09-14 07:14:31'),
(1653, 211, 'USA_Kansas', 'Wichita (KS) ', 'ICT', 1, '2019-09-14 07:14:31'),
(1654, 212, 'USA_Kentucky', 'Lexington (KY) ', 'LEX', 1, '2019-09-14 07:14:31'),
(1655, 212, 'USA_Kentucky', 'Louisville (KY) ', 'SDF', 1, '2019-09-14 07:14:31'),
(1656, 212, 'USA_Kentucky', 'Owensboro (KY) ', 'OWB', 1, '2019-09-14 07:14:31'),
(1657, 212, 'USA_Kentucky', 'Paducah (KY) ', 'PAH', 1, '2019-09-14 07:14:31'),
(1658, 213, 'USA_Louisiana', 'Alexandria - Esler Field ', 'ESF', 1, '2019-09-14 07:14:31'),
(1659, 213, 'USA_Louisiana', 'Baton Rouge Metropolitan Apt ', 'BTR', 1, '2019-09-14 07:14:31'),
(1660, 213, 'USA_Louisiana', 'Lafayette, La ', 'LFT', 1, '2019-09-14 07:14:31'),
(1661, 213, 'USA_Louisiana', 'Lake Charles (LA) ', 'LCH', 1, '2019-09-14 07:14:31'),
(1662, 213, 'USA_Louisiana', 'Monroe (LA) ', 'MLU', 1, '2019-09-14 07:14:32'),
(1663, 213, 'USA_Louisiana', 'New Orleans, La ', 'MSY', 1, '2019-09-14 07:14:32'),
(1664, 213, 'USA_Louisiana', 'Shreveport, La ', 'SHV', 1, '2019-09-14 07:14:32'),
(1665, 214, 'USA_Maine', 'Augusta (ME) - Augusta State Apt ', 'AUG', 1, '2019-09-14 07:14:32'),
(1666, 214, 'USA_Maine', 'Bangor (ME) ', 'BGR', 1, '2019-09-14 07:14:32'),
(1667, 214, 'USA_Maine', 'Portland (ME) ', 'PWM', 1, '2019-09-14 07:14:32'),
(1668, 214, 'USA_Maine', 'Presque Island (ME) ', 'PQI', 1, '2019-09-14 07:14:32'),
(1669, 214, 'USA_Maine', 'Rockland (ME) ', 'RKD', 1, '2019-09-14 07:14:32'),
(1670, 215, 'USA_Maryland', 'Baltimore (MD) - Washington Int\'l Apt ', 'BWI', 1, '2019-09-14 07:14:32'),
(1671, 215, 'USA_Maryland', 'Salisbury (MD) ', 'SBY', 1, '2019-09-14 07:14:32'),
(1672, 216, 'USA_Massachusetts', 'Boston- General Edward Lawrence Logan ', 'BOS', 1, '2019-09-14 07:14:32'),
(1673, 216, 'USA_Massachusetts', 'Hyannis (MA) ', 'HYA', 1, '2019-09-14 07:14:32'),
(1674, 216, 'USA_Massachusetts', 'Martha\'s Vineyard (MA) ', 'MVY', 1, '2019-09-14 07:14:32'),
(1675, 216, 'USA_Massachusetts', 'Nantucket (MA) ', 'ACK', 1, '2019-09-14 07:14:32'),
(1676, 216, 'USA_Massachusetts', 'Worcester (MA) ', 'ORH', 1, '2019-09-14 07:14:32'),
(1677, 217, 'USA_Michigan', 'Ann Arbor (MI) ', 'ARB', 1, '2019-09-14 07:14:32'),
(1678, 217, 'USA_Michigan', 'Benton Harbour (MI) ', 'BEH', 1, '2019-09-14 07:14:32'),
(1679, 217, 'USA_Michigan', 'Detroit (MI) , Coleman A. Young Municipal ', 'DET', 1, '2019-09-14 07:14:32'),
(1680, 217, 'USA_Michigan', 'Detroit (MI) , Metropolitan Area ', 'DTT', 1, '2019-09-14 07:14:32'),
(1681, 217, 'USA_Michigan', 'Detroit (MI) , Wayne County Apt ', 'DTW', 1, '2019-09-14 07:14:32'),
(1682, 217, 'USA_Michigan', 'Escanaba (MI) ', 'ESC', 1, '2019-09-14 07:14:32'),
(1683, 217, 'USA_Michigan', 'Flint (MI) ', 'FNT', 1, '2019-09-14 07:14:32'),
(1684, 217, 'USA_Michigan', 'Grand Rapids (MI) ', 'GRR', 1, '2019-09-14 07:14:32'),
(1685, 217, 'USA_Michigan', 'Hancock (MI) ', 'CMX', 1, '2019-09-14 07:14:32'),
(1686, 217, 'USA_Michigan', 'Jackson (MI) - Reynolds Municipal ', 'JXN', 1, '2019-09-14 07:14:32'),
(1687, 217, 'USA_Michigan', 'Kalamazoo/Battle Creek (MI) ', 'AZO', 1, '2019-09-14 07:14:32'),
(1688, 217, 'USA_Michigan', 'Lansing (MI) ', 'LAN', 1, '2019-09-14 07:14:32'),
(1689, 217, 'USA_Michigan', 'Marquette (MI) ', 'MQT', 1, '2019-09-14 07:14:32'),
(1690, 217, 'USA_Michigan', 'Muskegon (MI) ', 'MKG', 1, '2019-09-14 07:14:32'),
(1691, 217, 'USA_Michigan', 'Pellston (MI) ', 'PLN', 1, '2019-09-14 07:14:32'),
(1692, 217, 'USA_Michigan', 'Saginaw/Bay City/Midland (MI) ', 'MBS', 1, '2019-09-14 07:14:32'),
(1693, 217, 'USA_Michigan', 'Traverse City (MI) ', 'TVC', 1, '2019-09-14 07:14:32'),
(1694, 218, 'USA_Minnesota', 'Bemidji (MN) ', 'BJI', 1, '2019-09-14 07:14:32'),
(1695, 218, 'USA_Minnesota', 'Brainerd (MN) ', 'BRD', 1, '2019-09-14 07:14:32'),
(1696, 218, 'USA_Minnesota', 'Duluth (MN) /Superior (WI) ', 'DLH', 1, '2019-09-14 07:14:32'),
(1697, 218, 'USA_Minnesota', 'Grand Rapids (MN) ', 'GPZ', 1, '2019-09-14 07:14:32'),
(1698, 218, 'USA_Minnesota', 'Hibbing (MN) ', 'HIB', 1, '2019-09-14 07:14:32'),
(1699, 218, 'USA_Minnesota', 'Int\'l Falls (MN) ', 'INL', 1, '2019-09-14 07:14:32'),
(1700, 218, 'USA_Minnesota', 'Jackson,  MN   ', 'MJQ', 1, '2019-09-14 07:14:32'),
(1701, 218, 'USA_Minnesota', 'Minneapolis - St. Paul Int\'l Apt (MN) ', 'MSP', 1, '2019-09-14 07:14:32'),
(1702, 218, 'USA_Minnesota', 'Rochester (MN) ', 'RST', 1, '2019-09-14 07:14:32'),
(1703, 218, 'USA_Minnesota', 'Thief River Falls (MN) ', 'TVF', 1, '2019-09-14 07:14:32'),
(1704, 219, 'USA_Mississippi', 'Greenville (MS) ', 'GLH', 1, '2019-09-14 07:14:32'),
(1705, 219, 'USA_Mississippi', 'Gulfport/Biloxi (MS) ', 'GPT', 1, '2019-09-14 07:14:32'),
(1706, 219, 'USA_Mississippi', 'Jackson (MS) - Hawkins Field    ', 'HKS', 1, '2019-09-14 07:14:32'),
(1707, 219, 'USA_Mississippi', 'Jackson (MS) - Jackson Int\'ll ', 'JAN', 1, '2019-09-14 07:14:32'),
(1708, 219, 'USA_Mississippi', 'Laurel/Hattisburg (MS) ', 'PIB', 1, '2019-09-14 07:14:32'),
(1709, 219, 'USA_Mississippi', 'Meridian (MS) ', 'MEI', 1, '2019-09-14 07:14:32'),
(1710, 219, 'USA_Mississippi', 'Tulepo (MS) ', 'TUP', 1, '2019-09-14 07:14:32'),
(1711, 220, 'USA_Missouri', 'Jefferson City (MO) - Jefferson Memorial ', 'JEF', 1, '2019-09-14 07:14:32'),
(1712, 220, 'USA_Missouri', 'Joplin (MO) ', 'JLN', 1, '2019-09-14 07:14:32'),
(1713, 220, 'USA_Missouri', 'Kansas City (MO) - Kansas City Int\'l Apt ', 'MCI', 1, '2019-09-14 07:14:32'),
(1714, 220, 'USA_Missouri', 'Springfield (MO) ', 'SGF', 1, '2019-09-14 07:14:32'),
(1715, 220, 'USA_Missouri', 'St. Louis (MO) Lambert–St. Louis Int\'l Apt ', 'STL', 1, '2019-09-14 07:14:32'),
(1716, 221, 'USA_Montana', 'Billings (MT) ', 'BIL', 1, '2019-09-14 07:14:32'),
(1717, 221, 'USA_Montana', 'Bozeman (MT) ', 'BZN', 1, '2019-09-14 07:14:32'),
(1718, 221, 'USA_Montana', 'Butte (MT) ', 'BTM', 1, '2019-09-14 07:14:32'),
(1719, 221, 'USA_Montana', 'Glasgow (MT) ', 'GGW', 1, '2019-09-14 07:14:32'),
(1720, 221, 'USA_Montana', 'Glendive (MT) ', 'GDV', 1, '2019-09-14 07:14:32'),
(1721, 221, 'USA_Montana', 'Great Falls (MT) ', 'GTF', 1, '2019-09-14 07:14:32'),
(1722, 221, 'USA_Montana', 'Havre (MT) ', 'HVR', 1, '2019-09-14 07:14:32'),
(1723, 221, 'USA_Montana', 'Helena (MT) ', 'HLN', 1, '2019-09-14 07:14:32'),
(1724, 221, 'USA_Montana', 'Kalispell (MT) ', 'FCA', 1, '2019-09-14 07:14:32'),
(1725, 221, 'USA_Montana', 'Lewistown (MT) ', 'LWT', 1, '2019-09-14 07:14:32'),
(1726, 221, 'USA_Montana', 'Miles City (MT) ', 'MLS', 1, '2019-09-14 07:14:32'),
(1727, 221, 'USA_Montana', 'Missula (MT) ', 'MSO', 1, '2019-09-14 07:14:32'),
(1728, 221, 'USA_Montana', 'Sidney (MT) ', 'SDY', 1, '2019-09-14 07:14:32'),
(1729, 221, 'USA_Montana', 'West Yellowstone (MT) ', 'WYS', 1, '2019-09-14 07:14:32'),
(1730, 221, 'USA_Montana', 'Wolf Point (MT) ', 'OLF', 1, '2019-09-14 07:14:32'),
(1731, 222, 'USA_Nebraska', 'Lincoln (NE) ', 'LNK', 1, '2019-09-14 07:14:32'),
(1732, 222, 'USA_Nebraska', 'Omaha (NE) ', 'OMA', 1, '2019-09-14 07:14:32'),
(1733, 223, 'USA_Nevada', 'Bullhead City (NV) ', 'BHC', 1, '2019-09-14 07:14:32'),
(1734, 223, 'USA_Nevada', 'Carson City (NV) ', 'CSN', 1, '2019-09-14 07:14:32'),
(1735, 223, 'USA_Nevada', 'Elko (NV) ', 'EKO', 1, '2019-09-14 07:14:32'),
(1736, 223, 'USA_Nevada', 'Ely (NV) ', 'ELY', 1, '2019-09-14 07:14:32'),
(1737, 223, 'USA_Nevada', 'Las Vegas (NV) ', 'LAS', 1, '2019-09-14 07:14:32'),
(1738, 223, 'USA_Nevada', 'Reno (NV) ', 'RNO', 1, '2019-09-14 07:14:32'),
(1739, 224, 'USA_New Hampshire', 'Concord (NH) - Concord Municipal Apt ', 'CON', 1, '2019-09-14 07:14:32'),
(1740, 224, 'USA_New Hampshire', 'Lebanon (NH) ', 'LEB', 1, '2019-09-14 07:14:32'),
(1741, 224, 'USA_New Hampshire', 'Manchester (NH) ', 'MHT', 1, '2019-09-14 07:14:32'),
(1742, 225, 'USA_New Jersey', 'Atlantic City (NJ) - Atlantic City Int\'l ', 'ACY', 1, '2019-09-14 07:14:32'),
(1743, 225, 'USA_New Jersey', 'New York - Newark (NJ) ', 'EWR', 1, '2019-09-14 07:14:32'),
(1744, 225, 'USA_New Jersey', 'Trenton/Princeton (NJ) ', 'TTN', 1, '2019-09-14 07:14:32'),
(1745, 226, 'USA_New Mexico', 'Albuquerque (NM) ', 'ABQ', 1, '2019-09-14 07:14:32'),
(1746, 226, 'USA_New Mexico', 'Farmington (NM) ', 'FMN', 1, '2019-09-14 07:14:32'),
(1747, 227, 'USA_New York', 'Albany (NY) - Albany Int\'l Apt ', 'ALB', 1, '2019-09-14 07:14:32'),
(1748, 227, 'USA_New York', 'Buffalo/Niagara Falls (NY) ', 'BUF', 1, '2019-09-14 07:14:32'),
(1749, 227, 'USA_New York', 'Elmira (NY) ', 'ELM', 1, '2019-09-14 07:14:32'),
(1750, 227, 'USA_New York', 'Ithaca/Cortland (NY) ', 'ITH', 1, '2019-09-14 07:14:32'),
(1751, 227, 'USA_New York', 'Jamestown (NY) ', 'JHW', 1, '2019-09-14 07:14:32'),
(1752, 227, 'USA_New York', 'Johnson City (Binghamton/Endicott/Johnson)', 'BGM', 1, '2019-09-14 07:14:32'),
(1753, 227, 'USA_New York', 'Long Island, Islip (NY) - Mac Arthur ', 'ISP', 1, '2019-09-14 07:14:32'),
(1754, 227, 'USA_New York', 'New York - John F. Kennedy (NY) ', 'JFK', 1, '2019-09-14 07:14:32'),
(1755, 227, 'USA_New York', 'New York - LaGuardia (NY) ', 'LGA', 1, '2019-09-14 07:14:32'),
(1756, 227, 'USA_New York', 'New York (NY) ', 'NYC', 1, '2019-09-14 07:14:32'),
(1757, 227, 'USA_New York', 'Newburgh (NY) ', 'SWF', 1, '2019-09-14 07:14:32'),
(1758, 227, 'USA_New York', 'Niagara Falls Int\'l ', 'IAG', 1, '2019-09-14 07:14:32'),
(1759, 227, 'USA_New York', 'Plattsburgh (NY) ', 'PLB', 1, '2019-09-14 07:14:32'),
(1760, 227, 'USA_New York', 'Poughkeepsie (NY) ', 'POU', 1, '2019-09-14 07:14:32'),
(1761, 227, 'USA_New York', 'Rochester (NY) ', 'ROC', 1, '2019-09-14 07:14:32'),
(1762, 227, 'USA_New York', 'Syracuse (NY) ', 'SYR', 1, '2019-09-14 07:14:32'),
(1763, 227, 'USA_New York', 'Utica (NY) - Oneida County Apt ', 'UCA', 1, '2019-09-14 07:14:32'),
(1764, 227, 'USA_New York', 'White Plains (NY) ', 'HPN', 1, '2019-09-14 07:14:32'),
(1765, 228, 'USA_North Carolina', 'Asheville (NC) ', 'AVL', 1, '2019-09-14 07:14:32'),
(1766, 228, 'USA_North Carolina', 'Charlotte (NC) ', 'CLT', 1, '2019-09-14 07:14:32'),
(1767, 228, 'USA_North Carolina', 'Fayetteville/Ft. Bragg (NC) ', 'FAY', 1, '2019-09-14 07:14:32'),
(1768, 228, 'USA_North Carolina', 'Greensboro/Winston Salem (NC) ', 'GSO', 1, '2019-09-14 07:14:32'),
(1769, 228, 'USA_North Carolina', 'Greenville (NC) ', 'PGV', 1, '2019-09-14 07:14:32'),
(1770, 228, 'USA_North Carolina', 'Hickory (NC) ', 'HKY', 1, '2019-09-14 07:14:32'),
(1771, 228, 'USA_North Carolina', 'Jacksonville (NC) ', 'OAJ', 1, '2019-09-14 07:14:32'),
(1772, 228, 'USA_North Carolina', 'Kingston (NC) ', 'ISO', 1, '2019-09-14 07:14:32'),
(1773, 228, 'USA_North Carolina', 'New Bern (NC) ', 'EWN', 1, '2019-09-14 07:14:32'),
(1774, 228, 'USA_North Carolina', 'Raleigh/Durham (NC) ', 'RDU', 1, '2019-09-14 07:14:32'),
(1775, 228, 'USA_North Carolina', 'Rocky Mount - Wilson (NC) ', 'RWI', 1, '2019-09-14 07:14:32'),
(1776, 228, 'USA_North Carolina', 'Wilmington (NC) ', 'ILM', 1, '2019-09-14 07:14:32'),
(1777, 229, 'USA_North Dakota', 'Bismarck (ND) - Bismarck Municipal Apt ', 'BIS', 1, '2019-09-14 07:14:32'),
(1778, 229, 'USA_North Dakota', 'Devils Lake (ND) ', 'DVL', 1, '2019-09-14 07:14:32'),
(1779, 229, 'USA_North Dakota', 'Fargo (ND) (MN) ', 'FAR', 1, '2019-09-14 07:14:32'),
(1780, 229, 'USA_North Dakota', 'Grand Forks (ND) ', 'GFK', 1, '2019-09-14 07:14:32'),
(1781, 229, 'USA_North Dakota', 'Jamestown (ND) ', 'JMS', 1, '2019-09-14 07:14:32'),
(1782, 229, 'USA_North Dakota', 'Minot (ND) ', 'MOT', 1, '2019-09-14 07:14:32'),
(1783, 229, 'USA_North Dakota', 'Williston (ND) ', 'ISL', 1, '2019-09-14 07:14:32'),
(1784, 230, 'USA_Ohio', 'Akron (OH) ', 'CAK', 1, '2019-09-14 07:14:32'),
(1785, 230, 'USA_Ohio', 'Athens (OH) ', 'ATO', 1, '2019-09-14 07:14:32'),
(1786, 230, 'USA_Ohio', 'Cincinnati (OH) - Cincinnati/N Kentucky Int\'l ', 'CVG', 1, '2019-09-14 07:14:32'),
(1787, 230, 'USA_Ohio', 'Cleveland (OH) - Cleveland Hopkins Int\'l ', 'CLE', 1, '2019-09-14 07:14:32'),
(1788, 230, 'USA_Ohio', 'Cleveland (OH) , Burke Lakefront ', 'BKL', 1, '2019-09-14 07:14:32'),
(1789, 230, 'USA_Ohio', 'Columbus (OH) - Port Columbus Int\'l ', 'CMH', 1, '2019-09-14 07:14:32'),
(1790, 230, 'USA_Ohio', 'Dayton (OH) ', 'DAY', 1, '2019-09-14 07:14:32'),
(1791, 230, 'USA_Ohio', 'Pakersburg (WV) /Marietta (OH) ', 'PKB', 1, '2019-09-14 07:14:32'),
(1792, 230, 'USA_Ohio', 'Toledo (OH) ', 'TOL', 1, '2019-09-14 07:14:32'),
(1793, 231, 'USA_Oklahoma', 'Altus ', 'AXS', 1, '2019-09-14 07:14:32'),
(1794, 231, 'USA_Oklahoma', 'Lawton (OK) ', 'LAW', 1, '2019-09-14 07:14:32'),
(1795, 231, 'USA_Oklahoma', 'Oklahoma City (OK) - Will Rogers World ', 'OKC', 1, '2019-09-14 07:14:32'),
(1796, 231, 'USA_Oklahoma', 'Tulsa (OK) ', 'TUL', 1, '2019-09-14 07:14:32'),
(1797, 232, 'USA_Oregon', 'Eugene (OR) ', 'EUG', 1, '2019-09-14 07:14:32'),
(1798, 232, 'USA_Oregon', 'Klamath Fall (OR) ', 'LMT', 1, '2019-09-14 07:14:32'),
(1799, 232, 'USA_Oregon', 'Medford (OR) ', 'MFR', 1, '2019-09-14 07:14:32'),
(1800, 232, 'USA_Oregon', 'North Bend (OR) ', 'OTH', 1, '2019-09-14 07:14:32'),
(1801, 232, 'USA_Oregon', 'Pendelton (OR) ', 'PDT', 1, '2019-09-14 07:14:32'),
(1802, 232, 'USA_Oregon', 'Portland Int\'l (OR) ', 'PDX', 1, '2019-09-14 07:14:32'),
(1803, 232, 'USA_Oregon', 'Redmond (OR) ', 'RDM', 1, '2019-09-14 07:14:32'),
(1804, 232, 'USA_Oregon', 'Salem (OR) ', 'SLE', 1, '2019-09-14 07:14:32'),
(1805, 233, 'USA_Pennsylvania', 'Allentown (PA) ', 'ABE', 1, '2019-09-14 07:14:32'),
(1806, 233, 'USA_Pennsylvania', 'Altoona (PA) ', 'AOO', 1, '2019-09-14 07:14:32'),
(1807, 233, 'USA_Pennsylvania', 'Bradford/Warren (PA) /Olean (NY) ', 'BFD', 1, '2019-09-14 07:14:32'),
(1808, 233, 'USA_Pennsylvania', 'Dubois (PA) ', 'DUJ', 1, '2019-09-14 07:14:32'),
(1809, 233, 'USA_Pennsylvania', 'Erie (PA) ', 'ERI', 1, '2019-09-14 07:14:32'),
(1810, 233, 'USA_Pennsylvania', 'Franklin/Oil City (PA) ', 'FKL', 1, '2019-09-14 07:14:32'),
(1811, 233, 'USA_Pennsylvania', 'Harrisburg (PA) - Harrisburg Int\'l ', 'MDT', 1, '2019-09-14 07:14:32'),
(1812, 233, 'USA_Pennsylvania', 'Harrisburg (PA) - Harrisburg Skyport ', 'HAR', 1, '2019-09-14 07:14:32'),
(1813, 233, 'USA_Pennsylvania', 'Johnstown (PA) ', 'JST', 1, '2019-09-14 07:14:32'),
(1814, 233, 'USA_Pennsylvania', 'Lancaster (PA) ', 'LNS', 1, '2019-09-14 07:14:32'),
(1815, 233, 'USA_Pennsylvania', 'Latrobe (PA) ', 'LBE', 1, '2019-09-14 07:14:32'),
(1816, 233, 'USA_Pennsylvania', 'Philadelphia (PA) - Int\'l ', 'PHL', 1, '2019-09-14 07:14:32'),
(1817, 233, 'USA_Pennsylvania', 'Pittsburgh Int\'l Apt (PA) ', 'PIT', 1, '2019-09-14 07:14:32'),
(1818, 233, 'USA_Pennsylvania', 'Reading (PA) ', 'RDG', 1, '2019-09-14 07:14:32'),
(1819, 233, 'USA_Pennsylvania', 'State College/Belefonte (PA) ', 'SCE', 1, '2019-09-14 07:14:32'),
(1820, 233, 'USA_Pennsylvania', 'Wilkes Barre/Scranton (PA) ', 'AVP', 1, '2019-09-14 07:14:32'),
(1821, 233, 'USA_Pennsylvania', 'Williamsport (PA) ', 'IPT', 1, '2019-09-14 07:14:32'),
(1822, 234, 'USA_Rhode Island', 'Providence (RI) ', 'PVD', 1, '2019-09-14 07:14:32'),
(1823, 235, 'USA_South Carolina', 'Charleston (SC) ', 'CHS', 1, '2019-09-14 07:14:32'),
(1824, 235, 'USA_South Carolina', 'Columbia (SC) - Columbia Metropolitan Apt ', 'CAE', 1, '2019-09-14 07:14:32'),
(1825, 235, 'USA_South Carolina', 'Florence (SC) ', 'FLO', 1, '2019-09-14 07:14:32'),
(1826, 235, 'USA_South Carolina', 'Greenville/Spartanburg (SC) ', 'GSP', 1, '2019-09-14 07:14:32'),
(1827, 235, 'USA_South Carolina', 'Hilton Head Island (SC) ', 'HHH', 1, '2019-09-14 07:14:32'),
(1828, 235, 'USA_South Carolina', 'Myrtle Beach (SC) - Grand Strand Apt ', 'CRE', 1, '2019-09-14 07:14:32'),
(1829, 235, 'USA_South Carolina', 'Myrtle Beach (SC) - Myrtle Beach AFB ', 'MYR', 1, '2019-09-14 07:14:32'),
(1830, 236, 'USA_South Dakota', 'Aberdeen (SD) ', 'ABR', 1, '2019-09-14 07:14:32'),
(1831, 236, 'USA_South Dakota', 'Brookings (SD) ', 'BKX', 1, '2019-09-14 07:14:32'),
(1832, 236, 'USA_South Dakota', 'Huron (SD) ', 'HON', 1, '2019-09-14 07:14:32'),
(1833, 236, 'USA_South Dakota', 'Mitchell (SD) ', 'MHE', 1, '2019-09-14 07:14:32'),
(1834, 236, 'USA_South Dakota', 'Pierre (SD) ', 'PIR', 1, '2019-09-14 07:14:32'),
(1835, 236, 'USA_South Dakota', 'Rapid City (SD) ', 'RAP', 1, '2019-09-14 07:14:32'),
(1836, 236, 'USA_South Dakota', 'Sioux Falls (SD) ', 'FSD', 1, '2019-09-14 07:14:32'),
(1837, 236, 'USA_South Dakota', 'Watertown (SD) ', 'ATY', 1, '2019-09-14 07:14:32'),
(1838, 237, 'USA_Tennessee', 'Chattanooga (TN) ', 'CHA', 1, '2019-09-14 07:14:32'),
(1839, 237, 'USA_Tennessee', 'Jackson (TN) - Mckellar ', 'MKL', 1, '2019-09-14 07:14:32'),
(1840, 237, 'USA_Tennessee', 'Knoxville (TN) ', 'TYS', 1, '2019-09-14 07:14:32'),
(1841, 237, 'USA_Tennessee', 'Memphis (TN) ', 'MEM', 1, '2019-09-14 07:14:32'),
(1842, 237, 'USA_Tennessee', 'Nashville (TN) ', 'BNA', 1, '2019-09-14 07:14:32'),
(1843, 237, 'USA_Tennessee', 'Tri-Cities Regional (TN) /VA ', 'TRI', 1, '2019-09-14 07:14:32'),
(1844, 238, 'USA_Texas', 'Abilene (TX) ', 'ABI', 1, '2019-09-14 07:14:32'),
(1845, 238, 'USA_Texas', 'Amarillo (TX) ', 'AMA', 1, '2019-09-14 07:14:32'),
(1846, 238, 'USA_Texas', 'Austin (TX) - Austin-Bergstrom Apt ', 'AUS', 1, '2019-09-14 07:14:32'),
(1847, 238, 'USA_Texas', 'Beaumont/Pt. Arthur (TX) ', 'BPT', 1, '2019-09-14 07:14:32'),
(1848, 238, 'USA_Texas', 'College Station/Bryan (TX) ', 'CLL', 1, '2019-09-14 07:14:32'),
(1849, 238, 'USA_Texas', 'Corpus Christi (TX) ', 'CRP', 1, '2019-09-14 07:14:32'),
(1850, 238, 'USA_Texas', 'Dallas (TX) , Love Field ', 'DAL', 1, '2019-09-14 07:14:32'),
(1851, 238, 'USA_Texas', 'Dallas/Ft. Worth', 'DFW', 1, '2019-09-14 07:14:32'),
(1852, 238, 'USA_Texas', 'El Paso (TX) - El Paso Int\'l Apt ', 'ELP', 1, '2019-09-14 07:14:32'),
(1853, 238, 'USA_Texas', 'Harlingen/South Padre Island (TX) ', 'HRL', 1, '2019-09-14 07:14:32'),
(1854, 238, 'USA_Texas', 'Houston (TX) , Hobby ', 'HOU', 1, '2019-09-14 07:14:32'),
(1855, 238, 'USA_Texas', 'Houston, TX - George Bush Intercontinental Apt ', 'IAH', 1, '2019-09-14 07:14:32'),
(1856, 238, 'USA_Texas', 'Jacksonville (TX) ', 'JKV', 1, '2019-09-14 07:14:32'),
(1857, 238, 'USA_Texas', 'Killeem (TX) ', 'ILE', 1, '2019-09-14 07:14:32'),
(1858, 238, 'USA_Texas', 'Laredo (TX) ', 'LRD', 1, '2019-09-14 07:14:32'),
(1859, 238, 'USA_Texas', 'Longview/Kilgore (TX) ', 'GGG', 1, '2019-09-14 07:14:32'),
(1860, 238, 'USA_Texas', 'Lubbock (TX) ', 'LBB', 1, '2019-09-14 07:14:32'),
(1861, 238, 'USA_Texas', 'McAllen (TX) ', 'MFE', 1, '2019-09-14 07:14:32'),
(1862, 238, 'USA_Texas', 'Midland/Odessa (TX) ', 'MAF', 1, '2019-09-14 07:14:32'),
(1863, 238, 'USA_Texas', 'San Angelo (TX) ', 'SJT', 1, '2019-09-14 07:14:32'),
(1864, 238, 'USA_Texas', 'San Antonio (TX) ', 'SAT', 1, '2019-09-14 07:14:32'),
(1865, 238, 'USA_Texas', 'Tyler (TX) ', 'TYR', 1, '2019-09-14 07:14:32'),
(1866, 238, 'USA_Texas', 'Waco (TX) ', 'ACT', 1, '2019-09-14 07:14:32'),
(1867, 238, 'USA_Texas', 'Wichita Falls (TX) ', 'SPS', 1, '2019-09-14 07:14:32'),
(1868, 239, 'USA_Utah', 'Cedar City (UT) ', 'CDC', 1, '2019-09-14 07:14:32'),
(1869, 239, 'USA_Utah', 'Salt Lake City (UT) ', 'SLC', 1, '2019-09-14 07:14:32'),
(1870, 239, 'USA_Utah', 'St. George (UT) ', 'SGU', 1, '2019-09-14 07:14:32'),
(1871, 239, 'USA_Utah', 'Vernal (UT) ', 'VEL', 1, '2019-09-14 07:14:32'),
(1872, 240, 'USA_Vermont', 'Burlington (VT) ', 'BTV', 1, '2019-09-14 07:14:32'),
(1873, 241, 'USA_Virginia', 'Charlottesville (VA) ', 'CHO', 1, '2019-09-14 07:14:32'),
(1874, 241, 'USA_Virginia', 'Danville (VA) ', 'DAN', 1, '2019-09-14 07:14:32'),
(1875, 241, 'USA_Virginia', 'Lynchburg (VA) ', 'LYH', 1, '2019-09-14 07:14:32'),
(1876, 241, 'USA_Virginia', 'Newport News/Williamsburg (VA) ', 'PHF', 1, '2019-09-14 07:14:32'),
(1877, 241, 'USA_Virginia', 'Norfolk/Virginia Beach (VA) ', 'ORF', 1, '2019-09-14 07:14:32'),
(1878, 241, 'USA_Virginia', 'Richmond (VA) ', 'RIC', 1, '2019-09-14 07:14:32'),
(1879, 241, 'USA_Virginia', 'Roanoke (VA) ', 'ROA', 1, '2019-09-14 07:14:32'),
(1880, 241, 'USA_Virginia', 'Shenandoah Valley/Stauton (VA) ', 'SHD', 1, '2019-09-14 07:14:32'),
(1881, 242, 'USA_Wash, D.C.', 'Washington DC ', 'WAS', 1, '2019-09-14 07:14:32'),
(1882, 242, 'USA_Wash, D.C.', 'Washington DC - Dulles Int\'l ', 'IAD', 1, '2019-09-14 07:14:32'),
(1883, 242, 'USA_Wash, D.C.', 'Washington DC - Ronald Reagan National ', 'DCA', 1, '2019-09-14 07:14:32'),
(1884, 243, 'USA_Washington', 'Bellingham (WA) ', 'BLI', 1, '2019-09-14 07:14:32'),
(1885, 243, 'USA_Washington', 'Moses Lake (WA) ', 'MWH', 1, '2019-09-14 07:14:32'),
(1886, 243, 'USA_Washington', 'Pasco (WA) ', 'PSC', 1, '2019-09-14 07:14:32'),
(1887, 243, 'USA_Washington', 'Port Angeles (WA) ', 'CLM', 1, '2019-09-14 07:14:32'),
(1888, 243, 'USA_Washington', 'Pullman (WA) ', 'PUW', 1, '2019-09-14 07:14:32'),
(1889, 243, 'USA_Washington', 'Seattle/Tacoma (WA) ', 'SEA', 1, '2019-09-14 07:14:32'),
(1890, 243, 'USA_Washington', 'Spokane (WA) ', 'GEG', 1, '2019-09-14 07:14:32'),
(1891, 243, 'USA_Washington', 'Walla Walla (WA) ', 'ALW', 1, '2019-09-14 07:14:32'),
(1892, 243, 'USA_Washington', 'Wenatchee (WA) ', 'EAT', 1, '2019-09-14 07:14:32'),
(1893, 243, 'USA_Washington', 'Yakima (WA) ', 'YKM', 1, '2019-09-14 07:14:32'),
(1894, 244, 'USA_West Virginia', 'Beckley (WV) ', 'BKW', 1, '2019-09-14 07:14:32'),
(1895, 244, 'USA_West Virginia', 'Bluefield (WV) ', 'BLF', 1, '2019-09-14 07:14:32'),
(1896, 244, 'USA_West Virginia', 'Charleston (WV) - Yeager Apt ', 'CRW', 1, '2019-09-14 07:14:32'),
(1897, 244, 'USA_West Virginia', 'Clarksburg (WV) ', 'CKB', 1, '2019-09-14 07:14:32'),
(1898, 244, 'USA_West Virginia', 'Greenbrier/Lewisburg (WV) ', 'LWB', 1, '2019-09-14 07:14:32'),
(1899, 244, 'USA_West Virginia', 'Huntington (WV) ', 'HTS', 1, '2019-09-14 07:14:32'),
(1900, 244, 'USA_West Virginia', 'Martinsburg (WV) ', 'MRB', 1, '2019-09-14 07:14:32'),
(1901, 244, 'USA_West Virginia', 'Morgantown (WV) ', 'MGW', 1, '2019-09-14 07:14:32'),
(1902, 245, 'USA_Wisconsin', 'Appelton/Neenah/Menasha (WI) ', 'ATW', 1, '2019-09-14 07:14:32'),
(1903, 245, 'USA_Wisconsin', 'Eau Clarie (WI) ', 'EAU', 1, '2019-09-14 07:14:32'),
(1904, 245, 'USA_Wisconsin', 'Green Bay (WI) ', 'GRB', 1, '2019-09-14 07:14:32'),
(1905, 245, 'USA_Wisconsin', 'Janesville (WI) - Rock County ', 'JVL', 1, '2019-09-14 07:14:32'),
(1906, 245, 'USA_Wisconsin', 'La Crosse (WI) ', 'LSE', 1, '2019-09-14 07:14:32'),
(1907, 245, 'USA_Wisconsin', 'Madison (WI) - Dane County Regional Apt ', 'MSN', 1, '2019-09-14 07:14:32'),
(1908, 245, 'USA_Wisconsin', 'Milwaukee (WI) ', 'MKE', 1, '2019-09-14 07:14:32'),
(1909, 245, 'USA_Wisconsin', 'Oshkosh (WI) ', 'OSH', 1, '2019-09-14 07:14:32'),
(1910, 245, 'USA_Wisconsin', 'Rhinelander (WI) ', 'RHI', 1, '2019-09-14 07:14:32'),
(1911, 245, 'USA_Wisconsin', 'Wausau/Stevens Point (WI) ', 'CWA', 1, '2019-09-14 07:14:32'),
(1912, 246, 'USA_Wyoming', 'Casper (WY) ', 'CPR', 1, '2019-09-14 07:14:32'),
(1913, 246, 'USA_Wyoming', 'Cheyenne (WY) - Cheyenne Regional Apt ', 'CYS', 1, '2019-09-14 07:14:32'),
(1914, 246, 'USA_Wyoming', 'Cody/Powell/Yellowstone (WY) ', 'COD', 1, '2019-09-14 07:14:32'),
(1915, 246, 'USA_Wyoming', 'Gilette (WY) ', 'GCC', 1, '2019-09-14 07:14:32'),
(1916, 246, 'USA_Wyoming', 'Jackson Hole (WY) ', 'JAC', 1, '2019-09-14 07:14:32'),
(1917, 246, 'USA_Wyoming', 'Laramie (WY) ', 'LAR', 1, '2019-09-14 07:14:32'),
(1918, 246, 'USA_Wyoming', 'Rock Springs (WY) ', 'RKS', 1, '2019-09-14 07:14:32'),
(1919, 246, 'USA_Wyoming', 'Sheridan (WY) ', 'SHR', 1, '2019-09-14 07:14:32'),
(1920, 246, 'USA_Wyoming', 'Worland (WY) ', 'WRL', 1, '2019-09-14 07:14:32'),
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
(1952, 255, 'Zambia', 'Kitwe ', 'KIW', 1, '2019-09-14 07:14:32');
INSERT INTO `fc_iata` (`id`, `country_id`, `country_name`, `short_code`, `code`, `status`, `created`) VALUES
(1953, 255, 'Zambia', 'Lusaka - Lusaka Int\'l Apt ', 'LUN', 1, '2019-09-14 07:14:32'),
(1954, 255, 'Zambia', 'Mfuwe ', 'MFU', 1, '2019-09-14 07:14:32'),
(1955, 255, 'Zambia', 'N\'Dola ', 'NLA', 1, '2019-09-14 07:14:32'),
(1956, 256, 'Zimbabwe', 'Buffalo Range ', 'BFO', 1, '2019-09-14 07:14:32'),
(1957, 256, 'Zimbabwe', 'Bulawayo ', 'BUQ', 1, '2019-09-14 07:14:32'),
(1958, 256, 'Zimbabwe', 'Gweru ', 'GWE', 1, '2019-09-14 07:14:32'),
(1959, 256, 'Zimbabwe', 'Harare - Harare Int\'l Apt ', 'HRE', 1, '2019-09-14 07:14:32'),
(1960, 256, 'Zimbabwe', 'Hwange National Park ', 'HWN', 1, '2019-09-14 07:14:32'),
(1961, 256, 'Zimbabwe', 'Masvingo ', 'MVZ', 1, '2019-09-14 07:14:32'),
(1962, 256, 'Zimbabwe', 'Salisbury ', 'SAY', 1, '2019-09-14 07:14:32'),
(1963, 256, 'Zimbabwe', 'Victoria Falls ', 'VFA', 1, '2019-09-14 07:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `fc_invoice`
--

CREATE TABLE `fc_invoice` (
  `id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `bill_to` text NOT NULL,
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
  `updated_at` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_invoice`
--

INSERT INTO `fc_invoice` (`id`, `company_id`, `bill_to`, `inv_number`, `inv_date`, `amount`, `paid`, `balance`, `inv_file`, `notes`, `terms`, `status`, `sent_date`, `paid_date`, `void_date`, `access_key`, `created_at`, `updated_at`) VALUES
(1, 5, 'sivaa33 \\t Vellore \\t chennai \\t Tamilnadu \\t India', '2019-1', '2019-12-13', '1000.00', '0.00', '1000.00', '2019-1', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2019-12-13', '0000-00-00', '0000-00-00', '', 1576241741, 1576241741),
(2, 5, 'sivaa33 \\t Vellore \\t chennai \\t Tamilnadu \\t India', '2019-2', '2019-12-13', '1000.00', '0.00', '1000.00', '2019-2', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'open', '2019-12-13', '0000-00-00', '0000-00-00', '', 1576242581, 1576242581),
(3, 5, 'sivaa33 \\t Vellore \\t chennai \\t Tamilnadu \\t India', '2019-3', '2019-12-13', '2000.00', '0.00', '2000.00', '2019-3', 'Thank you - we appreciate your support of the Global Logistics Summit Network!', 'Due on receipt', 'paid', '2019-12-13', '2019-12-13', '0000-00-00', '', 1576242912, 1576242912);

-- --------------------------------------------------------

--
-- Table structure for table `fc_mailing_list`
--

CREATE TABLE `fc_mailing_list` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `meta` text,
  `member` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `port_estimates` int(11) NOT NULL,
  `created_at` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_mailing_list`
--

INSERT INTO `fc_mailing_list` (`id`, `email`, `meta`, `member`, `public`, `reference`, `port_estimates`, `created_at`, `updated_at`) VALUES
(2, 'siva.pictuscode@gmail.com', NULL, 0, 0, 0, 1, 1576236889, 1576236889),
(3, 'sivakumar.cse12@gmail.com', NULL, 1, 0, 0, 0, 1576243559, 1576243559),
(4, 'siva@pictuscode.com', NULL, 1, 0, 0, 0, 1576243559, 1576243559),
(5, 'siva.pictuscode1@gmail.com', NULL, 1, 0, 0, 0, 1576247812, 1576247812);

-- --------------------------------------------------------

--
-- Table structure for table `fc_member_news`
--

CREATE TABLE `fc_member_news` (
  `id` int(11) NOT NULL,
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_member_news`
--

INSERT INTO `fc_member_news` (`id`, `author`, `author_email`, `company_id`, `post_type`, `title`, `content`, `archive`, `archeived_date`, `document`, `post_date`, `status`, `created`) VALUES
(5, 'web1', 'web1@g.com', 157, 1, 'Website2', 'web1', '3months', '2020-01-31 00:00:00', 'logo3.png', '2019-10-01', 1, '2019-10-30 18:30:00'),
(8, 'siva', 'siva@pictuscode.com', 0, 0, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '3months', '2020-01-31 00:00:00', '', '2019-11-21', 1, '2019-10-31 12:16:05'),
(7, 'test1', 'tes1t@g.com', 0, 0, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '6months', '2020-05-01 00:00:00', 'logo2.png', '2019-11-22', 1, '2019-10-31 11:40:43'),
(9, 'test', 'test@gmail.com', 159, 0, 'test', 'testt', '1week', '2019-11-20 00:00:00', '993590b37856505f1b15e18fbb187179.png', '2019-11-28', 1, '2019-11-12 18:30:00'),
(10, 'test', 'test@gmail.com', 3, 0, 'tes', 'test', '6months', '2020-06-10 00:00:00', '', '2019-12-26', 1, '2019-12-09 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_news`
--

CREATE TABLE `fc_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) DEFAULT '0',
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('draft','publish','terminated') NOT NULL DEFAULT 'publish',
  `display_order` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_news`
--

INSERT INTO `fc_news` (`id`, `owner_id`, `title`, `slug`, `content`, `img`, `post_date`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'GSAN welcomes Sharaf Shipping Agency (SSA)', 'gsan-welcomes-sharaf-shipping-agency-ssa', '<p style="text-align: justify;"><span style="text-decoration: underline;">May 13, 2017</span>:&nbsp; GSAN welcomes Sharaf Shipping Agency (SSA) as its latest member.</p>\r\n<p style="text-align: justify;">SSA was founded in 1976 as a Ship Agency its core activity has evolved to include Hub Services, Offshore Supply, Freight Forwarding, Project Cargo, Chartering &amp; Brokering and Logistics &amp; Warehousing Services. SSA has continuously expanded its network of owned offices throughout the Middle East/Africa and, today, employs over 1,000 multinational executives with proven shipping experience. Their website at: <a href="http://www.sharafshipping.com">www.sharafshipping.com</a></p>', '', '2015-04-04 19:34:50', 'draft', 0, '2015-04-04 19:34:50', '2018-11-26 10:34:07'),
(2, 1, 'GSAN welcomes McLarens Logistics Limited of Sri Lanka as its latest member.', 'gsan-welcomes-mclarens-logistics-limited-of-sri-lanka-as-its-latest-member', '<p style="text-align: justify;"><strong><span style="text-decoration: underline;">November 26, 2017:</span>&nbsp; </strong>GSAN welcomes McLarens Logistics Limited of Sri Lanka as its latest member.</p>\r\n<p style="text-align: justify;"><a href="../../../member/mclarens-logistics-limited-544.html"><strong>McLarens Logistics</strong></a> is a fully fledged Shipping and Freight Forwarding Company providing an array of services which include; International Freight Forwarding, NVOCC Agency (Dry, Reefer, Special, &amp; ISO Tank Containers), Liner Agency Services (Containerized, Break Bulk, Ro-Ro etc.,) Supply of Bunkers, Arrangement of Surveys, Crew Change, Ship Supply Services etc.&nbsp; Their website is: <a href="http://www.mclarenslogistics.lk">www.mclarenslogistics.lk</a></p>', '', '2017-11-26 15:55:33', 'publish', 0, '2017-11-26 15:55:33', '2017-11-26 15:58:56'),
(5, 6, 'Interport Ship Agents Ltd of Bangladesh becomes GSAN member', 'interport-ship-agents-ltd-of-bangladesh-becomes-gsan-member', '<p style="margin: 0px 0px 10px 0px; line-height: 22px;">GSAN is pleased to announce that <strong>Interport Ship Agents Ltd</strong> (ISAL) of <strong>Bangladesh</strong> has <strong>joined</strong> our growing and dynamic Global Ship Agencies Network.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Since 2001 Interport Ship Agents Ltd (ISAL) provides an extensive range of services to ship owners and operators in both tramp and liner shipping sectors, as well as ship management companies and charterers. Interport offers comprehensive range of agency services, tailor-made for today\'s liner and tramp vessels calling at the Bangladeshi ports of Chittagong and Mongla. These services cover both ship husbandry and cargo services involving bulk, containers, RoRo, break bulk, LPG, project and heavy lift cargoes.<br />Interport is also working as an International Freight Forwarder incl. LCL consolidation and NVOCC.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Last but not least, Interport is also correspondent for a number of the International Group P&amp;I Clubs and able to assists with claims or problems, which may be of concern to the P&amp;I Clubs and their Members.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">The Key Contact is Syed Golam Gous Waheed, Director Sales. Additional information can be found on their Member Profile or their website at: <a style="color: #cc3300; text-decoration: underline;" href="http://www.interport.org">www.interport.org</a></p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Please join GSAN in welcoming Interport to GSAN. Please work with them to develop mutual business.</p>', '', '2018-05-23 00:47:20', 'publish', 0, '2018-05-22 06:07:44', '2018-05-23 00:48:02'),
(4, 6, 'GSAN invites you to join Bimco webinar on new FONASBA General Agency Agreement', 'gsan-invites-you-to-join-bimco-webinar-on-new-fonasba-general-agency-agreement', '<p style="margin: 0px 0px 10px; line-height: 22px;"><span style="font-size: 14px;"><strong>"GSAN invites you to join Bimco webinar on new FONASBA General Agency Agreement</strong></span><span style="font-size: 14px;"><strong>"<br /></strong></span></p>\r\n<p style="margin: 0px 0px 10px; line-height: 22px;">Dear Sir/Madam,</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">We herewith invite you to join the <strong>free</strong> Bimco <strong>webinar</strong> on <strong>Thursday 5 April at 9.00 CET</strong> (10.00 CEST) to hear about the<strong> newly published BIMCO/FONASBA General Agency Agreement</strong>.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Agency appointments are often agreed over the phone or by email. But with ship operations becoming ever more complex,</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">there is a growing need for a standard agreement that clearly sets out the services to be performed by the agents and the liabilities and responsibilities of both parties.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">A panel will discuss the new agreement and explain why agents and their principals would benefit from using it:</p>\r\n<ul style="margin-top: 0px; margin-bottom: 10px;">\r\n<li>John Foord - FONASBA President</li>\r\n<li>Han van Blanken - BIMCO Documentary Committee member &amp; GSAN Executive Director</li>\r\n<li>Luis Bernat &ndash; Danish Shipbrokers Association &amp; Chaiman of the Institute of Chartered Shipbrokers Branch in Denmark</li>\r\n</ul>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;"><a style="color: #cc3300; text-decoration: underline;" href="https://ukbimco.doodle.com/poll/yczr6wzf6mwb5bxx" target="_blank">Sign up</a> to watch this free webinar.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;"><strong>UPDATE:</strong> the webinar can be viewed on YouTube via following link: <a href="https://www.youtube.com/watch?v=56NCZzUHh6k&amp;feature=youtu.be" target="_blank" rel="nofollow" data-ft="{&quot;tn&quot;:&quot;-U&quot;}" data-lynx-mode="asynclazy" data-lynx-uri="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D56NCZzUHh6k%26feature%3Dyoutu.be&amp;h=ATNhc0yeWGgiInHkroc3PSSZ-DlYuGHXp7LIUGKuSLiH6w7jB5wk9aLkIP_fT4aXClksnJ4icPyNm0NhVNxDZLPYaGRXUj3Sw0AqjuJyHvyTKv6aJWXHfSUT4i5nrDeRAXQzKU1eJ4jca5Y178GFegG-0khYslCR1v1-k3DW">https://www.youtube.com/watch?v=56NCZzUHh6k&amp;feature=youtu.be</a></p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Viewers will be able to submit questions to the panel in advance. Send your questions to <a style="color: #cc3300; text-decoration: underline;" href="mailto:contracts@bimco.org" target="_blank">contracts@bimco.org</a>.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">The General Agency Agreement can be found on the&nbsp; found on the <a style="color: #cc3300; text-decoration: underline;" href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/general-agency-agreement" target="_blank">BIMCO website</a>.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">We are available to answer any questions that you may have.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Yours sincerely,<br />Han van Blanken</p>', '', '2018-03-27 03:11:49', 'publish', 0, '2018-03-27 02:59:27', '2018-04-13 05:32:50'),
(3, 1, 'GSAN welcomes new members Mr. Han van Blanken & Mr. Evert Hoogwerf in the GSAN Board of Directors', 'gsan-welcomes-new-members-mr-han-van-blanken-mr-evert-hoogwerf-in-the-gsan-board-of-directors', '<p><strong>Global Ship Agencies Network (GSAN) welcomes new members Mr. Han van Blanken &amp; Mr. Evert Hoogwerf in the GSAN Board of Directors :&nbsp;</strong></p>\r\n<p>Dear GSAN Family:<br /><br />We are pleased to announce that Mr. Han van Blanken &amp; Mr. Evert Hoogwerf have joined the management team of GSAN in order to strengthen our organization and develop our network further.<br />They have a solid background within the shipping community and a large network within various market segments.</p>\r\n<p>Han was chairman of the BIMCO Documentary Committee subgroup which drafted the new Agency Appointment Agreement document and the new General Agency Agreement document together with FONASBA.<br />With the arrival of our new team members we believe that we will be in a better position to further upgrade and promote the GSAN network and increase our world wide coverage.<br />Please extend your usual courtesy and extend a big welcome to Han &amp; Evert.</p>\r\n<p>The Contact details can be found on <a href="../../../contact-feedback.html?&amp;utm_source=newsletter&amp;utm_medium=email&amp;utm_campaign=gsan_notice_of_readiness_han_van_blanken_evert_hoogwerf_join_global_ship_agencies_network&amp;utm_term=2018-02-21" target="_blank" data-link-id="157657102">GSAN Contact</a> page.</p>', '', '2018-02-22 06:08:40', 'publish', 0, '2018-02-22 06:08:40', '2018-02-22 06:08:40'),
(6, 6, 'McLarens Logistics Limited of Sri Lanka added new ports.', 'mclarens-logistics-limited-of-sri-lanka-added-new-ports', '<p style="margin: 0px 0px 10px 0px; line-height: 22px;">GSAN is pleased to announce that messrs <strong>McLarens Logistics Limited</strong> has <strong>added new ports</strong> to their services in <strong>Sri Lanka</strong>.<strong><br /></strong></p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">McLarens Logistics is a fully fledged Shipping and Freight Forwarding Company providing an array of services which include; International Freight Forwarding, NVOCC Agency (Dry, Reefer, Special &amp; ISO Tank Containers), Liner Agency Services (Containerized, Break Bulk, Ro-Ro etc.,) Supply of Bunkers, Arrangement of Surveys, Crew Change, Ship Supply Services etc.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">The Key Contact is Dumindha Saman, Commercial Manager of McLarens. Additional information can be found on their Member Profile or their website at: <a style="color: #cc3300; text-decoration: underline;" href="http://www.mclarenslogistics.lk">www.mclarenslogistics.lk</a></p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Please join GSAN in welcoming McLarens extending their services in Sri Lanka. Please work with them to develop mutual business.</p>', '', '2018-05-22 07:01:58', 'publish', 0, '2018-05-22 06:17:06', '2018-05-22 07:03:13'),
(7, 6, 'Emcar Ltd - Shipping Dept of Mauritius becomes GSAN member', 'emcar-ltd-shipping-dept-of-mauritius-becomes-gsan-member', '<p style="margin: 0px 0px 10px 0px; line-height: 22px;"><strong>GSAN</strong> is pleased to announce that <strong>Emcar Ltd - Shipping Dept</strong> of <strong>Mauritius</strong> has joined our Global Ship Agencies Network as its latest member to serve <strong>Port Louis, Mauritius</strong>.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">In 1970, Emcar Ltd expanded its activities in the Shipping business, to include the export of commodities, mainly sugar and molasses. Since then, they have accumulated almost forty years worth of solid experience in the Shipping trade, from acting as an agent for liner vessels and bulk carriers, to handling Bulk Coal, Sugar shipments and tankers. Emcar\'s major asset are the people, who spare no effort to satisfy customers&rsquo; needs. Emcar\'s expertise &ndash; acquired both on-the-job and through academic training &ndash; is what gives Emcar its competitive edge.</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Emcar Ltd offers you services as Port Agent in Port Louis, Mauritius. They are situated near the port and ensure efficient Port services in the wake of a vision: &ldquo;The strategic location of Mauritius, Midway between Asia, Africa and Australia makes Mauritius the ideal hub of the Indian Ocean for International Trade&rdquo;.&nbsp;</p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">The Key Contacts are Finck Gaetan, Shipping Manager &amp; Charles Lam-I-Song, Head of Operation Department. Additional information can be found on their Member Profile or their website: <a style="color: #cc3300; text-decoration: underline;" href="http://shipping.emcar.mu">http://shipping.emcar.mu</a></p>\r\n<p style="margin: 0px 0px 10px 0px; line-height: 22px;">Please join GSAN in welcoming Emcar Ltd to our network. Please work with them to develop mutual business.</p>', '', '2018-06-04 00:05:15', 'publish', 0, '2018-05-30 08:29:21', '2018-06-04 00:05:15'),
(8, 6, 'James Mackintosh and Company Pvt. Ltd., India joins GSAN', 'james-mackintosh-and-company-pvt-ltd-india-joins-gsan', '<p><strong>GSAN</strong> is pleased to announce that<strong> James Mackintosh and Company Pvt. Ltd.</strong> of <strong>India</strong> has joined our Global Ship Agencies Network as its latest member and serves seventeen ports across the Indian coast.</p>\r\n<p>James Mackintosh and Company Pvt. Ltd started their operations in Bombay in the year 1854 and was subsequently registered as a Private Ltd company in the year 1946. Over the years the company developed offices at several locations on the east and west coast of India,manned by competent personnel.&nbsp;James Mackintosh is well known in shipping circles in India with good relations with port and customs authorities. The Company also functions as P&amp;I correspondents for many major IG group clubs and fixed premium underwriters.</p>\r\n<p>James Mackintosh Agency Division represents Ship Owners, Managers, Operators and Charterers from across the world and provide 24 -hour assistance and information on all aspects of cargo operations, repairs, surveys and bunkering.</p>\r\n<p>GSAN is proud to add another quality company under our agency network and with James Mackintosh&rsquo;s presence at all major Indian ports it enables us to provide clients with the same level of professional expertise.</p>\r\n<p>The key contacts are Cdr Sanjiv Deoras, Sr. Vice President and Cecil Thomas, Sr. Manager. Additional information can be found on their GSAN Member Profile or their website: <a href="http://www.jamesmackintosh.com">www.jamesmackintosh.com</a></p>\r\n<p>Please join GSAN in welcoming James Mackintosh and Company Pvt. Ltd. to our network and please liaise with them to develop mutual beneficial business.</p>\r\n<p>&nbsp;</p>', '', '2018-08-09 11:34:05', 'publish', 0, '2018-08-08 03:58:54', '2018-08-09 11:34:05'),
(9, 6, 'Gulf Harbor Shipping LLC, USA joined GSAN', 'gulf-harbor-shipping-llc-usa-joined-gsan', '<p>GSAN is pleased to announce that <strong>Gulf Harbor Shipping L.L.C.</strong> of <strong>United States of America</strong> has joined our Global Ship Agencies Network as its latest member to serve eleven ports within the <strong>USG and</strong><br /><strong>USEC area.</strong></p>\r\n<p>Gulf Harbor Shipping L.L.C. is a progressive shipping agency focused on customer service with a unique approach to port representation. It was formed in 2001 in New Orleans by seasoned executives<br />that today remain active in day-to-day operations. Drawing from years of handson experience in the shipping agency, the staff of Gulf Harbor is well-versed in operations, agency accounting, and management requirements. This balance of knowledge provides for the delivery of superior agency representation.</p>\r\n<p>Just like GSAN is Gulf Harbor focused on our trade; shipping agency. No hidden alliances or smoke and mirror perceptions. The commitment to the industry is reflected in the quality of service offered and ultimately the continuous support of customers world wide resulting in smooth voyages.</p>\r\n<p>The Key Contacts are Marshall Adams, Sales and Marketing Manager and David Kerns, Operations Manager. Additional information can be found on their Member Profile or their website: <a href="http://www.gulfharbor.com">http://www.gulfharbor.com</a><br />Please join GSAN in welcoming Gulf Harbor Shipping L.L.C. to our network and please liaise with them to develop mutual beneficial business.</p>', '', '2018-08-29 01:12:40', 'publish', 0, '2018-08-28 01:07:50', '2018-08-29 01:12:40'),
(10, 6, 'Sabay Shipping Co. Ltd., Turkey joined GSAN', 'sabay-shipping-co-ltd-turkey-joined-gsan', '<p>GSAN is pleased to announce that messrs<strong> Sabay Shipping Co. Ltd.</strong> of <strong>Turkey</strong> has joined our Global Ship Agencies Network as its latest member and serves the ports of <strong>Iskenderun</strong> and <strong>Istanbul</strong>, <strong>Turkey</strong>.<br /><br />Sabay Shipping was established in 1984 and acts as ship agent and broker from their home port Iskenderun. Over the years the company opened branches in Mersin (1987), Istanbul (1998), Izmir (2002) and Izmit (2004) reflecting a stable and successful growth of their business.<br />The core business was serving world wide known ship owners and managers, which is still an important part of the activities, but today they also maintain close relation with Charterers.<br />Sabay nowadays concentrates on dealing with a wide range of dry cargoes including steels, fertilizers and project cargoes both as ship agent and broker.<br /><br />The key contacts are Mr. Bulent Aymen, CEO and Mr. Yusuf Yuncu, Agency Manager. Additional information can be found on their GSAN Member Profile or their website: <a href="http://www.sabayshipping.com">www.sabayshipping.com</a><br /><br />Please join GSAN in welcoming Sabay Shipping Co. Ltd. to our network and please liaise with them to develop mutual beneficial business.</p>', '', '2018-11-27 02:08:40', 'publish', 0, '2018-11-26 10:37:21', '2018-11-27 02:08:40'),
(128, 1, 'Join the GSAN mailing list to be notified of GSAN and other industry news', 'join-the-gsan-mailing-list-to-be-notified-of-gsan-and-other-industry-news', '&lt;span style=&quot;color: #ff0000; font-size: 18pt;&quot;&gt;&lt;strong&gt;Pakka test&lt;/strong&gt;&lt;/span&gt;', 'news1.png', '2019-10-24 00:00:00', 'publish', 0, '2019-10-24 11:45:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fc_newsletter`
--

CREATE TABLE `fc_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_newsletter`
--

INSERT INTO `fc_newsletter` (`id`, `email`, `created`) VALUES
(1, 'sivanew@gmail.com', '2018-10-23 09:26:50'),
(2, 'sivanew2@gmail.com', '2018-11-19 07:05:25'),
(3, 'siva.pictuscode@gmail.com', '2019-07-04 08:54:45'),
(4, 'siva@g.com', '2019-11-08 07:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `fc_office`
--

CREATE TABLE `fc_office` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `status` enum('draft','new','pending','active','terminated','hold') CHARACTER SET latin1 NOT NULL DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_office`
--

INSERT INTO `fc_office` (`id`, `company_id`, `country_id`, `info`, `is_ho`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `fax`, `contact_info`, `branch_email`, `iata_id`, `reg_date`, `approved_date`, `actived_date`, `terminated_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 87, 'vellore122', 0, 'V.c.Mottur11', 'Walajapet', 'Vellore', 'Tamilnadu', '632513', '9789355645', '44566', '[{"name":"siva","job_title":"sivaa","email":"siva@gmail.com","skype":"siva","mobile":"899"},{"name":"siva","job_title":"siva","email":"siva","skype":"siva","mobile":"985"},{"name":"siva","job_title":"siva","email":"siva","skype":"siva","mobile":"4554"},{"name":"siva","job_title":"siva","email":"siva","skype":"siva","mobile":"4554"},{"name":"siva","job_title":"siva","email":"siva","skype":"siva","mobile":"4585"},{"name":"sivaaa","job_title":"sivaaaa","email":"sivaaaaa","skype":"sivaaaaa","mobile":"sivaaaaa"},{"name":"sivaaaaa","job_title":"sivaaaaa","email":"sivaaaaa","skype":"sivaaaaa","mobile":"sivaaaaa"}]', 'siva.pictuscode@gmail.com', 708, '2019-11-29', '0000-00-00', '0000-00-00', '0000-00-00', 'active', '2019-11-28 18:30:00', '2019-12-09 02:17:37'),
(2, 3, 87, 'COK Branch', 1, 'No: 2/2 Tank Street', 'No: 2/2 Tank Street', 'No: 2/2 Tank Street', 'No: 2/2 Tank Street', '632513', '+9754 45455445 4545', '+91 9789355048', '[{"name":"Sivakumar ","job_title":"PHP Developer","email":"siva.pictuscode@gmail.com","skype":"sivafreelancer4u","mobile":"+919789355048"},{"name":"Thangapandian","job_title":"Graphic Designer","email":"thangapandian@gmail.com","skype":"thangapandiang","mobile":"+918778552544"},{"name":"Yogaraj","job_title":"HTML Developer","email":"yogu1218@gmail.com","skype":"yogu1223","mobile":"+975445454545"},{"name":"Narendiran","job_title":"PHP Dveloper","email":"narendirang@gmail.com","skype":"narendirang33","mobile":"+974545454545"},{"name":"Vidhya","job_title":"Photoshop","email":"vidy@gmail.com","skype":"vidy33","mobile":"+956566655656"},{"name":"Hema","job_title":"hema","email":"hema@gmail.com","skype":"hema33","mobile":"+5445542221545"},{"name":"Naaaaa","job_title":"Naaaa","email":"naaa@gmalil.com","skype":"naaa33","mobile":"+455445454556"},{"name":"Soundarrar","job_title":"Soundar","email":"Soundar@pictuscode.com","skype":"soundar33","mobile":"+914545544545"}]', 'siva.pictuscode@gmail.com', 709, '2019-11-29', '0000-00-00', '0000-00-00', '2019-12-13', 'active', '2019-11-28 18:30:00', '2019-12-05 04:40:11'),
(3, 3, 87, 'Coimbatore Branch', 0, 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Tamilnadu', '632513', '+919789355048', '945665', '[{"name":"s","job_title":"s","email":"s","skype":"s","mobile":"s"},{"name":"s","job_title":"s","email":"s","skype":"s","mobile":"s"},{"name":"s","job_title":"s","email":"s","skype":"s","mobile":"s"},{"name":"s","job_title":"s","email":"s","skype":"s","mobile":"s"}]', 'siva.pictuscode1@gmail.com', 710, '2019-11-29', '0000-00-00', '0000-00-00', '0000-00-00', 'active', '2019-11-28 18:30:00', '2019-12-05 05:05:40'),
(4, 3, 87, 'Vellore', 0, 'Vellore', '', 'Chennai', 'Tamilnadu', '60028', '+919789355048', '+9197855544545', '[{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva33","mobile":"9789355048"},{"name":"siva","job_title":"siva","email":"siva@gmai.com","skype":"siva33","mobile":"9788555445"},{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva33","mobile":"97878874545"},{"name":"sivaa","job_title":"sivaa","email":"sivaaa@gmai.cok","skype":"siva122354","mobile":"4554455454"}]', 'siva.pictuscode@gmail.com', 711, '2019-12-04', '0000-00-00', '0000-00-00', '0000-00-00', 'active', '2019-12-03 18:30:00', '2019-12-05 05:22:26'),
(12, 3, 87, 'Vellore', 0, 'chennai', '', 'chennai', '', '', '66456565', '454545', '[{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""}]', 'siva.pictuscode@gmail.com', 700, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'active', '2019-12-09 02:49:34', '2019-12-09 03:11:13'),
(13, 4, 87, 'test', 1, 'vellore1', 'vellore1', 'vellore1', 'vellore1', '632513', '44454541', '+91 5665656565561', '[{"name":"info","job_title":"info","email":"info@g.com","skype":"info","mobile":"info"},{"name":"info","job_title":"info","email":"info@g.com","skype":"info","mobile":"info"},{"name":"info","job_title":"info","email":"info@g.com","skype":"info","mobile":"info"},{"name":"info","job_title":"info","email":"info@g.com","skype":"info","mobile":"info"},{"name":"info@g.com","job_title":"info@g.com","email":"info@g.com","skype":"info@g.com","mobile":"info@g.com"}]', 'siva.pictuscode@gmail.com', 696, '2019-12-10', '0000-00-00', '2019-12-24', '0000-00-00', 'active', '2019-12-09 18:30:00', '2019-12-13 05:48:02'),
(14, 4, 87, 'Amritsar', 0, 'Vellore', '', 'vesfsdfsd', '', '', '45454546', '', '[{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""},{"name":"","job_title":"","email":"","skype":"","mobile":""}]', 's@s.com', 697, '2019-12-10', '0000-00-00', '2019-12-13', '0000-00-00', 'active', '2019-12-09 18:30:00', '2019-12-10 10:39:13'),
(15, 5, 87, 'Chennai', 1, 'Vellore', 'Vellore', 'Vellore', 'Vellore', '632513', '955665655656', '+91 989889898989', '[{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva33","mobile":"9889898989"},{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva","mobile":"9889898989"},{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva","mobile":"9889898989"},{"name":"siva","job_title":"siva","email":"siva@gmail.com","skype":"siva","mobile":"9889898989"}]', 'siva.pictuscode@gmail.com', 708, '2019-12-13', '2019-12-13', '2019-12-13', '0000-00-00', 'active', '2019-12-12 18:30:00', '2019-12-13 06:25:13'),
(17, 5, 87, 'Coimbatore', 0, 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Coimbatore', 'Coimbatore', '[{"name":"Coimbatore","job_title":"Coimbatore","email":"Coimbatore@gmail.com","skype":"Coimbatore","mobile":"Coimbatore"},{"name":"Coimbatore","job_title":"Coimbatore","email":"Coimbatore@gmail.com","skype":"Coimbatore","mobile":"Coimbatore"},{"name":"Coimbatore","job_title":"Coimbatore","email":"Coimbatore@gmail.com","skype":"Coimbatore","mobile":"Coimbatore"},{"name":"Coimbatore","job_title":"Coimbatore","email":"Coimbatore@gmail.com","skype":"Coimbatore","mobile":"Coimbatore"}]', 'Coimbatore@gmail.com', 710, '2019-12-13', '2019-12-13', '2019-12-13', '0000-00-00', 'active', '2019-12-12 18:30:00', '2019-12-13 06:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `fc_references`
--

CREATE TABLE `fc_references` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `reference_email` varchar(250) NOT NULL,
  `q1` varchar(50) NOT NULL,
  `q2` varchar(50) NOT NULL,
  `q3` varchar(50) NOT NULL,
  `q4` varchar(50) NOT NULL,
  `q5` varchar(50) NOT NULL,
  `notes` longtext CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_references`
--

INSERT INTO `fc_references` (`id`, `company_id`, `reference_email`, `q1`, `q2`, `q3`, `q4`, `q5`, `notes`, `created`) VALUES
(15, 5, 'siva.pictuscode@gmail.com', '34', 'Yes', 'Yes', 'Yes', 'Yes', '343', '2019-12-13 12:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `fc_referral`
--

CREATE TABLE `fc_referral` (
  `id` bigint(20) NOT NULL,
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
  `updated_at` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fc_referral`
--

INSERT INTO `fc_referral` (`id`, `company_id`, `member_name`, `member_email`, `prospect_company`, `prospect_contact_name`, `prospect_email`, `is_registered`, `sent_date`, `reg_date`, `created_at`, `updated_at`) VALUES
(28, 3, 'Siva', 'siva.pictuscode@gmail.com', 'sfsdfs', 'sfdsdfs', 'siva@gmail.com', 0, '2019-12-10 12:03:50', '0000-00-00', 1575979405, 1575979405);

-- --------------------------------------------------------

--
-- Table structure for table `fc_summits`
--

CREATE TABLE `fc_summits` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `venue` text NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fc_summits`
--

INSERT INTO `fc_summits` (`id`, `name`, `start_date`, `end_date`, `venue`, `description`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, '5SLN 2020 Conferenfce1', '2020-03-03', '2020-03-06', 'The LandMark Hotel, Bangkok, Thailand ', '&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-lft&quot;&gt;\r\n&lt;h3 class=&quot;site-head&quot;&gt;GLSN base Membership Fee is simple:&lt;/h3&gt;\r\n&lt;div class=&quot;col-lg-12 col-sm-12 col-xs-12 col-md-12 member-application-price&quot;&gt;\r\n&lt;ul class=&quot;list-inline price-ul&quot;&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD 1250.00&lt;/h5&gt;\r\n&lt;p&gt;per annum per company.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;h5&gt;USD 250.00&lt;/h5&gt;\r\n&lt;p&gt;per annum for each additional branch office.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-6 col-sm-6 col-xs-12 col-md-6 member-application-inner-rgt&quot;&gt;\r\n&lt;p&gt;The Membership Fee INCLUDES a Summit Fee for&amp;nbsp;&lt;strong&gt;1 delegate&amp;nbsp;&lt;/strong&gt;to attend one of the following&amp;nbsp;&lt;strong&gt;2 Bi-Annual Summits.&lt;/strong&gt;&amp;nbsp;The Summit Fee for attending a 2nd Summit and/or bringing&amp;nbsp;&lt;strong&gt;additional delegates is USD 700.00/person.&lt;/strong&gt;&amp;nbsp;This fee is INCLUSIVE of charges relating to attending one of either the following&amp;nbsp;&lt;strong&gt;March or October GLSN Summits&amp;nbsp;&lt;/strong&gt;(Welcome Party, Summit Hall, Buffer Lunches, Social Evening and all related Summit expenses included - excludes Airfare and Hotel Rooms). The Summit Fee for attending a&amp;nbsp;&lt;strong&gt;2nd Summit and/or additional delegates is USD 700.00/person.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;', 'up1.png', 1, '2019-12-12 09:28:43', '2019-12-12 09:28:43'),
(2, '2020 October summit', '2020-10-01', '2020-10-03', 'The LandMark Hotel, Bangkok, Thailand', 'The LandMark Hotel, Bangkok, Thailand', 'up3.png', 1, '2019-12-13 14:49:59', '2019-12-13 14:49:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `fc_admin`
--
ALTER TABLE `fc_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_admin_settings`
--
ALTER TABLE `fc_admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_advertising`
--
ALTER TABLE `fc_advertising`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `fc_assign_summits`
--
ALTER TABLE `fc_assign_summits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_banner`
--
ALTER TABLE `fc_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_cms`
--
ALTER TABLE `fc_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_company`
--
ALTER TABLE `fc_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `fc_contactus`
--
ALTER TABLE `fc_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_contact_enquiry`
--
ALTER TABLE `fc_contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_country`
--
ALTER TABLE `fc_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_email`
--
ALTER TABLE `fc_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_fees`
--
ALTER TABLE `fc_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_fileuploads`
--
ALTER TABLE `fc_fileuploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_footer`
--
ALTER TABLE `fc_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_gallery`
--
ALTER TABLE `fc_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_hears`
--
ALTER TABLE `fc_hears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_iata`
--
ALTER TABLE `fc_iata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_invoice`
--
ALTER TABLE `fc_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`,`inv_number`),
  ADD KEY `status` (`status`),
  ADD KEY `access_key` (`access_key`);

--
-- Indexes for table `fc_mailing_list`
--
ALTER TABLE `fc_mailing_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `fc_member_news`
--
ALTER TABLE `fc_member_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_news`
--
ALTER TABLE `fc_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`,`slug`);

--
-- Indexes for table `fc_newsletter`
--
ALTER TABLE `fc_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_office`
--
ALTER TABLE `fc_office`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`,`country_id`),
  ADD KEY `port_id` (`iata_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `fc_references`
--
ALTER TABLE `fc_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_referral`
--
ALTER TABLE `fc_referral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `fc_summits`
--
ALTER TABLE `fc_summits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fc_admin`
--
ALTER TABLE `fc_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fc_admin_settings`
--
ALTER TABLE `fc_admin_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fc_advertising`
--
ALTER TABLE `fc_advertising`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fc_assign_summits`
--
ALTER TABLE `fc_assign_summits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fc_banner`
--
ALTER TABLE `fc_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `fc_cms`
--
ALTER TABLE `fc_cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `fc_company`
--
ALTER TABLE `fc_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fc_contactus`
--
ALTER TABLE `fc_contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `fc_contact_enquiry`
--
ALTER TABLE `fc_contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fc_country`
--
ALTER TABLE `fc_country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;
--
-- AUTO_INCREMENT for table `fc_email`
--
ALTER TABLE `fc_email`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `fc_fees`
--
ALTER TABLE `fc_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fc_fileuploads`
--
ALTER TABLE `fc_fileuploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fc_footer`
--
ALTER TABLE `fc_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fc_gallery`
--
ALTER TABLE `fc_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fc_hears`
--
ALTER TABLE `fc_hears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fc_iata`
--
ALTER TABLE `fc_iata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1968;
--
-- AUTO_INCREMENT for table `fc_invoice`
--
ALTER TABLE `fc_invoice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fc_mailing_list`
--
ALTER TABLE `fc_mailing_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fc_member_news`
--
ALTER TABLE `fc_member_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fc_news`
--
ALTER TABLE `fc_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `fc_newsletter`
--
ALTER TABLE `fc_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fc_office`
--
ALTER TABLE `fc_office`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `fc_references`
--
ALTER TABLE `fc_references`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fc_referral`
--
ALTER TABLE `fc_referral`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `fc_summits`
--
ALTER TABLE `fc_summits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
