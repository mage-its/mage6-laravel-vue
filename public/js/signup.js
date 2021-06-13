function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    


$(document).ready(function(){    
    $('select[name=asal_info]').change(function () {
        if ($(this).val() == 4) {
            $('#info').prop('disabled', false);
            $('#info').prop('required', true);
        } else {
            $('#info').prop('disabled', true);
            $('#info').prop('required', true);
        }
    })
    
    $('select[name=cabang_lomba]').change(function () {
        if ($(this).val() == 3) {
            $('#jenjanglomba').css('display', 'none');
            // $('#kat').prop('disabled', true);
            $('#kat').prop('required', false);
            $('#kat').prop('value', 1);
            // Form Group
            $('#asalsekolah').css('display', 'none');
            $('#alamatsekolah').css('display', 'none');
            // input
            $('#asalSekolah').prop('type', 'hidden');
            $('#alamatSekolah').prop('type', 'hidden');
            $('#asalSekolah').prop('required', false);
            $('#alamatSekolah').prop('required', false);
            $('#asalSekolah').prop('value', '-');
            $('#alamatSekolah').prop('value', '-');
        } else {
            $('#jenjanglomba').css('display', 'block');
            $('#kat').prop('required', true);
            // form group
            $('#asalsekolah').css('display', 'block');
            $('#alamatsekolah').css('display', 'block');
            // input
            $('#asalSekolah').prop('type', 'text');
            $('#alamatSekolah').prop('type', 'text');
            $('#asalSekolah').prop('value', '');
            $('#alamatSekolah').prop('value', '');
            $('#asalSekolah').prop('required', true);
            $('#alamatSekolah').prop('required', true);
        }
    })
    
    $('#check').click(function () {
        if (this.checked) {
            $('#check').prop('checked',false);
            $('#snkModal').modal();
        } 
    })
});


function agree () {
    $('#check').prop('checked', true);
}

function showModal() {
    $('#submitModal').modal();
}