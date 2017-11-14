$(function() {
    $('#loginSubmit').on('click', function(e) {
        e.preventDefault();
        if($('#loginUsername').val() && $('#loginPassword').val()) {
            $('#loginForm').submit();
        }
    });

    $(".toggle-auth").on('click', function() {
        $("#signupFormContainer").toggle();
        $("#loginFormContainer").toggle();
    });

    $("#signupSubmit").on('click', function(e) {
        e.preventDefault();
        if($("#signupPassword").val() !== $("#confirmPassword").val()) {
            alert("Passwords don't match!");
        } else {
            $("#signupForm").submit();
        }
    })
});