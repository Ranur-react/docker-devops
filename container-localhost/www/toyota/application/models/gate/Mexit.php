	<?php
class Mexit extends CI_Model
{
	public function getall()
	{
		return $this->db->query("SELECT*FROM `tb_exit`
 JOIN `tb_entry` ON `tb_entry`.id_entry=`tb_exit`.`id_Entry`
 JOIN `tb_daftar_gate` ON `tb_daftar_gate`.id=`tb_entry`.`gate_id`")->result_array();
	}
	public function store($database)
	{
		$noplat=$database->noplat;
		$notiket=$database->idkarcis;
		$jenis=$database->jenis;
		$harga=$database->harga;
		$pembayaran=$database->pembayaran;
		$keterangan=$database->keterangan;
		$this->db->query("INSERT INTO `tb_exit`  VALUES ('$noplat', '$notiket',NOW(),'$jenis','$harga','$pembayaran','$keterangan','');");
		
	}
		public function checkTiket($database)
	{
		$notiket=$database->idkarcis;
		return $this->db->query("SELECT*FROM `tb_exit` WHERE id_entry='$notiket';");
		
	}

}
?>