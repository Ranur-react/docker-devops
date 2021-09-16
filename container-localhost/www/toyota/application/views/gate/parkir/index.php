<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.min.js"></script>
<script>
 
</script>
<script type="text/javascript">
// Global Variabel
		var database={};
        		database['idkarcis']=null;
        		database['noplat']=null;
        		database['jenis']=null;
        		database['jenisid']=null;
        		database['harga']=null;
        		database['keterangan']=null;
        		database['Timestamp']=null;
				database['pembayaran']=null;



	$( document ).ready(function() {
		$( '#modal-notifikasi-berhasil' )
   .on( function(e) {
       console.log(e);
   })
		  $('body').on('keypress', function (e) {
			    console.log('I have been pressed', e);
			    if ( e.shiftKey && ( e.which === 81 ) ) {
				  console.log( "You pressed shiftKey + Q" );
				  LoadingQRIS()
				}
			    if ( e.shiftKey && ( e.which === 84 ) ) {
				  console.log( "You pressed shiftKey + T" );
				  tunai()
				}
			})
$('#input-karcis').on('keypress',function(e) {
    if(e.which == 13) {
        //Diall()
    }
});
$('#input-plat').on('keypress',function(e) {
    if(e.which == 13) {
        $('#keterangan').focus();
    }
});
	});

		function Diall() { 
		
			var uriA=`http://admin:Hikvision!!@192.168.1.61/ISAPI/Streaming/channels/101/picture`;	
			var urlB='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png';
			console.log(uriA);
			$(".StreamIMG").attr("src",urlB);
			$(".StreamA").attr("src",urlB);
			$(".StreamA").attr("src",uriA);
			$(".StreamIMG").attr("src",uriA);
			input_karcis();

		}
		function viewCaptureLoad(kode,urlstream,folderImages,date) {
			return `               
                  <td>
                		<a class="StreamA" target="blank" href="<?php echo base_url()?>`+folderImages+`/capture/`+kode+`/sc-1.jpg">
	                  		<img class="StreamIMG" style="  max-width: 50%;  max-height: auto;border-radius: 20px" src="<?php echo base_url()?>`+folderImages+`/capture/`+kode+`/sc-1.jpg">
                  		</a>
                  </td>
                  <td>
                  	<div  class="imagesStream">
                		<a class="StreamA" target="blank" href="http://admin:Hikvision!!@`+urlstream+`/ISAPI/Streaming/channels/101/picture">
	                  		<img class="StreamIMG" style="  max-width: 50%;  max-height: auto;border-radius: 20px" src="http://admin:Hikvision!!@`+urlstream+`/ISAPI/Streaming/channels/101/picture">
                  		</a>
                  	</div>
	              </td>
                  <td>
                  	`+date+`
                  </td>`;
		}
		var jenisKendaraan={};
		var namajenis={};
function tampil_harga() {
	var t=$('#jenis').val();
	database['jenis']=$('#jenis').val();
	database['harga']=jenisKendaraan[t];
	database['namaJenis']=namajenis[t];
	
	console.log("Val:"+t);
	console.log("Data Jenis Kendaraan:"+jenisKendaraan[t]);
	$('#harga').text(convertToRupiah(jenisKendaraan[t]));
	$('.totalharga').text(convertToRupiah(jenisKendaraan[t]));
}
    function input_karcis() {
    	var data="&kode="+$('#input-karcis').val();
    $.ajax({
        url: '<?= site_url('cekkarcis')  ?>',
        type: "post",
        data:data,
        dataType: "json",
        cache: false,
        beforeSend: function(response) {
			// console.log(response);
        },
        success: function(response) {
        	$('.dynamicCaptureiew').html("");
        	// console.log("Cari Status");
        	console.log(response);
			$('.jenis').empty();

        	if (response.status==true) {
				var roda="";
				$.map( response.roda, function( val, i ) {
					jenisKendaraan[val.id_level]=val.harga;
					namajenis[val.id_level]=val.nama;
					console.log("Jenis Gate ----------------");
					database['jenisid']=val.id_gate;
					console.log(database['jenisid'])
					console.log('--------- dari data -------')
				 	console.log(val)
					var newOption = new Option(val.nama, val.id_level, false, false);
					$('.jenis').append(newOption)
				});
						// console.log("Roda: "+roda)
				$('.dynamicCaptureiew').html(viewCaptureLoad(response.kode,response.urlStream,response.folderImages,response.data.date));
				$('#input-plat').focus();
        		console.log("Kondisi True ----")
        		database['idkarcis']=$('#input-karcis').val();
        		database['Timestamp']="<?= date('Y-m-d') ?>";
        		tampil_harga();
        	}else{
				$('#input-karcis').focus();
        		console.log("Data Empety")
        		database['idkarcis']=null;
        		database['noplat']=null;
        		database['jenis']=null;
        		database['harga']=null;
        		database['keterangan']=null;
        		database['Timestamp']=null;


        	}
        },
        complete: function() {
				// $('#input-plat').focus();
	        	// alert("Complete")
        }
    });

    }

