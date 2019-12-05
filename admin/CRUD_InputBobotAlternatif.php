<?php  

include "../connection.php";



$query = "SELECT * FROM tabel_kriteria";
$dt_query = $koneksi->query($query);


$n_kategori = 0;

while ($dt_kriteria = $dt_query->fetch_array()) {
	$nama_kategori[$n_kategori] = $dt_kriteria['id_kriteria'];
	$n_kategori +=1;
}

$query = "SELECT * FROM tabel_alternatif";
$dt_query = $koneksi->query($query);

$n_alternatif = 0;

while ($dt_alternatif = $dt_query->fetch_array()) {
	$nama_alternatif[$n_alternatif] = $dt_alternatif['nm_alternatif'];
	$n_alternatif +=1;
}



foreach ($nama_kategori as $item) {

	for ($i=0; $i < $n_alternatif; $i++) { 

		for ($j=0; $j < $n_alternatif; $j++) { 

			$data[$item][$i][$j] = $_POST[ $item . 'baris' . ($i+1) . 'kolom' . ($j+1)];

		}

	}
	
}

foreach ($nama_kategori as $item) {

	for ($i=0; $i < $n_alternatif; $i++) { 

		for ($j=0; $j < $n_alternatif; $j++) { 

			echo $data[$item][$i][$j] . " ";

		}

		echo "<br>";

	}

	echo "<br>";
	echo "<br>";
	echo "<br>";
	
}



$query = "SELECT * FROM tabel_bobot_alternatif";
$dt_query = $koneksi->query($query);

$dt_bobot = $dt_query->fetch_array();

if (is_null($dt_bobot)) {
	
	foreach ($nama_kategori as $item) {
		
		for ($i=0; $i < $n_alternatif; $i++) { 

			for ($j=0; $j < $n_alternatif; $j++) { 

				$sql = "INSERT INTO tabel_bobot_alternatif (id_kriteria, id_alternatif_1, id_alternatif_2, skala) VALUES( '" . $item . "' ,'". ($i+1) ."', '" . ($j+1) ."', '" . $data[$item][$i][$j] . "')";

				$query = $koneksi->query($sql);

			}

		}

	}

} else {

	foreach ($nama_kategori as $item) {
		
		for ($i=0; $i < $n_kategori; $i++) { 

			for ($j=0; $j < $n_kategori; $j++) { 

				$sql = "UPDATE tabel_bobot_alternatif SET skala = '" . $data[$item][$i][$j] . "' WHERE id_alternatif_1='". ($i+1) ."' and id_alternatif_2 = '" . ($j+1) ."' and id_kriteria = '"  . $item . "'";

				$query = $koneksi->query($sql);

			}

		}

	}

	header('location:HitungMatriksAlternatif.php');

}




?>