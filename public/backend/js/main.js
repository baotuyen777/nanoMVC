function deleteMulti() {
    alert('not done');
}
console.log(111)
//document.getElementById("files").onchange = function () {
//
//    var reader = new FileReader();
//    reader.onload = function (e) {
//        // get loaded data and render thumbnail.
//        document.getElementById("image").src = e.target.result;
//    };
//    // read the image file as a data URL.
//    reader.readAsDataURL(this.files[0]);
//};

jQuery(document).ready(function () {
    jQuery('#select_all').change(function () {
        var checkboxes = jQuery(this).closest('table').find(':checkbox');
        if (jQuery(this).is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    });
})
function changeForm(elm) {
    if (jQuery(elm).val() != '') {
        window.location.href = location.href + '&form_id=' + jQuery(elm).val();
    }
    jQuery('.first_select').remove()();
}
function del(url_ajax) {
    var keyArray = [];
    jQuery('.ick:checked').each(function (k, v) {
        keyArray.push(jQuery(this).attr('id').replace('ick_', ''));
    });
    console.log(keyArray)
    jQuery.ajax({
        type: "POST",
        url: url_ajax,
        data: {"data": keyArray.join(',')},
        success: function (data) {
            jQuery(".notice").html('success');
            location.reload();
        }
    });
}
$('.form_ajax').on('submit', function (e) {
    e.preventDefault();
    data = $(this).serializeArray();
    jQuery.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: {data},
        success: function (result) {
            console.log(result);
            let color = result.status ? 'success' : 'danger';
            jQuery(".notice").html('<div class="alert alert-' + color + ' alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + result.mes + '</div>');

        }
    });
});
function submit(url_ajax) {
    var data = new FormData($form[0]); //formelement
    return;
}