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
	
	<link href="http://localhost/MonitoringSkripsi/assets/css/jquery.dataTables.min.css" type="text/css">
	 <link href="http://localhost/MonitoringSkripsi/assets/css/jquery.dataTables.css" type="text/css">
	 <link href="http://localhost/MonitoringSkripsi/assets/css/datatables.css" type="text/css">
	 <link href="http://localhost/MonitoringSkripsi/assets/css/jquery.dataTables.min.css" type="text/css">
	 <link href="http://localhost/MonitoringSkripsi/assets/jquery.min.js">
	  <link href="http://localhost/MonitoringSkripsi/assets/bower_components/bootstrap/dist/js/boostrap.min.js" type="text/css">
	 <link href="http://localhost/MonitoringSkripsi/assets/jquery.js" type="text/javascript">
	 <link href="http://localhost/MonitoringSkripsi/assets/jquery.dataTables.min.css" type="text/javascript">

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
                                <br><br><?php echo $this->session->userdata('nama');?>
                                <br><?php echo $this->session->userdata('nik');?></h3>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Mahasiswa</a>
                        </li>
                        
                             
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Bimbingan</a>
                        </li>
						
                        	<a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
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
                <div class="col-lg-12" style="text-align:center;">
                    <h2 class="page-header">BIMBINGAN</h2>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">Tanggal</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 170px;">Catatan</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">Jenis</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 170px;">Persetujuan</th><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 130px;">Kontrol</th></tr>
                                    </thead>
                                    <tbody>         
<?php foreach($bimbingan as $lihat){ 	?>
	
			<tr>
		
			<td><?php echo $lihat['Tanggal']; ?></td>
			<td><?php echo $lihat['Subjek']; ?></td>
			<td><?php echo $lihat['Jenis']; ?></td>
			<?php if($lihat['Persetujuan'] == 0){ ?>
			<?php $belum = '<a href="http://localhost/MonitoringSkripsi/index.php/menyetujuibimbingan/ubah_status_bimbingan/?array='.$lihat['id_bimbingan'].'x1"> BELUM </a>'; ?>
			 <td><?php echo $belum; ?></td>
			<?php } else { ?>
			<?php $sudah = '<a href="http://localhost/MonitoringSkripsi/index.php/menyetujuibimbingan/ubah_status_bimbingan/?array='.$lihat['id_bimbingan'].'x0"> SUDAH </a>'; ?>
			 <td><?php echo $sudah; ?></td> 
			 <?php } ?>
			 
			<td><a href="http://localhost/MonitoringSkripsi/index.php/menyetujuibimbingan/Edit"><div class="col-lg-12" style="text-align:center;"> Edit Catatan </a> </td>
                  </tr>
                  <?php
				    }
                ?>
                                      </tbody>
                                </table>
</div>
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
   <!-- <script src="http://localhost/MonitoringSkripsi/assets/js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/dist/js/sb-admin-2.js"></script>

    <link href="http://localhost/MonitoringSkripsi/assets/mahasiswa.js" type="text/javascript">
</body>

</html>
