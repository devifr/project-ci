<div id="banner_menu">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/menu/stmenu.js"></script></head>
<body>
<script type="text/javascript">
<!--
stm_bm(["menu4fd9",980,"","",0,"","",0,0,0,0,1000,1,0,0,"","100%",0,0,1,1,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,3,4,0,0,100,"",-2,"",-2,90,0,0,"#000000","","",3,0,0,"#000000"]);
stm_ai("p0i0",[0,"Beranda","","",-1,-1,0,"<?php echo base_url('admin/admin/'); ?>","_self","","","","",0,0,0,"","",0,0,0,0,1,"",0,"#0099CC",0,"","",3,3,0,0,"#FFFFF7","#000000","#000000","#FFFFFF","8pt 'Tahoma','Arial'","8pt 'Tahoma','Arial'",0,0,"","","","",0,0,0],70,0);
stm_aix("p0i1","p0i0",[0,"Site"],60,0);
stm_bp("p1",[1,4,0,0,2,3,6,0,100,"",-2,"",-2,100,2,3,"#999999","#FFFFFF","",3,1,1,"#ACA899"]);
stm_aix("p1i0","p0i0",[0,"Control Panel","","",-1,-1,0,"<?php echo base_url('admin/admin/'); ?>","_self","","","","",6,0,0,"","",0,0,0,0,1,"#FFFFFF"]);
stm_aix("p1i1","p1i0",[0,"My Profile","","",-1,-1,0,"<?php echo base_url('admin/admin/edit/'); ?>"]);
stm_aix("p1i2","p1i0",[0,"Global Configuration","","",-1,-1,0,"<?php echo base_url('admin/config_website/'); ?>"]);
stm_aix("p1i3","p1i0",[0,"System Information","","",-1,-1,0,"<?php echo base_url('admin/config_website/system_config/'); ?>"]);
stm_ai("p1i4",[6,1,"#ACA899","",0,0,0]);
stm_aix("p1i5","p1i0",[0,"LogOut","","",-1,-1,0,"<?php echo base_url('admin/admin/Dologout/'); ?>"]);
stm_ep();
stm_aix("p0i2","p0i0",[0,"Menus"],60,0);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i0",[0,"Menu Manager","","",-1,-1,0,"<?php echo base_url('admin/menu/'); ?>"],50,0);
stm_aix("p2i1","p1i4",[]);
<?php
$query = $this->db->get('kategori_menu')->result();
foreach ($query as $key => $kate) {
  $id_kate = $this->encrypt->encode($kate->id_kategori_menu);
  echo "stm_aix('p2i$key+1','p1i0',[0,'$kate->nama_kategori_menu','','',-1,-1,0,'".base_url("admin/menu/kategori/$id_kate")."'],50,0);";
} 
?>
stm_ep();
stm_aix("p0i3","p0i0",[0,"Content"],70,0);
stm_bpx("p3","p1",[1,4,0,0,2,3,6,7]);
stm_aix("p3i0","p1i0",[0,"Article Manager","","",-1,-1,0,"#","_self","","","","",6,0,0,"<?php echo base_url('asset/images/menu/arrow_r.gif');?>","<?php echo base_url('asset/images/menu/arrow_w.gif');?>",7,7]);
stm_bpx("p4","p1",[1,2,-3,0,2,3,0]);
stm_aix("p4i0","p1i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/article/input/');?>","_self","","","","",0]);
stm_aix("p4i1","p4i0",[0,"View List Article","","",-1,-1,0,"<?php echo base_url('admin/article/'); ?>"]);
stm_ep();
stm_aix("p3i1","p3i0",[0,"Category Manager","","",-1,-1,0,"#","_self","","","","",6,0,0,"<?php echo base_url('asset/images/menu/arrow_r.gif');?>",""]);
stm_bpx("p5","p4",[]);
stm_aix("p5i0","p4i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/category/input/');?>","_self","","","","",0]);
stm_aix("p5i1","p4i0",[0,"View List Category","","",-1,-1,0,"<?php echo base_url('admin/category/'); ?>"]);
stm_ep();
stm_aix("p3i1","p3i0",[0,"Testimonial Manager","","",-1,-1,0,"#","_self","","","","",6,0,0,"<?php echo base_url('asset/images/menu/arrow_r.gif');?>",""]);
stm_bpx("p5","p4",[]);
stm_aix("p5i0","p4i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/testimonial/input/');?>","_self","","","","",0]);
stm_aix("p5i1","p4i0",[0,"View List Testimonial","","",-1,-1,0,"<?php echo base_url('admin/testimonial/'); ?>"]);
stm_ep();
stm_aix("p3i2","p1i4",[]);
stm_aix("p3i3","p3i1",[0,"Careers","","",-1,-1,0,"#"]);
stm_bpx("p6","p4",[]);
stm_aix("p6i0","p4i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/career/input/');?>"]);
stm_aix("p6i1","p4i0",[0,"View List Careers","","",-1,-1,0,"<?php echo base_url('admin/career/');?>"]);
stm_aix("p6i2","p4i0",[0,"Inbox","","",-1,-1,0,"<?php echo base_url('admin/career/inbox/');?>"]);
stm_ep();
stm_aix("p3i4","p1i0",[0,"Guest Book","","",-1,-1,0,"<?php echo base_url('admin/contact_us/'); ?>"]);
stm_aix("p3i5","p1i4",[]);
stm_aix("p3i6","p1i0",[0,"File Manager","","",-1,-1,0,"<?php echo base_url('admin/file/'); ?>"]);
stm_ep();
stm_aix("p0i4","p0i0",[0,"Components"],80,0);
stm_bpx("p7","p3",[]);
stm_aix("p7i0","p1i0",[0,"Background","","",-1,-1,0,"<?php echo base_url('admin/config_website/change_background/'); ?>"]);
stm_aix("p7i1","p1i0",[0,"Slide Banners","","",-1,-1,0,"<?php echo base_url('admin/banner_slideshow/'); ?>"]);
stm_aix("p7i1","p1i0",[0,"Top Banner","","",-1,-1,0,"<?php echo base_url('admin/config_website/change_banner/'); ?>"]);
stm_aix("p7i2","p3i0",[0,"Gallery","","",-1,-1,0,"#","_self","","","","",6,0,0,"<?php echo base_url('asset/images/menu/arrow_r.gif');?>","<?php echo base_url('asset/images/menu/arrow_w.gif');?>"]);
stm_bpx("p8","p4",[]);
stm_aix("p8i0","p4i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/gallery/input/');?>"]);
stm_aix("p8i1","p4i0",[0,"List Gallery","","",-1,-1,0,"<?php echo base_url('admin/gallery/'); ?>"]);
stm_ep();
stm_aix("p7i3","p7i2",[0,"Block"]);
stm_bpx("p9","p4",[]);
stm_aix("p9i0","p4i0",[0,"Add","","",-1,-1,0,"<?php echo base_url('admin/kategori_block/input/');?>"]);
stm_aix("p9i1","p4i0",[0,"Block List","","",-1,-1,0,"<?php echo base_url('admin/kategori_block/'); ?>"]);
stm_ep();
stm_ep();
stm_aix("p0i5","p0i0",[0,"Help"],50,0);
stm_bpx("p10","p1",[]);
stm_aix("p10i0","p1i0",[0,"CMS Trikarsa Help","","",-1,-1,0,"<?php echo base_url('admin/config_website/help/'); ?>","_blank"]);
stm_ep();
stm_ep();
stm_em();
//-->
</script>

</body>
</html>
</div>
<div id="wrapper">
