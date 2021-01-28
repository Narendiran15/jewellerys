<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-09 06:15:05 --> Query error: Not unique table/alias: 'c' - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_company` as `c`
JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
GROUP BY `u`.`country_id`
ERROR - 2019-11-09 06:17:51 --> Query error: Unknown column 'u.id' in 'field list' - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_company` as `c`
GROUP BY `c`.`country_id`
ERROR - 2019-11-09 06:18:01 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'gsan.c.name' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_company` as `c`
GROUP BY `c`.`country_id`
ERROR - 2019-11-09 06:18:16 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'gsan.c.name' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `c`.`name`
FROM `fc_company` as `c`
GROUP BY `c`.`country_id`
ERROR - 2019-11-09 06:20:16 --> Query error: Not unique table/alias: 'c' - Invalid query: SELECT `c`.`country_id`, count(c.country_id) as visitor_count
FROM `fc_company` as `c`
JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
GROUP BY `c`.`country_id`
ERROR - 2019-11-09 07:31:10 --> Could not find the language line "error"
ERROR - 2019-11-09 07:31:10 --> Could not find the language line "forgot_password"
ERROR - 2019-11-09 07:31:10 --> Could not find the language line "submit"
ERROR - 2019-11-09 09:14:50 --> Could not find the language line "error"
ERROR - 2019-11-09 09:14:50 --> Could not find the language line "forgot_password"
ERROR - 2019-11-09 09:14:50 --> Could not find the language line "submit"
ERROR - 2019-11-09 09:15:22 --> Could not find the language line "error"
ERROR - 2019-11-09 09:15:22 --> Could not find the language line "forgot_password"
ERROR - 2019-11-09 09:15:22 --> Could not find the language line "submit"
ERROR - 2019-11-09 09:16:19 --> Query error: Unknown column 'updated' in 'order clause' - Invalid query: SELECT `c`.*
FROM `fc_company` as `c`
ORDER BY date(updated) DESC
ERROR - 2019-11-09 09:19:09 --> Query error: Unknown column 'updated' in 'order clause' - Invalid query: SELECT `c`.*
FROM `fc_company` as `c`
ORDER BY date(updated) DESC
ERROR - 2019-11-09 09:19:36 --> Query error: Unknown column 'updated' in 'order clause' - Invalid query: SELECT `c`.*
FROM `fc_company` as `c`
ORDER BY date(updated) DESC
ERROR - 2019-11-09 09:19:40 --> Query error: Unknown column 'updated' in 'order clause' - Invalid query: SELECT `c`.*
FROM `fc_company` as `c`
ORDER BY date(updated) DESC
ERROR - 2019-11-09 09:23:13 --> Query error: Column 'updated_at' in order clause is ambiguous - Invalid query: SELECT `c`.*, `cy`.`name`
FROM `fc_company` as `c`
JOIN `fc_country` as `cy` ON `cy`.`id`=`c`.`country_id`
ORDER BY date(updated_at) DESC
ERROR - 2019-11-09 09:23:18 --> Query error: Column 'updated_at' in order clause is ambiguous - Invalid query: SELECT `c`.*, `cy`.`name`
FROM `fc_company` as `c`
JOIN `fc_country` as `cy` ON `cy`.`id`=`c`.`country_id`
ORDER BY date(updated_at) DESC
ERROR - 2019-11-09 12:29:09 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 E:\wamp64\www\gsan\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2019-11-09 12:29:09 --> Unable to connect to the database
ERROR - 2019-11-09 12:35:27 --> Could not find the language line "error"
ERROR - 2019-11-09 12:35:27 --> Could not find the language line "forgot_password"
ERROR - 2019-11-09 12:35:27 --> Could not find the language line "submit"
