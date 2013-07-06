<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_slideshow extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('banner_slideshow_model','banner');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->banner->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('banner_slideshow/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('banner_slideshow/form_banner',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['rows'] = $this->banner->get_by_id($id);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('banner_slideshow/edit_banner',$data);
    $this->load->view('admin/footer');
  }

  public function view()
  {
    $this->load->view('banner_slideshow/view');
  }

  public function save_data()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    // $this->form_validation->set_rules('title', 'Title', 'required');
    // $this->form_validation->set_rules('bahasa', 'Language', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      gagal(validation_errors());
      redirect('admin/banner_slideshow/input/');
    }
    else
    {
      $banner = $this->input->post('banner');
      //upload gambar
        $config['upload_path'] = './asset/images/web/banner/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload2 = $this->upload->do_upload('banner');
        $file2 = $this->upload->data();
        $banner = $file2['file_name'];
        if (!$upload2)
        {
          gagal($this->upload->display_errors());
          redirect('admin/banner_slideshow/input/');
        }
      $title = $this->input->post('title');  
      $active = $this->input->post('active');  
      $bahasa = $this->input->post('bahasa');  
      $data = array('title_banner_slide'=>$title,'banner_slide_name' => $banner,'active_banner_slide'=>$active,'bahasa_id'=>$bahasa);
      $update = $this->banner->insert_data($data);
        if($update==TRUE){
         sukses('Data Has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/banner_slideshow/input/');
    }
  }

  public function update_data($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    // $this->form_validation->set_rules('title', 'Title', 'required');
    // $this->form_validation->set_rules('bahasa', 'Language', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      gagal(validation_errors());
      redirect('admin/banner_slideshow/edit/'.$id_encrypt);
    }
    else
    {
      $banner = $this->input->post('banner');
      $banner2 = $this->input->post('banner2');
   //upload gambar
        $config['upload_path'] = './asset/images/web/banner/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload2 = $this->upload->do_upload('banner');
        $file2 = $this->upload->data();
        $banner = $file2['file_name'];
        if (!$upload2)
        {
          $banner = $banner2;
          // gagal($this->upload->display_errors());
          // redirect('admin/banner_slideshow/edit/'.$id_encrypt);
        }
      $title = $this->input->post('title');  
      $active = $this->input->post('active');  
      $bahasa = $this->input->post('bahasa');  
      $data = array('title_banner_slide'=>$title,'banner_slide_name' => $banner,'active_banner_slide'=>$active,'bahasa_id'=>$bahasa);
      $delete = $this->banner->delete_img($id);
      if($delete==TRUE)
        $update = $this->banner->update($id,$data);
          if($update==TRUE){
           sukses('Data Has Saved');
          }else{
            gagal('Data Failed to Save');
          }
        redirect('admin/banner_slideshow/edit/'.$id_encrypt);
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
         $data = array('active_banner_slide' => $aktif);
         $update = $this->banner->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_banner_slide' => $aktif);
      $update = $this->banner->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/banner_slideshow/');
      }
  }   

  public function delete_data($id)
  {
  if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->banner->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/banner_slideshow/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->banner->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }

}

/* End of file banner_slideshow.php */
/* Location: ./application/controllers/admin/banner_slideshow.php */