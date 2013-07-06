<?php
class Role_menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('role','role_menu.role_id=role.id_role');
        $this->db->join('menu','role_menu.menu_id=menu.id_menu');
        $query = $this->db->get('role_menu');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('role','role_menu.role_id=role.id_role');
        $this->db->join('menu','role_menu.menu_id=menu.id_menu');
        $this->db->where('id_role_menu',$id);
        $query = $this->db->get('role_menu');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('role_menu',$data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_role_menu',$id);
        $update = $this->db->update('role_menu', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('role_menu',array('id_role_menu'=>$id));
        return $delete;
    }
}