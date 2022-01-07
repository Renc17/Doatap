<?php

require('../../config.php');
require(BASE_URL . '\src\helpers\middlewares\guard.php');
isLoggedIn();

require(BASE_URL . '\src\controllers\users.php');
$controller =  new UserController($database);
$controller->login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <title>Login</title>
</head>

<body>
    <div class="auth-content">
        <form method='post' action='login.php'>
            <h2 class="form-title">Login</h2>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $controller->getEmail(); ?>" class="text-input">
                <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $controller->getPassword(); ?>" class="text-input">
                <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
            </div>
            <button class='btn btn-outline-info' type="submit" name="login" value='login' class="submit">Login</button>
        </form>
        <a class="nav-link" href="register.php">Create Account</a>
    </div>
</body>

</html>