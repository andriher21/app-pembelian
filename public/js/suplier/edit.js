function save(ids){
    var name = $('#name').val();
    var kode = $('#kode').val();
    $.ajax({
        url: base_url+"/suplier/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            name:name,
            kode:kode,
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
        }
        else if(response.sukses){
            location.replace(base_url+'/suplier');
        }
        }
    });
}