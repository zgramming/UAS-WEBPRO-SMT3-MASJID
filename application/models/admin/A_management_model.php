<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_management_model extends CI_Model
{
    protected $tblManagement = "management";
    protected $tblManagementCategory = "management_category";
    public function getManagementByJoin()
    {
        $this->db->select('category.name as categoryManagement,management.id,management.name as nameManagement,management.birth_date,management.image');
        $this->db->from("" . $this->tblManagement . " as management");
        $this->db->join($this->tblManagementCategory . ' AS category', 'category.id = management.id_management_category');
        $result = $this->db->get()->result();

        return $result;
    }
}

/* End of file A_management_model.php */
