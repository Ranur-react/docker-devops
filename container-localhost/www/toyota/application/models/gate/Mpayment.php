<?php
class Mpayment extends CI_Model
{
	public function getall()
	{
		return $this->db->query("SELECT * FROM tb_paymentmetode")->result_array();
	}
}
