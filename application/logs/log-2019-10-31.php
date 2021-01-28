<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-31 05:50:31 --> Query error: Table 'gsan.fc_listings' doesn't exist - Invalid query: SELECT *
FROM `fc_listings`
ERROR - 2019-10-31 05:51:04 --> Severity: Parsing Error --> syntax error, unexpected ';' E:\wamp64\www\gsan\application\controllers\admin\Admin_settings.php 74
ERROR - 2019-10-31 05:51:15 --> Query error: Table 'gsan.fc_listings' doesn't exist - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_listings` as `u`
LEFT JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
WHERE `u`.`country` != ''
GROUP BY `u`.`country`
ERROR - 2019-10-31 08:53:46 --> Query error: Unknown column 'document_img' in 'field list' - Invalid query: INSERT INTO `fc_member_news` (`company_id`, `author`, `author_email`, `post_type`, `title`, `content`, `archive`, `created`, `document_img`, `archeived_date`) VALUES ('157', 'Siva', 'siva.pictuscode@gmail.com', '0', 'Web development in chennai', 'Web development in chennai', '1week', '2019-10-31', '048ef4b26aadffded7e2447434fd1877.png', '1970-01-08')
ERROR - 2019-10-31 08:53:56 --> Query error: Unknown column 'document_img' in 'field list' - Invalid query: INSERT INTO `fc_member_news` (`company_id`, `author`, `author_email`, `post_type`, `title`, `content`, `archive`, `created`, `document_img`, `archeived_date`) VALUES ('157', 'Siva', 'siva.pictuscode@gmail.com', '0', 'Web development in chennai', 'Web development in chennai', '1week', '2019-10-31', 'a79d881b4eb8a94730767bf17e4de086.png', '1970-01-08')
ERROR - 2019-10-31 09:34:11 --> Severity: Parsing Error --> syntax error, unexpected ';' E:\wamp64\www\gsan\application\controllers\site\Landing.php 1033
ERROR - 2019-10-31 10:12:19 --> Could not find the language line "error"
ERROR - 2019-10-31 10:12:19 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 10:12:19 --> Could not find the language line "email"
ERROR - 2019-10-31 10:12:19 --> Could not find the language line "submit"
ERROR - 2019-10-31 10:12:23 --> Could not find the language line "error"
ERROR - 2019-10-31 10:12:23 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 10:12:23 --> Could not find the language line "email"
ERROR - 2019-10-31 10:12:23 --> Could not find the language line "submit"
ERROR - 2019-10-31 10:12:25 --> Could not find the language line "error"
ERROR - 2019-10-31 10:12:25 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 10:12:25 --> Could not find the language line "email"
ERROR - 2019-10-31 10:12:25 --> Could not find the language line "submit"
ERROR - 2019-10-31 10:15:11 --> Could not find the language line "error"
ERROR - 2019-10-31 10:15:11 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 10:15:11 --> Could not find the language line "email"
ERROR - 2019-10-31 10:15:11 --> Could not find the language line "submit"
ERROR - 2019-10-31 10:28:13 --> Severity: Compile Error --> Cannot redeclare Common_model_backend::display_members_news() E:\wamp64\www\gsan\application\models\Common_model_backend.php 114
ERROR - 2019-10-31 10:29:01 --> Severity: Warning --> Missing argument 7 for Common_model_backend::display_members_news(), called in E:\wamp64\www\gsan\application\controllers\admin\News.php on line 233 and defined E:\wamp64\www\gsan\application\models\Common_model_backend.php 66
ERROR - 2019-10-31 10:29:01 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 68
ERROR - 2019-10-31 10:29:01 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 78
ERROR - 2019-10-31 10:29:01 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 89
ERROR - 2019-10-31 10:29:01 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 102
ERROR - 2019-10-31 10:29:01 --> Query error: Unknown column 'c.post_type' in 'where clause' - Invalid query: SELECT *
FROM `fc_member_news` as `n`
JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
WHERE `c`.`post_type` = '0'
AND (`n`.`title` LIKE '%%' )
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2019-10-31 10:31:20 --> Severity: Warning --> Missing argument 7 for Common_model_backend::display_members_news(), called in E:\wamp64\www\gsan\application\controllers\admin\News.php on line 233 and defined E:\wamp64\www\gsan\application\models\Common_model_backend.php 66
ERROR - 2019-10-31 10:31:20 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 68
ERROR - 2019-10-31 10:31:20 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 78
ERROR - 2019-10-31 10:31:20 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 89
ERROR - 2019-10-31 10:31:20 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 102
ERROR - 2019-10-31 10:31:20 --> Query error: Unknown column 'c.post_type' in 'where clause' - Invalid query: SELECT *
FROM `fc_member_news` as `n`
JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
WHERE `c`.`post_type` = '0'
AND (`n`.`title` LIKE '%%' )
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2019-10-31 10:31:27 --> Severity: Warning --> Missing argument 7 for Common_model_backend::display_members_news(), called in E:\wamp64\www\gsan\application\controllers\admin\News.php on line 233 and defined E:\wamp64\www\gsan\application\models\Common_model_backend.php 66
ERROR - 2019-10-31 10:31:27 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 68
ERROR - 2019-10-31 10:31:27 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 78
ERROR - 2019-10-31 10:31:27 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 89
ERROR - 2019-10-31 10:31:27 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 102
ERROR - 2019-10-31 10:31:27 --> Query error: Unknown column 'c.post_type' in 'where clause' - Invalid query: SELECT *
FROM `fc_member_news` as `n`
JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
WHERE `c`.`post_type` = '0'
AND (`n`.`title` LIKE '%%' )
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2019-10-31 10:32:40 --> Severity: Warning --> Missing argument 7 for Common_model_backend::display_members_news(), called in E:\wamp64\www\gsan\application\controllers\admin\News.php on line 233 and defined E:\wamp64\www\gsan\application\models\Common_model_backend.php 66
ERROR - 2019-10-31 10:32:40 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 68
ERROR - 2019-10-31 10:32:40 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 78
ERROR - 2019-10-31 10:32:40 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 89
ERROR - 2019-10-31 10:32:40 --> Severity: Notice --> Undefined variable: model_function_name E:\wamp64\www\gsan\application\models\Common_model_backend.php 102
ERROR - 2019-10-31 10:32:40 --> Query error: Unknown column 'c.post_type' in 'where clause' - Invalid query: SELECT *
FROM `fc_member_news` as `n`
JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
WHERE `c`.`post_type` = '0'
AND (`n`.`title` LIKE '%%' )
ORDER BY `id` ASC
 LIMIT 10
