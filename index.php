<!DOCTYPE html>
<html lang="el">
<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/Doatap/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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
            padding-right: 5px;
            border-radius: 50%;
            height: 190px;
            width: 190px;
        }
        .choice i{
            color: white;
            font-size: 90px;
        }

        i{
            font-size: 45px;
        }

        .choice button:hover{
            color: white;
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
        
        <div class="d-flex flex-column mt-5 mb-5">
            <h1 style="font-weight: bold">Αναγνώριση Τίτλων Εξωτερικού</h1> 
            <!-- color: #0071bc;  -->

            <div class="mb-5">
                Lorem ipsum
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5 align-items center">
                <div class="col-md-3 d-flex flex-column">
                    <div class="p-5 choice m-auto d-flex align-items-center">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>
                    <div class="text mt-4">
                        <h1 class="text-center fw-bold">1</h1>
                        <div class="text-center fw-bold">Κάνε Εγγραφή</div>
                        <p class="text-black-50 mt-2">Μετά την εγγραφή θα βρείτε στο προφιλ σας την φόρμα αίτησεις</p>
                        <div class="d-flex justify-content-center"><button class="btn btn-more mt-3" onclick=""><a href="/Doatap/src/views/faq.php">Μαθε Περισσότερα</a></button></div>
                    </div>
                </div>
                
                <div class="m-auto"><i class="bi bi-chevron-double-right"></i></div>

                <div class="col-md-3 d-flex flex-column">
                    <div class="p-5 choice m-auto d-flex align-items-center">
                        <i class="bi bi-file-pdf"></i>
                    </div>
                    <div class="text mt-4">
                        <h1 class="text-center fw-bold">2</h1>
                        <div class="text-center fw-bold">Ανέβασε τα δικαιολογητικά</div>
                        <p class="text-black-50 mt-2">Ανεβάστε επικυρομένα τα έγγραφα για τα οποία θα γίνει η αναγνώριση</p>
                        <div class="d-flex justify-content-center"><button class="btn btn-more mt-3"><a href="/Doatap/src/views/faq.php">Μαθε Περισσότερα</a></button></div>
                    </div>
                </div>

                <div class="m-auto"><i class="bi bi-chevron-double-right"></i></div>

                <div class="col-md-3 d-flex flex-column">
                    <div class="p-5 choice m-auto d-flex align-items-center">
                        <i class="bi bi-credit-card-2-back"></i>
                    </div>
                    <div class="text mt-4">
                        <h1 class="text-center fw-bold">3</h1>
                        <div class="text-center fw-bold">Κάνε Πληρωμή</div>
                        <p class="text-black-50 mt-2">Η πληρωμή γίνεται με ασφάλεια μέσω της πλατφορμας του ΔΟΑΤΑΠ.</p>
                        <div class="d-flex justify-content-center"><button class="btn btn-more mt-3"><a href="/Doatap/src/views/faq.php">Μαθε Περισσότερα</a></button></div>
                    </div>
                </div>

            </div>
    </div>

    <?php include(BASE_URL. 'includes\footer.php'); ?>
    <script type="text/javascript" src="/Doatap/src/views/scripts/faq.js"></script>
    <script type="text/javascript" src="/Doatap/src/views/scripts/edit.js"></script>
</body>

</html>