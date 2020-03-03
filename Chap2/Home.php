<!DOCTYPE html>
<?php
require_once "functions.php";
$posts = getAllPostsComm();
?>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Facebook Theme Demo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
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
                                    <div class="col-sm-5">

                                        <div class="panel panel-default">
                                            <div class="panel-thumbnail"><img src="assets/img/bg_5.jpg" class="img-responsive"></div>
                                            <div class="panel-body">
                                                <p class="lead">Urbanization</p>

                                                <p>45 Followers, <?= count($posts) ?> Posts</p>

                                                <p>
                                                    <img src="assets/img/uFp_tsTJboUY7kue5XAsGAs28.png" height="28px" width="28px">
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- main col right -->
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <?php
                                        foreach ($posts as $unPost):
                                            ?>
                                            <div class="d-flex flex-column bd-highlight mb-3">
                                                <div class="col-sm-7 p-2 bd-highlight">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Post du <?= $unPost["creationDate"] ?></h4></div>
                                                        <div class="panel-body">
                                                            <p><?= $unPost["commentaire"] ?></p>
                                                            <div class="clearfix">
                                                                <p>
                                                                    <?php
                                                                    $images = getMediaByIdPost($unPost["idPost"]);
                                                                    if ($images == TRUE):
                                                                        foreach ($images as $image):
                                                                            ?>
                                                                            <?php
                                                                            $typeFinal = explode("/", $image["typeMedia"]);
                                                                            
                                                                            if ($typeFinal[0] == "video"): ?>
                                                                                <video src="./ImagesPosts/<?= $image["nomMedia"] ?>" controls loop autoplay height="200"></video>;
                                                                            <?php endif; ?>
                                                                                
                                                                            <?php if ($typeFinal[0] == "image"): ?>
                                                                                <img src="./ImagesPosts/<?=$image["nomMedia"] ?>" height="200"></img>
                                                                            <?php endif; ?>
                                                                                
                                                                            <?php if ($typeFinal[0] == "audio"): ?>
                                                                                <audio src="./ImagesPosts/<?= $image["nomMedia"] ?>" controls height="200"></audio>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

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


                            </div><!-- /col-9 -->
                        </div><!-- /padding -->
                    </div>
                    <!-- /main -->

                </div>
            </div>
        </div>
    </body></html>