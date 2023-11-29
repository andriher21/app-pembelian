
<div class="container-fluid employee-attendance-data-summary">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
       
        </div>
        <div class="col-4">

    </div>
       
    </div>

    <!-- DataTales Example -->
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <br>
                <div>
                 <a href="<?= base_url('/pembelian')?>" class="h-6 font-weight-bold ">Daftar Pembelian > Edit Pembelian</a>
                <br>
                <br>
               <?php foreach($beli as $p):?>
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <label>No Transaksi</label>
                                <input type="text" class="form-control" name="notransaksi" id="notransaksi" value="<?= $p['notransaksi']?>"  readonly required>
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Kode Barang</label>
                                <input type="text" class="form-control" name="notransaksi" id="notransaksi" value="<?= $p['kodebrg']?>"  readonly required>
                            </div>
                            <div class="form-group col-md-4">
                                <label >Kode Suplier</label>
                                <input type="text" class="form-control" name="notransaksi" id="notransaksi" value="<?= $p['kodespl']?>"  readonly required>
                                
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control" name="hargabeli" id="hargabeli" value="<?= $p['hargabeli']?>"   readonly required>
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">QTY</label>
                            <input type="number" class="form-control " name="qty" id="qty" value="<?= $p['qty']?>" readonly required>
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label >Diskon(%)</label>
                            <input type="number" class="form-control autofill2" id="diskon" name="diskon" value="<?= $p['diskon']?>" readonly required>
                            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Diskon Rp</label>
                            <input type="number" class="form-control " name="diskonrp" id="diskonrp"  value="<?= $p['diskonrp']?>" readonly required>
                            
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label >Total Harga</label>
                            <input type="number" class="form-control" id="totalrp" name="totalrp"  value="<?= $p['totalrp']?>" readonly required>
                           
                        </div>
                        <div class="form-group col-md-4">
                            <label >Total Hutang</label>
                            <input type="number" class="form-control" id="totalrp" name="totalrp"  value="<?= $p['totalhutang']?>" readonly required>
                       
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                            <a href="<?= base_url('/pembelian')?>"class="btn btn-outline-primary  btn-block " role="button"> Kembali </a>
                            
                            </div>
                           
                        </div>
                   </form>
                   <?php endforeach?>
              
                
            </div>
            <div class="col"></div>
        </div>
    </div>
    <iframe id="print-summary-report" hidden></iframe>


</div>
</div>
<!-- End of Main Content -->
<script>
    var base_url = '<?php echo base_url(); ?>'; 

    </script>