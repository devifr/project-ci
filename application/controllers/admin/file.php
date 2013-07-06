<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('content_model','content');
    $this->load->model('kategori_model','kategori');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->content->get_all();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('file/view_all',$data);
    $this->load->view('admin/footer');
  }

  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('file/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->content->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('file/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->content->get_by_id($id);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('file/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('judul', 'Judul Article', 'required');
      $this->form_validation->set_rules('description', 'Description Article', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');
      $this->form_validation->set_rules('publish_date', 'Date to Publish', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/article/input/');
      }
      else
      {
        $judul = $this->input->post('judul');
        $description = $this->input->post('description');
        $bahasa = $this->input->post('bahasa');
        $kategori = $this->input->post('kategori');
        $publish_date = $this->input->post('publish_date');
        $hits = '0';
        $created_at = date('Y-m-d');
        $active = $this->input->post('active');
        $data = array('judul_content' => $judul ,'description' => $description,'kategori_id' => $kategori, 'bahasa_id' => $bahasa,
        'publish_date' => $publish_date,'created_at' => $created_at,'hits' => $hits,'active_content' => $active);
        $simpan = $this->content->insert_data($data);
        if($simpan==TRUE){
          sukses('Article has Saved');
        }else{
          gagal('Article Failed to Save');
        }
        redirect('admin/article/input/');
      }
  }

  public function update_data()
  {
    //update code
  }

  public function delete_data()
  {
    //delete code
  }

}

/* End of file file.php */
/* Location: ./application/controllers/file.php */