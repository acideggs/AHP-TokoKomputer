<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Home</title>

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
			<a class="navbar-brand" href="#">DSS System</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="#">Home</a>
					</li>
					<li>
						<a class="nav-link" href="FormCRUDKriteria.php">Data Kriteria</a>
					</li>
					<li>
						<a class="nav-link" href="FormCRUDSkala.php">Data Skala</a>
					</li>
					<li>
						<a class="nav-link" href="HitungMatriksAlternatif.php">Hitung Matriks Alternatif</a>
					</li>
					<li>
						<a class="nav-link" href="FormCRUDAlternatif.php">Data Alternatif</a>
					</li>
				</ul>
			</div>
		</div>
		<a href="../logout.php" class="btn float-right btn-success"">Logout</a>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center mt-4">Selamat Datang <?php echo $user; ?> </h1>
			</div>
		</div>
	</div>


	<script src="../js/jquery3.20.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>