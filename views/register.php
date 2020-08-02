<?php
    require_once ('../vendor/autoload.php');

    use Core\Elements\Elements;
    use Core\Messages\Messages;

    $message = Messages::message();

    $elements = new Elements();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <?php
    $elements->topElements();
    ?>

</head>
<body>

    <div class="container col-sm-3" id="formWrapper">
        <form action="process.php" method="post">

            <div class="form-group">
                <h1>Sign Up</h1>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button class="btn btn-primary col-sm-5 offset-3">Sign Up</button>
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