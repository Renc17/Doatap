<?php

require('../../config.php');
require(BASE_URL. '\src\helpers\middlewares\guard.php');
isLoggedIn();

require(BASE_URL.'\src\controllers\users.php');
$controller =  new UserController();
$controller->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <title>Login</title>
</head>
    <body>
        <div class="auth-content">
            <form method = 'post' action = 'login.php'>
                <h2 class="form-title">Login</h2>
                <div>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $controller->getEmail(); ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $controller->getPassword(); ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
                </div>
                <button class = 'btn btn-outline-info' type="submit" name="login" value='login' class="submit">Login</button>
            </form> 
            <a class="nav-link" href="register.php">Create Account</a>
        </div>
    </body>
</html>