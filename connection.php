<?php  
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "dss_lokasitokokompter";
	$koneksi = mysqli_connect($host, $username, $password, $database);
	if (!$koneksi) {
		echo "Koneksi Database gagal!! Error : ";
		mysqli_connect_error();
	}
?>