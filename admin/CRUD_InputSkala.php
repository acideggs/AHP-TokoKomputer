<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$skala = $_POST['skala'];
$keterangan = $_POST['keterangan'];

//query tambah data
$sql = "INSERT INTO tabel_skala (keterangan, value) VALUES('". $keterangan ."','" . $skala . "')";

//menjalankan query
$query = $koneksi->query($sql);

//pengecekan keberhasilan query
if ($query==true) {
	header('location:FormCRUDSkala.php');
} else {
	mysqli_error($koneksi);
	echo "errorrr";
}

?>