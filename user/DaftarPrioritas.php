<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Daftar Prioritas</title>

	<?php  

	session_start();
	include "../connection.php";

	error_reporting(E_ALL^(E_NOTICE|E_WARNING));

	if (!isset($_SESSION['username'])) {
		echo "<a href = \"/DSS_Store/\" class=\"btn btn-danger\">Login</a>";
		die(" Anda Belum Login");
	}

	$user = $_SESSION['username'];

	$query = "SELECT nilai, nm_alternatif FROM tabel_penilaian, tabel_alternatif where tabel_penilaian.id_alternatif = tabel_alternatif.id_alternatif ORDER BY nilai DESC";

	$dt_query = $koneksi->query($query);

	

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
						<a class="nav-link" href="HitungMatrikKriteria.php">Matrik Kriteria</a>
					</li>
					<li>
						<a class="nav-link active" href="#">Daftar Prioritas</a>
					</li>
				</ul>
			</div>
		</div>
		<a href="../logout.php" class="btn float-right btn-success"">Logout</a>
	</nav>


	<!-- Tabel -->
	<div class="container">
		
		<h2 class="section-title mb-4 mt-4 text-center">Tabel Prioritas Toko Komputer Berdasarkan Bobot Akhir</h2>

		<div class="row">
			<div class="col-md-12">
				<form action="page_validasi.php" method="GET">
					<table class="table table-hover table-bordered" style="text-align: center;">
						<thead>
							<tr>
								<th>Peringkat</th>
								<th>Kandidat</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$i = 1;

							while ($dt_penilaian = $dt_query->fetch_array()) {


								?>
								<tr>
									<td><?= $i ?></td>
									<td><?= $dt_penilaian['nm_alternatif'] ?></td>
									<td><?= $dt_penilaian['nilai']?></td>
								</tr>

								<?php 

								$i++;

							}

							?>
							
						</tbody>
					</table>
				</form>
			</div>
		</div>

	</div>


	<script src="../js/jquery3.20.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>