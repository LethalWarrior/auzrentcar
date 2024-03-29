<?php

class Login extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('role_model');
    }

    public function index() {
        $this->load->view('login');
        
    }

    public function auth() {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $validate = $this->login_model->validate($email, $password);
        if($validate->num_rows() > 0) {
            $data = $validate->row_array();
            $name = $data['fullname'];
            $email = $data['email'];
            $role_id = $data['role_id'];
            $role = $this->role_model->getById($role_id);
            $sesdata = array(
                'username' => $name,
                'email' => $email,
                'role_id' => $role->id,
                'role_name' => $role->role_name,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            redirect('dashboard');
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}


?>