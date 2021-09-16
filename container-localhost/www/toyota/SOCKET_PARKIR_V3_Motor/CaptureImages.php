<?php 
function CaptureImages($CameraConfig,$id)
{
	

	$login = $CameraConfig['username'];
	$password = $CameraConfig['password'];
	$ip='192.168.137.61';
	$url = 'http://'.$ip.'/ISAPI/Streaming/channels/101/picture';
	$target_dir='Capture/'.$id;

	if (!file_exists($target_dir)) {
	    mkdir($target_dir,777,true);
	}


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
	$result = curl_exec($ch);
	curl_close($ch);
	$im = imagecreatefromstring($result);
	$now = date('His');
	$newfile = $target_dir."/sc-1.jpg";
	file_put_contents($newfile, $result);



} 
 ?>