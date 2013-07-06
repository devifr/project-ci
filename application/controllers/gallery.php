<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('banner_slideshow_model','banner');
    $this->load->model('menu_model','menu');
    $this->load->model('gallery_model','gallery');
    $this->load->library('breadcumb','breadcumb');
    $this->load->helper('language');
    $this->load->helper('url');
    $this->lang->load('home');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $bhs = $this->lang->lang();
    //pagination 
    $jumlah = $this->gallery->get_all()->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url($bhs.'/gallery/index');
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 18;
    $config['uri_segment'] = 4;
    // $config['num_links'] = 3;
    $config['num_tag_open'] = '<li> ';
    $config['num_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li> ';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li> ';
    $config['last_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li> ';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li> ';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = '&gt;';
    $config['prev_link'] = '&lt;';
    $config['cur_tag_open'] = '<b>';
    $config['cur_tag_close'] = '</b>';
    
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

    $data_gallerys = $this->gallery->get_all_limit_pagination($config["per_page"],$page);
    $data_content['gallerys'] = $data_gallerys;
    $data_content['breadcumb'] = $this->breadcumb->with_home();
    $data_content['pagination'] = $this->pagination->create_links();

    $this->load->view('home/head');
    $this->load->view('home/header2');
    $this->load->view('gallery/gallery',$data_content);
    $this->load->view('home/footer');
  }
}

/* End of file career.php */
/* Location: ./application/controllers/career.php */