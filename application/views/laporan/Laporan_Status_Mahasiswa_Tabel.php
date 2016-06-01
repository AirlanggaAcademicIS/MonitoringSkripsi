<html>
    <head>
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Minat KBK</title>

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
                               <h3> Selamat Datang!</h3>
                                <br><br>
                                <h4>Bunga Desa Wijoyokusumo
                                <br>081313222773</h4>
                            </div>
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="http://localhost/MonitoringSkripsi/laporan/minatkbk"> Minat KBK</a>
                        </li>
                        
                             
                        <li>
                            <a href="http://localhost/MonitoringSkripsi/laporan/tanggungandosen"> Tanggungan Dosen</a>
                        </li>
                        <li>
                            <a href="http://localhost/MonitoringSkripsi/laporan/statusmahasiswa"> Status Mahasiswa</a>
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
        
        <div id="page-wrapper">
        
            <?php
                echo "<br>Tabel dan Grafik : Performa Dosen Pembimbing<br>";
                
                
                if(isset($laporanStatus)) {
                    $template = array(
                        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                    );

                    $this->table->set_template($template);
                    $this->table->set_heading(array('NIM', 'Nama', 'Status'));

                    // separate row array
                    foreach($laporanStatus as $row){
                        $this->table->add_row($row);
                    }

                    echo $this->table->generate();
                } else {
                    echo "<br><br> No Data Available";
                }
                
            ?>
            
            <a href="http://localhost/MonitoringSkripsi/laporan/statusmahasiswagrafik"> Grafik</a>
            
            <div id="myChart" style="width: 900px; height: 500px;">        </div>
        
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
    
    </body>
</html>
