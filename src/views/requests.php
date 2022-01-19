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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../scripts.js"></script>
        <title>Νέα Αίτηση</title>

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
                        <button class="nav-link active" id="Submitted-tab" data-bs-toggle="tab" data-bs-target="#Submitted" type="button" role="tab" aria-controls="Submitted" aria-selected="true">Υποβλήθηκε</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="checked-tab" data-bs-toggle="tab" data-bs-target="#checked" type="button" role="tab" aria-controls="checked" aria-selected="false">Προσχέδιο</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Submitted" role="tabpanel" aria-labelledby="Submitted-tab">
                
                    <div class="row justify-content-start mt-5">
                        <?php 
                        if(empty($submitted)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν νέες υποβολές </h5> <?php 
                        } else {
                            foreach($submitted as $form){ ?>
                                <div class="col-3 mt-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Αναγνώριση ισοτιμίας</h5>
                                            <div class="card-text text-black-50"><?php echo $form['data']['15'] ?></div>
                                            <div class="card-text">Status : <?php echo $form['data']['20'] ?></div>
                                            <div class="card-text mt-2 text-black-50">Created at  <?php echo $form['data']['23'] ?></div>
                                            <a href="/Doatap/src/views/preview.php?id=<?php echo $form['data']['0']?>" class="btn mt-3">Ανάγνωση</a>
                                        </div>
                                    </div>
                                </div>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="checked" role="tabpanel" aria-labelledby="checked-tab">
                    <div class="row justify-content-start">
                    <?php 
                        if(empty($drafts)) {
                            ?> <h5 class="text-center mt-5"> Δεν υπάρχουν αποθηκευμένες αιτήσεις </h5> <?php 
                        } else {
                            foreach($drafts as $form){ ?>
                            <div class="col-3 mt-4">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Αναγνώριση ισοτιμίας</h5>
                                        <div class="card-text text-black-50"><?php echo $form['data']['21'] ?></div>
                                        <div class="card-text">Status : <?php echo $form['data']['33'] ?></div>
                                        <div class="card-text mt-2 text-black-50">Created at  <?php echo $form['data']['35'] ?></div>
                                        <a href="/Doatap/src/views/preview.php?id=<?php echo $form['data']['0']?>" class="btn mt-3">Ανάγνωση</a>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            include(BASE_URL. 'includes\footer.php'); 
        ?>
    </body>
</html>