<?php
class Subkategori_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('kategori','subkategori.kategori_id=kategori.id_kategori');
        $query = $this->db->get('subkategori');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('kategori','subkategori.kategori_id=kategori.id_kategori');
        $this->db->where('id_subkategori',$id);
        $query = $this->db->get('subkategori');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('subkategori', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_subkategori',$id);
        $update = $this->db->update('subkategori', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('subkategori',array('id_subkategori'=>$id));
        return $delete;
    }
}