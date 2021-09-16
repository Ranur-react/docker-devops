<script type="text/javascript">
	 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2() 
})
</script>
<style type="text/css">
	.form-control{
		border-radius: 20px;
	}
	.btn{
		border-radius: 50px;
	}
</style>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-credit-card"></i> Order Tiket Untuk Pengunjung</h3>
            </div>
            <div class="box-body">
			    <div class="row">
			    	<div class="col-md-6">
			    		<!-- input row -->
					    <div class="row">
					    	<div class="col-md-1"></div>
					    	<div class="col-md-6">
						        <div class="form-group">
					                <label>Pilih Pelanggan </label>
	                					<select class="form-control select2" name="pelanggan">
											<?php foreach ($pelanggan as $d) : ?>
												<option value="<?php echo $d['no_identitas']; ?>"><?php echo $d['nama'].'  (hp:'.$d['nohp'].')'; ?></option>
											<?php endforeach; ?>

										</select>
								</div>
							</div>	
							<div class="col-md-2">
						        <div class="form-group">
					                <label></label>
										<button type="button" class="btn btn-block btnpelanggan">
								                <i class="fa fa-plus"></i> 
										</button>
								</div>
							</div>
						</div>
					    <div class="row">
					    	<div class="col-md-1"></div>
					    	<div class="col-md-6">
						        <div class="form-group">
					                <label>Pilih Pembayaran</label>
					                <select class="form-control select2" name="payment">
											<?php foreach ($payment as $d) : ?>
												<option value="<?php echo $d['id_payment']; ?>"><?php echo $d['nama_pembayaran']; ?></option>
											<?php endforeach; ?>

									</select>
								</div>
							</div>	
							<div class="col-md-2">
						        <div class="form-group">
					                <label></label>
										<button type="button" class="btn btn-block btnpayment">
								                <i class="fa fa-plus"></i> 
										</button>
								</div>
							</div>
						</div>
			    	</div>
			    	<div class="col-md-6">
					    <div class="row">
					    	<div class="col-md-1"></div>
					    	<div class="col-md-6">
						        <div class="form-group">
					                <label><i class="fa fa-ticket"></i> Pilih Level Tiket</label>
					                <select class="form-control select2" name="level">
											<?php foreach ($level as $d) : ?>
												<option value="<?php echo $d['id_level']; ?>"><?php echo $d['nama_level']; ?></option>
											<?php endforeach; ?>

									</select>
								</div>
							</div>	
							<div class="col-md-2">
						        <div class="form-group">
					                <label>Harga</label>
					                Rp.5.000
								</div>
							</div>
						</div>
					    <div class="row">
					    	<div class="col-md-1"></div>
					    	<div class="col-md-6">
						        <div class="form-group">
					                <label>Jumlah Pesan Tiket</label>
					                <input style="text-align: center;" type="text" class="form-control" value="1">
								</div>
							</div>	
							<div class="col-md-2">
						        <div class="form-group">
					                <label></label>
										<button type="button" class="btn btn-block btn-success">
								                <i class="fa fa-plus"></i> 
										</button>
								</div>
							</div>
						</div>
			    	</div>
			    </div>
            <!-- /.End Row -->
	            <div class="row">
	            	<div class="col-md-12">
	            		<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Level Tiket</th>
                  <th>Harga</th>
                  <th>Qty</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td><span class="label label-success">Dewasa</span></td>
                  <td>Rp. 5.0000</td>
                  <td>1</td>
                </tr>
              </table>
            </div>
	            	</div>
	            </div>
            <!-- /.box-body -->
          </div>
	</div>
</div>