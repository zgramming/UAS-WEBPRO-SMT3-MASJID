<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_user_access extends CI_Controller
{

    protected $tblUser = "user";
    protected $pathFile = "./upload/admin/user/";

    public function __construct()
    {
        parent::__construct();
        checkSession();
    }


    public function index()
    {

        $data['users'] = $this->db->get($this->tblUser)->result();
        $this->template->display("admin/user_access/UserAccess", $data, "User Akses");
    }

    public function addForm()
    {
        $data['user'] = $this->db->get_where($this->tblUser, ['id' => $this->uri->segment(3)])->row();
        $this->template->display("admin/user_access/new_form", $data, "Tambah User");
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama User', 'required');
        $this->form_validation->set_rules('email', 'Email User', 'required');
        $this->form_validation->set_rules('password', 'Password User', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            return $this->addForm();
        }
        $data = $this->postData();

        $file  = uploadFile("image", uniqid() . time(), $this->pathFile);

        if (!empty($file['error'])) {
            $this->session->set_flashdata('error_file', $file['error']);
            return $this->addForm();
        }

        $data += ["image" => $file];

        $insert = $this->db->insert($this->tblUser, $data);

        if (!$insert) {
            $this->session->set_flashdata('error_insert', 'Gagal menambahkan user');
            return $this->addForm();
        }

        return redirect(base_url("admin/user-akses"));
    }

    public function editForm()
    {
        $data['user'] = $this->db->get_where($this->tblUser, ['id' => $this->uri->segment(3)])->row();
        $this->template->display("admin/user_access/edit_form", $data, "Edit User");
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama User', 'required');
        $this->form_validation->set_rules('email', 'Email User', 'required');
        $this->form_validation->set_rules('password', 'Password User', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            return $this->editForm();
        }
        $data = $this->postData(true);

        $file = $this->input->post('old_image');

        if (!empty($_FILES['image']['name'])) {
            $file = uploadFile("image", $file, $this->pathFile);
        }

        if (!empty($file['error'])) {
            $this->session->set_flashdata('error_file', $file['error']);
            return $this->editForm();
        }

        $data += ["image" => $file];

        $this->db->where('id', $this->uri->segment(3));
        $this->db->update($this->tblUser, $data);
        return redirect(base_url("admin/user-akses"));
    }

    public function delete()
    {
        deleteImage($this->tblUser, ["id" => $this->uri->segment(3)], "image", $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblUser);
        return redirect(base_url("admin/user-akses"));
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
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_user_access.php */
