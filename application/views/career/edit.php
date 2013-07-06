
 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/tiny_mce.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/show_tiny_mce.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/jquery-1.9.0.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/zebra_datepicker.js'); ?>"></script>
 <link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker/zebra_datepicker.css'); ?>" type="text/css">
    
<script type="text/javascript">
$(document).ready(function(){
  $('#date1').Zebra_DatePicker();
  $('#date2').Zebra_DatePicker();
 });
 </script>
 <div id="">
  <div id="rightContent">
   <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/career/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <?php echo $this->session->flashdata('msg');
  if($rows->num_rows()>0) {
    $row = $rows->row();
    $id_encrypt = $this->encrypt->encode($row->id_career);
   ?>
  <div id="tbl" style="float:left;">
  <h3>Edit Career</h3>
  <div id="content_left">
  <form id="input_career" name="input_career" method="post" action="<?php echo base_url('admin/career/update_data/'.$id_encrypt); ?>">
    <table width="95%">
      <tr><td width="125px"><b>Title</b></td><td><input type="text" name="title" class="sedang" value="<?php echo $row->title; ?>"></td></tr>
      <tr><td width="125px"><b>Position</b></td><td><input type="text" name="position" class="sedang" value="<?php echo $row->position; ?>"></td></tr>
      <tr><td width="125px"><b>Devision</b></td><td><input type="text" name="devisi" class="sedang" value="<?php echo $row->devisi; ?>"></td></tr>
      <tr><td><b>Date Started</b></td><td><input type="text" name="date1" id="date1" class="sedang" value="<?php echo $row->date_posted; ?>"></td></tr>
      <tr><td><b>Date Finished</b></td><td><input type="text" name="date2" id="date2" class="sedang" value="<?php echo $row->deadline; ?>" /></td></tr>
      <tr><td><b>Description</b></td><td><textarea name="description" id="description"><?php echo $row->description; ?></textarea></td></tr>
      <tr><td><b>Active</b></td><td>
        <select name='active'>
          <option value='1'>Yes</option>
          <option value='0' <?php if($row->status == '0') echo "selected=selected"; ?>>No</option>
        </select>
      </td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
      </td></tr>
    </table>
  </form>
  </div>
  </div>
  <?php } else{ echo informasi('Data Tidak Ada!'); } ?>
</div>
</div>