function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
function noplatInput() {
	database['noplat']=$('#input-plat').val();
	console.log("No Plat:")
	console.log(database.noplat)
}
function inputketerangan() {
	database['keterangan']=$('#keterangan').val();
}

function LoadingQRIS(argument) {
		$.ajax({
			type: "post",
			url: "<?= site_url('qrisloading') ?>",
			data: {myData: JSON.stringify(database)},
			cache: false,
			success: function(response) {
				$('#LoadingQris').html(response);
				$('#modal-Qris-waiting').modal('show');
				qris_api();
			}
		});
}
function qris_api() {
	var NOTRANS=database.idkarcis;
	var BIAYA=database.harga;
	var Timestamp=database.Timestamp;
	var body="{NOTRANS:"+NOTRANS+",BIAYA:"+BIAYA+"}";
	var key='<?= $signatureKey ?>'
	var hash = CryptoJS.HmacSHA256(body+":"+Timestamp, key);
	var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);;
		database['signature']=hashInBase64;
		$.ajax({
			type: "post",
			url: "<?= site_url('qrisapi') ?>",
			data: {jsonData: JSON.stringify(database)},
	        dataType: "json",
	        cache: false,
	        beforeSend: function(response) {
                        $('.LoadIcon').html('<i class="fa fa-spin fa-spinner text-yellow"></i> Tunggu 60 detik');

	        },
			success: function(response) {
				if (response.state) {
					if (response.messages.rc=='00' || response.messages.rc=='88') {
                        $('.LoadIcon').html('<i class="fa fa-check-circle text-green"></i> Pembayaran Berhasil selesai');
                        nontunai()
					}else{
                        $('.LoadIcon').html('<i class="fa fa-spin fa-spinner text-yellow"></i> Waktu Tunggu Pembayaran Habis, Mencoba Meninjau Ulang Pembayaran (code: '+response.messages.rc+' messages: '+response.messages.message+')');
                        qris_api_getstatus();
					}
				}else{
                        qris_api_getstatus();
				}
                        

			},
			complete:function(response) {
			}
		});
	}
	function qris_api_getstatus() {
	var NOTRANS=database.idkarcis;
	var BIAYA=database.harga;
	var Timestamp=database.Timestamp;
	var body="{NOTRANS:"+NOTRANS+",BIAYA:"+BIAYA+"}";
	var key='<?= $signatureKey ?>'
	var hash = CryptoJS.HmacSHA256(body+":"+Timestamp, key);
	var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);;
		database['signature']=hashInBase64;
		$.ajax({
			type: "post",
			url: "<?= site_url('qrisapiGetstatus') ?>",
			data: {jsonData: JSON.stringify(database)},
			cache: false,
	        dataType: "json",
	        beforeSend: function(response) {
	        },
			success: function(response) {
				// console.log("Array:");
				// console.log(response.status);
				if (!response.status=="true") {
					$('.LoadIcon').html('<i class="fa fa-plug text-yellow"></i>Eror Get Status (Messages: '+response.messages+')');
				}else{
						if (response.messages.rc=='00' || response.messages.rc=='88') {
	                        $('.LoadIcon').html('<i class="fa fa-check-circle text-red"></i> Pembayaran Berhasil selesai');
	                        nontunai()
						}else{
	                        $('.LoadIcon').html('<i class="fa fa-close  text-red"></i> Pembayaran BATAL Dilakukan!! (code: '+response.messages.rc+' messages: '+response.messages.message+')');
						}
					}
				}
			});
	}
	function tunai() {
		database['pembayaran']='tunai';
		bayarEsekusi();
	}
	function nontunai() {
		database['pembayaran']='qris';
		bayarEsekusi()
	}
