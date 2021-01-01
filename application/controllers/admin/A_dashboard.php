<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        checkSession();
    }


    public function index()
    {
        $data = [];
        $this->template->display('admin/dashboard', $data, "Dashboard");
    }
}

/* End of file A_dashboard.php */
