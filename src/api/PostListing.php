<?php
    session_start();
    require_once __DIR__.'\..\services\PostService.php';
    
    header('Content-type: application/json');

    $posts = PostService::retrievePostsByUser($_SESSION['user_id']);

    echo json_encode($posts);
?>