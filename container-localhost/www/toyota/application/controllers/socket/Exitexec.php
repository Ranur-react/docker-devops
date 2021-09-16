<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exitexec extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status_login') == true)
			cek_user();
		else
			redirect('logout');
	}
	public function index()
	{
		 // $d['data']="bisa";
		// echo json_encode($d) ;
			redirect('http://localhost/EXITMobil/');
	}
	
}
