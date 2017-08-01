</main>
</div><!--wrap main-->

<footer class="footer">
    <div class="container">
        <p class="text-muted">This is footer.</p>
    </div>
</footer>

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