<div id="templatemo_main">
<!-------------------------------------------------------------->
  <div id="full">
  <div id="mapim">
  <img src="<?php echo images_url('frontend/home.png'); ?>" width="15" /> <?php echo $breadcumb;  ?></div>
<div class="content_box" style="margin-bottom:0px;">
      <div align="center">
        <h2>Job Vacancy PT.Trikarsa Sempurna Sistemindo</h2></div>
      <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="43" height="35" bgcolor="#356ECA"><div align="center"><span id="white">#</span></div></td>
           <td width="236" bgcolor="#356ECA"><span id="white">Position</span></td>
                 <td width="138" bgcolor="#356ECA"><span id="white">Devision</span></td>
                <td width="175" bgcolor="#356ECA"><span id="white">Date Posted</span></td>
                <td width="179" bgcolor="#356ECA"><span id="white">Application Deadline</span></td>
                <td width="89" bgcolor="#356ECA"><span id="white">Apply This Job</span></td>
              </tr>
            <?php if($careers->num_rows()>0){
              foreach ($careers->result() as $key_career => $career) {
               $id_encrypt = $this->encrypt->encode($career->id_career);
               $lang = $this->lang->lang();
            ?>
              <tr>
                <td height="36" bgcolor="#FFFFFF"><div align="center">
                  <hr color="#fff" size="1px;" />
                  <?php echo $key_career+1; ?></div>
                  <hr color="#CCCCCC" size="1px;" /></td>
                <td bgcolor="#FFFFFF"><hr color="#fff" size="1px;" /><a href="<?php echo base_url("$lang/careers/job/$id_encrypt"); ?>" target="_blank"><span id="biru"><?php echo $career->position; ?></span></a>
                  <hr color="#CCCCCC" size="1px;" /></td>
                   <td bgcolor="#FFFFFF"><hr color="#fff" size="1px;" /><?php echo $career->devisi; ?>
                     <hr color="#CCCCCC" size="1px;" /></td>
                <td bgcolor="#FFFFFF"><hr color="#fff" size="1px;" />
                  <?php echo date_with_name_month_and_days($career->date_posted); ?>
                <hr color="#CCCCCC" size="1px;" /></td>
                <td bgcolor="#FFFFFF"><hr color="#fff" size="1px;" />
                  <span id="red"><?php echo date_with_name_month_and_days($career->deadline); ?></span>
                <hr color="#CCCCCC" size="1px;" /></td>
                <td bgcolor="#FFFFFF">
				<a href="<?php echo base_url("$lang/careers/job/$id_encrypt"); ?>" target='_blank'>
                <input type='button' id='button' value='Apply' /></a></td>
              </tr>
            <?php
              }
            }else{
              echo informasi(lang('no data'));
            }
            ?>
            </tbody>
      </table>
</div>
   	  <div class="cleaner"></div>
  </div>
<!--------------------------------------------------------------><!-------------------------------------------------------------->
  <div class="cleaner"></div>
</div> <!-- end of main -->