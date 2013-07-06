<?php
class Menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all($id=1)
    {
        $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa','left');
        $this->db->join('kategori_menu','menu.kategori_menu_id=kategori_menu.id_kategori_menu');
        $this->db->where('menu.bahasa_id',$id);
        $this->db->where('kategori_menu.active_kategori_menu','1');
        $query = $this->db->get('menu');
        return $query;
    }

    function get_all_by_role($id)
    {
        $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa');
        $this->db->join('kategori_menu','menu.kategori_menu_id=kategori_menu.id_kategori_menu');
        $this->db->join('role_menu','menu.id_menu=role_menu.menu_id');
        $this->db->where('role.id_role',$id);
        $query = $this->db->get('menu');
        return $query;
    }

    function get_all_by_kategori($id)
    {
        $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa');
        $this->db->join('kategori_menu','menu.kategori_menu_id=kategori_menu.id_kategori_menu');
        $this->db->where('kategori_menu.id_kategori_menu',$id);
        $query = $this->db->get('menu');
        return $query;
    }

    function get_by_id($id)
    {
        $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa');
        $this->db->join('kategori_menu','menu.kategori_menu_id=kategori_menu.id_kategori_menu');
        $this->db->where('id_menu',$id);
        $query = $this->db->get('menu');
        return $query;
    }

    function get_by_level_admin($level,$id_now=NULL,$bhs=NULL)
    {
        $this->db->where('active_menu','1');
        $this->db->where('level_menu',$level);
        if($id_now!=NULL){
            $this->db->where('id_menu !=',$id_now);
        }
        if($bhs!=NULL){
            $this->db->where('bahasa_id',$bhs);
        }
        $this->db->order_by("urutan_menu", "asc"); 
        $query = $this->db->get('menu');
        return $query;
    }

    function get_by_level($level,$bhs,$kategori=NULL)
    {
        $this->db->join('bahasa','menu.bahasa_id=bahasa.id_bahasa');
        $this->db->where('active_menu','1');
        $this->db->where('level_menu',$level);
        $this->db->where('alias_bahasa',$bhs);
        if($kategori!=NULL){
            $this->db->where('kategori_menu_id',$kategori);
        }
        $this->db->order_by("urutan_menu", "asc"); 
        $query = $this->db->get('menu');
        return $query;
    }

    function get_parent_menu($parent_id)
    {
        $this->db->where('parent_id',$parent_id);
        $this->db->order_by("urutan_menu", "asc"); 
        $query = $this->db->get('menu');
        return $query;
    }

    function get_url_menu($url_menu)
    {
        $this->db->where('url_menu',$url_menu);
        $query = $this->db->get('menu');
        return $query;
    }

    function get_by_alias($nama_menu)
    {
        $this->db->select('id_menu');
        $this->db->where('nama_menu',$nama_menu);
        $query = $this->db->get('menu');
        return $query;
    }

    function get_name_parent_menu($parent_id)
    {
        $this->db->select('nama_menu');
        $this->db->where('id_menu',$parent_id);
        $query = $this->db->get('menu');
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('menu', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_menu',$id);
        $update = $this->db->update('menu', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('menu',array('id_menu'=>$id));
        return $delete;
    }
}