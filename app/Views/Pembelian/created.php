
<div class="container-fluid employee-attendance-data-summary">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
       
        </div>
        <div class="col-4">
    </div>
       
    </div>
    <div class="section-body section-emp-summary">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <br>
                <div>
                 <a href="<?= base_url('/pembelian')?>" class="h-6 font-weight-bold ">Daftar Pembelian > Tambah Pembelian</a>
                <br>
                <br>
               
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kode Barang</label>
                            <select id="kodebrg" name="kodebrg" class="form-control autofill">
                                <?php 
                                echo '<option value="">Select Kode Barang</option>';
                                foreach($barang as $k):?>
                                    <option value="<?=$k['kodebrg'] ?>"><?=$k['kodebrg'] ?> (<?=$k['namabrg']?>)</option>
                                 <?php endforeach?>
                             </select>
                             <div class="invalid-feedback errorkodebrg">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Kode Suplier</label>
                            <select id="kodespl" name="kodespl" class="form-control">
                                <?php echo '<option value="">Select Kode Suplier</option>'; 
                                foreach($suplier as $k):?>
                                    <option value="<?=$k['kodespl'] ?>"><?=$k['kodespl'] ?> (<?=$k['namaspl']?>)</option>
                                 <?php endforeach?>
                             </select> <div class="invalid-feedback errorkodespl">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                            <label for="inputState">QTY</label>
                            <input type="number" class="form-control " name="qty" id="qty" required>
                            <div class="invalid-feedback errorqty">
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control " name="hargabeli" id="hargabeli" required>
                            <div class="invalid-feedback errorhargabeli">
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Diskon(%)</label>
                            <input type="number" class="form-control autofill2" id="diskon" name="diskon" required>
                            <div class="invalid-feedback errorsdiskon">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Diskon Rp</label>
                            <input type="number" class="form-control " name="diskonrp" id="diskonrp" required>
                            <div class="invalid-feedback errordiskonrp">
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Total Harga</label>
                            <input type="number" class="form-control" id="totalrp" name="totalrp" required>
                            <div class="invalid-feedback errortotalrp">
                            </div>
                        </div>
                    </div>
                 
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                            <a href="<?= base_url('/barang')?>"class="btn btn-outline-primary  btn-block " role="button">Batalkan </a>
                            
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="save()" class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                   </form>

              
                
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