<?php
    include '../components/AbstractComponent.php';
    class PostComponent extends AbstractComponent {
        
        public function __construct(Post $post) {
            $this->post = $post;
        }

        public function toComponent() {

        }
    }

?>