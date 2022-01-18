<?php

require('../../config.php');
require(BASE_URL . 'controllers\forms.php');
require(BASE_URL . 'helpers\middlewares\guard.php');

$controller =  new FormController($database);
$formPreview = $controller->getFormPreview($_GET['id']);
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
    <title>Ανάγνωση</title>

    <style>
        label{
            font-weight: bold;
            padding-bottom: 2px;
        }

        .breadcrumb-item a{
            text-decoration: none;
        }
        .breadcrumb-item.active{
            font-weight: bold;
        }

        .modal{
            height: auto;
        }

        .modal-dialog{
            max-width: 100%;
            max-height: 100%;
        }

        .modal-content{
            background-color: transparent;
        }

        button.file{
            padding: 0;
            text-align: start;
        }

        .btn{
            border: 1px solid rgba(0, 0, 0, 0.5);
        }

        .step{
            border: 5px solid black;
            width: 15px;
            border-radius: 50%;
            opacity: 0.5;
            margin: 20px auto 20px ;
        }

        /* .name{
            margin: 0 0 40px 0;
        } */


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
                    <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/profile.php">Προφίλ</a></li>
                    <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/requests.php">Οι Αιτήσεις μου</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Πορεία Αίτησης</li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <h2 class="text-center mt-5"> Αναγνώριση ισοτιμίας</h2>
            <h6 class="text-center fw-lighter mb-5">Δημιουργήθηκε <i class="bi bi-dot"></i> <?php echo $formPreview['data'][35] ?></h6>
            <div class="d-flex justify-content-center">
                <a class="btn" href="/Doatap/src/views/preview.php?id=<?php echo $_GET['id']?>">Προεπισκόπηση</a> 
            </div>
            
            
            <div class="d-flex flex-column mt-5 ">
                <div class="row justify-content-center align-items-center step-1">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Υποβλήθηκε</div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center step-2">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Προέλεγχος</div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center step-3">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Αριθμός Πρωτοκόλλου</div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center step-4">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Εκτελέστικη Επιτροπή</div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center step-5">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Σχέδιο Πράξεις</div>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center step-6">
                    <div class="col-md-3">
                        <hr class="step">
                    </div>
                    <div class="col-md-3">
                        <div class="name">Η πράξη σας έχει αποσταλεί ηλεκτρονικά</div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
    </body>
</html>
