
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
                 <a href="<?= base_url('/barang')?>" class="h-6 font-weight-bold ">Daftar Barang > Tambah Barang</a>
                <br>
                <br>
               
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control" id="kode" name="kode" required> 
                             <div class="invalid-feedback errorkode">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Nama Barang</label>
                            <input type="text" class="form-control" id="name" name="name" required>  
                            <div class="invalid-feedback errorname">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                            <label for="inputState">Satuan</label>
                            <input type="text" class="form-control " name="satuan" id="satuan" required>
                            <div class="invalid-feedback errorsatuan">
                            </div>
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control autofill" name="hargabeli" id="hargabeli" required>
                            <div class="invalid-feedback errorhargabeli">
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label >Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                            <div class="invalid-feedback errorstok">
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