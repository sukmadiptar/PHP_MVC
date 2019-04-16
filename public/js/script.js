$(function() {

    //add data
    $('.addData').on('click', function(){

        $('#formModalLabel').html('Add Data Karyawan');
        $('.modal-footer button[type=submit]').html('Add Data');
    });

    $('.addData').on('click', function() {
        $('#formModalLabel').html('Add Data Karyawan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nik').val('');
        $('#email').val('');
        $('#jobdesk').val('');
        $('#id').val('');
    });

    //edit data
    $('.viewModalEdit').on('click', function(){
        
        $('#formModalLabel').html('Edit Data Karyawan');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost/mvc/public/karyawan/edit');
        
        const id = $(this).data('id');
        
        
        $.ajax({
            url: 'http://localhost/mvc/public/karyawan/getedit',
            // id kiri nama data yg di kirim, kanan isi datanya
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nik').val(data.nik);
                $('#email').val(data.email);
                $('#jobdesk').val(data.jobdesk);
                $('#id').val(data.id);
            }
        });

    });


});