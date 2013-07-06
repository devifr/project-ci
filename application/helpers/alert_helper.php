<?php

  function sukses($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata("msg", "<div class='sukses'> $message</div>");
  }

  function gagal($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata("msg", "<div class='gagal'> $message</div>");
  }

  function informasi($message = '')
  {
    $CI =& get_instance();
    return "<div class='informasi'> $message</div>";
  }

  function informasi_front($message = '')
  {
    $CI =& get_instance();
    return "<div class='informasi_front'> $message</div>";
  }

  function sukses_front($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata("msg", "<div class='sukses_front'> $message</div>");
  }

  function gagal_front($message = '')
  {
    $CI =& get_instance();
    return $CI->session->set_flashdata("msg", "<div class='gagal_front'> $message</div>");
  }

?>