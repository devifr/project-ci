 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/tiny_mce.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/show_tiny_mce.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/jquery-1.9.0.js'); ?>"></script>
 <div id="">
  <div id="rightContent">
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/kategori_block/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
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
    $id = $this->encrypt->encode($row->id_block);
  ?>
  <div id="tbl" style="float:left;">
  <h3>Input Block</h3>
  <div id="content_left">
  <form id="input_block" name="input_block" method="post" action="<?php echo base_url('admin/kategori_block/update_data/'.$id); ?>">
    <table width="95%">
      <tr><td><b>Name</b></td><td>
        <input type="text" name="nama_block" id="nama_block" class="sedang" value="<?php echo $row->nama_block; ?>">
      </td></tr>
      <tr><td><b>Description</b></td><td>
        <textarea name="description" id="description"><?php echo $row->isi_block; ?></textarea>
      </td></tr>
      <tr><td><b>Position</b></td><td>
        <select name='position'>
          <option value='left' >Left</option>
          <option value='right' <?php if($row->position_block == 'right') echo 'selected=selected'; ?>>Right</option>
          <option value='bottom' <?php if($row->position_block == 'bottom') echo 'selected=selected'; ?>>Bottom</option>
        </select>
      </td></tr>
      <tr><td width="100px"><b>Order</b></td><td>
        <input type="text" id = "urutan" name="urutan" class="lbhpendek" value="<?php echo $row->urutan_block; ?>"></td></tr>
      <tr><td><b>Language</b></td><td>
        <select name='bahasa'>
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa' "; if($row->bahasa_id == $bhs->id_bahasa) echo "selected=selected"; echo ">$bhs->nama_bahasa</option>";
          } ?>
        </select></td></tr>
      <tr><td><b>Active</b></td><td>
        <select name='active'>
          <option value='1'>Yes</option>
          <option value='0' <?php if($row->active_block == '0') echo 'selected=selected'; ?>>No</option>
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
    echo informasi("Data Tidak Ada!");
  }
  ?>
</div>
</div>