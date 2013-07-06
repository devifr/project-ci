<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('gallery_model','gallery');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->gallery->get_all();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('gallery/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('gallery/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id_encrypt)
  {
    $id = $this->encrypt->decode($id_encrypt);
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['rows'] = $this->gallery->get_by_id($id);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('gallery/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view()
  {
    $id = $this->encrypt->decode($id_encrypt);
    $this->load->view('gallery/view');
  }

  public function save_data()
  {
    $this->form_validation->set_rules('judul', 'Title', 'required');
    // $this->form_validation->set_rules('gallery', 'Image Gallery', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      gagal(validation_errors());
      redirect('admin/gallery/input/');
    }
    else
    {
      $judul = $this->input->post('judul');
      $gallery = $this->input->post('gallery');
      $bahasa = $this->input->post('bahasa');
      $active = $this->input->post('active');
      $created = date("y-m-D");
      //upload gambar
        $config['upload_path'] = './gallery/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['max_width'] = '1200';
        $config['max_height'] = '1200';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload1 = $this->upload->do_upload('gallery');
        $file1 = $this->upload->data();
        $gallery = $file1['file_name'];
        if (!$upload1)
        {
          gagal($this->upload->display_errors());
          redirect('admin/gallery/input/');
        }

      $data = array('judul_gallery' =>$judul,'nama_gallery' =>$gallery,'created_at' =>$created,'active_gallery' =>$active,
        'bahasa_id' =>$bahasa);
      $update = $this->gallery->insert_data($data);
      if($update==TRUE){
          sukses('Data has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/gallery/input/');
    }
  }

  public function update_data($id_encrypt)
  {
    $id = $this->encrypt->decode($id_encrypt);
    $this->form_validation->set_rules('judul', 'Title', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      gagal(validation_errors());
      redirect('admin/gallery/edit/'.$id_encrypt);
    }
    else
    {
      $judul = $this->input->post('judul');
      $gallery = $this->input->post('gallery');
      $gallery2 = $this->input->post('gallery2');
      $bahasa = $this->input->post('bahasa');
      $active = $this->input->post('active');
      //upload gambar
        $config['upload_path'] = './gallery/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload1 = $this->upload->do_upload('gallery');
        $file1 = $this->upload->data();
        $gallery = $file1['file_name'];
        if (!$upload1)
        {
          $gallery = $gallery2;
          // gagal($this->upload->display_errors());
          // redirect('admin/gallery/edit/'.$id_encrypt);
        }else{
          $this->gallery->delete_img($id);
        }
      }

      $data = array('judul_gallery' =>$judul,'nama_gallery' =>$gallery,'active_gallery' =>$active,'bahasa_id' =>$bahasa);
      $update = $this->gallery->update($id,$data);
      if($update==TRUE){
          sukses('Data has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/gallery/edit/'.$id_encrypt);
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
         $data = array('active_gallery' => $aktif);
         $update = $this->gallery->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_gallery' => $aktif);
      $update = $this->gallery->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/gallery/');
      }
  }   

  public function delete_data($id)
  {
  if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->gallery->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/gallery/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->gallery->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }
}

/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */