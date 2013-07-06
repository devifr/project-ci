<!-------------------------------------------------------------->            
      <?php if($banners->num_rows()>0) { ?>
    <div id="slider" class="nivoSlider" style="margin:auto; top:10px;">
      <?php 
        foreach ($banners->result() as $key => $banner) {
      ?>
      <a href="#"><img src="<?php echo images_url('web/banner/'.$banner->banner_slide_name); ?>" alt="<?php echo $banner->title_banner_slide; ?>" /></a>
      <?php } ?> 
  </div>
  <?php } ?>
<!-------------------------------------------------------------->
            
        </div> 
      <!-- end of middle -->
  </div> 
  <!-- end of top -->
</div> <!-- end of top wrapper -->