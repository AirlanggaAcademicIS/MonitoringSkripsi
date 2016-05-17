<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
         <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            var encoded_data;
            function setData(data){
                encoded_data = data;
                drawChart();
            }
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            
                var data = google.visualization.arrayToDataTable([
                    ['A','B'],
                    ['aku',50],
                    
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

    </head>

    <body>
    <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Laporan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
<!--            <form id="laporanDropdown" method="post">
                <select name="laporan">
                    <option value="1">Performa Dosen Pembimbing</option>
                    <option value="2">Status Mahasiswa</option>
                    <option value="3">Minat (KBK)</option>
                </select> 
                <input type="submit" name="Submit" value="Submit">
            </form>-->

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

            </div>

            <div id="myChart" style="width: 900px; height: 500px;">        </div>

    </body>
</html>
