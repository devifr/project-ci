<?php
class Kategori_block_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id=1)
    {
        $this->db->join('bahasa','kategori_block.bahasa_id=bahasa.id_bahasa');
        $query = $this->db->get('kategori_block');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('bahasa','kategori_block.bahasa_id=bahasa.id_bahasa');
        $this->db->where('id_block',$id);
        $query = $this->db->get('kategori_block');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('kategori_block', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_block',$id);
        $update = $this->db->update('kategori_block', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('kategori_block',array('id_block'=>$id));
        return $delete;
    }
}