<!--Content Home ------------------------------------------------------------------------>
<?php echo $this->session->flashdata('msg'); ?>
  <div id="rightContent">
  <h3>Dashboard</h3>
  <div class="quoteOfDay">
  <b>Welcome To Administrator  :</b> <i style="color: #5b5b5b;">"<?php echo $this->session->userdata('nama_admin'); ?>"</i> </div>
  <div id="content_left">
    <div class="shortcutHome">
    <a href="<?php echo base_url('admin/config_website'); ?>"><img src="<?php echo base_url('asset/images/admin/img/photo.png');?>"><br>Global Configuration</a>
    </div>
    <div class="shortcutHome">
    <a href="<?php echo base_url('admin/article/input/');?>"><img src="<?php echo base_url('asset/images/admin/img/posting.png');?>"><br>Add article</a>
    </div>
    <div class="shortcutHome">
    <a href="<?php echo base_url('index.php/admin/file/'); ?>"><img src="<?php echo base_url('asset/images/admin/img/halaman.png');?>">File Manager </a>
    </div>
    <div class="shortcutHome">
    <a href=""><img src="<?php echo base_url('asset/images/admin/img/template.png');?>"><br>
    Template Settings</a>   </div>
    <div class="shortcutHome">
    <a href=""><img src="<?php echo base_url('asset/images/admin/img/quote.png');?>"><br>
    Information</a>   </div>
    <div class="shortcutHome">
    <a href="<?php echo base_url('index.php/admin/contact_us/'); ?>"><img src="<?php echo base_url('asset/images/admin/img/bukutamu.png');?>"><br>
    Guest Book</a>    </div>
  </div>
        
  <div id="content_right">
    <div id="smallRight"><h3>Informasi web anda</h3>
    <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
      <tr>
        <td width="83%" style="border: none;padding: 4px;">Jumlah Posting</td><td width="17%" style="border: none;padding: 4px;"><b><?php echo $jml_posting; ?></b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Jumlah Kategori</td><td style="border: none;padding: 4px;"><b><?php echo $jml_kategori; ?></b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Jumlah Testimonial Masuk</td><td style="border: none;padding: 4px;"><b><?php echo $jml_testimonial; ?></b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Jumlah Apply Careers Masuk</td><td style="border: none;padding: 4px;"><b><?php echo $jml_career; ?></b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Jumlah Foto Dalam Galeri</td><td style="border: none;padding: 4px;"><b><?php echo $jml_gallery; ?></b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Jumlah Data Buku Tamu</td><td style="border: none;padding: 4px;"><b><?php echo $jml_contact_us; ?></b></td></tr>
    </table>
    </div>
    <div id="smallRight"><h3>Statistik pengunjung web</h3>
    
    <table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
      <tr>
        <td width="83%" style="border: none;padding: 4px;">Pengunjung Online</td><td width="17%" style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Pengunjung Hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Total Pengunjung</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Hit Hari ini</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
      <tr>
        <td style="border: none;padding: 4px;">Total Hit</td><td style="border: none;padding: 4px;"><b>12</b></td></tr>
    </table>
    </div>
  </div>
  </div>