<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$nama_alternatif = $_POST['alternatif'];

//query tambah data
$sql = "INSERT INTO tabel_alternatif (nm_alternatif) VALUES('". $nama_alternatif ."')";

//menjalankan query
$query = $koneksi->query($sql);

//pengecekan keberhasilan query
if ($query==true) {
	header('location:FormCRUDAlternatif.php');
} else {
	mysqli_error($koneksi);
	echo "errorrr";
}

?>