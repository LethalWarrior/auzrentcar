<?php

class User_model extends CI_Model {

    private $_table = "users";
    public $id;
    public $fullname;
    public $role_id;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'fullname',
            'label' => 'Full name',
            'rules' => 'required'],

            ['field' => 'role_id',
            'label' => 'Role id',
            'rules' => 'numeric'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],
        ];
    }

    public function getAll() {
        return $this->db->get($this->_table)->result();
    }

    public function getQuery($query) {
        return $this->db->query($query);
    }

    public function getWithRole() {
        $this->db->select('users.id, users.fullname, users.email, roles.role_name')
                ->from('users')
                ->join('roles', 'users.role_id = roles.id');
        return $this->db->get()->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save() {
        $post = $this->input->post();
        $this->fullname = $post["fullname"];
        $this->role_id = $post["role_id"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->fullname = $post["fullname"];
        $this->role_id = $post["role_id"];
        $this->email = $post["email"];
        $this->password =  $post["password"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}

?>