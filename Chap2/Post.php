<!DOCTYPE html>
<?php
require_once "functions.php";
?>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/facebook.css" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">
            <div class="box">
                <div class="row row-offcanvas row-offcanvas-left">


                    <!-- main right col -->
                    <div class="column col-sm-9.full" id="main">

                        <!-- top nav -->
                        <div class="navbar navbar-blue navbar-static-top">  
                            <div class="navbar-header">
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="#" class="navbar-brand logo">b</a>
                            </div>
                            <nav class="collapse navbar-collapse" role="navigation">
                                <form class="navbar-form navbar-left">
                                    <div class="input-group input-group-sm" style="max-width:360px;">
                                        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="Home.php"><i class="glyphicon glyphicon-home"></i> Home</a>
                                    </li>
                                    <li>
                                        <a href="Post.php"><i class="glyphicon glyphicon-plus"></i> Post</a>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="">More</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- /top nav -->

                        <div class="padding">
                            <div class="full col-sm-9">

                                <!-- content -->                      
                                <div class="row">

                                    <!-- main col left --> 
                                    <div class="col-lg-7">

                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="upload.php" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                                        Update Status
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <textarea class="form-control input-lg" name="commentaire" autofocus="" placeholder="What do you want to share?"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <input type="submit" value="Post" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true"/>
                                                            <ul class="pull-left list-inline">
                                                                <li><!--<i class="glyphicon glyphicon-upload">-->
                                                                    <input type="file" name="pictures[]" title="Import pictures" accept="image/*, video/*, audio/*" multiple="true"/>
                                                                </li>
                                                            </ul>
                                                        </div>	
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- main col right -->
                                    <div class="col-sm-7">

                                    </div>
                                </div><!--/row-->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                                    </div>
                                </div>

                                <div class="row" id="footer">    
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">
                                        <p>
                                            <a href="#" class="pull-right">&copy Copyright 2013</a>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="text-center">
                                    <a href="http://usebootstrap.com/theme/facebook" target="ext">Download this Template @Bootply</a>
                                </h4>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body></html>