<div class="container">
    <?php
    $objects = $this->objects;
    ?>
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php
        if (!empty($objects)):
            foreach ($objects as $object):
                ?>
                <tr>
                    <td><?php echo $object->name ?></td>
                    <td><?php echo $object->birthday ?></td>
                    <td><a href="<?php echo SITE_ROOT ?>/backend/user/detail/<?php echo $object->id ?>">Edit</a></td>
                </tr>
                <?php
            endforeach;
        endif;
        ?>
    </table>
    <ul class="pagination">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
    </ul>

</div> <!-- /container -->