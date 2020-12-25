<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_home extends CI_Controller
{

    protected $_tblMosque = "mosque";
    protected $_tblKhutbah = "khutbah";
    protected $tblNews = "news";
    protected $tblInventory = "inventory";
    protected $tblInventoryCategory = "inventory_category";
    protected $tblSuggestion = "suggestion";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_khutbah_model', 'KhutbahModel');
        $this->load->model('admin/a_management_model', 'ManagementModel');
        $this->load->model('admin/a_inventory_model', 'InventoryModel');
    }

    function index()
    {
        $data['mosque'] = $this->db->get($this->_tblMosque, 1)->row();
        $data['khutbahs'] = $this->KhutbahModel->getKhutbahByJoin(null, 'khutbah.date');
        $data['managements'] = $this->ManagementModel->getManagementByJoin();
        $data['news'] = $this->db->get($this->tblNews)->result();
        $this->template_frontend->view("frontend/home", $data, "Beranda");
    }

    function khutbah()
    {
        $data['khutbahs'] = $this->KhutbahModel->getKhutbahByJoin(["khutbah.id !=", $this->uri->segment(2)], 'khutbah.date');
        $data['khutbah'] = $this->KhutbahModel->getKhutbahById($this->uri->segment(2));
        $this->template_frontend->view("frontend/detail_khutbah", $data, "Khutbah");
    }

    function news()
    {
        $data['news'] = $this->db->get_where($this->tblNews, ['id' => $this->uri->segment(2)])->row();
        $data['anotherNews'] = $this->db->get_where($this->tblNews, ['id !=' => $this->uri->segment(2)])->result();

        $this->template_frontend->view("frontend/detail_news", $data, "Berita / Agenda");
    }

    function inventory()
    {
        $data['inventories']  = $this->InventoryModel->getInventoryByJoin();
        $data['categoryInventories'] = $this->db->get($this->tblInventoryCategory)->result();;
        $this->template_frontend->view("frontend/inventory", $data, "Inventory");
    }

    function addSuggestion()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('suggestion', 'Saran & Masukkan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header('400');
            $this->data['message'] = validation_errors();
        } else {
            $data = [
                "email" => $this->input->post('email'),
                "suggestion" => $this->input->post('suggestion'),
                "created_date" => date('Y-m-d H:i:s')
            ];
            $this->db->insert($this->tblSuggestion, $data);

            $this->data['message'] = "Berhasil mengirimkan masukkan";
        }

        echo json_encode($this->data);
    }
}

/* End of file F_home.php */
