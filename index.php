<?php
require_once 'database.php';
class youcodetest{
    private $conn;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function adduser($username, $email , $password){
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "insert into users (Name_user,email,Password_user) values (?, ?, ?)";
        $stmt = $this -> conn->prepare($sql);
        $stmt -> execute([$username,$email,$hashpassword]);
        return $stmt->rowCount() > 0;
    }
    //readuser
    public function readUser($id){
        $sql = "select * from users where ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt -> execute($id);
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id,$username, $email , $password){
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        $sql = "update users set Name_user = ?,email = ?,Password_user = ? where ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username,$email,$hashpassword,$id]);

        return $stmt->rowCount()>0;
    }
    public function Delete($id){
        $sql = "DELETE FROM users WHERE ID = ?";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([$id]);
    }

}

// add user :
$db = new Database("localhost", "root", "", "hr1");
$user = new youcodetest($db->getConnection());
//$user->adduser("khalid","email@gmail.com","khalid");
var_dump($user);

// update user :
$user ->updateUser(6,"hahaha","casaaaa@","68");

$user -> Delete(6);