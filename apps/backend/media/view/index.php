
<div class="container">
    <div class="function">
        <a class="btn btn-primary " id="btn_add_file" href="#">Add File</a>
        <button type="button" class="btn btn-danger" href="#"
           onclick="del('<?php echo Helper::getPermalink('backend/' . $this->module . '/delete') ?>')" >Delete</button>
        <hr/>
    </div>
    <div class="notice"></div>
    <form action="<?php echo Helper::getPermalink('backend/media/upload') ?>" method="post" id="qform" class="qform form-horizontal" enctype="multipart/form-data">

        <input type="file" name="file[]" multiple id="files">
        <div id="show_thumb"></div>
        <div class="progress progress-striped hidden">
            <div class="progress-bar" style="width:0%"></div>
        </div>
        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit"  name="qform_submit" class="btn btn-primary btn-lg " id="qform_submit">Submit</button>
            </div>
        </div>

    </form>
    <table class="table">
        <tr>
            <th><input type="checkbox" class="masCheck"></th>
            <th>STT</th>
            <?php
            foreach ($this->model as $field => $val):
                if ($field == 'id')
                    continue;
                ?>
                <th><?php echo ($field) ?></th>
            <?php endforeach; ?>
            <th>Action</th>
        </tr>
        <?php
        if (!empty($this->arrAll)):
            $i = 0;
            foreach ($this->arrAll as $arrSingle):
                $i++;
                ?>
                <tr>
                    <td><input type="checkbox" class="ick" name="ckc[]" value="<?php echo $arrSingle->id ?>"></td>
                    <td><?php echo $i ?></td>
                    <?php // foreach ($this->model as $field => $val):  ?>
                    <!--<td><?php // echo $arrSingle->$field                          ?></td>-->
                    <?php // endforeach;   ?>
                    <td><?php echo $arrSingle->name ?></td>
                    <td>
                        <img class="img-list" 
                             src="<?= TIMTHUMB . SITE_ROOT . "public/img/upload/" . $arrSingle->image ?>&h=50&w=100">
                    </td>
                    <td><?php echo $arrSingle->type ?></td>
                    <td><?php echo $arrSingle->description ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail/') . $arrSingle->id ?>">Edit</a> &nbsp;
                        <button type="button" class="btn btn-danger" 
                                onclick="del('<?php echo Helper::getPermalink('backend/' . $this->module . '/delete') ?>',<?php echo $arrSingle->id ?>)">Delele</button>
                    </td>
                </tr>
                <?php
            endforeach;
        endif;
        ?>
    </table>
    <hr/>
    <ul class="pagination">
        <?php if ($this->page > 1 && $this->page <= $this->countPage): ?>
            <li><a href="<?php echo Helper::getPermalink('backend/' . $this->module, "page=" . ($this->page - 1)) ?>">Prev</a></li>
        <?php endif; ?>
        <?php
        for ($i = 1; $i <= $this->countPage; $i++):
            ?>
            <li><a href="<?php echo Helper::getPermalink('backend/' . $this->module, "page={$i}") ?>"><?php echo $i ?></a></li>
        <?php endfor; ?>

        <?php if ($this->page < $this->countPage): ?>
            <li><a href="<?php echo Helper::getPermalink('backend/' . $this->module, "page=" . ($this->page + 1)) ?>">Next</a></li>
        <?php endif; ?>
    </ul>
</div>
<script type="text/javascript">
    document.getElementById("btn_add_file").addEventListener('click', function () {
        document.getElementById('files').click();
    });

    $(document).on('submit', 'form', function (e) {
        e.preventDefault();
        $form = $(this);
        $form.find('.progress-bar').removeClass('progress-bar-success')
                .removeClass('progress-bar-danger');

        var formdata = new FormData($form[0]); //formelement
        var request = new XMLHttpRequest();

        //progress event...
        request.upload.addEventListener('progress', function (e) {
            var percent = Math.round(e.loaded / e.total * 100);
            $form.find('.progress-bar').width(percent + '%').html(percent + '%');
            $('#btn_add_file').attr("disabled", "true");
            $('#btn_add_file').html('loading...');
//            $('.qform_submit').parent().append('<img src="./images/loading_spinner.gif">');

        });

        //progress completed load event
        request.addEventListener('load', function (e) {
            $form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
            $form.find('.progress').removeClass('hidden');
            document.getElementById("qform").reset();
            $('#btn_add_file').html('Loading...');
            setTimeout(function () {
                $(".alert-dismissable").hide('slow');
                location.reload();
            }, 1000);
            $('#btn_add_file').removeAttr('disabled');

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

    });
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
            document.getElementById("qform_submit").click();
//            document.getElementById('qform').addEventListener('change', handleFileSelect, false);
        } else {
            console.log("Your browser does not support File API");
        }
    }
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>