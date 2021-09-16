<?php 
// Wating Sensor Loop Detector I
include 'koneksi.php';

include 'erorHandler.php';
include 'Read.php';
include 'Write.php';

include 'GenerateId.php';
include 'CaptureImages.php';
include 'PritBarcode.php';


Write($connfig,'MT00004');
//1. Kendaraan Terdeteksi oleh LD1 Sensor (php READ ='IN3ON')
while(true){
	$data= Read($connfig);
	if($data == $msg=chr(0xA6)."IN3ON".chr(0xA9)){
		// 2. Jika Ada Kendaraan "Voice Welcome" Track 001 diputar (php WRITE ='MT00001')
		Write($connfig,'MT00001');
		// 3. Driver MENEKAN  Tombol "MERAH" (php READ ='IN2ON')
		$i=true;
		while ($i) {
			echo $tombol= Read($connfig);
			if($tombol == $msg=chr(0xA6)."IN2ON".chr(0xA9)){
				// 	 Alaram DARURAT Berbunyi

				Write($connfig,'MT00099');
			        mysqli_query($conn, "INSERT INTO `tb_log` (`id`, `log`, `jenis_log`, `gate_id`,`date`) VALUES (NULL, 'Seseorang menekan Tombol Darurat', 'failure_parkir', '01',now());");

			}
			// 3. Driver MENEKAN  Tombol "HIJAU" (php READ ='IN1ON')
			if($tombol == $msg=chr(0xA6)."IN1ON".chr(0xA9)){

				// 4. Generate ID Parkir
			
				$id= GenerateID_Entry($connfig['idparkir']);

				$CameraConfig['folder']=$id;
				// 5. KAMERA Melakukan Capture Hasil Capture Insert ke Folder dengan folder name 'ID' (php Capture_Vehcle())
				// CaptureImages($CameraConfig,$id);
				// 6. ID & date log insert to DB 
				mysqli_query($conn, "INSERT INTO `tb_entry` (`id_entry`, `gate_id`,date) VALUES ('$id', '01',now());");
				// 7. PHP mengirim Perintah Print Barcode (php PrintBarcode('Serial-Entry'))
				// 5. KAMERA Melakukan Capture Hasil Capture Insert ke Folder dengan folder name 'ID' (php Capture_Vehcle())
				
				PrintBarcode($id,$connfig);
				CaptureImages($CameraConfig,$id);
				// 8. Setelah Driver Mengambil Kertas Barcode, Controller Membuka Gate (php Write ='OUT1ON')
				Write($connfig,'OUT1ON');
				Write($connfig,'MT00002');
			}	
			if($tombol == $msg=chr(0xA6)."IN3OFF".chr(0xA9)){
						echo "Gerbang Tertutup";
						Write($connfig,'MT00022');
						Write($connfig,'OUT1OFF');
				$i=false;
			}

		}

	}	

	
}


 ?>