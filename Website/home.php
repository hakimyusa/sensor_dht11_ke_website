<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monitoring Suhu dan Kelembaban</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 class="h1" align="center">MONITORING SUHU DAN KELEMBABAN RUANGAN</h1>
<p class="ket" align="center">ini adalah website untuk memonitoring suhu dan kelembaban ruangan</p>

<?php 
	include "koneksi.php";

	$query = mysqli_query($koneksi, "SELECT * FROM tbmonitor ORDER BY id DESC LIMIT 1");
	while ($data = mysqli_fetch_array($query)) {

 ?>


	Waktu update terakhir :	(<?php echo $data['waktu'] ?>) Tanggal : (<?php echo $data['tanggal'] ?>)
		
<div class="container">
	<div class=kotak>
		<h2 class="h2">SUHU</h2>
		<div class="nilai">
		<?php echo $data['suhu'] ?><font size="7">°C</font>
		</div>
	</div>
	<div class=kotak>
		<h2 class="h2">KELEMBABAN</h2>
		<div class="nilai">
		<?php echo $data['kelembaban'] ?><font size="7">%</font>
		</div>
	</div>
</div>

<?php } ?>

<a href="hapus.php">Reset Data..!</a> <br><br>
</body>
</html>