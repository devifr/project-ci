<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
   	  <div class="content_box">
      <?php
       $lang = $this->lang->lang();
       if($front->num_rows()>0){
        foreach ($front->result() as $key_fron => $fron) {
          echo "<h2>$fron->judul_content</h2>";
          if($this->uri->segment(2)!='') { echo substr(str_replace('src="../../../', 'src="../', $fron->description), 0, 1800); }
          else { echo substr(str_replace('src="../../../', 'src="', $fron->description), 0, 1800); }
          if(strlen($fron->description)>1000){
            echo "".anchor($lang."/home/detail/".$fron->alias_kategori."/".$fron->alias_content, "Read More");
          }
        }
      }else{
        echo informasi(lang('no data'));
      }
      ?>
 </div>
        <div class="cleaner"></div>
<div id="testimonial">
  <h2>Client Testimonial</h2>
  <marquee direction="up" height="120px;" scrolldelay="200" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);" style="margin-bottom:4px;">
  <div id="testi">
    <?php
    if($testimonial->num_rows()>0){
      foreach ($testimonial->result() as $key_testi => $testi) {
      ?>
       <h5><?php echo $testi->title_testimonial; ?></h5>
        <p><?php echo $testi->description_testimonial; ?> 
       <br /></p> 
       <strong><?php echo $testi->created_by_testimonial; ?>.</strong>
      </div>
    <?php 
    }
  }
  else{
    echo informasi(lang('no testimonial'));
  } ?>
  </marquee>
<?php $atts = array(
              'width'      => '650',
              'height'     => '620',
              'scrollbars' => 'no',
              'status'     => 'no',
              'resizable'  => 'no',
              'screenx'    => '250',
              'screeny'    => '250'
            ); ?>
<?php echo anchor("$lang/testimonial/",'<input type="button" id="button" value="View All" />'); ?>
<?php echo anchor_popup("$lang/testimonial/input/",'<input type="button" id="blue_button" value="Tambah Data" />',$atts); ?>
</div>
  </div>
<!-------------------------------------------------------------->   
  <div class="col_w300 float_r">
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0"><?php echo lang('corporate info'); ?></li>
        <li class="TabbedPanelsTab" tabindex="0"><?php echo lang('latest news'); ?></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
         <?php foreach ($corporate_info as $key_info => $info) {
        ?>
        <p class="news_box"><a href="<?php echo base_url($lang.'/home/detail/'.$info->alias_kategori.'/'.$info->alias_content); ?>"><?php echo $info->judul_content; ?></a><br />
        </p>
        <?php } ?>
        </div>
        
        <div class="TabbedPanelsContent" >
        <?php foreach ($latest_news as $key_news => $news) {
        ?>
        <p class="news_box"><a href="<?php echo base_url($lang.'/home/detail/'.$news->alias_kategori.'/'.$news->alias_content); ?>"><?php echo $news->judul_content; ?></a><br />
         <span id="date">[ <?php echo $news->publish_date; ?> ]</span> <br />
        </p>
        <?php } ?>
        <div id="view_all" align="right">
          <a href="<?php echo base_url($lang.'/home/news/'); ?>">View All</a>
        </div>
        </div>
      </div>
    <div id="cs">
      <table width="200" border="0">
        <tr>
          <td><a href="ymsgr:sendIM?tary_trikarsa"><img src="http://opi.yahoo.com/online?u=dan_exsotic&amp;m=g&amp;t=2&amp;l=us"/></a></td>
          </tr>
        </table>
    </div>
    <img src="<?php echo images_url('frontend/call_center.png'); ?>" width="300" style="margin-top:8px;" />
    
    </div>
  </div>
<!-------------------------------------------------------------->
  <div class="cleaner"></div>
</div> <!-- end of main -->

<!-------------------------------------------------------------->