<!DOCTYPE html>
<html lang="el">
<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/Doatap/node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <style>
        .btn-more a{
            color: #0071bc;
            padding: 13px;
            border: 1px solid #0071bc;
        }
        .btn-more a:hover{
            color: white;
            background-color: #0071bc;
        }
        a{
            text-decoration: none;
            color: black;
        }
       
        .choice{
            background-color: #0071bc;
            margin: 0 10px 0;
            
            border-radius: 50%;
            height: 135px;
            width: 135px;
        }
        .choice i{
            color: white;
            font-size: 42px;
        }

        i{
            font-size: 37px;
        }

        .choice button:hover{
            color: white;
        }
        .documentDescription{
            font-size: 19px;
            font-weight: lighter;
            line-height: 32px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php 
        require('config.php');
        require(BASE_URL. 'helpers\middlewares\guard.php');
        include(BASE_URL. 'includes\navbar.php'); 
    ?>

    <div class="container">
        
        <div class="d-flex flex-column justify-content-center mt-4 mb-5">
            <h1 style="font-weight: bold; color:#0071bc">Αναγνώριση Τίτλων Σπουδών</h1> 
            <div class="mb-4 mt-2 col-md-7 m-auto documentDescription ">
            Ο Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης (Δ.Ο.Α.Τ.Α.Π.) είναι ο επίσημος φορέας της Ελληνικής Δημοκρατίας για την ακαδημαϊκή αναγνώριση τίτλων που απονέμονται από εκπαιδευτικά ιδρύματα ανώτατης εκπαίδευσης της αλλοδαπής. Σε αυτήν την πλατφόρμα μπορείτε να πραγματοποιήσετε αίτηση για αναγνώριση τον Ακαδημαϊκών σας τίτλων.</div>
        </div>


    </div>

    <div class="container" style="width: 55%;">
        <div class="d-flex justify-content-center mt-5 align-items center">
            <div class="col-md-3 d-flex flex-column">
                <div class="p-5 choice ms-auto me-auto d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right"></i>
                </div>
                <div class="text mt-4">
                    <div class="text-center fw-bold">Κάνε Εγγραφή</div>
                    <p class="text-black-50 mt-2 text-center">Βρες την φόρμα <br> αίτησης</p>
                </div>
            </div>
            
            <div class="mt-auto mb-auto ms-3 me-5 text-black-50"><i class="bi bi-chevron-double-right"></i></div>

            <div class="col-md-3 d-flex flex-column">
                <div class="p-5 choice m-auto d-flex align-items-center">
                    <i class="bi bi-ui-checks"></i>
                </div>
                <div class="text mt-4">
                    <div class="text-center fw-bold">Συμπλήρωσε την αίτηση</div>
                    <p class="text-black-50 mt-2 text-center">Συμπλήρωσε τα στοιχεία σου και τα δικαιολογητικά</p>
                </div>
            </div>

            <div class="mt-auto mb-auto ms-5 me-3 text-black-50"><i class="bi bi-chevron-double-right"></i></div>

            <div class="col-md-3 d-flex flex-column">
                <div class="p-5 choice m-auto d-flex align-items-center">
                    <i class="bi bi-file-pdf"></i>
                </div>
                <div class="text mt-4">
                    <div class="text-center fw-bold">Πάρε την πράξη</div>
                    <p class="text-black-50 mt-2 text-center">Έκδοση e-statement ή/και αποστολή έντυπου</p>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4"><button class="btn btn-more mt-3"><a href="/Doatap/src/views/faq.php">Μάθε Περισσότερα</a></button></div>
    </div>

    <?php include(BASE_URL. 'includes\footer.php'); ?>
    <script type="text/javascript" src="/Doatap/src/views/scripts/faq.js"></script>
    <script type="text/javascript" src="/Doatap/src/views/scripts/edit.js"></script>
</body>

</html>