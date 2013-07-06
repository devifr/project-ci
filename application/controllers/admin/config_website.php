<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_website extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('config_website_model','con_web');
    $this->load->library('simpleAuth');
    // $this->output->enable_profiler(TRUE);
  }

  public function index()
  {
    $this->edit();
  }

  public function input()
  {

  }

  public function phpinfo()
  {
    $this->load->view('config_website/phpinfo');
  }

  public function help()
  {
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('config_website/help');
    $this->load->view('admin/footer');
  }

  public function system_config(){
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('config_website/system_config');
    $this->load->view('admin/footer');
  }

  public function edit()
  {
    $data['row'] = $this->con_web->get_by_id(1)->row();
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('config_website/form',$data);
    $this->load->view('admin/footer');
  }

  public function view()
  {
    $this->load->view('config_website/view');
  }

  public function save_data()
  {
    //save data not use
  }

  public function update_data()
  {
    $this->form_validation->set_rules('web_name', 'Website Name', 'required');
    $this->form_validation->set_rules('meta_head', 'Meta header', 'required');
    $this->form_validation->set_rules('meta_desc', 'Meta Description', 'required');
    $this->form_validation->set_rules('email', 'Email Contact', 'required|valid_email');
    $this->form_validation->set_rules('footer', 'footer', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      gagal(validation_errors());
      redirect('admin/config_website/edit/');
    }
    else
    {
      $web_name = $this->input->post('web_name');
      $meta_head = $this->input->post('meta_head');
      $meta_desc = $this->input->post('meta_desc');
      $icon = $this->input->post('icon');
      $icon2 = $this->input->post('icon2');
      $logo = $this->input->post('logo');
      $logo2 = $this->input->post('logo2');
      $banner = $this->input->post('banner');
      $banner2 = $this->input->post('banner2');
      $email = $this->input->post('email');
      $footer = $this->input->post('footer');
      //upload gambar
        $config['upload_path'] = './asset/images/web/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload1 = $this->upload->do_upload('icon');
        $file1 = $this->upload->data();
        $icon = $file1['file_name'];
        if (!$upload1)
        {
          $icon = $icon2;
          // gagal($this->upload->display_errors());
          // redirect('admin/config_website/edit/');
        }else{
          unlink('./asset/images/web/'.$icon2);
        }

      //upload gambar
        $config['upload_path'] = './asset/images/web/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload2 = $this->upload->do_upload('logo');
        $file2 = $this->upload->data();
        $icon = $file2['file_name'];
        if (!$upload2)
        {
           $logo = $logo2;
          // gagal($this->upload->display_errors());
          // redirect('admin/config_website/edit/');
        }else{
          unlink('./asset/images/web/'.$logo2);
        }

      $data = array('website_name' =>$web_name,'meta_header' =>$meta_head,'meta_description' =>$meta_desc,'icon_name' =>$icon,
        'logo_name' =>$logo, 'email_contact' =>$email,'footer' =>$footer);
      $update = $this->con_web->update($data);
      if($update==TRUE){
          sukses('Data has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/config_website/edit/');
    }
  }

  public function delete_data()
  {
    //delete code
  }

  //component
  public function change_background()
  {
    $this->load->model('config_website_model','con_web');
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['rows'] = $this->con_web->get_by_id(1);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('config_website/form_background',$data);
    $this->load->view('admin/footer');
  }

  public function upload_bg()
  {
    $this->load->model('config_website_model','con_web');
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->form_validation->set_rules('back', 'Background', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      gagal(validation_errors());
      redirect('admin/config_website/change_background/');
    }
    else
    {
      $bg = $this->input->post('back');
      $bg2 = $this->input->post('bg2');
        //upload gambar
          $config['upload_path'] = './asset/images/web/background';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '10240';
          $config['encrypt_name']  = TRUE;
          $this->load->library('upload', $config);
          $upload1 = $this->upload->do_upload('back');
          $file1 = $this->upload->data();
          $background = $file1['file_name'];
          if (!$upload1)
          {
            gagal($this->upload->display_errors());
            redirect('admin/config_website/change_background/');
          }else{
            unlink('./asset/images/web/background/'.$bg2);
          }
      $data = array('background_name' =>$background);
      $update = $this->con_web->update($data);
        if($update==TRUE){
         sukses('Data Has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/config_website/change_background/');
    }
  }

  public function change_banner()
  {
    $this->load->model('config_website_model','con_web');
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $data['rows'] = $this->con_web->get_by_id(1);
    $this->load->view('admin/head');
    $this->load->view('admin/header');
    $this->load->view('admin/menu');
    $this->load->view('config_website/form_banner',$data);
    $this->load->view('admin/footer');
  }

  public function upload_banner()
  {
    $this->load->model('config_website_model','con_web');
    $cekLogin = $this->simpleauth->cekBelumLogin();
    $this->form_validation->set_rules('banner', 'Banner', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      gagal(validation_errors());
      redirect('admin/config_website/change_banner/');
    }
    else
    {
      $banner = $this->input->post('banner');
      $banner2 = $this->input->post('banner2');
      //upload gambar
        $config['upload_path'] = './asset/images/web/banner/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '10240';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);
        $upload2 = $this->upload->do_upload('banner');
        $file2 = $this->upload->data();
        $banner = $file2['file_name'];
        if (!$upload2)
        {
          gagal($this->upload->display_errors());
          redirect('admin/config_website/change_banner/');
        }else{
          unlink('./asset/images/web/banner/'.$banner2);
        }
      $data = array('banner_name' => $banner);
      $update = $this->con_web->update($data);
        if($update==TRUE){
         sukses('Data Has Saved');
        }else{
          gagal('Data Failed to Save');
        }
        redirect('admin/config_website/change_banner/');
    }
  }

}

/* End of file config_website.php */
/* Location: ./application/controllers/admin/config_website.php */