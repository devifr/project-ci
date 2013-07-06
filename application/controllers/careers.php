<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careers extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('banner_slideshow_model','banner');
    $this->load->model('menu_model','menu');
    $this->load->model('career_model','career');
    $this->load->helper('language');
    $this->load->library('breadcumb','breadcumb');
    $this->load->helper('url');
    $this->load->helper('date');
    $this->lang->load('home');
    $this->load->model('lamaran_model','lamaran');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $bhs = $this->lang->lang();
    $data_banner['banners'] = $this->banner->get_all($bhs);
    $data_content['careers'] = $this->career->get_all_limit('10');
    $data_content['breadcumb'] = $this->breadcumb->with_home(); 
    $this->load->view('home/head');
    $this->load->view('home/header');
    $this->load->view('home/menu');
    $this->load->view('home/banner',$data_banner);
    $this->load->view('career/careers',$data_content);
    $this->load->view('home/footer');
  }

  public function job($id_encrypt)
  {
    $bhs = $this->lang->lang();
    $id = $this->encrypt->decode($id_encrypt);
    //captcha
    $this->load->helper('captcha');
    $vals = array(
      'img_path' => './captcha/',
      'img_url' => base_url().'/captcha/',
      'img_width' => '150',
      'img_height' => '50',
      'expiration' => 7200

    );

    $cap = create_captcha($vals);

    $data = array(
    'captcha_time' => $cap['time'],
    'ip_address' => $this->input->ip_address(),
    'word' => $cap['word']
    );

    $query = $this->db->insert_string('captcha', $data);
    $this->db->query($query);
    $data_content['captcha'] = $cap['image'];

    $data_content['rows'] = $this->career->get_by_id($id);
    $data_content['id_encrypt'] = $id_encrypt;
    $this->load->view('home/head');
    $this->load->view('home/header2');
    $this->load->view('career/job',$data_content);
    $this->load->view('home/footer');
  } 

  public function apply_job($id_encrypt)
  {
    $bhs = $this->lang->lang();
    $id = $this->encrypt->decode($id_encrypt);
    $data_content['rows'] = $this->career->get_by_id($id);
    $this->load->view('career/form_job',$data_content);
  }

  public function sendEmail($email){
    $config['protocol'] = 'mail';
    $config['wordwrap'] = FALSE;
    $config['mailtype'] = 'html'; 
    $this->email->initialize($config);
    $this->email->from($email['email']);
    $this->email->to('dfedogawa3@gmail.com');
    //$this->email->cc("christian.latif@tri-karsa.com");
    //$this->email->bcc('them@their-example.com');

    $this->email->subject('Application Form | '.$email['name']);
    $msg = $this->load->view('career/email_job',$email,TRUE);
    $this->email->message($msg);

    $kirim = $this->email->send();
    if($kirim==TRUE){
      return $kirim;
    }else{
      echo "<script>alert('".$this->email->print_debugger()."');</script>";
    }
  }  

  public function save_data($id_encrypt){
      // First, delete old captchas
      $expiration = time()-7200; // Two hour limit
      $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);

      // Then see if a captcha exists:
      $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
      $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
      $query = $this->db->query($sql, $binds);
      $row = $query->row();

      if ($row->count == 0)
      {
        $status = "error";
        $msg = "You must submit the word that appears in the image";
      }else{
      $this->form_validation->set_rules('name_lamaran', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('no_phone', 'No Phone', 'required');
      $this->form_validation->set_rules('address', 'Address', 'required');
      $this->form_validation->set_rules('cover', 'Cover Letter', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        // gagal(validation_errors());
        $status = "error";
        $msg = "Your Input Not Completed";
        // redirect('careers/apply_job/'.$id_encrypt);
      }
      else
      {
        $id_career = $this->encrypt->decode($id_encrypt);
        $name = $this->input->post('name_lamaran');
        $emails = $this->input->post('email');
        $no_phone = $this->input->post('no_phone');
        $address = $this->input->post('address');
        $education = $this->input->post('education');
        $cover = $this->input->post('cover');
        $date_apply = date('Y-m-d');
       //upload gambar
        $config['upload_path'] = './lamaran/';
        $config['allowed_types'] = 'doc|zip|docx';
        $config['max_size'] = '20240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload1 = $this->upload->do_upload('attach');
        $file1 = $this->upload->data();
        $attach = $file1['file_name'];
        if (!$upload1)
        {
           // gagal($this->upload->display_errors());
           $status = "error";
           $msg = "Something Wrong On File You Download";
           // redirect('careers/apply_job/'.$id_encrypt);
        }
        //set email

        $email['nama'] = $name;
        $email['email'] = $emails;
        $email['no_phone'] = $no_phone;
        $email['address'] = $address;
        $email['education'] = $education;
        $email['cover'] = $cover;
        $email['date_apply'] = $date_apply;

        $data = array('career_id'=>$id_career,'name_lamaran' => $name,'email_lamaran' => $emails,'phone_lamaran' => $no_phone,
        'address_lamaran' => $address, 'education_lamaran'=>$education, 'cover_lamaran' => $cover, 'date_apply' => $date_apply,'lampiran_lamaran' => $attach);
        $simpan = $this->lamaran->insert_data($data);
        if($simpan==TRUE){
          // sukses('Career has Saved');
          // $this->sendEmail($email);
          $status = "success";
          $msg = "Career has Saved";
          // redirect('careers/');
        }else{
          // gagal('Career Failed to Save');
          $status = "error";
          $msg = "Career Failed to Save";
          // redirect('careers/apply_job/'.$id_encrypt);
        }
      }  
    } 
      echo json_encode(array('status' => $status, 'msg' => $msg));
 
}


  
}

/* End of file career.php */
/* Location: ./application/controllers/career.php */