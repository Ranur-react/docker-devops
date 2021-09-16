<?php 
function PrintBarcode($SerialEntry,$connfig)
{
	date_default_timezone_set("Asia/Jakarta");
	$date=date_create();
	$dateGet=date_format($date,"d M Y");
	$TimeGet=date_format($date,"H:i");
	Write($connfig,'PR5
 ____________________________________________
|                                            |
|  PARKIR "MOTOR" ISTANO PAGARUYUANG         |
|____________________________________________|
 Parkir Tanggal : '.$dateGet.' Pukul:'.$TimeGet.' WIB
PR0@hPwfHkI{A'.$SerialEntry.'
 
   *** Harap Tiket ini Tidak Dihilangkan **** 
VB
	');
}
 ?>