<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$id_kriteria = $_POST['id_kriteria'];
$nama_kriteria = $_POST['edit_kriteria'];

//query update data
$sql = "UPDATE tabel_kriteria SET nm_kriteria='$nama_kriteria' WHERE id_kriteria='$id_kriteria'";

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