
<div id="wrapper">
  <div id="rightContent">
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/admin/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <?php 
  echo $this->session->flashdata('msg'); ?>
  <div id="tbl" style="float:left;">
  <h3>Form</h3>
  
  <div id="content_left">
	<form id="control_panel" method="post" name="control_panel" action="<?php echo base_url('index.php/admin/config_website/update_data'); ?>" enctype="multipart/form-data">
		<table width="95%">
			<tr><td width="125px"><b>Website Name</b></td><td><input type="text" name="web_name" class="sedang" value="<?php echo $row->website_name; ?>"></td></tr>
			<tr><td><b>Meta Header</b></td><td><input type="text" name="meta_head" class="panjang" value="<?php echo $row->meta_header; ?>"></td></tr>
      <tr><td><b>Meta Description</b></td><td><textarea name="meta_desc"><?php echo $row->meta_description; ?></textarea></td></tr>
      <tr><td><b>Icon Website</b></td><td><input type="file" name="icon" class="sedang">
        <input type="hidden" name="icon2" class="sedang" value="<?php echo $row->icon_name; ?>"></td></tr>
      <tr><td><b>Logo Website</b></td><td><input type="file" name="logo" class="sedang">
        <input type="hidden" name="logo2" class="sedang" value="<?php echo $row->logo_name; ?>"></td></tr>
			<tr><td><b>Email Contact</b></td><td><input type="text" name="email" class="sedang" value="<?php echo $row->email_contact; ?>"></td></tr>
			<tr><td><b>Footer</b></td><td><textarea name="footer"><?php echo $row->footer; ?></textarea></td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
			<input type="reset" class="button" value="Reset">
			</td></tr>
		</table>
  </form>
  </div>
  
  <div id="content_right">
	  <div id="smallRight">
		<h3>Detail </h3>
		<table width="95%" cellpadding="4" cellspacing="4">
			<tr><td width="107"><b>Website Name</b></td><td width="220"><?php echo $row->website_name; ?></td></tr>
			<tr><td><b>Meta Header</b></td><td><?php echo $row->meta_header; ?></td></tr>
      <tr><td><b>Meta Description</b></td><td><?php echo $row->meta_description; ?></td></tr>
			<tr><td><b>Email Contact</b></td><td><?php echo $row->email_contact; ?></td></tr>
			<tr><td><b>Footer</b></td><td><?php echo $row->footer; ?></td></tr>
      <tr><td></td><td>
			</td></tr>
		</table>
		</div>
	</div>
</div>
</div>