 <div id="">
  <div id="rightContent">
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/testimonial/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <?php echo $this->session->flashdata('msg'); ?>
  <div id="tbl" style="float:left;">
  <h3>Input Testimonial</h3>
  <div id="content_left">
  <form id="input_category" name="input_category" method="post" action="<?php echo base_url('admin/testimonial/save_data'); ?>" enctype="multipart/form-data">
    <table width="95%">
      <tr><td><b>Company Name</b></td><td>
        <input type="text" name="title" id="title" class="sedang" value="<?php echo set_value('title'); ?>">
      </td></tr>
      <tr><td width="100px"><b>Created By</b></td><td>
        <input type="text" id = "created_by" name="created_by" class="sedang" value="<?php echo set_value('created_by'); ?>"></td></tr>
      <tr><td width="100px"><b>Email</b></td><td>
        <input type="text" id = "email" name="email" class="sedang" value="<?php echo set_value('email'); ?>"></td></tr>
      <tr><td width="100px"><b>Description Testimonial</b></td><td>
        <textarea id="description" name="description" class="sedang" value="<?php echo set_value('description'); ?>"></textarea></td></tr>
      <tr><td width="100px"><b>Picture</b></td><td>
        <input type="file" id = "foto" name="foto" class="sedang" value="<?php echo set_value('foto'); ?>"></td></tr>
      <tr><td><b>Active</b></td><td>
        <select name='active'>
          <option value='1'>Yes</option>
          <option value='0'>No</option>
        </select>
      </td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
      </td></tr>
    </table>
  </form>
  </div>
  </div>
</div>
</div>