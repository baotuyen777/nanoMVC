<?php
$arrSingle = $this->arrSingle;
$imgSrc=NO_IMAGE;
//if (property_exists($this->arrSingle, 'image')) {
    $imgSrc = $this->arrSingle->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $this->arrSingle->image . '&h=150&w=300';
//} 
?>

<div class="container">
    <h1>Detail</h1>
    <div class="notice">

    </div>
    <form class="form_ajax form-horizontal" method="post" enctype="multipart/form-data"
          action="<?php echo Helper::getPermalink('backend/' . $this->module . '/update/') . $this->arrSingle->id ?>" 
          data-url_list="<?php echo Helper::getPermalink('backend/' . $this->module) ?>"
          >
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
            <label class="control-label col-sm-2" >Price:</label>
            <div class="col-sm-10">
                <input type="number" name="price" value="<?php echo $arrSingle->price ?>" class="form-control">
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-sm-2" >Sale:</label>
            <div class="col-sm-10">
                <input type="number" name="sale" value="<?php echo $arrSingle->sale ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Category:</label>
            <div class="col-sm-10">
                <select name="cat_id" class="form-control">
                    <option value="">Please choose a item</option>
                    <?php
                    foreach ($this->arrMultiCat as $arrSingleCat):
                        $selected = $this->arrSingle->cat_id == $arrSingleCat->id ? 'selected' : '';
                        ?>
                        <option value="<?php echo $arrSingleCat->id ?>" <?php echo $selected ?>>
                            <?php echo $arrSingleCat->name ?></option>
                    <?php endforeach; ?>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediaModal">Add Image</button>
                <input type="hidden" name="image_id" id="image_id">
                <img id="image"
                     src="<?= $imgSrc ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Slide:</label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#slideModal">Add Slide</button>
                <!--<input type="hidden" name="slide" id="image_id">-->
                <div class="wrap_slide">
                    <?php foreach ($this->arrSlider as $arrSlide): ?>
                        <img src="<?php echo $arrSlide->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $arrSlide->image . '&h=50&w=100' ?>"/>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Content:</label>
            <div class="col-sm-10">
                <textarea name="description"  class="form-control" 
                          ><?php echo $this->arrSingle->content ?></textarea>
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

<div id="slideModal" class="modal fade" role="dialog">
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" >Choose</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    var updateSlideUrl = '<?php echo Helper::getPermalink('backend/' . $this->module) ?>/updateSlide';

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