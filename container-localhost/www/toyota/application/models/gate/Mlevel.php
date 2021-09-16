<?php
class Mlevel extends CI_Model
{
	public function getall()
	{
		return $this->db->query("SELECT * FROM tb_level_tiket")->result_array();
	}
}
