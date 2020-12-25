<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_inventory_model extends CI_Model
{
    protected $tblInventory = "inventory";
    protected $tblInventoryCategory = "inventory_category";

    public function getInventoryByJoin()
    {
        $this->db->select('category.name as nameCategory,inventory.*');
        $this->db->from($this->tblInventory . " AS inventory");
        $this->db->join($this->tblInventoryCategory . " AS category", 'category.id = inventory.id_inventory_category');
        $result = $this->db->get()->result();
        return $result;
    }
}

/* End of file A_inventory_model.php */
