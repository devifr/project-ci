<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_menu extends CI_Controller {

  public function index()
  {
    $this->load->view('kategori_menu/view_all');
  }

  public function input()
  {
    $this->load->view('kategori_menu/input');
  }

  public function edit()
  {
    $this->load->view('kategori_menu/edit');
  }

  public function view()
  {
    $this->load->view('kategori_menu/view');
  }

  public function save_data()
  {
    //save code
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */