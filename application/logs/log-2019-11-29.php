<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-11-29 06:27:54 --> Severity: Notice --> Use of undefined constant COMPANY - assumed 'COMPANY' E:\wamp64\www\glsn\application\core\MY_Controller.php 119
ERROR - 2019-11-29 06:27:54 --> Query error: Table 'glsn.company' doesn't exist - Invalid query: SELECT *
FROM `COMPANY`
WHERE `id` IS NULL
ERROR - 2019-11-29 06:29:16 --> Query error: Table 'glsn.whyselect' doesn't exist - Invalid query: SELECT *
FROM `WHYSELECT`
ORDER BY `id` ASC
ERROR - 2019-11-29 06:34:00 --> Severity: Compile Error --> Cannot redeclare Landing::member_application() E:\wamp64\www\glsn\application\controllers\site\Landing.php 31
ERROR - 2019-11-29 06:57:03 --> Severity: Notice --> Use of undefined constant COMPANY - assumed 'COMPANY' E:\wamp64\www\glsn\application\core\MY_Controller.php 118
ERROR - 2019-11-29 06:57:03 --> Query error: Table 'glsn.company' doesn't exist - Invalid query: SELECT *
FROM `COMPANY`
WHERE `id` IS NULL
ERROR - 2019-11-29 13:36:38 --> Query error: Unknown column 'c.membership_status' in 'where clause' - Invalid query: SELECT count(c.id) as founder_members
FROM `fc_company` as `c`
WHERE `c`.`membership_status` = 'founder'
ERROR - 2019-11-29 13:36:47 --> Could not find the language line "error"
ERROR - 2019-11-29 13:36:47 --> Could not find the language line "forgot_password"
ERROR - 2019-11-29 13:36:47 --> Could not find the language line "submit"
ERROR - 2019-11-29 13:36:57 --> Could not find the language line "error"
ERROR - 2019-11-29 13:36:57 --> Could not find the language line "forgot_password"
ERROR - 2019-11-29 13:36:57 --> Could not find the language line "submit"
ERROR - 2019-11-29 13:37:27 --> Could not find the language line "error"
ERROR - 2019-11-29 13:37:27 --> Could not find the language line "forgot_password"
ERROR - 2019-11-29 13:37:27 --> Could not find the language line "submit"
ERROR - 2019-11-29 13:37:32 --> Severity: Notice --> Use of undefined constant REGION - assumed 'REGION' E:\wamp64\www\glsn\application\models\Common_model_backend.php 423
ERROR - 2019-11-29 13:37:32 --> Query error: Table 'glsn.region' doesn't exist - Invalid query: SELECT `c`.*, `r`.`name` as `region_name`
FROM `fc_country` as `c`
LEFT JOIN `REGION` as `r` ON `c`.`region_id`=`r`.`id`
ORDER BY `id` ASC
ERROR - 2019-11-29 15:07:53 --> Query error: Unknown column 'state' in 'field list' - Invalid query: INSERT INTO `fc_company` (`country_id`, `password`, `slug`, `name`, `trading_name`, `contact_name`, `email`, `linkedin_link`, `facebook_link`, `description`, `address1`, `address2`, `city`, `state`, `zip`, `mobile`, `fax`, `corp_email`, `corp_website`, `no_of_employees`, `annual_revenue`, `licenses`, `software`, `year_started`, `tax_id`, `hear_about`, `others`, `created_at`, `updated_at`, `locations`, `logo`) VALUES ('87', 'e10adc3949ba59abbe56e057f20f883e', 'pictuscode-pvt-ltd', 'Pictuscode Pvt Ltd', 'Pictuscode Pvt Ltd', 'Siva', 'siva.pictuscode@gmail.com', 'siva33', 'siva33', 'Egestas integer eget aliquet nibh praesent tristique. Vulputate mi sit amet mauris. Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra.', 'No: 2/2 Tank Street', 'VC Mottur', 'Walajapet', 'Tamilnadu', '632513', '+91 9789355048', '+91 9789355048', 'siva@pictuscode.com', 'www.pictuscode.com', '25', '25000', 'I3525', 'SAP', '1992', 'I2535', '4', '', '2019-11-29', '2019-11-29', '708,709,710', '5e2bae27801ce62bca093cd66bc9a9b1.jpg')
ERROR - 2019-11-29 15:10:32 --> Query error: Unknown column 'state' in 'field list' - Invalid query: INSERT INTO `fc_company` (`country_id`, `password`, `slug`, `name`, `trading_name`, `contact_name`, `email`, `linkedin_link`, `facebook_link`, `description`, `address1`, `address2`, `city`, `state`, `zip`, `mobile`, `fax`, `corp_email`, `corp_website`, `no_of_employees`, `annual_revenue`, `licenses`, `software`, `year_started`, `tax_id`, `hear_about`, `others`, `created_at`, `updated_at`, `locations`, `logo`) VALUES ('87', 'e10adc3949ba59abbe56e057f20f883e', 'pictuscode-pvt-ltd', 'Pictuscode Pvt Ltd', 'Pictuscode Pvt Ltd', 'Siva', 'siva.pictuscode@gmail.com', 'siva33', 'siva33', 'Egestas integer eget aliquet nibh praesent tristique. Vulputate mi sit amet mauris. Sodales neque sodales ut etiam sit. Dignissim suspendisse in est ante in. Volutpat commodo sed egestas egestas. Felis donec et odio pellentesque diam. Pharetra vel turpis nunc eget lorem dolor sed viverra.', 'No: 2/2 Tank Street', 'VC Mottur', 'Walajapet', 'Tamilnadu', '632513', '+91 9789355048', '+91 9789355048', 'siva@pictuscode.com', 'www.pictuscode.com', '25', '25000', 'I3525', 'SAP', '1992', 'I2535', '4', '', '2019-11-29', '2019-11-29', '708,709,710', '506e64b0b7d4fe7321a45176a7d41853.jpg')
ERROR - 2019-11-29 15:11:37 --> Query error: Table 'glsn.office' doesn't exist - Invalid query: SELECT *
FROM `OFFICE`
WHERE `iata_id` IS NULL
AND `country_id` = '87'
AND `company_id` = 2
ERROR - 2019-11-29 15:27:22 --> Query error: Unknown column 'username' in 'where clause' - Invalid query: SELECT *
FROM `fc_company`
WHERE `username` = 'siva.pictuscode@gmail.com'
AND `status` = '0'
ERROR - 2019-11-29 15:27:26 --> Query error: Unknown column 'username' in 'where clause' - Invalid query: SELECT *
FROM `fc_company`
WHERE `username` = 'siva.pictuscode@gmail.com'
AND `status` = '0'
