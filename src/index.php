<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>PHP Practice</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="public/css/index.css" type="text/css" />
    <body>
        <div class="container">
            <div class="row">
                <div class="absolute-center">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <?php require_once __DIR__ . '\public\views\login.php' ?>
                    <?php
                            require_once __DIR__ . '\services\auth.php';
                            if(!isset($_SESSION['username'])) { 
                                require_once 'public/views/login.php';
                            }
                            if(isset($_POST['submitType'])) {
                                if($_POST['submitType'] == 'login') {
                                    $isValid = Auth::validateLogin($_POST['username'], $_POST['password']);
                                    if($isValid) {
                                        header('location: profile.php');
                                    } else {
                                        echo '<div class="alert alert-danger">Invalid username/password combination</div>';
                                    }
                                } else {
                                    if($_POST['username2'] != null && ($_POST['password1'] == $_POST['confirm'])) {
                                        $newUser = new User($_POST['username1'], $_POST['password1'], $_POST['email']);
                                    }
                                }
                            }
                         
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="/public/js/index.js" type="text/javascript"></script>
    </body>
</html>

