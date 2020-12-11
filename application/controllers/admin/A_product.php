<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_product extends CI_Controller
{
    protected $_table = "products";
    protected $_tableCategory = "product_category";
    protected $_tableUnit = "product_unit";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/a_product_model', 'ProductModel');
    }


    public function index()
    {
        $data['products'] = $this->ProductModel->getProductWithJoin();
        $this->template->display('admin/product', $data, "Produk");
    }

    public function addForm()
    {
        $data['categories'] = $this->db->get($this->_tableCategory)->result();
        $data['units'] = $this->db->get($this->_tableUnit)->result();
        $this->template->display('admin/product/new_form', $data, "Tambah Produk");
    }

    public function add()
    {

        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('unit', 'Satuan', 'required');
        $this->form_validation->set_rules('name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('qty', 'Kuantitas', 'required');
        $this->form_validation->set_rules('information', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                "id_category" => $this->input->post('category'),
                "id_unit" => $this->input->post('unit'),
                "name" => $this->input->post('name'),
                "price" => setAngka($this->input->post('price')),
                "qty" => setAngka($this->input->post('qty')),
                "information" => $this->input->post('information'),
                "image" => $this->_uploadImage(),

            ];
            $this->db->insert($this->_table, $data);
            redirect(base_url('admin/product'));
        } else {
            $this->addForm();
        }
    }
    public function editForm()
    {
        $data['product'] = $this->db->get_where($this->_table, ['id_product' => $this->uri->segment(3)])->row();
        $data['categories'] = $this->db->get($this->_tableCategory)->result();
        $data['units'] = $this->db->get($this->_tableUnit)->result();
        $this->template->display('admin/product/edit_form', $data, "Edit Produk");
    }

    public function update()
    {
        $this->form_validation->set_rules('category', 'Kategori', 'required');
        $this->form_validation->set_rules('unit', 'Satuan', 'required');
        $this->form_validation->set_rules('name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('qty', 'Kuantitas', 'required');
        $this->form_validation->set_rules('information', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {

            if (!empty($_FILES['image']['name'])) {
                $image = $this->_uploadImage();
            } else {
                $image = $this->input->post('old_image');
            }
            $data = [
                "id_category" => $this->input->post('category'),
                "id_unit" => $this->input->post('unit'),
                "name" => $this->input->post('name'),
                "price" => setAngka($this->input->post('price')),
                "qty" => setAngka($this->input->post('qty')),
                "information" => $this->input->post('information'),
                "image" => $image,
            ];

            $this->db->where('id_product', $this->uri->segment(3));
            $this->db->update($this->_table, $data);
            redirect(base_url('admin/product'));
        } else {
            $this->editForm();
        }
    }

    public function delete()
    {
        $this->_deleteImage($this->uri->segment(3));
        $this->db->where('id_product', $this->uri->segment(3));
        $this->db->delete($this->_table);
        redirect(base_url('admin/product'));
    }

    private function _deleteImage($id)
    {
        $product = $this->db->get_where($this->_table, ["id_product" => $id])->row();
        var_dump($product);
        if ($product->image != 'default.png') {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH . "upload/admin/product/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/admin/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = uniqid() . time();
        // if ($id == null || empty($id)) {
        // } else {
        //     $product = $this->db->get_where($this->_table, ['id_product' => $id])->row();
        //     $config['file_name']            = $product->image;
        // }
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        // image  = nama field input file   
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }
}

/* End of file A_product.php */
