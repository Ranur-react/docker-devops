<?php 
	
	//Koneksi ke DBMS
	$severname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_banknagari";

	$conn = new mysqli($severname, $username, $password, $dbname);
	if(!$conn){
		die("koneksi Database gagal" . mysqli_connect_error());
	}

$qry = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_config` WHERE `tb_config`.key='02' AND  OPTIONS='board' ;"));
$idcek = mysqli_fetch_array(mysqli_query($conn,"SELECT*FROM `tb_config` WHERE OPTIONS='idparkir';"));
//idparkir-tobankir
$connfig['idparkir']=$idcek['value'];
	//Koneksi Hardware
	$connfig['host']=$qry['value'];
	$connfig['port']=5002;
	$connfig['socket']=socket_create(AF_INET, SOCK_STREAM, 0);
	socket_connect($connfig['socket'], $connfig['host'],$connfig['port']);

	//Koneksi Kamera
	$CameraConfig['ip']='192.168.137.61';
	$CameraConfig['username']='admin';
	$CameraConfig['password']='Hikvision!!';
	$CameraConfig['folder']='capturex';
 ?>