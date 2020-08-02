<?php


namespace Core\Messages;

    if (!isset($_SESSION)){session_start();}

class Messages
{
    public static function setMessage($msg, $verify){
        $_SESSION['message'] = $msg;
        $_SESSION['verify'] = $verify;
    }

    public static function getMessage(){
        $message = array();
        if (isset($_SESSION['message']) && isset($_SESSION['verify'])){
            $message[0] = $_SESSION['message'];
            $message[1] = $_SESSION['verify'];
            $_SESSION['message'] = '';
            $_SESSION['verify'] = '';
        }else{
            $_SESSION['message'] = '';
            $_SESSION['verify'] = '';
        }
        return $message;
    }

    public static function message($message = NULL, $verify = NULL){
        if(is_null($message)){
            $message = self::getMessage();
            return $message;
        }else{
            self::setMessage($message, $verify);
        }
    }

}