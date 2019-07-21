<?php

class Cars extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() {

        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role') == 3) $this->load->view('cars/index');
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

}


?>