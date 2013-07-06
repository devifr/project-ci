<script type="text/javascript" src="<?php echo base_url('asset/js/fancybox/jquery.fancybox.js?v=2.1.4'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/fancybox/jquery.fancybox.css?v=2.1.4'); ?>" media="screen" />
<script type="text/javascript">
var $s = jQuery.noConflict();
$s(document).ready(function() {
//fancy box, image pop up
  $s('.fancybox').fancybox();
});
</script>
<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div id="full">
  <div id="mapim">
  <img src="<?php echo images_url('frontend/home.png'); ?>" width="15" /> <?php echo $breadcumb;  ?></div>
<div class="content_box" style="margin-bottom:0px;">
      <div align="center">
        <h2>Client Testimonial</h2></div>
          <?php
            $lang = $this->lang->lang();
            if($testimonial->num_rows()>0){
              foreach ($testimonial->result() as $key_testi => $testi) {
              ?>
               <h5><?php echo $testi->title_testimonial; ?></h5>
                <p style="float:left"><?php
                if($testi->attachment_testimonial!=""){
                  echo "<a href='".testi_url($testi->attachment_testimonial)."' class='fancybox' data-fancybox-group='gallery' title='".$testi->title_testimonial."'><img src='".testi_url($testi->attachment_testimonial)."' id='image-testi'></a>";
                } ?>
                <p style="float:left"><?php
                 echo $testi->description_testimonial; ?> 
               </p> <br />
               <p><strong>Created By <?php echo $testi->created_by_testimonial; ?>.</strong></p>
              </div>
              <div class="cleaner"></div>
              <div id="garis">
                    <?php echo $pagination; ?>
              </div>
            <?php 
            }
          }
          else{
            echo informasi(lang('no testimonial'));
          } ?>
      </div>
      <div class="cleaner"></div>
  </div>
<!--------------------------------------------------------------><!-------------------------------------------------------------->
  <div class="cleaner"></div>
</div> <!-- end of main -->