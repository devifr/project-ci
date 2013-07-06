<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('content_model','content');
    $this->load->model('kategori_model','kategori');
    $this->load->model('bahasa_model','bahasa');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['result'] = $this->content->get_all();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('content/view_all',$data);
    $this->load->view('admin/footer');
  }


  public function input()
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $data['kategori'] = $this->kategori->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('content/input',$data);
    $this->load->view('admin/footer');
  }

  public function edit($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->content->get_by_id($id);
    $data['bahasa'] = $this->bahasa->get_all()->result();
    $data['kategori'] = $this->kategori->get_all()->result();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('content/edit',$data);
    $this->load->view('admin/footer');
  }

  public function view($id)
  {
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $id = $this->encrypt->decode($id);
    $data['rows'] = $this->content->get_by_id($id,$view='YA');
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('content/view_detail',$data);
    $this->load->view('admin/footer');
  }

  public function save_data()
  {
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('alias', 'Alias URL', 'required|is_unique[content.alias_content]');
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
        $alias = $this->input->post('alias');
        $judul = $this->input->post('judul');
        $description = $this->input->post('description');
        $bahasa = $this->input->post('bahasa');
        $kategori = $this->input->post('kategori');
        $publish_date = $this->input->post('publish_date');
        $hits = '0';
        $created_at = date('Y-m-d');
        $add = $this->input->post('add');
        $active = $this->input->post('active');
        $data = array('alias_content'=>$alias,'judul_content' => $judul,'description' => $description,'kategori_id' => $kategori, 'bahasa_id' => $bahasa,
        'publish_date' => $publish_date,'created_at' => $created_at,'add_other_content' => $add,'hits' => $hits,'active_content' => $active);
        $simpan = $this->content->insert_data($data);
        if($simpan==TRUE){
          sukses('Article has Saved');
        }else{
          gagal('Article Failed to Save');
        }
        redirect('admin/article/input/');
      }
  }

  public function update_data($id_encrypt)
  {
      $id = $this->encrypt->decode($id_encrypt);
      $cekLogin = $this->simpleauth->cekBelumLogin();
      $this->form_validation->set_rules('alias', 'Alias URL', 'required|is_unique_for_edit[content.alias_content]');
      $this->form_validation->set_rules('judul', 'Judul Article', 'required');
      $this->form_validation->set_rules('description', 'Description Article', 'required');
      $this->form_validation->set_rules('bahasa', 'Language', 'required');
      $this->form_validation->set_rules('publish_date', 'Date to Publish', 'required');

      if ($this->form_validation->run() == FALSE)
      {
        gagal(validation_errors());
        redirect('admin/article/edit/'.$id_encrypt);
      }
      else
      {
        $alias = $this->input->post('alias');
        $judul = $this->input->post('judul');
        $description = $this->input->post('description');
        $bahasa = $this->input->post('bahasa');
        $kategori = $this->input->post('kategori');
        $publish_date = $this->input->post('publish_date');
        $active = $this->input->post('active');
        $add = $this->input->post('add');
        $data = array('alias_content'=>$alias,'judul_content' => $judul ,'description' => $description,'kategori_id' => $kategori, 'bahasa_id' => $bahasa,
        'publish_date' => $publish_date,'add_other_content' => $add,'active_content' => $active);
        $simpan = $this->content->update($id,$data);
        if($simpan==TRUE){
          sukses('Article has Saved');
        }else{
          gagal('Article Failed to Save');
        }
        redirect('admin/article/edit/'.$id_encrypt);
      }
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
      redirect('admin/article/');
      }
  }      
  
  public function delete_data($id)
  {
   if($id!='all')
   {
    $id = $this->encrypt->decode($id);
    $delete = $this->content->delete($id);
      if($delete){
        sukses("Data Has Deleted!");
      }else{
        gagal("Data Failed to Deleted!");
      }
      redirect('admin/article/'); 
   }
   else
   {
    $check = $this->input->post('checkid');
      $checkid = explode(',', $check);
      $jml = count($checkid);

       for($i=0; $i<=$jml-1;$i++){
         $idcheck = $this->encrypt->decode($checkid[$i]);
         $delete = $this->content->delete($idcheck);
       }
    if($delete){
      sukses("Data Has Deleted!");
    }else{
      gagal("Data Failed to Deleted!");
    }
   }
  }

}

/* End of file article.php */
/* Location: ./application/controllers/article.php */