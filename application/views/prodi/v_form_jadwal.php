<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Skripsi</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
            <img src="http://localhost/MonitoringSkripsi/assets/header.png">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    
                </button>
                
            </div>
            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form" style="color:#39F; text-align:center;">
                               <h3> Selamat Datang!
                                <br><br>PETUGAS
                                <br>081313222773</h3>
                            </div>
                            
                            <!-- /input-group -->
        <li ><a href="prodi_menu.php"></a></li>
        <li><a href="daftar_mahasiswa.php">Mahasiswa</a></li>
        <li class="active"><a href="v_data_topik.php"> Jadwal</a></li>
                            <!-- /.nav-second-level -->
                        </li>
                       
                      
                      
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">FORM JADWAL </h1>
                </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Jadwal
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">

  
<div class="form-group">
  <label>NIM </label>
  <input class="form-control" name="NIM" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->NIM;};?>">
</div> 
  
<div class="form-group">
  <label>Nama </label>
  <input class="form-control" name="Nama" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->Nama;};?>">
</div>
  
<div class="form-group">
  <label>Judul</label>
  <input class="form-control" name="Judul" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->Judul;};?>">
</div>    
  
<div class="form-group">
  <label>Dosen Pembimbing 1 </label>
  <input class="form-control" name="Nama" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK1;};?>">
</div>
  
<div class="form-group">
  <label>Dosen Pembimbing 2</label>
  <input class="form-control" name="Judul" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK2;};?>">
</div>    
  	
<div class="form-group">
  <label>Tanggal Proposal</label>
   <input class="form-control" name="TanggalTopik" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->TanggalProp;};?>">
</div>

<div class="form-group">
  <label>Jam Proposal</label>
   <input class="form-control" name="TanggalTopik" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->JamProp;};?>">
</div>
                    
<div class="form-group">
<label>Dosen Penguji 1</label>
<div class="">
<select name="DosenPembimbing1">
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK1;};?>">Eva Harianti</option>
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK1;};?>">Indra Kharisma</option>
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK1;};?>">Badrus Zaman</option>
    </select>
</div>
<div class="form-group">
  <label>Tanggal Skripsi</label>
   <input class="form-control" name="TanggalTopik" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->TanggalProp;};?>">
</div>
        
<div class="form-group">
  <label>Jam Skripsi</label>
   <input class="form-control" name="TanggalTopik" placeholder="<?php if ($type=="EDIT"){echo $jadwal[0]->JamSkripsi;};?>">
</div>

<div class="form-group">
<label>Dosen Penguji 2</label>
<div class="">
<select name="DosenPembimbing2">
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK2;};?>">Eva Harianti</option>
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK2;};?>">Indra Kharisma</option>
				  <option value="<?php if ($type=="EDIT"){echo $jadwal[0]->NIK2;};?>">Badrus Zaman</option>
      </select>
</div>
</div>
 <input type="submit" name="simpan" value="<?php echo $type;?>">
</div>
                <?php echo form_close();?>
                <!-- /.col-lg-12 --><!-- /.row -->
           
            <!-- /.row --><!-- /#page-wrapper --><!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/raphael/raphael-min.js"></script>
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="http://localhost/MonitoringSkripsi/assets/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
