<!DOCTYPE html>
<html lang="en">

<script src="assets/jquery.js" type="text/javascript"> </script>

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
                                <br><br>KOOR SKRIPSI
                                <br>081313222773</h3>
                            </div>
                            
                            <!-- /input-group -->
                 
           <li>
                            <a href="http://localhost/MonitoringSkripsi/data_topik/index"> Topik Skripsi</a>
                        </li>
							<li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                                                   </ul>
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
                    <h1 class="page-header">FORM TOPIK SKRIPSI</h1>
                </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Topik Skripsi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="form1" name="formtopik" method="post" action="post">
<div class="form-group">
  <label>Tanggal </label>
   <input class="form-control" name="TanggalTopik" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->TanggalTopik;};?>"> 
</div>
  
<div class="form-group">
  <label>Tahun Ajar </label>
   <input class="form-control" name="TahunAjar" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->TahunAjar;};?>">
</div>
 
<div class="form-group">
     <label for="NIM">NIM</label>
      <input class="form-control" name="NIM"  placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->NIM;};?>"">
   
</div>
  
<div class="form-group">
<label>KBK</label>
<div class="">
<Input name="KBK" class="form-control" id="KBK" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->KBK;};?>">  
 				
</div>
</div>

<div class="form-group">
<label>Topik</label>
 <Input class="form-control" name="Topik" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->Topik;};?>">
</div>      
	
<div class="form-group">
  <label>Judul</label>
  <Input class="form-control" name="Judul" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->Judul;};?>">
</div>      
                    
<div class="form-group">
<label>Dosen Pembimbing 1</label>
<div class="">
<Input name="NIK1" class="form-control" id="NIK1" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">  
	
    </select>
</div>
</div>

<div class="form-group">
<label>Dosen Pembimbing 2</label>
<div class="">
<Input name="NIK2" class="form-control" id="NIK2" placeholder="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">  
	
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
