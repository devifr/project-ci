 <div id="">
  <div id="rightContent">
  
   <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/career/inbox/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
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
   ?>
  <div id="tbl" style="float:left;">
  <h3>View Detail</h3>
  <div id="content_left">
    <table width="95%">
      <tr><td width="125px"><b>Title</b></td><td><?php echo $row->title; ?></td></tr>
      <tr><td width="125px"><b>Position</b></td><td><?php echo $row->position; ?></td></tr>
      <tr><td><b>Name</b></td><td><?php echo $row->name_lamaran; ?></td></tr>
      <tr><td><b>Email</b></td><td><?php echo $row->email_lamaran; ?></td></tr>
      <tr><td><b>Phone</b></td><td><?php echo $row->phone_lamaran; ?></td></tr>
      <tr><td><b>Address</b></td><td><?php echo $row->address_lamaran; ?></td></tr>
      <tr><td><b>Recent Education</b></td><td><?php echo $row->education_lamaran; ?></td></tr>
      <tr><td><b>Date of Applying</b></td><td><?php echo $row->date_apply; ?></td></tr>
      <tr><td><b>Attachment</b></td><td><?php echo anchor(lamaran_url($row->lampiran_lamaran),"Download");; ?></td></tr>
    </table>
  </form>
  </div>
  </div>
  <?php } else{ echo informasi('Data Tidak Ada!'); } ?>
</div>
</div>