<?php

require('../../config.php');
require(BASE_URL . 'controllers\forms.php');
require(BASE_URL . 'helpers\middlewares\guard.php');

$controller =  new FormController($database);
$formPreview = $controller->getFormPreview($_GET['id']);
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
    <title>Ανάγνωση</title>

    <style>
        label{
            font-weight: bold;
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
            <form id="regForm" method='post' action='request.php' enctype="multipart/form-data">

                <h2 class="text-center mt-5"> Αναγνώριση ισοτιμίας</h2>
                <h6 class="text-center fw-lighter mb-5">Υποβλήθηκε <i class="bi bi-dot"></i> <?php echo $formPreview['data'][35] ?></h6>
                
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Προσωπικά Στοιχεία</h6>
                    <hr class="form-bar">
                
                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3">
                            <label>Όνομα</label>
                            <p><?php echo $formPreview['data'][1] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Επώνυμο</label>
                            <p><?php echo $formPreview['data'][2] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Φύλο</label>
                            <p><?php echo $formPreview['data'][3] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Πατρώνυμο</label>
                            <p><?php echo $formPreview['data'][4] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Μητρώνυμο</label>
                            <p><?php echo $formPreview['data'][5] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>ΑΜΚΑ</label>
                            <p><?php echo $formPreview['data'][6] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Χώρα Γέννησης</label>
                            <p><?php echo $formPreview['data'][8] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Πόλη Γέννησης</label>
                            <p><?php echo $formPreview['data'][9] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Γέννησης</label>
                            <p><?php echo $formPreview['data'][10] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Ταυτοποίηση</label>
                            <p><?php echo $formPreview['data'][11] ?></p>
                        </div>
                        
                        <div class="col-md-3">
                            <label>ΑΦΜ</label>
                            <p><?php echo $formPreview['data'][7] ?></p>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Αριθμός Ταυτότητας</label>
                            <p><?php echo $formPreview['data'][12] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Έκδοσης</label>
                            <p><?php echo $formPreview['data'][13] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Χώρα Έκδοσης</label>
                            <p><?php echo $formPreview['data'][14] ?></p>
                        </div>
                    </div>


                    <h6 class="fw-bolder mb-2 mt-5">Στοιχεία Επικοινωνίας</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3">
                            <label>Χώρα Διαμονής</label>
                            <p><?php echo $formPreview['data'][15] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Πόλη Διαμονής</label>
                            <p><?php echo $formPreview['data'][16] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Περιοχή Διαμονής</label>
                            <p><?php echo $formPreview['data'][17] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Διεύθυνση</label>
                            <p><?php echo $formPreview['data'][18] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Αριθμός Τηλεφώνου</label>
                            <p><?php echo $formPreview['data'][19] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                            <p><?php echo $formPreview['data'][20] ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="container mt-5" style="width: 70%;">
                    <h6 class="fw-bolder mb-2">Στοιχεία τίτλου προς αναγνώριση</h6>
                    <hr class="form-bar">

                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-6">
                            <label>Κύκλος Φοίτησης</label>
                            <p><?php echo $formPreview['data'][21] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-5">
                            <label>Τύπος Φοίτησης</label>
                            <p><?php echo $formPreview['data'][22] ?></p>
                        </div>
                        <div class="col-md-5">
                            <label>Αντιστοιχία Πτυχίου</label>
                            <p><?php echo $formPreview['data'][23] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-5">
                            <label>Συνεκτίμηση Πτυχίου</label>
                            <p><?php echo $formPreview['data'][24] ?></p>
                        </div>
                        <div class="col-md-5">
                            <label>Τρόπος Φοίτησης</label>
                            <p><?php echo $formPreview['data'][25] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Χώρα Σπουδών</label>
                            <p><?php echo $formPreview['data'][26] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Πανεπιστήμιο</label>
                            <p><?php echo $formPreview['data'][27] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Τίτλος Σπουδών</label>
                            <p><?php echo $formPreview['data'][28] ?></p>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3">
                            <label>Πιστ. Μονάδες (credits)</label>
                            <p><?php echo $formPreview['data'][29] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Εγγραφής</label>
                            <p><?php echo $formPreview['data'][30] ?></p>
                        </div>
                        <div class="col-md-3">
                            <label>Ημερομηνία Αποφοίτησης</label>
                            <p><?php echo $formPreview['data'][31] ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="container mt-5" style="width: 70%;">

                    <div class="d-flex flex-row justify-content-between">
                        <div class="col-md-3 d-flex flex-column">
                            <label>Παράβολο</label>
                            
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#parabolo">
                            <?php echo $formPreview['files'][1] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="parabolo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">

                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][1] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Αντίγραφο Ταυτότητας</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#id">
                            <?php echo $formPreview['files'][2] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        <div class="embed-responsive embed-responsive-21by9 col-12">
                                            <iframe 
                                                class="embed-responsive-item" 
                                                src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][2] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Υπεύθυνη Δήλωση</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#dilosi">
                            <?php echo $formPreview['files'][4] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="dilosi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][4] ?>"
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

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3 d-flex flex-column">
                            <label>Έντυπο Συγκατάθεσης</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#sinkatathesi">
                            <?php echo $formPreview['files'][13] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="sinkatathesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][13] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Απολυτήριο Λυκείου</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#hs_diploma">
                            <?php echo $formPreview['files'][5] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="hs_diploma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][5] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Πτυχίο</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#diploma">
                            <?php echo $formPreview['files'][6] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="diploma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][6] ?>"
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

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3 d-flex flex-column">
                            <label>Μεταπτυχιακός Τίτλος</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#master">
                            <?php echo $formPreview['files'][7] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="master" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][7] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Πιστοποιητικό Μαθημάτων</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#master_certif">
                            <?php echo $formPreview['files'][8] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="master_certif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][8] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Πιστοποιητικό Πανεπιστημίου</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#collage_certf">
                            <?php echo $formPreview['files'][9] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="collage_certf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][9] ?>"
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

                    <div class="d-flex flex-row justify-content-between mt-2">
                        <div class="col-md-3 d-flex flex-column">
                            <label>.<br>Εργασία Μεταπτυχιακού Τίτλου</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#master_prj">
                            <?php echo $formPreview['files'][10] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="master_prj" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][10] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Πιστοποιητικό Πανεπιστημίου (Συνεκτίμηση Μεταπτυχιακού)</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#collage_certif_master">
                            <?php echo $formPreview['files'][11] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="collage_certif_master" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][11] ?>"
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
                        <div class="col-md-3 d-flex flex-column">
                            <label>Πιστοποιητικό Μαθημάτων (Συνεκτίμηση Μεταπτυχιακού)</label>
                            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#class_certif">
                            <?php echo $formPreview['files'][12] ?> <i class="bi bi-image"></i>
                            </button>

                            <div class="modal fade" id="class_certif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <div class="ratio ratio-4x3 col-12">
                                                <iframe 
                                                    class="embed-responsive-item" 
                                                    src="/Doatap/src/assets/uploads/<?php echo $formPreview['files'][12] ?>"
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
                        <p><?php echo $formPreview['data'][34] ?></p>
                    </div>
                </div>
            
            </form>
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
    </body>
</html>
