function save(ids){
    var name = $('#name').val();
    var kode = $('#kode').val();
    var hargabeli = $('#hargabeli').val();
    var satuan = $('#satuan').val();
    var stok = $('#stok').val();
    $.ajax({
        url: base_url+"/barang/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            name:name,
            kode:kode,
            hargabeli:hargabeli,
            satuan:satuan,
            stok:stok,
        },
        success: function(response) {
            if(response.error){
                let data = response.error;
                if(data.errorname ){
                    $('#name').addClass('is-invalid');
                    $('.errorname').html(data.errorname);
                }
                else{
                    $('#name').removeClass('is-invalid');
                    $('#name').addClass('is-valid');
                }
                if(data.errorkode ){
                    $('#kode').addClass('is-invalid');
                    $('.errorkode').html(data.errorkode);
                }
                else{
                    $('#kode').removeClass('is-invalid');
                    $('#kode').addClass('is-valid');
                }
                if(data.errorhargabeli ){
                    $('#hargabeli').addClass('is-invalid');
                    $('.errorhargabeli').html(data.errorhargabeli);
                }
                else{
                    $('#hargabeli').removeClass('is-invalid');
                    $('#hargabeli').addClass('is-valid');
                }
                if(data.errorsatuan ){
                    $('#satuan').addClass('is-invalid');
                    $('.errorsatuan').html(data.errorsatuan);
                }
                else{
                    $('#satuan').removeClass('is-invalid');
                    $('#satuan').addClass('is-valid');
                }
                if(data.errorstok ){
                    $('#stok').addClass('is-invalid');
                    $('.errorstok').html(data.errorstok);
                }
                else{
                    $('#stok').removeClass('is-invalid');
                    $('#stok').addClass('is-valid');
                }
        }
        else if(response.sukses){
            location.replace(base_url+'/barang');
        }
        }
    });
}