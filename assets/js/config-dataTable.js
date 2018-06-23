$(document).ready(function()
{
	$('#dataTable').dataTable(
	{
		responsive : true,
		"oLanguage":
		{
			"sLengthMenu": "Tampilkan _MENU_ data",
			"sSearch": "Pencarian :",
			"sZeroRecords": "Tidak ada data yang ditemukan",
			"sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			"sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
			"oPaginate":
			{
				"sFirst": "<i class='fa fa-angle-double-left'></i>",
				"sLast": "<i class='fa fa-angle-double-right'></i>",
				"sPrevious": "<i class='fa fa-angle-left'></i>",
				"sNext": "<i class='fa fa-angle-right'></i>"
			}
		},
		"sPaginationType":"full_numbers"
	});
});