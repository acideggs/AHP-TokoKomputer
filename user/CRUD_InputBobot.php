<?php  

include "../connection.php";



$query = "SELECT * FROM tabel_kriteria";
$dt_query = $koneksi->query($query);


$n_kategori = 0;

while ($dt_kriteria = $dt_query->fetch_array()) {
	$n_kategori +=1;
}

for ($i=0; $i < $n_kategori; $i++) { 

	for ($j=0; $j < $n_kategori; $j++) { 

		$data[$i][$j] = $_POST['baris' . ($i+1) . 'kolom' . ($j+1)];
		
	}

}


$query = "SELECT * FROM tabel_bobot";
$dt_query = $koneksi->query($query);

$dt_kriteria = $dt_query->fetch_array();

if (is_null($dt_kriteria)) {
	
	for ($i=0; $i < $n_kategori; $i++) { 

		for ($j=0; $j < $n_kategori; $j++) { 

			$sql = "INSERT INTO tabel_bobot (id_kriteria_1, id_kriteria_2, skala) VALUES('". ($i+1) ."', '" . ($j+1) ."', '" . $data[$i][$j] . "')";

			$query = $koneksi->query($sql);

		}

	}

} else {

	for ($i=0; $i < $n_kategori; $i++) { 

		for ($j=0; $j < $n_kategori; $j++) { 

			$sql = "UPDATE tabel_bobot SET skala = '" . $data[$i][$j] . "' WHERE id_kriteria_1='". ($i+1) ."' and id_kriteria_2 = '" . ($j+1) ."'";

			$query = $koneksi->query($sql);

		}

	}

	header('location:Hitung_AHP.php');

}




?>