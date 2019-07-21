<?php

class Customers extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('customer_model');
    }

    public function index() {
        $data["customers"] = $this->customer_model->getAll();
        if($this->session->userdata('logged_in') === TRUE) {
            if($this->session->userdata('role_id') == 2 || $this->session->userdata('role_id') == 3) $this->load->view('customers/index', $data);
            else redirect('dashboard');
        } else {
            redirect('login');
        }

    }

    public function create() {
        $data["last_customer"] = $this->customer_model->getLatest();
        $this->load->view('customers/create', $data);
    }

    public function store() {
        $customer = $this->customer_model;

        $customer->save();
        $this->session->set_flashdata('success', 'Successfully add a customer');

        redirect('customers');
    }

    public function edit($id = null) {
        if (!isset($id)) redirect('customers');
        $customer = $this->customer_model;

        $data["customer"] = $customer->getById($id);
        
        $this->load->view("customers/edit", $data);
    }

    public function update() {
        $customer = $this->customer_model;

        $customer->update();
        $this->session->set_flashdata('success', 'Successfully update the customer');

        redirect('customers');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
            
        if ($this->customer_model->delete($id)) {
            redirect(site_url('customers'));
        }
    }

}


?>