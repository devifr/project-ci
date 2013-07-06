 <div id="">
  <div id="rightContent">
  <?php
  if($rows->num_rows()>0){
    $row = $rows->row();
  ?>
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/testimonial/');?>"><img src="<?php echo base_url('asset/images/admin/img/close.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Close</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>View Detail Testimonial</h3>
  <div id="content_left">
    <table width="95%" cellpadding="4">
      <tr><td><b>Title Testimonial</b></td><td>
        <?php echo $row->title_testimonial; ?>
      </td></tr>
      <tr><td width="100px"><b>Created By</b></td><td>
        <?php echo $row->created_by_testimonial; ?>
      <tr><td><b>Description Testimonial</b></td><td>
        <?php echo $row->description_testimonial; ?></td></tr>
      <tr><td><b>Active</b></td><td>
        <?php if($row->active_testimonial==0) echo "No";
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