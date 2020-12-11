<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_khutbah extends CI_Controller
{
    protected $tblKhutbah = "khutbah";
    protected $tblKhutbahCategory = "khutbah_category";

    protected $tblUstadz = "ustadz";


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_khutbah_model', 'KhutbahModel');
    }

    public function index()
    {
        $data['khutbahs'] = $this->KhutbahModel->getKhutbahByJoin();

        $this->template->display("admin/khutbah/khutbah", $data, "Khutbah");
    }

    public function addForm()
    {
        $data['ustadz'] = $this->db->get($this->tblUstadz)->result();
        $data['khutbahCategories'] = $this->db->get($this->tblKhutbahCategory)->result();
        $this->template->display('admin/khutbah/new_form', $data, "Tambah Khutbah");
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('short_content', 'Deskripsi singkat', 'required');
        $this->form_validation->set_rules('date', 'Tanggal khutbah', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->postData();
            $this->db->insert($this->tblKhutbah, $data);
            redirect(base_url('admin/khutbah'));
        } else {
            $this->addForm();
        }
    }

    public function delete()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblKhutbah);
        redirect(base_url('admin/khutbah'));
    }

    public function editForm()
    {
        $data['ustadz'] = $this->db->get($this->tblUstadz)->result();
        $data['khutbahCategories'] = $this->db->get($this->tblKhutbahCategory)->result();
        $data['khutbah'] = $this->db->get_where($this->tblKhutbah, ['id' => $this->uri->segment(3)])->row();
        $this->template->display('admin/khutbah/edit_form', $data, "Edit Khutbah");
    }

    public function update()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('short_content', 'Deskripsi singkat', 'required');
        $this->form_validation->set_rules('date', 'Tanggal khutbah', 'required');


        if ($this->form_validation->run() == TRUE) {
            $data = $this->postData(true);
            $this->db->where('id', $this->uri->segment(3));
            $this->db->update($this->tblKhutbah, $data);
            redirect(base_url('admin/khutbah'));
        } else {
            $this->editForm();
        }
    }

    //! Kategori

    public function category()
    {
        $data['khutbahCategories'] = $this->db->get($this->tblKhutbahCategory)->result();
        $this->template->display('admin/khutbah/category', $data, "Kategori Khutbah");
    }

    public function categoryAddForm()
    {
        $data = [];
        $this->template->display('admin/khutbah/category/new_form', $data, "Tambah Kategori Khutbah");
    }

    public function categoryAdd()
    {
        $this->form_validation->set_rules('name', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');

        if ($this->form_validation->run() != FALSE) {
            $this->KhutbahModel->addCategory();
            redirect(base_url('admin/khutbah/category'));
        } else {
            $this->categoryAddForm();
        }
    }

    public function categoryDelete()
    {
        $this->db->where('id', $this->uri->segment(3));
        $result = $this->db->delete($this->tblKhutbahCategory);
        if ($result) {
            redirect(base_url('admin/khutbah/category'));
        }
    }

    public function categoryEditForm()
    {
        $data['category'] = $this->db->get_where($this->tblKhutbahCategory, ['id' => $this->uri->segment(3)])->row();
        $this->template->display('admin/khutbah/category/edit_form', $data, "Edit Kategori Khutbah");
    }

    public function categoryUpdate()
    {
        $this->db->where('id', $this->uri->segment(3));
        $data = $this->KhutbahModel->postDataCategory(true);
        $this->db->update($this->tblKhutbahCategory, $data);
        redirect(base_url('admin/khutbah/category'));
    }

    private function postData($isForUpdate = false)
    {

        if ($isForUpdate) {
            $x = "updated_date";
        } else {
            $x = "created_date";
        }

        $data = [
            "id_ustadz" => $this->input->post('id_ustadz'),
            "id_khutbah_category" => $this->input->post('id_khutbah_category'),
            "title" => $this->input->post('title'),
            "short_content" => $this->input->post('short_content'),
            "date" => $this->input->post('date'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_khutbah.php */
