<?php
require('../../config.php');
require(BASE_URL. 'controllers\users.php');
$controller =  new UserController($database);
$controller->register();
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

  <title>Register</title>
</head>
    <body>
        <div class="auth-content">
           
            <form action="register.php" method="post">
                <h2 class="form-title">Register</h2>
                <div class="error"> <?php echo $controller->getErrors('users') ?? '' ?> </div>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $controller->getName(); ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                </div>
                <div>
                    <label>Surname</label>
                    <input type="text" name="surname" value="<?php echo $controller->getSurname(); ?>" class="text-input" >
                    <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email"  value="<?php echo $controller->getEmail(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password"  value="<?php echo $controller->getPassword(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
                </div>
                <div>
                    <label>Password Confirmation</label>
                    <input type="password" name="confirm_password" value="<?php echo $controller->getConfirmPassword(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('confirm_password') ?? '' ?> </div>
                </div>
                <div>
                    <button type="submit" name="register" value="user" class="btn btn-big">Register</button>
                </div>
            </form>
        </div>
    </body>
</html>