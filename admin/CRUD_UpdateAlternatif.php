<?php  

include "../connection.php";

// Mengisi variabel dengan data yang dikirim dari melalui post
$id_alternatif = $_POST['id_alternatif'];
$nama_alternatif = $_POST['nama_alternatif'];

//query update data
$sql = "UPDATE tabel_alternatif SET nm_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'";

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