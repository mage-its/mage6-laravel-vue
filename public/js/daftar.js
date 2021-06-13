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
        }
    else {
        $('#info').prop('disabled', true);
        $('#info').prop('required', true);
        }
    })
    
    $('select[name=cabang').change(function () {
        if ($(this).val() == 3) {
            $('#devcom_cat').prop('disabled', true);
            $('#devcom_cat').prop('required', false);
            $('#devcom_cat').prop('value', 1);
        } else {
            $('#devcom_cat').prop('disabled', false);
            $('#devcom_cat').prop('required', true);
        }
    })
    
    $('#check').click(function () {
        if (this.checked) {
            $('#check').prop('checked',false);
            $('#snkModal').modal();
        } 
    })
    
});

function agree (){
    $('#check').prop('checked', true);
}

function showModal() {
    $('#submitModal').modal();
}