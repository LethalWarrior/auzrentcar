<?php

class Car_model extends CI_Model {

    private $_table = "cars";
    public $id;
    public $brand;
    public $model;
    public $color;
    public $license_plate;
    public $photo;
    public $availability;

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getLatest() {
        return $this->db->order_by('id','desc')
            ->limit(1)
            ->get($this->_table)
            ->row();
    }

    public function getQuery($query) {
        return $this->db->query($query);
    }

    public function getWithBranch() {
        $this->db->select('cars.id, cars.brand, cars.model, cars.color, cars.license_plate, cars.photo, cars.availability, branch.branch_name')
                ->from('cars')
                ->join('branch', 'cars.branch_id = branch.id');
        return $this->db->get()->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->brand = $post["brand"];
        $this->model = $post["model"];
        $this->color = $post["color"];
        $this->license_plate = $post["license_plate"];
        $this->photo = $this->_uploadImage();
        $this->availability = 1;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->brand = $post["brand"];
        $this->model = $post["model"];
        $this->color = $post["color"];
        $this->license_plate = $post["license_plate"];
        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }
        $this->availability = $post["availability"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }
    

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function _uploadImage() {
        $config['upload_path']          = './uploads/cars/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

}

?>