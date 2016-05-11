<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="http://localhost/MonitoringSkripsi/assets/Untitled-2.css" rel="stylesheet">
<link href="http://localhost/MonitoringSkripsi/assets/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<section class="banner">
<div class="container">
  <div class="row">
  <img src="http://localhost/MonitoringSkripsi/assets/header.png">
  </div>
  </div>
  </section>
  <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <li><a href=""><img src="http://localhost/MonitoringSkripsi/assets/tara.JPG"></a></li>
          
           
            <li><a href="#">Kuota dosen pembimbing</a></li>
            <li><a href="http://localhost/MonitoringSkripsi/index.php/control_bimbingan/home_bimbingan">Bimbingan</a></li>
             <li><a href="#">Progess</a></li>
          </ul></div>
        
          <div class="col-md-8" style="text-align:center">
<h2>Tambahan Bimbingan</h2>

<form id="form1" name="form1" method="post" action="">
<table>
    <tr>
      <td width="97"><label for="catatan">Catatan</label></td>
      <td width="160"><input type="text" name="catatan" id="catatan" /></td>
    </tr>
    <tr>
      <td><label for="tanggal">Tanggal</label></td>
      <td><input type="text" name="tanggal" id="tanggal" /></td>
   <tr>
      <td><label for="dosen">Dosen</label></td>
      <td><select name="dosen">    
    <option value="Dosen Pembimbing 1">Dosen Pembimbing 1</option>    
    <option value="Dosen Pembimbing 2">Dosen Pembimbing 2</option>  
    </select></td>
    </tr>
  </table>
<form name="form1" method="post" action="">
          <input type="submit" name="save" id="save" value="Save">
        </form>
         </div>
    

</body>
</html>
