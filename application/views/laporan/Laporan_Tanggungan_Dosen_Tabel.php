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
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Tanggungan Dosen</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Laporan Tanggungan Dosen                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                    
                                        <?php
                                        if(isset($laporanTanggungan)) {
                                            $top = $laporanTanggungan[0];
                                            $numKeys = count($top);
                                            if($numKeys == 8) {
//                                                echo "<br> Tabel Performa Dosen Pembimbing <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Proposal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Revisi Proposal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Skripsi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Revisi Skripsi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Lulus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                echo "<tr>";
                                                $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                    ."?array=".$row['NIK'].'x'.'">'
                                                    .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                echo "<td>".$row['NIK']."</td>";
                                                echo "<td>".$row['Nama']."</td>";
                                                echo "<td>".$row['KBK']."</td>";
                                                echo "<td>".$row['prop']."</td>";
                                                echo "<td>".$row['revProp']."</td>";
                                                echo "<td>".$row['skrip']."</td>";
                                                echo "<td>".$row['revSkrip']."</td>";
                                                echo "<td>".$row['lulus']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                        <?php
                                            }
                                            else if((isset($top['prop'])) && ($numKeys < 8)){
//                                                echo "<br> Tabel Performa Dosen - Proposal <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Proposal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                    echo "<tr>";
                                                    $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                        ."?array=".$row['NIK'].'x'.'">'
                                                        .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                    echo "<td>".$row['NIK']."</td>";
                                                    echo "<td>".$row['Nama']."</td>";
                                                    echo "<td>".$row['KBK']."</td>";
                                                    echo "<td>".$row['prop']."</td>";
                                                    echo "</tr>";
                                                }
                                        ?>
                                    </tbody>
                                        <?php
                                            }
                                            else if((isset($top['revProp'])) && ($numKeys < 8)){
//                                                echo "<br> Tabel Performa Dosen - Revisi Proposal <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Revisi Proposal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                echo "<tr>";
                                                $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                    ."?array=".$row['NIK'].'x'.'">'
                                                    .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                echo "<td>".$row['NIK']."</td>";
                                                echo "<td>".$row['Nama']."</td>";
                                                echo "<td>".$row['KBK']."</td>";
                                                echo "<td>".$row['revProp']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                        <?php
                                            }
                                            else if((isset($top['skrip'])) && ($numKeys < 8)){
//                                                echo "<br> Tabel Performa Dosen - Skripsi <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Skripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                echo "<tr>";
                                                $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                    ."?array=".$row['NIK'].'x'.'">'
                                                    .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                echo "<td>".$row['NIK']."</td>";
                                                echo "<td>".$row['Nama']."</td>";
                                                echo "<td>".$row['KBK']."</td>";
                                                echo "<td>".$row['skrip']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                        <?php
                                            }
                                            else if((isset($top['revSkrip'])) && ($numKeys < 8)){
//                                                echo "<br> Tabel Performa Dosen - Revisi Skripsi <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Revisi Skripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                echo "<tr>";
                                                $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                    ."?array=".$row['NIK'].'x'.'">'
                                                    .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                echo "<td>".$row['NIK']."</td>";
                                                echo "<td>".$row['Nama']."</td>";
                                                echo "<td>".$row['KBK']."</td>";
                                                echo "<td>".$row['revSkrip']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                        <?php
                                            }
                                            else if((isset($top['lulus'])) && ($numKeys < 8)){
//                                                echo "<br> Tabel Performa Dosen - Lulus <br><br>";
                                        ?>
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">NIK</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 172px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 204px;">KBK</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 149px;">Lulus</th>
                                        </tr>
                                        <?php
                                            foreach($laporanTanggungan as $row){
                                                echo "<tr>";
                                                $row['Nama'] = '<a href = "'.base_url().'laporan/detail_dosen/'
                                                    ."?array=".$row['NIK'].'x'.'">'
                                                    .'<font color="red">'.$row['Nama'].'</font>'.'</a>';
                                                echo "<td>".$row['NIK']."</td>";
                                                echo "<td>".$row['Nama']."</td>";
                                                echo "<td>".$row['KBK']."</td>";
                                                echo "<td>".$row['lulus']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </thead>
                                    </tbody>
                                        
                                    <?php
                                    }
//                    $template = array(
//                        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
//                    );
//                    $this->table->set_template($template);
//                    
//                    $top = $laporanTanggungan[0];
//                    $numKeys = count($top);
//                    
//                    if($numKeys == 8) {
//                        echo "<br> Tabel Performa Dosen Pembimbing <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK',
//                            'Proposal','RevProposal','Skripsi','RevSkripsi','Lulus'));
//                    }
//                    else if((isset($top['prop'])) && ($numKeys < 8)){
//                        echo "<br> Tabel Performa Dosen - Proposal <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK', 
//                            'Proposal'));
//                    } else if((isset($top['revProp'])) && ($numKeys < 8)){
//                        echo "<br> Tabel Performa Dosen - Revisi Proposal <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK',
//                            'Rev Proposal'));
//                    } else if((isset($top['skrip'])) && ($numKeys < 8)){
//                        echo "<br> Tabel Performa Dosen - Skripsi <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK',
//                            'Skripsi'));
//                    } else if((isset($top['revSkrip'])) && ($numKeys < 8)){
//                        echo "<br> Tabel Performa Dosen - Revisi Skripsi <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK',
//                            'Rev Skripsi'));
//                    } else if((isset($top['lulus'])) && ($numKeys < 8)){
//                        echo "<br> Tabel Performa Dosen - Revisi Skripsi <br><br>";
//                        $this->table->set_heading(array('NIK', 'Nama', 'KBK',
//                            'Lulus'));
//                    }
//                    echo $this->table->generate();
                } else {
                    echo "<br><br> No Data Available";
                }
                
            ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
            
            <!--<a href="http://localhost/MonitoringSkripsi/laporan/tanggungandosengrafik"> Grafik</a>-->
            
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
