
 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/tiny_mce.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/tiny_mce/show_tiny_mce_for_edit.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/jquery-1.9.0.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/zebra_datepicker.js'); ?>"></script>
 <link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker/zebra_datepicker.css'); ?>" type="text/css">
    
<script type="text/javascript">
$(document).ready(function(){
  $('#publish_date').Zebra_DatePicker();
 });
 </script>

 <div id="">
  <div id="rightContent">

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
    <?php echo $this->session->flashdata('msg'); ?>
  <?php if($rows->num_rows()>0){ 
    $row = $rows->row();
    $id = $this->encrypt->encode($row->id_content);
  ?>
  <div id="tbl" style="float:left;">
  <h3>Edit Artikel</h3>
  <div id="content_left">
  <form id="input_content" name="input_content" method="post" action="<?php echo base_url('admin/article/update_data/'.$id); ?>">
    <table width="95%">
      <tr><td><b>Date To Publish</b></td><td>
        <input type="text" name="publish_date" id="publish_date" class="pendek" value="<?php echo $row->publish_date ?>">
      </td></tr>
      <tr><td width="100px"><b>Title Article</b></td><td>
        <input type="text" id = "judul" name="judul" class="sedang" value="<?php echo $row->judul_content; ?>"></td></tr>
      <tr><td width="100px"><b>Alias URL</b></td><td>
        <input type="text" id = "alias" name="alias" class="sedang" value="<?php echo $row->alias_content; ?>"></td></tr>
      <tr><td><b>Kategori</b></td><td>
       <select name='kategori'>
          <?php foreach ($kategori as $key => $kate) {
            echo "<option value='$kate->id_kategori' "; if($row->kategori_id == $kate->id_kategori) echo "selected=selected"; echo ">$kate->nama_kategori</option>";
          } ?>
        </select>
      </td></tr>
      <!-- <tr><td><b>Subkategori</b></td><td>
        <select name='subkategori'>
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa' >$bhs->nama_bahasa</option>";
          } ?>
        </select>
      </td></tr> -->
      <tr><td><b>Description</b></td><td><textarea name="description" id="content"><?php echo $row->description; ?></textarea></td></tr>
      <tr><td><b>Language</b></td><td>
        <select name='bahasa'>
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa' "; if($row->bahasa_id == $bhs->id_bahasa) echo "selected=selected"; echo ">$bhs->nama_bahasa</option>";
          } ?>
        </select></td></tr>
      <tr><td><b>Active</b></td><td>
        <select name='active'>
          <option value='1'>Yes</option>
          <option value='0' <?php if($row->active_content == '0') echo 'selected=selected' ?>>No</option>
        </select>
      </td></tr>
      <tr><td><b>Add Block Content</b></td><td>
        <select name='add'>
          <option value='0'>None</option>
          <option value='1' <?php if($row->add_other_content == '1') echo 'selected=selected' ?>>Add Another Short Content</option>
          <option value='2' <?php if($row->add_other_content == '2') echo 'selected=selected' ?>>Related Short Content</option>
        </select>
      </td></tr>
      <tr><td></td><td><input type="submit" class="button" value="Save">
      <input type="reset" class="button" value="Reset">
      </td></tr>
    </table>
  </form>
  </div>
  </div>
  <?php } else { echo informasi('Data Tidak Ada!'); } ?>
</div>
</div>