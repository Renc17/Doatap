<?php
include 'controllers/users.php';
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

  <title>Admin Register</title>
</head>
    <body>
        <div class="auth-content">
           
            <form action="admin-register.php" function="register" method="post">
                <h2 class="form-title">Register</h2>
                <div class="error"> <?php echo $errors['users'] ?? '' ?> </div>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="text-input" >
                    <div class="error"> <?php echo $errors['name'] ?? '' ?> </div>
                </div>
                <div>
                    <label>Surname</label>
                    <input type="text" name="surname" value="<?php echo $surname; ?>" class="text-input" >
                    <div class="error"> <?php echo $errors['surname'] ?? '' ?> </div>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email"  value="<?php echo $email; ?>" class="text-input">
                    <div class="error"> <?php echo $errors['email'] ?? '' ?> </div>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password"  value="<?php echo $password; ?>" class="text-input">
                    <div class="error"> <?php echo $errors['password'] ?? '' ?> </div>
                </div>
                <div>
                    <label>Password Confirmation</label>
                    <input type="password" name="confirm_password"  value="<?php echo $confirm_password; ?>" class="text-input">
                    <div class="error"> <?php echo $errors['confirm_password'] ?? '' ?> </div>
                </div>
                <div>
                    <button type="submit" name="admin" value="admin" class="btn btn-big">Register</button>
                </div>
            </form>

            
        </div>
    </body>
</html>