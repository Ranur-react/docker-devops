<link rel="stylesheet" href="<?= theme() ?>plugins/span_but/style.css">  
<script src="<?= theme() ?>plugins/span_but/animated.js"></script>


<style>
	.alert-dark {
		border-color: transparent;
		background: 0 0;
		background-size: 20px 20px;
	}

	.alert-success.alert-dark {
		background-color: #78bd5d !important;
		background-image: linear-gradient(45deg, rgba(255, 255, 255, .04) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .04) 50%, rgba(255, 255, 255, .04) 75%, transparent 75%, transparent);
	}

	.alert .close {
		opacity: .4;
		color: inherit;
		text-shadow: none;
	}

	.text-muted {
		font-weight: 400;
		font-size: 12px;
	}

	.product-info.tugas {
		margin-left: 0px;
	}

	.info-warning {
		color: #fff;
		border-color: #dc9c41;
		background: #f4ab43;
	}

	.info-gagal {
		color: #fff;
		border-color: #dc451f;
		background: #eb613e;
	}
</style>
<script type="text/javascript">
   




	$( document ).ready(function() {
OnlineMobil() ;
OnlineMotor();
	setTimeout(()=>{
	// OnlineMobil();
	// OnlineMotor();
	},30000);
    // console.log( "ready!" );
});
	var succesOnline=`
						              <div class="alert alert-success alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						                <h4><i class="icon fa fa-check-circle-o"></i> Online</h4>
						                Gerbang Parkir  berhasil diaktifkan 
						              </div>
										<div class="col-md-12">
											<div class="box box-solid">
												<div class="box-header with-border">
												  <i class="fa  fa-info-circle"></i>
												  <h3 class="box-title">INFORMASI</h3>
												</div>
												<div class="box-body">
												  <ol>
												    <li>Pastikan Sistem selalu dalam keadaan Online <i class="fa fa-check-circle-o"></i></li>
												    <li>Jangan Menutup Browser Setup Sistem</li>
												  </ol>
												</div>
											</div>
										</div>
	`;
		var GagalOnline=`
						              <div class="alert alert-warning alert-dismissible">
						                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						                <h4><i class="icon fa fa-circle-o"></i> Connetions Filed </h4>
						                Gerbang Parkir GAGAL aktif periksa koneksi dengan melakukan PING pada IP Controller perangkat
						              </div>
										<div class="col-md-12">
											<div class="box box-solid">
												<div class="box-header with-border">
												  <i class="fa fa-info"></i>
												  <h3 class="box-title">INFORMASI</h3>
												</div>
												<div class="box-body">
												  <ol>
												    <li>Tekan Tombol <i class="fa fa-power-off"> </i> untuk tetap berusaha Online </li>
												    <li>Mungkin terjadi kendala saat kendaraan entry</li>
												    	<ul>
												             <li>Gunakan Remote Gate Device denga menekan tombol <i class="fa fa-arrow-circle-up"></i>  untuk membuka pintu  </li>
												             <li>Gunakan Remote Gate Device denga menekan tombol <i class="fa fa-arrow-circle-down"></i>  untuk Menutup pintu  </li>
												    	</ul>
												  </ol>
												</div>
											</div>
										</div>
	`;



	            $(document).on('click', '.btnParkirMobil', function(e) {
					OnlineMobil();
            });	

