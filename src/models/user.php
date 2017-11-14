<?php 
    class User {
        private $username;
        private $password;
        private $email; 

        public function __construct(string $username, string $password, string $email) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email ?? "";
        }

        public function setUsername(string $username) {
            $this->username = $username;
        }
        public function getUsername() : string {
            return $this->username;
        }
        public function setPassword(string $password) {
            $this->password = $password;
        }
        public function getPassword() : string {
            return $this->password;
        }
        public function setEmail(string $email) {
            $this->email = $email;
        }
        public function getEmail() : string {
            return $this->email;
        }
    }

?>