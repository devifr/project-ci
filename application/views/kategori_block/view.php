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
    <table width="95%">
      <tr><td><b>Name</b></td><td>
        <?php echo $row->nama_block; ?>
      </td></tr>
      <tr><td><b>Description</b></td><td>
        <?php echo $row->isi_block; ?>
      </td></tr>
      <tr><td><b>Position</b></td><td>
        <?php echo $row->position_block; ?>
      </td></tr>
      <tr><td width="100px"><b>Order</b></td><td>
        <?php echo $row->urutan_block; ?></td></tr>
      <tr><td><b>Language</b></td><td>
          <?php 
          echo "$row->nama_bahasa";
           ?>
          </td></tr>
      <tr><td><b>Active</b></td><td>
        <?php if($row->active_block==0) echo "No";
      else echo "Yes"; ?>
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