 <div id="">
  <div id="rightContent">
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
  <?php echo $this->session->flashdata('msg');
  if($rows->num_rows()>0){
    $row = $rows->row();
    $id = $this->encrypt->encode($row->id_kategori);
  ?>
  <div id="tbl" style="float:left;">
  <h3>Edit Category</h3>
  <div id="content_left">
  <form id="edit_category" name="edit_category" method="post" action="<?php echo base_url('admin/category/update_data/'.$id); ?>">
    <table width="95%">
      <tr><td><b>Category Name</b></td><td>
        <input type="text" name="nama_kategori" id="nama_kategori" class="sedang" value="<?php echo $row->nama_kategori; ?>">
      </td></tr>
      <tr><td width="100px"><b>Alias</b></td><td>
        <input type="text" id = "alias" name="alias" class="sedang" value="<?php echo $row->alias_kategori; ?>"></td></tr>
      <tr><td><b>Language</b></td><td>
        <select name='bahasa'>
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa' "; if($row->bahasa_id == $bhs->id_bahasa) echo "selected=selected"; echo ">$bhs->nama_bahasa</option>";
          } ?>
        </select></td></tr>
      <tr><td><b>Active</b></td><td>
        <select name='active'>
          <option value='1'>Yes</option>
          <option value='0' <?php if($row->active_kategori==0) echo "selected=selected"; ?>>No</option>
        </select>
      </td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
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