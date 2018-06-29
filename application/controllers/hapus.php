<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	var $API = "";
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/server-crudigniter/index.php";
	}

	function id($id)
	{
		if(empty($id))
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih ID yg Akan Dihapus.');
			$this->session->set_flashdata($notif);
			redirect();
		}
		else
		{
			$hapus = $this->curl->simple_delete($this->API.'/api',array('id' => $id),array(CURLOPT_BUFFERSIZE => 10));
			if($hapus)
			{
				$notif = array('id' => 'berhasil',
							   'pesan' => 'Berhasil Menghapus Data.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Menghapus Data.');
				$this->session->set_flashdata($notif);
			}
			redirect();
		}
	}
}
?>
