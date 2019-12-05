



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>DSS Toko Komputer</title>

	<?php  

	session_start();
	include "../connection.php";

	error_reporting(E_ALL^(E_NOTICE|E_WARNING));

	if (!isset($_SESSION['username'])) {
		echo "<a href = \"/DSS_Store/\" class=\"btn btn-danger\">Login</a>";
		die(" Anda Belum Login");
	}

	$user = $_SESSION['username'];

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
					<li class="nav-item active">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li>
						<a class="nav-link" href="HitungMatrikKriteria.php">Matrik Kriteria</a>
					</li>
					<li>
						<a class="nav-link" href="DaftarPrioritas.php">Daftar Prioritas</a>
					</li>
				</ul>
			</div>
		</div>
		<a href="../logout.php" class="btn float-right btn-success"">Logout</a>
	</nav>

	<h2 class="section-title mb-4 mt-4 text-center">Sistem Pendukung Keputusan Pemilihan Toko Komputer Menggunakan Metode AHP</h2>

	<div class="container">
		<p>
			Analitycal Hierarchy Process (AHP) Adalah metode untuk memecahkan suatu situasi yang komplek tidak terstruktur kedalam beberapa komponen dalam susunan yang hirarki, dengan memberi nilai subjektif tentang pentingnya setiap variabel secara relatif, dan menetapkan variabel mana yang memiliki prioritas paling tinggi guna mempengaruhi hasil pada situasi tersebut.
		</p>
		<p>
			Program ini dibuat dengan tujuan untuk menentukan pilihan terhadap sejumlah toko komputer yang ada di sekitar Jln. Gajayana (Sekitar UIN). Dengan menggunakan metode AHP, program ini akan memberikan alternatif toko komputer sesuai kebutuhan.
		</p>
	</div>

	<script src="../js/jquery3.20.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>