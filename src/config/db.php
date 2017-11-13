<?php 
    class Connection {
        private $dsn = 'mssql:dbname=PHPPractice;host=127.0.0.1';
        private $user = "HMBNET\\ndesai";
        private $connection; 

        public function __construct() {
            try {
                $this->connection = new PDO($dsn, $user, '');
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage(); 
            } 
        }

        public function query(string $sql, array $params = null) : PDOStatement {
            if($params != null) {
                $stmt = $this->connection->prepare($sql)->execute($params);
                return $stmt;
            } else {
                $query = $this->connection.query($sql)->execute();
                return $query;
            }
        }
    }
?>