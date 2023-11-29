
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
                 <a href="<?= base_url('/suplier')?>" class="h-6 font-weight-bold ">Daftar Suplier > Edit Suplier</a>
                <br>
                <br>
               <?php foreach($suplier as $p):?>
                <form class="form">
                    <div class="form-row">
                            <label>Kode Suplier</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $p['kodespl']?>" required>  
                             <div class="invalid-feedback errorkategori">
                            </div>
                        </div>
                        <div class="form-row">
                            <label >Nama Suplier</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $p['namaspl']?>" required>  
                            <div class="invalid-feedback errorname">
                            </div>
                        </div>
                    <br>
                    
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                            <a href="<?= base_url('/suplier')?>"class="btn btn-outline-primary  btn-block " role="button">Batalkan </a>
                            
                            </div>
                            <div class="col-sm-2">
                                <button type="button" onclick="save(<?= $p['idspl']?>)" class="btn btn-primary btn-block">Simpan</button>
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