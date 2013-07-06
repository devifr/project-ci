<?php
class File_model extends CI_Model {
    var $path = "";
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all()
    {
        $query = $this->db->get('file');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->where('id_file',$id);
        $query = $this->db->get('file');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('file', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_file',$id);
        $update = $this->db->update('file', $data);
        return $update;
    }

    function delete($id)
    {
        $file = $this->get_by_id($id)->row()->nama_file;
        $path = $this->path;
        $delete = $this->db->delete('file',array('id_file'=>$id));
        if($delete){
            unlink($path.''.$file);
        }
        return $delete;
    }
}