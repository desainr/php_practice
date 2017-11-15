<?php
    session_start();
    require_once __DIR__.'\..\services\PostService.php';
    
    header('Content-type: application/json');

    function getUserPosts() {
        $posts = PostService::retrievePostsByUser($_SESSION['user_id']);
        echo json_encode($posts);
    }
        

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (empty($_GET)) {
            getUserPosts();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['action'] == "DELETE") {
            PostService::deletePost($_POST['postId']);
            getUserPosts();
        } else if ($_POST['action'] == 'EDIT') {
            PostService::editPost($_POST['postId'], $_POST['text']);
            getUserPosts();
        }
    }
?>
