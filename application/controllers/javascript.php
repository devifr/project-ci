<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Javascript extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model','menu');
    $this->load->model('content_model','content');
    $this->load->model('kategori_model','kategori');
  }

  public function getParent($level,$id_now='',$bhs)
  {
    $level_parent = $level - 1; 
    $parents = $this->menu->get_by_level_admin($level_parent,$id_now='',$bhs)->result();
    $out = '';
    foreach ($parents as $key => $parent) {
      $out .= "<option value='$parent->id_menu'>$parent->nama_menu</option>";
    }
    echo $out;
  }

  public function getKategori()
  {
    $categories = $this->kategori->get_all_aktif()->result();
    $out = "<option value=''>Choose Category</option>";
    foreach ($categories as $key_category => $category) {
      $out .= "<option value='$category->id_kategori'>$category->nama_kategori</option>";
    }
    echo $out;
  }

  public function getArticle($bhs,$kategori)
  {
    $articles = $this->content->get_by_bahasa($bhs,$kategori)->result();
    $out = '<option value="">Choose Article</option>';
    foreach ($articles as $key_article => $article) {
      $out .= "<option value='$article->alias_content'>$article->judul_content</option>";
    }
    echo $out;
  }

  public function edit()
  {
    $this->load->view('role/edit');
  }

  public function view()
  {
    $this->load->view('role/view');
  }

  public function save_data()
  {
    //save code
  }

  public function update_data()
  {
    //update code
  }

  public function delete_data()
  {
    //delete code
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */