<?php


defined('BASEPATH') or exit('No direct script access allowed');

class A_authentication extends CI_Controller
{
    protected $tblUser = "user";
    public function __construct()
    {
        parent::__construct();

        // $session = $this->session->userdata("user");
        // if (!empty($session)) return redirect(base_url("admin/dashboard"));
    }

    public function index()
    {
        $data = [];

        $this->template_frontend->view("admin/authentication", $data, "Login Admin");
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email User', 'required');
        $this->form_validation->set_rules('password', 'Password User', 'required|min_length[5]');

        if ($this->form_validation->run() ==  FALSE) {
            return $this->index();
        }
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $user = $this->db->get_where($this->tblUser, ['email' => $email])->row();

        if (empty($user)) {
            $this->session->set_flashdata('error_login', 'Email salah');
            return $this->index();
        }

        if (!password_verify($password, $user->password)) {
            $this->session->set_flashdata('error_login', 'Password Salah');
            return $this->index();
        }


        $sessionUser = array(
            'user' => $user
        );


        $this->session->set_userdata($sessionUser);

        return redirect(base_url("admin/dashboard"));
    }
    public function logout()
    {
        $this->session->sess_destroy();

        return redirect(base_url("admin/login"));
    }
}

/* End of file A_authentication.php */
