<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div class="col_w600 float_l">
<div class="content_box">
  <?php
    echo "<h3>Your Search on <b>$word</b> has <i>".$search_article->num_rows()."</i></h3>
    <hr/>";
   if($search_article->num_rows()>0){
    $lang = $this->lang->lang();
    echo "<ul>";
      foreach ($search_article->result() as $key => $val_search) {
        $url = base_url("$lang/home/detail/$val_search->alias_kategori/$val_search->alias_content");
        echo "<li>".anchor($url, "<h5 style=color:#666>$val_search->judul_content </h5>", "")."</li>";
      } 
    echo "</ul>";
   }else{
    echo informasi(lang('no data'));
  } ?>
</div>
  </div>
      <div class="cleaner"></div>
</div>