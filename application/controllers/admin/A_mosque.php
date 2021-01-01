<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_mosque extends CI_Controller
{

    protected $_tableMosque = "mosque";
    protected $pathFile = "./upload/admin/mosque/";


    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/a_mosque_model', "MosqueModel");

        $mosque = $this->db->get($this->_tableMosque)->result_array();

        if (count($mosque) <= 0) {

            $mosqueData = [
                "name" => "Al-Baraqah",
                "latitude" => 0,
                "longitude" => 0,
                "address" => "---",
                "background_image" => "default.png",
                "created_date" => date('Y-m-d H:i:s'),
            ];
            $this->db->insert($this->_tableMosque, $mosqueData);
        }
    }


    public function index()
    {
        $data['mosque'] = $this->db->get($this->_tableMosque, 1)->row();

        $this->template->display("admin/mosque/mosque", $data, "Masjid");
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('description', 'Tentang Masjid', 'required');

        $mosque = $this->db->get($this->_tableMosque, 1)->row();
        if ($this->form_validation->run() == TRUE or FALSE) {
            $file = uploadFile("background_image", $this->input->post('old_image'), $this->pathFile);
            $data = $this->postData(true);

            if (empty($file['error'])) $data += ['background_image' => $file];

            $this->db->where('id', $mosque->id);

            $result = $this->db->update($this->_tableMosque, $data);

            redirect(base_url('admin/mosque'));
        } else {
            $this->index();
        }
    }

    private function postData($isForUpdate = false)
    {

        if ($isForUpdate) {
            $x = "updated_date";
        } else {
            $x = "created_date";
        }


        $data = [
            "name" => $this->input->post('name'),
            "address" => $this->input->post('address'),
            "description" => $this->input->post('description'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_mosque.php */
