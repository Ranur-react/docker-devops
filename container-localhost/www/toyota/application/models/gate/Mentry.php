	<?php
class Mentry extends CI_Model
{
	public function getall()
	{
		return $this->db->query("SELECT*FROM `tb_entry` JOIN `tb_daftar_gate` ON `tb_daftar_gate`.id=`tb_entry`.`gate_id`;")->result_array();
	}
	public function check_karcis($kode)
	{
		# code...
		return $this->db->query("SELECT*FROM `tb_entry` JOIN `tb_daftar_gate` ON `tb_daftar_gate`.id=`tb_entry`.`gate_id` WHERE id_entry='$kode';");
	}
}
?>