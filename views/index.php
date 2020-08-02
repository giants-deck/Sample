<?php
    require_once ('../vendor/autoload.php');

    use Core\Elements\Elements;
    use Core\Messages\Messages;
    use Core\Users\Users;
    use Core\Utilities\Utilities;

    $message = Messages::message();

    $elements = new Elements();

    $userData = new Users();


    if(isset($_SESSION['loggedIn']) && isset($_SESSION['userID'])){
        $_GET['id'] = $_SESSION['userID'];
        $userData->setData($_GET);
        $userData = $userData->viewDataByID();

        if (isset($_GET['logout']) == 'yes'){
            session_destroy();
            Utilities::redirect('login.php');
        }

    }else{
        Messages::setMessage('You have to login to gain access!', 2);
        Utilities::redirect('login.php');
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

    <?php
        $elements->topElements();
    ?>

</head>
<body>

    <a href="index.php?logout=yes">
        <button class="btn btn-danger">Logout</button>
    </a>

    <div class="container">
        <h1 class="alert alert-success small">Hello <?php echo $userData->name;?></h1>
    </div>


    <?php
    if (!empty($message[0])){
        $elements->toast($message[0], $message[1]);
    }
    ?>

</body>

    <?php
         $elements->bottomElements();
    ?>

</html>