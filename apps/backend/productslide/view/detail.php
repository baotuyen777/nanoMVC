<?php
$arrSingle = $this->arrSingle;
$imgSrc = $this->arrSingle->image_id == '' ? NO_IMAGE : TIMTHUMB_LINK . Helper::get_image($this->arrSingle->image_id). '&h=150&w=300';
?>
<style>
    #image{
        max-height: 200px;
    }
</style>
<div class="container">
    <h1>Detail</h1>
    <div class="notice">

    </div>
    <form class="form_ajax form-horizontal" method="post" enctype="multipart/form-data"
           action="<?php echo Helper::getPermalink('backend/' . $this->module . '/update/') . $this->arrSingle->id ?>" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Title:</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="<?php echo $this->arrSingle->name ?>" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Slug:</label>
            <div class="col-sm-10">
                <input type="text" name="slug" value="<?php echo $arrSingle->slug ?>" class="form-control" id="link">
            </div>
        </div>
       
        <div class="form-group">
            <label class="control-label col-sm-2" >Parent:</label>
            <div class="col-sm-10">
                <select name="category">

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Description:</label>
            <div class="col-sm-10">
                <textarea name="description"  class="form-control" 
                          ><?php echo $this->arrSingle->description ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Image:</label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" onclick="loadImage()">Add Image</button>
                <input type="hidden" name="image" id="image_id">
                <img id="image"
                     src="<?= $imgSrc ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Status:</label>
            <div class="col-sm-10">
                <input type="checkbox" name="status" <?php echo $this->arrSingle->status === "0" ? '' : 'checked' ?> value="1"   >
            </div>
        </div>
        <div class="form-action">
            <a class="btn btn-default" href="<?php echo Helper::getPermalink('backend/' . $this->module) ?>" >Return</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div> <!-- /container -->
<!-- Modal -->
<div id="mediaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <div class="wrap_list_media">
                    <div class="function">
                        <a class="btn btn-success" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail') ?>">Add</a>

                    </div>
                    <div class="list_media">

                    </div>
                    <hr/>
                    <ul class="pagination">

                    </ul>

                </div> <!-- /container -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="chooseImage()">Choose</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    function loadImage() {
        $('#mediaModal').modal('show');
    }
    jQuery.ajax({
        type: "GET",
        url: '<?php echo Helper::getPermalink('backend/media/srv_all/1') ?>',
//        data: {"page": 1},
        success: function (result) {
//            console.log(result);
            let listMedia = '';
            for (k in result.data) {
                listMedia += '<a href="#"><img data-id="' + result.data[k].id + '" src="<?php echo TIMTHUMB_LINK ?>' + result.data[k].image + '<?= THUMBNAIL ?>"/></a>';
            }
            $('.list_media').append(listMedia);
        }
    });
    var chooseId = '';
    var chooseUrl = '';
    $(document).on("click", '.list_media img', function (event) {
        chooseId = $(this).data('id');
        chooseUrl = $(this).attr('src');

    });
    function chooseImage() {
        $('#image').attr('src', chooseUrl);
        $('#image_id').val(chooseId);
    }
//    $('.form_ajax').submit(function(e){
//        console.log();
//        data = $(this).serializeArray();
//        e.preventDefault();
//        jQuery.ajax({
//        type: "POST",
//        url: $(this).attr('action'),
////        data: {"page": 1},
//        success: function (result) {
//            console.log(result);
////            $('.list_media').append(listMedia);
//        }
//    });
//    });
</script>