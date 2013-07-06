<script type="text/javascript">
$(document).ready(function () {
  $("#searchfield").keyup(function(){
     var word = $("#searchfield").val();
    $.post("<?php echo base_url('id/home/GetSearch/'); ?>",{q:word},function(result){
      $("#result_search").html(result);
      if(word==""){
        $("#result_search").html("");
      }
    });
  });
});

function tempel(isi){
  document.getElementById("searchfield").value = isi;
  document.getElementById("result_search").innerHTML = "";
}

</script>
<div id='cssmenu'>
<ul>
  <?php 
        $lang = $this->lang->lang();
        
        echo "<li>".anchor(base_url($lang.'/'), "Home", '')."</li>";
        
        $menus_0 = $this->menu->get_by_level('0',$lang,"1");
        if($menus_0->num_rows()){
        foreach ($menus_0->result() as $m_0 => $menu_0) {
  ?> 
  <li class='has-sub '><a href='
    <?php
      $nama_menu = strtolower(str_replace(' ', '-', $menu_0->nama_menu));
        if($menu_0->url_menu != "" and $menu_0->url_menu !="#"){
          if($menu_0->for_static == 1){
            echo base_url("$lang/home/page/$nama_menu/$menu_0->url_menu"); 
          }else{
            echo base_url("$lang/$menu_0->url_menu");
          }
        }else {
          echo "#";
        } ?>'><span><?php echo $menu_0->nama_menu; ?></span></a>
    <ul>
      <?php
        $menus_1 = $this->menu->get_parent_menu($menu_0->id_menu);
        if($menus_1->num_rows()){
        foreach ($menus_1->result() as $m_1 => $menu_1) {
      ?> 
      <li class='has-sub '><a href="
      <?php
      $nama_menu = strtolower(str_replace(' ', '-', $menu_0->nama_menu));
        if($menu_1->url_menu != "" and $menu_1->url_menu !="#"){
          if($menu_1->for_static == 1){
            echo base_url("$lang/home/page/$nama_menu/$menu_1->url_menu"); 
          }else{
            echo base_url("$lang/$menu_1->url_menu");
          }
        }else {
          echo "#";
        } ?>"><span><?php echo $menu_1->nama_menu; ?></span></a>
      <?php
        $menus_2 = $this->menu->get_parent_menu($menu_1->id_menu);
        if($menus_2->num_rows()){
      ?> 
      <ul>
       <?php
        foreach ($menus_2->result() as $m_2 => $menu_2) {
       ?>
        <li><a href='
      <?php
      $nama_menu = strtolower(str_replace(' ', '-', $menu_1->nama_menu));
        if($menu_2->url_menu != "" and $menu_2->url_menu !="#"){
          if($menu_2->for_static == 1){
            echo base_url("$lang/home/page/$nama_menu/$menu_2->url_menu"); 
          }else{
            echo base_url("$lang/$menu_2->url_menu");
          }
        }else {
          echo "#";
        } ?>'><span><?php echo $menu_2->nama_menu; ?></span></a></li>
       <?php } ?> 
      </ul> 
      <?php } ?>
      </li>
      <?php  } }?>
    </ul>
  </li>
  <?php } } ?>
</ul> 
<div id="search_box">
<form action="<?php echo base_url("$lang/home/search/"); ?>" method="post">
<input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
<input type="submit" name="Search" value="" id="searchbutton" title="Search" />
<div id="result_search"></div>
<div class="cleaner"></div>
</form>
</div>
</div>
                <div class="cleaner"></div>
            </div>