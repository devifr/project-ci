<script type="text/javascript" src="<?php echo base_url('asset/js/fancybox/jquery-1.9.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/js/fancybox/jquery.fancybox.js?v=2.1.4'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/fancybox/jquery.fancybox.css?v=2.1.4'); ?>" media="screen" />

<script type="text/javascript">
$(document).ready(function() {

 $("#publish").click(function(){
  var ids=new Array()
   var a=0;
   $(".checkid:checked").each(function(){
    ids +=$(this).val()+',';
    a++;
   })
   if(a>0){
     if(confirm("Are you sure want to publish?")){
      $.post("<?php echo base_url(); ?>admin/banner_slideshow/publish/yes/",{checkid:ids});
      setTimeout(function(){ location.reload(); $('.checkid').removeAttr('checked'); }, 1000);
     }
    }else{
    alert('No Data Has Choosen');
    }
 });
 $("#unpublish").click(function(){
  var ids=new Array()
   var a=0;
   $(".checkid:checked").each(function(){
    ids +=$(this).val()+',';
    a++;
   })
   if(a>0){
     if(confirm("Are you sure want to unpublish?")){
      $.post("<?php echo base_url(); ?>admin/banner_slideshow/publish/no/",{checkid:ids});
      setTimeout(function(){ location.reload(); $('.checkid').removeAttr('checked'); }, 1000);
     }
    }else{
    alert('No Data Has Choosen');
    }
 });
 $("#delete").click(function(){
  var ids=new Array()
   var a=0;
   $(".checkid:checked").each(function(){
    ids +=$(this).val()+',';
    a++;
   })
   if(a>0){
     if(confirm("Are you sure want to Delete?")){
      $.post("<?php echo base_url(); ?>admin/banner_slideshow/delete_data/all/",{checkid:ids});
      setTimeout(function(){ location.reload(); $('.checkid').removeAttr('checked'); }, 1000);
     }
    }else{
    alert('No Data Has Choosen');
    }
});
//fancy box, image pop up
$('.fancybox').fancybox();

    });
  </script>
  <style type="text/css">
    .fancybox-custom .fancybox-skin {
      box-shadow: 0 0 50px #222;
    }
  </style>

 <div id="wrapper">
  <div id="rightContent">
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><a href="<?php echo base_url('admin/banner_slideshow/input/');?>"><img src="<?php echo base_url('asset/images/admin/img/add.png');?>" width="40"></a></div></td>
        <td width="6%"><div align="center"><a href="#" id='publish'><img src="<?php echo base_url('asset/images/admin/img/icon3.png');?>" width="40"></a></div></td>
        <td width="6%"><div align="center"><a href="#" id='unpublish'><img src="<?php echo base_url('asset/images/admin/img/icon2.png');?>" width="40"></a></div></td>
        <td width="6%"><div align="center"><a href="#" id='delete'><img src="<?php echo base_url('asset/images/admin/img/trash.png');?>" width="40"></a></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Add Banner </div></td>
        <td><div align="center" id="blue">Publish </div></td>
        <td><div align="center" id="blue">Upublish </div></td>
        <td><div align="center" id="blue">Trash</div></td>
      </tr>
    </table>
  </div>
  <?php echo $this->session->flashdata('msg'); ?>
  <div id="tbl">
  <h3>Gallery Manager</h3>
    <div id="tablewrapper">
        <div id="tableheader">
      `<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
                <div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
                <div><a href="javascript:sorter.reset()">reset</a></div>
            </span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                  <th width="2%" class="nosort"><h3>&nbsp;</h3></th>
                  <th width="4%"><h3>ID</h3></th>
                  <th width="16%"><h3>Title</h3></th>
                  <th width="5%"><h3>Status</h3></th>
                  <th width="10%"><h3>Bahasa</h3></th>
                  <th width="8%"><h3>View Image</h3></th>
                  <th width="8%"><h3 align="center">Action</h3></th>
                </tr>
            </thead>
            <tbody>
              <?php
              if($result->num_rows()>0){
               foreach ($result->result() as $key => $gal) {
                $id_encrypt = $this->encrypt->encode($gal->id_banner_slide);
              ?>
                <tr>
                    <td><input type="checkbox" name="checkid[]" class='checkid' value="<?php echo $id_encrypt; ?>" />
                    </td>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $gal->title_banner_slide; ?></td>
                    <td>
                      <div align="center">
                      <?php if($gal->active_banner_slide==0){ ?>
                        <a href="<?php echo base_url().'admin/banner_slideshow/publish/yes/'.$id_encrypt; ?>" onclick="return confirm('Do You Want To Active This Banner?');"><img src="<?php echo base_url('asset/images/admin/img/delete.png');?>" title="Unpublish" width="16" height="16"></a>
                      <?php }else{ ?>
                        <a href="<?php echo base_url().'admin/banner_slideshow/publish/no/'.$id_encrypt ?>" onclick="return confirm('Do You Want To Nonactive This Banner');"><img src="<?php echo base_url('asset/images/admin/img/oke.png');?>" title="Publish"></a>                    
                      <?php } ?>
                      </div>
                    </td>
                    <td><div align="center"><span id="orange"><?php echo $gal->nama_bahasa; ?></span> </div></td>
                    <td><div align="center"><span id="orange"><a class="fancybox" href="<?php echo images_url('web/banner/'.$gal->banner_slide_name); ?>" data-fancybox-group="banner" title="<?php echo $gal->title_banner_slide ?>"><img src="<?php echo images_url('web/banner/'.$gal->banner_slide_name); ?>" height="40" class="thumbnail" id="view" idimage="<?php echo $id_encrypt; ?>"/></a></div></td>
                    <td><div align="center"><a href="<?php echo base_url().'admin/banner_slideshow/delete_data/'.$id_encrypt; ?>" onclick="return confirm('Do You Want Delete This Row?')">
                      <img src="<?php echo base_url('asset/images/admin/img/remove.png');?>" width="16" height="16" title="Delete"></a>
                        <a href="<?php echo base_url().'admin/banner_slideshow/edit/'.$id_encrypt; ?>"><img src="<?php echo base_url('asset/images/admin/img/folderup_16.png');?>" width="16" height="16" title="Edit Data"></a>
                        <!-- <a href="<?php echo base_url().'admin/banner_slideshow/view/'.$id_encrypt; ?>"><img src="<?php echo base_url('asset/images/admin/img/detail.png');?>" title="View"></a> --> </div></td>
                </tr>
            <?php
            } 
          }else{
            echo informasi('Data Belum Ada!');
          }
            ?>
            </tbody>
        </table>
<div id="tablefooter">
          <div id="tablenav">
                <div>
                    <img src="<?php echo base_url('asset/images/admin/first.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="<?php echo base_url('asset/images/admin/previous.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="<?php echo base_url('asset/images/admin/next.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="<?php echo base_url('asset/images/admin/last.gif');?>" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                    <select id="pagedropdown"></select>
                </div>
                <div>
                    <a href="javascript:sorter.showall()">view all</a>
                </div>
    </div>
            <div id="tablelocation">
                <div>
                    <select onchange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entries Per Page</span>
                </div>
                <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('asset/js/script.js'); ?>"></script>
    <script type="text/javascript">
    var sorter = new TINY.table.sorter('sorter','table',{
        headclass:'head',
        ascclass:'asc',
        descclass:'desc',
        evenclass:'evenrow',
        oddclass:'oddrow',
        evenselclass:'evenselected',
        oddselclass:'oddselected',
        paginate:true,
        size:10,
        colddid:'columns',
        currentid:'currentpage',
        totalid:'totalpages',
        startingrecid:'startrecord',
        endingrecid:'endrecord',
        totalrecid:'totalrecords',
        hoverid:'selectedrow',
        pageddid:'pagedropdown',
        navid:'tablenav',
        sortcolumn:1,
        sortdir:1,
        sum:[8],
        avg:[6,7,8,9],
        columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
        init:true
    });
  </script>
 </div>
</div>