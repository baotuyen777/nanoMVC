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
            <th>Code</th>
            <th>Customer</th>
            <th>Detail</th>
            <th>Total</th>
            <th>Date</th>
            <th>Payment status</th>
            <th>Payment method</th>
            <th>Note</th>
            <th>Action</th>
        </tr>
        <?php
        $arrPs = array(
            1 => 'Pending',
            2 => 'Done'
        );
        $arrPm = array(
            1 => 'Direct',
            2 => 'Bank tranfer'
        );
        if (!empty($this->arrAll)):
            $i = 0;
            $orderController = new ordersController('backend', 'orders');
            foreach ($this->arrAll as $arrSingle):
                $i++;
                ?>
                <tr>
                    <td><input type="checkbox" class="ick" name="ckc[]" value="<?php echo $arrSingle->id ?>"></td>
                    <td>
                        <a  href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail/') . $arrSingle->id ?>">
                            #<?php echo $arrSingle->id ?>
                        </a>
                    </td>
                    <?php // foreach ($this->model as $field => $val):  ?>
                <!--<td><?php // echo $arrSingle->$field                                   ?></td>-->
                    <?php // endforeach;   ?>
                    <td>
                        <a  href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail/') . $arrSingle->id ?>">
                            <?php echo $arrSingle->user_name ?>
                            <br>
                        </a>
                        <?php echo $arrSingle->phone ?>
                    </td>
                    <td>
                        <?php
                        $orderController->showOrderDetail($arrSingle->id);
                        ?>
                    </td>
                    <td><?php echo number_format($arrSingle->total) ?> VND</td>
                    <td><?php echo $arrSingle->date ?></td>
                    <td><?php echo $arrPs[$arrSingle->payment_status] ?></td>
                    <td><?php echo $arrPm[$arrSingle->payment_method]?></td>
                    <td><?php echo $arrSingle->note ?></td>
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