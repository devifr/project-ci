<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
  <div id="mapim">
  <img src="<?php echo images_url("frontend/home.jpg"); ?>" width="15" /> 
    <?php echo $breadcumb; ?></div>
<div class="content_box">
  <?php
  $lang = $this->lang->lang();
  if($rows->num_rows()>0){
  $row = $rows->row(); ?>
          <h2><?php echo $row->judul_content; ?></h2>
        <?php echo str_replace('src="../../../', 'src="../../../../', $row->description); ?>
      <?php }else{
    echo informasi(lang('no data'));
  } ?>
</div>
   	  <div class="cleaner"></div>
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
        <div class="TabbedPanelsContent">
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