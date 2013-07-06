 <div id="">
  <div id="rightContent">
  <?php if($rows->num_rows()>0) { 
  $row = $rows->row(); ?>
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/article/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>View Detail Artikel</h3>
  <div id="content_left">
    <table width="95%" cellpadding="4">
      <tr><td><b>Date To Publish</b></td><td>
        <?php echo $row->publish_date; ?>
      </td></tr>
      <tr><td width="100px"><b>Title</b></td><td>
        <?php echo $row->judul_content; ?></td></tr>
      <tr><td><b>Kategori</b></td><td>
        <?php echo $row->nama_kategori; ?>
      </td></tr>
      <!-- <tr><td><b>Subkategori</b></td><td>
        <?php echo $row->publish_date; ?>
        </select>
      </td></tr> -->
      <tr><td><b>Description</b></td><td><?php echo $row->description; ?></td></tr>
      <tr><td><b>Language</b></td><td>
        <?php echo $row->nama_bahasa; ?></td></tr>
      <tr><td><b>Active</b></td><td>
        <?php if($row->active_content==0) echo "No";
      else echo "Yes"; ?>
      </td></tr>
    </table>
  </div>
  </div>
  <?php } else{ echo informasi('Data Tidak Ada!'); }?> 
</div>
</div>