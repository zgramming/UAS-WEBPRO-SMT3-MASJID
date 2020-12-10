<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_product_model extends CI_Model
{

    protected $_table = "products";
    protected $_tableCategory = "product_category";
    protected $_tableUnit = "product_unit";

    public function getProductWithJoin($id=null)
    {
        $this->db->select('product.*,category.name as nameCategory,unit.name as nameUnit');
        $this->db->from($this->_table . ' as product');
        $this->db->join($this->_tableCategory . ' as category', 'category.id_category = product.id_category');
        $this->db->join($this->_tableUnit . ' as unit', 'unit.id_unit = product.id_unit');
        if($id!=null || !empty($id)){
            $this->db->where('product.id_product', $id);
            return $this->db->get()->row();
            
        }
        return $this->db->get()->result();
    }
}

/* End of file A_product_model.php */
