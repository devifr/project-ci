<?php
class Config_website_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_by_id($id)
    {
        $this->db->join('bahasa','config_website.bahasa_id=bahasa.id_bahasa','left');
        $this->db->where('id_config',$id);
        $query = $this->db->get('config_website');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('config_website', $data);
        return $insert;
    }

    function update($data)
    {
        $id = '1';
        $this->db->where('id_config',$id);
        $update = $this->db->update('config_website', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('config_website',array('id_config'=>$id));
        return $delete;
    }
}