<div class="container">
    <?php
    $object = $this->object;
    ?>
    <h1>Detail</h1>
    <form class="form-horizontal" action="<?php echo Helper::getPermalink('backend/user/update/') . $object->id ?>" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Full name:</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="<?php echo $object->name ?>" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Email:</label>
            <div class="col-sm-10">
                <input <?php echo $object->id ? 'disabled' : '' ?> type="email" name="email" value="<?php echo $object->email ?>" class="form-control" id="price">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Password:</label>
            <div class="col-sm-10">
                <input type="password" name="password"  class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" >Status:</label>
            <div class="col-sm-10">
                <input type="checkbox" name="status" <?php echo $object->status === "0" ? '' : 'checked' ?> value="1"   >
            </div>
        </div>
        <div class="form-action">
            <a class="btn btn-default" href="<?php echo Helper::getPermalink('backend/user/') ?>" >Return</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div> <!-- /container -->