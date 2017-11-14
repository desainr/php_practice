<?php 
    class Connection {

        private $connection; 

        public function __construct() {
            $dsn = 'sqlsrv:Server=(local) ; Database=PHPPractice;';
            $user = 'HMBNET\ndesai';
            $this->connection = new PDO($dsn, $user, '');
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