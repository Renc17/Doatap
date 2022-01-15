<?php

require('../../config.php');
require(BASE_URL . 'helpers\middlewares\guard.php');
isLoggedIn();

require(BASE_URL . 'controllers\users.php');
$controller =  new UserController($database);
$controller->login();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container" style="height:100vh;">
        </br>

        <div class="d-flex justify-content-center">
            <img style="object-fit:contain; width:35%" src="../../images/logo2.png" alt="Logo">
        </div>
        </br>
        <hr />
        <div class="auth-content d-flex justify-content-center align-items-center" style="height:50vh;">
            <form class="col-12 d-flex justify-content-center" method='post' action='login.php'>
                <div class="col-4">
                    <h2 class="form-title fw-bold text-center">Σύνδεση</h2>
                    <div class="pt-4">
                        <div>
                            <label class="fw-bold">Email</label>
                        </div>
                        <div>
                            <input type="text" placeholder="example@gmail.com" name="email" style="border:1px solid #d9dadc" value="<?php echo $controller->getEmail(); ?>" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div>
                            <label class="fw-bold">Κωδικός</label>
                        </div>
                        <div>
                            <input type="password" placeholder="Κωδικός" name="password" style="border:1px solid #d9dadc" value="<?php echo $controller->getPassword(); ?>" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="d-flex mt-4 justify-content-between">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label p-1" for="flexCheckDefault">
                                Θυμίσου με
                            </label>
                        </div>
                        <div>
                            <button class='btn' style="color:white; background-color:#3366cc; width: 150px;" type="submit" name="login" value='login' class="submit">Login</button>
                        </div>
                    </div>
                    <hr />

                    <br />
                    <div class="d-flex mt-4 justify-content-center">
                        <label class="fw-bold">Δεν έχεις λογαριασμό;</label>
                    </div>
                    <div class="d-flex mt-2 justify-content-center">
                        <button type="button" class='btn' onclick="location.href='register.php'" style="color:white; background-color:#3366cc; width: 150px;" name="register">Κάνε εγγραφή</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>