<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller
{
	var $API = "";
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/server-crud/index.php";
	}

	function index()
	{
		$data['pengguna'] = json_decode($this->curl->simple_get($this->API.'/api'));
		$this->load->view('index',$data);
	}
}
?>
