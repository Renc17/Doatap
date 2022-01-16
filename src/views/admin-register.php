<?php
    require('../../config.php');
    require(BASE_URL. 'controllers\users.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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