<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data</title>
</head>
<body>

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

	include('koneksi.php');

	date_default_timezone_set('Asia/Jakarta');
	$waktu = date("H:i:s");
	$tanggal = date("d F Y");
	$suhu = $_GET ['suhu'];
	$kelembaban = $_GET ['kelembaban'];

	$kirim = mysqli_query($koneksi, "INSERT INTO tbmonitor (waktu,tanggal,suhu,kelembaban) VALUES ('$waktu','$tanggal','$suhu','$kelembaban')");

	if ($kirim) {
		echo "Data berhasil diinputkan...!";
	} else {
		echo "Gagal di inputkan...!";
	}
	

 ?>

</body>
</html>