<?php 
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location: index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="public/css/index.css" type="text/css" />
    </head>
    <body>
        <?php
            include './public/components/nav.php'
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                </div>
                <div class="col-xs-4">
                    <h4>Welcome <?php echo $_SESSION['username'] ?> </h4> 
                    <h6>Today is <?php echo date('M-d-Y') ?></h6>
                </div>
            </div> 
        </div>
        
        <?php include 'public/components/scripts.php' ?>        
        <script src="./public/js/profile.js"></script>
    </body>
</html>