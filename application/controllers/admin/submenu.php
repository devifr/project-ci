<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submenu extends CI_Controller {

  public function index()
  {
    $this->load->view('submenumenu/view_all');
  }

  public function input()
  {
    $this->load->view('submenu/input');
  }

  public function edit()
  {
    $this->load->view('submenu/edit');
  }

  public function view()
  {
    $this->load->view('submenu/view');
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