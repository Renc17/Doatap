<html>

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
        .btn a{
            color: green;
        }
        .btn a:hover{
            color: white;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .choices{
            margin: auto;
        }
        .choice{
            background-color: #0071bc;
            margin: 5px;
        }
        .choice button{
            color: white;
        }
        .choice button:hover{
            color: white;
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

        .apply-form-steps{
            width: 70%;
            padding: 30px;
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
        
        <div class="d-flex justify-content-center mt-5">
            <h1 style="color: #0071bc; ">Οδηγός για την Αναγνώριση Πτυχίων</h1>
        </div>

        <div class="d-flex flex-column mt-5">
            <div class="d-flex justify-content-center"><h2 class="mb-4">Θελω αναγνωριση</h2></div>
            <div class="d-flex justify-content-center">
                <div class="col-md-3 p-5 choice">
                    <button class="btn"><h3>Προπτυχιακού Τιτλού</h3></button>
                </div>
                <div class="col-md-3 p-5 choice">
                    <button class="btn"><h3>Μεταπτυχιακού Τιτλού</h3></button>
                </div>
                <div class="col-md-3 p-5 choice">
                    <button class="btn"><h3>Διδακτορικού Τιτλού</h3></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container apply-form-steps">
        <h2 class="text-center">Τι να κανω</h2>
        <h6 class="text-center text-black-50">ΑΝΑΓΝΩΡΙΣΗ ΔΙΔΑΚΤΟΡΙΚΟΥ ΤΙΤΛΟΥ</h6>
        <div class="faq mt-5 d-flex flex-column m-auto col-md-8">
            <button class="btn dropdown">Πώς κάνω αίτηση; <i class="bi bi-chevron-down"></i></button>
            <div class="panel">
                <div class="mt-4">
                    <h6 class="fw-bold "><a href="/Doatap/src/views/register.php">Κάνε εγγραφή</a></h6>
                    <div class="mb-5">Αφού έχετε κάνει εγγραφή μπορείτε να συμπληρώσετε την φόρμα με τα στοιχεία σας, να ανεβάσετε τα δικαιολογητικά και μετά την υποβολή να δείτε την πορεία της.</div>
                </div>
            </div>
            <button class="btn dropdown">Δικαιολογητικά <i class="bi bi-chevron-down"></i></button>
            <div class="panel">
                <div class="mt-4">
                    <h6 class="fw-bold text-center">Υποχρεωτικά</h6>
                    <ul>
                        <li>Αντιγραφο Ταυτότητας ή Διαβατηρίου</li>
                        <li><a href="">Υπευθυνή Δηλωση</a> <i class="bi bi-download"></i></li>
                        <li><a href="">Εντυπο Συγκαταθεσης</a> <i class="bi bi-download"></i></li>
                        <li>Διδακτορικος Τιτλος</li>
                    </ul>

                    <h6 class="fw-bold text-center μτ-5">Προαιρετικά</h6>
                    <ul>
                        <li>Δηλωση Συναινεσης</li>
                        <li>Πιστοποιητικο Μαθηματων</li>
                        <li><a href="">Εντυπο Συγκαταθεσης</a> <i class="bi bi-download"></i></li>
                        <li>Παραρτημα Διπλωματος</li>
                    </ul>
                </div>
                <p class="text-black-50" style="font-size: smaller;">
                    *Η θεώρηση των ανωτέρω δικαιολογητικών με τη σφραγίδα APOSTILLE γίνεται από την αρμόδια 
                    υπηρεσία στη χώρα έκδοσής τους. Για όσες χώρες δεν έχουν κυρώσει τη σύμβαση της Χάγης και μόνο 
                    για αυτές η θεώρηση γίνεται από τις επιτόπιες Ελληνικές Προξενικές Αρχές.</p>
                <p class="text-black-50" style="font-size: smaller;">
                    *Οι επίσημες μεταφράσεις των ανωτέρω δικαιολογητικών (εκτός αν αυτά είναι στην Ελληνική, Αγγλική ή 
                    Γαλλική γλώσσα) γίνονται από το Υπουργείο Εξωτερικών, τις επιτόπιες Ελληνικές Προξενικές Αρχές, από 
                    πτυχιούχο μεταφραστή του Τμήματος Ξένων Γλωσσών, Μεταφράσεως και Διερμηνείας του Ιονίου 
                    Πανεπιστημίου ή από δικηγόρο στην Ελλάδα που βεβαιώνει ότι πρόκειται για μετάφραση του 
                    συγκεκριμένου εγγράφου.</p>
            </div>
            <button class="btn dropdown">Ποια είναι η διαδικασία μετά; <i class="bi bi-chevron-down"></i></button>
            <div class="panel">
                <div class="mt-4">
                    <h6 class="fw-bold ">Προέλεγχος</h6>
                    <div>Eξετάζεται η πληρότητα των δικαιολογητικών του φακέλου</div>
                </div>

                <div class="mt-4">
                    <h6 class="fw-bold ">Αριθμό Πρωτοκόλλου</h6>
                    <ul>
                    <li>Αν ο φάκελος κριθεί πλήρης από τον προέλεγχο, παίρνει Αριθμό Πρωτοκόλλου (ΑΠ) και διαβιβάζεται σε πραγματικό χρόνο στον Πρόεδρο για αυθημερόν ανάθεση στον αρμόδιο Ειδικό Εισηγητή του κλάδου</li>
                    <li>Αν ο φάκελος δεν κριθεί πλήρης, επιστρέφεται στον πολίτη για να συμπληρωθεί και παίρνει ΑΠ μετά την τελική συμπλήρωσή του</li> 
                    </ul>
                </div>

                <div class="mt-4">
                    <h6 class="fw-bold ">Εκτελεστική Επιτροπή</h6>
                    <ul>
                    <li>Αν η κρίση της Εκτελεστικής Επιτροπής είναι ομόφωνα θετική για την απόδοση ισοτιμίας και αντιστοιχίας (με ή χωρίς χρέωση μαθημάτων), παραπέμπεται για «Διοικητικό Έλεγχο» (ΔΕ), οπότε εξετάζεται η τήρηση της προβλεπόμενης διαδικασίας.</li>
                    <li>Aν σε κάποιο στάδιο υπάρχει διαφωνία μεταξύ των μελών της Εκτελεστικής Επιτροπής ή του Προέδρου η αίτηση επιστρέφεται στο προηγούμενο στάδιο. Αν η διαφωνία δεν επιλυθεί, η αίτηση παραπέμπεται στο αρμόδιο Τμήμα</li> 
                    </ul>
                </div>

                <div class="mt-4">
                    <h6 class="fw-bold ">Σχέδιο Πράξης</h6>
                    <div>Παραπέμπεται στον πολίτη για έλεγχο των πραγματολογικών στοιχείων (ονοματεπώνυμο κλπ). Αν ο πολίτης δεν απαντήσει εντός 15 ημερών, το σχέδιο πράξης παραπέμπεται στον Πρόεδρο για την τελική υπογραφή.</div>
                </div>

                <div class="mt-4 mb-5">
                    <h6 class="fw-bold ">Αποστολή</h6>
                    <div>Με την υπογραφή του Προέδρου η τελική πράξη αποστέλλεται ηλεκτρονικά στον πολίτη σε πραγματικό χρόνο.</div>
                </div>

                

                
            </div>
            <button class="btn dropdown">Πόσο κοστίζει; <i class="bi bi-chevron-down"></i></button>
            <div class="panel">
                <div class="mt-4">
                    <h6 class="fw-bold ">Παράβολο</h6>
                    <div>184,32€ (180€ + 2%χαρτ. + 20%ΟΓΑ χαρτ.) (ΦΕΚ 3165/B/30-
                    12-2011), για κάθε κρινόμενο τίτλο σπουδών.</div>
                </div>
                
                <div class="mt-4">
                    <h6 class="fw-bold ">Που καταθέτω;</h6>
                    <div>Το ποσό κατατίθεται <strong>μόνο</strong> στην Τράπεζα της Ελλάδος</div>
                    <div>IBAN: GR05 0100 0240 0000 0002 6072 595</div>
                    <p class="text-black-50" style="font-size: smaller;">*Στο αποδεικτικό 
                    κατάθεσης θα πρέπει να αναφέρεται ως καταθέτης ο πολίτης που 
                    υποβάλλει την αίτηση αναγνώρισης</p>
                </div>
            </div>
            <button class="btn btn-outline-success mt-5"><a href="/Doatap/src/views/register.php">Apply</a></button>
        </div>
        
    </div>

    <?php include(BASE_URL. 'includes\footer.php');  ?>
    <script type="text/javascript" src="/Doatap/src/views/scripts/faq.js"></script>
</body>

</html>