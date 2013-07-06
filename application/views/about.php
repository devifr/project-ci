<p><?php $username = "John Doe";
echo lang('welcome', $username); 
if($this->lang->lang()=='id') echo anchor($this->lang->switch_uri('en'),' English');
else echo anchor($this->lang->switch_uri('id'),' Indonesia');
?></p>

