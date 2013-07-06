<?php
class Banner_slideshow_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($bhs=NULL)
    {
        $this->db->join('bahasa','banner_slideshow.bahasa_id=bahasa.id_bahasa');
		if($bhs!=NULL)
        	$this->db->where('bahasa.alias_bahasa',$bhs);
        //$this->db->where('active_banner_slide','1');
        $query = $this->db->get('banner_slideshow');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('bahasa','banner_slideshow.bahasa_id=bahasa.id_bahasa');
        $this->db->where('id_banner_slide',$id);
        // $this->db->where('active_banner_slide',1);
        $query = $this->db->get('banner_slideshow');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('banner_slideshow', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_banner_slide',$id);
        $update = $this->db->update('banner_slideshow', $data);
        return $update;
    }

    function delete($id)
    {
        $this->delete_img($id);
        $delete = $this->db->delete('banner_slideshow',array('id_banner_slide'=>$id));
        return $delete;
    }

    function delete_img($id)
    {
        $this->db->where('id_banner_slide',$id);
        $row =$this->db->get('banner_slideshow')->row()->banner_slide_name;
        return unlink('./asset/images/web/banner/'.$row);
    }
}