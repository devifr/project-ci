<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

  public function index()
  {
    $this->load->view('content/view_all');
  }

  public function input()
  {
    $this->load->view('content/input');
  }

  public function edit()
  {
    $this->load->view('content/edit');
  }

  public function view()
  {
    $this->load->view('content/view');
  }

  public function save_data()
  {
    //save code
  }

  public function update_data()
  {
    //update code
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
         $data = array('active_content' => $aktif);
         $update = $this->content->update($idcheck,$data);
       }
       
       if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
    }else{
      $id = $this->encrypt->decode($id);
      $data = array('active_content' => $aktif);
      $update = $this->content->update($id,$data);
      if($update){
        sukses("$msgsukes");
      }else{
        gagal("$msggagal");
      }
      redirect('admin/content/');
      }
  }

  public function delete_data()
  {
    //delete code
  }

}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */