<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minat KBK</title>
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
          <li><a href=""><img src="http://localhost/MonitoringSkripsi/assets/pakanis.jpg"></a></li>
          <li style="color:#fff; text-align:center;">Anies Baswedan</li>
          <li style="color:#fff; text-align:center;">01355527382</li>
           <li><a href="http://localhost/MonitoringSkripsi/index.php/laporan/minatkbk" style="background-color:#06F; color:#FFF;">Minat KBK</a></li><br>
           <li><a href="#" style="background-color:#06F; color:#FFF;">Tanggungan Dosen</a></li>
           <br>
           <li><a href="#" style="background-color:#06F; color:#FFF;">Status Mahasiswa</a></li>
        </ul></div>
        <div class="col-md-8" style="text-align:center;">
        <br><br>  <h2>Minat KBK</h2><br><br>
        <form name="form1" method="post" action="http://localhost/MonitoringSkripsi/index.php/laporan/minatkbk">
    <label for="jenis_kbk">Jenis KBK : </label>
    <select name="jenis_kbk" id="jenis_kbk">
    <option value="0">Semua KBK</option>
    <option value="1">Data Mining</option>
      <option value="2">Sistem Pendukung Keputusan</option>
        <option value="3">Rekayasa Sistem Informasi</option>
     </select>
     <br>
     <label for="tahun">Tahun : </label>
      <select name="tahun" id="tahun">
      <option value="semua">Semua Tahun</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
        </select>
        <input value="submit" type="submit">
   
  </form>

  
  </div>
</div>
          
    

</body>
</html>
