<script type="text/javascript">
$("#apply_job").submit(function(event) {

  /* stop form from submitting normally */
  event.preventDefault();

  /*clear result div*/
   $("#result").html('');

  /* get some values from elements on the page: */
   var values = $(this).serialize();

  /* Send the data using post and put the results in a div */
    $.ajax({
      url: "<?php echo base_url($this->lang->lang().'/careers/save_data/'.$id_encrypt);?>",
      type: "post",
      data: values,
      success: function(){
          alert("success");
           $("#result").html('<div id=success>Your Data Had Been Send</div>');
      },
      error:function(){
          alert("failure");
          $("#result").html('<div id=gagal>Your Data Failed to Be Send</div>');
      }   
    }); 
});
</script>
<div id="isi">
<div align="center">
  <div id="result"></div>
                  </div>
              <form id="apply_job" name="apply_job" method="post" enctype="multipart/form-data">
                    <table width="100%" id="tabel_form" name="tabel_form">
                    <tr>
                      <td width="13%">Name</td>
                      <td width="87%"><input type="text" name="name_lamaran" id="name" size="35"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="text" name="email" id="email" size="55"></td>
                    </tr>
                    <tr>
                      <td>No Phone</td>
                      <td><input type="text" name="no_phone" id="no_phone" size="25"></td>
                    </tr>
                    <tr>
                    <td>Address</td>
                    <td><textarea name="address" id="address" rows="5" cols="30"></textarea></td>
                    </tr>
                    <tr>
                    <td>Education</td>
                    <td><input type="text" name="education" id="education" size="35"></td>
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
                    <td colspan='2'><input type="submit" name="simpan" id="button" value="Apply" /></td>
                  </tr>
                    </table>
              </form>
                <div class="cleaner"></div>
            </div>