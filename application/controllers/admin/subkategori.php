<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subkategori extends CI_Controller {

  public function index()
  {
    $this->load->view('subkategori/view_all');
  }

  public function input()
  {
    $this->load->view('subkategori/input');
  }

  public function edit()
  {
    $this->load->view('subkategori/edit');
  }

  public function view()
  {
    $this->load->view('subkategori/view');
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

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */