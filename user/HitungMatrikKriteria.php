<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Matrik Kriteria</title>

	<?php  

	session_start();
	include "../connection.php";

	error_reporting(E_ALL^(E_NOTICE|E_WARNING));

	if (!isset($_SESSION['username'])) {
		echo "<a href = \"/DSS_Store/\" class=\"btn btn-danger\">Login</a>";
		die(" Anda Belum Login");
	}

	$user = $_SESSION['username'];

	//Mengambil data dari database
	$query = "SELECT * FROM tabel_kriteria";
	$dt_query = $koneksi->query($query);
	$data = 0;

	while ($dt_kriteria = $dt_query->fetch_array()) {
		$data+=1;
	}

	$baris = $data;

	$counter= 0;
	

	?>
	
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">DSS Toko Komputer</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="home.php">Home</a>
					</li>
					<li>
						<a class="nav-link active" href="#">Matrik Kriteria</a>
					</li>
					<li>
						<a class="nav-link" href="DaftarPrioritas.php">Daftar Prioritas</a>
					</li>
				</ul>
			</div>
		</div>
		<a href="../logout.php" class="btn float-right btn-success"">Logout</a>
	</nav>


	<!-- Tabel -->
	<div class="container">
		
		<h2 class="section-title mb-4 mt-4 text-center">Tabel Hitung Matrik Kriteria</h2>

		<div class="row">
			<div class="col-md-12">
				<form action="CRUD_InputBobot.php" method="post">
					<table class="table table-hover table-bordered" id="tbl_kriteria" style="text-align: center;">
						<thead>
							<tr>
								<th></th>

								<!-- Perulangan Untuk Menampilkan isi data kriteria -->
								<?php 
								$dt_query = $koneksi->query($query);

								while ($dt_kriteria = $dt_query->fetch_array()) { ?>

									<th><?echo $dt_kriteria['nm_kriteria']?></th>

								<?php } ?>

							</tr>
						</thead>
						<tbody>

							<?php
							$dt_query = $koneksi->query($query);
							
							while ($dt_kriteria = $dt_query->fetch_array()) {

								$counter++;
								$kolom = 0;

								?>

								<tr>
									<td><?echo $dt_kriteria['nm_kriteria']?></td>

									<?php 

									for ($i=1; $i <= $baris; $i++) { 

										if ($baris!=$data && $i==1) {

											for ($j=1; $j <= ($data-$baris) ; $j++) { 

												$kolom++;

												?>

												<td>
													
													<input type="hidden" id="<?echo 'nilai'. $counter . 'x' . $kolom  ?>">

												</td>

												<?
											}

										}

										$kolom++;

										if($counter==$kolom){ ?>

											<td>
												<select name="baris<?echo $counter?>kolom<?echo $kolom?>" class="form-control" id="<? echo 'nilai'. $counter . 'x' . $kolom ?>">

														<option value="1">1</option>

												</select>
											</td>

										<? } else {

											?>

											<td>
												<select class="form-control" name="baris<?echo $counter?>kolom<?echo $kolom?>" onchange="hitung(<?echo $counter?>,<?echo $kolom?>, this)" id="<? echo 'nilai'. $counter . 'x' . $kolom ?>">

													<? $dt_query2 = $koneksi->query("SELECT value FROM tabel_skala");

													while ( $dt_skala = $dt_query2->fetch_array()) { ?>

														<option value="<? echo $dt_skala['value']?>"><? echo $dt_skala['value']?></option>

														<?

													}

													?>



												</select>


											</td>

											<?	
										}

									}

									$baris-=1;

									?>
								</tr>

							<?php } ?>

						</tbody>
					</table>

					<button type="submit" class="btn btn-sm btn-danger">Hitung</button>

				</form>
			</div>
		</div>

	</div>


	<script src="../js/jquery3.20.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
		function hitung(baris,kolom,selTag){

			var nilai = selTag.options[selTag.selectedIndex].text;

			var x = document.getElementById("tbl_kriteria").rows[kolom].cells;

			var hasil = 1/nilai;

			var nama = "baris" + kolom + "kolom" + baris;

			// console.log(nama);

			x[baris].innerHTML = '<input type="text" name="'+  nama +'" value="' + hasil + '">';

		}

		

	</script>
</body>
</html>