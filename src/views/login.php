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
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <title>Σύνδεση</title>

    <style>
        .auth-content{
            box-shadow: -1px 8px 50px 5px rgba(186,184,184,0.59);
        }
        
        .vl{
            border-left: 3px solid rgba(186,184,184,0.59);
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-start mt-5">
            <img style="object-fit:contain; width:20%" src="../../images/logo2.png" alt="Logo">
        </div>
       
        <br>
        <br>

        <div class="d-flex flex-row justify-content-around align-items-center">

            <div class="signup-link">
                <div class="d-flex mt-4 justify-content-center">
                    <h5 class="fw-bold">Δεν έχεις λογαριασμό;</h5>
                </div>
                <div class="d-flex mt-2 mb-5 justify-content-center">
                    <button type="button" class='btn' onclick="location.href='register.php'" style="color:white; background-color:#0071bc; width: 150px;" name="register">Κάνε εγγραφή</button>
                </div>
                <div class="text-center">
                    <a style="color:black" href="/Doatap/index.php">Αρχική <i class="bi bi-house-door"></i></a>
                </div>
            </div>

            <div class="vl"></div>

            <div class="auth-content d-flex justify-content-center col-md-5">
                <form class="col-12 d-flex justify-content-center" method='post' action='login.php'>
                    <div class="col-12 p-5">
                        <h2 class="form-title fw-bold text-center mt-5">Σύνδεση</h2>
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

                        <br />

                        <div class="d-flex mt-4 justify-content-between">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label p-1" for="flexCheckDefault">
                                    Θυμίσου με
                                </label>
                            </div>
                            <div>
                                <button class='btn' style="color:white; background-color:#0071bc; width: 150px;" type="submit" name="login" value='login' class="submit">Σύνδεση</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>