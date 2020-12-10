<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_home extends CI_Controller
{
    protected $_table = "products";
    protected $_tableCategory = "product_category";
    protected $_tableUnit = "product_unit";


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_product_model','productModel');
        
    }

    public function index()
    {
        $data['categories'] = $this->db
            ->order_by('order_position')
            ->get($this->_tableCategory)
            ->result();
        $data['units'] = $this->db->get($this->_tableUnit)->result();
        $data['products'] = $this->db->get($this->_table)->result();

        $this->template_frontend->display('frontend/home', $data);
    }

    public function detail()
    {
        // $data['product'] = $this->db->get_where($this->_table, ['id_product' => $this->uri->segment(2)])->row();
        $data['product'] = $this->productModel->getProductWithJoin($this->uri->segment(2));
        $data['products'] = $this->db->get_where($this->_table, ['id_product !=' => $this->uri->segment(2)])->result();
        $this->template_frontend->display('frontend/detail', $data);
    }
}

/* End of file F_home.php */
