<!DOCTYPE HTML>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="public/css/index.css" type="text/css" />
    <body>
        <div class="container">
            <div class="row">
                <div class="absolute-center">
                    <div class="col-sm-12 card">
                    <?php require_once __DIR__ . '\public\components\signupForm.php' ?>
                    </div>
                    <br />
                    <?php
                        require_once __DIR__ . '\services\auth.php';
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!Auth::validateUsername($_POST['username'])) {
                            echo '<div alert alert-danger>Username is already taken</div>';
                        } else {
                            if ($_POST['signupPassword'] != null && ($_POST['signupPassword'] == $_POST['confirmPassword'])) {
                                $newUser = new User($_POST['signupUsername'], $_POST['signupPassword'], $_POST['signupEmail']);
                                if (Auth::createUser($newUser)) {
                                    echo '<div alert alert-success>Account created. <a href="index.php">Login</a></div>';
                                } else {
                                    echo '<div alert alert-danger>An internal error occurred. Try again later.</div>';
                                }
                            } else {
                                echo '<div alert alert-danger>Passwords do not match.</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include 'public/components/scripts.php' ?>
        <script src="/public/js/index.js" type="text/javascript"></script>
    </body>
</html>

