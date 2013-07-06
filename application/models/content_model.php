<?php
class Content_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_all()
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $query = $this->db->get('content');
        return $query;
    }

    function get_all_by_kategori($id,$bhs,$limit=NULL)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $this->db->where('kategori.id_kategori',$id);
        $this->db->where('active_content','1');
        $this->db->where('bahasa.alias_bahasa',$bhs);
        $query = $this->db->get('content',$limit);
        return $query;
    }

    function get_by_kategori($id,$bhs,$now=NULL)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $this->db->where('kategori.id_kategori',$id);
        $this->db->where('active_content','1');
        $this->db->where('bahasa.alias_bahasa',$bhs);
        $this->db->where('content.id_content !=',$now);
        $query = $this->db->get('content');
        return $query;
    }

    function get_by_bahasa($bhs,$kategori)
    {
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $this->db->where('active_content','1');
        $this->db->where('bahasa.id_bahasa',$bhs);
        $this->db->where('content.kategori_id',$kategori);
        $query = $this->db->get('content');
        return $query;
    }

    function get_all_by_subkategori($id)
    {
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $this->db->join('subkategori','content.subkategori_id=subkategori.id_subkategori');
        $this->db->where('subkategori.id_subkategori',$id);
        $query = $this->db->get('content');
        return $query;
    }

    function get_by_id($id,$view=NULL)
    {
        if($view != NULL)
            $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        // $this->db->join('subkategori','content.subkategori_id=subkategori.id_subkategori','left');
        $this->db->where('id_content',$id);
        $query = $this->db->get('content');
        return $query;
    }

    function get_by_alias($alias_kate,$alias,$bhs)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        // $this->db->join('subkategori','content.subkategori_id=subkategori.id_subkategori','left');
        $this->db->where('alias_bahasa',$bhs);
        if($alias==NULL){
            $this->db->where('alias_content',$alias_kate);
        }else{
            $this->db->where('alias_kategori',$alias_kate);
            $this->db->where('alias_content',$alias);
        }
        $query = $this->db->get('content');
        return $query;
    }

    function get_by_alias_menu($alias,$bhs=NULL)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        // $this->db->join('subkategori','content.subkategori_id=subkategori.id_subkategori','left');
        if($bhs!=NULL)
            $this->db->where('alias_bahasa',$bhs);
        $this->db->where('alias_content',$alias);
        $query = $this->db->get('content');
        return $query;
    }

    function get_all_news($bhs,$limit=NULL,$start=NULL)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        // $this->db->join('subkategori','content.subkategori_id=subkategori.id_subkategori','left');
        $this->db->where('alias_bahasa',$bhs);
        $this->db->where('kategori_id','2');
        $query = $this->db->get('content',$limit,$start);
        return $query;
    }

    function search_content($search,$limit=NULL,$wild)
    {
        $this->db->join('kategori','content.kategori_id=kategori.id_kategori');
        $this->db->join('bahasa','content.bahasa_id=bahasa.id_bahasa');
        $this->db->like('content.judul_content',$search,$wild);
        $this->db->where('active_content','1');
        $query = $this->db->get('content',$limit);
        return $query;
    }

    function insert_data($data)
    {
        $insert = $this->db->insert('content', $data);
        return $insert;
    }

    function update($id,$data)
    {
        $this->db->where('id_content',$id);
        $update = $this->db->update('content', $data);
        return $update;
    }

    function delete($id)
    {
        $delete = $this->db->delete('content',array('id_content'=>$id));
        return $delete;
    }
}