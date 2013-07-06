<?php
class Kategori_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id='1')
    {
        $this->db->join('bahasa','kategori.bahasa_id=bahasa.id_bahasa','left');
        $query = $this->db->get('kategori');
        return $query;
    }

    function get_all_aktif()
    {
     //   $this->db->join('bahasa','kategori.bahasa_id=bahasa.id_bahasa','left');
     //   $this->db->where('active_kategori','1');
        $query = $this->db->get('kategori');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('bahasa','kategori.bahasa_id=bahasa.id_bahasa','left');
        $this->db->where('id_kategori',$id);
        $query = $this->db->get('kategori');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('kategori', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_kategori',$id);
        $update = $this->db->update('kategori', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('kategori',array('id_kategori'=>$id));
        return $delete;
    }
}