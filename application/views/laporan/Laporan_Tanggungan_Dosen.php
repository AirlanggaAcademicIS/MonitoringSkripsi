<html>
    <head>
        <?php 
//            $hits = array(
//                array("day"=>10,"count" =>53),
//                array("day"=>11,"count" =>67),
//                array("day"=>12,"count" =>85),
//                array("day"=>13,"count" =>57),
//                array("day"=>14,"count" =>65),
//                array("day"=>15,"count" =>71),
//                array("day"=>16,"count" =>85),
//                array("day"=>17,"count" =>106),
//                array("day"=>18,"count" =>55),
//                array("day"=>19,"count" =>96),
//                );
            $hits = $laporanGrafik;
            //this counter will be used later on the foreach
            $counter = count($hits);
        ?>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            var encoded_data = <?php echo 10; ?>;;
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            
//                var data = google.visualization.arrayToDataTable([
//                    ['A','B'],
//                    ['aku',50],
//                    
//                ]);
                
                var data = google.visualization.arrayToDataTable([
                  ['Nama','Pembimbing 1', 'Pembimbing 2','Total'],
                    <?php foreach ($hits as $key =>$hit):?>
                      <?php /*if the key is equal to the counter-1 it means we've reached
          the end of our array in that case the javascript array,
          won't have a comma at the end, or else it'll give a
          unexpected identifier error*/
                           if(($counter-1)==$key):?>
                        ['<?=$hit["Nama"]?>', <?=$hit["count1"]?>, <?=$hit["count2"]?>, <?=$hit["allCount"]?>]
                      <?php else:?>
                        ['<?=$hit["Nama"]?>', <?=$hit["count1"]?>, <?=$hit["count2"]?>, <?=$hit["allCount"]?>],
                      <?php endif;?>
                      <?php endforeach;?>
                  ]);
//                var data = google.visualization.DataTable();

                var options = {
                  chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                  },
                  bars: 'vertical' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('myChart'));
                chart.draw(data, options);
            
          }
      </script>
        
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
                            <a href=""> Tanggungan Dosen</a>
                        </li>
                        <li>
                            <a href=""> Status Mahasiswa</a>
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
                
                
                if(isset($laporanTanggungan)) {
                    $template = array(
                        'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                    );

                    $this->table->set_template($template);
                    $this->table->set_heading(array('NIK', 'Nama', 'KBK', 'Total 1', 'Total 2', 'Total Seluruhnya'));

                    // separate row array
                    foreach($laporanTanggungan as $row){
                        $this->table->add_row($row);
                    }

                    echo $this->table->generate();
                } else {
                    echo "<br><br> No Data Available";
                }
                
            ?>
            
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
    
            </div>

            

    </body>
</html>
