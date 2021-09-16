<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status_login') == true)
			cek_user();
		else
			redirect('logout');
		$this->load->model('gate/Mlevel');
		$this->load->model('gate/Mpayment');
		$this->load->model('gate/Mpelanggan');
	}
	public function index()
	{
		$data = [
			'title' => 'Tiket',
			'page'  => 'Tiket',
			'small' => 'Order Tiket ',
			'urls'  => '<li class="active">Jurusan</li>',
			'level'  => $this->Mlevel->getall(),
			'payment'  => $this->Mpayment->getall(),
			'pelanggan'  => $this->Mpelanggan->getall(),
		];
		$this->template->display('gate/tiket/index', $data);
	}
	
}
