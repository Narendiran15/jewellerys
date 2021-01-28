<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-10-09 07:48:03 --> Query error: Expression #1 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'transdir.u.id' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `u`.`id`, `c`.`name`, `c`.`id` as `cid`, count(c.id) as visitor_count
FROM `fc_listings` as `u`
LEFT JOIN `fc_country` as `c` ON `u`.`country`=`c`.`name`
WHERE `u`.`country` != ''
GROUP BY `u`.`country`
