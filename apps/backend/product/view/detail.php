<div class="container">
    <?php
    $arrSingle = $this->arrSingleObject;
    ?>
    <h1>Detail</h1>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">name:</label>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $arrSingle->name ?>" class="form-control" id="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="price">Price:</label>
            <div class="col-sm-10">
                <input type="number" value="<?php echo $arrSingle->price ?>" class="form-control" id="price">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div> <!-- /container -->