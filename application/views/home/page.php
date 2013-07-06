<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
  <div id="mapim">
  <img src="<?php echo images_url("frontend/home.jpg"); ?>" width="15" /> 
  <?php echo $breadcumb;  ?>
  </div>
<div class="content_box">
  <?php if($rows->num_rows()>0){
  $row = $rows->row(); ?>
          <h2><?php echo $row->judul_content; ?></h2>
          <?php echo str_replace('src="../../../', 'src="../../../../', $row->description);
      if($row->add_other_content !=0){ ?>
         
        <?php
        $bhs = $this->lang->lang();
        $url = $bhs.'/home/page/'.$row->alias_content;
        $conten_kate = $this->content->get_by_kategori($row->kategori_id,$bhs,$row->id_content);
        if($conten_kate->num_rows()>0){
			echo" <div id=testimonial>";
          foreach ($conten_kate->result() as $key_conten_kate => $ck) {
            echo "<h5>$ck->judul_content</h5>
            ".substr(preg_replace("/<img[^>]+\>/i", "",$ck->description),0, 250);
            if(strlen($ck->description)>250) { echo "... ".anchor($url."/".$ck->alias_content, "Read More"); } 
            echo "<br/>";
          }echo"</div>";
        }
      }
        ?>
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
        <li class="TabbedPanelsTab" tabindex="0"><?php $url_menu = $this->uri->segment(4); 
        $url_nama_menu = ucwords(str_replace('-', ' ', $url_menu));
        echo $url_nama_menu; ?></li>
        <li class="TabbedPanelsTab" tabindex="0"><?php echo lang('latest news'); ?></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <?php 
        $lang = $this->lang->lang();
        $idmenu = $this->menu->get_by_alias($url_nama_menu)->row()->id_menu;
        $isimenu = $this->menu->get_parent_menu($idmenu);
        if($isimenu->num_rows>0){
        foreach ($isimenu->result() as $key_isi => $isi) { ?>
          <p class="news_box">
            <a href="
        <?php if($isi->url_menu != "" and $isi->url_menu !="#"){
          echo base_url("$lang/home/page/$url_menu/$isi->url_menu"); }
        else {
          echo "#";
        } ?>"><?php echo $isi->nama_menu; ?></a><br />
          </p>
        <?php } } ?>
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