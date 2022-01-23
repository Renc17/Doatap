<?php

?>

<!DOCTYPE html>
<html lang="el">
<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <style>
        *{
            color: #0071bc;
        }
        .breadcrumb-item a{
            text-decoration: none;
        }
        .breadcrumb-item.active{
            font-weight: bold;
        }
        .btn-apply {
            padding: 13px;
            border: 1px solid #0071bc;
            background-color: #04AA6D;
        }
        .btn-apply a{
            color: white;
            font-weight: bold;
        }
        .btn-apply a:hover{
            color: white;
            background-color: #04AA6D;
        }
        a { 
            text-decoration: none;
        }
        
        .choice:hover { 
            transform: scale(1.1); 
        }
        .choice{
            box-shadow: inset 0px 0px 10px 2px rgba(0,0,0,0.26);
            background-color: white;
            margin: 0 10px 0;
            padding-right: 5px;
            border-radius: 10px;
            transition: all .2s ease-in-out; 
        }
        .choice i{
            color: #0071bc;
            font-size: 90px;
        }

        i{
            font-size: 30px;
        }

        .choice button:hover{
            color: white;
        }

        .guide-step {
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;  
            border-radius: 50%;
            display: inline-block;
            opacity: 0.4;
        }

        .guide-step.active {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php 
        require('../../config.php');
        require(BASE_URL. 'helpers\middlewares\guard.php');
        include(BASE_URL. 'includes\navbar.php'); 
    ?>

    <div class="container mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/index.php">Αρχική</a></li>
                <li class="breadcrumb-item active" aria-current="page">Αίτηση Αναγνώριση</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h1 class="fw-bolder">Ποιά είναι η διαδικασία Αναγνώρισης Πτυχίου;</h1>
        <div class="d-flex justify-content-center mt-4 align-items center">

            <a class="choice col-md-2 d-flex flex-column" href="/Doatap/src/views/faq.php">
                <div class="m-auto"><i class="bi bi-box-arrow-in-right"></i></div>
                <div class="col-md-12 pe-3 ps-3 pb-5 d-flex flex-column">
                    <div class="text-center fw-bolder">Κάνε Εγγραφή</div>
                    <p class="text-center mt-2" style="font-weight: lighter;">Μετά την εγγραφή θα βρείτε στο προφιλ σας την φόρμα αίτησεις</p>

                    <div style="text-align:center;margin-top:40px;">
                        <span class="guide-step active"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="ms-2 text-black-50">NEXT</span>
                    </div>

                </div>
            </a>
            
            <a class="choice col-md-2 d-flex flex-column" href="/Doatap/src/views/faq.php">
                <div class="m-auto pt-3 mb-4"><i class="bi bi-ui-checks"></i></div>
                <div class="col-md-12 pe-3 ps-3 pb-5 d-flex flex-column">
                    <div class="text-center fw-bolder">Συμπληρώσετε την Αίτηση</div>
                    <p class="text-center mt-2" style="font-weight: lighter;">Συμπληρώστε τα στοιχεία και ανεβάστε τα δικαιολογητικά</p>

                    <div style="text-align:center;margin-top:40px;">
                        <span class="guide-step"></span>
                        <span class="guide-step active"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="ms-2 text-black-50">NEXT</span>
                    </div>
                </div>
            </a>

            <a class="choice col-md-2 d-flex flex-column" href="/Doatap/src/views/faq.php">
                <div class="m-auto"><i class="bi bi-credit-card-2-back"></i></div>
                <div class="col-md-12 pe-3 ps-3 pb-5 d-flex flex-column">
                    <div class="text-center fw-bolder">Κάνε Πληρωμή</div>
                    <p class="text-center mt-2" style="font-weight: lighter;">Η πληρωμή γίνεται με ασφάλεια μέσω της πλατφορμας του ΔΟΑΤΑΠ</p>

                    <div style="text-align:center;margin-top:40px;">
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step active"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="ms-2 text-black-50">NEXT</span>
                    </div>
                </div>
            </a>

            <a class="choice col-md-2 d-flex flex-column" href="/Doatap/src/views/faq.php">
                <div class="m-auto"><i class="bi bi-truck"></i></div>
                <div class="col-md-12 pe-3 ps-3 pb-5 d-flex flex-column">
                    <div class="text-center fw-bolder">Διάλεξε Τρόπο Αποστολής</div>
                    <p class="text-center mt-2" style="font-weight: lighter;">Μπορείτε να επιλέξετε είτε e-statement είτε/και έντυπη</p>

                    <div style="text-align:center;margin-top:40px;">
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step active"></span>
                        <span class="guide-step"></span>
                        <span class="ms-2 text-black-50">NEXT</span>
                    </div>
                </div>
            </a>

            <a class="choice col-md-2 d-flex flex-column" href="/Doatap/src/views/faq.php">
                <div class="me-auto ms-auto mt-3"><i class="bi bi-file-pdf"></i></div>
                <div class="col-md-12 pe-3 ps-3 pb-5 mt-4 d-flex flex-column">
                    <div class="text-center fw-bolder">Παραλαβεται την Πραξη</div>
                    <p class="text-center mt-2 mb-1" style="font-weight: lighter;">Στο προφιλ σας βρισκεται το ψηφιακό έγγραφο</p>

                    <div style="text-align:center;margin-top:75px;">
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step"></span>
                        <span class="guide-step active"></span>
                        <span class="ms-2 text-black-50">DONE</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="d-flex justify-content-center"><button class="btn btn-apply mt-5 col-md-5"><a href="/Doatap/src/views/new-request.php">Κάνε Αίτηση</a></button></div>
    </div>

    <?php include(BASE_URL. 'includes\footer.php'); ?>
    <script type="text/javascript" src="/Doatap/src/views/scripts/faq.js"></script>
    <script type="text/javascript" src="/Doatap/src/views/scripts/edit.js"></script>
</body>

</html>