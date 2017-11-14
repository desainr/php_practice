const Posts = {
    init: function () {
        const self = this;

        $('#createNewPostBtn').on('click', function() {
            self.createNewPost();
        });
    },

    createNewPost: function () {
        $.ajax({
            method: 'POST',
            url: '/profile.php',
            data: {
                text: $('#newPost').val(),
                userId: $('#userId').val()
            }
        });
    }
};


$(function () {
    Posts.init();
});