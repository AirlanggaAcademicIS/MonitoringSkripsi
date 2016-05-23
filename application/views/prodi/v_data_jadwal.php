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
                                <br><br>
                                PETUGAS
                                <br>
                                081313222773</h3>
                            </div>
                            
                            <!-- /input-group -->
      <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>/prodi_menu"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>/daftar_mahasiswa">Mahasiswa</a>
            </li>
      
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>/data_jadwal">Jadwal Sidang</a>
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
                    <h1 class="page-header">JADWAL</h1>
                </div>
</div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Jadwal
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
               <div class="col-md-8" style="text-align:left">
                                      
                                <form name="form1" method="post" action="">
                                  <label for="select">Tahun Ajar</label>
                                  <select name="select" id="select">
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                  </select>
                                </form>
                                <table width="101%" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										
                  	<th width="40"><div align="center">No</div></th>
                     <th width="48"><div align="center">NIM</div></th>
                   	<th width="54"><div align="center">Nama</div></th>
                    <th width="56"><div align="center">Judul</div></th>
                    <th width="122"><div align="center">
                      <div align="center">Dosen Pembimbing 1</div>
                    </div></th>
                    <th width="119"><div align="center">
                      <div align="center">Dosen Pembimbing 2 </div>
                    </div></th>
					 <th width="84"><div align="center">Dosen Penguji 1</div></th>
                    <th width="78"><div align="center">Tanggal Proposal</div></th>
					<th width="78"><div align="center">Jam Proposal</div></th>
                    <th width="98"><div align="center">Dosen Penguji 2</div></th>
					<th width="75"><div align="center">Tanggal Skripsi</div></th>
					<th width="70"><div align="center">Jam Skripsi</div></th>
                    <th width="72"><div align="center">Kontrol</div></th>
                                        </tr>
                                    </thead>
                                    <tbody>                 
<?php
$no = 1;

foreach($jadwal as $value)
{
                ?>
                  <tr>
                    <td><?php echo $no++ ;?></td>
                    <td><?= $value->NIM;?></td>
                    <td><?= $value->Nama;?></td>
					<td><?= $value->Judul;?></td>
                    <td><?= $value->NIK1;?></td>
                    <td><?= $value->NIK2;?></td>
					<td><?= $value->NIK;?></td>
                    <td><?= $value->TanggalProp;?></td>
                    <td><?= $value->JamProp;?></td>
					<td><?= $value->NIK;?></td>
					<td><?= $value->TanggalSkripsi;?></td>
					<td><?= $value->JamSkripsi;?></td>
                    <td><a href="<?= site_url("data_jadwal/edit")."?jadwal=".$value->NIM;?>"> Edit </a>|<a href="<?= site_url("data_jadwal/delete")."?jadwal=".$value->NIM;?>">Delete</a> </td>
                  </tr>
                  <?php
}
                ?>
          </table>
		  <form name="form2" method="post" action="http://localhost/MSJadwal/index.php/data_jadwal/input">
              <input type="submit" name="TambahData id="TambahData" value="Tambah Data">
		  </form>
         
</div>
       </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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

