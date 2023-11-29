<!-- Begin Page Content -->
<div class="container-fluid">
<br>
    <div class="row">
        <div class="col">
            <img class="rounded-circle" width="150px" src="<?= base_url() ?>/img/Foto.jpg">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="message-text" class="col-form-label">Name Kandidat</label>
            <input class="form-control" type="text" name="name" value="@ <?= $profil['nama'] ?>" >
        </div>
         <div class="col">
            <label for="message-text" class="col-form-label">Posisi Kandidat</label>
            <input class="form-control" type="text" name="username" value="</> <?= $profil['posisi'] ?>" >
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --