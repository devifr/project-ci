<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('career_model','career');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }
  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->career->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('career/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('career/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $data['rows'] = $this->career->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('career/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->career->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('career/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');
      $this->form_validation->set_rules('devisi', 'Devision', 'required');
      $this->form_validation->set_rules('date1', 'Date Started', 'required');
      $this->form_validation->set_rules('date2', 'Date Finished', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/career/input/');
      }
      else
      {
        $title = $this->input->post('title');
        $position = $this->input->post('position');
        $devisi = $this->input->post('devisi');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $description = $this->input->post('description');
        $active = $this->input->post('active');
        $data = array('title' => $title ,'position' => $position,'date_posted' => $date1,'devisi' => $devisi,
        'deadline' => $date2, 'description' => $description, 'status' => $active);
        $simpan = $this->career->insert_data($data);
        if($simpan==TRUE){
          sukses('Career has Saved');
        }else{
          gagal('Career Failed to Save');
        }
        redirect('admin/career/input/');
      }
  }

  public function update_data($id_encrypt)
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $id = $this->encrypt->decode($id_encrypt);
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');
      $this->form_validation->set_rules('devisi', 'Devision', 'required');
      $this->form_validation->set_rules('date1', 'Date Started', 'required');
      $this->form_validation->set_rules('date2', 'Date Finished', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/career/edit/'.$id_encrypt);
      }
      else
      {
        $title = $this->input->post('title');
        $position = $this->input->post('position');
        $devisi = $this->input->post('devisi');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $description = $this->input->post('description');
        $active = $this->input->post('active');
        $data = array('title' => $title ,'position' => $position,'date_posted' => $date1,'devisi' => $devisi,
        'deadline' => $date2, 'description' => $description, 'status' => $active);
        $simpan = $this->career->update($id,$data);
        if($simpan==TRUE){
          sukses('Career has Saved');
        }else{
          gagal('Career Failed to Save');
        }
        redirect('admin/career/edit/'.$id_encrypt);
      }
  }

  public function publish($ket,$id='')
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
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
         $data = array('status' => $aktif);
         $update = $this->career->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('status' => $aktif);
      $update = $this->career->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/career/');
      }
  }      
  
  public function delete_data($id)
  {
   $cekLogin = $this->simpleauth->cekBelumLogin();
   if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->career->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/career/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->career->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }
/* Lamaran Pekerjaan */
  public function inbox(){
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->model('lamaran_model','lamaran');
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->lamaran->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('lamaran/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function inbox_detail($id_encrypt){
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->model('lamaran_model','lamaran');
    $id = $this->encrypt->decode($id_encrypt);
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['rows'] = $this->lamaran->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('lamaran/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function delete_inbox($id){
  $cekLogin = $this->simpleauth->cekBelumLogin();
  $this->load->model('lamaran_model','lamaran');
  if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->lamaran->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/career/inbox/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->lamaran->delete($idcheck);
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