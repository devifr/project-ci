<?php
class Career_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('career');
        return $query;
    }


    function get_by_id($id)
    {
        $this->db->where('id_career',$id);
        $query = $this->db->get('career');
        return $query;
    }

    function get_all_limit($limit)
    {
        $this->db->where('status','1');
        $query = $this->db->get('career',$limit);
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('career', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_career',$id);
        $update = $this->db->update('career', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('career',array('id_career'=>$id));
        return $delete;
    }
}