<?php
class Submenu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('menu','submenu.menu_id=menu.id_menu');
        $query = $this->db->get('submenu');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('menu','submenu.menu_id=menu.id_menu');
        $this->db->where('id_submenu',$id);
        $query = $this->db->get('submenu');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('submenu', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_submenu',$id);
        $update = $this->db->update('submenu', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('submenu',array('id_submenu'=>$id));
        return $delete;
    }
}