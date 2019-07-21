<?php

class Login_model extends CI_Model {
    
    function validate($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('users');
        return $result;
    }

    function return_role($role_id) {
        $this->db->where('id', $role_id);
        return $result = $this->db->get('roles');
    }

}

?>