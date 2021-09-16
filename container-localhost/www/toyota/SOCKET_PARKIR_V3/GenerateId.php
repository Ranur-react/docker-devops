<?php 
 function GenerateID_Entry($v)
{
	date_default_timezone_set("Asia/Jakarta");
	$date=date_create();
	$dateGet=date_format($date,"ymd");
	$dateGetY=date_format($date,"Y");
	$dateGetM=date_format($date,"m");
	$dateGetD=date_format($date,"d");
	$TimeGet=date_format($date,"H:i:s");
	return "9".rand(01, 88)."9".$dateGet."9".date_format($date,"H").date_format($date,"i");
}
//echo GenerateID_Entry("")

 ?>