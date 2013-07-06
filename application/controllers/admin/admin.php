<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model','admin');
    $this->load->library('simpleAuth');
  }

  public function login()
  {
    $cekLogin = $this->simpleauth->cekSudahLogin();
    if($cekLogin)
      redirect('admin/admin/index');
    $this->load->view('admin/login');
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->model('content_model','content');
    $this->load->model('kategori_model','kategori');
    $this->load->model('testimonial_model','testimonial');
    $this->load->model('career_model','career');
    $this->load->model('gallery_model','gallery');
    $this->load->model('contact_us_model','contact');
    $data['jml_posting'] = $this->content->get_all()->num_rows();
    $data['jml_kategori'] = $this->kategori->get_all()->num_rows();
    $data['jml_testimonial'] = $this->testimonial->get_all()->num_rows();
    $data['jml_career'] = $this->career->get_all()->num_rows();
    $data['jml_gallery'] = $this->gallery->get_all()->num_rows();
    $data['jml_contact_us'] = $this->contact->get_all()->num_rows();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('admin/home',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {

    $this->load->view('admin/input');
  }

  public function edit($alert='')
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->session->userdata('id_admin');
    $data['row'] = $this->admin->get_by_id($id)->row();
    $data['alert'] = $alert;
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('admin/my_profile',$data);
    $this->load->view('admin/footer');
  }

  public function view()
  {
    $this->load->view('admin/view');
  }

  public function Dologin()
  {
    $username = $this->input->post('username',TRUE);
    $pass = $this->input->post('password',TRUE);
    $login = $this->simpleauth->login($username,$pass);
    if($login){
      sukses("Login Success");
      redirect('admin/admin/index');
    }else{
      gagal("Login Failed, Check your username and password");
      redirect('admin/admin/login');
    }
  }

  public function Dologout()
  {
    $logout = $this->simpleauth->logout();
    if($logout){
      sukses("Logout Success");
      redirect('admin/admin/login');
    }else{
      gagal("Logout Failed");
      redirect('admin/admin/index');
    }
  }


  public function logout()
  {
    $this->simpleauth->logout();
    redirect('admin/admin/login');
  }

  public function save_data()
  {
    //save code
  }

  public function update_data($pass=NULL)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();

    if($pass!=NULL){
      $this->form_validation->set_error_delimiters('<div class="gagal">', '</div>');
      $this->form_validation->set_rules('old_password', 'Old Password', 'required');
      $this->form_validation->set_rules('new_password', 'New password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirmation password', 'required|matches[new_password]');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/admin/edit/');
      }
      else
      {
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
        $username = $this->session->userdata('username');
        $simpan = $this->simpleauth->edit_password($username, $old_password, $new_password);
        if($simpan==TRUE){
          sukses('Password has Changed');
        }else{
          gagal('Password Failed to Changed');
        }
        redirect('admin/admin/edit/');
      }
    }
    else{ 
      $this->form_validation->set_rules('nama_admin', 'Admin Name', 'required');
      $this->form_validation->set_rules('email_admin', 'Admin Email', 'required|valid_email');
      $this->form_validation->set_rules('username', 'Username', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/admin/edit/');
      }
      else
      {
        $nama = $this->input->post('nama_admin');
        $email = $this->input->post('email_admin');
        $username = $this->input->post('username');
        $id = $this->session->userdata('id_admin');
        $data = array('nama_admin' => $nama , 'email_admin' => $email, 'username' => $username);
        $simpan = $this->simpleauth->update($id, $username, $data, $auto_login = true);
        if($simpan==TRUE){
          sukses('Profile has Changed');
        }else{
          gagal('Profile Failed to Changed');
        }
        redirect('admin/admin/edit/');
      }
    }
  }

  public function delete_data()
  {
    //delete code
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */