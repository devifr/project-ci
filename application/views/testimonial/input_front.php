<link href="<?php echo css_url('frontend/templatemo_style.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo css_url('frontend/menu.css'); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo css_url('frontend/style.css'); ?>" type="text/css" />

<div id="templatemo_main" style="margin:20px;">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
<?php echo $this->session->flashdata('msg'); ?>
<div class="content_box">
  <?php $lang = $this->lang->lang(); ?>
          <h2>Client Testimonial</h2>
          <h4>Testimonial Form</h4>
          <p>Please Write Your Testimonial For <strong>PT.Trikarsa Sempurna Sistemindo</strong>&nbsp;International. This name is protected by Indonesia copyright law</p>
          <div id="testimonial" style="margin-bottom:30px;">  
  <form id="input_category" name="input_category" method="post" action="<?php echo base_url($lang.'/testimonial/save_data'); ?>" enctype="multipart/form-data">
    <table width="95%" style="font-size:12px;">
      <tr><td>Company</td><td width="801">
        <input type="text" name="title" id="title" class="input_field" value="<?php echo set_value('title'); ?>">
      </td></tr>
      <tr>
        <td width="103">Created By</td><td>
        <input type="text" id = "created_by" name="created_by" class="input_field" value="<?php echo set_value('created_by'); ?>"></td></tr>
      <tr>
        <td width="103">Email</td><td>
        <input type="text" id = "email" name="email" class="input_field" value="<?php echo set_value('email'); ?>"></td></tr>
      <tr>
        <td width="103">Description Testimonial</td><td>
        <textarea name="description" cols="40" rows="3" class="input_field" id="description" value="<?php echo set_value('description'); ?>"></textarea></td></tr>
      <tr><td width="100px"><b>Picture</b></td><td>
        <input type="file" id = "foto" name="foto" class="sedang" value="<?php echo set_value('foto'); ?>"></td></tr>
      <tr><td></td><td>
        <?php
          echo 'Submit the word you see below: <br/>';
          echo $captcha.'<br/>';
          echo '<input type="text" name="captcha" value="" />';
         ?>
      </td>
      <td width="16"></td></tr>
      <tr><td></td><td><input type="submit" value="Send" id="button" name="submit" class="submit_btn left">
        <a onclick="window.close()"><input type="button" value="Close" id="blue_button" name="reset" class="submit_btn right"></a></td>
      <td width="16"></td></tr>
    </table>
  </form>      
</div>
    </div>
<div class="cleaner"></div>
  </div>
</div>