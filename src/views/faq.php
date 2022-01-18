<html>

<head>
    <title>ΔΟΑΤΑΠ</title>
    <link rel="stylesheet" href="/Doatap/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <style>
        .header h2, .header i{
            color: white;
        }

        .header{
            padding: 80px;
            background-color: rgba(51, 102, 204, 0.75);
            
        }
        .dropdown{
            text-align: start;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            margin: 5px;
        }

        .dropdown i{
            padding-left: 20px;
            float: right;
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
    </style>
</head>

<body>
    <?php
        require('../../config.php');
        require(BASE_URL. 'helpers\middlewares\guard.php'); 
        include(BASE_URL. 'includes\navbar.php');  
    ?>
    <div class="container-fluid">
        <div class="header text-center">
            <h2 class="fw-bold">Πως μπορούμε να βοηθήσουμε;</h2>
            <div class="d-flex container justify-content-center">
                <div class="d-flex flex-row col-md-6 mt-3">
                    <input type="text" placeholder="Type keywords" >
                    <button type="submit" class="btn"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
        
        <div class="container mt-5">
            <h4>Frequently Asked Questions</h4>

            <div class="faq mt-5 d-flex flex-column">
                <button class="btn dropdown">πως μπορώ να δω τον Αριθμό Πρωτοκόλλου <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <p>Lorem ipsum...</p>
                </div>
                <button class="btn dropdown">Πόσο διαρκεί η διαδικασία του προελέγχου προκειμένου να πάρω Αριθμό Πρωτοκόλλου <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <p>Lorem ipsum...</p>
                </div>
                <button class="btn dropdown">Ποιος είναι αρμόδιος για να με ενημερώσει για την πορεία της αίτησής μου<i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <p>Lorem ipsum...</p>
                </div>
                <button class="btn dropdown">Το μεταπτυχιακό μου είχε διάρκεια 1,5 έτος. Τι δηλώνω στη διάρκεια σπουδών, 1 ή 2 έτη; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <p>Lorem ipsum...</p>
                </div>
                <button class="btn dropdown">Το μέγεθος του αρχείου της εργασίας μεταπτυχιακού/διδακτορικού είναι μεγαλύτερο από 13 ΜΒ. Πως θα το επισυνάψω; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <p>Lorem ipsum...</p>
                </div>
            </div>
        </div>
    </div>

    <?php include(BASE_URL. 'includes\footer.php');  ?>
    <script type="text/javascript" src="scripts/faq.js"></script>
</body>

</html>