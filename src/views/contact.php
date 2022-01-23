<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');

    print_r(($_POST));
?>


<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

    <title>Επικοινωνία</title>
    <style>
        textarea{
            border: 1px solid rgba(0, 0, 0, 0.2);
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php 
        include(BASE_URL. 'includes\navbar.php'); 
    ?>

    <div class="container">
        <div class="auth-content d-flex justify-content-center align-items-center mt-5">
            <div class="col-12 d-flex justify-content-center" action="contact.php" method="post">
                <div class="col-md-4 p-2">
                    <h2 class="form-title fw-bold text-center mt-5">Φόρμα Επικοινωνίας</h2>
                    
                    <div class="pt-4">
                        <div>
                            <label class="fw-bold" for="name">Όνομα</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" id="name" placeholder="Όνομα" name="name" value=""  style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label class="fw-bold" for="surname">Επώνυμο</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" id="surname" placeholder="Επώνυμο" name="surname" value="" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <div>
                            <label class="fw-bold" for="email">Email</label>
                        </div>
                        <div class="mt-1">
                            <input type="email" id="email" placeholder="example@gmail.com" name="email" value="" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                   
                    <div class="mt-5">
                        <div>
                            <label class="fw-bold" for="ask">Ρωτήστε μας</label>
                        </div>
                        <div class="mt-1">
                            <textarea placeholder="Θέλω να ρωτήσω..." id="ask" name="comment" rows="5" cols="35" class="text-input pt-1"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center pt-4">
                        <button class="btn mb-3" style="color:white; background-color:#3366cc; width: 150px;" onclick="contact_success()">Αποστολή</button>
                    </div>
                    <div class="text-center">
                        <a style="text-decoration: none; color:black" href="/Doatap/index.php">Αρχική <i class="bi bi-house-door"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        include(BASE_URL. 'includes\footer.php'); 
    ?>
    <script type="text/javascript" src="scripts/contact.js"></script>
</body>

</html>