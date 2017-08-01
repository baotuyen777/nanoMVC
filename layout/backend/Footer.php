</main>
</div><!--wrap main-->

<footer class="footer">
    <div class="container">
        <p class="text-muted">This is footer.</p>
    </div>
</footer>
<!-- Modal -->
<div id="mediaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">

                <div class="wrap_list_media">
                    <div class="function">
                        <a class="btn btn-success" href="<?php echo Helper::getPermalink('backend/' . $this->module . '/detail') ?>">Add</a>

                    </div>
                    <div class="list_media">

                    </div>
                    <hr/>
                    <ul class="pagination">

                    </ul>

                </div> <!-- /container -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="chooseImage()" >Choose</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo SITE_ROOT ?>public/backend/js/main.js" type="text/javascript"></script>
<script src="<?php echo SITE_ROOT ?>/public/backend/js/jquery.validate.min.js"></script>
<script>

                    jQuery.ajax({
                        type: "GET",
                        url: '<?php echo Helper::getPermalink('backend/media/srv_all/1') ?>',
//        data: {"page": 1},
                        success: function (result) {
//            console.log(result);
                            let listMedia = '';
                            for (k in result.data) {
                                listMedia += '<a href="#"><img data-id="' + result.data[k].id + '" src="<?php echo TIMTHUMB_LINK ?>' + result.data[k].image + '<?= THUMBNAIL ?>"/></a>';
                            }
                            $('.list_media').append(listMedia);
                        }
                    });
</script>
</body>
</html>