<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ubah extends CI_Controller
{
	var $API = "";
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/server-crud/index.php";
	}

	function id($id)
	{
		$id = array('id' => $this->uri->segment(3));
		$data['pengguna'] = json_decode($this->curl->simple_get($this->API.'/api',$id));
		$this->load->view('ubah',$data);
	}

	function aksi()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$sandi = $this->input->post('sandi');
		
		if(!$id)
		{
			$validasi = array('id' => 'id',
							  'pesan' => 'ID tidak terdaftar.');
			$this->session->set_flashdata($validasi);
			redirect(base_url("index.php/ubah/id/".$id));
		}
		elseif(!$nama)
		{
			$validasi = array('id' => 'nama',
							  'pesan' => 'Nama Lengkap harus diisi.');
			$this->session->set_flashdata($validasi);
			redirect(base_url("index.php/ubah/id/".$id));
		}
		elseif(!$username)
		{
			$validasi = array('nama' => $nama,
							  'id' => 'username',
							  'pesan' => 'Username harus diisi.');
			$this->session->set_flashdata($validasi);
			redirect(base_url("index.php/ubah/id/".$id));
		}
		elseif(!$sandi)
		{
			$validasi = array('nama' => $nama,
							  'username' => $username,
							  'id' => 'sandi',
							  'pesan' => 'Sandi harus diisi.');
			$this->session->set_flashdata($validasi);
			redirect(base_url("index.php/ubah/id/".$id));
		}
		else
		{
			$data = array('id' => $id,
						  'nama' => $nama,
						  'username' => $username,
						  'sandi' => $sandi);
			$ubah = $this->curl->simple_put($this->API.'/api',$data,array(CURLOPT_BUFFERSIZE => 10));
			if($ubah)
			{
				$notif = array('id' => 'berhasil',
							   'pesan' => 'Berhasil Mengubah Data.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Mengubah Data.');
				$this->session->set_flashdata($notif);
			}
			redirect();
		}
	}
}
?>