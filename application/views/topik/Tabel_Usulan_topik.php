<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring Skripi</title>

   <!-- Bootstrap Core CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/MonitoringSkripsi/assets/dist/css/sb-admin-2.css" rel="stylesheet">

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
                               <h3> Selamat Datang!</h3>
							    <br><br><div style='text-align:right'>
                                <br><br>
                                 <?php echo $this->session->userdata('Nama');?></div>
								  <a href="http://localhost/MonitoringSkripsi/Dosen_pembimbing/">Menu Dosen</a>
                            </div>
                            </div>
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="http://localhost/MonitoringSkripsi/data_topik/index"> Topik Skripsi</a>
                        </li>
                        <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                                                   </ul>
                   
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
                    <h1 class="page-header">TOPIK SKRIPSI</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         TOPIK SKRIPSI
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 15px;">No</th><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 15px;">Tanggal</th><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">NIM</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 170px;">KBK</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">Topik</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 170px;">Judul</th><th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Dosbing 1</th><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 130px;">Dosbing 2</th><th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 130px;">Kontrol</th></tr>
                                    </thead>
                                    <tbody>   
                                 <?php
$no = 1;

foreach($skripsi as $value)
{
                ?>
                  <tr>
                    <td><?php echo $no++ ;?></td>
					<td><?= $value->TanggalTopik;?></td>
                    <td><?= $value->NIM;?></td>
                    <td><?= $value->KBK;?></td>
                    <td><?= $value->Topik;?></td>
                    <td><?= $value->Judul;?></td>
                    <td><?= $value->NIK1;?></td>
                    <td><?= $value->NIK2;?></td>
                    <td><a href="<?= site_url("data_topik/edit")."?skripsi=".$value->NIM;?>"> Edit </a>|<a href="<?= site_url("data_topik/delete")."?skripsi=".$value->NIM;?>">Delete</a> </td>
                  </tr>
                  <?php
}
                ?>
                                      </tbody>
                                </table>
			
								</div></div></div>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div></div>
                        
 <!-- jQuery -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/MonitoringSkripsi/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/MonitoringSkripsi/assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
