<?php


namespace Core\Users;

use Core\Model\Database;
use Core\Messages\Messages;
use Core\Utilities\Utilities;
use PDO, PDOException;

class Users extends Database
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $pepper;
    public $soft_delete;

    public function setData($post = NULL){
        if(array_key_exists('id', $post)){
            $this->id = $post['id'];
        }

        if(array_key_exists('username', $post)){
            $this->username = $post['username'];
        }

        if(array_key_exists('email', $post)){
            $this->email = $post['email'];
        }

        if(array_key_exists('password', $post)){
            $this->password = $post['password'];
        }

        if(array_key_exists('pepper', $post)){
            $this->pepper = $post['pepper'];
        }

        if(array_key_exists('soft_delete', $post)){
            $this->soft_delete = $post['soft_delete'];
        }
    }

    public function storeData(){
        $dataArray = array($this->username, $this->email, $this->password, $this->pepper);
        $sql = "INSERT INTO users (username, email, password, pepper) VALUES (?,?,?,?)";
        $STH = $this->DBA->prepare($sql);
        $result = $STH->execute($dataArray);

        if($result){
            Messages::setMessage('Successfully Registered', 0);
            Utilities::redirect('register.php');
        }else{
            Messages::setMessage('Error! Not Registered, Please Try Again!', 1);
            Utilities::redirect('register.php');
        }
    }

    public function viewSingleData(){
        $sql = "SELECT * FROM users WHERE email = '".$this->email."' AND soft_delete = 'No'";
        $STH = $this->DBA->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }

    public function viewDataByID(){
        $sql = "SELECT username as name, email FROM users WHERE id = ".$this->id." AND soft_delete = 'No'";
        $STH = $this->DBA->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }
}