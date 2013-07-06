<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

  public function index()
  {
    $this->load->view('role/view_all');
  }

  public function input()
  {
    $this->load->view('role/input');
  }

  public function edit()
  {
    $this->load->view('role/edit');
  }

  public function view()
  {
    $this->load->view('role/view');
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