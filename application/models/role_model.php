<?php
class Role_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('role');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_role',$id);
        $query = $this->db->get('role');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('role', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_role',$id);
        $update = $this->db->update('role', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('role',array('id_role'=>$id));
        return $delete;
    }
}