<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('Read_PCI')) {
	function Read_PCI($var)
	{
		 	$reply=socket_read($connfig['socket'], 1024);
		 	set_error_handler('error_found');
			$reply=trim($reply);
		return $reply;  
	}
}
