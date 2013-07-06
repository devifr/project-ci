<?php
class Admin_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('role','admin.role_id=role.id_role');
        $query = $this->db->get('admin');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('role','admin.role_id=role.id_role');
        $this->db->where('admin.id_admin',$id);
        $query = $this->db->get('admin');
        return $query;
    }

    function get_by_role_id($id)
    {
        $this->db->join('role','admin.role_id=role.id_role');
        $this->db->where('role.id_role',$id);
        $query = $this->db->get('admin');
        return $query;
    }

    function get_login($post){
        $this->db->where($post);
        $this->db->where('active_admin','1');
        $login = $this->db->get('admin');
        return $login;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('admin', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_admin',$id);
        $update = $this->db->update('admin', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('admin',array('id_admin'=>$id));
        return $delete;
    }
}