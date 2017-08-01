//function deleteMulti() {
//    var arr = [];
//    $('.ckcItem:checked').each(function () {
//        arr.push($(this).val());
//    });
//    if (arr == []) {
//        alert('you must choose item before delete');
//        return;
//    }
//    jQuery.ajax({
//        type: "POST",
//        url: url_ajax,
//        data: {"data": arr.join(',')},
//        success: function (data) {
//            jQuery(".notice").html('success');
//            location.reload();
//        }
//    });
//    console.log(arr)
//}
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
    jQuery('.masCheck').change(function () {
        jQuery('table').find('.ick').prop('checked', jQuery(this).is(':checked'));
    });
});
function changeForm(elm) {
    if (jQuery(elm).val() != '') {
        window.location.href = location.href + '&form_id=' + jQuery(elm).val();
    }
    jQuery('.first_select').remove()();
}
function del(url_ajax, id) {
    var listId = id;
    if (!listId) {
        var arr = [];
        jQuery('.ick:checked').each(function () {
            arr.push($(this).val());
        });
        listId = arr.join(',');
    }

    jQuery.ajax({
        type: "POST",
        url: url_ajax,
        data: {"listId": listId},
        success: function (result) {
            let color = result.status ? 'success' : 'danger';
            jQuery(".notice").html('<div class="alert alert-' + color + ' alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + result.mes + '</div>');
            setTimeout(function () {
                console.log(112);
                $(".alert-dismissable").hide('slow');
                location.reload();
            }, 1000);
        }
    });
}

//function submit(url_ajax) {
//    var data = new FormData($form[0]); //formelement
//    return;
//}
//
//media
function loadImage() {
    $('#mediaModal').modal('show');
}

var arrId = [];

$(document).on("click", '#slideModal .list_media img', function (event) {
    console.log(111)
    $(this).toggleClass('selected');
    let index = arrId.indexOf($(this).data('id'));
    if (index > -1) {
        arrId.splice(index, 1);
    } else {
        arrId.push($(this).data('id'));
    }
});
var chooseUrl = '';
var chooseId=''
$(document).on("click", '#mediaModal .list_media img', function (event) {
    $(this).addClass('selected');
    chooseUrl = $(this).attr('src');
    chooseId =$(this).data('id');
    console.log(chooseId);

});
function chooseImage() {
    $('#image').attr('src', chooseUrl);
    $('#image_id').val(arrId);
}

$('.form_ajax').submit(function (e) {
    e.preventDefault();
    data = $(this).serializeArray();
    var form = $(this);
    jQuery.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: {data, arrId},
        success: function (result) {
            console.log(result);
            let color = result.status ? 'success' : 'danger';
            jQuery(".notice").html('<div class="alert alert-' + color + ' alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + result.mes + '</div>');
//            
//            if (result.status) {
//                setTimeout(window.location.href = form.data('url_list'), 3000);
//            }
        }

    });
});