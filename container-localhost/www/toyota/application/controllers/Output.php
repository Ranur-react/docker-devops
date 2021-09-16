<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Output extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mauth');
	}
	public function index()
	{
		echo "Output";
	}
	public function getAPI()
	{

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://reqres.in/api/users?page=2",
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$data = json_decode($response);
		$err = curl_error($curl);
?>
		<br>
		----------------------

		<?php 
		var_dump($response);
		
		?>
		<br>
<?php

	}
}
