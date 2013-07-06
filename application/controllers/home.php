<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('banner_slideshow_model','banner');
		$this->load->model('menu_model','menu');
		$this->load->model('content_model','content');
		$this->load->model('testimonial_model','testimonial');
		$this->load->library('breadcumb','breadcumb');
		$this->load->helper('language');
  	$this->load->helper('url');
  	$this->lang->load('home');
  	// $this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$bhs = $this->lang->lang();
		$data_banner['banners'] = $this->banner->get_all($bhs);
		$data_content['front'] = $this->content->get_all_by_kategori('11',$bhs,'1');
		$data_content['latest_news'] = $this->content->get_all_by_kategori('2',$bhs,'5')->result();
		$data_content['corporate_info'] = $this->content->get_all_by_kategori('3',$bhs,'5')->result();
		$data_content['testimonial'] = $this->testimonial->get_all_limit('3');
		$this->load->view('home/head');
		$this->load->view('home/header');
		$this->load->view('home/menu');
		$this->load->view('home/banner',$data_banner);
		$this->load->view('home/index',$data_content);
		$this->load->view('home/footer');
	}

	public function detail($alias_kate,$alias=NULL)
	{
		$bhs = $this->lang->lang();
		$data_banner['banners'] = $this->banner->get_all($bhs);
		$data_content['rows'] = $this->content->get_by_alias($alias_kate,$alias,$bhs);
		$data_content['corporate_info'] = $this->content->get_all_by_kategori('3',$bhs,'5')->result();
		$data_content['latest_news'] = $this->content->get_all_by_kategori('2',$bhs,'5')->result();
		$data_content['breadcumb'] = $this->breadcumb->no_home();
		$this->load->view('home/head');
		$this->load->view('home/header');
		$this->load->view('home/menu');
		$this->load->view('home/banner',$data_banner);
		$this->load->view('home/detail',$data_content);
		$this->load->view('home/footer');
	}	

	public function page($alias_menu,$alias=NULL)
	{
		$bhs = $this->lang->lang();
		if($alias==NULL)
			$alias = $alias_menu;
		$data_banner['banners'] = $this->banner->get_all($bhs);
		$data_content['rows'] = $this->content->get_by_alias_menu($alias,$bhs);
		$data_content['latest_news'] = $this->content->get_all_by_kategori('2',$bhs,'5')->result();
		$data_content['breadcumb'] = $this->breadcumb->no_home();
		$this->load->view('home/head');
		$this->load->view('home/header');
		$this->load->view('home/menu');
		$this->load->view('home/banner',$data_banner);
		$this->load->view('home/page',$data_content);
		$this->load->view('home/footer');
	}

	public function news()
	{
		$bhs = $this->lang->lang();

		$jumlah = $this->content->get_all_news($bhs)->num_rows();
    $this->load->library('pagination');
    $config['base_url'] = base_url($bhs.'/home/news/');
    $config['total_rows'] = $jumlah;
    $config['per_page'] = 10;
    $config['uri_segment'] = 4;
    $config['num_links'] = 3;
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
    $config['cur_tag_open'] = '<li><b>';
    $config['cur_tag_close'] = '</b></li>';
    
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data_banner['banners'] = $this->banner->get_all($bhs);
		$data_content['lists'] = $this->content->get_all_news($bhs,$config['per_page'],$page);
    $data_content['pagination'] = $this->pagination->create_links();
		$data_content['latest_news'] = $this->content->get_all_by_kategori('2',$bhs)->result();
		$data_content['corporate_info'] = $this->content->get_all_by_kategori('3',$bhs)->result();
		$data_content['breadcumb'] = $this->breadcumb->no_home();
		$this->load->view('home/head');
		$this->load->view('home/header');
		$this->load->view('home/menu');
		$this->load->view('home/banner',$data_banner);
		$this->load->view('home/list',$data_content);
		$this->load->view('home/footer');
	}

	public function search(){
		$search = $this->input->post('q');
		$data['word'] = $search;
		$bhs = $this->lang->lang();

		$data_banner['banners'] = $this->banner->get_all($bhs);
		$data['search_article'] = $this->content->search_content($search,$limit=NULL,"both");
		// $data['search_news'] = $this->content->search_news($word);
		// $data['search_career'] = $this->content->search_career($word);
		$this->load->view('home/head');
		$this->load->view('home/header');
		$this->load->view('home/menu');
		$this->load->view('home/banner',$data_banner);
		$this->load->view("home/search",$data);
		$this->load->view('home/footer');
	}	

	public function GetSearch(){
		$search = $this->input->post('q');
		$data = $this->content->search_content($search,$limit=NULL,"after");
		$isi_search = "<ul>";
		if($data->num_rows()>0){
			foreach ($data->result() as $key => $row) {
				$isi_search .= '<li id="isi-search" class="isi-search" onclick="tempel(\''.$row->judul_content.'\')">'.$row->judul_content.'</li>';
			}
		}
		$isi_search .= "</ul>";
		echo $isi_search;
	}	


	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */