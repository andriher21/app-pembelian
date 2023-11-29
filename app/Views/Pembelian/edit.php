
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
                            <div class="invalid-feedback errorhargabeli">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Kode Barang</label>
                            <select id="kodebrg" name="kodebrg" class="form-control autofill">
                                <?php 
                                echo '<option value="">Select Kode Barang</option>';
                                foreach($barang as $k):?>
                                    <option value="<?=$k['kodebrg'] ?>" <?= $p['kodebrg'] == $k['kodebrg']  ? 'selected="true"' : ''; ?>
                                    ><?=$k['kodebrg'] ?> (<?=$k['namabrg']?>)</option>
                                 <?php endforeach?>
                             </select>
                             <div class="invalid-feedback errorkodebrg">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Kode Suplier</label>
                            <select id="kodespl" name="kodespl" class="form-control">
                                <?php echo '<option value="">Select Kode Suplier</option>'; 
                                foreach($suplier as $k):?>
                                    <option value="<?=$k['kodespl'] ?>" <?= $p['kodespl'] == $k['kodespl']  ? 'selected="true"' : ''; ?> 
                                    ><?=$k['kodespl'] ?> (<?=$k['namaspl']?>)</option>
                                 <?php endforeach?>
                             </select> <div class="invalid-feedback errorspl">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control autofill2" name="hargabeli" id="hargabeli" value="<?= $p['hargabeli']?>"   required>
                            <div class="invalid-feedback errorhargabeli">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">QTY</label>
                            <input type="number" class="form-control autofill2" name="qty" id="qty" value="<?= $p['qty']?>" required>
                            <div class="invalid-feedback errorqty">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Diskon(%)</label>
                            <input type="number" class="form-control autofill2" id="diskon" name="diskon" value="<?= $p['diskon']?>" required>
                            <div class="invalid-feedback errorsdiskon">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Diskon Rp</label>
                            <input type="number" class="form-control " name="diskonrp" id="diskonrp"  value="<?= $p['diskonrp']?>" required>
                            <div class="invalid-feedback errordiskonrp">
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Total Harga</label>
                            <input type="number" class="form-control" id="totalrp" name="totalrp"  value="<?= $p['totalrp']?>" required>
                            <div class="invalid-feedback errortotalrp">
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                            <a href="<?= base_url('/pembelian')?>"class="btn btn-outline-primary  btn-block " role="button">Batalkan </a>
                            
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="save('<?= $p['notransaksi']?>')" class="btn btn-primary btn-block">Simpan</button>
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