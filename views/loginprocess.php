<?php

    require_once ('../vendor/autoload.php');

    use Core\Utilities\Utilities;
    use Core\Messages\Messages;
    use Core\Users\Users;

    if(!isset($_SESSION)){session_start();}

    $objUser = new Users();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $objUser->setData($_POST);
    $userData = $objUser->viewSingleData();

    $pepper = $userData->pepper;

    $attemptedPassword = hash_hmac("sha256", $password, $pepper);

    $DBuserPassword = $userData->password;

    if (password_verify($attemptedPassword, $DBuserPassword)){
        $_SESSION['loggedIn'] = TRUE;
        $_SESSION['userID'] = $userData->id;
        Messages::setMessage('You\'re successfully logged in :)', 0);
        Utilities::redirect('index.php');
    }else{
        $_SESSION['loggedIn'] = FALSE;
       Messages::setMessage('Credentials are wrong !!', 1);
       Utilities::redirect('login.php');
    }

