<?php
    require_once ('../vendor/autoload.php');

    use Core\Elements\Elements;
    use Core\Messages\Messages;
    use Core\Utilities\Utilities;

    $message = Messages::message();

    $elements = new Elements();

    if (isset($_SESSION['loggedIn']) && isset($_SESSION['userID'])){
        Messages::setMessage('You\'re already logged in :)', 0);
        Utilities::redirect('index.php');
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <?php
    $elements->topElements();
    ?>

</head>
<body>

    <div class="container col-sm-3" id="formWrapper">
        <form action="loginprocess.php" method="post">

            <div class="form-group">
                <h1>Login</h1>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button class="btn btn-success col-sm-5 offset-3">Login</button>
            </div>
        </form>
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