<div class="card-body">
    <h4>Sign Up</h4>
    <form action="signup.php" method="post" id="signupForm">
        <div class="form-group">
            <input placeholder="Username" class="form-control" required id="signupUsername" type="text" name="signupUsername"/>
        </div>
        <div class="form-group">
            <input placeholder="Email" class="form-control" id="signupEmail" type="email" name="signupEmail"/>
        </div>
        <div class="form-group">
            <input placeholder="Password" class="form-control" required id="signupPassword" type="password" name="signupPassword"/>
        </div>
        <div class="form-group">
            <input placeholder="Confirm" class="form-control" required id="confirmPassword" type="password" name="confirmPassword"/>
        </div>
        <div class="form-group">
            <button type="submit" name="signupSubmit" id="signupSubmit" class="btn btn-primary float-right">Register</button>
        </div>
    </form>
    <a href="index.php">Log In</a>
</div>