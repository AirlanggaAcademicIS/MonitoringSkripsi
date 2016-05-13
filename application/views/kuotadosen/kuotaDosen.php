<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
</head>

<body>

</body>
</html>
<?php
include ("koneksi.php");
?>


<body>
<table width = "80%" border = "1" cellpadding="0" cellspacing="center" style="margin:100px auto">
	<tr>
		<td width="5%">No</td>
		<td width="10%">Nama</td>
		<td width="10%">KBK</td>
		<td width="10%">Kuota</td>
		
	</tr>
	<?php
		$query = mysql_query ("select * from dosen");
		while ($data =mysql_fetch_array ($query)){
		?>
		<tr>
			<td><?php echo $data['ID'] ?></td>
			<td><?php echo $data['nama'] ?></td>
			<td><?php echo $data['KBK'] ?></td>
			<td><?php echo $data['kuota'] ?></td>
		</tr>
<?php

}
?>

