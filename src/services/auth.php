<?php 

require_once __DIR__ . '\..\config\db.php';
require_once __DIR__ . '\..\models\user.php';

class Auth {    
    public static function createUser(User $user) {
        $connection = new Connection();
        $date = date('YMD h:i:s A');
        $hashedPassword = hashPassword($user->getPassword());
        $connection->query('INSERT INTO users (username, password, email, GETDATE()) VALUES (:username, :password, :email)',
        ["email"=>$user->getEmail(), "password"=>$hashedPassword, "email"=>$user->getEmail()]);
    }

    public static function validateLogin(string $username, string $password) : bool {
        $connection = new Connection();
        
        if($username != null && $password != null) {
            $hashedPassword = $connection->query('SELECT password FROM users WHERE username = :username', ["username"=>$username]);
            if(verifyHash($password, $hashedPassword)) {
                return true;
            } else {
                return false;
            }
        }
    }

    private function hashPassword(string $password) : string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function verifyHash(string $password, string $hash) : bool {
        return password_verify($password, $hash);
    }
}

?>