<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/7/2016
 * Time: 11:42 AM
 */
class Migration_Item_purchase_trigger extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
      /*  $this->db->query("SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';");

        $this->db->query(" 
        CREATE TRIGGER `item_purchase_trigger` AFTER INSERT ON `item_purchase_detail` FOR EACH ROW begin 
            update item set AvaQty = AvaQty + new.Qty 
	        where  item.ItemId = new.ItemId ;
        END 
        ");
        $this->db->query("SET SQL_MODE=@OLDTMP_SQL_MODE; ");*/
    }

    public function down()
    {
        $this->db->query("SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;");
        $this->db->query(" DROP TRIGGER `item_purchase_trigger`;");
    }

}