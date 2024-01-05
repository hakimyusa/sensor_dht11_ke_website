<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "dbmonitor";

	$koneksi = mysqli_connect($server,$username,$password,$database);

	if (mysqli_connect_error()) {
		echo "Database gagal terhubung...!";
	}

 ?>