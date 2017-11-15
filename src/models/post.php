<?php 
    require_once __DIR__.'/./user.php';
    class Post {
        private $text;
        private $create_date; 
        private $user_id;

        public function __construct(string $text, String $create_date, int $user_id) {
            $this->text = $text;
            $this->create_date = $create_date;
            $this->user_id = $user_id;
        }

        public function getText() : string {
            return $this->text;
        }
        public function getUserId() : int {
            return $this->user_id;
        }
        public function getCreateDate() : string {
            return $this->create_date;
        }
        public function setText(string $text) {
            $this->text = $text;
        }
        public function setCreateDate(string $create_date) {
            $this->create_date = $create_date;
        }
        public function setUserId(int $user_id) {
            $this->user_id = $user_id;
        }

    }
?>