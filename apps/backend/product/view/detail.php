<?php
$arrSingle = $this->arrSingle;
$imgSrc = $this->arrSingle->image == '' ? NO_IMAGE : TIMTHUMB_LINK . Helper::get_image($this->arrSingle->image) . '&h=150&w=300';
var_dump($this->arrSlider);
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
            <label class="control-label col-sm-2" >Category:</label>
            <div class="col-sm-10">
                <select name="cat_id" class="form-control">
                     <option value="">Please choose a item</option>
                    <?php
                    
                    foreach ($this->arrMultiCat as $arrSingleCat):
                        $selected=$this->arrSingle->cat_id== $arrSingleCat->id ? 'selected' : '';
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
                <button type="button" class="btn btn-primary" onclick="loadImage()">Add Image</button>
                <input type="hidden" name="image" id="image_id">
                <img id="image"
                     src="<?= $imgSrc ?>">
            </div>
        </div>
           <div class="form-group">
            <label class="control-label col-sm-2" >Slide:</label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" onclick="loadImage()">Add Slide</button>
                <!--<input type="hidden" name="slide" id="image_id">-->
                <div class="wrap_slide">
                    
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


<script>
 var updateSlideUrl='<?php echo Helper::getPermalink('backend/' . $this->module) ?>/updateSlide';
 
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