function OnlineMobil() {
	var buton=$('.btnParkirMobil');
	var Informasi=$('.Informasi');
	               request= $.ajax({
                    url: '<?= site_url('EntryMobil') ?>',
                    type: "post",
                    dataType: "json",
                    cache: false,
                    beforeSend: function(response) {
						// alert("Before");
                        buton.attr('disabled', 'disabled');
                            buton.removeClass('btn-danger');
                            buton.addClass('btn-success');
                        buton.html('<i class="fa fa-spin fa-spinner"></i> Online');
                        console.log(response)
                        Informasi.html(succesOnline);

                    },
                    success: function(response) {
                    		<?php  
                    	if (level() == 1) { ?>
								window.focus()
                    		<?php }
                    		?>
  						console.log(response);
                        Informasi.html(GagalOnline);
                    },
                    complete: function() {
                        Informasi.html(GagalOnline);
                        <?php  
                    	if (level() == 1) { ?>
								window.focus()
                    		<?php }
                    		?>
        	  						buton.removeAttr('disabled');
  						buton.removeClass('btn-success');
  						buton.addClass('btn-danger');
                        buton.html('<i class="fa fa-power-off"></i>');
                        OnlineMobil();
                    }
                });
}

	            $(document).on('click', '.btnParkirMotor', function(e) {
	            	OnlineMotor();
            });	
	            function OnlineMotor() {
	            	var buton=$('.btnParkirMotor');
	            	var Informasi=$('.InformasiMotor');
                $.ajax({
                    url: '<?= site_url('EntryMotor')  ?>',
                    type: "post",
                    dataType: "json",
                    cache: false,
                   beforeSend: function(response) {
						// alert("Before");
                        buton.attr('disabled', 'disabled');
                            buton.removeClass('btn-danger');
                            buton.addClass('btn-success');
                        buton.html('<i class="fa fa-spin fa-spinner"></i> Online');
                        console.log(response)
                        Informasi.html(succesOnline);

                    },
                    success: function(response) {
  						console.log(response);
                        Informasi.html(GagalOnline);
                        <?php  
                    	if (level() == 1) { ?>
								window.focus()
                    		<?php }
                    		?>
                    },
                    complete: function() {
                    	<?php  
                    	if (level() == 1) { ?>
								window.focus()
                    		<?php }
                    		?>
                        Informasi.html(GagalOnline);
        	  						buton.removeAttr('disabled');
  						buton.removeClass('btn-success');
  						buton.addClass('btn-danger');
                        buton.html('<i class="fa fa-power-off"></i>');
                    OnlineMotor()
                    }
                });
	            }

</script>
<?php $urls = $this->uri->segment(2) ?>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Level User Login <i class="fa fa-angle-double-right"></i> <?= $urls == null ? 'admin' : $urls ?></h3>
			</div>
			<div class="box-body">
				<a href="<?= site_url() ?>" class="btn btn-success">Admin</a>
				<a href="<?= site_url('welcome/walas') ?>" class="btn btn-info">Wali Kelas</a>
				<a href="<?= site_url('welcome/guru') ?>" class="btn btn-primary">Guru</a>
				<a href="<?= site_url('welcome/siswa') ?>" class="btn btn-danger">Siswa</a>
			</div>
		</div> -->
		<div class="alert alert-warning alert-dark m-b-1">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Hei <?= user() ?></strong>, Selamat datang , Jangan lupa Aktifkan Gerbang Parkir agar pengunjung dapat memasuki area Parkir dengan semestinya	
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-success">
			<div class="box-header">
				<i class="fa fa-gear"></i>
				<h3 class="box-title">Setup Sistem</h3>
			</div>
			<div class="box-body " >
				<div class="row">
					<div class="col-md-6">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="row">
								PARKIR MOBIL
							</div>
							<div class="row">
								<button style="height: 200px;width: 200px;font-size: 32px;border-radius: 50%" class="btn btn-danger btnParkirMobil">
									<i class="fa  fa-power-off "></i>
								</button>
							</div>
							<br>
							<div class="row">
								<div class="Informasi">
								</div>

							</div>
						</div>
						<div class="col-md-2">
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-4">
							<div class="row">PARKIR MOTOR</div>
							<div class="row">
								<button style="height: 200px;width: 200px;font-size: 32px;border-radius: 50%" class="btn btn-danger btnParkirMotor">
									<i class="fa  fa-power-off "></i>
								</button>
							</div>
							<div class="row">
								<div class="InformasiMotor">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-4">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="box box-solid">
							<div class="box-header with-border">
							  <i class="fa  fa-user"></i>
							  <h3 class="box-title">Hubungi : </h3>
							</div>
							<div class="box-body">
							    	<br>&nbsp;&nbsp;Ranur - Technical Support 0831-8264-7716 (wa)
							    	<br>&nbsp;&nbsp;Beno  - Customer Support 0823-8386-7799 (wa) 
							    	<br>&nbsp;&nbsp; Integra Solutions &copy; 
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>