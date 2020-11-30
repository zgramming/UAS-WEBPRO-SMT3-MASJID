<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_category_model extends CI_Model
{
    protected $_table = 'product_category';

    function add()
    {
        $data = [
            "name" => $this->input->post('name'),
            "information" => $this->input->post('information'),
            "created_date" => date('Y-m-d H:i:s'),
        ];
        $result = $this->db->insert($this->_table, $data);
        return $result;
    }
}

/* End of file A_category_model.php */
