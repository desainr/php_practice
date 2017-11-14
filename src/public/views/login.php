<div>
    <div id="loginFormContainer">
        <h4>Login</h4>
        <form action="index.php" method="post" id="loginForm">
            <input type="hidden" value="login" name="submitType"/>
            <div class="form-group">
                <input placeholder="Username" class="form-control" id="loginUsername" type="text" name="username"/>
            </div>
            <div class="form-group">
                <input placeholder="Password" class="form-control" id="loginPassword" type="password" name="password"/>
            </div>
            <div class="form-group">
                <input type="submit" name="login" id="loginSubmit" class="btn btn-primary float-right"/>
            </div>
        </form>
        <a href="#" class="toggle-auth" >Sign Up</a>
    </div>

    <div id="signupFormContainer" style="display:none">
        <h4>Sign Up</h4>
        <form action="index.php" method="post" id="signupForm">
            <input type="hidden" value="signup" name="submitType"/>
            <div class="form-group">
                <input placeholder="Username" class="form-control" required id="signupUsername" type="text" name="username2"/>
            </div>
            <div class="form-group">
                <input placeholder="Email" class="form-control" id="signupEmail" type="email" name="email"/>
            </div>
            <div class="form-group">
                <input placeholder="Password" class="form-control" required id="signupPassword" type="password" name="password2"/>
            </div>
            <div class="form-group">
                <input placeholder="Confirm" class="form-control" required id="confirmPassword" type="password" name="confirm"/>
            </div>
            <div class="form-group">
                <input type="submit" name="signup" id="signupSubmit" class="btn btn-primary float-right"/>
            </div>
        </form>
        <a href="#" class="toggle-auth">Login</a>
    </div>
</div>
