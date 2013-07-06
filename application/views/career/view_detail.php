 <div id="wrapper">
  <div id="rightContent">
  <?php echo $this->session->flashdata('msg');
  if($rows->num_rows()>0) {
    $row = $rows->row();
   ?>
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
  <div id="tbl" style="float:left;">
  <h3>Edit Career</h3>
  <div id="content_left">
    <table width="95%">
      <tr><td width="125px"><b>Title</b></td><td><?php echo $row->title; ?></td></tr>
      <tr><td width="125px"><b>Position</b></td><td><?php echo $row->position; ?></td></tr>
      <tr><td><b>Date Started</b></td><td><?php echo $row->date_posted; ?></td></tr>
      <tr><td><b>Date Finished</b></td><td><?php echo $row->deadline; ?></td></tr>
      <tr valign='top'><td><b>Description</b></td><td><?php echo $row->description; ?></td></tr>
      <tr><td><b>Active</b></td><td>
        <?php if($row->status==0) echo "No";
      else echo "Yes"; ?>
      </td></tr>
    </table>
  </form>
  </div>
  </div>
  <?php } else{ echo informasi('Data Tidak Ada!'); } ?>
</div>
</div>