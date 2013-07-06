<?php
class Bahasa_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('bahasa');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_bahasa',$id);
        $query = $this->db->get('bahasa');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('bahasa', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_bahasa',$id);
        $update = $this->db->update('bahasa', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('bahasa',array('id_bahasa'=>$id));
        return $delete;
    }
}