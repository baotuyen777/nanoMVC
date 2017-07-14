(function ($) {
//    $('.upload-all').click(function(){
//        //submit all form
//        $('form').submit();
//    });
//    $('.cancel-all').click(function(){
//        //submit all form
//        $('form .cancel').click();
//    });
    $(document).on('submit', 'form', function (e) {
        e.preventDefault();
        $form = $(this);
        uploadImage($form);
    });
    function uploadImage($form) {
        $form.find('.progress-bar').removeClass('progress-bar-success')
                .removeClass('progress-bar-danger');

        var formdata = new FormData($form[0]); //formelement
        var request = new XMLHttpRequest();

        //progress event...
        request.upload.addEventListener('progress', function (e) {
            var percent = Math.round(e.loaded / e.total * 100);
            $form.find('.progress-bar').width(percent + '%').html(percent + '%');
            $('.qform_submit').attr("disabled", "true");
            $('.qform_submit').html('loading...');
//            $('.qform_submit').parent().append('<img src="./images/loading_spinner.gif">');

        });

        //progress completed load event
        request.addEventListener('load', function (e) {
            $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
            document.getElementById("qform").reset();
            $('.qform_submit').html('Submit');
            console.log('success!');
            $('.qform_submit').removeAttr('disabled');
            
        });

        request.open('post', jQuery('#qform').attr('action'));
        request.send(formdata);

        $form.on('click', '.cancel', function () {
            request.abort();

            $form.find('.progress-bar')
                    .addClass('progress-bar-danger')
                    .removeClass('progress-bar-success')
                    .html('upload aborted...');
        });

    }
    function handleFileSelect() {
        //Check File API support
        $('#show_thumb').empty();
        if (window.File && window.FileList && window.FileReader) {

            var files = event.target.files; //FileList object
            var output = document.getElementById("show_thumb");

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //Only pics
                var picReader = new FileReader();
                if (!file.type.match('image')) {
                    picReader.addEventListener("load", function (event) {
                        var picFile = event.target;
                        var div = document.createElement("a");
                        div.innerHTML = "<img class='thumbnail' src='./wp-content/plugins/qsoft-form/images/file.png'" + "title='" + picFile.name + "'/>";
                        output.insertBefore(div, null);
                    });
                    picReader.readAsDataURL(file);
                    continue;
                }

                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    console.log(file.name);
                    var div = document.createElement("a");
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                    output.insertBefore(div, null);
                });
                //Read the image
                picReader.readAsDataURL(file);
            }
        } else {
            console.log("Your browser does not support File API");
        }
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);

})(jQuery);
