<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');
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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../scripts.js"></script>
        <title>Επικοινωνία</title>

        <style>
            .breadcrumb-item a{
                text-decoration: none;
            }

            .breadcrumb-item.active{
                font-weight: bold;
            }

            .home-link a{
                text-decoration: none;
            }

            .home-link a:hover{
                text-decoration: underline;
            }
            
        </style>
    </head>
    <body>
        <?php 
            include(BASE_URL. 'includes\navbar.php'); 
        ?>
        
        <div class="container mt-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/index.php">Αρχική</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Επιτυχής Επικοινωνία</li>
                </ol>
            </nav>
        </div>

        <div class="container text-center d-flex align-items-center col-md-6 mb-5 mt-5">
            <h2>Γεια σας, <?php echo $_GET['name'] . ' '.$_GET['surname'] ?> πολύ σύντομα καποιος θα επικοινωνήσει μαζί σας μέσω email</h2>
        </div>

        <div class="home-link text-center">
            <a class="text-black-50" href="login.php"><i class="bi bi-caret-left-fill"></i>  Παμε πίσω</a>
        </div>
        
        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
    </body>
</html>