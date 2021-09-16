	<?php
class Mconfig extends CI_Model
{
	public function check_urlStreaming($kode)
	{
		return $this->db->query("SELECT*FROM `tb_config` WHERE `options`='cctv_out' AND `tb_config`.key='$kode';")->row_array();
	}
	public function IP_Server_Gateway_API_BN($kode)
	{
		return $this->db->query("SELECT*FROM `tb_config` WHERE `options`='tablet' AND `tb_config`.key='$kode';")->row_array();
	}
	public function Apikey()
	{
		return $this->db->query("SELECT*FROM `tb_config` WHERE `options`='apikey' ")->row_array();
	}

}
?>