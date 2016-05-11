<body>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bimbingan</h1>
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
        <form id="laporanDropdown" method="post">
            <select name="laporan">
                <option value="1">Performa Dosen Pembimbing</option>
                <option value="2">Status Mahasiswa</option>
                <option value="3">Minat (KBK)</option>
            </select> 
            <input type="submit" name="Submit" value="Submit">
        </form>
        
        <?php
              
        // When I navigate to any_laporan
            if(isset($_POST['laporan'])) {
                         
                // Then I should see laporan_data
                switch($_POST['laporan']){
                    case 1 : echo "<br>Tabel dan Grafik : Performa Dosen Pembimbing<br>";
                        if(isset($laporanTanggungan)) {
                            $template = array(
                                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                            );

                            $this->table->set_template($template);
                            $this->table->set_heading(array('NIK', 'Nama', 'KBK', 'Total Mahasiswa'));

                            // separate row array
                            foreach($laporanTanggungan as $row){
                                $this->table->add_row($row);
                            }
                            echo $this->table->generate();
                        } else {
                            echo "<br><br> No Data Available";
                        }
                        break;
                    case 2 : echo "<br>Tabel dan Grafik : Status Mahasiswa<br>";
                        if(isset($laporanStatus)) {
                            $template = array(
                                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                            );

                            $this->table->set_template($template);
                            $this->table->set_heading(array('NIK', 'Nama', 'KBK', 'Total Mahasiswa'));

                            // separate row array
                            foreach($laporanTanggungan as $row){
                                $this->table->add_row($row);
                            }
                            echo $this->table->generate();
                        } else {
                            echo "<br><br> No Data Available";
                        }
                        break;
                    case 3 : echo "<br>Tabel dan Grafik : Minat (KBK)<br>";
                        if(isset($laporanMinat)) {
                            $template = array(
                                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                            );

                            $this->table->set_template($template);
                            $this->table->set_heading(array('NIK', 'Nama', 'KBK', 'Total Mahasiswa'));

                            // separate row array
                            foreach($laporanTanggungan as $row){
                                $this->table->add_row($row);
                            }
                            echo $this->table->generate();
                        } else {
                            echo "<br><br> No Data Available";
                        }
                        break;
                }
                
            }
            
        ?>
        
        </div>
</body>

