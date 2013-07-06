<?php
class About extends CI_Controller {
 
 function index()
 {
  // you might want to just autoload these two helpers
  $this->load->helper('language');
  $this->load->helper('url');
 
  // load language file
  $this->lang->load('about');
 
 
  $this->load->view('about');
 }
}
 
/* End of file about.php */
/* Location: ./application/controllers/about.php */
