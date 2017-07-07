<div class="container">
    <?php
    $objects = $this->objects;
    ?>
    <div class="function">
        <a class="btn btn-success" href="<?php echo Helper::getPermalink('backend/user/detail') ?>">Add</a>
        <a class="btn btn-danger" onclick="deleteMulti(this)" data-href="<?php echo Helper::getPermalink('backend/user/delete') ?>">Delete</a>
        <hr/>
    </div>
    <table class="table">
        <tr>
            <th><input type="checkbox" class="masCheck"></th>
            <th>STT</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        if (!empty($objects)):
            $i = 0;
            foreach ($objects as $object):
                $i++;
                ?>
                <tr>
                    <td><input type="checkbox" class="ckcItem" name="ckc[]"></td>
                    <td><?php echo $i ?></td>
                    <td><?php echo $object->name ?></td>
                    <td><?php echo $object->email ?></td>
                    <td><?php echo $object->status ? 'active' : 'deactive' ?></td>
                    <td>
                        <a class="btn btn-warning" href="<?php echo Helper::getPermalink('backend/user/detail/') . $object->id ?>">Edit</a> &nbsp;
                        <a class="btn btn-danger" href="<?php echo Helper::getPermalink('backend/user/delete/') . $object->id ?>">Delele</a>
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
            <li><a href="<?php echo Helper::getPermalink('backend/user', "page=" . ($this->page -1)) ?>">Prev</a></li>
        <?php endif; ?>
        <?php
        for ($i = 1; $i <= $this->countPage; $i++):
            ?>
            <li><a href="<?php echo Helper::getPermalink('backend/user', "page={$i}") ?>"><?php echo $i ?></a></li>
        <?php endfor; ?>

        <?php if ($this->page < $this->countPage): ?>
            <li><a href="<?php echo Helper::getPermalink('backend/user', "page=" . ($this->page + 1)) ?>">Next</a></li>
        <?php endif; ?>
    </ul>

</div> <!-- /container -->