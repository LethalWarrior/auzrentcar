<?php

class Dashboard extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
    }

    public function index() {

        if($this->session->userdata('logged_in') === TRUE) {
            switch ($this->session->userdata('role_id')) {
                case 1:
                    $this->load->view('dashboard/super');
                    break;
                case 2:
                    $this->load->view('dashboard/front_desk');
                    break;
                case 3:
                    $this->load->view('dashboard/back_office');
                    break;
            }
        } else {
            redirect('login');
        }

    }

}


?>