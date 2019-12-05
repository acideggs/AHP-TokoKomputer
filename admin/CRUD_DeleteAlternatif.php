<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$id_alternatif = $_POST['id_alternatif'];

//query hapus data
$sql = "DELETE FROM tabel_alternatif WHERE id_alternatif='$id_alternatif'";

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