<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-24 06:15:20 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'gsan.u.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_listings` as `u`
LEFT JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
WHERE `u`.`country` != ''
GROUP BY `u`.`country`
ERROR - 2019-10-24 06:16:16 --> Severity: Notice --> Undefined index: description E:\wamp64\www\gsan\application\controllers\admin\News.php 69
ERROR - 2019-10-24 06:16:16 --> Query error: Unknown column 'title' in 'field list' - Invalid query: INSERT INTO `fc_whyselect` (`title`, `post_date`, `content`, `description`) VALUES ('', '', '', '')
ERROR - 2019-10-24 07:03:08 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'gsan.u.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_listings` as `u`
LEFT JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
WHERE `u`.`country` != ''
GROUP BY `u`.`country`
ERROR - 2019-10-24 07:08:34 --> The upload path does not appear to be valid.
ERROR - 2019-10-24 07:08:34 --> Severity: Notice --> Undefined index: description E:\wamp64\www\gsan\application\controllers\admin\News.php 69
ERROR - 2019-10-24 07:08:34 --> Query error: Unknown column 'description' in 'field list' - Invalid query: INSERT INTO `fc_news` (`title`, `post_date`, `content`, `description`) VALUES ('Test', '24-10-2019', 'test', '')
ERROR - 2019-10-24 07:09:17 --> The upload path does not appear to be valid.
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "error"
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "email"
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "password"
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "remember_me"
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:09:20 --> Could not find the language line "login"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "login"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "name"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "email"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "password"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "email"
ERROR - 2019-10-24 07:09:21 --> Could not find the language line "submit"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "error"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "password"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "remember_me"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "login"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "login"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "name"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "password"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:32 --> Could not find the language line "submit"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "error"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "password"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "remember_me"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "login"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "login"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "name"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "password"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "get_started"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "forgot_password"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "email"
ERROR - 2019-10-24 07:11:34 --> Could not find the language line "submit"
ERROR - 2019-10-24 07:17:54 --> Severity: Parsing Error --> syntax error, unexpected ')' E:\wamp64\www\gsan\application\controllers\admin\News.php 71
ERROR - 2019-10-24 07:26:08 --> Query error: Table 'gsan.fc_users' doesn't exist - Invalid query: SELECT *
FROM `fc_users`
WHERE `id` IS NULL
AND `status` = '1'
ERROR - 2019-10-24 07:26:28 --> Query error: Table 'gsan.fc_users' doesn't exist - Invalid query: SELECT *
FROM `fc_users`
WHERE `id` IS NULL
AND `status` = '1'
ERROR - 2019-10-24 07:27:04 --> Query error: Table 'gsan.fc_users' doesn't exist - Invalid query: SELECT *
FROM `fc_users`
WHERE `id` IS NULL
AND `status` = '1'
ERROR - 2019-10-24 07:28:18 --> Query error: Table 'gsan.fc_category' doesn't exist - Invalid query: SELECT *
FROM `fc_category`
WHERE `status` = '1'
ORDER BY `cat_name` ASC
ERROR - 2019-10-24 07:28:26 --> Query error: Table 'gsan.fc_category' doesn't exist - Invalid query: SELECT *
FROM `fc_category`
WHERE `status` = '1'
ORDER BY `cat_name` ASC
ERROR - 2019-10-24 07:28:42 --> Query error: Table 'gsan.fc_listings' doesn't exist - Invalid query: SELECT `ts`.*
FROM `fc_listings` as `ts`
WHERE date(ts.validity_date) >= '2019-10-24' and `ts`.`type` = '6' and `ts`.`status` = '1'
ORDER BY `ts`.`id` DESC
ERROR - 2019-10-24 07:29:32 --> Severity: Notice --> Undefined variable: total_student_count E:\wamp64\www\gsan\application\views\admin\common\sidebar.php 68
ERROR - 2019-10-24 07:29:32 --> Severity: Error --> Call to a member function num_rows() on null E:\wamp64\www\gsan\application\views\admin\common\sidebar.php 68
ERROR - 2019-10-24 09:34:35 --> Severity: Error --> Call to undefined method Common_model_backend::get_all_offices() E:\wamp64\www\gsan\application\controllers\admin\Upgrade.php 17
ERROR - 2019-10-24 11:46:01 --> Query error: Table 'gsan.property' doesn't exist - Invalid query: SELECT *
FROM `property`
WHERE `object_id` = '89'
AND `class_name` = 'common\\models\\Company'
ERROR - 2019-10-24 11:46:28 --> Query error: Unknown column 'company_id' in 'field list' - Invalid query: UPDATE `contact` SET `position` = 'operations', `office_id` = '229', `company_id` = '86'
WHERE `id` = '215'
ERROR - 2019-10-24 13:00:08 --> Query error: Table 'gsan.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:02:36 --> Query error: Table 'gsan.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `country_id` = '3'
ERROR - 2019-10-24 13:06:00 --> Query error: Table 'gsan.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `country_id` = '96'
ERROR - 2019-10-24 13:06:06 --> Query error: Table 'gsan.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:06:51 --> Query error: Table 'gsan.fc_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_ports`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:07:10 --> Query error: Table 'gsan.fc_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_ports`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:21:23 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:21:24 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `country_id` IS NULL
ERROR - 2019-10-24 13:24:03 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '43'
ERROR - 2019-10-24 13:24:05 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '44'
ERROR - 2019-10-24 13:24:14 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '44'
ERROR - 2019-10-24 13:24:15 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '43'
ERROR - 2019-10-24 13:24:17 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '43'
ERROR - 2019-10-24 13:24:24 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '44'
ERROR - 2019-10-24 13:25:04 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '44'
ERROR - 2019-10-24 13:25:08 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '43'
ERROR - 2019-10-24 13:25:11 --> Query error: Table 'gsan.fc_sub_ports' doesn't exist - Invalid query: SELECT *
FROM `fc_sub_ports`
WHERE `port_id` = '43'
