<?php
class Contact_us_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id='1')
    {
        // $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa');
        // $this->db->menu->where('bahasa_id',$id);
        $query = $this->db->get('contact_us');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_contact',$id);
        $query = $this->db->get('contact_us');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('contact_us', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_contact',$id);
        $update = $this->db->update('contact_us', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('contact_us',array('id_contact'=>$id));
        return $delete;
    }
}