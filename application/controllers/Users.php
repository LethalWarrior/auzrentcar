<?php

class Users extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() {

        $roles = $this->db->get('roles');

        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role') == 1) $this->load->view('users/index');
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

    public function create() {
        $this->load->view('users/create');
    }

}


?>