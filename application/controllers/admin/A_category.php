<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_category extends CI_Controller
{
    protected $_table = "product_category";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_category_model', "CategoryModel");
    }

    public function index()
    {
        $data = array(
            'title' => 'Contoh penggunaan template pada Codeigniter',
            'isi' => 'Ini isi Contoh penggunaan template pada Codeinginter'
        );
        $data['categories'] = $this->db->get($this->_table)->result();
        $this->template->display('admin/category', $data, "Kategori");
    }


    public function addForm()
    {
        $data['lastOrderPosition'] = $this->CategoryModel->getLastOrderPosition();
        $this->template->display('admin/category/new_form', $data, "Tambah Kategori");
    }

    public function editForm()
    {
        $data['category'] = $this->db->get_where(
            $this->_table,
            ['id_category' => $this->uri->segment(3)],
        )->row();
        $this->template->display('admin/category/edit_form', $data, "Edit Kategori");
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('information', 'Keterangan', 'required');
        $this->form_validation->set_rules('order_position', 'Posisi', 'required');

        if ($this->form_validation->run() != FALSE) {
            $this->CategoryModel->add();
            redirect(base_url('admin/category'));
        } else {
            $this->addForm();
        }
    }

    public function update()
    {
        $data = [
            "name" => $this->input->post('name'),
            "information" => $this->input->post('information'),
            "order_position" => $this->input->post('order_position'),
            "updated_date" => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_category', $this->uri->segment(3));
        $this->db->update($this->_table, $data);
        redirect(base_url('admin/category'));
    }
    public function delete()
    {
        $this->db->where('id_category', $this->uri->segment(3));
        $this->db->delete($this->_table);
        redirect(base_url('admin/category'));
    }
}

/* End of file A_category.php */
