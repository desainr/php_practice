<?php 

require_once __DIR__ . '\..\config\db.php';
require_once __DIR__ . '\..\models\user.php';
require_once __DIR__ . '\..\models\dbResult.php';

class Auth {    
    public static function createUser(User $user) : bool {
        $connection = new Connection();
        $date = date('YMD h:i:s A');
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        try {
            $insert = $connection->query('INSERT INTO users (username, password, email, create_date) VALUES (:username, :password, :email, GETDATE())',
            ["username"=>$user->getUsername(), "password"=>$hashedPassword, "email"=>$user->getEmail()]);
            return $insert->rowCount() > 0;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function validateLogin(string $username, string $password) : DBResult {
        $connection = new Connection();
    
        if($username != null && $password != null) {
            $result = $connection->query('SELECT id, username, password, create_date FROM users WHERE username = :username', ["username"=>$username]);
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user["password"])) {
                return new DBResult(true, $user);
            } else {
                return new DBResult(false, null);
            }
        }
    }

    public static function validateUsername(string $username) : bool {
        $connection = new Connection();
        
        try {
            $result = $connection->query('SELECT COUNT(*) FROM users WHERE username = :username', ["username"=>$username]);
            return $result->fetchColumn() == 0;
        } catch(Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>