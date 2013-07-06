  
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
  <?php echo $this->session->flashdata('msg'); ?>
  <div id="tbl" style="float:left;">
  <h3>Edit Profile</h3>
  <div id="content_left">
  <form id="edit_profile" name="edit_profile" method="post" action="<?php echo base_url('index.php/admin/admin/update_data'); ?>">
    <table width="95%">
      <tr><td width="125px"><b>Nama Admin</b></td><td><input type="text" name="nama_admin" class="sedang" value="<?php echo $row->nama_admin; ?>"></td></tr>
      <tr><td><b>Email Admin</b></td><td><input type="text" name="email_admin" class="sedang" value="<?php echo $row->email_admin; ?>"></td></tr>
      <tr><td><b>Username</b></td><td><input type="text" name="username" class="sedang" value="<?php echo $row->username; ?>"></td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
      </td></tr>
    </table>
  </form>
  </div>
  <h3>Change Password</h3>
    <div id="content_right">
    <form id="edit_password" name="edit_password" method="post" action="<?php echo base_url('index.php/admin/admin/update_data/pass'); ?>">
    <table width="95%">
      <tr><td width="125px"><b>Old Password</b></td><td><input type="password" name="old_password" class="sedang" ></td></tr>
      <tr><td><b>New Password</b></td><td><input type="password" name="new_password" class="sedang" ></td></tr>
      <tr><td><b>Confirm Password</b></td><td><input type="password" name="confirm_password" class="sedang"></td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      </td></tr>
    </table>
  </form>
  </div>
</div>
</div>