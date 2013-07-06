 <div id="wrapper">
  <div id="rightContent">
  <div id="tbl" style="float:left;">
  <?php 
  echo $this->session->flashdata('msg');
  $row = $rows->row(); ?>
  <h3>Change Background</h3>
  <div id="content_left">
	<form id="control_panel" method="post" name="control_panel" action="<?php echo base_url('admin/config_website/upload_bg/'); ?>" enctype="multipart/form-data">
		<table width="95%">
      <tr><td><b>Background</b></td><td>
        <input type="file" name="back" id="back">
        <input type="hidden" name="bg2" class="sedang" value="<?php echo $row->background_name; ?>">
      </td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
      </td></tr>
      <tr><td></td><td> <br><br>
			</td></tr>
      <?php
      if($rows->num_rows() > 0){
      ?>
      <tr><td><b>Current Background</b></td><td><img src="<?php echo base_url()."asset/images/web/background/".$row->background_name; ?>" height="100px" width="100px" /></td></tr>
		  <?php } ?>
    </table>
  </form>
  </div>
  
  <div id="content_right">
		<div id="smallRight">
		<h3>Detail </h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;"><p>No Description</p></td></tr>
		</table>
		</div>
	</div>
</div>
</div>