<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_news extends CI_Controller
{

    protected $tblNews = "news";
    protected $pathFile = "./upload/admin/news/";


    public function __construct()
    {
        parent::__construct();
        checkSession();
        $this->load->model('admin/a_news_model', 'NewsModel');
    }


    public function index()
    {
        $data['news'] = $this->db->get($this->tblNews)->result();
        $this->template->display("admin/news/news", $data, "Agenda");
    }

    public function addForm()
    {
        $data = [];
        $this->template->display("admin/news/new_form", $data, "Agenda");
    }
    public function add()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('short_content', 'Ringkasan', 'required');
        $this->form_validation->set_rules('full_content', 'Deskripsi', 'required');

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

        $this->db->insert($this->tblNews, $data);
        return redirect(base_url('admin/news'));
    }
    public function delete()
    {
        deleteImage($this->tblNews, ['id' => $this->uri->segment(3)], "image", $this->pathFile);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete($this->tblNews);
        redirect(base_url('admin/news'));
    }
    public function editForm()
    {
        $data['news'] = $this->db->get_where($this->tblNews, ['id' => $this->uri->segment(3)])->row();
        $this->template->display("admin/news/edit_form", $data, "Agenda");
    }
    public function update()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('short_content', 'Ringkasan', 'required');
        $this->form_validation->set_rules('full_content', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            return $this->editForm();
        }
        $data = $this->postData(true);

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
        $this->db->update($this->tblNews, $data);
        return redirect(base_url('admin/news'));
    }

    private function postData($isForUpdate = false)
    {

        if ($isForUpdate) {
            $x = "updated_date";
        } else {
            $x = "created_date";
        }


        $data = [
            "title" => $this->input->post('title'),
            "date" => $this->input->post('date'),
            "short_content" => $this->input->post('short_content'),
            "full_content" => $this->input->post('full_content'),
            $x => date('Y-m-d H:i:s'),
        ];
        return $data;
    }
}

/* End of file A_news.php */
