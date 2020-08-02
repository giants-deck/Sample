<?php


namespace Core\Model;

use PDO, PDOException;

class Database
{
    private $host = 'localhost';
    private $database = 'testcreatedatabase';
    private $user = 'root';
    private $password = '';

    public $DBA;

    public function __construct(){

        try{
            $this->DBA =  new PDO('mysql:host='.$this->host.'; dbname='.$this->database, $this->user, $this->password);
        }catch (PDOException $error){
            echo 'ERROR! connection not established.'.$error->getMessage();
        }

    }
}