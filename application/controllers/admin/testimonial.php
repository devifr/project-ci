<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('testimonial_model','testimonial');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->testimonial->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('testimonial/view_all',$data);
    $this->load->view('admin/footer');
  }


  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('testimonial/input');
    $this->load->view('admin/footer');
  }

  public function edit($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->testimonial->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('testimonial/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->testimonial->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('testimonial/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description Testimonial', 'required');
      $this->form_validation->set_rules('created_by', 'Created By', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/testimonial/input/');
      }
      else
      {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $created_by = $this->input->post('created_by');
        $email = $this->input->post('email');
        $active = $this->input->post('active');
        if (!empty($_FILES['foto']['name'])){
          //upload gambar
          $config['upload_path'] = './testimonial/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '10240';
          $config['encrypt_name']  = TRUE;
          $this->load->library('upload', $config);
          $upload2 = $this->upload->do_upload('foto');
          $file2 = $this->upload->data();
          $foto = $file2['file_name'];
          if (!$upload2)
          {
            gagal($this->upload->display_errors());
            redirect('admin/testimonial/input/');
          }
        }else{
          $foto = "";
        }
        $data = array('title_testimonial' => $title, 'description_testimonial' => $description,'created_by_testimonial' => $created_by,
        'email_testimonial'=>$email,'attachment_testimonial'=>$foto,'active_testimonial' => $active);
        $simpan = $this->testimonial->insert_data($data);
        if($simpan==TRUE){
          sukses('Testimonial has Saved');
        }else{
          gagal('Testimonial Failed to Save');
        }
        redirect('admin/testimonial/input/');
      }
  }

  public function update_data($id_encrypt)
  {
      $id = $this->encrypt->decode($id_encrypt);
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description Testimonial', 'required');
      $this->form_validation->set_rules('created_by', 'Created By', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/testimonial/edit/'.$id_encrypt);
      }
      else
      {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $created_by = $this->input->post('created_by');
        $email = $this->input->post('email');
        $active = $this->input->post('active');
        $foto2 = $this->input->post('foto2');
        if (!empty($_FILES['foto']['name'])){
          //upload gambar
          $config['upload_path'] = './testimonial/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '10240';
          $config['encrypt_name']  = TRUE;
          $this->load->library('upload', $config);
          $upload2 = $this->upload->do_upload('foto');
          $file2 = $this->upload->data();
          $foto = $file2['file_name'];
          if (!$upload2)
          {
            gagal($this->upload->display_errors());
            redirect('admin/testimonial/input/');
          }else{
            $this->testimonial->delete_img($id);
          }
        }else{
          $foto = $foto2;
        }
        $data = array('title_testimonial' => $title, 'description_testimonial' => $description,'created_by_testimonial' => $created_by,
        'email_testimonial'=>$email,'attachment_testimonial'=>$foto,'active_testimonial' => $active);
        $simpan = $this->testimonial->update($id,$data);
        if($simpan==TRUE){
          sukses('Testimonial has Saved');
        }else{
          gagal('Testimonial Failed to Save');
        }
        redirect('admin/testimonial/edit/'.$id_encrypt);
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
         $data = array('active_testimonial' => $aktif);
         $update = $this->testimonial->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_testimonial' => $aktif);
      $update = $this->testimonial->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/testimonial/');
      }
  }      
  
  public function delete_data($id)
  {
   if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->testimonial->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/testimonial/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->testimonial->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }

}

/* End of file article.php */
/* Location: ./application/controllers/article.php */