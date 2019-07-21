<?php

class Cars extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('car_model');
    }

    public function index() {
        $data["cars"] = $this->car_model->getWithBranch();
    
        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role_id') == 3) $this->load->view('cars/index',$data);
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

    public function create() {
        $data["last_car"] = $this->car_model->getLatest();
        $this->load->view('cars/create', $data);
    }

    public function store() {
        $car = $this->car_model;

        $car->save();
        $this->session->set_flashdata('success', 'Successfully add a car');

        redirect('cars');
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('cars');
        $car = $this->car_model;

        $data["car"] = $car->getById($id);
        
        $this->load->view("cars/edit", $data);
    }

    public function update() {
        $car = $this->car_model;

        $car->update();
        $this->session->set_flashdata('success', 'Successfully update the car');

        redirect('cars');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
            
        if ($this->car_model->delete($id)) {
            redirect(site_url('cars'));
        }
    }


}


?>