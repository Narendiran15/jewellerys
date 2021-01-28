
ALTER TABLE `fc_invoice` ADD `company_name` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `bill_to`, ADD `address1` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `company_name`, ADD `address2` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `address1`, ADD `city` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `address2`, ADD `state` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `city`, ADD `country` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `state`, ADD `zip` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `country`, ADD `description_text` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `zip`;

ALTER TABLE `fc_invoice` ADD `inv_desc` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `description_text`;

ALTER TABLE `fc_invoice` ADD `transfer_desc` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `description_text`;

ALTER TABLE `fc_invoice` ADD `company_mail` VARCHAR(255) NOT NULL AFTER `company_name`;