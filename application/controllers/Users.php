<?php

class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('role_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data["users"] = $this->user_model->getWithRole();
    
        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role_id') == 1) $this->load->view('users/index',$data);
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

    public function create() {
        $data["roles"] = $this->role_model->getAll();
        $this->load->view('users/create', $data);
    }

    public function store() {
        $user = $this->user_model;
        $validation = $this->form_validation;

        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Successfully add a user');
        }

        redirect('users');
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('users');
        $user = $this->user_model;

        $data["user"] = $user->getById($id);
        $data["roles"] = $this->role_model->getAll();
        
        $this->load->view("users/edit", $data);
    }

    public function update() {
        $user = $this->user_model;
        $validation = $this->form_validation;

        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Successfully update the user');
        }

        redirect('users');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
            
        if ($this->user_model->delete($id)) {
            redirect(site_url('users'));
        }
    }



}


?>