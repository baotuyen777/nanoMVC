<?php
$arrSingle = $this->arrSingle;
$imgSrc = $this->arrSingle->image == '' ? '' : SITE_ROOT . 'libs/timthumb.php?src=' . SITE_ROOT . "public/img/upload/" . $this->arrSingle->image . '&h=150&w=300';
?>
<style>
    #image{
        max-height: 200px;
    }
</style>
<div class="container">
    <h1>Detail</h1>
    <form class="form-horizontal" method="post" enctype="multipart/form-data"
          action="<?php echo Helper::getPermalink('backend/' . $this->module . '/update/') . $this->arrSingle->id ?>" >
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
                <input type="file" name="image" id="files">
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
    document.getElementById("files").onchange = function () {

        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };</script>
