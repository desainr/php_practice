<?php 
    class Connection {

        private $connection; 
        private $dsn = 'sqlsrv:Server=(local) ; Database=PHPPractice;';
        private $user = 'HMBNET\ndesai';
        
        public function __construct() {
            $this->connection = new PDO($this->dsn, $this->user, '');
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