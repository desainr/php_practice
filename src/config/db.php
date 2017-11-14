<?php 
    class Connection {

        private $connection; 
        private $dsn = 'sqlsrv:Server=(local); Database=PHPPractice;';

        public function __construct() {
            try { 
            $this->connection = new PDO($this->dsn);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function query(string $sql, array $params = null) : PDOStatement {
            if($params != null) {
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($params);
                return $stmt;
            } else {
                $query = $this->connection.query($sql);
                $query->execute();
                return $query;
            }
        }
    }
?>