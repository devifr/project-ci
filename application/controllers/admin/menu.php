<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model','menu');
    $this->load->model('kategori_menu_model','kategori_menu');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->menu->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('menu/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function kategori($id)
  {
    $id = $this->encrypt->decode($id);
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->menu->get_all_by_kategori($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('menu/view_all_kategori',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['kategori_menu'] = $this->kategori_menu->get_all()->result();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('menu/form_input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->model('kategori_model','kategori');
    $this->load->model('content_model','content');
    $id = $this->encrypt->decode($id);
    //--------------------------------------------------//
    $kategori_id = '';
    $bhs = '';
    $url_menu = '';
    $query_menu_edit = $this->menu->get_by_id($id);
    if($query_menu_edit->num_rows()>0){
      $menu_edit = $query_menu_edit->row();
      $bhs = $menu_edit->bahasa_id;
      $url_menu = $menu_edit->url_menu;
    }
    $query_konten = $this->content->get_by_alias_menu($url_menu);
    if($query_konten->num_rows()>0){
      $konten = $query_konten->row();
      $kategori_id = $konten->kategori_id;
    }
    $data['kategori_id'] = $kategori_id;
    //--------------------------------------------------//
    $data['rows'] = $query_menu_edit;
    $data['kategori_menu'] = $this->kategori_menu->get_all()->result();
    $data['categories'] = $this->kategori->get_all_aktif()->result();
    $data['articles'] = $this->content->get_by_bahasa($bhs,$kategori_id)->result();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('menu/form_edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id)
  {
    $id = $this->encrypt->decode($id);
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['row'] = $this->menu->get_by_id($id)->row();
    $parent_id = $this->menu->get_by_id($id)->row()->parent_id;
    if($parent_id!=0) {
      $data['parent_name'] = $this->menu->get_name_parent_menu($parent_id)->row()->nama_menu;
    }
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('menu/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('nama_menu', 'Name Menu', 'required');
      $this->form_validation->set_rules('url_menu', 'URL Menu', 'required');
      $this->form_validation->set_rules('urutan', 'Order', 'numeric');
      $this->form_validation->set_rules('kategori_menu', 'Category Menu', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/menu/input/');
      }
      else
      {
        $nama_menu = $this->input->post('nama_menu');
        $url_menu = $this->input->post('url_menu');
        $urutan = $this->input->post('urutan');
        $kategori_menu = $this->input->post('kategori_menu');
        $bahasa = $this->input->post('bahasa');
        $makeparent = $this->input->post('makeparent');
        $for_static = $this->input->post('for_static');
        $parent_id = '';
        $level_menu = '';
        if($makeparent==1){
          $parent_id = $this->input->post('parent');
          $level_menu = $this->input->post('level');
        }
        $active = $this->input->post('active');
        $data = array('nama_menu' => $nama_menu ,'url_menu' => $url_menu,'urutan_menu' => $urutan, 'kategori_menu_id' => $kategori_menu,
        'bahasa_id' => $bahasa, 'parent_id' => $parent_id,'for_static'=>$for_static, 'level_menu' => $level_menu, 'active_menu' => $active);
        $simpan = $this->menu->insert_data($data);
        if($simpan==TRUE){
          sukses('Menu has Saved');
        }else{
          gagal('Menu Failed to Save');
        }
        redirect('admin/menu/input/');
      }
    }

  public function update_data($id)
  {
      $idencrypt = $id;
      $id = $this->encrypt->decode($id);
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_error_delimiters('<div class="gagal">', '</div>');
      $this->form_validation->set_rules('nama_menu', 'Name Menu', 'required');
      $this->form_validation->set_rules('url_menu', 'URL Menu', 'required');
      $this->form_validation->set_rules('urutan', 'Order', 'numeric');
      $this->form_validation->set_rules('kategori_menu', 'Category Menu', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/menu/edit/'.$idencrypt);
      }
      else
      {
        $nama_menu = $this->input->post('nama_menu');
        $url_menu = $this->input->post('url_menu');
        $urutan = $this->input->post('urutan');
        $kategori_menu = $this->input->post('kategori_menu');
        $bahasa = $this->input->post('bahasa');
        $makeparent = $this->input->post('makeparent');
        $for_static = $this->input->post('for_static');
        $parent_id = '';
        $level_menu = '';
        if($makeparent==1){
          $parent_id = $this->input->post('parent');
          $level_menu = $this->input->post('level');
        }
        $active = $this->input->post('active');
        $data = array('nama_menu' => $nama_menu ,'url_menu' => $url_menu,'urutan_menu' => $urutan, 'kategori_menu_id' => $kategori_menu,
        'bahasa_id' => $bahasa, 'parent_id' => $parent_id, 'for_static'=>$for_static,'level_menu' => $level_menu, 'active_menu' => $active);
        $simpan = $this->menu->update($id,$data);
        if($simpan==TRUE){
          sukses('Menu has Changed');
        }else{
          gagal('Menu Failed to Changed');
        }
        redirect('admin/menu/edit/'.$idencrypt);
      }
    }

  public function publish($ket,$id='')
  {

    if($ket=='yes'){
      $aktif = '1';
      $msgsukes = "Data Has Published";
      $msggagal = "Data Failed to Published";
    }else{
      $aktif = '0';
      $msgsukes = "Data Has Unpublished";
      $msggagal = "Data Failed to Unpublished";
    }

    if($id==''){
      $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $data = array('active_menu' => $aktif);
         $update = $this->menu->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_menu' => $aktif);
      $update = $this->menu->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/menu/');
      }
  }      
  
  public function delete_data($id)
  {
  if($id!='all'){
    $id = $this->encrypt->decode($id);
    $delete = $this->menu->delete($id);
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
    redirect('admin/menu/'); 
  }else{
      $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->menu->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
  }
  }

}


/* End of file menu.php */
/* Location: ./application/controllers/menu.php */