<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="crud-with-api-codeigniter">
	<meta name="author" content="nomersekawan">
	<title>CRUD</title>
	<?php include 'assets-css.php'; ?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
	    <a class="navbar-brand" href="<?php echo base_url()?>">CRUD</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-lg-2">
                <a class="nav-link text-white" href="<?php echo base_url()?>">
                    <i class="fa fa-fw fa-table"></i> Lihat Data
                </a>
            </li>
        </ul>
	</nav>

	<div class="content mt-4">
		<div class="container col-sm-6 col-md-5 col-lg-4">
			<div class="card mb-3">
				<h5 class="card-header text-center">Ubah Data Pengguna</h5>
				<div class="card-body">
					<div class="table-responsive">
						<div class="panel-body">
							<form role="form" action="<?php echo base_url().'index.php/ubah/aksi' ?>" method="post">
								<div class="form-group">
									<label>ID</label>
									<input type="text" name="id" class="form-control"
									value="<?php echo $pengguna[0]->id; ?>" readonly>
									<span class="small text-danger" id="id"></span>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" name="nama" class="form-control"
									value="<?php echo $pengguna[0]->nama; ?>">
									<span class="small text-danger" id="nama"></span>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control"
									value="<?php echo $pengguna[0]->username; ?>">
									<span class="small text-danger" id="username"></span>
								</div>
								<div class="form-group">
									<label>Sandi</label>
									<input type="text" name="sandi" class="form-control"
									value="<?php echo $pengguna[0]->sandi; ?>">
									<span class="small text-danger" id="sandi"></span>
								</div>
								<button type="submit" class="btn btn-primary btn-sm text-white float-right">Simpan</button>
								<button type="reset" class="btn btn-danger btn-sm text-white">Reset</button>
							</form>
						</div>
					</div>
				</div>
				<div class="card-footer text-center small text-muted">Copyright © NomerSekawan 2018</div>
			</div>
		</div>
	</div>
 	<?php include 'assets-js.php'; ?>
 	<?php include 'valid_ubah.php'; ?>
</body>
</html>