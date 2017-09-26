<?php
$arrSingle = $this->arrSingle;
$imgSrc = NO_IMAGE;
//if (property_exists($this->arrSingle, 'image')) {
if ($arrSingle->image_id) {
    $imgSrc = $arrSingle->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $this->arrSingle->image . '&h=150&w=300';
}
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
            <label class="control-label col-sm-2" >Link:</label>
            <div class="col-sm-10">
                <input type="text" name="link" value="<?php echo $arrSingle->link ?>" class="form-control" id="link">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Content:</label>
            <div class="col-sm-10">
                <textarea name="content"  class="form-control" 
                          ><?php echo $this->arrSingle->content ?></textarea>
            </div>
        </div>
         <div class="form-group">
            <label class="control-label col-sm-2" >Image:</label>
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" onclick="loadImage()">Add Image</button>
                <input type="hidden" name="image_id" id="image_id">
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

<script>
    //    document.getElementById("files").onchange = function () {
    //
    //        var reader = new FileReader();
    //        reader.onload = function (e) {
    //            // get loaded data and render thumbnail.
    //            document.getElementById("image").src = e.target.result;
    //        };
    //        // read the image file as a data URL.
    //        reader.readAsDataURL(this.files[0]);
    //    };
</script>
