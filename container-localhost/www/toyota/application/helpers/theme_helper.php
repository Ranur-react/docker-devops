<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('theme')) {
	function theme()
	{
		$link = base_url() . 'assets/';
		return $link;
	}
}

if (!function_exists('cek_user')) {
	function cek_user()
	{
		$CI = &get_instance();
		if ($CI->session->userdata('status_login') != true) {
			redirect('logout');
		}
	}
}

if (!function_exists('title')) {
	function title()
	{
		return $value = "PAGARUYUANG";
	}
}

if (!function_exists('iduser')) {
	function iduser()
	{
		$ci = &get_instance();
		return $ci->session->userdata('kode');
	}
}
if (!function_exists('rupiah')) {
	function rupiah($angka)
	{
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	}
}

if (!function_exists('user')) {
	function user()
	{
		$ci = &get_instance();
		$kode = $ci->session->userdata('kode');
		$data = $ci->db->where('id_user', $kode)->get('user')->row();
		if ($data->level_user == 1) {
			$user = 'Administrator';
		} else if ($data->level_user == 2) {
			$user = 'Kasir';
		} else if ($data->level_user == 3) {
			$user = 'Pimpinan';
		}
		return $user;
	}
}

if (!function_exists('nisn')) {
	function nisn()
	{
		return '';
	}
}

if (!function_exists('role')) {
	function role()
	{
		$ci = &get_instance();
		$kode = $ci->session->userdata('kode');
		$data = $ci->db->where('id_user', $kode)->get('user')->row();
		if ($data->level_user == 1) {
			$role = 'Admin';
		} else if ($data->level_user == 2) {
			$role = 'Kasir';
		} else if ($data->level_user == 3) {
			$role = 'Pimpinan';
		}
		return $role;
	}
}

if (!function_exists('level')) {
	function level()
	{
		$ci = &get_instance();
		$kode = $ci->session->userdata('kode');
		$data = $ci->db->where('id_user', $kode)->get('user')->row();
		return $data->level_user;
	}
}

if (!function_exists('foto')) {
	function foto()
	{
		return $value = base_url() . 'assets/dist/img/profile.png';
	}
}

if (!function_exists('bergabung')) {
	function bergabung()
	{
		return $value = '';
	}
}
