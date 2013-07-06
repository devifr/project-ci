<?php
class Testimonial_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('testimonial');
        return $query;
    }

    function get_all_active()
    {
        $this->db->where('active_testimonial','1');
        $query = $this->db->get('testimonial');
        return $query;
    }

    function get_all_limit($limit)
    {
        $this->db->where('active_testimonial','1');
        $query = $this->db->get('testimonial',$limit);
        return $query;
    }

    function get_all_pagination($limit,$start)
    {
        $this->db->where('active_testimonial','1');
        $query = $this->db->get('testimonial',$limit,$start);
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_testimonial',$id);
        // $this->db->where('active_testimonial','1');
        $query = $this->db->get('testimonial');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('testimonial', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_testimonial',$id);
        $update = $this->db->update('testimonial', $data);
        return $update;
    }

    function delete($id)
    {
        $this->delete_img($id);
        $delete = $this->db->delete('testimonial',array('id_testimonial'=>$id));
        return $delete;
    }

    function delete_img($id)
    {
        $row = $this->get_by_id($id)->row()->attachment_testimonial;
        return unlink('./testimonial/'.$row);
    }

}