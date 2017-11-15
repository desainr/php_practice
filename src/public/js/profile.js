const Posts = {
    init: function () {
        const self = this;
        
        self.loadPosts();
        $('#createNewPostBtn').on('click', function() {
            self.createNewPost();
        });
    },

    createNewPost: function () {
        const self = this;
        $.ajax({
            method: 'POST',
            url: '/profile.php',
            data: {
                text: $('#newPost').val()
            }
        }).done(function() {
            self.loadPosts();
        });
    },

    loadPosts : function() {
        $.ajax({
            method: 'GET',
            url: '/api/postListing.php',
            dataType: 'json'
        }).done(function(data) {
            $('#postList').empty();
            data.forEach(function(val) {
                let postItem = '<div class="card"><div class="card-body">' + val.text + '</div><div class="card-footer">'+ val.create_date +'</div></div>'
                $('#postList').append(postItem + '<br />');
            });
            
            
        });
    }
};


$(function () {
    Posts.init();
});