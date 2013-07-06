 <div id="">
  <div id="rightContent">
    <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/menu/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>View Detail</h3>
  <div id="content_left">
     <table width="95%">
      <tr><td width="125px"><b>Name Menu</b></td><td><?php echo $row->nama_menu; ?></td></tr>
      <tr><td><b>URL Menu</b></td><td><?php echo $row->url_menu; ?></td></tr>
      <tr><td><b>Order</b></td><td><?php echo $row->urutan_menu; ?></td></tr>
      <tr><td><b>Parent</b></td><td>
        <?php if($row->parent_id==0) echo "No";
              else echo "Yes"; ?>
      </td></tr>
      <tr  id="trlevel" <?php if($row->parent_id==0) { echo "style=display:none"; } ?>><td><b>Level</b></td><td>
        <?php echo $row->level_menu; ?>
      </td></tr>
      <tr id="trparent" <?php if($row->parent_id==0) { echo "style=display:none"; } ?>><td><b>Parent Id</b></td><td>
        <?php echo $parent_name; ?>
      </td></tr>
      <tr><td><b>Category Menu</b></td><td>
        <?php echo $row->nama_kategori_menu; ?>
      </td></tr>
      <tr><td><b>Language</b></td><td>
      <?php echo $row->nama_bahasa; ?>
      </td></tr>
      <tr><td><b>Active</b></td><td>
      <?php if($row->active_menu==0) echo "No";
      else echo "Yes"; ?>
      </td></tr>
    </table>
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
</div>