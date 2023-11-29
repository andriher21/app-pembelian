
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
                 <a href="<?= base_url('/barang')?>" class="h-6 font-weight-bold ">Daftar Barang > Edit Barang</a>
                <br>
                <br>
               <?php foreach($barang as $p):?>
                <form class="form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $p['kodebrg']?>" required>  
                             <div class="invalid-feedback errorkategori">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label >Nama Barang</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $p['namabrg']?>" required>  
                            <div class="invalid-feedback errorname">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control autofill" name="hargabeli" id="hargabeli" value="<?= $p['hargabeli']?>"   required>
                            <div class="invalid-feedback errorhargabeli">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Satuan</label>
                            <input type="text" class="form-control " name="satuan" id="satuan" value="<?= $p['satuan']?>" required>
                            <div class="invalid-feedback errorsatuan">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label >Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="<?= $p['qtybeli']?>" required>
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
                                <button type="button" onclick="save(<?= $p['idbrg']?>)" class="btn btn-primary btn-block">Simpan</button>
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