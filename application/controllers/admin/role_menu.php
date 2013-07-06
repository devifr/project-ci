<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_menu extends CI_Controller {

  public function index()
  {
    $this->load->view('role_menu/view_all');
  }

  public function input()
  {
    $this->load->view('role_menu/input');
  }

  public function edit()
  {
    $this->load->view('role_menu/edit');
  }

  public function view()
  {
    $this->load->view('role_menu/view');
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