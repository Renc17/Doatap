<?php
    require('../../config.php');
    require(BASE_URL. 'helpers\middlewares\guard.php');
    usersOnly();

    $logout_path = '..\helpers\auth\logout.php';
    $delete_path = '..\helpers\auth\delete.php';

    require(BASE_URL. 'controllers\forms.php');
    $formController =  new FormController($database);
    $drafts = $formController->getFormsByStatus('drafted');
    $submitted = $formController->getFormsByStatus('submitted');
    $rejected = $formController->getFormsByStatus('rejected');
    $issued = $formController->getFormsByStatus('checked');
    $standBy = $formController->getFormsByStatus('standBy');
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
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="../../scripts.js"></script>
        <title>Οι Αιτήσεις Μου</title>

        <style>
            button.edit-user{
                border: none;
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

            .modal-dialog{
                max-width: 55%;
                max-height: 100%;
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
                    <li class="breadcrumb-item active" aria-current="page">Οι Αιτήσεις μου</li>
                </ol>
            </nav>
        </div>

        <div class="container">
            <h2 class="name mt-5 text-center">
                Οι Αιτήσεις μου
            </h2>
            <h6 class=" text-center mb-5">
                <i class="bi bi-plus"></i>
                <a class="text-black-50" href="new-request.php">Νέα Αίτηση</a>
            </h6>
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="drafted-tab" data-bs-toggle="tab" data-bs-target="#drafted" type="button" role="tab" aria-controls="drafted" aria-selected="true">Προσχέδιο</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Submitted-tab" data-bs-toggle="tab" data-bs-target="#Submitted" type="button" role="tab" aria-controls="Submitted" aria-selected="false">Υποβλήθηκε</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked" type="button" role="tab" aria-controls="checked" aria-selected="false">Αναγνωρίστηκε</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="checked-tab" data-bs-toggle="tab" data-bs-target="#standBy" type="button" role="tab" aria-controls="standBy" aria-selected="false">Εκκρεμής</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" style="color: red;" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Απορρίφθηκε</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane" id="Submitted" role="tabpanel" aria-labelledby="Submitted-tab">
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($submitted)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν νέες υποβολές </h5> <?php 
                        } else {
                            foreach($submitted as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title col-10">Αναγνώριση ισοτιμίας</h5>
                                        <div class="card-text text-black-50"><?php echo $form[15] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[17] ?></div>
                                        <div class="card-text text-black-50">Τμήμα <?php echo $form[18] ?></div>
                                        <div class="card-text mt-2 text-black-50">Δημιουργήθηκε στις <?php echo $form[22] ?></div>
                                        <a href="/Doatap/src/views/preview.php?id=<?php echo $form[0] ?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade show active" id="drafted" role="tabpanel" aria-labelledby="drafted-tab">
                    <div class="row justify-content-start mt-5">
                    <?php 
                        if(empty($drafts)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αποθηκευμένες αιτήσεις </h5> <?php 
                        } else {
                            foreach($drafts as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title col-10">Αναγνώριση ισοτιμίας</h5>
                                            <div class="text-black-50 border border-0 col-1" onclick="alertDeleteForm()" ><i class="bi bi-trash"></i></div>
                                        </div>
                                        <div class="card-text text-black-50"><?php echo $form[15] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[17] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[18] ?></div>
                                        <div class="card-text mt-2 text-black-50">Δημιουργήθηκε στις <?php echo $form[22] ?></div>
                                        <a id="form-id" href="/Doatap/src/views/preview.php?id=<?php echo $form[0] ?>" name="<?php echo $form[0] ?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                </div>

                <div class="tab-pane" id="checked" role="tabpanel" aria-labelledby="checked-tab">
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($issued)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αρχεία </h5> <?php 
                        } else {
                            foreach($issued as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Αναγνώριση ισοτιμίας</h5>
                                        <div class="card-text text-black-50"><?php echo $form[15] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[17] ?></div>
                                        <div class="card-text text-black-50">Τμήμα <?php echo $form[18] ?></div>
                                        <div class="card-text mt-2 text-black-50">Δημιουργήθηκε στις <?php echo $form[22] ?></div>

                                        <div class="mt-3">
                                            <button type="button" class="btn border border-2 col-md-12 m-auto" data-bs-toggle="modal" data-bs-target="#id">
                                            e-statement</i>
                                            </button>

                                            <div class="modal fade" id="id" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="d-flex align-items-center">
                                                            <button type="button" class="btn-close m-auto border border-4" style="background-color: white" data-bs-dismiss="modal" aria-label="Close"></i></button>
                                                            <button type="button" class="btn float-end" style="background-color: white"><i class="bi bi-download"></i></button>
                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center">
                                                            <div class="embed-responsive embed-responsive-21by9 col-12">
                                                                <iframe 
                                                                    class="embed-responsive-item" 
                                                                    src="/Doatap/src/views/e-statement.php?id=<?php echo $form[0] ?>"
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

                                        <a href="/Doatap/src/views/preview.php?id=<?php echo $form[0] ?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>

                <div class="tab-pane" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($rejected)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αρχεία </h5> <?php 
                        } else {
                            foreach($rejected as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Αναγνώριση ισοτιμίας</h5>
                                        <div class="card-text text-black-50"><?php echo $form[15] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[17] ?></div>
                                        <div class="card-text text-black-50">Τμήμα <?php echo $form[18] ?></div>
                                        <div class="card-text mt-2 text-black-50">Δημιουργήθηκε στις <?php echo $form[22] ?></div>
                                        <a href="/Doatap/src/views/preview.php?id=<?php echo $form[0] ?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>

                <div class="tab-pane" id="standBy" role="tabpanel" aria-labelledby="standBy-tab">
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($standBy)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αρχεία </h5> <?php 
                        } else {
                            foreach($standBy as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title col-10">Αναγνώριση ισοτιμίας</h5>
                                            <div class="text-black-50 border border-0 col-1" onclick="alertDeleteForm()" ><i class="bi bi-trash"></i></div>
                                        </div>
                                        <div class="card-text text-black-50"><?php echo $form[15] ?></div>
                                        <div class="card-text text-black-50"><?php echo $form[17] ?></div>
                                        <div class="card-text text-black-50">Τμήμα <?php echo $form[18] ?></div>
                                        <div class="card-text mt-2 text-black-50">Δημιουργήθηκε στις <?php echo $form[22] ?></div>
                                        <a id="form-id" href="/Doatap/src/views/preview.php?id=<?php echo $form[0] ?>" name="<?php echo $form[0] ?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
        <script type="text/javascript" src="scripts/alerts.js"></script>
    </body>
</html>