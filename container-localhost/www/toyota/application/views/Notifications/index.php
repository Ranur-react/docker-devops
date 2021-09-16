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
<div class="modal fade " id="modal-notifikasi">
    <div class="modal-dialog ">
        <div class=" modal-content">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary box-solid " style="border-radius: 5px">
                <?= $this->session->flashdata('pesan'); ?>
                    <div class="box-body box-bayar">
                        <h3 align="center" class="box-title ">
                            <?= $title; ?>
                        </h3>
                            <?= $body; ?>
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