<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-05 05:32:37 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 E:\wamp64\www\gsan\system\database\drivers\mysqli\mysqli_driver.php 202
ERROR - 2019-11-05 05:32:37 --> Unable to connect to the database
ERROR - 2019-11-05 06:23:24 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT *
FROM `fc_company`
WHERE `username` = 'gm'
AND 0 = `Array`
ERROR - 2019-11-05 06:26:12 --> Query error:  - Invalid query: 
ERROR - 2019-11-05 06:27:11 --> Query error:  - Invalid query: 
ERROR - 2019-11-05 06:27:16 --> Query error:  - Invalid query: 
ERROR - 2019-11-05 10:44:07 --> Query error: Unknown column 'ts.status' in 'where clause' - Invalid query: SELECT `o`.*, `cy`.`name` as `company_name`, `co`.`name` as `country_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `cy` ON `cy`.`id`=`o`.`company_id`
JOIN `fc_country` as `co` ON `co`.`id`=`o`.`country_id`
WHERE `ts`.`status` = "1" and ((ts.type = "0") or (`ts`.`type` = "1") or (`ts`.`type` > 1 and date(ts.validity_date) >= "2019-11-05") )
ORDER BY `o`.`id` DESC
 LIMIT 8