ERROR - 2019-10-31 10:33:07 --> Query error: Unknown column 'c.post_type' in 'where clause' - Invalid query: SELECT `c`.`name`, `n`.*
FROM `fc_member_news` as `n`
JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
WHERE `c`.`post_type` = '0'
ORDER BY `id` ASC
ERROR - 2019-10-31 10:33:28 --> Severity: Notice --> Object of class CI_DB_mysqli_result could not be converted to int E:\wamp64\www\gsan\application\controllers\admin\News.php 300
ERROR - 2019-10-31 10:33:28 --> Severity: Notice --> Object of class CI_DB_mysqli_result could not be converted to int E:\wamp64\www\gsan\application\controllers\admin\News.php 301
ERROR - 2019-10-31 10:35:05 --> Severity: Notice --> Object of class CI_DB_mysqli_result could not be converted to int E:\wamp64\www\gsan\application\controllers\admin\News.php 300
ERROR - 2019-10-31 10:35:05 --> Severity: Notice --> Object of class CI_DB_mysqli_result could not be converted to int E:\wamp64\www\gsan\application\controllers\admin\News.php 301
ERROR - 2019-10-31 10:38:46 --> Could not find the language line "error"
ERROR - 2019-10-31 10:38:46 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 10:38:46 --> Could not find the language line "email"
ERROR - 2019-10-31 10:38:46 --> Could not find the language line "submit"
ERROR - 2019-10-31 10:42:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'IS NULL' at line 2 - Invalid query: UPDATE `fc_member_news` SET `id` = '4'
WHERE  IS NULL
ERROR - 2019-10-31 11:07:19 --> Could not find the language line "error"
ERROR - 2019-10-31 11:07:19 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 11:07:19 --> Could not find the language line "email"
ERROR - 2019-10-31 11:07:19 --> Could not find the language line "submit"
ERROR - 2019-10-31 11:08:31 --> Could not find the language line "error"
ERROR - 2019-10-31 11:08:31 --> Could not find the language line "forgot_password"
ERROR - 2019-10-31 11:08:31 --> Could not find the language line "email"
ERROR - 2019-10-31 11:08:31 --> Could not find the language line "submit"
ERROR - 2019-10-31 11:39:13 --> Severity: Notice --> Undefined index: title E:\wamp64\www\gsan\application\controllers\admin\News.php 191
ERROR - 2019-10-31 11:39:13 --> Query error: Unknown column 'subject' in 'field list' - Invalid query: INSERT INTO `fc_member_news` (`author`, `author_email`, `post_date`, `post_type`, `subject`, `content`, `archive`, `document`, `company_id`, `status`) VALUES ('Sivaa', 'siva@casp.com', '2019-11-21 00:00:00', '0', 'testttt', 'testttt', '1week', 'logo.png', '0', '1')
ERROR - 2019-10-31 11:40:17 --> Severity: Notice --> Undefined index: title E:\wamp64\www\gsan\application\controllers\admin\News.php 191
ERROR - 2019-10-31 11:40:17 --> Query error: Unknown column 'subject' in 'field list' - Invalid query: INSERT INTO `fc_member_news` (`author`, `author_email`, `post_date`, `post_type`, `subject`, `content`, `archive`, `document`, `company_id`, `status`) VALUES ('Sivaa', 'siva@casp.com', '2019-11-21 00:00:00', '0', 'testttt', 'testttt', '1week', 'logo1.png', '0', '1')
ERROR - 2019-10-31 11:42:47 --> Severity: Parsing Error --> syntax error, unexpected ';' E:\wamp64\www\gsan\application\controllers\admin\News.php 394
