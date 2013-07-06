<?php
class Kategori_menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id=1)
    {
        $this->db->join('bahasa','kategori_menu.bahasa_id=bahasa.id_bahasa');
        $this->db->where('id_bahasa',$id);
        $query = $this->db->get('kategori_menu');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_kategori_menu',$id);
        $query = $this->db->get('kategori_menu');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('kategori_menu', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_kategori_menu',$id);
        $update = $this->db->update('kategori_menu', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('kategori_menu',array('id_kategori_menu'=>$id));
        return $delete;
    }
}