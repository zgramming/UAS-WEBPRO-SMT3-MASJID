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
    }

    public function index()
    {
        $data['categories'] = $this->db->get($this->_tableCategory_table)->result();
        $data['units'] = $this->db->get($this->_tableUnit)->result();
        $this->template_frontend->display('frontend/home', $data);
    }
}

/* End of file F_home.php */
