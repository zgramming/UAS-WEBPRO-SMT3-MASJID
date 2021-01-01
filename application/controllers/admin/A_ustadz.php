<?php
defined('BASEPATH') or exit('No direct script access allowed');

class A_ustadz extends CI_Controller
{
    protected $tblUstadz = "ustadz";
    protected $pathFile = "./upload/admin/ustadz/";


    public function __construct()
    {
        parent::__construct();
        checkSession();
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


        if ($this->form_validation->run() ==  FALSE) {
            return $this->addForm();
        }
        $data = $this->postData();

        $file = uploadFile("image", uniqid() . time(), $this->pathFile);

        if (!empty($file['error'])) {
            $this->session->set_flashdata('error_file', $file['error']);
        }
        $data += ["image" => $file];

        $this->db->insert($this->tblUstadz, $data);
        return redirect(base_url('admin/ustadz'));
    }

    public function delete()
    {
        deleteImage($this->tblUstadz, ["id" => $this->uri->segment(3)], "image", $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblUstadz);
        return redirect(base_url('admin/ustadz'));
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

        if ($this->form_validation->run() ==  FALSE) {
            return $this->editForm();
        }
        $data = $this->postData();

        $file = $this->input->post('old_image');

        if (!empty($_FILES['image']['name'])) {
            $file = uploadFile("image", $file, $this->pathFile);

            if (!empty($file['error'])) {
                $this->session->set_flashdata('error_file', $file['error']);
                return $this->editForm();
            }
        }

        $data += ["image" => $file];

        $this->db->where('id', $this->uri->segment(3));

        $this->db->update($this->tblUstadz, $data);
        return redirect(base_url('admin/ustadz'));
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
            "birth_date" => $this->input->post('birth_date'),
            $x => date('Y-m-d H:i:s'),
        ];

        return $data;
    }
}

/* End of file A_ustadz.php */
