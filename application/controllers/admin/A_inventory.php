<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_inventory extends CI_Controller
{
    protected $tblInvenCategory = "inventory_category";
    protected $tblInven = "inventory";
    protected $pathFile = "./upload/admin/inventory/";

    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/a_inventory_model', 'InventoryModel');
    }


    public function index()
    {
        $data['inventories'] = $this->InventoryModel->getInventoryByJoin();
        $this->template->display("admin/inventory/inventory", $data, "Inventory");
    }

    public function addForm()
    {
        $data['categories'] = $this->db->get($this->tblInvenCategory)->result();
        $this->template->display("admin/inventory/new_form", $data, "Inventory");
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('stock', 'Stok', 'required');


        if ($this->form_validation->run() == TRUE) {
            $data = $this->postData();

            $file = uploadFile("image", uniqid() . time(), $this->pathFile);

            if (empty($file['error'])) $data += ['image' => $file];

            $this->db->insert($this->tblInven, $data);
            redirect(base_url('admin/inventory'));
        } else {
            $this->addForm();
        }
    }

    public function delete()
    {
        deleteImage($this->tblInven, ['id' => $this->uri->segment(3)], "image", $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblInven);
        redirect(base_url('admin/inventory'));
    }

    public function editForm()
    {
        $data['inventory'] = $this->db->get_where($this->tblInven, ['id' => $this->uri->segment(3)])->row();
        $data['categories'] = $this->db->get($this->tblInvenCategory)->result();
        $this->template->display("admin/inventory/edit_form", $data, "Inventory");
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('stock', 'Stok', 'required');


        if ($this->form_validation->run() == TRUE) {
            $data = $this->postData(true);
            $file = uploadFile("image", $this->input->post('old_image'), $this->pathFile);

            if (empty($file['error'])) $data += ['image' => $file];

            $this->db->where('id', $this->uri->segment(3));
            $this->db->update($this->tblInven, $data);
            redirect(base_url('admin/inventory'));
        } else {
            $this->editForm();
        }
    }

    public function updateStockCorrupt()
    {

        $this->form_validation->set_rules('inp[stock_corrupt]', 'Stok Rusak', 'required|integer|is_natural');

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header('400');
            $this->data['message'] = array_values($this->form_validation->error_array())[0];
        } else {
            $data = [
                "stock_corrupt" => $this->input->post("inp[stock_corrupt]"),
            ];

            $this->db->where('id', $this->input->post('inp[id]'));
            $this->db->update($this->tblInven, $data);
            $this->data['message'] = "Stok rusak berhasil diperbaharui";
        }
        echo json_encode($this->data);
    }

    //* Category

    public function category()
    {
        $data['inventoryCategories'] = $this->db->get($this->tblInvenCategory)->result();
        $this->template->display('admin/inventory/category', $data, 'Kategori Inventory');
    }

    public function categoryAddForm()
    {
        $data = [];
        $this->template->display('admin/inventory/category/new_form', $data, "Tambah Kategori Inventory");
    }

    public function categoryAdd()
    {
        $this->form_validation->set_rules('name', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = $this->postDataCategory();
            $this->db->insert($this->tblInvenCategory, $data);

            redirect(base_url('admin/inventory/category'));
        } else {
            $this->categoryAddForm();
        }
    }

    public function categoryDelete()
    {
        $this->db->where('id', $this->uri->segment(3));
        $result = $this->db->delete($this->tblInvenCategory);
        if ($result) {
            redirect(base_url('admin/inventory/category'));
        }
    }

    public function categoryEditForm()
    {
        $data['category'] = $this->db->get_where($this->tblInvenCategory, ['id' => $this->uri->segment(3)])->row();
        $this->template->display('admin/inventory/category/edit_form', $data, "Edit Kategori Inventory");
    }

    public function categoryUpdate()
    {
        $this->db->where('id', $this->uri->segment(3));
        $data = $this->postDataCategory(true);
        $this->db->update($this->tblInvenCategory, $data);
        redirect(base_url('admin/inventory/category'));
    }

    private function postData($isForUpdate = false)
    {

        if ($isForUpdate) {
            $x = "updated_date";
        } else {
            $x = "created_date";
        }
        $data = [
            "id_inventory_category" => $this->input->post('id_inventory_category'),
            "name" => $this->input->post('name'),
            "kode" => $this->input->post('kode'),
            "stock" => setAngka($this->input->post('stock')),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }

    private function postDataCategory($isForUpdate = false)
    {

        if ($isForUpdate) $x = "updated_date";
        else $x = "created_date";

        $data = [
            "name" => $this->input->post('name'),
            "description" => $this->input->post('description'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_inventory.php */
