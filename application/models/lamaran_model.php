<?php
class Lamaran_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('career','career.id_career=lamaran.career_id');
        $query = $this->db->get('lamaran');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('career','career.id_career=lamaran.career_id');
        $this->db->where('id_lamaran',$id);
        $query = $this->db->get('lamaran');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('lamaran', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_lamaran',$id);
        $update = $this->db->update('lamaran', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('lamaran',array('id_lamaran'=>$id));
        return $delete;
    }
}