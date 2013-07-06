<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kategori_model','kategori');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
  }
  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->kategori->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $data['rows'] = $this->kategori->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->kategori->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('admin/navigasi');
    $this->load->view('kategori/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('nama_kategori', 'Category Name', 'required');
      $this->form_validation->set_rules('alias', 'Alias', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/category/input/');
      }
      else
      {
        $nama_kategori = $this->input->post('nama_kategori');
        $alias = $this->input->post('alias');
        $bahasa = $this->input->post('bahasa');
        $active = $this->input->post('active');
        $data = array('nama_kategori' => $nama_kategori ,'alias_kategori' => $alias,'active_kategori' => $active,
        'bahasa_id' => $bahasa);
        $simpan = $this->kategori->insert_data($data);
        if($simpan==TRUE){
          sukses('Category has Saved');
        }else{
          gagal('Category Failed to Save');
        }
        redirect('admin/category/input/');
      }
  }

  public function update_data($id_encrypt)
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $id = $this->encrypt->decode($id_encrypt);
      $this->form_validation->set_rules('nama_kategori', 'Category Name', 'required');
      $this->form_validation->set_rules('alias', 'Alias', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/category/edit/'.$id_encrypt);
      }
      else
      {
        $nama_kategori = $this->input->post('nama_kategori');
        $alias = $this->input->post('alias');
        $bahasa = $this->input->post('bahasa');
        $active = $this->input->post('active');
        $data = array('nama_kategori' => $nama_kategori ,'alias_kategori' => $alias,'active_kategori' => $active,
        'bahasa_id' => $bahasa);
        $simpan = $this->kategori->update($id,$data);
        if($simpan==TRUE){
          sukses('Category has Saved');
        }else{
          gagal('Category Failed to Save');
        }
        redirect('admin/category/edit/'.$id_encrypt);
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
         $data = array('active_kategori' => $aktif);
         $update = $this->kategori->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_kategori' => $aktif);
      $update = $this->kategori->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/category/');
      }
  }      
  
  public function delete_data($id)
  {
   if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->kategori->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/category/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->kategori->delete($idcheck);
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