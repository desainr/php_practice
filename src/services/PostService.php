<?php

    require_once __DIR__ .'\..\config\db.php';
    require_once __DIR__ .'\..\models\Post.php';

    class PostService {

        public static function createNewPost(Post $post) : bool {
            $connection = new Connection();
            if($post->getText() != null) {
                try {
                $result = $connection->query('INSERT INTO posts (user_id, text, create_date) VALUES (:user_id, :text, GETDATE())', ["user_id"=>$post->getUserId(), "text"=>$post->getText()]);
                return $result->rowCount() > 0; 
                } catch(Exception $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public static function editPost(int $postId, string $newText) : bool {
            $connection = new Connection();

            try {
                $result = $connection->query('UPDATE posts SET text = :text WHERE post_id = :post_id', ["text"=>$newText, "post_id"=>$postId]);
                return $result > 0;
            } catch(Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public static function deletePost(int $postId) : bool {
            $connection = new Connection();

            try {
                $result = $connection->query('DELETE FROM posts WHERE post_id = :post_id', ["post_id"=>$postId]);
                return $result > 0;
            } catch(Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public static function retrievePostsByUser(int $userId) {
            $connection = new Connection();
            
            try {
                $result = $connection->query('SELECT id, text, create_date FROM posts WHERE user_id = :user_id ORDER BY id DESC', ["user_id"=>$userId]);
                return $result->fetchAll(PDO::FETCH_ASSOC);
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>