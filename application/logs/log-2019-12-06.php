<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-06 10:57:00 --> Query error: Unknown column 'c.membership_status' in 'where clause' - Invalid query: SELECT count(c.id) as founder_members
FROM `fc_company` as `c`
WHERE `c`.`membership_status` = 'founder'
ERROR - 2019-12-06 10:57:09 --> Query error: Unknown column 'c.membership_status' in 'where clause' - Invalid query: SELECT count(c.id) as founder_members
FROM `fc_company` as `c`
WHERE `c`.`membership_status` = 'founder'
ERROR - 2019-12-06 10:57:19 --> Could not find the language line "error"
ERROR - 2019-12-06 10:57:19 --> Could not find the language line "forgot_password"
ERROR - 2019-12-06 10:57:19 --> Could not find the language line "submit"
ERROR - 2019-12-06 13:33:12 --> Severity: Notice --> Undefined index: previllage E:\wamp64\www\glsn\application\core\MY_Controller.php 195
ERROR - 2019-12-06 13:33:12 --> Severity: Notice --> Undefined index: prev E:\wamp64\www\glsn\application\core\MY_Controller.php 196
ERROR - 2019-12-06 13:33:14 --> Query error: Unknown column 'c.membership_status' in 'where clause' - Invalid query: SELECT count(c.id) as founder_members
FROM `fc_company` as `c`
WHERE `c`.`membership_status` = 'founder'
ERROR - 2019-12-06 14:33:58 --> Severity: Notice --> Undefined property: stdClass::$first_port E:\wamp64\www\glsn\application\views\admin\fees\edit_fees.php 31
ERROR - 2019-12-06 14:33:58 --> Severity: Notice --> Undefined property: stdClass::$next4_port E:\wamp64\www\glsn\application\views\admin\fees\edit_fees.php 35
ERROR - 2019-12-06 14:33:58 --> Severity: Notice --> Undefined property: stdClass::$additonal_port E:\wamp64\www\glsn\application\views\admin\fees\edit_fees.php 39
ERROR - 2019-12-06 14:33:58 --> Severity: Notice --> Undefined property: stdClass::$advert_fee E:\wamp64\www\glsn\application\views\admin\fees\edit_fees.php 43
ERROR - 2019-12-06 14:43:03 --> Query error: Unknown column 'top_listed_member' in 'field list' - Invalid query: UPDATE `fc_company` SET `march` = '1', `october` = '1', `featured_member` = '1', `top_listed_member` = '1', `debts` = '2', `olp` = '1', `riege_software` = '1', `cargowise_software` = '1', `networkpay` = '1', `buytasker` = '1', `multi_currency` = '1', `gsan` = '1', `featured_member_fee` = '250.00', `top_listed_member_fee` = '', `debts_fee` = '300.00', `application_fee` = '1250.00', `branch_fee` = '250.00', `status` = 'new', `reg_step` = '4'
WHERE `id` = '3'
ERROR - 2019-12-06 14:48:01 --> Query error: Table 'glsn.advertising' doesn't exist - Invalid query: SELECT *
FROM `ADVERTISING`
WHERE `company_id` = '3'
ERROR - 2019-12-06 14:49:45 --> Query error: Table 'glsn.contact_list' doesn't exist - Invalid query: SELECT *
FROM `CONTACT_LIST`
WHERE `position` = 'primary'
AND `office_id` = '0'
AND `comp_id` = '3'
