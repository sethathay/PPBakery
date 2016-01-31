
/*
* Date: 28-01-2016
* By : Phou Lin
*/
ALTER TABLE `discounts` DROP `income_chart_account_id`, DROP `expense_chart_account_id`;

ALTER TABLE `products` ADD `discount_amount` INT NOT NULL AFTER `photo`;
ALTER TABLE `products` ADD `discount_percent` DOUBLE NOT NULL AFTER `discount_amount`;