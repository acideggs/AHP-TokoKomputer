<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$id_skala = $_POST['id_skala'];

//query hapus data
$sql = "DELETE FROM tabel_skala WHERE id_skala='$id_skala'";

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