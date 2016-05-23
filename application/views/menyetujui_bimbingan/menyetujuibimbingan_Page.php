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
						<ul class="nav nav-sidebar">
                            <div class="input-group custom-search-form" style="color:#39F; text-align:center;">
                               <li><a href=""><img src="http://localhost/MonitoringSkripsi/assets/dosen.jpg"></a></li>
                               
                                <br><br>Dosen
                                <br>1989088976525</h3>
                            </div>
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""> Mahasiswa</a>
                        </li>
                        
                             
                        <li>
                            <a href=""> Bimbingan</a>
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
                <div class="col-lg-12" style="text-align:center;">
                    <h2 class="page-header">BIMBINGAN</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
			<div class="col-lg-12" style="text-align:center;">
			<td width="400"><input name="nama" type="text" id="nama" value="">
	              <input type="submit" name="search" id="search" value="Search" /></td>
				  <br><br>
		        </tr>
				
				
          </table>
		</style>
			<table width="1050" height="30" border="1">
	        <tr>
			  <th width="50" align="center" bordercolor="#000000" bgcolor="#999999" scope="row"><strong>NO</strong></th>
	          <th width="112" align="center" bordercolor="#000000" bgcolor="#999999" scope="row"><strong>NIM</strong></th>
	          <td width="252" align="center" bordercolor="#000000" bgcolor="#999999" scope="row"><strong>Nama Mahasiswa</strong></td>
			
			</tr>
			<?php 
			$no = 1;
			foreach($mahasiswa as $lihat){
			?>
			<tr>
			<td><?= $no;?></td>
			<td><?php echo $lihat-> NIM; ?></td>
			<td><?php echo $lihat->Nama; ?></td>
			
			</tr>
			<?php
			$no++;
			}
			?>
		 
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
