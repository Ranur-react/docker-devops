<style type="text/css">
    .box-bayar{
        display: flex;
        flex-direction: column;
    }
    .logoBayar{
        widows: 50%;
        height: auto;
    }
</style>
<div class="modal fade " id="modal-Qris-waiting">
    <div class="modal-dialog ">
        <div class=" modal-content">
            <!-- <div class="col-xs-5"></div>
                <div class="col-xs-7">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div> -->
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary box-solid " style="border-radius: 5px">
                    <!-- /.box-header -->
                    <div class="box-body box-bayar">
                        <h3 align="center" class="box-title ">Menunggu Pembayaran </h3>
                                <img src="<?= theme() ?>images/qris.png" class="logoBayar" alt="">
                                <img src="<?= theme() ?>images/banknagari.png" class="logoBayar" alt="">

                        <h3 align="center" class="box-title ">
                            <br> Rp. <?= $harga ?>
                            <b class="iconmesage"><div class="LoadIcon"></div></b>
                            <br>                           
                        </h3>
                            
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