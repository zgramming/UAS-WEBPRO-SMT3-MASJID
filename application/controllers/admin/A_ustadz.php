<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_ustadz extends CI_Controller
{
    protected $tblUstadz = "ustadz";
    protected $pathFile = "./upload/admin/ustadz/";


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_ustadz_model', 'ustadzModel');
    }

    public function index()
    {
        $data['ustadz'] = $this->db->get($this->tblUstadz)->result();

        $this->template->display('admin/ustadz/ustadz', $data, 'Ustadz');
    }

    public function addForm()
    {
        $data = [];
        $this->template->display('admin/ustadz/new_form', $data, 'Ustadz');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = $this->postData();
            $this->db->insert($this->tblUstadz, $data);
            redirect(base_url('admin/ustadz'));
        } else {
            $this->addForm();
        }
    }

    public function delete()
    {
        deleteImage($this->tblUstadz, ["id" => $this->uri->segment(3)], "image", $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblUstadz);
        redirect(base_url('admin/ustadz'));
    }

    public function editForm()
    {
        $data['ustadz'] = $this->db->get_where($this->tblUstadz, ['id' => $this->uri->segment(3)])->row();
        $this->template->display('admin/ustadz/edit_form', $data, 'Ustadz');
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == TRUE or FALSE) {
            $data = $this->postData(true, "old_image");
            $this->db->where('id', $this->uri->segment(3));

            $this->db->update($this->tblUstadz, $data);
            redirect(base_url('admin/ustadz'));
        } else {
            $this->editForm();
        }
    }

    private function postData($isForUpdate = false, $oldImageName = null)
    {

        if ($isForUpdate) {
            $fileName = $this->input->post($oldImageName);
            $x = "updated_date";
        } else {
            $fileName = uniqid() . time();
            $x = "created_date";
        }

        $upload    = uploadFile("image", $fileName, $this->pathFile);

        $data = [
            "name" => $this->input->post('name'),
            "birth_date" => $this->input->post('birth_date'),
            "image" => $upload ?: $fileName,
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_ustadz.php */
