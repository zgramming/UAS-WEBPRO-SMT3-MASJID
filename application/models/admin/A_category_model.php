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
            "order_position" => $this->input->post('order_position'),
            "created_date" => date('Y-m-d H:i:s'),
        ];
        $result = $this->db->insert($this->_table, $data);
        return $result;
    }

    function getLastOrderPosition()
    {
        $this->db->order_by('order_position', 'DESC');
        return ($this->db->get($this->_table, 1)->row()->order_position) + 1;
    }
}

/* End of file A_category_model.php */
