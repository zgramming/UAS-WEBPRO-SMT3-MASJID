<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_unit extends CI_Controller
{
    protected $_table = "product_unit";

    public function index()
    {
        $data['units'] = $this->db->get($this->_table)->result();
        $this->template->display('admin/unit', $data, "Satuan");
    }

    public function addForm()
    {
        $data = [];
        $this->template->display('admin/unit/new_form', $data, 'Tambah Satuan');
    }

    public function editForm()
    {
        $data['unit'] = $this->db->get_where($this->_table, ['id_unit' => $this->uri->segment(3)])->row();
        $this->template->display('admin/unit/edit_form', $data, 'Edit Satuan');
    }
    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama Satuan', 'required');
        $this->form_validation->set_rules('information', 'Keterangan', 'required');

        $data = [
            "name" => $this->input->post('name'),
            "information" => $this->input->post('information'),
            "created_date" => date('Y-m-d H:i:s'),
        ];
        if ($this->form_validation->run() == TRUE) {
            $this->db->insert($this->_table, $data);
            redirect(base_url('admin/unit'));
        } else {
            $this->addForm();
        }
    }

    public function update()
    {
        $data = [
            "name" => $this->input->post('name'),
            "information" => $this->input->post('information'),
        ];
        $this->db->where('id_unit', $this->uri->segment(3));
        $this->db->update($this->_table, $data);
        redirect(base_url('admin/unit'));
    }

    public function delete()
    {
        $this->db->where('id_unit', $this->uri->segment(3));
        $this->db->delete($this->_table);
        redirect(base_url('admin/unit'));
    }
}

/* End of file A_unit.php */
