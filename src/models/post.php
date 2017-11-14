<?php 
    require_once __DIR__.'/./user.php';
    class Post {
        private $text;
        private $create_date; 
        private $user;

        public function __construct(string $text, Date $create_date, User $user) {
            $this->text = $text;
            $this->create_date = $create_date;
            $this->user = $user;
        }

        public function getText() : string {
            return $this->text;
        }
        public function getUser() : User {
            return $this->user;
        }
        public function getCreateDate() : Date {
            return $this->create_date;
        }
        public function setText(string $text) {
            $this->text = $text;
        }
        public function setCreateDate(Date $create_date) {
            $this->create_date = $create_date;
        }
        public function setUser(User $user) {
            $this->user = $user;
        }

    }
?>