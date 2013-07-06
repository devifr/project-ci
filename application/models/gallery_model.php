<?php
class Gallery_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id='1')
    {
        $this->db->join('bahasa','gallery.bahasa_id=bahasa.id_bahasa');
        $this->db->where('id_bahasa',$id);
        $query = $this->db->get('gallery');
        return $query;
    }

    function get_all_limit($limit)
    {
        $this->db->join('bahasa','gallery.bahasa_id=bahasa.id_bahasa');
        $this->db->where('active_gallery','1');
        $query = $this->db->get('gallery',$limit);
        return $query;
    }

    function get_all_limit_pagination($limit,$start)
    {
        $this->db->join('bahasa','gallery.bahasa_id=bahasa.id_bahasa');
        $this->db->where('active_gallery','1');
        $query = $this->db->get('gallery',$limit,$start);
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_gallery',$id);
        $query = $this->db->get('gallery');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('gallery', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_gallery',$id);
        $update = $this->db->update('gallery', $data);
        return $update;
    }

    function delete($id)
    {
        $this->delete_img($id);
        $delete = $this->db->delete('gallery',array('id_gallery'=>$id));
        return $delete;
    }

    function delete_img($id)
    {
        $row = $this->get_by_id($id)->row()->nama_gallery;
        return unlink('./gallery/'.$row);
    }
}