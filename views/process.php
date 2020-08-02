<?php

    require_once ('../vendor/autoload.php');

    use Core\Users\Users;
    use Core\Elements\Elements;

    $objUsers = new Users();

    $pepper = new Elements();
    $pepper = $pepper->generatePepper();

    $password = $_POST['password'];

    $password_prepared = hash_hmac("sha256", $password, $pepper);

    $_POST['pepper'] = $pepper;

    $password_hashed = password_hash($password_prepared, PASSWORD_BCRYPT, ["cost" => 10]);

    $_POST['password'] = $password_hashed;

    $objUsers->setData($_POST);

    $objUsers->storeData();