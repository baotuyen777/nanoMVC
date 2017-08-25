<div class="container">
    <?php
    $mes = $this->mes;
    $status = $this->status;
    ?>
    <h1>Notice</h1>
    <div class="alert alert-<?php echo ($status) ? 'success' : 'danger' ?> alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo ($status) ? 'Success' : 'Error' ?>!</strong> <?php echo $mes ?>
    </div>
    <div class="form-action">
        <a class="btn btn-default" href="<?php echo SITE_ROOT ?>/?url=backend/user/" >Return</a>
    </div>

</div> <!-- /container -->