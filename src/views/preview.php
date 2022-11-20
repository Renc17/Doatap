<?php

require('../../config.php');
require(BASE_URL . 'controllers\forms.php');
require(BASE_URL . 'helpers\middlewares\guard.php');

$controller =  new FormController($database);
$formPreview = $controller->getFormPreview($_GET['id']);
if(!$formPreview){
    print('This form doesnt exist or has been deleted');
    return;
}

$reasons = [];
if($formPreview[23] == 'rejected'){
    $reasons = $controller->getRejectReassons($_GET['id']);
}

if($formPreview[23] == 'standBy'){
    $reasons = $controller->getStandByReasons($_GET['id']);
}
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
    </style>
</head>
    <body>
        <?php 
            include(BASE_URL. 'includes\navbar.php'); 
        ?>

        <?php if(isUser()) {?>
            <div class="container mt-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/index.php">Αρχική</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/profile.php">Προφίλ</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/requests.php">Οι Αιτήσεις μου</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Αναγνώριση ισοτιμίας</li>
                    </ol>
                </nav>
            </div>
        <?php } else if(isAdmin()) { ?>
            <div class="container mt-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/index.php">Αρχική</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/dashboard.php">Προφίλ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Αναγνώριση ισοτιμίας</li>
                    </ol>
                </nav>
            </div>
        <?php } ?>

        <div class="container-fluid">
            

            <h2 class="text-center mt-5"> Αναγνώριση ισοτιμίας</h2>
            <h6 class="text-center fw-lighter mb-5"><?php echo $formPreview[23] ?> <i class="bi bi-dot"></i> <?php echo $formPreview[22] ?></h6>
            
            <div class="container mt-5" style="width: 70%;">
                <h6 class="fw-bolder mb-2">Προσωπικά Στοιχεία</h6>
                <hr class="form-bar">
                
                <div class="d-flex">
                    <div class="col-md-5">
                        <div class="d-flex">
                            <div class="col-md-5">
                                <label>Όνομα</label>
                                <p><?php echo $formPreview[1] ?></p>
                            </div>
                            <div class="col-md-5">
                                <label>Επώνυμο</label>
                                <p><?php echo $formPreview[2] ?></p>
                            </div>
                        </div>

                        <div class="d-flex mt-2">
                            <div class="col-md-5">
                                <label>Πατρώνυμο</label>
                                <p><?php echo $formPreview[3] ?></p>
                            </div>
                            <div class="col-md-5">
                                <label>Μητρώνυμο</label>
                                <p><?php echo $formPreview[4] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex mt-2">
                            <div class="col-md-5">
                                <label>ΑΜΚΑ</label>
                                <p><?php echo $formPreview[5] ?></p>
                            </div>
                            <div class="col-md-5">
                                <label>ΑΦΜ</label>
                                <p><?php echo $formPreview[6] ?></p>
                            </div>
                        </div>

                        <div class="d-flex mt-2">
                            <div class="col-md-5">
                                <label>Ταυτοποίηση</label>
                                <p><?php echo $formPreview[7] ?></p>
                            </div>
                            <div class="col-md-6">
                                <label>Αριθμός Ταυτότητας</label>
                                <p><?php echo $formPreview[8] ?></p>
                            </div>
                        </div>
                    </div>
                </div>


                <h6 class="fw-bolder mb-2 mt-5">Στοιχεία Τιμολόγησης/Αποστολής</h6>
                <hr class="form-bar">

                <div class="d-flex justify-content-between col-md-8">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-start">
                            <div><?php echo $formPreview[9] ?></div>
                            <div class="ps-2"><?php echo $formPreview[11] ?></div>
                        </div>
                        <div class="d-flex flex-row justify-content-start">
                            <div><?php echo $formPreview[10] ?></div>
                            <div class="ps-2"><?php echo $formPreview[12] ?></div>
                        </div>
                        <div class="">
                            <div><?php echo $formPreview[13] ?></div>
                        </div>
                        <div class="">
                            <div><?php echo $formPreview[14] ?></div>
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column">
                        <div class="">
                            <label>Τρόπος Πληρωμής</label>
                            <div><?php echo $formPreview[24] ?></div>
                        </div>
                        <div class="mt-3">
                            <label>Τρόπος Αποστολής</label>
                            <div><?php echo $formPreview[25] ?></div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="container mt-5" style="width: 70%;">
                <h6 class="fw-bolder mb-2">Στοιχεία τίτλου προς αναγνώριση</h6>
                <hr class="form-bar">

                <div class="d-flex flex-row justify-content-between">
                    <div class="col-md-6">
                        <label>Κύκλος Φοίτησης</label>
                        <p><?php echo $formPreview[15] ?></p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between mt-2">
                    <div class="col-md-3">
                        <label>Χώρα Έκδοσης Πτυχίου</label>
                        <p><?php echo $formPreview[16] ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Πανεπιστήμιο</label>
                        <p><?php echo $formPreview[17] ?></p>
                    </div>
                    <div class="col-md-3">
                        <label>Τμήμα</label>
                        <p><?php echo $formPreview[18] ?></p>
                    </div>
                </div>
            </div>
            
            <div class="container mt-5" style="width: 70%;">
                <h6 class="fw-bolder mb-2">Δικαιολογητικά</h6>
                <hr class="form-bar">

                <div class="d-flex flex-row justify-content-between">
                    <div class="col-md-4 d-flex flex-column">
                        <label>Αντίγραφο Ταυτότητας</label>
                        <button type="button" class="btn file" data-bs-toggle="modal" data-bs-target="#id">
                        Ανάγνωση <i class="bi bi-image"></i>
                        </button>

                        <div class="modal fade" id="id" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="btn-close m-auto border border-4" style="background-color: white" data-bs-dismiss="modal" aria-label="Close"></i></button>
                                    <div class="modal-body d-flex justify-content-center">
                                        <div class="embed-responsive embed-responsive-21by9 col-12">
                                            <iframe 
                                                class="embed-responsive-item" 
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[29] ?>"
                                                height="600px",
                                                width="100%"
                                                >
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <label>Πτυχίο</label>
                        <button type="button" class="btn file" data-bs-toggle="modal" data-bs-target="#dilosi">
                        Ανάγνωση <i class="bi bi-image"></i>
                        </button>

                        <div class="modal fade" id="dilosi" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="btn-close m-auto border border-4" style="background-color: white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="modal-body d-flex justify-content-center">
                                        <div class="embed-responsive embed-responsive-21by9 col-12">
                                            <iframe 
                                                class="embed-responsive-item" 
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[30] ?>"
                                                height="600px"
                                                width="100%"
                                                >
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 d-flex flex-column">
                        <label>Αναλυτική Βαθμολογία</label>
                        <button type="button" class="btn file" data-bs-toggle="modal" data-bs-target="#sinkatathesi">
                        Ανάγνωση <i class="bi bi-image"></i>
                        </button>

                        <div class="modal fade" id="sinkatathesi" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <button type="button" class="btn-close m-auto border border-4" style="background-color: white" data-bs-dismiss="modal" aria-label="Close"></i></button>
                                    <div class="modal-body d-flex justify-content-center">
                                        <div class="embed-responsive embed-responsive-21by9 col-12">
                                            <iframe 
                                                class="embed-responsive-item" 
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[31] ?>"
                                                height="600px"
                                                width="100%"
                                                >
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container mt-5" style="width: 70%;">
                <h6 class="fw-bolder mb-2">Σχόλια Αιτούντα</h6>
                <hr class="form-bar">
                <div class="col-md-5 d-flex flex-column">
                    <p><?php echo $formPreview[20] ?? 'N/A'; ?></p>
                </div>
            </div>

            <?php if(isAdmin()){ 
                if($formPreview[23] != 'checked' and $formPreview[23] != 'rejected' and $formPreview[23] != 'standBy'){?>
                <div class="d-flex justify-content-center mt-5">
                    <div class="reject-section d-flex flex-column pe-5 border-end">
                        <div class="col-md-12 mt-2 mb-3">
                            <h6 class="fw-bolder">Λόγοι απόρριψης της αίτησης</h6>
                            <input type="checkbox" id="reject-id" name="reject-reason" class="reject-reasons" value="Μη Έγκυρη Ταυτότητα">
                            <label for="reject-id">Μη Έγκυρη Ταυτότητα</label><br>
                            <input type="checkbox" id="reject-grades" name="reject-reason" class="reject-reasons" value="Μη Έγκυρη Αναλυτική Βαθμολογία">
                            <label for="reject-grades"> Μη Έγκυρη Αναλυτική Βαθμολογία</label><br>
                            <input type="checkbox" id="reject-diploma" name="reject-reason" class="reject-reasons" value="Μη Έγκυρη Πτυχίο">
                            <label for="reject-diploma"> Μη Έγκυρη Πτυχίο</label><br>
                        </div>
                        
                        <label for="comment">Σχόλια</label>
                        <textarea rows="5" type="text" id="comment" name="comment" value="" class="text-input"></textarea>
                        
                        <div class="col-md-3 text-center m-auto">
                            <div style="color: black;" ><button class="btn text-end col-12" style="text-decoration:underline" onclick="reject()">Απόρριψη</button></div>
                        </div>
                    </div>

                    <div class="approve-section d-flex flex-column ps-5 pe-5 border-start border-end">
                        <div class="col-md-12 mt-5">
                            <label for="university">Ισότιμο Πανεπιστήμιο</label>
                            <select name="university" id="university" class="form-select">
                                <option value="Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών">Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                                <option value="Πανεπιστήμιο Κρήτης">Πανεπιστήμιο Κρήτης</option>
                                <option value="Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης">Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</option>
                                <option value="Οικονομικό Πανεπιστήμιο Αθηνών">Οικονομικό Πανεπιστήμιο Αθηνών</option>
                                <option value="Εθνικό Μετσόβιο Πολυτεχνείο">Εθνικό Μετσόβιο Πολυτεχνείο</option>
                                <option value="Πανεπιστήμιο Ιωαννίνων">Πανεπιστήμιο Ιωαννίνων</option>
                                <option value="Πανεπιστήμιο Δυτικής Αττικής">Πανεπιστήμιο Δυτικής Αττικής</option>
                                <option value="Πανεπιστήμιο Πατρών">Πανεπιστήμιο Πατρών</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2 mb-3">
                            <label for="department">Ισότιμο Τμήμα</label>
                            <select name="department" id="department" class="form-select">
                                <option value="ΤΜΗΜΑ ΙΑΤΡΙΚΗΣ">ΤΜΗΜΑ ΙΑΤΡΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΙΚΗΣ">ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΦΑΡΜΑΚΕΥΤΙΚΗΣ">ΤΜΗΜΑ ΦΑΡΜΑΚΕΥΤΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΒΙΟΛΟΓΙΑΣ">ΤΜΗΜΑ ΒΙΟΛΟΓΙΑΣ</option>
                                <option value="ΤΜΗΜΑ ΜΑΘΗΜΑΤΙΚΩΝ">ΤΜΗΜΑ ΜΑΘΗΜΑΤΙΚΩΝ</option>
                                <option value="ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ">ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</option>
                                <option value="ΤΜΗΜΑ ΦΥΣΙΚΗΣ">ΤΜΗΜΑ ΦΥΣΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΛΙΜΕΝΩΝ ΚΑΙ ΝΑΥΤΙΛΙΑΣ">ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΛΙΜΕΝΩΝ ΚΑΙ ΝΑΥΤΙΛΙΑΣ</option>
                                <option value="ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ">ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ</option>
                                <option value="ΤΜΗΜΑ ΚΟΙΝΩΝΙΟΛΟΓΙΑΣ">ΤΜΗΜΑ ΚΟΙΝΩΝΙΟΛΟΓΙΑΣ</option>
                            </select>
                        </div>

                        <div class="col-md-3 text-center m-auto">
                            <div style="background-color: #04AA6D;" ><button class="btn text-center border border-3 col-12" style="color:white" onclick="approve()">Αποδοχή</button></div>
                        </div>
                    </div>

                    <div class="reject-section d-flex flex-column ps-5 border-start">
                        <div class="col-md-12 mt-2 mb-3">
                            <label for="rec-department">Τμήμα</label>
                            <select name="rec-department" id="rec-department" class="form-select mb-3">
                                <option value="ΤΜΗΜΑ ΙΑΤΡΙΚΗΣ">ΤΜΗΜΑ ΙΑΤΡΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΙΚΗΣ">ΤΜΗΜΑ ΝΟΣΗΛΕΥΤΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΦΑΡΜΑΚΕΥΤΙΚΗΣ">ΤΜΗΜΑ ΦΑΡΜΑΚΕΥΤΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΒΙΟΛΟΓΙΑΣ">ΤΜΗΜΑ ΒΙΟΛΟΓΙΑΣ</option>
                                <option value="ΤΜΗΜΑ ΜΑΘΗΜΑΤΙΚΩΝ">ΤΜΗΜΑ ΜΑΘΗΜΑΤΙΚΩΝ</option>
                                <option value="ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ">ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ</option>
                                <option value="ΤΜΗΜΑ ΦΥΣΙΚΗΣ">ΤΜΗΜΑ ΦΥΣΙΚΗΣ</option>
                                <option value="ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΛΙΜΕΝΩΝ ΚΑΙ ΝΑΥΤΙΛΙΑΣ">ΤΜΗΜΑ ΔΙΑΧΕΙΡΙΣΗΣ ΛΙΜΕΝΩΝ ΚΑΙ ΝΑΥΤΙΛΙΑΣ</option>
                                <option value="ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ">ΤΜΗΜΑ ΟΙΚΟΝΟΜΙΚΩΝ ΕΠΙΣΤΗΜΩΝ</option>
                                <option value="ΤΜΗΜΑ ΚΟΙΝΩΝΙΟΛΟΓΙΑΣ">ΤΜΗΜΑ ΚΟΙΝΩΝΙΟΛΟΓΙΑΣ</option>
                            </select>
                            <label for="classes">Προτεινόμενα Μαθήματα</label>
                            <select name="classes" id="classes" class="form-select" multiple>
                                <option value="Λειτουργικά Συστήματα">Λειτουργικά Συστήματα</option>
                                <option value="Παράλληλα Συστήματα">Παράλληλα Συστήματα</option>
                                <option value="Ανάλυση/Σχεδίαση Συστημάτων Λογισμικού">Ανάλυση/Σχεδίαση Συστημάτων Λογισμικού</option>
                                <option value="Μεταγλωττιστές">Μεταγλωττιστές</option>
                                <option value="Τεχνικές Εξόρυξης Δεδομένων">Τεχνικές Εξόρυξης Δεδομένων</option>
                                <option value="Αλγοριθμική Επιχειρησιακή Έρευνα">Αλγοριθμική Επιχειρησιακή Έρευνα</option>
                                <option value="Διδακτική της Πληροφορικής">Διδακτική της Πληροφορικής</option>
                            </select>
                        </div>
                        <p style="font-size: small;">*Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
                        <div class="col-md-3 text-center m-auto">
                            <div style="color: black;" ><button class="btn text-end col-12" style="text-decoration:underline" onclick="standBy()">Εκκρεμής</button></div>
                        </div>
                    </div>
                </div>
            <?php }} ?>

            <?php if($formPreview[23] == 'rejected'){ ?>
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Γιατί δεν εγκρίθηκε η αίτηση μου;</h6>
                    <div class="col-md-5 d-flex flex-column">
                        <p><?php echo $reasons[1] ?></p>
                    </div>
                    <h6 class="fw-bolder mb-2">Σχόλια</h6>
                    <div class="col-md-5 d-flex flex-column">
                        <p><?php echo $reasons[2] ?></p>
                    </div>

                    <p style="font-size: small; color:brown">*Η αίτηση αυτή δεν είναι πλέον έγκυρη. Υποβάλτε νέα αίτηση αφού έχετε τα σωστά αρχεία</p>
                </div>
            <?php } ?>

            <?php if($formPreview[23] == 'standBy'){ ?>
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Προτεινόμενα Μαθήματα</h6>
                    <div class="col-md-5 d-flex flex-column">
                        <p><?php echo $reasons[1] ?></p>
                    </div>
                    <h6 class="fw-bolder mb-2">Τμήμα</h6>
                    <div class="col-md-5 d-flex flex-column">
                        <p><?php echo $reasons[2] ?></p>
                    </div>

                    <p style="font-size: small; color:brown">*Η αίτηση αυτή δεν είναι πλέον έγκυρη. Διαγράψτε πριν την νέα υποβολή με τα επιπρόσθετα προτεινόμενα μαθήματα</p>
                </div>
            <?php } ?>

            <div id="form-id" name="<?php echo $formPreview[0];?>" ></div>
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
        <script type="text/javascript" src="scripts/process-form.js"></script>
    </body>
</html>
