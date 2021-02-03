<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-02-01 18:09:16 --> Query error: Table 'career.fc_nt_category' doesn't exist - Invalid query: SELECT `c`.*, `sc`.*
FROM `fc_nt_category` as `c`
JOIN `fc_nt_subcategory` as `sc` ON `c`.`id`=`sc`.`cid`
WHERE `c`.`status` = 'active'
AND `sc`.`status` = 'active'
ORDER BY `o`.`id` DESC
ERROR - 2021-02-01 18:09:39 --> Query error: Table 'career.fc_nt_category' doesn't exist - Invalid query: SELECT `c`.*, `sc`.*
FROM `fc_nt_category` as `c`
JOIN `fc_nt_subcategory` as `sc` ON `c`.`id`=`sc`.`cid`
WHERE `c`.`status` = 'active'
AND `sc`.`status` = 'active'
ORDER BY `o`.`id` DESC
ERROR - 2021-02-01 18:10:57 --> Query error: Table 'jewellery.fc_users' doesn't exist - Invalid query: SELECT *
FROM `fc_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:11:24 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:12:50 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:12:51 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:13:54 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:13:55 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:13:55 --> Query error: Unknown column 'company_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_nt_users`
WHERE `company_id` IS NULL
ERROR - 2021-02-01 18:14:37 --> Query error: Unknown column 'o.id' in 'order clause' - Invalid query: SELECT `c`.*, `sc`.*
FROM `fc_nt_category` as `c`
JOIN `fc_nt_subcategory` as `sc` ON `c`.`id`=`sc`.`cid`
WHERE `c`.`status` = 'active'
AND `sc`.`status` = 'active'
ORDER BY `o`.`id` DESC
