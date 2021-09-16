<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrintESC extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    $this->load->model('gate/Mentry');

    }
     public function index()
    {

        $database = json_decode($this->input->post('jsonData'));
        $noplat=$database->noplat;
        $notiket=$database->idkarcis;
        $jenis=$database->namaJenis;
        $harga=$database->harga;
        $pembayaran=strtoupper($database->pembayaran);
        $keterangan=$database->keterangan;
        $check = $this->Mentry->check_karcis($notiket);
        $checkdata=$check->row_array();
        $masuk=date("d M Y H:i",strtotime($checkdata['date'])) ;
        // $masuk=$checkdata['date'] ;
        // $masuk=date("d M Y H:i",'2021-01-01 00:20:23') ;
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
            date_default_timezone_set("Asia/Jakarta");
    $date=date_create();
    $dateGet=date_format($date,"d M Y");
    $TimeGet=date_format($date,"H:i");
        $designStruk='
 
      *              *               *       
      ***          *****           ***       
      *******    *********      ******       
      *********************************      
          ISTANO BASA PAGARUYUANG            
      DISPARPORA KABUPATEN TANAH DATAR       
  --------------------------------------------
          ~ STRUK PEMBAYARAN PARKIR ~         
  --------------------------------------------
  Jenis Kend. : '.$jenis.'

   No. Trx     : '.$notiket.'
   Masuk       : '.$masuk.'
   Keluar      : '.$dateGet.' '.$TimeGet.'
   Nopol       : '.$noplat.'
   Keterangan  : '.$keterangan.'
   

 ';

 $designStruk2=' 
 ____________________________________________
       *** Terimakasih, Selamat jalan *** 
    Kami nantikan kunjungan anda berikutnya
                     
    ';

        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("BPTMU-B250");
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);

        $printer->initialize();
        $printer->setPrintLeftMargin(10);


        $printer->text($designStruk); $printer->text("\n");
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
        $printer->text("Rp. ".$harga."\n");
        $printer->initialize(); $printer->setPrintLeftMargin(10);
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text('('.$pembayaran.')'); $printer->text("\n");
        $printer->text($designStruk2); $printer->text("\n");
 
 
        /* ---------------------------------------------------------
         * Menyelesaikan printer
         */
        $printer->feed(3); // mencetak 2 baris kosong, agar kertas terangkat ke atas
        $printer->cut();
        $printer->close();
        $state['state']=true;
        echo json_encode($state);
    }
    public function test()
    {
       
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("BPTMU-B250");
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);
 
 
        /* ---------------------------------------------------------
         * Teks biasa | text()
         */
        $printer->initialize();
        $printer->text("Ini teks biasa \n");
        $printer->text("\n");
 
        /* ---------------------------------------------------------
         * Select print mode | selectPrintMode()
         */
        // Printer::MODE_FONT_A
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_FONT_A);
        $printer->text("teks dengan MODE_FONT_A \n");
        $printer->text("\n");
 
        // Printer::MODE_FONT_B
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_FONT_B);
        $printer->text("teks dengan MODE_FONT_B \n");
        $printer->text("\n");
 
        // Printer::MODE_EMPHASIZED
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_EMPHASIZED);
        $printer->text("teks dengan MODE_EMPHASIZED \n");
        $printer->text("\n");
 
        // Printer::MODE_DOUBLE_HEIGHT
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT);
        $printer->text("teks dengan MODE_DOUBLE_HEIGHT \n");
        $printer->text("\n");
 
        // Printer::MODE_DOUBLE_WIDTH
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_WIDTH);
        $printer->text("teks dengan MODE_DOUBLE_WIDTH \n");
        $printer->text("\n");
 
        // Printer::MODE_UNDERLINE
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_UNDERLINE);
        $printer->text("teks dengan MODE_UNDERLINE \n");
        $printer->text("\n");
 
 
        /* ---------------------------------------------------------
         * Teks dengan garis bawah  | setUnderline()
         */
        $printer->initialize();
        $printer->setUnderline(Escpos\Printer::UNDERLINE_DOUBLE);
        $printer->text("Ini teks dengan garis bawah \n");
        $printer->text("\n");
 
        /* ---------------------------------------------------------
         * Rata kiri, tengah, dan kanan (JUSTIFICATION) | setJustification()
         */
        // Teks rata kiri JUSTIFY_LEFT
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
        $printer->text("Ini teks rata kiri \n");
        $printer->text("\n");
 
        // Teks rata tengah JUSTIFY_CENTER
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Ini teks rata tengah \n");
        $printer->text("\n");
 
        // Teks rata kanan JUSTIFY_RIGHT
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_RIGHT);
        $printer->text("Ini teks rata kanan \n");
        $printer->text("\n");
 
 
        /* ---------------------------------------------------------
         * Font A, B dan C | setFont()
         */
        // Teks dengan font A
        $printer->initialize();
        $printer->setFont(Escpos\Printer::FONT_A);
        $printer->text("Ini teks dengan font A \n");
        $printer->text("\n");
 
        // Teks dengan font B
        $printer->initialize();
        $printer->setFont(Escpos\Printer::FONT_B);
        $printer->text("Ini teks dengan font B \n");
        $printer->text("\n");
 
        // Teks dengan font C
        $printer->initialize();
        $printer->setFont(Escpos\Printer::FONT_C);
        $printer->text("Ini teks dengan font C \n");
        $printer->text("\n");
 
        /* ---------------------------------------------------------
         * Jarak perbaris 40 (linespace) | setLineSpacing()
         */
        $printer->initialize();
        $printer->setLineSpacing(40);
        $printer->text("Ini paragraf dengan \nline spacing sebesar 40 \ndi printer dotmatrix \n");
        $printer->text("\n");
 
        /* ---------------------------------------------------------
         * Jarak dari kiri (Margin Left) | setPrintLeftMargin()
         */
        $printer->initialize();
        $printer->setPrintLeftMargin(10);
        $printer->text("Ini teks berjarak 10 dari kiri (Margin left) \n");
        $printer->text("\n");
 
        /* ---------------------------------------------------------
         * membalik warna teks (background menjadi hitam) | setReverseColors()
         */
        $printer->initialize();
        $printer->setReverseColors(TRUE);
        $printer->text("Warna Teks ini terbalik \n");
        $printer->text("\n");
 
 
        /* ---------------------------------------------------------
         * Menyelesaikan printer
         */
        $printer->feed(4); // mencetak 2 baris kosong, agar kertas terangkat ke atas
        $printer->close();
    }
    

}
