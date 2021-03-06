<?php 
    session_start();
    if(isset($_SESSION['username'])) {
        header('location: Profile.php');
    }
 ?>
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
                    <h1>Postr <i class="fa fa-id-badge"></i></h1>
                    <div class="col-sm-12 card">
                        <?php
                            require_once __DIR__ . '\services\AuthService.php';
                            if(!isset($_SESSION['username'])) { 
                                require_once 'public/components/LoginFormComponent.php';
                            }
                            if($_SERVER["REQUEST_METHOD"] == "POST") {
                                $result = Auth::validateLogin($_POST['loginUsername'], $_POST['loginPassword']);
                                if($result->getSuccess()) {
                                    $_SESSION["username"] = $result->getResult()["username"];
                                    $_SESSION["user_id"] = $result->getResult()["id"];
                                    $_SESSION["create_date"] = substr($result->getResult()["create_date"], 0, 10);
                                    header('location: Profile.php');
                                } else {
                                    echo '<div class="alert alert-danger auth-error">Invalid login</div>';
                                }
                            }
                        ?>
                    </div>
                    <br />
                </div>
            </div>
        </div>
        <?php include 'public/components/scripts.php' ?>        
        <script src="/public/js/index.js" type="text/javascript"></script>
    </body>
</html>

