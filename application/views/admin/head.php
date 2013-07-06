<!doctype html>
<html>
<head>
  <?php
   $header = $this->config_website_model->get_by_id(1)->row(); 
   ?>
<title>Home Page Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="<?php echo $header->website_name; ?>">
<meta name="description" content="<?php echo $header->meta_description; ?>">
<meta name="keywords" content="<?php echo $header->meta_header; ?>">
<meta name="author" content="Trikarsa">
<meta name="language" content="Bahasa Indonesia">
<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/icon.png">  <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/admin/mos-css/mos-style.css'); ?>"> <!--pemanggilan file css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/admin/style.css'); ?>"> <!--pemanggilan file css-->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script> <!--pemanggilan jquery-->
</head>