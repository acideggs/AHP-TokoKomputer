<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$id_skala = $_POST['id_skala'];
$keterangan = $_POST['edit_keterangan'];
$value = $_POST['edit_skala'];

//query update data
$sql = "UPDATE tabel_skala SET keterangan='$keterangan', value='$value' WHERE id_skala='$id_skala'";

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