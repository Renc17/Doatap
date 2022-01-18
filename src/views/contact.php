<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');
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
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>Επικοινωνία</title>
</head>

<body>
    <?php 
        include(BASE_URL. 'includes\navbar.php'); 
    ?>

    <div class="container">
        <div class="auth-content d-flex justify-content-center align-items-center mt-5">
            <form class="col-12 d-flex justify-content-center" action="contact.php" method="post">
                <div class="col-md-4 p-2">
                    <h2 class="form-title fw-bold text-center mt-5">Φόρμα Επικοινωνίας</h2>
                    
                    <div class="pt-4">
                        <div>
                            <label class="fw-bold">Όνομα</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Όνομα" name="name" value=""  style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Επώνυμο</label>
                        </div>
                        <div class="mt-1">
                            <input type="text" placeholder="Επώνυμο" name="surname" value="" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Email</label>
                        </div>
                        <div class="mt-1">
                            <input type="email" placeholder="example@gmail.com" name="email" value="" style="border:1px solid #d9dadc" class="text-input w-100 pt-1">
                        </div>
                    </div>
                   
                    <div class="mt-2">
                        <div>
                            <label class="fw-bold">Παραλήπτης</label>
                        </div>
                        <div class="mt-1">
                            <select name="gender" id="gender" class="form-select">
                                <option value="Διεύθυνση Αναγνώρισης Ακαδημαϊκών Τίτλων">Διεύθυνση Αναγνώρισης Ακαδημαϊκών Τίτλων</option>
                                <option value="Διεύθυνση Ενημέρωσης">Διεύθυνση Ενημέρωσης</option>
                                <option value="Διεύθυνση Διοικητικών και Οικονομικών Υπηρεσιών">Διεύθυνση Διοικητικών και Οικονομικών Υπηρεσιών</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div>
                            <label class="fw-bold">Σχόλια</label>
                        </div>
                        <div class="mt-1">
                            <textarea placeholder="" name="comment" rows="5" cols="50" class="text-input pt-1"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center pt-4">
                        <button type="submit" name="register" value="user" class="btn" style="color:white; background-color:#3366cc; width: 150px;">Αποστολή</button>
                    </div>
                    <div class="text-center">
                        <a style="text-decoration: none; color:black" href="/Doatap/index.php">Αρχική <i class="bi bi-house-door"></i></a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

    <?php 
        include(BASE_URL. 'includes\footer.php'); 
    ?>
</body>

</html>