const Posts = {
    init: function () {
        const self = this;
        
        self.loadPosts();
        $('#createNewPostBtn').on('click', function() {
            self.createNewPost();
        });

        $(document).on('click', '.delete-post', function() {
            $('#deleteModal').modal('show');
            $('#deleteConfirm').data('post-id', $(this).data('postId'));
        });

        self.deletePosts();
        self.editPostSetup();
        self.confirmEdit();
        self.clearEdit();
    },

    deletePosts : function() {
        const self = this;
        $(document).on('click', '#deleteConfirm', function() {
            let postId = $(this).data('postId');

            $.ajax({
                method: 'POST',
                url: '/api/PostListing.php',
                dataType: 'json',
                data: {
                    action: 'DELETE',
                    postId: postId
                }
            }).done(function() {
                self.loadPosts();
                $('#deleteModal').modal('hide');
            });
        });
    },

    clearEdit : function() {
        const self = this;
        $(document).on('click', '.clear-edit', function() {
            self.loadPosts();
        });
    },
    confirmEdit : function() {
        const self = this;
        $(document).on('click', '.save-edit', function() {
            let postId = $(this).data('postId');
            let text = $('textarea[data-post-id="' + postId + '"]').val();
            $.ajax({
                method: 'post',
                url: '/api/PostListing.php',
                data: {
                    action: 'EDIT',
                    text: text,
                    postId: postId
                }
            }).done(function() {
                self.loadPosts();
            });
        });
    },

    editPostSetup : function() {
        $(document).on('click', '.edit-post', function() {
            let postId = $(this).data('post-id');
            $('textarea[data-post-id="' + postId + '"]').prop('readonly', false);
            $(this).removeClass('edit-post').addClass('save-edit');
            $(this).find('i').removeClass('fa-edit').addClass('fa-save').data('postId', postId);
            $('button.delete-post[data-post-id="' + postId + '"]').removeClass('delete-post').addClass('clear-edit').find('i').removeClass('fa-trash').addClass('fa-remove').data('postId', postId)
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
            url: '/api/PostListing.php',
            dataType: 'json'
        }).done(function(data) {
            $('#postList').empty();
            data.forEach(function(val) {
                let dateObj = new Date(val.create_date);
                let postItem = '<div class="card"><div class="card-body"><textarea readonly class="form-control" rows="2" cols="25" data-post-id="'+val.id+'">' + val.text + '</textarea></div>' + 
                '<div class="card-footer"><div class="pull-left">'+ dateObj.toLocaleString('en-US') + '</div>'+ 
                '<div class="pull-right"><button class="delete-post" data-post-id="'+val.id+'">' +
                '<i class="fa fa-trash"></i></button>' +
                '&nbsp;<button class="edit-post" data-post-id="'+val.id + '"><i class="fa fa-edit"></i></button></div>'+
                '</div></div>';
                $('#postList').append(postItem + '<br />');
            });
        });
    }
};


$(function () {
    Posts.init();
});