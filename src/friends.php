<?php session_start(); 
    if(!isset($_SESSION['username'])) {
        header('location: index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Friends</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="public/css/index.css" type="text/css" />
    </head>
    <body>
        <?php
            include './public/components/nav.php'
        ?>

        <?php include 'public/components/scripts.php' ?>
        <script src="./public/js/timeline.js"></script>
    </body>
</html>