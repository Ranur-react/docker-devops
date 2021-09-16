<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EntryMotor extends CI_Controller
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
		redirect(base_url().'/SOCKET_PARKIR_V3_Motor/index.php');
	}
	
}
