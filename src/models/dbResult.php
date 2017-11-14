<?php 
    class DBResult {
        private $success;
        private $result;

        public function __construct(bool $success, $result) {
            $this->success = $success;
            $this->result = $result;
        }

        public function getResult() {
            return $this->result;
        }

        public function getSuccess() : bool {
            return $this->success;
        }

    }
?>