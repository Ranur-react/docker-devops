<?php 



function Write($connfig,$command)
{
	$msg=chr(0xA6).$command.chr(0xA9) ;
	socket_write($connfig['socket'], $msg,strlen($msg));
	// $reply=socket_read($connfig['socket'], 1024);
	// $reply=trim($reply);

	// return $reply;
	# code...
}



 ?>