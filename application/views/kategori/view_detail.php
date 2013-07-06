 <div id="wrapper">
  <div id="rightContent">
  <?php
  if($rows->num_rows()>0){
    $row = $rows->row();
  ?>
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/category/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>View Detail Category</h3>
  <div id="content_left">
    <table width="95%">
      <tr><td><b>Category Name</b></td><td>
        <?php echo $row->nama_kategori; ?>
      </td></tr>
      <tr><td width="100px"><b>Alias</b></td><td>
        <?php echo $row->alias_kategori; ?>
      <tr><td><b>Language</b></td><td>
        <?php echo $row->nama_bahasa; ?></td></tr>
      <tr><td><b>Active</b></td><td>
        <?php if($row->active_kategori==0) echo "No";
      else echo "Yes"; ?>
      </td></tr>
    </table>
  </form>
  </div>
  </div>
  <?php 
    }else{
      echo infomasi('Data Tidak Ada!');
    }
  ?>
</div>
</div>