<?php
require('../../config.php');
require(BASE_URL . '\src\controllers\users.php');
$controller =  new UserController();
$controller->register();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <title>Register</title>
</head>

<body>
    <div class="container" style="height:100vh;">
        </br>

        <div class="d-flex justify-content-center">
            <img style="object-fit:contain; width:20%" src="../../images/logo2.png" alt="Logo">
        </div>
        </br>
        <hr />
        <div class="auth-content d-flex justify-content-center align-items-center" style="height:50vh;">


            <form class="col-12 d-flex justify-content-center" action="register.php" method="post">
                <div class="col-4">

                    <h2 class="form-title fw-bold text-center">Register</h2>
                    <div class="error"> <?php echo $controller->getErrors('users') ?? '' ?> </div>
                    <div class="pt-4">
                        <div>
                            <label class="fw-bold">Όνομα</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Όνομα" name="name" value="<?php echo $controller->getName(); ?>"  style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Επώνυμο</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Επώνυμο" name="surname" value="<?php echo $controller->getSurname(); ?>"style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Email</label>
                        </div>
                        <div class="mt-1">
                            <input type="email" placeholder="example@gmail.com" name="email" value="<?php echo $controller->getEmail(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Κωδικός</label>
                        </div>
                        <div class="mt-1">
                            <input type="password" placeholder="Κωδικός" name="password" value="<?php echo $controller->getPassword(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Επαλήθευση Κωδικού</label>
                        </div>
                        <div class="mt-1">
                            <input type="password" placeholder="Κωδικός" name="confirm_password" value="<?php echo $controller->getConfirmPassword(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                            <div class="error"> <?php echo $controller->getErrors('confirm_password') ?? '' ?> </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" name="register" value="user" class="btn" style="color:white; background-color:#3366cc; width: 150px;">Εγγραφή</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>