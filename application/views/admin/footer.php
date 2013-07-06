<!--Footer------------------------------------------------------------------------>
<div class="clear"></div>
<div id="footer">
<?php $footer = $this->config_website_model->get_by_id(1)->row()->footer; 
echo $footer; ?>
</div>
</div>
</body>
</html>