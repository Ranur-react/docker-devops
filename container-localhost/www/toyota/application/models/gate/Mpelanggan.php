<?php
class Mpelanggan extends CI_Model
{
	public function getall()
	{
		return $this->db->query("SELECT * FROM tb_pelanggan")->result_array();
	}
}
