
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>nanoMVC</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo SITE_ROOT ?>/public/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo SITE_ROOT ?>/public/backend/css/main.css" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo Helper::getPermalink('backend/') ?>">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../navbar/">Default</a></li>
                        <li><a href="../navbar-static-top/">Static top</a></li>
                        <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="wrap_main clearfix">
            <aside id="sidebar">
                <ul>
                    <li><a href="<?php echo Helper::getPermalink('backend/slider') ?>">Slider</a></li>
                    <li><a href="<?php echo Helper::getPermalink('backend/menu') ?>">Menu</a></li>
                    <li><a href="<?php echo Helper::getPermalink('backend/user') ?>">User</a></li>
                    <li><a href="<?php echo Helper::getPermalink('backend/product') ?>">Product</a></li>
                    <li><a href="<?php echo Helper::getPermalink('backend/media') ?>">Media</a></li>
                </ul>
            </aside>
            <main>