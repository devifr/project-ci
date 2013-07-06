<?php
class Breadcumb {

  public function with_home()
  {
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->model('menu_model','menu'); 
    $lang = $CI->lang->lang();
    $bred1 = $CI->uri->segment(2);
    $bred2 = $CI->uri->segment(3);
    $bred3 = $CI->uri->segment(4);
    $bred4 = $CI->uri->segment(5);

    $nama_link1 = ""; $nama_link2 = ""; $nama_link3 = ""; $nama_link4 = "";

    if($CI->menu->get_url_menu($bred1)->num_rows()>0)
      $nama_link1 = $CI->menu->get_url_menu($bred1)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred2)->num_rows()>0)
      $nama_link2 = $CI->menu->get_url_menu($bred2)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred3)->num_rows()>0)
      $nama_link3 = $CI->menu->get_url_menu($bred3)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred4)->num_rows()>0)
      $nama_link4 = $CI->menu->get_url_menu($bred4)->row()->nama_menu;
    // $nama_link1 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred1)));
    // $nama_link2 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred2)));
    // $nama_link3 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred3)));
    // $nama_link4 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred4)));

    $url = anchor($lang, 'Home', '');
    if($bred1!=""){
       $url .= " | ".anchor("$lang/$bred1", $nama_link1, '');;
    }
    if($bred2!="" and $bred2 != $bred1){
       $url .= " | ".anchor("$lang/$bred1/$bred2", $nama_link2, '');;
    }
    if($bred3!="" and $bred3 != $bred2){
       $url .= " | ".anchor("$lang/$bred2/$bred3", $nama_link3, '');;
    }
    if($bred4!="" and $bred4 != $bred3){
       $url .= " | ".anchor("$lang/$bred2/$bred3/$bred4", $nama_link4, '');;
    }
    
    return $url;
  }

  public function no_home()
  {
    $CI =& get_instance(); 
    $CI->load->helper('url');
    $CI->load->model('menu_model','menu');
    $lang = $CI->lang->lang();
    $bred1 = $CI->uri->segment(2);
    $bred2 = $CI->uri->segment(3);
    $bred3 = $CI->uri->segment(4);
    $bred4 = $CI->uri->segment(5);

    $nama_link1 = ""; $nama_link2 = ""; $nama_link3 = ""; $nama_link4 = "";

    if($CI->menu->get_url_menu($bred1)->num_rows()>0)
      $nama_link1 = $CI->menu->get_url_menu($bred1)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred2)->num_rows()>0)
      $nama_link2 = $CI->menu->get_url_menu($bred2)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred3)->num_rows()>0)
      $nama_link3 = $CI->menu->get_url_menu($bred3)->row()->nama_menu;
    if($CI->menu->get_url_menu($bred4)->num_rows()>0)
      $nama_link4 = $CI->menu->get_url_menu($bred4)->row()->nama_menu;
    // $nama_link1 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred1)));
    // $nama_link2 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred2)));
    // $nama_link3 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred3)));
    // $nama_link4 = str_replace('_', ' ',ucwords(str_replace('-', ' ', $bred4)));

    $url = anchor($lang, 'Home', '');
    if($bred1!=""){
      if($CI->menu->get_url_menu($bred1)->num_rows()>0){
       $url .= anchor("$lang/home/$bred1", $nama_link1, '');
      }
    }
    if($bred2!="" and $bred2 != $bred1){
      if($CI->menu->get_url_menu($bred2)->num_rows()>0){
       $url .= " | ".anchor("$lang/home/$bred1/$bred2", $nama_link2, '');
      }
    }
    if($bred3!="" and $bred3 != $bred2){
      if($CI->menu->get_url_menu($bred3)->num_rows()>0){
       $url .= " | ".anchor("$lang/home/$bred2/$bred3", $nama_link3, '');
      }
    }
    if($bred4!="" and $bred4 != $bred3){
      if($CI->menu->get_url_menu($bred4)->num_rows()>0){
       $url .= " | ".anchor("$lang/home/$bred2/$bred3/$bred4", $nama_link4, '');
      }
    }
    return $url;
  }

}