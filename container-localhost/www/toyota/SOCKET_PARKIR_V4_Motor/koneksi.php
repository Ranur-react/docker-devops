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


	//Koneksi Hardware
	$connfig['host']='192.168.1.104';
	$connfig['port']=5000;
	$connfig['socket']=socket_create(AF_INET, SOCK_STREAM, 0);
	socket_connect($connfig['socket'], $connfig['host'],$connfig['port']);

	//Koneksi Kamera
	$CameraConfig['ip']='192.168.1.64';
	$CameraConfig['username']='admin';
	$CameraConfig['password']='Hikvision!!';
	$CameraConfig['folder']='capture';
 ?>