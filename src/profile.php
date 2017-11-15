<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: Index.php');
    }
        
    require_once __DIR__ . '\.\services\PostService.php';

    $posts = PostService::retrievePostsByUser($_SESSION['user_id']);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    
        <link rel="stylesheet" href="public/css/index.css" type="text/css" />
    </head>
    <body>
        <?php
            include __DIR__.'.\public\components\NavComponent.php'
        ?>
        <div class="container">
            <br class="clearfix"/>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h2><?php echo $_SESSION['username'] ?></h2>
                            <h6>Profile created: <?php echo $_SESSION['create_date']?></h6>
                            <img src="./public/images/profile.png" id="profilePicture"/> 
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header"><h3>Posts</h3></div>
                    </div>
                    <br />
                    <form id="profileNewPost" action="profile.php" method="post">
                        <?php echo '<input type="hidden" id="userId" value="'.$_SESSION['user_id'].'"/>'?>
                        <div class="form-group">
                            <textarea class="form-control" id="newPost" rows="4" cols="50" maxlength="140" name="newPost" placeholder="What's on your mind..."></textarea>
                        </div>
                        <div class="form-group">
                            <div class="pull-right">
                                <button class="btn btn-default" id="clearPost" type="reset">Clear</button>
                                <button class="btn btn-primary" id="createNewPostBtn" type="button">Post</button>
                            </div>
                        </div>
                        <?php 
                            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $newPost = new Post($_POST['text'], date('YMD h:i:s A'), $_SESSION['user_id']);
                                PostService::createNewPost($newPost);
                            }
                        ?>
                    </form>
                    <div id="postList">
                        
                    </div>
                </div>
                <div class="col-2">

                </div>
            </div> 
        </div>
        
        <?php include 'public/components/Scripts.php' ?>        
        <script src="./public/js/profile.js"></script>
    </body>
</html>
