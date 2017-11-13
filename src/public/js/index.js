$(function() {
    $('#loginSubmit').on('click', function(e) {
        e.preventDefault();
        if($('#loginUsername').val() && $('#loginPassword').val()) {
            $('#loginForm').submit();
        }
    })
});