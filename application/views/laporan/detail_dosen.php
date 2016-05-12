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
        
                        <?php
                        
                        if(isset($detailDosen)) {
                            $template = array(
                                'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
                            );

                            $this->table->set_template($template);
                            $this->table->set_heading(array('NIM', 'Nama', 'KBK', 'Judul Skripsi'));

                            // separate row array

                            foreach($detailDosen as $row){
                                $this->table->add_row($row);
                            }
                            echo $this->table->generate();
                        } else {
                            echo "<br><br> No Data Available";
                        }
                        
                        ?>
        
        </div>
</body>

