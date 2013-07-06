<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
<div id="mapim">
  <img src="<?php echo images_url("frontend/home.jpg"); ?>" width="15" /> 
  <?php echo $breadcumb;  ?>
</div>
<?php echo $this->session->flashdata('msg'); ?>
<div class="content_box">
  <?php $lang = $this->lang->lang(); ?>
          <h2>Contact Us</h2>
          <h4>Quick Contact Form</h4>
          <p>MCO is a registered trademark of&nbsp;<strong>PT.Trikarsa Sempurna Sistemindo</strong>&nbsp;International. This name is protected by Indonesia copyright law</p>
          <div id="testimonial" style="margin-bottom:30px;">  
<form action="<?php echo base_url("$lang/contact_us/save_data"); ?>" method="post" name="contact_us" id="contact_us">
<table width="100%" border="0" cellpadding="4">
  <tr>
    <td>Name</td>
    <td><input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" class="required input_field">&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="email" type="text" value="<?php echo set_value('email'); ?>" class="validate-email required input_field" id="email" size="35">
    &nbsp;</td>
  </tr>
  <tr>
    <td>Subject</td>
    <td><input name="subject" type="text" value="<?php echo set_value('subject'); ?>" class="required input_field" id="subject" size="35">
    &nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><textarea id="text" name="description" rows="6" cols="50" class="required"><?php echo set_value('description'); ?></textarea>
    &nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Send" id="button" name="submit" class="submit_btn left">
        <input type="reset" value="Reset" id="blue_button" name="reset" class="submit_btn right"></td>
  </tr>
</table>
</form>        
</div>
    </div>
<div class="cleaner"></div>
  </div>
<!-------------------------------------------------------------->   
  <div class="col_w300 float_r">  
    <div id="cs">
      <table width="200" border="0">
        <tr>
          <td><a href="ymsgr:sendIM?tary_trikarsa"><img src="http://opi.yahoo.com/online?u=dan_exsotic&amp;m=g&amp;t=2&amp;l=us"/></a></td>
          </tr>
        </table>
    </div>
    <div id="adress">
      <h4>Head Office</h4>
      Ranuza Building, 2nd &amp; 3rd Floor<br />
      Jl.Timor No.10-Menteng<br />
      Jakarta Pusat 10350 - Indonesia<br />
      Phone.+62.21-3193 5163<br />
      Fax.+62.21-3193 5226&nbsp;<br />
      <a href="mailto:admin@tri-karsa.com">admin@tri-karsa.com</a>&nbsp;<br />
      <br />
      <h4>Surabaya Office</h4>
      Bumi Mandiri Tower II Building, 4th Floor<br />
      Jl.Panglima Sudirman No.66-68<br />
      Surabaya 60271 - Indonesia<br />
      Phone.+62.31-535 2697<br />
      Fax.+62.31-535 2724&nbsp;
      <p>&nbsp;</p>
      </span>
    </div>
  </div>
<!-------------------------------------------------------------->
  <div class="cleaner"></div>
</div> <!-- end of main -->
