<?php  

include "../connection.php";

$query = "SELECT * FROM tabel_kriteria";
$dt_query = $koneksi->query($query);


$n_kriteria = 0;

while ($dt_kriteria = $dt_query->fetch_array()) {
	$id_kriteria[$n_kriteria] = $dt_kriteria['id_kriteria'];
	$n_kriteria ++;
}


$query = "SELECT * FROM tabel_bobot";
$dt_query = $koneksi->query($query);

$n_bobot = 0;

while ($dt_bobot_kriteria = $dt_query->fetch_array()) {
	$bobot_kriteria[$dt_bobot_kriteria['id_kriteria_1']][$dt_bobot_kriteria['id_kriteria_2']] = $dt_bobot_kriteria['skala'];

	$n_bobot++;
}

$query = "SELECT * FROM tabel_alternatif";
$dt_query = $koneksi->query($query);

$n_alternatif = 0;

while ($dt_alternatif = $dt_query->fetch_array()) {
	$id_alternatif[$n_alternatif] = $dt_alternatif['id_alternatif'];
	$n_alternatif++;
}


$query = "SELECT * FROM tabel_bobot_alternatif";
$dt_query = $koneksi->query($query);

$n_bobot_alternatif = 0;

while ($dt_bobot_alternatif = $dt_query->fetch_array()) {
	$bobot_alternatif[$dt_bobot_alternatif['id_kriteria']][$dt_bobot_alternatif['id_alternatif_1']][$dt_bobot_alternatif['id_alternatif_2']] = $dt_bobot_alternatif['skala'];

	$n_bobot_alternatif++;
}


// Menghitung baris total alternatif

for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

	$total_baris[$kolom] = 0;

}


for($baris = 1; $baris <= $n_kriteria; $baris++){

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$total_baris[$kolom] += $bobot_kriteria[$baris][$kolom];

	}

}



// normalisasi matriks dan bobot prioritas

for($baris = 1; $baris <= $n_kriteria; $baris++){

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$new_kriteria[$baris][$kolom] = $bobot_kriteria[$baris][$kolom] / $total_baris[$kolom];

	}

}


for($baris = 1; $baris <= $n_kriteria; $baris++){

	$bobot_prioritas[$baris] = 0;

}

for($baris = 1; $baris <= $n_kriteria; $baris++){

	$totalPerBaris = 0;

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$totalPerBaris += $new_kriteria[$baris][$kolom];

	}

	$bobot_prioritas[$baris] = $totalPerBaris / $n_kriteria;

}



// menghitung baris total alternatif

for ($i_kriteria=1; $i_kriteria <= $n_kriteria ; $i_kriteria++) { 

	for($kolom = 1; $kolom <= $n_alternatif; $kolom++){

		$total_baris_alternatif[$i_kriteria][$kolom] = 0;

	}
	
}


for ($i_kriteria=1; $i_kriteria <= $n_kriteria ; $i_kriteria++) { 
	
	for($baris = 1; $baris <= $n_alternatif; $baris++){

		for($kolom = 1; $kolom <= $n_alternatif; $kolom++){

			// echo $bobot_alternatif[$i_kriteria][$baris][$kolom] . " ";

			$total_baris_alternatif[$i_kriteria][$kolom] += $bobot_alternatif[$i_kriteria][$baris][$kolom];

		}

		// echo "<br>";

	}

}



// mencari bobot prioritas alternatif


for ($i_kriteria=1; $i_kriteria <= $n_kriteria ; $i_kriteria++) { 
	
	for($baris = 1; $baris <= $n_alternatif; $baris++){

		for($kolom = 1; $kolom <= $n_alternatif; $kolom++){

			$new_alternatif[$i_kriteria][$baris][$kolom] = $bobot_alternatif[$i_kriteria][$baris][$kolom] / $total_baris_alternatif[$i_kriteria][$kolom];

		}

	}

}


for ($i_kriteria=1; $i_kriteria <= $n_kriteria ; $i_kriteria++) { 
	
	for($baris = 1; $baris <= $n_alternatif; $baris++){

		$bobot_prioritas_alternatif[$i_kriteria][$baris] = 0;

	}

}

for ($i_kriteria=1; $i_kriteria <= $n_kriteria ; $i_kriteria++) { 
	
	for($baris = 1; $baris <= $n_alternatif; $baris++){

		$totalPerBaris = 0;

		for($kolom = 1; $kolom <= $n_alternatif; $kolom++){

			$totalPerBaris += $new_alternatif[$i_kriteria][$baris][$kolom];

		}

		$bobot_prioritas_alternatif[$i_kriteria][$baris] = $totalPerBaris / $n_alternatif;

	}

}




//perankingan 

for($baris = 1; $baris <= $n_alternatif; $baris++){

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$tabelBobotKriteriaAlternatif[$baris][$kolom] = 0.0;

	}

}

for($baris = 1; $baris <= $n_alternatif; $baris++){

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$tabelBobotKriteriaAlternatif[$baris][$kolom] =(float) ($bobot_prioritas[$kolom] / $bobot_prioritas_alternatif[$kolom][$baris]);

	}

}


for($baris = 1; $baris <= $n_alternatif; $baris++){

	$nilaiTotal = 0;

	for($kolom = 1; $kolom <= $n_kriteria; $kolom++){

		$nilaiTotal += $tabelBobotKriteriaAlternatif[$baris][$kolom];

	}

	$nilai[$baris] = $nilaiTotal;

}



// input ke database nilai

$query = "SELECT * FROM tabel_penilaian";
$dt_query = $koneksi->query($query);

$dt_penilaian = $dt_query->fetch_array();

if (is_null($dt_penilaian)) {
	
	$i = 1;

	foreach ($id_alternatif as $item) {

		$sql = "INSERT INTO tabel_penilaian (id_alternatif, nilai) VALUES('". $item ."',  '" . $nilai[$i] . "')";

		$query = $koneksi->query($sql);

		$i++;

	}






} else {

	$i = 1;

	foreach ($id_alternatif as $item) {

		
		$sql = "UPDATE tabel_penilaian SET nilai = '" . $nilai[$i] . "' WHERE id_alternatif='". $item ."'";

		$query = $koneksi->query($sql);

		$i++;

	}




	header('location:DaftarPrioritas.php');

}


// var_dump($id_alternatif);

// var_dump($bobot_prioritas);

// var_dump($bobot_prioritas_alternatif);

// var_dump($tabelBobotKriteriaAlternatif);

// var_dump($nilai);

// var_dump($new_kriteria);

// var_dump($total_baris_alternatif);

// var_dump($n_kriteria);

// var_dump($bobot_kriteria);

// var_dump($bobot_alternatif);

?>