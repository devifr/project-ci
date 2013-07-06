<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_block extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kategori_block_model','kategori_block');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }
  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->kategori_block->get_all();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori_block/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori_block/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $data['rows'] = $this->kategori_block->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori_block/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['rows'] = $this->kategori_block->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('kategori_block/view',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('nama_block', 'Nama Block', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');
      $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/kategori_block/input/');
      }
      else
      {
        $nama = $this->input->post('nama_block');
        $position = $this->input->post('position');
        $urutan = $this->input->post('urutan');
        $description = $this->input->post('description');
        $bahasa = $this->input->post('bahasa');
        $active = $this->input->post('active');
        $data = array('nama_block' => $nama ,'isi_block' => $description,'position_block' => $position, 'bahasa_id' => $bahasa,
        'urutan_block'=>$urutan,'active_block' => $active);
        $simpan = $this->kategori_block->insert_data($data);
        if($simpan==TRUE){
          sukses('Block has Saved');
        }else{
          gagal('Block Failed to Save');
        }
        redirect('admin/kategori_block/input/');
      }
  }

  public function update_data($id_encrypt)
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $id = $this->encrypt->decode($id_encrypt);
      $this->form_validation->set_rules('nama_block', 'Nama Block', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');
      $this->form_validation->set_rules('urutan', 'Urutan', 'required|numeric');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/kategori_block/edit/'.$id_encrypt);
      }
      else
      {
        $nama = $this->input->post('nama_block');
        $position = $this->input->post('position');
        $urutan = $this->input->post('urutan');
        $description = $this->input->post('description');
        $bahasa = $this->input->post('bahasa');
        $active = $this->input->post('active');
        $data = array('nama_block' => $nama ,'isi_block' => $description,'position_block' => $position, 'bahasa_id' => $bahasa,
        'urutan_block'=>$urutan,'active_block' => $active);
        $simpan = $this->kategori_block->update($id,$data);
        if($simpan==TRUE){
          sukses('Block has Saved');
        }else{
          gagal('Block Failed to Save');
        }
        redirect('admin/kategori_block/edit/'.$id_encrypt);
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
         $data = array('active_block' => $aktif);
         $update = $this->kategori_block->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_block' => $aktif);
      $update = $this->kategori_block->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/kategori_block/');
      }
  }

  public function delete_data($id)
  {
   if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->kategori_block->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/kategori_block/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->kategori_block->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }

}

/* End of file kategori_block.php */
/* Location: ./application/controllers/admin/kategori_block.php */