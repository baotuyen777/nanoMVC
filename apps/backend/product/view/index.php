<div class="container">
    <div class="function">
        <a class="btn btn-success" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail') ?>">Add</a>
        <button type="button" class="btn btn-danger" href="#"
                onclick="del('<?php echo Helper::getPermalink('backend/' . $this->module . '/delete') ?>')" >Delete</button>
        <hr/>
    </div>
    <table class="table">
        <tr>
            <th><input type="checkbox" class="masCheck"></th>
            <th>STT</th>
            <?php
            foreach ($this->model as $field => $val):
                if ($field == 'id' || $field == 'content')
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
                $imgSrc = $arrSingle->image == '' ? NO_IMAGE : TIMTHUMB_LINK . $arrSingle->image . '&h=50&w=100';
                ?>
                <tr>
                    <td><input type="checkbox" class="ick" name="ckc[]" value="<?php echo $arrSingle->id ?>"></td>
                    <td><?php echo $i ?></td>
                    <?php // foreach ($this->model as $field => $val):  ?>
                    <!--<td><?php // echo $arrSingle->$field                       ?></td>-->
                    <?php // endforeach;   ?>
                    <td>
                        <a  href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail/') . $arrSingle->id ?>">
                            <?php echo $arrSingle->name ?>
                        </a>
                    </td>
                    <td><?php echo $arrSingle->slug ?></td>
                    <td><?php echo $arrSingle->price ?></td>
                    <td><?php echo $arrSingle->sale ?>%</td>
                    <td><?php echo $arrSingle->cat_id ?></td>
                    <td><?php echo $arrSingle->description ?></td>

                    <td>
                        <img class="img-list" 
                             src="<?= $imgSrc ?>"/>
                    </td>
                    <td>
                        <?php $checkedHot = $arrSingle->is_hot ? 'checked' : '' ?>
                        <input type="checkbox" <?php echo $checkedHot ?>  name="is_hot" value="1" 
                               onchange="toggleHot(this, <?php echo $arrSingle->id ?>)"></td>
                    <td><?php echo $arrSingle->status ?></td>
                    <td>
                        <button type="button" class="btn btn-danger" 
                                onclick="del('<?php echo Helper::getPermalink('backend/' . $this->module . '/delete') ?>',<?php echo $arrSingle->id ?>)">
                            Delele</button>
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

</div> <!-- /container -->

<script type="text/javascript">
    function toggleHot(elm, id) {
        console.log(id)
        let isHot = $(elm).is(":checked") ? 1 : 0;
        jQuery.ajax({
            type: "POST",
            url: '<?php echo Helper::getPermalink('backend/product/togglehot/') ?>' + id,
            data: {isHot},
            success: function (result) {

            }
        });
    }
</script>