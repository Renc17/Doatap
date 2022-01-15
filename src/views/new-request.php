<?php

require('../../config.php');
require(BASE_URL . 'controllers\forms.php');
require(BASE_URL . 'helpers\middlewares\guard.php');
usersOnly();
$controller =  new FormController($database);
$controller->create();
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

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <title>Νέα Αίτηση</title>

    <style>
        *{
            background-color: #fff;
        }

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

        .radio-toolbar input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #fff;
            padding: 10px 20px;
            font-family: sans-serif, Arial;
            font-size: 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        .radio-toolbar input[type="radio"]:checked + label {
            background-color: #fff;
            border-color: #026CD7;
            
        }

        a.btn{
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            width: 100%;
        }

        .breadcrumb-item a{
            text-decoration: none;
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
                <div class="row steps-bar m-auto">
                    <div class=" d-flex justify-content-between step col-3">
                        <div>
                            <span >Στοιχεία <br> Αιτούντος</span>
                        </div>
                        <div>
                            <hr class="bar">
                        </div>
                    </div>
                    
                    <div class=" d-flex justify-content-between step col-3">
                        <div>
                            <span >Τίτλος <br> Σπουδών</span>
                        </div>
                        <div>
                            <hr class="bar">
                        </div>
                    </div>


                    <div class=" d-flex justify-content-between step col-3">
                        <div>
                            <span >Επισυναπτόμενα <br> Έγγραφα</span>
                        </div>
                        <div>
                            <hr class="bar">
                        </div>
                    </div>

                    <div class=" d-flex justify-content-between step col-3">
                        <span >Οριστική <br> Υποβολή</span>
                    </div>
                </div>
            </div>
            
            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Προσωπικά Στοιχεία</h6>
                    <hr class="form-bar">
                
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3">
                            <label>Όνομα</label>
                            <input type="text" name="name" value="<?php echo $controller->getName(); ?>" class="text-input" placeholder="<?php echo $controller->getName(); ?>">
                            <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Επώνυμο</label>
                            <input type="text" name="surname" value="<?php echo $controller->getSurname(); ?>" class="text-input" placeholder="<?php echo $controller->getSurname(); ?>">
                            <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Φύλο</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="Άνδρας">Άνδρας</option>
                                <option value="Γυναίκα">Γυναίκα</option>
                                <option value="Άλλο">Άλλο</option>
                            </select>
                            <div class="error"> <?php echo $controller->getErrors('gender') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Πατρώνυμο</label>
                            <input type="text" name="father_name" value="<?php echo $controller->getData('father_name'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('father_name') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Μητρώνυμο</label>
                            <input type="text" name="mother_name" value="<?php echo $controller->getData('mother_name'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('mother_name') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>ΑΜΚΑ</label>
                            <input type="text" name="amka" value="<?php echo $controller->getAMKA(); ?>" class="text-input" placeholder="<?php echo $controller->getAMKA(); ?>" >
                            <div class="error"> <?php echo $controller->getErrors('amka') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Χώρα Γέννησης</label>
                            <input type="text" name="birth_country" value="<?php echo $controller->getData('birth_country'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('birth_country') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πόλη Γέννησης</label>
                            <input type="text" name="birth_city" value="<?php echo $controller->getData('birth_city'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('birth_city') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Γέννησης</label>
                            <input type="text" name="birth_date" value="<?php echo $controller->getData('birth_date'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('birth_date') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row mt-2">
                        <div class="radio-toolbar col-md-4">
                            <input type="radio" id="id" name="identification" value="Ταυτότητα" checked>
                            <label for="id">Ταυτότητα</label>

                            <input type="radio" id="passport" name="identification" value="Διαβατήριο">
                            <label for="passport">Διαβατήριο</label>

                            <div class="error"> <?php echo $controller->getErrors('identification') ?? '' ?> </div>
                        </div>
                        
                        <div class="col-md-3">
                            <label>ΑΦΜ</label>
                            <input type="text" name="afm" value="<?php echo $controller->getAFM(); ?>" class="text-input" placeholder="<?php echo $controller->getAFM(); ?>">
                            <div class="error"> <?php echo $controller->getErrors('afm') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Αριθμός Ταυτότητας</label>
                            <input type="text" name="ID_num" value="<?php echo $controller->getData('ID_num'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('ID_num') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Έκδοσης</label>
                            <input type="text" name="release_date" value="<?php echo $controller->getData('release_date'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('release_date') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Χώρα Έκδοσης</label>
                            <select name="release_country" id="release_country" class="form-select">
                                <option value="Ελλάδα">Ελλάδα</option>
                                <option value="Γαλλία">Γαλλία</option>
                                <option value="Αγγλία">Αγγλία</option>
                            </select>
                            <div class="error"> <?php echo $controller->getErrors('release_country') ?? '' ?> </div>
                        </div>
                    </div>


                    <h6 class="fw-bolder mb-2 mt-5">Στοιχεία Επικοινωνίας</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3">
                            <label>Χώρα Διαμονής</label>
                            <select name="living_country" id="living_country" class="form-select">
                                <option value="Ελλάδα">Ελλάδα</option>
                                <option value="Γαλλία">Γαλλία</option>
                                <option value="Αγγλία">Αγγλία</option>
                            </select>
                            <div class="error"> <?php echo $controller->getErrors('living_country') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πόλη Διαμονής</label>
                            <input type="text" name="living_city" value="<?php echo $controller->getData('living_city'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('living_city') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Τόπος Διαμονής</label>
                            <input type="text" name="living_area" value="<?php echo $controller->getData('living_area'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('living_area') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Διεύθυνση</label>
                            <input type="text" name="address" value="<?php echo $controller->getData('address'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('address') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Αριθμός Τηλεφώνου</label>
                            <input type="text" name="cel" value="<?php echo $controller->getData('cel'); ?>" class="text-input">
                            <div class="error"> <?php echo $controller->getErrors('cel') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                            <input type="text" name="email" value="<?php echo $controller->getEmail(); ?>" class="text-input" placeholder="<?php echo $controller->getEmail(); ?>">
                            <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                        <h6 class="fw-bolder mb-2">Στοιχεία τίτλου προς αναγνώριση</h6>
                        <hr class="form-bar">

                        <div class="d-flex flex-row justify-content-between">
                            <div class="radio-toolbar col-md-6">
                                <input type="radio" id="Πτυχίο" name="diploma_type" value="Βασικό Πτυχίο" checked>
                                <label for="Πτυχίο">Βασικό Πτυχίο</label>

                                <input type="radio" id="Μεταπτυχιακό" name="diploma_type" value="Μεταπτυχιακό">
                                <label for="Μεταπτυχιακό">Μεταπτυχιακό</label>

                                <input type="radio" id="Διδακτορικό" name="diploma_type" value="Διδακτορικό">
                                <label for="Διδακτορικό">Διδακτορικό</label>

                                <div class="error"> <?php echo $controller->getErrors('diploma_type') ?? '' ?> </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-2">
                            <div class="col-md-5">
                                <label>Τύπος Φοίτησης</label>
                                <div class="radio-toolbar">
                                    <input type="radio" id="Τακτική" name="study_type" value="Τακτική" checked>
                                    <label for="Τακτική">Τακτική</label>

                                    <input type="radio" id="Μερική" name="study_type" value="Μερική">
                                    <label for="Μερική">Μερική</label>

                                    <div class="error"> <?php echo $controller->getErrors('study_type') ?? '' ?> </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Αντιστοιχία Πτυχίου</label>
                                <div class="radio-toolbar">
                                    <input type="radio" id="Ναι" name="diploma_recognition" value="Ναι" checked>
                                    <label for="Ναι">Ναι</label>

                                    <input type="radio" id="Όχι" name="diploma_recognition" value="Όχι" >
                                    <label for="Όχι">Όχι</label>


                                    <div class="error"> <?php echo $controller->getErrors('diploma_recognition') ?? '' ?> </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-2">
                            <div class="col-md-5">
                                <label>Συνεκτίμηση Πτυχίου</label>
                                <div class="radio-toolbar">
                                    <input type="radio" id="Ναι" name="evaluation" value="Ναι" checked>
                                    <label for="Ναι">Ναι</label>

                                    <input type="radio" id="Όχι" name="evaluation" value="Όχι">
                                    <label for="Όχι">Όχι</label>

                                    <div class="error"> <?php echo $controller->getErrors('evaluation') ?? '' ?> </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label>Τρόπος Φοίτησης</label>
                                <div class="radio-toolbar">
                                    <input type="radio" id="Συμβατικός" name="study_process" value="Συμβατικός" checked>
                                    <label for="Συμβατικός">Συμβατικός</label>

                                    <input type="radio" id="Εξ' αποστάσεως" name="study_process" value="Εξ' αποστάσεως" >
                                    <label for="Εξ' αποστάσεως">Εξ' αποστάσεως</label>

                                    <div class="error"> <?php echo $controller->getErrors('study_process') ?? '' ?> </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-2">
                            <div class="col-md-3">
                                <label>Χώρα Σπουδών</label>
                                <select name="study_country" id="study_country" class="form-select">
                                    <option value="Ελλάδα">Ελλάδα</option>
                                    <option value="Γαλλία">Γαλλία</option>
                                    <option value="Αγγλία">Αγγλία</option>
                                </select>
                                <div class="error"> <?php echo $controller->getErrors('study_country') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3">
                                <label>Πανεπιστήμιο</label>
                                <select name="university" id="university" class="form-select">
                                    <option value="ΕΚΠΑ">Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                                    <option value="ΠΑΔΑ">Πανεπιστήμιο Δυτικής Αττικής</option>
                                    <option value="ΠΑΝΤΕΙΟΝ">Πάντειον Πανεπιστήμιο</option>
                                    <option value="ΑΠΘ">Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης</option>
                                    <option value="ΕΜΠ">Εθνικό Μετσόβιο Πολυτεχνείο</option>
                                </select>
                                <div class="error"> <?php echo $controller->getErrors('university') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3">
                                <label>Τίτλος Σπουδών</label>
                                <input type="text" name="department" value="<?php echo $controller->getData('department'); ?>" class="text-input">
                                <div class="error"> <?php echo $controller->getErrors('department') ?? '' ?> </div>
                            </div>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-2">
                            <div class="col-md-3">
                                <label>Πιστ. Μονάδες (credits)</label>
                                <input type="text" name="credits" value="<?php echo $controller->getData('credits'); ?>" class="text-input">
                                <div class="error"> <?php echo $controller->getErrors('credits') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3">
                                <label>Ημερομηνία Εγγραφής</label>
                                <input type="text" name="start_date" value="<?php echo $controller->getData('start_date'); ?>" class="text-input">
                                <div class="error"> <?php echo $controller->getErrors('start_date') ?? '' ?> </div>
                            </div>
                            <div class="col-md-3">
                                <label>Ημερομηνία Αποφοίτησης</label>
                                <input type="text" name="diploma_date" value="<?php echo $controller->getData('diploma_date'); ?>" class="text-input">
                                <div class="error"> <?php echo $controller->getErrors('diploma_date') ?? '' ?> </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="tab">
                <div class="container mt-5" style="width: 70%;">
                    <div class="error"> <?php echo $controller->getErrors('upload') ?? '' ?> </div>

                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3">
                            <label>Παράβολο</label>
                            <div class="value"> <?php echo $controller->getFiles('parabolo') ?? '' ?> </div>
                            <input type="file" name="parabolo" value=""/>
                            <div class="error"> <?php echo $controller->getErrors('parabolo') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Αντίγραφο Ταυτότητας</label>
                            <div class="value"> <?php echo $controller->getFiles('taytotita') ?? '' ?> </div>
                            <input type="file" name="taytotita" value="" />
                            <div class="error"> <?php echo $controller->getErrors('taytotita') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Υπεύθυνη Δήλωση</label>
                            <div class="value"> <?php echo $controller->getFiles('ypey8hnh_dhlwsh') ?? '' ?> </div>
                            <input type="file" name="ypey8hnh_dhlwsh" value="" />
                            <div class="error"> <?php echo $controller->getErrors('ypey8hnh_dhlwsh') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Έντυπο Συγκατάθεσης</label>
                            <div class="value"> <?php echo $controller->getFiles('entypo_sygkatathesis') ?? '' ?> </div>
                            <input type="file" name="entypo_sygkatathesis" value="" />
                            <div class="error"> <?php echo $controller->getErrors('entypo_sygkatathesis') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Απολυτήριο Λυκείου</label>
                            <div class="value"> <?php echo $controller->getFiles('apolytirio_lykeiou') ?? '' ?> </div>
                            <input type="file" name="apolytirio_lykeiou" value="" />
                            <div class="error"> <?php echo $controller->getErrors('apolytirio_lykeiou') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πτυχίο</label>
                            <div class="value"> <?php echo $controller->getFiles('Ptyxio') ?? '' ?> </div>
                            <input type="file" name="Ptyxio" value="" />
                            <div class="error"> <?php echo $controller->getErrors('Ptyxio') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Μεταπτυχιακός Τίτλος</label>
                            <div class="value"> <?php echo $controller->getFiles('metaptixiako') ?? '' ?> </div>
                            <input type="file" name="metaptixiako" value="" />
                            <div class="error"> <?php echo $controller->getErrors('metaptixiako') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πιστοποιητικό Μαθημάτων</label>
                            <div class="value"> <?php echo $controller->getFiles('pist_mathimaton') ?? '' ?> </div>
                            <input type="file" name="pist_mathimaton" value="" />
                            <div class="error"> <?php echo $controller->getErrors('pist_mathimaton') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πιστοποιητικό Πανεπιστημίου</label>
                            <div class="value"> <?php echo $controller->getFiles('pist_panepistimiou') ?? '' ?> </div>
                            <input type="file" name="pist_panepistimiou" value="" />
                            <div class="error"> <?php echo $controller->getErrors('pist_panepistimiou') ?? '' ?> </div>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>.<br>Εργασία Μεταπτυχιακού Τίτλου</label>
                            <div class="value"> <?php echo $controller->getFiles('Ergasia_met') ?? '' ?> </div>
                            <input type="file" name="Ergasia_met" value="" />
                            <div class="error"> <?php echo $controller->getErrors('Ergasia_met') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πιστοποιητικό Πανεπιστημίου (Συνεκτίμηση Μεταπτυχιακού)</label>
                            <div class="value"> <?php echo $controller->getFiles('pist_panep_sinek') ?? '' ?> </div>
                            <input type="file" name="pist_panep_sinek" value="" />
                            <div class="error"> <?php echo $controller->getErrors('pist_panep_sinek') ?? '' ?> </div>
                        </div>
                        <div class="col-md-3">
                            <label>Πιστοποιητικό Μαθημάτων (Συνεκτίμηση Μεταπτυχιακού)</label>
                            <div class="value"> <?php echo $controller->getFiles('pist_math_sinek') ?? '' ?> </div>
                            <input type="file" name="pist_math_sinek" value="" />
                            <div class="error"> <?php echo $controller->getErrors('pist_math_sinek') ?? '' ?> </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab">Οριστική Υποβολή:
                <div class="container mt-5" style="width: 70%;">
                    <div class="col-md-5 d-flex flex-column">
                        <label for="comment">Σχόλεια Αιτούντα</label>
                        <textarea rows="5" type="text" id="comment" name="comment" value="<?php echo $controller->getData('comment'); ?>" class="text-input"></textarea>
                        <div class="error"> <?php echo $controller->getErrors('comment') ?? '' ?> </div>
                    </div>
                </div>
            </div>

            <div style="overflow:hidden;">
                <div class="m-3 float-end">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button id="submitBtn" type="submit" name="submit-form" value='register'>Submit</button>
                    <button type="submit" name="submit-form" value='draft'>Draft</button>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="request.js"></script>
</body>

</html>