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
	<div class="notif"></div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
	    <a class="navbar-brand navbar-toggler-right" href="<?php echo base_url()?>">CRUD</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-lg-2">
                <a class="nav-link text-white" href="<?php echo base_url().'index.php/tambah' ?>">
                    <i class="fa fa-fw fa-plus"></i> Tambah Data
                </a>
            </li>
        </ul>
	</nav>

	<div class="content mt-4">
	    <div class="container col-sm-12 col-md-12 col-lg-9">
	    	<div class="card mb-3">
	    		<h5 class="card-header text-center">Data Pengguna</h5>
	    		<div class="card-body">
	    			<div class="table-responsive">
	    				<table class="table table-sm table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead class="">
								<tr>
									<td align="center">#</td>
									<th>ID</th>
									<th>Nama</th>
									<th>Username</th>
									<th class="last">Sandi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								if(is_array($pengguna) || is_object($pengguna))
								{
									foreach($pengguna as $er)
									{
										$no++;
										?>
								<tr>
									<td align="center"><?php echo $no ?></td>
									<td><?php echo $er->id ?></td>
									<td><?php echo $er->nama ?></td>
									<td><?php echo $er->username ?></td>
									<td class="last"><?php echo $er->sandi ?></td>
									<td class="aksi" align="right">
										<a class="dropdown-toggle" id="aksiDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							      			<i class="fa fa-fw fa-ellipsis-v"></i>
							      		</a>

										<div class="dropdown-menu" aria-labelledby="aksiDropdown">
											<a class="dropdown-item" href="<?php echo base_url().'index.php/ubah/id/'.$er->id ?>">
												<i class="fa fa-edit"></i> Ubah Data
											</a>
											<a href="#" class="dropdown-item hapus" data-toggle="modal" data-target="#konfirm" data-id="<?php echo $er->id ?>" data-nama="<?php echo $er->nama ?>">
												<i class="fa fa-trash"></i> Hapus Data
											</a>
										</div>
									</td>
								</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
    			<div class="card-footer text-center small text-muted">Copyright © NomerSekawan 2018</div>
      		</div>
    	</div>
	</div>
	
	<div id="konfirm" class="modal fade" role="form">
		<div class="modal-dialog">
	        <div class="modal-content konten-hapus">
	            <div class="modal-body">
	            	<h5>Konfirmasi Hapus Data</h5>
	            	<text class="text-muted teks"></text>
	            	<div class="mt-4" align="right">
		            	<button class="btn btn-primary btn-sm" type="button" onClick="reset();" data-dismiss="modal">
		                	<i class="fa fa-fw fa-remove"></i>  Batal
		            	</button>
		                <button class="btn btn-danger btn-sm iya" type="button">
		                	<i class="fa fa-fw fa-check"></i>  Ya
		            	</button>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>

	<?php include 'assets-js.php'; ?>
	<?php include 'notif.php'; ?>
</body>
</html>

<script type="text/javascript">
$(document).on("click",'.hapus',function()
{
	var id = $(this).data('id');
	var nama = $(this).data('nama');

	$(".teks").text("Anda yakin menghapus data dengan nama "+nama+" ?");
	$(document).on("click",'.iya',function()
	{
		window.location="<?php echo base_url().'index.php/hapus/id/'?>"+id;
	});
});
</script>