<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 9/21/2016
 * Time: 11:00 AM
 */
class Migration_Technician_item_create_view extends CI_Migration
{

    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {
        /*$this->db->query("SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';");

        $this->db->query(" 
        Create view technician_items AS
Select technician_hand_item_serial_no.* , technician_hand_item.ItemId , technician_hand.TechnicianId 
 from technician_hand_item_serial_no 
join technician_hand_item on
 technician_hand_item.TechnicianHandItemId = 
 technician_hand_item_serial_no.TechnicianHandItemId 
join technician_hand on 
technician_hand_item.TechnicianHandId = technician_hand.TechnicianHandId
        ");
        $this->db->query("SET SQL_MODE=@OLDTMP_SQL_MODE; ");*/
    }

    public function down()
    {
        $this->db->query("SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;");
        $this->db->query(" DROP VIEW `technician_items`;");
    }

}