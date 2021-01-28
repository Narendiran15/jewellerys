<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-12-10 07:34:02 --> Severity: Parsing Error --> syntax error, unexpected 'else' (T_ELSE) E:\wamp64\www\glsn\application\controllers\site\Landing.php 1533
ERROR - 2019-12-10 07:36:06 --> Query error: Unknown column 'c.website' in 'field list' - Invalid query: SELECT `o`.*, `c`.`name`, `c`.`website`, `c`.`trading_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
WHERE `c`.`status` = 'active'
AND `o`.`status` = 'active'
ORDER BY `o`.`id` DESC
ERROR - 2019-12-10 07:36:18 --> Query error: Unknown column 'c.website' in 'field list' - Invalid query: SELECT `o`.*, `c`.`name`, `c`.`website`, `c`.`trading_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
WHERE `c`.`status` = 'active'
AND `o`.`status` = 'active'
ORDER BY `o`.`id` DESC
ERROR - 2019-12-10 07:36:30 --> Query error: Unknown column 'c.website' in 'field list' - Invalid query: SELECT `o`.*, `c`.`name`, `c`.`website`, `c`.`trading_name`
FROM `fc_office` as `o`
JOIN `fc_company` as `c` ON `c`.`id`=`o`.`company_id`
WHERE `c`.`status` = 'active'
AND `o`.`status` = 'active'
ORDER BY `o`.`id` DESC
ERROR - 2019-12-10 07:54:35 --> Severity: Parsing Error --> syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ',' or ';' E:\wamp64\www\glsn\application\controllers\site\Landing.php 1545
ERROR - 2019-12-10 10:17:48 --> Query error: Table 'glsn.member_news' doesn't exist - Invalid query: SELECT *
FROM `MEMBER_NEWS`
WHERE `company_id` = '3'
ORDER BY `id` DESC
ERROR - 2019-12-10 10:41:18 --> Severity: Notice --> Undefined index: previllage E:\wamp64\www\glsn\application\core\MY_Controller.php 195
ERROR - 2019-12-10 10:41:18 --> Severity: Notice --> Undefined index: prev E:\wamp64\www\glsn\application\core\MY_Controller.php 196
ERROR - 2019-12-10 10:41:21 --> Query error: Table 'glsn.quotation' doesn't exist - Invalid query: SELECT count(c.id) as quotations_count
FROM `QUOTATION` as `c`
ERROR - 2019-12-10 10:41:25 --> Could not find the language line "error"
ERROR - 2019-12-10 10:41:25 --> Could not find the language line "forgot_password"
ERROR - 2019-12-10 10:41:25 --> Could not find the language line "submit"
ERROR - 2019-12-10 11:05:46 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) E:\wamp64\www\glsn\application\controllers\site\Landing.php 1737
ERROR - 2019-12-10 11:13:46 --> Query error: Table 'glsn.referrals' doesn't exist - Invalid query: SELECT `c`.`name` as `company_name`, `n`.*
FROM `REFERRALS` as `n`
LEFT JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
ORDER BY `id` ASC
ERROR - 2019-12-10 11:13:52 --> Query error: Table 'glsn.referrals' doesn't exist - Invalid query: SELECT `c`.`name` as `company_name`, `n`.*
FROM `REFERRALS` as `n`
LEFT JOIN `fc_company` as `c` ON `n`.`company_id`=`c`.`id`
ORDER BY `id` ASC
ERROR - 2019-12-10 12:00:55 --> Severity: Notice --> Undefined property: Landing::$user_model E:\wamp64\www\glsn\system\core\Model.php 77
ERROR - 2019-12-10 12:00:55 --> Severity: Error --> Call to a member function common_email_send() on null E:\wamp64\www\glsn\application\models\Mail_model.php 552
ERROR - 2019-12-10 12:03:01 --> Severity: Notice --> Undefined index: attachment E:\wamp64\www\glsn\application\core\MY_Model.php 622
