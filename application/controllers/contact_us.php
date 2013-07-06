<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_us extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('banner_slideshow_model','banner');
    $this->load->model('menu_model','menu');
    $this->load->model('contact_us_model','contact');
    $this->load->library('breadcumb','breadcumb');
    $this->load->helper('language');
    $this->load->helper('url');
    $this->lang->load('home');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $bhs = $this->lang->lang();
    $data_content['breadcumb'] = $this->breadcumb->with_home();
    $data_banner['banners'] = $this->banner->get_all($bhs);
    $this->load->view('home/head');
    $this->load->view('home/header');
    $this->load->view('home/menu');
    $this->load->view('home/banner',$data_banner);
    $this->load->view('contact_us/contact_us',$data_content);
    $this->load->view('home/footer');
  }

  public function save_data()
  {
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('subject', 'Subject', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal_front(validation_errors());
        redirect("$bhs/contact_us/");
      }
      else
      {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $description = $this->input->post('description');
        $created_at = date('Y-m-d');
        $bhs = $this->lang->lang();
        $data = array('nama_pengirim'=>$name,'email_pengirim' => $email,'judul_contact' => $subject,
            'description_contact' => $description, 'date_post' => $created_at);
        $simpan = $this->contact->insert_data($data);
        if($simpan==TRUE){
          sukses_front('Thanks, We Will Reply Your Post');
        }else{
          gagal_front('Something Wrong');
        }
        redirect("$bhs/contact_us/");
      }
  }

}

/* End of file career.php */
/* Location: ./application/controllers/career.php */