function bayarEsekusi() {
		$.ajax({
			type: "post",
			url: "<?= site_url('bayar') ?>",
			data: {jsonData: JSON.stringify(database)},
	        dataType: "json",
	        cache: false,
	        beforeSend: function(response) {
                      console.log(response)
	        },
			success: function(response) {
				console.log(response)
				if (response.status) {
					if (database['jenis']=='roda2') {
						//Buka Gate Motor
					// window.location = "<?= base_url() ?>SOCKET_PARKIR_V4_Motor/index.php";
					  /// wait 3 seconds
				    setTimeout(function() {
					OpenMotor();
				    }, 100);
					}else{
						//Buka Gate Mobil
					// window.location = "<?= base_url() ?>SOCKET_PARKIR_V4_Mobil/index.php";
					setTimeout(function() {
					OpenMobil()
				    }, 100);
					}
					// setTimeout(function() {
					// location.reload(); 

				 //    }, 4000);
				}else{
				$('#modal-notifikasi').modal('show');
				$('.notif-title').html(response.title);
				$('.notif-Teks').html(response.pesan);

				}
			}
		});
}
function OpenMobil() {
	               request= $.ajax({
                    url: '<?= site_url('Exit') ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                    $('#modal-notifikasi-berhasil').modal('show');
								$('.notif-title').html("Terimakasih");
								$('.notif-Teks').html("Biaya Parkir Berhasil di Proses");
					// location.reload();
								printStruk();
						// location.reload();		

                    }
                });
}
function OpenMotor() {
	               request= $.ajax({
                    url: '<?= site_url('ExitMotor') ?>',
                    type: "post",
                    cache: false,
                    success: function(response) {
                    $('#modal-notifikasi-berhasil').modal('show');
								$('.notif-title').html("Terimakasih");
								$('.notif-Teks').html("Biaya Parkir Berhasil di Proses");	
								printStruk();
						// location.reload();		

                    }
                });
}
function printStruk() {
	              $.ajax({
                    url: '<?= site_url('Print') ?>',
                    data: {jsonData: JSON.stringify(database)},
                    type: "post",
			        dataType: "json",
                    cache: false,
                    success: function(response) {
                    },
                    complete:function(response) {
						location.reload();	
						console.log("Cetak Struk Selesai..YY...");	
			}
                });
}
	 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2() ;
})
</script>
<style type="text/css">
	.form-control{
		border-radius: 20px;
		text-align: center;
	}
	.mini-Info{
		font-size: 10px;
		letter-spacing: 1px;
		color: grey;
	}.medium-Info{
		font-size: 14px;
		letter-spacing: 1px;
		color: red;
	}
	.btn{
		border-radius: 10px;
	}

	.btn-sumbit{
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		/*padding-bottom: 5px;*/
		/*padding-top: 5px;*/
	}
	.btn-icon{
		/*background-color: yellowx	;*/
		width: 40%;
		height: 100%;
		display: flex;
		flex-direction: row;
		margin-left: 10px;
		padding-top: -10px;
	}
	.btn-lable{
		/*background-color: grey;*/
		width: 40%;
		height: 100%;
		text-align: right;

	}
		.tombolIcon{
			margin-left: 20px;
			width: auto;height: 100%;
			margin-right: 10%;
	}
	.bayar-btn{
		padding-left: 20px;
	}    
	.box-bayar{
        display: flex;
        flex-direction: column;
    }
    .logoBayar{
        widows: 50%;
        height: auto;
    }
</style>

