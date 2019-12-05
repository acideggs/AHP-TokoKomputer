<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$nama_kriteria = $_POST['nama_kriteria'];

//query tambah data
$sql = "INSERT INTO tabel_kriteria (nm_kriteria) VALUES('". $nama_kriteria ."')";

//menjalankan query
$query = $koneksi->query($sql);

//pengecekan keberhasilan query
if ($query==true) {
	header('location:FormCRUDKriteria.php');
} else {
	mysqli_error($koneksi);
	echo "errorrr";
}

?>