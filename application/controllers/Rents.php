<?php

class Rents extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() {

        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role') == 2) $this->load->view('rents/index');
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

}


?>