<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_management extends CI_Controller
{
    protected $tblManagement = "management";
    protected $tblManagementCategory = "management_category";

    protected $pathFile = "./upload/admin/management/";

    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/a_management_model', 'ManagementModel');
    }

    public function index()
    {
        $data['managements'] = $this->ManagementModel->getManagementByJoin();
        $this->template->display('admin/management/management', $data, 'Management');
    }

    public function addForm()
    {
        $data['categories'] = $this->db->get_where($this->tblManagementCategory)->result();
        $this->template->display('admin/management/new_form', $data, 'Management');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');


        if ($this->form_validation->run() == TRUE) {

            $file = uploadFile("image", uniqid() . time(), $this->pathFile);
            if (empty($file['error'])) {
                $data = $this->postData();
                $data += ["image" => $file];

                $this->db->insert($this->tblManagement, $data);
                redirect(base_url('admin/management'));
            } else {
                $this->addForm();
            }
        } else {
            $this->addForm();
        }
    }

    public function delete()
    {
        deleteImage($this->tblManagement, ['id' => $this->uri->segment(3)], 'image', $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblManagement);
        redirect(base_url('admin/management'));
    }

    public function editForm()
    {
        $data['management'] = $this->db->get_where($this->tblManagement, ['id' => $this->uri->segment(3)])->row();
        $data['categories'] = $this->db->get($this->tblManagementCategory)->result();
        $this->template->display('admin/management/edit_form', $data, 'Management');
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == TRUE) {
            $file = uploadFile("image", $this->input->post('old_image'), $this->pathFile);
            if (empty($file['error'])) {

                $data = $this->postData(true, 'old_image');
                $data += ['image' => $file];
                $this->db->where('id', $this->uri->segment(3));
                $this->db->update($this->tblManagement, $data);
                redirect(base_url('admin/management'));
            } else {
                $this->editForm();
            }
        } else {
            $this->editForm();
        }
    }

    //* Category Section

    public function category()
    {
        $data['managementCategories'] = $this->db->get($this->tblManagementCategory)->result();
        $this->template->display('admin/management/category', $data, 'Jabatan Management');
    }

    public function categoryAddForm()
    {
        $data = [];
        $this->template->display('admin/management/category/new_form', $data, 'Tambah Jabatan Management');
    }
    public function categoryAdd()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->categoryPostData();
            $this->db->insert($this->tblManagementCategory, $data);
            redirect(base_url('admin/management/category'));
        } else {
            $this->categoryAddForm();
        }
    }
    public function categoryDelete()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblManagementCategory);
        redirect('admin/management/category');
    }
    public function categoryEditForm()
    {
        $data['category'] = $this->db->get_where($this->tblManagementCategory, ['id' => $this->uri->segment(3)])->row();
        $this->template->display('admin/management/category/edit_form', $data, 'Edit Jabatan Management');
    }
    public function categoryUpdate()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->categoryPostData(true);
            $this->db->where('id', $this->uri->segment(3));
            $this->db->update($this->tblManagementCategory, $data);
            redirect(base_url('admin/management/category'));
        } else {
            $this->categoryEditForm();
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
            "id_management_category" => $this->input->post('id_management_category'),
            "birth_date" => $this->input->post('birth_date'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }

    private function categoryPostData($isForUpdate = false)
    {
        if ($isForUpdate) {
            $x = "updated_date";
        } else {
            $x = "created_date";
        }

        $data = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description'),
            $x => date('Y-m-d H:i:s')
        ];
        return $data;
    }
}

/* End of file A_management.php */
