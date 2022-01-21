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

        <div class="container">
            

            <h2 class="text-center mt-5"> Αναγνώριση ισοτιμίας</h2>
            <h6 class="text-center fw-lighter mb-5"><?php echo $formPreview[23] ?> <i class="bi bi-dot"></i> <?php echo $formPreview[22] ?></h6>
            
            <div class="container mt-5" style="width: 70%;">
                <h6 class="fw-bolder mb-2">Προσωπικά Στοιχεία</h6>
                <hr class="form-bar">
            
                <div class="d-flex flex-row justify-content-between col-md-6">
                    <div class="col-md-6">
                        <label>Όνομα</label>
                        <p><?php echo $formPreview[1] ?></p>
                    </div>
                    <div class="col-md-6">
                        <label>Επώνυμο</label>
                        <p><?php echo $formPreview[2] ?></p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between col-md-6 mt-2">
                    <div class="col-md-6">
                        <label>Πατρώνυμο</label>
                        <p><?php echo $formPreview[3] ?></p>
                    </div>
                    <div class="col-md-6">
                        <label>Μητρώνυμο</label>
                        <p><?php echo $formPreview[4] ?></p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between col-md-6 mt-2">
                    <div class="col-md-6">
                        <label>ΑΜΚΑ</label>
                        <p><?php echo $formPreview[5] ?></p>
                    </div>
                    <div class="col-md-6">
                        <label>ΑΦΜ</label>
                        <p><?php echo $formPreview[6] ?></p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between col-md-6 mt-2">
                    <div class="col-md-6">
                        <label>Ταυτοποίηση</label>
                        <p><?php echo $formPreview[7] ?></p>
                    </div>
                    <div class="col-md-6">
                        <label>Αριθμός Ταυτότητας</label>
                        <p><?php echo $formPreview[8] ?></p>
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
                            <label>Τροπος Πληρωμής</label>
                            <div><?php echo $formPreview[24] ?></div>
                        </div>
                        <div class="mt-3">
                            <label>Τροπος Αποστολής</label>
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
                        <label>Χώρα Εκδοσης Πτυχίου</label>
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
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[27] ?>"
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
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[28] ?>"
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
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview[29] ?>"
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
                <h6 class="fw-bolder mb-2">Σχόλεια Αιτούντα</h6>
                <hr class="form-bar">
                <div class="col-md-5 d-flex flex-column">
                    <p><?php echo $formPreview[20] ?? 'N/A' ?></p>
                </div>
            </div>

            <div id="form-id" name="<?php echo $formPreview[0];?>" ></div>

            <?php if(isAdmin()){ 
                if($formPreview[23] != 'checked'){ ?>
                <div class="container mt-5" style="width: 70%;">
                    <div class="d-flex flex-row justify-content-center p-3">
                        <div class="col-md-3 text-center">
                            <div style="color: black;" ><button class="btn text-end col-12" style="text-decoration:underline" onclick="reject()">Απόρηψη</button></div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div style="background-color: #04AA6D;" ><button class="btn text-center border border-3 col-12" style="color:white" onclick="approve()">Αποδοχή</button></div>
                        </div>
                    </div>
                </div>
            <?php }} ?>
           
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
        <script type="text/javascript" src="scripts/process-form.js"></script>
    </body>
</html>
