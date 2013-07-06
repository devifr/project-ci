<script src="<?php echo js_url('ajaxfileupload.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#button").click(function(){
    $("fieldset").toggle(true);
  });

  $(function() {
   $('#apply_job').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :"<?php echo base_url($this->lang->lang().'/careers/save_data/'.$id_encrypt); ?>", 
         secureuri      :false,
         type: "POST",
         fileElementId  :'attach',
         dataType    : 'json',
         data        : {
            'name_lamaran' : $("#name").val(),
            'email' : $("#email").val(),
            'no_phone' : $("#no_phone").val(),
            'address' : $("#address").val(),
            'education' : $("#education").val(),
            'attach' : $("#attach").val(),
            'cover' : $("#cover").val(),
            'captcha' : $("#captcha").val()
         },
         success  : function (data, status)
         {
            if(data.status == 'success')
            {
              alert("Your Application Form Had been Send");
              location.reload();
            }else{
              
            }
            $('#result').html(data.msg);
         }
         
      });
      return false;
   });
});
});
</script>
<div id="templatemo_top_wrapper" >
  <div id="templatemo_top" style="padding-top:20px; height:100%;">
<!--Header------------------------------------------------------------>
		<div id="templatemo_header">
            <div id="site_title">
              <div id="full">
                <div id="mapim"> <img src="<?php echo images_url('frontend/home.png'); ?>" width="15" /> Home / <a href="#">Careers</a></div>
                <div class="content_box" style="margin-bottom:0px;">
                <img src="<?php echo images_url('frontend/careers.jpg'); ?>" style="margin-bottom:20px;" width="100%" />
<div align="center">
<h2>Job Vacancy PT.Trikarsa Sempurna Sistemindo</h2>
                  </div>
                  <div>
                    <div>
                      <div>
                        <p><strong>PT.TRI-KARSA SEMPURNA SISTEMINDO</strong> is a fast growing telecommunication subcontractor in Indonesia and is fully Indonesian owned company that provides professional Implementation Services in Mobile Telecom Network Area. It is in with years of experience working with the operator or vendor organization as well as working with large telecom subcontracting company make us confident to deliver our commitment in improving existing or new network and implementation.</p>
                        <p>&nbsp;</p>
                      </div>
                    </div>
                  </div>
                  <?php if($rows->num_rows()>0) {
                    $row = $rows->row(); ?>
                  <h4 align="center"><strong><?php echo $row->title; ?></strong><br />
                    <?php echo $row->position; ?></h4>
                  <?php echo $row->description; ?>  
                </div>
                <?php echo "<input type='button' id='button' value='Apply This Job' />"; ?>
                <div id="isi-form">
<fieldset  style="display:none;">
<div align="center">
  <div id="result"></div>
                  </div>
               <form id="apply_job" name="apply_job" method="post" enctype="multipart/form-data"> 
                    <table width="100%" id="tabel_form" name="tabel_form">
                    <tr>
                      <td width="13%">Name</td>
                      <td width="87%"><input type="text" name="name_lamaran" id="name" value="<?php echo set_value('name_lamaran'); ?>" size="35"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" size="55"></td>
                    </tr>
                    <tr>
                      <td>No Phone</td>
                      <td><input type="text" name="no_phone" id="no_phone" value="<?php echo set_value('no_phone'); ?>" size="25"></td>
                    </tr>
                    <tr>
                    <td>Address</td>
                    <td><textarea name="address" id="address" rows="5" value="<?php echo set_value('address'); ?>" cols="30"></textarea></td>
                    </tr>
                    <tr>
                    <td>Education</td>
                    <td><input type="text" name="education" id="education" value="<?php echo set_value('education'); ?>" size="35"></td>
                    </tr>
                    <tr>
                      <td>Attachment</td>
                    <td><input type="file" name="attach" id="attach"> *zip, doc, docx</td>
                  </tr>
                  <tr valign="top">
                      <td>Cover Letter</td>
                    <td><textarea name="cover" id="cover" rows="25" cols="50">
Dear Sir/Madam,

I wish to apply for the position above, as advertised on Jobstreet.com on 13 March 2013.

[Please add your message here.]

Thank you.

Sincerely
[Your Name]</textarea></td>
                  </tr>
                  <tr>
                      <td>&nbsp;</td>
                    <td><?php 
                    echo 'Submit the word you see below: <br/>';
                    echo $captcha.'<br/>';
                    echo '<input type="text" name="captcha" id="captcha" value="" />';
                     ?></td>
                  </tr>
                  <tr>
                    <td colspan='2'><input type="submit" name="simpan" id="button" class="simpan" value="Apply" /></td>
                  </tr>
                    </table>
              </form>
            </fieldset>
                <div class="cleaner"></div>
            </div>
                </div>
                <?php }else{
                 echo informasi(lang('no data')); }
                ?>
                <div class="cleaner"></div>
              </div>
          </div>
		</div>

  </div> 
  <!-- end of top -->