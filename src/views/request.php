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
    <link rel="stylesheet" href="../../style.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../scripts.js"></script>
    <title>Request</title>
</head>

<body>
    <div class="auth-content">
        <form id="regForm" method='post' action='request.php' enctype="multipart/form-data">

            <!-- One "tab" for each step in the form: -->
            <div class="tab">Στοιχεία Αιτούντος:
                <div>
                    <label>Όνομα</label>
                    <input type="text" name="name" value="<?php echo $controller->getName(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('name') ?? '' ?> </div>
                </div>
                <div>
                    <label>Επώνυμο</label>
                    <input type="text" name="surname" value="<?php echo $controller->getSurname(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('surname') ?? '' ?> </div>
                </div>
                <div>
                    <label>Φύλο</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="Άνδρας">Άνδρας</option>
                        <option value="Γυναίκα">Γυναίκα</option>
                        <option value="Άλλο">Άλλο</option>
                    </select>
                    <div class="error"> <?php echo $controller->getErrors('gender') ?? '' ?> </div>
                </div>
                <div>
                    <label>Πατρώνυμο</label>
                    <input type="text" name="father_name" value="<?php echo $controller->getData('father_name'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('father_name') ?? '' ?> </div>
                </div>
                <div>
                    <label>Μητρώνυμο</label>
                    <input type="text" name="mother_name" value="<?php echo $controller->getData('mother_name'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('mother_name') ?? '' ?> </div>
                </div>
                <div>
                    <label>ΑΜΚΑ</label>
                    <input type="text" name="amka" value="<?php echo $controller->getAMKA(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('amka') ?? '' ?> </div>
                </div>
                <div>
                    <label>ΑΦΜ</label>
                    <input type="text" name="afm" value="<?php echo $controller->getAFM(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('afm') ?? '' ?> </div>
                </div>
                <div>
                    <label>Χώρα Γέννησης</label>
                    <input type="text" name="birth_country" value="<?php echo $controller->getData('birth_country'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('birth_country') ?? '' ?> </div>
                </div>
                <div>
                    <label>Πόλη Γέννησης</label>
                    <input type="text" name="birth_city" value="<?php echo $controller->getData('birth_city'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('birth_city') ?? '' ?> </div>
                </div>
                <div>
                    <label>Ημερομηνία Γέννησης</label>
                    <input type="text" name="birth_date" value="<?php echo $controller->getData('birth_date'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('birth_date') ?? '' ?> </div>
                </div>
                <div>
                    <label>Ταυτοποίηση</label>
                    <input type="radio" class="btn-check" name="identification" id="success-outlined" value="Ταυτότητα" autocomplete="off" checked>
                    <label class="btn btn-outline-success" for="outlined">Ταυτότητα</label>
                    <input type="radio" class="btn-check" name="identification" id="danger-outlined" value="Διαβατήριο" autocomplete="off">
                    <label class="btn btn-outline-danger" for="outlined">Διαβατήριο</label>
                    <div class="error"> <?php echo $controller->getErrors('identification') ?? '' ?> </div>
                </div>
                <div>
                    <label>Αριθμός Ταυτότητας</label>
                    <input type="text" name="ID_num" value="<?php echo $controller->getData('ID_num'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('ID_num') ?? '' ?> </div>
                </div>
                <div>
                    <label>Ημερομηνία Έκδοσης</label>
                    <input type="text" name="release_date" value="<?php echo $controller->getData('release_date'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('release_date') ?? '' ?> </div>
                </div>
                <div>
                    <label>Χώρα Έκδοσης</label>
                    <select name="release_country" id="release_country" class="form-select">
                        <option value="Ελλάδα">Ελλάδα</option>
                        <option value="Γαλλία">Γαλλία</option>
                        <option value="Αγγλία">Αγγλία</option>
                    </select>
                    <div class="error"> <?php echo $controller->getErrors('release_country') ?? '' ?> </div>
                </div>
                <div>
                    <label>Χώρα Διαμονής</label>
                    <select name="living_country" id="living_country" class="form-select">
                        <option value="Ελλάδα">Ελλάδα</option>
                        <option value="Γαλλία">Γαλλία</option>
                        <option value="Αγγλία">Αγγλία</option>
                    </select>
                    <div class="error"> <?php echo $controller->getErrors('living_country') ?? '' ?> </div>
                </div>
                <div>
                    <label>Πόλη Διαμονής</label>
                    <input type="text" name="living_city" value="<?php echo $controller->getData('living_city'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('living_city') ?? '' ?> </div>
                </div>
                <div>
                    <label>Τόπος Διαμονής</label>
                    <input type="text" name="living_area" value="<?php echo $controller->getData('living_area'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('living_area') ?? '' ?> </div>
                </div>
                <div>
                    <label>Διεύθυνση</label>
                    <input type="text" name="address" value="<?php echo $controller->getData('address'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('address') ?? '' ?> </div>
                </div>
                <div>
                    <label>Αριθμός Τηλεφώνου</label>
                    <input type="text" name="cel" value="<?php echo $controller->getData('cel'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('cel') ?? '' ?> </div>
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $controller->getEmail(); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('email') ?? '' ?> </div>
                </div>
            </div>

            <div class="tab">Τίτλος Σπουδών:
                <div>
                    <label>Τύπος Πτυχίου</label>
                        <input type="radio" class="btn-check" name="diploma_type" id="success-outlined" autocomplete="off" value="Βασικό Πτυχίο" checked>
                        <label class="btn btn-outline-success" for="outlined">Βασικό Πτυχίο</label>
                        <input type="radio" class="btn-check" name="diploma_type" id="danger-outlined" value="Μεταπτυχιακό" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Μεταπτυχιακό</label>
                        <input type="radio" class="btn-check" name="diploma_type" id="danger-outlined" value="Διδακτορικό" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Διδακτορικό</label>
                        <div class="error"> <?php echo $controller->getErrors('diploma_type') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Τύπος Φοίτησης</label>
                        <input type="radio" class="btn-check" name="study_type" id="success-outlined" value="Τακτική" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="outlined">Τακτική</label>
                        <input type="radio" class="btn-check" name="study_type" id="danger-outlined" value="Μερική" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Μερική</label>
                        <div class="error"> <?php echo $controller->getErrors('study_type') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Αντιστοιχία Πτυχίου</label>
                        <input type="radio" class="btn-check" name="diploma_recognition" id="success-outlined" value="Ναι" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="outlined">Ναι</label>
                        <input type="radio" class="btn-check" name="diploma_recognition" id="danger-outlined" value="Όχι" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Όχι</label>
                        <div class="error"> <?php echo $controller->getErrors('diploma_recognition') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Συνεκτίμηση Πτυχίου</label>
                        <input type="radio" class="btn-check" name="evaluation" id="success-outlined" value="Ναι" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="outlined">Ναι</label>
                        <input type="radio" class="btn-check" name="evaluation" id="danger-outlined" value="Όχι" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Όχι</label>
                        <div class="error"> <?php echo $controller->getErrors('evaluation') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Τρόπος Φοίτησης</label>
                        <input type="radio" class="btn-check" name="study_process" id="success-outlined" value="Συμβατικός" autocomplete="off" checked>
                        <label class="btn btn-outline-success" for="outlined">Συμβατικός</label>
                        <input type="radio" class="btn-check" name="study_process" id="danger-outlined" value="Εξ' αποστάσεως" autocomplete="off">
                        <label class="btn btn-outline-danger" for="outlined">Εξ' αποστάσεως</label>
                        <div class="error"> <?php echo $controller->getErrors('study_process') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Αντιστοιχία Πτυχίου</label>
                        <input type="text" name="diploma_recognition" value="<?php echo $controller->getData('diploma_recognition'); ?>" class="text-input">
                        <div class="error"> <?php echo $controller->getErrors('diploma_recognition') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Χώρα Σπουδών</label>
                        <select name="study_country" id="study_country" class="form-select">
                            <option value="Ελλάδα">Ελλάδα</option>
                            <option value="Γαλλία">Γαλλία</option>
                            <option value="Αγγλία">Αγγλία</option>
                        </select>
                        <div class="error"> <?php echo $controller->getErrors('study_country') ?? '' ?> </div>
                    </div>
                    <div>
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
                    <div>
                        <label>Τίτλος Σπουδών</label>
                        <input type="text" name="department" value="<?php echo $controller->getData('department'); ?>" class="text-input">
                        <div class="error"> <?php echo $controller->getErrors('department') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πιστ. Μονάδες (credits)</label>
                        <input type="text" name="credits" value="<?php echo $controller->getData('credits'); ?>" class="text-input">
                        <div class="error"> <?php echo $controller->getErrors('credits') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Ημερομηνία Εγγραφής</label>
                        <input type="text" name="start_date" value="<?php echo $controller->getData('start_date'); ?>" class="text-input">
                        <div class="error"> <?php echo $controller->getErrors('start_date') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Ημερομηνία Αποφοίτησης</label>
                        <input type="text" name="diploma_date" value="<?php echo $controller->getData('diploma_date'); ?>" class="text-input">
                        <div class="error"> <?php echo $controller->getErrors('diploma_date') ?? '' ?> </div>
                    </div>
                </div>
            </div>  

            <div class="tab">Επισυναπτόμενα Έγγραφα:
                <div class="error"> <?php echo $controller->getErrors('upload') ?? '' ?> </div>
                <div>
                    <div>
                        <label>Παράβολο</label>
                        <div class="value"> <?php echo $controller->getFiles('parabolo') ?? '' ?> </div>
                        <input type="file" name="parabolo" value=""/>
                        <div class="error"> <?php echo $controller->getErrors('parabolo') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Αντίγραφο Ταυτότητας</label>
                        <div class="value"> <?php echo $controller->getFiles('taytotita') ?? '' ?> </div>
                        <input type="file" name="taytotita" value="" />
                        <div class="error"> <?php echo $controller->getErrors('taytotita') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Υπεύθυνη Δήλωση</label>
                        <div class="value"> <?php echo $controller->getFiles('ypey8hnh_dhlwsh') ?? '' ?> </div>
                        <input type="file" name="ypey8hnh_dhlwsh" value="" />
                        <div class="error"> <?php echo $controller->getErrors('ypey8hnh_dhlwsh') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Έντυπο Συγκατάθεσης</label>
                        <div class="value"> <?php echo $controller->getFiles('entypo_sygkatathesis') ?? '' ?> </div>
                        <input type="file" name="entypo_sygkatathesis" value="" />
                        <div class="error"> <?php echo $controller->getErrors('entypo_sygkatathesis') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Απολυτήριο Λυκείου</label>
                        <div class="value"> <?php echo $controller->getFiles('apolytirio_lykeiou') ?? '' ?> </div>
                        <input type="file" name="apolytirio_lykeiou" value="" />
                        <div class="error"> <?php echo $controller->getErrors('apolytirio_lykeiou') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πτυχίο</label>
                        <div class="value"> <?php echo $controller->getFiles('Ptyxio') ?? '' ?> </div>
                        <input type="file" name="Ptyxio" value="" />
                        <div class="error"> <?php echo $controller->getErrors('Ptyxio') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Μεταπτυχιακός Τίτλος</label>
                        <div class="value"> <?php echo $controller->getFiles('metaptixiako') ?? '' ?> </div>
                        <input type="file" name="metaptixiako" value="" />
                        <div class="error"> <?php echo $controller->getErrors('metaptixiako') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πιστοποιητικό Μαθημάτων</label>
                        <div class="value"> <?php echo $controller->getFiles('pist_mathimaton') ?? '' ?> </div>
                        <input type="file" name="pist_mathimaton" value="" />
                        <div class="error"> <?php echo $controller->getErrors('pist_mathimaton') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πιστοποιητικό Πανεπιστημίου</label>
                        <div class="value"> <?php echo $controller->getFiles('pist_panepistimiou') ?? '' ?> </div>
                        <input type="file" name="pist_panepistimiou" value="" />
                        <div class="error"> <?php echo $controller->getErrors('pist_panepistimiou') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Εργασία Μεταπτυχιακού Τίτλου</label>
                        <div class="value"> <?php echo $controller->getFiles('Ergasia_met') ?? '' ?> </div>
                        <input type="file" name="Ergasia_met" value="" />
                        <div class="error"> <?php echo $controller->getErrors('Ergasia_met') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πιστοποιητικό Πανεπιστημίου (Συνεκτίμηση Μεταπτυχιακού)</label>
                        <div class="value"> <?php echo $controller->getFiles('pist_panep_sinek') ?? '' ?> </div>
                        <input type="file" name="pist_panep_sinek" value="" />
                        <div class="error"> <?php echo $controller->getErrors('pist_panep_sinek') ?? '' ?> </div>
                    </div>
                    <div>
                        <label>Πιστοποιητικό Μαθημάτων (Συνεκτίμηση Μεταπτυχιακού)</label>
                        <div class="value"> <?php echo $controller->getFiles('pist_math_sinek') ?? '' ?> </div>
                        <input type="file" name="pist_math_sinek" value="" />
                        <div class="error"> <?php echo $controller->getErrors('pist_math_sinek') ?? '' ?> </div>
                    </div>
                </div>
            </div>

            <div class="tab">Οριστική Υποβολή:
                <div>
                    <label>Σχόλεια Αιτούντα</label>
                    <input type="text" name="comment" value="<?php echo $controller->getData('comment'); ?>" class="text-input">
                    <div class="error"> <?php echo $controller->getErrors('comment') ?? '' ?> </div>
                </div>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button class='btn btn-outline-info' type="submit" name="submit-form" value='register' class="submit">Submit</button>
                    <button type="submit" name="submit-form" value='draft' class="submit">Draft</button>
                </div>
            </div>

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="request.js"></script>
</body>

</html>