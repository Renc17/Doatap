<?php
require('../../config.php');
require(BASE_URL. 'controllers\users.php');
$controller =  new UserController($database);
$controller->register();
?>


<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>Εγγραφή</title>

    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container" style="height:100vh;">
        <div class="d-flex justify-content-center mt-5">
            <img style="object-fit:contain; width:20%" src="../../images/logo2.png" alt="Logo">
        </div>
        
        <hr/>
        <br>

        <div class="auth-content d-flex justify-content-center align-items-center mt-5" style="height:50vh;">
            <form class="col-12 d-flex justify-content-center" action="register.php" method="post">
                <div class="col-md-5 col-sm-12">
                    <h2 class="form-title fw-bold text-center mt-5">Εγγραφή</h2>
                    <div class="error"> <?php echo $controller->getErrors('users') ?? '' ?> </div>

                    <div class="mt-3 d-flex justify-content-around">
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="name">Όνομα</label>
                            </div>
                            <div class="mt-1">
                                <input type="text" id="name" placeholder="Όνομα" name="name" value="<?php echo $controller->getName(); ?>"  style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                            </div>
                        </div>

                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="surname">Επώνυμο</label>
                            </div>
                            <div class="mt-1">
                                <input type="text" id="surname" placeholder="Επώνυμο" name="surname" value="<?php echo $controller->getSurname(); ?>"style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-around">
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="email">Email</label>
                            </div>
                            <div class="mt-1">
                                <input type="email" id="email" placeholder="example@gmail.com" name="email" value="<?php echo $controller->getEmail(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                            </div>
                        </div>

                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="confirm email">Επαλήθευση Email</label>
                            </div>
                            <div class="mt-1">
                                <input type="email" id="confirm email" placeholder="example@gmail.com" name="confirm_email" value="<?php echo $controller->getEmail(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('confirm_password') ?? '' ?> </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3 d-flex justify-content-around">
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="password">Κωδικός</label>
                            </div>
                            <div class="mt-1">
                                <input type="password" id="password" placeholder="Κωδικός" name="password" value="<?php echo $controller->getPassword(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('password') ?? '' ?> </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="confirm password">Επαλήθευση Κωδικού</label>
                            </div>
                            <div class="mt-1">
                                <input type="password" id="confirm password" placeholder="Κωδικός" name="confirm_password" value="<?php echo $controller->getConfirmPassword(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('confirm_password') ?? '' ?> </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-around">
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="afm">ΑΦΜ</label>
                            </div>
                            <div class="mt-1">
                                <input type="text" id="afm" placeholder="ΑΦΜ" name="afm" value="<?php echo $controller->getAFM(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('afm') ?? '' ?> </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div>
                                <label class="fw-bold" for="amka">ΑΜΚΑ</label>
                            </div>
                            <div class="mt-1">
                                <input type="text" id="amka" placeholder="ΑΜΚΑ" name="amka" value="<?php echo $controller->getAMKA(); ?>" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                                <div class="error"> <?php echo $controller->getErrors('amka') ?? '' ?> </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" name="register" value="user" class="btn" style="color:white; background-color:#3366cc; width: 150px;">Εγγραφή</button>
                    </div>
                    <div class="text-center">
                        <a style="text-decoration: none; color:black" href="/Doatap/index.php">Αρχική <i class="bi bi-house-door"></i></a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>