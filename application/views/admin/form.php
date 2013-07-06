<html>
<head>
<title>Admin MOS Template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="arirusmanto.com">
<meta name="description" content="Admin MOS Template">
<meta name="keywords" content="Admin Page">
<meta name="author" content="Ari Rusmanto">
<meta name="language" content="Bahasa Indonesia">
<link rel="shortcut icon" href="mos-css/img/icon trikarsa.png"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="mos-css/mos-style.css"> <!--pemanggilan file css-->
</head>

<body>
<div id="header">
	<div class="inHeader">
	  <div class="mosAdmin"><br>
		<a href="">View Website</a> | <a href="login.html">LogOut</a>	  </div>
	  <div class="clear"></div>
	</div>
</div>
<div id="gradasi_banner_menu"></div>
<div id="banner_menu">
<?php include 'menu/menu.php';?>
</div>

<div id="wrapper">
  <div id="rightContent">
  <div id="navigasi">
    <table width="100%" border="0">
      <tr>
        <td width="70%">&nbsp;</td>
        <td width="6%"><div align="center"><img src="mos-css/img/add.png" width="40"></div></td>
        <td width="6%"><div align="center"><img src="mos-css/img/cek.png" width="40"></div></td>
        <td width="6%"><div align="center"><img src="mos-css/img/icon3.png" width="40"></div></td>
        <td width="6%"><div align="center"><img src="mos-css/img/icon2.png" width="40"></div></td>
        <td width="6%"><div align="center"><img src="mos-css/img/trash.png" width="40"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center" id="blue">Add Article </div></td>
        <td><div align="center" id="blue">Data Article </div></td>
        <td><div align="center" id="blue">Publish </div></td>
        <td><div align="center" id="blue">Upublish </div></td>
        <td><div align="center" id="blue">Trash</div></td>
      </tr>
    </table>
  </div>
  <div id="tbl" style="float:left;">
  <h3>Form</h3>
  <div id="content_left">
	
	
		<table width="95%">
			<tr><td width="125px"><b>Input text pendek</b></td><td><input type="text" class="pendek"></td></tr>
			<tr><td><b>Input text sedang</b></td><td><input type="text" class="sedang"></td></tr>
			<tr><td><b>Input text panjang</b></td><td><input type="text" class="panjang"></td></tr>
			<tr><td><b>Radio</b></td><td>
				<input type="radio" name="radio" id="radio" value="radio 1">Radio 1
				<input type="radio" name="radio" id="radio" value="radio 2">Radio 2
			</td></tr>
			<tr><td><b>Checkbox</b></td><td>
				<input type="checkbox" name="checkbox" id="checkbox" value="checkbox 1">Checkbox 1<br>
				<input type="checkbox" name="checkbox" id="checkbox" value="checkbox 2">Checkbox 2<br>
				<input type="checkbox" name="checkbox" id="checkbox" value="checkbox 3">Checkbox 3<br>
				<input type="checkbox" name="checkbox" id="checkbox" value="checkbox 4">Checkbox 4<br>
			</td></tr>
			<tr><td><b>Pilihan</b></td><td>
				<select>
					<option selected>-- pilihan --</option>
					<option value="">Pilihan</option>
				</select>
			</td></tr>
			<tr><td><b>Textarea</b></td><td><textarea></textarea></td></tr>
			<tr><td></td><td><input type="submit" class="button" value="Save">
			<input type="reset" class="button" value="Reset">
			</td></tr>
		</table>
  </div>
  
  <div id="content_right">
		<div id="smallRight">
		<h3>Detail </h3>
		<table style="border: none;font-size: 12px;color: #5b5b5b;width: 100%;margin: 10px 0 10px 0;">
			<tr><td style="border: none;padding: 4px;"><p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td></tr>
		</table>
		</div>
	</div>
</div>

  </div>
  
  
<div class="clear"></div>
<div id="footer">Administrator Program By PT Trikarsa Sistemindo . Versi 1.1.0 </div>
</div>
</body>
</html>