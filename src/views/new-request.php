<?php

require('../../config.php');
require(BASE_URL . 'controllers\forms.php');
require(BASE_URL . 'helpers\middlewares\guard.php');
usersOnly();
$controller =  new FormController($database);
$controller->create();
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <title>Νέα Αίτηση</title>

    <style>

        input[type="text"]{
            height: 30px;
            border-radius: 5px;
        }

        input[type="file"]{
            height: 90px;
            border-radius: 5px;
        }

        .radio-toolbar {
            margin-top: 20px;
        }

        a.btn{
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            width: 100%;
        }

        .breadcrumb-item a{
            text-decoration: none;
        }

        .breadcrumb-item.active{
                font-weight: bold;
            }

        .error{
            color: red;
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
                <li class="breadcrumb-item"><a class="text-black-50" href="/Doatap/src/views/profile.php">Προφίλ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Νέα Αιτήση</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form id="regForm" method='post' action='new-request.php' enctype="multipart/form-data">

            <h2 class="text-center mt-5"> Αναγνώριση ισοτιμίας</h2>
            <h6 class="text-center fw-lighter mb-5">Προσωρινά Αποθγκευμένο</h6>

            <div class="status-bar">
                <div class="row steps-bar justify-content-center m-auto">
                    <div class=" d-flex align-items-center justify-content-around step col-md-2">
                        <div>
                            <span >Στοιχεία <br> Αιτούντος</span>
                        </div>
                        <div class="d-flex align-items-center next-step-arrow">
                            <i class="bi bi-chevron-compact-right" style="font-size:xx-large;"></i>
                        </div>
                    </div>
                    
                    <div class=" d-flex align-items-center justify-content-around step col-md-2">
                        <div>
                            <span >Τίτλος <br> Σπουδών</span>
                        </div>
                        <div class="d-flex align-items-center next-step-arrow">
                            <i class="bi bi-chevron-compact-right" style="font-size:xx-large;"></i>
                        </div>
                    </div>


                    <div class=" d-flex align-items-center justify-content-around step col-md-2">
                        <div>
                            <span >Επισυναπτόμενα <br> Έγγραφα</span>
                        </div>
                        <div class="d-flex align-items-center next-step-arrow">
                            <i class="bi bi-chevron-compact-right" style="font-size:xx-large;"></i>
                        </div>
                    </div>

                    <div class=" d-flex align-items-center justify-content-around step col-md-2">
                        <span >Σχόλεια <br>& Οροι</span>
                        <div class="d-flex align-items-center next-step-arrow">
                            <i class="bi bi-chevron-compact-right" style="font-size:xx-large;"></i>
                        </div>
                    </div>

                    <div class=" d-flex justify-content-between align-items-center step col-md-1">
                        <span class="text-center">Πληρωμή & Αποστολή</span>
                    </div>
                </div>
            </div>
            
            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Προσωπικά Στοιχεία</h6>
                    <hr class="form-bar">
                
                    <div class="col-md-5 d-flex flex-column mt-3">
                        <label for="name">Όνομα</label>
                        <input type="text" id="name" name="name" value="<?php echo $controller->getName(); ?>" class="text-input" placeholder="<?php echo $controller->getName(); ?>" readonly>
                        <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                    </div>
                    <div class="col-md-5 d-flex flex-column mt-3">
                        <label for="surname">Επώνυμο</label>
                        <input type="text" id="surname" name="surname" value="<?php echo $controller->getSurname(); ?>" class="text-input" placeholder="<?php echo $controller->getSurname(); ?>" readonly>
                        <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                    </div>
 
                    <div class="col-md-6 d-flex flex-column mt-3">
                        <label for="father">Πατρώνυμο</label>
                        <div class="d-flex align-items-center justify-content-between">
                            <input type="text" id="father" name="father_name" value="<?php echo $controller->getData('father_name'); ?>" class="text-input col-10">
                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Δεν επιτρεπονται ψηφία">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </div>
                        <div class="error"> <?php echo $controller->getErrors('father_name') ?? '' ?> </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column mt-3">
                        <label for="mother">Μητρώνυμο</label>
                        <div class="d-flex align-items-center justify-content-between">
                            <input type="text" id="mother" name="mother_name" value="<?php echo $controller->getData('mother_name'); ?>" class="text-input col-10">
                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Δεν επιτρεπονται ψηφία">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </div>
                        <div class="error"> <?php echo $controller->getErrors('mother_name') ?? '' ?> </div>
                    </div>
                    <div class="col-md-5 d-flex flex-column mt-3">
                        <label for="amka">ΑΜΚΑ</label>
                        <input type="text" id="amka" name="amka" value="<?php echo $controller->getAMKA(); ?>" class="text-input" placeholder="<?php echo $controller->getAMKA(); ?>" readonly>
                        <div class="error"> <?php echo $controller->getErrors('amka') ?? '' ?> </div>
                    </div>

                    <div class="col-md-5 d-flex flex-column mt-3">
                        <label for="afm">ΑΦΜ</label>
                        <input type="text" id="afm" name="afm" value="<?php echo $controller->getAFM(); ?>" class="text-input" placeholder="<?php echo $controller->getAFM(); ?>" readonly>
                        <div class="error"> <?php echo $controller->getErrors('afm') ?? '' ?> </div>
                    </div>

                    <div class="radio-toolbar mt-3">
                        <div class="col-md-3 d-flex align-items-center justify-content-between">
                            <label for="id">Ταυτότητα</label>
                            <input type="radio" id="id" name="identification" value="Ταυτότητα" checked>
                        </div>
                        <div class="col-md-3 d-flex align-items-center justify-content-between">
                            <label for="passport">Διαβατήριο</label>
                            <input type="radio" id="passport" name="identification" value="Διαβατήριο">
                        </div>
                        <div class="error"> <?php echo $controller->getErrors('identification') ?? '' ?> </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column mt-3">
                        <label for="ident">Αρ. Ταυτότητας/Διαβατηρίου</label>
                        <div class="d-flex align-items-center justify-content-between">
                            <input type="text" id="ident" name="ID_num" value="<?php echo $controller->getData('ID_num'); ?>" class="text-input col-10" placeholder="<?php echo $controller->getData('ID_num'); ?>">
                            <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Ο Αρ. Ταυτότητας/Διαβατηρίου αποτελείται από δύο γράμματα και 6 ψηφία">
                                <i class="bi bi-info-circle"></i>
                            </button>
                        </div>
                        <div class="error"> <?php echo $controller->getErrors('ID_num') ?? '' ?> </div>
                    </div>

                    <h6 class="fw-bolder mb-2 mt-5">Στοιχεία Επικοινωνίας</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-column justify-content-between">
                        <div class="col-md-6 d-flex flex-column">
                            <label for="road">Οδος</label>
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="text" id="road" name="road" value="<?php echo $controller->getData('road'); ?>" class="text-input col-10">
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Δεν επιτρεπονται ψηφία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('road') ?? '' ?> </div>
                        </div>

                        <div class="d-flex flex-column col-md-6 mt-3">
                            <label for="number">Αριθμος</label>
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="text" id="number" name="number" value="<?php echo $controller->getData('number'); ?>" class="text-input col-10">
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Μόνο ένα ψηφίο">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('number') ?? '' ?> </div>
                        </div>

                        <div class="col-md-6 d-flex flex-column mt-3">
                            <label for="city">Πόλη</label>
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="text" id="city" name="city" value="<?php echo $controller->getData('city'); ?>" class="text-input col-10">
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Δεν επιτρεπονται ψηφία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('city') ?? '' ?> </div>
                        </div>

                        <div class="col-md-6 d-flex flex-column mt-3">
                            <label for="pobox">Τ.Κ</label>
                            <div class="d-flex align-items-center justify-content-between">
                                <input type="text" id="pobox" name="pobox" value="<?php echo $controller->getData('pobox'); ?>" class="text-input col-10">
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Το Τ.Κ αποτελείται απο 5 ψηφία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('pobox') ?? '' ?> </div>
                        </div>

                        <div class="col-md-5 d-flex flex-column mt-3">
                            <label for="cel">Τηλ.</label>
                            <input type="text" id="cel" name="cel" value="<?php echo $controller->getData('cel'); ?>" class="text-input" placeholder="69********">
                            <div class="error"> <?php echo $controller->getErrors('cel') ?? '' ?> </div>
                        </div>
                        <div class="col-md-5 d-flex flex-column mt-3">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="<?php echo $controller->getEmail(); ?>" class="text-input" placeholder="<?php echo $controller->getEmail(); ?>" readonly>
                            <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                        <h6 class="fw-bolder mb-2">Στοιχεία τίτλου προς αναγνώριση</h6>
                        <hr class="form-bar">

                        <div class="d-flex flex-column justify-content-between col-md-6">
                            <div class="mt-2">
                                <input type="radio" id="Πτυχίο" name="study_cycle" value="Βασικό Πτυχίο" checked>
                                <label for="Πτυχίο">Βασικό Πτυχίο</label>
                            </div>
                            
                            <div class="mt-2">
                                <input type="radio" id="Μεταπτυχιακό" name="study_cycle" value="Μεταπτυχιακό">
                                <label for="Μεταπτυχιακό">Μεταπτυχιακό</label>
                            </div>
                            
                            <div class="mt-2">
                                <input type="radio" id="Διδακτορικό" name="study_cycle" value="Διδακτορικό">
                                <label for="Διδακτορικό">Διδακτορικό</label>
                            </div>
                            
                            <div class="error"> <?php echo $controller->getErrors('study_cycle') ?? '' ?> </div>
                        </div>

                        <div class="d-flex flex-column justify-content-between mt-4">
                            <div class="col-md-3">
                                <label for="diploma_country">Χώρα Εκδοσης Πτυχίου</label>
                                <select name="diploma_country" id="diploma_country" class="form-select">
                                    <option value="Ελλάδα">Γερμανία</option>
                                    <option value="Γαλλία">Γαλλία</option>
                                    <option value="Αγγλία">Αγγλία</option>
                                </select>
                                <div class="error"> <?php echo $controller->getErrors('diploma_country') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label for="university">Πανεπιστήμιο</label>
                                <select name="university" id="university" class="form-select">
                                    <option value="ΕΚΠΑ">Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                                    <option value="ΠΑΔΑ">Πανεπιστήμιο Δυτικής Αττικής</option>
                                    <option value="ΠΑΝΤΕΙΟΝ">Πάντειον Πανεπιστήμιο</option>
                                    <option value="ΑΠΘ">Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</option>
                                    <option value="ΕΜΠ">Εθνικό Μετσόβιο Πολυτεχνείο</option>
                                </select>
                                <div class="error"> <?php echo $controller->getErrors('university') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label for="department">Τμήμα</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" id="department" name="department" value="<?php echo $controller->getData('department'); ?>" class="text-input">
                                    <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Δεν επιτρεπονται ψηφία">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                                <div class="error"> <?php echo $controller->getErrors('department') ?? '' ?> </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Δικαιολογητικά</h6>
                    <hr class="form-bar">

                    <div class="error"> <?php echo $controller->getErrors('upload') ?? '' ?> </div>

                    <div class="d-flex flex-column justify-content-between">
                       
                        <div class="col-md-5 mt-2">
                            <label for="id_copy">Αντίγραφο Ταυτότητας</label>
                            <div class="value"> <?php echo $controller->getFiles('identification') ?? '' ?> </div>
                            <div class="d-flex align-items-center col-12">
                                <input type="file" id="id_copy" name="identification" value="" />
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Μόνο .pdf ή .jpeg αρχεία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('identification') ?? '' ?> </div>
                        </div>

                        <div class="col-md-5 mt-2">
                            <label for="diploma">Πτυχίο</label>
                            <div class="value"> <?php echo $controller->getFiles('diploma') ?? '' ?> </div>
                            <div class="d-flex align-items-center col-12">
                                <input type="file" id="diploma" name="diploma" value="" />
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Μόνο .pdf ή .jpeg αρχεία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('diploma') ?? '' ?> </div>
                        </div>
                       
                        <div class="col-md-5 mt-2">
                            <label for="grades">Αναλυτική Βαθμολογία</label>
                            <div class="value"> <?php echo $controller->getFiles('grades') ?? '' ?> </div>
                            <div class="d-flex align-items-center col-12">
                                <input type="file" id="grades" name="grades" value="" />
                                <button type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Μόνο .pdf ή .jpeg αρχεία">
                                    <i class="bi bi-info-circle"></i>
                                </button>
                            </div>
                            <div class="error"> <?php echo $controller->getErrors('grades') ?? '' ?> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Οριστική Υποβολή</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-column mt-4">
                        <div class="d-flex flex-column col-8 ">
                            <label for="comment">Σχόλεια Αιτούντα</label>
                            <textarea rows="5" type="text" id="comment" name="comment" value="<?php echo $controller->getData('comment'); ?>" class="text-input"></textarea>
                            <div class="error"> <?php echo $controller->getErrors('comment') ?? '' ?> </div>
                        </div>
                        <div class="mt-5 d-flex flex-row align-items-center col-12">
                            <input type="checkbox" id="consent" name="consent" value="yes">
                            <div class="d-flex flex-column">
                                <label for="consent" class="p-3">Εξουσιοδοτώ τον ΔΟΑΤΑΠ να ζητήσει οποιοδήποτε απαραίτητο έγγραφο και οποιαδήποτε πληροφορία σχετικά με το ακαδημαϊκό μου πτυχίο προκειμένου να διεκπεραιώσει την αναγνώριση του ανωτέρου πτυχίου.</label><br>
                                <div id="checkbox-error" class="error unchecked">Πρέπει να συμφωνείσεται με τους όρους</div>
                                <div class="error"> <?php echo $controller->getErrors('consent') ?? '' ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Τροπος Πληρωμής</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-column">
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-2">
                            <input type="radio" id="deposit" name="payment" value="deposit" checked>
                            <div class="d-flex flex-column align-items-center justify-content-end">
                                <label for="deposit">Κατάθεση στην Τράπεζα της Ελλάδος</label>
                                <p class="text-black-50" style="font-size: smaller;">IBAN: GR05 0100 0240 0000 0002 6072 595</p>
                            </div>
                        </div>
                        
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-2">
                            <input type="radio" id="credit" name="payment" value="credit" data-bs-toggle="modal" data-bs-target="#creditModal">
                            <div class="d-flex flex-column align-items-center justify-content-end">
                                <label for="credit">Χρεωστική/Πιστωτική</label>
                                <p id="credit-payment" style="font-size: smaller; color:chocolate; display:none">Η Πληρωμή Ολοκληρώθηκε</p>
                            </div>

                            <div class="modal fade" id="creditModal" tabindex="-1" aria-labelledby="creditModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="creditModalLabel">Χρεωστική/Πιστωτική</h5>
                                            <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe 
                                                id="paymentsIframe" 
                                                class="visible m-auto" 
                                                width="100%" 
                                                height="400px" 
                                                frameborder="0" 
                                                scrolling="yes" 
                                                src="http://localhost/Doatap/src/views/payment.php">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-3">
                            <input type="radio" id="paypal" name="payment" value="paypal" data-bs-toggle="modal" data-bs-target="#paypalModal">
                            <div class="d-flex flex-column align-items-center justify-content-end">
                                <label for="paypal">PayPal</label>
                            </div>
                      
                            <div class="modal fade" id="paypalModal" tabindex="-1" aria-labelledby="paypalModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="paypalModalLabel">PayPal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h6 class="fw-bolder mb-2 mt-5">Τροπος Αποστολής</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-column">
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-3">
                            <input type="radio" id="e-statement" name="after_issued" value="e-statement" onclick="digitalOnly()" checked>
                            <label for="e-statement">e-statement</label>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-3">
                            <input type="radio" id="delivery" name="after_issued" value="Αποστολή Εντυπου" onclick="showAddress()">
                            <div class="d-flex flex-column align-items-center justify-content-end">
                                <label for="delivery">Αποστολή Εντυπου</label>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-between mt-3" onclick="showAddress()">
                            <input type="radio" id="both" name="after_issued" value="Αποστολή Εντυπου και e-statement">
                            <label for="both">Και τα δύο παραπανώ</label>
                        </div>

                        <div id="address-panel" class="panel mt-2" style="display: none;">
                            <p style="font-size: smaller; color:chocolate;">Το έντυπο θα αποσταλεί στην διευθυνση που δηλώσατε στο πρώτο βήμα</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="overflow:hidden;">
                <div class="m-3 float-end">
                    <button class="btn" type="submit" name="submit-form" value='draft'>Αποθήκευση</button>
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Προηγούμενο</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Επόμενο</button>
                    <button id="submitBtn" type="submit" name="submit-form" value='register'>Υποβολή</button>
                </div>
            </div>

        </form>
    </div>
    <?php 
        include(BASE_URL. 'includes\footer.php'); 
    ?>
    <script type="text/javascript" src="scripts/request.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>