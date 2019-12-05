<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>DSS Toko Komputer</title>
</head>
<body>


	<!-- Login Form -->
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center mb-4">Aplikasi DSS Pemilihan Toko Komputer</h2>
				<div class="row">
					<div class="col-md-6 mx-auto">

						<!-- form card login -->
						<div class="card rounded-0">
							<div class="card-header">
								<h5 class="mb-0">Login</h5>
							</div>
							<div class="card-body">
								<form class="form" role="form" action="login.php?op=in" id="formLogin" method="POST">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control form-control-lg rounded-0" name="username" id="username" required="">
										<div class="invalid-feedback">Oops, you missed this one.</div>
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control form-control-lg rounded-0" id="password" name="password">
									</div>
									<div>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input">
											<span class="custom-control-indicator"></span>
										</label>
									</div>
									<button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
								</form>
							</div>
							<!--/card-block-->
						</div>
						<!-- /form card login -->

					</div>


				</div>
				<!--/row-->

			</div>
			<!--/col-->
		</div>
		<!--/row-->
	</div>
	<!--/container-->


	<script src="js/jquery3.20.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>