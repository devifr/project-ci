<script type="text/javascript" src="<?php echo base_url('asset/js/fancybox/jquery.fancybox.js?v=2.1.4'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/fancybox/jquery.fancybox.css?v=2.1.4'); ?>" media="screen" />
<script type="text/javascript">
var $s = jQuery.noConflict();
$s(document).ready(function() {
//fancy box, image pop up
  $s('.fancybox').fancybox();
});
</script>
  <div id="templatemo_top_wrapper" >
  <div id="templatemo_top" style="padding-top:20px; height:100%;">
<!--Header------------------------------------------------------------>
    <div id="templatemo_header">
            <div id="site_title">
              <div id="full">
                <div id="mapim"> <img src="<?php echo images_url('frontend/home.png'); ?>" width="15" /> <?php echo $breadcumb; ?></div>
                <div class="content_box" style="margin-bottom:0px;">
                  <div align="center">
                    <h2>Gallery Foto PT.Trikarsa Sempurna Sistemindo</h2>
                  </div>
                  <h4 align="center">&nbsp;</h4>
                  <?php
                    if($gallerys->num_rows()>0){ 
                      foreach ($gallerys->result() as $key_gal => $gallery) {
                        echo "<div id='img'><a class='fancybox' href='".base_url('gallery/'.$gallery->nama_gallery)."' data-fancybox-group='gallery' title='".$gallery->judul_gallery."'><img src='".gallery_url($gallery->nama_gallery)."' class='gallery' /></a></div>";
                      }
                   }else{
                    echo informasi_front("Data Gallery Belum Ada");
                   }
                    ?>
                  <div id="garis">
                    <?php echo $pagination; ?>
                  </div>
                </div>
                <div class="cleaner"></div>
              </div>
          </div>
    </div>
<!--------------------------------------------------------------><!-- end of middle -->
  </div> 
  <!-- end of top -->
</div> <!-- end of top wrapper --><!-- end of main -->