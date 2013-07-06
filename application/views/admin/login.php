<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/icon.png"> 
<!--STYLESHEETS-->
<link href="<?php echo base_url(); ?>asset/css/login/style.css" rel="stylesheet" type="text/css" />
<!--SCRIPTS-->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
  $(".username").focus(function() {
    $(".user-icon").css("left","-48px");
  });
  $(".username").blur(function() {
    $(".user-icon").css("left","0px");
  });
  
  $(".password").focus(function() {
    $(".pass-icon").css("left","-48px");
  });
  $(".password").blur(function() {
    $(".pass-icon").css("left","0px");
  });
});
</script>

</head>
<body>
<img src="<?php echo base_url(); ?>asset/images/login/background-trikarsa.jpg" id="low" />
<!--WRAPPER-->
<div id="wrapper">

  <!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="<?php echo base_url(); ?>index.php/admin/admin/Dologin" method="post">
  <!--HEADER-->
    <div class="header">
    <!--TITLE--><h1 align="center"><img src="<?php echo base_url(); ?>asset/images/logo-trikarsa.png" width="200" /></h1>
    <!--END TITLE-->
    <!--DESCRIPTION--><span> Administrator Program By PT Trikarsa Sistemindo</span><!--END DESCRIPTION-->
    <?php echo $this->session->flashdata('msg'); ?>
    </div>
    <!--END HEADER-->
  
  <!--CONTENT-->
    <div class="content">
  <!--USERNAME--><input name="username" type="text" class="input username" value="Username" onfocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password" onfocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>