<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<title>Data Skala</title>


	

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
	$query = "SELECT * FROM tabel_skala";
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
						<a class="nav-link" href="FormCRUDKriteria.php">Data Kriteria</a>
					</li>
					<li>
						<a class="nav-link active" href="#">Data Skala</a>
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


	<!-- Form CRUD Skala Perbandingan -->
	<div class="container py-5">

		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mb-4">Data Skala</h2>

				<div class="row">
					<div class="col-md-12 mx-auto">


						<!-- Button Trigger Modal Tambah Skala -->
						<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#InputModal">
							Tambah Skala Perbandingan
						</button>


						<!-- Modal Tambah Skala -->
						<div class="modal fade" id="InputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">


									<!-- Form tambah Skala -->
									<form class="form" role="form"  id="formInputSkala"  method="POST" action="CRUD_InputSkala.php">

										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Skala</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<div class="modal-body">
											<div class="form-group">
												<label for="skala">Masukkan Skala Perbandingan</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="skala" id="skala">
												<label for="keterangan">Masukkan Keterangan</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="keterangan" id="keterangan">
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



						<!-- Modal Edit Skala -->
						<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">



									<!-- Form Edit Skala -->
									<form class="form" role="form"  id="formInputKategori"  method="POST" action="CRUD_UpdateSkala.php">

										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Update Skala</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										
										<div class="modal-body">
											<div class="form-group">
												<label for="id_kriteria">Id Skala</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="id_skala" id="id_skala">
												<label for="nama_kriteria">Masukkan Skala Baru</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="edit_skala" id="edit_skala">
												<label for="nama_kriteria">Masukkan Keterangan</label>
												<input type="text" class="form-control form-control-lg rounded-0" name="edit_keterangan" id="edit_keterangan">
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



		<!-- Menampilkan Tabel Daftar Skala -->
		<div class="row">
			<div class="col-md-12">


				<!-- Tabel Data Skala -->
				<table class="table table-hover table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th>Id</th>
							<th>Keterangan</th>
							<th>skala</th>
							<th colspan="2">Aksi</th>
						</tr>
					</thead>
					<tbody>


						<!-- Perulangan Untuk Menampilkan isi data Skala  -->
						<?php while ($dt_skala = $dt_query->fetch_array()) { ?>
							<tr>
								<td><?php echo $dt_skala['id_skala']; ?></td>
								<td><?php echo $dt_skala['keterangan']; ?></td>
								<td><?php echo $dt_skala['value']; ?></td>
								<td>


									<!-- Trigger Modal Update Skala -->
									<button class="btn btn-success edit" data_id="<?php echo $dt_skala['id_skala']; ?>" data_keterangan="<?php echo $dt_skala['keterangan']; ?>" data_skala="<?php echo $dt_skala['value']; ?>">Update</button>

								</td>

								<td>


									<!-- Menghapus Skala  yang dipilih -->
									<form action="CRUD_DeleteSkala.php" method="POST">
										<input type="hidden" name="id_skala" value="<?php echo $dt_skala['id_skala']; ?>" />
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
			var keterangan = $(this).attr('data_keterangan')
			var skala = $(this).attr('data_skala')

			$('#id_skala').val(id)
			$('#edit_skala').val(skala)
			$('#edit_keterangan').val(keterangan)
		})

	</script>
</body>
</html>