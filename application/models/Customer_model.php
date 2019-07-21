<?php

class Customer_model extends CI_Model {

    private $_table = "customers";
    public $id;
    public $fullname;
    public $idcard_number;
    public $phone_number;
    public $photo;
    public $address;

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

    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->fullname = $post["fullname"];
        $this->idcard_number = $post["idcard_number"];
        $this->phone_number = $post["phone_number"];
        $this->photo = $this->_uploadImage();
        $this->address = $post["address"];
        $this->branch_id = 1;
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->fullname = $post["fullname"];
        $this->idcard_number = $post["idcard_number"];
        $this->phone_number = $post["phone_number"];
        $this->address = $post["address"];
        $this->branch_id = 1;
        if (!empty($_FILES["photo"]["name"])) {
            $this->photo = $this->_uploadImage();
        } else {
            $this->photo = $post["old_image"];
        }
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }
    

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

    private function _uploadImage() {
        $config['upload_path']          = './uploads/customers/';
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