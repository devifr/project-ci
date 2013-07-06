<div id="templatemo_footer_wrapper_01">
  <div id="templatemo_footer_wrapper_02">
      <div id="templatemo_footer">
<?php $lang = $this->lang->lang(); ?>
<table width="800" border="0" align="center">
  <tr>
    <td><div align="center"><a href="<?php echo base_url("$lang/home/page/about-us/overview"); ?>">Overview</a></div></td>
  <td><div align="center"><a href="<?php echo base_url("$lang/home/page/about-us/vision-mision"); ?>">Vision &amp; Mision</a>  </div></td>
  <td><div align="center"><a href="<?php echo base_url("$lang/home/page/about-us/corporate-value"); ?>">Corporate Value</a> </div></td>
  <td><div align="center"><a href="<?php echo base_url("$lang/home/page/about-us/management-team"); ?>">Management Team</a></div></td>
    <td><div align="center"><a href="<?php echo base_url("$lang/home/page/about-us/corporate-goal"); ?>">Corporate Goal</a> </div></td>
    <td><div align="center"><a href="<?php echo base_url("$lang/home/news/"); ?>">Latest News</a> </div></td>
    <td><div align="center"><a href="<?php echo base_url("$lang/careers/"); ?>">Careers</a></div></td>
    <td><div align="center"><a href="<?php echo base_url("$lang/gallery/"); ?>">Gallery</a></div></td>
    <td><div align="center"><a href="<?php echo base_url("$lang/contact_us"); ?>">Contact Us</a> </div></td>
  </tr>
</table>
<div align="center"><img src="<?php echo images_url('frontend/templatemo_footer.png'); ?>" width="979" height="2" style="margin-top:6px; margin-bottom:6px;" />
<?php $footer = $this->config_website_model->get_by_id(1)->row()->footer; ?>
<p><?php echo $footer; ?></p>
</div><br />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td><img src="<?php echo images_url('frontend/partner/1.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/2.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/3.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/4.png'); ?>" width="65" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/5.png'); ?>" width="65" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/6.png'); ?>" width="70" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/7.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/8.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/9.png'); ?>" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/10.png'); ?>" width="70" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/11.png'); ?>" width="70" height="25" /></td>
              <td><img src="<?php echo images_url('frontend/partner/12.png'); ?>" width="70" height="25" /></td>
            </tr>
        </table>
      </div>
    </div>
</div> 
<!-------------------------------------------------------------->
    <?php if($this->uri->segment(3) != "job") { ?>
    <script type="text/javascript" src="<?php echo js_url('frontend/jquery-1.6.1.min.js'); ?>"></script>
    <?php } ?>
    <script type="text/javascript" src="<?php echo js_url('frontend/jquery.nivo.slider.js'); ?>"></script>
    <script type="text/javascript">
$(window).load(function() {
        $('#slider').nivoSlider({
      effect: 'random',
      slices: 15,
      boxCols: 8,
      boxRows: 4,
      animSpeed: 500,
      pauseTime: 3000,
      startSlide: 0,
      directionNav: true,
      directionNavHide: true,
      controlNav: false,
      controlNavThumbs: false,
      controlNavThumbsFromRel: false,
      controlNavThumbsSearch: '.jpg',
      controlNavThumbsReplace: '_thumb.jpg',
      keyboardNav: true,
      pauseOnHover: true,
      manualAdvance: false,
      captionOpacity: 0.8,
      prevText: 'Prev',
      nextText: 'Next',
      beforeChange: function(){},
      afterChange: function(){},
      slideshowEnd: function(){},
      lastSlide: function(){},
      afterLoad: function(){}
    });
    });
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
    </script>
</body>
</html>