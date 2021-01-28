<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-13 05:35:39 --> The upload path does not appear to be valid.
ERROR - 2019-12-13 05:49:28 --> Severity: Notice --> Use of undefined constant GALLERY - assumed 'GALLERY' E:\wamp64\www\glsn\application\controllers\admin\Summits.php 223
ERROR - 2019-12-13 05:49:28 --> Query error: Table 'glsn.gallery' doesn't exist - Invalid query: SELECT *
FROM `GALLERY`
ERROR - 2019-12-13 05:50:02 --> Severity: Notice --> Use of undefined constant GALLERY - assumed 'GALLERY' E:\wamp64\www\glsn\application\controllers\admin\Summits.php 223
ERROR - 2019-12-13 05:50:02 --> Query error: Table 'glsn.gallery' doesn't exist - Invalid query: SELECT *
FROM `GALLERY`
ERROR - 2019-12-13 05:50:08 --> Severity: Notice --> Use of undefined constant GALLERY - assumed 'GALLERY' E:\wamp64\www\glsn\application\controllers\admin\Summits.php 223
ERROR - 2019-12-13 05:50:08 --> Query error: Table 'glsn.gallery' doesn't exist - Invalid query: SELECT *
FROM `GALLERY`
ERROR - 2019-12-13 06:08:39 --> Query error: Table 'glsn.contact_list' doesn't exist - Invalid query: SELECT *
FROM `CONTACT_LIST`
WHERE `position` = 'primary'
AND `office_id` = '0'
AND `comp_id` = '3'
ERROR - 2019-12-13 06:55:56 --> Query error: Table 'glsn.hear' doesn't exist - Invalid query: select name from HEAR where id='0'
ERROR - 2019-12-13 06:56:11 --> Query error: Table 'glsn.fc_hear' doesn't exist - Invalid query: select name from fc_hear where id='0'
ERROR - 2019-12-13 06:56:26 --> Query error: Unknown column 'name' in 'field list' - Invalid query: select name from fc_hears where id='0'
ERROR - 2019-12-13 07:20:32 --> Query error: Table 'glsn.references' doesn't exist - Invalid query: SELECT *
FROM `REFERENCES`
WHERE `company_id` = '3'
ERROR - 2019-12-13 07:21:35 --> Query error: Table 'glsn.references' doesn't exist - Invalid query: SELECT *
FROM `REFERENCES`
WHERE `company_id` = '3'
ERROR - 2019-12-13 07:22:32 --> Query error: Table 'glsn.contact_list' doesn't exist - Invalid query: SELECT *
FROM `CONTACT_LIST`
WHERE `position` = 'primary'
AND `office_id` = '0'
AND `comp_id` = '3'
ERROR - 2019-12-13 07:23:07 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `country_id` = '87'
ERROR - 2019-12-13 10:13:22 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT `o`.*, `cy`.`name` as `country_name`, `p`.`name` as `port_name`, `c`.`trading_name` as `company_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
JOIN `fc_country` as `cy` ON `cy`.`id`=`o`.`country_id`
JOIN `PORTS` as `p` ON `p`.`id`=`o`.`port_id`
ORDER BY `c`.`id` DESC
ERROR - 2019-12-13 10:31:53 --> Could not find the language line "error"
ERROR - 2019-12-13 10:31:53 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 10:31:53 --> Could not find the language line "submit"
ERROR - 2019-12-13 10:32:01 --> Could not find the language line "error"
ERROR - 2019-12-13 10:32:01 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 10:32:01 --> Could not find the language line "submit"
ERROR - 2019-12-13 10:32:03 --> Could not find the language line "error"
ERROR - 2019-12-13 10:32:03 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 10:32:03 --> Could not find the language line "submit"
ERROR - 2019-12-13 10:35:42 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT `o`.*, `cy`.`name` as `country_name`, `p`.`name` as `port_name`, `c`.`trading_name` as `company_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
JOIN `fc_country` as `cy` ON `cy`.`id`=`o`.`country_id`
JOIN `PORTS` as `p` ON `p`.`id`=`o`.`port_id`
ORDER BY `c`.`id` DESC
ERROR - 2019-12-13 10:36:42 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT `o`.*, `cy`.`name` as `country_name`, `p`.`name` as `port_name`, `c`.`trading_name` as `company_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
JOIN `fc_country` as `cy` ON `cy`.`id`=`o`.`country_id`
JOIN `PORTS` as `p` ON `p`.`id`=`o`.`port_id`
ORDER BY `c`.`id` DESC
ERROR - 2019-12-13 10:38:28 --> Query error: Unknown column 'o.port_id' in 'on clause' - Invalid query: SELECT `o`.*, `cy`.`name` as `country_name`, `p`.`short_code` as `port_name`, `c`.`trading_name` as `company_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
JOIN `fc_country` as `cy` ON `cy`.`id`=`o`.`country_id`
JOIN `fc_iata` as `p` ON `p`.`id`=`o`.`port_id`
ORDER BY `c`.`id` DESC
ERROR - 2019-12-13 10:41:53 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `id` IS NULL
ERROR - 2019-12-13 10:45:22 --> Severity: Error --> Call to undefined function get_port_name() E:\wamp64\www\glsn\application\controllers\admin\Office.php 899
ERROR - 2019-12-13 10:52:20 --> Query error: Table 'glsn.ports' doesn't exist - Invalid query: SELECT *
FROM `PORTS`
WHERE `id` IS NULL
ERROR - 2019-12-13 10:54:20 --> Could not find the language line "error"
ERROR - 2019-12-13 10:54:20 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 10:54:20 --> Could not find the language line "submit"
ERROR - 2019-12-13 11:37:21 --> Severity: Warning --> Missing argument 2 for Mailing_list::delete_mailing_list() E:\wamp64\www\glsn\application\controllers\admin\Mailing_list.php 126
ERROR - 2019-12-13 11:37:29 --> Severity: Warning --> Missing argument 2 for Mailing_list::delete_mailing_list() E:\wamp64\www\glsn\application\controllers\admin\Mailing_list.php 126
ERROR - 2019-12-13 11:37:42 --> Severity: Warning --> Missing argument 2 for Mailing_list::delete_mailing_list() E:\wamp64\www\glsn\application\controllers\admin\Mailing_list.php 126
ERROR - 2019-12-13 13:49:41 --> Could not find the language line "error"
ERROR - 2019-12-13 13:49:42 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 13:49:42 --> Could not find the language line "submit"
ERROR - 2019-12-13 14:07:21 --> Severity: Notice --> Undefined index: description E:\wamp64\www\glsn\application\controllers\admin\Summits.php 135
ERROR - 2019-12-13 14:07:21 --> Severity: Notice --> Undefined index: name E:\wamp64\www\glsn\application\controllers\admin\Summits.php 138
ERROR - 2019-12-13 14:07:21 --> Severity: Notice --> Undefined index: start_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 138
ERROR - 2019-12-13 14:07:21 --> Severity: Notice --> Undefined index: end_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 138
ERROR - 2019-12-13 14:07:21 --> Query error: Unknown column 'company_id' in 'field list' - Invalid query: INSERT INTO `fc_summits` (`company_id`, `summits_id`, `description`) VALUES ('5', '1', '')
ERROR - 2019-12-13 14:09:04 --> Severity: Notice --> Undefined variable: id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 83
ERROR - 2019-12-13 14:09:04 --> Query error: Unknown column 'summits_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_assign_summits`
WHERE `company_id` = '5'
AND `summits_id` = '1'
ERROR - 2019-12-13 14:09:10 --> Severity: Notice --> Undefined variable: id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 83
ERROR - 2019-12-13 14:09:10 --> Query error: Unknown column 'summits_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_assign_summits`
WHERE `company_id` = '5'
AND `summits_id` = '1'
ERROR - 2019-12-13 14:09:45 --> Severity: Notice --> Undefined variable: id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 83
ERROR - 2019-12-13 14:09:45 --> Severity: Notice --> Undefined index: summits_id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 85
ERROR - 2019-12-13 14:09:45 --> Query error: Unknown column 'summits_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_assign_summits`
WHERE `company_id` = '5'
AND `summits_id` IS NULL
ERROR - 2019-12-13 14:09:49 --> Severity: Notice --> Undefined variable: id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 83
ERROR - 2019-12-13 14:09:49 --> Severity: Notice --> Undefined index: summits_id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 85
ERROR - 2019-12-13 14:09:49 --> Query error: Unknown column 'summits_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_assign_summits`
WHERE `company_id` = '5'
AND `summits_id` IS NULL
ERROR - 2019-12-13 14:11:45 --> Severity: Notice --> Undefined index: summits_id E:\wamp64\www\glsn\application\controllers\admin\Summits.php 86
ERROR - 2019-12-13 14:11:45 --> Query error: Unknown column 'summits_id' in 'where clause' - Invalid query: SELECT *
FROM `fc_assign_summits`
WHERE `company_id` = '5'
AND `summits_id` IS NULL
ERROR - 2019-12-13 14:13:57 --> Could not find the language line "error"
ERROR - 2019-12-13 14:13:57 --> Could not find the language line "forgot_password"
ERROR - 2019-12-13 14:13:57 --> Could not find the language line "submit"
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 317
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 318
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 319
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$name E:\wamp64\www\glsn\application\controllers\admin\Summits.php 339
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$venue E:\wamp64\www\glsn\application\controllers\admin\Summits.php 340
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$start_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 341
ERROR - 2019-12-13 14:19:15 --> Severity: Notice --> Undefined property: stdClass::$end_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 342
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 317
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 318
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$status E:\wamp64\www\glsn\application\controllers\admin\Summits.php 319
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$name E:\wamp64\www\glsn\application\controllers\admin\Summits.php 339
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$venue E:\wamp64\www\glsn\application\controllers\admin\Summits.php 340
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$start_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 341
ERROR - 2019-12-13 14:19:34 --> Severity: Notice --> Undefined property: stdClass::$end_date E:\wamp64\www\glsn\application\controllers\admin\Summits.php 342
ERROR - 2019-12-13 14:22:30 --> Severity: Notice --> Undefined variable: view E:\wamp64\www\glsn\application\controllers\admin\Summits.php 336
ERROR - 2019-12-13 14:24:01 --> Severity: Parsing Error --> syntax error, unexpected end of file E:\wamp64\www\glsn\application\views\admin\summits\assign_summits.php 125
