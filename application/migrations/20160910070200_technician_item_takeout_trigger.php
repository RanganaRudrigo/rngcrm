<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/10/2016
 * Time: 7:02 AM
 */
class Migration_Technician_item_takeout_trigger extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
        $this->db->query("SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';");

        $this->db->query(" 
        CREATE TRIGGER `Technician_item_takeout_trigger` AFTER INSERT ON `technician_hand_item` FOR EACH ROW begin 
            update item set AvaQty = AvaQty - new.Qty 
	        where  item.ItemId = new.ItemId ;
        END 
        ");
        $this->db->query("SET SQL_MODE=@OLDTMP_SQL_MODE; ");
    }

    public function down()
    {
        $this->db->query("SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;");
        $this->db->query(" DROP TRIGGER `Technician_item_takeout_trigger`;");
    }

}