<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-credit-card"></i> Bayar Parkir</h3>
				<?= $this->session->flashdata('pesan'); ?>
            </div>
            <div class="box-body">
			    <div class="row">
			    	<div class="col-md-12">
					    <div class="row">
					    	<!-- <div class="col-md-1"></div> -->
					    	<div class="col-md-3">
						        <div class="form-group karciskolom">
					                <label><i class="fa fa-ticket"></i> Input Kode Karcis</label>
			                            <input  oninput="Diall()" autofocus='true'  type="text" name="kode_karcis" value="" placeholder="Kode Karcis Parkir" id="input-karcis" class="form-control">
										<div class="medium-Info">*</div>
			                            
								</div>
							</div>	
							<div class="col-md-2">
						        <div class="form-group">
					                <label>No Plat </label>
			                            <input  type="text" oninput="noplatInput()" name="noplat" value="" placeholder="BA 0000 xx" id="input-plat" class="form-control">
										<div class="medium-Info">*</div>
								</div>
							</div>
							<div class="col-md-4">
						        <div class="form-group">
					                <label>Jenis Kendaraan</label>
					                <select onchange="tampil_harga()"  name="jenis" class="form-control select2 jenis" id="jenis">
					                </select>
								</div>
							</div>
							<div class="col-md-2">
						        <div class="form-group">
					                <label>Harga</label>
					                <div class="form-control harga" id="harga">Rp.0.000</div>
								</div>
							</div>
						</div>
			    	</div>
			    </div>
            <!-- /.End Row -->
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="box-body table-responsive no-padding">
			<div class="mini-Info">QRIS: Shift+Q  Tunai:Shift+T </div>
              <table class="table table-hover">
                <tr>
                  <th>Foto Waktu Masuk</th>
                  <th>STREAMING</th>
                  <th>Detail Masuk</th>
                </tr>
			                <tr class="dynamicCaptureiew" style="font-size: 18px">
			                  <td>
			                		<a class="StreamA" target="blank" href="http://192.168.1.64/ISAPI/Streaming/channels/101/picture">
				                  		<img class="StreamIMG" style="  max-width: 50%;  max-height: auto;border-radius: 20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png">
			                  		</a>
			                  </td>
			                  <td>
			                  	<div  class="imagesStream">
			                		<a class="StreamA" target="blank" href="http://192.168.1.64/ISAPI/Streaming/channels/101/picture">
				                  		<img class="StreamIMG" style="  max-width: 50%;  max-height: auto;border-radius: 20px" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png">
			                  		</a>
			                  	</div>
				              </td>
			                  <td>
			                  	Tanggal
			                  	Jam
			                  </td>
			                </tr>
						
                <tr style="font-size: 24px">
                	<td colspan="2">
                		<div class="form-group">
							<label>TOTAL </label>
						</div>
                	</td>
                	<td>
						<div class="form-group">
							<label class="totalharga" id="totalharga">Rp.0.000 </label>
						</div>
                	</td>
                </tr>
                <tr align="left" sty>
                	<td >
				        <div class="form-group">
			                <label>Keterangan Kendaraan</label>
			                <textarea oninput="inputketerangan()" placeholder="Kendaraan lebih dari 1 hari" class="form-control " id="keterangan"></textarea>
						</div>
                	</td>
                	<td colspan="2" style="display: flex;flex-direction: row;justify-content: center;align-items: center;" >
				        <div class="form-group">
			                <label>Bayar</label>
	                		<a class="btn btn-app btn-block btn-sumbit " onclick="qris_api_getstatus()" style="font-size: 18px">
	                			<div class="btn-lable">Refresh</div>
	                			<div class="btn-icon">
	                				<img src="<?= theme() ?>images/qris_only.png" class="tombolIcon"	 alt="">
	                			</div>
		  
				              </a>
						</div>
				        <div class="form-group">
			                <label>Bayar</label>
	                		<a class="btn btn-app btn-block btn-sumbit bg-teal" onclick="LoadingQRIS()" style="font-size: 18px">
	                			<div class="btn-lable">Bayar Dengan</div>
	                			<div class="btn-icon">
	                				<img src="<?= theme() ?>images/qris_only.png" class="tombolIcon"	 alt="">
	                			</div>
		  
				              </a>
						</div>
				        <div class="form-group bayar-btn">
			                <label></label>
                          		<a class="btn btn-app btn-block bg-olive btn-sumbit" onclick="tunai()" style="font-size: 18px">
				                <div class="btn-lable">Bayar Tunai</div>
	                			<div class="btn-icon">
	                				<img src="<?= theme() ?>images/rupiah.png" class="tombolIcon"	 alt="">
	                			</div>
			              </a>
						</div>


                	</td>
                </tr>
              </table>
            </div>
	            	</div>
	            </div>
            <!-- /.box-body -->
          </div>
	</div>
</div>
<div  id="LoadingQris"></div>
	
	<div class="modal fade " id="modal-notifikasi">
    <div class="modal-dialog ">
        <div class=" modal-content">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary box-solid " style="border-radius: 5px">
                    <div class="box-body box-bayar">
                        <h3 align="center" class="box-title notif-title ">
                        </h3>
                                <img src="<?= theme() ?>images/filedpay.png" class="logoBayar" alt="">
                        <div class="notif-Teks" style="text-align: center;"></div>
                            
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

	<div class="modal fade " id="modal-notifikasi-berhasil">
    <div class="modal-dialog ">
        <div class=" modal-content">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary box-solid " style="border-radius: 5px">
                    <div class="box-body box-bayar">
                        <h3 align="center" class="box-title notif-title ">
                        </h3>
                                <img src="<?= theme() ?>images/success-icon-10.png" class="logoBayar" alt="">
                        <div class="notif-Teks" style="text-align: center;"></div>
                            
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
