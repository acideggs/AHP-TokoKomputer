<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Data Kriteria</title>


	

	<?php  
	session_start();
	include "../connection.php";
	error_reporting(E_ALL^(E_NOTICE|E_WARNING));


	// Cek Sesi Login User 

	if (!isset($_SESSION['username'])) {
		echo "<a href = \"/DSS_Store/\" class=\"btn btn-danger\">Login</a>";
		die(" Anda Belum Login");
	}

	//Mengambil data dari database
	$query = "SELECT * FROM tabel_kriteria";
	$dt_query = $koneksi->query($query);


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
						<a class="nav-link" href="home.php">Home</a>
					</li>
					<li>
						<a class="nav-link active" href="#">Data Kriteria</a>
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


	<!-- Form CRUD Kriteria -->
	<div class="container py-5">

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mb-4">Data Kriteria</h2>

				<div class="row">
					<div class="col-md-12 mx-auto">


						<!-- Button Trigger Modal Tambah Kriteria -->
						<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#InputModal">
							Tambah Kriteria
						</button>


						<!-- Modal Tambah Kriteria -->
						<div class="modal fade" id="InputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">


									<!-- Form tambah kriteria -->
									<form class="form" role="form"  id="formInputKategori"  method="POST" action="CRUD_InputKriteria.php">

										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											<div class="form-group">
												<label for="nama_kriteria">Masukkan Kriteria</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="nama_kriteria" id="nama_kriteria">
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary" id="btnInput">Input Data</button>
										</div>

									</form>

								</div>
							</div>
						</div>



						<!-- Modal Edit Kriteria -->
						<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">



									<!-- Form Edit Kriteria -->
									<form class="form" role="form"  id="formInputKategori"  method="POST" action="CRUD_UpdateKriteria.php">

										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Update Kriteria</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										
										<div class="modal-body">
											<div class="form-group">
												<label for="id_kriteria">Id kriteria</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="id_kriteria" id="id_kriteria">
												<label for="nama_kriteria">Masukkan Kriteria Baru</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="edit_kriteria" id="edit_kriteria">
											</div>
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary" id="btnInput">Edit Data</button>
										</div>

									</form>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>



		<!-- Menampilkan Tabel Daftar Kriteria -->
		<div class="row">
			<div class="col-md-6">


				<!-- Tabel Data Kriteria -->
				<table class="table table-hover table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nama Kriteria</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<tbody>


						<!-- Perulangan Untuk Menampilkan isi data kriteria -->
						<?php while ($dt_kriteria = $dt_query->fetch_array()) { ?>
							<tr>
								<td><?php echo $dt_kriteria['id_kriteria']; ?></td>
								<td><?php echo $dt_kriteria['nm_kriteria']; ?></td>
								<td>


									<!-- Trigger Modal Update Kriteria -->
									<button class="btn btn-success edit" data_id="<?php echo $dt_kriteria['id_kriteria']; ?>" data_kriteria="<?php echo $dt_kriteria['nm_kriteria']; ?>">Update</button>

								</td>

								<td>


									<!-- Menghapus Kriteria yang dipilih -->
									<form action="CRUD_DeleteKriteria.php" method="POST">
										<input type="hidden" name="id_kriteria" value="<?php echo $dt_kriteria['id_kriteria']; ?>" />
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>

								</td>

							</tr>
						<?php } ?>

					</tbody>
				</table>

			</div>
		</div>

	</div>


	<script src="../js/jquery3.20.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
		// Fungsi untuk mengisi data pada modal Update Kriteria

		$('.edit').click(function(){
			$('#UpdateModal').modal()
			var id = $(this).attr('data_id')
			var kriteria = $(this).attr('data_kriteria')

			$('#id_kriteria').val(id)
			$('#edit_kriteria').val(kriteria)
		})

	</script>
</body>
</html>