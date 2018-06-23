<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $this->session->flashdata('id');
$isi = $this->session->flashdata('pesan');

if($id === 'id')
{
	?>
	<script>
	$('#nama').text('<?php echo $isi ?>');
	</script>
	<?php
}
elseif($id === 'nama')
{
	?>
	<script>
	$('#nama').text('<?php echo $isi ?>');
	</script>
	<?php
}
elseif($id === 'username')
{
	?>
	<script>
	$('#username').text('<?php echo $isi ?>');
	$('input[name="nama"]').val('<?php echo $this->session->flashdata('nama')?>');
	</script>
	<?php
}
elseif($id === 'sandi')
{
	?>
	<script>
	$('#sandi').text('<?php echo $isi ?>');
	$('input[name="nama"]').val('<?php echo $this->session->flashdata('nama')?>');
	$('input[name="username"]').val('<?php echo $this->session->flashdata('username')?>');
	</script>
	<?php
}
?>