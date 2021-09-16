
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mauth');
	}
	public function index()
	{
		$strurl = $this->Mconfig->Apikey();
		$data = [
			'title' => 'Parkir',
			'page'  => 'parkir',
			'small' => 'Kasir Parkir',
			'urls'  => '<li class="active">Jurusan</li>',
			'entry'  => $this->Mentry->getall(),
			'exit'  => $this->Mexit->getall(),
			'signatureKey'  => $strurl['value'],
		];
		$this->template->display('gate/parkir/index', $data);
	}

}
