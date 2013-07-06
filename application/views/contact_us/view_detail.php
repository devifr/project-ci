 <div id="">
  <div id="rightContent">
  <?php if($rows->num_rows()>0) { 
  $row = $rows->row(); ?>
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/contact_us/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>View Detail Contact Us</h3>
  <div id="content_left">
    <table width="95%">
      <tr><td><b>Name</b></td><td>
        <?php echo $row->nama_pengirim; ?>
      </td></tr>
      <tr><td width="100px"><b>Email</b></td><td>
        <?php echo $row->email_pengirim; ?></td></tr>
      <tr><td><b>Judul</b></td><td>
        <?php echo $row->judul_contact; ?>
      </td></tr>
      <tr><td><b>Description</b></td><td><?php echo $row->description_contact; ?></td></tr>
      <tr><td><b>Date Posted</b></td><td>
        <?php echo $row->date_post; ?></td></tr>
    </table>
  </div>
  </div>
  <?php } else{ echo informasi('Data Tidak Ada!'); }?> 
</div>
</div>