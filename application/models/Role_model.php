<?php

class Role_model extends CI_Model {

    private $_table = "roles";
    public $id;
    public $role_code;
    public $role_name;

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    

}

?>