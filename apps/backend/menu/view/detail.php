<?php
$arrSingle = $this->arrSingle;
?>
<style>
    #image{
        max-height: 200px;
    }
</style>
<div class="container">
    <h1>Detail</h1>
    <form class="form-horizontal form_ajax" method="post" enctype="multipart/form-data"
          action="<?php echo Helper::getPermalink('backend/' . $this->module . '/update/') . $this->arrSingle->id ?>" 
          data-url_list="<?php echo Helper::getPermalink('backend/' . $this->module)?>"
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
            <label class="control-label col-sm-2" >Parrent:</label>
            <div class="col-sm-10">
                 <input type="text" name="parent" value="<?php echo $arrSingle->parent ?>" class="form-control" id="link">
            </div>
        </div>
        
        <div class="form-action">
            <a class="btn btn-default" href="<?php echo Helper::getPermalink('backend/' . $this->module) ?>" >Return</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div> <!-- /container -->


