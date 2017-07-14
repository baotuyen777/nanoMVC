/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function () {
    jQuery('#select_all').change(function () {
        var checkboxes = jQuery(this).closest('table').find(':checkbox');
        if (jQuery(this).is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    });
    //datable
    jQuery('#qform_table').DataTable();
})
function changeForm(elm) {
    if (jQuery(elm).val() != '') {
        window.location.href = location.href + '&form_id=' + jQuery(elm).val();
    }
    jQuery('.first_select').remove()();
}
function qform_delete(url_ajax) {
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
