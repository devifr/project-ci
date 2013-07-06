<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
  <div id="mapim">
  <img src="<?php echo images_url("frontend/home.jpg"); ?>" width="15" /> 
    <?php echo $breadcumb; ?></div>
<div class="content_box">
  <?php
  $lang = $this->lang->lang();
  if($lists->num_rows()>0){
    foreach ($lists->result() as $key_list => $list) {
      $url = $lang.'/home/detail/'.$list->alias_kategori;
  ?>
          <h4><?php echo $list->judul_content; ?></h4>
        <?php echo substr(preg_replace("/<img[^>]+\>/i", "",$list->description),0, 250);
        if(strlen($list->description)>250) { echo "... ".anchor($url."/".$list->alias_content, "Read More"); } ?>
        <br><br>
      <?php }
  }else{
    echo informasi(lang('no data'));
  } ?>
  <div class="cleaner"></div>
      <div id="garis">
        <?php echo $pagination; ?>
      </div>
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
    <div id="adress">
      <p><strong>Head Office</strong></p>
      <p>Ranuza Building, 2nd &amp; 3rd Floor<br />
        Jl.Timor No.10-Menteng<br />
        Jakarta Pusat 10350 - Indonesia<br />
        Phone.+62.21-3193 5163<br />
        Fax.+62.21-3193 5226 <br />
        <a href="#">admin@tri-karsa.com</a></p>
      <p><strong>Surabaya Office</strong></p>
      <p>Bumi Mandiri Tower II Building, 4th Floor<br />
        Jl.Panglima Sudirman No.66-68<br />
        Surabaya 60271 - Indonesia<br />
        Phone.+62.31-535 2697<br />
        Fax.+62.31-535 2724 </p>
    </div>
    </div>
  </div>
<!-------------------------------------------------------------->
  <div class="cleaner"></div>
</div> <!-- end of main -->

<!-------------------------------------------------------------->