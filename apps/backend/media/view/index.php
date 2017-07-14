<div class="container">
    <div class="function">
        <a class="btn btn-primary " id="btn_add_file" href="#">Add File</a>
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
                    <td><input type="checkbox" class="ckcItem" name="ckc[]"></td>
                    <td><?php echo $i ?></td>
                    <?php // foreach ($this->model as $field => $val):  ?>
                    <!--<td><?php // echo $arrSingle->$field         ?></td>-->
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
                        <a class="btn btn-danger" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/delete/') . $arrSingle->id ?>">Delele</a>
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
<script>
    document.getElementById("btn_add_file").addEventListener('click', function () {
        document.getElementById('files').click();
    });
</script>