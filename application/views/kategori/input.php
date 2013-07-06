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
  <?php echo $this->session->flashdata('msg'); ?>
  <div id="tbl" style="float:left;">
  <h3>Input Category</h3>
  <div id="content_left">
  <form id="input_category" name="input_category" method="post" action="<?php echo base_url('admin/category/save_data'); ?>">
    <table width="95%">
      <tr><td><b>Category Name</b></td><td>
        <input type="text" name="nama_kategori" id="nama_kategori" class="sedang" value="<?php echo set_value('nama_kategori'); ?>">
      </td></tr>
      <tr><td width="100px"><b>Alias</b></td><td>
        <input type="text" id = "alias" name="alias" class="sedang" value="<?php echo set_value('alias'); ?>"></td></tr>
      <tr><td><b>Language</b></td><td>
        <select name='bahasa'>
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa'>$bhs->nama_bahasa</option>";
          } ?>
        </select></td></tr>
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