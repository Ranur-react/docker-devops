<?php 
 function Read($connfig)
{
 	$reply=socket_read($connfig['socket'], 1024);
 	set_error_handler('error_found');
		$reply=trim($reply);
		return $reply;  
}


 ?>