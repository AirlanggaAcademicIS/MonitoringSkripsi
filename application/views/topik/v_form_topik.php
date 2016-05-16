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
                    <span class="sr-only">Toggle navigation</span>                </button>
            </div>
            

            <div class="navbar-default sidebar" role="navigation">
              <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form" style="color:#39F; text-align:center;">
                              <h3> Selamat Datang!
                                <br><br> KOOR SKRIPSI
                                <br>
                                1234567890
                               </h3>
                            </div>
                            
                            <!-- /input-group -->
                        </li>
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
        <div id="page-wrapper"><div class="row"><div class="col-lg-12">
    <h1 class="page-header">FORM USULAN TOPIK </h1>
    <table>
  
            <tbody>
          <h2></h2>
    <?php echo form_open('data_topik/post'); ?>
    <?php if ($type=="EDIT"){ 
     echo form_hidden('NIM', $this->input->get('skripsi'));
     }
     ?>
	<tr>
    <td>TANGGAL</td>
    <td><input type="date" name="Tanggal" value="<?php if ($type=="EDIT"){echo $skripsi[0]->Tanggal;};?>"></td>
   </tr>
   <tr>
    <td>TAHUN AJAR</td>
    <td><input type="text" name="Tahunajar" value="<?php if ($type=="EDIT"){echo $skripsi[0]->Tahunajar;};?>"></td>
   </tr>
    <tr>
    <td>NIM</td>
    <td><input type="text" name="NIM" value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIM;};?>"></td>
   </tr>
   <tr>
    <td>NAMA</td>
    <td><input type="text" name="Nama" value="<?php if ($type=="EDIT"){echo $skripsi[0]->Nama;};?>"></td>
   </tr>
   <tr>
    <td>KBK</td>
    <td><input type="text" name="KBK" value="<?php if ($type=="EDIT"){echo $skripsi[0]->KBK;};?>"></td>
   </tr>
   <tr>
    <td>TOPIK</td>
    <td><input type="text" name="Topik" value="<?php if ($type=="EDIT"){echo $skripsi[0]->Topik;};?>"></td>
   </tr>
   <tr>
    <td>JUDUL</td>
    <td><input type="text" name="Judul" value="<?php if ($type=="EDIT"){echo $skripsi[0]->Judul;};?>"></td>
   </tr>
   <tr>
    <td>DOSEN PEMBIMBING 1</td>
	<td><select name="DosenPembimbing1">
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Army Justitia</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Eva Harianti</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Indra Kharisma</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Badrus Zaman</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Dyah Herawati</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Kartono</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK1;};?>">Purbandini</option>
                  </select></td>
   </tr>
    <tr>
    <td>DOSEN PEMBIMBING 2</td>
	<td><select name="DosenPembimbing2">
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Army Justitia</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Eva Harianti</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Indra Kharisma</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Badrus Zaman</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Dyah Herawati</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Kartono</option>
				  <option value="<?php if ($type=="EDIT"){echo $skripsi[0]->NIK2;};?>">Purbandini</option>
                  </select></td>
   </tr>

   <tr>
    <td></td>
    <td><input type="submit" name="simpan" value="<?php echo $type;?>"></td>
   </tr>
   <?php echo form_close();?>
            </tbody>
</table>
</body>
</html>


