<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('contact_us_model','contact_us');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->contact_us->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('contact_us/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $this->load->view('contact_us/input');
  }

  public function edit()
  {
    $this->load->view('contact_us/edit');
  }

  public function view($id_encrypt)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id_encrypt);
    $data['rows'] = $this->contact_us->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('contact_us/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
    //save code
  }

  public function update_data()
  {
    //update code
  }

  public function delete_data($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
  if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->contact_us->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/contact_us/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->contact_us->delete($idcheck);
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