<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	var $API = "";
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/server-crudigniter/index.php";
	}

	function index()
	{
		$this->load->view('tambah');
	}

	function aksi()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$sandi = $this->input->post('sandi');
		$this->form_validation->set_rules('nama','Nama','required|min_length[2]|max_length[40]',
							 	array('required' => 'Nama wajib diisi.',
									  'min_length' => 'Karakter nama minimal 2.',
									  'max_length' => 'Karakter nama maksimal 40.'));
		$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[10]',
							 	array('required' => 'Username wajib diisi.',
									  'min_length' => 'Karakter username minimal 5.',
									  'max_length' => 'Karakter username maksimal 10.'));
		$this->form_validation->set_rules('sandi','Sandi','required|min_length[5]|max_length[10]',
							 	array('required' => 'Sandi wajib diisi.',
									  'min_length' => 'Karakter sandi minimal 5.',
									  'max_length' => 'Karakter sandi maksimal 10.'));
		$data_form = array('nama' => $nama,'username' => $username, 'sandi' => $sandi); 
		
		if($this->form_validation->run() == false)
		{
			$this->form_validation->set_error_delimiters('<span class="small text-danger">', '</span>');
			$this->form_validation->set_data($data_form);
			$this->load->view('tambah');
		}
		else
		{
			$data = array('nama' => $nama,
						  'username' => $username,
						  'sandi' => $sandi);
			$tambah = $this->curl->simple_post($this->API.'/api',$data,array(CURLOPT_BUFFERSIZE => 10));
			if($tambah)
			{
				$notif = array('id' => 'berhasil',
							   'pesan' => 'Berhasil Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			redirect();
		}
	}
}
?>
