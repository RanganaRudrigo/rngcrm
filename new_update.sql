ALTER TABLE `customer_item_serial_no`
	DROP PRIMARY KEY;

ALTER TABLE `customer_item_serial_no`
	ADD COLUMN `SerialNoId` INT UNSIGNED NOT NULL AUTO_INCREMENT FIRST,
	ADD PRIMARY KEY (`SerialNoId`);


 UPDATE customer_item_serial_no SET customer_item_serial_no.isDeleted= 0   , customer_item_serial_no.status = 0
 WHERE customer_item_serial_no.CustomerItemId IN (
 SELECT customer_item.CustomerItemDetailId FROM  customer_item
 JOIN customer_item_master ON customer_item_master.CustomerItemId = customer_item.CustomerItemId
 WHERE customer_item_serial_no.CustomerItemId AND  customer_item_master.`Status` = 0) ;

 ALTER TABLE `job_order`
 	ADD COLUMN `SerialNoId` INT NOT NULL AFTER `jobOrderNo`;

 UPDATE job_order  JOIN customer_item_serial_no ON customer_item_serial_no.SerialNo = job_order.SerialNo
 SET job_order.SerialNoId = customer_item_serial_no.SerialNoId;

ALTER TABLE `job_order_close`
	CHANGE COLUMN `StartTime` `StartTime` TIME NOT NULL AFTER `Note`;

ALTER TABLE `customer_item_serial_no`
	ADD COLUMN `note` VARCHAR(255) NULL DEFAULT NULL AFTER `reason`;




