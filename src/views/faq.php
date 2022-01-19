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
        input{
            width: 100%;
        }
        
        .header h2, .header i{
            color: white;
        }

        .header{
            padding: 80px;
            background-color: #0071bc;
            
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
            <h4>Οδηγός για την Αναγνώριση Πτυχίων</h4>

            <div class="faq mt-4 d-flex flex-column">
                
                <button class="btn dropdown">Πώς κάνω αίτηση; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4">
                        <h6 class="fw-bold "><a href="/Doatap/src/views/register.php">Κάνε εγγραφή</a></h6>
                        <div class="mb-5">Αφού έχετε κάνει εγγραφή μπορείτε να συμπληρώσετε την φόρμα με τα στοιχεία σας, να ανεβάσετε τα δικαιολογητικά, να κάνετε την πληρωμή και μετά την υποβολή να δείτε την πορεία της.</div>
                    </div>
                </div>
                <button class="btn dropdown">Δικαιολογητικά <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4">
                        <ul>
                            <li>Αντιγραφο Ταυτότητας ή Διαβατηρίου</li>
                            <li>Πτυχείο</li>
                            <li>Αναλυτική Βαθμολογία</li>
                            <li>Εντυπο Συγκαταθεσης</li>
                            <p class="text-black-50" style="font-size: smaller;">Βρισκεται στην φόρμα που θα συμπληρώσετε</p>
                        </ul>
                    </div>
                    <p class="text-black-50" style="font-size: smaller;">*Τα εγγραφα αυτά είναι υποχρεωτικά</p>
                    <p class="text-black-50" style="font-size: smaller;">
                        *Η θεώρηση των ανωτέρω δικαιολογητικών με τη σφραγίδα APOSTILLE γίνεται από την αρμόδια 
                        υπηρεσία στη χώρα έκδοσής τους. Για όσες χώρες δεν έχουν κυρώσει τη σύμβαση της Χάγης και μόνο 
                        για αυτές η θεώρηση γίνεται από τις επιτόπιες Ελληνικές Προξενικές Αρχές.</p>
                    <p class="text-black-50 mb-5" style="font-size: smaller;">
                        *Οι επίσημες μεταφράσεις των ανωτέρω δικαιολογητικών (εκτός αν αυτά είναι στην Ελληνική, Αγγλική ή 
                        Γαλλική γλώσσα) γίνονται από το Υπουργείο Εξωτερικών ή από δικηγόρο στην Ελλάδα που βεβαιώνει ότι πρόκειται για μετάφραση του 
                        συγκεκριμένου εγγράφου.</p>
                </div>
                <button class="btn dropdown">Πόσο κοστίζει; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4">
                        <h6 class="fw-bold ">Παράβολο</h6>
                        <div>230,40€ (225€ + 2%χαρτ. + 20%ΟΓΑ χαρτ.) για αναγνώριση βασικου τίτλου</div>  
                        <div>184,32€ (180€ + 2%χαρτ. + 20%ΟΓΑ χαρτ.) για αναγνώριση μεταπτυχιακόυ και διδακτορικού τίτλου</div>
                    </div>
                    
                    <div class="mt-4 mb-5">
                        <h6 class="fw-bold ">Πως γίνεται η πληρωμη;</h6>
                        <ul>
                            <li>Το ποσό κατατίθεται στην Τράπεζα της Ελλάδος
                                <div>IBAN: GR05 0100 0240 0000 0002 6072 595</div>
                                <p class="text-black-50" style="font-size: smaller;">*Στο αποδεικτικό 
                                    κατάθεσης θα πρέπει να αναφέρεται ως καταθέτης ο πολίτης που 
                                    υποβάλλει την αίτηση αναγνώρισης</p>
                            </li>
                            <li>
                                ¨Η μέσω χρεωστικής/πιστωτικής κάρτας
                            </li>
                            <li>
                                ¨Η μέσω PayPal
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="btn dropdown">Ποια είναι η διαδικασία μετά; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4">
                        <h6 class="fw-bold ">Προέλεγχος</h6>
                        <div>Eξετάζεται η πληρότητα των δικαιολογητικών του φακέλου. Θα ενημωθήτε μέσω του λογαριασμού σας ενάν ...</div>
                    </div>

                    <div class="mt-4 mb-5">
                        <h6 class="fw-bold ">Αποστολή</h6>
                        <div>Τελική πράξη αποστέλλεται με τον επιλεγμένο τρόπο κατά την υποβολή - Μπορείτε να επιλέξετε είτε e-statement είτε/και έντυπη.</div>
                        <div class="mt-2">Το e-statement ισχύει για λήψη για 3 μήνες από την ημερομηνία έκδοσης. Screenshots του εγγράφου δεν θα αποδείξουν την εγκυρότητά του.</div>
                    </div>
                </div>
                
                <h4 class="mt-5">Αλλες Ερωτήσεις</h4>
                <button class="btn dropdown mt-4">Το μεταπτυχιακό μου είχε διάρκεια 1,5 έτος. Τι δηλώνω στη διάρκεια σπουδών, 1 ή 2 έτη; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4 mb-5">Δεν έχει σημασία. Μπορείτε να βάλετε είτε 1 είτε 2</div>
                </div>

                <button class="btn dropdown">Εχω αλλαξει το όνομα μου. Θα πρεπει να στείλω αποδεικτικό έγγραφο; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4 mb-5">Εάν το επώνυμό σας έχει αλλάξει μέσω γάμου, δεν είναι απαραίτητο να ανεβάσετε το πιστοποιητικό γάμου σας. Εάν το όνομά σας έχει αλλάξει για οποιονδήποτε άλλο λόγο εκτός του γάμου, θα πρέπει να ανεβάσετε την απόδειξη της αλλαγής του ονόματός σας, για παράδειγμα, ένα πιστοποιητικό δημοσκόπησης πράξης.</div>
                </div>

                <button class="btn dropdown">Πως μπορώ να επικοινωνήσω μαζί σας; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4 mb-5">Στην ενότητα <a href="/Doatap/src/views/contact.php">Επικοινωνία</a> μπορείτε να συμπληρώσετε την φόρμα και εμείς θα απαντήσουμε σύντομα</div>
                </div>

                <button class="btn dropdown">Πως μπορώ να ενημερωθώ για την πορεία της αίτησεις; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4 mb-5">Όλες οι ενημερώσεις αποστέλλονται στον λογαριασμό σας</div>
                </div>

                <button class="btn dropdown">Τι είναι το e-statemant; <i class="bi bi-chevron-down"></i></button>
                <div class="panel">
                    <div class="mt-4">Είναι ένα ψηφιακά επαληθεύσιμο έγγραφο, το οποίο μπορείτε να κατεβάσετε για έως και 3 μήνες από την έκδοση, όσες φορές χρειάζεστε. Οι ημερομηνίες εγκυρότητας εμφανίζονται στην λίστα με τίς αιτήσεις στο λογαριασμό σας. </div>
                    <div class="mt-3">Εάν πρέπει να πραγματοποιήσετε λήψη ενός αντιγράφου μετά τη λήξη του ψηφιακού αντιγράφου, μπορείτε απλώς να παραγγείλετε μια αντικατάσταση μέσω του λογαριασμού σας. Η χρέωση θα χρεωθεί ξανά με το τρέχον κόστος.</div>
                </div>
                
            </div>
        </div>
    </div>

    <?php include(BASE_URL. 'includes\footer.php');  ?>
    <script type="text/javascript" src="scripts/faq.js"></script>
</body>

</html>

<!-- <button class="btn btn-outline-success mt-5"><a href="/Doatap/src/views/register.php">Apply</a></button> -->