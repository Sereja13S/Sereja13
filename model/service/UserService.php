<?php
namespace model\service;

use model\entity\User;
class UserService {
    function add(User $user) {
        file_put_contents("/var/www/data/users/{$user->getName()}", serialize($user));
    }
    
    /**
     * @param string $name
     * @return User
     */
    function find($name) {
        $filename = "/var/www/data/users/$name";
        if (file_exists($filename)) {
            return unserialize(file_get_contents("/var/www/data/users/$name"));
        }
        return null;
    }
    
    function authorize($name, $password) {
        $user = $this->find($name);
        if (!empty($user)) {
            return $user->getPassword() === $password;
        }
        return false;
    }
    
    function getUserList() {//
        $users = [];//
        $stmt = \util\MySQL::$db->prepare("SELECT id, name, email, password FROM users");//
        
        $stmt->execute();//
        
        while ($item = $stmt->fetchObject('model\entity\User')) {//
            $users[] = $item;//
        }//
        
        return $users;//
    }//
    
    function findId($id) {//
        $stmt = \util\MySQL::$db->prepare("SELECT id, name, email, password FROM users WHERE id=:id");//
        $stmt->bindParam('id', $id);//
        $stmt->execute();//
        return $stmt->fetchObject('model\entity\User');//
    }
    
    function addUser(User $user) {//
        if (empty($user->getId())) {//
            $stmt = \util\MySQL::$db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password");//
        } else {//
            $stmt = \util\MySQL::$db->prepare("UPDATE users SET name=:name, email=:email, password=:password where id=:id");//
            $stmt->bindParam('id', $user->getId());//
        }//
        
        
        $stmt->bindParam('name', $user->getName());//
        $stmt->bindParam('email', $user->getEmail());//
        $stmt->bindParam('password', $user->getPassword());//
        
        return $stmt->execute();//
    }
}
