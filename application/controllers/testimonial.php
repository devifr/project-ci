<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('testimonial_model','testimonial');
    $this->load->library('breadcumb','breadcumb');
    $this->load->model('banner_slideshow_model','banner');
    $this->load->model('menu_model','menu');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $bhs = $this->lang->lang();

    $jumlah = $this->testimonial->get_all_active()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url($bhs.'/testimonial/index');
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 10;
    $config['uri_segment'] = 4;
    // $config['num_links'] = 3;
    $config['full_tag_open'] = '<li> ';
    $config['full_tag_close'] = '</li>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = '&gt;';
    $config['prev_link'] = '&lt;';
    $config['cur_tag_open'] = '<b>';
    $config['cur_tag_close'] = '</b>';
    
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $data['pagination'] = $this->pagination->create_links();
    $data['testimonial'] = $this->testimonial->get_all_pagination($config["per_page"],$page);
    $data_banner['banners'] = $this->banner->get_all($bhs);
    $data['breadcumb'] = $this->breadcumb->with_home();
    $this->load->view('home/head');
    $this->load->view('home/header');
    $this->load->view('home/menu');
    $this->load->view('home/banner',$data_banner);
    $this->load->view('testimonial/view_all_front',$data);
    $this->load->view('home/footer');
  }


  public function input()
  {
    // $bhs = $this->lang->lang();
    // $data_banner['banners'] = $this->banner->get_all($bhs);
    // $data['breadcumb'] = $this->breadcumb->with_home();
    // $this->load->view('home/head');
    // $this->load->view('home/header');
    // $this->load->view('home/menu');
    // $this->load->view('home/banner',$data_banner);
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
    $data['captcha'] = $cap['image'];

    $this->load->view('testimonial/input_front',$data);
    // $this->load->view('home/footer');
  }


  public function view($id)
  {
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->testimonial->get_by_id($id);
    $data['breadcumb'] = $this->breadcumb->no_home();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('testimonial/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
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
          gagal('You must submit the word that appears in the image');
          redirect('testimonial/input/');
      }else{
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('description', 'Description Testimonial', 'required');
      $this->form_validation->set_rules('created_by', 'Created By', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == FALSE)
      {
        gagal_front(validation_errors());
        redirect('testimonial/input/');
      }
      else
      {
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $created_by = $this->input->post('created_by');
        $email = $this->input->post('email');
        $active = '0';
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
            redirect('testimonial/input/');
          }
        }else{
          $foto = "";
        }
        $data = array('title_testimonial' => $title, 'description_testimonial' => $description,'created_by_testimonial' => $created_by,
        'email_testimonial'=>$email,'attachment_testimonial'=>$foto,'active_testimonial' => $active);
        $simpan = $this->testimonial->insert_data($data);
        if($simpan==TRUE){
          sukses_front('Thanks You Send Your Testimonial');
        }else{
          gagal_front('Testimonial Failed to Save');
        }
        redirect('testimonial/input/');
      }
    }
  }

}

/* End of file article.php */
/* Location: ./application/controllers/article.php */