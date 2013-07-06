<script type="text/javascript">
$(document).ready(function(){
 $("#makeparent").change(function(){
  if($("#makeparent").val()=='1'){
    $("#trlevel").show();
    $("#trparent").show();
  }else{
    $("#trlevel").hide();
    $("#trparent").hide();
  }
 });

 $("#level").change(function(){
  var level = $("#level").val(); 
  var bahasa = $("#bahasa").val(); 
  $("#parent").load("<?php echo base_url(); ?>javascript/getParent/"+level+"/a/"+bahasa);
 }); 

 $("#for_static").click(function(){
  // var bahasa = $("#bahasa").val();
  if($('#for_static').is(':checked')){
    $("#tr_kategori_article").show();
    $("#tr_url_menu_static").show();
    $("#kategori_article").load("<?php echo base_url(); ?>javascript/getKategori/");
  }else{
    $("#tr_kategori_article").hide();
    $("#tr_url_menu_static").hide();
    $("#url_menu").val('');
  }
 });

 $("#kategori_article").change(function(){
  var bahasa = $("#bahasa").val();
  var kategori = $("#kategori_article").val();
  $("#url_menu_static").load("<?php echo base_url(); ?>javascript/getArticle/"+bahasa+"/"+kategori);
 });

  $("#url_menu_static").change(function(){
  var url = $("#url_menu_static").val();
  $("#url_menu").val(url);
 });

 });
 </script>
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
  <?php echo $this->session->flashdata('msg'); ?>
  <div id="tbl" style="float:left;">
  <h3>Input Menu</h3>
  <div id="content_left">
  <form id="input_menu" name="input_menu" method="post" action="<?php echo base_url('admin/menu/save_data'); ?>">
    <table width="95%">
      <tr><td width="125px"><b>Name Menu</b></td><td><input type="text" name="nama_menu" class="sedang" value="<?php echo set_value('nama_menu'); ?>"></td></tr>
      <tr><td><b>URL Menu</b></td><td><input type="text" name="url_menu" id="url_menu" class="sedang" value="<?php echo set_value('url_menu'); ?>"></td></tr>
      <tr><td><b>Order</b></td><td><input type="number" name="urutan" class="lbhpendek" value="<?php set_value('urutan'); ?>" /></td></tr>
      <tr><td><b>Get Parent</b></td><td>
        <select name='makeparent' id='makeparent'>
          <option value=''>-Pilih-</option>
          <option value='1'>Yes</option>
          <option value='2'>No</option>
        </select>
      </td></tr>
      <tr id="trlevel" style="display:none"><td><b>Level</b></td><td>
        <select name='level' id='level'>
          <option value=''>-Pilih-</option>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
        </select>
      </td></tr>
      <tr id="trparent" style="display:none"><td><b>Parent Id</b></td><td>
        <select name='parent' id='parent'>
          <option value=''>Tentukan Level</option>
        </select>
      </td></tr>
      <tr><td><b>Category Menu</b></td><td>
        <select name='kategori_menu'>
          <?php foreach ($kategori_menu as $key => $kate) {
          echo "<option value='$kate->id_kategori_menu'>$kate->nama_kategori_menu</option>";
          } ?>
        </select>
      </td></tr>
      <tr><td><b>Language</b></td><td>
        <select name='bahasa' id="bahasa">
          <?php foreach ($bahasa as $key => $bhs) {
          echo "<option value='$bhs->id_bahasa'>$bhs->nama_bahasa</option>";
          } ?>
        </select></td></tr>
      <tr>
        <td><b>For Static Page</b></td>
        <td><input type="checkbox" name="for_static" id="for_static" value="1">Yes</td>
      </tr>
      <tr id='tr_kategori_article' style='display:none'>
        <td><b>Category Article</b></td>
        <td>
          <select name='kategori_article' id='kategori_article'>

          </select>
      </td>
      </tr>
      <tr id='tr_url_menu_static' style='display:none'>
        <td><b>Article Page</b></td>
        <td>
          <select name='url_menu_static' id='url_menu_static'>
            <option value="disabled" value="">Choose Category First</option>
          </select>
      </td>
      </tr>
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