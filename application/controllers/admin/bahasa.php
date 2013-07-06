<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bahasa extends CI_Controller {

  public function index()
  {
    $this->load->view('bahasa/view_all');
  }

  public function input()
  {
    $this->load->view('bahasa/input');
  }

  public function edit()
  {
    $this->load->view('bahasa/edit');
  }

  public function view()
  {
    $this->load->view('bahasa/view');
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